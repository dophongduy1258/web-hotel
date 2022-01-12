<?php

if ($act == 'index') {
    $title .= 'Trang chủ';

    $page = $main->get('page');
    $keyword    = '';//$main->post('keyword');
    $page       = 1; //$main->post('page');
    $cat_id     = '';//$main->post('cat_id');
    $type       = '';//$main->post('type');
    $for_point  = 0;//$main->post('for_point');

    $shop_id        = 1;
    $member_group_id = 0;
    $kq = array();
    if (isset($dClient['shop_id'])) {
        $shop_id = $dClient['shop_id'];
        $member_group_id = $dClient['member_group_id'];
    }

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
        $limit                  = 20;
        $offset                 = ($page - 1) * $limit;
        $kq['page']             = $page;
        $kq['perpage']          = $limit + 0;
        $kq['total_record']     = $product->list_all_product_count($keyword, $shop_id);
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
        $limit              = 20;
        $offset             = ($page - 1) * $limit;
        $kq['page']         = $page;
        $kq['perpage']      = $limit + 0;
        $kq['total_record'] = $theme_product->list_all_product_count($keyword, $shop_id);
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

    $st->assign('data', $kq);

}else if($act == 'error'){
    $title .= 'Lỗi';

} else {
    $main->redirect($domain);
}

// $st->assign('meta_title', (isset($title)&&$title!='')?$title:'');
$st->assign('meta_title', (isset($setup['meta_title'])&&$setup['meta_title']!='')?$setup['meta_title']:((isset($title)&&$title!='')?$title:''));
$st->assign('meta_description', (isset($setup['meta_description'])&&$setup['meta_description']!='')?$setup['meta_description']:'');
$st->assign('meta_image', (isset($setup['avatar_cover'])&&$setup['avatar_cover']!='')?$setup['avatar_cover']:'');
