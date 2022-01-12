<?php
class member_group extends model{
	
	protected $class_name = 'member_group';
	protected $id;
	protected $code;
	protected $name;
	protected $priority;
	protected $commission_group_id;//nhóm chiết khấu hệ thống
	protected $commission_group_id_ref;//nhóm chiết khấu giới thiệu
	protected $kpi_id;//nhóm KPI
	protected $kpi_level_id;//nhóm KPI lên cấp: điều kiện lên cấp
	protected $member_type;//Loại khách hàng: Không được hưởng chiết khấu = 0 hay mặc định; Khách sỉ và khách hàng
	protected $require_revenue;//min revenue
	protected $require_level;//for level up
	protected $root_id;
	protected $parent_id;
	protected $is_hidden;

	public function add(){
		global $db;
		
		$arr['code'] 						= $this->get('code');
		$arr['name'] 						= $this->get('name');

		$arr['priority'] 					= 0;
		$arr['require_revenue'] 			= 0;
		$arr['require_level'] 				= 0;
		$arr['commission_group_id'] 		= $this->get('commission_group_id');
		$arr['commission_group_id_ref'] 	= $this->get('commission_group_id_ref');
		$arr['kpi_id'] 						= $this->get('kpi_id');
		$arr['kpi_level_id'] 				= $this->get('kpi_level_id');
		$arr['member_type'] 				= $this->get('member_type');
		$arr['root_id'] 					= $this->get('root_id');
		$arr['parent_id'] 					= $this->get('parent_id');
		$arr['is_hidden'] 					= 0;

		$db->record_insert( $this->class_name, $arr);

		unset($arr);
		return $db->mysqli_insert_id();
	}

	public function update(){
		global $db;
		
		$id 								= $this->get('id');
		$arr['code'] 						= $this->get('code');
		$arr['name'] 						= $this->get('name');
		$arr['commission_group_id'] 		= $this->get('commission_group_id');
		$arr['commission_group_id_ref'] 	= $this->get('commission_group_id_ref');
		$arr['kpi_id'] 						= $this->get('kpi_id');
		$arr['kpi_level_id'] 				= $this->get('kpi_level_id');
		$arr['member_type'] 				= $this->get('member_type');
		
		$db->record_update( $this->class_name, $arr, " `id` = '$id' ");

		unset($arr);
		return true;
	}

	public function update_hidden(){
        global $db;
        
        $id                         = $this->get('id');
        $arr['is_hidden']           = $this->get('is_hidden');

		$db->record_update($db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );
        
        return true;
    }

	public function list_opt_all() {
		global $db;
		
		$sql = "SELECT `id` , `code`, `name` FROM `". $this->class_name ."` ORDER BY `id` ";
		
		$result = $db->executeQuery( $sql );

		$opt = '';
		while($row = mysqli_fetch_assoc($result) ){
			$opt .= '<option value="'.$row['id'].'">'.($row['code'] != '' ? '['.$row['code'].']':'').' '.$row['name'].'</option>';
		}

		return $opt;
	}

	public function list_sort_priority() {
		global $db;
		
		$sql = "SELECT * FROM `". $this->class_name ."` ORDER BY `priority` ASC ";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_branch() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT * FROM ".$db->tbl_fix."`". $this->class_name ."` WHERE `root_id` = '$root_id' ORDER BY `id` DESC ";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_root_id() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT thisTable.*,
					IFNULL(comg.`name`, 'Chưa khai báo') commission_group_name,
					IFNULL(comg_ref.`name`, 'Chưa khai báo') commission_group_name_ref,
					IFNULL(KPI.`name`, 'Mặc định' ) kpi_name,
					IFNULL(KPILevel.`name`, 'Mặc định' ) kpi_level_name,
					IFNULL(membtype.`name`, 'Mặc định' ) member_type_name
				FROM ".$db->tbl_fix."`". $this->class_name ."` thisTable
				LEFT JOIN  ".$db->tbl_fix."`commission_group` comg ON comg.id = thisTable.commission_group_id
				LEFT JOIN  ".$db->tbl_fix."`commission_group` comg_ref ON comg_ref.id = thisTable.commission_group_id_ref
				LEFT JOIN  ".$db->tbl_fix."`KPI` ON KPI.id = thisTable.kpi_id
				LEFT JOIN  ".$db->tbl_fix."`KPI_level` KPILevel ON KPILevel.id = thisTable.kpi_level_id
				LEFT JOIN  ".$db->tbl_fix."`member_type` membtype ON membtype.id = thisTable.member_type
				WHERE `root_id` = '$root_id' ORDER BY `id` ASC ";
		
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_root_id_public() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT * FROM ".$db->tbl_fix."`". $this->class_name ."` WHERE `root_id` = '$root_id' AND is_hidden = '0' ORDER BY `id` ASC ";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function opt_list_public() {
		global $db;

		$sql = "SELECT * FROM ".$db->tbl_fix."`". $this->class_name ."` WHERE `root_id` > 0 AND is_hidden = '0' ORDER BY `id` ASC ";
		$result = $db->executeQuery_list( $sql );
		$kq = '';
		foreach ($result as $key => $i) {
				$kq .= '<option value="'.$i['id'].'">'.($i['code'] != '' ? '['.$i['code'].']':'' ).''.$i['name'].'</option>';
		}
		
		return $kq;
	}

	public function list_all_by_group() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT thisTable.* FROM ".$db->tbl_fix."`". $this->class_name ."` thisTable
				WHERE `root_id` = 0 AND `parent_id` = 0 ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){
			$this->set('root_id', $row['id'] );
			$row['lItems'] =$this->list_by_root_id();
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_all_by_group_public() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`". $this->class_name ."` WHERE `root_id` = 0 AND `parent_id` = 0 ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){
			$this->set('root_id', $row['id'] );
			$row['lItems'] =$this->list_by_root_id_public();
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_all_child_public() {//list all theo tên nhóm chính
		global $db;

		//Child ID
		$id = $this->get('id');//id list defined
		$sqlID = '';
        if( $id != '' ){
            $lRMD = explode( ';', $id);
            foreach ($lRMD as $itDe) {
                if( $itDe != '' )
                    $sqlID .= " `id` = '$itDe' OR ";
            }

            if( $sqlID != '' ){
                $sqlID = "AND (".substr($sqlID,0, -3)." )";
            }
        }
		
		$sql = "SELECT * 
				FROM ".$db->tbl_fix."`". $this->class_name ."`
				WHERE `root_id` > 0 AND `is_hidden` = 0 $sqlID
				ORDER BY `id` ASC";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_all_child() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`". $this->class_name ."` WHERE `root_id` > 0 ORDER BY `id` ASC";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}
	
	public function opt_all_by_group() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `root_id` = 0 AND `parent_id` = 0 ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		$kq = '';
		while( $row = mysqli_fetch_assoc($result) ){
			$kq .= '<optgroup label="'.$row['name'].'" data-subtext="'.$row['name'].'">';

			$this->set('root_id', $row['id'] );
			$lItems =$this->list_by_root_id();
			foreach ($lItems as $key => $i) {
				$kq .= '<option value="'.$i['id'].'">'.($i['code'] != '' ? '['.$i['code'].']':'' ).''.$i['name'].'</option>';
			}

			$kq .= '</optgroup>';
		}

		return $kq;
	}

	public function opt_all_by_group_public() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `root_id` = 0 AND `parent_id` = 0 ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		$kq = '';
		while( $row = mysqli_fetch_assoc($result) ){
			$kq .= '<optgroup label="'.$row['name'].'" data-subtext="'.$row['name'].'">';

			$this->set('root_id', $row['id'] );
			$lItems =$this->list_by_root_id_public();
			foreach ($lItems as $key => $i) {
				$kq .= '<option value="'.$i['id'].'">'.($i['code'] != '' ? '['.$i['code'].']':'' ).''.$i['name'].'</option>';
			}

			$kq .= '</optgroup>';

		}

		return $kq;
	}

	public function get_id_by( $keyword ) {
		global $db;
		
		$sql = "SELECT `id` FROM `". $this->class_name ."` WHERE ( `code` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' ) AND `root_id` > 0 ";
		
		$res = $db->executeQuery( $sql, 1 );

		if( isset($res['id']) )
			return $res['id'];
		else
			return 0;
	}

	public function list_dl() {//list_all_to_download
		global $db;
		
		$sql = "SELECT ntb.*, proc.`name` product_commission_name, cgd.`value`, IF(cgd.`is_percent` = 1, 'Là phần trăm', 'Giá trị') loai  FROM (
					SELECT mg.`id` member_group_id, mg.`name` member_group_name, mg.`commission_group_id`, IFNULL(comg.`name`, 'Chưa khai báo') commission_group_name, mt.`name` loai_thanh_vien
					FROM $db->tbl_fix`member_group` mg
					INNER JOIN $db->tbl_fix`commission_group` comg ON comg.`id` = mg.`commission_group_id`
					INNER JOIN $db->tbl_fix`member_type` mt ON mt.`id` = mg.`member_type`
					WHERE mg.`root_id` > 0
					ORDER BY `mg`.name
				) ntb
				INNER JOIN commission_group_detail cgd ON cgd.`commission_group_id` = ntb.`commission_group_id`
				INNER JOIN product_commission proc ON proc.`id` = cgd.`product_commission_id`";

		return $db->executeQuery_list( $sql );
		
	}

	// lấy KPIlevel theo member_group (tùngcode-20/04/2021)
	public function get_KPIlevel_by_member_group()
	{
		global $db;

		$id   = $this->get('id');

		$sql = "SELECT 
				IFNULL(KPI_level.`total_spent`, 0) total_spent, IFNULL(KPI_level.`total_child_spent`, 0) total_child_spent, IFNULL(KPI_level.`total_child`, 0) total_child, 
				IFNULL(KPInext.`total_spent`, 0) next_total_spent, IFNULL(KPInext.`total_child_spent`, 0) next_total_child_spent, IFNULL(KPInext.`total_child`, 0) next_total_child 
				, mg.`name` current_level_name
				, IFNULL(mgnext.`name`, 'Chưa xác định' ) next_level_name
				FROM $db->tbl_fix`$this->class_name` mg
				LEFT JOIN $db->tbl_fix`KPI_level` ON mg.`kpi_level_id` = KPI_level.`id`
				LEFT JOIN $db->tbl_fix`$this->class_name` mgnext ON KPI_level.`up_level` = mgnext.`id`
				LEFT JOIN $db->tbl_fix`KPI_level` KPInext ON mgnext.`kpi_level_id` = KPInext.`id`
				WHERE mg.`id` = $id";

		$result = $db->executeQuery( $sql, 1 );

		return $result;
	}
	
}
$member_group = new member_group();