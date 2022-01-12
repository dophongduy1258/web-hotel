<?php
class theme extends model{

    protected $class_name = 'theme';

	protected $id;
	protected $name;
	protected $shop_id;
	protected $content;
	protected $start_at;
	protected $end_at;
	protected $status;//trạng thái chạy hay dừng
	protected $note;
	protected $type;//=1 là app; = 2 là web

	protected $created_by;
	protected $created_at;

	protected $last_updated_by;
	protected $last_updated_at;

	protected $deleted;
	protected $deleted_by;

    public function add(){
        global $db;

        $arr['name']            = $this->get('name');
        $arr['shop_id']         = $this->get('shop_id');

        $arr['start_at']        = $this->get('start_at');
        $arr['end_at']          = $this->get('end_at');
        $arr['note']            = $this->get('note');
        $arr['status']          = $this->get('status');
        $arr['type']            = $this->get('type');

        $arr['content']         = $this->get('content');

        $arr['created_by']      = $this->get('created_by');
        $arr['created_at']      = time();

        $arr['last_updated_by'] = 0;
        $arr['last_updated_at'] = 0;

        $arr['deleted']         = 0;
        $arr['deleted']         = 0;

		$db->record_insert( $db->tbl_fix.$this->class_name , $arr );

        return $db->mysqli_insert_id();
    }

    public function update(){
        global $db;

        $id                     = $this->get('id');

        $arr['name']            = $this->get('name');

        $arr['start_at']        = $this->get('start_at');
        $arr['end_at']          = $this->get('end_at');
        $arr['note']            = $this->get('note');
        $arr['type']            = $this->get('type');

        $arr['content']         = $this->get('content');

        $arr['last_updated_by'] = $this->get('last_updated_by');
        $arr['last_updated_at'] = time();

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, "`id` = '$id'" );

        return true;
    }

    public function update_status(){
        global $db;

        $id                     = $this->get('id');

        $arr['status']          = $this->get('status');
        $arr['last_updated_by'] = $this->get('last_updated_by');
        $arr['last_updated_at'] = time();

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, "`id` = '$id'" );

        return true;
    }

    public function delete_item(){
        global $db;
        
        $id                         = $this->get('id');

        $arr['deleted']             = time();
        $arr['deleted']          =  $this->get('deleted');

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );

		return true;
    }

    public function get_by_name(){
		global $db;

        $shop_id                = $this->get('shop_id');
        $name                   = $this->get('name');

		$sql = "SELECT * 
                FROM $db->tbl_fix$this->class_name tb
                WHERE
                `shop_id` = '$shop_id' 
                AND `name` = '$name' 
                AND `deleted` = 0 LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );
		
		return $r;
    }

    public function get_detail_item( $member_group_id = 0, $member_title_id = 0 ){
		global $db;

        $theme_category = new theme_category();
        $theme_block    = new theme_block();

        $theItem                  = $this->get_detail();

        if( isset($theItem['content']) ){
            $theItem['content'] = json_decode($theItem['content'], true);
            if( !isset($theItem['content']) ){
                $theItem['content'] = array();
            }
        }

        foreach( $theItem['content'] as $key => $id ){
            
            $theme_block->set('id', $id);
            $d = $theme_block->get_detail_item( $member_group_id, $member_title_id );
            $theItem['content'][$key] = $d;
        }

		return $theItem;
    }

    public function get_activate_theme( $member_group_id, $member_title_id  ){
		global $db;

        $shop_id            = $this->get('shop_id');
        $type               = $this->get('type');

        $now = time();
        
		$sql = "SELECT tb.`id` 
                FROM $db->tbl_fix`$this->class_name` tb
                WHERE tb.`deleted` = '0' 
                AND tb.`shop_id` = '$shop_id'
                AND tb.`type` = '$type'
                AND tb.`status` = '1'
                AND ( 
                        (tb.`start_at` = 0 AND tb.`end_at` = 0 )
                        OR
                        (tb.`start_at` < $now AND $now < tb.`end_at` )
                    )
                ORDER BY tb.`id` DESC
                LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );

        if( isset($r['id']) ){
            $this->set('id', $r['id']);
            $d = $this->get_detail_item( $member_group_id, $member_title_id );
            return $d;
        }else{
            return array();
        }
		
    }

    public function filter( $keyword = '', $offset = '', $limit = ''){
		global $db;

        $shop_id            = $this->get('shop_id');
        $status             = $this->get('status');
        $type               = $this->get('type');
        
        if( $shop_id !== '' )
            $shop_id = "AND tb.`shop_id` = '$shop_id' ";

        if( $keyword !== '' )
            $keyword = "AND ( tb.`name` LIKE '%$keyword%' )";

        if( $status !== '' )
            $status = "AND tb.`status` = '$status' ";

        if( $type !== '' )
            $type = "AND tb.`type` = '$type' ";

        if( $limit !== '' ) $limit = "LIMIT $offset, $limit";
        
		$sql = "SELECT tb.* 
                    , IFNULL(uc.`fullname`, '-') created_by_fullname
                    , IFNULL(uu.`fullname`, '-') last_updated_by_fullname
                FROM $db->tbl_fix`$this->class_name` tb
                LEFT JOIN $db->tbl_fix`user` uc ON uc.id = tb.created_by
                LEFT JOIN $db->tbl_fix`user` uu ON uu.id = tb.last_updated_by
                WHERE tb.`deleted` = '0' $shop_id $status $type $keyword
                ORDER BY tb.`name` DESC
                $limit";

		$r = $db->executeQuery_list( $sql );
		
		return $r;
    }

    public function filter_count( $keyword = '' ){
		global $db;

        $shop_id            = $this->get('shop_id');
        $status             = $this->get('status');
        $type               = $this->get('type');
        
        if( $shop_id !== '' )
            $shop_id = "AND `shop_id` = '$shop_id' ";

        if( $keyword !== '' )
            $keyword = "AND ( `name` LIKE '%$keyword%' )";

        if( $status !== '' )
            $status = "AND `status` = '$status' ";

        if( $type !== '' )
            $type = "AND `type` = '$type' ";

		$sql = "SELECT COUNT(*) total FROM $db->tbl_fix`$this->class_name`
                WHERE `deleted` = '0' $shop_id $status $type $keyword";

		$r = $db->executeQuery( $sql, 1 );
		
		return $r['total'];
    }

}