<?php
class product_commission extends model
{

    protected $class_name = 'product_commission';
    protected $id;
    protected $name;
    protected $is_hidden;
    protected $parent_id;
    protected $is_parent;
    protected $wallet_name;
    protected $wallet_code;
    protected $wallet_commission;

    public function add()
    {
        global $db;

        $arr['name']                        = $this->get('name');
        $arr['parent_id']                   = $this->get('parent_id');
        $arr['is_parent']                   = $this->get('is_parent');
        $arr['is_hidden']                   = 0;
        $arr['wallet_name']                 = '';
        $arr['wallet_code']                 = '';
        $arr['wallet_commission']           = '0';

        $db->record_insert($db->tbl_fix . $this->class_name, $arr);

        return $db->mysqli_insert_id();
    }

    public function update()
    {
        global $db;

        $id                         = $this->get('id');
        $arr['name']                = $this->get('name');
        $arr['parent_id']           = $this->get('parent_id');

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_wallet()
    {
        global $db;

        $id                                 = $this->get('id');

        $arr['wallet_name']                 = $this->get('wallet_name');
        $arr['wallet_code']                 = $this->get('wallet_code');
        $arr['wallet_commission']           = $this->get('wallet_commission') + 0;

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_hidden()
    {
        global $db;

        $id                         = $this->get('id');
        $arr['is_hidden']           = $this->get('is_hidden');

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function update_transfer()
    { //Cập nhật cho phép giao dịch (tùng code-09/04/2021)
        global $db;

        $id                         = $this->get('id');
        $arr['is_transfer']           = $this->get('is_transfer');

        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function get_name()
    {
        global $db;

        $id     = $this->get('id');
        $d        = $this->get_detail();

        return isset($d['name']) ? $d['name'] : '';
    }

    public function get_by_name()
    {
        global $db;

        $name       = $this->get('name');
        $is_parent  = $this->get('is_parent');

        if ($is_parent !== '')
            $is_parent = "AND `is_parent` = '$is_parent' ";

        $sql = "SELECT * 
                FROM $db->tbl_fix`$this->class_name` 
                WHERE `name` = '$name' $is_parent LIMIT 1";

        $res = $db->executeQuery($sql, 1);

        return $res;
    }

    public function get_cashback_percent()
    {
        global $db;

        $id     = $this->get('id');
        $d        = $this->get_detail();

        return isset($d['wallet_commission']) ? $d['wallet_commission'] : 0;
    }

    public function toStringIDFromParent($lParentID)
    {
        global $db;

        $lParentID = explode(';', $lParentID);
        $kq = '';
        foreach ($lParentID as $parent_id) {
            if ($parent_id != '') {
                if ($parent_id == 0)
                    $kq .= '0;';
                else {
                    $this->set('parent_id', $parent_id);
                    $l = $this->list_child_by_parent();
                    foreach ($l as $i) {
                        $kq .= $i['id'] . ';';
                    }
                }
            }
        }

        return $kq;
    }

    public function list_all_child()
    { //list all without hidden record
        global $db;

        $sql = "SELECT procom.*, IFNULL(parent.`name`, 'Chưa khai báo') parent_name
                FROM " . $db->tbl_fix . "`" . $this->class_name . "` procom
                LEFT JOIN (
                    SELECT * FROM " . $db->tbl_fix . "`" . $this->class_name . "` prosub WHERE prosub.`is_hidden` = '0' AND prosub.`is_parent` = 1
                ) parent ON parent.id = procom.parent_id
                WHERE procom.`is_hidden` = '0' AND procom.`is_parent` = 0 AND procom.`is_wallet` = 0 ORDER BY `parent`.`id` ASC, procom.`name` ASC";
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function list_all_child_count()
    { //list all without hidden record
        global $db;

        $sql = "SELECT COUNT(*) total
                FROM " . $db->tbl_fix . "`" . $this->class_name . "` procom
                WHERE procom.`is_hidden` = '0' AND procom.`is_parent` = 0 AND procom.`is_wallet` = 0";
        $result = $db->executeQuery($sql, 1);

        return $result['total'];
    }

    public function wallet_searching($keyword, $lExcept = '')
    { //
        global $db;

        if ($keyword    !== '') $keyword = "AND ( procom.`wallet_name` LIKE '%$keyword%' OR procom.`wallet_code` LIKE '%$keyword%') ";

        $sqlExcept = '';
        if ($lExcept != '') {
            $lSh = explode(';', $lExcept);
            foreach ($lSh as $itde) {
                if ($itde != '')
                    $sqlExcept .= "AND procom.`id` <> '$itde' ";
            }
        }

        $sql = "SELECT *, id wallet_id
                FROM $db->tbl_fix`$this->class_name` procom
                WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                $keyword
                $sqlExcept
                ORDER BY `wallet_name`
                LIMIT 10";

        $r = $db->executeQuery_list($sql);

        return $r;
    }

    public function wallet_list_all($keyword = '', $offset = '', $limit = '')
    { //
        global $db;

        if ($limit      !== '') $limit = "LIMIT $offset, $limit";
        if ($keyword    !== '') $keyword = "AND ( procom.`wallet_name` LIKE '%$keyword%' OR procom.`wallet_code` LIKE '%$keyword%') ";

        $sql = "SELECT *
                FROM $db->tbl_fix`$this->class_name` procom
                WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                $keyword
                ORDER BY `id`
                $limit";

        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function wallet_list_all_count($keyword = '')
    { //
        global $db;

        if ($keyword    !== '') $keyword = "AND ( procom.`wallet_name` LIKE '%$keyword%' OR procom.`wallet_code` LIKE '%$keyword%') ";

        $sql = "SELECT COUNT(*) total
                FROM $db->tbl_fix`$this->class_name` procom
                WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                $keyword";

        $result = $db->executeQuery($sql, 1);

        return $result['total'];
    }

    public function wallet_option_all()
    { //
        global $db;

        $sql = "SELECT *
                FROM $db->tbl_fix`$this->class_name` procom
                WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                ORDER BY `id`";
        $l = $db->executeQuery_list($sql);

        $h = '';
        foreach ($l as $item) {
            $h .= '<option value="' . $item['id'] . '">' . $item['wallet_name'] . '</option>';
        }

        return $h;
    }

    public function wallet_option_accessed($dUserLogin, $wallet_accessed)
    {
        global $db;
        $kq = '';

        $l = $this->wallet_list_accessed($dUserLogin, $wallet_accessed);

        foreach ($l as $row) {
            $kq .= '<option value="' . $row['id'] . '">' . $row['wallet_name'] . '</option>';
        }

        return $kq;
    }

    public function wallet_list_accessed($dUserLogin, $wallet_accessed)
    {
        global $db;

        $sqlWhere = '';
        if ($dUserLogin['gid'] != 0) {

            $lWallet = explode(';', $wallet_accessed);
            $sqlWhere = '';
            foreach ($lWallet as $item) {
                if ($item != '') {
                    $sqlWhere .= " procom.`id` = '$item' OR";
                }
            }

            if ($sqlWhere != '') {
                $sqlWhere = substr($sqlWhere, 0, -2);
                $sqlWhere = "AND ( $sqlWhere )";
            } else {
                $sqlWhere = "AND 1=2 ";
            }
        } else {
            $sqlWhere = "AND 1"; //all
        }

        $sql = "SELECT *, id wallet_id 
                FROM $db->tbl_fix`$this->class_name` procom 
                WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                $sqlWhere 
                ORDER BY id ASC";

        $kq = $db->executeQuery_list($sql);

        return $kq;
    }

    public function wallet_list_accessed_count($dUserLogin, $wallet_accessed)
    {
        global $db;
        $kq = 0;

        $sqlWhere = '';
        if ($dUserLogin['gid'] != 0) {

            $lWallet = explode(';', $wallet_accessed);
            $sqlWhere = '';
            foreach ($lWallet as $item) {
                if ($item != '') {
                    $sqlWhere .= " procom.`id` = '$item' OR";
                }
            }

            if ($sqlWhere != '') {
                $sqlWhere = substr($sqlWhere, 0, -2);
                $sqlWhere = "AND ( $sqlWhere )";
            } else {
                $sqlWhere = "AND 1=2 ";
            }
        } else {
            $sqlWhere = "AND 1"; //all
        }

        $sql = "SELECT COUNT(*) total 
                    FROM $db->tbl_fix`$this->class_name` procom 
                    WHERE procom.`id` > 0 AND procom.`is_parent` = 0 AND `is_wallet` = 1
                    $sqlWhere";

        $r = $db->executeQuery($sql, 1);
        if (isset($r['total']) && $r['total'] > 0)
            $kq = $r['total'];

        return $kq;
    }

    public function wallet_opt_by_user($dUserLogin, $all_option = 0)
    {
        if (isset($dUserLogin['gid']) && $dUserLogin['gid'] < 1) {

            if ($all_option == 1)
                $opt = '<option value="">Tất cả loại ví</option>' . $this->wallet_option_all();
            else
                $opt = $this->wallet_option_all();

            return $opt;
        } else {
            return $this->wallet_option_accessed($dUserLogin, isset($dUserLogin['wallet_accessed']) ? $dUserLogin['wallet_accessed'] : '');
        }
    }

    public function wallet_opt($all_option = 0)
    {
        if ($all_option == 1)
            $opt = '<option value="">Tất cả loại ví</option>' . $this->wallet_option_all();
        else
            $opt = $this->wallet_option_all();

        return $opt;
    }

    public function list_child_by_parent()
    { //list all without hidden record
        global $db;

        $parent_id = $this->get('parent_id');
        $sql = "SELECT * FROM " . $db->tbl_fix . "`" . $this->class_name . "` WHERE `is_hidden` = '0' AND `is_parent` = 0 AND `parent_id` = '$parent_id' ORDER BY `id` ASC";
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function list_all_parent()
    { //list all without hidden record
        global $db;

        $sql = "SELECT * FROM " . $db->tbl_fix . "`" . $this->class_name . "` WHERE `is_hidden` = '0' AND `is_parent` = 1 ORDER BY `id` ASC";
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function list_all_public()
    { //list all without hidden record
        global $db;

        $sql = "SELECT * FROM " . $db->tbl_fix . "`" . $this->class_name . "` WHERE `is_hidden` = '0' ORDER BY `id` ASC";
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function opt_all_public_parent()
    { //list all without hidden record
        global $db;

        $l = $this->list_all_parent();

        $h = '';
        foreach ($l as $i) {
            $h .= '<option value="' . $i['id'] . '">' . $i['name'] . '</option>';
        }

        return $h;
    }

    public function opt_all_public_child()
    { //list all without hidden record
        global $db;

        $l = $this->list_all_child();

        $kq = array();

        foreach ($l as $i) {
            $kq[$i['parent_id']]['name'] = $i['parent_name'];
            $kq[$i['parent_id']]['l'][] = $i;
        }

        foreach ($kq as $it) {
            $h .= '<optgroup label="' . $it['name'] . '" data-subtext="' . $it['name'] . '">';
            foreach ($it['l'] as $sit) {
                $h .= '<option value="' . $sit['id'] . '">' . $sit['name'] . '</option>';
            }
            $h .= '</optgroup>';
        }

        return $h;
    }
}
$product_commission = new product_commission();
