<?php
class commission_group extends model {

    protected $class_name = 'commission_group';
    
	protected $id;
	protected $name;
	protected $created_by;
	protected $created_at;
	protected $block_id;
    
	public function add(){
		global $db;
		
        $arr['name'] 			    = $this->get('name');
        $arr['created_by'] 			= $this->get('created_by');
        $arr['block_id'] 			= $this->get('block_id');
        $arr['created_at'] 			= time();
        
		$db->record_insert( $db->tbl_fix.'`'.$this->class_name.'`', $arr );
		
		return $db->mysqli_insert_id();
    }

	public function update(){
		global $db;
		
        $id 			            = $this->get('id');
		$arr['name'] 			    = $this->get('name');
        $arr['block_id'] 			= $this->get('block_id');
        
		$db->record_update( $db->tbl_fix.'`'.$this->class_name.'`', $arr, " `id` = '$id' " );
		
		return true;
    }
	
	public function delete_group(){
		global $db;
		
        $id 			            = $this->get('id');
		$db->record_delete( $db->tbl_fix.'`'.$this->class_name.'`', " `id` = '$id' " );
		$db->record_delete( $db->tbl_fix.'`commission_group_detail`', " `commission_group_id` = '$id' " );
		
		return true;
    }
    
    public function is_existing_name(){
		global $db;

		$id 	= $this->get('id');
		$name 	= $this->get('name');

		if( $id != '' ) $id = "AND `id` <> '$id'";
		
		$sql = "SELECT `id` FROM ".$db->tbl_fix."`$this->class_name` WHERE `name` = '$name' $id LIMIT 1";
		$d = $db->executeQuery ( $sql , 1 );

		return isset($d['id']);
	}

	public function list_all_items() {
		global $db;
		
		$block_id 	= $this->get('block_id');
		if( $block_id != '' ) $block_id = "WHERE `block_id` = '$block_id' ";
		$sql = "SELECT * FROM `". $this->class_name ."` $block_id ORDER BY `name` ASC ";
		
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_by_block_grouped() {
		global $db;
		
		$sql = "SELECT * FROM $db->tbl_fix`block` ORDER BY `name` ASC ";
		$result = $db->executeQuery( $sql );

		$kq = array();
		while( $theBlock = mysqli_fetch_assoc($result) ){
			$this->set('block_id', $theBlock['id']);
			$theBlock['subItems'] = $this->list_all_items();
			$kq[] = $theBlock;
		}
		mysqli_free_result( $result );
		
		return $kq;
	}
    
}