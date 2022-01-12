<?php
$members = new members();

if ($act == 'profile') {
	$title .= 'Thông tin cá nhân';

	if(isset($_SESSION['username_client'])&&$_SESSION['username_client']!=''){
		$members->set('user_id', $_SESSION['username_client']);
		$kq = $members->get_detail();
		$st->assign('dM', $kq);
	}

} else if ($act == 'notification') {
	$title .= 'Trung tâm thông báo';
} else if ($act == 'order') {
	$title .= 'Quản lý đơn hàng';
} else if ($act == 'address') {
	$title .= 'Sổ địa chỉ';
} else if ($act == 'paymentcard') {
	$title .= 'Quản lý ngân hàng';

	$bank_list = new bank_list();
	$l = $bank_list->list_all_item();

	$st->assign('lBank', $l);

} else if ($act == 'wallet') {
	$title .= 'Quản lý ví';
} else if ($act == 'departmental_roses') {
	$title .= 'Hoa hồng quản lý phòng ban';
} else if ($act == 'departmental_revenue') {
	$title .= 'Doanh thu phòng ban';
} else if ($act == 'training_roses') {
	$title .= 'Hoa hồng huấn luyện';
} else if ($act == 'member') {
	$title .= 'Quản lý đội nhóm';
} else if ($act == 'training') {
	$title .= 'Quản lý chứng chỉ';
} else if ($act == 'register') {
	$title .= 'Đăng ký tài khoản';

	$fullname 	= "";
	$email 		= "";
	$mobile 	= "";

	if (isset($_SESSION['error'])) {
		unset($_SESSION['error']);
		$register = unserialize($_SESSION['members']);
		$fullname = $register->get("fullname");
		$email = $register->get("email");
		$mobile = $register->get("mobile");
		unset($_SESSION['members']);
	}

	$st->assign('fullname', $fullname);
	$st->assign('email', $email);
	$st->assign('mobile', $mobile);
} else if ($act == 'sb_register') {
	$title .= 'Đăng ký tài khoản';

	$fullname 		= $main->post('see_name');
	$email 			= $main->post('see_email');
	$mobile 		= $main->post('see_phone');
	$pass 			= $main->post('form_password');
	$rePass		    = $main->post('form_re_password');
	$referral_by	= $main->post('referral_by');
	$code		    = '';

	$members->set('fullname', $fullname);

	$members->set('email', $email);
	$dClientEmail = $members->get_by_email();

	$members->set('mobile', $mobile);
	$dClientMobile = $members->get_by_mobile();

	$members->set('code', $code);
	$dClientCode = $members->get_detail_by_code();

	if ($email != '' && isset($dClientEmail['user_id'])) {
		$main->alert('Email đã được tồn tại, vui lòng chọn một Email khác.');
	} else if ($fullname == '') {
		$main->alert('Vui lòng nhập họ tên.');
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$main->alert('Email không hợp lệ.');
	} else if ((strlen($mobile) < 10 || strlen($mobile) > 10) || !is_numeric($mobile)) {
		$main->alert('Số điện thoại không hợp lệ.');
	} else if ($mobile != '' && isset($dClientMobile['user_id'])) {
		$main->alert('Số điện thoại đã được tồn tại, vui lòng chọn số điện thoại khác.');
	} else if ($pass == '') {
		$main->alert('Mật khẩu không được bỏ trống.');
	} else if ($rePass != $pass) {
		$main->alert('Xác nhận mật khẩu không khớp.');
	} else {

		$members->set('user_id', '');
		$members->set('is_local_created', 1);
		$members->set('created_by', 1);
		$members->set('fullname', $fullname);
		$members->set('mobile', $mobile);
		$members->set('email', $email);
		$members->set('password', $pass);
		$members->set('referral_by', $referral_by == '' ? $setup['default_referral_by'] : $referral_by);
		$members->set('member_group_id', 139);

		$user_id = $members->add();
		if (isset($user_id) && $user_id != '') {
			$main->alert("Đăng ký thành công");
			$main->redirect('/dang-nhap');
			$db->close();
			exit();
		} else {
			$main->alert("Đăng ký không thành công thành công");
			$main->redirect('/dang-ky');
			$db->close();
			exit();
		}
	}
	$_SESSION['members'] = serialize($members);
	$_SESSION['error'] = "error";
	$main->redirect('/dang-ky');
	$db->close();
	exit();
} else if ($act == 'login') {
	$title .= 'Đăng nhập';
} else if ($act == 'sb_login') {
	$title .= 'Đăng nhập';

	$username 		= $main->post('see_email');
	$password 		= $main->post('form_password');

	if (isset($_SESSION['username_client']) && isset($_SESSION['password_client'])) {

		$members->set('user_id', $_SESSION['username_client']);
		$members->set('password', $_SESSION['password_client']);
		$dClientLogin = $members->check_login();

		if (isset($dClientLogin['username'])) {
			$main->redirect("/trang-chu");
			$db->close();
			exit();
		}
	} else if ($username == '') {
		$main->alert('Vui lòng nhập thông tin đăng nhập.');
		$main->redirect('/dang-nhap');
		$db->close();
		exit();
	} else if ($password == '') {
		$main->alert('Vui lòng nhập mật khẩu.');
		$main->redirect('/dang-nhap');
		$db->close();
		exit();
	}

	$members->set('email', $username);
	$salt = $members->get_salt();
	$pw = md5($password);
	$pw = $pw . $salt;
	$pw = md5($pw);
	$members->set('password', $pw);
	$dClientLogin = $members->check_login();

	if (isset($dClientLogin['user_id']) && $dClientLogin['user_id'] != '') {

		$_SESSION['username_client'] 			= $dClientLogin['user_id'];
		$_SESSION['fullname_client'] 			= $dClientLogin['fullname'];
		$_SESSION['email_client'] 				= $dClientLogin['email'];
		$_SESSION['mobile_client'] 				= $dClientLogin['mobile'];
		$_SESSION['password_client'] 			= $dClientLogin['password'];
		$_SESSION['birthday_client'] 			= $dClientLogin['year'] . '-' . $dClientLogin['month'] . '-' . $dClientLogin['day'];

		setcookie('username', $_SESSION['username_client'], time() + 640000);
		setcookie('password', $_SESSION['password_client'], time() + 640000);
		setcookie('email', $_SESSION['email_client'], time() + 640000);
		setcookie('mobile', $_SESSION['mobile_client'], time() + 640000);

		$main->redirect("/trang-chu");
		exit();
	} else {

		$main->alert("Sai tên đăng nhập hay mật khẩu truy cập");
		$main->redirect("/dang-nhap");
		exit();
	}
} else if ($act == 'forgotpassword') {
	$title .= 'Quên mật khẩu';
} else {
	$main->redirect($domain);
}

$st->assign('meta_title', (isset($title)&&$title!='')?$title:'');
$st->assign('meta_description', (isset($setup['meta_description'])&&$setup['meta_description']!='')?$setup['meta_description']:'');
$st->assign('meta_image', (isset($setup['avatar_cover'])&&$setup['avatar_cover']!='')?$setup['avatar_cover']:'');