<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require_once __DIR__.'/#directconfig/config.php';

$mainDB = $db_store->getDatabase();

$password = $_GET['password'];
if( $password == '1q2w3e4r5t6y'){

	// $strDB = $strDB.'_';
	$total_pos = $pos_register->list_per_page_count();
	$limit = 100;
	$ofset = 0;

	$total_divide = 0;//countup value
	while ( $total_divide < $total_pos ){
		$db_store->setDatabase ( $mainDB );
		$lPOSs = $pos_register->list_per_page( $ofset, $limit);
		while( $dPOS = mysqli_fetch_assoc( $lPOSs ) ){

            // echo $dbSelected;
            // $sql = "SHOW TABLES IN  `$dbSelected`";
            
			// print_r($kq);
			// exit();
			// SELECT CONCAT('ALTER TABLE ', TABLE_SCHEMA, '.', TABLE_NAME,' ENGINE=InnoDB;') FROM Information_schema.TABLES WHERE TABLE_SCHEMA = 'DBNAME' AND ENGINE = 'MyISAM' AND TABLE_TYPE = 'BASE TABLE'

   //          $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `from_1` `from_1` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			// $resultSQLListTable = $db_store->executeQuery( $sql );

			// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `to_1` `to_1` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			// $resultSQLListTable = $db_store->executeQuery( $sql );

			// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `from_2` `from_2` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			// $resultSQLListTable = $db_store->executeQuery( $sql );

			// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `to_2` `to_2` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;";
			// $resultSQLListTable = $db_store->executeQuery( $sql );
			
			if( $dPOS['pos_type'] == 'cafe' ){
            	$dbSelected = 'citipos_f_'.$dPOS['store_name'];

				// //for license
				// $sql = "ALTER TABLE `$dbSelected`.`shop` ADD `license_key` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `id`, ADD `license_expire_at` INT(11) NOT NULL AFTER `license_key`, ADD `license_type` INT(11) NOT NULL AFTER `license_expire_at`;";
				// $resultSQLListTable = $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`coffers` ADD `img` VARCHAR(500) NOT NULL AFTER `note`;";
				// $resultSQLListTable = $db_store->executeQuery( $sql );
				
				// $sql = "INSERT INTO `$dbSelected`.`setting` (`varname`, `title`, `value`, `defaultvalue`, `datatype`, `group`, `priority`) VALUES ('license_type', 'Loại license', 'Silver','Silver||Glod', 'input', 'site', '1');";
				// $resultSQLListTable = $db_store->executeQuery( $sql );

				// $sql = "ALTER TABLE `$dbSelected`.`shop` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
				// $resultSQLListTable = $db_store->executeQuery( $sql );

				// $sql = "ALTER TABLE `$dbSelected`.`shop` ADD PRIMARY KEY (`id`);";
				// $resultSQLListTable = $db_store->executeQuery( $sql );

				// $sql = "ALTER TABLE `$dbSelected`.`shop` ADD `bill_is_show_lien_phieu` INT( 1 ) NOT NULL COMMENT '0:1',
				// 		ADD `bill_is_show_order_code` INT( 1 ) NOT NULL COMMENT '0:1',
				// 		ADD `bill_is_show_vat` INT( 1 ) NOT NULL COMMENT '0:1',
				// 		ADD `bill_is_show_more_info` INT( 1 ) NOT NULL ,
				// 		ADD `bill_more_info_text` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
				// 		ADD `bill_is_print_on_collected` INT( 1 ) NOT NULL ,
				// 		ADD `bill_logo` VARCHAR( 256 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
				// 		ADD `bill_is_show_logo` INT( 1 ) NOT NULL ,
				// 		ADD `bill_is_top_logo` INT( 1 ) NOT NULL ;";
				// $resultSQLListTable = $db_store->executeQuery( $sql );

				// while ($row = mysqli_fetch_assoc( $resultSQLListTable ) ) {
				// 	$tbl = $row['TABLE_NAME'];
			 //        $sql1 = "ALTER TABLE `$dbSelected`.`$tbl` ENGINE=INNODB";
			 //        $db_store->executeQuery( $sql1 );
				// }
				// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `from_1` `from_1` FLOAT NOT NULL;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `to_1` `to_1` FLOAT NOT NULL;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`calendar` CHANGE `from_2` `from_2` FLOAT NOT NULL;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_1_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_2_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_3_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_4_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_5_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				// $sql = "ALTER TABLE `$dbSelected`.`order_6_2016` ADD `is_customer_exist_card` INT(1) NOT NULL AFTER `id`;";
				// $db_store->executeQuery( $sql );
				
				// $sql = "CREATE TABLE `$dbSelected`.`mega_tag` (
				// 		  `id` int(11) NOT NULL,
				// 		  `menu_type` int(11) NOT NULL COMMENT '= 1 món ăn, =2 thức uống, =3 khác',
				// 		  `root` int(11) NOT NULL COMMENT '= 0 root tag; 1 = tag',
				// 		  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				// 		  `value` float NOT NULL
				// 		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Mega tag chưa tag tổng';";
				// $db_store->executeQuery( $sql );
				
				// $sql = "INSERT INTO `$dbSelected`.`mega_tag` (`id`, `menu_type`, `root`, `name`, `value`) VALUES
				// 		(1, 2, 0, 'Mùi Hương', 0),
				// 		(2, 2, 0, 'Loại Hạt', 0),
				// 		(3, 2, 0, 'Bánh Flan', 0),
				// 		(4, 2, 0, 'Hạt', 0),
				// 		(5, 2, 1, 'Cara-mel', 5000),
				// 		(6, 2, 1, 'Socola', 5000),
				// 		(7, 2, 1, 'Bạc hà', 5000),
				// 		(8, 2, 1, 'Bạc hà thảo mộc', 5000),
				// 		(9, 2, 2, 'Trân Châu mật ong', 5000),
				// 		(10, 2, 2, 'Thảo mộc', 3000),
				// 		(11, 2, 2, 'Nha đam', 3000),
				// 		(12, 2, 2, 'Sương sáo', 3000),
				// 		(13, 2, 3, 'Flan Trứng', 6000),
				// 		(14, 2, 3, 'Flan Phô Mai', 9000),
				// 		(15, 2, 3, 'Flan môn', 6000),
				// 		(16, 2, 3, 'Flan Socola', 9000),
				// 		(17, 2, 4, 'Trái cây', 6000),
				// 		(18, 2, 4, 'Lụa Trà', 9000),
				// 		(19, 2, 4, 'Kiwi', 6000),
				// 		(20, 2, 4, 'Việt Quất', 9000);";
				// $db_store->executeQuery( $sql );
				
				// $sql = "ALTER TABLE `$dbSelected`.`mega_tag`
  		// 				ADD PRIMARY KEY (`id`);";
				// $db_store->executeQuery( $sql );
								
				// $sql = "ALTER TABLE `$dbSelected`.`print_bill` ADD `type` INT(1) NOT NULL DEFAULT '0' COMMENT ' = 0 in order thong thuong; =1 in order nuoc; =2 in order mon an; =3 in order ca nuoc va mon an' AFTER `shop_id`;";
				// $db_store->executeQuery( $sql );
				
				// $sql = "ALTER TABLE `$dbSelected`.`shop` ADD `is_split_bill` INT(1) NOT NULL COMMENT 'In gộp bill hay tách bill' AFTER `note_in_bill`;";
				// $db_store->executeQuery( $sql );


				// $sql = "ALTER TABLE `$dbSelected`.`shop` ADD `enable_chef` INT(1) NOT NULL DEFAULT '0' AFTER `check_all_made`, ADD `enable_bartender` INT(1) NOT NULL DEFAULT '0' AFTER `enable_chef`;";
				// $db_store->executeQuery( $sql );

				




				// $sql = "UPDATE  `$dbSelected`.`setting` SET  `value` =  '2.6892' WHERE  `setting`.`varname` =  'version';";
				// $db_store->executeQuery( $sql );
				
			}else if( $dPOS['pos_type'] == 'retail' && $dPOS['store_name'] = 'azone' ){
				$dbSelected = 'citipos_r_'.$dPOS['store_name'].'.';

				$sql = "ALTER TABLE $dbSelected`treasurer` ADD `date_issue` INT(11) NOT NULL AFTER `is_auto`;UPDATE `treasurer` SET `date_issue`=`ngay_tao` WHERE 1;
						UPDATE $dbSelected`treasurer` SET `date_issue`=`ngay_tao` WHERE 1;

ALTER TABLE $dbSelected`members` CHANGE `country` `country` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE $dbSelected`members` CHANGE `city` `city` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE $dbSelected`members` CHANGE `district` `district` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE $dbSelected`members` CHANGE `ward` `ward` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

CREATE TABLE $dbSelected`address_book` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Address book';

ALTER TABLE $dbSelected`address_book` ADD PRIMARY KEY (`id`);

ALTER TABLE $dbSelected`address_book` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE $dbSelected`members` ADD `city_allowed` TEXT NOT NULL AFTER `created_by`;
ALTER TABLE $dbSelected`members` ADD `district_allowed` TEXT NOT NULL AFTER `city_allowed`;
ALTER TABLE $dbSelected`shop` ADD `payment_default` TEXT NOT NULL AFTER `default_member_group`;
ALTER TABLE $dbSelected`SKU` CHANGE `on_stock` `on_stock` DECIMAL(15.4) NOT NULL COMMENT 'So luong con trong kho';
ALTER TABLE $dbSelected`product` CHANGE `price` `price` DECIMAL(15,4) NOT NULL COMMENT 'Giá gọi món';
ALTER TABLE $dbSelected`product` CHANGE `sum_stock` `sum_stock` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`warehouse_history` CHANGE `price` `price` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`warehouse_card` CHANGE `before_inventory` `before_inventory` DECIMAL(15,4) NOT NULL COMMENT 'Tồn đầu kỳ';
ALTER TABLE $dbSelected`warehouse_card` CHANGE `sum_export` `sum_export` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`warehouse_card` CHANGE `sum_import` `sum_import` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`warehouse_card` CHANGE `difference` `difference` DECIMAL(15,4) NOT NULL COMMENT 'Mức chênh lệch';
ALTER TABLE $dbSelected`ncc_order_detail` CHANGE `quantity` `quantity` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`ncc_order_detail` CHANGE `price` `price` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`ncc_order_detail` CHANGE `decrement` `decrement` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`ncc_order_detail` CHANGE `inverse` `inverse` DECIMAL(15,4) NOT NULL;
ALTER TABLE $dbSelected`wallet_detail` CHANGE `amount` `amount` DECIMAL(20,4) NOT NULL;
ALTER TABLE $dbSelected`wallet_transaction` CHANGE `amount` `amount` DECIMAL(20,4) NOT NULL;
ALTER TABLE $dbSelected`wallet_transaction` CHANGE `fee` `fee` DECIMAL(15,4) NOT NULL;

						";
				// $sql = explode(PHP_EOL, $sql);
				$sql = explode(';', $sql);

				foreach($sql as $s){
					if( $s != '' )
						$db_store->executeQuery( $s );
				}



				//Xử lý loop cho bảng order
				$years = array( '2019', '2020' );
				$maxloop = 25;

				foreach ($years as $key => $year) {
					for ($i=0; $i < $maxloop; $i++) { 
					
						$sql2 = "ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `quantity` `quantity` DECIMAL(15,4) NOT NULL COMMENT 'Số lượng';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `returned` `returned` DECIMAL(15,4) NOT NULL;
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `max_allowed_order` `max_allowed_order` DECIMAL(15,4) NOT NULL DEFAULT '0' COMMENT 'số lượng tối đa cho phép order; =0 là không giới hạn; còn lại phải lớn hơn 0';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `price` `price` DECIMAL(15,4) NOT NULL COMMENT 'Giá bán';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `root_price` `root_price` DECIMAL(15,4) NOT NULL COMMENT 'Giá gốc của sản phẩm này';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `vat` `vat` DECIMAL(15,4) NOT NULL COMMENT '% VAT';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `decrement` `decrement` DECIMAL(15,4) NOT NULL COMMENT '% Giảm giá';
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `delivered` `delivered` DECIMAL(15,4) NOT NULL DEFAULT '0' COMMENT 'Số lượng đã giao';
								ALTER TABLE $dbSelected`order_".$i."_$year` CHANGE `total` `total` DECIMAL(15,4) NOT NULL COMMENT 'Tổng tiền của order';
								ALTER TABLE $dbSelected`order_".$i."_$year` CHANGE `cash_more` `cash_more` DECIMAL(15,4) NOT NULL COMMENT 'cash more for MB360Pay';
								ALTER TABLE $dbSelected`order_".$i."_$year` CHANGE `total_paid` `total_paid` DECIMAL(15,4) NOT NULL COMMENT 'Tổng tiền đã trả';
								ALTER TABLE $dbSelected`order_".$i."_$year` ADD `address_book_id` INT(11) NOT NULL AFTER `ship_note`;
								ALTER TABLE $dbSelected`detail_order_".$i."_$year` CHANGE `max_allowed_order` `max_allowed_order` DECIMAL(15,4) NOT NULL DEFAULT '0' COMMENT 'số lượng tối đa cho phép order; =0 là không giới hạn; còn lại phải lớn hơn 0';
								";

						$sql2 = explode(';', $sql2);

						foreach($sql2 as $s){
							if( $s != '' )
								$db_store->executeQuery( $s );
						}
					
					}
				}



				

			}

			// }
			$total_divide++;
		}
		$ofset++;
	}
	$db_store->close();
	echo '200 success:jobs Robot SQL POS HP';
}else{
	echo '403 Unknow username DB:jobs Robot SQL POS HP';
}