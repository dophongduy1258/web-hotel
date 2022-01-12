<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require_once __DIR__.'/../../#directconfig/config.php';

$rgStore = $pos_register->get_detail_bystore_name( $db_pos, $_SERVER['SERVER_NAME'] );
if( !isset($rgStore['pos_type']) || $rgStore['pos_type'] != 'web_erp'){
	exit('You don\'t have permission');
}
$db_pos 			= $rgStore['db'];
$domain_http_type 	= $rgStore['domain_http_type'];
$_SESSION['db_pos'] = $db_pos;

date_default_timezone_set( $rgStore['time_zone'] );
$default_time_zone = $rgStore['time_zone'];//set default time_zone

include '../define.php';

$m 			= $main->get('m');
$act 		= $main->get('act');
$apikey 	= $main->get('apikey');

//switch language
if( isset($_SESSION['lang']) && in_array($_SESSION['lang'],array('vi','en')) ){
	include '../lang/'.$_SESSION['lang'].'/home.php';
}else{
	include '../lang/vi/home.php';
	$_SESSION['lang'] = 'vi';
}

if ($apikey == $global_api_key) {
    if (isset($m['0'])) {

        //kiểm tra ngôn ngữ
        include '../lang/vi/home.php';

        // @$user->set( 'id', $_SESSION['id'] );
        // @$user->set( 'password', $_SESSION['password_client'] );	
        $dUserLogin['gid'] = 1;

        $permiss = -1;
        $permiss = true;

        if (isset($dUserLogin['gid'])) {
            if (($dUserLogin['gid'] == '1' ||  $permiss !== false)) {
                include $m . '.php';
            } else {
                echo 'done##', $main->toJsonData(403, 'Bạn không được phép sử dụng chức năng này.', null);
                $db->close();
                exit();
            }
        } else {
            echo "<b>Chuyển đến trang đăng nhập ...</b>. <script> setTimeout(function(){window.location = '" . $domain . "/logout.php';},2000); </script>";
            $db->close();
            exit();
        }
    } else {
        echo $lang['er_003'] . " - index.ajax.";
        $db->close();
        exit();
    }
} else {
    $db->close();
    exit('Missing apikey request');
}

@$db->close();

if ( !file_exists( __DIR__.'/../../logs/phpjquery' ) )
	@mkdir(__DIR__.'/../../logs/phpjquery', 0777, true);

$filename = __DIR__.'/../../logs/phpjquery/'.$db_pos.'.log.'.date('Y-m-d-H').'.txt';
$strLog = ob_get_contents();
@$main->writeToFile( $filename, ':[GET]:'.json_encode($_GET).':[POST]:'.json_encode($_POST).'[dUser]'.json_encode($dUserLogin).':'.'[dUserClient]'.json_encode($dClientLogin).':\n'.$strLog );
unset( $strLog );
unset( $db_pos );