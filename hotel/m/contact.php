<?php

if( $act == 'index' ){
	$title .= 'Liên hệ';
	
}else{
	$main->redirect($domain);
}

$st->assign('meta_title', (isset($title)&&$title!='')?$title:'');
$st->assign('meta_description', (isset($setup['meta_description'])&&$setup['meta_description']!='')?$setup['meta_description']:'');
$st->assign('meta_image', (isset($setup['avatar_cover'])&&$setup['avatar_cover']!='')?$setup['avatar_cover']:'');