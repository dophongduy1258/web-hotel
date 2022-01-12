<?php
$nod        = $main->get('nod');

if ($act == 'idx') {
	if ($nod == 'comm_department') {

		$members = new members();

		$field                  	= $main->post('field');
		$sort                   	= $main->post('sort');
		$keyword                    = $main->post('keyword');
		$from                       = $main->post('from');
		$type                    	= $main->post('type');
		$filter_id       			= '';
		$page                       = $main->post('page');
		$month						= '';
		$year						= '';
		$shop_id					= 1;

		$members->set('user_id', $_SESSION['username_client']);
		$dClient = $members->get_detail();

		if (isset($dClient['user_id']) && $dClient['user_id'] != '') {

			if (isset($dClient['shop_id']) && $dClient['shop_id'] > 1)
				$shop_id = $dClient['shop_id'];

			if ($from != '') {
				$from 	= explode('/', $from);
				$month 	= $from[1];
				$year 	= $from[2];
			}

			if ($year == '')    $year   = date('Y');
			if ($month == '') {
				$from     = strtotime("01/01/$year"); //Ngày đầu năm này
				$to       = strtotime(date("12/31/$year")) + 86400; //Ngày cuối năm này
			} else {
				$from     = strtotime("$month/01/$year");
				$to       = strtotime(date("m/t/Y", $from)) + 86400;
			}

			if ($from < $setup['begin_time']) {
				echo 'done##', $main->toJsonData(403, 'Thời gian không hợp lệ.', null);
			} else if ($type != 'comm_department') {
				echo 'done##', $main->toJsonData(403, 'Loại báo cáo không được khai báo.', null);
			} else {

				if ($page < 1) $page = 1;
				$paging->limit = $limit = $setup['perpage'];
				$offset = ($page - 1) * $paging->limit;
				$paging->page = $page;


				$commission_department             = new commission_department();
				$commission_department->set('shop_id', $shop_id);
				$commission_department->set('member_department_id', $filter_id);
				$commission_department->set('client_id', $dClient['user_id']);

				$kq['info']         = $commission_department->client_filter_info_sum($keyword, '', $from - 1, $to);
				$paging->total 		= $kq['info']['total_record'];
				$page_html 			= $paging->display('paging_this');
				$kq['l']            = $commission_department->client_filter($keyword, '', $from - 1, $to, $field, $sort, $offset, $limit);
				$kq['page_html'] 	= $page_html;
				// print_r($kq);
				// exit();
				echo 'done##', $main->toJsonData(200, 'success', $kq);
				unset($kq);
			}
		} else {
			echo 'done##', $main->toJsonData(403, 'Không tìm thấy người dùng', null);
			unset($kq);
		}
	} else {
		echo 'Missing action';
		$db->close();
		exit();
	}
} else {
	echo 'Missing action';
	$db->close();
	exit();
}
