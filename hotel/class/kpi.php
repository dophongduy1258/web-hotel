<?php
/*
- Nhóm KPI: cho doanh số hoặc theo hoa hồng và KPI nhân sự
*/
class KPI extends model{
    
    protected $class_name = 'KPI';

    protected $id;
    protected $name;
    protected $revenue_value;
    protected $is_revenue;//Điều kiện tính KPI: = 0 theo chiết khấu; =1 theo doanh thu thực thu, =2 doanh thu giá lẻ
    protected $commission_by;//Điều kiện tính chiết khấu dựa vào: = 0 theo chiết khấu; =1 theo doanh thu thực thu, =2 doanh thu giá lẻ
    protected $revenue_list;
    protected $client_value;
    protected $client_list;
    protected $block_id;
    protected $revenue_percent;

    protected $created_by;
    protected $created_at;

    public function add(){
        global $db;

        $arr['name']                     = $this->get('name');
        $arr['revenue_value']            = $this->get('revenue_value');
        $arr['is_revenue']               = $this->get('is_revenue');
        $arr['commission_by']            = $this->get('commission_by');
        $arr['revenue_list']             = $this->get('revenue_list');
        $arr['client_value']             = $this->get('client_value');
        $arr['client_list']              = $this->get('client_list');
        $arr['revenue_percent']          = $this->get('revenue_percent');
        $arr['block_id']                 = $this->get('block_id');

        $arr['created_by']               = $this->get('created_by');
        $arr['created_at']               = time();

        $db->record_insert( $db->tbl_fix.$this->class_name, $arr );

        return $db->mysqli_insert_id();
    }

    public function update(){
        global $db;

        $id                              = $this->get('id');
        
        $arr['name']                     = $this->get('name');
        $arr['revenue_value']            = $this->get('revenue_value');
        $arr['is_revenue']               = $this->get('is_revenue');
        $arr['commission_by']            = $this->get('commission_by');
        $arr['revenue_list']             = $this->get('revenue_list');
        $arr['client_value']             = $this->get('client_value');
        $arr['client_list']              = $this->get('client_list');
        $arr['revenue_percent']          = $this->get('revenue_percent');
        $arr['block_id']                 = $this->get('block_id');

        $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
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
    	
	public function list_by_block(){
        global $db;
        
        $block_id 	= $this->get('block_id');
		if( $block_id != '' ) $block_id = "WHERE `block_id` = '$block_id' ";
		
		$sql = "SELECT * FROM $db->tbl_fix`$this->class_name` $block_id ORDER BY `name` ASC";
		$result = $db->executeQuery_list($sql);
		
		return $result;
    }

    public function list_by_block_grouped() {
		global $db;
		
		$sql = "SELECT * FROM $db->tbl_fix`block` ORDER BY `name` ASC ";
		$result = $db->executeQuery( $sql );

		$kq = array();
		while( $theBlock = mysqli_fetch_assoc($result) ){
			$this->set('block_id', $theBlock['id']);
			$theBlock['subItems'] = $this->list_by_block();
			$kq[] = $theBlock;
		}
		mysqli_free_result( $result );
		
		return $kq;
	}
    
}