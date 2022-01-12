<?php
class product_price_detail extends model
{
    protected $class_name = 'product_price_detail';
	protected $product_id;
	protected $unique_id;//SKU.unique_id
	protected $member_group_id;
	protected $value;
	protected $changed_by;
	protected $changed_at;

    public function add(){
        global $db;
        
        $arr['product_id']              = $this->get('product_id');
        $arr['unique_id']               = $this->get('unique_id');
        $arr['member_group_id']         = $this->get('member_group_id');
        $arr['value']                   = $this->get('value');
        $arr['changed_by']              = $this->get('changed_by');
        $arr['changed_at']              = time();

		$db->record_insert($db->tbl_fix.$this->class_name , $arr );

		return $db->mysqli_insert_id();
    }

    public function update(){
        global $db;
        
        $arr['product_id']              = $product_id       = $this->get('product_id');
        $arr['unique_id']               = $unique_id        = $this->get('unique_id');
        $arr['member_group_id']         = $member_group_id  = $this->get('member_group_id');
        $arr['value']                   = $this->get('value');
        $arr['changed_by']              = $this->get('changed_by');
        $arr['changed_at']              = time();
        
		$db->record_update($db->tbl_fix.$this->class_name , $arr, " `product_id` = '$product_id' AND `unique_id` = '$unique_id' AND `member_group_id` = '$member_group_id' " );
        
        return true;
    }

    public function add_or_update(){
        global $db;

        $product_id       = $this->get('product_id');
        $unique_id        = $this->get('unique_id');
        $member_group_id  = $this->get('member_group_id');

        $d = $this->get_detail_record();
        
        if( isset($d['member_group_id']) ){
            $this->update();
        }else{
           $this->add();
        }

    }

    public function get_detail_record(){
		global $db;

        $product_id       = $this->get('product_id');
        $unique_id        = $this->get('unique_id');
        $member_group_id  = $this->get('member_group_id');

        if( $unique_id !== '' ){
            $unique_id = " AND `unique_id` = '$unique_id' ";
        }

		$sql = "SELECT * FROM $db->tbl_fix$this->class_name
                WHERE
                `product_id` = '$product_id' 
                $unique_id
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";
        
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row;
    }

        
    public function get_value(){
		global $db;

        $product_id       = $this->get('product_id');
        $unique_id        = $this->get('unique_id');
        $member_group_id  = $this->get('member_group_id');
        
		$sql = "SELECT `value` FROM $db->tbl_fix$this->class_name
                WHERE
                `product_id` = '$product_id' 
                AND `unique_id` = '$unique_id'
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";

		$row = $db->executeQuery( $sql, 1 );

		return isset($row['value'])?$row['value']+0:0;
    }

    public function get_matrix($keyword, $shop_id, $cat_id, $offset = 0, $limit = '')
	{
		global $db;

        $db_name 		= $db->tbl_fix;

        if ($shop_id != '') $shop_id = " AND `pro`.shop_id = '$shop_id' ";
        if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";
		if ($keyword != '')
			$keyword 		= "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";
		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT pro.`id` as product_id, SKU.`code`, SKU.`id` as sku_id, SKU.`unique_id` as unique_id, IF(pro.`multi_attribute` = 0, pro.`price`, SKU.`price`) price,
                        CONCAT(pro.`name`, ' ', SKU.`name`) product_name,
						pro.`img_1`, pro.`img_2`,pro.`img_3`, pro.`img_4`,pro.`img_5`, pro.`img_6`
				FROM $db_name`product` as pro
				INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                $shop_id
				$cat_id
                $keyword
				GROUP BY SKU.`unique_id`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
				$limit";

		$result     = $db->executeQuery( $sql );
        $kq = array();
        while( $row = mysqli_fetch_assoc($result) ){
            $this->set('product_id', $row['product_id']);
            $this->set('unique_id', $row['unique_id']);
            $row['lItems'] = $this->list_by_product();
            $kq[] = $row;
        }

		return $kq;
	}

    public function get_matrix_count($keyword, $shop_id, $cat_id)
	{
		global $db;

        $db_name 		= $db->tbl_fix;

        if ($shop_id != '') $shop_id = " AND `pro`.shop_id = '$shop_id' ";
        if ($cat_id != '') $cat_id = " AND `pro`.cat_id = '$cat_id' ";
		if ($keyword != '') $keyword 		= "AND ( SKU.`code` LIKE '%$keyword%' OR pro.`name` LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) total FROM(
                    SELECT pro.`id` as product_id, SKU.`id` as sku_id, SKU.`unique_id` as unique_id, IF(pro.`multi_attribute` = 0, pro.`price`, SKU.`price`) price,
                            CONCAT(pro.`name`, ' ', SKU.`name`) product_name,
                            pro.`img_1`, pro.`img_2`,pro.`img_3`, pro.`img_4`,pro.`img_5`, pro.`img_6`
                    FROM $db_name`product` as pro
                    INNER JOIN $db_name`SKU` ON pro.`id` = SKU.`product_id`
                    WHERE
                    pro.`deleted`       = '0'
                    AND SKU.`deleted`   = '0'
                    $shop_id
                    $cat_id
                    $keyword
                    GROUP BY SKU.`unique_id`
                ) n";

		$result     = $db->executeQuery( $sql, 1 );
        
		return $result['total'];
	}

	public function list_by_product() {
		global $db;

		$product_id     = $this->get('product_id');
        $unique_id      = $this->get('unique_id');

		$sql = "SELECT *
                FROM $db->tbl_fix`". $this->class_name ."` tt
                WHERE 
                `product_id` = '$product_id' 
                AND `unique_id` = '$unique_id'";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

    //lấy chi tiết giá theo chi tiết sản phẩm (tùngcode-14/04/2021)
    public function list_price_by_product() {
		global $db;

		$product_id     = $this->get('product_id');
		$member_group_id     = $this->get('member_group_id');

		$sql = "SELECT tt.`member_group_id`, tt.`product_id`, tt.`value`, mg.`name`
                FROM $db->tbl_fix`". $this->class_name ."` tt
                INNER JOIN `member_group` mg ON mg.`id` = tt.`member_group_id`
                WHERE 
                tt.`product_id` = '$product_id' AND mg.`id` > 30 AND tt.`member_group_id` <= '$member_group_id'";
		$result = $db->executeQuery_list( $sql );

		return $result;
	}

    //HC: 210915 List bảng giá các đối tượng khác nhau show lên trên sản phẩm cho từng đối tượng khác nhau: cho tùy loại member thấy được
    public function list_by_product_member_group_defined() {
		global $db;

		$product_id         = $this->get('product_id');
		$unique_id          = $this->get('unique_id');
		$lMBGDefined        = $this->get('member_group_id');//member_group_id1;member_group_id2;member_group_id3;

        $sqlMBG = '';
        if( $lMBGDefined != '' ){
            if( $lMBGDefined == 'all' ){
            $sqlMBG = 'AND 1';
            }else{
                $lSh = explode( ';', $lMBGDefined);
                foreach ($lSh as $itde) {
                    if( $itde != '' )
                        $sqlMBG .= " mg.`id` = '$itde' OR ";
                }

                if( $sqlMBG != '' ){
                    $sqlMBG = "AND (".substr($sqlMBG,0, -3).")";
                }
            }
        }

        $result = array();
        if( $sqlMBG != '' ){
            $sql = "SELECT mg.`id` `member_group_id`, mg.`name`, IFNULL(tt.`value`, 0) `value`
                    FROM $db->tbl_fix`member_group` mg 
                    LEFT JOIN $db->tbl_fix`". $this->class_name ."` tt ON mg.`id` = tt.`member_group_id` AND tt.`product_id` = '$product_id' AND tt.`unique_id` = '$unique_id'
                    WHERE 1
                    $sqlMBG";
            $result = $db->executeQuery_list( $sql );
        }
        
		return $result;
	}

}