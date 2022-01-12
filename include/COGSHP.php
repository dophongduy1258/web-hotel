<?php
class COGSHP{

	public function jobCOGS2Menu( $db_selected , $db ){

		// $sql = "SELECT `cat`.shop_id,menu.name,menu.id as menu_id, recipe.goods_id, recipe.amount, unit.export_value
		// 		FROM `$db_selected`.`menu`
		// 		INNER JOIN `$db_selected`.`category` as cat ON cat.id = menu.cat_id
		// 		INNER JOIN `$db_selected`.`recipe` ON `recipe`.menu_id = menu.id
		// 		INNER JOIN `$db_selected`.`goods` ON `recipe`.goods_id = `goods`.id
		// 		INNER JOIN `$db_selected`.`unit` ON `goods`.unit_id = unit.id
		// 		ORDER BY menu.`id`";
		$sql = "SELECT `cat`.shop_id,menu.id as menu_id,menu.name, recipe.goods_id, recipe.amount, unit.export_value
				FROM `$db_selected`.`menu`
				INNER JOIN `$db_selected`.`category` as cat ON cat.id = menu.cat_id
				INNER JOIN `$db_selected`.`recipe` ON `recipe`.menu_id = menu.id
				INNER JOIN `$db_selected`.`goods` ON `recipe`.goods_id = `goods`.id
				INNER JOIN `$db_selected`.`unit` ON `goods`.unit_id = unit.id
				ORDER BY menu.`id`";

		$result = $db->executeQuery( $sql );

		$lastMenuID = 0;
		$COGS = 0;
		while ( $row  = mysqli_fetch_assoc($result) ){

			if( $lastMenuID == $row['menu_id'] || $lastMenuID == 0 ){
				$dWHisImport = $this->get_last_import_of_goods( $db_selected , $db, $row['shop_id'], $row['goods_id']);
				if( isset( $dWHisImport['price'] ) && $dWHisImport['price'] > 0 ){
					$price = $dWHisImport['price'];
					if( $dWHisImport['inverse'] == '0' ){//giá cho đơn vị nhập vào
						$price =  $dWHisImport['price']/$row['export_value'];
					}
					$COGS += $price*$row['amount'];// giá cho 1 đơn vị xuất nhân cho số lượng xuất theo công thức
				}

				// if($row['menu_id'] ==1612 ) echo $row['name'];
			}else{
				//bước qua công thức món mới: cập nhật giá trị cho món cũ và tính công thức cho món mới
				#cap nhat gia tri COGS vào menu.COGS
				$this->updateCOGS2Menu( $db_selected , $db, $lastMenuID, $COGS );
				// if($row['menu_id'] ==1612 ){
				// 	echo '#1##',$lastMenuID;
				// 	 echo '#2##',$COGS;
				// }
				//khởi tạo lại COG cho menu mới
				$COGS = 0;
				$dWHisImport = $this->get_last_import_of_goods( $db_selected , $db, $row['shop_id'], $row['goods_id']);
				if( isset( $dWHisImport['price'] ) && $dWHisImport['price'] > 0 ){
					$price = $dWHisImport['price'];
					if( $dWHisImport['inverse'] == '0' ){//giá cho đơn vị nhập vào
						$price =  $dWHisImport['price']/$row['export_value'];
					}
					$COGS += $price*$row['amount'];// giá cho 1 đơn vị xuất nhân cho số lượng xuất theo công thức
				}
				// if($row['menu_id'] ==1612 ){
				// 	echo '#3##',$lastMenuID;
				// 	 echo '#4##',$COGS;
				// }
				
			}

			$lastMenuID = $row['menu_id'];
		}

		if( $lastMenuID > 0 ){
			$this->updateCOGS2Menu( $db_selected , $db, $lastMenuID, $COGS );
		}
		
		mysqli_free_result( $result );
		return true;
	}
	
	public function get_last_import_of_goods( $db_selected , $db, $shop_id, $goods_id ){
		$sql = "SELECT `price`,`inverse` FROM `$db_selected`.warehouse_history_".$shop_id."_".date('Y')." WHERE `goods_id`='".$goods_id."' ORDER BY `created_at` DESC LIMIT 1";
		// if( $goods_id == 329) echo $sql;
		$result = $db->executeQuery( $sql, 1 );
		return $result;
	}
	
	public function updateCOGS2Menu( $db_selected , $db, $menu_id, $COGS ){
		$sql = "UPDATE `$db_selected`.`menu` SET `menu`.COGS = '$COGS' WHERE `id` = '$menu_id'";
		$result = $db->executeQuery( $sql );
		return true;
	}

}