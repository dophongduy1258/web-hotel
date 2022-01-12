<?php
class warehouse {
	
	private $id;
	private $name;
	private $address;
	private $mobile;
	private $username;
	
	// set value with paramater
	public function set($parameter,$val) {
		if($parameter=='id'){
			$this->id = $val;
		}else if($parameter=='name'){
			$this->name = $val;
		}else if($parameter=='address'){
			$this->address = $val;
		}else if($parameter=='mobile'){
			$this->mobile = $val;
		}else if($parameter=='username'){
			$this->username = $val;
		}else{
			die("Lỗi: 001. Tham biến truyền vào cho phương thức warehouse::set không tìm thấy.");
		}
		return true;
	}

	// get value with paramater
	public function get($parameter) {
		if($parameter=='id'){
			return $this->id;
		}else if($parameter=='name'){
			return $this->name;
		}else if($parameter=='address'){
			return $this->address;
		}else if($parameter=='mobile'){
			return $this->mobile;
		}else if($parameter=='username'){
			return $this->username;
		}else{
			die("Lỗi: 002. Tham biến lấy giá trị cho phương thức warehouse::get không tìm thấy.");
		}
	}

	public function add( $name, $shop_id, $address, $mobile, $username ){
		global $db,$database;
		
		
		$sql = "SELECT name FROM ".$db->tbl_fix."`warehouse` WHERE `name` = '".$name."' AND `shop_id` = '$shop_id'  AND `username` = '".$username."' LIMIT 0,1";		
		$row = $db->executeQuery ( $sql, 1 );
		
		if( $row['name'] == '' ){
			
			$arr['name'] = $name;
			$arr['address'] = $address;
			$arr['mobile'] = $mobile;
			$arr['username'] = $username;
			$arr['shop_id'] = $shop_id;
			
			$db->record_insert($db->tbl_fix."warehouse", $arr);
			
			return $db->mysqli_insert_id();
		}else{
			exit("Trùng tên với một kho đã tạo");
		}
		
		
		return true;
	}
	
	public function update($id,$name,$shop_id,$address,$mobile,$username){
		global $db,$database;
		
		
		$arr['name'] = $name;
		$arr['address'] = $address;
		$arr['mobile'] = $mobile;
		$arr['shop_id'] = $shop_id;
		$arr['username'] = $username;
		
		$db->record_update($db->tbl_fix."warehouse",$arr," id='".$id."'");
		
		

		return true;
	}
	
	public function get_detail( $id ){
		global $db,$database;
		

		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse` WHERE id='".$id."' LIMIT 0,1";
		$row = $db->executeQuery ( $sql, 1 );
		
		
		return $row;
	}
	
	public function get_detail_name( $id ){
		global $db;

		$sql = "SELECT `name` FROM ".$db->tbl_fix."`warehouse` WHERE id='$id' LIMIT 0,1";
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row['name'];
	}

	public function delete($id){
		
		global $db,$database;
		
		
		$arr['id'] = '-'.$id;
		$arr['username'] = 'deleted';
		$db->record_update ($db->tbl_fix."warehouse",$arr," id='".$id."'");
		
		
		return true;
	}

	public function listby_username($username){
		global $db,$database;
		

		$sql = "SELECT `warehouse`.*,`shop`.name as shop_name FROM ".$db->tbl_fix."`warehouse` LEFT JOIN ".$db->tbl_fix."`shop` ON `shop`.id=`warehouse`.shop_id WHERE `warehouse`.`username`='".$username."' ORDER BY `warehouse`.id ASC";
		
		$result = $db->executeQuery ( $sql);
		$return = array();
		while($res = mysqli_fetch_assoc($result)) {
			$return[] = $res;
		}
		
		
		return $return;
	}
	
	public function listby_shop_id( $shop_id ){
		global $db,$database;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse` WHERE `shop_id`='".$shop_id."' AND `id`>0 ORDER BY id ASC";
		
		$result = $db->executeQuery_list( $sql);
		
		return $result;
	}

	public function count_all(){
		global $db;

		$sql = "SELECT COUNT(*) total
				FROM ".$db->tbl_fix."`warehouse`
				WHERE `id` > 0";
		
		$result = $db->executeQuery ( $sql, 1);
		
		return $result['total'];
	}

	public function get_detail_by_shop_id( $shop_id ){
		global $db;

		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse` WHERE `shop_id`='$shop_id' AND `id` > 0 LIMIT 1";
		
		$result = $db->executeQuery ( $sql, 1 );
		
		return $result;
	}
	
	public function listby_username_option($username){
		global $db,$database;
		
		
		$sql = "SELECT `id`,`name` FROM ".$db->tbl_fix."`warehouse` WHERE `username`='".$username."' ORDER BY id ASC";
		$result = $db->executeQuery ( $sql);
		$option = '' ;
		while($row = mysqli_fetch_assoc($result)){
		
			$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
			
		}	
		
		
		return $option;
	}
	
	public function opt_by_username( $dUser, $refix = '' ){
		global $db;
		
		$option = '';
		if( isset($dUser['id']) ){

			if( $dUser['gid'] < 2 ){
				$sql = "SELECT `wh`.id, `wh`.`name`, `wh`.shop_id FROM ".$db->tbl_fix."`warehouse` wh
						WHERE `wh`.`id` > 0
						ORDER BY `wh`.id ASC";
			}else {
				$sql = "SELECT `wh`.id, `wh`.`name`, `wh`.id, `wh`.shop_id FROM ".$db->tbl_fix."`warehouse` wh
					WHERE `wh`.`id` = '".$dUser['shop_id']."' AND `wh`.`id` > 0
					ORDER BY `wh`.id ASC";
			}

			$result = $db->executeQuery ( $sql);
			
			while($row = mysqli_fetch_assoc($result)){
				
				$option .= "<option shop-id='".$row['shop_id']."' value='".$row['id']."'>$refix".$row['name']."</option>";
				
			}	
		}
		
		return $option;
	}

	public function listby_wh_option($shop_id, $wh_id=''){
		global $db,$database;
		
		
		$sql = "SELECT id,name FROM ".$db->tbl_fix."`warehouse` WHERE `shop_id`='".$shop_id."' AND id>0 ORDER BY id ASC";
		$result = $db->executeQuery ( $sql);
		$option = '';
		while($row = mysqli_fetch_assoc($result)){
			if($wh_id == $row['id'] ){
				$option .= "<option selected value='".$row['id']."'>".$row['name']."</option>";
			}else{
				$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		}	
		
		
		return $option;
	}

	public function opt_all_warehouse_once(){
		global $db;
		
		$sql = "SELECT warehouse.`id`, warehouse.`name`, warehouse.`shop_id`, shop.`address`
				FROM ".$db->tbl_fix."`warehouse`
				INNER JOIN ".$db->tbl_fix."`shop` ON shop.`id` = warehouse.`shop_id`
				WHERE warehouse.id > 0 AND shop.id > 0 ORDER BY shop.`id`";
		
		$result = $db->executeQuery ( $sql);
		$option = '';
		while( $row = mysqli_fetch_assoc($result) )
			$option .= '<option value="'.$row['id'].'" shop-id="'.$row['shop_id'].'" address="'.$row['address'].'">'.$row['name'].'</option>';
		
		return $option;
	}

	public function list_all(){
		global $db;

		$sql = "SELECT `warehouse`.`name`, `warehouse`.id, `warehouse`.shop_id, `shop`.name as shop_name
				FROM ".$db->tbl_fix."`warehouse`
				LEFT JOIN ".$db->tbl_fix."`shop` ON `shop`.id=`warehouse`.shop_id
				WHERE `warehouse`.`id` > 0
				ORDER BY `warehouse`.id ASC";
		
		$result = $db->executeQuery_list( $sql);
		
		return $result;
	}
	
	public function opt_all( $refix = '' ){
		global $db;
		
		$option = '';
		$sql = "SELECT `wh`.id, `wh`.`name`, `wh`.shop_id, `shop`.`name` shop_name, `shop`.`address` shop_address
				FROM ".$db->tbl_fix."`warehouse` wh
				INNER JOIN ".$db->tbl_fix."`shop` ON `shop`.id = wh.shop_id
				WHERE `wh`.`id` > 0
				ORDER BY `wh`.id ASC";

		$result = $db->executeQuery ( $sql );
		
		while($row = mysqli_fetch_assoc($result)){
			$option .= '<option shop-id="'.$row['shop_id'].'" shop_name="'.$row['shop_name'].'" address="'.$row['shop_address'].'" value="'.$row['id'].'">'.$refix.$row['name'].'</option>';
		}
		
		return $option;
	}

	public function list_all_accessed( $shop_accessed ){
		global $db;

		$kq = array();
		
		$lShop = explode( ';', $shop_accessed );

		$sqlWhere = '';
		foreach( $lShop as $item ){
			if( $item != '' ){
				$sqlWhere .= " `shop`.`id` = '$item' OR";
			}
		}

		if( $sqlWhere != '' ){
			
			$sqlWhere = substr( $sqlWhere, 0, -2 );

			$sql = "SELECT wh.`*`, `shop`.`name` shop_name, `shop`.`address` shop_address
				FROM ".$db->tbl_fix."`warehouse` wh
				INNER JOIN ".$db->tbl_fix."`shop` ON `shop`.id = wh.shop_id
				WHERE $sqlWhere ORDER BY id ASC";
			
			$kq = $db->executeQuery_list( $sql);

		}

		return $kq;
	}

	public function opt_all_accessed( $shop_accessed ){
		global $db;
		$kq = '';
		
		$lShop = explode( ';', $shop_accessed );

		$sqlWhere = '';
		foreach( $lShop as $item ){
			if( $item != '' ){
				$sqlWhere .= " `shop`.`id` = '$item' OR";
			}
		}

		if( $sqlWhere != '' ){

			$sqlWhere = substr( $sqlWhere, 0, -2 );

			$sql = "SELECT wh.`id`, wh.`name`, wh.`shop_id`, `shop`.`name` shop_name, `shop`.`address` shop_address
				FROM ".$db->tbl_fix."`warehouse` wh
				INNER JOIN ".$db->tbl_fix."`shop` ON `shop`.id = wh.shop_id
				WHERE $sqlWhere ORDER BY id ASC";
			
			$result = $db->executeQuery ( $sql);

			while( $row = mysqli_fetch_assoc($result) ){
				$kq .= '<option shop-id="'.$row['shop_id'].'" shop_name="'.$row['shop_name'].'" address="'.$row['shop_address'].'" value="'.$row['id'].'">'.$row['name'].'</option>';
			}

		}

		return $kq;
	}

	public function list_by_user( $dUserLogin ){
		if( isset($dUserLogin['gid']) && $dUserLogin['gid'] < 1 ){
			return $this->list_all();
		}else{
			return $this->list_all_accessed( isset($dUserLogin['accessed']) ? $dUserLogin['accessed'] : '' );
		}
	}
	
	public function opt_by_user( $dUserLogin, $all_option = 0 ){
		if( isset($dUserLogin['gid']) && $dUserLogin['gid'] < 1 ){
			if( $all_option == 1 )
				$opt = '<option value="">Tất cả kho hàng</option>'.$this->opt_all();
			else
				$opt = $this->opt_all();
			
			return $opt;
		}else{
			return $this->opt_all_accessed( isset($dUserLogin['accessed']) ? $dUserLogin['accessed'] : '' );
		}
	}

}
$wh = new warehouse();


