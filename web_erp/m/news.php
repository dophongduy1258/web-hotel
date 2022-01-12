<?php
$meta_title = '';
$meta_description = '';
$meta_image = '';

if ($act == 'index') {
	$title .= 'Tin tức';

	$news 			= new news();
	$news_category 	= new news_category();

	$cat_id 	= $main->get('id');
	$keyword 	= $main->get('keyword');
	$page 		= $main->get('page');

	if (isset($cat_id) && $cat_id != '') {
		$news_category->set('root_id', $cat_id);
		$cat = $news_category->get_by_root_id();
	} else {
		$cat = $news_category->get_category();
	}
// print_r($cat);
// exit();
	$st->assign('cat', $cat);
	$kq = array();

	$news->set('news_category_id', $cat_id);

	if ($cat_id == '') {
		$kq['category']['name'] = "Tin tức";
	} else {
		$news_category->set('id', $cat_id);
		$dCate = $news_category->get_detail();
		if (isset($dCate['id'])) {
			$kq['category']['name'] = $dCate['name'];
		} else {
			$kq['category']['name'] = "Tin tức";
		}
	}

	if ($page < 1) $page = 1;
	$paging->limit = $limit = $setup['perpage'];
	$offset                 = ($page - 1) * $limit;
	$paging->page 			= $page;
	$kq['page']             = $page;
	$kq['perpage']          = $limit + 0;
	$kq['total_record'] 	= $news->filter_count($keyword);
	$paging->total 			= $kq['total_record'];
	$kq['page_html'] 		= $paging->display('paging_fund');
	$l 						= $news->filter($keyword, $offset, $limit);
	if(isset($l) && COUNT($l)>0){
		foreach ($l as $key => $item) {
			if ($item['link'] != '') {
				$url = $item['link'];
				$query_str = parse_url($url, PHP_URL_QUERY);
				parse_str($query_str, $query_params);
	
				if (isset($query_params['v']) && $query_params['v'] != '') {
					$item['link'] = $query_params['v'];
					$thumbURL = 'http://img.youtube.com/vi/'.$item['link'].'/0.jpg';
					$item['thumbURL'] = $thumbURL;
				} else {
					$url = explode('youtu.be/', $item['link']);
					$item['link'] = $url[1];
					$thumbURL = 'http://img.youtube.com/vi/'.$item['link'].'/0.jpg';
					$item['thumbURL'] = $thumbURL;
				}
			}
			$kq['l'][] = $item;
		}
	}else{
		$kq['l'] = [];
	}
	// print_r($kq);
	// exit();
	$st->assign('data', $kq);
} else if ($act == 'detail') {
	$title .= 'Chi tiết tin tức';

	$news 	= new news();

	$id 	= $main->get('id');

	$news->set('id', $id);
	$kq = $news->get_detail_by_id();

	if (!isset($kq['id'])) {
		$main->redirect($link . "/404");
	} else {

		if ($kq['link'] != '') {
			$url = $kq['link'];
			$query_str = parse_url($url, PHP_URL_QUERY);
			parse_str($query_str, $query_params);

			if (isset($query_params['v']) && $query_params['v'] != '') {
				$kq['link'] = $query_params['v'];
				$thumbURL = 'http://img.youtube.com/vi/' . $kq['link'] . '/0.jpg';
				$kq['thumbURL'] = $thumbURL;
			} else {
				$url = explode('youtu.be/', $kq['link']);
				$kq['link'] = $url[1];
				$thumbURL = 'http://img.youtube.com/vi/' . $kq['link'] . '/0.jpg';
				$kq['thumbURL'] = $thumbURL;
			}
		}

		$st->assign('data', $kq);
		$meta_title = $kq['title'];
		$meta_description = $kq['short_description'];
		$meta_image = $kq['avatar'];

		$type_suggest = 1; //load tin nổi bật
		$suggest = $news->get_news_suggest($type_suggest);
		$st->assign('suggest', $suggest);
	}
} else {
	$main->redirect($domain);
}

$st->assign('meta_title', $meta_title);
$st->assign('meta_description', $meta_description);
$st->assign('meta_image', $meta_image);
