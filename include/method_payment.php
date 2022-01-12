<?php
class method_payment extends model{
    protected $class_name   = 'method_payment';
    protected $id;
    protected $name;
    protected $type;//dùng phân loại ví
    protected $priority;//Độ ưu tiên ví
    protected $store_name;//Của pos nào
    protected $deleted;// length 50 character
    protected $wallet_id;//posretail.product_commission_id (cũng chính là id ví)

    public function add(){
        global $db_store, $db_pos;

        $arr['name']          = $this->get('name');
        $arr['priority']      = $this->get('priority');
        $arr['wallet_id']     = $this->get('wallet_id');
        $arr['store_name']    = $db_pos;
        $arr['deleted']       = 0;
        $arr['url']           = 'payment_card.png';
        $arr['type']          = ';0;1;';
        if( $arr['wallet_id'] == '' ) $$arr['wallet_id'] = 0;
        
        $db_store->record_insert( $db_store->tbl_fix.$this->class_name, $arr );
        
        return $db_store->mysqli_insert_id();
    }

    public function update(){
        global $db_store, $db_pos;

        $id                   = $this->get('id');

        $arr['name']          = $this->get('name');
        $arr['priority']      = $this->get('priority');
        $arr['wallet_id']     = $this->get('wallet_id');
        if( $arr['wallet_id'] == '' ) $arr['wallet_id'] = 0;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' AND `store_name` = '$db_pos' " );

        return $id;
    }

    public function delete_item(){
        global $db_store, $db_pos;

        $id                  = $this->get('id');
        $arr['deleted']      = 1;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' AND `store_name` = '$db_pos' " );

        return $id;
    }
    
    public function opt_retail(){
        global $db_store, $main, $db_pos;
        $sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `type` LIKE '%;1;%' AND ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0'  ORDER BY `priority` ";
        $rows = $db_store->executeQuery_list( $sql );

        return $main->to_opt( $rows );
    }

    public function list_payment( $except_id = '' ){
        global $db_store, $main, $db_pos;

        $sqlExcept = '';
        if( $except_id != '' ){
            $lExcept = explode( ';', $except_id );
            foreach ($lExcept as $it ) {
                if( $it != '' )
                    $sqlExcept .= " `id` <> '$it' AND ";
            }
        }

        $sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE $sqlExcept `type` LIKE '%;1;%' AND ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0' ORDER BY `priority` ";
        $rows = $db_store->executeQuery_list( $sql );
        
        return $rows;
    }

    public function opt_payment_retail( $except_id = '' ){
        global $db_store, $main;
        return $main->to_opt( $this->list_payment( $except_id ));
    }

    public function opt_FnB(){
        global $db_store, $main, $db_pos;

        $sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `type` LIKE '%;0;%' AND ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0' ORDER BY `priority` ";
        $rows = $db_store->executeQuery_list( $sql );

        return $main->to_opt( $rows );
    }

    public function get_name(){
        global $db_store, $main;

        $id = $this->get('id');

        $sql = "SELECT `name` FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `id` = '$id' LIMIT 1 ";
        
        $row = $db_store->executeQuery( $sql, 1 );
        
        return $row['name'].'';
    }
    public function get_detail(){
        global $db_store, $main;

        $id = $this->get('id');

        $sql = "SELECT * FROM ".$db_store->tbl_fix."`". $this->class_name ."` WHERE `id` = '$id' LIMIT 1 ";
        
        $row = $db_store->executeQuery( $sql, 1 );
        
        return $row;
    }

    public function get_by_list_strID( $strID ) {//list id district
        global $db_store, $db_pos;

        $sqlWhere = '';
        if( $strID != '' ){
            $l = explode(';', $strID);

            foreach( $l as $id ){
                if( $id != '' ){
                    $sqlWhere .= " `id` = '$id' OR ";
                }
            }
            $sqlWhere = " AND (".substr( $sqlWhere, 0, -3 ).")";
        }

        $sql = "SELECT *
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0'  $sqlWhere
                ORDER BY `priority` ";
        $kq = $db_store->executeQuery_list( $sql );
        
		return $kq;
    }

    public function list_by_keyword( $keyword = '', $except = '' ) {//list id district
        global $db_store, $db_pos;
        
        $l = explode(';', $except);

        $sqlExcept = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlExcept .= " AND `id` <> '$id' ";
            }
        }

        $sql = "SELECT `id`, `name`, `url`, `priority`, `store_name`, `wallet_id`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE ( `name` LIKE '%$keyword%' ) AND ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0' $sqlExcept
                ORDER BY `priority`";

        $kq = $db_store->executeQuery_list( $sql );
        
		return $kq;
    }

	public function list_retail(){

		global $db_store, $main, $db_pos;
		$sql = "SELECT * FROM ".$db_store->tbl_fix."`method_payment` WHERE `type` LIKE '%;0;%' AND ( `store_name` = '$db_pos' OR `store_name` = '' ) AND `deleted` = '0' ORDER BY `priority` ";
		$rows = $db_store->executeQuery_list( $sql );

		return $rows;
	}

}