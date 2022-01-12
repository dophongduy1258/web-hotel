<?php
class news_category extends model
{

    protected $class_name = 'news_category'; // danh mục tin tức
    protected $id;
    protected $name;
    protected $root_id;
    protected $level;
    protected $description;
    protected $priority;
    protected $meta_title;
    protected $meta_description;
    protected $meta_keyword;
    protected $avatar;
    protected $icon;
    protected $type;
    protected $background;
    protected $link_url;
    protected $is_hidden;
    protected $deleted;

    // list tất cả danh mục
    public function filter()
    {
        global $db;

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    ORDER BY `priority`";

        $l = $db->executeQuery_list($sql);

        return $l;
    }

    // list danh mục cấp cha
    public function get_category()
    {
        global $db;

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    AND `root_id` = 0
                    ORDER BY `priority`";

        $l = $db->executeQuery_list($sql);

        return $l;
    }

    // list danh mục theo id cấp cha
    public function get_by_root_id()
    {
        global $db;

        $root_id = $this->get('root_id');

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `deleted` = 0
                    AND `is_hidden` = 0
                    AND `root_id` = $root_id
                    ORDER BY `priority`";

        $l = $db->executeQuery_list($sql);

        return $l;
    }

    // list danh mục theo id cấp cha
    public function get_by_type()
    {
        global $db;

        $type = $this->get('type');

        $sql = "SELECT * 
                    FROM $db->tbl_fix$this->class_name tb
                    WHERE `type` = $type
                    AND `is_hidden` = 0
                    AND `deleted` = 0
                    ORDER BY `priority`";

        $l = $db->executeQuery_list($sql);

        return $l;
    }

}
