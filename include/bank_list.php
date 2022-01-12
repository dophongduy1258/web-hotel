<?php
class bank_list extends model{

    protected $class_name = 'bank_list';
    protected $id;
    protected $name;
    protected $short;
    protected $code;

    public function add(){
        global $db_store;

        $arr['name']               = $this->get('name');
        $arr['short']              = $this->get('short');
        $arr['code']               = $this->get('code');

        $db_store->record_insert( $db_store->tbl_fix.$this->class_name, $arr );

        return $db_store->mysqli_insert_id();
    }

    public function update(){
        global $db_store;

        $id                        = $this->get('id');

        $arr['name']               = $this->get('name');
        $arr['short']              = $this->get('short');
        $arr['code']               = $this->get('code');
        
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function list_all_item(){
        global $link, $db_store;

        $sql = "SELECT * FROM $db_store->tbl_fix`$this->class_name` WHERE priority > 0 ORDER BY `priority` ASC ";
        $rows = $db_store->executeQuery( $sql );
        $kq = array();
        while($row = mysqli_fetch_assoc($rows)){
            $row['icon'] = $link.$row['icon'];
            $kq[] = $row;
        }
        
        return $kq;
    }

    public function get_by_id(){
        global $db_store;

        $id = $this->get('id');
        $sql = "SELECT * FROM $db_store->tbl_fix`$this->class_name` WHERE id = '$id'";
        $rows = $db_store->executeQuery( $sql,1 );
        
        return $rows;
    }

}