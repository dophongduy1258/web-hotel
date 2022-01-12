<?php
/*
- Nhớ update cho js ở file main_db.js/act/js
*/

require_once __DIR__.'/../include/session.php';
require_once __DIR__.'/../include/db.php';
require_once __DIR__.'/../include/global.php';
require_once __DIR__.'/../include/model.php';
require_once __DIR__.'/../include/pos_register.php';
require_once __DIR__.'/../include/providers.php';
require_once __DIR__.'/../include/shop_order.php';
require_once __DIR__.'/../include/shop_order_detail.php';
require_once __DIR__.'/../include/method_payment.php';
require_once __DIR__.'/../include/bank_list.php';

$db_store = new db ();

//musado.vn
$server_sql             = 'localhost';
$user_sql               = 'root';
$pass_sql               = '';
$database               = 'citipos_store';
$db_retail_refix        = 'citipos_';
$db_cafe_refix          = 'citipos_';

//local
// $server_sql             = 'localhost';
// $user_sql               = 'musadoweb';
// $pass_sql               = 'JLSrDoI4LDouRpbZ';
// $database               = 'musadoweb_store';
// $db_retail_refix        = 'musadoweb_';
// $db_cafe_refix          = 'musadoweb_';

//citipos.vn
// $server_sql             = 'localhost';
// $user_sql               = 'citiposweb';
// $pass_sql               = 'Pp4UCqK8YX4e';
// $database               = 'citipos_store'; 
// $db_retail_refix        = 'citipos_f_';
// $db_cafe_refix          = 'citipos_f_';

$db_store->setServer   ( $server_sql );
$db_store->setUsername ( $user_sql );
$db_store->setPassword ( $pass_sql );
$db_store->setDatabase ( $database );
$db_store->tbl_fix    = $db_store->getDatabase().'.';

$db_pos = explode('.', $_SERVER['SERVER_NAME']);

if( COUNT($db_pos) > 2 )
    $db_pos = $db_pos['0'];    
else
    $db_pos = '';
$domain_http_type = 'http://';


/*
- Nhớ update cho js ở file main_db.js/act/js
*/