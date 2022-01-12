<?php
class commission_group_detail extends model {

    protected $class_name = 'commission_group_detail';
    
	protected $id;
	protected $commission_group_id;
	protected $product_commission_id;
	protected $value;//Nhóm chiết khấu cho khách hàng cũ
	protected $value_2;//Nhóm chiết khấu cho khách hàng mới
	protected $is_percent;//cho khách hàng cũ
	protected $is_percent_2;//Cho khách hàng mới

	public function modify(){
		global $db;

		$d = $this->get_by();

		if( isset($d['id']) ){
			//update
			$this->set('id', $d['id']);
			$this->update();
			
			$commission_group_id 		= $this->get('commission_group_id');
			$product_commission_id 		= $this->get('product_commission_id');

			$id 						= $d['id'];
			$db->record_delete( $db->tbl_fix.'`'.$this->class_name.'`', " `commission_group_id` = '$commission_group_id' AND `product_commission_id` = '$product_commission_id' AND `id` <> '$id' "); 

		}else{
			//add
			$this->add();
		}

		return true;

	}
	
	public function add(){
		global $db;
		
        $arr['commission_group_id'] 			= $this->get('commission_group_id');
        $arr['product_commission_id'] 			= $this->get('product_commission_id');
        $arr['value'] 			                = $this->get('value')+0;
        $arr['value_2'] 			            = $this->get('value_2')+0;
        $arr['is_percent'] 			            = $this->get('is_percent')+0;
        $arr['is_percent_2'] 			        = $this->get('is_percent_2')+0;
        
		$db->record_insert( $db->tbl_fix.'`'.$this->class_name.'`', $arr );
		
		return $db->mysqli_insert_id();
    }

	public function update(){
		global $db;
		
        $id 			                        = $this->get('id');
        
        $arr['value'] 			                = $this->get('value')+0;
        $arr['value_2'] 			            = $this->get('value_2')+0;
		$arr['is_percent'] 			            = $this->get('is_percent')+0;
		$arr['is_percent_2'] 			        = $this->get('is_percent_2')+0;
		
		$db->record_update( $db->tbl_fix.'`'.$this->class_name.'`', $arr, " `id` = '$id' " );
		
		return true;
    }

     public function list_by_group(){
		global $db;

		$commission_group_id 	= $this->get('commission_group_id');
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`$this->class_name` WHERE `commission_group_id` = '$commission_group_id'";
		$l = $db->executeQuery_list( $sql );
        
		return $l;
	}

    public function get_by(){//get by product_commission and commission_group
		global $db;

		$commission_group_id 	= $this->get('commission_group_id');
		$product_commission_id 	= $this->get('product_commission_id');
		
		$sql = "SELECT * FROM ".$db->tbl_fix."`$this->class_name` WHERE `commission_group_id` = '$commission_group_id' AND `product_commission_id` = '$product_commission_id' LIMIT 1";
		
		$d = $db->executeQuery ( $sql , 1 );
        
		return $d;
	}
    
}