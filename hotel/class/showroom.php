<?php
class showroom extends model
{

	protected $class_name = 'showroom';
	protected $id;
	protected $name;
	protected $city_id;
	protected $district_id;
	protected $ward_id;
	protected $address; //Số 129 Đường Số 1
	protected $address_full; //Số 129 Đường Số 1, Phường, Quận, Tỉnh
	protected $link_map;
	protected $mobile;
	protected $longitude;
	protected $priority;
	protected $latitude;
	protected $managers; //client_id1; client_id2;
	protected $owner; // client_id
	protected $created_at;
	protected $created_by;
	protected $is_hidden;
	protected $img;
	protected $description;
	protected $city_allowed;
	protected $district_allowed;

	public function add()
	{
		global $db;

		$arr['name'] 				= $this->get('name');
		$arr['city_id'] 			= $this->get('city_id')+0;
		$arr['district_id'] 		= $this->get('district_id')+0;
		$arr['ward_id'] 			= $this->get('ward_id')+0;
		$arr['address'] 			= $this->get('address');
		$arr['address_full'] 		= $this->get('address_full');
		$arr['link_map'] 			= $this->get('link_map');
		$arr['mobile'] 				= $this->get('mobile');
		$arr['longitude'] 			= $this->get('longitude');
		$arr['latitude'] 			= $this->get('latitude');
		$arr['managers'] 			= $this->get('managers');
		$arr['owner'] 				= $this->get('owner');
		$arr['priority'] 			= $this->get('priority');
		$arr['created_at'] 			= time();
		$arr['created_by'] 			= $this->get('created_by');
		$arr['is_hidden'] 			= $this->get('is_hidden');
		$arr['img'] 				= $this->get('img');
		$arr['description'] 		= $this->get('description');
		$arr['city_allowed'] 		= $this->get('city_allowed');
		$arr['district_allowed'] 	= $this->get('district_allowed');

		$db->record_insert($this->class_name, $arr);
		return $db->mysqli_insert_id();
	}

	public function update()
	{
		global $db;

		$id 						= $this->get('id');

		$arr['name'] 				= $this->get('name');
		$arr['city_id'] 			= $this->get('city_id');
		$arr['district_id'] 		= $this->get('district_id');
		$arr['ward_id'] 			= $this->get('ward_id');
		$arr['address'] 			= $this->get('address');
		$arr['address_full'] 		= $this->get('address_full');
		$arr['link_map'] 			= $this->get('link_map');
		$arr['mobile'] 				= $this->get('mobile');
		$arr['longitude'] 			= $this->get('longitude');
		$arr['latitude'] 			= $this->get('latitude');
		$arr['managers'] 			= $this->get('managers');
		$arr['owner'] 				= $this->get('owner');
		$arr['priority'] 			= $this->get('priority');
		$arr['is_hidden'] 			= $this->get('is_hidden');
		$arr['img'] 				= $this->get('img');
		$arr['description'] 		= $this->get('description');
		$arr['city_allowed'] 		= $this->get('city_allowed');
		$arr['district_allowed'] 	= $this->get('district_allowed');

		$db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");
		return true;
	}

	public function get_all($keyword, $offset = '', $limit = '')
	{
		global $db;

		$city_id            	= $this->get('city_id');
		$district_id           	= $this->get('district_id');
		$ward_id           		= $this->get('ward_id');

		if ($keyword != '')
			$keyword = " AND ( `address` LIKE '%$keyword%' OR `address_full` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' )";

		$sqlCity = '';
		if ($city_id != '')
			$sqlCity = " AND `city_id` = '$city_id' ";

		$sqlDistrict = '';
		if ($district_id != '')
			$sqlDistrict = " AND `district_id` = '$district_id' ";

		$sqlWard = '';
		if ($ward_id != '')
			$sqlWard = " AND `ward_id` = '$ward_id' ";

		if ($limit != '') $limit = " LIMIT $offset,$limit ";

		$sql = "SELECT *
                FROM $db->tbl_fix$this->class_name
                WHERE `is_hidden` = '0'
                $keyword
                $sqlCity
                $sqlDistrict
                $sqlWard
				ORDER BY priority ASC
				$limit
				";

		$kq  = $db->executeQuery_list($sql);

		return $kq;
	}

	public function get_all_count($keyword, $offset = '', $limit = '')
	{
		global $db;

		$city_id            	= $this->get('city_id');
		$district_id           	= $this->get('district_id');
		$ward_id           		= $this->get('ward_id');

		if ($keyword != '')
			$keyword = " AND ( `address` LIKE '%$keyword%' OR `address_full` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' )";

		$sqlCity = '';
		if ($city_id != '')
			$sqlCity = " AND `city_id` = '$city_id' ";

		$sqlDistrict = '';
		if ($district_id != '')
			$sqlDistrict = " AND `district_id` = '$district_id' ";

		$sqlWard = '';
		if ($ward_id != '')
			$sqlWard = " AND `ward_id` = '$ward_id' ";

		$sql = "SELECT COUNT(*) total
                FROM $db->tbl_fix$this->class_name
                WHERE `is_hidden` = '0'
                $keyword
                $sqlCity
                $sqlDistrict
                $sqlWard
				";

		$kq = $db->executeQuery($sql, 1);
		return $kq['total'] + 0;
	}


	public function filter($keyword, $offset = '', $limit = '')
	{
		global $db, $db_store;

		$city_id            	= $this->get('city_id');
		$district_id           	= $this->get('district_id');
		$ward_id           		= $this->get('ward_id');

		if ($keyword != '')
			$keyword = " AND ( `name` LIKE '%$keyword%' OR `address_full` LIKE '%$keyword%' )";

		$sqlCity = '';
		if ($city_id != '')
			$sqlCity = " AND `city_id` = '$city_id' ";

		$sqlDistrict = '';
		if ($district_id != '')
			$sqlDistrict = " AND `district_id` = '$district_id' ";

		$sqlWard = '';
		if ($ward_id != '')
			$sqlWard = " AND `ward_id` = '$ward_id' ";

		if ($limit != '') $limit = " LIMIT $offset,$limit ";

		$sql = "SELECT sr.*, IFNULL(owners.`fullname`, '') name_owners, IFNULL(owners.`mobile`, '') mobile_owners, IFNULL(managers.`fullname`,'') name_managers, IFNULL(managers.`mobile`, '') mobile_managers
				FROM " . $db->tbl_fix . "`showroom` sr 
				LEFT JOIN " . $db->tbl_fix . "`members` owners ON owners.`user_id` = sr.`owner`
				LEFT JOIN " . $db->tbl_fix . "`members` managers ON managers.`user_id` = sr.`managers`
                WHERE 1
                $keyword
                $sqlCity
                $sqlDistrict
                $sqlWard
				ORDER BY priority ASC
				$limit
				";
		$result  = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) { //lấy tỉnh thành phố của showroom phụ trách
			
			$eco_city = new eco_city();
			$eco_district = new eco_district();

			$row['name_city'] = '';
			$row['name_district'] = '';

			$lCity = $eco_city->list_all_items();
			$city_by_sr = explode(';', $row['city_allowed']);
			foreach ($lCity as $key => $item) {
				if ($city_by_sr != '' && in_array($item['id'], $city_by_sr)) {
					$row['name_city'] .= $item['name'] . ', ';
				}
			}
			$lDistrict = $eco_district->list_all_items();
			$district_by_sr = explode(';', $row['district_allowed']);
			foreach ($lDistrict as $key => $item) {
				if ($district_by_sr != '' && in_array($item['id'], $district_by_sr)) {
					$row['name_district'] .= $item['name_type'] . ', ';
				}
			}

			$kq[] = $row;
		}
		return $kq;
	}

	public function filter_count($keyword)
	{
		global $db;

		$city_id            	= $this->get('city_id');
		$district_id           	= $this->get('district_id');
		$ward_id           		= $this->get('ward_id');

		if ($keyword != '')
			$keyword = " AND ( `address` LIKE '%$keyword%' OR `address_full` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' )";

		$sqlCity = '';
		if ($city_id != '')
			$sqlCity = " AND `city_id` = '$city_id' ";

		$sqlDistrict = '';
		if ($district_id != '')
			$sqlDistrict = " AND `district_id` = '$district_id' ";

		$sqlWard = '';
		if ($ward_id != '')
			$sqlWard = " AND `ward_id` = '$ward_id' ";

		$sql = "SELECT COUNT(*) total
                FROM $db->tbl_fix$this->class_name
                WHERE 1
                $keyword
                $sqlCity
                $sqlDistrict
                $sqlWard
				";

		$kq = $db->executeQuery($sql, 1);
		return $kq['total'] + 0;
	}

	public function filter_nearby($distance)
	{
		global $db;

		$longitude            		= $this->get('longitude');
		$latitude            		= $this->get('latitude');

		// $city_id            		= $this->get('city_id');
		// $district_id           	= $this->get('district_id');
		// $ward_id           		= $this->get('ward_id');

		// if( $keyword != '' )
		//     $keyword = " AND ( `address` LIKE '%$keyword%' OR `address_full` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' )";

		// $sqlCity = '';
		// if( $city_id != '' )
		//     $sqlCity = " AND `city_id` = '$city_id' ";

		// $sqlDistrict = '';
		// if( $district_id != '' )
		//     $sqlDistrict = " AND `district_id` = '$district_id' ";

		// $sqlWard = '';
		// if( $ward_id != '' )
		// 	$sqlWard = " AND `ward_id` = '$ward_id' ";

		$sql = "SELECT *
                FROM (
                        SELECT *, (
                                    (
                                        (
                                            acos(
                                                sin(( $latitude * pi() / 180))
                                                *
                                                sin(( `latitude` * pi() / 180)) + cos(( $latitude * pi() /180 ))
                                                *
                                                cos(( `latitude` * pi() / 180)) * cos((( $longitude - `longitude`) * pi()/180)))
                                        ) * 180/pi()
                                    ) * 60 * 1.1515 * 1.609344
                                ) as distance
                        FROM $db->tbl_fix$this->class_name 
                    ) `nTB`
                WHERE `is_hidden` = '0'
                -- $keyword
                -- $sqlCity
                -- $sqlDistrict
                -- $sqlWard
                ORDER BY `distance` ASC
                LIMIT 30
                ";

		return $db->executeQuery_list($sql);
	}

	// 5102020t
	// public function find_showroom_this_location()
	// { // tìm showroom gần đơn hàng nhất
	// 	global $db, $setup;

	// $city_id 		= $this->get('city_id');
	// $district_id 	= $this->get('district_id');
	// $ward_id 		= $this->get('ward_id');

	// 	/*
	// 	- Thực hiện tìm client nào có nhóm là giao hàng:
	// 	- Nếu không có thì tìm nhóm client đó thuộc tỉnh thành nào trả về tỉnh thành, còn không có tỉnh thành thì thôi: ko gán
	// 	*/

	// $sql = "SELECT *
	//         FROM " . $db->tbl_fix . "`" . $this->class_name . "` sr
	//         WHERE sr.`ward_id` = '$ward_id'
	// 		LIMIT 1";

	// $d = $db->executeQuery($sql, 1);
	// 	if (isset($d['name'])) {
	// 		//Tìm thấy user điểm giao hàng
	// 		return $d;
	// 	} else {

	// 		$sql = "SELECT *
	// 				FROM $db->tbl_fix`$this->class_name` sr
	// 				WHERE sr.`district_id` = '$district_id'
	// 				LIMIT 1";

	// 		$d = $db->executeQuery($sql, 1);
	// 		if (isset($d['name'])) {

	// 			return $d;
	// 		} else {

	// 			$sql = "SELECT *
	// 					FROM $db->tbl_fix`$this->class_name` sr
	// 					WHERE sr.`city_id` = '$city_id'
	// 					LIMIT 1";
	// 			$d = $db->executeQuery($sql, 1);
	// 			if (isset($d['name'])) {
	// 				return $d;
	// 			} else {
	// 				return '';
	// 			}
	// 		}
	// 	}
	// }

	public function find_showroom_this_location()
	{ //tìm showroom quản lý khu vực để nhận đơn hàng
		global $db, $setup;

		$city_id 		= $this->get('city_id');
		$district_id 	= $this->get('district_id');
		$ward_id 		= $this->get('ward_id');

		$sql = "SELECT *
                FROM " . $db->tbl_fix . "`" . $this->class_name . "` sr
                WHERE sr.`district_allowed` LIKE '$district_id;%' OR sr.`district_allowed` LIKE '%;$district_id;%'
				LIMIT 1";
		$d = $db->executeQuery($sql, 1);

		if (isset($d['name'])) {
			return $d;
		} else {

			$sql = "SELECT *
					FROM $db->tbl_fix`$this->class_name` sr
					WHERE sr.`city_allowed` LIKE '$city_id;%' OR sr.`city_allowed` LIKE '%;$city_id;%'
					LIMIT 1";
			$d = $db->executeQuery($sql, 1);
			if (isset($d['name'])) {
				return $d;
			} else {
				return '';
			}
		}
	}

	public function getby_mobile()
	{
		global $db;

		$mobile = $this->get('mobile');
		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` WHERE `mobile` = '$mobile'";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	public function get_by_owner()
	{
		global $db;

		$owner = $this->get('owner');

		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` WHERE `owner` = '$owner'";
		$result = $db->executeQuery($sql, 1);

		return $result;
	}

	//GET: Showroom tôi quản lý hay showroom tôi chủ sở hữu
	public function my_showroom()
	{
		global $db;
		$delivery = new delivery();

		$owner 		= $this->get('owner');
		$managers 	= $this->get('managers');

		$sql = "SELECT *
				FROM $db->tbl_fix`$this->class_name`
				WHERE `owner` = '$owner'
				OR (
					`managers` LIKE '$managers;%'
					OR
					`managers` LIKE '%;$managers;%'
				)
				LIMIT 1";

		$dThis = $db->executeQuery($sql, 1);

		if (isset($dThis['id'])) {
			$delivery->set('shipper_status', 0);
			$delivery->set('shipper_id', $dThis['id']);
			$dThis['number_waiting_order'] = $delivery->filter_count();
			return $dThis;
		} else {
			return '';
		}
	}

	//GET list owner
	public function list_owner()
	{
		global $db;
		$delivery = new delivery();

		$owner = $this->get('owner');

		$sql = "SELECT *
				FROM $db->tbl_fix`$this->class_name`
				WHERE `owner` = '$owner'
				ORDER BY `name` ";
		// $result = $db->executeQuery_list( $sql );

		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$delivery->set('shipper_status', 0);
			$delivery->set('shipper_id', $row['id']);
			$row['number_waiting_order'] = $delivery->filter_count();
			$kq[] = $row;
		}

		return $kq;
	}

	//GET list owner
	public function list_managers()
	{
		global $db;
		$delivery = new delivery();

		$managers = $this->get('managers'); //client_id
		//managers: clientid1;clientid2;

		$sql = "SELECT *
				FROM $db->tbl_fix`$this->class_name`
				WHERE 
				`managers` LIKE '$managers;%'
				OR
				`managers` LIKE '%;$managers;%'
				ORDER BY `name` 
				";
		// $result = $db->executeQuery_list( $sql );
		$result = $db->executeQuery($sql);

		$kq = array();
		while ($row = mysqli_fetch_assoc($result)) {

			$delivery->set('shipper_status', 0);
			$delivery->set('shipper_id', $row['id']);
			$row['number_waiting_order'] = $delivery->filter_count();
			$kq[] = $row;
		}

		return $kq;
	}

	//get by owner or manager
	public function get_by_client()//Lấy một showroom được quản lý hoặc sở hữu bởi client_id = owner
	{
		global $db;
		$delivery = new delivery();

		$owner = $this->get('owner'); //client_id

		$sql = "SELECT *
				FROM $db->tbl_fix`$this->class_name`
				WHERE
				( 
					`owner` = '$owner'
					OR
					`managers` LIKE '$owner;%'
					OR
					`managers` LIKE '%;$owner;%'
				)
				AND `is_hidden` = '0'
				LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );

		return $r;
	}

	public function opt_city()
	{
		global $db_store, $main;

		$sql = "SELECT * FROM " . $db_store->tbl_fix . "`eco_city`";
		$result = $db_store->executeQuery($sql);

		$html = '';

		while ($rows = mysqli_fetch_assoc($result)) {
			$html .= '<option value="' . $rows['id_city'] . '">' . $rows['name'] . '</option>';
		}

		return $html;
	}

	public function opt_district($city_id)
	{
		global $db_store, $main;

		$sql = "SELECT * FROM " . $db_store->tbl_fix . "`eco_district` WHERE id_city='$city_id'";
		$result = $db_store->executeQuery($sql);

		$html = '';

		$html .= '<option value="" selected>Chọn quận/ huyện</option>';
		while ($rows = mysqli_fetch_assoc($result)) {
			$html .= '<option value="' . $rows['id_district'] . '">' . $rows['name'] . '</option>';
		}

		return $html;
	}

	public function opt_ward($district_id)
	{
		global $db_store, $main;

		$sql = "SELECT * FROM " . $db_store->tbl_fix . "`eco_ward` WHERE id_district='$district_id'";
		$result = $db_store->executeQuery($sql);

		$html = '';

		$html .= '<option value="" selected>Chọn xã/ phường</option>';
		while ($rows = mysqli_fetch_assoc($result)) {
			$html .= '<option value="' . $rows['id_ward'] . '">' . $rows['name'] . '</option>';
		}

		return $html;
	}

	public function opt_all_showroom( $is_except_all = false )//is_except_all: bỏ qua trường hợp all
	{
		global $db, $database;

		$sql = "SELECT `showroom`.id,`showroom`.name FROM " . $db->tbl_fix . "`showroom`
				WHERE  `showroom`.`id` > 0 ORDER BY `showroom`.id ASC";
		$result = $db->executeQuery($sql);

		if( !$is_except_all )
			$option = '<option value="">Tất cả Showroom</option>';
		else
			$option = '';
		
		while ($row = mysqli_fetch_assoc($result)) {
			$option .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
		}

		return $option;
	}

	public function get_detail_by_id()
	{
		global $db;

		$members = new members();

		$id = $this->get('id');

		$sql = "SELECT * FROM " . $db->tbl_fix . "`showroom` WHERE id='$id'";
		$result = $db->executeQuery($sql);

		$kq = array();
		while ($rows = mysqli_fetch_assoc($result)) {

			$members->set('user_id', $rows['managers']);
			$rows['list_managers'] = $members->get_member_showroom();

			$members->set('user_id', $rows['owner']);
			$rows['list_owner'] = $members->get_member_showroom();

			$eco_city	 	= new eco_city();
			$rows['listCity'] = $eco_city->list_all_items();

			$eco_district = new eco_district();
			$eco_district->set('id_city', $rows['city_id']);
			$rows['listDistrict'] = $eco_district->list_by();

			$eco_ward = new eco_ward();
			$eco_ward->set('id_district', $rows['district_id']);
			$rows['listWard'] = $eco_ward->list_by();

			$rows['city_allowed_list'] 		= $eco_city->get_by_list_strID($rows['city_allowed']);
			$rows['district_allowed_list'] 	= $eco_district->get_by_list_strID($rows['district_allowed']);

			$kq = $rows;
		}

		return $kq;
	}

	public function find_staff_showroom($user_id)
	{
		global $db;
		$user_sql = "owner='$user_id' OR managers LIKE '$user_id;%' OR managers LIKE '%$user_id;%'";

		$sql = "SELECT * FROM " . $db->tbl_fix . "`showroom` WHERE $user_sql";
		$result = $db->executeQuery($sql, 1);
		return $result;
	}

}

$showroom = new showroom();
