<?php
class warehouse_dtinventory {
	
	public function add($whinven_id,$goods_id,$ton_dau,$tong_nhap,$tong_xuat,$ton_cuoi,$quy_doi,$thuc_te,$chenh_lech){
		global $db,$database;
		

		$arr['wh_inventory_id'] = $whinven_id;
		$arr['goods_id'] = $goods_id;
		$arr['ton_dau'] = $ton_dau;
		$arr['tong_nhap'] = $tong_nhap;
		$arr['tong_xuat'] = $tong_xuat;
		$arr['ton_cuoi'] = $ton_cuoi;
		$arr['quy_doi'] = $quy_doi;
		$arr['thuc_te'] = $thuc_te;
		$arr['chenh_lech'] = $chenh_lech;
		
		$db->record_insert($db->tbl_fix."`warehouse_dtinventory`",$arr);
		
		
		return $db->mysqli_insert_id();
	}
	
	public function list_by_inID($inID){
		global $db;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`warehouse_dtinventory` WHERE wh_inventory_id='".$inID."' ORDER BY id ASC";
		$result = $db->executeQuery($sql);
		while($row = mysqli_fetch_assoc($result)){
			$rt[] = $row;
		}
		unset($row);
		
		return $rt;
	}
	
	public function listby_from_to( $shop_id, $from, $to, $keyword ){
		global $db;
		
		if( $keyword != '' ) $keyword = " ";

		$sql = "SELECT inven.*, wh.`name` as warehouse_name 
		FROM ".$db->tbl_fix."`warehouse_inventory` as inven 
		INNER JOIN ".$db->tbl_fix."`warehouse` as wh ON inven.warehouse_id = wh.id 
		WHERE '$from' < created_at AND created_at < '$to' AND shop_id='$shop_id' ORDER BY id DESC";
		
		$result = $db->executeQuery($sql);
		while($row = mysqli_fetch_assoc($result)){
			$rt[] = $row;
		}
		
		unset($row);
		return $rt;
	}

}

$wh_dtinven = new warehouse_dtinventory();
