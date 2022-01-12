<?php
class dynamicDBRT{

	public function order( $db_selected, $year , $db, $shop_id ){//str_date: yyyymm
		
		$sql = "CREATE TABLE `$db_selected`.`order_".$shop_id."_".$year."` AS ( SELECT * FROM `$db_selected`.`order_1_".date('Y')."` WHERE 0 )";
		$db->executeQuery( $sql );
		$sql = "ALTER TABLE `$db_selected`.`order_".$shop_id."_".$year."` ADD PRIMARY KEY (id)";
		$db->executeQuery( $sql );
		$sql = 'ALTER TABLE `'.$db_selected.'`.`order_'.$shop_id.'_'.$year.'` ENGINE InnoDB, CHARSET utf8, collate utf8_unicode_ci, COMMENT = "Bảng đơn hàng" ';
		$db->executeQuery( $sql );
		

		$sql = "CREATE TABLE `$db_selected`.`detail_order_".$shop_id."_".$year."` AS ( SELECT * FROM `$db_selected`.`detail_order_1_".date('Y')."` WHERE 0 )";
		$db->executeQuery( $sql );
		$sql = "ALTER TABLE `$db_selected`.`detail_order_".$shop_id."_".$year."` ADD PRIMARY KEY (id)";
		$db->executeQuery( $sql );
		$sql = 'ALTER TABLE `'.$db_selected.'`.`detail_order_'.$shop_id.'_'.$year.'` ENGINE InnoDB, CHARSET utf8, collate utf8_unicode_ci, COMMENT = "Bảng đơn hàng" ';
		$db->executeQuery( $sql );
		
		unset($sql);
		return true;
	}
	
	
	public function cart( $db_selected, $today, $db, $shop_id ){//str_date: yyyymm

		// $sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`cart_%s` (
		// 		  `id` int(11) NOT NULL AUTO_INCREMENT,
		// 		  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `store_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `status` int(1) NOT NULL,
		// 		  `cancel_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Huy boi',
		// 		  `saw` int(1) NOT NULL COMMENT 'Đã nhận được order',
		// 		  `packed` int(1) NOT NULL COMMENT 'Đã đóng gói hàng',
		// 		  `received` int(1) NOT NULL COMMENT 'Khách đã nhận được hàng',
		// 		  `paid` int(1) NOT NULL COMMENT 'Đã nhận được tiền',
		// 		  `created_at` int(11) NOT NULL,
		// 		  `last_update` int(11) NOT NULL,
		// 		  `last_update_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `store_cart_id` int(11) NOT NULL,
		// 		  `saw_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `saw_at` int(11) NOT NULL,
		// 		  `packed_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `packed_at` int(11) NOT NULL,
		// 		  `received_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `received_at` int(11) NOT NULL,
		// 		  `paid_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `paid_at` int(11) NOT NULL,
		// 		  `note` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
		// 		  `printed` int(11) NOT NULL,
		// 		  `vat` int(11) NOT NULL,
		// 		  PRIMARY KEY (`id`)
		// 		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng order mua hàng online - giỏ hàng' AUTO_INCREMENT=1 ";
		
		// $strdate = $shop_id.'_'.date('Y', $today);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );
		
		// $sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`detail_cart_%s` (
		// 		  `id` int(11) NOT NULL AUTO_INCREMENT,
		// 		  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `quantity` int(11) NOT NULL,
		// 		  `price` int(11) NOT NULL,
		// 		  `decrement` int(11) NOT NULL,
		// 		  `cart_id` int(11) NOT NULL,
		// 		  `product_id` int(11) NOT NULL,
		// 		  `created_at` int(11) NOT NULL,
		// 		  `sku_id` int(11) NOT NULL,
		// 		  `att_name_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `att_name_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `att_name_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `att_name_4` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `att_name_5` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `store_detail_cart_id` int(11) NOT NULL,
		// 		  `root_price` float NOT NULL,
		// 		  `wh_history_id` int(11) NOT NULL,
		// 		  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		// 		  `user_add` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Sử dụng trong trường hợp trả hàng: mean người nào trả',
		// 		  PRIMARY KEY (`id`)
		// 		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
		
		// $strdate = $shop_id.'_'.date('Y', $today);
		// $db->executeQuery( sprintf($sql, $strdate) );
		
		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $db->executeQuery( $sql );
		unset($sql);
		return true;
	}
	
	// public function createDB( $db_selected, $year, $db, $shop_id ){
	// 	$this->order( $db_selected, $year, $db, $shop_id );
	// 	return true;
	// }
	
	public function createDB_newShop( $db_selected, $today, $db, $shop_id ){

		$sqlSetting = "SELECT `value` FROM `$db_selected`.`setting` WHERE `varname` = 'begin_time'";
		$dSetting = $db->executeQuery( $sqlSetting, 1 );

		$begin_time = time();
		if( isset($dSetting['value']) &&  $dSetting['value'] > 10000000 ){
			$begin_time = $dSetting['value'];
		}

		$year = date('Y', $begin_time);
		while( $year <= date('Y') ){

			$this->order( $db_selected, $year , $db, $shop_id );
			// $this->cart( $db_selected, $today , $db, $shop_id );
			$year++;

		}
		return true;
	}
	
	// public function createDB_new( $db_selected, $today , $db ){

	// 	$sqlSetting = "SELECT `value` FROM `$db_selected`.`setting` WHERE `varname` = 'begin_time'";
	// 	$dSetting = $db->executeQuery( $sqlSetting, 1 );

	// 	$begin_time = time();
	// 	if( isset($dSetting['value']) &&  $dSetting['value'] > 10000000 ){
	// 		$begin_time = $dSetting['value'];
	// 	}

	// 	$year = date('Y', $begin_time);
		
	// 	$sql = "SELECT `id` `shop_id` FROM `$db_selected`.`shop` WHERE `id` > 0 ORDER BY `id`";
	// 	$result = $db->executeQuery( $sql );
		
	// 	// while( $year > date('Y') ){
	// 	while ($row  = mysqli_fetch_assoc($result) ){
	// 		$this->createDB( $db_selected, $today , $db, $row['shop_id'] );
	// 	}
	// 	mysqli_free_result( $result );

	// 	return true;
	// }

}