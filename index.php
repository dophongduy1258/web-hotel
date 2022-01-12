<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require_once __DIR__.'/#directconfig/config.php';
if( $db_pos == 'admin' ){
	include ('posadmin/index.php');
}else{
	
	$rgStore = $pos_register->get_detail_bystore_name( $db_pos, $_SERVER['SERVER_NAME'] );
	// print_r($rgStore);
	// exit();

	if( isset($rgStore['pos_type']) ){
		
		date_default_timezone_set( $rgStore['time_zone'] );
		$default_time_zone 			= $rgStore['time_zone'];
		
		$db_pos 			= $rgStore['store_name'];
		$domain_http_type 	= $rgStore['domain_http_type'];
		$_SESSION['db_pos'] = $db_pos;

		$globalSetup = $main->globalSetup();				
		if( $rgStore['pos_type'] == 'retail'  ){
			unset($rgStore);
			include ('posretail/index.php');
		}else if( $rgStore['pos_type'] == 'web_erp'  ){
			if(isset($rgStore['db'])&&$rgStore['db']!=''){
				$db_pos = $rgStore['db'];
				if( isset($rgStore['source']) && $rgStore['source'] != '' ){
					include ($rgStore['source'].'/index.php');
				}
			}else{
				$main->alert('Không thể khởi chạy ứng dụng.');
			}
			
		}else{
			$main->alert('Không thể khởi chạy ứng dụng.');
		}

	}else{
		$main->alert('Không thể khởi chạy ứng dụng.');
	}
	@$db_store->close();
	
}