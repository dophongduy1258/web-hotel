<?php
class theme_category extends model{

    protected $class_name = 'theme_category';
	protected $id;
	protected $shop_id;
	protected $name;
	protected $icon;
	protected $img;//object
	protected $is_slide;
	protected $created_at;
	protected $created_by;
	protected $last_updated_at;
	protected $last_updated_by;
	protected $is_hidden;
	protected $slide_type;
	protected $slide_value;
	protected $root_id;
	protected $parent_id;
	protected $level;
	protected $hidden;
	protected $priority;
	protected $child_size;
	protected $deleted;

    public function add(){
        global $db;
        
        $arr['shop_id']             = $this->get('shop_id');

        $arr['name']                = $this->get('name');
        $arr['icon']                = $this->get('icon');
        $arr['img']                 = $this->get('img');//text
        $arr['is_slide']            = $this->get('is_slide');

        $arr['slide_type']          = $this->get('slide_type');
        $arr['slide_value']         = $this->get('slide_value');
        $arr['root_id']             = $this->get('root_id');

        $arr['parent_id']           = $this->get('parent_id');
        $arr['level']               = $this->get('level');
        $arr['hidden']              = $this->get('hidden');

        $arr['priority']            = $this->get('priority');
        $arr['child_size']          = $this->get('child_size');
        $arr['created_by']          = $this->get('created_by');
        $arr['last_updated_by']     = $this->get('last_updated_by')+0;
        $arr['last_updated_at']     = 0;
        $arr['created_at']          = time();
        $arr['deleted']             = 0;

		$db->record_insert( $db->tbl_fix.$this->class_name , $arr );

		$id = $db->mysqli_insert_id();
        if( $arr['root_id'] == 0 && $arr['parent_id'] == 0 ){
            $arrN['root_id']   = $id;
		    $db->record_update( $db->tbl_fix.$this->class_name , $arrN, " `id` = '$id' " );
        }
        return $id;
    }

    public function update(){
        global $db;
        
        $id                         = $this->get('id');

        $arr['name']                = $this->get('name');
        $arr['icon']                = $this->get('icon');
        $arr['img']                 = $this->get('img');
        $arr['is_slide']            = $this->get('is_slide');

        $arr['slide_type']          = $this->get('slide_type');
        $arr['slide_value']         = $this->get('slide_value');
        $arr['root_id']             = $this->get('root_id');

        $arr['parent_id']           = $this->get('parent_id');
        $arr['level']               = $this->get('level');
        $arr['hidden']              = $this->get('hidden');

        $arr['priority']            = $this->get('priority');
        $arr['child_size']          = $this->get('child_size');
        $arr['last_updated_by']     = $this->get('last_updated_by');
        $arr['last_updated_at']     = time();

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );

		return true;
    }

    public function get_detail_item(){
		global $db;

        $id     = $this->get('id');
        $hidden = $this->get('hidden');
        
        $this->set('id', $id);
        $d    = $this->get_detail();

        $img = array();
        if( isset($d['img']) && $d['img'] != '' ){
            $img = json_decode($d['img'], true);
            if( !$img )
                $img = array();//Nếu parse JSON lỗi thì trả về array rỗng
        }
        if( isset($d['id']) ){
            $d['img_list'] = $img;
            
            $this->set('parent_id', $d['id']);
            $this->set('hidden', $hidden);
            $d['l'] = $this->list_cat_by_parent();
        }
        
		return $d;
    }

    public function delete_item(){
        global $db;
        
        $id                         = $this->get('id');
        $arr['deleted']             = 1;
		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );

		return true;
    }

    public function update_child_root_branch(){//Cập nhật toàn bộ nhánh qua nhánh mới; chính bản thân nó đã được update rồi $id
		global $db;

        $id         = $this->get('id');//id cha 
        $root_id    = $this->get('root_id');//root_id của cha=> giá trị không đổi toàn nhánh
        $level      = $this->get('level');//level của cha các con +1

        $this->set('parent_id', $id);
        $l = $this->list_cat_by_parent();//Lấy list con

        $arr['root_id']             = $root_id;
        $arr['level']               = $level + 1;
        
        if( COUNT($l) > 0 ){//Tìm và con
            foreach ($l as $key => $value) {

                $this->set('parent_id', $value['id']);
                $sList = $this->list_cat_by_parent();
                
                if( COUNT($sList) > 0 ){
                    $this->set('id', $value['id']);
                    $this->set('root_id', $root_id);
                    $this->set('level', $level + 1);
                    $this->update_child_root_branch();
                }

		        $db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '".$value['id']."' " );//Xóa cha
            }
        }

        return true;
    }

    public function delete_branch(){
		global $db;

        $id         = $this->get('id');
        $this->set('parent_id', $id);
        $l = $this->list_cat_by_parent();//Lấy list con

        $arr['deleted']             = 1;
		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );//Xóa cha
        
        if( COUNT($l) > 0 ){//Tìm và con
            foreach ($l as $key => $value) {
                $this->set('parent_id', $value['id']);
                $sList = $this->list_cat_by_parent();
                if( COUNT($sList) > 0 ){
                    $this->delete_branch();
                }else{
		            $db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '".$value['id']."' " );//Xóa cha
                }
            }
        }

        return true;
    }

    public function update_hidden_branch(){
		global $db;

        $id                 = $this->get('id');
        $arr['hidden']      = $this->get('hidden') != 1 ? 0:1;

        $this->set('parent_id', $id);
        $this->set('hidden', '');
        $l = $this->list_cat_by_parent();//Lấy list con

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );//Cập nhật nó

        if( COUNT($l) > 0 ){//Tìm và con
            foreach ($l as $key => $value) {
                $this->set('parent_id', $value['id']);
                $this->set('hidden', '');
                $sList = $this->list_cat_by_parent();
                if( COUNT($sList) > 0 ){
                    $this->set('id', $value['id']);
                    $this->set('hidden', $arr['hidden']);//do hàm list_cat_by_parent không được set hidden nên phải set lại
                    $this->update_hidden_branch();
                }else{
		            $db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '".$value['id']."' " );//Cập nhật nó
                }
            }
        }

        return true;
    }
    
    public function get_by_name(){
		global $db;

        $shop_id                = $this->get('shop_id');
        $name                   = $this->get('name');
        $is_slide               = $this->get('is_slide');
        if( $is_slide !== '' ) $is_slide = "AND tb.`is_slide` = '$is_slide' ";

		$sql = "SELECT * 
                FROM $db->tbl_fix$this->class_name tb
                WHERE
                `shop_id` = '$shop_id' 
                AND `name` = '$name' 
                AND `deleted` = 0 
                $is_slide LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );
		
		return $r;
    }

    public function filter( $keyword, $offset = '', $limit = ''){
		global $db;

        $shop_id        = $this->get('shop_id');
        $hidden         = $this->get('hidden');
        $is_slide       = $this->get('is_slide');

        if( $keyword != '' )
            $keyword = "AND tb.`name` LIKE '%$keyword%' ";

        if( $hidden !== '' ){
            $hidden = "AND `hidden` = '$hidden' ";
        }
        if( $is_slide !== '' ){
            $is_slide = "AND `is_slide` = '$is_slide' ";
        }

        if( $limit !== '' ) $limit = "LIMIT $offset, $limit";

		$sql = "SELECT * 
                FROM $db->tbl_fix$this->class_name tb
                WHERE `deleted` = 0 
                AND `shop_id` = '$shop_id' 
                $is_slide
                $keyword
                $hidden
                ORDER BY `root_id`, `level`, `name` DESC
                $limit";

		$r = $db->executeQuery_list( $sql );
		
		return $r;
    }

    public function filter_count( $keyword){
		global $db;

        $shop_id        = $this->get('shop_id');
        $hidden         = $this->get('hidden');
        $is_slide         = $this->get('is_slide');

        if( $keyword != '' )
            $keyword = "AND tb.`name` LIKE '%$keyword%' ";

        if( $hidden != '' ){
            $hidden = "AND tb.`hidden` = '$hidden' ";
        }

        if( $is_slide !== '' ){
            $is_slide = "AND `is_slide` = '$is_slide' ";
        }

		$sql = "SELECT COUNT(*) total
                FROM $db->tbl_fix$this->class_name tb
                WHERE `deleted` = 0 
                AND `shop_id` = '$shop_id' 
                $is_slide
                $keyword
                $hidden";
        
		$r = $db->executeQuery( $sql ,1 );
		
		return $r['total'];
    }

    public function list_all_position( &$kq ){//list all item in right position
		global $db;

        $parent_id  = $this->get('parent_id');
        $is_slide   = $this->get('is_slide');

        if( $is_slide !== '' ) $is_slide = "AND `is_slide` = '0'";

        if( $parent_id == '' || $parent_id < 1 ){

            $shop_id  = $this->get('shop_id');
            $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0 
                    AND `parent_id` = '0' 
                    AND `shop_id` = '$shop_id'
                    $is_slide
                    ORDER BY `priority` DESC";

		    $l = $db->executeQuery_list( $sql );

        }else{

            $this->set('parent_id', $parent_id);
            $this->set('hidden', '');
            $l = $this->list_cat_by_parent();

        }
        

        if( COUNT($l) > 0 ){
            foreach ($l as $key => $value) {
                $kq[] = $value;
                $this->set('hidden', '');
                $this->set('parent_id', $value['id']);
                $sList = $this->list_cat_by_parent();
                if( COUNT($sList) > 0 ){
                    $this->list_all_position($kq);
                }
            }
        }

        return true;
    }

    public function filter_category(){//with sub list item
		global $db;

        $parent_id  = $this->get('parent_id');
        
        $this->set('parent_id', $parent_id);
        $l = $this->list_cat_by_parent();

        if( COUNT($l) > 0 ){
            foreach ($l as $key => $value) {
                $this->set('parent_id', $value['id']);
                $sList = $this->list_cat_by_parent();
                if( COUNT($sList) > 0 ){
                    $l[$key]['l'] = $this->filter_category();
                }else{
                    $l[$key]['l'] = array();//dừng
                }
            }
        }

        return $l;
    }

    public function filter_category_count(){//with sub list item
		global $db;

        $shop_id        = $this->get('shop_id');
        $hidden         = $this->get('hidden');

        if( $hidden !== '' ){
            $hidden = "AND `hidden` = '$hidden' ";
        }

		$sql = "SELECT COUNT(*) total
                FROM $db->tbl_fix$this->class_name tb
                WHERE `deleted` = 0 
                AND `shop_id` = '$shop_id' 
                AND `is_slide` = '0' 
                $hidden";

		$r = $db->executeQuery( $sql, 1 );
		
		return $r['total'];
    }

    public function list_cat_by_parent( $offset = '', $limit = '' ){
		global $db;
        
        $hidden         = $this->get('hidden');
        $parent_id      = $this->get('parent_id');

        if( $hidden !== '' ){
            $hidden = "AND `hidden` = '$hidden' ";
        }

        if( $limit !== '' ) $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT * 
                FROM $db->tbl_fix$this->class_name tb
                WHERE `deleted` = 0 
                AND `parent_id` = '$parent_id' 
                AND `is_slide` = '0' 
                $hidden
                ORDER BY `priority` DESC
                $limit";

		$r = $db->executeQuery_list( $sql );
		
		return $r;
    }
    
}