<?php
class product extends model
{

	protected $class_name = 'product';
	protected $id;
	protected $web_id;
	protected $name;
	protected $allow_online_name;
	protected $online_name;
	protected $keyword;
	protected $price;
	protected $sum_stock;
	protected $on_sales;
	protected $sales;
	protected $wholesale_price;
	protected $multi_attribute;
	protected $update;
	protected $cat_id;
	protected $unit;
	protected $type; //product_type
	protected $return;
	protected $hidden;
	protected $warehouse_id;
	protected $shop_id;
	protected $img_1;
	protected $img_2;
	protected $img_3;
	protected $img_4;
	protected $img_5;
	protected $img_6;
	protected $attribute_1;
	protected $attribute_2;
	protected $attribute_3;
	protected $attribute_4;
	protected $attribute_5;
	protected $attribute_label; //label show only not user for anything else: array json string
	protected $allow_deal;
	protected $product_country;
	protected $product_location;
	protected $description;
	protected $short_description;
	protected $feature;
	protected $status;
	protected $deleted;
	protected $online;
	protected $hot;
	protected $clone;
	protected $have_serial;
	protected $start_time_promotion;
	protected $end_time_promotion;
	protected $unit_import;
	protected $product_commission_id;
	protected $ratio_convert;
	protected $unit_export;

	protected $root_price;
	protected $allow_root_price;
	protected $pro_type; //Loại sản phẩm dịch vụ: =0 dịch vụ sản phẩm thông thường; =1 dịch vụ; = 2 sản phẩm voucher; =3 tài sản cố định;
	protected $allow_free;

	protected $brand_id; //brand.id
	protected $supplier_id; //supplier.id
	protected $tags; //tag_id_1; tag_id_2; ...
	protected $point; //Điểm tính chiết khấu
	protected $for_point; //Chỉ dùng để đổi điểm int()

	public function addProduct($code)
	{
		global $db, $main, $SKU;

		$arr['name'] 				= $this->get('name');
		$arr['type'] 				= $this->get('type');
		$arr['cat_id'] 				= $this->get('cat_id');
		$arr['shop_id'] 			= $this->get('shop_id');
		$arr['hidden'] 				= $this->get('hidden');
		$arr['return'] 				= $this->get('return');

		$arr['keyword'] 			= $main->no_sign($arr['name']);

		$arr['price'] 				= $this->get('price');
		$arr['on_sales'] 			= $this->get('on_sales');
		$arr['sales'] 				= $this->get('sales');
		$arr['wholesale_price'] 	= $this->get('wholesale_price');
		$arr['online'] 				= $this->get('online');

		$arr['have_serial'] 		= $this->get('have_serial');
		$arr['root_price'] 			= $this->get('root_price')==''?0:$this->get('root_price');
		$arr['allow_root_price'] 	= $this->get('allow_root_price');

		if ($this->get('img_1') != '') $arr['img_1'] = $this->get('img_1');
		if ($this->get('img_2') != '') $arr['img_2'] = $this->get('img_2');
		if ($this->get('img_3') != '') $arr['img_3'] = $this->get('img_3');
		if ($this->get('img_4') != '') $arr['img_4'] = $this->get('img_4');
		if ($this->get('img_5') != '') $arr['img_5'] = $this->get('img_5');
		if ($this->get('img_6') != '') $arr['img_6'] = $this->get('img_6');

		$arr['multi_attribute'] 	= $this->get('multi_attribute');

		$arr['attribute_1'] 		= $this->get('attribute_1');
		$arr['attribute_2'] 		= $this->get('attribute_2');
		$arr['attribute_3'] 		= $this->get('attribute_3');
		$arr['attribute_4'] 		= $this->get('attribute_4');
		$arr['attribute_5'] 		= $this->get('attribute_5');
		$arr['attribute_label'] 	= $this->get('attribute_label');


		$arr['allow_online_name'] 	= '0';
		$arr['online_name'] 		= '';
		$arr['status'] 				= 0;
		$arr['allow_deal'] 			= 1;

		$arr['product_country'] 	= '';
		$arr['product_location'] 	= '';
		$arr['description'] 		= $this->get('description');
		$arr['short_description'] 	= $this->get('short_description');
		$arr['feature'] 			= '';

		$arr['unit_import'] 	= $this->get('unit_import');
		$arr['product_commission_id'] = $this->get('product_commission_id');
		$arr['web_id'] 			= $this->get('web_id');
		$arr['ratio_convert'] 	= $this->get('ratio_convert');
		$arr['unit_export'] 	= $this->get('unit_export');
		$arr['pro_type'] 		= $this->get('pro_type');
		$arr['hot'] 			= $this->get('hot');
		$arr['allow_free'] 		= $this->get('allow_free');

		$arr['brand_id'] 		= $this->get('brand_id');
		$arr['supplier_id'] 	= $this->get('supplier_id')==''?0:$this->get('supplier_id');
		$arr['tags'] 			= $this->get('tags');
		$arr['point'] 			= $this->get('point');
		$arr['point'] 			= $arr['point'] == '' ? 0 : $arr['point'];
		$arr['for_point'] 		= $this->get('for_point');

		$db->record_insert($db->tbl_fix . "product", $arr);

		$id = $db->mysqli_insert_id();

		//tao ra sku mac dinh
		if ($arr['multi_attribute'] == 0) $SKU->create_default_sku($id, $code);

		return $id;
	}

	public function clone_product($to_cat, $to_shop_id, $to_root_cat, $arrInp, $clone_price)
	{
		global $db;
		$main = new main();
		$SKU = new SKU();
		// $detail_att = new detail_attribute();

		$arrInp['cat_id'] = $to_cat;

		if ($clone_price != '1') {
			$arrInp['price'] = 0;
			$arrInp['sales'] = 0;
		}

		$arrInp['online'] = 0;
		$arrInp['clone'] = 1;
		$arrInp['shop_id'] = $to_shop_id;
		$arrInp['type'] = $to_root_cat;
		$arrInp['hidden'] = 0;

		$old_product_id = $arrInp['id'];
		unset($arrInp['id']);
		$arrInp['sum_stock'] = 0;

		$db->record_insert($db->tbl_fix . "`product`", $arrInp);

		$new_product_id = $db->mysqli_insert_id();

		$SKU->clone_SKU_to_other($old_product_id, $new_product_id);
		// $detail_att->clone_attribute( $old_product_id, $new_product_id );

		return $new_product_id;
	}

	public function updateProduct($code)
	{
		global $db, $main, $SKU;

		$product_id					= $this->get('id');

		$arr['name'] 				= $this->get('name');
		$arr['type'] 				= $this->get('type');
		$arr['cat_id'] 				= $this->get('cat_id');
		$arr['hidden'] 				= $this->get('hidden');
		$arr['return'] 				= $this->get('return');

		$arr['keyword'] 			= $main->no_sign($arr['name']);

		$arr['price'] 				= $this->get('price');
		$arr['on_sales'] 			= $this->get('on_sales');
		$arr['sales'] 				= $this->get('sales');
		$arr['wholesale_price'] 	= $this->get('wholesale_price');
		$arr['online'] 				= $this->get('online');

		$arr['have_serial'] 		= $this->get('have_serial');

		$arr['hot'] 				= $this->get('hot');
		$arr['allow_free'] 			= $this->get('allow_free');

		$arr['root_price'] 			= $this->get('root_price');
		$arr['allow_root_price'] 	= $this->get('allow_root_price');

		if ($this->get('img_1') != '') $arr['img_1'] = $this->get('img_1');
		if ($this->get('img_2') != '') $arr['img_2'] = $this->get('img_2');
		if ($this->get('img_3') != '') $arr['img_3'] = $this->get('img_3');
		if ($this->get('img_4') != '') $arr['img_4'] = $this->get('img_4');
		if ($this->get('img_5') != '') $arr['img_5'] = $this->get('img_5');
		if ($this->get('img_6') != '') $arr['img_6'] = $this->get('img_6');

		$arr['multi_attribute'] 	= $this->get('multi_attribute');

		$arr['attribute_1'] 		= $this->get('attribute_1');
		$arr['attribute_2'] 		= $this->get('attribute_2');
		$arr['attribute_3'] 		= $this->get('attribute_3');
		$arr['attribute_4'] 		= $this->get('attribute_4');
		$arr['attribute_5'] 		= $this->get('attribute_5');
		$arr['attribute_label'] 	= $this->get('attribute_label');

		$arr['unit_import'] 		= $this->get('unit_import');
		$arr['product_commission_id'] 		= $this->get('product_commission_id');
		$arr['web_id'] 				= $this->get('web_id');
		$arr['ratio_convert'] 		= $this->get('ratio_convert');
		$arr['unit_export'] 		= $this->get('unit_export');
		$arr['description'] 		= $this->get('description');
		$arr['short_description'] 	= $this->get('short_description');

		$arr['brand_id'] 			= $this->get('brand_id');
		$arr['supplier_id'] 		= $this->get('supplier_id')==''?0:$this->get('supplier_id');
		$arr['tags'] 				= $this->get('tags');
		$arr['point'] 				= $this->get('point');
		$arr['point'] 				= $arr['point'] == '' ? 0 : $arr['point'];
		$arr['for_point'] 			= $this->get('for_point');

		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$product_id' ");

		if ($arr['multi_attribute'] == '0') {

			$dSKU = $SKU->get_detail('0', $product_id);
			if (empty($dSKU['product_id'])) {
				//create default SKU
				$SKU->create_default_sku($product_id, $code);
			} else {
				$SKU->update_code(0, $product_id, $code);
			}

			//delete other (not default SKU)
			$SKU->delete_others_default($product_id);
		} else {

			$dSKU = $SKU->get_detail('0', $product_id);
			if (!empty($dSKU['id'])) {
				//multi attribute: delete default SKU
				$SKU->delete('0', $product_id);
			}
		}

		return true;
	}


	//HC: update 210806 => dùng cho đối tác nhà cung cấp tự cập nhật
	public function supplier_update()
	{
		global $db, $main;

		$id							= $this->get('id');

		$arr['name'] 				= $this->get('name');
		$arr['keyword'] 			= $main->no_sign($arr['name']);
		$arr['img_1'] 				= $this->get('img_1');
		$arr['img_2'] 				= $this->get('img_2');
		$arr['img_3'] 				= $this->get('img_3');
		$arr['img_4'] 				= $this->get('img_4');
		$arr['img_5'] 				= $this->get('img_5');
		$arr['img_6'] 				= $this->get('img_6');
		$arr['description'] 		= $this->get('description');
		$arr['short_description'] 	= $this->get('short_description');
		$arr['hidden'] 				= $this->get('hidden');
		$arr['supplier_id'] 		= $this->get('supplier_id');

		$db->record_update( "$db->tbl_fix`product`", $arr, " `id` = '$id' ");
		
		return true;
	}

	public function update_all_attribute()
	{
		global $db;

		$product_id					= $this->get('id');

		$arr['attribute_1'] 		= $this->get('attribute_1');
		$arr['attribute_2'] 		= $this->get('attribute_2');
		$arr['attribute_3'] 		= $this->get('attribute_3');
		$arr['attribute_4'] 		= $this->get('attribute_4');
		$arr['attribute_5'] 		= $this->get('attribute_5');

		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$product_id' ");

		return true;
	}

	public function update_hidden()
	{
		global $db;

		$product_id					= $this->get('id');
		$arr['hidden'] 				= $this->get('hidden');

		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$product_id' ");

		return true;
	}

	public function update_root_price_fifo()
	//Cập nhật giá vốn cho sản phẩm nhập, nếu sản phẩm này không khai giá vốn, thì lấy ngay giá nhập hiện tại
	{
		global $db;

		$id					= $this->get('id');
		$arr['root_price'] 	= $this->get('root_price');

		$db->record_update($db->tbl_fix . "`product`", $arr, " `id` = '$id' AND `allow_root_price` = '0' ");

		return true;
	}

	public function add_pro_web($shop_id, $dWebPro)
	{
		global $db, $database, $main, $SKU;
		

		$code = $dWebPro['code'];
		// $arr['code'] = $code;
		$arr['web_id'] = $dWebPro['id'];
		$arr['name'] = $dWebPro['name'];
		$arr['allow_online_name'] = 0;
		$arr['online_name'] = '';
		$arr['keyword'] = $main->no_sign($dWebPro['name']);
		$arr['status'] = '';
		$arr['return'] = '1';
		$arr['price'] = $dWebPro['price'];
		$arr['allow_deal'] = '0'; //ko cho phép trả giá

		$arr['on_sales'] = $dWebPro['status_promotion']; //trạng thái giá khuyến mại
		$arr['sales'] = $dWebPro['price_promotion'];
		$arr['start_time_promotion'] = $dWebPro['start_time_promotion'];
		$arr['end_time_promotion'] = $dWebPro['end_time_promotion'];

		$arr['wholesale_price'] = '0'; //Giá sỉ

		$arr['product_country'] = '';
		$arr['product_location'] = '';
		$arr['description'] = '';
		$arr['short_description'] = '';
		$arr['feature'] = '';

		$arr['multi_attribute'] = 0;
		$lSKU 		= $dWebPro['version'];
		if (is_array($lSKU) && COUNT($lSKU) > 0) {
			$arr['multi_attribute'] = 1;
		}

		$arr['online'] = '1'; //sản phẩm có trên web
		$arr['shop_id'] = $shop_id;


		if (isset($dWebPro['image']) && $dWebPro['image'] != '') $arr['img_1'] = $dWebPro['image'];
		$arr['img_2'] = '';
		$arr['img_3'] = '';
		$arr['img_4'] = '';
		$arr['img_5'] = '';
		$arr['img_6'] = '';

		$arr['attribute_1'] = $dWebPro['version_size']; //position 1
		$arr['attribute_2'] = $dWebPro['version_color']; //position 2
		$arr['attribute_3'] = $dWebPro['version_material']; //position 3
		$arr['attribute_4'] = $dWebPro['version_design']; //position 4
		$arr['attribute_5'] = '';

		$arr['have_serial'] = 0;
		$arr['type'] = 0; //sub category
		$arr['cat_id'] = 0;
		$arr['hidden'] = $dWebPro['hidden'];

		$arr['unit_import'] 	= 'Cái';
		$arr['ratio_convert'] 	= '1';
		$arr['unit_export'] 	= 'Cái';
		$arr['pro_type'] 		= '0';

		$db->record_insert($db->tbl_fix . "product", $arr);

		$id = $db->mysqli_insert_id();

		//tao ra sku mac dinh
		if ($arr['multi_attribute'] == 0) {
			$SKU->create_default_sku_web($dWebPro['id'], $id /*product_id*/, $code);
		} else {
			$this->addDetailAttribute($id, $dWebPro['version_size'], 1);
			$this->addDetailAttribute($id, $dWebPro['version_color'], 2);
			$this->addDetailAttribute($id, $dWebPro['version_material'], 3);
			$this->addDetailAttribute($id, $dWebPro['version_design'], 4);
			$this->addDetailAttribute($id, '', 5);

			$listSKUID = array();
			foreach ($lSKU as $key => $it) {
				$listSKUID[] = $SKU->add_SKU_web($id, $id['id'], $it['code'], $it['name'], $it['image']);
			}
		}

		

		return $id;
	}

	public function update_pro_web($shop_id, $product_id, $dWebPro)
	{
		global $db, $database;
		$main = new main();
		$SKU = new SKU();

		$code = $dWebPro['code'];
		// $arr['code'] = $code;
		$arr['name'] = $dWebPro['name'];
		$arr['allow_online_name'] = 0;
		$arr['online_name'] = '';
		$arr['keyword'] = $main->no_sign($dWebPro['name']);
		$arr['status'] = '';
		$arr['return'] = '1';
		$arr['price'] = $dWebPro['price'];
		$arr['allow_deal'] = '0'; //ko cho phép trả giá

		$arr['on_sales'] = $dWebPro['status_promotion']; //trạng thái giá khuyến mại
		$arr['sales'] = $dWebPro['price_promotion'];
		$arr['start_time_promotion'] = $dWebPro['start_time_promotion'];
		$arr['end_time_promotion'] = $dWebPro['end_time_promotion'];

		$arr['wholesale_price'] = '0'; //Giá sỉ

		$arr['product_country'] = '';
		$arr['product_location'] = '';
		$arr['description'] = '';
		$arr['short_description'] = '';
		$arr['feature'] = '';

		$arr['multi_attribute'] = 0;
		$lSKU 		= $dWebPro['version'];
		if (is_array($lSKU) && COUNT($lSKU) > 0) {
			$arr['multi_attribute'] = 1;
		}

		$arr['online'] = '1'; //sản phẩm có trên web
		$arr['shop_id'] = $shop_id;

		if (isset($dWebPro['image']) && $dWebPro['image'] != '') $arr['img_1'] = $dWebPro['image'];
		$arr['img_2'] = '';
		$arr['img_3'] = '';
		$arr['img_4'] = '';
		$arr['img_5'] = '';
		$arr['img_6'] = '';

		$arr['attribute_1'] = $dWebPro['version_size']; //position 1
		$arr['attribute_2'] = $dWebPro['version_color']; //position 2
		$arr['attribute_3'] = $dWebPro['version_material']; //position 3
		$arr['attribute_4'] = $dWebPro['version_design']; //position 4
		$arr['attribute_5'] = '';

		$arr['have_serial'] = 0;
		$arr['hidden'] = $dWebPro['status'];

		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$product_id' ");

		$listSKUID = array();
		//tao ra sku mac dinh
		if ($arr['multi_attribute'] == 0) {
			$listSKUID[] = $SKU->create_default_sku_web($dWebPro['id'], $product_id, $code);
		} else {

			foreach ($lSKU as $key => $it) {
				$listSKUID[] = $SKU->add_SKU_web($product_id, $it['id'], $it['code'], $it['name'], $it['image']);
			}
		}

		$SKU->delete_others_sku_web($listSKUID, $product_id);

		

		return $id;
	}

	public function update_web_id($id, $web_id)
	{
		global $db;

		$arr['web_id'] 	= $web_id;

		$db->record_update($db->tbl_fix . "product", $arr, " `id`='$id'");

		return true;
	}

	public function update_web_info($new_web_id)
	{
		global $db;

		$web_id 				= $this->get('web_id');
		$arr['web_id'] 			= $new_web_id;

		if ($this->get('img_1') != '') 		$arr['img_1'] 			= $this->get('img_1');
		if ($this->get('description') != '') $arr['description'] 	= $this->get('description'); //link description from web KHT

		$db->record_update($db->tbl_fix . "product", $arr, " `web_id` = '$web_id' ");

		return true;
	}

	public function update_not_sorted_product_from_web()
	{
		global $db;

		$id 					= $this->get('id');
		$arr['name'] 			= $this->get('name');
		$arr['price'] 			= $this->get('price');
		$arr['type'] 			= $this->get('type');
		$arr['cat_id'] 			= $this->get('cat_id');

		$arr['attribute_1'] 	= $this->get('attribute_1');
		$arr['attribute_2'] 	= $this->get('attribute_2');
		$arr['attribute_3'] 	= $this->get('attribute_3');
		$arr['attribute_4'] 	= $this->get('attribute_4');
		$arr['attribute_5'] 	= $this->get('attribute_5');

		$arr['unit_import'] 	= 'Cái';
		$arr['ratio_convert'] 	= '1';
		$arr['unit_export'] 	= 'Cái';

		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$id' ");

		return true;
	}

	public function update_attribute($id, $name, $position)
	{
		global $db, $database;
		$main = new main();

		$arr['attribute_' . $position] = $name;

		$db->record_update($db->tbl_fix . "product", $arr, " `id`='" . $id . "'");

		

		return true;
	}

	public function update_hot($id, $hot)
	{
		global $db, $database;
		$main = new main();

		$arr['hot'] = $hot;

		$db->record_update($db->tbl_fix . "product", $arr, " `id`='" . $id . "'");
		
		return true;
	}

	public function update_hide_by_cate()
	{
		global $db, $database;
		$main = new main();

		$cat_id = $this->get('cat_id');
		$hidden = $this->get('hidden');

		$arr['hidden'] = $hidden;

		$db->record_update($db->tbl_fix . "product", $arr, " `cat_id`='" . $cat_id . "'");
		return true;
	}

	public function delete_attribute($id, $position)
	{

		global $db, $database;

		//update
		$arr['attribute_' . $position] = '';
		$db->record_update($db->tbl_fix . "product", $arr, " `id`='" . $id . "'");

		//update
		$arrr['attribute_' . $position] = '0';
		$arrr['name'] = '';
		$db->record_update($db->tbl_fix . "SKU", $arrr, " `product_id`='" . $id . "' ");

		//update 
		$arrrr['status'] = -1;
		$db->record_update($db->tbl_fix . "detail_attribute", $arrrr, " `product_id`='" . $id . "' AND `position` = '" . $position . "'");

		return true;
	}

	public function get_detail_by_web_id()
	{
		global $db;

		$shop_id 		= $this->get('shop_id');
		$web_id 		= $this->get('web_id');

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` WHERE `web_id`='" . $web_id . "' AND `shop_id` = '$shop_id' AND `deleted` = '0' LIMIT 1";

		$row = $db->executeQuery($sql, 1);

		return $row;
	}

	public function get_detail_by_name()
	{
		global $db;

		$shop_id		= $this->get('shop_id');
		$type			= $this->get('type');
		$cat_id			= $this->get('cat_id');
		$name			= $this->get('name');

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product`
				WHERE `shop_id` = '$shop_id' AND `type` = '$type' AND `name` = '$name'
				AND `cat_id` = '$cat_id' AND `deleted` = '0' LIMIT 1";

		$row = $db->executeQuery($sql, 1);

		return $row;
	}

	public function get_detail_to_web()
	{
		global $db, $SKU;

		$id = $this->get('id');

		$sql = "SELECT `id`, `web_id` id_on_web, `name`, `price`, `sales` as price_promotion, `status`,
					sum_stock `quantity`, `img_1` as `image`, on_sales as status_promotion, `start_time_promotion`, `end_time_promotion`,
					 attribute_1 as version_size, attribute_2 as version_color, attribute_3 as version_material, attribute_4 as version_design,
					multi_attribute
				FROM `product`
				WHERE `id` = '$id' AND `deleted` = '0'
				ORDER BY name ASC";

		$row = $db->executeQuery($sql, 1);

		if ($row['multi_attribute'] == '1') {
			$row['code'] = '';
			$row['version'] = $SKU->list_by_product_id_to_web($row['id']);
		} else {
			$row['code'] = $SKU->get_default_sku_code($row['id']);
			$row['version'] = array();
		}
		unset($row['multi_attribute']);

		return $row; //a detail product
	}


	public function delete()
	{
		global $db;

		$id = $this->get('id');

		$arr['hidden'] = -1;
		$arr['deleted'] = 1;
		$db->record_update($db->tbl_fix . "product", $arr, " `id` = '$id' ");

		return true;
	}

	public function apply_clone($shop_id)
	{
		global $db;

		$arr['clone'] = 0;
		$db->record_update($db->tbl_fix . "`product`", $arr, " `shop_id` = '" . $shop_id . "' ");

		return true;
	}

	public function delete_clone($shop_id)
	{
		global $db;

		$db->record_delete($db->tbl_fix . "product", " `shop_id`='" . $shop_id . "' AND `clone` = '1' ");

		return true;
	}

	public function delete_img($position, $id)
	{
		global $db;

		$arr['img_' . $position] = '';

		$db->record_update($db->tbl_fix . "product", $arr, " `id`='" . $id . "'");

		return true;
	}

	public function delete_by_cat($cat_id)
	{
		global $db;

		$arr['hidden'] = -1;
		$db->record_update($db->tbl_fix . "product", $arr, " `cat_id`='" . $cat_id . "'");

		return true;
	}

	public function listby_cat_id($cat_id)
	{
		global $db;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` WHERE `cat_id`='" . $cat_id . "'  AND `deleted` = 0 ORDER BY name ASC";

		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_by_cat_id()
	{
		global $db, $SKU;

		$cat_id		= $this->get('cat_id');
		$for_point	= $this->get('for_point');
		$shop_id	= $this->get('shop_id');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}

		$sql = "SELECT * 
				FROM " . $db->tbl_fix . "`product` pro
				WHERE `cat_id` = '$cat_id' 
				AND `shop_id` = '$shop_id'
				AND `deleted` = 0 
				AND `hidden` = '0' 
				$sqlForPoint 
				ORDER BY name ASC";

		$result = $db->executeQuery($sql);
		
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$row['code'] = '';
			if ($row['multi_attribute'] == 0) {
				$row['code'] = $SKU->get_default_sku_code($row['id']);
			}
			$kq[] = $row;
		}

		return $kq;
	}

	public function get_random_allow_free()
	{
		global $db, $setup;

		$shop_id = $this->get('shop_id');

		$no_limit = 5;
		if (isset($setup['number_pro_allow_free']) && $setup['number_pro_allow_free'] > 0) $no_limit = $setup['number_pro_allow_free'];

		$sql = "SELECT `id`
				FROM " . $db->tbl_fix . "`product`
				WHERE `shop_id` = '$shop_id' AND `deleted` = 0 AND `hidden` = '0' AND `allow_free` = '1' AND `for_point` = '0'
				ORDER BY name ASC
				LIMIT $no_limit";
		$result = $db->executeQuery($sql);

		$l = '';
		while ($row = mysqli_fetch_assoc($result)) {
			$l .= $row['id'] . ';';
		}

		return $l;
	}

	public function list_allow_free($keyword = '', $offset = '', $limit = '')
	{
		global $db;

		$shop_id = $this->get('shop_id');

		if ($keyword != '')
			$keyword = " AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' ) ";

		$sql = "SELECT pro.*, SKU.`code` sku_code
				FROM $db->tbl_fix`product` pro
				LEFT JOIN $db->tbl_fix`SKU` ON SKU.`product_id` = pro.`id`
				WHERE
				pro.`shop_id` = '$shop_id'
				AND pro.`for_point` = 1
				AND pro.`allow_free` = 1
				AND pro.`deleted` = 0
				AND pro.`hidden` = 0
				$keyword
				ORDER BY name ASC";

		$l = $db->executeQuery_list($sql);

		return $l;
	}

	public function list_allow_free_count($keyword = '')
	{
		global $db;

		$shop_id = $this->get('shop_id');
		if ($keyword != '')
			$keyword = " AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) total
				FROM $db->tbl_fix`product` pro
				LEFT JOIN $db->tbl_fix`SKU` ON SKU.`product_id` = pro.`id`
				WHERE
				pro.`shop_id` = '$shop_id'
				AND pro.`allow_free` = 1
				AND pro.`for_point` = 0
				AND pro.`deleted` = 0
				AND pro.`hidden` = 0
				$keyword
				";

		$l = $db->executeQuery($sql, 1);

		return $l['total'];
	}

	public function opt_package($cat_id)
	{
		global $db, $SKU;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product`
				WHERE `cat_id` = '$cat_id' AND `deleted` = 0 ORDER BY `name` ASC";
		$result = $db->executeQuery($sql);

		$opt = '';
		while ($row = mysqli_fetch_assoc($result)) {
			$opt .= '<option value="' . $row['id'] . ';0">' . $row['name'] . ' - ' . number_format_replace_cog($row['price']) . ' ( ' . $row['unit_import'] . ' )</option>';
		}

		return $opt;
	}

	public function filter_opt_package($cat_id)
	{
		global $db, $SKU;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product`
				WHERE `cat_id` = '$cat_id' AND `deleted` = 0 ORDER BY `name` ASC";
		$result = $db->executeQuery($sql);

		$opt = '';
		while ($row = mysqli_fetch_assoc($result)) {
			$opt .= '<option value="' . $row['id'] . '"> ' . $row['name'] . ' </option>';
		}

		return $opt;
	}

	public function list_product_to_web()
	{
		global $db, $SKU;

		$sql = "SELECT `id`, `name`, `price`, `sales` as price_promotion, `status`,
					sum_stock `quantity`, `img_1` as `image`, on_sales as status_promotion, `start_time_promotion`, `end_time_promotion`,
					 attribute_1 as version_size, attribute_2 as version_color, attribute_3 as version_material, attribute_4 as version_design,
					multi_attribute, `description`
				FROM `product`
				WHERE `deleted` = '0' AND pro_type = 0
				ORDER BY name ASC";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['multi_attribute'] == '1') {
				$row['code'] = '';
				$row['version'] = $SKU->list_by_product_id_to_web($row['id']);
			} else {
				$row['code'] = $SKU->get_default_sku_code($row['id']);
				$row['version'] = array();
			}
			unset($row['multi_attribute']);
			$kq[] = $row;
		}

		return $kq;
	}

	public function listby_cat_id_pos($cat_id)
	{
		global $db;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product`
				WHERE `cat_id` = '$cat_id'  
				AND `deleted` = 0 
				AND `hidden` = 0 
				ORDER BY name ASC";

		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function listby_cat_id_paging($cat_id, $offset = 0, $limit = 0)
	{
		global $db;

		if ($limit > 0) {
			$limit = " LIMIT " . $offset . "," . $limit;
		} else {
			$limit = '';
		}

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` 
				WHERE `cat_id`='" . $cat_id . "'
				AND `deleted` = 0 
				ORDER BY name ASC
				$limit";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	public function listby_cat_id_paging_count($cat_id)
	{
		global $db;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` WHERE `cat_id`='" . $cat_id . "'  AND `deleted` = 0 ORDER BY name ASC ";

		$result = $db->executeQuery($sql);

		return mysqli_num_rows($result);
	}

	public function searching_keyword($shop_id, $keyword, $offset = 0, $limit = '')
	{
		global $db;
		$main = new main();
		$keyword = $main->no_sign($keyword);

		if ($limit != '') $limit = " LIMIT $offset,$limit";

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` WHERE `shop_id` = '$shop_id' AND ( `keyword` LIKE '%$keyword%' OR `code` LIKE '%$keyword%' ) ORDER BY name ASC " . $limit;

		$sql = "SELECT  `pro`.*
				FROM " . $db->tbl_fix . "`product` `pro`
				INNER JOIN " . $db->tbl_fix . "`SKU` SKU ON SKU.product_id = `pro`.id
				WHERE `pro`.`shop_id` = '$shop_id' AND ( `pro`.`keyword` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%') AND `pro`.deleted = 0
				GROUP BY `pro`.id
				ORDER BY name ASC
				$limit";

		$kq = $db->executeQuery_list($sql);

		return $kq;
	}

	public function searching_keyword_count($shop_id, $keyword)
	{
		global $db;
		$main = new main();
		$keyword = $main->no_sign($keyword);

		$sql = "SELECT COUNT(*) total
				FROM
				(SELECT pro.`id`
				FROM " . $db->tbl_fix . "`product` `pro`
				INNER JOIN " . $db->tbl_fix . "`SKU` SKU ON SKU.product_id = pro.id
				WHERE `pro`.`shop_id` = '$shop_id' AND ( `pro`.`keyword` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%') AND `pro`.deleted = 0
				GROUP BY `pro`.id
				) nTB";

		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function listby_cat_id_forrepreport($cat_id)
	{
		global $db;

		$sql = "SELECT *
				FROM " . $db->tbl_fix . "`product`
				WHERE `cat_id`='" . $cat_id . "' ORDER BY name ASC";

		$result = $db->executeQuery($sql);
		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {

			$kq[] = $row;
		}

		return $kq;
	}

	public function listby_cat_id_all($cat_id)
	{
		global $db;

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` WHERE `cat_id`='" . $cat_id . "' AND (hidden =0 OR hidden=1) ORDER BY name ASC";

		$result = $db->executeQuery($sql);

		while ($row = mysqli_fetch_assoc($result)) {

			$kq[] = $row;
		}

		return $kq;
	}

	// public function list_all()
	// {	
	// 	global $db;

	// 	$sql = "SELECT SKU.id as sku_id, pro.id as product_id,pro.name as product_name, 
	// 				   SKU.name
	// 			FROM ".$db->tbl_fix."`product` as pro
	// 			JOIN `SKU` ON pro.id = SKU.product_id 
	// 			WHERE pro.`deleted`='0' AND SKU.`deleted`='0' GROUP BY SKU.code ORDER BY pro.name ASC";

	// 	$result = $db->executeQuery ( $sql );
	// 	$kq = array();

	// 	while($row = mysqli_fetch_assoc($result)){
	// 		$kq[] = $row;
	// 	}

	// 	return $kq;
	// }

	public function list_all_by($shop_id)
	{
		global $db, $setup;
		$wh_history = new warehouse_history();

		$sql = "SELECT SKU.`id` as sku_id, pro.`id` as product_id,pro.`name` as product_name, SKU.`code`, SKU.`on_stock`,
					   SKU.`name` as sku_name, pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`
				FROM " . $db->tbl_fix . "`product` as pro
				JOIN `SKU` ON pro.id = SKU.product_id 
				WHERE pro.`deleted`='0' AND SKU.`deleted`='0' AND pro.`shop_id` = '" . $shop_id . "'
				GROUP BY SKU.code
				ORDER BY pro.name ASC, SKU.name ASC";

		$result = $db->executeQuery($sql);
		$kq = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$price = $wh_history->get_last_import_price($row['product_id'], $row['sku_id']);
			$row['price'] = number_format_replace_cog($price);
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_by_shop_to_download($shop_id)
	{
		global $db, $setup;

		$sql = "SELECT `pro`.`name`, `pro`.cat_id, `cat`.`name` `cat_name`, `pro`.`unit_import`
						, `pro`.ratio_convert, `pro`.`unit_export`, `pro`.price, `pro`.wholesale_price,
					`pro`.`return`, `pro`.multi_attribute, SKU.`code`, `pro`.attribute_1, `pro`.attribute_2
					, `pro`.attribute_3, `pro`.attribute_4, `pro`.attribute_5, rot.`name` `main_category`
					, `pro`.img_1, SKU.`name` sku_name, SKU.`img_1` sku_img
					, `pro`.web_id
				FROM " . $db->tbl_fix . "`product` as pro
				INNER JOIN " . $db->tbl_fix . "`SKU` ON pro.id = SKU.product_id
				INNER JOIN " . $db->tbl_fix . "`category` cat ON cat.id = pro.cat_id
				INNER JOIN " . $db->tbl_fix . "`root_category` rot ON cat.type = rot.id
				WHERE pro.`deleted`='0' AND SKU.`deleted`='0' AND pro.`shop_id` = '$shop_id'
				GROUP BY SKU.code
				ORDER BY
				pro.name ASC,
				SKU.name ASC";

		$result = $db->executeQuery_list($sql);


		return $result;
	}

	public function list_all_to_local($shop_id)
	{
		global $db;

		$sql = "SELECT * 
				FROM " . $db->tbl_fix . "`product` as pro
				WHERE pro.`deleted`='0' AND pro.`shop_id` = '" . $shop_id . "'";

		$result = $db->executeQuery($sql);
		$kq = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_product_to_json($shop_id)
	{
		global $db;

		$sql = "SELECT SKU.id as sku_id, pro.id as product_id,pro.name as product_name, SKU.code, SKU.unique_id,
					   SKU.attribute_1,SKU.attribute_2,SKU.attribute_3,SKU.attribute_4,
					   SKU.attribute_5, SKU.name sku_name
				FROM " . $db->tbl_fix . "`product` as pro
				JOIN `SKU` ON pro.id = SKU.product_id 
				WHERE pro.`deleted`='0' AND SKU.`deleted`='0' AND pro.`shop_id` = '" . $shop_id . "'
				GROUP BY SKU.code
				ORDER BY pro.name ASC";

		$result = $db->executeQuery($sql);
		$kq = array();

		while ($row = mysqli_fetch_assoc($result)) {

			$name = '';
			if ($row['sku_name'] > 0) $name = '(' . $row['sku_name'] . ')';

			$item['sku_code'] = $row['code'];
			$item['sku_id'] = $row['sku_id'];
			$item['product_id'] = $row['product_id'];
			$item['unique_id'] = $row['unique_id'];
			$item['name'] = $row['product_name'] . ' ' . $name;

			$kq[] = $item;
		}

		return $kq;
	}

	public function search_product($keyword, $shop_id, $type)
	{
		global $db;

		$sql = "SELECT mn.* FROM " . $db->tbl_fix . "`product` as mn LEFT JOIN " . $db->tbl_fix . "`category` as cat ON cat.id = mn.cat_id WHERE (mn.`name` LIKE '%" . $keyword . "%' OR mn.`keyword` LIKE '%" . $keyword . "%') AND cat.type='" . $type . "' AND cat.shop_id='" . $shop_id . "' AND mn.hidden='0' ORDER BY name ASC";

		$result = $db->executeQuery($sql);

		while ($row = mysqli_fetch_assoc($result)) {

			$kq[] = $row;
		}

		return $kq;
	}

	public function search_autocomplete($keyword, $shop_id)
	{
		global $db, $setup;

		$sqlShop_id = '';
		if ($shop_id != '') $sqlShop_id = " AND `pro`.shop_id = '$shop_id' ";

		$kq = array();
		$sql = "SELECT pro.`id`, pro.`name`, pro.`price`, `SKU`.`attribute_1`, `SKU`.`attribute_2`, `SKU`.`attribute_3`, `SKU`.`attribute_4`, `SKU`.`attribute_5`,
					  `SKU`.`id` sku_id, `SKU`.`name` sku_name, `SKU`.unique_id, SKU.`code` sku_code
				FROM " . $db->tbl_fix . "`product` as pro
				LEFT JOIN SKU on SKU.product_id = pro.id
				WHERE pro.deleted = 0 AND `SKU`.`deleted` = 0 $sqlShop_id AND ( (pro.`name` LIKE '%" . $keyword . "%' OR pro.`keyword` LIKE '%" . $keyword . "%') OR `SKU`.code LIKE '%$keyword%') ORDER BY pro.name ASC LIMIT 20";
		$result = $db->executeQuery($sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$row['price'] = number_format_replace_cog($row['price']);
				$row['name'] = $this->general_name($row);
				$kq[] = $row;
			}
		} else {

			if ($shop_id != '') $sqlShop_id = " AND `product`.shop_id = '$shop_id' ";

			$sql = "SELECT product.`id`, product.`name`, product.`price`, `SKU`.`attribute_1`, `SKU`.`attribute_2`, `SKU`.`attribute_3`, `SKU`.`attribute_4`, `SKU`.`attribute_5`,
					  `SKU`.`id` sku_id, `SKU`.`name` sku_name, `SKU`.`unique_id`, SKU.`code` sku_code
					FROM " . $db->tbl_fix . "`SKU` 
					INNER JOIN `product` ON `SKU`.`product_id` = `product`.`id` $sqlShop_id
					WHERE product.deleted = 0 AND `SKU`.`code` LIKE '%" . $keyword . "%' AND `SKU`.`deleted` = 0";

			$result = $db->executeQuery($sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$row['price'] = number_format_replace_cog($row['price']);
				$row['name'] = $this->general_name($row);
				$kq[] = $row;
			}
		}
		mysqli_free_result($result);

		return $kq;
	}

	public function searching_storing($keyword, $type, $shop_id, $lExceptedItems = array(), $member_group_id)
	{
		global $db, $product_commission_detail;

		$for_point	= $this->get('for_point');
		$hidden 	= $this->get('hidden');

		if ($type != '') {
			if ($type == 'name')
				$keyword = "AND pro.`name` LIKE '%$keyword%'";
			else
				$keyword = "AND SKU.`code` LIKE '%$keyword%'";
		} else {
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		}

		$sqlExcepted = '';
		if ($lExceptedItems != '' && COUNT($lExceptedItems) > 0) {
			foreach ($lExceptedItems as $key => $itex) {
				$sqlExcepted .= "AND SKU.`unique_id` <> '" . $itex['unique_id'] . "' ";
			}
		}

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}

		if ($hidden !== '') $hidden = "AND pro.`hidden` = '$hidden' ";

		$pro_type = $this->get('pro_type');
		$sqlService = '';
		if ( $pro_type == '0' || $pro_type == '1') $sqlService = "AND pro.`pro_type` = '$pro_type' ";
		
		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`root_price`, pro.`allow_root_price`,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`img_1`, pro.`img_2`, pro.`sum_stock`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, SKU.`name` as sku_name, pro.`price` , pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '$shop_id'
				$sqlService
                $keyword
				$sqlExcepted
				$hidden
				$sqlForPoint
				GROUP BY pro.`id`, SKU.`id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				LIMIT 12";
				// echo $sql;

		$result     = $db->executeQuery($sql);
		$kq         = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';
			unset($row['sku_name']);

			$row['decrement'] = 0;
			if ($member_group_id != '' && $member_group_id > 0) {

				$product_commission_detail->set('member_group_id', $member_group_id);
				$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
				$dPCom = $product_commission_detail->get_detail_record();
				if (isset($dPCom['value'])) {
					$row['decrement'] = $dPCom['value'];
				}
			}

			$kq[]   = $row;
		}
		mysqli_free_result($result);

		return $kq;
	}

	//Huân: 20201230 cho api lấy chi tiết sản phẩm show cho client
	public function get_detail_product_for_client($sku_id, $member_group_id)
	{
		global $db, $member_group, $product_commission_detail, $product_commission;

		$id 			= $this->get('id');

		$db_name 		= $db->tbl_fix;

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`sum_stock`, pro.`description`,
						pro.`img_1`, pro.`img_2`,pro.`img_3`, pro.`img_4`,pro.`img_5`, pro.`img_6`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`hidden`   	= '0'
				AND pro.`id` 		= '$id'
				AND SKU.`id` 		= '$sku_id'
				GROUP BY SKU.`unique_id`
				LIMIT 1";

		$row     = $db->executeQuery($sql, 1);

		if (isset($row['product_id'])) {

			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$product_commission_detail->set('member_group_id', $member_group_id);
			$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
			$row['decrement'] = $product_commission_detail->get_commission();

			$product_commission->set('id', $row['product_commission_id']);
			$row['cashback_percent'] = $product_commission->get_cashback_percent();

			unset($row['sku_name']);
			unset($lPrice);
		}

		return $row;
	}

	public function filter_client($keyword, $shop_id, $member_group_id, $offset = 0, $limit = '', $exception_id = '')
	{
		global $db, $member_group, $product_commission_detail, $product_commission;
		$commission_group_detail  = new commission_group_detail();

		$commission_group_id = 0;

		$member_group->set('id', $member_group_id);
		$dMBG = $member_group->get_detail();
		if (isset($dMBG['id'])) {
			$commission_group_id = $dMBG['commission_group_id'];
		}
		unset($dMBG);

		$cat_id = $this->get('cat_id');
		$pro_type = $this->get('pro_type');
		$sqlProType = '';
		if ($sqlProType != '') $sqlProType = " AND pro.`pro_type`  = '$pro_type'  ";

		if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";
		if ($exception_id != '') $exception_id = " AND `pro`.type <> '$exception_id' ";
		if ($keyword != '')
			$keyword 		= "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		$db_name 		= $db->tbl_fix;

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`sum_stock`, pro.`description`, pro.`point`, pro.`for_point`,
						pro.`img_1`, pro.`img_2`,pro.`img_3`, pro.`img_4`,pro.`img_5`, pro.`img_6`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`hidden`   	= '0'
                AND pro.`shop_id`   = '$shop_id'
				$sqlProType
				$cat_id
                $keyword
				$exception_id
				GROUP BY SKU.`unique_id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				$limit";
				
		$result     = $db->executeQuery($sql);
		$kq         = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$product_commission_detail->set('member_group_id', $member_group_id);
			$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
			$row['decrement'] = $row['commission'] = $product_commission_detail->get_commission();

			$product_commission->set('id', $row['product_commission_id']);
			$row['cashback_percent'] = $product_commission->get_cashback_percent();

			//Hoa hồng khách hàng hưởng trên sản phẩm cho cấp dưới là cấp mới hay cấp cũ;
			$row['commission_1'] 			= 0;
			$row['commission_1_percent'] 	= 0;
			$row['commission_2']			= 0;
			$row['commission_2_percent'] 	= 0;
			if ($commission_group_id > 0 && $row['product_commission_id'] > 0) {
				$commission_group_detail->set('commission_group_id', $commission_group_id);
				$commission_group_detail->set('product_commission_id', $row['product_commission_id']);
				$dComGD = $commission_group_detail->get_by();
				if (isset($dComGD['id'])) {
					$row['CGD_1'] 			= $dComGD['value'];
					$row['CGD_1_percent'] 	= $dComGD['is_percent'];
					$row['CGD_2']			= $dComGD['value_2'];
					$row['CGD_2_percent'] 	= $dComGD['is_percent_2'];
				}
			}

			$kq[]   = $row;

			unset($row['sku_name']);
			unset($lPrice);
		}
		mysqli_free_result($result);

		return $kq;
	}

	public function filter_client_count($keyword, $shop_id, $exception_id = '')
	{
		global $db;

		$cat_id = $this->get('cat_id');

		$pro_type = $this->get('pro_type');
		$sqlProType = '';
		if ($sqlProType != '') $sqlProType = " AND pro.`pro_type`  = '$pro_type'  ";

		if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";
		if ($exception_id != '') $exception_id = " AND `pro`.type <> '$exception_id' ";
		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		$db_name = $db->tbl_fix;

		$sql = "SELECT COUNT(*) total FROM
				(
					SELECT SKU.`unique_id`
					FROM $db_name`product` as pro
					INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
					WHERE
					pro.`deleted`       = '0'
					AND pro.`hidden`   	= '0'
					AND SKU.`deleted`   = '0'
					AND pro.`shop_id`   = '$shop_id'
					$sqlProType
					$keyword
					$exception_id
					$cat_id
					GROUP BY SKU.`unique_id`
					ORDER BY pro.`name` ASC, SKU.`name` ASC
				) nTB
				WHERE 1";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function filter($keyword, $shop_id, $offset = 0, $limit = '')
	{
		global $db, $member_group, $product_commission_detail, $setup;

		$cat_id  = $this->get('cat_id');
		if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";

		$lMemberGroup = $member_group->list_all_child();

		$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		$db_name = $db->tbl_fix;

		$hidden = $this->get('hidden');
		if ($hidden !== '') $hidden = "AND pro.`hidden` = '$hidden' ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$domain_ecosite = $setup['domain_ecosite'];
		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, IF(pro.`web_id` =0, '', CONCAT( '$domain_ecosite', pro.`web_id`)) link,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, IF(SKU.`img_1` IS NOT NULL AND SKU.`img_1` <> '', IFNULL(SKU.`img_1`, ''), IFNULL(pro.`img_1`, '')) `img_1`, pro.`img_2`, pro.`sum_stock`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price,
						IFNULL(proComParent.`name`, '') product_commission_parent
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				LEFT JOIN $db_name`product_commission` proCom ON proCom.`id` = pro.`product_commission_id`
				LEFT JOIN $db_name`product_commission` proComParent ON proCom.`parent_id` = proComParent.`id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '$shop_id'
                $keyword
				$cat_id
				$hidden
				GROUP BY SKU.`unique_id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				$limit";

		$result     = $db->executeQuery($sql);
		$kq         = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$lPrice = array();
			foreach ($lMemberGroup as $key => $item) {

				//tính giá đang là của sản phẩm
				// if ($row['multi_attribute'] == 1 && $row['sku_name'] != '') {
				// 	if ($row['on_sales'] == 1)
				// 		$price = $row['price_promotion'] + 0; //giá sale
				// 	else
				// 		$price = $row['sku_price'] + 0;
				// } else {
				// 	if ($row['on_sales'] == 1)
				// 		$price = $row['sales'] + 0;
				// 	else
						$price = $row['price'] + 0;
				// }

				$ii['id']			= $item['id'];
				$ii['price']		= $price;
				$ii['code']			= $item['code'];
				$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
				$product_commission_detail->set('member_group_id', $item['id']);
				$ii['commission']	= $product_commission_detail->get_commission();

				$lPrice[] 		= $ii;
			}
			$row['lPrice'] = $lPrice;

			$kq[]   = $row;

			unset($row['sku_name']);
			unset($lPrice);
		}
		mysqli_free_result($result);

		return $kq;
	}

	public function filter_count($keyword, $shop_id)
	{
		global $db;

		$cat_id  = $this->get('cat_id');
		if ($cat_id != '') $cat_id = "AND `pro`.cat_id = '$cat_id' ";

		$hidden = $this->get('hidden');
		if ($hidden !== '') $hidden = "AND pro.`hidden` = '$hidden' ";

		$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		$db_name = $db->tbl_fix;

		$sql = "SELECT COUNT(*) total FROM
				(
					SELECT SKU.`unique_id`
					FROM $db_name`product` as pro
					INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
					WHERE
					pro.`deleted`       = '0'
					AND SKU.`deleted`   = '0'
					AND pro.`shop_id`   = '$shop_id'
					$keyword
					$cat_id
					$hidden
					GROUP BY SKU.`unique_id`
					ORDER BY pro.`name` ASC, SKU.`name` ASC
				) nTB
				WHERE 1";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	//get code enter and show result for import warehouse in: accountant_storing
	public function get_detail_by_code_enter($shop_id, $code)
	{
		global $db;

		$code = "AND SKU.`code` = '$code'";

		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`img_1`, pro.`img_2`, pro.`sum_stock`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, SKU.`name` as sku_name, pro.`price` , pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, IF( IFNULL(SKU.`img_1`, '') = '', pro.img_1, IFNULL(SKU.`img_1`, '')) `image` 
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '$shop_id'
                $code
				GROUP BY SKU.`id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				LIMIT 1";

		$result     = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_detail_by_code($shop_id, $code)
	{
		global $db;

		$code = "AND SKU.`code` = '$code'";

		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.`id` , pro.`name`, pro.`unit_import`, pro.`unit_export`,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`img_1`, pro.`img_2`, pro.`sum_stock`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, SKU.`name` as sku_name, pro.`price` , pro.`wholesale_price`,
                        IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '$shop_id'
                $code
				GROUP BY SKU.`id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				LIMIT 1";

		$result     = $db->executeQuery($sql, 1);

		return $result;
	}

	//get code enter and show result for import warehouse in: accountant_storing
	public function get_detail_full($sku_id, $product_id)
	{
		global $db;

		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.*, SKU.`id` sku_id, SKU.`code` sku_code, SKU.`name` sku_name, SKU.`unique_id`, SKU.`on_stock`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND pro.`id`   = '$product_id'
                AND SKU.`deleted`   = '0'
				AND SKU.`id` = '$sku_id'
				LIMIT 1";
				
		$result     = $db->executeQuery($sql, 1);

		return $result;
	}

	//get sản phẩm theo unique_id và product_id
	public function get_detail_unique_id($unique_id)
	{
		global $db;

		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.*, SKU.`id` sku_id, SKU.`code` sku_code, SKU.`name` sku_name, SKU.`unique_id`, SKU.`on_stock`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
				AND SKU.`unique_id` = '$unique_id'
				LIMIT 1";
				
		$result     = $db->executeQuery($sql, 1);

		return $result;
	}

	public function autocomplete_unit($shop_id, $keyword, $type)
	{
		global $db, $setup;

		if ($type == 'import')
			$sql = "SELECT `product`.unit_import `name`
					FROM " . $db->tbl_fix . "`product` 
					WHERE product.deleted = 0 AND `product`.`unit_import` LIKE '%" . $keyword . "%' GROUP BY `product`.unit_import";
		else
			$sql = "SELECT `product`.unit_export `name`
				FROM " . $db->tbl_fix . "`product` 
				WHERE product.deleted = 0 AND `product`.`unit_export` LIKE '%" . $keyword . "%' GROUP BY `product`.unit_export";

		$result = $db->executeQuery_list($sql);

		unset($sql);

		return $result;
	}

	public function general_name($dSKU)
	{

		$sku_tpl = '';

		if ($dSKU['sku_name'] != '') $sku_tpl .= '(' . $dSKU['sku_name'] . ') ';

		return $dSKU['name'] . ' ' . $sku_tpl;
	}

	public function list_no_cat_from_web_count()
	{
		global $db;

		$sql = "SELECT COUNT(*) total FROM " . $db->tbl_fix . "`product`
				WHERE `web_id` <> 0 AND `type` = '0' AND `cat_id` = '0' AND `deleted` = '0' ";

		$result = $db->executeQuery($sql, 1);
		return $result['total'] + 0;
	}

	public function list_no_cat_from_web($offset = 0, $limit = '')
	{
		global $db;

		if ($limit != '') $limit = "LIMIT $offset, $limit";

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product`
				WHERE `web_id` <> 0 AND `type` = '0' AND `cat_id` = '0' AND `deleted` = '0'
				ORDER BY `name`
				$limit";

		$result = $db->executeQuery_list($sql);
		return $result;
	}

	public function showroom_inventory($keyword, $id_customer, $showroom_id, $field, $sort, $offset = 0, $limit = '')
	{
		global $db, $setup;
		$db_name = $db->tbl_fix;

		$today = strtotime(date('m/d/Y'));

		$shop_id  			= $this->get('shop_id');

		$cat_id  	= $this->get('cat_id');
		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sqlSort = " ORDER BY nTB.`name` ASC ";

		if (in_array($field, array(
			'name',
			'sku_code',
			'amount_prepare',
			'amount_delivering',
			'amount_inventory',
			'amount_delivered'
		))) {

			if (!in_array($sort, array('ASC', 'DESC'))) $sort = 'ASC';

			$sortFieldArr = array(
				'name'              		=> 'name',
				'sku_code'                  => 'sku_code',
				'amount_prepare'            => 'amount_prepare',
				'amount_delivering'         => 'amount_delivering',
				'amount_inventory'          => 'amount_inventory',
				'amount_delivered'          => 'amount_delivered',
			);

			$field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field] : '';

			if ($field != '')
				$sqlSort = " ORDER BY $field $sort ";
		}

		$union_from 	= $setup['begin_time'];
		$union_to 		= time();
		$sqlNhap = "SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) amount_import
					FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
					INNER JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
					WHERE (od.`order_type` = '0' or od.`order_type` = '1' ) 
					AND `od`.`status` = 1  AND od.`id_customer` = '$id_customer'
					GROUP BY dt.`sku_id`, dt.`product_id`";

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/02/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlNhap .= "UNION ALL
							SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) amount_import
							FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
							INNER JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
							WHERE (od.`order_type` = '0' or od.`order_type` = '2' ) 
							AND `od`.`status` = 1  AND od.`id_customer` = '$id_customer' 
							GROUP BY dt.`sku_id`, dt.`product_id`
							";
		}

		$union_from 	= $setup['begin_time'];
		$union_to 		= time();
		$sqlUnion = "SELECT dt.`product_id`, dt.`sku_id`

						, SUM( IF( IFNULL( del.`shipper_status`, -10) = 1, IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_prepare
						, SUM( IF( IFNULL( del.`shipper_status`, -10) = 2, IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_delivering
						, SUM( IF( IFNULL( del.`shipper_status`, -10) = 3 OR od.`order_type` = '4' , IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_delivered
								
						FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
						INNER JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
						LEFT JOIN $db_name`delivery` del ON  del.`order_id` = dt.`order_id` AND del.`shop_id` = od.`shop_id`
						WHERE 
						(od.`order_type` = '4' AND od.`status` = '1' ) 
						OR 
						(
							od.`order_type` = '3'
							AND del.`shipper_id` = '$showroom_id' 
							AND  ( del.`shipper_status` = 1 OR del.`shipper_status` = 2 OR del.`shipper_status` = 3 )
						)
						GROUP BY dt.`sku_id`, dt.`product_id`
						";

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/02/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlUnion .= "UNION ALL
								SELECT dt.`product_id`, dt.`sku_id`

								, SUM( IF( IFNULL( del.`shipper_status`, -10) = 1, IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_prepare
								, SUM( IF( IFNULL( del.`shipper_status`, -10) = 2, IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_delivering
								, SUM( IF( IFNULL( del.`shipper_status`, -10) = 3 OR od.`order_type` = '4' , IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ), 0 ) ) amount_delivered
								
								FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
								INNER JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
								LEFT JOIN $db_name`delivery` del ON  del.`order_id` = dt.`order_id` AND del.`shop_id` = od.`shop_id`
								WHERE 
								(od.`order_type` = '4' AND od.`status` = '1' ) 
								OR 
								(
									od.`order_type` = '3'
									AND del.`shipper_id` = '$showroom_id' 
									AND  ( del.`shipper_status` = 1 OR del.`shipper_status` = 2 OR del.`shipper_status` = 3 ) 
								)
								GROUP BY dt.`sku_id`, dt.`product_id`
							";
		}

		/**
		 * Tính tổng số lượng nhập - (tổng số lượng xuất bao gồm số lượng đang giao): Kết quả là số lượng tồn cuối
		 * Tính số lượng đang chuẩn bị giao B
		 * Tính số lượng đang giao C
		 */
		$sql = "SELECT *
				FROM (

						SELECT CONCAT(pro.`name`, ' ', SKU.`name`) `name`, SKU.`code` sku_code, SKU.`unique_id`, SKU.`id` sku_id, pro.`id`, pro.`id` product_id, pro.`multi_attribute`, pro.`unit_import`, pro.`unit_export` , pro.`ratio_convert`, pro.`price`, pro.`img_1` img
								, IFNULL(tbNhap.`amount_import`, 0) amount_import
								, IFNULL(tbUnion.`amount_prepare`, 0) amount_prepare
								, IFNULL(tbUnion.`amount_delivering`, 0) amount_delivering
								, IFNULL(tbUnion.`amount_delivered`, 0) amount_delivered
								, (IFNULL(tbNhap.`amount_import`, 0) - IFNULL(tbUnion.`amount_delivering`, 0) - IFNULL(tbUnion.`amount_delivered`, 0)) amount_inventory
						FROM $db_name`product` as pro
						INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
						
						LEFT JOIN (

							SELECT `product_id`, `sku_id`, SUM(`amount_import`) amount_import FROM (
								$sqlNhap
							) dt 
							GROUP BY dt.`sku_id`, dt.`product_id`

						) tbNhap ON tbNhap.`product_id` = SKU.`product_id` AND tbNhap.`sku_id` = SKU.`id`
						
						LEFT JOIN (
								SELECT nTB.`product_id`, nTB.`sku_id`
										, SUM(nTB.`amount_prepare`) amount_prepare
										, SUM(nTB.`amount_delivering`) amount_delivering
										, SUM(nTB.`amount_delivered`) amount_delivered
								FROM (

									$sqlUnion

								) nTB
								GROUP BY nTB.`sku_id`, nTB.`product_id`
						) tbUnion ON tbUnion.`product_id` = SKU.`product_id` AND tbUnion.`sku_id` = SKU.`id`
						
						WHERE
						pro.`deleted`       = '0'
						AND SKU.`deleted`   = '0'
						AND pro.`hidden`   	= '0'
						AND pro.`shop_id`   = '$shop_id'
						$keyword
						$sqlCat

				) nTB
                $sqlSort
				$limit";

		$result     = $db->executeQuery_list($sql);

		return $result;
	}

	public function showroom_inventory_count($keyword)
	{
		global $db;

		$db_name = $db->tbl_fix;

		$shop_id  = $this->get('shop_id');

		$cat_id  = $this->get('cat_id');
		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) total
				FROM $db_name`product` pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
				AND pro.`hidden`   	= '0'
                AND pro.`shop_id`   = '$shop_id'
                $keyword
				$sqlCat";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function inventory($keyword, $field, $sort, $offset = 0, $limit = '')
	{
		global $db;
		$db_name = $db->tbl_fix;

		$today = strtotime(date('m/d/Y'));

		$shop_id  = $this->get('shop_id');
		$cat_id  = $this->get('cat_id');

		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sqlSort = " ORDER BY nTB.`product_name` ASC ";

		if (in_array($field, array(
			'product_name',
			'sku_code',
			'dau_ky',
			'nhap_trong_ky',
			'xuat_trong_ky',
			'gia_tri_ton',
			'cuoi_ky'
		))) {

			if (!in_array($sort, array('ASC', 'DESC'))) $sort = 'ASC';

			$sortFieldArr = array(
				'product_name'              => 'product_name',
				'sku_code'                  => 'sku_code',
				'dau_ky'                  	=> 'dau_ky',
				'nhap_trong_ky'             => 'nhap_trong_ky',
				'xuat_trong_ky'             => 'xuat_trong_ky',
				'cuoi_ky'                  	=> 'cuoi_ky',
				'gia_tri_ton'                  	=> 'gia_tri_ton'
			);

			$field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field] : '';

			if ($field != '')
				$sqlSort = " ORDER BY $field $sort ";
		}

		/**
		 * Tất cả giá trị được trả về đơn vị nhập
		 * Do mỗi khi xuất thì số lượng đầu kỳ đã bị trừ do đó, số lượng cuối kỳ không cần trừ số lượng đầu kỳ
		 */
		$sql = "SELECT *, (`cuoi_ky`*`root_price`) `gia_tri_ton`
				FROM (

					SELECT *, (dau_ky +  nhap_trong_ky  - xuat_trong_ky) cuoi_ky
					FROM (
							SELECT CONCAT(pro.`name`, ' ', SKU.`name`) product_name, SKU.`code` sku_code, pro.`unit_import`, pro.`unit_export` , pro.`ratio_convert`
									, IF( 
											( IFNULL(tbDauKy.`dau_ky`, 0) + IFNULL(tbXuatCu.`xuat_trong_ky_cu`, 0) ) = 0 AND IFNULL(SKU.`on_stock`, 0) < 0
											, IFNULL(SKU.`on_stock`, 0) + IFNULL(tbXuat.`xuat_trong_ky`, 0)
											, ( IFNULL(tbDauKy.`dau_ky`, 0) + IFNULL(tbXuatCu.`xuat_trong_ky_cu`, 0) )
										) dau_ky1
									,  (IFNULL( SKU.`on_stock`, 0 ) - IFNULL(tbNhap.`nhap_trong_ky`, 0) + IFNULL(tbXuat.`xuat_trong_ky`, 0) )dau_ky
									, IFNULL(tbNhap.`nhap_trong_ky`, 0) nhap_trong_ky
									, IFNULL(tbXuat.`xuat_trong_ky`, 0) xuat_trong_ky
									, IFNULL(SKU.`on_stock`, 0) on_stock
									, pro.`allow_root_price`, pro.`root_price`
									, pro.`price`
							FROM $db_name`product` as pro
							INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`-whi.`exported`, (whi.`amount`-whi.`exported`)/pro.`ratio_convert` ) ) dau_ky
									FROM $db_name`warehouse_import` wim
									INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
									INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE wim.`import_date` <  $today AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbDauKy ON tbDauKy.`product_id` = SKU.`product_id` AND tbDauKy.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) nhap_trong_ky
									FROM $db_name`warehouse_import` wim
									INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
									INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE $today <= wim.`import_date` AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbNhap ON tbNhap.`product_id` = SKU.`product_id` AND tbNhap.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
									FROM $db_name`order_" . $shop_id . "_" . date('Y') . "` od
									INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y') . "` dt ON od.`id` = dt.`order_id`
									WHERE od.`status_booking` = 0 AND od.printed = '1' AND od.status = '1' AND '$today' <= od.last_update
									GROUP BY dt.`product_id`, dt.`sku_id`
							) tbXuat ON tbXuat.`product_id` = SKU.`product_id` AND tbXuat.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky_cu
									FROM $db_name`order_" . $shop_id . "_" . date('Y') . "` od
									INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y') . "` dt ON od.`id` = dt.`order_id`
									INNER JOIN $db_name`warehouse_history` whi ON whi.`id` = dt.`wh_history_id`
									WHERE od.`status_booking` = 0 AND od.printed = '1' AND od.status = '1' AND '$today' <= od.last_update AND whi.created_at < '$today'
									GROUP BY dt.`product_id`, dt.`sku_id`
							) tbXuatCu ON tbXuatCu.`product_id` = SKU.`product_id` AND tbXuatCu.`sku_id` = SKU.`id`
							WHERE
							pro.`deleted`       = '0'
							AND SKU.`deleted`   = '0'
							AND pro.`shop_id`   = '$shop_id'
							$keyword
							$sqlCat
					) nTB
				) nTB
                $sqlSort
				$limit";

		$result     = $db->executeQuery_list($sql);

		return $result;
	}

	public function inventory_count($keyword)
	{
		global $db;

		$db_name = $db->tbl_fix;

		$today = strtotime(date('m/d/Y'));

		$shop_id  = $this->get('shop_id');

		$cat_id  = $this->get('cat_id');
		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";


		$sql = "SELECT COUNT(*) total
				FROM $db_name`product` pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '$shop_id'
                $keyword
				$sqlCat";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	public function inventory_period($keyword, $from, $to, $field, $sort, $offset = 0, $limit = '')
	{
		global $db;
		$db_name = $db->tbl_fix;

		$shop_id  = $this->get('shop_id');
		$cat_id  = $this->get('cat_id');

		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sqlSort = " ORDER BY nTB.`product_name` ASC ";

		if (in_array($field, array(
			'product_name',
			'sku_code',
			'dau_ky',
			'nhap_trong_ky',
			'xuat_trong_ky',
			'gia_tri_ton',
			'cuoi_ky'
		))) {

			if (!in_array($sort, array('ASC', 'DESC'))) $sort = 'ASC';

			$sortFieldArr = array(
				'product_name'              => 'product_name',
				'sku_code'                  => 'sku_code',
				'dau_ky'                  	=> 'dau_ky',
				'nhap_trong_ky'             => 'nhap_trong_ky',
				'xuat_trong_ky'             => 'xuat_trong_ky',
				'cuoi_ky'                  	=> 'cuoi_ky',
				'gia_tri_ton'                  	=> 'gia_tri_ton'
			);

			$field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field] : '';

			if ($field != '')
				$sqlSort = " ORDER BY $field $sort ";
		}

		//Tạo SQL union all table từ hiện tại tới thời điểm này;
		// Tính số xuất từ thời điểm from đến bây giờ: để lấy SKU.on_stock cộng tổng cái này sẽ ra 1 số lượng: tổng số lượng thực tế tại thời điểm from
		$union_from = $from;
		$union_to = time();
		$sqlUnion = "SELECT dt.`id`, dt.`product_id`, dt.`sku_id`, dt.`quantity`, dt.`date_add`, dt.`inverse`, dt.`ratio_convert`, od.`created_at`
					FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
					LEFT JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
					WHERE (od.`order_type` = '0' or od.`order_type` = '1' ) AND `od`.`status` = '1' AND '$from' <= od.`created_at` "; //Loại các record trước from

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlUnion .= "UNION ALL
							SELECT dt.`id`, dt.`product_id`, dt.`sku_id`, dt.`quantity`, dt.`date_add`, dt.`inverse`, dt.`ratio_convert`, od.`created_at`
							FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
							LEFT JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
							WHERE (od.`order_type` = '0' or od.`order_type` = '1' ) AND `od`.`status` = '1'
							";
		}

		//Tạo SQL union all table tổng xuất trong kỳ
		$union_from = $from;
		$union_to = time();
		$sqlXuatKy = "SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
					FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
					INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
					WHERE od.`status_booking` = 0 AND od.`printed` = '1' AND od.`status` = '1' AND '$from' <= od.`created_at` AND od.`created_at` < '$to'
					GROUP BY dt.`product_id`, dt.`sku_id` "; //Loại các record trước from

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlXuatKy .= "UNION ALL
							SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
							FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
							INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
							WHERE od.`status_booking` = 0 AND od.`printed` = '1' AND od.`status` = '1' AND '$from' <= od.`created_at` AND od.`created_at` < '$to'
							GROUP BY dt.`product_id`, dt.`sku_id`
							";
		}


		/**
		 * Tất cả giá trị được trả về đơn vị nhập
		 * Do mỗi khi xuất thì số lượng đầu kỳ đã bị trừ do đó, số lượng cuối kỳ không cần trừ số lượng đầu kỳ
		 * CÔNG THỨC TÍNH: tồn đầu kỳ: Số hiện tại trong kho + Số lượng nếu không tính nhập tại thời điểm from (neu_khong_xuat) - Số lượng nhập từ thời điểm from tới hiện tại
		 * 
		 * 
		 * Ghi chú các lệnh trong JOIN bên dưới SQL
		 * - LEFT JOIN: tong_nhap_tu_from ===>-- Tính tổng số lượng đã nhập từ thời điểm from tới hiện tại
		 * - LEFT JOIN: tong_xuat_tu_from ===>-- Tính tổng số lượng nếu không nhập/xuất tính từ thời điểm From
		 * - LEFT JOIN: nhap_trong_ky ===>-- -- nhập trong kỳ
		 * - LEFT JOIN: xuat_trong_ky ===>-- -- xuat trong kỳ
		 * 
		 */
		$sql = "SELECT *, (`cuoi_ky`*`root_price`) `gia_tri_ton`
				FROM (
					SELECT *, (dau_ky +  nhap_trong_ky  - xuat_trong_ky) cuoi_ky
					FROM (
							SELECT CONCAT(pro.`name`, ' ', SKU.`name`) product_name, SKU.`code` sku_code, pro.`unit_import`, pro.`unit_export` , pro.`ratio_convert`, IFNULL(proComParent.`name`, '') pro_parent_name, IFNULL(proCom.`name`, '') pro_com_name, pro.`web_id`, pro.`img_1` `image` 
									,pro.`id` product_id, SKU.`unique_id`, SKU.`id` sku_id
									
									, ( IFNULL(SKU.`on_stock`, 0)
									+ IFNULL( tbKhongXuat.`tong_xuat_tu_from`, 0)
									- IFNULL( tbTongNhapToiHienTai.`tong_nhap_tu_from`, 0) )
									dau_ky
									,IFNULL( tbKhongXuat.`tong_xuat_tu_from`, 0) tong_xuat_tu_from
									,IFNULL( tbTongNhapToiHienTai.`tong_nhap_tu_from`, 0) tong_nhap_tu_from
									, IFNULL( tbNhap.`nhap_trong_ky`, 0) nhap_trong_ky
									, IFNULL( tbXuat.`xuat_trong_ky`, 0) xuat_trong_ky
									, IFNULL(SKU.`on_stock`, 0) on_stock
									, pro.`allow_root_price`, pro.`root_price`
									, pro.`price`
									, pro.`hidden`

							FROM $db_name`product` as pro
							INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) tong_nhap_tu_from
									FROM $db_name`warehouse_history` whi
									LEFT JOIN $db_name`warehouse_import` wim ON whi.`wh_import_id` = wim.`id`
									LEFT JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE  '$from' <= wim.`import_date` AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbTongNhapToiHienTai ON tbTongNhapToiHienTai.`product_id` = SKU.`product_id` AND tbTongNhapToiHienTai.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT nUni.`product_id`, nUni.`sku_id`, SUM( IF(nUni.`inverse` = 1, nUni.`quantity`/nUni.`ratio_convert`, nUni.`quantity` ) ) tong_xuat_tu_from
									FROM (
										$sqlUnion
									) nUni
									WHERE '$from' <= nUni.`created_at`
									GROUP BY nUni.`product_id`, nUni.`sku_id`
							) tbKhongXuat ON tbKhongXuat.`product_id` = SKU.`product_id` AND tbKhongXuat.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) nhap_trong_ky
									FROM $db_name`warehouse_import` wim
									INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
									INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE $from <= wim.`import_date` AND wim.`import_date` < '$to' AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbNhap ON tbNhap.`product_id` = SKU.`product_id` AND tbNhap.`sku_id` = SKU.`id`
							LEFT JOIN (

								SELECT nUni.`product_id`, nUni.`sku_id`, SUM( `xuat_trong_ky` ) xuat_trong_ky
								FROM (

									$sqlXuatKy

								) nUni
								GROUP BY nUni.`product_id`, nUni.`sku_id`

							) tbXuat ON tbXuat.`product_id` = SKU.`product_id` AND tbXuat.`sku_id` = SKU.`id`
							LEFT JOIN $db_name`product_commission` proCom ON proCom.`id` = pro.`product_commission_id`
							LEFT JOIN $db_name`product_commission` proComParent ON proCom.`parent_id` = proComParent.`id`
							WHERE
							pro.`deleted`       = '0'
							AND SKU.`deleted`   = '0'
							AND pro.`shop_id`   = '$shop_id'
							$keyword
							$sqlCat
					) nTB
				) nTB
                $sqlSort
				$limit";

		// SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
		// 					FROM $db_name`order_" . $shop_id . "_" . date('Y') . "` od
		// 					INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $from) . "` dt ON od.`id` = dt.`order_id`
		// 					WHERE od.`status_booking` = 0 AND od.`printed` = '1' AND od.`status` = '1' AND '$from' <= od.`last_update` AND od.`last_update` < '$to'
		// 					GROUP BY dt.`product_id`, dt.`sku_id`

		$result     = $db->executeQuery_list($sql);

		return $result;
	}

	//Tính tổng số lượng và giá trị theo thời gian
	public function inventory_period_sum($keyword, $from, $to )
	{
		global $db;
		$db_name = $db->tbl_fix;

		$shop_id  = $this->get('shop_id');
		$cat_id  = $this->get('cat_id');

		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		//Tạo SQL union all table từ hiện tại tới thời điểm này;
		// Tính số xuất từ thời điểm from đến bây giờ: để lấy SKU.on_stock cộng tổng cái này sẽ ra 1 số lượng: tổng số lượng thực tế tại thời điểm from
		$union_from = $from;
		$union_to = time();
		$sqlUnion = "SELECT dt.`id`, dt.`product_id`, dt.`sku_id`, dt.`quantity`, dt.`date_add`, dt.`inverse`, dt.`ratio_convert`, od.`created_at`
					FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
					LEFT JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
					WHERE (od.`order_type` = '0' or od.`order_type` = '1' ) AND `od`.`status` = '1' AND '$from' <= od.`created_at` "; //Loại các record trước from

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlUnion .= "UNION ALL
							SELECT dt.`id`, dt.`product_id`, dt.`sku_id`, dt.`quantity`, dt.`date_add`, dt.`inverse`, dt.`ratio_convert`, od.`created_at`
							FROM $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt
							LEFT JOIN $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od ON od.`id` = dt.`order_id`
							WHERE (od.`order_type` = '0' or od.`order_type` = '1' ) AND `od`.`status` = '1'
							";
		}

		//Tạo SQL union all table tổng xuất trong kỳ
		$union_from = $from;
		$union_to = time();
		$sqlXuatKy = "SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
					FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
					INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
					WHERE od.`status_booking` = 0 AND od.`printed` = '1' AND od.`status` = '1' AND '$from' <= od.`created_at` AND od.`created_at` < '$to'
					GROUP BY dt.`product_id`, dt.`sku_id` "; //Loại các record trước from

		while (date('Y', $union_from) != date('Y', $union_to)) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlXuatKy .= "UNION ALL
							SELECT dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) xuat_trong_ky
							FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
							INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
							WHERE od.`status_booking` = 0 AND od.`printed` = '1' AND od.`status` = '1' AND '$from' <= od.`created_at` AND od.`created_at` < '$to'
							GROUP BY dt.`product_id`, dt.`sku_id`
							";
		}


		/**
		 * Tất cả giá trị được trả về đơn vị nhập
		 * Do mỗi khi xuất thì số lượng đầu kỳ đã bị trừ do đó, số lượng cuối kỳ không cần trừ số lượng đầu kỳ
		 * CÔNG THỨC TÍNH: tồn đầu kỳ: Số hiện tại trong kho + Số lượng nếu không tính nhập tại thời điểm from (neu_khong_xuat) - Số lượng nhập từ thời điểm from tới hiện tại
		 * 
		 * 
		 * Ghi chú các lệnh trong JOIN bên dưới SQL
		 * - LEFT JOIN: tong_nhap_tu_from ===>-- Tính tổng số lượng đã nhập từ thời điểm from tới hiện tại
		 * - LEFT JOIN: tong_xuat_tu_from ===>-- Tính tổng số lượng nếu không nhập/xuất tính từ thời điểm From
		 * - LEFT JOIN: nhap_trong_ky ===>-- -- nhập trong kỳ
		 * - LEFT JOIN: xuat_trong_ky ===>-- -- xuat trong kỳ
		 * 
		 */
		$sql = "SELECT COUNT(*) total_record, SUM(`cuoi_ky`) `total_quantity`, SUM((`cuoi_ky`*`root_price`)) `total_value`
				FROM (
					SELECT *, (dau_ky +  nhap_trong_ky  - xuat_trong_ky) cuoi_ky
					FROM (
							SELECT CONCAT(pro.`name`, ' ', SKU.`name`) product_name, SKU.`code` sku_code, pro.`unit_import`, pro.`unit_export` , pro.`ratio_convert`, IFNULL(proComParent.`name`, '') pro_parent_name, IFNULL(proCom.`name`, '') pro_com_name, pro.`web_id`, pro.`img_1` `image` 
									,pro.`id` product_id, SKU.`unique_id`, SKU.`id` sku_id
									
									, ( IFNULL(SKU.`on_stock`, 0)
									+ IFNULL( tbKhongXuat.`tong_xuat_tu_from`, 0)
									- IFNULL( tbTongNhapToiHienTai.`tong_nhap_tu_from`, 0) )
									dau_ky
									,IFNULL( tbKhongXuat.`tong_xuat_tu_from`, 0) tong_xuat_tu_from
									,IFNULL( tbTongNhapToiHienTai.`tong_nhap_tu_from`, 0) tong_nhap_tu_from
									, IFNULL( tbNhap.`nhap_trong_ky`, 0) nhap_trong_ky
									, IFNULL( tbXuat.`xuat_trong_ky`, 0) xuat_trong_ky
									, IFNULL(SKU.`on_stock`, 0) on_stock
									, pro.`allow_root_price`, pro.`root_price`
									, pro.`price`

							FROM $db_name`product` as pro
							INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) tong_nhap_tu_from
									FROM $db_name`warehouse_history` whi
									LEFT JOIN $db_name`warehouse_import` wim ON whi.`wh_import_id` = wim.`id`
									LEFT JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE  '$from' <= wim.`import_date` AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbTongNhapToiHienTai ON tbTongNhapToiHienTai.`product_id` = SKU.`product_id` AND tbTongNhapToiHienTai.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT nUni.`product_id`, nUni.`sku_id`, SUM( IF(nUni.`inverse` = 1, nUni.`quantity`/nUni.`ratio_convert`, nUni.`quantity` ) ) tong_xuat_tu_from
									FROM (
										$sqlUnion
									) nUni
									WHERE '$from' <= nUni.`created_at`
									GROUP BY nUni.`product_id`, nUni.`sku_id`
							) tbKhongXuat ON tbKhongXuat.`product_id` = SKU.`product_id` AND tbKhongXuat.`sku_id` = SKU.`id`
							LEFT JOIN (
									SELECT whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) nhap_trong_ky
									FROM $db_name`warehouse_import` wim
									INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
									INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
									WHERE $from <= wim.`import_date` AND wim.`import_date` < '$to' AND wim.`confirmed_by` > 0
									GROUP BY whi.`product_id`, whi.`sku_id`
							) tbNhap ON tbNhap.`product_id` = SKU.`product_id` AND tbNhap.`sku_id` = SKU.`id`
							LEFT JOIN (

								SELECT nUni.`product_id`, nUni.`sku_id`, SUM( `xuat_trong_ky` ) xuat_trong_ky
								FROM (

									$sqlXuatKy

								) nUni
								GROUP BY nUni.`product_id`, nUni.`sku_id`

							) tbXuat ON tbXuat.`product_id` = SKU.`product_id` AND tbXuat.`sku_id` = SKU.`id`
							LEFT JOIN $db_name`product_commission` proCom ON proCom.`id` = pro.`product_commission_id`
							LEFT JOIN $db_name`product_commission` proComParent ON proCom.`parent_id` = proComParent.`id`
							WHERE
							pro.`deleted`       = '0'
							AND SKU.`deleted`   = '0'
							AND pro.`shop_id`   = '$shop_id'
							$keyword
							$sqlCat
					) nTB
				) nTB
				";

		$r     = $db->executeQuery($sql, 1);
		
		return array(
				'total_record' => isset($r['total_record']) ? $r['total_record']:0,
				'total_quantity' => isset($r['total_quantity']) ? $r['total_quantity']:0,
				'total_value' => isset($r['total_value']) ? $r['total_value']:0,
		);
	}


	//Danh cho API cho app
	public function inventory_period_info( $keyword ) 
	//Không có from to: vì list all sản phẩm, chỉ from to trên dữ liệu nhập xuất
	{
		global $db; //Search toàn bộ sản phẩm

		$db_name = $db->tbl_fix;

		$shop_id  = $this->get('shop_id');

		$sqlShop = '';
		if ($shop_id != '') {
			$lShop = explode(';', $shop_id);
			foreach ($lShop as $sS) {
				if ($sS != '')
					$sqlShop .= " `pro`.shop_id = '$sS' OR";
			}
			if ($sqlShop != '')
				$sqlShop = 'AND (' . substr($sqlShop, 0, -2) . ')';
		}
		
		$cat_id  = $this->get('cat_id');
		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";


		$sql = "SELECT COUNT(*) total_record, SUM(SKU.`on_stock`) total_quantity, SUM(SKU.`on_stock`* IF(pro.`allow_root_price` = 1, pro.`root_price`, pro.`price`) ) total_value
				FROM $db_name`product` pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                $sqlShop
                $keyword
				$sqlCat";

		$r     = $db->executeQuery($sql, 1);

		return array(
				'total_record' => isset($r['total_record']) ? $r['total_record']:0,
				'total_quantity' => isset($r['total_quantity']) ? $r['total_quantity']:0,
				'total_value' => isset($r['total_value']) ? $r['total_value']:0,
		);
	}

	public function inventory_period_count($keyword) //Không có from to: vì list all sản phẩm, chỉ from to trên dữ liệu nhập xuất
	{
		global $db; //Search toàn bộ sản phẩm

		$db_name = $db->tbl_fix;

		$shop_id  = $this->get('shop_id');
		$sqlShop = '';
		if ($shop_id != '') {
			$lShop = explode(';', $shop_id);
			foreach ($lShop as $sS) {
				if ($sS != '')
					$sqlShop .= " `pro`.shop_id = '$sS' OR";
			}
			if ($sqlShop != '')
				$sqlShop = 'AND (' . substr($sqlShop, 0, -2) . ')';
		}

		$cat_id  = $this->get('cat_id');
		$sqlCat = '';
		if ($cat_id != '') {
			$lCat = explode(';', $cat_id);
			foreach ($lCat as $scat) {
				if ($scat != '')
					$sqlCat .= " `pro`.cat_id = '$scat' OR";
			}
			if ($sqlCat != '') {
				$sqlCat = 'AND (' . substr($sqlCat, 0, -2) . ')';
			}
		}

		if ($keyword != '')
			$keyword = "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";


		$sql = "SELECT COUNT(*) total
				FROM $db_name`product` pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                $sqlShop
                $keyword
				$sqlCat";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	//HC: 210604
	public function inventory_history($keyword, $from, $to, $offset = 0, $limit = '')//Lịch sử xuất nhập kho của sản phẩm này
	{
		global $db, $db_store, $setup;
		
		$db_name 		= $db->tbl_fix;
		$db_name_store 	= $db_store->tbl_fix;

		$shop_id  		= $this->get('shop_id');
		$product_id  	= $this->get('product_id');
		$sku_id  		= $this->get('sku_id');

		if ($keyword != '' )
			$keyword = "AND ( nTB0.`code` LIKE '%$keyword%' 
								OR nTB0.`name` LIKE '%$keyword%'
								OR nTB0.`mobile` LIKE '%$keyword%'
								OR nTB0.`note` LIKE '%$keyword%'
							)";
		
		$sqlPeriod = '';
		if( $from < $to && $from > 0 ){
			$sqlPeriod = "AND '$from' < nTB0.`created_at` AND nTB0.`created_at` < '$to'";
		}

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		//Tạo SQL union all table tổng xuất: type = loại đơn xuất = -1
		$union_from = $setup['begin_time'];
		$sqlXuatKy 	= "SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to
						, od.`id_customer` client_id
						, IF( od.`is_internal` = 0, od.`name_customer`, IFNULL(shop.`name`, '') ) name
						, IF( od.`is_internal` = 0, od.`mobile_customer`, IFNULL(shop.`mobile`, '')) mobile
						, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity,  dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`created_at`, pro.`unit_import`, pro.`unit_export`, od.`note`
						FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
						INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
						LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
						LEFT JOIN $db_name`shop` shop ON shop.`id` = pro.`shop_id`
						WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
						AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
						AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
						GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`
						"; //Loại các record trước from
		
		while (date('Y', $union_from) != date('Y') ) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlXuatKy .= "UNION ALL
							SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to
							, od.`id_customer` client_id
							, IF( od.`is_internal` = 0, od.`name_customer`, IFNULL(shop.`name`, '') ) name
							, IF( od.`is_internal` = 0, od.`mobile_customer`, IFNULL(shop.`mobile`, '')) mobile
							, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity, dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`created_at`, pro.`unit_import`, pro.`unit_export`, od.`note`
							FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
							INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
							LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
							LEFT JOIN $db_name`shop` shop ON shop.`id` = pro.`shop_id`
							WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
							AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
							AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
							GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`";
		}

		//id; code; is_internal; regard_to; client_id; name; mobile; product_id; sku_id; quantity; type; created_at;
		/**
		 * Đơn vị tính toàn bộ được quy về đơn vị xuất
		 */
		$sql = "SELECT * 
				FROM (
					(
						
						SELECT wim.`id`, wim.`code`, wim.`internal` `is_internal`, wim.`providers_id` `regard_to`
						, IFNULL(pd.`id`, '') client_id
						, IF( `internal` = 0, IFNULL(pd.`name`, ''), IFNULL(shop.`name`, '')) `name`
						, IF( `internal` = 0, IFNULL(pd.`mobile`, ''), IFNULL(shop.`mobile`, '')) mobile
						, whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) quantity, whi.`price`, IF(whi.`id` = -1, 1, 1) `type`, wim.`created_date` created_at, pro.`unit_import`, pro.`unit_export`, wim.`note`
						FROM $db_name`warehouse_import` wim
						INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
						INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
						LEFT JOIN $db_name_store`providers` pd ON pd.`id` = wim.`providers_id`
						LEFT JOIN $db_name`shop` shop ON shop.`id` = wim.`providers_id`
						WHERE wim.`confirmed_by` > 0 AND wim.`status` = 1
						AND whi.`product_id` = '$product_id' AND whi.`sku_id` = '$sku_id'
						GROUP BY whi.`product_id`, whi.`sku_id`, whi.`wh_import_id`

					)
					UNION ALL
						$sqlXuatKy
				) nTB0
				WHERE 1
				$keyword
				$sqlPeriod
				ORDER BY nTB0.`created_at` DESC
				$limit
				";

		$r     = $db->executeQuery_list($sql);

		return $r;
	}

	//HC: 210604
	public function inventory_history_info($keyword, $from, $to )//Lịch sử xuất nhập kho của sản phẩm này: info
	{
		global $db, $db_store, $setup;
		
		$db_name 		= $db->tbl_fix;
		$db_name_store 	= $db_store->tbl_fix;

		$shop_id  		= $this->get('shop_id');
		$product_id  	= $this->get('product_id');
		$sku_id  		= $this->get('sku_id');
		
		if ($keyword != '')
			$keyword = "AND ( nTB0.`code` LIKE '%$keyword%' 
								OR nTB0.`name` LIKE '%$keyword%'
								OR nTB0.`mobile` LIKE '%$keyword%'
								OR nTB0.`note` LIKE '%$keyword%'
							)";
		$sqlPeriod = '';
		if( $from < $to && $from > 0 ){
			$sqlPeriod = "AND '$from' < nTB0.`created_at` AND nTB0.`created_at` < '$to'";
		}
		//Tạo SQL union all table tổng xuất: type = loại đơn xuất = -1
		$union_from = $setup['begin_time'];
		$sqlXuatKy 	= "SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to, od.`id_customer` client_id, od.`name_customer` `name`, od.`mobile_customer`, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity,  dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`note`, od.`created_at`
						FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
						INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
						LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
						WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
						AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
						AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
						GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`
						"; //Loại các record trước from
		
		while (date('Y', $union_from) != date('Y') ) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlXuatKy .= "UNION ALL
							SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to, od.`id_customer` client_id, od.`name_customer` `name`, od.`mobile_customer`, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity,  dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`note`, od.`created_at`
							FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
							INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
							LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
							WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
							AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
							AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
							GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`";
		}

		//id; code; is_internal; regard_to; client_id; name; mobile; product_id; sku_id; quantity; type; created_at;
		/**
		 * Đơn vị tính toàn bộ được quy về đơn vị xuất
		 */
		$sql = "SELECT COUNT(*) total_record
					, SUM(IF(`type` = 1, `quantity`, 0)) total_quantity_in, SUM(IF(`type` = -1, `quantity`, 0)) total_quantity_out
					, SUM(IF(`type` = 1, `quantity`*`price`, 0)) total_value_in, SUM(IF(`type` = -1, `quantity`*`price`, 0)) total_value_out
				FROM (
					(
							SELECT wim.`id`, wim.`code`, wim.`internal` `is_internal`, wim.`providers_id` `regard_to`, IFNULL(pd.`id`, '') client_id, IFNULL(pd.`name`, '') `name`, IFNULL(pd.`mobile`, '') mobile, whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) quantity, whi.`price`, IF(whi.`id` = -1, 1, 1) `type`, wim.`note`, wim.`created_date` created_at
							FROM $db_name`warehouse_import` wim
							INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
							INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
							LEFT JOIN $db_name_store`providers` pd ON pd.`id` = wim.`providers_id`
							WHERE wim.`confirmed_by` > 0 AND wim.`status` = 1
							AND whi.`product_id` = '$product_id' AND whi.`sku_id` = '$sku_id'
							GROUP BY whi.`product_id`, whi.`sku_id`, whi.`wh_import_id`
					)
					UNION ALL
						$sqlXuatKy
				) nTB0
				WHERE 1
				$keyword
				$sqlPeriod
				";

		$r     = $db->executeQuery($sql, 1);
		
		return array(
				'total_record' => isset($r['total_record']) ? $r['total_record']:0,
				'total_quantity_in' => isset($r['total_quantity_in']) ? $r['total_quantity_in']:0,
				'total_quantity_out' => isset($r['total_quantity_out']) ? $r['total_quantity_out']:0,
				'total_value_in' => isset($r['total_value_in']) ? $r['total_value_in']:0,
				'total_value_out' => isset($r['total_value_out']) ? $r['total_value_out']:0,
		);

	}
	
	//HC: 210604 => lấy số lượng trước của cái dòng này: để cộng số lượng hiện có cho số này => số cần trừ hoặc cộng khi show
	public function inventory_history_quantity_before( $keyword, $from, $to, $limitX )//Lịch sử xuất nhập kho của sản phẩm này: info
	{
		global $db, $db_store, $setup;
		
		$db_name 		= $db->tbl_fix;
		$db_name_store 	= $db_store->tbl_fix;

		$shop_id  		= $this->get('shop_id');
		$product_id  	= $this->get('product_id');
		$sku_id  		= $this->get('sku_id');

		if ($keyword != '' )
			$keyword = "AND ( nTB0.`code` LIKE '%$keyword%' 
								OR nTB0.`name` LIKE '%$keyword%'
								OR nTB0.`mobile` LIKE '%$keyword%'
								OR nTB0.`note` LIKE '%$keyword%'
							)";
		
		$sqlPeriod = '';
		if( $from < $to && $from > 0 ){
			$sqlPeriod = "AND '$from' < nTB0.`created_at` AND nTB0.`created_at` < '$to'";
		}

		$limit = "LIMIT 0, $limitX ";

		//Tạo SQL union all table tổng xuất: type = loại đơn xuất = -1
		$union_from = $setup['begin_time'];
		$sqlXuatKy 	= "SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to
						, od.`id_customer` client_id
						, IF( od.`is_internal` = 0, od.`name_customer`, IFNULL(shop.`name`, '') ) name
						, IF( od.`is_internal` = 0, od.`mobile_customer`, IFNULL(shop.`mobile`, '')) mobile
						, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity,  dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`created_at`, pro.`unit_import`, pro.`unit_export`, od.`note`
						FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
						INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
						LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
						LEFT JOIN $db_name`shop` shop ON shop.`id` = pro.`shop_id`
						WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
						AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
						AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
						GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`
						"; //Loại các record trước from
		
		while (date('Y', $union_from) != date('Y') ) {
			$union_from = strtotime('01/01/' . (date('Y', $union_from) + 1)); //năm tiếp theo: ví dụ from là năm 2019 thì cái phải sẽ ra: 01/02/2020
			$sqlXuatKy .= "UNION ALL
							SELECT od.`id`, dt.`order_id` `code`, od.`is_internal`, od.`export_for_wh_id` regard_to
							, od.`id_customer` client_id
							, IF( od.`is_internal` = 0, od.`name_customer`, IFNULL(shop.`name`, '') ) name
							, IF( od.`is_internal` = 0, od.`mobile_customer`, IFNULL(shop.`mobile`, '')) mobile
							, dt.`product_id`, dt.`sku_id`, SUM( IF(dt.`inverse` = 1, dt.`quantity`/dt.`ratio_convert`, dt.`quantity` ) ) quantity, dt.`price`, IF(dt.`sku_id` = -1, -1, -1) `type`, od.`created_at`, pro.`unit_import`, pro.`unit_export`, od.`note`
							FROM $db_name`order_" . $shop_id . "_" . date('Y', $union_from) . "` od
							INNER JOIN $db_name`detail_order_" . $shop_id . "_" . date('Y', $union_from) . "` dt ON od.`id` = dt.`order_id`
							LEFT JOIN $db_name`product` pro ON pro.`id` = dt.`product_id`
							LEFT JOIN $db_name`shop` shop ON shop.`id` = pro.`shop_id`
							WHERE od.`status_booking` = 0 AND od.`printed` = '1' 
							AND od.`status` = '1' AND (od.`order_type` = 0 OR  od.`order_type` = 1)
							AND dt.`product_id` = '$product_id' AND dt.`sku_id` = '$sku_id'
							GROUP BY dt.`product_id`, dt.`sku_id`, dt.`order_id`";
		}

		//id; code; is_internal; regard_to; client_id; name; mobile; product_id; sku_id; quantity; type; created_at;
		/**
		 * Đơn vị tính toàn bộ được quy về đơn vị xuất
		 */
		$sql = "SELECT SUM( IF(`type` = 1, -1*`quantity`, `quantity` ) ) total 
				FROM(
					SELECT *
					FROM (
						(
							
							SELECT wim.`id`, wim.`code`, wim.`internal` `is_internal`, wim.`providers_id` `regard_to`
							, IFNULL(pd.`id`, '') client_id
							, IF( `internal` = 0, IFNULL(pd.`name`, ''), IFNULL(shop.`name`, '')) `name`
							, IF( `internal` = 0, IFNULL(pd.`mobile`, ''), IFNULL(shop.`mobile`, '')) mobile
							, whi.`product_id`, whi.`sku_id`, SUM( IF( whi.`inverse` = 0, whi.`amount`, (whi.`amount`)/pro.`ratio_convert` ) ) quantity, whi.`price`, IF(whi.`id` = -1, 1, 1) `type`, wim.`created_date` created_at, pro.`unit_import`, pro.`unit_export`, wim.`note`
							FROM $db_name`warehouse_import` wim
							INNER JOIN $db_name`warehouse_history` whi ON whi.`wh_import_id` = wim.`id`
							INNER JOIN $db_name`product` pro ON whi.`product_id` = pro.`id`
							LEFT JOIN $db_name_store`providers` pd ON pd.`id` = wim.`providers_id`
							LEFT JOIN $db_name`shop` shop ON shop.`id` = wim.`providers_id`
							WHERE wim.`confirmed_by` > 0 AND wim.`status` = 1
							AND whi.`product_id` = '$product_id' AND whi.`sku_id` = '$sku_id'
							GROUP BY whi.`product_id`, whi.`sku_id`, whi.`wh_import_id`

						)
						UNION ALL
							$sqlXuatKy
					) nTB0
					WHERE 1
					$keyword
					$sqlPeriod
					ORDER BY nTB0.`created_at` DESC
					$limit
				) a
				";

		$r     = $db->executeQuery($sql, 1);

		return isset($r['total']) ? $r['total']:0;
	}


	// Danh sách sản phẩm theo category limit 0,8 phần danh mục
	public function list_by_category($member_group_id = '')
	{
		global $db, $product_commission, $product_commission_detail;

		$cat_id = $this->get('cat_id');

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
		pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, 
		pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
		pro.`sum_stock`, pro.`description`,
		SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
		IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
		FROM `product` as pro
		INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
		WHERE pro.`cat_id`	= '$cat_id' 
		AND pro.`deleted`   = '0'
        AND SKU.`deleted`   = '0'
        AND pro.`hidden`   	= '0'
		AND (pro.`hidden`=0 OR pro.`hidden`=1) ORDER BY pro.`name` ASC LIMIT 0,8";

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$row['decrement'] = 0;
			if ($member_group_id != '' && $member_group_id > 0) {
				$product_commission_detail->set('member_group_id', $member_group_id);
				$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
				$dPCom = $product_commission_detail->get_detail_record();
				if (isset($dPCom['value'])) {
					$row['decrement'] = $dPCom['value'];
				}
			}

			$product_commission->set('id', $row['product_commission_id']);
			$row['cashback_percent'] = $product_commission->get_cashback_percent();
			$kq[] = $row;
		}

		return $kq;
	}

	// Danh sách sản phẩm theo category limit 0,8 phần danh mục
	public function list_by_defined($lDefined, $member_group_id = '')
	{
		global $db, $product_commission, $product_commission_detail;


		$sqlDe = '';
		$lDe = explode(';', $lDefined);

		foreach ($lDe as $itm) {
			if ($itm != '') {
				$sqlDe .= " pro.`id` = '$itm' OR ";
			}
		}

		$kq = array();
		if ($sqlDe != '') {

			$sqlDe = " (" . substr($sqlDe, 0, -3) . ")";


			$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
			pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, 
			pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
			pro.`sum_stock`, pro.`description`,
			SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
			IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
			FROM `product` as pro
			INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
			WHERE $sqlDe
			AND pro.`deleted`   = '0'
			AND SKU.`deleted`   = '0'
			AND pro.`hidden`   	= '0'
			ORDER BY pro.`name` ASC LIMIT 0,8";

			$result = $db->executeQuery($sql);

			$kq = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$row['decrement'] = 0;
				if ($member_group_id != '' && $member_group_id > 0) {
					$product_commission_detail->set('member_group_id', $member_group_id);
					$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
					$dPCom = $product_commission_detail->get_detail_record();
					if (isset($dPCom['value'])) {
						$row['decrement'] = $dPCom['value'];
					}
				}

				$product_commission->set('id', $row['product_commission_id']);
				$row['cashback_percent'] = $product_commission->get_cashback_percent();
				$kq[] = $row;
			}
		}

		return $kq;
	}

	// Danh sách sản phẩm theo category limit 0,8 phần danh mục
	public function list_defined_product( $lDefined )
	{
		global $db;


		$sqlDe = '';
		$lDe = explode(';', $lDefined);

		foreach ($lDe as $itm) {
			if ($itm != '') {
				$sqlDe .= " pro.`id` = '$itm' OR ";
			}
		}

		$kq = array();
		if ($sqlDe != '') {

			$sqlDe = " (" . substr($sqlDe, 0, -3) . ")";

			$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
			pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, 
			pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
			pro.`sum_stock`, pro.`description`,
			SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
			IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
			FROM `product` as pro
			INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
			WHERE $sqlDe
			AND pro.`deleted`   = '0'
			AND SKU.`deleted`   = '0'";

			$kq = $db->executeQuery_list($sql);

		}

		return $kq;
	}

	// Đếm số lượng sản phẩm theo danh mục
	public function count_by_category($keyword, $shop_id)
	{
		global $db;

		$cat_id  = $this->get('cat_id');
		if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";

		if ($keyword != '')
			$keyword = "AND pro.`name` LIKE '%$keyword%' ";

		$sql = "SELECT COUNT(*) as total FROM " . $db->tbl_fix . "`product` pro 
				INNER JOIN `SKU` ON pro.`id` = SKU.`product_id` WHERE pro.`shop_id` = '$shop_id' $cat_id AND pro.`deleted` = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`hidden`   	= '0' $keyword ";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	// Danh sách sản phẩm theo danh mục
	public function list_product_by_category($keyword, $shop_id, $offset = '', $limit = '')
	{
		global $db;

		$cat_id = $this->get('cat_id');

		if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";

		if ($keyword != '')
			$keyword 		= "AND pro.`name` LIKE '%$keyword%' ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT * FROM " . $db->tbl_fix . "`product` pro WHERE `cat_id`='" . $cat_id . "' AND `shop_id`='" . $shop_id . "' $keyword $limit ";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Đếm số lượng sản phẩm hot
	public function list_product_hot_count($keyword, $shop_id)
	{
		global $db;

		if ($keyword != '')
			$keyword = "AND pro.`name` LIKE '%$keyword%' ";

		$sql = "SELECT COUNT(*) as total FROM " . $db->tbl_fix . "`product` pro WHERE `hot` = '1' AND pro.`img_1` <> '' AND `deleted` = 0 AND `shop_id`   = '$shop_id' $keyword";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	// Danh sách sản phẩm hot
	public function list_product_hot($keyword, $shop_id, $member_group_id, $offset, $limit)
	{
		global $db, $product_commission_detail, $product_commission;
		if ($keyword != '')
			$keyword 		= "AND pro.`name` LIKE '%$keyword%' ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
				pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`point`, pro.`for_point`, 
				pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
				pro.`sum_stock`, pro.`description`,
				SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
				IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
				FROM `product` as pro
				INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
				WHERE pro.`hot`='1' AND pro.`hidden` = 0 AND pro.`img_1` <> '' AND pro.`deleted` = 0 AND pro.`shop_id` = '$shop_id' $keyword $limit ";

		$result     = $db->executeQuery($sql);
		$kq         = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$product_commission_detail->set('member_group_id', $member_group_id);
			$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
			$row['decrement'] = $product_commission_detail->get_commission();

			$product_commission->set('id', $row['product_commission_id']);
			$row['cashback_percent'] = $product_commission->get_cashback_percent();

			$kq[]   = $row;

			unset($row['sku_name']);
			unset($lPrice);
		}
		mysqli_free_result($result);

		return $kq;
	}

	//Đếm tất cả số sản phẩm.
	public function list_all_product_count($keyword, $shop_id)
	{
		global $db;

		$cat_id			= $this->get('cat_id');
		$for_point		= $this->get('for_point');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}

		$sqlCatID = '';
		if ($cat_id > 0) $sqlCatID = "AND pro.`cat_id` = '$cat_id' ";

		if ($keyword != '')
			$keyword = "AND pro.`name` LIKE '%$keyword%' ";

		$sql = "SELECT COUNT(*) as total 
				FROM $db->tbl_fix`product` pro 
				WHERE pro.`deleted` = 0 
				AND pro.`hidden` = 0 
				AND `shop_id` = '$shop_id' 
				$keyword
				$sqlCatID
				$sqlForPoint";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	// Danh sách tất cả sản phẩm
	public function list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit)
	{
		global $db, $main, $product_commission_detail, $product_commission;

		$wallet_cashback = new wallet_cashback();

		$cat_id			= $this->get('cat_id');
		$for_point		= $this->get('for_point');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}
		
		$sqlCatID = '';
		if ($cat_id > 0) $sqlCatID = "AND pro.`cat_id` = '$cat_id' ";

		if ($keyword != '')
			$keyword 		= "AND pro.`name` LIKE '%$keyword%' ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
				pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, pro.`description`,
				pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
				pro.`sum_stock`, pro.`description`, pro.`short_description`, pro.`point`, pro.`for_point`,
				SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
				IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
				FROM $db->tbl_fix`product` as pro
				INNER JOIN `SKU` ON pro.`id` = SKU.`product_id` 
				WHERE pro.`deleted` = 0
				AND pro.`hidden` = 0 
				AND pro.`shop_id` = '$shop_id' 
				$keyword
				$sqlCatID
				$sqlForPoint
				ORDER BY  pro.`priority` DESC, pro.`hot` DESC  
				$limit ";
		$result     = $db->executeQuery($sql);
		$kq         = array();

		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$row = $this->detail_product_general( $row['product_commission_id'], $member_group_id, $row);
			$row['product_link'] = $main->convert_link_url($row['product_name']);

			$kq[]   = $row;

			unset($row['sku_name']);
			unset($lPrice);
		}
		mysqli_free_result($result);

		return $kq;
	}

	public function detail_product_general($product_commission_id, $member_group_id, $dProduct ){
		global $db;

		$wallet_cashback 			= new wallet_cashback();
		$product_commission_detail 	= new product_commission_detail();
		$product_price_detail 		= new product_price_detail();

		/**
		 * BEGIN get percent discount/ chiết khấu
		 */
		$product_commission_detail->set('product_commission_id', $product_commission_id);
		$product_commission_detail->set('member_group_id', $member_group_id);
		$dProduct['decrement'] = $product_commission_detail->get_commission();
		/**
		 * END get percent discount/ chiết khấu
		 */

		/**
		 * BEGIN get cashback value
		 */
		$wallet_cashback->set('product_commission_id', $product_commission_id);
		$wallet_cashback->set('member_group_id', $member_group_id);
		$dCashBack = $wallet_cashback->get_detail_record();

		$dProduct['cashback_is_value'] 	= 0;
		$dProduct['cashback_value'] 	= 0;
		if( isset($dCashBack['member_group_id']) ){
			$dProduct['cashback_is_value'] 		= $dCashBack['is_value'];
			$dProduct['cashback_value'] 		= $dCashBack['value'];
			unset($dCashBack);
		}
		/**
		 * END get cashback value
		 */

		//Get price by detail group
		$product_price_detail->set('product_id', isset($dProduct['product_id'])?$dProduct['product_id']:0);
		$product_price_detail->set('unique_id', $dProduct['unique_id']);
		$product_price_detail->set('member_group_id', $member_group_id);
		$dProduct['member_group_price'] = $product_price_detail->get_value();

		//Nhận chiết khấu dựa trên giá lẻ
		$dProduct['commission_coaching'] = $this->cal_commission_coach( $member_group_id, $dProduct['product_commission_id'], $dProduct['price'], 1, 0 );
		
		return $dProduct;
	}

	//Tính hoa hồng nhận của sản phẩm này cho một user => dựa trên giá lẻ, hoặc giá sau chiết khấu (nếu đã xác định)
	public function cal_commission_coach(  $member_group_id, //KPI.
											$product_commission_id, //product.product_commission_id
											$price,//Giá sản phẩm
											$quantity = 1, //Số lượng mặc định là 1 
											$decrement = 0//Chiết khấu nếu có mặc định 0
											 ){

		$commission_group_detail 	= new commission_group_detail();
		$member_group 				= new member_group();
		$KPI 						= new KPI();

		//tính loại hoa hồng được tính: thực thu = real/ tính trên giảm giá = discount/ theo giá lẻ = sale_price
		$type_commission 	= 'sale_price';
		$sum_commission 	= 0;
		
		$member_group->set('id', $member_group_id);
        $dMemberGroup = $member_group->get_detail();
		if( isset($dMemberGroup['id']) ){

			$commission_group_id = $dMemberGroup['commission_group_id'];

			$KPI->set('id', $dMemberGroup['kpi_id']);
            $dKPI = $KPI->get_detail();//lấy nhóm KPI để xác định tính hoa hồng dựa vào: doanh số thực, doanh số giá lẻ hay giá trị giảm giá của sản phẩm
			if( isset($dKPI['id']) && $dKPI['commission_by'] != 2 ){//Có thì tính không thì tính theo mặc định giá bán lẻ
				if( $dKPI['commission_by'] == '0' ){
					$type_commission = 'discount';
				}else if( $dKPI['commission_by'] == '1' ){
					$type_commission = 'discount';
				}
			}

			
			$is_official_member = 1;
			if( $is_official_member == 1 ){
				if( $product_commission_id > 0){

					$commission_group_detail->set('commission_group_id', $commission_group_id);
					$commission_group_detail->set('product_commission_id', $product_commission_id );

					$d = $commission_group_detail->get_by();
					if( isset($d['id']) && $d['value'] > 0 ){

						if(  $d['is_percent'] == 1 ){
							if( $type_commission == 'real' ){
								// Hoa hồng theo doanh thu thực thu
								$sum_commission += ($quantity*$price*(100-$decrement)/100) * $d['value'] /100;
							}else if( $type_commission == 'discount' ){
								// Hoa hồng theo phần giảm giá được
								$sum_commission += ($quantity*$price*($decrement)/100) * $d['value'] /100;
							}else if( $type_commission == 'sale_price' ){
								// Hoa hồng theo phần trăm giá bán lẻ ( chưa trừ chiết khấu )
								$sum_commission += ($quantity*$price) * $d['value'] /100;
							}
						}else{
							$sum_commission += $d['value'];
						}

					}

				}
			}else{
				if( $product_commission_id > 0){

					$commission_group_detail->set('commission_group_id', $commission_group_id);
					$commission_group_detail->set('product_commission_id', $product_commission_id );

					$d = $commission_group_detail->get_by();
					if( isset($d['id']) && $d['value_2'] > 0 ){

						if(  $d['is_percent_2'] == 1 ){
							if( $type_commission == 'real' ){
								// Hoa hồng theo doanh thu thực thu
								$sum_commission += ($quantity*$price*(100-$decrement)/100) * $d['value_2'] /100;
							}else if( $type_commission == 'discount' ){
								// Hoa hồng theo phần giảm giá được
								$sum_commission += ($quantity*$price*($decrement)/100) * $d['value_2'] /100;
							}else if( $type_commission == 'sale_price' ){
								// Hoa hồng theo phần trăm giá bán lẻ ( chưa trừ chiết khấu )
								$sum_commission += ($quantity*$price) * $d['value_2'] /100;
							}
						}else{
							$sum_commission += $d['value_2'];
						}

					}

				}
			}

		}


		return $sum_commission;

	}

	//Đếm tất cả số sản phẩm: theo bảng giá member_group_id nếu có => H: updating 210423
	public function list_product_by_price_of_member_group_count($keyword, $shop_id, $member_group_id)
	{
		global $db;

		$cat_id			= $this->get('cat_id');
		$for_point		= $this->get('for_point');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}
		
		$sqlCatID = '';
		if ($cat_id > 0) {
			$sqlCatID = "AND pro.`cat_id` = '$cat_id' ";
		} else {
			$sqlCatID = "AND pro.`cat_id` != '284' AND pro.`cat_id` != '282' ";
		}

		if ($keyword != '')
			$keyword = "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%')  ";

		$sql = "SELECT COUNT(*) as total 
				FROM $db->tbl_fix`product` pro 
				INNER JOIN `SKU` ON pro.`id` = SKU.`product_id` 
				LEFT JOIN `wallet_cashback` wlc ON wlc.`product_commission_id` = pro.`product_commission_id` AND wlc.`member_group_id` = $member_group_id
				WHERE pro.`deleted` = 0 
				AND pro.`hidden` = 0 
				AND `shop_id` = '$shop_id' 
				$keyword
				$sqlCatID
				$sqlForPoint";
		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	//List sản phẩm: theo bảng giá member_group_id nếu có => H: updating 210423
	public function list_product_by_price_of_member_group($keyword, $shop_id, $member_group_id, $offset, $limit)
	{
		global $db, $product_commission_detail, $product_commission;
		$commission_group_detail 	= new commission_group_detail();
		$member_group 				= new member_group();


		$commission_group_id = 0;
		if( $member_group_id > 0 ){
			$member_group->set('id', $member_group_id);
			$dMemberGroup = $member_group->get_detail();
			if(  isset($dMemberGroup['commission_group_id']) )
				$commission_group_id = $dMemberGroup['commission_group_id'];
		}

		$cat_id			= $this->get('cat_id');
		$for_point		= $this->get('for_point');
		
		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}

		$sqlCatID = '';
		if ($cat_id > 0) {
			$sqlCatID = "AND pro.`cat_id` = '$cat_id' ";
		} else {
			$sqlCatID = "AND pro.`cat_id` != '284' AND pro.`cat_id` != '282' ";
		}

		if ($keyword != '')
			$keyword = "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%')  ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT n.`product_id`, n.`product_name` as product_name, n.`unit_import`, n.`unit_export`, n.`on_sales`,
					   n.`web_id`,
					   n.`unit_import`, n.`ratio_convert`, n.`unit_export`, n.`multi_attribute`, n.`description`,
					   n.`img_1`, n.`img_2`, n.`img_3`, n.`img_4`, n.`img_5`, n.`img_6`,
					   n.`sum_stock`, n.`description`,
					   n.`code`, n.`on_stock`, n.`sku_id` as sku_id, n.`price`, n.`wholesale_price`,
					   IFNULL(n.`sku_name`, '') sku_name, IFNULL(n.`img_1`, '') sku_img_1, n.`unique_id`, n.`product_commission_id`,
					   n.`price_promotion`, n.`price` sku_price,
					   IFNULL(ppd.`value`, 0) price_member_group, n.`value`, n.`is_value` 
					   FROM(
							SELECT  pro.`id` as product_id , pro.`name` as product_name, pro.`on_sales`, pro.`web_id`,
											pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`,
											pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
											pro.`sum_stock`, pro.`description`, pro.`priority`, pro.`hot`,
											SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
											IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`,
											SKU.`price_promotion`, SKU.`price` sku_price, IFNULL(wlc.`value`, 0) `value`, IFNULL(wlc.`is_value`, 0) `is_value`
							FROM $db->tbl_fix`product` as pro
							INNER JOIN $db->tbl_fix`SKU` ON pro.`id` = SKU.`product_id`
							LEFT JOIN `wallet_cashback` wlc ON wlc.`product_commission_id` = pro.`product_commission_id` AND wlc.`member_group_id` = $member_group_id
							WHERE pro.`deleted` = 0
							AND pro.`hidden` = 0
							AND pro.`shop_id` = '$shop_id' 
							$keyword
							$sqlCatID
							$sqlForPoint
				)n
				LEFT JOIN $db->tbl_fix`product_price_detail` ppd ON ppd.`product_id` = n.`product_id` AND ppd.`member_group_id` = '$member_group_id'
				ORDER BY n.`hot` DESC, n.`product_id` DESC
				$limit ";
				
		$result     = $db->executeQuery($sql);
		$kq         = array();

		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['sku_name'] != '')
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$product_commission_detail->set('member_group_id', $member_group_id);
			$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
			$row['decrement'] = $product_commission_detail->get_commission();

			$product_commission->set('id', $row['product_commission_id']);
			$row['cashback_percent'] = $product_commission->get_cashback_percent();


			//Hoa hồng khách hàng hưởng trên sản phẩm cho cấp dưới là cấp mới hay cấp cũ;
			$row['commission_1'] 			= 0;
			$row['commission_1_percent'] 	= 0;
			$row['commission_2']			= 0;
			$row['commission_2_percent'] 	= 0;
			if ( $commission_group_id > 0 && $row['product_commission_id'] > 0) {
				$commission_group_detail->set('commission_group_id', $commission_group_id);
				$commission_group_detail->set('product_commission_id', $row['product_commission_id']);
				$dComGD = $commission_group_detail->get_by();
				if (isset($dComGD['id'])) {
					$row['commission_1'] 			= $dComGD['value'];
					$row['commission_1_percent'] 	= $dComGD['is_percent'];
					$row['commission_2']			= $dComGD['value_2'];
					$row['commission_2_percent'] 	= $dComGD['is_percent_2'];
				}
			}


			$kq[]   = $row;

			unset($row['sku_name']);
			unset($lPrice);
		}
		mysqli_free_result($result);

		return $kq;
	}

	//get detail a voucher product
	public function get_voucher_pro()
	{
		global $db;

		$id = $this->get('id');

		$sql = "SELECT `pro`.*, SKU.`unique_id`
				FROM `product` pro
				INNER JOIN `SKU` ON `SKU`.product_id = pro.`id`
				WHERE pro.`id` = '$id' ";

		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_detail_provou()  //chi tiết sản phẩm voucher
	{
		global $db;

		$id = $this->get('id');

		$db_name = $db->tbl_fix;

		$sql = "SELECT pro.*, SKU.`code` sku_code, SKU.`name` sku_name, SKU.`unique_id`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`  = '0'
                AND pro.`id`   = '$id'
				LIMIT 1";

		$result     = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_detail_product()
	{
		global $db;

		$id = $this->get('id');

		$sql = "SELECT `pro`.*, SKU.`unique_id`
				FROM `product` pro
				INNER JOIN `SKU` ON `SKU`.product_id = pro.`id`
				WHERE pro.`id` = '$id' ";

		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	//lấy chi tiết sản phẩm kèm chi tiết giá (tùngcode-14/04/2021)
	public function get_detail_product_price($member_group_id)
	{
		global $db, $member_group;

		$commission_group_detail  = new commission_group_detail();

		$commission_group_id = 0;
		if( $member_group_id > 0 ){
			$member_group->set('id', $member_group_id);
			$dMemberGroup = $member_group->get_detail();
			if(  isset($dMemberGroup['commission_group_id']) )
				$commission_group_id = $dMemberGroup['commission_group_id'];
		}

		$id = $this->get('id');

		$sql = "SELECT n.`product_id`, n.`product_name` as product_name, n.`unit_import`, n.`unit_export`, n.`on_sales`,
				n.`web_id`,
				n.`unit_import`, n.`ratio_convert`, n.`unit_export`, n.`multi_attribute`, n.`description`,
				n.`img_1`, n.`img_2`, n.`img_3`, n.`img_4`, n.`img_5`, n.`img_6`,
				n.`sum_stock`, n.`description`,
				n.`code`, n.`on_stock`, n.`sku_id` as sku_id, n.`price`, n.`wholesale_price`,
				IFNULL(n.`sku_name`, '') sku_name, IFNULL(n.`img_1`, '') sku_img_1, n.`unique_id`, n.`product_commission_id`,
				n.`price_promotion`, n.`price` sku_price,
				IFNULL(ppd.`value`, 0) price_member_group, n.`value`, n.`is_value` FROM(
					SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`on_sales`, pro.`web_id`,
							pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`,
							pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
							pro.`sum_stock`, pro.`description`, pro.`priority`,
							SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
							IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`,
							SKU.`price_promotion`, SKU.`price` sku_price, IFNULL(wlc.`is_value`, 0) `is_value`, IFNULL(wlc.`value`, 0) `value`
					FROM `product` pro
					INNER JOIN `SKU` ON `SKU`.product_id = pro.`id`
					LEFT JOIN `wallet_cashback` wlc ON wlc.`product_commission_id` = pro.`product_commission_id` AND wlc.`member_group_id` = $member_group_id
					WHERE pro.`id` = '$id'
				)n
				LEFT JOIN $db->tbl_fix`product_price_detail` ppd ON ppd.`product_id` = n.`product_id` AND ppd.`member_group_id` = '$member_group_id'
				";

		$row = $db->executeQuery($sql, 1);

		if( isset($row['product_id']) ){
			$product_price_detail = new product_price_detail();
			$product_price_detail->set('product_id', $row['product_id']);
			$product_price_detail->set('member_group_id', $member_group_id);
			$row['lPrice'] = $product_price_detail->list_price_by_product();

			//Hoa hồng khách hàng hưởng trên sản phẩm cho cấp dưới là cấp mới hay cấp cũ;
			$row['commission_1'] 			= 0;
			$row['commission_1_percent'] 	= 0;
			$row['commission_2']			= 0;
			$row['commission_2_percent'] 	= 0;
			if ( $commission_group_id > 0 && $row['product_commission_id'] > 0) {
				$commission_group_detail->set('commission_group_id', $commission_group_id);
				$commission_group_detail->set('product_commission_id', $row['product_commission_id']);
				$dComGD = $commission_group_detail->get_by();
				if (isset($dComGD['id'])) {
					$row['commission_1'] 			= $dComGD['value'];
					$row['commission_1_percent'] 	= $dComGD['is_percent'];
					$row['commission_2']			= $dComGD['value_2'];
					$row['commission_2_percent'] 	= $dComGD['is_percent_2'];
				}
			}

		}

		return $row;
	}

	// Danh sách sản phẩm theo category limit 0,8 phần danh mục
	public function list_by_cat_dmember($keyword, $lCat, $member_group_id = '', $offset, $limit)
	{
		global $db, $product_commission, $product_commission_detail;

		$sqlDe = '';
		foreach ($lCat as $itm) {
			if ($itm != '') {
				$sqlDe .= " pro.`cat_id` = '" . $itm['id'] . "' OR ";
			}
		}

		if ($keyword != '')
			$keyword 		= "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$kq = array();
		if ($sqlDe != '') {

			$sqlDe = " (" . substr($sqlDe, 0, -3) . ")";

			$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
					pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`, 
					pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
					pro.`sum_stock`, pro.`description`,
					SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
					IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
					FROM `product` as pro
					INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
					WHERE $sqlDe
					$keyword
					AND pro.`for_point` = '0'
					AND pro.`deleted`   = '0'
					AND SKU.`deleted`   = '0'
					AND pro.`hidden`   	= '0'
					ORDER BY pro.`name` ASC
					$limit";

			$result = $db->executeQuery($sql);
			
			while ($row = mysqli_fetch_assoc($result)) {

				$row['decrement'] = 0;
				if ($member_group_id != '' && $member_group_id > 0) {
					$product_commission_detail->set('member_group_id', $member_group_id);
					$product_commission_detail->set('product_commission_id', $row['product_commission_id']);
					$dPCom = $product_commission_detail->get_detail_record();
					if (isset($dPCom['value'])) {
						$row['decrement'] = $dPCom['value'];
					}
				}

				$product_commission->set('id', $row['product_commission_id']);
				$row['cashback_percent'] = $product_commission->get_cashback_percent();
				$kq[] = $row;
			}

		}

		return $kq;
	}

	public function list_by_cat_dmember_count($keyword, $lCat, $member_group_id = '')
	{
		global $db, $product_commission, $product_commission_detail;

		$sqlDe = '';
		foreach ($lCat as $itm) {
			if ($itm != '') {
				$sqlDe .= " pro.`cat_id` = '" . $itm['id'] . "' OR ";
			}
		}

		if ($keyword != '')
			$keyword 		= "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		$kq = array();
		if ($sqlDe != '') {

			$sqlDe = " (" . substr($sqlDe, 0, -3) . ")";

			$sql = "SELECT COUNT(*) `total`
					FROM `product` as pro
					INNER JOIN `SKU` ON pro.`id` = SKU.`product_id`
					WHERE $sqlDe
					$keyword
					AND pro.`for_point` = '0'
					AND pro.`deleted`   = '0'
					AND SKU.`deleted`   = '0'
					AND pro.`hidden`   	= '0'";

			$result = $db->executeQuery($sql, 1);
			
			return $result['total']+0;
		}

		return 0;
	}
}

$product = new product();
