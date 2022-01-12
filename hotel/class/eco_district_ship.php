<?php
class eco_district_ship extends model{

    protected $class_name = 'eco_district_ship';
    protected $id;
    protected $name;
    protected $district_id;
    protected $new_id;
    protected $city_id;
    protected $partner_id; //Đối tác ship (goship, ...)
    
    public function add(){
        global $db_store;
    
        $arr['name']            = $this->get('name');
        $arr['district_id']     = $this->get('district_id');
        $arr['new_id']          = $this->get('new_id');
        $arr['city_id']         = $this->get('city_id');
        $arr['partner_id']      = $this->get('partner_id');
        
        $db_store->record_insert( $db_store->tbl_fix.$this->class_name, $arr );
        
        return $db_store->mysqli_insert_id();
    }

    public function update(){
        global $db_store;
    
        $id = $this->get('id');
    
        $arr['name']            = $this->get('name');
        $arr['district_id']     = $this->get('district_id');
        $arr['new_id']          = $this->get('new_id');
        $arr['city_id']         = $this->get('city_id');
        $arr['partner_id']      = $this->get('partner_id');
    
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function list_all_items() {
        global $db_store;
        
		$sql = "SELECT *
                FROM $db_store->tbl_fix`$this->class_name`
                ORDER BY `name` ";
        
		$result = $db_store->executeQuery_list( $sql );
        
		return $result;
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
        
        $district_id     = $this->get('district_id');
        
		$sql = "SELECT `name`
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `district_id` = '$district_id'
                LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return isset($result['name']) ? $result['name']:'';
    }

    public function get_detail_item() {
        global $db_store;
        
        $district_id     = $this->get('district_id');
        $partner_id     = $this->get('partner_id');
        
		$sql = "SELECT *
                FROM $db_store->tbl_fix`". $this->class_name ."`
                WHERE `district_id` = '$district_id' AND `partner_id` = '$partner_id' LIMIT 1";
        
		$result = $db_store->executeQuery( $sql, 1 );
        
		return $result;
    }

    public function list_all_items_by_page($offset, $limit) {
        global $db_store;

        if($limit != '') $limit = "LIMIT $offset, $limit";
        
		$sql = "SELECT *
                FROM $db_store->tbl_fix`$this->class_name`
                ORDER BY `name` 
                $limit";
        
		$result = $db_store->executeQuery_list( $sql );
        
		return $result;
    }

}