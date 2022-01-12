<?php
/*
- PHân nhóm khối phòng ban trong công ty: Khối kinh doanh, khối IT, Khối support
*/
class contact_list extends model{
    
    protected $class_name = 'contact_list'; //Bảng quản lý danh sách yêu cầu liên hệ của khách hàng
    protected $id;
    protected $fullname;  //họ và tên
    protected $email;
    protected $mobile;
    protected $content;  // nội dung liên hệ
    protected $code;  // mã xác nhận
    protected $status; //trạng thái 0 = đang chờ, 1 = liên hệ lại, 2 = đã liên hệ
    protected $note; //Ghi chú
    protected $created_at; //Thời gian

    public function add(){
        global $db;

        $arr['fullname']                  = $this->get('fullname');
        $arr['email']                     = $this->get('email');
        $arr['mobile']                    = $this->get('mobile');
        $arr['content']                   = $this->get('content');
        $arr['code']                      = $this->get('code');
        $arr['status']                    = 0;
        $arr['created_at']                = time();

        $db->record_insert( $db->tbl_fix.$this->class_name, $arr );
        
        return $db->mysqli_insert_id();
    }

    public function update(){
        global $db;

        $id                             = $this->get('id');
        $arr['status']                  = $this->get('status');
        $arr['note']                    = $this->get('note');

        $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function filter($keyword, $offset, $limit){
        global $db;

        $status = $this->get('status');
        if($status != ''){
            $status = "AND tb.`status` = '$status'";
        }else{
            $status = "";
        }

        if ($keyword != '') $keyword = " AND (tb.`fullname` LIKE '%$keyword%' OR tb.`mobile` LIKE '%$keyword%' OR tb.`email` LIKE '%$keyword%')";

        if ($limit != '') $limit = " LIMIT $offset,$limit ";

        $sql="SELECT * FROM $db->tbl_fix`$this->class_name` tb WHERE 1 $status $keyword ORDER BY tb.`status` $limit";
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function filter_count($keyword){
        global $db;

        $status = $this->get('status');
        if($status != ''){
            $status = "AND tb.`status` = '$status'";
        }else{
            $status = "";
        }

        if ($keyword != '') $keyword = " AND (tb.`fullname` LIKE '%$keyword%' OR tb.`mobile` LIKE '%$keyword%' OR tb.`email` LIKE '%$keyword%')";

        $sql="SELECT COUNT(*) total FROM $db->tbl_fix`$this->class_name` tb WHERE 1 $status $keyword";
        $result = $db->executeQuery($sql,1);
        return $result['total']+0;
    }

}