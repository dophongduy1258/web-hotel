<?php

// layout:{
// "slide_cate":"big | small",
//  "cate":"landscape | portrait",
// "product":"andscape | portrait"
// }
class theme_block extends model
{

    protected $class_name = 'theme_block';

    protected $id;
    protected $name;
    protected $name_show;
    protected $shop_id;
    protected $category_1;
    protected $category_2;
    protected $category_layout; //landscape | portrait
    protected $category_size; //big = Hình banner | small = icon và tên
    protected $category_number; //big = Hình banner | small = icon và tên
    protected $category_show_more;
    protected $category_row;

    protected $product_1; //
    protected $product_2; //
    protected $product_layout; //landscape | portrait
    protected $product_number; //landscape | portrait
    protected $product_show_more;
    protected $product_row;

    protected $slide; //slide_id
    protected $slide_size; //size: small/ big
    protected $note; //Ghi chú

    protected $created_at; //
    protected $created_by; //
    protected $last_updated_by; //
    protected $last_updated_at; //
    protected $deleted; //
    protected $deleted_by; //
    protected $priority; //

    public function add()
    {
        global $db;

        $arr['name']            = $this->get('name');
        $arr['name_show']       = $this->get('name_show');
        $arr['shop_id']         = $this->get('shop_id');

        $arr['category_1']      = $this->get('category_1');
        $arr['category_2']      = $this->get('category_2');
        $arr['category_layout'] = $this->get('category_layout');
        $arr['category_number'] = $this->get('category_number');
        $arr['category_size']   = $this->get('category_size');
        $arr['category_show_more'] = $this->get('category_show_more');
        $arr['category_row']    = $this->get('category_row');

        $arr['product_1']       = $this->get('product_1');
        $arr['product_2']       = $this->get('product_2');
        $arr['product_layout']  = $this->get('product_layout');
        $arr['category_number'] = $this->get('category_number');
        $arr['product_show_more'] = $this->get('product_show_more');
        $arr['product_row']     = $this->get('product_row');

        $arr['slide']           = $this->get('slide');
        $arr['slide_size']      = $this->get('slide_size');
        $arr['note']            = $this->get('note');

        $arr['created_by']      = $this->get('created_by');

        $arr['priority']        = time();
        $arr['last_updated_by'] = 0;
        $arr['last_updated_at'] = 0;
        $arr['created_at']      = time();
        $arr['deleted']         = 0;
        $arr['deleted_by']      = 0;

        $db->record_insert($db->tbl_fix . $this->class_name, $arr);

        return $db->mysqli_insert_id();
    }

    public function update()
    {
        global $db;

        $id                     = $this->get('id');

        $arr['name']            = $this->get('name');
        $arr['name_show']       = $this->get('name_show');

        $arr['category_1']      = $this->get('category_1');
        $arr['category_2']      = $this->get('category_2');
        $arr['category_layout'] = $this->get('category_layout');
        $arr['category_number'] = $this->get('category_number');
        $arr['category_size']   = $this->get('category_size');
        $arr['category_show_more'] = $this->get('category_show_more');
        $arr['category_row']    = $this->get('category_row');

        $arr['product_1']       = $this->get('product_1');
        $arr['product_2']       = $this->get('product_2');
        $arr['product_layout']  = $this->get('product_layout');
        $arr['category_number'] = $this->get('category_number');
        $arr['product_show_more'] = $this->get('product_show_more');
        $arr['product_row']     = $this->get('product_row');

        $arr['slide']           = $this->get('slide');
        $arr['slide_size']      = $this->get('slide_size');
        $arr['note']            = $this->get('note');

        $arr['last_updated_by'] = $this->get('last_updated_by');
        $arr['last_updated_at'] = time();

        $db->record_update($db->tbl_fix . $this->class_name, $arr, "`id` = '$id'");

        return $db->mysqli_insert_id();
    }

    public function delete_item()
    {
        global $db;

        $id                         = $this->get('id');

        $arr['deleted']             = time();
        $arr['deleted_by']          =  $this->get('deleted_by');

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_position($type)
    {
        global $db;

        $id                         = $this->get('id');

        if ($type == 'push') {
            //push to top
            $arr['priority'] = time();
        } else {
            //pull to button
            $arr['priority'] = -1 * time();
        }

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function get_by_name()
    {
        global $db;

        $shop_id                = $this->get('shop_id');
        $name                   = $this->get('name');

        $sql = "SELECT * 
                FROM $db->tbl_fix$this->class_name tb
                WHERE
                `shop_id` = '$shop_id' 
                AND `name` = '$name' 
                AND `deleted` = 0 LIMIT 1";

        $r = $db->executeQuery($sql, 1);

        return $r;
    }

    public function get_detail_item($member_group_id = 0)
    {
        global $db, $main, $product;

        $theme_category = new theme_category();
        $theme_product  = new theme_product();

        $d                  = $this->get_detail();

        if ($d['category_1'] > 0) {

            $theme_category->set('id', $d['category_1']);
            $dT = $theme_category->get_detail();
            $d['category_1_name'] = $dT['name'];

            $theme_category->set('shop_id', $d['shop_id']);
            $theme_category->set('parent_id', $d['category_1']);
            $theme_category->set('hidden', '');
            $d['category_1_list'] = $theme_category->list_cat_by_parent(0, $d['category_number']);
        } else {
            $d['category_1_name'] = '';
            $d['category_1_list'] = array();
        }

        if ($d['category_2'] > 0) {

            $theme_category->set('id', $d['category_2']);
            $dT = $theme_category->get_detail();
            $d['category_2_name'] = $dT['name'];

            $theme_category->set('shop_id', $d['shop_id']);
            $theme_category->set('parent_id', $d['category_2']);
            $theme_category->set('hidden', '');
            $d['category_2_list'] = $theme_category->list_cat_by_parent(0, $d['category_number']);
        } else {
            $d['category_2_name'] = '';
            $d['category_2_list'] = array();
        }

        if ($d['product_1'] > 0) {

            $theme_category->set('id', $d['product_1']);
            $dT = $theme_category->get_detail();
            $d['product_1_name'] = $dT['name']; //category theme for product 1 name

            $theme_product->set('theme_cat_id', $d['product_1']);
            $d['product_1_list'] = $theme_product->list_by_theme_cat_id(0, $d['product_number']); //Nhớ bỏ product_id đã hide

            foreach ($d['product_1_list'] as $key => $value) {
                $d['product_1_list'][$key] = $product->detail_product_general($value['product_commission_id'], $member_group_id, $value);
                $d['product_1_list'][$key]['product_link'] = $main->convert_link_url($value['product_name']);
            }
        } else {
            $d['product_1_name'] = '';
            $d['product_1_list'] = array();
        }

        if ($d['product_2'] > 0) {

            $theme_category->set('id', $d['product_2']);
            $dT = $theme_category->get_detail();
            $d['product_2_name'] = $dT['name']; //category theme for product 1 name

            $theme_product->set('theme_cat_id', $d['product_2']);
            $d['product_2_list'] = $theme_product->list_by_theme_cat_id(0, $d['product_number']); //Nhớ bỏ product_id đã hide

            foreach ($d['product_2_list'] as $key => $value) {
                $d['product_2_list'][$key] = $product->detail_product_general($value['product_commission_id'], $member_group_id, $value);
            }
        } else {
            $d['product_2_name'] = '';
            $d['product_2_list'] = array();
        }

        if ($d['slide'] > 0) {

            $theme_category->set('id', $d['slide']);
            $dT = $theme_category->get_detail();
            $d['slide_name'] = $dT['name']; //category theme for product 1 name
            $d['slide_list'] = json_decode($dT['img'], true);
        } else {
            $d['slide_name'] = '';
            $d['slide_list'] = array();
        }

        $d['layout'] = array(
            'slide_size'        => $d['slide_size'],
            'slide_cate'        => $d['category_size'],
            'cate'              => $d['category_layout'],
            'cate_number'       => $d['category_number'],
            'cate_show_more'    => $d['category_show_more'],
            'cate_row'          => $d['category_row'],
            'cate_number'       => $d['category_number'],
            'product'           => $d['product_layout'],
            'product_number'    => $d['product_number'],
            'product_show_more' => $d['product_show_more'],
            'product_row'       => $d['product_row']
        );
        $d['link_cat'] = $main->convert_link_url($d['name']);

        return $d;
    }

    public function filter($keyword = '', $offset = '', $limit = '')
    {
        global $db;

        $shop_id            = $this->get('shop_id');

        if ($keyword !== '')
            $keyword = "AND ( `name` LIKE '%$keyword%' OR `note` LIKE '%$keyword%' )";

        if ($limit !== '') $limit = "LIMIT $offset, $limit";

        $sql = "SELECT * FROM $db->tbl_fix`$this->class_name`
                WHERE `shop_id` = '$shop_id' 
                AND `deleted` = '0'
                $keyword
                ORDER BY `priority` DESC
                $limit";

        $r = $db->executeQuery_list($sql);

        return $r;
    }

    public function filter_count($keyword = '')
    {
        global $db;

        $shop_id            = $this->get('shop_id');

        if ($keyword !== '')
            $keyword = "AND ( `name` LIKE '%$keyword%' OR `note` LIKE '%$keyword%' )";

        $sql = "SELECT COUNT(*) total FROM $db->tbl_fix`$this->class_name`
                WHERE `shop_id` = '$shop_id' 
                AND `deleted` = '0'
                $keyword";

        $r = $db->executeQuery($sql, 1);

        return $r['total'];
    }
}
