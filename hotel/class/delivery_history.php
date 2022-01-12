<?php
class delivery_history extends model{

	protected $class_name = 'delivery_history';
	protected $id;
	protected $shipper_id;//
	protected $order_id;//members_id nhưng là loại giao hàng
	protected $order_created_at;
	protected $shop_id;
	protected $delivery_id;//
	protected $note;//
	protected $is_hidden;//
	protected $shipper_status;//
	protected $minus_points;//
	protected $created_at;
	protected $created_by;
	protected $deleted;//=0 là chưa xóa > 0 đã xóa và là thời gian xóa
	protected $deleted_by;
	protected $delivery_steps_id;

	public function add(){
		global $db;

		$created_by = $this->get('created_by');

		if($created_by == '') $created_by = 0;
        
		$arr['shipper_id'] 					= $this->get('shipper_id')+0;
		$arr['order_id'] 					= $this->get('order_id');
		$arr['order_created_at'] 			= $this->get('order_created_at');
		$arr['shop_id'] 					= $this->get('shop_id');
		$arr['delivery_id'] 				= $this->get('delivery_id');
		$arr['note'] 						= $this->get('note');
		$arr['is_hidden'] 					= $this->get('is_hidden')+0;
		$arr['shipper_status'] 				= $this->get('shipper_status')+0;
		$arr['minus_points'] 				= $this->get('minus_points')+0;
		$arr['created_at'] 					= time();
		$arr['created_by'] 					= $created_by;
		$arr['deleted'] 					= 0;
		$arr['deleted_by'] 					= 0;
		$arr['delivery_steps_id'] 			= $this->get('delivery_steps_id')+0;

		$db->record_insert( $this->class_name, $arr );

		$id = $db->mysqli_insert_id();

		$this->set('id', $id);
		$this->update_delivery_step();

		return $id;
    }

	public function update_note(){
		global $db;

		$id 					= $this->get('id');
		$arr['note'] 			= $this->get('note');
		$arr['is_hidden'] 		= $this->get('is_hidden')+0;

		$db->record_update( $this->class_name, $arr, " `id` = '$id' " );

		return true;
    }

	public function delete_item(){
		global $db;

		$id 					= $this->get('id');
		$arr['deleted'] 		= time();
		$arr['deleted_by'] 		= $this->get('deleted_by')+0;

		$db->record_update( $this->class_name, $arr, " `id` = '$id' " );

		$this->set('id', $id);
		$this->update_delivery_step();

		return true;
    }

	public function update_delivery_step()//Cập nhật lại trạng thái một
	{
        global $db;
		$delivery = new delivery();
		
		$id           	= $this->get('id');
		$dThis			= $this->get_detail();

		$delivery_id = $dThis['delivery_id'];
        $sql = "SELECT `delivery_steps_id`, `note`
				FROM $db->tbl_fix`$this->class_name` t
				WHERE t.`deleted` = 0
				AND t.`is_hidden` = 0
				AND t.`delivery_id` = '$delivery_id'
                ORDER BY t.`delivery_steps_id` DESC, t.`created_at` DESC
				LIMIT 1";
				
		$r = $db->executeQuery( $sql, 1 );

		if( isset($r['delivery_steps_id']) && $r['delivery_steps_id'] > 0 ){
			//update shipper_status = delivery_steps_id: trạng thái đơn giờ là id của từng step giao hàng

			$delivery->set('id', $delivery_id);
			$delivery->set('shipper_status', $r['delivery_steps_id']);//trạng thái đơn chính là bước giao hàng
			$delivery->set('note', $r['note']);
			$delivery->update_shipper_status();

		}else {
			$delivery->set('id', $delivery_id);
			$delivery->set('shipper_status', 0);//trạng thái đơn chính là bước giao hàng
			$delivery->set('note', '');
			$delivery->update_shipper_status();
		}
        
		return true;
    }

	public function list_by_steps( $sort_by = 'DESC' )
	{
        global $db;
        
		$order_id           = $this->get('order_id');
		$order_created_at   = $this->get('order_created_at');
		$shop_id            = $this->get('shop_id');

		if( $sort_by == '' || !in_array( $sort_by, array('DESC', 'ASC')) )
			$sort_by = 'DESC';

        $sql = "SELECT steps.*
						, IF( IFNULL(t.`id`, 0) = 0, 0, 1) `status`
						, IFNULL(t.`created_at`, 0) created_at
				FROM $db->tbl_fix`delivery_steps` steps
				LEFT JOIN $db->tbl_fix`$this->class_name` t 
				ON t.`delivery_steps_id` = steps.`id` AND t.`order_id` = '$order_id' 
				AND t.`shop_id` = '$shop_id' AND t.`deleted` = 0
				GROUP BY `steps`.id
                ORDER BY steps.`step` $sort_by";
		
		$r = $db->executeQuery_list( $sql );
        
		return $r;
    }

	public function list_by_order_and_steps()
	{
        global $db;
        
		$order_id           = $this->get('order_id');
		$shop_id            = $this->get('shop_id');
		$delivery_steps_id  = $this->get('delivery_steps_id');
		$is_hidden  		= $this->get('is_hidden');

		if( $is_hidden !== '' )
			$is_hidden = "AND t.`is_hidden` = '$is_hidden' ";

        $sql = "SELECT t.*, IFNULL(user.`username`, '') created_by_user
				FROM $db->tbl_fix`$this->class_name` t
				LEFT JOIN $db->tbl_fix`user` user ON user.`id` = t.`created_by`
                WHERE t.`deleted` = 0
				AND t.`order_id` = '$order_id'
                AND t.`shop_id` = '$shop_id'
                AND t.`delivery_steps_id` = '$delivery_steps_id'
				$is_hidden
                ORDER BY `created_at` DESC";

		$r = $db->executeQuery_list( $sql );
        
		return $r;
    }

    public function list_by_order()
	{
        global $db;
        
		$order_id           = $this->get('order_id');
		$order_created_at   = $this->get('order_created_at');
		$shop_id            = $this->get('shop_id');

        $sql = "SELECT t.* FROM ".$db->tbl_fix."`$this->class_name` t
                WHERE t.`order_id` = '$order_id'
                AND t.`shop_id` = '$shop_id'
				t.`deleted` = 0
                ORDER BY `created_at` DESC";
		$result = $db->executeQuery_list( $sql );
        
		return $result;
    }

    public function list_by_delivery()
	{
        global $db;
        
		$delivery_id = $this->get('delivery_id');

        $sql = "SELECT t.*, IFNULL(mb.`fullname`, 'Hệ thống' ) shipper_fullname
                FROM ".$db->tbl_fix."`$this->class_name` t
                LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = t.shipper_id
                WHERE
				`delivery_id` = '$delivery_id'
				AND t.`deleted` = 0
                ORDER BY `created_at` DESC";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}
	
	//tổng số đơn hàng không nhận trong tháng
	public function list_by_delivery_count()
	{
		global $db;
		
		$date = strtotime(date('m/01/Y'));
		$shipper_id = $this->get('shipper_id');
		
		$sql = "SELECT COUNT(*) as total
				FROM $db->tbl_fix`$this->class_name` t
				WHERE
				t.`shipper_id` = '$shipper_id'
				AND t.`created_at` >= '$date'
				AND t.`deleted` = 0
				AND t.`shipper_status` = -1";

		$result = $db->executeQuery( $sql, 1 );

		return $result;
	}

	//filter đơn hàng by status
	//Tùng code
	public function filter($offset = '', $limit = '', $confirm_type = '', $from ='', $to='', $keyword='' ){ //select đơn hàng không thành công shipper_status < 0
		global $db, $detail_order, $order, $setup;
		$collected_payments = new collected_payments();

		$shipper_status = $this->get('shipper_status');
		$shipper_id 	= $this->get('shipper_id');

		if ( $limit != '' ) $limit = "LIMIT $offset, $limit";

		if( $shipper_status != '-1' ){
			$shipper_status = "AND del_his.`shipper_status` = '$shipper_status'";
		}else{
			//Tab từ chối giao
			$shipper_status = "AND (
									del_his.`shipper_status` = '-1' 
									OR del_his.`shipper_status` = '-4'
									OR del_his.`shipper_status` = '-3'
								)";
		}
		
		if ($keyword != '')
			$keyword = "AND ( del_his.`order_id` LIKE '%$keyword%' OR col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%') ";

		if (isset($from) && $from > 0) {
			$date_add = " AND '$from' <= del_his.`created_at` AND del_his.`created_at` < '$to' ";
		}else{
			$date_add = "";
		}

		if (isset($confirm_type) && $confirm_type > 0) {
			if($confirm_type == 1){
				$confirm_type = " AND del.`confirm_type` = 'Showroom' ";
			}else if($confirm_type){
				$confirm_type = " AND del.`confirm_type` = 'Viettel' ";
			}else if($confirm_type){
				$confirm_type = " AND del.`confirm_type` = 'KH' ";
			}else{
				$confirm_type = "";
			}
		} else {
			$confirm_type = "";
		}

		$sql = "SELECT del_his.`id` `delivery_id`, del_his.`shipper_status`, del_his.`shipper_id`, del.`ship_code`, del.`viewed`, del.`is_convert`, col.*
				FROM $db->tbl_fix`delivery_history` del_his
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del_his.`order_id`
				INNER JOIN $db->tbl_fix`delivery` del ON del.`id` = del_his.`delivery_id`
				WHERE del_his.`shipper_id` = '$shipper_id'
				AND del_his.`deleted` = 0
				$shipper_status $date_add $confirm_type $keyword
				GROUP BY del_his.`order_id`
				ORDER BY `del_his`.created_at DESC
				$limit";
				
		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {

			$dOrder					= $order->get_detail($row['shop_id'], $row['order_id'], $row['order_created_at']);

			$row['ship_name']		= $dOrder['ship_name'];
			$row['ship_mobile']		= $dOrder['ship_mobile'];
			$row['ship_address']	= $dOrder['ship_address'];
			$row['ship_note']		= $dOrder['ship_note'];
			$row['address']			= $dOrder['ship_address'];
			unset($dOrder);
			
			$this->set('order_id', $row['order_id']);
			$this->set('shop_id', $row['shop_id']);
			$row['journeys'] 	= $this->list_order_journeys();

			$collected_payments->set('shop_id', $row['shop_id']);
			$collected_payments->set('order_id', $row['order_id']);
			$row['payment'] 	= $collected_payments->list_by_order();
			
			$COD				= 0;
			$wallet_main		= 0;
			$wallet_cashback	= 0;
			foreach ($row['payment'] as $key => $ssit) {
				if( $ssit['id'] == $setup['payment_type_COD'] ){
					$COD 			+= $ssit['total'];
				}else if( $ssit['id'] == $setup['payment_type_wallet_main'] ){
					$wallet_main 	+= $ssit['total'];
				} else if ($ssit['id'] == $setup['payment_type_wallet_cashback']) {
					$wallet_cashback 	+= $ssit['total'];
				}
			}

			$dDiSer   		        = $detail_order->devidend_service_fee($row['shop_id'], $row['order_id'], $row['order_created_at']);
			$discount_val          	= $dDiSer['discount'];
			$ship_fee_val 			= $dDiSer['ship_fee'];
			$package_fee_val 		= $dDiSer['package_fee'];
			$total_product 		    = $dDiSer['total_product'];
			unset($dDiSer);
			
			$row['ship_fee']         = $ship_fee_val;
			$row['package_fee']      = $package_fee_val;
			$row['discount']         = $discount_val;
			$row['total_product']    = $total_product;
			if( $row['is_convert'] == 1 ){
				$row['COD_total'] 		 = $COD + $wallet_cashback;
			}else{
				$row['COD_total'] 		 = $COD;
			}
			$row['wallet_total'] 	 = $wallet_main;
			
            $row['lItems']   		= $detail_order->listby_order_only_product($row['shop_id'], $row['order_id'], $row['order_created_at']);

			$kq[] = $row;
		}

		return $kq;
	}


	public function filter_count($confirm_type='', $from='', $to='', $keyword='')  //đếm số lượng đơn hàng không thành công shipper_status < 0
	{
		global $db, $detail_order;

		$shipper_status = $this->get('shipper_status');
		$shipper_id 	= $this->get('shipper_id');

		if($shipper_status != '-1'){
			$shipper_status = "AND del_his.`shipper_status` = '$shipper_status'";
		}else{
			$shipper_status = "AND (
									del_his.`shipper_status` = '-1' 
									OR del_his.`shipper_status` = '-3'
									OR del_his.`shipper_status` = '-4'
								)";
		}

		if ($keyword != '')
			$keyword = "AND ( del_his.`order_id` LIKE '%$keyword%' OR col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%') ";

		if (isset($from) && $from > 0) {
			$date_add = " AND '$from' <= del_his.`created_at` AND del_his.`created_at` < '$to' ";
		}else{
			$date_add = "";
		}

		if (isset($confirm_type) && $confirm_type > 0) {
			if($confirm_type == 1){
				$confirm_type = " AND del.`confirm_type` = 'Showroom' ";
			}else if($confirm_type == 2){
				$confirm_type = " AND del.`confirm_type` = 'Viettel' ";
			}else if($confirm_type == 3){
				$confirm_type = " AND del.`confirm_type` = 'KH' ";
			}else{
				$confirm_type = "";
			}
		} else {
			$confirm_type = "";
		}

		$sql = "SELECT COUNT(*) total FROM (
					SELECT `del_his`.`id`
					FROM $db->tbl_fix`delivery_history` del_his
					INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del_his.`order_id`
					INNER JOIN $db->tbl_fix`delivery` del ON del.`id` = del_his.`delivery_id`
					WHERE del_his.`shipper_id` = '$shipper_id'
					AND del_his.`deleted` = 0
					$shipper_status $date_add $confirm_type $keyword
					GROUP BY del_his.`order_id`
				) n";

		$result = $db->executeQuery($sql, 1);

		return $result['total'];
	}

	public function list_order_journeys() // lấy hành trình đơn hàng
	{
		//hàm lấy hành trình giao hàng.
		global $db;

		$shop_id 		= $this->get('shop_id');
		$order_id 		= $this->get('order_id');
		$is_hidden 		= $this->get('is_hidden');

		if ($is_hidden !== '')
			$is_hidden = " AND t.`is_hidden` = '$is_hidden' ";

		$sql = "SELECT de.*
				FROM $db->tbl_fix`delivery_history` t
				WHERE
				t.`order_id` = '$order_id'
				AND t.`shop_id` = '$shop_id'
				AND t.`deleted` = 0
				$is_hidden
				ORDER BY `id` DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}
	//end tùng code

	public function list_journeys() // lấy hành trình đơn hàng trên web (tùng code - 29/12/20)
	{
		//hàm lấy hành trình giao hàng.
		global $db;
		$delivery = new delivery();

		$shop_id 		= $this->get('shop_id');
		$order_id 		= $this->get('order_id');

		$sql = "SELECT de.`id`, de.`shop_id`, de.`order_id`, de.`shipper_status` delivery_status, de.`note`, de.`created_at`, sr.`name` name_showroom,
				IFNULL(mb.`fullname`, '-') created_by
				FROM $db->tbl_fix`delivery_history` de
				INNER JOIN $db->tbl_fix`showroom` sr ON de.`shipper_id` = sr.`id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = de.`created_by`
				WHERE de.`order_id` = '$order_id'
				AND de.`shop_id` = '$shop_id'
				AND de.`deleted` = 0
				ORDER BY de.`id` DESC";

		
		$result = $db->executeQuery($sql);

		$kq = array();
		while($row = mysqli_fetch_assoc($result) ){
			$delivery->set('shipper_status', $row['delivery_status']);
			$row['delivery_status_label'] = $delivery->delivery_status_label();
			$kq[] = $row;
		}

		return $kq;
	}

	public function get_done_date() // lấy hành trình đơn hàng trên web (tùng code - 29/12/20)
	{
		//hàm lấy hành trình giao hàng.
		global $db;
		
		$shop_id 		= $this->get('shop_id');
		$order_id 		= $this->get('order_id');

		$sql = "SELECT de.`created_at`
				FROM $db->tbl_fix`delivery_history` de
				WHERE 
				de.`order_id` = '$order_id' 
				AND de.`shop_id` = '$shop_id' 
				AND de.`shipper_status` = '3'
				AND de.`deleted` = 0
				ORDER BY de.`id` DESC";
		
		$result = $db->executeQuery($sql, 1);

		return isset($result['created_at']) ? $result['created_at']:0;
	}
	
}
$delivery_history = new delivery_history();