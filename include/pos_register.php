<?php
class pos_register extends model{

	protected $class_name = 'pos_register';
	protected $id;
	protected $customer;
	protected $store_title;
	protected $store_name;
	protected $store_address;
	protected $store_mobile;
	protected $store_email;
	protected $store_phone;
	protected $store_theme;
	protected $store_status;
	protected $pos_type;
	protected $created_at;
	protected $store_id;
	protected $time_zone;
	protected $expire_at;
	protected $note;
	protected $no_shop;
	protected $no_user;
	protected $reseller_id;
	protected $belong_to_reseller;

	protected $domain;//Domain thêm vào
	protected $domain_ip;//ip domain
	protected $source;  //source để chạy erp
	protected $db;//db để chạy web_erp
	protected $domain_http_type;//= 1 https; =0 http

	//Hàm xử lý nhập thông tin đăng kí hệ thống POS
	public function register( $inarrInput ){
		
		global $db_store;
		
		$arr['customer'] = $inarrInput['customer'];
		$arr['store_title'] = $inarrInput['store_title'];
		$arr['store_name'] = $inarrInput['store_name'];
		$arr['store_address'] = $inarrInput['store_address'];
		$arr['store_mobile'] = $inarrInput['store_mobile'];
		$arr['store_phone'] = $inarrInput['store_phone'];
		$arr['store_theme'] = $inarrInput['store_theme'];
		$arr['note'] = $inarrInput['note'];
		$arr['store_email'] = $inarrInput['store_email'];
		$arr['no_shop'] = 1;
		$arr['no_user'] = 2;
		$arr['store_status'] = 1;
		$arr['pos_type'] = $inarrInput['pos_type'];
		$arr['reseller_id'] = $inarrInput['reseller_id'];
		$arr['belong_to_reseller'] = $inarrInput['belong_to_reseller']+0;
		$arr['created_at'] = time();
		$arr['expire_at'] 	= $inarrInput['expire_at'];
		$arr['domain'] 		= '';
		$arr['domain_ip'] 	= '';
		$arr['domain_http_type'] 	= '0';

		$db_store->record_insert( $db_store->tbl_fix."`pos_register`", $arr );

		return $db_store->mysqli_insert_id();
	}
	
	public function update( $store_id, $inarrInput ){
		global $db_store;

		$arr['customer'] 		= $inarrInput['customer'];
		$arr['store_title'] 	= $inarrInput['store_title'];
		$arr['store_address'] 	= $inarrInput['store_address'];
		$arr['store_mobile'] 	= $inarrInput['store_mobile'];
		$arr['store_phone'] 	= $inarrInput['store_phone'];
		$arr['store_theme'] 	= $inarrInput['store_theme'];
		$arr['pos_type'] 		= $inarrInput['pos_type'];
		$arr['store_status'] 	= $inarrInput['store_status'];
		if( isset($inarrInput['expire_at']) )
			$arr['expire_at'] 		= $inarrInput['expire_at'];
		$arr['note'] 			= $inarrInput['note'];
		$arr['store_email'] 	= $inarrInput['store_email'];

		$db_store->record_update( "`pos_register`", $arr, " `id` = '$store_id' " );
		
		return true;
	}

	public function update_info( $store_id, $inarrInput ){
		global $db_store;

		$arr['customer'] 		= $inarrInput['customer'];
		$arr['store_title'] 	= $inarrInput['store_title'];
		$arr['store_address'] 	= $inarrInput['store_address'];
		$arr['store_mobile'] 	= $inarrInput['store_mobile'];
		$arr['store_phone'] 	= $inarrInput['store_phone'];
		$arr['store_theme'] 	= $inarrInput['store_theme'];
		$arr['pos_type'] 		= $inarrInput['pos_type'];
		$arr['store_status'] 	= $inarrInput['store_status'];
		if( isset($inarrInput['expire_at']) )
			$arr['expire_at'] 		= $inarrInput['expire_at'];
		$arr['note'] 			= $inarrInput['note'];
		$arr['store_email'] 	= $inarrInput['store_email'];

		$db_store->record_update( "`pos_register`", $arr, " `id` = '$store_id' " );
		
		return true;
	}
	
	public function update_by_admin( $store_id, $inarrInput ){
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';
		
		$arr['store_title'] 	= $inarrInput['store_title'];
		$arr['store_address'] 	= $inarrInput['store_address'];
		$arr['store_mobile'] 	= $inarrInput['store_mobile'];
		$arr['store_phone'] 	= $inarrInput['store_phone'];
		$arr['store_theme'] 	= $inarrInput['store_theme'];
		if( isset($inarrInput['expire_at']) )
			$arr['expire_at'] 		= $inarrInput['expire_at'];
		$arr['store_status'] 	= $inarrInput['store_status'];

		$db_store->record_update($db_store->tbl_fix."`pos_register`", $arr, " `id` = '$store_id' $belong_to_reseller ");
		unset( $arr );

		return true;
	}

	public function update_expire_at( $store_name, $expire_at ){
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';
		
			$arr['expire_at'] 		= $expire_at;

		$db_store->record_update($db_store->tbl_fix."`pos_register`", $arr, " `store_name` = '$store_name' $belong_to_reseller ");
		unset( $arr );

		return true;
	}

	public function update_no_shop( $store_id, $no_shop ){
		global $db_store;
		
		$arr['no_shop'] = $no_shop;
		$db_store->record_update($db_store->tbl_fix."`pos_register`",$arr, " `id` ='".$store_id."'");

		return true;
	}

	public function update_no_user( $store_id, $no_user ){
		global $db_store;

		$arr['no_user'] = $no_user;
		$db_store->record_update($db_store->tbl_fix."`pos_register`", $arr, " `id` ='".$store_id."'");

		return true;
	}

	public function change_status( $store_id, $active ){ //$active = 1, $active = 0

		global $db_store;

		$arr['store_status'] = $active;
		$db_store->record_update($db_store->tbl_fix."`pos_register`",$arr, " `id` = '".$store_id."'");

		return true;

	}

	public function update_time_zone($store_name, $time_zone){ //$active = 1, $active = 0
		global $db_store;

		$arr['time_zone'] = $time_zone;
		$db_store->record_update($db_store->tbl_fix."`pos_register`", $arr, " `store_name` = '".$store_name."'");
		
		return true;
	}

	public function check_store($store_name)
	{
		global $db_store;

		$sql = "SELECT `store_name` FROM ".$db_store->tbl_fix."`pos_register` WHERE `store_name`='".$store_name."' LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		
		if(isset($row['store_name']['3'])){
			return true; //is exit
		}else{
			return false;//not exit
		}
	}

	public function check_email( $email )
	{
		global $db_store;

		$sql = "SELECT store_name FROM ".$db_store->tbl_fix."`pos_register` WHERE `store_email`='".$email."' LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		
		if(isset($row['store_name']['3'])){
			return true; //is exit
		}else{
			return false;//not exit
		}
	}

	public function check_mobile( $store_mobile )
	{
		global $db_store;

		$sql = "SELECT `store_name` FROM ".$db_store->tbl_fix."`pos_register` WHERE `store_mobile`='".$store_mobile."' LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		
		if(isset($row['store_name']['3'])){
			return true; //is exit
		}else{
			return false;//not exit
		}
	}

	public function get_detail_byid( $id )
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';
		
		$sql = "SELECT * FROM ".$db_store->tbl_fix."`pos_register` WHERE `id` = '$id' $belong_to_reseller LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		return $row;
	}

	public function get_detail()
	{
		global $db_store, $database, $listdb;
		if ($listdb["pos_register"]) $db_store->setDatabase($listdb["order"]);

		$id 						= $this->get('id');

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT * FROM ".$db_store->tbl_fix."`pos_register` WHERE `id`='".$id."' $belong_to_reseller LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		
		if ($listdb["pos_register"]) $db_store->setDatabase( $database );
		
		return $row;
	}

	public function delete()
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$db_store->record_delete ( $db_store->tbl_fix."`pos_register`", " `id` = '$id' $belong_to_reseller " );

		return true;
	}

	public function search_pos( $keyword )
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$keyword = str_replace('\'', '', $keyword);
		$sql = "SELECT * FROM ".$db_store->tbl_fix."`pos_register` WHERE (`store_name` LIKE '%".$keyword."%' OR `store_mobile` LIKE '%".$keyword."%' OR `store_title` LIKE '%".$keyword."%' ) $belong_to_reseller ORDER BY `store_title` LIMIT 10";
		
		$result = $db_store->executeQuery ( $sql );
		$kq = array();
		while ($row = mysqli_fetch_assoc( $result ) ) {
			$kq[] = $row;
		}

		return $kq;
	}

	public function get_all_option()
	{
		global $db_store;
		
		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT id,store_title FROM ".$db_store->tbl_fix."`pos_register` WHERE 1 $belong_to_reseller ORDER BY `store_title`";
		$result = $db_store->executeQuery( $sql );
		
		$opt = '';
		while( $row = mysqli_fetch_assoc($result) ){
			$opt .= '<option value="'.$row['id'].'" >'.$row['store_title'].'</option>';
		}
		
		unset($row);
		mysqli_free_result($result);
		return $opt;
	}

	public function filter_pos($sort, $pos_type, $store_status, $store_theme, $ofset, $limit){
		global $db_store;

		$sorting = '';

		if( !empty( $sort['store_title'] ) )
			if(	$sort['store_title'] == 'up'){
				$sorting = "ORDER BY `store_title` ASC ";
			}else{
				$sorting = "ORDER BY `store_title` DESC ";
			}
		if( !empty( $sort['store_name'] ) )
			if(	$sort['store_name'] == 'up'){
				$sorting = "ORDER BY `store_name` ASC ";
			}else{
				$sorting = "ORDER BY `store_name` DESC ";
			}
		if( !empty( $sort['customer'] ) )
			if(	$sort['customer'] == 'up'){
				$sorting = "ORDER BY `customer` ASC ";
			}else{
				$sorting = "ORDER BY `customer` DESC ";
			}
		if( !empty( $sort['created_at'] ) )
			if(	$sort['created_at'] == 'up'){
				$sorting = "ORDER BY `created_at` DESC ";
			}else{
				$sorting = "ORDER BY `created_at` ASC ";
			}
		if( !empty( $sort['expire_at'] ) )
			if(	$sort['expire_at'] == 'up'){
				$sorting = "ORDER BY `expire_at` ASC ";
			}else{
				$sorting = "ORDER BY `expire_at` DESC ";
			}

		if( $pos_type != '' ) $pos_type = " AND `pos_type` = '$pos_type' ";
		if( $store_status != '' ) $store_status = " AND `store_status` = '$store_status' ";
		if( $store_theme != '' ) $store_theme = " AND `store_theme` = '$store_theme' ";

		if( $limit != '' ) $limit = "LIMIT $ofset,$limit";

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT * FROM `pos_register` WHERE 1 $belong_to_reseller  $pos_type $store_status $store_theme $sorting ".$limit;

		$kq = array();
		$result = $db_store->executeQuery( $sql );
		while( $row = mysqli_fetch_assoc($result) ){
			$kq[] = $row;
		}

		unset( $result );
		unset( $sql );
		return $kq;
	}
	
	public function filter_pos_count($pos_type, $store_status, $store_theme){
		global $db_store;

		if($pos_type != '') $pos_type = " AND `pos_type` = '$pos_type' ";
		if($store_status != '') $store_status = " AND `store_status` = '$store_status' ";
		if($store_theme != '') $store_theme = " AND `store_theme` = '$store_theme' ";

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT COUNT(id) as total FROM `pos_register` WHERE 1 $pos_type $store_status $store_theme $belong_to_reseller ";

		$result = $db_store->executeQuery( $sql, 1);

		return ($result['total'] + 0);
	}

	public function list_per_page_count()
	{
		global $db_store;
		
		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT COUNT(*) as total FROM ".$db_store->tbl_fix."`pos_register` WHERE 1 $belong_to_reseller";
		
		$result = $db_store->executeQuery ( $sql, 1 );
		return $result['total'] + 0;
	}
	
	public function list_per_page( $ofset, $limit )
	{
		global $db_store;
		if( $limit != '' ) $limit = " LIMIT $ofset,$limit";

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';
		
		$sql = "SELECT pos_type,store_name FROM ".$db_store->tbl_fix."`pos_register` WHERE 1 $belong_to_reseller $limit";
		
		$result = $db_store->executeQuery ( $sql );
		return $result;
	}

	public function get_detail_bystore_name( $store_name, $domain = '' )
	{
		global $db_store, $domain_http_type;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sqlDomain = '';
		if( $domain != '' )
			$sqlDomain = "OR ( `domain` = '$domain' AND `domain` <> '' )";

		$sql = "SELECT * 
				FROM $db_store->tbl_fix`pos_register` 
				WHERE ( `store_name` = '$store_name' $sqlDomain )
				$belong_to_reseller
				LIMIT 1";
		
		$row = $db_store->executeQuery ( $sql, 1 );

		if( $domain != '' && $domain == $row['domain'] ){
			$row['domain_http_type'] = $row['domain_http_type'] == '1' ? 'https://':'http://';
		}else{
			$row['domain_http_type'] = $domain_http_type;
		}

		return $row;
	}

	public function get_pos_retail_by( $id, $keyword )//keyword = email or mobile
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT
				`id`,
				store_title `name`,
				customer `contact`,
				`store_address` `address`,
				`store_mobile` `mobile`,
				`store_email` `email`
				FROM ".$db_store->tbl_fix."`pos_register` WHERE `id` <> '$id' $belong_to_reseller AND `pos_type` = 'retail' AND ( `store_email` = '$keyword' OR `store_mobile` = '$keyword' ) LIMIT 1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		
		return $row;
	}
	
	public function get_detail_by_store( $store_name )
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$sql = "SELECT * FROM ".$db_store->tbl_fix."`pos_register` WHERE `store_name` = '$store_name' $belong_to_reseller LIMIT 0,1";
		
		$row = $db_store->executeQuery ( $sql, 1 );
		return $row;
		
	}

	public function delete_store_name( $store_name )
	{
		global $db_store;

		$belong_to_reseller = $this->get('belong_to_reseller');
		if( $belong_to_reseller != '' && $belong_to_reseller != 0 )
			$belong_to_reseller = " AND `belong_to_reseller` = '$belong_to_reseller' ";
		else 
			$belong_to_reseller = '';

		$db_store->record_delete ( $db_store->tbl_fix."`pos_register`", " `store_name` = '$store_name' $belong_to_reseller " );
		
		return true;
	}

}
$pos_register = new pos_register(); 
