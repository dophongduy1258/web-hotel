<?php

/**
- Record decrement: product_id = 0, sku_id =0,  quantity = -1 (Giảm giá %)
- Record surcharge: product_id = 0, sku_id =0,  quantity = 1 (Phụ thu)
 **/
class detail_order extends model
{

	protected $class_name = 'detail_order';
	protected $id;
	protected $order_id;
	protected $product_id;
	protected $sku_id;
	protected $quantity;
	protected $quantity_paid; //số lượng sản phẩm còn nợ
	protected $returned;
	protected $max_allowed_order;
	protected $date_add;
	protected $name;
	protected $note;
	protected $price;
	// Giá mặc định: nghĩa là giá lẻ mặc định sẽ bán cho khách hàng này; 
	// nếu không cài product_price_detail theo đối tượng thì giá mặc định = product.price; 
	//còn nếu có default_price bằng product_price_detail.value
	protected $default_price;
	protected $root_price; //Giá vốn cài đặt hoặc có thể tính theo giá nhập
	protected $wh_history_id;
	protected $decrement;
	protected $vat;
	protected $user_decrement;
	protected $last_update;
	protected $user_add;
	protected $attribute_1;
	protected $attribute_2;
	protected $attribute_3;
	protected $attribute_4;
	protected $attribute_5;
	protected $sku_name;
	protected $same_groups;
	protected $wh_history_return_id;
	protected $is_coupon;
	protected $coupon_id;
	protected $is_cancel; // trả hàng
	protected $cancel_report_id;
	protected $delivered;
	protected $inverse; //đơn vị hập xuất
	protected $expire_date;
	protected $ratio_convert;
	protected $barcode;
	protected $cashback_value; //Giá trị cashback: % hay giá trị nhập
	protected $cashback_is_value; //Loại cashback: theo giá trị hay theo % = 1 theo giá trị; = 0 theo %

	public function add($shop_id, $order_created_at)
	{
		global $db, $main;

		$arr['id'] 						= $id = $this->get_id($shop_id, $this->get('user_add'));
		$arr['order_id'] 				= $this->get('order_id');
		$arr['product_id'] 				= $this->get('product_id') + 0;
		$arr['sku_id'] 					= $this->get('sku_id');

		$arr['quantity'] 				= $this->get('quantity');
		$arr['quantity_paid'] 				= $this->get('quantity');
		$arr['returned'] 				= 0;
		$arr['max_allowed_order'] 		= $this->get('max_allowed_order') + 0;
		$arr['date_add'] 				= time();
		$arr['name'] 					= $this->get('name');
		$arr['note'] 					= $this->get('note');
		$arr['price'] 					= $this->get('price');
		$arr['default_price'] 			= $this->get('default_price') + 0;
		$arr['root_price'] 				= $this->get('root_price');
		$arr['wh_history_id'] 			= $this->get('wh_history_id');

		if ($this->get('decrement') != 0)
			$arr['decrement'] 			= $this->get('decrement');
		else
			$arr['decrement'] 			= 0;

		$arr['vat'] 					= 0;
		$arr['user_decrement'] 			= '';
		$arr['last_update'] 			= time();
		$arr['user_add'] 				= $this->get('user_add');

		$arr['attribute_1'] 			= $this->get('attribute_1');
		$arr['attribute_2'] 			= $this->get('attribute_2');
		$arr['attribute_3'] 			= $this->get('attribute_3');
		$arr['attribute_4'] 			= $this->get('attribute_4');
		$arr['attribute_5'] 			= $this->get('attribute_5');

		$arr['sku_name'] 				= $this->get('sku_name');
		$arr['same_groups'] 			= $this->get('same_groups') + 0;
		$arr['wh_history_return_id'] 	= $this->get('wh_history_return_id') + 0;

		$arr['is_coupon'] 				= $this->get('is_coupon') + 0;
		$arr['coupon_id'] 				= $this->get('coupon_id') + 0;
		$arr['is_cancel'] 				= $this->get('is_cancel') + 0;
		$arr['cancel_report_id'] 		= $this->get('cancel_report_id') + 0;
		$arr['delivered'] 				= $this->get('delivered') + 0;
		$arr['inverse'] 				= $this->get('inverse') + 0;
		$arr['expire_date'] 			= $this->get('expire_date') + 0;
		$arr['ratio_convert'] 			= $this->get('ratio_convert') + 0;

		$arr['barcode'] 				= $this->get('barcode') . '';

		$arr['cashback_value'] 			= $this->get('cashback_value') + 0;
		$arr['cashback_is_value'] 		= $this->get('cashback_is_value') + 0;

		$db->record_insert($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr);

		return $id;
	}

	public function clonex($new_order_id)
	{
		global $db, $main;

		$shop_id 		= $this->get('shop_id');
		$order_id 		= $this->get('order_id');
		$created_at 	= $this->get('created_at');
		$user_add 		= $this->get('user_add');

		$lItems = $this->listby_order($shop_id, $order_id, $created_at);
		foreach ($lItems as $key => $arr) {

			$arr['id'] 						= $this->get_id($shop_id, $user_add);
			$arr['returned'] 				= 0;
			$arr['order_id'] 				= $new_order_id;
			$arr['max_allowed_order'] 		= 0;
			$arr['date_add'] 				= time();
			$arr['last_update'] 			= time();
			$arr['user_add'] 				= $user_add;
			$arr['wh_history_return_id'] 	= 0;
			$arr['is_cancel'] 				= 0;
			$arr['cancel_report_id'] 		= 0;
			$arr['delivered'] 				= 0;

			unset($arr['sku_code']);
			unset($arr['unit_import']);
			unset($arr['unit_export']);

			$db->record_insert($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y') . "`", $arr);
		}
		unset($lItems);

		return true;
	}

	public function add_coupon($shop_id, $coupon_code, $order_created_at)
	{
		global $db, $order, $main;

		$order_id 			= $this->get('order_id');
		$arr['id'] 			= $id = $this->get_id($shop_id, $this->get('user_add'));
		$arr['order_id'] 	= $order_id;
		$arr['product_id'] 	= 0;
		$arr['sku_id'] 		= 0;
		$arr['quantity'] 	= -1;
		$arr['returned'] 	= 0;
		$arr['name'] 		= $this->get('name');
		$arr['price'] 		= $this->get('price');
		$arr['root_price'] 	= 0;
		$arr['user_add'] 	= $this->get('user_add');
		$arr['is_coupon'] 	= 1;
		$arr['coupon_id'] 	= $this->get('coupon_id');

		$arr['decrement'] 				= 0;
		$arr['user_decrement'] 			= '';
		$arr['vat'] 					= 0;
		$arr['same_groups'] 			= 0;

		$arr['is_cancel'] 				= 0;
		$arr['cancel_report_id'] 		= 0;

		$arr['date_add'] 	= time();
		$arr['last_update'] = time();

		//coupon ko phải hàng hóa nên cứ là 1 là đơn vị xuất và có thời hạn sử dụng cũng ko có
		$arr['inverse'] 				= 1;
		$arr['ratio_convert'] 			= 1;
		$arr['expire_date'] 			= 0;
		$arr['barcode'] 				= $this->get('barcode') . '';

		$db->record_insert($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr);

		$dOrder = $order->get_detail($shop_id, $order_id, $order_created_at);

		if (isset($dOrder['id']) && $dOrder['id_customer'] > 0) {
			$sum = $this->get_sum_order($shop_id, $order_id, $order_created_at);
			$coupon_history->set('member_id', $dOrder['id_customer']);
			$coupon_history->set('fullname', $dOrder['name_customer']);
			$coupon_history->set('mobile', $dOrder['mobile_customer']);
			$coupon_history->set('order_id', $order_id);
			$coupon_history->set('shop_id', $dOrder['shop_id']);
			$coupon_history->set('date_in', $dOrder['date_in']);
			$coupon_history->set('order_total', $sum);
			$coupon_history->set('coupon_id', $this->get('coupon_id'));
			$coupon_history->set('coupon_code', $coupon_code);
			$coupon_history->set('detail_order_id', $id);
			$coupon_history->add();
		}

		return $id;
	}

	//Tạo một dong giam giá
	public function record_decrement($shop_id, $order_created_at)
	{
		global $db, $main;

		$arr['id'] 						= $id = $this->get_id($shop_id, $this->get('user_add'));
		$arr['order_id'] 				= $this->get('order_id');
		$arr['product_id'] 				= 0;
		$arr['sku_id'] 					= 0;
		$arr['quantity'] 				= -1;
		$arr['returned'] 				= 0;

		$arr['name'] 					= $this->get('name');
		$arr['price'] 					= $this->get('price');
		$arr['root_price'] 				= 0;
		$arr['user_add'] 				= $this->get('user_add');

		$arr['note'] 					= $this->get('note');

		$arr['attribute_1'] 			= '0';
		$arr['attribute_2'] 			= '0';
		$arr['attribute_3'] 			= '0';
		$arr['attribute_4'] 			= '0';
		$arr['attribute_5'] 			= '0';

		$arr['sku_name'] 				= '';
		$arr['root_price'] 				= 0;
		$arr['wh_history_id'] 			= '0';
		$arr['wh_history_return_id'] 	= '0';

		$arr['decrement'] 				= 0;
		$arr['user_decrement'] 			= '';
		$arr['vat'] 					= 0;
		$arr['same_groups'] 			= 0;

		$arr['is_coupon'] 				= 0;
		$arr['coupon_id'] 				= 0;
		$arr['is_cancel'] 				= 0;
		$arr['cancel_report_id'] 		= 0;
		$arr['inverse'] 				= 1;
		$arr['expire_date'] 			= 0;
		$arr['ratio_convert'] 			= 1;
		$arr['barcode'] 				= '';

		$arr['cashback_value'] 			= 0;
		$arr['cashback_is_value'] 		= 0;


		$arr['date_add'] 				= time();
		$arr['last_update'] 			= time();

		$db->record_insert($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr);

		return $id;
	}

	//create record surcharge
	public function record_surcharge($shop_id, $user_add, $order_id, $name)
	{
		global $db;

		$arr['id'] 			= $id 		= $this->get_id($shop_id, $user_add) . $main->randString(5);
		$arr['order_id'] 				= $order_id;
		$arr['user_add'] 				= $user_add;
		$arr['name'] 					= $name;
		$arr['product_id'] 				= 0;
		$arr['sku_id'] 					= 0;
		$arr['quantity'] 				= 1;
		$arr['returned'] 				= 0;
		$arr['price'] 					= 0;
		$arr['note'] 					= '';

		$arr['attribute_1'] 			= '0';
		$arr['attribute_2'] 			= '0';
		$arr['attribute_3'] 			= '0';
		$arr['attribute_4'] 			= '0';
		$arr['attribute_5'] 			= '0';

		$arr['sku_name'] 				= '';
		$arr['root_price'] 				= 0;
		$arr['wh_history_id'] 			= '0';
		$arr['wh_history_return_id'] 	= '0';

		$arr['decrement'] 				= 0;
		$arr['user_decrement'] 			= '';
		$arr['vat'] 					= 0;
		$arr['same_groups'] 			= 0;

		$arr['is_coupon'] 				= 0;
		$arr['coupon_id'] 				= 0;
		$arr['is_cancel'] 				= 0;
		$arr['cancel_report_id'] 		= 0;

		$arr['date_add'] 				= time();
		$arr['last_update'] 			= time();
		$arr['inverse'] 				= 1;
		$arr['expire_date'] 			= 0;
		$arr['ratio_convert'] 			= 1;

		$arr['cashback_value'] 			= 0;
		$arr['cashback_is_value'] 		= 0;


		$db->record_insert($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y') . "`", $arr);

		return $id;
	}

	public function create_surcharge_item($dShop, $user_add, $order_id, $lang, $setup)
	{
		if ($dShop['surcharge_on'] == '1') {

			$name = "Phụ thu " . $dShop['surcharge_percent'] . "%";

			$surcharge_from = $dShop['surcharge_from_hour'] * 3600 + $dShop['surcharge_from_minute'] * 60 + 0;
			$surcharge_to = $dShop['surcharge_to_hour'] * 3600 + $dShop['surcharge_to_minute'] * 60 + 0;
			$now = time() - strtotime(date("m/d/Y"));
			if ($now >= $surcharge_from || $now <= $surcharge_to) //thêm
				$this->record_surcharge($dShop['id'], $user_add, $order_id, $name);
		}
		return true;
	}

	public function cal_surcharge($dShop, $order_id, $created_at)
	{
		if ($dShop['surcharge_on'] == '1') {

			@$surcharge_from = $dShop['surcharge_from_hour'] * 3600 + $dShop['surcharge_from_minute'] * 60 + 0;
			@$surcharge_to = $dShop['surcharge_to_hour'] * 3600 + $dShop['surcharge_to_minute'] * 60 + 0;
			$now = time() - strtotime(date("m/d/Y"));
			if ($surcharge_from <= $now && $now <= $surcharge_to) {

				$tong_tien = $this->get_sum_order_for_surcharge($dShop['id'], $order_id, $created_at);
				$price = $tong_tien * ($dShop['surcharge_percent'] / 100);

				//update phu thu
				$this->set('order_id', $order_id);
				$this->set('price', $price);
				$this->update_surcharge($dShop['id'], $created_at);
			}
		}
		return true;
	}

	public function update_surcharge($shop_id, $created_at)
	{
		global $db;

		$order_id 			= $this->get('order_id');
		$arr['price'] 		= $this->get('price');
		$arr['date_add'] 	= time();

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "`", $arr, " `product_id` = '0' AND `sku_id` = '0' AND `quantity` = '1' AND `order_id` = '$order_id' ");
		return true;
	}

	public function update_cashback($shop_id)
	{
		global $db;

		$id 				= $this->get('id');
		$date_add 			= $this->get('date_add');

		$arr['cashback_value'] 			= $this->get('cashback_value');
		$arr['cashback_is_value'] 		= $this->get('cashback_is_value');

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $date_add) . "`", $arr, " `id` = '$id' ");

		return true;
	}

	public function update_commission_for_customer($shop_id, $members_id, $order_id, $created_at)
	{
		global $db, $product_commission_detail, $setup;
		$members 		= new members();
		$member_group 	= new member_group();
		$product_price_detail 	= new product_price_detail();

		$members->set('user_id', $members_id);
		$dM = $members->get_detail();

		if (isset($dM['user_id'])) {
			if ($dM['member_group_id'] > 0) {
				//Cập nhật giá cho khách hàng này

				//Cập nhật chiết khấu cho khách hàng này
				//get list product
				$l = $this->listby_order_pro_commission($shop_id, $order_id, $created_at);
				foreach ($l as $it) {

					if (isset($setup['enabled_apply_discount_on_price']) && $setup['enabled_apply_discount_on_price'] == 1) {
						//Cập nhật cho phép hay không cho phép áp dụng bảng giá theo nhóm khách hàng
						$product_price_detail->set('product_id', $it['product_id']);
						$product_price_detail->set('unique_id', $it['unique_id']);
						$product_price_detail->set('member_group_id', $dM['member_group_id']);
						$dProPrice = $product_price_detail->get_detail_record();
						if (isset($dProPrice['product_id'])) {
							$arr['price'] 			= $dProPrice['value']; //Giá theo cài
							$arr['default_price'] 	= $dProPrice['value']; //Giá mặc định lúc này chính là giá xuất cho đối tượng này 
						} else {
							$arr['price'] = $it['retail_price']; //Giá lẻ ở product.price = retail_price
							$arr['default_price'] = $it['retail_price']; //Giá mặc định là giá lẻ cho đối tượng này ở product.price = retail_price
						}
					}

					if ($it['product_commission_id'] > 0) { //nếu =0 skip
						$product_commission_detail->set('product_commission_id', $it['product_commission_id']);
						$product_commission_detail->set('member_group_id', $dM['member_group_id']);
						$d = $product_commission_detail->get_detail_record();
						if (isset($d['value'])) {
							$arr['decrement'] 			= $d['value'];
						}
					}
					if (!empty($arr)) {
						$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "`", $arr, " `id`= '" . $it['id'] . "' AND `order_id` = '$order_id' ");
					}
					unset($arr);
				}
			}
		} else if ($members_id == 0) {
			//Cập nhật giá theo đúng giá sản phẩm bán lẻ
			//không có members_id thì remove giảm giá;
			//default_price theo func add_product_item là giá bán lẻ cài ở product.price

			$sTable = $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "`";
			$sql = "UPDATE  $sTable SET `price` = `default_price`, `decrement` = 0 WHERE `product_id` > 0 AND `quantity` > 0 AND `order_id` = '$order_id' ";
			$db->exeCuteQuery($sql);
		}

		return true;
	}

	public function update_cancel_return_id($shop_id, $detail_order_id, $order_created_at, $cancel_report_id)
	{
		global $db;

		$arr['cancel_report_id'] = $cancel_report_id;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`='" . $detail_order_id . "'");

		return true;
	}

	public function update_quantity($shop_id, $id, $quantity, $order_created_at)
	{
		global $db;

		$arr['quantity'] 		= $quantity;
		$arr['quantity_paid'] 		= $quantity;
		$arr['barcode'] 		= $this->get('barcode');
		$arr['note'] 			= $this->get('note');

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " id='$id' ");

		return true;
	}

	public function update_quantity_paid($shop_id, $id, $quantity, $order_created_at)
	{
		global $db;

		$sql = "UPDATE " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` SET `quantity_paid` = $quantity WHERE id='$id' ";

		$db->executeQuery($sql);

		return true;
	}

	public function update_created_at_for_export_internal($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$arr['date_add'] = $order_created_at;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `order_id`='$order_id' ");

		return true;
	}

	public function update_returned($shop_id)
	{
		global $db;

		$id 				= $this->get('id');
		$date_add			= $this->get('date_add');
		$arr['returned']   	= $this->get('returned');
		$arr['note']   		= $this->get('note');

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $date_add) . "`", $arr, " `id` = '$id' ");

		return true;
	}

	public function update_warehouse_history($shop_id, $id, $quantity, $root_price, $wh_history_id, $wh_history_return_id, $order_created_at)
	{
		global $db;

		$arr['quantity'] = $quantity;
		$arr['root_price'] = $root_price;
		$arr['wh_history_id'] = $wh_history_id;
		$arr['wh_history_return_id'] = $wh_history_return_id;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`='" . $id . "'");

		return true;
	}

	public function update_new_price($shop_id, $id, $new_price, $order_created_at)
	{
		global $db;

		$arr['price'] = $new_price;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`= '" . $id . "' ");

		return true;
	}

	public function update_note()
	{
		global $db;

		$id 		= $this->get('id');
		$shop_id 	= $this->get('shop_id');
		$date_add 	= $this->get('date_add');

		$arr['note'] = $this->get('note');

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $date_add) . "`", $arr, " `id` = '$id' ");

		return true;
	}

	public function update_wholesale_price($shop_id, $order_id, $order_created_at, $status)
	{
		global $db;
		$product = new product();

		$sql = "SELECT id,product_id FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` WHERE `order_id` = '" . $order_id . "' AND `product_id` > 0 ";
		$result = $db->executeQuery($sql);

		if ($status == 1) {
			while ($row = mysqli_fetch_assoc($result)) {

				$product->set('id', $row['product_id']);
				$dProduct = $product->get_detail();

				$arr['price'] = $dProduct['wholesale_price'];

				$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`= '" . $row['id'] . "' ");
			}
		} else {
			while ($row = mysqli_fetch_assoc($result)) {

				$product->set('id', $row['product_id']);
				$dProduct = $product->get_detail();

				if ($dProduct['on_sales'] == 1)
					$arr['price'] = $dProduct['sales'];
				else
					$arr['price'] = $dProduct['price'];

				$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`= '" . $row['id'] . "' ");
			}
		}
		mysqli_free_result($result);

		unset($dProduct);
		unset($arr);
		unset($sql);
		return true;
	}

	public function discount_percentItem($shop_id, $id, $percent, $note, $order_created_at)
	{
		global $db;

		$arr['decrement'] = $percent;
		$arr['note'] = $note;

		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`='" . $id . "'");

		return true;
	}

	public function discount_priceItem($shop_id, $id, $new_price, $note, $order_created_at)
	{
		global $db;

		$arr['price'] = $new_price;
		$arr['note'] = $note;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`='" . $id . "'");

		return true;
	}

	public function update_giam_gia($shop_id, $order_id, $type, $percent, $user_increment, $order_created_at)
	{
		global $db;

		if ($type == 'increment') {
			$arr['increment'] = $percent;
		} else if ($type == 'decrement') {
			$arr['decrement'] = $percent;
		} else if ($type == 'vat') {
			$arr['vat'] = $percent;
		}

		$arr['user_increment'] = $user_increment;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `order_id` = '" . $order_id . "' ");

		return true;
	}

	public function decrement_all_bill($shop_id, $order_id, $percent, $user_decrement, $order_created_at)
	{
		global $db;

		$arr['decrement'] = $percent;
		$arr['user_decrement'] = $user_decrement;

		return $db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " order_id='" . $order_id . "'");
	}

	public function update_giam_gia_mon($shop_id, $id, $type, $percent, $user_increment)
	{
		global $db;

		if ($type == 'increment') {
			$arr['increment'] = $percent;
		} else if ($type == 'decrement') {
			$arr['decrement'] = $percent;
		} else if ($type == 'vat') {
			$arr['vat'] = $percent;
		}
		$arr['user_increment'] = $user_increment;
		$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", $arr, " `id`='" . $id . "'");

		return true;
	}

	public function listby_order($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*, IFNULL(`SKU`.code, '') sku_code, IFNULL(pro.`unit_import`, '') unit_import, IFNULL(pro.`unit_export`, '') unit_export, IFNULL(`pro`.web_id, 0) web_id, IFNULL(`pro`.product_commission_id, 0) product_commission_id, IFNULL(pro.`pro_type`, 0) pro_type
						, IF(SKU.`img_1` IS NOT NULL AND SKU.`img_1` <> '', IFNULL(SKU.`img_1`, ''), IFNULL(pro.`img_1`, '')) `image`
						, IFNULL(SKU.`on_stock`, 0) `on_stock`
						, IFNULL(SKU.`unique_id`, 0) `unique_id`, pro.`point`, (dt.`quantity`- dt.`quantity_paid`) quantity_debt
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				WHERE `order_id` = '$order_id'
				ORDER BY `last_update` DESC";
		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function listby_order_by_supplier( $shop_id, $client_id, $supplier_id, $order_id, $order_created_at ){
		global $db;

		$sqlSup = '';
		if( $supplier_id !== '' )
			$sqlSup = "AND `pro`.supplier_id  = '$supplier_id' ";

		$sql = "SELECT `dt`.*, IFNULL(`SKU`.code, '') sku_code, IFNULL(pro.`unit_import`, '') unit_import, IFNULL(pro.`unit_export`, '') unit_export, IFNULL(`pro`.web_id, 0) web_id, IFNULL(`pro`.product_commission_id, 0) product_commission_id, IFNULL(pro.`pro_type`, 0) pro_type
						, IF(SKU.`img_1` IS NOT NULL AND SKU.`img_1` <> '', IFNULL(SKU.`img_1`, ''), IFNULL(pro.`img_1`, '')) `image`
						, IFNULL(SKU.`on_stock`, 0) `on_stock`
						, IFNULL(SKU.`unique_id`, 0) `unique_id`, pro.`point`
				FROM ".$db->tbl_fix."`detail_order_".$shop_id."_".date('Y', $order_created_at)."` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				LEFT JOIN `supplier` sup ON `sup`.id = `pro`.supplier_id
				WHERE `order_id` = '$order_id' AND `sup`.client_id = '$client_id' $sqlSup
				ORDER BY `last_update` DESC";
		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	public function listby_order_with_point( $shop_id, $order_id, $order_created_at ){

		global $db;

		$sql = "SELECT `dt`.*, IFNULL(`SKU`.code, '') sku_code, pro.`unit_import`, pro.`unit_export`, `pro`.web_id, `pro`.product_commission_id, pro.`pro_type`
						, IF(SKU.`img_1` IS NOT NULL AND SKU.`img_1` <> '', IFNULL(SKU.`img_1`, ''), IFNULL(pro.`img_1`, '')) `image`
						, IFNULL(SKU.`on_stock`, 0) `on_stock`
						, IFNULL(pro.`point`, 0) `point`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				WHERE `order_id` = '$order_id'
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function sum_point_of_order($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT  SUM(dt.`quantity`*IFNULL(pro.`point`, 0)) `point`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				WHERE `order_id` = '$order_id'";

		$result = $db->executeQuery($sql, 1);

		return $result['point'];
	}

	public function listby_order_wallet_commission($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*,
						IFNULL(`SKU`.code, '') sku_code
						, pro.`unit_import`
						, pro.`unit_export`
						, `pro`.web_id
						, `pro`.product_commission_id
						, `pro`.product_commission_id wallet_id
						, IFNULL(`procom`.wallet_name, '') wallet_name
						, IFNULL(`procom`.wallet_commission, 0) wallet_commission
						, IFNULL(`procom`.wallet_commission, 0) cashback_percent
						, pro.`pro_type`
						, IF(SKU.`img_1` IS NOT NULL AND SKU.`img_1` <> '', IFNULL(SKU.`img_1`, ''), IFNULL(pro.`img_1`, '')) `image`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				LEFT JOIN `product_commission` procom ON `pro`.product_commission_id = `procom`.id
				WHERE `order_id`='$order_id'
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Tương tự hàm listby_order_wallet_commission bỏ các item ship_fee và package fee như là phí giao dịch
	public function listby_order_wallet_commission_for_client($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*, IFNULL(`SKU`.code, '') sku_code, pro.`unit_import`, pro.`unit_export`, `pro`.img_1 `image`, `pro`.web_id, `pro`.product_commission_id,  `pro`.product_commission_id wallet_id, IFNULL(`procom`.wallet_name, '') wallet_name, IFNULL(`procom`.wallet_commission, 0) wallet_commission, IFNULL(`procom`.wallet_commission, 0) cashback_percent, pro.`pro_type`, `pro`.is_service
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				LEFT JOIN `product_commission` procom ON `pro`.product_commission_id = `procom`.id
				WHERE `order_id`='$order_id'
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Danh sách sản phẩm trong đơn hàng có cài chiết khấu cashback
	public function listby_order_with_cashback_value($shop_id, $order_id, $order_created_at, $member_group_id)
	{
		global $db;

		$sql = "SELECT `dt`.id, `dt`.product_id, `dt`.quantity, `dt`.price, `dt`.`decrement`, `dt`.`date_add`, `wCashback`.`value`, `wCashback`.`is_value`
				FROM $db->tbl_fix`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				INNER JOIN $db->tbl_fix`product` pro ON `pro`.id = `dt`.product_id
				INNER JOIN $db->tbl_fix`wallet_cashback` wCashback ON `wCashback`.product_commission_id = `pro`.product_commission_id AND `wCashback`.member_group_id = '$member_group_id'
				WHERE dt.`order_id` = '$order_id' AND `wCashback`.`value` > 0 AND `dt`.`decrement` = 0";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Tương tự hàm listby_order_wallet_commission: chỉ lấy sản phẩm, bỏ các sản phẩm dịch vụ và voucher
	public function listby_order_only_product($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*, IFNULL(`SKU`.code, '') sku_code, pro.`unit_import`, pro.`unit_export`, `pro`.img_1 `image`, `pro`.web_id, `pro`.product_commission_id,  `pro`.product_commission_id wallet_id, IFNULL(`procom`.wallet_name, '') wallet_name, IFNULL(`procom`.wallet_commission, 0) wallet_commission, IFNULL(`procom`.wallet_commission, 0) cashback_percent, pro.`pro_type`, `pro`.is_service
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				LEFT JOIN `product_commission` procom ON `pro`.product_commission_id = `procom`.id
				WHERE `order_id`='$order_id' AND pro.pro_type = '0'
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function listby_order_grouped($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*, SUM(`dt`.quantity) quantity
						,IFNULL(`SKU`.code, '') sku_code, pro.`unit_import`, pro.`unit_export`, `pro`.img_1 `image`, `pro`.web_id, `pro`.product_commission_id
						, pro.`pro_type`
				FROM $db->tbl_fix`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN $db->tbl_fix`SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN $db->tbl_fix`product` pro ON `pro`.id = `dt`.product_id
				WHERE `order_id`='$order_id'
				GROUP BY dt.`product_id`, dt.`sku_id`, dt.`price`, dt.`decrement`, dt.`inverse`
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_no_root_price($shop_id)
	{
		global $db, $wh_history;

		$sql = "SELECT `dt`.id, `dt`.order_id, `dt`.product_id, `dt`.sku_id, `dt`.inverse, `dt`.ratio_convert
				FROM $db->tbl_fix`detail_order_" . $shop_id . "_" . date('Y') . "` dt
				WHERE `root_price` = 0 AND `product_id` > 0 ";

		$result = $db->executeQuery($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$dRoot = $wh_history->get_last_price_import($row['product_id'], $row['sku_id']);
			if (isset($dRoot['price']) && $dRoot['price'] > 0) {

				$root_price = $dRoot['price'];
				$arr['ratio_convert'] = $row['ratio_convert'];
				if (!($dRoot['inverse'] == $row['inverse'] && ($row['inverse'] == 0 || $row['inverse'] == 1))) {
					if ($row['ratio_convert'] == 0) $arr['ratio_convert'] = 1;
					if ($dRoot['inverse'] == 0 &&  $row['inverse'] == 1) {
						$root_price = $dRoot['price'] / $arr['ratio_convert'];
					} else if ($dRoot['inverse'] == 1 &&  $row['inverse'] == 0) {
						$root_price = $dRoot['price'] * $arr['ratio_convert'];
					}
				}

				$arr['root_price'] = $root_price;
				$db->record_update($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y') . "`", $arr, " `id`='" . $row['id'] . "'");
			}
		}

		return true;
	}

	public function list_by_wh_history($shop_id, $wh_history_id, $amount_exported)
	{
		global $db, $user, $setup;
		//Hiện tại chỉ cho show ra sản phẩm được list trong năm đang chọn;

		$table_schema 	= str_replace('.', '', $db->tbl_fix);
		$sum_amount_exported = 0;

		$YEAR 				= date('Y', time());
		$year_stop			= date('Y', $setup['begin_time']) - 1;
		$total_export_sum 	= 0;
		$kq					= array();

		while ($YEAR > $year_stop && $amount_exported > $total_export_sum) {
			$table_name_dt 	= "detail_order_" . $shop_id . "_" . $YEAR;
			$table_name_order 	= "order_" . $shop_id . "_" . $YEAR;

			$sql1 = "SELECT COUNT(*) total FROM information_schema.`tables` WHERE table_schema = '$table_schema' AND table_name = '$table_name_dt' LIMIT 1";
			$exist = $db->executeQuery($sql1, 1);

			if (isset($exist['total']) && $exist['total'] > 0) {

				$sql = "SELECT `dt`.id, `dt`.order_id, `dt`.`name`, `dt`.inverse, SUM(`dt`.quantity) quantity, `dt`.price, `dt`.root_price, `dt`.`decrement`,  pro.`unit_import`, pro.`unit_import`, dt.`ratio_convert`, dt.`wh_history_id`, od.`order_type`, `dt`.date_add created_at, `od`.user_add, `od`.shop_id, , pro.`pro_type`
						FROM $db->tbl_fix`$table_name_dt` dt
						INNER JOIN $db->tbl_fix`product` pro ON `pro`.id = `dt`.product_id
						INNER JOIN $db->tbl_fix`$table_name_order` od ON `od`.id = `dt`.order_id
						WHERE dt.`wh_history_id`='$wh_history_id' AND `pro`.shop_id = '$shop_id' AND od.`status` = 1 AND od.`printed` = 1
						GROUP BY `dt`.order_id, `dt`.`product_id`, `dt`.`sku_id`, `dt`.inverse, `dt`.price, `dt`.root_price, `dt`.`decrement`
						ORDER BY dt.`last_update` DESC";
				$result = $db->executeQuery($sql);

				while ($row = mysqli_fetch_assoc($result)) {
					if ($row['inverse'] == 1 && $row['ratio_convert'] > 1)
						$total_export_sum += $row['quantity'] / $row['ratio_convert'];
					else
						$total_export_sum += $row['quantity'];
					$row['user_add_fullname'] = $user->get_fullname($row['user_add']);
					$kq[] = $row;
				}
			}

			$YEAR -= 1;
		}

		return $kq;
	}

	public function list_exported_before_imported($shop_id, $product_id, $sku_id)
	{
		global $db, $user, $setup;
		//Hiện tại chỉ cho show ra sản phẩm được list trong năm đang chọn;

		$table_schema 	= str_replace('.', '', $db->tbl_fix);
		$sum_amount_exported = 0;

		$YEAR 				= date('Y', time());
		$year_stop			= date('Y', $setup['begin_time']) - 1;
		$total_export_sum 	= 0;
		$kq					= array();

		while ($YEAR > $year_stop) {
			$table_name_dt 	= "detail_order_" . $shop_id . "_" . $YEAR;
			$table_name_order 	= "order_" . $shop_id . "_" . $YEAR;

			$sql1 = "SELECT COUNT(*) total FROM information_schema.`tables` WHERE table_schema = '$table_schema' AND table_name = '$table_name_dt' LIMIT 1";
			$exist = $db->executeQuery($sql1, 1);

			if (isset($exist['total']) && $exist['total'] > 0) {

				$sql = "SELECT `dt`.id, `dt`.order_id, `dt`.`name`, `dt`.inverse, SUM(`dt`.quantity) quantity, `dt`.price, `dt`.root_price, `dt`.`decrement`,  pro.`unit_import`, pro.`unit_import`, dt.`ratio_convert`, dt.`wh_history_id`, od.`order_type`, `dt`.date_add created_at, `od`.user_add, `od`.shop_id
						FROM " . $db->tbl_fix . "`$table_name_dt` dt
						INNER JOIN `product` pro ON `pro`.id = `dt`.product_id
						INNER JOIN " . $db->tbl_fix . "`$table_name_order` od ON `od`.id = `dt`.order_id
						WHERE dt.`wh_history_id` = '0' AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id' AND `pro`.shop_id = '$shop_id'  AND od.`status` = 1 AND od.`printed` = 1 
						GROUP BY `dt`.order_id, `dt`.`product_id`, `dt`.`sku_id`, `dt`.inverse, `dt`.price, `dt`.root_price, `dt`.`decrement`
						ORDER BY dt.`last_update` DESC";
				$result = $db->executeQuery($sql);

				while ($row = mysqli_fetch_assoc($result)) {
					if ($row['inverse'] == 1 && $row['ratio_convert'] > 1)
						$total_export_sum += $row['quantity'] / $row['ratio_convert'];
					else
						$total_export_sum += $row['quantity'];
					$row['user_add_fullname'] = $user->get_fullname($row['user_add']) . '';
					$kq[] = $row;
				}
			}

			$YEAR -= 1;
		}

		return $kq;
	}

	public function listby_order_ex_storing($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.*, `dt`.quantity amount,  `dt`.inverse is_inverse, `dt`.`name` product_name, IFNULL(`SKU`.code, '') code, pro.`unit_import`, pro.`unit_export`, pro.`ratio_convert`, pro.`pro_type`
				, IF( IFNULL(SKU.img_1, '') = '', pro.img_1,  SKU.img_1) `image`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN `SKU` ON `SKU`.id = `dt`.sku_id AND `SKU`.product_id = `dt`.product_id
				LEFT JOIN `product` pro ON `pro`.id = `dt`.product_id
				WHERE `order_id`='" . $order_id . "'
				ORDER BY `last_update` DESC";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$row['expire_date'] = $row['expire_date'] == 0 ? '' : date("d/m/Y", $row['expire_date']);
			$kq[] = $row;
		}

		return $kq;
	}

	public function listby_order_pro_commission($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT `dt`.id, `dt`.product_id, pro.`product_commission_id`, pro.`pro_type`
				, `dt`.`default_price`, SKU.`unique_id`, pro.`price` retail_price
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt
				LEFT JOIN  " . $db->tbl_fix . "`product` pro ON pro.`id` = dt.`product_id`
				LEFT JOIN  " . $db->tbl_fix . "`SKU` ON dt.`sku_id` = SKU.`id` AND SKU.`product_id` = dt.`product_id`
				WHERE `order_id` = '$order_id'
				AND dt.`product_id` > 0
				";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function create_order_from_booking_order($new_order_id)
	{ //cofbo
		global $db;

		$shop_id 		= $this->get('shop_id');
		$order_id 		= $this->get('order_id');
		$date_add 		= $this->get('date_add');

		$lItems = $this->listby_order($shop_id, $order_id, $date_add);

		$this->set('order_id', $new_order_id);
		foreach ($lItems as $item) {
			$left_quantity = $item['quantity'] - $item['delivered'];
			if ($left_quantity > 0) {

				$this->set('product_id', $item['product_id']);
				$this->set('sku_id', $item['sku_id']);

				$this->set('quantity', $left_quantity);
				$this->set('returned', 0);
				$this->set('max_allowed_order', $left_quantity);
				$this->set('name', $item['name']);
				$this->set('note', '');
				$this->set('price', $item['price']);
				$this->set('root_price', $item['root_price']);
				$this->set('wh_history_id', 0);
				$this->set('decrement', $item['decrement']);
				$this->set('user_decrement', $item['user_decrement']);
				$this->set('vat', $item['vat']);
				$this->set('user_add', $item['user_add']);

				$this->set('attribute_1', $item['attribute_1']);
				$this->set('attribute_2', $item['attribute_2']);
				$this->set('attribute_3', $item['attribute_3']);
				$this->set('attribute_4', $item['attribute_4']);
				$this->set('attribute_5', $item['attribute_5']);

				$this->set('sku_name', $item['sku_name']);
				$this->set('wh_history_id', 0);
				$this->set('wh_history_return_id', 0);
				$this->set('delivered', 0);

				//Tạo item 
				$this->add($shop_id, $date_add);
			}
		}
		unset($lItems);

		return true;
	}

	public function get_total_item($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT COUNT(*) as total_item FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` dt WHERE `order_id`='" . $order_id . "' ";
		$result = $db->executeQuery($sql, 1);

		return $result['total_item'] + 0;
	}

	public function listby_order_widthSKU($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT dt.*, SKU.`on_stock`, SKU.`name` as sku_name,
				SKU.`attribute_1`, SKU.`attribute_2`, SKU.`attribute_3`, SKU.`attribute_4`, SKU.`attribute_5`,
				pro.`root_price`, pro.`allow_root_price`, pro.`pro_type`
			  	FROM $db->tbl_fix`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt
				INNER JOIN $db->tbl_fix`SKU` ON dt.`sku_id` = `SKU`.id AND `dt`.product_id = `SKU`.product_id AND dt.order_id = '$order_id'
				INNER JOIN $db->tbl_fix`product` pro ON pro.`id` = `dt`.product_id
 				ORDER BY `date_add` ASC";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function listby_order_widthSKU_grouped($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT SUM(`dt`.quantity) as quantity, SKU.`on_stock`, `dt`.name, `SKU`.id as sku_id, `SKU`.product_id, pro.`price`, pro.`root_price`, pro.`allow_root_price`, pro.`pro_type`
			  	FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt
				INNER JOIN `SKU` ON dt.`sku_id` = `SKU`.id AND `dt`.product_id = `SKU`.product_id AND dt.order_id = '$order_id'
				INNER JOIN $db->tbl_fix`product` pro ON pro.`id` = `dt`.product_id
				GROUP BY `dt`.product_id, `dt`.sku_id
				";

		$result = $db->executeQuery($sql);
		$kq = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		mysqli_free_result($result);
		unset($row);

		return $kq;
	}

	public function listby_order_return($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT dt.*, IFNULL(SKU.`on_stock`, 0) on_stock
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt
				LEFT JOIN `SKU` ON dt.`sku_id` = `SKU`.id AND `dt`.product_id = `SKU`.product_id
				WHERE `order_id` = '" . $order_id . "'
				ORDER BY last_update DESC";
		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	// public function listby_order_letter($shop_id, $order_id, $order_created_at){//list to print form A4, A5
	// 	global $db;

	// 	$sql = "SELECT SUM(dt.quantity) as amount, dt.name, dt.price,dt.date_add, dt.decrement, dt.vat, `SKU`.code sku_code
	// 			FROM ".$db->tbl_fix."`detail_order_".$shop_id."_".date('Y', $order_created_at)."` as dt
	// 			LEFT JOIN `SKU` ON `SKU`.id = dt.`sku_id` AND `SKU`.product_id = dt.product_id
	// 			WHERE dt.order_id='$order_id' AND dt.`quantity` > 0
	// 			GROUP BY dt.`product_id`, dt.`sku_id`, dt.`price`, dt.`decrement`
	// 			ORDER BY dt.date_add ASC";

	// 	$result = $db->executeQuery ( $sql );
	// 	$kq = array();
	// 	while($row = mysqli_fetch_assoc($result)){
	// 		$kq[] = $row;
	// 	}

	// 	return $kq;
	// }

	public function listby_order_toprint($shop_id, $order_id, $order_created_at, $type = '')
	{
		global $db, $setup;

		if ($type != '' && $type == 'client_delivery') {
			$limit = '';
			// $limit = 'LIMIT 0,3';
			$pro_type = 'AND p.`pro_type` = 0';
		} else {
			$limit = '';
			$pro_type = '';
		}

		$sql = "SELECT SUM(dt.`quantity`) quantity, dt.`name`, dt.`price`, dt.`date_add`, dt.`decrement`, dt.`product_id`, dt.`sku_id`, dt.`vat`, dt.`sku_name`, IFNULL(`SKU`.code, '') sku_code, p.`img_1` `image`
				FROM $db->tbl_fix`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt 
				LEFT JOIN `SKU` ON `SKU`.id = dt.`sku_id` AND `SKU`.product_id = dt.product_id
				LEFT JOIN product p ON p.`id` = dt.`product_id`
				WHERE dt.order_id='$order_id' AND (dt.`quantity` > 0 OR (dt.`quantity` < 0 AND dt.product_id = 0 )) $pro_type
				GROUP BY dt.`product_id`, dt.`sku_id`, dt.`price`, dt.`decrement`
				ORDER BY dt.date_add DESC " . $limit . "";

		$result = $db->executeQuery($sql);
		$kq = array();
		$kq_discount = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['quantity'] == -1 && $row['product_id'] == 0) {
				$kq_discount[] = $row;
			} else {
				$kq[] = $row;
			}
		}

		$kq = array_merge($kq, $kq_discount);

		return $kq;
	}

	public function listby_order_toprint_return($shop_id, $order_id, $order_created_at)
	{
		global $db;

		$sql = "SELECT dt.quantity, dt.name, dt.price, dt.date_add, dt.decrement, dt.vat, dt.note, dt.sku_name, dt.decrement, `SKU`.code sku_code, p.`img_1` `image`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt
				LEFT JOIN `SKU` ON `SKU`.id = dt.`sku_id` AND `SKU`.product_id = dt.product_id
				LEFT JOIN product p ON p.`id` = dt.`product_id`
				WHERE dt.order_id = '$order_id' AND dt.`quantity` < 0 AND dt.product_id > 0 ORDER BY dt.date_add ASC";

		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function get_sum_order_sub_orders($shop_id, $sub_orders)
	{ //format: ;order_id1:created_at1;order_id2:created_at2;
		global $db;

		$total = 0;
		$sub_orders = explode(';', $sub_orders);
		foreach ($sub_orders as $it) {
			if ($it != '') {
				$it = explode(':', $it);
				if (COUNT($it) == 2) {
					$total += $this->get_sum_order($shop_id, $it[0], $it[1]);
				}
			}
		}

		return $total;
	}

	public function get_sum_order($shop_id, $order_id, $order_created_at = 0)
	{
		global $db;

		if ($order_created_at == 0) $order_created_at = time();

		$sql = "SELECT sum((`quantity`*`price`*(100-`decrement`)/100)) as `sum`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` 
				WHERE order_id='$order_id' ";

		$result = $db->executeQuery($sql, 1);

		return $result['sum'];
	}

	public function get_sum_order_default($shop_id, $order_id, $order_created_at = 0)
	{
		global $db;

		if ($order_created_at == 0) $order_created_at = time();

		$sql = "SELECT sum((`quantity`*`default_price`) as `sum` 
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` 
				WHERE order_id='$order_id' ";

		$result = $db->executeQuery($sql, 1);

		return $result['sum'];
	}

	public function get_sum_general($shop_id, $order_id, $order_created_at = 0)
	{ //Lấy sum tổng hợp
		global $db;

		if ($order_created_at == 0) $order_created_at = time();

		$sql = "SELECT sum((`quantity`*`price`*(100-`decrement`)/100)) as `total_order`, sum(`quantity`*`default_price`) as `total_default` 
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` 
				WHERE order_id='$order_id' ";

		$r = $db->executeQuery($sql, 1);

		return array(
			'total_order' => isset($r['total_order']) ? $r['total_order'] : 0,
			'total_default' => isset($r['total_default']) ? $r['total_default'] : 0 //Giá trị tổng đơn phải thu người dùng
		);
	}

	public function count_item_product($shop_id, $order_created_at)
	{
		global $db;

		$no_items 	= 0;

		$order_id 				= $this->get('order_id');

		if ($order_created_at < 10000) $order_created_at = time();

		$sql = "SELECT `quantity` FROM
				" . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`
				WHERE `order_id` = '$order_id' AND `product_id` > 0
				LIMIT 1";
		$lIt = $db->executeQuery_list($sql);


		foreach ($lIt as $key => $it) {
			$no_items += abs($it['quantity']);
		}

		return $no_items;
	}

	public function get_static_info($shop_id, $order_created_at)
	{ //discount; cost (root price); no items
		global $db;

		$no_items 	= 0;
		$discount 	= 0;
		$cost 		= 0;

		$order_id 				= $this->get('order_id');

		if ($order_created_at < 10000) $order_created_at = time();

		$sql = "SELECT `quantity`, `decrement`, `root_price`, `price`, `product_id` FROM
				" . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`
				WHERE `order_id` = '$order_id' AND `product_id` > 0";
		$lIt = $db->executeQuery_list($sql);

		foreach ($lIt as $key => $it) {

			if ($it['product_id'] > 0) {
				$no_items 	+= abs($it['quantity']);
				$cost 		+= abs($it['quantity']) * $it['root_price'];
			}

			$discount 	+= ($it['quantity'] * $it['price']) * ($it['decrement'] / 100); // giảm giá theo item
			if ($it['product_id'] == 0 && $it['quantity'] == -1)
				$discount 	+= abs($it['price']); // record giảm giá
		}

		return array('cost' => $cost, 'no_items' => $no_items, 'discount' => $discount);
	}

	public function get_sum_order_for_surcharge($shop_id, $order_id, $order_created_at = 0)
	{
		global $db;

		if ($order_created_at == 0) $order_created_at = time();

		$sql = "SELECT sum((`quantity`*`price`*(100-`decrement`)/100)) as sum 
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` 
				WHERE order_id='" . $order_id . "' AND `product_id` > 0 AND `quantity` > 0
				ORDER BY date_add ASC";

		$result = $db->executeQuery($sql, 1);

		return $result['sum'];
	}

	public function get_detail()
	{
		global $db;

		$shop_id 			= $this->get('shop_id');
		$id 				= $this->get('id');
		$order_created_at 	= $this->get('date_add');

		if ($order_created_at == 0) $order_created_at = time();

		$sql = "SELECT *, (`quantity`-`quantity_paid`) quantity_debt FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` WHERE id='" . $id . "' LIMIT 1";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_exist_product($shop_id, $order_created_at)
	{
		global $db;

		$order_id 				= $this->get('order_id');
		$product_id 			= $this->get('product_id');
		$sku_id 				= $this->get('sku_id');

		if ($order_created_at < 10000) $order_created_at = time();

		$sql = "SELECT * FROM
				" . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`
				WHERE `order_id` = '$order_id' AND `product_id` = '$product_id' AND `sku_id` = '$sku_id'
				LIMIT 1";

		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_surcharge_item($shop_id, $order_id, $created_at = 0)
	{
		global $db;
		if ($created_at == 0) $created_at = time();

		$sql = "SELECT * FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "`
				WHERE `order_id` = '" . $order_id . "' AND `product_id` = '0' AND `sku_id` = '0' AND `quantity` = '1'
				LIMIT 1";

		$result = $db->executeQuery($sql, 1);
		return $result;
	}

	public function delete_item()
	{
		global $db;

		$shop_id 			= $this->get('shop_id');
		$id 				= $this->get('id');
		$order_created_at 	= $this->get('date_add');

		$db->record_delete($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` ", " `id` = '" . $id . "' ");

		return true;
	}

	public function delete_by_order_id($shop_id, $order_id, $order_created_at = 0)
	{
		global $db;
		if ($order_created_at == 0) $order_created_at = time();

		$db->record_delete($db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "`", " `order_id` = '$order_id' ");

		return true;
	}

	public function get_sku_name_SKU($dd_order)
	{

		$attribute = '';

		if ($dd_order['sku_name'] != '') $attribute = '(' . $dd_order['sku_name'] . ')';

		return $attribute;
	}

	public function get_id($shop_id, $user_add)
	{
		global $db, $main;
		$user = new user();
		$dUser = $user->get_detail($user_add);

		$startDate = strtotime(date('m/d/Y'));

		$sql = "SELECT id FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y') . "` WHERE `date_add` > '$startDate' ORDER BY `id` DESC , `date_add` DESC LIMIT 1";
		$result = $db->executeQuery($sql, 1);
		if (isset($result['id'])) {
			$id = substr($result['id'], 0, 5) + 1;
			$id = sprintf("%05d", $id) . date('dmy') . $main->randString(5); //.sprintf( "%04d", $dUser['id'] );
			unset($dUser);
			return $id;
		} else {
			$id = '00001' . date('dmy') . $main->randString(5); //.sprintf( "%04d", $dUser['id'] );
			unset($dUser);
			return $id;
		}
	}

	public function get_max_id($shop_id)
	{
		global $db;
		$startDate = strtotime(date('m/d/Y'));
		$sql = "SELECT id FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y') . "` WHERE `date_add`>'$startDate' ORDER BY `id` DESC, `date_add` DESC LIMIT 1";
		$result = $db->executeQuery($sql, 1);
		if (isset($result['id'])) {
			return substr($result['id'], 0, 5) + 1;
		} else {
			return 1;
		}
	}

	public function arrDetailOrder($shop_id, $order_id, $order_created_at = 0)
	{
		global $db;
		if ($order_created_at == 0) $order_created_at = time();
		$sql = "SELECT * 
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $order_created_at) . "` as dt 
				WHERE `order_id` = '" . $order_id . "' 
				ORDER BY date_add ASC";
		$result = $db->executeQuery($sql);
		$kq  = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}
		return $kq;
	}

	public function add_product_item($shop_id, $username, $order_id, $created_at, $dProduct, $dSKU, $is_storing = 0)
	{
		global $wh_history, $shop, $order, $detail_order, $product, $SKU, $setup;

		//BEGIN lấy giá vốn của SKU và id phiếu nhập
		$root_price		= '0';
		$wh_history_id	= '0';

		$dWhHis = $wh_history->get_fifo_row($dProduct['id'], isset($dSKU['id']) ? $dSKU['id'] : '0');
		if (isset($dWhHis['id'])) { //Lấy phiếu nhập liên quan nếu có
			$wh_history_id	= $dWhHis['id'];
		}

		if (isset($dProduct['allow_root_price']) && $dProduct['allow_root_price'] == 1) {
			$root_price		= $dProduct['root_price']; //Cho phép lấy theo giá cài
		} else {
			if (isset($dWhHis['id'])) //Tính giá vốn theo giá xuất và theo đúng phiếu xuất
				$root_price		= ($dWhHis['price'] / $dWhHis['ratio_convert']) * ((100 - $dWhHis['decrement']) / 100);
		}
		//END lấy giá vốn của SKU và id phiếu nhập


		$dShop = $shop->get_detail($shop_id);

		if ($dSKU == '') {
			$product->set('id', $dProduct['id']);
			$dProDefault = $product->get_detail();
			$detail_order->set('default_price', $dProDefault['price']);
		} else {
			$dSKU = $SKU->get_detail('0', $dProduct['id']);
			$detail_order->set('default_price', isset($dSKU['price']) ? $dSKU['price'] : 0);
		}

		if ($is_storing == 1) {

			$detail_order->set('quantity', $dProduct['quantity']);
			$detail_order->set('price', $dProduct['price']);
			$detail_order->set('inverse', $dProduct['inverse']); //đơn vị xuất cho POS
			$detail_order->set('expire_date', $dProduct['expire_date']);
			$detail_order->set('decrement', $dProduct['decrement']);
		} else {

			$price = $dProduct['price'] + 0;

			$detail_order->set('quantity', 1);
			$detail_order->set('decrement', 0);
			$detail_order->set('price', $price);
			$detail_order->set('inverse', 1); //đơn vị xuất cho POS
			$detail_order->set('expire_date', isset($dWhHis['expire_date']) ? $dWhHis['expire_date'] : 0);
		}

		$detail_order->set('order_id', $order_id);
		$detail_order->set('product_id', $dProduct['id']);
		$detail_order->set('ratio_convert', $dProduct['ratio_convert']);

		if (isset($dSKU['id']))
			$detail_order->set('sku_id', $dSKU['id']);
		else
			$detail_order->set('sku_id', 0);

		if ($dProduct['multi_attribute'] == 1 && isset($dSKU['name']))
			$detail_order->set('name', $dProduct['name'] . ' (' . $dSKU['name'] . ')');
		else
			$detail_order->set('name', $dProduct['name']);

		$detail_order->set('user_add', $username);
		$detail_order->set('note', isset($dProduct['note']) ? $dProduct['note'] : '');

		$detail_order->set('attribute_1',  isset($dSKU['id']) ? $dSKU['attribute_1'] : '0');
		$detail_order->set('attribute_2',  isset($dSKU['id']) ? $dSKU['attribute_2'] : '0');
		$detail_order->set('attribute_3',  isset($dSKU['id']) ? $dSKU['attribute_3'] : '0');
		$detail_order->set('attribute_4',  isset($dSKU['id']) ? $dSKU['attribute_4'] : '0');
		$detail_order->set('attribute_5',  isset($dSKU['id']) ? $dSKU['attribute_5'] : '0');
		$detail_order->set('sku_name', 	   isset($dSKU['id']) ? $dSKU['name'] : '');

		$detail_order->set('root_price', $root_price);
		$detail_order->set('wh_history_id', $wh_history_id);
		$detail_order->set('wh_history_return_id', 0);

		$dOrder 	= $order->get_detail($shop_id, $order_id, $created_at);

		//chỉ cho phép insert khi status == 0 (order temp)
		$detail_order_id = '';
		if (isset($dOrder['status']) && ($dOrder['status'] == 0 or $dOrder['status'] == -2)) {

			if ($is_storing == 1) {
				//nếu export mà theo kho thì thêm chứ ko nhập dòng
				$detail_order_id = $detail_order->add($shop_id, $created_at);
			} else {
				$dExistPro = $detail_order->get_exist_product($shop_id, $created_at);
				if (empty($dExistPro['id']))
					$detail_order_id = $detail_order->add($shop_id, $created_at);
				else {
					$quantity = ($dExistPro['quantity'] + 1);
					$barcode = $this->get('barcode');
					if ($barcode != '') {
						$detail_order->set('barcode', $dExistPro['barcode'] == '' ? $barcode : $dExistPro['barcode'] . ';' . $barcode);
						if ($dExistPro['barcode'] != '') {
							$lBar = explode(';', $dExistPro['barcode']);
							$lBar = array_diff($lBar, ['']);
							$quantity = COUNT($lBar) + 1;
						} else {
							$quantity = 1;
						}
					}
					$detail_order->set('note', $dExistPro['note']);
					$detail_order->update_quantity($shop_id, $dExistPro['id'], $quantity, $created_at);
					$detail_order_id = $dExistPro['id'];
				}
			}

			if ($is_storing == 0) {
				//create sarcharge => Tính phụ thu nếu có
				$detail_order->cal_surcharge($dShop, $order_id, $created_at);
			}
		}

		if ($is_storing == 0) {
			$dOrder 	= $order->get_detail($shop_id, $order_id, $created_at);

			//cập nhật commission vào trong order cho khách hàng
			if (isset($dOrder['status']) && ($dOrder['status'] == 0 or $dOrder['status'] == -2) && $dOrder['id_customer'] > 0) {
				$detail_order->update_commission_for_customer($shop_id, $dOrder['id_customer'], $order_id, $created_at);
			}

			$dOrder['listItems'] 	= $detail_order->listby_order($shop_id, $order_id, $created_at);

			return $dOrder;
		} else {
			return $detail_order_id;
		}
	}

	public function add_product_item_client($shop_id, $username, $order_id, $created_at, $dProduct, $dSKU = '', $order_created_by = 0)
	{
		global $wh_history, $shop, $order, $detail_order, $product, $SKU, $setup;
		$members 				= new members();
		$product_price_detail 	= new product_price_detail();

		$dOrder 	= $order->get_detail($shop_id, $order_id, $created_at);

		//chỉ cho phép insert khi status == 0 (order temp)
		$detail_order_id = '';
		if (isset($dOrder['status']) && ($dOrder['status'] == 0 or $dOrder['status'] == -2)) {

			$quantity = isset($dProduct['quantity']) ? $dProduct['quantity'] : 1; //Nếu không được set thì mặc định là một

			//BEGIN lấy giá vốn của SKU và id phiếu nhập
			$root_price		= '0';
			$wh_history_id	= '0';
			$expire_date	= '0';

			// $dWhHis = $wh_history->get_fifo_row($dProduct['id'], isset($dSKU['id']) ? $dSKU['id'] : '0');
			// if (isset($dWhHis['id'])) { //Lấy phiếu nhập liên quan nếu có
			// 	$wh_history_id	= $dWhHis['id'];
			// 	$expire_date	= $dWhHis['expire_date'];
			// }

			if (isset($dProduct['allow_root_price']) && $dProduct['allow_root_price'] == 1) {
				$root_price		= $dProduct['root_price']; //Cho phép lấy theo giá cài
			} else {
				if (isset($dWhHis['id'])) //Tính giá vốn theo giá xuất và theo đúng phiếu xuất
					$root_price		= ($dWhHis['price'] / $dWhHis['ratio_convert']) * ((100 - $dWhHis['decrement']) / 100);
			}
			//END lấy giá vốn của SKU và id phiếu nhập

			$dShop = $shop->get_detail($shop_id);

			if ($dSKU == '') {
				$unique_id = '';
				$detail_order->set('default_price', $dProduct['price']); // Giá mặc định là giá lẻ
			} else {
				$unique_id = $dSKU['unique_id'];
				$detail_order->set('default_price', isset($dSKU['price']) ? $dSKU['price'] : 0); //Giá mặc định là giá trong dSKU.price
			}

			if ($order_created_by > 0) {
				//order_created_by = members.user_id

				//Update đúng default price
				$members->set('user_id', $order_created_by);
				$dMember = $members->get_detail();

				if (isset($setup['enabled_apply_discount_on_price']) && $setup['enabled_apply_discount_on_price'] == 1) {
					//Cập nhật cho phép hay không cho phép áp dụng bảng giá theo nhóm khách hàng
					$product_price_detail->set('product_id', $dProduct['id']);
					$product_price_detail->set('unique_id', $unique_id);
					$product_price_detail->set('member_group_id', $dMember['member_group_id']);
					$dProPrice = $product_price_detail->get_detail_record();
					if (isset($dProPrice['product_id'])) {
						$detail_order->set('default_price', $dProPrice['value']); //Giá mặc định lúc này chính là giá xuất cho đối tượng này 
					}
				}
			}

			$price = $dProduct['price'] + 0; //Giá lấy trực tiếp khách nhập và thay đổi

			$detail_order->set('quantity', $quantity);
			$detail_order->set('decrement', $dProduct['decrement']);
			$detail_order->set('price', $price);
			$detail_order->set('inverse', 1); //đơn vị xuất cho POS
			$detail_order->set('expire_date', $expire_date);

			$detail_order->set('order_id', $order_id);
			$detail_order->set('product_id', $dProduct['id']);
			$detail_order->set('ratio_convert', $dProduct['ratio_convert']);

			if (isset($dSKU['id']))
				$detail_order->set('sku_id', $dSKU['id']);
			else
				$detail_order->set('sku_id', 0);

			if ($dProduct['multi_attribute'] == 1 && isset($dSKU['name']))
				$detail_order->set('name', $dProduct['name'] . ' (' . $dSKU['name'] . ')');
			else
				$detail_order->set('name', $dProduct['name']);

			$detail_order->set('user_add', $username);
			$detail_order->set('note', isset($dProduct['note']) ? $dProduct['note'] : '');

			$detail_order->set('attribute_1',  isset($dSKU['id']) ? $dSKU['attribute_1'] : '0');
			$detail_order->set('attribute_2',  isset($dSKU['id']) ? $dSKU['attribute_2'] : '0');
			$detail_order->set('attribute_3',  isset($dSKU['id']) ? $dSKU['attribute_3'] : '0');
			$detail_order->set('attribute_4',  isset($dSKU['id']) ? $dSKU['attribute_4'] : '0');
			$detail_order->set('attribute_5',  isset($dSKU['id']) ? $dSKU['attribute_5'] : '0');
			$detail_order->set('sku_name', 	   isset($dSKU['id']) ? $dSKU['name'] : '');

			$detail_order->set('root_price', $root_price);
			$detail_order->set('wh_history_id', $wh_history_id);
			$detail_order->set('wh_history_return_id', 0);

			$dExistPro = $detail_order->get_exist_product($shop_id, $created_at);
			if (empty($dExistPro['id']))
				$detail_order_id = $detail_order->add($shop_id, $created_at);
			else {
				$new_quantity = ($dExistPro['quantity'] + $quantity);
				$detail_order->set('note', $dExistPro['note']);
				$detail_order->update_quantity($shop_id, $dExistPro['id'], $new_quantity, $created_at);
				$detail_order_id = $dExistPro['id'];
			}

			return $detail_order_id;
		} else {
			return false;
		}
	}

	public function add_product_voucher($shop_id, $order_id, $created_at)
	{
		global $shop, $order;


		$price			= $this->get('price');
		$user_add		= $this->get('user_add');
		$product_id		= $this->get('product_id');
		$sku_id			= 0;
		$quantity		= $this->get('quantity');
		$name			= $this->get('name');
		$note			= $this->get('note');
		$coupon_id		= $this->get('coupon_id');
		$root_price		= 0;
		$wh_history_id	= 0;

		$this->set('price', $price);
		$this->set('user_add', $user_add);
		$this->set('product_id', $product_id);
		$this->set('quantity', $quantity);
		$this->set('name', $name);
		$this->set('note', $note);
		$this->set('decrement', 0);
		$this->set('is_coupon', 1);
		$this->set('coupon_id', $coupon_id);
		$this->set('inverse', 1); //đơn vị xuất cho POS
		$this->set('expire_date', 0);
		$detail_order_id = $this->add($shop_id, $created_at);

		//Tạo phụ thu
		$dShop = $shop->get_detail($shop_id);
		$this->cal_surcharge($dShop, $order_id, $created_at);

		$dOrder 	= $order->get_detail($shop_id, $order_id, $created_at);
		//cập nhật commission vào trong order cho khách hàng
		if (isset($dOrder['status']) && $dOrder['status'] == 0 && $dOrder['id_customer'] > 0) {
			$this->update_commission_for_customer($shop_id, $dOrder['id_customer'], $order_id, $created_at);
		}
		unset($dOrder);
		unset($dShop);

		return $detail_order_id;
	}

	public function add_product_service($shop_id, $order_id, $created_at)
	{
		global $shop, $order;


		$price			= $this->get('price');
		$user_add		= $this->get('user_add');
		$product_id		= $this->get('product_id');
		$sku_id			= 0;
		$quantity		= $this->get('quantity');
		$name			= $this->get('name');
		$note			= $this->get('note');
		$root_price		= 0;
		$wh_history_id	= 0;

		$this->set('price', $price);
		$this->set('user_add', $user_add);
		$this->set('product_id', $product_id);
		$this->set('quantity', $quantity);
		$this->set('name', $name);
		$this->set('note', $note);
		$this->set('decrement', 0);
		$this->set('inverse', 1); //đơn vị xuất cho POS
		$this->set('expire_date', 0);
		$detail_order_id = $this->add($shop_id, $created_at);

		//Tạo phụ thu
		$dShop = $shop->get_detail($shop_id);
		$this->cal_surcharge($dShop, $order_id, $created_at);

		$dOrder 	= $order->get_detail($shop_id, $order_id, $created_at);

		unset($dOrder);
		unset($dShop);

		return $detail_order_id;
	}

	public function devidend_service_fee($shop_id, $order_id, $created_at)
	{
		global $setup;
		$lItems   		= $this->listby_order_wallet_commission_for_client($shop_id, $order_id, $created_at);

		$package_fee_val 	= 0;
		$ship_fee_val 		= 0;
		$total_product 		= 0;
		$discount_val 		= 0;
		foreach ($lItems as $sitdo) {

			if ($sitdo['product_id'] > 0 && $sitdo['product_id'] ==  $setup['pro_package_fee']) {
				$package_fee_val  += abs($sitdo['quantity'] * $sitdo['price']);
			} else if ($sitdo['product_id'] > 0 && $sitdo['product_id'] ==  $setup['pro_ship_fee']) {
				$ship_fee_val  += abs($sitdo['quantity'] * $sitdo['price']);
			} else if ($sitdo['product_id'] > 0 && $sitdo['product_id'] ==  $setup['voucher_free_ship_id']) {
				$discount_val  += ($sitdo['quantity'] * $sitdo['price']);
			} else {
				if ($sitdo['product_id'] > 0)
					$total_product += ($sitdo['quantity'] * $sitdo['price']);
			}
		}

		return array(
			'package_fee' => $package_fee_val,
			'ship_fee' 		=> $ship_fee_val,
			'discount' 		=> $discount_val,
			'total_product' => $total_product,
			'total_order'	=> $total_product + $ship_fee_val + $discount_val + $package_fee_val
		); //$ship_fee, $package_fee, $total_product, discount
	}

	public function get_and_sum_product_order($lItems)
	{ //hàm lấy tất cả sản phẩm tổng hợp để xuất excel (tùng code - 18/11/2021)
		global $db;

		$shop_id = '';
		$created_at = '';
		$order_id = '';

		foreach ($lItems as $key => $item) {
			$shop_id = $item['shop_id'];
			$created_at = $item['created_at'];
			$order_id .= "OR `order_id` = '" . $item['order_id'] . "'";
		}

		$order_id = substr($order_id, 2);

		$sql = "SELECT p.*, SUM(dt.`quantity`) quantity
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id 
				WHERE p.`pro_type` = 0 AND ($order_id)
				GROUP BY dt.product_id";
		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function list_product_debt($keyword, $offset, $limit)
	{ //hàm lấy tất cả sản phẩm còn nợ (tùng code - 27/07/2021)
		global $db;

		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($limit != '') $limit = "LIMIT $offset, $limit ";
		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' )";

		$sql = "SELECT p.*, SUM(dt.`quantity_paid`) quantity_paid, SUM(dt.`quantity`) quantity, SUM(dt.`quantity` - dt.`quantity_paid`) quantity_debt,
				dt.`default_price`, dt.`decrement`
				FROM " . $db->tbl_fix . "`product` p 
				LEFT JOIN " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt ON p.id = dt.product_id 
				WHERE 1 $keyword GROUP BY p.`id` ORDER BY dt.`quantity` > dt.`quantity_paid` DESC $limit";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function list_product_debt_count($keyword)
	{ //hàm đếm tổng số lượng sản phẩm còn nợ (tùng code - 27/07/2021)
		global $db;

		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' )";

		$sql = "SELECT COUNT(total) total FROM(
					SELECT COUNT(*) total
					FROM " . $db->tbl_fix . "`product` p 
				LEFT JOIN " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt ON p.id = dt.product_id 
				WHERE 1 $keyword GROUP BY p.`id`
				)ntb";
		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function list_order_by_product($keyword, $offset, $limit)
	{ //hàm lấy tất cả order theo sản phẩm còn nợ (tùng code - 06/08/2021)
		global $db;

		$shop_id 		= $this->get('shop_id');
		$product_id 	= $this->get('product_id');
		$created_at = time();

		if ($limit != '') $limit = "LIMIT $offset, $limit ";
		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' )";

		$sql = "SELECT od.*, dt.`id` detail_order_id, dt.`default_price`, dt.`decrement`, ((dt.`quantity`*dt.`default_price`)*dt.`decrement`/100) price_decrement, dt.`quantity_paid`, dt.`quantity`, (dt.`quantity` - dt.`quantity_paid`) quantity_debt, 
				dt.`name`, dt.`product_id`, IFNULL(mb.`fullname`,'') fullname, IFNULL(mb.`mobile`, '') mobile
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`order_" . $shop_id . "_" . date('Y', $created_at) . "` as od ON od.`id` = dt.`order_id`
				LEFT JOIN " . $db->tbl_fix . "`members` as mb ON mb.`user_id` = od.`id_customer`
				WHERE dt.`quantity_paid` < dt.`quantity` AND dt.`product_id`='$product_id' $keyword ORDER BY od.`created_at` ASC $limit";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function list_order_by_product_count($keyword)
	{ //hàm lấy tất cả order theo sản phẩm còn nợ (tùng code - 06/08/2021)
		global $db;

		$shop_id 		= $this->get('shop_id');
		$product_id 	= $this->get('product_id');
		$created_at = time();

		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' )";

		$sql = "SELECT COUNT(*) total
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`order_" . $shop_id . "_" . date('Y', $created_at) . "` as od ON od.`id` = dt.`order_id`
				LEFT JOIN " . $db->tbl_fix . "`members` as mb ON mb.`user_id` = od.`id_customer`
				WHERE dt.`quantity_paid` < dt.`quantity` AND dt.`product_id`='$product_id' $keyword";

		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function info_product_debt()
	{ //hàm lấy tất cả order theo sản phẩm còn nợ (tùng code - 06/08/2021)
		global $db;

		$shop_id 		= $this->get('shop_id');
		$created_at 	= time();

		$sql = "SELECT SUM(dt.`quantity`-dt.`quantity_paid`) quantity, SUM((dt.`quantity`-dt.`quantity_paid`)*dt.`default_price`) total
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				WHERE dt.`quantity_paid` < dt.`quantity`
				";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function list_order_debt($keyword, $offset, $limit)
	{ //hàm lấy tất cả đơn hàng còn nợ hàng thành viên (tùng code - 27/07/2021)
		global $db;

		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($limit != '') $limit = "LIMIT $offset, $limit ";
		if ($keyword != '') $keyword = " AND (dt.`order_id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' OR mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' )";

		$sql = "SELECT od.*, p.`img_1`, IFNULL(mb.`fullname`,'') fullname, IFNULL(mb.`mobile`,'') mobile
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id 
				INNER JOIN " . $db->tbl_fix . "`order_" . $shop_id . "_" . date('Y', $created_at) . "` od ON dt.`order_id` = od.`id`
				LEFT JOIN " . $db->tbl_fix . "`members` mb ON mb.`user_id` = od.`id_customer`
				WHERE dt.`quantity_paid` < dt.`quantity` $keyword GROUP BY od.`id` ORDER BY od.`created_at` DESC $limit";
		$result = $db->executeQuery_list($sql);
		
		return $result;
	}

	public function list_order_debt_count($keyword)
	{ //hàm đếm tổng số đơn hàng còn nợ hàng thành viên (tùng code - 27/07/2021)
		global $db;

		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%' OR mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' )";

		$sql = "SELECT COUNT(ntb.`total`) total
				FROM(SELECT COUNT(*) total
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id 
				INNER JOIN " . $db->tbl_fix . "`order_" . $shop_id . "_" . date('Y', $created_at) . "` od ON dt.`order_id` = od.`id`
				LEFT JOIN " . $db->tbl_fix . "`members` mb ON mb.`user_id` = od.`id_customer`
				WHERE dt.`quantity_paid` < dt.`quantity` $keyword GROUP BY od.`id`)ntb";
		$result = $db->executeQuery($sql, 1);
		return $result['total'] + 0;
	}

	public function list_product_by_order($keyword, $offset, $limit)
	{ //hàm lấy tất cả đơn hàng còn nợ hàng thành viên (tùng code - 27/07/2021)
		global $db;

		$order_id 	= $this->get('order_id');
		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($limit != '') $limit = "LIMIT $offset, $limit ";
		if ($keyword != '') $keyword = " AND (dt.`order_id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%')";

		$sql = "SELECT dt.*, p.`img_1`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id
				WHERE dt.`quantity_paid` < dt.`quantity` AND dt.`order_id` = '$order_id' $keyword $limit";
		$result = $db->executeQuery_list($sql);
		return $result;
	}

	public function list_product_by_order_count($keyword)
	{ //hàm đếm tổng số đơn hàng còn nợ hàng thành viên (tùng code - 27/07/2021)
		global $db;

		$order_id 	= $this->get('order_id');
		$shop_id 	= $this->get('shop_id');
		$created_at = time();

		if ($keyword != '') $keyword = " AND (p.`id` LIKE '%$keyword%' OR p.`name` LIKE '%$keyword%')";

		$sql = "SELECT COUNT(*) total
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id
				WHERE dt.`quantity_paid` < dt.`quantity` AND dt.`order_id` = '$order_id' $keyword";
		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function sum_total_left()
	{ //hàm đếm tổng số đơn hàng còn nợ hàng thành viên (tùng code - 27/07/2021)
		global $db;

		$product_id 	= $this->get('product_id');
		$shop_id 		= $this->get('shop_id');
		$created_at 	= time();

		$sql = "SELECT SUM(dt.`quantity`-dt.`quantity_paid`) quantity_debt, dt.`quantity_paid`
				FROM " . $db->tbl_fix . "`detail_order_" . $shop_id . "_" . date('Y', $created_at) . "` as dt 
				INNER JOIN " . $db->tbl_fix . "`product` p ON p.id = dt.product_id
				WHERE dt.`quantity_paid` < dt.`quantity` AND dt.`product_id` = '$product_id'";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}
}
$detail_order = new detail_order();
