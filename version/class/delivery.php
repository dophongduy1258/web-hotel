<?php
class delivery extends model
{

	protected $class_name = 'delivery';
	protected $id;
	protected $shipper_id; //members_id nhưng là loại giao hàng
	protected $order_id;
	protected $order_created_at;
	protected $shop_id;
	protected $shipper_status; //shipper cập nhật trạng thái đơn: =0 đã nhận giao; 1 đã nhận đơn giao; =2 đang giao = 3 đã giao hoàn tất,
	// =-1 showroom không nhận giao Chờ xác nhận tab; = -2 showroom bấm khách hủy; = -3 Showroom nhận rồi nhưng từ chối giao; = -4 đơn tự động luân chuyển
	/**
	 * Delivery:
	 * 0 chờ xác nhận
	 *	1 cần giao
	 *	2 đang giao
	 *	3 hoàn thành
	 *	-2 khách hủy

	 * Chỉ có trong deilviery history
	 *	-1 từ chối     (tab không nhận giao)
	 *	-3 nhận rồi từ chối.  (tab không nhận giao)
	 *	-4 sau 15p không nhận hệ thống hủy (tab không nhận giao)
	 */
	protected $customer_id; //khách hàng xác nhận trạng thái đơn
	protected $customer_status; //khách hàng xác nhận trạng thái đơn
	protected $fee;
	protected $note;
	protected $is_delivery;
	protected $created_at;
	protected $viewed;

	protected $confirm_code; //Mã xác nhận đơn thành công	=> luu base64
	protected $confirm_by; //Người xác nhận đơn thành công: client_id or user_id	
	protected $confirm_type; //Loại: KH, SHOWROOM, CARRIER
	protected $ship_code; //Mã vận chuyển của đối tác vận chuyển	
	protected $carrier; //Đối tác vận chuyển hàng hóa
	protected $is_convert; //=0 là đơn bình thường; = 1 là đơn chuyển điểm vào ví chính

	public function add()
	{
		global $db, $main;

		$arr['shipper_id'] = $this->get('shipper_id') + 0;
		$arr['order_id'] = $this->get('order_id');
		$arr['order_created_at'] = $this->get('order_created_at');
		$arr['shop_id'] = $this->get('shop_id');
		$arr['shipper_status'] = 0;
		$arr['customer_id'] = $this->get('customer_id');
		$arr['customer_status'] = 0;
		$arr['fee'] = $this->get('fee');
		$arr['note'] = '';
		$arr['is_delivery'] = $this->get('is_delivery')+0;
		$arr['created_at'] = time();
		$arr['viewed'] = 0;

		$arr['confirm_code'] 	= base64_encode(strtoupper($main->randString(3)));
		$arr['confirm_by'] 		= 0;
		$arr['confirm_type'] 	= '';
		$arr['ship_code'] 		= '';
		$arr['carrier'] 		= 0;
		$arr['is_convert'] 		= $this->get('is_convert') == '' ? 0:$this->get('is_convert');

		$db->record_insert($this->class_name, $arr);

		return $db->mysqli_insert_id();
	}

	public function update_shipper_status()
	{
		global $db;

		$id = $this->get('id');
		$arr['shipper_status'] = $this->get('shipper_status');
		if ($arr['shipper_status'] == -1) {
			$arr['note'] = $this->get('note');
		}

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function update_confirm_info()
	{ //H210117: cập nhật trạng thái xác nhận đơn hàng
		global $db;

		$id 					= $this->get('id');

		$arr['confirm_by'] 		= $this->get('confirm_by');
		$arr['confirm_type'] 	= $this->get('confirm_type');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function update_ship_code()
	{ //H210117: cập nhật trạng thái xác nhận đơn hàng
		global $db;

		$id 					= $this->get('id');

		$arr['ship_code'] 		= $this->get('ship_code');

		if( $this->get('carrier') != '' )
			$arr['carrier'] 		= $this->get('carrier')+0;
		
		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function update_shipper_status_by_order_id()
	{
		global $db;

		$order_id = $this->get('order_id');
		$arr['shipper_status'] = $this->get('shipper_status');
		if ($arr['shipper_status'] == -1) {
			$arr['note'] = $this->get('note');
		}

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `order_id` = '$order_id' ");

		return true;
	}

	public function update_customer_status()
	{
		global $db;

		$id = $this->get('id');
		$arr['customer_status'] = $this->get('customer_status');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function update_viewed() //hàm update trạng thái đã vào xem đơn hàng chưa (tùng code - 29/12/20)
	{
		global $db;

		$id = $this->get('id');
		$arr['viewed'] = $this->get('viewed');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function get_last_tracking()
	{
		global $db;

		$shop_id = $this->get('shop_id');
		$order_id = $this->get('order_id');

		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name`
				WHERE `shop_id` = '$shop_id' AND `order_id` = '$order_id'
				ORDER BY `id` DESC LIMIT 1";

		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function list_my_delivery()
	{
		global $db, $order, $detail_order;
		$delivery_history = new delivery_history();

		$shipper_id                = $this->get('shipper_id');
		$shipper_status            = $this->get('shipper_status');

		$sqlShipper_status = '';
		if ($shipper_status	!=  '') {
			$shipper_status = explode(';', $shipper_status);
			foreach ($shipper_status as $key => $item) {
				if ($item != '') {
					$sqlShipper_status .= " `shipper_status` = '$item' OR ";
				}
			}

			if ($sqlShipper_status != '') {
				$sqlShipper_status = "  AND ( " . substr($sqlShipper_status, 0, -3) . " )";
			}
		}

		$sql = "SELECT t.*, IFNULL(mb.`fullname`, 'Hệ thống' ) shipper_fullname
                , IFNULL(mb1.`fullname`, '-' ) customer_fullname
                , IFNULL(mb1.`mobile`, '-' ) customer_mobile
				FROM $db->tbl_fix`$this->class_name` t
                LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = t.shipper_id
                LEFT JOIN $db->tbl_fix`members` mb1 ON mb1.user_id = t.customer_id
                WHERE t.`shipper_id` = '$shipper_id' $sqlShipper_status
				ORDER BY `created_at` DESC";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$dOrder 			= $order->get_detail($row['shop_id'], $row['order_id'], $row['order_created_at']);

			if (isset($dOrder['id'])) {
				$row['dOrder']		= $dOrder;
				$row['total'] 		= $detail_order->get_sum_order($row['shop_id'], $row['order_id'], $row['order_created_at']);
				$delivery_history->set('delivery_id', $row['id']);
				$row['lHistory']	= $delivery_history->list_by_delivery();
				$kq[] = $row;
				unset($dOrder);
			} else {
				$this->set('id', $row['id']);
				$this->delete();
			}
		}
		mysqli_free_result($result);

		return $kq;
	}

	public function list_my_delivery_count()
	{
		global $db, $order;

		$shipper_id                = $this->get('shipper_id');
		$shipper_status            = $this->get('shipper_status');

		$sqlShipper_status = '';
		if ($shipper_status	!=  '') {
			$shipper_status = explode(';', $shipper_status);
			foreach ($shipper_status as $key => $item) {
				if ($item != '') {
					$sqlShipper_status .= " `shipper_status` = '$item' OR ";
				}
			}

			if ($sqlShipper_status != '') {
				$sqlShipper_status = "  AND ( " . substr($sqlShipper_status, 0, -3) . " )";
			}
		}

		$sql = "SELECT COUNT(*) total
				FROM " . $db->tbl_fix . "`$this->class_name` t
				LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = t.shipper_id
				LEFT JOIN $db->tbl_fix`members` mb1 ON mb1.user_id = t.customer_id
                WHERE t.`shipper_id` = '$shipper_id' $sqlShipper_status";

		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	//tung code 2207

	public function update_delivery_status()
	{
		global $db, $order;

		$order_id = $this->get('order_id');
		$arr['shipper_status'] = $this->get('shipper_status');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `order_id` = '$order_id' ");

		return true;
	}

	public function update_delivery_cancel()
	{
		global $db;
		if ($this->get('shipper_id') == '') {
			$shipper_id = 0;
		} else {
			$shipper_id = $this->get('shipper_id');
		}
		$id = $this->get('id');
		$arr['shipper_status'] = $this->get('shipper_status');
		$arr['viewed'] = $this->get('viewed');
		$arr['shipper_id'] = $shipper_id;

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function list_by_id($shipper_id)
	{
		global $db;

		$sql = "SELECT * FROM delivery WHERE shipper_id = $shipper_id";
		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function list_by_customer($customer_id)
	{
		global $db;

		$sql = "SELECT del.* FROM delivery del WHERE del.`customer_id` = $customer_id";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	// public function listby_order_wallet_commission_for_client($shop_id, $shipper_id, $order_created_at)
	// {
	// 	global $db;

	// 	$sql = "SELECT del.`shipper_id` showroom_id, del.shipper_id, del.shipper_status, mb.fullname, od.*
	// 	FROM delivery del
	// 	INNER JOIN order_" . $shop_id . "_" . date('Y', $order_created_at) . " od ON od.id = del.order_id
	// 	LEFT JOIN delivery_history del_his ON del_his.order_id = del.order_id
	// 	LEFT JOIN members mb ON del.customer_id = mb.user_id
	// 	WHERE del.shipper_id = $shipper_id GROUP BY del.`order_id`";

	// 	$result = $db->executeQuery_list($sql);

	// 	return $result;
	// }

	public function list_order_item($order_id, $shop_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT dod.*, p.img_1 as image, IFNULL(`SKU`.code, '') sku_code
		FROM order_" . $shop_id . "_" . date('Y', $order_created_at) . " od
		INNER JOIN detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . " dod ON dod.order_id = od.id
		INNER JOIN product p ON p.id = dod.product_id
		LEFT JOIN `SKU` ON SKU.id = dod.sku_id AND SKU.`product_id` = dod.`product_id`
		WHERE dod.order_id = '$order_id'";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function get_by_order_id()
	{
		global $db;

		$order_id 	= $this->get('order_id');
		$shop_id 	= $this->get('shop_id');

		$sql = "SELECT * FROM $db->tbl_fix`delivery` WHERE `order_id` = '$order_id' AND `shop_id` = '$shop_id' ";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}
	// end tung code 2207

	//Huan: Add 20201222
	public function order_move_to_showroom_default($showroom_max_time_to_confirm = 24)
	{ //showroom_max_time_to_confirm = hour
		//List toàn bộ danh sách đơn hàng của showroom toàn hệ thống; đơn nào quá thời gian showroom_max_time_to_confirm sẽ được lưu chuyển về showroom default
		global $db;

		$time 			= time() - $showroom_max_time_to_confirm * 3600;
		$shipper_id 	= $this->get('shipper_id'); //ID showroom loại trừ; danh sách id1; id2;

		$lS = explode(';', $shipper_id);
		$sqlExcept = '';
		foreach ($lS as $showroom_id) {
			if ($showroom_id != '') {
				$sqlExcept .= " del.`shipper_id` <> '$showroom_id' AND ";
			}
		}
		unset($lS);

		$sql = "SELECT *
				FROM $db->tbl_fix`delivery` del
				WHERE  
				$sqlExcept
				del.`shipper_status` = '0'
				AND del.`created_at` < '$time'
				ORDER BY `del`.created_at DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Huan: Add 20201222
	public function filter_to_showroom_job_grouped($minutes = 5)
	{
		//List toàn bộ danh sách đơn hàng của showroom toàn hệ thống; đơn nào chưa xác nhận quá 15 phút
		global $db;

		$time = time() - $minutes * 60;

		$sql = "SELECT *
				FROM $db->tbl_fix`delivery` del
				WHERE del.`shipper_status` = '0'
				AND del.`created_at` < '$time'
				GROUP BY `shipper_id`"; //Nhóm ra những showroom cần push

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//filter đơn hàng by status
	//Huan: edited 20201117: using devidend_service_fee
	public function filter($keyword = '', $offset = '', $limit = '', $field = '', $sort = '', $confirm_type = '', $from = '', $to = '')
	{
		global $db, $delivery_history, $detail_order, $order, $setup;
		$collected_payments = new collected_payments();

		$shipper_status = $this->get('shipper_status');
		$shipper_id 	= $this->get('shipper_id');

		if ($limit != '') $limit = "LIMIT $offset, $limit";

		if ($keyword != '')
			$keyword = "AND ( del.`order_id` LIKE '%$keyword%' OR col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%') ";

		// $orderBY  = "ORDER BY `del`.created_at ASC";
		// if ($shipper_status == 3) {
		// 	$orderBY  = "ORDER BY `del`.created_at DESC";
		// }

		if (isset($from) && $from > 0) {
			$date_add = " AND '$from' <= del.`created_at` AND del.`created_at` < '$to' ";
		} else {
			$date_add = "";
		}

		if (isset($confirm_type) && $confirm_type > 0) {
			if ($confirm_type == 1) {
				$confirm_type = " AND del.`confirm_type` = 'Showroom' ";
			} else if ($confirm_type == 2) {
				$confirm_type = " AND del.`confirm_type` = 'Viettel' ";
			} else if ($confirm_type == 3) {
				$confirm_type = " AND del.`confirm_type` = 'KH' ";
			} else {
				$confirm_type = "";
			}
		} else {
			$confirm_type = "";
		}

		if (in_array($field, array(
			'created_at',
		))) {
			if (!in_array($sort, array('ASC', 'DESC'))) $sort = 'DESC';
			$sorting = " ORDER BY del.`$field` $sort ";
		}else if ($shipper_status == 3) {
			$sorting  = "ORDER BY `del`.created_at DESC";
		} else {
			$sorting = " ORDER BY del.`created_at` ASC ";
		}

		$sql = "SELECT del.`id` `delivery_id`, del.`shipper_status`, del.`shipper_id`, del.`is_delivery`, del.`ship_code`, del.`viewed`, del.`confirm_type`, del.`is_convert`,
					 col.*
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				WHERE del.`shipper_id` = '$shipper_id'
				AND del.`shipper_status` = '$shipper_status' $date_add $confirm_type $keyword
				GROUP BY del.`order_id`
				$sorting
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

			$delivery_history->set('order_id', $row['order_id']);
			$delivery_history->set('shop_id', $row['shop_id']);
			$delivery_history->set('is_hidden', 0);
			$row['journeys'] 	= $delivery_history->list_order_journeys();

			$collected_payments->set('shop_id', $row['shop_id']);
			$collected_payments->set('order_id', $row['order_id']);
			$row['payment'] 	= $collected_payments->list_by_order();

			$COD				= 0;
			$wallet_main		= 0;
			$wallet_cashback	= 0;
			foreach ($row['payment'] as $key => $ssit) {
				if ($ssit['id'] == $setup['payment_type_COD']) {
					$COD 			+= $ssit['total'];
				} else if ($ssit['id'] == $setup['payment_type_wallet_main']) {
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
			$row['total_order']      = $total_product + $ship_fee_val + $package_fee_val + $discount_val;

			$row['lItems']   		 = $detail_order->listby_order_only_product($row['shop_id'], $row['order_id'], $row['order_created_at']);

			$kq[] = $row;
		}

		return $kq;
	}


	public function filter_count($keyword = '', $confirm_type = '', $from = '', $to = '')
	{
		global $db, $detail_order;

		$shipper_status = $this->get('shipper_status');
		$shipper_id 	= $this->get('shipper_id');

		if ($keyword != '')
			$keyword = "AND ( del.`order_id` LIKE '%$keyword%' OR col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%') ";

		if (isset($from) && $from > 0) {
			$date_add = " AND '$from' <= del.`created_at` AND del.`created_at` < '$to' ";
		} else {
			$date_add = "";
		}

		if (isset($confirm_type) && $confirm_type > 0) {
			if ($confirm_type == 1) {
				$confirm_type = " AND del.`confirm_type` = 'Showroom' ";
			} else if ($confirm_type == 2) {
				$confirm_type = " AND del.`confirm_type` = 'Viettel' ";
			} else if ($confirm_type == 3) {
				$confirm_type = " AND del.`confirm_type` = 'KH' ";
			} else {
				$confirm_type = "";
			}
		} else {
			$confirm_type = "";
		}

		$sql = "SELECT COUNT(*) total
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				WHERE del.`shipper_id` = '$shipper_id'
				AND del.`shipper_status` = '$shipper_status' $date_add $confirm_type $keyword";

		$result = $db->executeQuery($sql, 1);

		return $result['total'];
	}

	public function filter_sum($keyword = '', $confirm_type = '', $from = '', $to = '')
	{
		global $db, $detail_order;

		$shipper_status = $this->get('shipper_status');
		$shipper_id 	= $this->get('shipper_id');

		if ($keyword != '')
			$keyword = "AND ( del.`order_id` LIKE '%$keyword%' OR col.`members_name` LIKE '%$keyword%' OR col.`members_mobile` LIKE '%$keyword%') ";

		if (isset($from) && $from > 0) {
			$date_add = " AND '$from' <= del.`created_at` AND del.`created_at` < '$to' ";
		} else {
			$date_add = "";
		}

		if (isset($confirm_type) && $confirm_type > 0) {
			if ($confirm_type == 1) {
				$confirm_type = " AND del.`confirm_type` = 'Showroom' ";
			} else if ($confirm_type == 2) {
				$confirm_type = " AND del.`confirm_type` = 'Viettel' ";
			} else if ($confirm_type == 3) {
				$confirm_type = " AND del.`confirm_type` = 'KH' ";
			} else {
				$confirm_type = "";
			}
		} else {
			$confirm_type = "";
		}

		$sql = "SELECT SUM(col.`sum`) total
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				WHERE del.`shipper_id` = '$shipper_id'
				AND del.`shipper_status` = '$shipper_status' $date_add $confirm_type $keyword";

		$result = $db->executeQuery($sql, 1);

		return $result['total'];
	}

	public function filter_by_daily( $keyword, $from, $to, $daily_id, /*direct_referral*/ $offset = '', $limit = '')
	{
		global $db, $delivery_history, $detail_order, $order, $setup;
		$collected_payments = new collected_payments();

		$shipper_status = $this->get('shipper_status');
		$sqlShipperStatus = '';
		if ( $shipper_status != '' ){
			$lShipS = explode(';', $shipper_status);
			foreach( $lShipS as $ite ){
				if( $ite == '' ){
					$sqlShipperStatus .= " del.`shipper_status` = '$ite' OR";
				}
			}
		}
		if( $sqlShipperStatus != '' ){
			$sqlShipperStatus = 'AND ('.substr($sqlShipperStatus, 0, -2).')';
		}

		$customer_id = $this->get('customer_id');
		if ($customer_id != '') $customer_id = "AND del.`customer_id` = '$customer_id'";

		if ($keyword != '') $keyword = " AND ( mb.`mobile` LIKE '%$keyword%'  OR  mb.`fullname`= '%$keyword%' OR mb.`code`= '%$keyword%' OR col.`order_id` = '%$keyword%' )";
		if ($limit != '') $limit = "LIMIT $offset, $limit";

		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.created_at AND `del`.created_at < '$to' ";
		}
		
		$sql = "SELECT del.`shipper_status`, del.`shipper_id`, del.`is_convert`, col.*, sr.`name` showroom_name, sr.`mobile` showroom_mobile, sr.`address` showroom_address
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				LEFT JOIN $db->tbl_fix`showroom` sr ON sr.`id` = del.`shipper_id`
				WHERE mb.`direct_referral` = '$daily_id' $sqlShipperStatus $keyword $sqlFromTo $customer_id
				GROUP BY del.`order_id`
				ORDER BY `del`.created_at DESC
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

			$delivery_history->set('order_id', $row['order_id']);
			$delivery_history->set('shop_id', $row['shop_id']);
			$delivery_history->set('is_hidden', 0);
			$row['journeys'] 	= $delivery_history->list_order_journeys();

			$collected_payments->set('shop_id', $row['shop_id']);
			$collected_payments->set('order_id', $row['order_id']);
			$row['lPayment'] 	= $collected_payments->list_by_order();

			$COD				= 0;
			$wallet_main		= 0;
			foreach ($row['lPayment'] as $key => $ssit) {
				# code...
				if ($ssit['id'] == $setup['payment_type_COD']) {
					$COD 			+= $ssit['total'];
				} else if ($ssit['id'] == $setup['payment_type_wallet_main']) {
					$wallet_main 	+= $ssit['total'];
				}
			}

			$dDiSer   		        = $detail_order->devidend_service_fee($row['shop_id'], $row['order_id'], $row['order_created_at']);
			$discount_val 			= $dDiSer['discount'];
			$ship_fee_val 			= $dDiSer['ship_fee'];
			$package_fee_val 		= $dDiSer['package_fee'];
			$total_product 		    = $dDiSer['total_product'];
			unset($dDiSer);

			$row['ship_fee']         = $ship_fee_val;
			$row['package_fee']      = $package_fee_val;
			$row['discount']         = $discount_val;
			$row['total_product']    = $total_product;
			$row['COD_total'] 		 = $COD;
			$row['wallet_total'] 	 = $wallet_main;

			$row['lItems']   			= $detail_order->listby_order_only_product($row['shop_id'], $row['order_id'], $row['order_created_at']);

			$kq[] = $row;
		}

		return $kq;
	}


	public function filter_by_daily_count($keyword, $from, $to, $daily_id /*direct_referral*/)
	{
		global $db, $detail_order;

		$shipper_status = $this->get('shipper_status');
		$sqlShipperStatus = '';
		if ( $shipper_status != '' ){
			$lShipS = explode(';', $shipper_status);
			foreach( $lShipS as $ite ){
				if( $ite == '' ){
					$sqlShipperStatus .= " del.`shipper_status` = '$ite' OR";
				}
			}
		}
		if( $sqlShipperStatus != '' ){
			$sqlShipperStatus = 'AND ('.substr($sqlShipperStatus, 0, -2).')';
		}

		$customer_id = $this->get('customer_id');
		if ($customer_id != '') $customer_id = "AND del.`customer_id` = '$customer_id'";
		
		if ($keyword != '') $keyword = " AND ( mb.`mobile` LIKE '%$keyword%'  OR  mb.`fullname`= '%$keyword%' OR mb.`code`= '%$keyword%' OR col.`order_id` = '%$keyword%' )";

		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.created_at AND `del`.created_at < '$to' ";
		}

		$sql = "SELECT COUNT(*) total
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				WHERE mb.`direct_referral` = '$daily_id' $keyword $sqlFromTo $customer_id
				$sqlShipperStatus";

		$result = $db->executeQuery($sql, 1);

		return $result['total'];
	}

	public function filter_by_daily_report( $from, $to, $daily_id /*direct_referral*/)
	{
		global $db, $setup;

		$payment_type_main_wallet 	= $setup['payment_type_wallet_main'];
		$payment_type_COD 			= $setup['payment_type_COD'];

		$shipper_status = $this->get('shipper_status');
		$sqlShipperStatus = '';
		if ( $shipper_status != '' ){
			$lShipS = explode(';', $shipper_status);
			foreach( $lShipS as $ite ){
				if( $ite == '' ){
					$sqlShipperStatus .= " del.`shipper_status` = '$ite' OR";
				}
			}
		}
		if( $sqlShipperStatus != '' ){
			$sqlShipperStatus = 'AND ('.substr($sqlShipperStatus, 0, -2).')';
		}

		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.created_at AND `del`.created_at < '$to' ";
		}

		$sql = "SELECT COUNT(*) total_record, SUM(colp.`total_cash` - col.`service_fee` ) total_value
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				INNER JOIN (
					SELECT `colp`.collected_orders_id, SUM(`value`) total_cash FROM $db->tbl_fix`collected_payments` colp 
					WHERE ( colp.`payment_type` = '$payment_type_main_wallet' OR colp.`payment_type` = '$payment_type_COD' )
					GROUP BY `colp`.collected_orders_id
				) colp ON col.`id` = colp.`collected_orders_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				WHERE ( ( mb.`direct_referral` = '$daily_id' AND mb.`activated` = 0 ) OR mb.`user_id` = '$daily_id' )
				$sqlFromTo
				$sqlShipperStatus";

		$result = $db->executeQuery($sql, 1);

		return array( 'total_record' =>  isset($result['total_record']) ? $result['total_record']+0:0, 
						'total_value' =>  isset($result['total_value']) ? $result['total_value']+0:0 );
	}

	public function filter_by_daily_report_chart( $from, $to, $daily_id /*direct_referral*/)
	{
		global $db, $setup;

		$payment_type_main_wallet 	= $setup['payment_type_wallet_main'];
		$payment_type_COD 			= $setup['payment_type_COD'];

		$shipper_status = $this->get('shipper_status');
		$sqlShipperStatus = '';
		if ( $shipper_status != '' ){
			$lShipS = explode(';', $shipper_status);
			foreach( $lShipS as $ite ){
				if( $ite == '' ){
					$sqlShipperStatus .= " del.`shipper_status` = '$ite' OR";
				}
			}
		}
		if( $sqlShipperStatus != '' ){
			$sqlShipperStatus = 'AND ('.substr($sqlShipperStatus, 0, -2).')';
		}

		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.created_at AND `del`.created_at < '$to' ";
		}

		$sql = "SELECT SUM(colp.`total_cash` - col.`service_fee` ) total_value, IFNULL (delhis.`created_at`, del.`created_at` ) created_at
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				INNER JOIN (
					SELECT `colp`.collected_orders_id, SUM(`value`) total_cash FROM $db->tbl_fix`collected_payments` colp 
					WHERE ( colp.`payment_type` = '$payment_type_main_wallet' OR colp.`payment_type` = '$payment_type_COD' )
					GROUP BY `colp`.collected_orders_id
				) colp ON col.`id` = colp.`collected_orders_id`
				LEFT JOIN $db->tbl_fix`delivery_history` delhis ON delhis.`delivery_id` = del.`id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				WHERE ( ( mb.`direct_referral` = '$daily_id' AND mb.`activated` = 0 ) OR mb.`user_id` = '$daily_id' )
				$sqlFromTo
				$sqlShipperStatus
				";

		$result = $db->executeQuery($sql);
		
		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){
			$item['y'] = $row['total_value']+0;
			$item['x'] = date('d', $row['created_at']);
			$item['created_at'] = $row['created_at'];
			$kq[$item['x']] = $item;
		}

		$t_month = date('t');
		$kqrt = array();
		for($i = 1; $i <= $t_month; $i ++ ){
			
			$day = sprintf( "%02d", $i );
			$item = $kq[$day];

			if( isset($item['x']) ){
				unset($item['created_at']);
			}else{
				$item['y'] = 0;//$i < date('d') ? rand(1000000, 10000000):0;
				$item['x'] = $day;
			}
			$kqrt[]=  $item;
		}
		
		return $kqrt;
	}


	//Tùng lấy danh sách đơn hàng của hệ thống. NPP
	//Huan: Edited 20201117
	public function filter_by_npp($keyword, $from, $to, $npp_id, $offset = '', $limit = '')
	{
		global $db, $delivery_history, $detail_order, $order, $setup;
		$collected_payments = new collected_payments();

		$shipper_status = $this->get('shipper_status');
		if ($shipper_status !== '') $shipper_status = "AND del.`shipper_status` = '$shipper_status'";
		if ($keyword != '') $keyword = " AND ( mb.`mobile` LIKE '%$keyword%'  OR  mb.`fullname` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR col.`order_id` LIKE '%$keyword%' )";

		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.`created_at` AND `del`.`created_at` < '$to' ";
		}

		if ($limit != '') $limit = "LIMIT $offset, $limit";

		$sql = "SELECT del.`shipper_status`, del.`shipper_id`, del.`is_convert`, col.*
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				WHERE
				mb.`npp_referral` = '$npp_id'
				$shipper_status
				$keyword
				$sqlFromTo
				GROUP BY del.`order_id`
				ORDER BY `del`.created_at DESC
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

			$delivery_history->set('order_id', $row['order_id']);
			$delivery_history->set('shop_id', $row['shop_id']);
			$delivery_history->set('is_hidden', 0);
			$row['journeys'] 	= $delivery_history->list_order_journeys();

			$collected_payments->set('shop_id', $row['shop_id']);
			$collected_payments->set('order_id', $row['order_id']);
			$row['lPayment'] 	= $collected_payments->list_by_order();

			$COD			= 0;
			$wallet_main	= 0;
			foreach ($row['lPayment'] as $key => $ssit) {
				if ($ssit['id'] == $setup['payment_type_COD']) {
					$COD 			+= $ssit['total'];
				} else if ($ssit['id'] == $setup['payment_type_wallet_main']) {
					$wallet_main 	+= $ssit['total'];
				}
			}

			$dDiSer   		        = $detail_order->devidend_service_fee($row['shop_id'], $row['order_id'], $row['order_created_at']);
			$discount_val 			= $dDiSer['discount'];
			$ship_fee_val 			= $dDiSer['ship_fee'];
			$package_fee_val 		= $dDiSer['package_fee'];
			$total_product 		    = $dDiSer['total_product'];
			unset($dDiSer);

			$row['ship_fee']         = $ship_fee_val;
			$row['package_fee']      = $package_fee_val;
			$row['discount']         = $discount_val;
			$row['total_product']    = $total_product;
			$row['COD_total'] 		 = $COD;
			$row['wallet_total'] 	 = $wallet_main;

			$row['pro_allow_commission_value'] 	 	= ($row['pro_allow_commission_value'] / $setup['pro_allow_commission_percent']) * $setup['commission_npp_tuyen'];
			$row['pro_allow_commission_percent'] 	= $setup['commission_npp_tuyen'];

			$row['lItems']   			= $detail_order->listby_order_only_product($row['shop_id'], $row['order_id'], $row['order_created_at']);

			$kq[] = $row;
		}

		return $kq;
	}


	public function filter_by_npp_count( $keyword, $from, $to, $npp_id )
	{
		global $db, $detail_order;

		$shipper_status = $this->get('shipper_status');
		if ($shipper_status !== '') $shipper_status = "AND del.`shipper_status` = '$shipper_status'";
		if ($keyword != '') $keyword = " AND ( mb.`mobile` LIKE '%$keyword%'  OR  mb.`fullname` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR col.`order_id` LIKE '%$keyword%' )";
		
		$sqlFromTo = '';
		if( $from != '' && $from > 0 ){
			$sqlFromTo = " AND '$from' < `del`.`created_at` AND `del`.`created_at` < '$to' ";
		}

		$sql = "SELECT COUNT(*) total
				FROM $db->tbl_fix`delivery` del
				INNER JOIN $db->tbl_fix`collected_orders` col ON col.`order_id` = del.`order_id`
				LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = del.`customer_id`
				WHERE 
				mb.`npp_referral` = '$npp_id'
				$shipper_status
				$keyword
				$sqlFromTo
				";

		$result = $db->executeQuery($sql, 1);

		return $result['total'];
	}

	public function list_showroom_by_delivery()
	{ // lấy showroom theo đơn hàng giao
		global $db, $showroom;

		$order_id = $this->get('order_id');

		$sql = "SELECT shipper_id
				FROM $db->tbl_fix`delivery` del
				WHERE del.`order_id` = '$order_id'";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {

			$showroom->set('id', $row['shipper_id']);
			$row['showroom'] = $showroom->get_detail();
			$kq[] = $row;
		}

		return $kq;
	}

	//hàm tính tổng số tiền đơn hàng chờ và đã nhận của showroom. (TCode)
	public function sum_total_pending()
	{
		global $db;

		$shipper_id = $this->get('shipper_id');
		$shop_id = $this->get('shop_id');
		$order_created_at = $this->get('order_created_at');

		$sql = "SELECT SUM(od.`total`) total_pending 
		FROM $db->tbl_fix`delivery del`
		INNER JOIN $db->tbl_fix`order_' . $shop_id . '_' . date('Y', $order_created_at) . '` od ON del.`order_id` = od.`id`
		WHERE del.`shipper_id` = '$shipper_id' AND (del.`shipper_status` = 0 OR del.`shipper_status` = 1 OR del.`shipper_status` = 2)
		";

		$result = $db->executeQuery($sql);

		return $result['total_pending'] + 0;
	}

	//lấy tất cả đơn hàng đang chờ hoặc đang giao của showroom
	public function get_all_order_pending_shipping_showroom()
	{
		global $db;

		$shipper_id = $this->get('shipper_id');
		$shop_id = $this->get('shop_id');
		$order_created_at = $this->get('order_created_at');

		$sql = "SELECT del.*
		FROM $db->tbl_fix`delivery` del
		INNER JOIN $db->tbl_fix`collected_payments` col_pay ON col_pay.`order_id` = del.`order_id`
		INNER JOIN $db->tbl_fix`collected_orders` col_od ON col_od.`order_id` = del.`order_id`
		WHERE del.`shipper_id` = '5' AND col_pay.`payment_type` != 95 AND (del.`shipper_status` = 1 OR del.`shipper_status` = 2 OR del.`shipper_status` = 3) 
		AND col_od.`is_divided` = 0
		GROUP BY del.`order_id`";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function update_change_showroom()
	{
		global $db;

		$id = $this->get('id');
		$arr['shipper_id'] 	= $this->get('shipper_id');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

		return true;
	}

	public function deleteby_order_id()
	{ //(tùng code) xóa đơn hàng theo order_id
		global $db;
		$order_id = $this->get('order_id');
		$db->record_delete($this->class_name, " `order_id` = '" . $order_id . "' ");
		return true;
	}

	public function update_status_delivery()
	{ //(tùng code - 21/01/15) update_status delivery order
		global $db, $collected_orders, $order, $detail_order, $main, $notification, $product, $showroom, $dClientLogin, $voucher, $shop, $setup;

		$members             	= new members();
		$delivery_history     	= new delivery_history();
		$wallet_transaction 	= new wallet_transaction();
		$collected_payments 	= new collected_payments();
		$wallet_detail     		= new wallet_detail();

		$flag = true;
		$msg  = '';

		$id 				= $this->get('id');
		$shop_id 			= $this->get('shop_id');
		$shipper_status 	= $this->get('shipper_status');
		$shipper_note 		= $this->get('note');
		$confirm_by 		= $this->get('confirm_by');
		$confirm_type 		= $this->get('confirm_type');

		$ship_code 			= $this->get('ship_code');
		$carrier 			= $this->get('carrier')+0;

		$dDel = $this->get_detail();

		if (!isset($dDel['id'])) {
			$flag = false;
			$msg = 'Không xác định được đơn hàng.';
		} else {
			$showroom->set('id', $dDel['shipper_id']);
			$dOwner = $showroom->get_detail();

			$lManager = explode(';', $dOwner['owner'] . ';' . $dOwner['managers']);
			if (!isset($dOwner['id']) || !in_array($dClientLogin['user_id'], $lManager)) {
				$flag = false;
				$msg = 'Đơn hàng không xác định. Mã - SR1232.';
			} else {

				$delivery_history_minus_points 	= 0;
				$delivery_history_note 			= '';

				if ($shipper_status == -1 && in_array($dDel['shipper_status'], array(0, 1, 2))) {
					//Showroom từ chối giao đơn này: đơn đang trạng thái chờ showroom xác nhận giao
					//Đơn hàng được chuyển lên tuyến trên hoặc Công Ty

					$this->set('shipper_id',  $dDel['shipper_id']);
					$no_order_cancel_this_month = $delivery_history->list_by_delivery_count(); //Số đơn hàng Showroom này đã hủy trong tháng

					if ($no_order_cancel_this_month > 4) { //Nếu vượt quá 5 lần thì sẽ trừ điểm: tức từ lần thứ 6
						$collected_orders->set('order_id', $dDel['order_id']);
						$collected_orders->set('shop_id', $dDel['shop_id']);
						$points = $collected_orders->get_detail_point();
						$delivery_history_minus_points = $points * 0.05; //phạt 5% đơn hàng
					}
					
					if( $shipper_note != '' )
						$delivery_history_note = 'Từ chối giao đơn hàng này. Lý do: '.$shipper_note;
					else
						$delivery_history_note = 'Từ chối giao đơn hàng này.';


					$this->set('shipper_status', 0);
					$this->set('viewed', 0);
					$this->set('shipper_id', $setup['showroom_htp_id']); //hiện tại nếu showroom từ chối đẩy về showroom Huỳnh Tấn Phát
					$status_code = $this->update_delivery_cancel();

					if ($status_code)
						$flag = true;
					else {
						$flag = false;
						$msg = 'Không nhận giao đơn hàng không thành công';
					}

					// $subject = 'Đơn hàng ' . $dDel['order_id'] . ' tìm kiếm người giao không thành công';
					// $content = 'Chưa tìm kiếm được người giao. Chúng tôi đang tìm kiếm người giao cho bạn.';

				} else if ($shipper_status == -2 && in_array($dDel['shipper_status'], array(0, 1, 2))) {

					$shop_id 				= $dDel['shop_id'];
					$order_id 				= $dDel['order_id'];
					$order_created_at 		= $dDel['order_created_at'];

					//Shipper hủy đơn do người dùng có thể không nhận được
					$delivery_history_note = 'Khách hàng hủy lý do: ' . $shipper_note;

					//Thực hiện trả tiền ví lại cho người dùng; nếu là tiền ví thì trả lại tiền điểm không => khôi phục lại đơn hàng
					$dO = $order->get_detail($shop_id, $order_id, $order_created_at);

					if (isset($dO['id'])) {

						//Trả lại voucher đã sử dụng
						if (isset($dO['voucher_id'])) {
							$voucher->set('id', $dO['voucher_id']);
							$dVo = $voucher->get_detail();

							if (isset($dVo['id']) && $dVo['type'] == 1) {
								//xóa do voucher tự động tạo
								$voucher->delete();
							} else {
								//Update trả lại do voucher có thời hạn

								$voucher->set('status', 0);
								$voucher->set('order_id', '');
								$voucher->set('shop_id', 0);
								$voucher->set('order_created_at', 0);
								$voucher->update_status();
							}
						}

						//Cập nhật trạng thái hủy đơn hàng
						$order->set('id', $order_id);
						$order->set('status', '-2');
						$order->update_delivery_status($shop_id, $order_created_at);


						$showroom->set('id', $dDel['shipper_id']);
						$dShipper = $showroom->get_detail(); // lấy showroom theo đơn hàng giao

						/**
						 * BEGIN thực hiện trả lại tiền + điểm cho khách hàng
						 */

						$collected_payments->set('shop_id', $shop_id);
						$collected_payments->set('order_id', $order_id);
						$collected_payments->set('created_at', $order_created_at);

						$lPays = $collected_payments->list_by_order();
						if (COUNT($lPays) > 0) {

							//Thực hiện trừ ví rút/ ví điểm
							foreach ($lPays as $sIPay) {
								//Điểm sẽ không được hoàn trong trường hợp dùng điểm để thanh toán
								if ($sIPay['payment_type'] == $setup['payment_type_wallet_main']) {
									//Thanh toán bằng ví chính

									$amount = $sIPay['total'];
									$wallet_id = $setup['wallet_id_main'];

									//Trừ tiền ví tiền
									$wallet_transaction->set('from_client', 1);
									$wallet_transaction->set('to_client', $dO['id_customer']); //Thu hồi về ví tổng
									$wallet_transaction->set('wallet_id', $wallet_id);
									$wallet_transaction->set('amount', $amount);
									$wallet_transaction->set('shop_id', $shop_id);
									$wallet_transaction->set('order_id', $order_id);
									$wallet_transaction->set('order_created_at', $order_created_at);
									$wallet_transaction->set('note', 'Hoàn tiền đơn hàng ' . $order_id . ' đã hủy.');
									$wallet_transaction->set('fee', 0);
									$wallet_transaction->set('transaction_type', 'PAYBACKORDER');
									$wallet_transaction->set('created_by_admin', 0);
									$wallet_transaction->create();
								}elseif ($sIPay['payment_type'] == $setup['payment_type_wallet_cashback'] && $dDel['is_convert'] == 1 ) {
									//Thanh toán bằng ví chính

									$amount = $sIPay['total'];
									$wallet_id = $setup['wallet_id_cashback'];

									//Trừ tiền ví tiền
									$wallet_transaction->set('from_client', 1);
									$wallet_transaction->set('to_client', $dO['id_customer']); //Thu hồi về ví tổng
									$wallet_transaction->set('wallet_id', $wallet_id);
									$wallet_transaction->set('amount', $amount);
									$wallet_transaction->set('shop_id', $shop_id);
									$wallet_transaction->set('order_id', $order_id);
									$wallet_transaction->set('order_created_at', $order_created_at);
									$wallet_transaction->set('note', 'Hoàn điểm từ đơn hàng chuyển điểm ' . $order_id . ' đã hủy.');
									$wallet_transaction->set('fee', 0);
									$wallet_transaction->set('transaction_type', 'PAYBACKORCONVERT');
									$wallet_transaction->set('created_by_admin', 0);
									$wallet_transaction->create();
								}
							}
						}
						/**
						 * END thực hiện trả lại tiền + điểm cho khách hàng
						 */

						$subject = 'Đã hủy đơn hàng';
						$content = 'Đơn hàng ' . $order_id . ' đã được hủy thành công.';
						$notification->set('to', $dShipper['managers'] . $dShipper['owner'] . ';' . $dO['id_customer'] . ';');
						$notification->set('subject', $subject);
						$notification->set('content', $content);
						$notification->set('created_by', 0);
						$notification_id = $notification->add();

						$toShipper = $dShipper['managers'] . $dShipper['owner'] . ';' . $dO['id_customer'] . ';';
						$lTo = explode(';', $toShipper);

						$con = '';
						foreach ($lTo as $key => $it) {
							if ($it != '')
								$con .= "'client_$it' in topics || ";
						}

						if ($con != '') {

							$con = substr($con, 0, -3);
							$post['condition'] = $con;
							$post['priority']  = 'high';
							$post['notification_id']  = $notification_id;
							$ii['title']  = $subject;
							$ii['body']   = strip_tags($content);
							$post['notification'] = $ii;
							$main->sendFCM($post);

							unset($con);
							unset($post);
							unset($ii);
						}
					}
				} else if ($shipper_status == -3 && in_array($dDel['shipper_status'], array(0, 1, 2))) {
					//Phạt hủy đơn hàng => SR đã nhận mà sau lại hủy đơn

					$collected_orders->set('order_id', $dDel['order_id']);
					$collected_orders->set('shop_id', $dDel['shop_id']);
					$points = $collected_orders->get_detail_point();
					$delivery_history_minus_points = $points * 0.05;

					if ($shipper_note != '') {
						$content = $shipper_note;
					} else {
						$content = 'Shipper đã hủy đơn hàng';
					}
					$delivery_history_note = $content;

					// $subject = 'Đơn hàng ' . $dDel['order_id'] . ' chưa được nhận';

					//Thực hiện chuyển đơn sang cho showroom tổng
					if(  $dDel['shipper_id'] !=  $setup['showroom_id_default'] ){
						$this->set('id', $dDel['id']);
						$this->set('shipper_id', $setup['showroom_id_default']);
						$this->update_change_showroom();

						$this->set('id', $dDel['id']);
						$this->set('shipper_status', $shipper_status);
						$this->set('note', $shipper_note);
						$this->update_shipper_status();
					}

				} else if ($shipper_status == 1 && $dDel['shipper_status'] == 0) {
					//Chuyển đơn sang đi giao

					$this->set('shipper_id', $dDel['shipper_id']);
					$lOrder = $this->get_all_order_pending_shipping_showroom();
					$total_pending = 0;

					foreach ($lOrder as $key => $item) {
						$total_pending += $order->get_total_order_sub_package_fee($item['shop_id'], $item['order_id'], $item['order_created_at']);
					}

					$total_order = $order->get_total_order_sub_package_fee($dDel['shop_id'], $dDel['order_id'], $dDel['order_created_at']);

					$total_pending = ($total_pending + $total_order) / 100 * 30;

					$showroom->set('id', $dDel['shipper_id']);
					$dOwner = $showroom->get_detail();

					if (!isset($dOwner['id'])) {
						$flag = false;
						$msg = 'Showroom không xác định được chủ sở hữu.';
					} else {
						$wallet_detail->set('client_id', $dOwner['owner']);
						$dWalletOwner = $wallet_detail->get_total_wallet_by_client();

						if ($dWalletOwner['wallet_cashback'] < $total_pending) {
							$flag = false;
							$msg = 'Ví điểm của bạn không đủ để nhận đơn hàng.';
						} else {

							if ($shipper_note != '') {
								$content = $shipper_note;
							} else {
								$content = 'Shipper đã nhận đơn hàng. ' . $shipper_note;
							}
							$delivery_history_note = $content;

							// $subject = 'Đơn hàng ' . $dDel['order_id'] . ' đã được nhận.';
						}
					}
				} else if ($shipper_status == 2 && $dDel['shipper_status'] == 1) {

					//Đang đi giao hàng
					if ($shipper_note != '') {
						$content = $shipper_note;
					} else {
						$content = 'Shipper đang giao đơn hàng. ' . $shipper_note;
					}
					$delivery_history_note = $content;

					//H210117: cập nhật mã vận chuyển đơn hàng và nhà cung cấp
					$this->set('id', $id);
					$this->set('ship_code', $ship_code); //Mã vận đơn
					$this->set('carrier', $carrier);
					$this->update_ship_code();
				} else if ($shipper_status == 3 && in_array($dDel['shipper_status'], array(1, 2))) {
					// } else if ( $shipper_status == 3 ) {
					//Trường hợp đơn hàng được update hoàn thành

					$order->set('id', $dDel['order_id']);
					$order->set('status', '1');
					$order->update_delivery_status($dDel['shop_id'], $dDel['created_at']);

					$collected_orders->set('order_id', $dDel['order_id']);
					$collected_orders->set('status', '1');
					$collected_orders->update_status();

					//List ALL
					$collected_payments->set('shop_id', $dDel['shop_id']);
					$collected_payments->set('order_id', $dDel['order_id']);
					$lPaymentType = $collected_payments->list_by_order();

					$payment_cashback 		= 0;
					$payment_wallet 		= 0;
					$payment_COD 			= 0;
					foreach ($lPaymentType as $key => $item) {

						if ($item['id'] == $setup['payment_type_wallet_main']) {
							$payment_wallet = $item['total'];
						} else if ($item['id'] == $setup['payment_type_wallet_cashback']) {
							$payment_cashback = $item['total'];
						} else if ($item['id'] = $setup['payment_type_COD']) {
							$payment_COD = $item['total'];
						}
					}

					//BEGIN Tặng voucher cho user
					$dValDevidend = $detail_order->devidend_service_fee($dDel['shop_id'], $dDel['order_id'], $dDel['order_created_at']);
					if ($dValDevidend['total_product'] >= $setup['give_voucher_free_ship'] && $payment_cashback == 0) {

						$product->set('id', $setup['voucher_free_ship_id']);
						$dlProduct = $product->get_detail_provou();

						$voucher->set('client_id', $dDel['customer_id']);
						$voucher->set('product_id', $dlProduct['id']);
						$voucher->set('sku_id', $dlProduct['unique_id']);
						$voucher->set('content', $dlProduct['name']);
						$voucher->set('price', $dlProduct['price']);
						$voucher->set('status', 0);
						$voucher->set('type', 0);
						$voucher->set('exp_date', strtotime(date('m/d/Y')) + 30 * 86400);
						$voucher->set('order_created', $dDel['order_id']);
						$voucher->add();

						$subject = 'Bạn được tặng Voucher';
						$content = 'Đơn hàng ' . $dDel['order_id'] . ' đã được xác nhận thành công. Bạn nhận được 1 Voucher Free_Ship. Hãy mua đơn hàng tiếp theo để sử dụng Voucher này.';
						$notification->set('to', $dDel['customer_id'] . ';');
						$notification->set('subject', $subject);
						$notification->set('content', $content);
						$notification->set('created_by', 0);
						$notification_id = $notification->add();

						$post['to'] = '/topics/client_' . $dDel['customer_id'];
						$post['priority']  = 'high';
						$ii['title']  = $subject;
						$ii['body']   = $content;
						$post['notification'] = $ii;
						$post['data']['force_refresh'] = true;
						$post['data']['notify_id']     = $notification_id;
						$main->sendFCM($post);
					}
					//END Tặng voucher cho user


					//Thực hiện thông báo cho người dùng:
					///push notification to client

					if ($shipper_note != '') {
						$content = 'Đơn hàng đã giao đến bạn thành công. ' . $shipper_note;
					} else {
						$content = 'Đơn hàng đã giao đến bạn thành công.';
					}
					$delivery_history_note = $content;

					$subject = 'Đơn hàng ' . $dDel['order_id'] . ' của bạn đã được giao thành công.';
					$notification->set('to', $dDel['customer_id'] . ';');
					$notification->set('subject', $subject);
					$notification->set('content', $content);
					$notification->set('created_by', 0);
					$notification_id = $notification->add();

					$post['to'] = '/topics/client_' . $dDel['customer_id'];
					$post['priority']  = 'high';
					$ii['title']  = $subject;
					$ii['body']   = $content;
					$post['notification'] = $ii;
					$post['data']['force_refresh'] = true;
					$post['data']['notify_id']     = $notification_id;
					$main->sendFCM($post);

					/**
					 * BEGIN UPDATE TOTAL SPENT & UPDATE LEVEL TO USER
					 */
					/*
                    - Thêm spent vào members
                    - Tích điểm theo cơ chế định sẵn
                    - Thêm vào member_transaction
                    */

					$total_cash = ($payment_COD + $payment_wallet) - $dValDevidend['ship_fee'] - $dValDevidend['package_fee'] - $dValDevidend['discount'];

					if ($total_cash > 0) {
						$mTrans = new member_transaction();

						if ($setup['loyalty_status'] == 1) {
							if ($total_cash > 0)
								$extra_point = floor(@$total_cash / $setup['loyalty_convert']);
							else
								$extra_point = 0;
						} else {
							$extra_point = 0;
						}

						//update spent total
						$members->set('user_id', $dDel['customer_id']);
						$members->set('total_spent', $total_cash);
						$members->set('point', $extra_point);
						$members->update_spent_and_point();

						//thêm transaction
						$dShop = $shop->get_detail($dDel['shop_id']);
						$mTrans->set('user_id', $dDel['customer_id']);
						$mTrans->set('point', $extra_point); //tích điểm và cập nhật điểm
						$mTrans->set('spent', $total_cash);
						$mTrans->set('shop_name', $dShop['name']);
						$mTrans->set('shop_id', $dDel['shop_id']);
						$mTrans->set('order_id', $dDel['order_id']);
						$mTrans->add_update();

						//Cập nhật lên cấp tạm thời sau 10/04 tính tiếp
						$members->set('user_id', $dDel['customer_id']);//id user con thay đổi để up cho cha
						$members->level_up_execute();
						
					}
					/**
					 * END UPDATE TOTAL SPENT & UPDATE LEVEL TO USER
					 */

					 /**
					  * BEGIN THÊM USER GẮN MẶT ĐỊNH VÀO 1 USER TẠO ĐƠN, TRONG VÒNG 90 NGÀY THÌ THỰC HIỆN Ở API REGISTER
					  */
					//LẤY SDT TRONG ĐỊA CHỈ GIAO HÀNG => KTRA XEM ĐÃ TẠO CHƯA NẾU CHƯA THÌ TẠO TẠO RỒI THÌ THÔI => NẾU TRƯỜNG HỢP SỐ NÀY VẪN CHƯA ACTIVATE => GÁN LẠI REFERRAL: NPP REFERRAL VÀ DIRECT REFERRAL VÀ REFERRAL BY

					$members->set('user_id', $dDel['customer_id']);
					$dClientOrder = $members->get_detail();

					if( $dDel['is_delivery'] == 1 && isset($dClientOrder['user_id']) && 
						in_array( $dClientOrder['member_group_id'], explode(';', $setup['member_group_id_khachhang']) )
					){//Giao hang va nguoi dat la khach hang/dai ly

						$dOrder 			= $order->get_detail($dDel['shop_id'], $dDel['order_id'], $dDel['order_created_at']);

						if( isset($dOrder['id']) && $dOrder['address_book_id'] > 0 ){
							
							//address_book_id
							$address_book = new address_book();
							$address_book->set('id', $dOrder['address_book_id']);
							$dAddBook = $address_book->get_detail();
		
							if( isset($dAddBook['id']) && $dAddBook['mobile'] != '' ){
								$mobile = $dAddBook['mobile'];
								$members->set('mobile', $dAddBook['mobile']);
								$dClientMobile = $members->get_by_mobile();

								if ( !isset($dClientMobile['user_id']) ) {

									if ($dClientOrder['license_to'] > 0) {
										//đã kích hoạt đại lý
										$direct_referral = $dClientOrder['user_id'];
									} else {
										//Chưa kích hoạt đại lý
										$direct_referral = $dClientOrder['direct_referral'];
									}
									$npp_referral       = $dClientOrder['npp_referral'];

									$members->set('user_id', '');
									$members->set('avatar', '');
									$members->set('is_wholesale_customer', 0);
									$members->set('password', '');
									$members->set('fullname', '');
									$members->set('mobile', $mobile);

									$members->set('code', '');
									$members->set('referral_by', $dClientOrder['mobile']);
									$members->set('pkd', '');

									$members->set('bank_name', '');
									$members->set('bank_account', '');
									$members->set('bank_fullname', '');
									$members->set('bank_branch', '');
									$members->set('bank_city', '');

									$members->set('member_department_id', $setup['default_member_department_id']);
									$members->set('cum', '');
									$members->set('kvkd', '');
									$members->set('gdkd', '');
									$members->set('chinhanh', '');

									$members->set('day', '');
									$members->set('month', '');
									$members->set('year', '');

									$members->set('city', '');
									$members->set('district', '');
									$members->set('ward', '');
									$members->set('address', '');
									$members->set('direct_referral', $direct_referral);
									$members->set('npp_referral', $npp_referral);

									$members->set('member_group_id', $setup['member_group_id_khachhang_moi']);
									$members->set('total_spent', 0);
									$members->set('point', 0);
									$members->set('tax', 0);
									$members->set('email', '');
									$members->set('facebook', '');
									$members->set('note', '');
									$members->set('by_user_cs', $setup['default_by_user_cs']);
									$members->set('shop_id', 1);
									$members->set('cmnd', ''); //
									$members->set('sex', 0); //
									$members->set('city_id', 0); //
									$members->set('district_id', 0); //
									$members->set('ward_id', 0); //
									$members->set('created_by', 'AUTOMAP');//Tự động map, khi số phone là do người dùng add
									$members->set('is_local_created', 0);
									$members->add();

								}elseif( $dClientMobile['activate'] == 0 && $dClientMobile['last_logged'] == 0 ){

									if ($dClientOrder['license_to'] > 0) {
										//đã kích hoạt đại lý
										$direct_referral = $dClientOrder['user_id'];
									} else {
										//Chưa kích hoạt đại lý
										$direct_referral = $dClientOrder['direct_referral'];
									}
									$npp_referral       = $dClientOrder['npp_referral'];

									$members->set('direct_referral', $direct_referral);
									$members->set('npp_referral', $npp_referral);
									$members->set('referral_by', $dClientOrder['mobile']);
									$members->set('user_id', $dClientMobile['user_id']);
                					$members->re_update_inactivate_by_parent();

								}
								
							}
						}
					}
					
					

					//TẠO USER VỚI THÔNG TIN NPP REFERRAL VÀ DIRECT REFERRAL

					  /**
					  * END THÊM USER GẮN MẶT ĐỊNH VÀO 1 USER TẠO ĐƠN, TRONG VÒNG 90 NGÀY THÌ THỰC HIỆN Ở API REGISTER
					  */
				} else {
					$flag = false;
					$msg = "Cập nhật trạng thái đơn hàng không thành công";
				}
			}
		}

		if ($flag) {

			//Tạo một trạng thái giao hàng: bất kỳ từ shipper_status
			$delivery_history->set('shipper_id', $dDel['shipper_id']);
			$delivery_history->set('order_id', $dDel['order_id']);
			$delivery_history->set('order_created_at', $dDel['order_created_at']);
			$delivery_history->set('shop_id', $dDel['shop_id']);
			$delivery_history->set('delivery_id', $dDel['id']);
			$delivery_history->set('shipper_status', $shipper_status);
			$delivery_history->set('minus_points', $delivery_history_minus_points);
			$delivery_history->set('note', $delivery_history_note);
			$delivery_history->set('is_hidden', 0);
			$delivery_history->set('created_by', $confirm_by);
			$delivery_history->add();

			if ($shipper_status != -1 && $shipper_status != -3 ) {
				//Trường hợp -1 Showroom không nhận giao luôn=> ở trên đã update trạng thái nên bỏ qua nếu rơi vào trường hợp này
				$this->set('id', $id);
				$this->set('shipper_status', $shipper_status);
				$this->set('note', $shipper_note);
				$this->update_shipper_status();
			}

			if ($shipper_status == 3) {
				//Đơn thành công xem ai là người xác nhận đơn thành công
				$this->set('id', $id);
				$this->set('confirm_by', $confirm_by);
				$this->set('confirm_type', $confirm_type);
				$this->update_confirm_info();
			}
		}

		$kq['flag'] = $flag;
		$kq['msg'] 	= $msg;

		return $kq;
	}
	
	public function update_done_now( $dDel ){
		global $db, $collected_orders, $order, $detail_order, $main, $notification, $product, $showroom, $dClientLogin, $voucher, $shop, $setup;

		$members             	= new members();
		$delivery_history     	= new delivery_history();
		$wallet_transaction 	= new wallet_transaction();
		$collected_payments 	= new collected_payments();
		$wallet_detail     		= new wallet_detail();

		//Trường hợp đơn hàng được update hoàn thành

		$order->set('id', $dDel['order_id']);
		$order->set('status', '1');
		$order->update_delivery_status($dDel['shop_id'], $dDel['created_at']);

		$collected_orders->set('order_id', $dDel['order_id']);
		$collected_orders->set('status', '1');
		$collected_orders->update_status();
		
		//List ALL
		$collected_payments->set('shop_id', $dDel['shop_id']);
		$collected_payments->set('order_id', $dDel['order_id']);
		$lPaymentType = $collected_payments->list_by_order();

		$payment_cashback 		= 0;
		$payment_wallet 		= 0;
		$payment_COD 			= 0;
		foreach ($lPaymentType as $key => $item) {

			if ($item['id'] == $setup['payment_type_wallet_main']) {
				$payment_wallet = $item['total'];
			} else if ($item['id'] == $setup['payment_type_wallet_cashback']) {
				$payment_cashback = $item['total'];
			} else if ($item['id'] = $setup['payment_type_COD']) {
				$payment_COD = $item['total'];
			}
		}

		//BEGIN Tặng voucher cho user
		$dValDevidend = $detail_order->devidend_service_fee($dDel['shop_id'], $dDel['order_id'], $dDel['order_created_at']);
		// if ($dValDevidend['total_product'] >= $setup['give_voucher_free_ship'] && $payment_cashback == 0) {

		// 	$product->set('id', $setup['voucher_free_ship_id']);
		// 	$dlProduct = $product->get_detail_provou();

		// 	$voucher->set('client_id', $dDel['customer_id']);
		// 	$voucher->set('product_id', $dlProduct['id']);
		// 	$voucher->set('sku_id', $dlProduct['unique_id']);
		// 	$voucher->set('content', $dlProduct['name']);
		// 	$voucher->set('price', $dlProduct['price']);
		// 	$voucher->set('status', 0);
		// 	$voucher->set('type', 0);
		// 	$voucher->set('exp_date', strtotime(date('m/d/Y')) + 30 * 86400);
		// 	$voucher->set('order_created', $dDel['order_id']);
		// 	$voucher->add();

		// 	$subject = 'Bạn được tặng Voucher';
		// 	$content = 'Đơn hàng ' . $dDel['order_id'] . ' đã được xác nhận thành công. Bạn nhận được 1 Voucher Free_Ship. Hãy mua đơn hàng tiếp theo để sử dụng Voucher này.';
		// 	$notification->set('to', $dDel['customer_id'] . ';');
		// 	$notification->set('subject', $subject);
		// 	$notification->set('content', $content);
		// 	$notification->set('created_by', 0);
		// 	$notification_id = $notification->add();

		// 	$post['to'] = '/topics/client_' . $dDel['customer_id'];
		// 	$post['priority']  = 'high';
		// 	$ii['title']  = $subject;
		// 	$ii['body']   = $content;
		// 	$post['notification'] = $ii;
		// 	$post['data']['force_refresh'] = true;
		// 	$post['data']['notify_id']     = $notification_id;
		// 	$main->sendFCM($post);
		// }
		//END Tặng voucher cho user


		/**
		 * BEGIN UPDATE TOTAL SPENT & UPDATE LEVEL TO USER
		 */
		/*
		- Thêm spent vào members
		- Tích điểm theo cơ chế định sẵn
		- Thêm vào member_transaction
		*/

		$total_cash = ($payment_COD + $payment_wallet) - $dValDevidend['ship_fee'] - $dValDevidend['package_fee'] - $dValDevidend['discount'];

		if ($total_cash > 0) {
			$mTrans = new member_transaction();

			if ($setup['loyalty_status'] == 1) {
				if ($total_cash > 0)
					$extra_point = floor(@$total_cash / $setup['loyalty_convert']);
				else
					$extra_point = 0;
			} else {
				$extra_point = 0;
			}

			//update spent total
			$members->set('user_id', $dDel['customer_id']);
			$members->set('total_spent', $total_cash);
			$members->set('point', $extra_point);
			$members->update_spent_and_point();

			//thêm transaction
			$dShop = $shop->get_detail($dDel['shop_id']);
			$mTrans->set('user_id', $dDel['customer_id']);
			$mTrans->set('point', $extra_point); //tích điểm và cập nhật điểm
			$mTrans->set('spent', $total_cash);
			$mTrans->set('shop_name', $dShop['name']);
			$mTrans->set('shop_id', $dDel['shop_id']);
			$mTrans->set('order_id', $dDel['order_id']);
			$mTrans->add_update();

			//Cập nhật lên cấp tạm thời sau 10/04 tính tiếp
			$members->set('user_id', $dDel['customer_id']);//id user con thay đổi để up cho cha
			$members->level_up_execute();
			
		}
		/**
		 * END UPDATE TOTAL SPENT & UPDATE LEVEL TO USER
		 */

		/**
		 * BEGIN THÊM USER GẮN MẶC ĐỊNH VÀO 1 USER TẠO ĐƠN, TRONG VÒNG 90 NGÀY THÌ THỰC HIỆN Ở API REGISTER
		*/
		//LẤY SDT TRONG ĐỊA CHỈ GIAO HÀNG => KTRA XEM ĐÃ TẠO CHƯA NẾU CHƯA THÌ TẠO TẠO RỒI THÌ THÔI => NẾU TRƯỜNG HỢP SỐ NÀY VẪN CHƯA ACTIVATE => GÁN LẠI REFERRAL: NPP REFERRAL VÀ DIRECT REFERRAL VÀ REFERRAL BY

		$members->set('user_id', $dDel['customer_id']);
		$dClientOrder = $members->get_detail();

		if( $dDel['is_delivery'] == 1 && isset($dClientOrder['user_id']) && 
			in_array( $dClientOrder['member_group_id'], explode(';', $setup['member_group_id_khachhang']) )
			){//Giao hang va nguoi dat la khach hang/dai ly

			$dOrder 			= $order->get_detail($dDel['shop_id'], $dDel['order_id'], $dDel['order_created_at']);

			if( isset($dOrder['id']) && $dOrder['address_book_id'] > 0 ){
				
				//address_book_id
				$address_book = new address_book();
				$address_book->set('id', $dOrder['address_book_id']);
				$dAddBook = $address_book->get_detail();

				if( isset($dAddBook['id']) && $dAddBook['mobile'] != '' ){
					$mobile = $dAddBook['mobile'];
					$members->set('mobile', $dAddBook['mobile']);
					$dClientMobile = $members->get_by_mobile();

					if ( !isset($dClientMobile['user_id']) ) {

						if ($dClientOrder['license_to'] > 0) {
							//đã kích hoạt đại lý
							$direct_referral = $dClientOrder['user_id'];
						} else {
							//Chưa kích hoạt đại lý
							$direct_referral = $dClientOrder['direct_referral'];
						}
						$npp_referral       = $dClientOrder['npp_referral'];

						$members->set('user_id', '');
						$members->set('avatar', '');
						$members->set('is_wholesale_customer', 0);
						$members->set('password', '');
						$members->set('fullname', '');
						$members->set('mobile', $mobile);

						$members->set('code', '');
						$members->set('referral_by', $dClientOrder['mobile']);
						$members->set('pkd', '');

						$members->set('bank_name', '');
						$members->set('bank_account', '');
						$members->set('bank_fullname', '');
						$members->set('bank_branch', '');
						$members->set('bank_city', '');

						$members->set('member_department_id', $setup['default_member_department_id']);
						$members->set('cum', '');
						$members->set('kvkd', '');
						$members->set('gdkd', '');
						$members->set('chinhanh', '');

						$members->set('day', '');
						$members->set('month', '');
						$members->set('year', '');

						$members->set('city', '');
						$members->set('district', '');
						$members->set('ward', '');
						$members->set('address', '');
						$members->set('direct_referral', $direct_referral);
						$members->set('npp_referral', $npp_referral);

						$members->set('member_group_id', $setup['member_group_id_khachhang_moi']);
						$members->set('total_spent', 0);
						$members->set('point', 0);
						$members->set('tax', 0);
						$members->set('email', '');
						$members->set('facebook', '');
						$members->set('note', '');
						$members->set('by_user_cs', $setup['default_by_user_cs']);
						$members->set('shop_id', 1);
						$members->set('cmnd', ''); //
						$members->set('sex', 0); //
						$members->set('city_id', 0); //
						$members->set('district_id', 0); //
						$members->set('ward_id', 0); //
						$members->set('created_by', 'AUTOMAP');//Tự động map, khi số phone là do người dùng add
						$members->set('is_local_created', 0);
						$user_id_new = $members->add();

						$members->set('user_id', $user_id_new);
						$members->set('activate', 1);
						$members->update_verified_mobile();

					}elseif( $dClientMobile['activate'] == 0 && $dClientMobile['last_logged'] == 0 ){

						if ($dClientOrder['license_to'] > 0) {
							//đã kích hoạt đại lý
							$direct_referral = $dClientOrder['user_id'];
						} else {
							//Chưa kích hoạt đại lý
							$direct_referral = $dClientOrder['direct_referral'];
						}
						$npp_referral       = $dClientOrder['npp_referral'];

						$members->set('direct_referral', $direct_referral);
						$members->set('npp_referral', $npp_referral);
						$members->set('referral_by', $dClientOrder['mobile']);
						$members->set('user_id', $dClientMobile['user_id']);
						$members->re_update_inactivate_by_parent();

						$members->set('activate', 1);
						$members->update_verified_mobile();

					}
					
				}
			}
		}

		//TẠO USER VỚI THÔNG TIN NPP REFERRAL VÀ DIRECT REFERRAL

		/**
		 * END THÊM USER GẮN MẶT ĐỊNH VÀO 1 USER TẠO ĐƠN, TRONG VÒNG 90 NGÀY THÌ THỰC HIỆN Ở API REGISTER
		*/


		//Cập nhật đơn cho thành công luôn
		$this->set('id', $dDel['id']);

		$this->set('shipper_status', 3);
		$this->set('note', 'Đơn tự động hoàn thành');
		$this->update_shipper_status();
		
		$this->set('confirm_by', $dDel['customer_id']);
		$this->set('confirm_type', 'KH');
		$this->update_confirm_info();
		
		return true;
	}

	public function delivery_status_label(){

		$shipper_status = $this->get('shipper_status');

		if( $shipper_status == 0 ) 
		   return 'Chờ xử lý';
		elseif( $shipper_status == 1 ) 
            return 'Chờ duyệt';
        elseif( $shipper_status == 2 ) 
            return 'Đang đóng gói';
        elseif( $shipper_status == 3 ) 
            return 'Đang giao hàng';
        elseif( $shipper_status == 4 ) 
            return 'Đã giao hàng';
        elseif( $shipper_status == 5 ) 
            return 'Đã đối soát';
        elseif( $shipper_status == -1 ) 
            return 'Đơn hủy';
        else
			return 'Không xác định';
		
	}
}
$delivery = new delivery();
