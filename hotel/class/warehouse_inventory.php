<?php
class warehouse_inventory {
	
	public function add($from, $to, $url_excel, $warehouse_id){
		global $db;
		$main = new main();

		$arr['from_string'] = $from;
		$arr['to_string'] = $to;
		$arr['from'] = strtotime($main->convert_strdate($from));
		$arr['to'] = strtotime($main->convert_strdate($to));
		$arr['url_excel'] = $url_excel;
		$arr['created_at'] = time();
		$arr['synchronization'] = 0;
		$arr['user_created'] = $_SESSION['username_client'];
		$arr['warehouse_id'] = $warehouse_id;
		
		$db->record_insert($db->tbl_fix."`warehouse_inventory`", $arr);
		
		return $db->mysqli_insert_id();
	}
	
	public function update_synchronization($id, $username=''){
		global $db;
		$main = new main();
		
		$arr['synchronization'] = 1;
		$arr['who_inventory'] = $username;
		
		$db->record_update($db->tbl_fix."`warehouse_inventory`",$arr," `id`='".$id."'");
		return true;
	}
	
	public function get_detail($id){
		global $db;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_inventory` WHERE `id`='".$id."' LIMIT 1";
		$row = $db->executeQuery($sql,2);
		
		return $row;
	}
	
}
$wh_inven = new warehouse_inventory();
?>