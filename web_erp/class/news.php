<?php
class news extends model
{

    protected $class_name = 'news'; // tin tức
    protected $id;
    protected $title;
    protected $short_description;
    protected $description;
    protected $news_category_id;
    protected $news_type_id;
    protected $news_group_id;  //nhóm tin tức =0 default, =1 nổi bật, =2 tiêu điểm
    protected $link;
    protected $link_url;
    protected $meta_title;
    protected $meta_description;
    protected $meta_keyword;
    protected $avatar;
    protected $image;
    protected $created_at;
    protected $is_hidden;
    protected $deleted;

    // list tất cả tin tức
    public function filter($keyword, $offset, $limit)
    {
        global $db;

        $news_category_id = $this->get('news_category_id');

        $news_category = ""; //nếu không có danh mục load tất cả tin tức
        if($news_category_id != ''){
            $news_category = "AND `news_category_id` = $news_category_id";
        }

        if ($limit != '')
            $limit = " LIMIT $offset, $limit ";

        if ($keyword != '') {
            $keyword = " AND ( tb.`title` LIKE '%$keyword%' ) ";
        }

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    $news_category
                    $keyword
                    ORDER BY `id` DESC
                    $limit";

        $l = $db->executeQuery($sql);

        $kq = array();
        while($row = mysqli_fetch_assoc($l)){
            $row['icon'] = $this->create_icon($row['news_type_id']);
            $kq[] = $row;
        }

        return $kq;
    }

    // list tất cả tin tức
    public function filter_by_type($keyword, $type, $offset, $limit)
    {
        global $db;

        $news_category_id = $this->get('news_category_id');

        $news_category = ""; //nếu không có danh mục load tất cả tin tức
        if($news_category_id != ''){
            $news_category = "AND `news_category_id` = $news_category_id";
        }

        if ($limit != '')
            $limit = " LIMIT $offset, $limit ";

        if ($keyword != '') {
            $keyword = " AND ( tb.`title` LIKE '%$keyword%' ) ";
        }

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    AND `news_type_id` = $type
                    $news_category
                    $keyword
                    ORDER BY `id` DESC
                    $limit";

        $l = $db->executeQuery($sql);

        $kq = array();
        while($row = mysqli_fetch_assoc($l)){
            $row['icon'] = $this->create_icon($row['news_type_id']);
            $kq[] = $row;
        }

        return $kq;
    }

    public function filter_count($keyword){
        global $db;

        $news_category_id = $this->get('news_category_id');

        $news_category = ""; //nếu không có danh mục load tất cả tin tức
        if($news_category_id != ''){
            $news_category = "AND `news_category_id` = $news_category_id";
        }

        if ($keyword != '') {
            $keyword = " AND ( tb.`title` LIKE '%$keyword%' ) ";
        }

        $sql = "SELECT COUNT(*) total 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    $news_category
                    $keyword ";

        $result = $db->executeQuery($sql,1 );

        return $result['total']+0;
    }

    public function get_detail_by_id(){
        global $db;

        $news_category = new news_category();

        $id = $this->get('id');

        $sql = "SELECT *
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `id` = $id";

        $d = $db->executeQuery($sql, 1);

        if(isset($d['id'])){
            if($d['image']!=''){
                $d['image'] = explode(';', $d['image']);
            }
            $news_category->set('id', $d['news_category_id']);
            $cat_link = $news_category->get_detail();
            if(isset($cat_link['id'])){
                $d['cat_link'] = $cat_link['link_url'].'-cn'.$cat_link['id'];
                $d['cat_name'] = $cat_link['name'];
            }else{
                $d['cat_link'] = '';
                $d['cat_name'] = '';
            }
        }

        return $d;
    }

    public function get_news_suggest($type){
        global $db;

        $id = $this->get('id');

        $sql = "SELECT *
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    AND `news_group_id` = $type
                    AND `id` <> $id
                    ORDER BY `id` DESC
                    LIMIT 0, 32";

        $l = $db->executeQuery_list($sql);
        
        return $l;
    }

    public function get_news_video_brand($news_category_id, $offset, $limit){
        global $db;

        $sql = "SELECT *
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    AND `news_category_id` = $news_category_id
                    ORDER BY `id` DESC
                    LIMIT $offset, $limit";

        $l = $db->executeQuery($sql);

        $kq = array();
        while($row = mysqli_fetch_assoc($l)){
            if ($row['link'] != '') {
                $url = $row['link'];
                $query_str = parse_url($url, PHP_URL_QUERY);
                parse_str($query_str, $query_params);
    
                if (isset($query_params['v']) && $query_params['v'] != '') {
                    $row['link'] = $query_params['v'];
                    $thumbURL = 'http://img.youtube.com/vi/'.$row['link'].'/0.jpg';
                    $row['thumbURL'] = $thumbURL;
                } else {
                    $url = explode('youtu.be/', $row['link']);
                    $row['link'] = $url[1];
                    $thumbURL = 'http://img.youtube.com/vi/'.$row['link'].'/0.jpg';
                    $row['thumbURL'] = $thumbURL;
                }
            }
            $kq[] = $row;
        }
        
        return $kq;
    }

    public function create_icon($type)
    {   
        $icon = '';

        if($type == 1){
            $icon = '';
        }else if($type == 2){
            $icon = '<i class="fa fa-picture-o" aria-hidden="true"></i>';
        }else{
            $icon = '<i class="fa fa-video-camera" aria-hidden="true"></i>';
        }
        return $icon;
    }

}