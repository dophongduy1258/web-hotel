<?php
##########
#Bảng wh_history lưu giữ quá trình xuất nhập kho, có 2 trường hợp nhập và xuất kho
#
#
##########
class warehouse_history extends model{

	protected $class_name = 'warehouse_history';
	protected $id;
	protected $product_id;
	protected $code;
	protected $sku_id;//sku_id not unique_id SKU.id
	protected $amount;
	protected $exported;//số lượng đã xuất
	protected $price;
	protected $user_add;
	protected $before_add;//số lượng trước khi thực hiện nhập kho
	protected $created_at;
	protected $note;
	protected $wh_import_id;
	protected $expire_date;
	protected $inverse;
	protected $product_name;
	protected $decrement;

	// public function create( $wh_id, $product_id, $amount, $price, $note, $wh_import_id, $expire_date, $inverse, $decrement ){
	// 	global $db, $main, $SKU;

	// 	$kq = explode(':', $product_id);
	// 	$arr['product_id'] = $kq['1'];
	// 	$arr['code'] = $SKU->get_detail_code( $kq['0'],  $kq['1'] );
	// 	$arr['sku_id'] = $kq['0'];
	// 	$arr['amount'] = $main->number($amount);
	// 	$arr['price'] = $main->number($price);
	// 	$arr['note'] = $note;
	// 	$arr['before_add'] = $this->get_before_add( $wh_id, $product_id, $kq['0'] );
	// 	$arr['wh_import_id'] = $wh_import_id;
	// 	$arr['expire_date'] = $expire_date;
	// 	$arr['created_at'] = time();
	// 	$arr['user_add'] = $_SESSION['username_client'];
	// 	$arr['inverse'] = $inverse+0;
	// 	$arr['decrement'] = $decrement+0;
		
	// 	$db->record_insert( $db->tbl_fix."warehouse_history", $arr );
		
	// 	return $db->mysqli_insert_id();
	// }

	public function add(){
		global $db, $main;

		//insert sản phẩm vào mã nhập kho
		$ar['product_id']   = $this->get('product_id');
		$ar['sku_id']       = $this->get('sku_id');
		$ar['code']       	= $this->get('code');
		$ar['product_name'] = $this->get('product_name');
		$ar['amount']       = abs($main->number($this->get('amount')));
		$ar['before_add']   = $this->get('before_add');
		
		$ar['exported']     = 0;//số lượng đã xuất
		if( $ar['before_add'] < 0 ){
			if( $ar['amount'] < abs($ar['before_add']) ){
				$ar['exported']     = $ar['amount'];//số lượng đã xuất hết: trừ kho luôn để bù lại trước đây xuất âm
			}else{
				$ar['exported']     = $ar['amount'] - abs($ar['before_add']);//số lượng đã xuất hết: trừ kho luôn để bù lại trước đây xuất âm
			}
		}
		
		$ar['price']        = $main->number($this->get('price'));
		$ar['user_add']     = $this->get('user_add');
		$ar['note']         = $this->get('note');
		$ar['wh_import_id'] = $this->get('wh_import_id')+0;
		$ar['expire_date'] 	= $this->get('expire_date');
		$ar['inverse'] 		= $this->get('inverse');
		$ar['decrement'] 	= $this->get('decrement')+0;
		$ar['created_at']   = time();

		$db->record_insert('warehouse_history', $ar );
		
		return $db->mysqli_insert_id();
	}
	
	public function update_item(){
		global $db, $main;
		
		//insert sản phẩm vào mã nhập kho
		$id			   		= $this->get('id');

		$ar['product_id']   = $this->get('product_id');
		$ar['code']       	= $this->get('code');
		$ar['sku_id']       = $this->get('sku_id');
		$ar['product_name'] = $this->get('product_name');
		$ar['amount']       = abs($main->number($this->get('amount')));
		$ar['exported']     = 0;//số lượng đã xuất
		$ar['price']        = $main->number($this->get('price'));
		$ar['user_add']     = $this->get('user_add');
		$ar['before_add']   = $this->get('before_add');
		$ar['note']         = $this->get('note');
		$ar['wh_import_id'] = $this->get('wh_import_id')+0;
		$ar['expire_date'] 	= $this->get('expire_date');
		$ar['inverse'] 		= $this->get('inverse');
		$ar['created_at']   = time();

		$db->record_update('warehouse_history', $ar, " `id` = '$id' " );
		
		return $id;
	}
	
	// public function create_synchronization( $product_id, $chech_lech, $wh_id, $note, $expire_date = 0 ){
	// 	global $db;
		
	// 	$kq = explode(':', $product_id);
	// 	$arr['product_id'] = $kq['1'];
	// 	$arr['sku_id'] = $kq['0'];
		
	// 	$arr['amount'] = $chech_lech;
	// 	$arr['price'] = 0;
	// 	$arr['note'] = $note;
	// 	$arr['expire_date'] = $expire_date;
	// 	$arr['before_add'] = $this->get_before_add( $wh_id, $product_id, $arr['sku_id'] );
	// 	$arr['wh_import_id'] = 0;
	// 	$arr['created_at'] = time();
	// 	$arr['user_add'] = $_SESSION['username_client'];
	// 	$arr['inverse'] = 0;
	// 	$arr['decrement'] = 0;
		
	// 	$db->record_insert($db->tbl_fix."warehouse_history", $arr);
		
	// 	return $db->mysqli_insert_id();
	// }
	
	public function update( $id, $product_id, $amount, $price, $note, $expire_date, $inverse ){
		global $db;
		$main = new main();

		$arr['amount'] 		= $main->number($amount);
		$arr['price'] 		= $main->number($price);
		$arr['note'] 		= $note;
		$arr['inverse'] 	= $inverse;
		$arr['expire_date'] = $expire_date;
		
		$db->record_update($db->tbl_fix."warehouse_history",$arr," id='".$id."'");
		return true;
	}
	public function update_note($id,$note){
		global $db;
		$main = new main();
		
		$arr['note'] = $note;

		$db->record_update($db->tbl_fix."warehouse_history",$arr," id='".$id."'");
		return true;
	}

	//delete record by ID
	public function delete_by_list( $lItems ){
		global $db;

		foreach ($lItems as $item ) {

			$amount 			= $item['amount'];
			$id 				= $item['id'];
			$product_id 		= $item['product_id'];
			$sku_id 			= $item['sku_id'];

			$sql ="UPDATE $db->tbl_fix`warehouse_history` SET `before_add` = (`before_add`-'$amount') WHERE `product_id` = '$product_id' AND `sku_id` = '$sku_id' AND `id` > '$id' ORDER BY `id` ASC";
			
			$db->executeQuery ( $sql );

			$db->record_delete($db->tbl_fix."warehouse_history"," id= '$id' ");	
		}

		return true;
	}
	
	//delete record by ID
	// public function delete_return($wh_history_id){
	// 	global $db;
	// 	$SKU = new SKU();
	// 	$this->set('id', $wh_history_id );
	// 	$dwhh = $this->get_detail($wh_history_id);
	// 	if( isset($dwhh['warehouse_history']) ){
	// 		$db->record_delete($db->tbl_fix."warehouse_history", " id='".$wh_history_id."'");
	// 		$db->record_delete($db->tbl_fix."warehouse_import", " `id` = '".$dwhh['wh_import_id']."' ");
			
	// 		$SKU->update_stock_subtract( $dwhh['product_id'], $dwhh['sku_id'], ($dwhh['amount']+0) );
	// 		unset( $dwhh );
	// 	}
	// 	return true;
	// }

	//get detail by id
	public function get_detail(){
		global $db;

		$id			= $this->get('id');
		$sql = "SELECT * FROM ".$db->tbl_fix."warehouse_history WHERE `id` = '$id' ";
		$the_row = $db->executeQuery( $sql, 1 );

		return $the_row;
	}

	//Huan: 20201201 get detail by id and warehouse_id
	public function delete_detail_by(){
		global $db;

		$wh_import_id		= $this->get('wh_import_id');

		$db->record_delete( $db->tbl_fix.$this->class_name, " `wh_import_id` = '$wh_import_id' " );

		return true;
	}

	public function check_goods_wh_import($product_id, $wh_import_id){
		global $db,$database;
		
		
		$pro_id = explode(":", @$product_id);

		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_history` WHERE `product_id`='".@$pro_id['1']."' AND `sku_id`='".@$pro_id['0']."' AND `wh_import_id`='".$wh_import_id."' LIMIT 0,1";
		
		$result = $db->executeQuery ( $sql,1);

		
		return $result;
	}
	
	public function listby_wh_import_id($wh_import_id){
		global $db,$database;
		
		
		$sql = "SELECT whh.*, pro.`name` as product_name, pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`shop_id`, `SKU`.`name` sku_name, `SKU`.attribute_1, `SKU`.attribute_2, `SKU`.attribute_3, `SKU`.attribute_4, `SKU`.attribute_5, `SKU`.code as sku_code
		FROM ".$db->tbl_fix."`warehouse_history` as whh
		INNER JOIN ".$db->tbl_fix."`SKU` ON `SKU`.id = whh.sku_id AND whh.product_id = `SKU`.product_id
		INNER JOIN ".$db->tbl_fix."`product` as pro ON whh.product_id = pro.id 
		WHERE whh.`wh_import_id` = '$wh_import_id'
		ORDER BY `whh`.id ASC";
		
		$result = $db->executeQuery ( $sql);
		$return = array();
		while($row = mysqli_fetch_assoc($result)){
			$return[] = $row;
		}
		
		
		return $return;
	}
	
	public function listby_wh_import_id_to_export( $wh_import_id ){
		global $db, $SKU;
		$SKU = new SKU();
		
		$sql = "SELECT `whh`.amount as quantity, `pro`.name as product_name, `SKU`.`name` sku_name, `SKU`.attribute_1, `SKU`.attribute_2, `SKU`.attribute_3, `SKU`.attribute_4, `SKU`.attribute_5,
				`SKU`.code, `whh`.price as import_price, `pro`.price as export_price
				FROM ".$db->tbl_fix."`warehouse_history` as whh
				INNER JOIN ".$db->tbl_fix."`SKU` ON `SKU`.id = whh.sku_id AND whh.product_id = `SKU`.product_id
				INNER JOIN ".$db->tbl_fix."`product` as pro ON whh.product_id = pro.id 
				WHERE whh.`wh_import_id`='$wh_import_id'
				ORDER BY `whh`.id ASC";
		
		$result = $db->executeQuery ( $sql);
		$return = array();
		while($row = mysqli_fetch_assoc($result)){
			$row['name'] = $row['product_name'].' '.$SKU->get_att_name_SKU( $row );
			$return[] = $row;
		}
		
		return $return;
	}

	public function list_by_wh_import_id(){
		global $db;
		
		$wh_import_id = $this->get('wh_import_id');

		$sql = "SELECT whh.*, IFNULL(pro.`unit_export`, '') unit_export, IFNULL(pro.`unit_import`, '') unit_import, IFNULL(pro.`ratio_convert`, 1) ratio_convert, pro.`img_1` `image`
		FROM ".$db->tbl_fix."`warehouse_history` as whh
		LEFT JOIN ".$db->tbl_fix."`product` pro ON whh.product_id = pro.id
		WHERE whh.`wh_import_id` = '$wh_import_id'
		ORDER BY `whh`.id ASC";

		$result = $db->executeQuery( $sql);

		$kq = array();
		while( $row = mysqli_fetch_assoc( $result ) ){
			
			if( $row['expire_date'] > 0 )
				$row['expire_date'] = date("d/m/Y", $row['expire_date']);
			else
				$row['expire_date'] = '';
			
			$kq[] = $row;
		}
		unset( $result );
		
		return $kq;
	}

	public function check_import_is_exported(){
		global $db;
		
		$wh_import_id = $this->get('wh_import_id');

		$sql = "SELECT whh.`id`
				FROM ".$db->tbl_fix."`warehouse_history` as whh
				WHERE whh.`wh_import_id` = '$wh_import_id' AND whh.`exported` > 0
				LIMIT 1";
		
		$result = $db->executeQuery( $sql, 1 );

		if( isset($result['id']) )
			return true;
		else
			return false;

	}

	public function listby_wh($wh_import_id){
		global $db,$database;
		
		
		$sql = "SELECT whh.*, pro.`name` as product_name, `SKU`.`name` sku_name, `SKU`.attribute_1, `SKU`.attribute_2, `SKU`.attribute_3, `SKU`.attribute_4, `SKU`.attribute_5
		FROM ".$db->tbl_fix."`warehouse_history` as whh
		INNER JOIN ".$db->tbl_fix."`SKU` ON `SKU`.id = whh.sku_id AND whh.product_id = `SKU`.product_id
		INNER JOIN ".$db->tbl_fix."`product` as pro ON whh.product_id = pro.id 
		WHERE whh.`wh_import_id`='$wh_import_id'
		ORDER BY `whh`.id ASC";
		
		$result = $db->executeQuery ( $sql);
		while($row = mysqli_fetch_assoc($result)){
			$return[] = $row;
		}

		
		return $return;
	}

	//tính tồn đầu kỳ nhập
	public function get_before_add( $wh_id, $product_id, $sku_id ){
		// global $db, $database, $wh, $setup;
		
		// $sql = "SELECT wh.`before_add`, wh.`amount`, wh.`exported` 
		// FROM  ".$db->tbl_fix."`warehouse_history` as wh 
		// INNER JOIN ".$db->tbl_fix."`warehouse_import` as wi ON wi.id = wh.wh_import_id 
		// WHERE wh.`product_id` = '$product_id' AND wh.`sku_id` = '$sku_id' AND wi.`warehouse_id` = '$wh_id'
		// ORDER BY wh.id DESC LIMIT 1";

		// $result = $db->executeQuery ( $sql, 1 );
		
		// $sum = 0;
		// if( isset($result['before_add']) ){
		// 	$sum = $result['amount'] + $result['before_add'] - $result['exported'];
		// }

		global $SKU;

		$dSKU = $SKU->get_detail($sku_id, $product_id );

		if( isset($dSKU['product_id']) ){
			return $dSKU['on_stock'];
		}else{
			return 0;
		}

	}
	
	public function get_import_wh_fromto($product_id,$from,$to){
		global $db,$database;
		
		
		$sql = "SELECT sum(amount) as sum FROM  ".$db->tbl_fix."`warehouse_history` WHERE `product_id`='".$product_id."' AND ".$from." < `created_at` AND `created_at` < ".$to;
		
		$result = $db->executeQuery ( $sql,2);
		
		
		return $result['sum'];
	}

	//function lấy một dòng sản phẩm LIFO từ kho
	public function get_fifo_rows( $product_id, $sku_id ){
		global $db,$database;
		
		$sql = "SELECT whh.*
				FROM  $db->tbl_fix`warehouse_history` as whh
				INNER JOIN `warehouse_import` as wim ON wim.id = whh.wh_import_id
				WHERE whh.`product_id` = '$product_id' AND whh.`sku_id`='$sku_id' AND whh.`amount` > whh.`exported` AND `wim`.type = 'N'
				ORDER BY whh.created_at ASC LIMIT 4";
		
		$result = $db->executeQuery($sql);
		
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}
		
		
		return $kq;
	}
	
	//function lấy một dòng sản phẩm LIFO từ kho
	public function get_fifo_row( $product_id, $sku_id ){//quantity là số lượng nhập
		global $db;
		
		$sql = "SELECT whh.*, (whh.`amount` - whh.`exported`) as quantity, pro.`ratio_convert`
				FROM  $db->tbl_fix`warehouse_history` as whh
				INNER JOIN `warehouse_import` as wim ON wim.id = whh.wh_import_id
				INNER JOIN `product` as pro ON pro.id = whh.product_id
				WHERE whh.`product_id` = '$product_id' AND whh.`sku_id` = '$sku_id' AND whh.`amount` > whh.`exported` AND wim.`type` = 'N'
				ORDER BY `created_at` ASC LIMIT 1";
		
		$kq = $db->executeQuery( $sql, 1 );
		if( isset($kq['inverse'])&&$kq['inverse'] == 1 ){
			$kq['quantity'] 	= $kq['quantity']/$kq['ratio_convert'];
			$kq['price'] 		= $kq['price']/$kq['ratio_convert'];
		}
		//NOTE: quantity là số lượng nhập
		return $kq;
	}
	
	//function lấy một dòng sản phẩm FIFO từ kho
	public function get_fifo_row_back( $id_last_exist_item, $product_id, $sku_id ){
		global $db;
		
		$sql = "SELECT whh.*, (whh.`amount` - whh.`exported`) as quantity 
				FROM  $db->tbl_fix`warehouse_history` as whh
				INNER JOIN `warehouse_import` as wim ON wim.id = whh.wh_import_id
				WHERE whh.`product_id` = '$product_id' AND whh.`sku_id` = '$sku_id' AND whh.`amount` > whh.`exported` AND wim.`type` = 'N' AND wim.`id` > '$id'
				ORDER BY `created_at` ASC LIMIT 1";
		
		// $sql = "SELECT *, `amount` as quantity FROM  ".$db->tbl_fix."`warehouse_history` WHERE `product_id`='".$product_id."' AND `sku_id`='".$sku_id."' AND `amount` = `exported` AND `id` > '$id' ORDER BY created_at ASC LIMIT 1";
		$kq = $db->executeQuery( $sql, 1 );
		
		return $kq;
	}
	
	//function lấy một dòng sản phẩm LIFO từ kho
	public function get_last_import_price( $product_id, $sku_id ){
		global $db;
		
		$sql = "SELECT whh.`price`
				FROM  ".$db->tbl_fix."`warehouse_history` as whh
				INNER JOIN `warehouse_import` as wim ON wim.id = whh.wh_import_id
				WHERE whh.`product_id` = '".$product_id."' AND whh.`sku_id` = '".$sku_id."' AND whh.`amount` > whh.`exported` AND wim.`type` = 'N'
				ORDER BY created_at DESC LIMIT 1";
		
		$kq = $db->executeQuery( $sql, 1 );
		
		return $kq['price']+0;
	}

	//function lấy giá nhập kho gần nhất
	public function get_last_price_import( $product_id, $sku_id ){
		global $db;
		
		$sql = "SELECT whh.`price`, whh.`inverse`
				FROM  ".$db->tbl_fix."`warehouse_history` as whh
				WHERE whh.`product_id` = '$product_id' AND whh.`sku_id` = '$sku_id'
				ORDER BY `created_at` DESC LIMIT 1";
		
		$kq = $db->executeQuery( $sql, 1 );
		
		return $kq;
	}

	//cập nhật cộng số lượng
	public function update_exported_plus( $id, $val_plus, $ddetail_order, $username, $inverse, $ratio_convert ){
		//$val_plus giá trị phải được tính cho phù hợp với inverse là số lượng nhập hay số lượng xuất: ví dụ $id là theo số lượng nhập thì val_plus phải được tính theo số lượng nhập
		global $db;
		$detail_order = new detail_order();
		$wh_card = new warehouse_card();

		$sql = "UPDATE `warehouse_history` SET `exported` = `exported` + '$val_plus' WHERE `id` = '$id' ";
		$result = $db->executeQuery ( $sql );

		if( $inverse == 0 )
			$val_plus = $val_plus*$ratio_convert;
		//cap nhat vao the kho: đã xuất ra thêm thì cập nhật cộng
		$product_name = $ddetail_order['name'].' '.( $ddetail_order['sku_name'] != '' ? '('.$ddetail_order['sku_name'].')':'' );
		$wh_card->update_export_amount( $ddetail_order['product_id'], $ddetail_order['sku_id'], $product_name, $username, $val_plus , 'plus' );//số lượng là số lượng xuất
		
		return true;
	}
	
	//cập nhật trừ số lượng
	// public function update_exported_subtract($id, $val_subtract, $ddetail_order, $username){
	// 	global $db,$database;
	// 	$detail_order = new detail_order();
	// 	$wh_card = new warehouse_card();
	// 	

	// 	$sql = "UPDATE `warehouse_history` SET `exported` = `exported` - ".$val_subtract." WHERE `id` = '".$id."' ";
	// 	$result = $db->executeQuery ( $sql );
		
	// 	//cap nhat vao the kho: đã xuất ra thêm thì cập nhật cộng
	// 	$product_name = $ddetail_order['name'].' '.( $ddetail_order['sku_name'] != '' ? '('.$ddetail_order['sku_name'].')':'' );
	// 	$wh_card->update_export_amount( $ddetail_order['product_id'], $ddetail_order['sku_id'], $product_name, $username, $val_subtract , 'subtract' );

	// 	
	// 	return true;
	// }

	public function update_exported_warehouse_plus( $id, $val_plus ){
		global $db;
		
		$sql = "UPDATE `warehouse_history` SET `exported` = (`exported` + '$val_plus') WHERE `id` = '".$id."' ";
		$result = $db->executeQuery ( $sql );

		return true;
	}
	
	//cập nhật trừ số lượng
	public function update_exported_warehouse_subtract( $id, $val_subtract ){
		global $db;

		$sql = "UPDATE `warehouse_history` SET `exported` = (`exported` - '$val_subtract') WHERE `id` = '".$id."' ";
		$result = $db->executeQuery ( $sql );

		return true;
	}

	public function update_export_record_export( $product_id, $sku_id, $quantity ){//quantity: số lượng là số lượng nhập
		//thực hiện xuất kho exported cho record whhh, cho phiếu xuất kho
		while ( $quantity > 0 ){
			$ddwhh = $this->get_fifo_row( $product_id, $sku_id );
			@$trong_ma = $ddwhh['quantity'] + 0;
			if( isset($ddwhh['id']) && $trong_ma > 0 ){
				if( $trong_ma >= $quantity ){
					$val = $quantity;
					if( $ddwhh['inverse'] == 1 )
						$val = $quantity/$ddwhh['ratio_convert'];
					//cộng thêm số lượng xuất
					$this->update_exported_warehouse_plus( $ddwhh['id'], $val );
					$quantity = 0;
				}else{
					$val = $trong_ma;
					if( $ddwhh['inverse'] == 1 )
						$val = $trong_ma/$ddwhh['ratio_convert'];
					//công thêm số lượng xuất cho record
					$this->update_exported_warehouse_plus( $ddwhh['id'], $trong_ma );
					$quantity = $quantity - $trong_ma;
				}
			}else{
				$quantity = 0;
			}
		}
		return true;
	}

	// danh sách hàng hóa trong mã cần cập nhật
	public function get_stock_bywh_importID($wh_import_id){
		global $db,$database;
		
		
		$sql = "SELECT pro.`sum_stock`, SKU.`on_stock`, wh.`product_id`, wh.`sku_id`
				FROM  $db->tbl_fix`warehouse_history` as wh
				INNER JOIN `product` as pro ON wh.product_id = pro.id
				INNER JOIN `SKU` ON SKU.product_id = wh.product_id AND wh.sku_id = SKU.id
				WHERE `wh_import_id`='$wh_import_id' GROUP BY wh.id";
		
		$result = $db->executeQuery( $sql );
		$kq = '';
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}
		
		
		if(!is_array($kq)) $kq = array();
		return $kq;
	}


	public function report_by_providers_sum_exported_imported( $from, $to ){//Báo cáo xuất nhập tồn kho theo nhà cung cấp: giá trị tổng nhập/xuất trong kỳ
		global $db;

		$product_id 	= $this->get('product_id');
		$sku_id 		= $this->get('sku_id');

		$sql = "SELECT SUM(`wh`.amount) sum_imported, SUM(`wh`.exported) sum_exported
				FROM `warehouse_import` wi
				INNER JOIN `warehouse_history` wh ON wh.`wh_import_id` = `wi`.id
				WHERE wi.`type` = 'N' AND wi.`status` = 1 AND  '$from' <= wi.`import_date` AND wi.`import_date` < '$to' AND wh.`product_id` = '$product_id' AND wh.`sku_id` = '$sku_id'";
		
		$kq = $db->executeQuery ( $sql, 1 );

		return $kq;
	}

	public function report_detail( $warehouse_id, $providers_id, $keyword, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
		global $db, $db;
		
		if( $warehouse_id != '' ) $warehouse_id = " AND `wi`.warehouse_id = '$warehouse_id' ";
		if( $providers_id != '' ) $providers_id = " AND `wi`.providers_id = '$providers_id' ";
		if( $keyword != '' ) $keyword = " AND ( `whh`.product_name LIKE '%$keyword%' OR `whh`.code LIKE '%$keyword%' ) ";


		$sqlSort = " ORDER BY `whh`.id ASC ";
		if( in_array($field, array( 'created_date',
                                    'import_date',
                                    'wh_code',
                                    'warehouse_name',
                                    'providers_id',
                                    'providers_name',
                                    'code',
                                    'product_name',
                                    'amount',
                                    'price',
                                    'confirmed_by'
                                    ))
                                    
        ){
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  'created_date'                  => 'wi.`created_date`',
                                        'import_date'                   => 'wi.`import_date`',
                                        'wh_code'                      	=> 'wi.`code`',
                                        'warehouse_name'                => 'ware.`name`',
                                        'providers_id'                	=> 'wi.`providers_id`',
                                        'providers_name'                => 'provi.`name`',
                                        'code'                			=> 'whh.`code`',
                                        'product_name'                	=> 'whh.`product_name`',
                                        'amount'                		=> 'whh.`amount`',
                                        'price'                			=> 'whh.`price`',
                                        'confirmed_by'                	=> 'wi.`confirmed_by`',
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
		}
		
		if( $limit != '' ) $limit = "LIMIT $offset, $limit";
		
		$sql = "SELECT whh.`id`, whh.`code`, whh.`product_name`, whh.`amount`, whh.`exported`, whh.`price`, whh.`product_name`, whh.`inverse`, wi.`created_date`, wi.`import_date`
						, pro.`unit_import`, pro.`unit_export`
						, IF(wi.`internal` = 1, IFNULL(proviWare.`name`, '') ,IFNULL(provi.`name`, '') ) provider_name, IF(wi.`internal` = 1, '', IFNULL(provi.`id`, '') ) provider_code
						, ware.`name` warehouse_name
						, wi.`id` wh_import_id, wi.`code` wh_code, wi.`confirmed_by`, IFNULL(user.`fullname`, '') confirmed_fullname, wi.`user_add`
						, wi.`internal`
				FROM $db->tbl_fix`warehouse_history` as whh
				INNER JOIN $db->tbl_fix`warehouse_import` wi ON wi.`id` = whh.`wh_import_id`
				INNER JOIN $db->tbl_fix`product` pro ON pro.`id` = whh.`product_id`
				LEFT JOIN $db->tbl_fix`providers` provi ON provi.`id` = wi.`providers_id`
				LEFT JOIN $db->tbl_fix`warehouse` proviWare ON proviWare.`id` = wi.`providers_id`
				INNER JOIN $db->tbl_fix`warehouse` ware ON ware.`id` = wi.`warehouse_id`
				LEFT JOIN $db->tbl_fix`user` user ON user.`id` = wi.`confirmed_by`
				WHERE wi.`status` = 1 AND  '$from' <= wi.`import_date` AND wi.`import_date` < '$to' $warehouse_id $providers_id $keyword
				$sqlSort
				$limit";

		$return = $db->executeQuery_list( $sql);

		return $return;
	}
	
	public function report_detail_info( $warehouse_id, $providers_id, $keyword, $from, $to ){
		global $db, $db;

		if( $warehouse_id != '' ) $warehouse_id = " AND `wi`.warehouse_id = '$warehouse_id' ";
		if( $providers_id != '' ) $providers_id = " AND `wi`.providers_id = '$providers_id' ";
		if( $keyword != '' ) $keyword = " AND ( `whh`.product_name LIKE '%$keyword%' OR `whh`.code LIKE '%$keyword%' ) ";
		
		$sql = "SELECT COUNT(*) total_record, SUM(`amount`) total_quantity, SUM(`price`*`amount`) total_value
				FROM $db->tbl_fix`warehouse_history` as whh
				INNER JOIN $db->tbl_fix`warehouse_import` wi ON wi.`id` = whh.`wh_import_id`
				WHERE wi.`status` = 1 AND  '$from' <= wi.`import_date` AND wi.`import_date` < '$to' $warehouse_id $providers_id $keyword
				";

$return = $db->executeQuery( $sql, 1);

		return $return;
	}
	
}
$wh_history = new warehouse_history();
