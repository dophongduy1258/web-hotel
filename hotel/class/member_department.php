<?php
class member_department extends model{
	/*
	- root_id = 0 và is_child = 0 => là lable phòng ban: Cụm, Phòng, Chi nhánh
	- Trường hợp còn lại là giá trị
	- root_id => là lớp: cùng lớp nghĩa là cùng: Cụm hoặc Phòng Hoặc Chi Nhánh ....
	*/
    protected $class_name = 'member_department';
	protected $id;
	protected $code;
	protected $name;
	protected $client_id;//id người quản lý
	protected $root_id;
    protected $parent_id;
	protected $commission_group_id;
	protected $kpi_id;
	protected $is_child;
	protected $client_mngt_revenue_id;//ID client là người quản lý
    
    public function add(){
		global $db;
		
		$arr['code'] 						= $this->get('code');
		$arr['name'] 						= $this->get('name');
		$arr['client_id'] 					= $this->get('client_id');
		$arr['root_id'] 					= $this->get('root_id');
        $arr['parent_id'] 					= $this->get('parent_id');
		$arr['commission_group_id'] 		= $this->get('commission_group_id');
		$arr['kpi_id'] 						= $this->get('kpi_id');
		$arr['client_mngt_revenue_id'] 		= $this->get('client_mngt_revenue_id');
		$arr['is_child'] 					= $this->get('is_child');

		$db->record_insert( $this->class_name, $arr);
        
		unset($arr);
		return $db->mysqli_insert_id();
	}

	public function update(){
		global $db;
		
		$id 								= $this->get('id');
        
        $arr['code'] 						= $this->get('code');
		$arr['name'] 						= $this->get('name');
		$arr['client_id'] 					= $this->get('client_id');
		$arr['commission_group_id'] 		= $this->get('commission_group_id');
		$arr['client_mngt_revenue_id'] 		= $this->get('client_mngt_revenue_id');
		$arr['kpi_id'] 						= $this->get('kpi_id');
		
		$db->record_update( $this->class_name, $arr, " `id` = '$id' ");

		unset($arr);
		return true;
    }

	public function get_label_child() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `parent_id` = '$root_id' AND `is_child` = 0 ORDER BY `id` ASC ";
		$result = $db->executeQuery( $sql, 1 );

		return $result;
	}

	public function get_by_name( $name ) {
		global $db;

		$parent_id 	= $this->get('parent_id');
		if( $parent_id != '' ) $parent_id = "AND  `parent_id` = '$parent_id' ";

		$root_id 	= $this->get('root_id');
		if( $root_id != '' ) $root_id = "AND  `root_id` = '$root_id' ";
		
		$is_child 	= $this->get('is_child');
		if( $is_child === 0 )
			$is_child = "AND  `is_child` = '0' ";
		else
			$is_child = "AND  `is_child` = '1' ";
		
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `name` = '$name' $is_child $parent_id $root_id ORDER BY `id` ASC LIMIT 1 ";
		$result = $db->executeQuery( $sql, 1 );

		return $result;
	}

	public function get_full_name( &$name ) {
		global $db;

		$id 	= $this->get('id');
		$d		= $this->get_detail();
		if( isset($d['id']) && $d['parent_id'] > 0 && $d['root_id'] > 0 ){
			$name	= ' -> '.$d['name'].$name;
			$this->set('id', $d['parent_id']);
			$this->get_full_name( $name );
		}else if( isset($d['id']) ) {
			$name	= $d['name'].$name;
			return true;
		}else{
			return true;
		}

	}

	public function get_name() {
		global $db;

		$id 	= $this->get('id');
		$d		= $this->get_detail();

		return isset($d['name']) ? $d['name']:'';
		
	}

	public function list_by_root_id() {//list theo nhóm cha
		global $db;

		$root_id 	= $this->get('root_id');
		$parent_id 	= $this->get('parent_id');
		$sql = "SELECT md.*,
						IFNULL(cg.`name`, 'Mặc định') commission_group_name,
						IFNULL(mb.`fullname`, '') fullname,
						IFNULL(mb.`mobile`, '') mobile,
						IFNULL(mbmngt.`fullname`, '') mngt_fullname,
						IFNULL(mbmngt.`mobile`, '') mngt_mobile,
						IFNULL(KPI.`name`, 'Mặc định' ) kpi_name
				FROM $db->tbl_fix`". $this->class_name ."` md
				LEFT JOIN  $db->tbl_fix`commission_group` cg ON cg.id = md.commission_group_id
				LEFT JOIN  $db->tbl_fix`KPI` ON KPI.id = md.kpi_id
				LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = md.client_id
				LEFT JOIN $db->tbl_fix`members` mbmngt ON mbmngt.user_id = md.client_mngt_revenue_id
				WHERE `parent_id` = '$parent_id' AND `root_id` = '$root_id' AND `is_child` = 1
				ORDER BY `id` ASC ";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_parent_id() {//list theo nhóm cha
		global $db;

		$parent_id 	= $this->get('parent_id');
		$sql = "SELECT md.*
				FROM `". $this->class_name ."` md
				WHERE `parent_id` = '$parent_id' AND `is_child` = 1
				ORDER BY `id` ASC ";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_all_by_group() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `is_child` = '0' AND `root_id` = '0' ORDER BY `id` ASC";
		$result = $db->executeQuery( $sql );

		$kq = array();
		while( $row = mysqli_fetch_assoc($result) ){
			$this->set('root_id', $row['id'] );
			$this->set('parent_id', $row['parent_id'] );
			$row['lItems'] =$this->list_by_root_id();
			$kq[] = $row;
		}

		return $kq;
	}

	public function list_all_root() {//list nguyên class của root
		global $db;

		$sql 		= "SELECT * FROM `". $this->class_name ."` WHERE `is_child` = '0' AND `root_id` = '0' ORDER BY `id` ASC";
		$result = $db->executeQuery_list( $sql );
		
		return $result;
	}

	public function opt_all_root() {//list nguyên class của root
		global $db;

		$l = $this->list_all_root();
		$opt = '';
		foreach ($l as $key => $it) {
			$opt .= '<option value="'.$it['id'].'">'.$it['name'].'</option>';
		}

		return $opt;
	}

	public function list_class_root_id() {//list nguyên class của root
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT * FROM `". $this->class_name ."` WHERE `root_id` = '$root_id' AND `is_child` = 1 ORDER BY `id` ASC ";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}
	
	public function opt_all(){
		global $db;

		$sql = "SELECT `id`, `name` FROM `". $this->class_name ."` WHERE `is_child` = '0' AND `root_id` = '0' ORDER BY `id` ASC";
		$lR = $db->executeQuery_list( $sql );
		/*
			- lặp theo root được list array theo root
			- while list_root_id
		*/
		$kq = array();
		if( COUNT($lR) > 0 ){

			$kq = array();

			$root_id_stop 	= $lR[COUNT($lR)-1]['id'];//lấy nhánh gần cuối vì option là của cái cuối
			
			//list all first last child: lanh danh sách trong nhóm đầu tiên của cây (nhóm gốc)
			$sql = "SELECT `id`, `name`, `root_id` FROM `". $this->class_name ."` WHERE `is_child` = '1' AND `root_id` <> '0' AND parent_id = '0' ORDER BY `id` ASC";
			$lStartChilds = $db->executeQuery_list( $sql );
			foreach( $lStartChilds as $item ){

				if( $root_id_stop == $item['root_id'] ){
					$kq[$item['id']]['name'] = '';
					$kq[$item['id']]['items'][] = $item;
				}else{
					$name 			= $item['name'] . ' -> ';
					$this->opt_get_childs_from( $kq, $name, $item, $root_id_stop );
				}
			}

		}

		$h = '';
		foreach ( $kq as $i ){

			if( $i['name'] != '' )
				$h .= '<optgroup label="'.$i['name'].'" data-subtext="'.$i['name'].'" >';

			foreach($i['items'] as $ii ){
				$h .= '<option value="'.$ii['id'].'">'.$ii['name'].'</option>';
			}

			if( $i['name'] != '' )
				$h .= '</optgroup>';

		}

		// print_r( $kq );

		$this->set('id', $root_id_stop);
		$d = $this->get_detail();

		if( isset($d['id']) && $d['root_id'] > 0 && $d['is_child'] == 0 )
			$h = '<option value="">Tất cả: '.$d['name'].'</option>'.$h;

		return $h;
	}

	public function opt_from(){
		global $db;

		$root_id_stop = $this->get('root_id');

		$sql = "SELECT `id`, `name` FROM `". $this->class_name ."` WHERE `is_child` = '0' AND `root_id` = '0' ORDER BY `id` ASC";
		$lR = $db->executeQuery_list( $sql );
		/*
			- lặp theo root được list array theo root
			- while list_root_id
		*/
		$kq = array();
		if( COUNT($lR) > 0 ){

			$kq = array();

			if( $root_id_stop == '' || $root_id_stop <= $lR[0]['id'] )
				$root_id_stop 	= $lR[0]['id'];//lấy nhánh gần cuối vì option là của cái cuối

			//list all first last child: lanh danh sách trong nhóm đầu tiên của cây (nhóm gốc)
			$sql = "SELECT `id`, `name`, `root_id` FROM `". $this->class_name ."` WHERE `is_child` = '1' AND `root_id` <> '0' AND parent_id = '0' ORDER BY `id` ASC";
			$lStartChilds = $db->executeQuery_list( $sql );
			foreach( $lStartChilds as $item ){

				if( $root_id_stop == $item['root_id'] ){
					$kq[$item['id']]['name'] = '';
					$kq[$item['id']]['items'][] = $item;
				}else{
					$name 			= $item['name'] . ' -> ';
					$this->opt_get_childs_from( $kq, $name, $item, $root_id_stop );
				}
			}

		}

		$h = '';
		foreach ( $kq as $i ){

			if( $i['name'] != '' )
				$h .= '<optgroup label="'.$i['name'].'" data-subtext="'.$i['name'].'" >';

			foreach($i['items'] as $ii ){
				$h .= '<option value="'.$ii['id'].'">'.$ii['name'].'</option>';
			}

			if( $i['name'] != '' )
				$h .= '</optgroup>';

		}

		// print_r( $kq );

		$this->set('id', $root_id_stop);
		$d = $this->get_detail();

		if( isset($d['id']) )
			$h = '<option value="">Tất cả: '.$d['name'].'</option>'.$h;

		return $h;
	}

	public function opt_get_childs_from( &$kq, &$name, $dChild, $root_id_stop ){

		$this->set('parent_id', $dChild['id']);
		$subItems 	= $this->list_by_parent_id();

		foreach( $subItems as $item ){
			if( $item['root_id'] == $root_id_stop ){
				$kq[$item['parent_id']]['name'] = $name;
				$kq[$item['parent_id']]['items'][] = $item;
			}else{
				$n =  $name.$item['name'] . ' -> ';
				$this->opt_get_childs_from( $kq, $n, $item, $root_id_stop );
			}
		}

		return true;
		
	}

	public function opt_my_department(){
		global $db;

		$client_id = $this->get('client_id');

		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` WHERE `client_id` = '$client_id' AND `is_child` = 1 ";
		
		$l = $db->executeQuery_list( $sql );
		$opt = '';
		foreach( $l as $item ){
			$opt .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
		}
		
		return $opt;
		
	}

	public function opt_my_departMRe(){
		global $db;

		$client_mngt_revenue_id = $this->get('client_mngt_revenue_id');

		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` WHERE `client_mngt_revenue_id` = '$client_mngt_revenue_id' AND `is_child` = 1 ";

		$l = $db->executeQuery_list( $sql );
		$opt = '';
		foreach( $l as $item ){
			$opt .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
		}
		
		return $opt;
		
	}

	public function get_all_string_child_id_by_root_id() {//list theo nhóm cha
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT md.`id`
				FROM `". $this->class_name ."` md
				WHERE `root_id` = '$root_id' AND `is_child` = 1
				ORDER BY `id` ASC ";

		$result = $db->executeQuery( $sql );

		$string = '';
		while( $row = mysqli_fetch_assoc($result) ){
			$this->set('parent_id', $row['id']);
			$string .= $row['id'].';'.$this->get_all_string_child_id();
		}
		mysqli_free_result( $result );

		return $string;
	}

	public function get_all_string_child_id(){////last child id1; last child id2;
		global $db;

		$parent_id = $this->get('parent_id');


		$sql = "SELECT `id`, `name` FROM `". $this->class_name ."` WHERE `is_child` = '0' AND `root_id` = '0' ORDER BY `id` ASC";
		$lR = $db->executeQuery_list( $sql );
		$theLastRootID 	= $lR[COUNT($lR)-1]['id'];//lấy nhánh cuối vì option là của cái cuối

		$this->set('parent_id', $parent_id);
		$string = $this->get_all_string_child_id_recursion( $theLastRootID );

		return $string;
	}

	private function get_all_string_child_id_recursion( $theLastRootID ){
		
		$subItems 	= $this->list_by_parent_id();

		$string = '';
		foreach ($subItems as $key => $item) {
			if( $item['root_id'] == $theLastRootID ){
				$string .= $item['id'].';';
			}else{
				$this->set('parent_id', $item['id']);
				$string .= $this->get_all_string_child_id_recursion( $theLastRootID );
			}
		}
		
		return $string;

	}

	public function list_dl() {//list_all_to_download
		global $db;
		
		$sql = "SELECT ntb.*, proc.`name` product_commission_name, cgd.`value`, IF(cgd.`is_percent` = 1, 'Là phần trăm', 'Giá trị') loai  FROM (
					SELECT md.`id` department_id, md.`name` department_name, mb.`fullname`, mb.`mobile`, mb.`email`, md.`commission_group_id`, comg.`name` commission_group_name
					FROM $db->tbl_fix`member_department` md
					INNER JOIN `members` mb ON mb.`user_id` = md.`client_id`
					INNER JOIN `commission_group` comg ON comg.`id` = md.`commission_group_id`
					WHERE md.`is_child` = 1
					ORDER BY `mobile`
				) ntb
				INNER JOIN commission_group_detail cgd ON cgd.`commission_group_id` = ntb.`commission_group_id`
				INNER JOIN product_commission proc ON proc.`id` = cgd.`product_commission_id`";
		
		return $db->executeQuery_list( $sql );
			
	}

	public function list_childs( $keyword = '', $offset = '', $limit = '' ) {//List all phòng ban ở mọi cấp độ
		global $db;

		$root_id = $this->get('root_id');
		
		if( $root_id != '' ) $root_id = "AND md.`root_id` = '$root_id' ";
		if( $keyword != '' ) $keyword = "AND ( md.`name` LIKE '%$keyword%' 
												OR md.`id` = '$keyword' 
												OR md.`parent_id` = '$keyword' 
												OR mb.`mobile` LIKE '%$keyword%' 
												OR mb.`code` LIKE '%$keyword%' 
												OR mbmngt.`mobile` LIKE '%$keyword%' 
												OR mbmngt.`code` LIKE '%$keyword%' 
												) "; 
		if( $limit != '' ) $limit = "LIMIT $offset,$limit";

		$sql = "SELECT md.*,
						IFNULL(cg.`name`, 'Mặc định') commission_group_name,
						IFNULL(mb.`fullname`, '') fullname,
						IFNULL(mb.`mobile`, '') mobile,
						IFNULL(mbmngt.`fullname`, '') mngt_fullname,
						IFNULL(mbmngt.`mobile`, '') mngt_mobile,
						IFNULL(KPI.`name`, 'Mặc định' ) kpi_name,
						IFNULL(mdRoot.`name`, '' ) `root_name`
				FROM $db->tbl_fix`". $this->class_name ."` md
				LEFT JOIN $db->tbl_fix`". $this->class_name ."` mdRoot ON mdRoot.id = md.root_id AND mdRoot.is_child = 0
				LEFT JOIN  $db->tbl_fix`commission_group` cg ON cg.id = md.commission_group_id
				LEFT JOIN  $db->tbl_fix`KPI` ON KPI.id = md.kpi_id
				LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = md.client_id
				LEFT JOIN $db->tbl_fix`members` mbmngt ON mbmngt.user_id = md.client_mngt_revenue_id
				WHERE md.`is_child` = 1 $keyword $root_id
				ORDER BY `id` ASC
				$limit";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_childs_count( $keyword = '' ){
		global $db;

		$root_id = $this->get('root_id');

		if( $root_id != '' ) $root_id = "AND md.`root_id` = '$root_id' ";
		if( $keyword != '' ) $keyword = "AND ( md.`name` LIKE '%$keyword%' 
												OR md.`id` = '$keyword' 
												OR md.`parent_id` = '$keyword' 
												OR mb.`mobile` LIKE '%$keyword%' 
												OR mb.`code` LIKE '%$keyword%' 
												OR mbmngt.`mobile` LIKE '%$keyword%' 
												OR mbmngt.`code` LIKE '%$keyword%' 
												) "; 

		$sql = "SELECT COUNT(*) total
				FROM $db->tbl_fix`". $this->class_name ."` md
				LEFT JOIN $db->tbl_fix`members` mb ON mb.user_id = md.client_id
				LEFT JOIN $db->tbl_fix`members` mbmngt ON mbmngt.user_id = md.client_mngt_revenue_id
				WHERE md.`is_child` = 1 $keyword $root_id";
		
		$result = $db->executeQuery( $sql, 1 );

		return $result['total'];
	}

}