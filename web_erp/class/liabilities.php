<?php
class liabilities extends model{
	
	protected $class_name = 'liabilities';
	protected $id;
	protected $customer_id;
	protected $customer_name;
	protected $customer_mobile;
	protected $customer_type;//=0 from POS (members table), = 1 warehouse internal; = 2 from providers or supplier	
	protected $code;
	protected $total;
	protected $total_paid;
	protected $total_left;
	protected $next_pay;
	protected $updated_by;
	protected $username;
	protected $shop_id;
	protected $shop_name;
	protected $type;//=KH is customer liabilities, SP = cho nhà cung cấp
	protected $receipt;//url link images
	protected $order_id;
	protected $order_created_at;
	protected $is_from_warehouse;
	protected $deleted;
	protected $last_updated;
	protected $created_at;
	protected $hold_date;
	protected $last_notice;

	public function add(){
		global $db;
		
		$shop_id = $this->get('shop_id');
		$arr['customer_id'] = $this->get('customer_id')+0;
		$arr['customer_name'] = $this->get('customer_name');
		$arr['customer_mobile'] = $this->get('customer_mobile');
		$arr['customer_city'] = $this->get('customer_city');
		$arr['customer_type'] = $this->get('customer_type')+0;
		$arr['code'] = $this->get_new_code( $shop_id );
		$arr['total'] = $this->get('total');
		$arr['total_paid'] = $this->get('total_paid');
		$arr['next_pay'] = $this->get('next_pay');
		$arr['updated_by'] = $this->get('updated_by');
		$arr['username'] = $this->get('username');
		$arr['shop_id'] = $shop_id;
		$arr['shop_name'] = $this->get('shop_name');
		$arr['type'] = $this->get('type');
		$arr['receipt'] = $this->get('receipt');
		$arr['order_id'] = $this->get('order_id');
		$arr['order_created_at'] = $this->get('order_created_at');
		$arr['is_from_warehouse'] = $this->get('is_from_warehouse');
		$arr['hold_date'] = $this->get('hold_date');

		$arr['total_left'] = $arr['total'] - $arr['total_paid'];
		$arr['deleted'] = 0;
		$arr['last_notice'] = 0;
		$arr['last_updated'] = time();
		$arr['created_at'] = time();

		$db->record_insert($this->class_name, $arr);
		return $db->mysqli_insert_id();
	}
	
	public function update_paid(){
		global $db;

		$id = $this->get('id');

		$arr['total_paid'] = $this->get('total_paid');
		$arr['next_pay'] = $this->get('next_pay');
		$arr['total_left'] = $this->get('total_left');

		$arr['updated_by'] = $this->get('updated_by');
		// $arr['username'] = $this->get('username');
		
		$arr['last_updated'] = time();

		$db->record_update($this->class_name, $arr, " `id` = '$id' ");
		return $id;
	}

	public function update_delete_lia_history( $total_collected ){
		global $db;

		$id = $this->get('id');
		$dThis = $this->get_detail();

		$arr['total_paid'] 		= $dThis['total_paid'] - $total_collected;
		$arr['next_pay'] 		= $dThis['next_pay'] - $dThis['hold_date']*86400;
		$arr['total_left'] 		= $dThis['total_left'] + $total_collected;
		$arr['updated_by'] 		= $this->get('updated_by');
		$arr['last_updated'] 	= time();
		
		$db->record_update($this->class_name, $arr, " `id` = '$id' ");
		return $id;
	}

	public function update_next_pay(){
		global $db;

		$id = $this->get('id');
		$arr['next_pay'] = $this->get('next_pay');
		$arr['last_updated'] = time();

		$db->record_update( $this->class_name, $arr, " `id` = '$id' ");
		return $id;
	}
	
	public function update_debts_supplier(){
		global $db;

		$id = $this->get('id');

		$arr['next_pay'] = $this->get('next_pay');
		$arr['hold_date'] = $this->get('hold_date');
		$arr['total'] = $this->get('total');

		$db->record_update( $this->class_name, $arr, " `id` = '$id' ");
		return $id;
	}

	public function get_new_code( $shop_id ){
		global $db;
		
		$time = strtotime( date('m/d/Y') );
		$sql = "SELECT code FROM ".$db->tbl_fix."`liabilities`
				WHERE `created_at` > $time AND `shop_id` = '$shop_id'
				ORDER BY id DESC LIMIT 1";
		$row = $db->executeQuery ( $sql, 1 );
		
		if( empty($row['code']) ){
			$code = $shop_id.date('Ymd').'-001';
		}else{
			$num = explode('-', $row['code']);
			$num = @$num[1] + 1;
			$code = $shop_id.date('Ymd').'-'.sprintf( "%03d", $num );
		}
		
		return $code;
	}

	//Tổng công nợ còn tồn động trước đó: sum_total_left_from
	public function sum_total_left_from( $from ){
		global $db;
		
		$customer_id 		= $this->get('customer_id');//members_id/providers_id
		$type 				= $this->get('type');//KH/SP
		$shop_id 			= $this->get('shop_id');

		if( $shop_id != '' ) $shop_id = " AND `lia`.shop_id = '$shop_id' ";

		$sql = "SELECT SUM(`total_left`) total
				FROM `liabilities` as lia
				WHERE `lia`.total_left > 0
				AND lia.`customer_id` < '$customer_id'
				AND lia.`type` < '$type'
				$shop_id
				AND lia.`created_at` < '$from'
				ORDER BY `created_at` DESC";

		$result = $db->executeQuery( $sql, 1 );
		
		return $result['total'];
	}

	//danh cho tải danh sách công nợ cần thanh toán ở module sổ quỷ thu chi
	public function list_period_customer_id_to_pay( $from, $to ){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');
		if( $shop_id != '' ) $shop_id = " `lia`.shop_id = '$shop_id' AND ";
		
		$sql = "SELECT *
				FROM `liabilities` as lia
				WHERE 
				$shop_id `lia`.`customer_id` = '$customer_id'
				AND `lia`.total_left > 0
				AND lia.`type` = '$type'
				AND '$from' < lia.`created_at` AND lia.`created_at` < '$to'
				ORDER BY `created_at` DESC";
		
		$l = $db->executeQuery_list( $sql );
		
		return $l;
	}


	public function list_period_customer_id_paid( $from, $to ){
		global $db;
		
		$customer_id 		= $this->get('customer_id');//members_id/providers_id
		$type 				= $this->get('type');//KH/SP
		$shop_id 			= $this->get('shop_id');
		
		if( $shop_id != '' ) $shop_id = " AND `lia`.shop_id = '$shop_id' ";

		$sql = "SELECT *
				FROM `liabilities` lia
				INNER JOIN `liabilities_history` liahis ON liahis.`liabilities_id` = lia.`id`
				WHERE
				'$from' < liahis.`created_at`
				AND liahis.`created_at` < '$to'
				AND lia.`customer_id` = '$customer_id'
				AND lia.`type` < '$type'
				$shop_id
				ORDER BY id DESC";
		
		$l = $db->executeQuery_list( $sql );
		
		return $l;
	}

	//danh cho tải danh sách công nợ cần thanh toán ở module sổ quỷ thu chi
	public function list_by_customer_id_to_pay(){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');
		
		if( $shop_id != '' ) $shop_id = " `lia`.shop_id = '$shop_id' AND ";

		$sql = "SELECT *
				FROM `liabilities` as lia
				WHERE 
				$shop_id `lia`.`customer_id` = '$customer_id'
				AND `lia`.total_left > 0
				AND lia.`type` = '$type'
				ORDER BY `created_at` DESC";
		
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	//danh cho tải danh sách công nợ cần thanh toán ở module công nợ thành viên
	public function list_by_customer_id_liabilities_debt(){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');
		
		if( $shop_id != '' ) $shop_id = " `lia`.shop_id = '$shop_id' AND ";

		$sql = "SELECT *
				FROM `liabilities` as lia
				WHERE 
				$shop_id `lia`.`customer_id` = '$customer_id'
				AND `lia`.total_left < 0
				AND lia.`type` = '$type'
				ORDER BY `created_at` DESC";
		
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_customer_id( $offset = 0, $limit = '' ){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');
		
		$sqlShop = '';
        if( $shop_id != '' ){
            $lRMD = explode( ';', $shop_id);
            foreach ($lRMD as $itNe) {
                if( $itNe != '' )
                    $sqlShop .= " `lia`.shop_id = '$itNe' OR";
            }
            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

		if( $limit != '' ) $limit = " LIMIT $offset, $limit";
		
		$sql = "SELECT nTB.*
				FROM
				(
					SELECT lia.*, IF(lia.`total_left` > 0, 1, 0) is_waiting
					FROM `liabilities` as lia
					WHERE 
					`lia`.`customer_id` = '$customer_id'
					AND lia.`type` = '$type'
					$sqlShop
				) nTB
				ORDER BY `is_waiting` DESC, `created_at` DESC
				$limit";

		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	public function list_by_customer_id_count(){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');

		$sqlShop = '';
        if( $shop_id != '' ){
            $lRMD = explode( ';', $shop_id);
            foreach ($lRMD as $itde) {
                if( $itde != '' )
                    $sqlShop .= " `lia`.shop_id = '$itde' OR";
            }
            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }
		
		$sql = "SELECT COUNT(*) total
				FROM `liabilities` as lia
				WHERE 
				 `lia`.`customer_id` = '$customer_id'
				AND lia.`type` = '$type' $sqlShop ";
		
		$result = $db->executeQuery( $sql, 1 );
		
		return $result['total']+0;
	}

	public function list_by_customer_id_sum(){
		global $db;
		
		$customer_id 		= $this->get('customer_id');
		$type 				= $this->get('type');
		$shop_id 			= $this->get('shop_id');

		$sqlShop = '';
        if( $shop_id != '' ){
            $lRMD = explode( ';', $shop_id);
            foreach ($lRMD as $itde) {
                if( $itde != '' )
                    $sqlShop .= " `lia`.shop_id = '$itde' OR";
            }
            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }
		
		$sql = "SELECT COUNT(*) total_record, SUM(`total`) total_value, SUM(`total_paid`) total_paid, SUM(`total_left`) total_left
				FROM `liabilities` as lia
				WHERE `lia`.`customer_id` = '$customer_id'
				AND lia.`type` = '$type' $sqlShop ";

		$r = $db->executeQuery( $sql, 1 );
		
		return array(
			'total_record' => isset($r['total_record']) ? $r['total_record']:0,
			'total_value' => isset($r['total_value']) ? $r['total_value']:0,
			'total_paid' => isset($r['total_paid']) ? $r['total_paid']:0,
			'total_left' => isset($r['total_left']) ? $r['total_left']:0,
		);
	}

	public function list_by_selected( $lSelected ){
		global $db;

		$condition = '';
		$lSelected = explode(':', $lSelected);
		foreach ($lSelected as $key => $item) {
			if( $item != '' ) $condition .= " `lia`.`id` = $item OR ";
		}
		
		$kq = array();
		if( $condition != '' ){
			$condition = substr($condition,0, -3);
			$sql = "SELECT * FROM `liabilities` as lia WHERE `lia`.`type` = 'SP' AND ( $condition ) ORDER BY `next_pay` ASC";
			$kq = $db->executeQuery_list( $sql );
		}
		
		return $kq;
	}


	public function get_by_order_id(){
		global $db;
		
		$customer_id = $this->get('customer_id');
		$order_id = $this->get('order_id');
		
		$sql = "SELECT * FROM `liabilities` as lia WHERE `lia`.`order_id` = '$order_id' AND `lia`.`customer_id` = '$customer_id' LIMIT 1";
		
		$result = $db->executeQuery( $sql, 1 );
		
		return $result;
	}

	public function get_total_left(){
		global $db;
		
		$customer_id 	= $this->get('customer_id');
		$type 			= $this->get('type');

		$sql = "SELECT SUM( lia.`total_left`) AS `total_left`
				FROM `liabilities` AS lia
				WHERE `total_paid` < `total` AND `customer_id` = '$customer_id' AND `lia`.`type` = '$type'
				GROUP BY `customer_id`";

		$result = $db->executeQuery( $sql, 1 );

		return ($result['total_left']+0);
	}

	public function get_sum_current_liabilities(){//tong tren tong no
		global $db;

		$customer_id = $this->get('customer_id');
		$type = $this->get('type');

		$sql = "SELECT SUM( lia.total ) AS `total`
				FROM `liabilities` AS lia
				WHERE `total_paid` < `total` AND `customer_id` = '$customer_id' AND `lia`.type = '$type'
				GROUP BY `customer_id`";
		
		$result = $db->executeQuery( $sql, 1 );

		return @($result['total']+0);
	}

	public function get_sum_left_current_liabilities(){//tong tren tong no
		global $db;

		$customer_id = $this->get('customer_id');
		$type = $this->get('type');

		$sql = "SELECT SUM( `lia`.`total_left` ) AS `total`
				FROM `liabilities` AS lia
				WHERE lia.`total_paid` < lia.`total` AND `customer_id` = '$customer_id' AND `lia`.type = '$type'
				GROUP BY `customer_id` ";
		
		$result = $db->executeQuery( $sql, 1 );

		return @($result['total']+0);
	}

	public function list_by($arrSort, $offset = 0, $limit = ''){
		global $db;

		$city = $this->get('city');
		// $type = $this->get('type');

		if( $limit >0 ) $limit = " LIMIT $offset, $limit";
		if( $city != '' ) $city = " AND `lia`.`customer_city` = '$city'";

		$sorting = '';

		if( isset( $arrSort['total'] ) && $arrSort['total'] != '' )
			if(	$arrSort['total'] == 'up'){
				$sorting = " `total` ASC ";
			}else{
				$sorting = " `total` DESC ";
			}

		if( isset( $arrSort['total_paid'] ) && $arrSort['total_paid'] != '' )
			if(	$arrSort['total_paid'] == 'up'){
				$sorting = " `total_paid` ASC ";
			}else{
				$sorting = " `total_paid` DESC ";
			}

		if( isset( $arrSort['next_pay'] ) && $arrSort['next_pay'] != '' )
			if(	$arrSort['next_pay'] == 'up'){
				$sorting = " `next_pay` ASC ";
			}else{
				$sorting = " `next_pay` DESC ";
			}

		if( isset( $arrSort['last_updated'] ) && $arrSort['last_updated'] != '' )
			if(	$arrSort['last_updated'] == 'down'){
				$sorting = " `last_updated` DESC ";
			}else{
				$sorting = " `last_updated` ASC ";
			}
		if( $sorting == '' ){
			$sorting = " `next_pay` DESC ";
		}
		$sql = "SELECT *
					FROM (
						SELECT SUM( lia.total_paid ) AS total_paid, SUM( lia.total_left ) AS `total_left` , SUM( lia.total ) AS `total` , MIN(next_pay) AS next_pay, customer_id,customer_name, customer_mobile, updated_by, last_updated, `members`.is_bad_debts
						FROM `liabilities` AS lia
						INNER JOIN `members`
						ON `members`.`user_id` = lia.`customer_id`
						WHERE `total_paid` < `total`
						GROUP BY `customer_id`
					) AS nT
				ORDER BY $sorting ".$limit;

		$result = $db->executeQuery_list( $sql );

		return $result;
	}
	
	public function list_all_by_customer_id(){
		global $db;
		$customer_id = $this->get('customer_id');
		$type = $this->get('type');

		$sql = "SELECT total_paid, `total_left` , `total` , `next_pay`, customer_id, customer_name, customer_mobile, updated_by, last_updated, code, id
				FROM `liabilities` AS lia
				WHERE `total_paid` < `total` AND lia.`type` = '$type' AND `lia`.customer_id = '$customer_id' ";
		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}
		return $kq;
	}

	public function list_by_count(){
		global $db;
		$city = $this->get('city');

		if( $city != '' ) $city = " AND `lia`.`customer_city` = '$city'";
		$sql = "SELECT COUNT(id) as total 
				FROM(
					SELECT id
					FROM `liabilities` AS lia
					WHERE `total_paid` < `total`
					GROUP BY `customer_id`
					) AS nT
				";
		$result = $db->executeQuery( $sql, 1 );
		return @$result['total']+0;
	}

	public function list_by_supplier($arrSort, $from_date, $to_date, $offset = 0, $limit = ''){
		global $db;

		$sorting = '';

		if( $limit >0 ) $limit = " LIMIT $offset, $limit";

		if( isset( $arrSort['total'] ) && $arrSort['total'] != '' )
			if(	$arrSort['total'] == 'up'){
				$sorting = " `total` ASC ";
			}else{
				$sorting = " `total` DESC ";
			}

		if( isset( $arrSort['total_paid'] ) && $arrSort['total_paid'] != '' )
			if(	$arrSort['total_paid'] == 'up'){
				$sorting = " `total_paid` ASC ";
			}else{
				$sorting = " `total_paid` DESC ";
			}

		if( isset( $arrSort['next_pay'] ) && $arrSort['next_pay'] != '' )
			if(	$arrSort['next_pay'] == 'up'){
				$sorting = " `next_pay` ASC ";
			}else{
				$sorting = " `next_pay` DESC ";
			}

		if( isset( $arrSort['last_updated'] ) && $arrSort['last_updated'] != '' )
			if(	$arrSort['last_updated'] == 'down'){
				$sorting = " `last_updated` DESC ";
			}else{
				$sorting = " `last_updated` ASC ";
			}

		if( $sorting == '' ){
			$sorting = " `next_pay` DESC ";
		}

		$sql = "SELECT *
					FROM (
						SELECT SUM( lia.total_paid ) AS total_paid, SUM( lia.total_left ) AS `total_left` , SUM( lia.total ) AS `total` , MIN(next_pay) AS next_pay, customer_id, customer_name, customer_mobile, updated_by, last_updated
						FROM `liabilities` AS lia
						WHERE `total_paid` < `total` AND lia.`type` = 'SP' AND '$from_date' < lia.`next_pay` 
						GROUP BY `customer_id`
					) AS nT
				ORDER BY $sorting ".$limit;

		$result = $db->executeQuery( $sql );

		$kq = array();
		while ( $row = mysqli_fetch_assoc( $result ) ) {
			$kq[] = $row;
		}
		
		return $kq;
	}

	public function list_by_supplier_count( $from_date, $to_date){
		global $db;

		$sql = "SELECT COUNT(id) as total 
				FROM(
					SELECT id
					FROM `liabilities` AS lia
					WHERE `total_paid` < `total` AND lia.`type` = 'SP' AND '$from_date' < lia.`next_pay` AND '$to_date' < lia.`next_pay`
					GROUP BY `customer_id`
					) AS nT
				";
		$result = $db->executeQuery( $sql, 1 );

		return $result['total']+0;
	}

	public function searching_liabilities_by_member($keyword, $offset = 0, $limit = ''){
		global $db;
		$type = $this->get('type');

		$sql = "SELECT *
					FROM (
						SELECT SUM( lia.total_paid ) AS total_paid, SUM( lia.total_left ) AS `total_left` , SUM( lia.total ) AS `total` , MIN(next_pay) AS next_pay, customer_id,customer_name, customer_mobile, updated_by, last_updated
						FROM `liabilities` AS lia
						WHERE `total_paid` < `total` AND (`customer_name` LIKE '%".$keyword."%' OR `customer_mobile` LIKE '%".$keyword."%') AND lia.`type` = '$type'
						GROUP BY `customer_id`
					) AS nT
				ORDER BY `customer_name` ".$limit;

		$result = $db->executeQuery( $sql );

		$kq = array();
		while ( $row = mysqli_fetch_assoc( $result ) ) {
			$kq[] = $row;
		}
		
		return $kq;
	}
	
	public function liabilities_coming(){
		global $db;
		
		$time = strtotime( date('m/d/Y') )+86400;
		$type = $this->get('type');

		$sql = "SELECT *
				FROM `liabilities` AS lia
				WHERE `total_paid` < `total` AND `next_pay` < $time AND `last_notice` < $time AND lia.`type` = '$type'
				GROUP BY `next_pay`";
		
		$result = $db->executeQuery( $sql );
		$kq = array();

		while( $row = mysqli_fetch_assoc( $result ) ){
			$kq[] = $row;
		}

		return $kq;
	}

	public function update_last_notice( $liabilities_id ){
		global $db;
		$arr['last_notice'] = strtotime(date('m/d/Y')) + 86400*2;
		$db->record_update($this->class_name, $arr, " `id` = '$liabilities_id' ");
		return true;
	}

	public function collect_fund( $id, $amount, $payment_type, $dUserLogin, $is_create_treasurer, $treasurer_group_id, $note ='' ){
		
		global $treasurer, $lang;
		$liabilities_history = new liabilities_history();

		$this->set('id', $id);
		$dLia = $this->get_detail();
		$shop_id = $dLia['shop_id'];

		$receipt = '';
		//khởi tạo phiếu thu nếu người dùng muốn
		if( $is_create_treasurer == 1 ){

			$MA = $treasurer->nextMa( $shop_id, 'T');

			$treasurer->set('MA', $MA );
			$treasurer->set('MATT', $dLia['order_id'] );//'OrderID:Warehouse Import ID'; hoac order_id; hoac export id
			$treasurer->set('loai', $dLia['type'] == 'SP' ? 'C':'T' );
			$treasurer->set('shop_id', $shop_id );
			$treasurer->set('ngay', date('d/m/Y') );
			$treasurer->set('day', date('d') );
			$treasurer->set('month', date('m') );
			$treasurer->set('year', date('Y') );
			$treasurer->set('hinh_thuc', $payment_type );
			$treasurer->set('ghi_chu', $note == '' ? 'ID:'.$dLia['code'].',Số tiền:'.$amount.';':$note );
			$treasurer->set('so_tien', $amount );
			$treasurer->set('nguoi_tao', $dUserLogin['username'] );
			$treasurer->set('nop_nhan', $dLia['customer_name'] );
			$treasurer->set('noi_dung', $dLia['type'] == 'SP' ? $lang['lb_treSpend']:$lang['lb_treEarn'] );
			$treasurer->set('chung_tu', '' );
			//Nếu có set thì chọn cái set, còn không thì tự xác định dựa trên loại thu chi
			$treasurer->set('treasurer_group_id', $treasurer_group_id > 0 ? $treasurer_group_id:( $dLia['type'] == 'SP' ? '3':($dLia['type'] == 'KH' ? '2':'0') ) );//Loại Thu/Chi = Bán Hàng;; Nhóm sổ quỹ: Tổng hợp =0; 2 bán hàng; 3 kho hàng;
			$treasurer->set('customer_id', $dLia['customer_id'] );
			
			if( $dLia['is_from_warehouse'] == 1 )//từ nhập kho
				$treasurer->set('is_from', 1 );//loại mã nhập là mã nhập kho
			else
				$treasurer->set('is_from', 2 );//đơn hàng POS
			
			$treasurer->set('is_auto', 1 );//Được xem là tự động: vì này là thu công nợ => tự động tạo ra treasurer

			$receipt = $treasurer->add();

		}

		//Tạo lịch sử công nợ tại đây: trước đó là dựa vào có tạo phiếu thu công nợ không, có hay không thì tùy thôi
		//update part of liabilities
		$liabilities_history->set('liabilities_id', $dLia['id'] );
		$liabilities_history->set('created_by', $dUserLogin['fullname']);
		$liabilities_history->set('username', $dUserLogin['username']);
		$liabilities_history->set('collected', $amount );
		$liabilities_history->set('left_total', $dLia['total_left'] - $amount );
		$liabilities_history->set('receipt', $receipt);//$MA là mã thu của giao dịch này
		$liabilities_history->set('payment_type', $payment_type);//$MA là mã thu của giao dịch này
		$liabilities_history->add();

		//update collected
		$this->set('total_paid', $dLia['total_paid'] + $amount );
		$this->set('total_left', $dLia['total_left'] - $amount);
		$this->set('next_pay', ( $dLia['next_pay'] + $dLia['hold_date']*86400 ) );//tính ngày cần trả nợ tiếp theo
		$this->set('updated_by', $dUserLogin['fullname']);
		$this->set('username', $dUserLogin['username']);
		$this->set('id', $dLia['id']);
		$this->update_paid();

		return true;
	}
	public function collect_minus_debt( $customer_id, $shop_id, $amount, $payment_type, $dUserLogin, $is_create_treasurer, $treasurer_group_id, $note ='' ){
		
		global $treasurer, $shop, $lang;
		$liabilities_history = new liabilities_history();

		$type = $this->get('type');

		$next_pay = strtotime(date('m/d/Y')) + 7*86400;
		$members = new members();
		$members->set('user_id', $customer_id);
		$dM = $members->get_detail();
		//first is creating liabilities
		$this->set('customer_id', $customer_id);
		$this->set('customer_name', $dM['fullname']);
		$this->set('customer_mobile', $dM['mobile']);
		$this->set('customer_city', $dM['address']);
		unset($dM);
		$this->set('total', 0);
		$this->set('total_paid', $amount);
		$this->set('next_pay', $next_pay);//thời gian tiếp đến để lấy công nợ khách hàng này dạng time LINUX
		$this->set('updated_by', $dUserLogin['fullname']);
		$this->set('username', $dUserLogin['username']);
		$this->set('shop_id', $shop_id );
		$dShop = $shop->get_detail( $shop_id );
		$this->set('shop_name', $dShop['name']);
		unset($dShop);
		$this->set('type', $type);//type is KH
		$this->set('receipt', '');
		$this->set('order_id', time().'AN');
		$this->set('order_created_at', time());
		$this->set('is_from_warehouse', 1);
		$this->set('hold_date', 7);//Mỗi một khoản thời gian là con số này, ví dụ công nợ 7 ngày thì liabilities_time = 7
		$this->set('customer_type', 2 );
		$liabilities_id = $this->add();

		$receipt = '';
		// khởi tạo phiếu thu nếu người dùng muốn

		$this->set('id', $liabilities_id);
		$dLia = $this->get_detail();

		if( $is_create_treasurer == 1 ){

			$MA = $treasurer->nextMa( $shop_id, 'T');
			$treasurer->set('MA', $MA );
			$treasurer->set('MATT', $dLia['order_id']);//'OrderID:Warehouse Import ID'; hoac order_id; hoac export id
			$treasurer->set('loai', $dLia['type'] == 'SP' ? 'C':'T' );
			$treasurer->set('shop_id', $shop_id );
			$treasurer->set('ngay', date('d/m/Y') );
			$treasurer->set('day', date('d') );
			$treasurer->set('month', date('m') );
			$treasurer->set('year', date('Y') );
			$treasurer->set('hinh_thuc', $payment_type );
			$treasurer->set('ghi_chu', $note == '' ? 'ID:'.$dLia['code'].',Số tiền:'.$amount.';':$note );
			$treasurer->set('so_tien', $amount );
			$treasurer->set('nguoi_tao', $dUserLogin['username'] );
			$treasurer->set('nop_nhan', $dLia['customer_name'] );
			$treasurer->set('noi_dung', $dLia['type'] == 'SP' ? $lang['lb_treSpend']:$lang['lb_treEarn'] );
			$treasurer->set('chung_tu', '' );
			//Nếu có set thì chọn cái set, còn không thì tự xác định dựa trên loại thu chi
			$treasurer->set('treasurer_group_id', $treasurer_group_id > 0 ? $treasurer_group_id:( $dLia['type'] == 'SP' ? '3':($dLia['type'] == 'KH' ? '2':'0') ) );//Loại Thu/Chi = Bán Hàng;; Nhóm sổ quỹ: Tổng hợp =0; 2 bán hàng; 3 kho hàng;
			$treasurer->set('customer_id', $dLia['customer_id'] );
			
			if( $dLia['is_from_warehouse'] == 1 )//từ nhập kho
				$treasurer->set('is_from', 1 );//loại mã nhập là mã nhập kho
			else
				$treasurer->set('is_from', 2 );//đơn hàng POS
			
			$treasurer->set('is_auto', 1 );//Được xem là tự động: vì này là thu công nợ => tự động tạo ra treasurer

			$receipt = $treasurer->add();

		}


		//Tạo lịch sử công nợ tại đây: trước đó là dựa vào có tạo phiếu thu công nợ không, có hay không thì tùy thôi
		//update part of liabilities
		$liabilities_history->set('liabilities_id', $dLia['id'] );
		$liabilities_history->set('created_by', $dUserLogin['fullname']);
		$liabilities_history->set('username', $dUserLogin['username']);
		$liabilities_history->set('collected', $amount );
		$liabilities_history->set('left_total', -$amount );
		$liabilities_history->set('receipt', $receipt);//$MA là mã thu của giao dịch này
		$liabilities_history->set('payment_type', $payment_type);//$MA là mã thu của giao dịch này
		$liabilities_history->add();

		return true;
	}
}
