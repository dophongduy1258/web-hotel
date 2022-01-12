<?php
class bank_info extends model{

protected $class_name = 'bank_info';
protected $id;
protected $bank_id;
protected $name;
protected $number;
protected $bank;
protected $branch;
protected $client_id;

public function add(){
    global $db;

    $arr['bank_id']         = $this->get('bank_id');
    $arr['name']            = $this->get('name');
    $arr['number']          = $this->get('number');
    $arr['bank']            = $this->get('bank');
    $arr['branch']          = $this->get('branch');
    $arr['client_id']     = $this->get('client_id');
    
    $db->record_insert( $db->tbl_fix.$this->class_name, $arr );
    
    return $db->mysqli_insert_id();
}

public function update_done(){
    global $db;

    $id = $this->get('id');

    $arr['name']            = $this->get('name');
    $arr['number']          = $this->get('number');
    $arr['bank']            = $this->get('bank');
    $arr['branch']          = $this->get('branch');

    $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
    
    return true;
}

public function update(){
    global $db;

    $client_id    = $this->get('client_id');
    $bank_id        = $this->get('bank_id');

    $arr['name']            = $this->get('name');
    $arr['number']          = $this->get('number');
    $arr['bank']            = $this->get('bank');
    $arr['branch']          = $this->get('branch');

    $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `client_id` = '$client_id' AND `bank_id` = '$bank_id' " );
    
    return true;
}

public function delete_by(){
    global $db;

    $id             = $this->get('id');
    $client_id    = $this->get('client_id');

    $db->record_delete( $db->tbl_fix.$this->class_name, " `id` = '$id' AND `client_id` = '$client_id' " );
    
    return true;
}

public function check_is_exist() {
    global $db;
    
    $client_id        = $this->get('client_id');
    $bank_id            = $this->get('bank_id');
    
    $sql = "SELECT binfo.`id`
            FROM `". $this->class_name ."` binfo
            WHERE binfo.`client_id` = '$client_id' AND binfo.`bank_id` = '$bank_id' LIMIT 1";
    
    $r = $db->executeQuery( $sql, 1 );

    if( isset($r['id']) )
        return true;
    return false;
}

public function list_by( $ofset, $limit = '' ) {
    global $db, $db_store, $link;
    
    $client_id        = $this->get('client_id');
    if( $limit != '' ) $limit = "LIMIT $ofset, $limit";
    
    $sql = "SELECT binfo.*, b.`bank_name`, b.`bank_code`, b.`url`, blist.`icon`
            FROM `". $this->class_name ."` binfo
            LEFT JOIN `bank` b ON `b`.id = binfo.`bank_id`
            LEFT JOIN ".$db_store->tbl_fix."`bank_list` blist ON binfo.bank_id = blist.id
            WHERE binfo.`client_id` = '$client_id'
            $limit";

    $result = $db->executeQuery( $sql );

    $kq = array();
    While($row = mysqli_fetch_assoc($result)){
        $row['icon'] = $link.$row['icon'];
        $kq[] = $row;
    }

    return $kq;
}

}
$bank_info =  new bank_info();