<?php

if ($act == 'index') {
    $title .= 'Trang chủ';

//     $news             = new news();
//     $news_category     = new news_category();

//     $page       = $main->get('page');
//     $keyword    = ''; //$main->post('keyword');
//     $page       = 1; //$main->post('page');
//     $cat_id     = ''; //$main->post('cat_id');
//     $type       = ''; //$main->post('type');
//     $for_point  = 0; //$main->post('for_point');

//     $shop_id        = 1;
//     $member_group_id = isset($_SESSION['member_group_id_client'])?$_SESSION['member_group_id_client']:0;
    
//     $kq = array();
//     // if (isset($dClient['shop_id'])) {
//     //     $shop_id = $dClient['shop_id'];
//     //     $member_group_id = $dClient['member_group_id'];
//     // }
//     if (!isset($setup['theme_customize_allowed']) || $setup['theme_customize_allowed'] == 0) {

//         //none theme
//         $kq['theme']        = array();
//         $kq['category']     = array();

//         if ($for_point == 1) {
//             $for_point = '1;2';
//         } else {
//             $for_point = '0;2';
//         }

//         $product->set('cat_id', $cat_id);
//         $product->set('for_point', $for_point);

//         if ($page < 1) $page = 1;
//         $limit                  = 20;
//         $offset                 = ($page - 1) * $limit;
//         $kq['page']             = $page;
//         $kq['perpage']          = $limit + 0;
//         $kq['total_record']     = $product->list_all_product_count($keyword, $shop_id);
//         $kq['l']                = $product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit, '');
//     } else { //Theme theme_customize_allowed = 1 
//         $theme_cat_id   = $cat_id; //Cat_id lúc này là của theme_category

//         $theme          = new theme();
//         $theme_product  = new theme_product();
//         $theme_category = new theme_category();

//         $kq['theme']        = array();
//         $kq['category']     = array();

//         /**
//          * BEGIN get theme
//          */
//         if ($type == '' || $type == 'theme') {
//             // $theme->set('shop_id', $shop_id);
//             // $dTheme = $theme->get_activate_theme( $member_group_id );
//             // $theme->set('type', 2);
//             // $theme->set('shop_id', $shop_id);
//             // $dTheme = $theme->get_activate_theme($member_group_id, '');

//             $theme->set('id', 5);
//             $dTheme = $theme->get_detail_item($member_group_id);

//             if (isset($dTheme['id'])) {
//                 $kq['theme'] = $dTheme['content'];
//             }
//         }
//         /**
//          * END get theme
//          */

//         /**
//          * BEGIN get sản phẩm 
//          */

//         if ($for_point == 1) {
//             $for_point = '1;2'; //Loại sản phẩm 1;2 => = 1 thuộc kho điểm; 2 tất cả kho hàng
//         } else {
//             $for_point = '0;2'; //Loại sản phẩm 0;2 => = 0 thuộc kho hàng; 2 thuộc 2 kho hàng/ điểm
//         }

//         $theme_product->set('theme_cat_id', $theme_cat_id);
//         $theme_product->set('for_point', $for_point);

//         if ($page < 1) $page = 1;
//         $limit              = 20;
//         $offset             = ($page - 1) * $limit;
//         $kq['page']         = $page;
//         $kq['perpage']      = $limit + 0;
//         $kq['total_record'] = $theme_product->list_all_product_count($keyword, $shop_id);
//         $kq['l']            = $theme_product->list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit);

//         /**
//          * END get sản phẩm 
//          */

//         /**
//          * BEGIN get detail a theme category => have slide => sub category
//          */
//         if ($theme_cat_id > 0) {
//             $theme_category->set('id', $theme_cat_id);
//             $theme_category->set('hidden', 0);
//             $kq['category'] = $theme_category->get_detail_item();
//         }
//         /**
//          * BEGIN get detail a theme category => have slide => sub category
//          */
//     }

//     $kq['slide_top'] = [];
//     $kq['banner_right_slide'] = [];
//     foreach($kq['theme'] as $key => $item){
//         if($item['slide_size']=="big"){
//             for($i = 0; $i<count($item['slide_list'])-2; $i++){
//                 $kq['slide_top'][] = $item['slide_list'][$i];
//             }
//             if(count($item['slide_list'])<3){
//                 $kq['banner_right_slide'] = [];
//             }else{
//                 for($i = count($item['slide_list'])-2; $i<count($item['slide_list']); $i++){
//                     $kq['banner_right_slide'][] = $item['slide_list'][$i];
//                 }
//             }
//         }
//     }
//     // print_r($kq);
//     // exit();
//     $kq['hide_show_all_product_app'] = isset($setup['hide_show_all_product_app']) ? $setup['hide_show_all_product_app'] : 0;
//     $st->assign('data', $kq);

//     $lCat = $news_category->get_category();
//     $st->assign('lCat', $lCat);
//     $lNews    = $news->filter_by_type($keyword, 1, 0, 10);
//     $st->assign('lNews', $lNews);
//     $lVideosBrand = $news->get_news_video_brand(3, 0, 4);
//     $st->assign('lVideosBrand', $lVideosBrand);
//     $link_ios = isset($setup['link_app_ios']) && $setup['link_app_ios'] != '' ? $setup['link_app_ios'] : '';
//     $link_android = isset($setup['link_app_android']) && $setup['link_app_android'] != '' ? $setup['link_app_android'] : '';
//     $link_web = $link;
//     $link_qrweb = $tpldomain . '/qrcode.php?code=' . $link . '/tai-ung-dung';

//     $st->assign('link_ios', $link_ios);
//     $st->assign('link_android', $link_android);
//     $st->assign('link_web', $link_web);
//     $st->assign('link_qrweb', $link_qrweb);
// } else if ($act == 'down_app') {
//     $title .= 'Tải ứng dụng';

//     $link_ios = isset($setup['link_app_ios']) && $setup['link_app_ios'] != '' ? $setup['link_app_ios'] : '';
//     $link_android = isset($setup['link_app_android']) && $setup['link_app_android'] != '' ? $setup['link_app_android'] : '';
//     $link_web = $link;
//     $link_qrweb = $tpldomain . '/qrcode.php?code=' . $link . '/tai-ung-dung';

//     $st->assign('link_ios', $link_ios);
//     $st->assign('link_android', $link_android);
//     $st->assign('link_web', $link_web);
//     $st->assign('link_qrweb', $link_qrweb);

//     $useragent = $_SERVER['HTTP_USER_AGENT'];

//     if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
//         $iPod = stripos($useragent, "iPod");
//         $iPad = stripos($useragent, "iPad");
//         $iPhone = stripos($useragent, "iPhone");
//         $iOS = stripos($useragent, "iOS");
//         $device = ($iPod || $iPad || $iPhone || $iOS);

//         if (!$device) {
//             $main->redirect($link_android);
//         } else {
//             $main->redirect($link_ios);
//         }
//     }
} else if ($act == 'error') {
    $title .= 'Lỗi';
} else {
    $main->redirect($domain);
}

// $st->assign('meta_title', (isset($title)&&$title!='')?$title:'');
// $st->assign('meta_title', (isset($setup['meta_title']) && $setup['meta_title'] != '') ? $setup['meta_title'] : ((isset($title) && $title != '') ? $title : ''));
// $st->assign('meta_description', (isset($setup['meta_description']) && $setup['meta_description'] != '') ? $setup['meta_description'] : '');
// $st->assign('meta_image', (isset($setup['avatar_cover']) && $setup['avatar_cover'] != '') ? $setup['avatar_cover'] : '');
