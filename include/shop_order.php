<?php
class shop_order extends model{
    
    protected $class_name   = 'shop_order';
    protected $id;
    protected $from_pos_id;
    protected $to_pos_id;
    protected $shop_id;
    protected $shop_name;
    protected $warehouse_id;
    protected $warehouse_name;
    protected $user_created;
    protected $user_created_fullname;
    protected $no_product;
    protected $no_item;
    protected $total;
    protected $method_payment;
    protected $promotion;
    protected $address;
    protected $status;
    protected $created_at;
    protected $provider_id;
    
    public function add(){
        global $db_store;
        
        $arr['from_pos_id']             = $this->get('from_pos_id');
        $arr['to_pos_id']               = $this->get('to_pos_id');
        $arr['shop_id']                 = $this->get('shop_id');
        $arr['shop_name']               = $this->get('shop_name');
        $arr['warehouse_id']            = $this->get('warehouse_id');
        $arr['warehouse_name']          = $this->get('warehouse_name');
        $arr['user_created']            = $this->get('user_created');
        $arr['user_created_fullname']   = $this->get('user_created_fullname');
        // $arr['no_product']              = $this->get('no_product');
        // $arr['no_item']                 = $this->get('no_item');
        // $arr['total']                   = $this->get('total');
        $arr['address']                 = $this->get('address');
        $arr['promotion']               = $this->get('promotion');
        $arr['method_payment']          = $this->get('method_payment');
        $arr['status']                  = 0;
        $arr['created_at']              = time();
        $arr['providers_id']            = $this->get('providers_id');

        $db_store->record_insert($db_store->tbl_fix.$this->class_name, $arr );
        
        return $db_store->mysqli_insert_id();
    }
    
    public function update(){
        global $db_store;

        $id                             = $this->get('id');

        $arr['method_payment']          = $this->get('method_payment');
        // $arr['shop_id']                 = $this->get('shop_id');
        // $arr['shop_name']               = $this->get('shop_name');
        // $arr['warehouse_id']            = $this->get('warehouse_id');
        // $arr['warehouse_name']          = $this->get('warehouse_name');
        $arr['address']                 = $this->get('address');
        $arr['promotion']               = $this->get('promotion');
        $arr['no_product']              = $this->get('no_product');
        $arr['no_item']                 = $this->get('no_item');
        $arr['total']                   = $this->get('total');
        
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_by_from_pos(){
        global $db_store;

        $id                             = $this->get('id');

        $arr['shop_id']                 = $this->get('shop_id');
        $arr['shop_name']               = $this->get('shop_name');
        $arr['warehouse_id']            = $this->get('warehouse_id');
        $arr['warehouse_name']          = $this->get('warehouse_name');
                
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_static_order(){
        global $db_store;
        
        $id                             = $this->get('id');
        
        $arr['no_product']              = $this->get('no_product');
        $arr['no_item']                 = $this->get('no_item');
        $arr['total']                   = $this->get('total');
        
        $db_store->record_update($db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function update_status(){
        global $db_store;
        
        $id                             = $this->get('id');
        
        $arr['status']                  = $this->get('status');
            
        $db_store->record_update($db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function update_checked(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['status']          = 1;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");
        
        return true;
    }

    public function update_exported(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['status']          = 2;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_imported(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['status']          = 3;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function get_detail() {
		global $db_store;
		
		$sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `id` = '".$this->get('id')."'";
        $result = $db_store->executeQuery( $sql, 1);
        
		return $result;
    }
    
    public function searching( $keyword ){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        $type = "
                ( ( `from_pos_id` = '$from_pos_id' OR `from_pos_id` = '$from_pos_id' ) AND od.`id` LIKE '%$keyword%' ) OR
                ( `from_pos_id` = '$from_pos_id' AND pos_to.`store_title` LIKE '%$keyword%' ) OR
                ( `to_pos_id`   = '$from_pos_id' AND pos_from.`store_title` LIKE '%$keyword%' )
                ";

        $sql = "SELECT `od`.*, pos_from.`store_title` `from_pos_name`, pos_to.`store_title` `to_pos_name` FROM ".$db_store->tbl_fix.$this->class_name." `od`
                LEFT JOIN ".$db_store->tbl_fix."pos_register `pos_from` ON pos_from.`id` = od.`from_pos_id`
                LEFT JOIN ".$db_store->tbl_fix."pos_register `pos_to` ON pos_to.`id` = od.`to_pos_id`
                WHERE
                $type
                ORDER BY `id` ";
        
        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function filter( $type, $from, $to, $ofset = '', $limit = '' ){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');
        if( $type != '' ){
            if( $type == '0' )
                $type = " AND od.`from_pos_id` = '$from_pos_id' ";
            else
                $type = " AND od.`to_pos_id` = '$from_pos_id' ";
        }else{
             $type = " AND ( od.`from_pos_id` = '$from_pos_id' OR od.`to_pos_id` = '$from_pos_id' )  ";
        }

        if( $limit != '' ) $limit = " $ofset, $limit ";

        $sql = "SELECT od.*, pos_from.`store_title` `from_pos_name`, pos_to.`store_title` `to_pos_name`
                FROM ".$db_store->tbl_fix.$this->class_name." od
                LEFT JOIN ".$db_store->tbl_fix."pos_register `pos_from` ON pos_from.`id` = od.`from_pos_id`
                LEFT JOIN ".$db_store->tbl_fix."pos_register `pos_to` ON pos_to.`id` = od.`to_pos_id`
                WHERE
                (('$from' < od.`created_at` AND od.`created_at` < '$to' ) OR od.`status` < 3)
                $type
                ORDER BY od.`id` $limit ";

        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }
    
    public function filter_count( $type, $from, $to ){
        global $db_store;
        
        $from_pos_id    = $this->get('from_pos_id');
        if( $type != '' ){
            if( $type == '0' )
                $type = " AND `from_pos_id` = '$from_pos_id' ";
            else
                $type = " AND `to_pos_id` = '$from_pos_id' ";
        }else{
             $type = " AND ( `from_pos_id` = '$from_pos_id' OR `to_pos_id` = '$from_pos_id' )  ";
        }

        $sql = "SELECT COUNT(*) total FROM ".$db_store->tbl_fix.$this->class_name." WHERE (('$from' < `created_at` AND `created_at` < '$to' ) OR `status` < 3) $type ";
        $row = $db_store->executeQuery( $sql, 1 );

        return $row['total']+0;
    }

}
$shop_order = new shop_order();