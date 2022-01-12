<?php
class warehouse_import extends model{

	protected $class_name = 'warehouse_import';
	protected $id;
	protected $code;
	protected $warehouse_id;
	protected $import_date;
	protected $url;
	protected $providers_id;
	protected $export_for;
	protected $internal;//internal nhập nội bộ = 1; = > providers_id = shop_id đã nhập
	protected $created_date;
	protected $status;
	protected $type;
	protected $payment_type;//method_payment; = 1 payment_type
	protected $hold_date;
	protected $liabilities_id;
	protected $note;
	protected $treasurer_id;
	protected $confirmed_by;//User ID confirmed import warehouse
	protected $confirmed_at;//Time confirmed import at by confirmed_by
	protected $is_correction;
	protected $treasurer_group_id;//Lý do xuất
	
	public function create( $code, $wh_id, $import_date, $url ){
		global $db;
		
		$arr['code'] = $code;
		$arr['warehouse_id'] = $wh_id;
		$arr['import_date'] = $import_date+0;
		$arr['url'] = $url;
		$arr['treasurer_id'] = 0;
		$arr['confirmed_by'] = 0;
		$arr['confirmed_at'] = 0;
		$arr['is_correction'] = 0;
		$arr['treasurer_group_id'] = 0;
		$arr['created_date'] = time();
		
		$db->record_insert($db->tbl_fix."warehouse_import",$arr);		
		return $db->mysqli_insert_id();
	}
	
	public function init_wh( $code, $wh_id, $type ){
		global $db;
		
		$arr['code'] = $code;
		$arr['warehouse_id'] = $wh_id;
		$arr['type'] = $type;
		$arr['created_date'] = time();
		$arr['status'] = 0;
		$arr['payment_type'] = 0;
		$arr['hold_date'] = 0;
		$arr['treasurer_id'] = 0;

		$arr['confirmed_by'] = 0;
		$arr['confirmed_at'] = 0;
		$arr['is_correction'] = 0;
		$arr['treasurer_group_id'] = 0;
		
		$db->record_insert($db->tbl_fix."warehouse_import",$arr);
		return $db->mysqli_insert_id();
	}

	public function update_item(){
		global $db;
		
		$id			 			= $this->get('id');
		
		$arr['warehouse_id'] 	= $this->get('warehouse_id');
		$arr['import_date'] 	= $this->get('import_date')+0;
		$arr['providers_id'] 	= $this->get('providers_id');
		$arr['export_for'] 		= $this->get('export_for');
		$arr['internal'] 		= $this->get('internal');
		$arr['is_correction'] 	= $this->get('is_correction');
		$arr['url'] 			= $this->get('url');
		$arr['payment_type'] 	= $this->get('payment_type');
		$arr['hold_date'] 		= $this->get('hold_date');
		$arr['note'] 			= $this->get('note');
		$arr['treasurer_id'] 	= $this->get('treasurer_id');
		$arr['user_add'] 		= $this->get('user_add');
		
		$arr['treasurer_group_id'] 	= $this->get('treasurer_group_id');

		$db->record_update( $db->tbl_fix."`warehouse_import`", $arr, " `id` = '$id' ");
		
		return true;
	}
	
	public function update( $code, $wh_id, $import_date, $providers_id, $export_for, $internal ){
		global $db;
		
		$arr['code'] = $code;
		$arr['warehouse_id'] = $wh_id;
		$arr['import_date'] = $import_date+0;
		$arr['providers_id'] = $providers_id;
		$arr['export_for'] = $export_for;
		$arr['internal'] = $internal;
		
		$db->record_update($db->tbl_fix."warehouse_import",$arr," `code`='".$code."' AND `warehouse_id`='".$wh_id."'");		
		return true;
	}

	public function update_import_wh( $id, $wh_id, $providers_id, $export_for, $internal ){
		global $db;
		
		$arr['warehouse_id'] = $wh_id;
		$arr['providers_id'] = $providers_id;
		$arr['export_for'] = $export_for;
		$arr['internal'] = $internal;
		
		$db->record_update($db->tbl_fix."warehouse_import",$arr," `id`= '".$id."' ");		
		return true;
	}
	
	// public function update_status( $code, $wh_id, $note, $payment_type, $hold_date, $liabilities_id){
	// 	global $db;

	// 	if( $payment_type == 1 )
	// 		$payment_type = 1;
	// 	else{
	// 		$payment_type = 0;
	// 		$hold_date = 0;
	// 	}

	// 	$arr['payment_type'] = $payment_type;
	// 	$arr['liabilities_id'] = $liabilities_id;
	// 	$arr['hold_date'] = $hold_date;
	// 	$arr['note'] = $note;
	// 	$arr['status'] = 1;

	// 	$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `code`='".$code."' AND `warehouse_id`='".$wh_id."'");	
	// 	return true;
	// }
	
	public function update_status_item(){
		global $db;

		$id 					= $this->get('id');

		$arr['warehouse_id'] 	= $this->get('warehouse_id');
		$arr['import_date'] 	= $this->get('import_date')+0;
		$arr['providers_id'] 	= $this->get('providers_id');
		$arr['export_for'] 		= $this->get('export_for');
		$arr['is_correction'] 	= $this->get('is_correction');
		$arr['internal'] 		= $this->get('internal');
		$arr['url'] 			= $this->get('url');
		$arr['payment_type'] 	= $this->get('payment_type');
		$arr['liabilities_id'] 	= $this->get('liabilities_id');
		$arr['hold_date'] 		= $this->get('hold_date');
		$arr['note'] 			= $this->get('note');
		$arr['treasurer_id'] 	= $this->get('treasurer_id');
		$arr['status'] 			= 1;
		$arr['created_date'] 	= time();

		$arr['treasurer_group_id'] 	= $this->get('treasurer_group_id');

		if( $this->get('user_add') != '' ) $arr['user_add'] 	= $this->get('user_add');

		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `id` = '$id' ");	
		return $id;
	}

	public function update_status_item_save(){
		global $db;

		$id 					= $this->get('id');

		// $arr['warehouse_id'] 	= $this->get('warehouse_id');
		// $arr['import_date'] 	= $this->get('import_date');
		// $arr['providers_id'] 	= $this->get('providers_id');
		// $arr['export_for'] 		= $this->get('export_for');
		$arr['url'] 			= $this->get('url');
		$arr['note'] 			= $this->get('note');
		$arr['is_correction'] 	= $this->get('is_correction');

		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `id` = '$id' ");	
		return $id;
	}

	public function update_status_internal(){
		global $db;

		$id					= $this->get('id');
		$note				= $this->get('note');
		$import_date		= $this->get('import_date')+0;
		$payment_type		= $this->get('payment_type');
		$hold_date			= $this->get('hold_date');
		$liabilities_id		= $this->get('liabilities_id');
		$providers_id		= $this->get('providers_id');
		$user_add			= $this->get('user_add');

		$arr['payment_type'] 	= $payment_type;
		$arr['liabilities_id'] 	= $liabilities_id;
		$arr['hold_date'] 		= $hold_date;
		$arr['note'] 			= $note;
		$arr['user_add'] 		= $user_add;
		$arr['status'] 			= 1;
		$arr['internal'] 		= 1;
		$arr['providers_id'] 	= $providers_id;
		$arr['import_date'] 	= $import_date;

		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `id` = '$id' ");	
		return true;
	}
	
	public function update_status_syn_warehouse_import( $code, $wh_id, $note, $providers_id ){
		global $db;

		$arr['payment_type'] = 0;
		$arr['liabilities_id'] = 0;
		$arr['hold_date'] = 0;
		$arr['providers_id'] = $providers_id;
		$arr['note'] = $note;
		$arr['import_date'] = time();
		$arr['status'] = 1;
		
		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `code`='".$code."' AND `warehouse_id`='".$wh_id."'");	
		return true;
	}

	public function update_status_syn_warehouse_export( $code, $wh_id, $note, $export_for ){
		global $db;

		$arr['payment_type'] = 0;
		$arr['liabilities_id'] = 0;
		$arr['hold_date'] = 0;
		$arr['providers_id'] = 0;
		$arr['export_for'] = $export_for;
		$arr['note'] = $note;
		$arr['import_date'] = time();
		$arr['status'] = 1;
		
		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `code`='".$code."' AND `warehouse_id`='".$wh_id."'");	
		return true;
	}
	public function get_sum_invoice( $wh_import_id ){
		global $db;
		
		$sql = "SELECT SUM( whh.`amount` * whh.`price` *( (100 - whh.`decrement`)/100 ) ) as total
				FROM `warehouse_history` as whh
				WHERE whh.`wh_import_id` = '$wh_import_id' ";
		
		$result = $db->executeQuery ( $sql, 1 );
		
		return ($result['total']+0);
	}

	public function update_url($code,$wh_id,$url){
		global $db;
		
		$arr['url'] = $url;
		
		$db->record_update($db->tbl_fix."warehouse_import",$arr," `code`='".$code."' AND `warehouse_id`='".$wh_id."'");		
		return true;
	}

	public function delete_url($code,$wh_id){
		global $db;
		
		$arr['url'] = '';
		
		$db->record_update($db->tbl_fix."warehouse_import",$arr," `code`='".$code."' AND `warehouse_id`='".$wh_id."'");		
		return true;
	}

	public function updateby_id( $id,$code, $wh_id, $import_date, $providers_id){
		global $db;
		
		$arr['code'] = $code;
		$arr['warehouse_id'] = $wh_id;
		$arr['import_date'] = $import_date+0;
		$arr['url'] = $url;
		$arr['providers_id'] = $providers_id;
		$arr['status'] = 1;		
		
		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " '`id`='".$id."'");		
		return true;
	}

	public function update_confirmed(){
		global $db;
		
		$id 						= $this->get('id');
		$arr['confirmed_by'] 		= $this->get('confirmed_by');
		$arr['liabilities_id'] 		= $this->get('liabilities_id');
		$arr['confirmed_at'] 		= time();
		
		$db->record_update( $db->tbl_fix."warehouse_import", $arr, " `id` = '$id' ");

		return true;
	}
	
	public function get_detail(){
		global $db;
		
		$id			= $this->get('id');
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_import` WHERE `id` = '$id' LIMIT 0,1";
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row;
	}
	
	public function get_detail_bycode(){
		global $db;
		
		$code 			= $this->get('code');
		// $warehouse_id 	= $this->get('warehouse_id');
		// $sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_import` WHERE `code` = '$code' AND `warehouse_id` = '$warehouse_id' LIMIT 1";
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_import` WHERE `code` = '$code' LIMIT 1";
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row;
	}
	
	public function delete(){
		global $db;

		$id			= $this->get('id');
		$db->record_delete($db->tbl_fix."warehouse_import"," `id` = '$id' ");

		return true;
	}
	
	public function get_code( $wh_id, $type, $user_add ){//$type = N hay X là nhập hay xuất
		global $db;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_import`
				WHERE `code` LIKE '".date('ymd').$type."%'
				AND `warehouse_id` = '$wh_id'
				AND `type`= '$type'
				AND `user_add`= '$user_add'
				AND `status`='0'
				AND `created_date` > '".strtotime(date('m/d/Y'))."' 
				ORDER BY `created_date` DESC LIMIT 1";
		
		$row = $db->executeQuery ( $sql, 1 );

		if( isset($row['code']) ){
			// exit('có code cũ');
			return $row;
		}else{

			$code 	= $this->init_code( $wh_id, $type, $user_add );
			$id 	= $this->init_wh( $code, $wh_id, $type );

			$sql 	= "SELECT * FROM ".$db->tbl_fix."`warehouse_import` WHERE `id` = '$id' LIMIT 1";
			$row 	= $db->executeQuery ( $sql, 1 );
			// exit('Tạo code mới');
			return $row;
		}

	}
	
	private function init_code( $wh_id, $type, $user_add ){//$type = N hay X là nhập hay xuất
		global $db, $main;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_import`
				WHERE `warehouse_id`='$wh_id' 
				AND `type`='$type'
				AND `user_add`='$user_add'
				AND `status`='1'
				AND `created_date`>".strtotime(date('m/d/Y'))."
				ORDER BY `id` DESC LIMIT 0,1";

		$row = $db->executeQuery ( $sql, 1 );

		if(isset($row['code']) && $row['code'] != ''){
			$str = substr($row['code'],7,3);
			return date('ymd').'N'.sprintf("%03d",($str+1)).$main->randString(3); 
		}else{
			return date('ymd').'N001'.$main->randString(3);
		}

	}
	
	public function history_by_supplier( $offset = 0, $limit = '' ){
		global $db, $wh, $user;
		$method_payment = new method_payment();
		
		$providers_id			= $this->get('providers_id');
		
		if( $limit != '' )
			$limit = "LIMIT $offset, $limit";

		$sql = "SELECT 	wi.*, nTB.`total`, warehouse.`shop_id`
				FROM ".$db->tbl_fix."`warehouse_import` as wi
				INNER JOIN (
					SELECT wh.`wh_import_id`, SUM(wh.`amount`*wh.`price`*( (100 - wh.`decrement`)/100 )) total
					FROM  ".$db->tbl_fix."`warehouse_history` as wh
					GROUP BY wh.`wh_import_id`
				) nTB
				ON nTB.`wh_import_id` = wi.id
				INNER JOIN `warehouse` on warehouse.id = wi.warehouse_id
				WHERE
				wi.status = '1'
				AND wi.providers_id = '$providers_id'
				AND wi.`type` = 'N'
				ORDER BY wi.created_date DESC
				$limit";
		
		$result = $db->executeQuery ( $sql );
		
		$rt = array();
		while($row = mysqli_fetch_assoc($result)){
			$method_payment->set('id', $row['payment_type'] );
			$row['method_payment']		= $method_payment->get_name( ).'';
			$row['user_add']			= $user->get_fullname( $row['user_add'] ).'';
			$row['warehouse_name']		= $wh->get_detail_name( $row['warehouse_id'] ).'';
			$rt[] = $row;
		}
		mysqli_free_result( $result );
		
		return $rt;
	}

	public function history_by_supplier_count(){
		global $db, $wh, $user;

		$providers_id			= $this->get('providers_id');

		$sql = "SELECT 	COUNT(*) total
				FROM ".$db->tbl_fix."`warehouse_import` as wi
				WHERE
				wi.status = '1'
				AND wi.providers_id = '$providers_id'
				AND wi.`type` = 'N' ";
		
		$result = $db->executeQuery ( $sql, 1 );

		return $result['total'];
	}

	public function report_from_to_date( $keyword, $wh_id, $type, $from, $to, $offset = 0, $limit = '' ){
		global $db, $shop, $providers, $wh_history, $wh, $user;
		
		$liabilities 	= new liabilities();
		$members 		= new members();
		$method_payment = new method_payment();
		
		if( $limit != '' )
			$limit = "LIMIT $offset, $limit";
		
		if( $type != '' )
			$type = " AND wi.`type` = '$type' ";

		if( $wh_id != '' )
			$wh_id = " AND wi.`warehouse_id` = '$wh_id' ";

		$providers_id			= $this->get('providers_id');
		if( $providers_id != '' ) $providers_id = "AND wi.`providers_id` = '$providers_id' ";

		$sqlFilter = "$providers_id
						AND (
								(
									'$from' <= wi.import_date
									AND wi.import_date < '$to'
									$wh_id
									$type
								) OR (
									wi.confirmed_by = 0 $wh_id
								)
							)";
		
		if( $keyword != '' ){
			$sqlFilter = "AND ( `wi`.`code` LIKE '%$keyword%' OR `wi`.user_add LIKE '%$keyword%') ";
		}
		
		$sql = "SELECT 	wi.*
				FROM ".$db->tbl_fix."`warehouse_import` as wi
				WHERE
				wi.status = '1'
				$sqlFilter
				ORDER BY wi.created_date DESC
				$limit";
		
		$result = $db->executeQuery ( $sql );
		$rt = array();
		while($row = mysqli_fetch_assoc($result)){
			
			$row['import_date'] = date('d/m/Y', $row['import_date']);
			
			$row['regard_to'] = $providers->get_name( $row['providers_id'] ).'';
			if( $row['internal'] == '1' && $row['type'] == 'X' ){
				$row['regard_to'] = $shop->get_shop_name( $row['export_for'] ).'';
			}else if( $row['internal'] == '0' && $row['type'] == 'X' ){
				$members->set('user_id', $row['export_for']);
				$row['regard_to'] = $members->get_fullname();
			}else if( $row['internal'] == '1' && $row['type'] == 'N' ){
					$dWH	= $wh->get_detail_by_shop_id( $row['providers_id'] );//providers_id: nhà cung cấp nội bộ là SHOP ID; 
					$row['regard_to']	= $dWH['name'];
			}
			
			$method_payment->set('id', $row['payment_type']);
			$row['method_payment'] = $method_payment->get_name();

			$row['liabilities_total'] 	= 0;
			$row['liabilities_paid'] 	= 0;
			$row['liabilities_left'] 	= 0;
			if( $row['payment_type'] == 1 && $row['liabilities_id'] ){
				//công nợ
				$liabilities->set('id', $row['liabilities_id']);
				$dLia = $liabilities->get_detail();
				if(isset($dLia['id']) ){
					$row['liabilities_total'] 	= $dLia['total'];
					$row['liabilities_paid'] 	= $dLia['total_paid'];
					$row['liabilities_left'] 	= $dLia['total_left'];
				}
			}

			$wh_history->set('wh_import_id', $row['id']);
			$row['lItems'] 		= $wh_history->list_by_wh_import_id();
			$row['user_add']	= $user->get_fullname( $row['user_add'] ).'';
			$row['warehouse_name']	= $wh->get_detail_name( $row['warehouse_id'] );

			$row['confirmed_name'] = '';
			if( $row['confirmed_by'] > 0 ){
				$row['confirmed_name'] = $user->get_fullname_by_id( $row['confirmed_by'] ).'';
			}

			$rt[] = $row;
		}
		mysqli_free_result( $result );

		return $rt;
	}

	public function report_from_to_date_excel( $keyword, $wh_id, $type, $from, $to){
		global $db, $shop, $providers, $wh_history, $wh, $user;
		
		$liabilities 	= new liabilities();
		$members 		= new members();
		$method_payment = new method_payment();
		
		if( $type != '' )
			$type = " AND wi.`type` = '$type' ";

		if( $wh_id != '' )
			$wh_id = " AND wi.`warehouse_id` = '$wh_id' ";

		$providers_id			= $this->get('providers_id');
		if( $providers_id != '' ) $providers_id = "AND wi.`providers_id` = '$providers_id' ";

		$sqlFilter = "$providers_id
						AND (
								(
									'$from' <= wi.import_date
									AND wi.import_date < '$to'
									$wh_id
									$type
								) OR (
									wi.confirmed_by = 0 $wh_id
								) 
						)";
		
		if( $keyword != '' ){
			$sqlFilter = "AND wi.`code` LIKE '%$keyword%' ";
		}

		$sql = "SELECT 	wi.*
				FROM ".$db->tbl_fix."`warehouse_import` as wi
				WHERE
				wi.status = '1'
				$sqlFilter
				ORDER BY wi.created_date DESC";

		$result = $db->executeQuery ( $sql );
		$rt = array();

		while($row = mysqli_fetch_assoc($result)){
			
			// $row['import_date'] = date('d/m/Y', $row['import_date']);

			$row['regard_to'] = $providers->get_name( $row['providers_id'] ).'';
			if( $row['internal'] == '1' && $row['type'] == 'X' ){
				$row['regard_to'] = $shop->get_shop_name( $row['export_for'] ).'';
			}else if( $row['internal'] == '0' && $row['type'] == 'X' ){
				$members->set('user_id', $row['export_for']);
				$row['regard_to'] = $members->get_fullname();
			}else if( $row['internal'] == '1' && $row['type'] == 'N' )
					$row['regard_to']	= $wh->get_detail_name( $row['providers_id'] );//Kho xuất cho
			
			$method_payment->set('id', $row['payment_type']);
			$row['method_payment'] = $method_payment->get_name();

			$row['liabilities_total'] 	= 0;
			$row['liabilities_paid'] 	= 0;
			if( $row['payment_type'] == 1 ){
				//công nợ
				$liabilities->set('id', $row['liabilities_id']);
				$dLia = $liabilities->get_detail();
				$row['liabilities_total'] 	= $dLia['total'];
				$row['liabilities_paid'] 	= $dLia['total_paid'];
				$row['liabilities_left'] 	= $dLia['total_left'];
			}

			$wh_history->set('wh_import_id', $row['id']);
			$row['sum'] 		= $this->get_sum_invoice( $row['id'] );
			$row['user_add']	= $user->get_fullname( $row['user_add'] ).'';
			$row['warehouse_name']	= $wh->get_detail_name( $row['warehouse_id'] );
			$rt[] = $row;
		}
		mysqli_free_result( $result );
		
		return $rt;
	}
	
	public function report_from_to_date_count( $keyword, $wh_id, $type, $from, $to){
		global $db;
		
		if($type!='')
			$type = " AND wi.`type` = '$type' ";

		if( $wh_id != '' )
			$wh_id = " AND wi.`warehouse_id` = '$wh_id' ";

		$providers_id			= $this->get('providers_id');
		if( $providers_id != '' ) $providers_id = "AND wi.`providers_id` = '$providers_id' ";

		$sqlFilter = "$providers_id
						AND (
								(
									'$from' <= wi.import_date
									AND wi.import_date < '$to'
									$wh_id
									$type
								) OR (
									wi.confirmed_by = 0 $wh_id
								) 
						)";
		
		if( $keyword != '' ){
			$sqlFilter = "AND `wi`.`code` LIKE '%$keyword%' ";
		}

		$sql = "SELECT COUNT(wi.`id`) as total
				FROM ".$db->tbl_fix."`warehouse_import` as wi
				WHERE 
					wi.status = '1'
					$sqlFilter
					";
		
		$result = $db->executeQuery ( $sql , 1 );
		
		return $result['total'];
	}
	
	public function report_byday_dtimport($goods_id,$from,$to){
		global $db;
		$goods = new goods();
		if($limit!=''){
			$limit = "LIMIT ".$offset.",".$limit;
		}
		
		$sql = "SELECT wi.*,wh.goods_id,wh.amount,wh.price,wh.user_add,wh.before_add,wh.created_at,wh.note,gd.name as goods_name, pd.name as provider_name, unit.name as unit_name
		FROM ".$db->tbl_fix."`warehouse_import` as wi 
		LEFT JOIN ".$db->tbl_fix."`warehouse_history` as wh ON wi.id = wh.wh_import_id 
		LEFT JOIN ".$db->tbl_fix."`product` as pro ON pro.id = wh.product_id
		LEFT JOIN ".$db->tbl_fix."`SKU` ON SKU.id = wh.sku_id
		LEFT JOIN ".$db->tbl_fix."`provider` as pd ON pd.id = wi.providers_id
		WHERE wh.`goods_id`='".$goods_id."' AND ".$from." < wi.import_date AND wi.import_date < ".$to." AND wi.status='1' GROUP BY wh.product_id, wh.sku_id ".$limit;
	
		$result = $db->executeQuery ( $sql );
		
		while($row = mysqli_fetch_assoc($result)){
			$rt[] = $row;
		}
		if(!is_array($rt)) $rt = array();
		
		return $rt;
	}
	
	public function get_inventory($wh_id,$goods_id,$from,$to){//Tồn đầu kỳ và tồn cuối kỳ
		global $db;
		$goods = new goods();
		
		$sql1 = "SELECT wh.before_add
		FROM ".$db->tbl_fix."`warehouse_import` as wi 
		LEFT JOIN ".$db->tbl_fix."`warehouse_history` as wh ON wi.id = wh.wh_import_id		
		WHERE wi.`warehouse_id`='".$wh_id."' AND ".$from." < `wi`.import_date AND `wi`.import_date<".$to." AND wi.status='1' AND wh.goods_id = '".$goods_id."' ORDER BY wh.id ASC LIMIT 1";
		
		$result1 = $db->executeQuery ( $sql1 , 2 );
		
		$sql2 = "SELECT wh.amount,wh.before_add
		FROM ".$db->tbl_fix."`warehouse_import` as wi 
		LEFT JOIN ".$db->tbl_fix."`warehouse_history` as wh ON wi.id = wh.wh_import_id		
		WHERE wi.`warehouse_id`='".$wh_id."' AND ".$from." < `wi`.import_date AND `wi`.import_date<".$to." AND wi.status='1' AND wh.goods_id = '".$goods_id."' ORDER BY wh.id DESC LIMIT 1";
		
		$result2 = $db->executeQuery ( $sql2 , 2 );
		
		$rt['before_date'] = $result1['before_add'];//Đầu kỳ
		$rt['after_date'] = $result2['before_add'] + $result2['amount'];//Cuối kỳ
		return $rt;
	}
	
	public function import_warehouse_return( $username, $thuNgan_fullName, $user_gid_0, &$lReturnItems, $warehouse_id, $payment_type ){
		global $db, $SKU, $main;

		$providers 		= new providers();
		$wh_history 	= new warehouse_history();
		$wh_card 		= new warehouse_card();
		
		$providers_id 	= $providers->create_user_provider( $username, $thuNgan_fullName, $user_gid_0 );
		//Tạo phiếu nhập kho
		$dCode 			= $this->get_code( $warehouse_id, 'N', $username );
		
		if( isset($dCode['code']) ){

			$wh_import_id  = $dCode['id'];
			$note = '';
			foreach( $lReturnItems as $key => $item ){
				$note = 'Trả hàng từ đơn hàng:#'.$item['order_id'];
				
				$dSKU = $SKU->get_detail( $item['sku_id'], $item['product_id'] );
				$wh_history->set('product_id', 	$item['product_id']);
				$wh_history->set('sku_id', 		$item['sku_id']);
				$wh_history->set('code', 		$dSKU['code']);
				$wh_history->set('product_name', $item['name']);
				$wh_history->set('amount', 		abs( $main->number($item['quantity_return']) ) );
				$wh_history->set('price', 		abs( $main->number($item['price']) ) );
				$wh_history->set('decrement', 	$item['decrement']);
				$wh_history->set('user_add', 	$item['user_add']);
				$wh_history->set('before_add', 	$dSKU['on_stock']);
				$wh_history->set('note', 		'Hàng khách trả của đơn hàng:'.$item['order_id'] );
				$wh_history->set('wh_import_id', $wh_import_id);
				if( $item['wh_history_id'] > 0 ){
					$wh_history->set('id', $item['wh_history_id'] );
					$dWHHistory = $wh_history->get_detail();
					if( isset($dWHHistory['expire_date']) )
						$wh_history->set('expire_date',  $dWHHistory['expire_date']);
				}else{
					$wh_history->set('expire_date',  0);
				}
				$wh_history->set('inverse',  1);
				$wh_history_id = $wh_history->add();

				$lReturnItems[$key]['wh_history_id'] = $wh_history_id;

				//cap nhat vao the kho: đã xuất ra thêm thì cập nhật cộng
				$wh_card->update_import_amount( $item['product_id'], $item['sku_id'], $item['name'], $username, abs($item['quantity_return']) , 'plus' );
			}
			
			$this->set('id', $wh_import_id );
			$this->set('warehouse_id', $warehouse_id);
			$this->set('import_date', strtotime(date('m/d/Y')) );
			$this->set('providers_id', $providers_id);
			$this->set('export_for', '');
			$this->set('internal', 0);
			$this->set('url', '');
			$this->set('payment_type', $payment_type);
			$this->set('liabilities_id', 0);
			$this->set('hold_date', 0);
            $this->set('note', $note);
            $this->set('user_add', $username );
            $this->update_status_item();//update trạng thái của phiếu từ đang status =0 sang 1 và các thông tin liên quan;
			
			return $wh_import_id;
		}else{
			echo 'Error! Create a warehouse import bill. Please inform the developer!';
			exit();
		}

	}

	public function listall_nocron_value_sum( $root_id, $cat_id, $warehouse_id, $from, $to, $keyword ){
		//report all value inventory
		global $db;
		$SKU = new SKU();
		
		if( $from > 10 ) $from = " AND '$from' < `whh`.created_at AND `whh`.created_at < '$to' ";
		if( $keyword != '' ) $keyword = " AND `pro`.`keyword` LIKE '%$keyword%' ";

		if( $root_id != '' ){
			$root_id = " `cat`.type = '$root_id' AND";
			if( $cat_id != '' ) $cat_id = " `pro`.cat_id = '$cat_id' AND";
			
			$sql = "SELECT whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity
				FROM `warehouse_history` as whh 
				INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
				INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
				INNER JOIN `category` as cat ON `cat`.id = `pro`.cat_id
				WHERE $root_id $cat_id `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from $keyword
				GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price` ";
		}else{
			$sql = "SELECT whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity
				FROM `warehouse_history` as whh 
				INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
				INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
				WHERE `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from $keyword
				GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price` ";
		}
		
		$result = $db->executeQuery ( $sql );
		
		$sum = 0;
		$quantity = 0;
		while( $item  = mysqli_fetch_assoc( $result ) ){
			$sum += $item['quantity'] * $item['price'];
			$quantity += $item['quantity'];
		}
		
		$kq['sum'] = $sum;
		$kq['quantity'] = $quantity;
		return $kq;
		
	}

	public function listall_nocron_value_export( $root_id, $cat_id, $warehouse_id, $from, $to, $keyword ){
		//report all value inventory
		global $db;
		$SKU = new SKU();

		if( $from > 10 ) $from = " AND '$from' < `whh`.created_at AND `whh`.created_at < '$to' ";
		if( $keyword != '' ) $keyword = " AND `pro`.`keyword` LIKE '%$keyword%' ";

		if( $root_id != '' ){

			$root_id = " `cat`.type = '$root_id' AND";
			if( $cat_id != '' ) $cat_id = " `pro`.cat_id = '$cat_id' AND";

			$sql = "SELECT `whh`.`product_id`, `whh`.`sku_id`, whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity, whh.`inverse`
							, pro.`unit_import`,  pro.`ratio_convert`,  pro.`unit_export`
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					INNER JOIN `category` as cat ON `cat`.id = `pro`.cat_id
					WHERE $root_id $cat_id `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from $keyword
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price` ";
		}else{
			$sql = "SELECT `whh`.`product_id`, `whh`.`sku_id`, whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity, whh.`inverse`
							, pro.`unit_import`,  pro.`ratio_convert`,  pro.`unit_export`
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					WHERE `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from $keyword
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price` ";
		}

		$result = $db->executeQuery ( $sql );
		
		$rt = array();
		while( $item  = mysqli_fetch_assoc( $result ) ){
			$item['product_name'] = $SKU->getFullNameSKU( $item['product_id'], $item['sku_id'] );		
			$rt[] = $item;
		}

		return $rt;
	}


	public function listall_nocron_value( $root_id, $cat_id, $warehouse_id, $from, $to, $keyword, $offset = 0, $limit = '' ){//Báo cáo giá trị hàng tồn của kho hàng
		//report all value inventory
		global $db;
		$SKU = new SKU();

		if( $limit != '' ) $limit = " LIMIT $offset,$limit";
		if( $keyword != '' ) $keyword = " AND `pro`.`keyword` LIKE '%$keyword%' ";

		if( $root_id != '' ){

			$root_id = " `cat`.type = '$root_id' AND";
			if( $cat_id != '' ) $cat_id = " `pro`.cat_id = '$cat_id' AND";

			$sql = "SELECT `whh`.`product_id`, `whh`.`sku_id`, whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity, whh.`inverse`
							, pro.`unit_import`,  pro.`ratio_convert`,  pro.`unit_export`, `SKU`.code, `whh`.price import_price, pro.`price` sell_price
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					INNER JOIN `category` as cat ON `cat`.id = `pro`.cat_id
					INNER JOIN `SKU` ON `whh`.id = `SKU`.product_id
					WHERE $root_id $cat_id `whi`.`warehouse_id` = '$warehouse_id' AND `whi`.type = 'N' AND `whh`.`amount` > `whh`.`exported` $keyword
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price`
					ORDER BY pro.`name`
					$limit";

		}else{

			$sql = "SELECT `whh`.`product_id`, `whh`.`sku_id`, whh.`price`, SUM(`whh`.`amount` - `whh`.`exported`) as quantity , whh.`inverse`
							, pro.`unit_import`,  pro.`ratio_convert`,  pro.`unit_export`, `SKU`.code, `whh`.price import_price, pro.`price` sell_price
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					INNER JOIN `SKU` ON `whh`.id = `SKU`.product_id
					WHERE `whi`.`warehouse_id` = '$warehouse_id' AND `whi`.type = 'N' AND `whh`.`amount` > `whh`.`exported` $keyword
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price`
					ORDER BY pro.`name`
					$limit";
			
		}

		$result = $db->executeQuery ( $sql );

		$rt = array();
		while( $item  = mysqli_fetch_assoc( $result ) ){
			$item['product_name'] = $SKU->getFullNameSKU( $item['product_id'], $item['sku_id'] );		
			$rt[] = $item;
		}

		return $rt;
	}

	public function listall_nocron_value_info( $root_id, $cat_id, $warehouse_id, $from, $to, $keyword ){//Báo cáo giá trị hàng tồn của kho hàng
		//report all value inventory
		global $db;
		$SKU = new SKU();

		if( $keyword != '' ) $keyword = " AND `pro`.`keyword` LIKE '%$keyword%' ";

		if( $root_id != '' ){
			$root_id = " `cat`.type = '$root_id' AND";
			if( $cat_id != '' ) $cat_id = " `pro`.cat_id = '$cat_id' AND";

			$sql = "SELECT COUNT(*) total_record, SUM(`total_value`) total_value
					FROM (
						SELECT SUM( ( `whh`.`amount` - `whh`.`exported` ) * `whh`.`price`*( (100 - whh.`decrement`)/100 ) ) total_value
						FROM `warehouse_history` as whh 
						INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
						INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
						INNER JOIN `category` as cat ON `cat`.id = `pro`.cat_id
						WHERE $root_id $cat_id `whi`.`warehouse_id` = '$warehouse_id' AND `whi`.type = 'N' AND `whh`.`amount` > `whh`.`exported` $keyword
						GROUP BY `whh`.`product_id`, `whh`.`sku_id`
					) nTB
					";
		}else{
			$sql = "SELECT COUNT(*) total_record, SUM(`total_value`) total_value
					FROM (
						SELECT SUM( ( `whh`.`amount` - `whh`.`exported` ) * `whh`.`price`*( (100 - whh.`decrement`)/100 ) ) total_value
						FROM `warehouse_history` as whh 
						INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
						INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
						WHERE `whi`.`warehouse_id` = '$warehouse_id' AND `whi`.type = 'N' AND `whh`.`amount` > `whh`.`exported` $keyword
						GROUP BY `whh`.`product_id`, `whh`.`sku_id`
					) nTB
					";
		}

		$result = $db->executeQuery ( $sql, 1 );
		
		return $result;
	}

	public function listall_nocron_value_count( $root_id, $cat_id, $warehouse_id, $from, $to, $keyword ){
		//report all value inventory
		global $db;
		$SKU = new SKU();

		if( $from > 10 ) $from = " AND '$from' < `whh`.created_at AND `whh`.created_at < '$to' ";
		if( $keyword != '' ) $keyword = " AND `pro`.`keyword` LIKE '%$keyword%' ";

		if( $root_id != '' ){

			$root_id = " `cat`.type = '$root_id' AND";
			if( $cat_id != '' ) $cat_id = " `pro`.cat_id = '$cat_id' AND";

			$sql = "SELECT `whh`.product_id
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					INNER JOIN `category` as cat ON `cat`.id = `pro`.cat_id
					WHERE $root_id $cat_id `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from $keyword 
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price`";
		}else{

			$sql = "SELECT `whh`.product_id
					FROM `warehouse_history` as whh 
					INNER JOIN `warehouse_import` as whi ON `whi`.id = `whh`.wh_import_id
					INNER JOIN `product` as pro ON `pro`.id = `whh`.product_id
					WHERE `whi`.`warehouse_id` = '$warehouse_id' AND `whh`.`amount` > `whh`.`exported` $from
					GROUP BY `whh`.`product_id`, `whh`.`sku_id`, `whh`.`price`";
		}

		$result = $db->executeQuery ( $sql );
		return mysqli_num_rows( $result );
	}

	/*
	- BEGIN BÁO CÁO TỒN KHO THEO NHÀ CUNG CẤP
	*/

	public function report_by_providers( $keyword, $from, $to, $offset = 0, $limit = '' ){//Báo cáo xuất nhập tồn kho theo nhà cung cấp
		global $db, $wh_history;
		
		$providers_id = $this->get('providers_id');
		$warehouse_id = $this->get('warehouse_id');
		if( $providers_id != '' ) $providers_id = " AND `wi`.`providers_id` = '$providers_id' ";
		if( $warehouse_id != '' ) $warehouse_id = " AND `wi`.`warehouse_id` = '$warehouse_id' ";
		if( $keyword 		!= '' ) $keyword = " AND ( `wh`.`product_name` LIKE '%$keyword%' OR `wh`.`code` LIKE '%$keyword%' ) ";
		if( $limit 		!= '' ) $limit = " LIMIT $offset, $limit ";

		$sql = "SELECT `wh`.id, `wh`.product_id, `wh`.code, `wh`.sku_id, `wh`.product_name
				FROM `warehouse_import` wi
				INNER JOIN `warehouse_history` wh ON wh.`wh_import_id` = `wi`.id
				WHERE wi.`type` = 'N' AND wi.`status` = 1 $providers_id $warehouse_id $keyword
				GROUP BY wh.`product_id`, wh.`sku_id`
				ORDER BY `product_name`
				$limit";
		
		$result = $db->executeQuery ( $sql );
		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){

			$this->set('product_id', $row['product_id']);
			$this->set('sku_id', $row['sku_id']);
			$row['before_period']  = $this->report_by_providers_get_before_period( $from );//giá trị tồn kho trước giai đoạn này
			
			$wh_history->set('product_id', $row['product_id']);
			$wh_history->set('sku_id', $row['sku_id']);
			$dSum = $wh_history->report_by_providers_sum_exported_imported( $from, $to );
			if( isset($dSum['sum_imported']) ){
				$row['sum_imported'] = $dSum['sum_imported'];
				$row['sum_exported'] = $dSum['sum_exported'];
			}else{
				$row['sum_imported'] = 0;
				$row['sum_exported'] = 0;
			}
			$kq[] = $row;
		}
		mysqli_free_result( $result );

		return $kq;
	}

	public function report_by_providers_get_before_period( $from ){//lấy giá trị tồn kho đầu kỳ
		global $db;

		$product_id 		= $this->get('product_id');
		$sku_id 			= $this->get('sku_id');

		$providers_id 		= $this->get('providers_id');
		$warehouse_id 		= $this->get('warehouse_id');
		if( $providers_id != '' ) $providers_id = " AND `wi`.`providers_id` = '$providers_id' ";
		if( $warehouse_id != '' ) $warehouse_id = " AND `wi`.`warehouse_id` = '$warehouse_id' ";

		$sql = "SELECT `wh`.before_add, `wh`.amount, `wh`.exported
				FROM `warehouse_import` wi
				INNER JOIN `warehouse_history` wh ON wh.`wh_import_id` = `wi`.id
				WHERE wi.`type` = 'N' AND wi.`status` = 1 AND wh.`product_id` = '$product_id' AND wh.`sku_id` = '$sku_id' AND  '$from' > wi.`created_date` $providers_id $warehouse_id
				ORDER BY `created_date` DESC
				LIMIT 1";
		
		$result = $db->executeQuery ( $sql, 1 );
		
		if( isset($result['before_add']) )
			return $result['before_add']+$result['amount']-$result['exported'];
		else return 0;
	}

	public function report_by_providers_info( $keyword ){//Báo cáo xuất nhập tồn kho theo nhà cung cấp
		global $db;

		$providers_id = $this->get('providers_id');
		$warehouse_id = $this->get('warehouse_id');
		if( $providers_id 	!= '' ) $providers_id = " AND `wi`.`providers_id` = '$providers_id' ";
		if( $warehouse_id 	!= '' ) $warehouse_id = " AND `wi`.`warehouse_id` = '$warehouse_id' ";
		if( $keyword 		!= '' ) $keyword = " AND ( `wh`.`product_name` LIKE '%$keyword%' OR `wh`.`code` LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) total_record, SUM(sum_imported) `total_imported`, SUM(sum_exported) `total_exported` FROM (
					SELECT `wh`.id, `wh`.product_id, `wh`.code, `wh`.sku_id, `wh`.product_name, SUM(`wh`.amount) sum_imported, SUM(`wh`.exported) sum_exported
					FROM `warehouse_import` wi
					INNER JOIN `warehouse_history` wh ON wh.`wh_import_id` = `wi`.id
					WHERE wi.`type` = 'N' AND wi.`status` = 1 $providers_id $warehouse_id $keyword
					GROUP BY wh.`product_id`, wh.`sku_id`
					ORDER BY `created_date`, `product_name`
				) nTB ";

		$result = $db->executeQuery ( $sql, 1 );

		return $result;
	}

	/*
	- END BÁO CÁO TỒN KHO THEO NHÀ CUNG CẤP
	*/
}

$wh_import = new warehouse_import();
