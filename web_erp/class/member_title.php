<?php
class member_title extends model{
	
	protected $class_name = 'member_title';
	protected $id;
	protected $name;
	protected $root_id;
	protected $parent_id;
	protected $is_hidden;
	protected $priority;

	public function add(){
		global $db;

		$arr['name'] 						= $this->get('name');
		$arr['root_id'] 					= $this->get('root_id');
		$arr['parent_id'] 					= $this->get('parent_id');
		$arr['priority'] 					= 0;
		$arr['is_hidden'] 					= 0;

		$db->record_insert( $this->class_name, $arr);

		return $db->mysqli_insert_id();
	}

	public function update(){
		global $db;
		
		$id 								= $this->get('id');
		$arr['name'] 						= $this->get('name');
		
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

	// public function list_opt_all() {
	// 	global $db;
		
	// 	$sql = "SELECT `id`, `name` FROM `". $this->class_name ."` ORDER BY `id` ";
		
	// 	$result = $db->executeQuery( $sql );

	// 	$opt = '';
	// 	while($row = mysqli_fetch_assoc($result) ){
	// 		$opt .= '<option value="'.$row['id'].'">'.($row['code'] != '' ? '['.$row['code'].']':'').' '.$row['name'].'</option>';
	// 	}

	// 	return $opt;
	// }

	public function list_by_root_id() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT thisTable.*
				FROM ".$db->tbl_fix."`". $this->class_name ."` thisTable
				WHERE `root_id` = '$root_id' ORDER BY `priority`, `id` ASC ";
		
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_root_id_public() {
		global $db;

		$root_id 	= $this->get('root_id');
		$sql = "SELECT * 
                FROM ".$db->tbl_fix."`". $this->class_name ."`
                WHERE `root_id` = '$root_id' 
                AND is_hidden = '0' 
                ORDER BY `priority`, `id` ASC ";
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
		
		$sql = "SELECT thisTable.* 
                FROM ".$db->tbl_fix."`". $this->class_name ."` thisTable
				WHERE `root_id` = 0 AND `parent_id` = 0 
                ORDER BY `priority`, `id` ASC";
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
		
		$sql = "SELECT * 
                FROM ".$db->tbl_fix."`". $this->class_name ."`
                WHERE `root_id` = 0 AND `parent_id` = 0 
                ORDER BY `priority`, `id` ASC";
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

		//child_id

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
                ORDER BY `priority`, `id` ASC";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_all_child() {//list all theo tên nhóm chính
		global $db;
		
		$sql = "SELECT * 
                FROM ".$db->tbl_fix."`". $this->class_name ."` 
                WHERE `root_id` > 0 
                ORDER BY `priority`, `id` ASC";
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

	public function get_by_name( $name ) {
		global $db;
		
		$sql = "SELECT * 
                FROM $db->tbl_fix`$this->class_name` 
                WHERE `name` = '$name' LIMIT 1";
		
		$res = $db->executeQuery( $sql, 1 );

        return $res;
	}
	

	public function list_dl() {//list_all_to_download
		global $db;
		
		$sql = "SELECT ntb.* FROM $db->tbl_fix`$this->class_name` ORDER BY `priority`, `id` ";

		return $db->executeQuery_list( $sql );
	}
	
}