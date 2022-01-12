<?php
class providers extends model{
    
    protected $class_name   = 'providers';
    protected $id;
    protected $name;
    protected $vat_code;
    protected $contact;
    protected $address;
    protected $email;
    protected $mobile;
    protected $goods_provide;
    protected $account_bank;
    protected $warehouse_id;
    protected $root_user;
    protected $user_return;
    protected $from_pos_id;
    protected $to_pos_id;
    protected $status;
    protected $last_spent;
    protected $total_spent;
    protected $to_members_id;
    
    public function add(){
        global $db_store;
        
        $arr['name']            = $this->get('name');
        $arr['vat_code']        = $this->get('vat_code');
        $arr['contact']         = $this->get('contact');
        $arr['address']         = $this->get('address');
        $arr['email']           = $this->get('email');
        $arr['mobile']          = $this->get('mobile');
        $arr['goods_provide']   = $this->get('goods_provide');
        $arr['account_bank']    = $this->get('account_bank');
        $arr['warehouse_id']    = $this->get('warehouse_id');
        $arr['root_user']       = $this->get('root_user');
        $arr['user_return']     = $this->get('user_return');
        $arr['from_pos_id']     = $this->get('from_pos_id');
        $arr['to_pos_id']       = $this->get('to_pos_id');
        $arr['status']          = $this->get('status');
        $arr['last_spent']      = 0;
        $arr['total_spent']     = 0;
        $arr['to_members_id']     = 0;

        $db_store->record_insert($db_store->tbl_fix.$this->class_name, $arr );

        return $db_store->mysqli_insert_id();
    }

    public function create_user_provider( $username, $name, $root_user ){
        global $db_store, $pos_register, $db_pos;
        
        $dRegStore = $pos_register->get_detail_bystore_name( $db_pos );
        
        if( isset($dRegStore['id']) ){
            
            $sql = "SELECT * FROM ".$db_store->tbl_fix."`providers` WHERE `user_return` = '$username' AND `from_pos_id` = '".$dRegStore['id']."' LIMIT 1";
            $row = $db_store->executeQuery ( $sql, 1 );
            
            if( !isset($row['id']) ){
                
                $arr['name']            = $name;//fullname
                $arr['vat_code']        = '';
                $arr['contact']         = '';
                $arr['address']         = '';
                $arr['email']           = '';
                $arr['mobile']          = '';
                $arr['goods_provide']   = 'Nhập/Xuất nội bộ';
                $arr['account_bank']    = '';
                $arr['warehouse_id']    = 0;
                $arr['root_user']       = $root_user;
                $arr['user_return']     = $username;
                $arr['from_pos_id']     = $dRegStore['id'];
                $arr['to_pos_id']       = 0;
                $arr['status']          = 1;


                $this->set('name', $arr['name']);
                $this->set('vat_code', $arr['vat_code']);
                $this->set('contact', $arr['contact']);
                $this->set('address', $arr['address']);
                $this->set('email', $arr['email']);
                $this->set('mobile', $arr['mobile']);
                $this->set('goods_provide', $arr['goods_provide']);
                $this->set('account_bank', $arr['account_bank']);
                $this->set('warehouse_id', $arr['warehouse_id']);
                $this->set('root_user', $arr['root_user']);
                $this->set('user_return', $arr['user_return']);
                $this->set('from_pos_id', $arr['from_pos_id']);
                $this->set('to_pos_id', $arr['to_pos_id']);
                $this->set('status', $arr['status']);

                unset( $dRegStore );
                return $this->add();
            }else{
                return $row['id'];
            }
		}else{
            echo 'Error! create temporary provider.';
            exit();
        }
		
	}
    
    public function update(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['name']            = $this->get('name');
        $arr['vat_code']        = $this->get('vat_code');
        $arr['contact']         = $this->get('contact');
        $arr['address']         = $this->get('address');
        $arr['email']           = $this->get('email');
        $arr['mobile']          = $this->get('mobile');
        $arr['goods_provide']   = $this->get('goods_provide');
        $arr['account_bank']    = $this->get('account_bank');

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function plus_total_spent(){
        global $db_store;

        $id     = $this->get('id');
        $total_spent     = $this->get('total_spent');

        $sql    = "UPDATE $db_store->tbl_fix$this->class_name SET `total_spent` = (`total_spent` + '$total_spent'), `last_spent` = (`last_spent` + '".time()."') WHERE `id` = '$id' ";
        $db_store->executeQuery( $sql );

        return true;
    }

    public function subtract_total_spent(){
        global $db_store;

        $id             = $this->get('id');
        $total_spent     = $this->get('total_spent');

        $sql    = "UPDATE $db_store->tbl_fix$this->class_name SET `total_spent` = (`total_spent` - '$total_spent') WHERE `id` = '$id' ";
        $db_store->executeQuery( $sql );

        return true;
    }

    public function delete_item() {
		global $db_store;
		
		$result = $db_store->record_delete( $this->class_name, " `id` = '".$this->get('id')."'");
        
		return $result;
	}

    public function get_detail() {
        global $db_store;
        
        $sql = "SELECT * FROM $db_store->tbl_fix`". $this->class_name ."` WHERE `id` = '".$this->get('id')."'";
        $result = $db_store->executeQuery( $sql, 1);

        return $result;
    }

    public function get_name( $providers_id ) {
		global $db_store;
		
		$sql = "SELECT `name` FROM `". $this->class_name ."` WHERE `id` = '".$providers_id."'";
		$result = $db_store->executeQuery( $sql, 1);

		return $result['name'];
	}

    public function update_accept(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['to_members_id']   = $this->get('to_members_id');
        $arr['status']          = 1;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");
        
        return true;
    }

    public function update_reject(){
        global $db_store;

        $id                     = $this->get('id');
        $arr['status']          = -1;

        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `id` = '$id' ");

        return true;
    }

    public function count_request_waiting(){
        global $db_store;

        $to_pos_id = $this->get('to_pos_id');

        $sql = "SELECT COUNT(*) total
                FROM ".$db_store->tbl_fix."`providers`
                WHERE `to_pos_id` = '$to_pos_id'
                AND `status` = 0";
        
        $row = $db_store->executeQuery( $sql, 1);

        return $row['total']+0;
    }

    public function get_list_pos_waiting( )//keyword = email or mobile
	{
        global $db_store;
        
        $id     = $this->get('id');

		$sql = "SELECT
                providers.`id`,
				pos.`customer` `contact`,
				pos.`store_title` `name`,
				pos.`store_mobile` `mobile`,
				pos.`store_email` `email`
                FROM ".$db_store->tbl_fix."`providers`
                INNER JOIN ".$db_store->tbl_fix."`pos_register` pos ON pos.id = providers.from_pos_id
                WHERE
                `to_pos_id` = '$id'
                AND `pos_type` = 'retail'
                AND `status` = 0
                ";
        
		$row = $db_store->executeQuery_list ( $sql );
		
		return $row;
	}

    public function searching( $type, $keyword ){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }


        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name."
                WHERE 
                ( `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' ) 
                $type
                ORDER BY `name` ";
        
        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function searching_treasurer( $keyword ){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }


        $sql = "SELECT `id` `user_id`, `name` `fullname`, `mobile`  FROM ".$db_store->tbl_fix.$this->class_name."
                WHERE 
                ( `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' ) 
                $type
                ORDER BY `name` ";
        
        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function filter( $type, $ofset = '', $limit = '' ){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        if( $limit != '' ) $limit = " $ofset, $limit ";

        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name." WHERE 1 $type ORDER BY `name` $limit ";

        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function reset_spent(){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');
        
        $arr['last_spent']      = 0;
        $arr['total_spent']     = 0;
        $db_store->record_update( $db_store->tbl_fix.$this->class_name, $arr, " `from_pos_id` = '$from_pos_id' ");

        return true;
    }

    public function filter_count( $type){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }
        

        $sql = "SELECT COUNT(*) total FROM ".$db_store->tbl_fix.$this->class_name." WHERE 1 $type ";
        $row = $db_store->executeQuery( $sql, 1 );

        return $row['total']+0;
    }

    public function filter_r( $type, $sort, $ofset = '', $limit = '' ){
        global $db_store, $db;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        if( $limit != '' ) $limit = "LIMIT $ofset, $limit ";


        //condition sort by
		$sorting = '';

		if( isset( $sort['sortby_name'] ) && $sort['sortby_name'] != '' )
			if(	$sort['sortby_name'] == 'up'){
				$sorting = " `name` ASC ";
			}else{
				$sorting = " `name` DESC ";
			}

		if( isset( $sort['sortby_last_spent'] ) && $sort['sortby_last_spent'] != '' )
			if(	$sort['sortby_last_spent'] == 'up'){
				$sorting = " `last_spent` ASC ";
			}else{
				$sorting = " `last_spent` DESC ";
			}
        
		if( isset( $sort['sortby_total_liabilities'] ) && $sort['sortby_total_liabilities'] != '' )
			if(	$sort['sortby_total_liabilities'] == 'up'){
				$sorting = " `total_liabilities` ASC ";
			}else{
				$sorting = " `total_liabilities` DESC ";
			}

		if( isset( $sort['sortby_total_spent'] ) && $sort['sortby_total_spent'] != '' )
			if(	$sort['sortby_total_spent'] == 'down'){
				$sorting = " `total_spent` DESC ";
			}else{
				$sorting = " `total_spent` ASC ";
			}
        
		if($sorting != ''){
			$sorting = " ORDER BY ".$sorting;
		}else{
			$sorting = " ORDER BY name ASC ";
        }

        $sql = "SELECT pro.*, IFNULL( nTB.`total_liabilities`, 0 ) `total_liabilities`
                FROM ".$db_store->tbl_fix.$this->class_name." pro
                LEFT JOIN (
                    SELECT `customer_id`, SUM(`total_left`) `total_liabilities`
                    FROM ".$db->tbl_fix."`liabilities` lia
                    WHERE `total_left` > 0 AND `type` = 'SP'
                    GROUP BY lia.`customer_id`
                ) nTB ON nTB.customer_id = pro.id
                WHERE 1 $type
                $sorting
                $limit ";
        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function filter_r_summary( $type ){
        global $db_store, $db;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        $sql = "SELECT SUM(pro.`total_spent`) total_spent, SUM( IFNULL( nTB.`total_liabilities`, 0 ) ) `total_liabilities`
                FROM ".$db_store->tbl_fix.$this->class_name." pro
                LEFT JOIN (
                    SELECT `customer_id`, SUM(`total_left`) `total_liabilities`
                    FROM ".$db->tbl_fix."`liabilities` lia
                    WHERE `total_left` > 0 AND `type` = 'SP'
                    GROUP BY lia.`customer_id`
                ) nTB ON nTB.customer_id = pro.id
                WHERE 1 $type";
        
        $rows = $db_store->executeQuery( $sql, 1 );

        $kq['total_spent'] = $rows['total_spent']+0;
        $kq['total_liabilities'] = $rows['total_liabilities']+0;
        
        return $kq;
    }

    public function filter_r_count( $type){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }
        

        $sql = "SELECT COUNT(*) total FROM ".$db_store->tbl_fix.$this->class_name." WHERE 1 $type ";
        $row = $db_store->executeQuery( $sql, 1 );

        return $row['total']+0;
    }

    public function filter_erp( $keyword, $type, $sort, $ofset = '', $limit = '' ){
        global $db_store, $db;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        if( $limit != '' ) $limit = "LIMIT $ofset, $limit ";

        //condition sort by
		$sorting = '';

		if( isset( $sort['sortby_name'] ) && $sort['sortby_name'] != '' )
			if(	$sort['sortby_name'] == 'up'){
				$sorting = " `name` ASC ";
			}else{
				$sorting = " `name` DESC ";
			}

		if( isset( $sort['sortby_last_spent'] ) && $sort['sortby_last_spent'] != '' )
			if(	$sort['sortby_last_spent'] == 'up'){
				$sorting = " `last_spent` ASC ";
			}else{
				$sorting = " `last_spent` DESC ";
			}
        
		if( isset( $sort['sortby_total_liabilities'] ) && $sort['sortby_total_liabilities'] != '' )
			if(	$sort['sortby_total_liabilities'] == 'up'){
				$sorting = " `total_liabilities` ASC ";
			}else{
				$sorting = " `total_liabilities` DESC ";
			}

		if( isset( $sort['sortby_total_spent'] ) && $sort['sortby_total_spent'] != '' )
			if(	$sort['sortby_total_spent'] == 'down'){
				$sorting = " `total_spent` DESC ";
			}else{
				$sorting = " `total_spent` ASC ";
			}
        
		if($sorting != ''){
			$sorting = " ORDER BY ".$sorting;
		}else{
			$sorting = " ORDER BY name ASC ";
        }

        if( $keyword !='' ){
            $keyword = "AND (pro.name LIKE '%$keyword%' OR pro.mobile LIKE '%$keyword%' OR pro.vat_code LIKE '%$keyword%' OR pro.address LIKE '%$keyword%')";
        }

        $sql = "SELECT pro.*, IFNULL( nTB.`total_liabilities`, 0 ) `total_liabilities`
                FROM ".$db_store->tbl_fix.$this->class_name." pro
                LEFT JOIN (
                    SELECT `customer_id`, SUM(`total_left`) `total_liabilities`
                    FROM ".$db->tbl_fix."`liabilities` lia
                    WHERE `total_left` > 0 AND `type` = 'SP'
                    GROUP BY lia.`customer_id`
                ) nTB ON nTB.customer_id = pro.id
                WHERE 1 $type $keyword
                $sorting
                $limit ";
        $rows = $db_store->executeQuery_list( $sql );

        return $rows;
    }

    public function filter_erp_summary( $keyword, $type ){
        global $db_store, $db;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        if( $keyword !='' ){
            $keyword = "AND (pro.name LIKE '%$keyword%' OR pro.mobile LIKE '%$keyword%' OR pro.vat_code LIKE '%$keyword%' OR pro.address LIKE '%$keyword%')";
        }

        $sql = "SELECT SUM(pro.`total_spent`) total_spent
                        , SUM(IFNULL(nTB.`total_dept_value`, 0)) total_dept_value
                        , SUM(IFNULL(nTB.`total_dept_paid`, 0)) total_dept_paid
                        , SUM(IFNULL(nTB.`total_dept_left`, 0)) total_dept_left
                        , SUM(IFNULL(nTB.`total_liabilities`, 0)) total_liabilities
                FROM ".$db_store->tbl_fix.$this->class_name." pro
                LEFT JOIN (
                    SELECT `customer_id`, SUM(`total`) `total_dept_value`, SUM(`total_paid`) `total_dept_paid`, SUM(`total_left`) `total_dept_left`, SUM(`total_left`) `total_liabilities`
                    FROM ".$db->tbl_fix."`liabilities` lia
                    WHERE `type` = 'SP'
                    GROUP BY lia.`customer_id`
                ) nTB ON nTB.customer_id = pro.id
                WHERE 1 $type $keyword";

                echo $sql;
        
        $r = $db_store->executeQuery( $sql, 1 );

        return array(
            'total_spent' => isset($r['total_spent']) ? $r['total_spent']:0,
            'total_dept_value' => isset($r['total_dept_value']) ? $r['total_dept_value']:0,
            'total_dept_paid' => isset($r['total_dept_paid']) ? $r['total_dept_paid']:0,
            'total_dept_left' => isset($r['total_dept_left']) ? $r['total_dept_left']:0,
            'total_liabilities' => isset($r['total_liabilities']) ? $r['total_liabilities']:0,
        );
    }

    public function filter_erp_count( $keyword, $type){
        global $db_store;

        $from_pos_id    = $this->get('from_pos_id');

        if( $type != '' ){
            if( $type == 'citipos' )
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` > 0 ";
            else
                $type = " AND `from_pos_id` = '$from_pos_id' AND `to_pos_id` = 0 ";
        }else{
             $type = " AND `from_pos_id` = '$from_pos_id' ";
        }

        if( $keyword !='' ){
            $keyword = "AND (pro.name LIKE '%$keyword%' OR pro.mobile LIKE '%$keyword%' OR pro.vat_code LIKE '%$keyword%' OR pro.address LIKE '%$keyword%')";
        }

        $sql = "SELECT COUNT(*) total 
                FROM ".$db_store->tbl_fix.$this->class_name." pro
                WHERE 1 
                $type $keyword ";
        $row = $db_store->executeQuery( $sql, 1 );

        return $row['total']+0;
    }


    public function list_opt_citiPOS(){
        global $db_store;

        $from_pos_id = $this->get('from_pos_id');

        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name."
        WHERE `from_pos_id` = '$from_pos_id'
        AND `to_pos_id` > 0
        AND `status` = '1'
        ORDER BY `name` ";
        $result = $db_store->executeQuery( $sql );

        $opt = '';
        while( $row = mysqli_fetch_assoc($result) ){
            $opt .= '<option value="'.$row['id'].'" to_pos_id="'.$row['to_pos_id'].'">'.$row['name'].'</option>';
        }
        mysqli_free_result( $result );

        return $opt;
    }
    
    public function list_opt_all(){
        global $db_store;

        $from_pos_id = $this->get('from_pos_id');

        $sql = "SELECT *
                FROM ".$db_store->tbl_fix.$this->class_name."
                WHERE `from_pos_id` = '$from_pos_id'
                ORDER BY `name` ";
        $result = $db_store->executeQuery( $sql );

        $opt = '';
        while( $row = mysqli_fetch_assoc($result) ){
            $opt .= '<option value="'.$row['id'].'">'.$row['name'].' - '.$row['goods_provide'].'</option>';
        }
        mysqli_free_result( $result );
        
        return $opt;
    }

    public function list_by_citiPOS(){
        global $db_store;

        $from_pos_id = $this->get('from_pos_id');

        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name."
        WHERE `from_pos_id` = '$from_pos_id'
        AND `to_pos_id` > 0
        AND `status` = '1'
        ORDER BY `name` ";
        $result = $db_store->executeQuery_list( $sql );

        return $result;
    }

    //list products 
    public function searching_products( $db_name, $keyword, $type, $members_id ){
        global $db_store;

        $sql = "SELECT `user_id`,`member_group_id` FROM $db_name`members`
                WHERE `user_id` = '$members_id'
                LIMIT 1";
        $dMember = $db_store->executeQuery ( $sql, 1 );

        $member_group_id = 0;
        if( isset($dMember['user_id']) ){
            $member_group_id = $dMember['member_group_id'];
        }
        unset( $dMember );
        unset( $sql );
        
        if( $type == 'name' )
            $keyword = "AND pro.`name` LIKE '%$keyword%'";
        else
            $keyword = "AND SKU.`code` LIKE '%$keyword%'";

        $sql = "SELECT pro.`id` as product_id ,pro.`name` as product_name,
                        pro.`unit_import`, pro.`ratio_convert`, pro.`unit_export`, pro.`multi_attribute`,
                        SKU.`code`, SKU.`on_stock`, SKU.`id` as sku_id, SKU.`name` as sku_name, SKU.`price` sku_price, pro.`price`,
                        IFNULL(SKU.`name`, '') sku_name, pro.`product_commission_id`
				FROM $db_name`product` as pro
				JOIN $db_name`SKU` as SKU ON pro.`id` = SKU.`product_id`
				WHERE
                pro.`deleted`       = '0'
                AND SKU.`deleted`   = '0'
                AND pro.`shop_id`   = '1'
                $keyword
				GROUP BY SKU.`code`
                ORDER BY pro.`name` ASC, SKU.`name` ASC
                LIMIT 50";
        
        $result     = $db_store->executeQuery( $sql );
        $kq         = array();
        while ($row = mysqli_fetch_assoc($result) ) {

            if( $row['sku_name'] != '' )
                $row['product_name'] = $row['product_name'].' ('.$row['sku_name'].')';
            unset( $row['sku_name'] );

            //get commisison
            $sql = "SELECT `value` `commission` FROM $db_name`product_commission_detail`
                WHERE
                `product_commission_id` = '".$row['product_commission_id']."' 
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";
            $dCom = $db_store->executeQuery ( $sql, 1 );
            if( isset($dCom['commission']) )
                $row['commission'] = $dCom['commission'];
            else
                $row['commission'] = 0;
            
            if( $row['multi_attribute'] == 1){
                $row['price'] = $row['sku_price'];
            }

            $kq[]   = $row;
        }
        mysqli_free_result( $result );
        
        return $kq;
    }

    public function get_detail_by_mobile(){
        global $db_store;

        $id = $this->get('id');
        if( $id > 0 ) $id = " AND `id` <> '$id' ";
        
        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name." WHERE `from_pos_id` = '".$this->get('from_pos_id')."' AND `mobile` ='".$this->get('mobile')."' AND `mobile` <> '' $id LIMIT 1 ";
        $row = $db_store->executeQuery( $sql, 1);

        return $row;
    }

    public function get_detail_by_email(){
        global $db_store;

        $id = $this->get('id');
        if( $id > 0 ) $id = " AND `id` <> '$id' ";

        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name." WHERE `from_pos_id` = '".$this->get('from_pos_id')."' AND `email` ='".$this->get('email')."' AND `email` <> '' $id LIMIT 1 ";
        $row = $db_store->executeQuery( $sql, 1);

        return $row;
    }

    public function get_detail_by_pos_id(){
        global $db_store;

        $sql = "SELECT * FROM ".$db_store->tbl_fix.$this->class_name." WHERE `from_pos_id` = '".$this->get('from_pos_id')."' AND `to_pos_id` = '".$this->get('to_pos_id')."' AND `to_pos_id` <> '0' LIMIT 1 ";
        // echo $sql;
        $row = $db_store->executeQuery( $sql, 1);

        return $row;
    }

}
$providers = new providers();