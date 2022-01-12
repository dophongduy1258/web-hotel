<?php
class eco_district extends model{

    protected $class_name = 'eco_district';
    protected $id;
    protected $id_city;
    protected $id_district;
    protected $name;
    protected $type;//Quận/ Huyện
    protected $priority;//Ưu tiên
    
    public function list_by() {
        global $db_store;
        
        $id_city            = $this->get('id_city');

		$sql = "SELECT `id_city` city_id, id_district id, CONCAT( `type`, ' ', `name`) `name`, `type`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_city` = '$id_city' 
                ORDER BY `priority`, `name`";
        
		$result = $db_store->executeQuery_list( $sql );
        
		return $result;
    }

    public function get_by_list_strID( $strID ) {//list id district
        global $db_store;
        
        $l = explode(';', $strID);

        $sqlWhere = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlWhere .= " `id_district` = '$id' OR ";
            }
        }

        $kq = array();

        if( $sqlWhere != '' ){
            $sqlWhere = substr( $sqlWhere, 0, -3 );
            $sql = "SELECT `id_city` city_id, id_district id, `name`, `type`
                    FROM $db_store->tbl_fix`". $this->class_name ."`
                    WHERE $sqlWhere
                    ORDER BY `priority`, `name`";
            $kq = $db_store->executeQuery_list( $sql );
        }
        
		return $kq;
    }

    public function list_by_keyword( $keyword, $district_except, $city_list ) {//list id district
        global $db_store;
        
        $l = explode(';', $district_except);
        $sqlExcept = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlExcept .= " AND `id_district` <> '$id' ";
            }
        }

        $lC = explode(';', $city_list);
        $sqlT = '';
        foreach( $lC as $ic ){
            if( $ic != '' ){
                $sqlT .= " `id_city` = '$ic' OR ";
            }
        }
        if( $sqlT != '' ){
            $sqlT = "AND (".substr($sqlT, 0, -3).")";
        }
        
        $sql = "SELECT `id_district` id, `name`, `type`, `id_city` city_id
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE ( `name` LIKE '%$keyword%' OR `type` LIKE '%$keyword%' OR CONCAT(`type`, ' ', `name` ) LIKE '%$keyword%' ) $sqlExcept $sqlT
                ORDER BY `priority`, `name` LIMIT 20";
        $kq = $db_store->executeQuery_list( $sql );
        
		return $kq;
    }
    
    public function opt_by(){

        $id_city  = $this->get('id_city');
		$l = $this->list_by();
        
        $opt = '';
        foreach( $l as $key => $item ){
            $opt .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }
        
		return $opt;
    }
    
    public function get_name() {
        global $db_store;
        
        $id_district     = $this->get('id_district');
        
		$sql = "SELECT CONCAT(`type`, ' ', `name`) `name`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_district` = '$id_district'
                LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return isset($result['name']) ? $result['name']:'';
    }

    public function get_detail_item() {
        global $db_store;
        
        $id_district     = $this->get('id_district');
        
		$sql = "SELECT id_district `id`, `name`, `type`, `id_city` city_id
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_district` = '$id_district' LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return $result;
    }

    public function list_all_items() {
        global $db_store;
        
		$sql = "SELECT `id_district` id, `name`, `type`, CONCAT(`type`, ' ' ,`name`) as name_type
                FROM $db_store->tbl_fix`$this->class_name`
                ORDER BY `priority`, `name` ";
        
		$result = $db_store->executeQuery_list( $sql );
        
		return $result;
    }

}