<?php

if ($act == 'index') {
	$title .= 'Giỏ hàng';

	$address_book       = new address_book();
    
	if(isset($_SESSION['username_client'])&&$_SESSION['username_client']!=''){
		$address_book->set('client_id', $_SESSION['username_client']);
		$l = $address_book->filter_by_client();
		$st->assign('opt_address', $l);
	}
    
	// $st->assign('opt_city', $showroom->opt_city());

} else if ($act == 'payment') {
	$title .= 'Thanh toán đơn hàng';

	$eco_city       	= new eco_city();

	$referral_by = '';
	if (!isset($_SESSION['username_client'])&&isset($_COOKIE['referral_by'])) {
		$referral_by = $_COOKIE['referral_by'];
	}

	$st->assign('referral_by', $referral_by);
	$st->assign('opt_city', $eco_city->opt_all());
	// $st->assign('opt_city', $showroom->opt_city());

} else {
	$main->redirect($domain);
}

$st->assign('meta_title', (isset($title)&&$title!='')?$title:'');
$st->assign('meta_description', (isset($setup['meta_description'])&&$setup['meta_description']!='')?$setup['meta_description']:'');
$st->assign('meta_image', (isset($setup['avatar_cover'])&&$setup['avatar_cover']!='')?$setup['avatar_cover']:'');