<?php
class eco_city extends model{

    protected $class_name = 'eco_city';
    protected $id;
    protected $id_city;
    protected $name;
    protected $type;//Thành Phố/ Tỉnh
    protected $priority;//Ưu tiên
    
    public function list_all_items() {
        global $db_store;
        
		$sql = "SELECT `id_city` id, `name`, `type`
                FROM $db_store->tbl_fix`$this->class_name`
                ORDER BY `priority`, `name` ";
        
		$result = $db_store->executeQuery_list( $sql );
        
		return $result;
    }

    public function get_by_list_strID( $strID ) {//list id district
        global $db_store;
        
        $l = explode(';', $strID);

        $sqlWhere = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlWhere .= " `id_city` = '$id' OR ";
            }
        }

        $kq = array();

        if( $sqlWhere != '' ){
            $sqlWhere = substr( $sqlWhere, 0, -3 );
            $sql = "SELECT `id_city` id, `name`, `type`
                    FROM $db_store->tbl_fix`". $this->class_name ."`
                    WHERE $sqlWhere
                    ORDER BY `priority`, `name`";
            $kq = $db_store->executeQuery_list( $sql );
        }
        
		return $kq;
    }

    public function list_by_keyword( $keyword, $city_except ) {//list id district
        global $db_store;
        
        $l = explode(';', $city_except);

        $sqlExcept = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlExcept .= " AND `id_city` <> '$id' ";
            }
        }

        $sql = "SELECT `id_city` id, `name`, `type`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE ( `name` LIKE '%$keyword%' OR `type` LIKE '%$keyword%' OR CONCAT(`type`, ' ', `name` ) LIKE '%$keyword%' ) $sqlExcept
                ORDER BY `priority`, `name` LIMIT 20";
        $kq = $db_store->executeQuery_list( $sql );
        
		return $kq;
    }

    public function opt_all(){

		$l = $this->list_all_items();
        
        $opt = '';
        foreach($l as $key => $item ){
            $opt .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }
        
		return $opt;
    }
    
    public function get_name() {
        global $db_store;
        
        $id_city     = $this->get('id_city');
        
		$sql = "SELECT CONCAT(`type`, ' ', `name`) `name`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_city` = '$id_city'
                LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return isset($result['name']) ? $result['name']:'';
    }

    public function get_detail_item() {
        global $db_store;
        
        $id_city     = $this->get('id_city');
        
		$sql = "SELECT id_city `id`, `name`, `type`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_city` = '$id_city' LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return $result;
    }

}