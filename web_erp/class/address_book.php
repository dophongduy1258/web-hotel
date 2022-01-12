<?php
class address_book extends model
{ //address_book

    protected $class_name = 'address_book';
    protected $id;
    protected $client_id;

    protected $city_id;
    protected $district_id;
    protected $ward_id;

    protected $city;
    protected $district;
    protected $ward;
    protected $address;
    protected $country;

    protected $fullname;
    protected $mobile;
    protected $email;
    protected $note;

    protected $is_default;

    public function add()
    {
        global $db;

        $arr['client_id']           = $this->get('client_id');

        $arr['city_id']             = $this->get('city_id');
        $arr['district_id']         = $this->get('district_id');
        $arr['ward_id']             = $this->get('ward_id');

        $arr['city']                = $this->get('city');
        $arr['district']            = $this->get('district');
        $arr['ward']                = $this->get('ward');

        $arr['country']             = $this->get('country');

        $arr['address']             = $this->get('address');
        $arr['fullname']            = $this->get('fullname');
        $arr['mobile']              = $this->get('mobile');
        $arr['email']               = $this->get('email');

        $arr['is_default']          = $is_default = $this->get('is_default');
        $arr['note']                = $this->get('note');

        $db->record_insert($db->tbl_fix . $this->class_name, $arr);

        $id = $db->mysqli_insert_id();

        if ($is_default == 1) {
            $this->set('id', $id);
            $this->update_default();
        }

        return $id;
    }

    public function update()
    {
        global $db;

        $id                         = $this->get('id');
        $client_id                  = $this->get('client_id');

        $arr['city_id']             = $this->get('city_id');
        $arr['district_id']         = $this->get('district_id');
        $arr['ward_id']             = $this->get('ward_id');

        $arr['city']                = $this->get('city');
        $arr['district']            = $this->get('district');
        $arr['ward']                = $this->get('ward');

        $arr['country']             = $this->get('country');

        $arr['address']             = $this->get('address');
        $arr['fullname']            = $this->get('fullname');
        $arr['mobile']              = $this->get('mobile');
        $arr['email']               = $this->get('email');

        $is_default                 = $this->get('is_default');


        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' AND `client_id` = '$client_id' ");

        if ($is_default == 1) {
            $this->update_default();
        }

        return $id;
    }

    public function update_default()
    {
        global $db;

        $id                     = $this->get('id');
        $client_id              = $this->get('client_id');

        $arr['is_default']   = 0;
        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `client_id` = '$client_id' ");

        $arr['is_default']   = 1;
        $db->record_update($db->tbl_fix . $this->class_name, $arr, " `id` = '$id' AND `client_id` = '$client_id' ");

        return $id;
    }

    public function delete_item()
    {
        global $db;

        $id                     = $this->get('id');
        $client_id              = $this->get('client_id');

        $db->record_delete($db->tbl_fix . $this->class_name, " `id` = '$id' AND `client_id` = '$client_id' ");

        return true;
    }

    public function get_default()
    {
        global $db;

        $client_id = $this->get('client_id');

        $sql = "SELECT *
                FROM `$this->class_name` b
                WHERE `client_id` = '$client_id' AND `is_default` = '1'
                ORDER BY `id` DESC";

        $result = $db->executeQuery($sql, 1);

        return $result;
    }

    public function filter()
    {
        global $db;

        $client_id = $this->get('client_id');

        $sql = "SELECT *
                FROM `$this->class_name` b
                WHERE `client_id` = '$client_id'
                ORDER BY `id` DESC";
                
        $result = $db->executeQuery_list($sql);

        return $result;
    }

    public function filter_opt()
    {
        global $db;

        $eco_district   = new eco_district();
        $eco_ward       = new eco_ward();

        $client_id = $this->get('client_id');

        $sql = "SELECT *
                FROM `$this->class_name` b
                WHERE `client_id` = '$client_id'
                ORDER BY `id` DESC";

        $result = $db->executeQuery($sql);
        $kq     = array();
        while ($row = mysqli_fetch_assoc($result)) {

            $eco_district->set('id_city', $row['city_id']);
            $row['listDistrict']        = $eco_district->list_by();

            $eco_ward->set('id_district', $row['district_id']);
            $row['listWard']        = $eco_ward->list_by();

            $kq[] = $row;
        }
        mysqli_free_result($result);

        return $kq;
    }

    public function filter_by_client()
    {
        global $db;

        $l = $this->filter();

        $opt = '';
        foreach ($l as $key => $item) {
            $opt .= '<option value="' . $item['id'] . '">' . $item['address'] . ', ' . $item['ward'] . ', ' . $item['district'] . ', ' . $item['city'] . '</option>';
        }

        return $opt;
    }
}
$address_book = new address_book();
