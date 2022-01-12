<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('memory_limit', '128M');
ini_set('display_errors', true);
require_once __DIR__.'/../../#directconfig/config.php';

$db_pos = explode('.', $_SERVER['SERVER_NAME']);
$db_pos = $db_pos['0'];
$rgStore = $pos_register->get_detail_bystore_name( $db_pos );
if( isset($rgStore['pos_type']) ){
	
	date_default_timezone_set( $rgStore['time_zone'] );
	$default_time_zone = $rgStore['time_zone'];
	if($default_time_zone != '' ){
		date_default_timezone_set($default_time_zone);
	}else{
		date_default_timezone_set("Asia/Ho_Chi_minh");
	}
	
	include "../define.php";

	if( isset($_FILES['files']["name"]) ){
		$_FILES['files']["name"] = $_SERVER['REMOTE_ADDR']."-citipos.vn-".time().rand(10,999).".".substr( $_FILES["files"]["name"], -3 );
		$kq = $main->upimg($_FILES['files'],'../../uploads/'.$db_pos.'/', 825);//avatar
		echo '{"files":[{"name":"'.$link.'/uploads/'.$db_pos.'/'.$kq.'","protected":"MB360.vn license"}]}';
	}else{
		echo $_FILES['files']["name"];
	}
	
}else{
	echo "Empty Shop";
}