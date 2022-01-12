<?php
$meta_title = '';
$meta_description = '';
$meta_image = '';
if ($act == 'index') {
	$title .= 'Trang sản phẩm';

	$product = new product();

	$cat_id 		= $main->get('cat_id');
	$keyword    	= ''; //$main->get('keyword');
	$page       	= $main->get('page');
	$for_point  	= ''; //$main->get('for_point');
	$shop_id    	= 1;
	$type 			= 'product';
	$referral_by    = $main->get('referral');

	if ($referral_by != '' && !isset($_SESSION['username_client'])) {
		setcookie('referral_by', $referral_by, time() + 640000, '/');
	}

	$member_group_id = 139;

	$theme_cat_id   = $cat_id; //Cat_id lúc này là của theme_category

	$theme          = new theme();
	$theme_product  = new theme_product();
	$theme_category = new theme_category();

	$kq['theme']        = array();
	$kq['category']     = array();

	/**
	 * BEGIN get theme
	 */
	if ($type == '' || $type == 'theme') {
		$theme->set('shop_id', $shop_id);
		$dTheme = $theme->get_activate_theme($member_group_id);
		if (isset($dTheme['id'])) {
			$kq['theme'] = $dTheme['content'];
		}
	}
	/**
	 * END get theme
	 */

	/**
	 * BEGIN get sản phẩm 
	 */

	if ($for_point == 1) {
		$for_point = '1;2'; //Loại sản phẩm 1;2 => = 1 thuộc kho điểm; 2 tất cả kho hàng
	} else {
		$for_point = '0;2'; //Loại sản phẩm 0;2 => = 0 thuộc kho hàng; 2 thuộc 2 kho hàng/ điểm
	}

	$theme_product->set('theme_cat_id', $theme_cat_id);
	$theme_product->set('for_point', $for_point);

	if ($page < 1)  $page = 1;
	$limit          	= 30; //$setup['perpage'];
	$offset         	= ($page - 1) * $limit;
	$paging->limit  	= $limit;
	$paging->page   	= $page;
	$paging->total 		= $theme_product->list_all_product_count($keyword, $shop_id);
	$kq['page_html'] 	= $paging->display('paging_fund');
	$kq['l']         	= $theme_product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit, '');

	/**
	 * END get sản phẩm 
	 */

	/**
	 * BEGIN get detail a theme category => have slide => sub category
	 */
	if ($theme_cat_id > 0) {
		$theme_category->set('id', $theme_cat_id);
		$theme_category->set('hidden', 0);
		$kq['category'] = $theme_category->get_detail_item();
		$meta_title = $kq['category']['name'];
		$meta_description = (isset($setup['meta_description']) && $setup['meta_description'] != '') ? $setup['meta_description'] : 'Danh mục sản phẩm ' . $kq['category']['name'];
		$meta_image = $kq['category']['icon'];
	}else{
		$meta_title = 'Sản phẩm';
		$meta_description = (isset($setup['meta_description']) && $setup['meta_description'] != '') ? $setup['meta_description'] : 'Danh sách sản phẩm';
		$meta_image = (isset($setup['avatar_cover'])&&$setup['avatar_cover']!='')?$setup['avatar_cover']:'';
	}
	/**
	 * BEGIN get detail a theme category => have slide => sub category
	 */

	$st->assign('data', $kq);

	//get danh mục
	$kq_category = array();

	$shop_id        = 1;
	if (isset($dClient['shop_id']) && $dClient['shop_id'] > 1)
		$shop_id = $dClient['shop_id'];

	if (!isset($setup['theme_customize_allowed']) || $setup['theme_customize_allowed'] == 0) {

		$root_cat->set('shop_id', $shop_id);
		// $root_cat->set('id', $setup['cate_voucher_id']); //Lấy danh sách theo list được cài đặt
		$l = $root_cat->list_cate_except_dmember();

		foreach ($l as $key => $item) {
			$obj = json_decode($item['img']);
			$image = $obj[0]->{'banner'};
			// echo $pic;
			$item['icon'] = $image;
			$kq_category[$key] = $item;
			$cat->set('is_hidden', 0);
			$kq_category[$key]['l'] = $cat->listby_type($item['id']);
		}
	} else {

		$theme_category = new theme_category();
		$theme_category->set('is_slide', 0);
		$theme_category->set('shop_id', $shop_id);
		$theme_category->set('hidden', 0);
		$theme_category->set('parent_id', 0);

		$kq_category = $theme_category->filter_category();
	}

	$st->assign('cat', $kq_category);
} else if ($act == 'detail') {
	$title .= 'Chi tiết sản phẩm';

	$unique_id 	= $main->get('id');
	$referral_by    = $main->get('referral');

	if ($referral_by != '' && !isset($_SESSION['username_client'])) {
		setcookie('referral_by', $referral_by, time() + 640000, '/');
	}

	if ($unique_id == '') {
		$main->redirect($link . "/404");
	} else {
		$shop_id        = 1;
		$member_group_id = 139;

		$kq = $product->get_detail_unique_id($unique_id);

		if (!isset($kq['id'])) {
			$main->redirect($link . "/404");
		} else {
			$kq['product_link'] = $main->convert_link_url($kq['name']);
			$kq = $product->detail_product_general($kq['product_commission_id'], $member_group_id, $kq);
			$kq['short_description'] = substr($kq['short_description'], 0, 200) . '...';
			$kq['price_decrement'] = $kq['price'] - ($kq['price'] * $kq['decrement'] / 100);
			$st->assign('data', $kq);
			$meta_title = $kq['name'];
			$meta_description = $kq['short_description'];
			$meta_image = $kq['img_1'];
		}
	}
} else if ($act == 'search') {
	$title .= 'Tìm kiếm sản phẩm';
} else {
	$main->redirect($domain);
}

$st->assign('meta_title', $meta_title);
$st->assign('meta_description', $meta_description);
$st->assign('meta_image', $meta_image);
