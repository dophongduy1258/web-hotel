<?php
// require_once '/home/testm/domains/yoyoshop.net/public_html/include/session.php';
// require_once '/home/testm/domains/yoyoshop.net/public_html/include/global.php';

// require_once '/Applications/XAMPP/xamppfiles/htdocs/posfull/pos/#directconfig/config.php';
require_once __DIR__.'/#directconfig/config.php';

	$main = new main ();
	
	unset($_COOKIE['username']);
	unset($_COOKIE['pass']);
	unset($_COOKIE['temp_area']);
	
	setcookie("username","44", time() - 3600);
	setcookie("pass","44", time() - 3600);
	setcookie("temp_area","44", time() - 3600);
	session_destroy ();
	unset($_SESSION);
	
	$main->redirect ('/?m=user&act=login');
?>