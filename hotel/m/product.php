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

	$shop_id        = 1;
	$member_group_id = isset($_SESSION['member_group_id_client'])?$_SESSION['member_group_id_client']:0;

	$kq = array();
	// if (isset($dClient['shop_id'])) {
	// 	$shop_id = $dClient['shop_id'];
	// 	$member_group_id = $dClient['member_group_id'];
	// }

	if (!isset($setup['theme_customize_allowed']) || $setup['theme_customize_allowed'] == 0) {

		//none theme
		$kq['theme']        = array();
		$kq['category']     = array();

		if ($for_point == 1) {
			$for_point = '1;2';
		} else {
			$for_point = '0;2';
		}

		$product->set('cat_id', $cat_id);
		$product->set('for_point', $for_point);

		if ($page < 1) $page = 1;
		$limit                  = $setup['perpage'];;
		$offset                 = ($page - 1) * $limit;
		$paging->limit      = $limit;
		$paging->page       = $page;
		$kq['page']             = $page;
		$kq['perpage']          = $limit + 0;
		$kq['total_record']     = $product->list_all_product_count($keyword, $shop_id);
		$paging->total			= $kq['total_record'];
		$kq['page_html'] 		= $paging->display('paging_fund');
		$kq['l']                = $product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit, '');
	} else { //Theme theme_customize_allowed = 1 
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
			// $theme->set('shop_id', $shop_id);
			// $dTheme = $theme->get_activate_theme( $member_group_id );
			$theme->set('type', 2);
			$theme->set('shop_id', $shop_id);
			$dTheme = $theme->get_activate_theme($member_group_id, '');

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

		if ($page < 1) $page = 1;
		$limit              = $setup['perpage'];
		$offset             = ($page - 1) * $limit;
		$paging->limit      = $limit;
		$paging->page       = $page;
		$kq['page']         = $page;
		$kq['perpage']      = $limit + 0;
		$kq['total_record'] = $theme_product->list_all_product_count($keyword, $shop_id);
		$paging->total		= $kq['total_record'];
		$kq['page_html'] 	= $paging->display('paging_fund');
		$kq['l']            = $theme_product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit);

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
		}
		/**
		 * BEGIN get detail a theme category => have slide => sub category
		 */
	}
	// print_r($kq);
	// exit();
	$st->assign('data', $kq);
} else if ($act == 'detail') {
	$title .= 'Chi tiết sản phẩm';

	$news             = new news();
	$news_category    = new news_category();

	$unique_id 	= $main->get('id');
	$referral_by    = $main->get('referral');

	if ($referral_by != '' && !isset($_SESSION['username_client'])) {
		setcookie('referral_by', $referral_by, time() + 640000, '/');
	}

	if ($unique_id == '') {
		$main->redirect($link . "/404");
	} else {
		$shop_id        = 1;
		$member_group_id = isset($_SESSION['member_group_id_client'])?$_SESSION['member_group_id_client']:0;

		$kq = $product->get_detail_unique_id($unique_id);

		if (!isset($kq['id'])) {
			$main->redirect($link . "/404");
		} else {
			$kq['product_link'] = $main->convert_link_url($kq['name']);
			$kq['product_name'] = $kq['name'];
			$kq = $product->detail_product_general($kq['product_commission_id'], $member_group_id, $kq);
			$kq['short_description'] = substr($kq['short_description'], 0, 200) . '...';
			$kq['price_decrement'] = $kq['price'] - ($kq['price'] * $kq['decrement'] / 100);
			$st->assign('data', $kq);
			$meta_title = $kq['name'];
			$meta_description = $kq['short_description'];
			$meta_image = $kq['img_1'];

			if ($kq['hidden'] > 0) {
				$main->redirect($link . "/404");
			}

			$for_point = 0;

			if ($for_point == 1) {
				$for_point = '1;2'; //Loại sản phẩm 1;2 => = 1 thuộc kho điểm; 2 tất cả kho hàng
			} else {
				$for_point = '0;2'; //Loại sản phẩm 0;2 => = 0 thuộc kho hàng; 2 thuộc 2 kho hàng/ điểm
			}

			// print_r($kq);
			// exit();

			$product = new product();

			$product->set('for_point', $for_point);
			$product->set('cat_id', $kq['cat_id']);
			$lSuggest = $product->list_all_product('', 1, 0, 0, 20);
			$st->assign('lSuggest', $lSuggest);

			$lOnSales = $product->list_all_product_on_sales('', 1, 0, 0, 20);
			$st->assign('lOnSales', $lOnSales);

			// print_r($lOnSales);
			// exit();
			$lCat = $news_category->get_category();
			$st->assign('lCat', $lCat);
			$lNews    = $news->filter_by_type('', 1, 0, 10);
			$st->assign('lNews', $lNews);
			$link_ios = isset($setup['link_app_ios']) && $setup['link_app_ios'] != '' ? $setup['link_app_ios'] : '';
			$link_android = isset($setup['link_app_android']) && $setup['link_app_android'] != '' ? $setup['link_app_android'] : '';
			$link_web = $link;
			$link_qrweb = $tpldomain . '/qrcode.php?code=' . $link . '/tai-ung-dung';

			$st->assign('link_ios', $link_ios);
			$st->assign('link_android', $link_android);
			$st->assign('link_web', $link_web);
			$st->assign('link_qrweb', $link_qrweb);
		}
	}
} else if ($act == 'search') {
	$title .= 'Tìm kiếm sản phẩm';

	$product = new product();

	$keyword    	= $main->get('keyword');
	$cat_id 		= $main->get('cat_id');
	$page       	= $main->get('page');
	$for_point  	= ''; //$main->get('for_point');
	$shop_id    	= 1;
	$type 			= 'product';
	$referral_by    = $main->get('referral');

	if ($referral_by != '' && !isset($_SESSION['username_client'])) {
		setcookie('referral_by', $referral_by, time() + 640000, '/');
	}

	$shop_id        = 1;
	$member_group_id = isset($_SESSION['member_group_id_client'])?$_SESSION['member_group_id_client']:0;

	$kq = array();
	// if (isset($dClient['shop_id'])) {
	// 	$shop_id = $dClient['shop_id'];
	// 	$member_group_id = $dClient['member_group_id'];
	// }

	if (!isset($setup['theme_customize_allowed']) || $setup['theme_customize_allowed'] == 0) {

		//none theme
		$kq['theme']        = array();
		$kq['category']     = array();

		if ($for_point == 1) {
			$for_point = '1;2';
		} else {
			$for_point = '0;2';
		}

		$product->set('cat_id', $cat_id);
		$product->set('for_point', $for_point);

		if ($page < 1) $page = 1;
		$limit                  = $setup['perpage'];;
		$offset                 = ($page - 1) * $limit;
		$paging->limit      = $limit;
		$paging->page       = $page;
		$kq['page']             = $page;
		$kq['perpage']          = $limit + 0;
		$kq['total_record']     = $product->list_all_product_count($keyword, $shop_id);
		$paging->total			= $kq['total_record'];
		$kq['page_html'] 		= $paging->display('paging_fund');
		$kq['l']                = $product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit, '');
	} else { //Theme theme_customize_allowed = 1 
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
			// $theme->set('shop_id', $shop_id);
			// $dTheme = $theme->get_activate_theme( $member_group_id );
			$theme->set('type', 2);
			$theme->set('shop_id', $shop_id);
			$dTheme = $theme->get_activate_theme($member_group_id, '');

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

		if ($page < 1) $page = 1;
		$limit              = $setup['perpage'];
		$offset             = ($page - 1) * $limit;
		$paging->limit      = $limit;
		$paging->page       = $page;
		$kq['page']         = $page;
		$kq['perpage']      = $limit + 0;
		$kq['total_record'] = $theme_product->list_all_product_count($keyword, $shop_id);
		$paging->total		= $kq['total_record'];
		$kq['page_html'] 	= $paging->display('paging_fund');
		$kq['l']            = $theme_product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit);

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
		}
		/**
		 * BEGIN get detail a theme category => have slide => sub category
		 */
	}
	// print_r($kq);
	// exit();
	$st->assign('data', $kq);
	$st->assign('keyword', $keyword);
} else {
	$main->redirect($domain);
}

$st->assign('meta_title', $meta_title);
$st->assign('meta_description', $meta_description);
$st->assign('meta_image', $meta_image);
