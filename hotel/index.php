<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

include 'define.php';

$title 	= '';
$m 		= $main->get('m');
$act 	= $main->get('act');

if( $m == '' ){
	$m = 'home';
}
if( $act == '' ){
	$act = 'index';
}

// echo isset($_COOKIE['referral_by'])?$_COOKIE['referral_by']:'';
if(isset($_COOKIE['referral_by']) && $_COOKIE['referral_by']!=''){
	if(!isset($_SESSION['username_client'])){
		setcookie('referral_by', $_COOKIE['referral_by'], time() + 640000, '/');
	}else{
		setcookie('referral_by', $_COOKIE['referral_by'], time() - 3600, '/');
	}
}

// if( !isset($_SESSION['username_client']) || !isset($_SESSION['pass']) ) {

// 	if(isset($_COOKIE['username']) && isset($_COOKIE['pass'])){
// 		$duser = $user->get_detail($_COOKIE['username']);
// 		if( $duser['status'] == 'Active' && $duser['password'] == $_COOKIE['pass'] ){
// 			$_SESSION['username_client'] 	= $duser['username'];
// 			$_SESSION['fullname_client'] 	= $duser['fullname'];
// 			$_SESSION['pass'] 		= $duser['password'];
// 			$_SESSION['shop_id'] 	= $duser['shop_id'];
// 			$_SESSION['gid'] 		= $duser['gid'];
// 			setcookie('username', $_SESSION['username_client'], time() + 640000);
// 			setcookie('pass', $_SESSION['pass'], time() + 640000);
// 			setcookie('temp_area', @$_SESSION['temp_area'], time() + 640000);
// 			setcookie($_SESSION['username_client'].'_security', $duser['security'] , time() + 6400000);
// 		}
// 	}

// }else{
	
// 	if( $m != 'supervisor' && $act != 'index' ){
// 		if( $m != 'user' ){

// 			$permiss = false;
// 			$duser = $user->get_detail( $_SESSION['username_client']);
// 			$str_chk = ':'.$m.$act.':';
// 			if($str_chk == '::'){
// 				$str_chk = ':mainretail:';
// 			}
			
// 			$permiss = strpos($duser['permission'] , $str_chk);
// 			if($duser['gid'] != '-1' && $duser['gid']!='0' && $m != 'training'){
// 				if( $permiss === false || $duser['accessed'] == '' ){//Không có quyền truy cập hoặc chưa được set bất kỳ cửa hàng nào
// 					$main->redirect($link.'/?m=user&act=limited_accessing');
// 					$db->close();
// 					exit();
// 				}
// 			}

// 		}
		
// 		if( !$calendar->login_time(@$_SESSION['username_client']) ){
// 			unset($_SESSION['username_client']);
// 			unset($_SESSION['password_client']);
// 			unset($_SESSION['shop_id']);

// 			$main->alert( $lang['nt_closedShift'] );
// 			$main->redirect($link.'/?m=user&act=login');
// 			$db->close();
// 			exit();
// 		}
// 	}
	
// }

if( isset($setup['lang']) && in_array($setup['lang'],array('vi','en')) ){
	include 'lang/'.$setup['lang'].'/home.php';//load ngôn ngữ lên
	$_SESSION['lang'] = $setup['lang'];
}else{
	$_SESSION['lang'] = 'vi';
	include 'lang/vi/home.php';//load ngôn ngữ lên
}

$stemp = 'm/'.$m.'.php';
$temp = $m . '/' . $act . '.tpl';

include $stemp;


$st->assign('temp', $temp);
$st->assign('m', $m);
$st->assign('act', $act);
$st->assign('session', $_SESSION);

$st->assign('title', $title);
// $st->assign('version','v='.$setup['version'].$globalSetup['version'].time());
$st->assign('version','v='.$setup['version'].time());
$st->assign('url_logo', $setup['logo']);
// echo $tpldomain;
// exit();
$st->assign('domain', $tpldomain);
// $st->assign('db_pos', $db_pos);
$st->assign('link', $link);
$st->assign('subdirect', $subdirect);
$st->assign('rewrite_url', $rewrite_url);

$st->assign('tpldirect', $tpldirect);
$st->assign('lang', $lang);

// get url set meta_url

$uri = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
$domain = $_SERVER['HTTP_HOST'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$meta_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$st->assign('meta_url', $meta_url);
// end get url set meta_url

unset($setup);
unset($lang);

$st->display($tpldirect.'index.tpl');
$db->close();

