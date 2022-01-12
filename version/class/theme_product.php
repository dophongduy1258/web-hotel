<?php
class theme_product extends model{

    protected $class_name = 'theme_product';
	protected $id;
	protected $theme_cat_id;
	protected $product_id;
	protected $unique_id;//SKU.unique_id
	protected $created_at;//
	protected $created_by;//
	protected $deleted;//
	protected $deleted_by;//
	protected $priority;//

    /**
     * //Chỉ sử dụng để cho truyền biến chứ ko mục đích liên quan tạo bảng
     */
	protected $for_point;

    public function add(){
        global $db;

        $arr['theme_cat_id']    = $this->get('theme_cat_id');
        $arr['product_id']      = $this->get('product_id');
        $arr['unique_id']       = $this->get('unique_id');
        $arr['created_by']      = $this->get('created_by');
        $arr['priority']        = time();
        $arr['created_at']      = time();
        $arr['deleted']         = 0;
        $arr['deleted_by']      = 0;

		$db->record_insert( $db->tbl_fix.$this->class_name , $arr );

        return $db->mysqli_insert_id();
    }

    public function delete_item(){
        global $db;
        
        $id                         = $this->get('id');

        $arr['deleted']             = time();
        $arr['deleted_by']          =  $this->get('deleted_by');

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );

		return true;
    }

    public function delete_item_by(){
        global $db;
        
        $product_id                 = $this->get('product_id');
        $unique_id                  = $this->get('unique_id');
        $theme_cat_id               = $this->get('theme_cat_id');
        
        $arr['deleted']             = time();
        $arr['deleted_by']          =  $this->get('deleted_by');

        print_r($arr);

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `product_id` = '$product_id' AND `unique_id` = '$unique_id' AND `theme_cat_id` = '$theme_cat_id' " );

		return true;
    }

    public function update_position($type){
        global $db;
        
        $id                         = $this->get('id');

        if( $type == 'push' ){
            //push to top
            $arr['priority'] = time();
        }else{
            //pull to button
            $arr['priority'] = -1*time();
        }

		$db->record_update( $db->tbl_fix.$this->class_name , $arr, " `id` = '$id' " );

		return true;
    }

    public function list_by_theme_cat_id( $offset = '', $limit = '' ){
		global $db;

        $theme_cat_id       = $this->get('theme_cat_id');

        if( $limit !== '' ) $limit = "LIMIT $offset, $limit";

		$sql = "SELECT * FROM (

                    SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
							pro.`ratio_convert`, pro.`multi_attribute`,
							pro.`img_1` `image`, pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
							pro.`sum_stock`, pro.`description`, pro.`short_description`, pro.`point`, pro.`for_point`,
							SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
							IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
							, tb.`theme_cat_id`
                            , IFNULL(`tb`.id, 0) added
							, `tb`.`priority` theme_priority
							, `pro`.`priority` pro_priority

                    FROM $db->tbl_fix`product` pro
                    INNER JOIN $db->tbl_fix`SKU` ON `SKU`.product_id = `pro`.`id`
                    LEFT JOIN $db->tbl_fix`$this->class_name` tb ON tb.`unique_id` = `SKU`.`unique_id` AND tb.`deleted` = 0 AND tb.`theme_cat_id` = '$theme_cat_id'
                    WHERE pro.`deleted` = '0' AND SKU.`deleted` = '0'
                    AND tb.`id` IS NOT NULL
                    AND pro.`hidden` = 0
                    AND tb.`theme_cat_id` = '$theme_cat_id'
                    GROUP BY SKU.`unique_id`

                ) nTB
                ORDER BY `theme_priority` DESC, `pro_priority` DESC
                $limit";

		$r = $db->executeQuery_list( $sql );
		
		return $r;
    }

	//For admin load to check: add/ remove
    public function filter( $keyword = '', $cat_id = '', $theme_added = '', $offset = '', $limit = ''){
		global $db;

        $shop_id            = $this->get('shop_id');
        $theme_cat_id       = $this->get('theme_cat_id');

        if( $keyword !== '' )
            $keyword = "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' )";

        if( $cat_id !== '' )
            $cat_id = "AND pro.`cat_id` = '$cat_id' ";
        
        if( $theme_added !== '' ){
            if( $theme_added == 1 )
                $theme_added = "AND tb.`id` IS NOT NULL ";
            else
                $theme_added = "AND tb.`id` IS NULL ";
        }

        if( $limit !== '' ) $limit = "LIMIT $offset, $limit";

		$sql = "SELECT * FROM (
                    SELECT pro.`name`, SKU.`name` sku_name, SKU.`code` sku_code, SKU.`product_id`, SKU.`unique_id`, pro.`price`, pro.`img_1` `image`
                            , IFNULL(`tb`.id, 0) added
                            , `tb`.`priority` theme_priority
                            , `pro`.`priority` pro_priority
							, `pro`.`hidden`
                    FROM $db->tbl_fix`product` pro
                    INNER JOIN $db->tbl_fix`SKU` ON `SKU`.product_id = `pro`.`id`
                    LEFT JOIN $db->tbl_fix`$this->class_name` tb ON tb.`unique_id` = `SKU`.`unique_id` AND tb.`deleted` = 0 AND tb.`theme_cat_id` = '$theme_cat_id' 
					WHERE pro.`shop_id` = '$shop_id' AND pro.`deleted` = '0' AND SKU.`deleted` = '0'
                    $keyword
                    $cat_id
                    $theme_added
                    GROUP BY SKU.`unique_id`
                ) nTB
                ORDER BY `theme_priority` DESC, `pro_priority` DESC
                $limit";

		$r = $db->executeQuery_list( $sql );
		
		return $r;
    }

	//For Admin to check: add/remove
    public function filter_count( $keyword = '', $cat_id = '', $theme_added = '' ){
		global $db;

        $shop_id            = $this->get('shop_id');
        $theme_cat_id       = $this->get('theme_cat_id');

        if( $keyword !== '' )
            $keyword = "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' )";

        if( $cat_id !== '' )
            $cat_id = "AND pro.`cat_id` = '$cat_id' ";
            
        if( $theme_added !== '' ){
            if( $theme_added == 1 )
                $theme_added = "AND tb.`id` IS NOT NULL ";
            else
                $theme_added = "AND tb.`id` IS NULL ";
        }

		$sql = "SELECT COUNT(*) total FROM (
					SELECT SKU.`unique_id`
					FROM $db->tbl_fix`product` pro
					INNER JOIN $db->tbl_fix`SKU` ON `SKU`.product_id = `pro`.`id`
					LEFT JOIN $db->tbl_fix`$this->class_name` tb ON tb.`unique_id` = `SKU`.`unique_id` AND tb.`deleted` = 0 AND tb.`theme_cat_id` = '$theme_cat_id' 
					WHERE pro.`shop_id` = '$shop_id' AND pro.`deleted` = '0' AND SKU.`deleted` = '0'
					$keyword
					$cat_id
					$theme_added
                GROUP BY SKU.`unique_id`
                ) nTB
                ";
        
		$r = $db->executeQuery( $sql ,1 );
		
		return $r['total'];
    }

	//Đếm tất cả số sản phẩm.
	public function list_all_product_count($keyword, $shop_id)
	{
		global $db;

		$theme_cat_id			= $this->get('theme_cat_id');
		$for_point		= $this->get('for_point');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}

		$sqlCatID = '';
		if ($theme_cat_id > 0) $sqlCatID = "AND proTheme.`theme_cat_id` = '$theme_cat_id' ";

		if ($keyword != '')
			$keyword 		= "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) as total FROM (
					SELECT SKU.`unique_id`
					FROM $db->tbl_fix`$this->class_name` proTheme 
					INNER JOIN `SKU` ON  SKU.`unique_id` = proTheme.`unique_id` AND proTheme.`deleted` = 0 AND SKU.`deleted` = 0
					INNER JOIN $db->tbl_fix`product` pro ON pro.`id` = SKU.`product_id`
					WHERE pro.`deleted` = 0 AND SKU.`deleted` = 0 AND proTheme.`deleted` = 0
					AND pro.`hidden` = 0 
					AND pro.`shop_id` = '$shop_id'
					$keyword
					$sqlCatID
					$sqlForPoint
					GROUP BY SKU.`unique_id`
				)n ";

		$result     = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	// Danh sách tất cả sản phẩm
	public function list_all_product($keyword, $shop_id, $member_group_id, $offset, $limit)
	{
		global $db, $main, $product;

		$theme_cat_id	= $this->get('theme_cat_id');
		$for_point		= $this->get('for_point');

		$sqlForPoint = '';
		if ($for_point != '') {
			$lItemx = explode(';', $for_point);
			foreach ($lItemx as $sxItem) {
				if ($sxItem != '')
					$sqlForPoint .= " `pro`.for_point = '$sxItem' OR";
			}
			if ($sqlForPoint != '') {
				$sqlForPoint = 'AND (' . substr($sqlForPoint, 0, -2) . ')';
			}
		}
		
		$sqlCatID = '';
		if ($theme_cat_id > 0) $sqlCatID = "AND proTheme.`theme_cat_id` = '$theme_cat_id' ";

		if ($keyword != '')
			$keyword 		= "AND ( pro.`name` LIKE '%$keyword%' OR SKU.`code` LIKE '%$keyword%' ) ";

		if ($limit != '') $limit = "LIMIT $offset, $limit ";

		$sql = "SELECT pro.`id` as product_id , pro.`name` as product_name, pro.`unit_import`, pro.`unit_export`, pro.`on_sales`, pro.`web_id`,
				pro.`ratio_convert`, pro.`multi_attribute`,
				pro.`img_1`, pro.`img_2`, pro.`img_3`, pro.`img_4`, pro.`img_5`, pro.`img_6`, 
				pro.`sum_stock`, pro.`description`, pro.`short_description`, pro.`point`, pro.`for_point`,
				SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, pro.`price`, pro.`wholesale_price`,
				IFNULL(SKU.`name`, '') sku_name, IFNULL(SKU.`img_1`, '') sku_img_1, SKU.`unique_id`, pro.`product_commission_id`, SKU.`price_promotion`, SKU.`price` sku_price
				, proTheme.`theme_cat_id`
				FROM $db->tbl_fix`$this->class_name` as proTheme
				INNER JOIN `SKU` ON  SKU.`unique_id` = proTheme.`unique_id` AND proTheme.`deleted` = 0 AND SKU.`deleted` = 0
                INNER JOIN $db->tbl_fix`product` pro ON pro.`id` = SKU.`product_id`
				WHERE pro.`deleted` = 0 AND SKU.`deleted` = 0 AND proTheme.`deleted` = 0
				AND pro.`hidden` = 0 
				AND pro.`shop_id` = '$shop_id'
				$keyword
				$sqlCatID
				$sqlForPoint
				GROUP BY SKU.`unique_id`
				ORDER BY proTheme.`priority` DESC 
				$limit ";

		$result     = $db->executeQuery($sql);
		$kq         = array();

		while ($row = mysqli_fetch_assoc($result)) {
			if ( $row['sku_name'] != '' )
				$row['product_name'] = $row['product_name'] . ' (' . $row['sku_name'] . ')';

			$row = $product->detail_product_general( $row['product_commission_id'], $member_group_id, $row);
			$row['product_link'] = $main->convert_link_url($row['product_name']);
			
			$kq[]   = $row;
			unset($row['sku_name']);
		}
		mysqli_free_result($result);

		return $kq;
	}


}