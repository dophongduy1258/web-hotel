<?php

class collected_orders extends model{

	protected $class_name = 'collected_orders';
	protected $id;
	protected $hour;
	protected $day;
	protected $month;
	protected $year;
	protected $quarter;
	protected $no_items;
	protected $total_paid;
	protected $order_id;
	protected $status;//= -1 đơn hủy; =0 đơn tạm; =1 đơn hoàn thành
	protected $order_created_at;
	protected $sum;
	protected $cash;// thanh toan tien mat
	protected $card;// thanh toan the
	protected $usd;// thanh toan bang usd
	protected $debt;// cong no
	protected $debt_paid;// cong no da tra duoc 
	protected $other;// loai thanh toan khac
	protected $discount;
	protected $cost;
	protected $is_booking;//is order booking
	protected $status_booking;// =0 order booking is not delivery yet; = 1 deliveried some; = 2 done deliveried
	protected $is_returned_order;//có phải là đơn hàng trả hay không = 1 or = 0
	protected $nvkd_id;
	protected $nvkd_commission;
	protected $shop_id;
	protected $created_at;
	protected $created_by;
	protected $payment_type;
	protected $members_id;
	protected $members_name;
	protected $members_mobile;
	protected $is_official_member;

	protected $service_fee;
	
	protected $order_type;
	protected $is_internal;
	protected $export_for_wh_id;
	protected $for_client_id;
	protected $created_by_client_id;

	protected $pro_allow_commission;//List sản phẩm cho phép nhận 4% bởi đại lý.
	protected $pro_allow_commission_value;//Giá trị nhận
	protected $pro_allow_commission_percent;//Tính phần trăm
	
	protected $is_divided;//Đã chia điểm thưởng cho đơn này chưa; nếu bằng 0 thì sẽ chia, còn nếu khác thì xem có thể trường hợp đơn nhập liệu có hàng tặng từ livestream
	
	public function add( $lGeneralPayment ){
		global $db, $detail_order, $main;

		$members = new members();

		$order_created_at = $this->get('created_at');

		if( $order_created_at < 1000000 ) $order_created_at = time();

		$detail_order->set('order_id', $this->get('order_id'));
		$dOrderStatic = $detail_order->get_static_info( $this->get('shop_id'), $order_created_at );

		$month 						= date('m');
		$arr['hour'] 				= date('H');
		$arr['day'] 				= date('d');
		$arr['month'] 				= $month;
		$arr['year'] 				= date('Y');
		$arr['quarter'] 			= ceil($month/3);

		$arr['no_items'] 			= $dOrderStatic['no_items'];
		$arr['order_id'] 			= $this->get('order_id');
		$arr['status'] 				= $this->get('status');
		if( $arr['status'] == '' && $arr['status'] != 0 )  $arr['status'] = 1;
		$arr['order_created_at'] 	= $order_created_at;
		$arr['total_paid'] 			= $this->get('total_paid');
		$tong_tien 					= $this->get('sum');
		$payment_type 				= $this->get('payment_type');

		/**
		 * BEGIN Cái này chắc không dùng
		 */
		$arr['cash'] 			= 0;
		$arr['usd'] 			= 0;
		$arr['card'] 			= 0;
		$arr['other'] 			= 0;
		$arr['debt_paid'] 		= 0;
		
		if( $payment_type == 0 )
			$arr['cash'] 			= $tong_tien+0;
		else if( $payment_type == 1 )
			$arr['debt'] = $tong_tien - $this->get('total_paid');
		else if( $payment_type == 2 )
			$arr['usd'] 			= $tong_tien;
		else if( $payment_type == 3 )
			$arr['card'] 			= $tong_tien;
		else
			$arr['other'] 			= $tong_tien+0;
		/**
		 * END Cái này chắc không dùng
		 */
		
		$arr['sum'] 				= $this->get('sum')+0;
		$arr['discount'] 			= $dOrderStatic['discount'];
		$arr['cost'] 				= $dOrderStatic['cost'];
		$arr['is_booking'] 			= $this->get('is_booking');
		$arr['status_booking'] 		= 0;
		$arr['is_returned_order'] 	= $this->get('is_returned_order');
		$arr['shop_id'] 			= $this->get('shop_id');
		$arr['created_at'] 			= time();
		$arr['created_by'] 			= $this->get('created_by');
		$arr['payment_type'] 		= $this->get('payment_type');
		$arr['members_id'] 			= $this->get('members_id');
		$arr['members_name'] 		= $this->get('members_name');
		$arr['members_mobile'] 		= $this->get('members_mobile');
		$arr['is_official_member'] 	= $this->get('is_official_member');

		$arr['service_fee'] 		= $this->get('service_fee')+0;
		if( $arr['service_fee'] == '' )  $arr['service_fee'] = 0;

		$arr['order_type'] 			= $this->get('order_type');
		$arr['is_internal'] 		= $this->get('is_internal');
		$arr['export_for_wh_id'] 	= $this->get('export_for_wh_id');
		$arr['for_client_id']		= $this->get('for_client_id') == '' ? 0:$this->get('for_client_id');
		$arr['created_by_client_id']= $this->get('created_by_client_id');
		$arr['nvkd_id'] 			= $this->get('nvkd_id')+0;
		$arr['nvkd_commission'] 	= 0;

		$arr['pro_allow_commission'] 		= $this->get('pro_allow_commission');
		$arr['pro_allow_commission_value'] 	= $this->get('pro_allow_commission_value') == '' ? '0':$this->get('pro_allow_commission_value');
		$arr['pro_allow_commission_percent']= $this->get('pro_allow_commission_percent') == '' ? '0':$this->get('pro_allow_commission_percent');
		
		$members_id					= $this->get('members_id');
		if( $members_id > 0 ){
			$members->set('user_id', $members_id);
			$dMember = $members->get_detail();
			if( isset($dMember['user_id']) && $dMember['referral_by'] != '' ){
				$members->set('code', $dMember['referral_by'] );
				$dReferral = $members->get_detail_by_code();
				if( isset($dMember['user_id']) ){
					$arr['nvkd_id'] 			= $dMember['user_id'];
				}
			}
			unset($dMember);
			unset($dReferral);

			//Cập nhật tổng giảm giá; cập nhật tổng doanh thu trên giá lẻ
			$members->set('user_id', $members_id);
			$members->set('total_discount', $arr['discount']);
			$members->set('total_revenue', $tong_tien + $arr['discount']);
			$members->update_total_discount_and_revenue();
					
		}

		//Xóa item cũ
		$db->record_delete($db->tbl_fix.$this->class_name, " `order_id` = '".$arr['order_id']."' AND `shop_id` = '".$arr['shop_id']."' ");

		//kiểm tra xem có tồn tại trước khi thêm hoặc delete
		unset( $dOrderStatic );
		$db->record_insert($this->class_name, $arr);
		
		$collected_orders_id =  $db->mysqli_insert_id();

		/**
		 * BEGIN phân loại hình thức thanh toán vào bảng riêng
		 */
		$collected_payments = new collected_payments();
		$collected_payments->set('shop_id', $this->get('shop_id'));
		$collected_payments->set('order_id', $this->get('order_id'));
		$collected_payments->set('order_created_at', $order_created_at);
		$collected_payments->set('collected_orders_id', $collected_orders_id);
		$collected_payments->set('wallet_paid', 0);
		$collected_payments->set('wallet_transaction_id', 0);
		
		if( $lGeneralPayment != '' && $payment_type == 1 ){
			$lGeneralPayment = json_decode($lGeneralPayment, true);
			if( $lGeneralPayment && $lGeneralPayment > 0 ){
				foreach ($lGeneralPayment as $itVal) {
					$itAmount = $main->number($itVal['amount']+0);
					if( $itAmount > 0 ){
						$collected_payments->set('payment_type', $itVal['payment_type']);
						$collected_payments->set('value', $itAmount );
						$collected_payments->set('wallet_paid', $itVal['wallet_paid']);
						$collected_payments->set('wallet_transaction_id', $itVal['wallet_transaction_id']);
						$collected_payments->add();
					}
				}
			}else{
				$collected_payments->set('payment_type', $payment_type);
				$collected_payments->set('value', $tong_tien );
				$collected_payments->add();
			}
		}else{
			$collected_payments->set('payment_type', $payment_type);
			$collected_payments->set('value', $tong_tien );
			$collected_payments->add();
		}
		 /**
		 * END phân loại hình thức thanh toán vào bảng riêng
		 */
		 return $collected_orders_id;
	}	

	//Get detail item by order_id
	public function get_detail_by_order_id(){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$order_id 		= 	$this->get('order_id');

		$sql = "SELECT *
				FROM `collected_orders` as col
				WHERE `shop_id` = '$shop_id' AND `order_id` = '$order_id'
				LIMIT 1";
		
		$result = $db->executeQuery( $sql, 1 );
		
		return $result;
	}

	//Lấy hợp đồng theo mã
	public function get_by_code()
	{
		global $db;

		$order_id 	= $this->get('order_id');
		$shop_id 	= $this->get('shop_id');

		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` col WHERE col.`order_id` = '$order_id' AND col.`shop_id` = '$shop_id' LIMIT 1";
		$result = $db->executeQuery($sql, 1);
		
		return $result;
	}

	public function list_orders( $sort, $from, $to, $offset = 0, $limit = ''){
		global $db;
		$nvkd_id = $this->get('nvkd_id');

		$sorting = '';
		if( isset( $sort['sortby_created_at'] ) && $sort['sortby_created_at'] != '' )
			if(	$sort['sortby_created_at'] == 'up'){
				$sorting = " col.`order_created_at` ASC ";
			}else{
				$sorting = " col.`order_created_at` DESC ";
			}
		
		if( isset( $sort['sortby_sum'] ) && $sort['sortby_sum'] != '' )
			if(	$sort['sortby_sum'] == 'up'){
				$sorting = " `sum` ASC ";
			}else{
				$sorting = " `sum` DESC ";
			}

		if( isset( $sort['sortby_free'] ) && $sort['sortby_free'] != '' )
			if(	$sort['sortby_free'] == 'up'){
				$sorting = " `free` ASC ";
			}else{
				$sorting = " `free` DESC ";
			}
		
		if( isset( $sort['sortby_commission'] ) && $sort['sortby_commission'] != '' )
			if(	$sort['sortby_commission'] == 'up'){
				$sorting = " `commission` ASC ";
			}else{
				$sorting = " `commission` DESC ";
			}

		if($sorting != ''){
			$sorting = "ORDER BY ".$sorting;
		}else{
			$sorting = " ORDER BY col.`order_created_at` DESC";
		}

		if( $limit != '' ) $limit = " LIMIT $offset,$limit ";
		$sql = "SELECT col.*, (col.`sum`*(col.`nvkd_commission`/100)) as commission,shop.`name` as shop_name
				FROM `collected_orders` as col
				INNER JOIN `shop` ON `shop`.`id` = `col`.`shop_id` 
				WHERE 
				'$from' <= `order_created_at` AND `order_created_at` < '$to' 
				AND `nvkd_id` = '$nvkd_id'
				AND col.`status` = '1'
				$sorting
				$limit";
		$result = $db->executeQuery( $sql );
		
		$kq = array();
		while ( $row = mysqli_fetch_assoc( $result ) ) {
			$kq[] = $row;
		}
		
		return $kq;
	}

	public function opt_all_created_by(){
		global $db;

		$sql = "SELECT `created_by` val
				FROM `$this->class_name`
				WHERE `created_by` <> ''
				GROUP BY `created_by`";

		$result = $db->executeQuery( $sql );
		$opt  = '';
		while ( $row = mysqli_fetch_assoc( $result ) ) {
			$opt  .= '<option value="'.$row['val'].'">'.$row['val'].'</option>';
		}
		return $opt;
		
	}
	//Báo cáo doanh số bán hàng theo ngày
	public function filter_revenue( $from, $to, $offset = 0, $limit = ''){
		global $db;

		echo 'Lỗi! Truy vấn dữ liệu H102138';
		exit();

		$shop_id 		= 	$this->get('shop_id');
		$is_booking 	= 	$this->get('is_booking');
		$created_by 	= 	$this->get('created_by');

		if( $created_by != '' ) $created_by = " AND  col.`created_by` = '$created_by' ";
		if( $is_booking == 0 || $is_booking == 1 ){
			$is_booking = " AND col.`is_booking` = '$is_booking' ";
		}else{
			$is_booking = "";
		}

		if( $limit != '' ) $limit = " LIMIT $offset,$limit ";

		$sql = "SELECT COUNT(*) total_orders, col.`order_created_at`, SUM(col.`no_items`) no_items, SUM(col.`sum`) `sum`, SUM(col.`cash`) `cash`, SUM(col.`card`) `card`, SUM(col.`usd`) `usd`, SUM(col.`debt`) `debt`, SUM(col.`debt_paid`) `debt_paid`
					,SUM( ( (col.`sum`*col.`nvkd_commission`) /100 ) ) as commission
				FROM `collected_orders` as col
				WHERE
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
				AND  col.`shop_id` = '$shop_id'
				AND col.`status` = '1'
				$is_booking
				$created_by 
				GROUP BY col.`day`
				ORDER BY `order_created_at`
				$limit";
		
		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}
	
	public function filter_revenue_count( $from, $to){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$is_booking 	= 	$this->get('is_booking');
		$created_by 	= 	$this->get('created_by');

		if( $created_by != '' ) $created_by = " AND  col.`created_by` = '$created_by' ";

		if( $is_booking == 0 || $is_booking == 1 ){
			$is_booking = " AND col.`is_booking` = '$is_booking' ";
		}else{
			$is_booking = "";
		}

		$sql = "SELECT COUNT(*) total, SUM(`sum`) `sum`, SUM(`total_orders`) `total_orders`
				FROM (
				SELECT COUNT(*) `total_orders`, SUM(col.`sum`) `sum`
				FROM `collected_orders` as col
				WHERE
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
				AND col.`status` = '1'
				AND  col.`shop_id` = '$shop_id'
				$is_booking
				$created_by 
				GROUP BY col.`day`
				) nTB
				";

		$result = $db->executeQuery( $sql, 1);
		
		return array('total_orders' => $result['total_orders']+0, 'total_record' => $result['total']+0, 'total_revenue' => $result['sum']+0 );
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function report_orders_general( $from, $to){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$is_booking 	= 	$this->get('is_booking');
		$created_by 	= 	$this->get('created_by');
		$members_id 	= 	$this->get('members_id');

		if( $created_by != '' ) $created_by = " AND  col.`created_by` = '$created_by' ";
		if( $members_id != '' ) $members_id = " AND  col.`members_id` = '$members_id' ";

		$sql = "SELECT COUNT(*) total_record, IFNULL( SUM(col.`sum`), 0) `sum`, IFNULL( SUM(col.`discount`), 0) `discount`, IFNULL(SUM(col.`total_paid`), 0) `total_paid`,  IFNULL(SUM(col.`debt`), 0) `debt`,  IFNULL(SUM(col.`debt_paid`), 0) `debt_paid`, IFNULL( SUM(col.`cost`), 0) `cost`
				FROM `collected_orders` as col
				WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
				AND  col.`shop_id` = '$shop_id'
				AND col.`is_booking` = '$is_booking'
				AND col.`status` = '1'
				$created_by $members_id
				";

		$result = $db->executeQuery( $sql, 1);
		
		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function report_orders_list_by( $keyword, $treasurer_group_id, $treasurer_id, $from, $to, $offset = 0, $limit = ''){
		global $db, $db_store, $order;
		$liabilities_history 	= new liabilities_history();
		$collected_payments 	= new collected_payments();

		$shop_id 		= 	$this->get('shop_id');
		$payment_type 	= 	$this->get('payment_type');
		$created_by 	= 	$this->get('created_by');
		$order_type 	= 	$this->get('order_type');
		$is_booking 	= 	$this->get('is_booking');
		$members_id 	= 	$this->get('members_id');

		$sqlPayment = '';
		if( $payment_type != '' ){
			$lPayment = explode( ';', $payment_type );
			foreach ($lPayment as $pt) {
				if( $pt != '' )
					$sqlPayment .= " col.`payment_type` = '$pt' OR ";
			}
			if( $sqlPayment != '' ){
				$sqlPayment = ' AND ('.substr($sqlPayment, 0, -3 ). ')';
			}
		}

		$sqlTreasurerGroupId = '';
		if( $treasurer_group_id != '' ){
			$lTreasurerGroupId = explode( ';', $treasurer_group_id );
			foreach ($lTreasurerGroupId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerGroupId .= " od.`treasurer_group_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerGroupId != '' ){
				$sqlTreasurerGroupId = ' AND ('.substr($sqlTreasurerGroupId, 0, -3 ). ')';
			}
		}
		$sqlTreasurerId = '';
		if( $treasurer_id != '' ){
			$lTreasurerId = explode( ';', $treasurer_id );
			foreach ($lTreasurerId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerId .= " od.`treasurer_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerId != '' ){
				$sqlTreasurerId = ' AND ('.substr($sqlTreasurerId, 0, -3 ). ')';
			}
		}

		if( $is_booking !== '' ) $is_booking = " AND col.`is_booking` = '$is_booking' ";
		if( $order_type !== '' ) $order_type = " AND  col.`order_type` = '$order_type' ";
		if( $created_by !== '' ) $created_by = " AND  col.`created_by` = '$created_by' ";
		if( $members_id !== '' ) $members_id = " AND  col.`members_id` = '$members_id' ";

		if( $keyword !== '' ) $keyword = " AND  ( col.`members_name` LIKE '%$keyword%' OR  col.`members_mobile` LIKE '%$keyword%' OR col.`order_id` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' )";

		if( $limit != '' ) $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT col.*, IFNULL(`mp`.`wallet_id`, 0) wallet_id, IFNULL(`mp`.`name`, 'Không xác định') payment_name, IFNULL(mb.`code`, '') code, IFNULL(od.`note`, '') note, od.`hold_date`, od.`url_chung_tu`
					, od.`ship_name`, od.`ship_mobile`, od.`ship_address`, od.`ship_note`
				FROM `collected_orders` as col
				LEFT JOIN $db->tbl_fix`order_".$shop_id."_".date('Y', $to)."` od ON od.`id` = col.`order_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = col.`members_id`
				LEFT JOIN $db_store->tbl_fix`method_payment` mp ON mp.`id` = col.`payment_type`
				WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' 
				AND  col.`shop_id` = '$shop_id'
				AND col.`status` = '1'
				$is_booking
				$created_by 
				$order_type 
				$sqlPayment 
				$sqlTreasurerGroupId
				$sqlTreasurerId
				$members_id 
				$keyword
				ORDER BY `order_created_at` DESC
				$limit";
				
		$result = $db->executeQuery( $sql );
		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){
			
			$collected_payments->set('shop_id', $row['shop_id']);
			$collected_payments->set('order_id', $row['order_id']);
			$row['detail_payment'] = $collected_payments->list_by_order();
			if( $row['payment_type'] == 1 && $row['hold_date'] == 1 ){
				$row['payment_name'] = 'Tổng hợp';
			}
			
			$kq[] = $row;
		}
		mysqli_free_result( $result );
		
		return $kq;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function report_orders_list_by_info( $keyword, $treasurer_group_id, $treasurer_id, $from, $to ){
		global $db, $db_store, $order;

		$shop_id 		= 	$this->get('shop_id');
		$created_by 	= 	$this->get('created_by');
		$payment_type 	= 	$this->get('payment_type');
		$order_type 	= 	$this->get('order_type');
		$is_booking 	= 	$this->get('is_booking');
		$members_id 	= 	$this->get('members_id');

		$sqlPayment = '';
		if( $payment_type != '' ){
			$lPayment = explode( ';', $payment_type );
			foreach ($lPayment as $pt) {
				if( $pt != '' )
					$sqlPayment .= " col.`payment_type` = '$pt' OR ";
			}
			if( $sqlPayment != '' ){
				$sqlPayment = ' AND ('.substr($sqlPayment, 0, -3 ). ')';
			}
		}

		$sqlTreasurerGroupId = '';
		if( $treasurer_group_id != '' ){
			$lTreasurerGroupId = explode( ';', $treasurer_group_id );
			foreach ($lTreasurerGroupId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerGroupId .= " od.`treasurer_group_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerGroupId != '' ){
				$sqlTreasurerGroupId = ' AND ('.substr($sqlTreasurerGroupId, 0, -3 ). ')';
			}
		}
		$sqlTreasurerId = '';
		if( $treasurer_id != '' ){
			$lTreasurerId = explode( ';', $treasurer_id );
			foreach ($lTreasurerId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerId .= " od.`treasurer_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerId != '' ){
				$sqlTreasurerId = ' AND ('.substr($sqlTreasurerId, 0, -3 ). ')';
			}
		}

		if( $is_booking !== '' ) $is_booking = " AND col.`is_booking` = '$is_booking' ";
		if( $order_type !== '' ) $order_type = " AND  col.`order_type` = '$order_type' ";
		if( $created_by !== '' ) $created_by = " AND  col.`created_by` = '$created_by' ";
		if( $members_id !== '' ) $members_id = " AND  col.`members_id` = '$members_id' ";
		if( $keyword !== '' ) $keyword = " AND  ( col.`members_name` LIKE '%$keyword%' OR  col.`members_mobile` LIKE '%$keyword%' OR col.`order_id` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' )";
		
		$sql = "SELECT SUM(IFNULL(nTB.`collected`, 0)) total, mp.`id`, IFNULL(mp.`name`, 'Không xác định') `name` FROM (
					SELECT cp.`payment_type` id , cp.`value` `collected`
					FROM  $db->tbl_fix`collected_payments` cp
					LEFT JOIN $db->tbl_fix`collected_orders` col ON cp.`collected_orders_id` = col.`id`
					LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = col.`members_id`
					LEFT JOIN $db->tbl_fix`order_".$shop_id."_".date('Y', $from)."` od ON od.`id` = col.`order_id`
					WHERE
					'$from' <= cp.`order_created_at` AND cp.`order_created_at` < '$to'
					AND  cp.`shop_id` = '$shop_id'
					AND col.`status` = '1'
					$created_by
					$is_booking
					$sqlPayment
					$sqlTreasurerGroupId
					$sqlTreasurerId
					$order_type
					$members_id
					$keyword
					GROUP BY cp.`order_id`, cp.`payment_type`
				) nTB
				LEFT JOIN $db_store->tbl_fix`method_payment` mp ON mp.`id` = nTB.`id` 
				GROUP BY nTB.`id`
				";

		$kq = $db->executeQuery_list( $sql );

		return $kq;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function report_orders_list_by_count( $keyword, $treasurer_group_id, $treasurer_id, $from, $to ){
		global $db, $db_store, $order;

		$shop_id 		= 	$this->get('shop_id');
		$created_by 	= 	$this->get('created_by');
		$payment_type 	= 	$this->get('payment_type');
		$order_type 	= 	$this->get('order_type');
		$is_booking 	= 	$this->get('is_booking');
		$members_id 	= 	$this->get('members_id');

		$sqlPayment = '';
		if( $payment_type != '' ){
			$lPayment = explode( ';', $payment_type );
			foreach ($lPayment as $pt) {
				if( $pt != '' )
					$sqlPayment .= " col.`payment_type` = '$pt' OR ";
			}
			if( $sqlPayment != '' ){
				$sqlPayment = ' AND ('.substr($sqlPayment, 0, -3 ). ')';
			}
		}

		$sqlTreasurerGroupId = '';
		if( $treasurer_group_id != '' ){
			$lTreasurerGroupId = explode( ';', $treasurer_group_id );
			foreach ($lTreasurerGroupId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerGroupId .= " od.`treasurer_group_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerGroupId != '' ){
				$sqlTreasurerGroupId = ' AND ('.substr($sqlTreasurerGroupId, 0, -3 ). ')';
			}
		}
		$sqlTreasurerId = '';
		if( $treasurer_id != '' ){
			$lTreasurerId = explode( ';', $treasurer_id );
			foreach ($lTreasurerId as $tgi) {
				if( $tgi != '' )
					$sqlTreasurerId .= " od.`treasurer_id` = '$tgi' OR ";
			}
			if( $sqlTreasurerId != '' ){
				$sqlTreasurerId = ' AND ('.substr($sqlTreasurerId, 0, -3 ). ')';
			}
		}
		
		if( $is_booking !== '' ) $is_booking = " AND col.`is_booking` = '$is_booking' ";
		if( $order_type !== '' ) $order_type = " AND  col.`order_type` = '$order_type' ";
		if( $created_by !== '' ) $created_by = " AND  col.`created_by` = '$created_by' ";
		if( $members_id !== '' ) $members_id = " AND  col.`members_id` = '$members_id' ";
		if( $keyword !== '' ) $keyword = " AND  ( col.`members_name` LIKE '%$keyword%' OR  col.`members_mobile` LIKE '%$keyword%' OR col.`order_id` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' )";
		
		$sql = "SELECT COUNT(*) total
				FROM `collected_orders` as col
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = col.`members_id`
				LEFT JOIN $db->tbl_fix`order_".$shop_id."_".date('Y', $from)."` od ON od.`id` = col.`order_id`
				WHERE 
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
				AND  col.`shop_id` = '$shop_id'
				AND col.`status` = '1'
				$is_booking
				$created_by
				$sqlPayment
				$sqlTreasurerGroupId
				$sqlTreasurerId
				$order_type
				$members_id
				$keyword
				";
		
		$result = $db->executeQuery( $sql, 1 );
		
		return $result['total']+0;
	}
	
	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function list_by_members_by_month(){
		global $db, $db_store;
		
		$members_id 	= 	$this->get('members_id');
		$month 			= 	$this->get('month');
		$year 			= 	$this->get('year');
		
		$sql = "SELECT IFNULL(SUM(`sum`), 0) total_revenue, IFNULL(SUM(`discount`), 0) total_discount , IFNULL(SUM(`cost`), 0) total_cost
				FROM $db->tbl_fix`collected_orders` as col
				WHERE '$month' = col.`month` AND col.`year` = '$year' AND col.`is_booking` = '0' AND col.`status` = '1' AND  col.`members_id` = '$members_id' 
				";

		$result = $db->executeQuery( $sql, 1);
		
		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function member_self_revenue( $from, $to ){
		global $db, $db_store;
		
		$members_id 	= 	$this->get('members_id');
		
		$sql = "SELECT IFNULL(SUM(`sum`), 0) total_revenue, IFNULL(SUM(`discount`), 0) total_discount , IFNULL(SUM(`cost`), 0) total_cost
				FROM $db->tbl_fix`collected_orders` as col
				WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' AND col.`status` = '1' AND col.`is_booking` = '0' AND  col.`members_id` = '$members_id' 
				";

		$result = $db->executeQuery( $sql, 1);
		
		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function list_by_referral_by_month( $referral_by ){
		global $db, $db_store;
		
		$month 			= 	$this->get('month');
		$year 			= 	$this->get('year');
		
		$sql = "SELECT IFNULL(SUM(`sum`), 0) total_revenue, IFNULL(SUM(`discount`), 0) total_discount , IFNULL(SUM(`cost`), 0) total_cost
				FROM $db->tbl_fix`collected_orders` as col
				INNER JOIN $db->tbl_fix`members` mb ON mb.user_id = col.members_id
				WHERE '$month' = col.`month` AND col.`year` = '$year' AND col.`is_booking` = '0' AND col.`status` = '1' AND mb.referral_by = '$referral_by' AND mb.referral_by <> ''
				";

		$result = $db->executeQuery( $sql, 1);
		
		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function list_by_members_by_month_field( $field_name, $field_value ){
		global $db, $db_store;

		$month 			= 	$this->get('month');
		$year 			= 	$this->get('year');

		$field = " AND mb.`$field_name` = '$field_value' AND mb.`$field_name` <> '' ";

		$sql = "SELECT
				IFNULL(SUM(`sum`), 0) total_revenue,
				IFNULL(SUM(`discount`), 0) total_discount,
				IFNULL(SUM(`cost`), 0) total_cost
				FROM `collected_orders` as col
				INNER JOIN `members` mb ON mb.`user_id` = col.`members_id`
				LEFT JOIN ".$db_store->tbl_fix."`method_payment` mp ON mp.id = col.payment_type
				WHERE '$month' = col.`month` AND col.`year` = '$year' AND col.`status` = '1' AND col.`is_booking` = '0' $field
				";

		$result = $db->executeQuery( $sql, 1);

		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function list_by_members_by_month_pkd( $field_name, $field_value ){
		global $db, $db_store;

		$month 			= 	$this->get('month');
		$year 			= 	$this->get('year');

		$field = " AND mb.`$field_name` = '$field_value' ";

		$sql = "SELECT
				IFNULL(SUM(`sum`), 0) total_revenue,
				IFNULL(SUM(`discount`), 0) total_discount,
				IFNULL(SUM(`cost`), 0) total_cost
				FROM `collected_orders` as col
				INNER JOIN `members` mb ON mb.`user_id` = col.`members_id`
				LEFT JOIN ".$db_store->tbl_fix."`method_payment` mp ON mp.id = col.payment_type
				WHERE '$month' = col.`month` AND col.`year` = '$year' AND col.`status` = '1' AND col.`is_booking` = '0' $field
				";

		$result = $db->executeQuery( $sql, 1);

		return $result;
	}

	//Filter cho quản lý đơn hàng
	public function filter_booking_order( $keyword, $from, $to, $offset = 0, $limit = '' ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$status_booking 		= 	$this->get('status_booking');

		$from_to = '';
		if( $from > 0 ) 		$from_to = "AND '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'  ";
		if( $keyword != '' ) 	$keyword = "AND ( col.`order_id` LIKE '%$keyword%' OR  col.`members_name` LIKE '%$keyword%' OR  col.`members_mobile` LIKE '%$keyword%' )";
		if( $shop_id != '' ) 	$shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( $limit != '' ) 		$limit = " LIMIT $offset,$limit ";

		$sql = "SELECT col.*
				FROM `collected_orders` as col
				WHERE
				`is_booking` = 1
				AND `status_booking` = '$status_booking'
				AND col.`status` = '1'
				$shop_id
				$from_to
				$keyword
				ORDER BY `order_created_at` DESC
				$limit";

		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}
	
	public function filter_booking_order_info( $keyword, $from, $to ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$status_booking 		= 	$this->get('status_booking');

		$this->set('status_booking', 0);
		$kq['total_record_0'] = $this->filter_booking_order_count_by_status( $keyword, $from, $to );
		$this->set('status_booking', 1);
		$kq['total_record_1'] = $this->filter_booking_order_count_by_status( $keyword, $from, $to );
		$this->set('status_booking', 2);
		$kq['total_record_2'] = $this->filter_booking_order_count_by_status( $keyword, $from, $to );

		return $kq;
	}

	private function filter_booking_order_count_by_status( $keyword, $from, $to ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$status_booking 		= 	$this->get('status_booking');

		$from_to = '';
		if( $from > 0 ) 		$from_to = "AND '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'  ";
		if( $keyword != '' ) 	$keyword = "AND ( col.`order_id` LIKE '%$keyword%' OR  col.`members_name` LIKE '%$keyword%' OR  col.`members_mobile` LIKE '%$keyword%' )";
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";

		$sql = "SELECT COUNT(*) total
				FROM `collected_orders` as col
				WHERE `is_booking` = 1
				AND `status_booking` = '$status_booking'
				AND col.`status` = '1'
				$shop_id
				$from_to
				$keyword";

		$result = $db->executeQuery( $sql, 1 );
		
		return $result['total']+0;
	}
	
	//Báo cáo doanh số bán hàng theo ngày
	public function filter_customer( $keyword, $from, $to, $offset = 0, $limit = ''){
		global $db;

		echo 'Lỗi! Truy vấn dữ liệu H102138';
		exit();

		$shop_id 		= 	$this->get('shop_id');

		if( $keyword != '' ) $keyword = "AND ( col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%' )";
		if( $limit != '' ) $limit = " LIMIT $offset,$limit ";

		$sql = "SELECT col.`members_id`, col.`members_name`, col.`members_mobile`, mb.`code`, COUNT(*) total_orders, col.`created_at`, SUM(col.`no_items`) no_items, SUM(col.`sum`) `sum`, SUM(col.`cash`) `cash`, SUM(col.`card`) `card`, SUM(col.`usd`) `usd`, SUM(col.`debt`) `debt`, SUM(col.`debt_paid`) `debt_paid`
					,SUM( (col.`sum`*(col.`nvkd_commission`/100)) ) as commission, col.`order_id`, col.`shop_id`, col.`order_created_at`
				FROM `collected_orders` as col
				LEFT JOIN `members` mb ON mb.`user_id` = col.`members_id`
				WHERE 
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
				AND  col.`shop_id` = '$shop_id'
				AND col.`status` = '1'
				$keyword
				GROUP BY col.`members_id`
				ORDER BY col.`order_created_at`
				$limit";

		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}
	
	public function filter_customer_info( $keyword, $from, $to ){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		if( $keyword != '' ) $keyword = "AND ( col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%' )";
		
		$sql = "SELECT COUNT(*) total_record, SUM(`sum`) `total_revenue`
				FROM (
					SELECT SUM(col.`sum`) `sum`
					FROM `collected_orders` as col
					WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
					AND  col.`shop_id` = '$shop_id'
					AND col.`status` = '1'
					$keyword
					GROUP BY col.`members_id`
				) nTB
				";
		
		$result = $db->executeQuery( $sql, 1 );
		
		return array( 'total_record' => $result['total_record']+0, 'total_revenue' => $result['total_revenue']+0 );
	}

	//Báo cáo doanh số bán hàng theo ngày
	public function filter_orders( $from, $to ){
		global $db;

		$shop_id 			= 	$this->get('shop_id');
		$members_id 		= 	$this->get('members_id');
		
		if( $shop_id != '' ) $shop_id = " AND  col.`shop_id` = '$shop_id' ";
		if( $members_id != '' ) $members_id = " AND col.`members_id` = '$members_id' ";
		
		$sql = "SELECT col.*
				FROM `collected_orders` as col
				WHERE 
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' 
				AND col.`status` = '1'
				$shop_id
				$members_id
				ORDER BY `order_created_at` DESC";
		
		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	//Danh sách đơn hàng có members
	public function filter_orders_members( $from, $to ){
		global $db;

		$shop_id 			= 	$this->get('shop_id');
		$members_id 		= 	$this->get('members_id');
		
		if( $shop_id != '' ) $shop_id = " AND  col.`shop_id` = '$shop_id' ";
		if( $members_id != '' )
			$members_id = " AND col.`members_id` = '$members_id' ";
		else
			$members_id = " AND col.`members_id` > 0 ";
		
		$sql = "SELECT col.*
				FROM ".$db->tbl_fix."`collected_orders` as col
				WHERE 
				'$from' <= col.`order_created_at` 
				AND col.`order_created_at` < '$to'
				AND col.`status` = '1'
				$shop_id $members_id
				ORDER BY `order_created_at` DESC";

		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	//Danh sách đơn hàng có members
	public function filter_orders_by_type( $from, $to ){

		global $db;

		$shop_id 			= 	$this->get('shop_id');
		$members_id 		= 	$this->get('members_id');
		$type 				= 	$this->get('type');
		$is_divided 		= 	$this->get('is_divided');
		
		if( $type !== '' ) $type = " AND  col.`order_type` = '$type' ";
		if( $is_divided !== '' ) $is_divided = " AND  col.`is_divided` = '$is_divided' ";
		if( $shop_id != '' ) $shop_id = " AND  col.`shop_id` = '$shop_id' ";
		if( $members_id != '' )
			$members_id = " AND col.`members_id` = '$members_id' ";
		else
			$members_id = " AND col.`members_id` > 0 ";

		$sqlPeriod = '';
		if( $from != '' ){
			$sqlPeriod = "AND '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' ";
		}
		
		$sql = "SELECT col.*
				FROM ".$db->tbl_fix."`collected_orders` col
				WHERE col.`status` = '1'
				$sqlPeriod
				$shop_id
				$type 
				$members_id
				$is_divided
				ORDER BY `order_created_at` ASC";

		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	//Danh sách đơn hàng có members
	public function filter_orders_all( $from, $to ){
		global $db;

		$sql = "SELECT col.*
				FROM $db->tbl_fix`collected_orders` as col
				WHERE 
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' 
				AND col.`status` = '1'
				AND col.`order_type` = 0 AND col.`is_internal` = 0
				ORDER BY `order_created_at` DESC";

		return $db->executeQuery_list( $sql );

	}

	//Danh sách đơn hàng có members không có đơn cashback
	public function filter_orders_all_without_cashback( $from, $to ){
		global $db, $setup;

		$is_divided = $this->get('is_divided');

		$sqlDivided = '';
		if( $is_divided != '' ){
			$sqlDivided = "AND col.`is_divided` = '$is_divided' ";
		}
		
		$payment_type_wallet_cashback = !isset($setup['payment_type_wallet_cashback']) ? -100:$setup['payment_type_wallet_cashback'];
		
		$sql = "SELECT col.*
				FROM $db->tbl_fix`collected_orders` as col
				LEFT JOIN (
						SELECT col.`collected_orders_id`, col.`payment_type`
						FROM $db->tbl_fix`collected_payments` col
						WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to'
						AND col.`payment_type` = '$payment_type_wallet_cashback'
					) tCashback ON tCashback.`collected_orders_id` = col.`id`
				WHERE 
				'$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' AND col.`order_created_at` > 1625245200
				AND col.`status` = '1'
				AND col.`order_type` = 0 AND col.`is_internal` = 0
				AND tCashback.`payment_type` IS NULL
				$sqlDivided
				ORDER BY `order_created_at` DESC";//col.`order_created_at` > 1625072400 => hàm này được áp dựng từ ngày 01/07/2021

		return $db->executeQuery_list( $sql );
		
	}

	//liệt kê order: cho ast network tính hoa hồng
	public function filter_ast_day( $from, $to ){
		global $db;

		$sql = "SELECT col.`id`, col.`day`, col.`month`, col.`year`, col.`quarter`, col.`no_items`, col.`sum`, col.`order_id`, col.`order_created_at`, col.`shop_id`, col.`members_id`, mb.`fullname`, mb.`mobile`, mb.`member_group_id`, mb.`referral_by`
				FROM `collected_orders` as col
				INNER JOIN `members` mb ON mb.`user_id` = col.`members_id`
				WHERE '$from' <= col.`order_created_at` AND col.`order_created_at` < '$to' AND col.`status` = '1' AND `members_id` > 0
				ORDER BY col.`order_created_at` ASC";
		
		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	//Liệt kê danh sách đơn hàng của 1 user
	public function filter_order_by_members( $keyword, $offset = 0, $limit = '' ){
		global $db, $order;
		
		$commission_coaching = new commission_coaching();

		$shop_id 				= 	$this->get('shop_id');
		$is_booking 			= 	$this->get('is_booking');
		$members_id 			= 	$this->get('members_id');
		$created_by_client_id 	= 	$this->get('created_by_client_id');

		$sql_is_booking = '';
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( isset($is_booking) ) $sql_is_booking = " AND col.`is_booking` = '$is_booking'  ";

		$sqlMember = '';
		if( $members_id != '' ){
			if( $created_by_client_id != '' )
				$sqlMember = " AND ( col.`members_id` = '$members_id' OR col.`created_by_client_id` = '$created_by_client_id'  )  ";
			else
				$sqlMember = " AND col.`members_id` = '$members_id'  ";
		}else{
			if( $created_by_client_id != '' ) $sqlMember = " AND col.`created_by_client_id` = '$created_by_client_id'  ";
		}

		if( $keyword != '' )
			$keyword = "AND col.`order_id` LIKE '%$keyword' ";
		
		if( $limit != '' ) $limit = "LIMIT $offset, $limit";

		$sql = "SELECT col.`order_id` id, col.`hour`, col.`day`, col.`month`, col.`year`, col.`quarter`, col.`no_items`, col.`total_paid`,
				col.`order_id`, col.`order_created_at`, col.`sum`, col.`cash`, col.`card`, col.`usd`, col.`debt`, col.`debt_paid`, 
				col.`other`, col.`discount`, col.`is_booking`, col.`status_booking`, col.`is_returned_order`, col.`nvkd_id`, col.`nvkd_commission`, 
				col.`shop_id`, col.`created_at`, col.`created_by`, col.`payment_type`, col.`members_id`, col.`members_name`, col.`members_mobile`, 
				col.`order_type`, col.`is_internal`, col.`export_for_wh_id`, col.`is_official_member`, col.`created_by_client_id`, 
				col.`service_fee`, col.`pro_allow_commission`, col.`pro_allow_commission_value`, col.`pro_allow_commission_percent`, col.`status`, shop.`name` shop_name
				FROM " . $db->tbl_fix . "`collected_orders` as col
				LEFT JOIN " . $db->tbl_fix . "`shop` ON shop.`id` = col.`shop_id`
				WHERE 1
				AND col.`status` = '1'
				$sqlMember
				$shop_id
				$sql_is_booking
				$keyword
				ORDER BY `order_created_at` DESC
				$limit";
					
		if( $is_booking == 1 ){

			$rs = $db->executeQuery( $sql );
			$result = array();
			while( $row = mysqli_fetch_assoc($rs) ){
				$order->set('id', $row['order_id']);
				$order->set('created_at', $row['order_created_at']);
				$order->set('shop_id', $row['shop_id']);
				$row['is_completed_booking'] 	= $order->checking_is_booking_completed();
				
				$ship_address 	= $order->get_ship_address_by_order_id($row['shop_id'], $row['order_id'], $row['order_created_at']);
				$row['ship_mobile'] = $ship_address['mobile_customer'];
				$row['ship_name'] = $ship_address['name_customer'];
				$row['ship_address'] = $ship_address['ship_address'];


				$row['commission_coaching'] = 0;

				if( $members_id != '' ){
					$commission_coaching->set('client_id', $members_id);
					$commission_coaching->set('shop_id', $row['shop_id']);
					$commission_coaching->set('order_id', $row['order_id']);
					$row['commission_coaching'] 	= $commission_coaching->get_commission_by_client();//Lấy hoa hồng dựa vào bản tính sẵn; phải sau day +1 mới có kết quả
				}

				$result[] = $row;
			}
			
		}else{
			$rs = $db->executeQuery( $sql );
			$result = array();
			while( $row = mysqli_fetch_assoc($rs) ){
				
				$ship_address 	= $order->get_ship_address_by_order_id($row['shop_id'], $row['order_id'], $row['order_created_at']);
				$row['ship_mobile'] = $ship_address['mobile_customer'];
				$row['ship_name'] = $ship_address['name_customer'];
				$row['ship_address'] = $ship_address['ship_address'];
				
				$result[] = $row;
			}
		}
		
		return $result;
	}

	public function filter_order_by_members_count( $keyword ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$is_booking 			= 	$this->get('is_booking');
		$members_id 			= 	$this->get('members_id');
		$created_by_client_id 	= 	$this->get('created_by_client_id');
		
		$sql_is_booking = '';
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( $is_booking != '' && $is_booking == 1 ){
			$is_booking = " AND col.`is_booking` = '1' ";
		 }elseif($is_booking != '' && $is_booking == 0){
			$is_booking = " AND col.`is_booking` = '0' ";
		 }else{
			$is_booking = " AND col.`is_booking` = '$is_booking'  ";
		 } //$is_booking = " AND col.`is_booking` = '$is_booking'  ";
		
		$sqlMember = '';
		if( $members_id != '' ){
			if( $created_by_client_id != '' )
				$sqlMember = " AND ( col.`members_id` = '$members_id' OR col.`created_by_client_id` = '$created_by_client_id'  )  ";
			else
				$sqlMember = " AND col.`members_id` = '$members_id'  ";
		}else{
			if( $created_by_client_id != '' ) $sqlMember = " AND col.`created_by_client_id` = '$created_by_client_id'  ";
		}

		if( $keyword != '' )
			$keyword = "AND col.`order_id` LIKE '%$keyword' ";

		$sql = "SELECT COUNT(*) total
				FROM `collected_orders` as col
				WHERE 1
				AND col.`status` = '1'
				$sqlMember
				$shop_id
				$is_booking
				$keyword
				ORDER BY `order_created_at` DESC";
				
		$result = $db->executeQuery( $sql , 1 );
		
		return $result['total'];
	}

	public function filter_order_by_members_info( $keyword ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$is_booking 			= 	$this->get('is_booking');
		$members_id 			= 	$this->get('members_id');
		$created_by_client_id 	= 	$this->get('created_by_client_id');

		$sql_is_booking = '';
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( $is_booking != '' ) $is_booking = " AND col.`is_booking` = '$is_booking'  ";

		$sqlMember = '';
		if( $members_id != '' ){
			if( $created_by_client_id != '' )
				$sqlMember = " AND ( col.`members_id` = '$members_id' OR col.`created_by_client_id` = '$created_by_client_id'  )  ";
			else
				$sqlMember = " AND col.`members_id` = '$members_id'  ";
		}else{
			if( $created_by_client_id != '' ) $sqlMember = " AND col.`created_by_client_id` = '$created_by_client_id'  ";
		}

		if( $keyword != '' )
			$keyword = "AND col.`order_id` LIKE '%$keyword' ";

		$sql = "SELECT COUNT(*) total_record, SUM(`sum`) total_value, SUM(`discount`) total_discount
				FROM `collected_orders` as col
				WHERE 1 
				AND col.`status` = '1'
				$sqlMember
				$shop_id
				$is_booking
				$keyword
				ORDER BY `order_created_at` DESC";
		
		$result = $db->executeQuery( $sql , 1 );
		
		return $result;
	}

		//Liệt kê danh sách đơn hàng của 1 user
	public function filter_showroom_export( $keyword = '', $offset = 0, $limit = '' ){
		global $db, $order;

		$commission_coaching = new commission_coaching();

		$shop_id 				= 	$this->get('shop_id');
		$is_booking 			= 	$this->get('is_booking');
		$members_id 			= 	$this->get('members_id');
		$created_by_client_id 	= 	$this->get('created_by_client_id');

		$sql_is_booking = '';
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( $is_booking != '' ) $sql_is_booking = " AND col.`is_booking` = '$is_booking'  ";

		$sqlMember = '';
		if( $members_id != '' ){
			if( $created_by_client_id != '' )
				$sqlMember = " AND ( col.`members_id` = '$members_id' OR col.`created_by_client_id` = '$created_by_client_id'  )  ";
			else
				$sqlMember = " AND col.`members_id` = '$members_id'  ";
		}else{
			if( $created_by_client_id != '' ) $sqlMember = " AND col.`created_by_client_id` = '$created_by_client_id'  ";
		}
		
		if( $limit != '' ) $limit = "LIMIT $offset, $limit";

		$sql = "SELECT col.`order_id` id, col.`hour`, col.`day`, col.`month`, col.`year`, col.`quarter`, col.`no_items`, col.`total_paid`,
				col.`order_id`, col.`order_created_at`, col.`sum`, col.`cash`, col.`card`, col.`usd`, col.`debt`, col.`debt_paid`, 
				col.`other`, col.`discount`, col.`is_booking`, col.`status_booking`, col.`is_returned_order`, col.`nvkd_id`, col.`nvkd_commission`, 
				col.`shop_id`, col.`created_at`, col.`created_by`, col.`payment_type`, col.`members_id`, col.`members_name`, col.`members_mobile`, 
				col.`order_type`, col.`is_internal`, col.`export_for_wh_id`, col.`is_official_member`, col.`created_by_client_id`, 
				col.`service_fee`, col.`pro_allow_commission`, col.`pro_allow_commission_value`, col.`pro_allow_commission_percent`, col.`status`, shop.`name` shop_name
				FROM " . $db->tbl_fix . "`collected_orders` as col
				LEFT JOIN " . $db->tbl_fix . "`shop` ON shop.`id` = col.`shop_id`
				WHERE
				col.`status` = '1'
				AND col.`order_type` = '4'
				$sqlMember
				$shop_id
				$sql_is_booking
				ORDER BY `order_created_at` DESC
				$limit";
				
		if( $is_booking == 1 ){

			$rs = $db->executeQuery( $sql );
			$result = array();
			while( $row = mysqli_fetch_assoc($rs) ){
				$order->set('id', $row['order_id']);
				$order->set('created_at', $row['order_created_at']);
				$order->set('shop_id', $row['shop_id']);
				$row['is_completed_booking'] 	= $order->checking_is_booking_completed();
				
				$ship_address 	= $order->get_ship_address_by_order_id($row['shop_id'], $row['order_id'], $row['order_created_at']);
				$row['ship_mobile'] = $ship_address['mobile_customer'];
				$row['ship_name'] = $ship_address['name_customer'];
				$row['ship_address'] = $ship_address['ship_address'];


				$row['commission_coaching'] 	= 0;

				if( $members_id != '' ){
					$commission_coaching->set('client_id', $members_id);
					$commission_coaching->set('shop_id', $row['shop_id']);
					$commission_coaching->set('order_id', $row['order_id']);
					$row['commission_coaching'] 	= $commission_coaching->get_commission_by_client();//Lấy hoa hồng dựa vào bản tính sẵn; phải sau day +1 mới có kết quả
				}

				$result[] = $row;
			}
			
		}else{
			$rs = $db->executeQuery( $sql );
			$result = array();
			while( $row = mysqli_fetch_assoc($rs) ){
				
				$ship_address 	= $order->get_ship_address_by_order_id($row['shop_id'], $row['order_id'], $row['order_created_at']);
				$row['ship_mobile'] = $ship_address['mobile_customer'];
				$row['ship_name'] = $ship_address['name_customer'];
				$row['ship_address'] = $ship_address['ship_address'];

				$result[] = $row;
			}
		}
		
		return $result;
	}

	public function filter_showroom_export_info( $keyword = '' ){
		global $db;

		$shop_id 				= 	$this->get('shop_id');
		$is_booking 			= 	$this->get('is_booking');
		$members_id 			= 	$this->get('members_id');
		$created_by_client_id 	= 	$this->get('created_by_client_id');

		$sql_is_booking = '';
		if( $shop_id != '' ) $shop_id = " AND col.`shop_id` = '$shop_id'  ";
		if( $is_booking != '' ) $is_booking = " AND col.`is_booking` = '$is_booking'  ";

		$sqlMember = '';
		if( $members_id != '' ){
			if( $created_by_client_id != '' )
				$sqlMember = " AND ( col.`members_id` = '$members_id' OR col.`created_by_client_id` = '$created_by_client_id'  )  ";
			else
				$sqlMember = " AND col.`members_id` = '$members_id'  ";
		}else{
			if( $created_by_client_id != '' ) $sqlMember = " AND col.`created_by_client_id` = '$created_by_client_id'  ";
		}

		$sql = "SELECT COUNT(*) total_record, SUM(`sum`) total_value
				FROM `collected_orders` as col
				WHERE
				col.`status` = '1'
				AND col.`order_type` = '4'
				$sqlMember
				$shop_id
				$is_booking
				ORDER BY `order_created_at` DESC";
		
		$result = $db->executeQuery( $sql , 1 );
		
		return $result;
	}

	public function update_status_booking(){//update status_booking field : = 0 not yet delivery; =1 delivery some; = 2 done deliveried
		global $db;

		$shop_id 				= $this->get('shop_id');
		$order_id 				= $this->get('order_id');
		$order_created_at 		= $this->get('order_created_at');
		$status_booking 		= $this->get('status_booking');

		$arr['status_booking']		= $status_booking;
		
		$db->record_update( $db->tbl_fix."`collected_orders`", $arr ," `order_id` = '$order_id' AND  `shop_id` = '$shop_id'  AND  `is_booking` = '1' ");

		return true;
	}

	public function update_delivery_status()
	{
		global $db;

		$shop_id 				= $this->get('shop_id');
		$order_id 				= $this->get('order_id');
		$arr['status'] 			= $this->get('status');

		$db->record_update($db->tbl_fix .$this->class_name, $arr, " `shop_id` = '$shop_id' AND `order_id` = '$order_id' AND `status` <> 1 ");
		
		return true;
	}

	public function update_status_order()
	{
		global $db;

		$shop_id 				= $this->get('shop_id');
		$order_id 				= $this->get('order_id');

		$arr['status'] 			= $this->get('status');
		$arr['is_booking'] 		= $this->get('is_booking');
		$arr['order_type'] 		= $this->get('order_type');

		$db->record_update($db->tbl_fix .$this->class_name, $arr, " `shop_id` = '$shop_id' AND `order_id` = '$order_id' AND `status` <> 1 ");
		
		return true;
	}

	public function update_booking(){
		global $db;

		$id 					= $this->get('id');

		$arr['status'] 			= 1;
		$arr['is_booking'] 		= 1;
		$arr['status_booking'] 	= 1;
		$arr['order_type'] 		= $this->get('order_type');

		$db->record_update( $db->tbl_fix."`collected_orders`", $arr, " `id` = '$id' ");

		return true;
	}

	public function update_status(){//update status đơn hàng thành công
		global $db;

		// $shop_id 				= $this->get('shop_id');
		$order_id 				= $this->get('order_id');
		$status 				= $this->get('status');
		
		$arr['status']		= $status;
		
		$db->record_update( $db->tbl_fix."`collected_orders`", $arr ," `order_id` = '$order_id'");

		return true;
	}

	public function update_is_divided(){//Cập nhật đã chia điểm cho đơn
		global $db;

		$id 					= $this->get('id');
		$arr['is_divided']		= $this->get('is_divided');
		
		$db->record_update( $db->tbl_fix."`collected_orders`", $arr ," `id` = '$id'");
		return true;
	}

	/*
	- BEGIN For report summary: doanh thu bán hàng hay Báo Cáo Tài Chính
	*/

	//
	public function doanh_thu_ban_hang( $type ){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$year 			= 	$this->get('year');
		
		$groupby = "GROUP BY col.`year`";
		if( $type == 'month' )
			$groupby = "GROUP BY col.`month`";
		else if( $type == 'quarter' )
			$groupby = "GROUP BY col.`quarter`";

		$sql = "SELECT SUM(`sum`+`discount`) total, quarter, `month`
				FROM `collected_orders` as col
				WHERE `shop_id` = '$shop_id' AND `year` = '$year'  AND col.`status` = '1' AND `is_returned_order` = '0' AND `is_booking` = '0'
				$groupby
				ORDER BY `order_created_at`";
		
		$result = $db->executeQuery_list( $sql );
		
		$kq = array();
		if( $type == 'month' ){
			for( $i = 1; $i < 13; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( ($item['month']+0) == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else if( $type == 'quarter' ){
			for( $i = 1; $i < 5; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( $item['quarter'] == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else{
			if( is_array($result) && COUNT($result) > 0 )
				$kq[]  = $result[0]['total'];
			else 
				$kq[]  = 0;
		} 

		return $kq;
	}

	//
	public function gia_von_hang_ban( $type ){
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$year 			= 	$this->get('year');
		
		$groupby = "GROUP BY col.`year`";
		if( $type == 'month' )
			$groupby = "GROUP BY col.`month`";
		else if( $type == 'quarter' )
			$groupby = "GROUP BY col.`quarter`";

		$sql = "SELECT SUM(`cost`) total, quarter, `month`
				FROM `collected_orders` as col
				WHERE `shop_id` = '$shop_id' AND `year` = '$year' AND col.`status` = '1' AND `is_returned_order` = '0' AND `is_booking` = '0'
				$groupby
				ORDER BY `order_created_at`";
		
		$result = $db->executeQuery_list( $sql );
		
		$kq = array();
		if( $type == 'month' ){
			for( $i = 1; $i < 13; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( ($item['month']+0) == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else if( $type == 'quarter' ){
			for( $i = 1; $i < 5; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( $item['quarter'] == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else{
			if( is_array($result) && COUNT($result) > 0 )
				$kq[]  = $result[0]['total'];
			else 
				$kq[]  = 0;
		} 

		return $kq;
	}

	//
	public function chiec_khau_hoa_don( $type ){//Giảm giá trên hóa đơn
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$year 			= 	$this->get('year');
		
		$groupby = "GROUP BY col.`year`";
		if( $type == 'month' )
			$groupby = "GROUP BY col.`month`";
		else if( $type == 'quarter' )
			$groupby = "GROUP BY col.`quarter`";

		$sql = "SELECT SUM(`discount`) total, quarter, `month`
				FROM `collected_orders` as col
				WHERE `shop_id` = '$shop_id' AND `year` = '$year' AND col.`status` = '1'  AND `is_returned_order` = '0' AND `is_booking` = '0'
				$groupby
				ORDER BY `order_created_at`";
		
		$result = $db->executeQuery_list( $sql );
		
		$kq = array();
		if( $type == 'month' ){
			for( $i = 1; $i < 13; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( ($item['month']+0) == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else if( $type == 'quarter' ){
			for( $i = 1; $i < 5; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( $item['quarter'] == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else{
			if( is_array($result) && COUNT($result) > 0 )
				$kq[]  = $result[0]['total'];
			else 
				$kq[]  = 0;
		} 
		
		return $kq;
	}

	//
	public function gia_tri_hang_bi_tra( $type ){//Giảm giá trên hóa đơn
		global $db;

		$shop_id 		= 	$this->get('shop_id');
		$year 			= 	$this->get('year');
		
		$groupby = "GROUP BY col.`year`";
		if( $type == 'month' )
			$groupby = "GROUP BY col.`month`";
		else if( $type == 'quarter' )
			$groupby = "GROUP BY col.`quarter`";

		$sql = "SELECT abs(SUM(`sum` + `discount`)) total, quarter, `month`
				FROM `collected_orders` as col
				WHERE `shop_id` = '$shop_id' AND `year` = '$year' AND col.`status` = '1' AND `is_returned_order` = '1' AND `is_booking` = '0'
				$groupby
				ORDER BY `order_created_at`";
		
		$result = $db->executeQuery_list( $sql );
		
		$kq = array();
		if( $type == 'month' ){
			for( $i = 1; $i < 13; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( ($item['month']+0) == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else if( $type == 'quarter' ){
			for( $i = 1; $i < 5; $i++ ){
				$val = 0;
				foreach ($result as $key => $item) {
					if( $item['quarter'] == $i ){
						$val = $item['total'];
					}
				}
				$kq[]  = $val;
			}
		}else{
			if( is_array($result) && COUNT($result) > 0 )
				$kq[]  = $result[0]['total'];
			else 
				$kq[]  = 0;
		} 
		
		return $kq;
	}

	/*
	- END For report summary: doanh thu bán hàng hay Báo Cáo Tài Chính
	*/

	// tungcode

	// lấy tổng tiền hóa đơn trừ điểm khách hàng hủy đơn
	public function get_detail_point(){
		global $db;

		$shop_id		= 	$this->get('shop_id');
		$order_id		= 	$this->get('order_id');
		
		$sql = "SELECT `sum` FROM $db->tbl_fix`collected_orders` WHERE `order_id` = '$order_id' AND `shop_id` = '$shop_id' ";

		$result = $db->executeQuery( $sql, 1 );
		
		return $result['sum'];
	}

	public function payments_info(){//để chuyển dữ liệu cũ thành dữ liệu mới
		global $db;
		$liabilities_history = new liabilities_history();
		$collected_payments = new collected_payments();
		$order = new order();
		
		$sql = "SELECT * FROM `collected_orders` ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		while( $item = mysqli_fetch_assoc($result) ){
			if( $item['order_created_at'] < strtotime("09/25/2020") ){
				/**
				 * BEGIN phân loại hình thức thanh toán vào bảng riêng
				 */
				$collected_payments->set('shop_id', $item['shop_id']);
				$collected_payments->set('order_id',  $item['order_id']);
				$collected_payments->set('order_created_at', $item['order_created_at']);
				$collected_payments->set('collected_orders_id', $item['id']);
				$collected_payments->delete_by_order();
				
				if( $item['payment_type'] == 1 ){

					
					$dOrder = $order->get_detail( $item['shop_id'], $item['order_id'], $item['order_created_at']);
					if( isset( $dOrder['id']) && $dOrder['liabilities_id'] > 0 &&  $dOrder['hold_date'] == 1 ){
						$sum = $item['sum'];
						//hình thức tổng hợp
						$liabilities_history->set('liabilities_id', $dOrder['liabilities_id']);
						$detail_payment = $liabilities_history->list_by_liabilities_id();
						foreach($detail_payment as $ssss ){
							$collected_payments->set('payment_type', $ssss['payment_type']);
							$collected_payments->set('value', $ssss['collected'] );
							$collected_payments->add();
							$sum -= $ssss['collected'];
						}

						if( $sum > 0 ){
							$collected_payments->set('payment_type', 1);
							$collected_payments->set('value', $sum );
							$collected_payments->add();
						}

					}else{
						$collected_payments->set('payment_type', 1);
						$collected_payments->set('value', $item['debt'] );
						$collected_payments->add();
					}


				}else{
					if( $item['cash'] > 0 ){//Tiền mặt
						$collected_payments->set('payment_type', 0);
						$collected_payments->set('value', $item['cash'] );
						$collected_payments->add();
					}

					// if( $item['debt'] > 0 ){//Công nợ
					// 	$collected_payments->set('payment_type', 1);
					// 	$collected_payments->set('value', $item['debt'] );
					// 	$collected_payments->add();
					// }

					if( $item['usd'] > 0 ){//USD
						$collected_payments->set('payment_type', 2);
						$collected_payments->set('value', $item['debt'] );
						$collected_payments->add();
					}

					if( $item['card'] > 0 ){//Thẻ
						$collected_payments->set('payment_type', 3);
						$collected_payments->set('value', $item['card'] );
						$collected_payments->add();
					}

					if( $item['other'] > 0 ){//Thẻ
						$collected_payments->set('payment_type', 4);
						$collected_payments->set('value', $item['other'] );
						$collected_payments->add();
					}
				}

				/**
				 * END phân loại hình thức thanh toán vào bảng riêng
				 */
			}
		}

		return true;

	}

	//Cập nhật giá trị cashback cho khách hàng: nếu có
	public function update_cashback(){
		//Chỉ update khi khách hàng có member group và giá trị cashback
		global $db, $detail_order;
		$members = new members();

		$shop_id		= 	$this->get('shop_id');
		$order_id		= 	$this->get('order_id');

		$dCollOrder = $this->get_detail_by_order_id();

		if( isset($dCollOrder['id']) && $dCollOrder['members_id'] > 0 ){

			$members->set('user_id', $dCollOrder['members_id']);
			$dMember = $members->get_detail();

			if( isset($dMember['user_id']) && $dMember['member_group_id'] > 0 ){

				// $l = $detail_order->listby_order_with_cashback_value($shop_id, $order_id, $dCollOrder['order_created_at'],$dMember['member_group_id']);
				$l = $detail_order->listby_order($shop_id, $order_id, $dCollOrder['order_created_at'] );
				
				$cashback_total = 0;
				// foreach( $l as $item ){
				// 	//update cho từng item trong đơn hàng

				// 	$detail_order->set( 'id', $item['id'] );
				// 	$detail_order->set( 'date_add', $item['date_add'] );
				// 	$detail_order->set( 'cashback_value', $item['value'] );
				// 	$detail_order->set( 'cashback_is_value', $item['is_value'] );
				// 	$detail_order->update_cashback( $shop_id );

				// 	if( $item['is_value'] == 1 ){
				// 		$cashback_total += $item['quantity']*$item['value'];
				// 	}else{
				// 		$cashback_total += $item['quantity']*$item['price']*( $item['value']/100);
				// 	}
				// }
				$percent = 0;
				if( $dMember['member_level_id'] == 1){
					$percent = 0;
				}else if( $dMember['member_level_id'] == 2){
					$percent = 10;
				}else if( $dMember['member_level_id'] == 3){
					$percent = 15;
				}else if( $dMember['member_level_id'] == 4){
					$percent = 20;
				}
				
				if( $percent > 0 ){
					foreach( $l as $item ){
						//update cho từng item trong đơn hàng
						if( $item['product_id'] > 0 )
							$cashback_total += $item['quantity']*$item['price']*( $percent/100);
					}
				}

				//update cho order và cho collected_orders
				$arr['cashback_total'] = $cashback_total;
				$db->record_update( $db->tbl_fix."`collected_orders`", $arr, " `id` = '".$dCollOrder['id']."' " );
				$db->record_update( $db->tbl_fix."`order_".$shop_id."_".date('Y', $dCollOrder['order_created_at'])."`", $arr, " `id` = '".$dCollOrder['order_id']."' " );
				
				return true;
			}
		}
		
		return false;
	}

	public function report_selling_sum( $keyword = '', $from, $to ){
        global $db, $main;
        
        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');

        $sqlClient = '';
        if( $client_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }

		$sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $sql = "SELECT COUNT(*) total_record, 
						SUM(`sum`) `total_revenue`,
						SUM(`cost`) `total_cost`,
						SUM(`discount`) `total_discount`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE  
                '$from' < `created_at` AND `created_at` < '$to'
                $sqlClient
                $sqlShop";

        $kq = $db->executeQuery( $sql, 1 );

		return $kq;
    }

	//HC: 210603
	public function client_self_revenue( $keyword, $from, $to, $offset ='', $limit ='' ){
        global $db, $main;
        
        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');

        $sqlClient = '';
        if( $members_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }
		
        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

		if( $limit != '' ) $limit = " LIMIT $offset, $limit";

		if( $keyword != '' ) 
			$keyword = "AND ( com.`members_name` LIKE '%$keyword%' 
								OR  com.`members_mobile` LIKE '%$keyword%' 
								OR  com.`order_id` LIKE '%$keyword%' 
								)";

        $sql = "SELECT SUM(`sum`+ `discount`) `total_order_real`, `sum` `total_order`, `discount`, `order_id` `id`, `shop_id`, `members_id`, `members_name`, `members_mobile`, com.`order_created_at` created_at
                FROM $db->tbl_fix`$this->class_name` com
                WHERE '$from' < com.`created_at` AND  com.`created_at` < '$to'
				AND	com.`status` = '1'
				AND	com.`order_type` = '0'
                $sqlClient
                $sqlShop
				$keyword
				GROUP BY `order_id`
                ORDER BY `created_at` DESC
				$limit";

        $kq = $db->executeQuery_list( $sql );

        return $kq;
		
    }

	//HC: 210603
	public function client_self_revenue_sum( $keyword, $from, $to ){
        global $db, $main;
        
        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');

        $sqlClient = '';
        if( $members_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

		if( $keyword != '' ) 
			$keyword = "AND ( com.`members_name` LIKE '%$keyword%' 
								OR  com.`members_mobile` LIKE '%$keyword%' 
								OR  com.`order_id` LIKE '%$keyword%' 
								)";

        $sql = "SELECT COUNT(*) total_record, IFNULL(SUM(`sum`+ `discount`), 0) `total_value`, IFNULL(SUM(`sum`+ `discount`), 0) `total_order_real`, IFNULL(SUM(`sum`), 0) `total_order`, IFNULL(SUM(`discount`), 0) `total_discount` 
                FROM $db->tbl_fix`$this->class_name` com
                WHERE '$from' < com.`created_at` AND  com.`created_at` < '$to'
				AND	com.`status` = '1'
				AND	com.`order_type` = '0'
                $sqlClient
                $sqlShop
				$keyword";
	
        $kq = $db->executeQuery( $sql, 1 );

        return $kq;
		
    }

	//HuanCoder Created: 21/05/2021
    public function chart_data_type( $type_chart = 'day' ){
        if( $type_chart == 'quarter' ){
            return $this->chart_data_by_quarter();
        }elseif( $type_chart == 'month' ){
            return $this->chart_data_by_month();
        }else{
            //day
            return $this->chart_data_by_day();
        }
    }

    public function chart_data_by_day(){
        global $db, $main;
        
        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');

        $sqlClient = '';
        if( $members_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $start_time = $ck_start_time = strtotime( date('m/d/Y', time() - 30*86400 ) );

        $sql = "SELECT SUM(`sum`+ `discount`) `y`, CONCAT(`day`, '/', `month`, '/', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE  
                `created_at` > '$start_time' 
				AND	com.`status` = '1'
				AND	com.`order_type` = '0'
                $sqlClient
                $sqlShop
                GROUP BY `day`, `month`, `year`
                ORDER BY `created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'day');

        return $kq;
		
    }

    public function chart_data_by_month(){
        global $db, $main;

        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');

        $sqlClient = '';
        if( $members_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $start_time = $ck_start_time = strtotime( date('m/01/Y', time() - 334*86400 ) );

        $sql = "SELECT SUM(`sum`+ `discount`) `y`, CONCAT(`month`, '/', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE `created_at` > '$start_time'
				AND	com.`status` = '1'
				AND	com.`order_type` = '0'
                $sqlClient
                $sqlShop
                GROUP BY `month`, `year`
                ORDER BY `created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'month');

        return $kq;
    }

    public function chart_data_by_quarter(){
        global $db, $main;

        $members_id          	= $this->get('members_id');
		$shop_id          		= $this->get('shop_id');
		
        $sqlClient = '';
        if( $members_id != '' ){
            $sqlClient = "AND `members_id` = '$members_id'";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $unixtimeQuater = $main->getUnixtimeTheQuater(strtotime("-1 year"));
        $start_time = $ck_start_time = $unixtimeQuater['start_time'];

        $sql = "SELECT SUM(`sum`+ `discount`) `y`, CONCAT('Quí ', `quarter`, ' ', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE 
                `created_at` > '$start_time'
				AND	com.`status` = '1'
				AND	com.`order_type` = '0'
                $sqlClient
                $sqlShop
                GROUP BY `quarter`, `year`
                ORDER BY `created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'quarter');

        return $kq;
    }

}
$collected_orders = new collected_orders();

// $collected_orders->filter_orders_all( strtotime("07/01/2020"), strtotime("07/31/2020") + 86400 );