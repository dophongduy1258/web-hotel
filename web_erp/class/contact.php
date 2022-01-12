<?php
class contact extends model{

protected $class_name = 'contact';
protected $id;
protected $client_id;
protected $fullname;
protected $mobile;
protected $email;

public function add(){
    global $db;

    $arr['client_id']       = $this->get('client_id')+0;
    $arr['fullname']        = $this->get('fullname');
    $arr['mobile']          = $this->get('mobile');
    $arr['email']           = $this->get('email');
    
    $db->record_insert( $db->tbl_fix.$this->class_name, $arr );
    
    return $db->mysqli_insert_id();
}

public function update_done(){
    global $db;

    $id = $this->get('id');

    $arr['fullname']        = $this->get('fullname');
    $arr['mobile']          = $this->get('mobile');
    $arr['email']           = $this->get('email');

    $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
    
    return true;
}

public function delete_by(){
    global $db;

    $id             = $this->get('id');
    $client_id    = $this->get('client_id');

    $db->record_delete( $db->tbl_fix.$this->class_name, " `id` = '$id' AND `client_id` = '$client_id' " );
    
    return true;
}

public function list_by( $ofset, $limit = '' ) {
    global $db;
    
    $client_id        = $this->get('client_id');
    if( $limit != '' ) $limit = "LIMIT $ofset, $limit";
    
    $sql = "SELECT * FROM `". $this->class_name ."`
            WHERE `client_id` = '$client_id'
            $limit";

    $result = $db->executeQuery_list( $sql );

    return $result;
}

public function auto_complete( $keyword ){
    global $db;

    $client_id        = $this->get('client_id');
    
    $sql = "SELECT * FROM `". $this->class_name ."`
            WHERE `client_id` = '$client_id' AND ( `fullname` LIKE '%$keyword%' OR  `email` LIKE '%$keyword%' )
            LIMIT 10";

    $result = $db->executeQuery_list( $sql );

    return $result;
}

public function list_all_by_id(){
    global $db;

    $client_id        = $this->get('client_id');
    
    $sql = "SELECT * FROM `". $this->class_name ."`
            WHERE `client_id` = '$client_id'";

    $result = $db->executeQuery_list( $sql );

    return $result;
}

public function list_all_by_id_count(){
    global $db;

    $client_id        = $this->get('client_id');
    
    $sql = "SELECT COUNT(*) total FROM `". $this->class_name ."`
            WHERE `client_id` = '$client_id'";

    $result = $db->executeQuery( $sql,1 );

    return $result['total']+0;
}

}
$contact =  new contact();