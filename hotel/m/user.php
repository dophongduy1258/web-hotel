<?php
$members = new members();

$lPage = array('login', 'sb_login', 'register', 'sb_register', 'forgotpassword');
if (!in_array($act, $lPage) && (!isset($_SESSION["username_client"])  || $_SESSION["username_client"] == '')) {
	$main->redirect("/trang-chu");
	exit();
}

if ($act == 'menu') {
	$title .= 'Menu';
} else if ($act == 'profile') {
	$title .= 'Thông tin cá nhân';
} else if ($act == 'notification') {
	$title .= 'Trung tâm thông báo';
} else if ($act == 'order') {
	$title .= 'Quản lý đơn hàng';
} else if ($act == 'address') {
	$title .= 'Sổ địa chỉ';

	$eco_city       	= new eco_city();
	$st->assign('opt_city', $eco_city->opt_all());
} else if ($act == 'paymentcard') {
	$title .= 'Quản lý ngân hàng';

	$bank_list = new bank_list();
	$l = $bank_list->list_all_item();

	$st->assign('lBank', $l);
} else if ($act == 'wallet') {
	$title .= 'Quản lý ví';

	$wallet_detail 		= new wallet_detail();

	$wallet_detail->set('client_id', $_SESSION["username_client"]);
	$lWallet = $wallet_detail->get_all_wallet_by_client();
	if (isset($lWallet) && $lWallet != '')
		$lWallet = $lWallet;

	$st->assign('lWallet', $lWallet);
	$st->assign('opt_wallet_all', $product_commission->wallet_opt(1));
} else if ($act == 'departmental_roses') {
	$title .= 'Hoa hồng quản lý phòng ban';
} else if ($act == 'departmental_revenue') {
	$title .= 'Doanh thu phòng ban';
} else if ($act == 'training_roses') {
	$title .= 'Hoa hồng huấn luyện';
} else if ($act == 'member') {
	$title .= 'Quản lý đội nhóm';
	
	$st->assign('opt_group', $member_group->opt_all_by_group());
} else if ($act == 'training') {
	$title .= 'Quản lý chứng chỉ';
} else if ($act == 'register') {
	$title .= 'Đăng ký tài khoản';

	$fullname 		= "";
	$email 			= "";
	$mobile 		= "";
	$referral_by	= "";

	$members = new members();

	$user_id = $main->get('user_id');



	if (isset($_SESSION['error'])) {
		unset($_SESSION['error']);
		$register = unserialize($_SESSION['members']);
		$fullname = $register->get("fullname");
		$email = $register->get("email");
		$mobile = $register->get("mobile");
		$referral_by = $register->get("referral_by");
		unset($_SESSION['members']);
	}

	if (isset($_COOKIE['referral_by']) && $_COOKIE['referral_by'] != '') {
		$user_id = $_COOKIE['referral_by'];
		setcookie('referral_by', $user_id, time() + 640000, '/');
		$members->set('user_id', $user_id);
		$dM = $members->get_detail('');
		if (isset($dM['user_id'])) {
			$referral_by = $dM['mobile'];
		}
	} else {
		if (isset($user_id) && $user_id != '') {
			setcookie('referral_by', $user_id, time() + 640000, '/');
			$members->set('user_id', $user_id);
			$dM = $members->get_detail('');
			if (isset($dM['user_id'])) {
				$referral_by = $dM['mobile'];
			}
		}
	}

	$st->assign('referral_by', $referral_by);
	$st->assign('fullname', $fullname);
	$st->assign('email', $email);
	$st->assign('mobile', $mobile);
} else if ($act == 'sb_register') {
	$title .= 'Đăng ký tài khoản';
} else if ($act == 'login') {
	$title .= 'Đăng nhập';
} else if ($act == 'sb_login') {
	$title .= 'Đăng nhập';
} else if ($act == 'forgotpassword') {
	$title .= 'Quên mật khẩu';
} else {
	$main->redirect($domain);
}

if (isset($_SESSION['username_client']) && $_SESSION['username_client'] != '') {
	$members->set('user_id', $_SESSION['username_client']);
	$kq = $members->get_detail();
	$st->assign('dM', $kq);
}

$st->assign('meta_title', (isset($title) && $title != '') ? $title : '');
$st->assign('meta_description', (isset($setup['meta_description']) && $setup['meta_description'] != '') ? $setup['meta_description'] : '');
$st->assign('meta_image', (isset($setup['avatar_cover']) && $setup['avatar_cover'] != '') ? $setup['avatar_cover'] : '');
