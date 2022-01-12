<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set("Asia/Ho_Chi_minh");
// include "../define.php";
// include "../m/global.php";

require_once __DIR__.'/../../#directconfig/config.php';

$user->setusername($_SESSION["username"]);
$user->setpassword($_SESSION["pass"]);
$check_login = $user->check_login();


if(isset($_FILES['files']["name"])){
	
	if (!file_exists('../../uploads/'.$db_pos.'/kiem_kho/'.$check_login['shop_id'].'/'.date('Y-m-d'))) {
		//tạo thư mục chứa file trên server
		@mkdir('../../uploads/'.$db_pos.'/kiem_kho/'.$check_login['shop_id'].'/'.date('Y-m-d'), 0777, true);
	}
	
	$_FILES['files']["name"] = $_POST['import_code']."-".$_POST['wh_id']."-".$_FILES["files"]["name"];
	$img_name = $main->upfile($_FILES['files'],"../../uploads/".$db_pos."/kiem_kho/".$check_login['shop_id']."/".date('Y-m-d'));
	
	$img_name = "uploads/".$db_pos."/kiem_kho/".$check_login['shop_id']."/".date('Y-m-d')."/".$img_name;
	
	ob_end_clean();
	echo '{"files":[{"name":"'.$link.'/'.$img_name.'","protected":"MB360.vn license"}]}';
	
}else{
	echo $lang['error'];
}