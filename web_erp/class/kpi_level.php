<?php
/*
- Nhóm KPI_level: xét duyệt lên cấp tự động
*/
class KPI_level extends model
{

  protected $class_name = 'KPI_level';

  protected $id;
  protected $name;
  protected $total_spent;
  protected $total_spent_by;
  protected $total_child_spent;
  protected $total_child_spent_by;
  protected $total_child;
  protected $up_level;
  protected $block_id;

  protected $created_by;
  protected $created_at;

  public function add()
  {
    global $db;

    $arr['name']                     = $this->get('name');
    $arr['total_spent']              = $this->get('total_spent');
    $arr['total_spent_by']           = $this->get('total_spent_by');
    $arr['total_child_spent']        = $this->get('total_child_spent');
    $arr['total_child_spent_by']     = $this->get('total_child_spent_by');
    $arr['total_child']              = $this->get('total_child');
    $arr['up_level']                 = $this->get('up_level');
    $arr['block_id']                 = $this->get('block_id');

    $arr['created_by']               = $this->get('created_by');
    $arr['created_at']               = time();

    $db->record_insert($db->tbl_fix . $this->class_name, $arr);

    return $db->mysqli_insert_id();
  }

  public function update()
  {
    global $db;

    $id                              = $this->get('id');

    $arr['name']                     = $this->get('name');
    $arr['total_spent']              = $this->get('total_spent');
    $arr['total_child_spent']        = $this->get('total_child_spent');
    $arr['total_spent_by']              = $this->get('total_spent_by');
    $arr['total_child_spent_by']        = $this->get('total_child_spent_by');
    $arr['total_child']              = $this->get('total_child');
    $arr['up_level']                 = $this->get('up_level');
    $arr['block_id']                 = $this->get('block_id');

    $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' ");

    return true;
  }

  public function is_existing_name()
  {
    global $db;

    $id   = $this->get('id');
    $name   = $this->get('name');

    if ($id != '') $id = "AND `id` <> '$id'";

    $sql = "SELECT `id` FROM " . $db->tbl_fix . "`$this->class_name` WHERE `name` = '$name' $id LIMIT 1";
    $d = $db->executeQuery($sql, 1);

    return isset($d['id']);
  }

  public function list_by_block()
  {
    global $db;

    $block_id   = $this->get('block_id');
    if ($block_id != '') $block_id = "WHERE `block_id` = '$block_id' ";

    $sql = "SELECT th.*, IFNULL(mg.`name`, 'Mặc định' ) up_level_name
                FROM $db->tbl_fix`$this->class_name` th
                LEFT JOIN $db->tbl_fix`member_group` mg ON mg.`id` = th.`up_level`
                $block_id ORDER BY `name` ASC";
    $result = $db->executeQuery_list($sql);

    return $result;
  }

  public function list_by_block_grouped()
  {
    global $db;

    $sql = "SELECT * FROM $db->tbl_fix`block` ORDER BY `name` ASC ";
    $result = $db->executeQuery($sql);

    $kq = array();
    while ($theBlock = mysqli_fetch_assoc($result)) {
      $this->set('block_id', $theBlock['id']);
      $theBlock['subItems'] = $this->list_by_block();
      $kq[] = $theBlock;
    }
    mysqli_free_result($result);

    return $kq;
  }

}
