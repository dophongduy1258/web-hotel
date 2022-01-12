<?php
class dynamicDBHP{

	public function order( $db_selected, $today , $db, $shop_id ){//today: time()
	
		$sql = "CREATE TABLE IF NOT EXISTS $db_selected.`order_%s` (
				  `id` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
				  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
				  `date_in` int(11) NOT NULL,
				  `date_out` int(11) NOT NULL,
				  `table_id` int(11) NOT NULL,
				  `in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
				  `out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
				  `amount` int(11) NOT NULL,
				  `cash_more` float NOT NULL COMMENT 'cash more MB360Pay',
				  `user_add` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Người tạo',
				  `shop_id` int(11) NOT NULL,
				  `status` int(1) NOT NULL COMMENT 'trạng thái order =0 là tạm, = 1 là khởi tạo hoàn thành, = -1 là order hủy do hủy bàn',
				  `waiter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				  `printed` int(11) NOT NULL COMMENT 'Đã in phiếu tình tiền cho khách, đồng thời hủy bàn',
				  `last_update` int(11) NOT NULL COMMENT 'Lần cập nhật cuối',
				  `cooked` int(11) NOT NULL COMMENT 'Tất cả các món đã được nấu',
				  `treasurer` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Thu ngân',
				  `note` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ghi chứ cho order',
				  `added` int(1) NOT NULL DEFAULT '0' COMMENT 'Đã thêm vào database',
				  `temp_area` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Khu vực đăng nhập temp',
				  `count_print` int(11) NOT NULL,
				  `booking` int(11) NOT NULL COMMENT '=0 la tien mat, =1 la the, = 2 la ngoai te',
				  `name_customer` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ten khach hang cua order',
				  `id_customer` int(11) NOT NULL,
				  `mobile_customer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				  `no_customer` int(11) NOT NULL COMMENT 'So luong khach hang',
				  `payment_type` int(1) NOT NULL COMMENT '=0 la tien mat, =1 la the, = 2 la ngoai te',
				  `online` int(1) NOT NULL DEFAULT '0' COMMENT 'Đây là order từ online ?',
				  `cart_id` int(11) NOT NULL COMMENT 'Trường hợp online = 1, Thì cart_id giá trị là id từ bản cart_id',
				  `paid` int(1) NOT NULL,
				  `checkin` int(1) NOT NULL COMMENT 'An tai cho',
				  `merged` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Giá trị merged',
				  `36h_paid_apart` float NOT NULL COMMENT 'cash more of 36h',
				  `is_customer_exist_card` int(1) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng order khách hàng'";
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		$sql = "CREATE TABLE IF NOT EXISTS $db_selected.`detail_order_%s` (
			  `id` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
			  `order_id` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
			  `menu_id` int(11) NOT NULL COMMENT 'Mã món',
			  `amount` float NOT NULL COMMENT 'Số lượng',
			  `date_add` int(11) NOT NULL COMMENT 'Thời gian tạo',
			  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên món',
			  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ghi chú món ăn cho món vừa gọi',
			  `price` float NOT NULL COMMENT 'Giá bán',
			  `COGS` float NOT NULL COMMENT 'cost of goods sold - Giá vốn hàng bán',
			  `printed_amount` int(11) NOT NULL,
			  `decrement` float NOT NULL COMMENT 'Phần trăm giảm giá',
			  `increment` float NOT NULL COMMENT 'Phần trăm tăng giá',
			  `vat` float NOT NULL COMMENT 'Phần trăm VAT',
			  `user_increment` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Người thực hiện giảm giá hay tăng giá',
			  `cooked` float NOT NULL COMMENT 'So luong dau nau la bao nhieu mon nay tron order nay',
			  `cooking` int(1) NOT NULL DEFAULT '0',
			  `last_update` int(11) NOT NULL COMMENT 'Thời gian cập nhật gần nhất',
			  `sended` float NOT NULL DEFAULT '0' COMMENT 'Đã xác nhận gửi vào bếp',
			  `top` int(1) NOT NULL,
			  `cancel_amount` float NOT NULL,
			  `cancel_note` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
			  `user_add` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Người thêm',
			  `is_coupon` int(1) NOT NULL,
			  `coupon_id` int(11) NOT NULL,
			  `is_hour_karaoke` int(1) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );
		
		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );
		
		unset($sql);
		return true;
	}

	public function cart( $db_selected, $today, $db, $shop_id ){//today: time()

		$sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`cart_%s` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  `store_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
			  `status` int(1) NOT NULL,
			  `saw` int(1) NOT NULL COMMENT 'Đã nhận được order',
			  `saw_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `saw_at` int(11) NOT NULL,
			  `packed` int(1) NOT NULL COMMENT 'Đã đóng gói hàng',
			  `packed_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `packed_at` int(11) NOT NULL,
			  `received` int(1) NOT NULL COMMENT 'Khách đã nhận được hàng',
			  `received_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `received_at` int(11) NOT NULL,
			  `paid` int(1) NOT NULL COMMENT 'Đã nhận được tiền',
			  `paid_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `paid_at` int(11) NOT NULL,
			  `create_at` int(11) NOT NULL,
			  `last_update` int(11) NOT NULL,
			  `note` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
			  `checkin` int(1) NOT NULL COMMENT 'Hình thức nhận hàng = 1 là checkin tại quầy, = 0 là takeaway ',
			  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
			  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `come_at` int(11) NOT NULL,
			  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  `payment_type` int(11) NOT NULL,
			  `paid_paypal` int(1) NOT NULL COMMENT 'paypal được trả khi payment_type = 2',
			  `email_paypal` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
			  `store_id` int(11) NOT NULL,
			  `order_id` int(11) NOT NULL COMMENT 'Ket noi vs order id',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng order mua hàng online - giỏ hàng' AUTO_INCREMENT=0";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		$sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`detail_cart_%s` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `quantity` float NOT NULL,
			  `price` float NOT NULL,
			  `decrement` int(11) NOT NULL,
			  `cart_id` int(11) NOT NULL,
			  `menu_id` int(11) NOT NULL,
			  `create_at` int(11) NOT NULL,
			  `store_detail_cart_id` int(11) NOT NULL,
			  `store_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  `note` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		unset($sql);
		return true;
	}

	public function warehouse_card( $db_selected, $today, $db, $shop_id ){//today: time()
		
		$sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`warehouse_card_%s` (
			  `days` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'format: m/d/Y',
			  `goods_id` int(11) NOT NULL,
			  `goods_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `type_goods` int(1) NOT NULL,
			  `before_inventory` float NOT NULL COMMENT 'Tồn đầu kỳ',
			  `sum_export` float NOT NULL,
			  `sum_import` float NOT NULL,
			  `user_cron` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `difference` float NOT NULL COMMENT 'Mức chênh lệch',
			  `date_inventory` int(11) NOT NULL,
			  `warehouse_id` int(11) NOT NULL,
			  `unit_id` int(11) NOT NULL,
			  `created_at` int(11) NOT NULL,
			  PRIMARY KEY (`days`,`goods_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng thẻ kho - Xuất nhập kho hằng ngày'";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		unset($sql);
		return true;
	}

	public function warehouse_import( $db_selected, $today, $db, $shop_id ){//str_date: yyyymm - include warehouse import and histore
		
		$sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`warehouse_history_%s` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `goods_id` int(11) NOT NULL COMMENT 'Mã hàng hóa nhập',
			  `amount` float NOT NULL COMMENT 'Số lượng nhập',
			  `price` int(11) NOT NULL,
			  `user_add` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'người cập nhật',
			  `before_add` int(11) NOT NULL COMMENT 'Số lượng trước khi nhập',
			  `created_at` int(11) NOT NULL,
			  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `wh_import_id` int(11) NOT NULL,
			  `inverse` int(1) NOT NULL DEFAULT '0' COMMENT 'Sử dụng đơn vị nhập = 0;sử đụng đơn vị xuất = 1',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lịch sử nhập hàng vào kho' AUTO_INCREMENT=0 ";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );
				
		$sql = "CREATE TABLE IF NOT EXISTS `$db_selected`.`warehouse_import_%s` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
			  `warehouse_id` int(11) NOT NULL,
			  `import_date` int(11) NOT NULL,
			  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `provider_id` int(11) NOT NULL,
			  `export_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Xuất hàng cho đơn vị nào',
			  `created_date` int(11) NOT NULL,
			  `status` int(1) NOT NULL COMMENT 'Trạng thái của đơn hàng nhập, 0 là khởi tạo, 1 là đã tạo',
			  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phan loai la nhap hay xuat kho',
			  `intestine` int(1) NOT NULL DEFAULT '0' COMMENT 'Xuất nội bộ: = 1 là xuất nội bộ',
			  `export_warehouse_id` int(11) NOT NULL COMMENT 'Kho được xuất cho',
			  `export_shop_id` int(11) NOT NULL COMMENT 'Cửa hàng được xuất cho',
			  `payment_type` int(1) NOT NULL COMMENT 'Hinh thuc thanh toan',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Mã nhập kho ' AUTO_INCREMENT=0 ";
		
		$strdate = $shop_id.'_'.date('Y', $today);
		$db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of last month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );

		// $month = strtotime('first day of next month');
		// $strdate = date('Ym', $month);
		// $db->executeQuery( sprintf($sql, $strdate) );
		
		unset($sql);
		return true;
	}
	
	public function createDB_newShop( $db_selected, $today, $db, $shop_id ){
		
		$this->order( $db_selected, $today , $db, $shop_id );
		$this->cart( $db_selected, $today , $db, $shop_id );
		$this->warehouse_card( $db_selected, $today , $db, $shop_id );
		$this->warehouse_import( $db_selected, $today , $db, $shop_id );
		return true;
	}
	
	public function createDB( $db_selected, $today , $db ){

		$sql = "SELECT id as shop_id FROM `$db_selected`.`shop` WHERE `id` > 0 ORDER BY `id`";
		$result = $db->executeQuery( $sql );

		while ($row  = mysqli_fetch_assoc($result) ){
			$this->order( $db_selected, $today , $db, $row['shop_id'] );
			$this->cart( $db_selected, $today , $db, $row['shop_id'] );
			$this->warehouse_card( $db_selected, $today , $db, $row['shop_id'] );
			$this->warehouse_import( $db_selected, $today , $db, $row['shop_id'] );
		}
		mysqli_free_result( $result );

		return true;
	}
	
}