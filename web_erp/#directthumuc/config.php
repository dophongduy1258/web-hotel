<?php
/*DB .VN*/
$server_sql = 'localhost';
$user_sql   = 'root';
$pass_sql   = '';
$database   = 'citipos_' . $db_pos . '';

$mapAPIKey                  = 'AIzaSyD3my5aoYPsU6WYsiAfN64wASPQlX_AJ0U';
$global_api_key_intergate   = 'uyJhu-0123Ko-sakk23';

$db = new db();
$db->setUsername($user_sql);
$db->setPassword($pass_sql);
$db->setServer($server_sql);
$db->setDatabase($database);
$db->tbl_fix    = $database . '.';

// //for firebase API
// const DEFAULT_URL 	= 'https://test-local-pos-fnb.firebaseio.com/';
// const DEFAULT_TOKEN = 'rR8EsLBEfkGk2V5hwVdNbXJORBolCWCLUKEJli8d';
// define('DEFAULT_PATH', '/posrt/'.$db_pos);//root for firebase app
//for firebase API
define('DEFAULT_URL', 'https://citiposvn.firebaseio.com/');
define('DEFAULT_TOKEN', 'aDAPMvJi2DH86YQfI0VbUstEQGKsaM4xoRQtgIrV');
define('DEFAULT_PATH', '/posrt/' . $db_pos);

// $link 		= 'https://'.$_SERVER['SERVER_NAME'].'/pos';
// $tpldomain 	= 'https://'.$_SERVER['SERVER_NAME'].'/pos/posretail';
$link         = $domain_http_type . $_SERVER['SERVER_NAME'] . '';
$tpldomain     = $domain_http_type . $_SERVER['SERVER_NAME'] . '/web_erp';
$rewrite_url     = $domain_http_type . $_SERVER['SERVER_NAME'] . '/';

$subdirect     = '/web_erp';
$tpldirect     = __DIR__ . '/../templates/';

// $api = new API();
// $api->apikey = '1234Abcds23';
// $api->store_name = $db_pos;
// $api->server_url = 'https://pay.mb360.vn/phpjquery/a';

// //api to admin
// $api2Admin = new API();
// $api2Admin->apikey = 'adminapikey123';
// $api2Admin->store_name = $db_pos;
// $api2Admin->server_url = 'https://admin.mb360.vn/phpjquery/a';

$setup = $opt->showall();
$st->assign('setup', $setup);
$st->assign('db_pos', $db_pos);

$menu_template = new menu_template();
$st->assign('menu_top', $menu_template->menu_top());
$st->assign('menu_bottom', $menu_template->menu_bottom());
$st->assign('menu_suggest', $menu_template->menu_suggest());

$theme_category = new theme_category();
$theme_category->set('parent_id', 160);
$menu_header = $theme_category->filter_category();
$st->assign('menu_header', $menu_header);

//Khởi tạo FCM keypush
if (!isset($setup['fcm_secrect_key']) || strlen($setup['fcm_secrect_key']) < 10)
    $fcm_secrect_key        = 'AAAAi-LybbI:APA91bEowBBZkA7jsr4mr0O8LCRFh_vLVWV6n6C0ayxZyb8ti3JB5DbTcME8tovsT00EfxwepXIWisXu0nXycvdVZWN5uuNTLMBaAI7sbxAC0JDIFbhmXgFcWDKtLf4HYBnUjkuF2hU_xx';
else
    $fcm_secrect_key        = $setup['fcm_secrect_key'] . 'xx';

//api to online store
// $api2Web 			                = new API();
// $api2Web->apikey 	                = 'NXo5TQ6XOnGEOB8r';
// $api2Web->server_url                = 'http://ecosite.asia/api/citipos/product/push';

$global_apikey_pay_connect          = '1234Abcds23';
$global_apikey_admin_connect        = 'ad2poskey321';
$global_apikey_store_online_connect = '123d4Abcd23c@';
$global_apikey_create_first_store   = '123crtShopFirst2187';
$global_apikey_client               = '2ClientSSPOS2187';
$global_apikey_partner              = 'io12u3oKDKLs912938';
$global_apikey_dmember              = 'io12u3oDmbPOS2187';
$global_apikey_azone                = 'io12u3oAZonePOS2187';
$global_apikey_vmg_integrate        = 'S2u3oKDKLslkj123S2938';
$global_apikey_techecom             = 'ckUKD9283LLSKNK_D2323';
$global_api_key                     = '0123kSKmsdfrtl234sd';
