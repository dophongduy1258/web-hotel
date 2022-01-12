<?php
class shop_order_detail extends model{
    
    protected $class_name   = 'shop_order_detail';
    protected $id;
    protected $product_id;
    protected $order_id;
    protected $quantity;
    protected $price;
    protected $product_name;
    protected $code;
    protected $sku_id;
    protected $unit_import;
    protected $ratio_convert;
    protected $unit_export;
    protected $created_at;
    protected $inverse;
    
    public function add(){
        global $db_store;
        
        $arr['product_id']              = $this->get('product_id');
        $arr['order_id']                = $this->get('order_id');
        $arr['quantity']                = $this->get('quantity');
        $arr['price']                   = $this->get('price');
        $arr['product_name']            = $this->get('product_name');
        $arr['code']                    = $this->get('code');
        $arr['sku_id']                  = $this->get('sku_id');
        $arr['unit_import']             = $this->get('unit_import');
        $arr['ratio_convert']           = $this->get('ratio_convert');
        $arr['unit_export']             = $this->get('unit_export');
        $arr['inverse']                 = $this->get('inverse');
        $arr['created_at']              = time();
        
        $db_store->record_insert($db_store->tbl_fix.$this->class_name, $arr );
        
        return $db_store->mysqli_insert_id();
    }
    
    public function update(){
        global $db_store;

        $id                             = $this->get('id');

        $arr['product_id']              = $this->get('product_id');
        $arr['order_id']                = $this->get('order_id');
        $arr['quantity']                = $this->get('quantity');
        $arr['price']                   = $this->get('price');
        $arr['product_name']            = $this->get('product_name');
        $arr['code']                    = $this->get('code');
        $arr['sku_id']                  = $this->get('sku_id');
        $arr['unit_import']             = $this->get('unit_import');
        $arr['ratio_convert']           = $this->get('ratio_convert');
        $arr['unit_export']             = $this->get('unit_export');
        $arr['inverse']                 = $this->get('inverse');
        
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function list_by_order_id(){
        global $db_store;

        $order_id    = $this->get('order_id');

        $sql = "SELECT * 
                FROM ".$db_store->tbl_fix.$this->class_name."
                WHERE `order_id` = '$order_id'
                ORDER BY `id`";

        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function list_by_order_id_group(){
        global $db_store;

        $order_id    = $this->get('order_id');

        $sql = "SELECT `id`, `product_id`, `order_id`, SUM(`quantity`) quantity, `price`, `product_name`, `code`, `sku_id`, 
                        `unit_import`, `ratio_convert`, `unit_export`, `created_at`, `inverse`
                FROM ".$db_store->tbl_fix.$this->class_name."
                WHERE `order_id` = '$order_id'
                GROUP BY `product_id`, `sku_id`, `price`, `code`, `inverse`
                ORDER BY `id`";

        $rows = $db_store->executeQuery( $sql );
        $kq     = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            if( $row['quantity'] == '1' )
                $row['quantity']    = $row['quantity']*$row['ratio_convert'];
            $kq[]                   = $row;
        }

        return $kq;
    }

    public function delete_order_items( $lIDs ){
        global $db_store;
        
        $order_id    = $this->get('order_id');
        
        $sqlDelete = '';
        foreach ($lIDs as $item ) {
            $sqlDelete .= " `id` <> '$item' AND";
        }
        
        if( $sqlDelete != '' ){
            $sqlDelete .= " `order_id` = '$order_id' ";
            $db_store->record_delete( $this->class_name, $sqlDelete );
            return true;
        }

        return false;
    }

    public function get_total_by_order_id(){
        global $db_store;

        $order_id    = $this->get('order_id');

        $sql = "SELECT SUM(sTB.`price`*sTB.`quantity`) total
                FROM ".$db_store->tbl_fix.$this->class_name." sTB
                WHERE sTB.`order_id` = '$order_id'
                ORDER BY sTB.`id`";
        
        $row = $db_store->executeQuery( $sql, 1 );

        return $row['total'];
    }

    public function get_detail() {
		global $db_store;
		
		$sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `id` = '".$this->get('id')."'";
        $result = $db_store->executeQuery( $sql, 1);
        
		return $result;
    }

}
$shop_order_detail = new shop_order_detail();