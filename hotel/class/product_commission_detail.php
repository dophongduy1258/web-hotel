<?php
class product_commission_detail extends model{

    protected $class_name = 'product_commission_detail';
	protected $product_commission_id;
	protected $member_group_id;
	protected $value;//float
    
    public function add(){
        global $db;
        
        $arr['product_commission_id']   = $this->get('product_commission_id');
        $arr['member_group_id']         = $this->get('member_group_id');
        $arr['value']                   = $this->get('value');

		$db->record_insert($db->tbl_fix.$this->class_name , $arr );

		return $db->mysqli_insert_id();
    }

    public function add_or_update(){
        global $db;

        $d = $this->get_detail_record();
        
        if( isset($d['product_commission_id']) ){
            $product_commission_id          = $this->get('product_commission_id');
            $member_group_id                = $this->get('member_group_id');
            $arr['value']                   = $this->get('value');
            $db->record_update($db->tbl_fix.$this->class_name , $arr, " `product_commission_id` = '$product_commission_id' AND `member_group_id` = '$member_group_id' " );
            return true;
        }else{
            $arr['product_commission_id']   = $this->get('product_commission_id');
            $arr['member_group_id']         = $this->get('member_group_id');
            $arr['value']                   = $this->get('value');
            $db->record_insert($db->tbl_fix.$this->class_name , $arr );
		    return $db->mysqli_insert_id();
        }

    }

    public function get_detail_record(){
		global $db;

        $product_commission_id   = $this->get('product_commission_id');
        $member_group_id         = $this->get('member_group_id');

		$sql = "SELECT * FROM $db->tbl_fix$this->class_name
                WHERE
                `product_commission_id` = '$product_commission_id' 
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";
        
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row;
    }

    public function list_by_member_group(){//List theo nhóm thành viên được cung cấp cho từng sản phẩm
		global $db;

        $product_commission_id          = $this->get('product_commission_id');
        $member_group_id                = $this->get('member_group_id');

        $l = explode(';', $member_group_id);

        $sqlWhere = '';
        foreach ($l as $mbg_id) {
            if( $mbg_id != '' )
                $sqlWhere .= " tb.`member_group_id` = '$mbg_id' OR ";
        }

        $r = array();
        if( $sqlWhere != '' ){

            $sqlWhere = " ( ".substr($sqlWhere,0, -3)." )";
        
            $sql = "SELECT mg.`id`, mg.`name`, IFNULL(tb.`is_value`, 0) `is_value`, mg.`id` member_group_id,  IFNULL(tb.`value`, 0) `value` 
                    FROM $db->tbl_fix$this->class_name tb
                    RIGHT JOIN $db->tbl_fix`member_group` mg ON mg.`id` = tb.`member_group_id`
                    WHERE
                    `product_commission_id` = '$product_commission_id' 
                    AND $sqlWhere
                    ORDER BY tb.`value` ASC
                    ";

            $r = $db->executeQuery_list( $sql);
        }
		
		return $r;
    }
    
    public function get_commission(){
		global $db;

        $product_commission_id   = $this->get('product_commission_id');
        $member_group_id         = $this->get('member_group_id');

		$sql = "SELECT `value` FROM $db->tbl_fix$this->class_name
                WHERE
                `product_commission_id` = '$product_commission_id' 
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";
                
		$row = $db->executeQuery ( $sql, 1 );
        
		return isset($row['value'])?$row['value']+0:0;
    }
    
    public function update(){
        global $db;
        
        $product_commission_id   = $this->get('product_commission_id');
        $member_group_id         = $this->get('member_group_id');
        $arr['value']            = $this->get('value');

		$db->record_update($db->tbl_fix.$this->class_name , $arr, " `product_commission_id` = '$product_commission_id' AND `member_group_id` = '$member_group_id' " );
        
        return true;
    }
    
    public function delete_by(){
        global $db;
        
        $product_commission_id   = $this->get('product_commission_id');

        $db->record_delete( $db->tbl_fix.$this->class_name , " `product_commission_id` = '$product_commission_id' " );
        
        $arr['product_commission_id'] = 0;
		$db->record_update( $db->tbl_fix."`product`" ,$arr ," `product_commission_id` = '$product_commission_id' " );
        
        return true;
    }
    
}
$product_commission_detail = new product_commission_detail();