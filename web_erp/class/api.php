<?php

class api
{

	public $server_url;
	public $apikey;
	public $store_name;

	public function exeAPI($act, $post)
	{

		$api = $this->server_url . '?apikey=' . $this->apikey . '&act=' . $act;

		$ch = curl_init();
		$post['store_name'] = $this->store_name;

		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_CAINFO, "/var/www/mb360.vn/web/permfile/cacert.pem");

		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($ch, CURLOPT_PROXY, '125.212.218.241:80');

		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		// curl_setopt($ch, CURLOPT_CAINFO, "/home/mb360/public_html/mb360.vn/permfile/cacert.pem");

		$kq = curl_exec($ch);

		// print_r($post);
		// $info = curl_getinfo($ch);
		// print_r($info);

		curl_close($ch);
		return $kq;
	}

	public function exeAPI2Store($act, $post)
	{

		$api = $this->server_url . $act . '?apikey=' . $this->apikey;
		$ch = curl_init();
		$post['store_name'] = $this->store_name;
		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_CAINFO, "/var/www/mb360.vn/web/permfile/cacert.pem");

		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($ch, CURLOPT_PROXY, '192.168.30.241:80');

		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		// curl_setopt($ch, CURLOPT_CAINFO, "/home/mb360/public_html/mb360.vn/permfile/cacert.pem");

		$kq = curl_exec($ch);

		// $info = curl_getinfo($ch);
		// 		print_r($info);

		curl_close($ch);
		return $kq;
	}

	public function exeAPI2WebOne($post)
	{
		global $setup;

		if (isset($setup['token_access_pos']) && $setup['token_access_pos'] != '') {

			$dataPOST['api_key'] 	= $this->apikey;
			$dataPOST['token'] 		= base64_decode($setup['token_access_pos']);
			$dataPOST['data'] 		= $post;
			unset($post);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->server_url . '/one');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataPOST));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_CAINFO, '../permfile/cacert.pem');

			$kq = curl_exec($ch);

			// $info = curl_getinfo($ch);
			// print_r($info);
			// print_r(json_encode( $dataPOST ));
			/*
			{
				"status": 200,
				"message": "Thành công",
				"data": {
					"id": 750657,
					"id_on_web": 734017,
					"version": [
						{
							"id": 850657,
							"id_on_web": 46152
						},
						{
							"id": 850658,
							"id_on_web": 46153
						}
					]
				}
			}
			*/
			curl_close($ch);
			return $kq;
		} else {
			return false;
		}
	}

	public function exeAPIEcosite($action_script, $post)
	{
		global $setup;

		$link = 'https://ecosite.vn/api' . $action_script;
		$post['api_key'] = $setup['api_key_ecosite'];
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $link);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		$res = curl_exec($curl);
		curl_close($curl);

		return $res;
	}

	public function exeAPIAnny($link, $post)
	{
		global $setup;


		$fields = json_encode(explode(',', $post['id']));
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://api.ecosite.vn/get-product");
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($fields)));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
		$res = curl_exec($curl);
		curl_close($curl);

		return $res;

		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $link );
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $post ) );
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		// curl_setopt($ch, CURLOPT_CAINFO, '../permfile/cacert.pem');
		// $kq = curl_exec($ch);

		// $info = curl_getinfo($ch);
		// print_r($info);
		// print_r(json_encode( $dataPOST ));
		/*
		{
			"status": 200,
			"message": "Thành công",
			"data": {
				"id": 750657,
				"id_on_web": 734017,
				"version": [
					{
						"id": 850657,
						"id_on_web": 46152
					},
					{
						"id": 850658,
						"id_on_web": 46153
					}
				]
			}
		}
		*/
		curl_close($ch);
		return $kq;
	}

	public function exeAPI2WebListProducts($post)
	{

		global $setup;
		if (isset($setup['token_access_pos']) && $setup['token_access_pos'] != '') {
			$dataPOST['api_key'] 	= $this->apikey;
			$dataPOST['data'] 		= $post;
			$dataPOST['token'] 		= $setup['token_access_pos'];
			unset($post);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->server_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataPOST));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_CAINFO, '../permfile/cacert.pem');

			$kq = curl_exec($ch);

			// $info = curl_getinfo($ch);
			// print_r($info);
			/*
			{
				"status": 200,
				"message": "Thành công",
				"data": {
					"id": 750657,
					"id_on_web": 734017,
					"version": [
						{
							"id": 850657,
							"id_on_web": 46152
						},
						{
							"id": 850658,
							"id_on_web": 46153
						}
					]
				}
			}
			*/

			curl_close($ch);
			return $kq;
		} else {
			return false;
		}
	}

	public function exeAPINapTheDienThoaiV2($phone, $telecom_network, $menh_gia, &$status_code = 200) //api nạp thẻ (tùng code - 29012021)
	{
		global $setup, $main;

		//Phước
		// $APIkey         = '3958469412';
		// $APIsecret     = 'RVBLA758CKBRDAQQCK8YMFTSI X';
		//bigone
		// $apiKey         = '7395657269';
		// $APIsecret     = 'Z0TFM40E92QFGYYBT8FACYBZ0 X';

		$APIkey = '4c05c8e4bc2c01f4fd9d8575360cd714';
		$api_link = 'http://v2.napthedienthoai.vn/api/sendmoney';
		$ch = curl_init();

		// $post['ApiKey']         = $APIkey;
		// $post['APIsecret']      = $APIsecret;

		$post['Type']               = $telecom_network; //VINA : 2, VIETTEL : 3; MOBI: 1;
		$post['Price']             = $menh_gia; //mệnh giá nạp
		$post['SDT']              = $phone; //số điện thoại

		// $post['pass']               = '';//mật khẩu cho mobi trả sau
		// $post['is_top']             = 1;//=1 or 0
		// $post['type_phone']         = $is_hinh_thuc_tra_truoc;//(1 : NẠP TIỀN ĐT TRẢ TRƯỚC, 2 : NẠP CƯỚC TRẢ SAU, 3 : CƯỚC FTTH)
		// if($is_tra_truoc == 2){ 

		// }

		curl_setopt($ch, CURLOPT_URL, $api_link);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_CAINFO, '../permfile/cacert.pem');

		$kq = curl_exec($ch);

		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// print curl_error($ch);
		// $info = curl_getinfo($ch);
		// print_r($info);
		// print_r($kq);

		curl_close($ch);
		return $kq;
	}

	public function exeAPIShip($method_post = 'POST', $router/*Link tail*/, $post_data, &$status_code = 200)
	{
		global $setup;

		if (isset($setup['go_ship_link_API']) && $setup['go_ship_link_API'] != '') {
			$setup['go_ship_link_API'] = $setup['go_ship_link_API'];
		} else {
			$setup['go_ship_link_API'] = '';
		}

		$api = $setup['go_ship_link_API'] . '/' . $router; //$router = api/auth/session

		$ch = curl_init();

		$auth = isset($setup['go_ship_access_token']) && $setup['go_ship_access_token'] != '' ? $setup['go_ship_access_token'] : '';
		$headers[] = 'Accept: application/json';
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: ' . $auth;

		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_TIMEOUT, 4);

		if ($method_post == 'POST') {
			// echo json_encode($post_data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
			curl_setopt($ch, CURLOPT_POST, 1);
		} else if ($method_post == 'PUT') {
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			// curl_setopt($ch, CURLOPT_POST, 1);
			echo json_encode($post_data);
		} else {
			curl_setopt($ch, CURLOPT_POST, 0); //GET
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// curl_setopt($ch, CURLOPT_PROXY, '125.212.218.242:80');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		// curl_setopt($ch, CURLOPT_CAINFO, '../permfile/cacert.pem');

		$kq = curl_exec($ch);

		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// print curl_error($ch);
		// $info = curl_getinfo($ch);
		// print_r($info);
		// print_r($kq);

		curl_close($ch);
		return $kq;
	}

	public function loginGoShip()
	{
		global $setup, $opt;

		$jsonData = array();
		$jsonData['username'] = isset($setup["go_ship_username"]) && $setup["go_ship_username"] != '' ? $setup["go_ship_username"] : '';
		$jsonData['password'] = isset($setup["go_ship_password"]) && $setup["go_ship_password"] != '' ? $setup["go_ship_password"] : '';
		$jsonData['client_id'] = isset($setup["go_ship_client_id"]) && $setup["go_ship_client_id"] != '' ? $setup["go_ship_client_id"] : '';
		$jsonData['client_secret'] = isset($setup["go_ship_client_secret"]) && $setup["go_ship_client_secret"] != '' ? $setup["go_ship_client_secret"] : '';

		$status_code = 403;
		$result = $this->exeAPIShip('POST', 'login', $jsonData, $status_code);

		$result = json_decode($result, true);

		if(isset($result['access_token'])&&$result['access_token']!=''){
			if (isset($setup['go_ship_access_token'])) {
				$opt->setvarname('go_ship_access_token');
				$opt->setvalue($result['token_type'].' '. $result['access_token']);
				$opt->update();
			} else {
				$opt->setvarname('go_ship_access_token');
				$opt->setvalue($result['token_type'].' ' . $result['access_token']);
				$opt->settitle('Access Token GoShip');
				// $opt->settype('0');
				$opt->insert();
			}
		}
		
		return $result;
	}
}
