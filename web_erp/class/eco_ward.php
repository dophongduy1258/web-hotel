<?php
class eco_ward extends model{

    protected $class_name = 'eco_ward';
    protected $id;
    protected $id_district;
    protected $id_ward;
    protected $name;
    protected $type;//Quận/ Huyện
    protected $priority;//Ưu tiên
    
    public function list_by() {
        global $db_store;
        
        $id_district            = $this->get('id_district');

		$sql = "SELECT `id_district` district_id, id_ward id, CONCAT( `type`, ' ', `name`) `name`, `type`
                FROM $db_store->tbl_fix`$this->class_name`
                WHERE `id_district` = '$id_district' 
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
                $sqlWhere .= " `id_ward` = '$id' OR ";
            }
        }

        $kq = array();

        if( $sqlWhere != '' ){
            $sqlWhere = substr( $sqlWhere, 0, -3 );
            $sql = "SELECT `id_district` district_id, `id_ward` id, `name`, `type`
                    FROM $db_store->tbl_fix`". $this->class_name ."`
                    WHERE $sqlWhere
                    ORDER BY `priority`, `name`";
            $kq = $db_store->executeQuery_list( $sql );
        }
        
		return $kq;
    }

    public function list_by_keyword( $keyword, $ward_except, $district_list ) {//list id district
        global $db_store;
        
        $l = explode(';', $ward_except);
        $sqlExcept = '';
        foreach( $l as $id ){
            if( $id != '' ){
                $sqlExcept .= " AND `id_ward` <> '$id' ";
            }
        }

        $lC = explode(';', $district_list);
        $sqlT = '';
        foreach( $lC as $ic ){
            if( $ic != '' ){
                $sqlT .= " `id_district` = '$ic' OR ";
            }
        }
        if( $sqlT != '' ){
            $sqlT = "AND (".substr($sqlT, 0, -3).")";
        }
        
        $sql = "SELECT `id_ward` id, `name`, `type`, `id_district` district_id
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE ( `name` LIKE '%$keyword%' OR `type` LIKE '%$keyword%' OR CONCAT(`type`, ' ', `name` ) LIKE '$keyword' ) $sqlExcept $sqlT
                ORDER BY `priority`, `name` LIMIT 20";
        $kq = $db_store->executeQuery_list( $sql );
        
		return $kq;
    }

    public function opt_by(){

        $id_district  = $this->get('id_district');
		$l = $this->list_by();
        
        $opt = '';
        foreach( $l as $key => $item ){
            $opt .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
        }
        
		return $opt;
    }
    
    public function get_name() {
        global $db_store;
        
        $id_ward     = $this->get('id_ward');
        
		$sql = "SELECT CONCAT(`type`, ' ', `name`) `name`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_ward` = '$id_ward'
                LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return isset($result['name']) ? $result['name']:'';
    }

    public function get_detail_item() {
        global $db_store;
        
        $id_ward     = $this->get('id_ward');
        
		$sql = "SELECT id_ward `id`, `name`, `type`, id_district district_id
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `id_ward` = '$id_ward' LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return $result;
    }

}