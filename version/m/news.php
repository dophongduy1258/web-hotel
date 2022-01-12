<?php

if( $act == 'index' ){
	$title .= 'Tin tức';
}else if( $act == 'detail' ){
	$title .= 'Chi tiết tin tức';
}else{
	$main->redirect($domain);
}