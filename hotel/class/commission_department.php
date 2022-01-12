<?php
class commission_department extends model {

    protected $class_name = 'commission_department';
    
	protected $id;
	protected $client_id;//đơn hàng của ai
	protected $commission;
	protected $value;
	protected $point;
	protected $member_department_id;
	protected $manager_client_id;//ID client là người quản lý member_department.client_id 210930
    protected $client_mngt_revenue_id;//ID client quản lý doanh thu của phòng 210930
	protected $order_id;
    protected $shop_id;
    protected $total_order;
    protected $total_order_real;
    
    protected $day;
	protected $month;
	protected $year;
	protected $quarter;
	protected $created_at;
    
	public function add(){
		global $db;
		
        $arr['client_id'] 			    = $this->get('client_id');
        $arr['commission'] 			    = $this->get('commission');
        $arr['value'] 			        = $this->get('value');
        $arr['point'] 			        = $this->get('point');
        $arr['member_department_id'] 	= $this->get('member_department_id');
        $arr['order_id'] 			    = $this->get('order_id');
        $arr['shop_id'] 			    = $this->get('shop_id');
        $arr['total_order'] 			= $this->get('total_order');
        $arr['total_order_real'] 	    = $this->get('total_order_real');
        
        $arr['manager_client_id'] 	    = $this->get('manager_client_id');
        $arr['client_mngt_revenue_id'] 	= $this->get('client_mngt_revenue_id');
        
        $arr['day']                     = $this->get('day');
        $arr['month']                   = $this->get('month');
        $arr['year']                    = $this->get('year');
        $arr['quarter'] 			    = $this->get('quarter');
        $arr['created_at']              = strtotime( $arr['month'].'/'.$arr['day'].'/'.$arr['year'] );
        
		$db->record_insert( $db->tbl_fix.'`'.$this->class_name.'`', $arr );
		
		return $db->mysqli_insert_id();
    }

	public function update(){
		global $db;
		
        $id 			                = $this->get('id');
        $arr['commission'] 			    = $this->get('commission');
        $arr['value'] 			        = $this->get('value');
        $arr['point'] 			        = $this->get('point');
        $arr['total_order'] 			= $this->get('total_order');
        $arr['total_order_real'] 		= $this->get('total_order_real');
        
		$db->record_update( $db->tbl_fix.'`'.$this->class_name.'`', $arr, " `id` = '$id' " );
		
		return true;
    }

	public function delete_by_order(){
		global $db;
		
        $shop_id 			        = $this->get('shop_id');
        $order_id 			        = $this->get('order_id');
        
		$db->record_delete( $db->tbl_fix.'`'.$this->class_name.'`', " `shop_id` = '$shop_id' AND `order_id` = '$order_id' " );
		
		return true;
    }

    public function delete_day(){
		global $db;
		
        $day 			        = $this->get('day');
        $month 			        = $this->get('month');
        $year 			        = $this->get('year');
        
		$db->record_delete( $db->tbl_fix.'`'.$this->class_name.'`', " `day` = '$day' AND `month` = '$month' AND `year` = '$year' " );
		
		return true;
    }

    public function delete_item_by_order(){
		global $db;
		
        $shop_id 			   = $this->get('shop_id');
        $order_id 			   = $this->get('order_id');
        
		$db->record_delete( $db->tbl_fix.'`'.$this->class_name.'`', " `shop_id` = '$shop_id' AND `order_id` = '$order_id' " );
		
		return true;
    }

	public function modify(){
		global $db;
        
        $dRecord = $this->get_by_client();

        if( isset($dRecord['id']) ){
            $this->set('id', $dRecord['id']);
            $this->update();
            return $dRecord['id'];
        }else{
            return $this->add();
        }
        
    }

    public function get_by_client(){
        global $db;

        $client_id 		            = $this->get('client_id');
        $order_id 		            = $this->get('order_id');
        $shop_id 		            = $this->get('shop_id');
        $member_department_id 		= $this->get('member_department_id');
        $day 		                = $this->get('day');
        $month 		                = $this->get('month');
        $year 		                = $this->get('year');
        
        $sql = "SELECT * FROM ".$db->tbl_fix.'`'.$this->class_name.'`'." com
                WHERE 
                `day` = '$day' AND
                `member_department_id` = '$member_department_id' AND 
                `month` = '$month' AND 
                `year` = '$year' AND 
                `shop_id` = '$shop_id' AND 
                `order_id` = '$order_id' AND 
                `client_id` = '$client_id'
                LIMIT 1";

        return $db->executeQuery( $sql, 1);

    }

    //Người CEO hoặc admin => lấy danh sách
    public function filter_info_sum( $keyword, $by_department_id, $by_value, $from, $to ){
        global $db;

        $sqlDe = '';
        if( $by_department_id != '' ){
            $lRMD = explode( ';', $by_department_id);
            foreach ($lRMD as $itde) {
                if( $itde != '' )
                    $sqlDe .= " mb.`member_department_id` = '$itde' OR ";
            }

            if( $sqlDe != '' ){
                $sqlDe = "AND (".substr($sqlDe,0, -3)." )";
            }
        }

        $shop_id = $this->get('shop_id');
        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        if( $keyword != '' ) $keyword = " AND ( owndepartment.`fullname` LIKE '%$keyword%' 
                                                OR owndepartment.`code` LIKE '%$keyword%' 
                                                OR owndepartment.`mobile` LIKE '%$keyword%' 
                                                OR owndepartment.`email` LIKE '%$keyword%' 
                                                OR com.`member_department_id` LIKE '%$keyword%' ) ";
        
        if( $by_value == 'day' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`month`, com.`$by_value`";
        else if( $by_value == 'month' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`month`";
        else if( $by_value == 'quarter' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`quarter`";
        else if( $by_value == 'year' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`";
        else if( $by_value == 'member' )
            $by_value = "GROUP BY owndepartment.`user_id`";
        else
            $by_value = "GROUP BY com.`member_department_id`";
        
        //mb: là người tạo đơn
        //owndepartment: người quản lý đơn
        $sql = "SELECT  COUNT(*) total_record,
                        IFNULL(SUM(`total_value`), 0) total_value,
                        IFNULL(SUM(`total_point`), 0) total_point,
                        IFNULL(SUM(`total_sale`), 0) total_sale,
                        IFNULL(SUM(`total_sale_real`), 0) total_sale_real
                FROM
                (
                    SELECT COUNT(*) total_record, SUM(`value`) total_value, SUM(com.`point`) total_point, SUM( `total_order` ) total_sale, SUM( `total_order_real` ) total_sale_real
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = com.`client_id`
                    LEFT JOIN $db->tbl_fix`member_department` mg ON mg.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`members` owndepartment ON owndepartment.`user_id` = mg.`client_id`
                    WHERE
                    '$from' < com.`created_at` AND com.`created_at` < '$to'
                    $keyword
                    $sqlShop
                    $sqlDe
                    $by_value
                ) nTB ";

        return $db->executeQuery( $sql, 1 );
		
    }
    
    //Người CEO hoặc admin => lấy danh sách
    public function filter( $keyword, $by_department_id, $by_value, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db;

        $member_department = new member_department();

        $sqlDe = '';
        if( $by_department_id != '' ){
            $lRMD = explode( ';', $by_department_id);
            foreach ($lRMD as $itde) {
                if( $itde != '' )
                    $sqlDe .= " mb.`member_department_id` = '$itde' OR ";
            }

            if( $sqlDe != '' ){
                $sqlDe = "AND (".substr($sqlDe,0, -3)." )";
            }
        }
        
        $shop_id = $this->get('shop_id');
        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        if( $keyword != '' ) $keyword = " AND ( owndepartment.`fullname` LIKE '%$keyword%' 
                                                OR owndepartment.`code` LIKE '%$keyword%' 
                                                OR owndepartment.`mobile` LIKE '%$keyword%' 
                                                OR owndepartment.`email` LIKE '%$keyword%' 
                                                OR com.`member_department_id` LIKE '%$keyword%' ) ";

        if( $by_value == 'day' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`month`, com.`$by_value`";
        else if( $by_value == 'month' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`month`";
        else if( $by_value == 'quarter' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`, com.`quarter`";
        else if( $by_value == 'year' )
            $by_value = "GROUP BY com.`member_department_id`, com.`year`";
        else if( $by_value == 'member' )
            $by_value = "GROUP BY owndepartment.`user_id`";
        else
            $by_value = "GROUP BY com.`member_department_id`";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        
        if( in_array($field, array( 'fullname',
                                    'mobile',
                                    'member_department_id',
                                    'code',
                                    'total_sale',
                                    'total_sale_real',
                                    'total_value',
                                    'total_point',
                                    'member_department_name',
                                    'department_root_id',
                                    'day',
                                    'month',
                                    'year',
                                    'quarter'
                                    ))
                                    
        ){
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';
            $sort = " ORDER BY `$field` $sort ";
        }else{
            $sort = " ORDER BY nTB.`member_department_name` ASC ";
        }
        
        //mb: là người tạo đơn
        //owndepartment: người quản lý đơn
		$sql = "SELECT nTB.*
                FROM (
                    SELECT com.`day`, com.`month`, com.`year`, com.`quarter`
                            , SUM(com.`value`) total_value
                            , SUM(com.`point`) total_point
                            , SUM( com.`total_order` ) total_sale
                            , SUM( com.`total_order_real` ) total_sale_real
                            , mg.`root_id` department_root_id, mg.`name` member_department_name, com.`member_department_id`
                            , IFNULL(owndepartment.`fullname`, '') fullname, IFNULL(owndepartment.`code`, '') code, IFNULL(owndepartment.`mobile`, '') mobile, IFNULL(owndepartment.`avatar`, '') avatar
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = com.`client_id`
                    LEFT JOIN $db->tbl_fix`member_department` mg ON mg.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`members` owndepartment ON owndepartment.`user_id` = mg.`client_id`
                    WHERE
                    '$from' < com.`created_at` AND com.`created_at` < '$to'
                    $keyword
                    $sqlShop
                    $sqlDe
                    $by_value
                ) nTB
                $sort $limit";

        $result = $db->executeQuery( $sql );
        
        $kq = array();
        while( $row = mysqli_fetch_assoc($result) ){
            $member_department->set('id', $row['department_root_id']);
            $row['member_department_root'] = $member_department->get_name();
            unset($row['department_root_id']);
            $kq[] = $row;
        }
        mysqli_free_result( $result );

        return $kq;
		
    }

    //Show hoa hồng mà họ nhận được khi họ là người hưởng trực tiếp
    public function client_filter_info_sum( $keyword, $grouped, $from, $to ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_id                  = $this->get('client_id');
        $member_department_id       = $this->get('member_department_id');

        $sqlGroup = "GROUP BY com.`id`";
        if( $grouped == 1 )
            $sqlGroup = "GROUP BY com.`member_department_id`";

        $client_id = " AND mb_group.`client_id` = '$client_id' ";//Người nhận hoa hồng phòng ban

        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' 
                                                OR mb.`mobile` LIKE '%$keyword%' 
                                                OR mb.`code` LIKE '%$keyword%' 
                                                OR mb_group.`name` LIKE '%$keyword%' 
                                                OR mb_group.`id` LIKE '%$keyword%' ) ";

        //members: là người mua đơn
        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        SUM(com.`value`) `value`,
                        SUM(com.`point`) `point`,
                        SUM( com.`total_order`) `total_order`,
                        SUM(com.`total_order_real`) `total_order_real`
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    
                    $client_id
                    $keyword
                    $sqlShop
                    $member_department_id
                    $sqlGroup

                ) ntb WHERE `value` IS NOT NULL";

        $kq = $db->executeQuery( $sql, 1 );

        return array(
                'total_record' => isset($kq['total_record']) ? ($kq['total_record']+0):0,
                'total_commission' => isset($kq['total_commission']) ? ($kq['total_commission']+0):0,
                'total_point' => isset($kq['total_point']) ? ($kq['total_point']+0):0,
                'total_order' => isset($kq['total_order']) ? ($kq['total_order']+0):0,
                'total_order_real' => isset($kq['total_order_real']) ? ($kq['total_order_real']+0):0
        );
		
    }
    
    //Người nhận hoa hồng lấy danh sách đơn mà họ được hưởng ở phòng ban nào
    public function client_filter( $keyword, $grouped, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_id                  = $this->get('client_id');
        $member_department_id       = $this->get('member_department_id');

        $client_id = " AND mb_group.`client_id` = '$client_id' ";//mb_group:client_id = người hưởng hoa hồng
        
        $sqlGroup = "GROUP BY com.`id`";
        if( $grouped == 1 )
            $sqlGroup = "GROUP BY com.`member_department_id`";
        
        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' 
                                                OR mb.`mobile` LIKE '%$keyword%' 
                                                OR mb.`code` LIKE '%$keyword%' 
                                                OR mb_group.`name` LIKE '%$keyword%' 
                                                OR mb_group.`id` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        

        $sqlSort = " ORDER BY `order_created_at` DESC ";
        if( in_array($field, array(
                                    
                                    'order_created_at',
                                    'fullname',
                                    'code',
                                    'member_department_name',
                                    'member_department_id',
                                    'total_order_real',
                                    'total_order',
                                    'value',
                                    'point',

                                    ))
                                    
        ){
        
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  
                                        'order_created_at'         => '`order_created_at`',
                                        'fullname'                     => '`fullname`',
                                        'code'               => '`code`',
                                        'member_department_name'               => '`member_department_name`',
                                        'member_department_id'               => '`member_department_id`',
                                        'total_order_real'           => '`total_order_real`',
                                        'total_order'                  => '`total_order`',
                                        'value'                  => '`value`',
                                        'point'                  => '`point`'
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';
                
                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
        }

        //members: là người mua đơn hàng

        $sql = "SELECT *
                FROM(

                    SELECT  SUM(com.`value`) `value`
                            , SUM(com.`point`) `point`
                            , SUM(`total_order`) total_order
                            , SUM(`total_order_real`) total_order_real
                            , com.`member_department_id`
                            , com.`member_department_id` filter_id
                            , com.`order_id`
                            , colod.`shop_id`
                            , colod.`order_created_at` order_created_at
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') member_department_name
                            , mb.`user_id` client_id
                            , mb.`fullname` fullname
                            , mb.`mobile` mobile
                            , IFNULL(mb.`code`, '') code
                    
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
                    $client_id
                    $keyword
                    $sqlShop
                    $member_department_id
                    $sqlGroup
                    
                ) ntb WHERE `value` IS NOT NULL
                $sqlSort
                $limit";
        
        return $db->executeQuery_list( $sql );
		
    }

    public function client_mngt_revenue_info_sum( $keyword, $from, $to ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_mngt_revenue_id     = $this->get('client_mngt_revenue_id');
        $member_department_id       = $this->get('member_department_id');

        $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";
        

        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        //Trưởng team tìm theo người đã mua đơn
        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' 
                                                OR mb.`mobile` LIKE '%$keyword%' 
                                                OR mb.`code` LIKE '%$keyword%' 
                                                OR mb_group.`name` LIKE '%$keyword%' 
                                                OR mb_group.`id` LIKE '%$keyword%' ) ";

        /**
         * members: người mua đơn hàng
         */

        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        SUM(com.`value`) `value`,
                        SUM(com.`point`) `point`,
                        SUM( com.`total_order`) `total_order`,
                        SUM(com.`total_order_real`) `total_order_real`
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
                    $client_mngt_revenue_id
                    $keyword
                    $sqlShop
                    $member_department_id

                ) ntb WHERE `value` IS NOT NULL";

        $kq = $db->executeQuery( $sql, 1 );

        return array(
                'total_record' => isset($kq['total_record']) ? ($kq['total_record']+0):0,
                'total_commission' => isset($kq['total_commission']) ? ($kq['total_commission']+0):0,
                'total_point' => isset($kq['total_point']) ? ($kq['total_point']+0):0,
                'total_order' => isset($kq['total_order']) ? ($kq['total_order']+0):0,
                'total_order_real' => isset($kq['total_order_real']) ? ($kq['total_order_real']+0):0
        );
		
    }
    
    public function client_mngt_revenue( $keyword, $grouped, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_mngt_revenue_id    = $this->get('client_mngt_revenue_id');
        $member_department_id       = $this->get('member_department_id');
        
        $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";//client_mngt_revenue_id người quản lý phòng ban
        
        $sqlGroup = " GROUP BY com.`order_id`";//không grouped thì show theo đơn hàng
        if( $grouped == 1 )
            $sqlGroup = " GROUP BY com.`member_department_id` ";
        
        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        //Trưởng team tìm theo người đã mua đơn
        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' 
                                                OR mb.`mobile` LIKE '%$keyword%' 
                                                OR mb.`code` LIKE '%$keyword%' 
                                                OR mb_group.`name` LIKE '%$keyword%' 
                                                OR mb_group.`id` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        

        $sqlSort = " ORDER BY `order_created_at` DESC ";
        if( in_array($field, array(
                                    
                                    'order_created_at',
                                    'fullname',
                                    'code',
                                    'member_department_name',
                                    'member_department_id',
                                    'total_order_real',
                                    'total_order',
                                    'value',
                                    'point',

                                    ))
                                    
        ){
        
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  
                                        'order_created_at'         => '`order_created_at`',
                                        'fullname'                     => '`fullname`',
                                        'code'               => '`code`',
                                        'member_department_name'               => '`member_department_name`',
                                        'member_department_id'               => '`member_department_id`',
                                        'total_order_real'           => '`total_order_real`',
                                        'total_order'                  => '`total_order`',
                                        'value'                  => '`value`',
                                        'point'                  => '`point`'
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
        }

        $sql = "SELECT *
                FROM(

                    SELECT  SUM(com.`value`) `value`
                            , SUM(com.`point`) `point`
                            , SUM(`total_order`) total_order
                            , SUM(`total_order_real`) total_order_real
                            , com.`member_department_id`
                            , com.`member_department_id` fitler_id
                            , com.`order_id`
                            , colod.`shop_id`
                            , colod.`order_created_at` order_created_at
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') member_department_name
                            , mb.`user_id` client_id
                            , mb.`fullname` fullname
                            , mb.`mobile` mobile
                            , IFNULL(mb.`code`, '') code
                    
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
                    $client_mngt_revenue_id
                    $keyword
                    $sqlShop
                    $member_department_id
                    $sqlGroup
                    
                ) ntb WHERE `value` IS NOT NULL
                $sqlSort
                $limit";


        return $db->executeQuery_list( $sql );
		
    }

    //HC: for app grouped 210505: department commission/revenue
    public function client_app_grouped_info( $keyword, $from, $to, $type = 'commission' ){
        global $db;// $type = revenue ; commission

        $shop_id                    = $this->get('shop_id');
        $client_id                  = $this->get('client_id');
        $member_department_id       = $this->get('member_department_id');

        if( $type == 'revenue')
            $client_id = " AND mb_group.`client_mngt_revenue_id` = '$client_id' ";
        else
            $client_id = " AND mb_group.`client_id` = '$client_id' ";

        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb_group.`name` LIKE '%$keyword%' ) ";//Tìm theo tên phòng ban


        //members: người mua đơn
        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        SUM(com.`value`) `value`,
                        SUM(com.`point`) `point`,
                        SUM( com.`total_order`) `total_order`,
                        SUM(com.`total_order_real`) `total_order_real`

                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    
                    $client_id
                    $keyword
                    $sqlShop
                    $member_department_id

                    GROUP BY com.`member_department_id`

                ) ntb WHERE `value` IS NOT NULL";
                
        $kq = $db->executeQuery( $sql, 1 );
        
        return array(
                'total_record' => isset($kq['total_record']) ? ($kq['total_record']+0):0,
                'total_commission' => isset($kq['total_commission']) ? ($kq['total_commission']+0):0,
                'total_point' => isset($kq['total_point']) ? ($kq['total_point']+0):0,
                'total_order' => isset($kq['total_order']) ? ($kq['total_order']+0):0,
                'total_order_real' => isset($kq['total_order_real']) ? ($kq['total_order_real']+0):0
        );
		
    }
    
    //HC: for app grouped 210505: department commission/revenue
    public function client_app_grouped( $keyword, $from, $to, $type = 'commission', $offset = 0, $limit = '' ){
        global $db;// $type = revenue ; commission

        $shop_id                    = $this->get('shop_id');
        $client_id                  = $this->get('client_id');
        $member_department_id       = $this->get('member_department_id');

        if( $type == 'revenue' )
            $client_id = " AND mb_group.`client_mngt_revenue_id` = '$client_id' ";
        else//commission
            $client_id = " AND mb_group.`client_id` = '$client_id' ";
        
        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb_group.`name` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";

        /**
         * mb table => show người chủ đơn hàng
         */
        $sql = "SELECT *
                FROM(

                    SELECT  SUM(com.`value`) `value`
                            , SUM(com.`point`) `point`
                            , SUM(`total_order`) total_order
                            , SUM(`total_order_real`) total_order_real
                            , com.`member_department_id` filter_id
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') `name`
                    
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    
                    $client_id
                    $keyword
                    $sqlShop
                    $member_department_id

                    GROUP BY com.`member_department_id`
                    
                ) ntb WHERE `value` IS NOT NULL
                ORDER BY ntb.`name`
                $limit";

        return $db->executeQuery_list( $sql );
		
    }

    //HuanCoder Modify: 31/03/2021
    public function chart_data_type( $type_chart = 'day' ){
        //Truyền client_id thì ko truyền client_mngt_revenue_id
        if( $type_chart == 'quarter' ){
            return $this->chart_data_by_quarter();
        }elseif( $type_chart == 'month' ){
            return $this->chart_data_by_month();
        }else{
            //day
            return $this->chart_data_by_day();
        }
    }

    public function chart_data_by_day(){
        global $db, $main;
        
        $shop_id                            = $this->get('shop_id');
        $client_id                          = $this->get('client_id');
        $client_mngt_revenue_id             = $this->get('client_mngt_revenue_id');

        if( $client_id != '' ){
            $client_id = " AND mb_group.`client_id` = '$client_id' ";//mb_group.`client_id` => người hưởng hoa hồng
            $sqlSumBy = "com.`value`";
        }else if( $client_mngt_revenue_id != '' ){
            $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";
            $sqlSumBy = "com.`total_order_real`";
        }else{
            $sqlSumBy = "com.`value`";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $start_time = $ck_start_time = strtotime( date('m/d/Y', time() - 30*86400 ) );

        $sql = "SELECT SUM($sqlSumBy) `y`, CONCAT(com.`day`, '/', com.`month`, '/', com.`year` ) `x`, com.`created_at`
                FROM $db->tbl_fix`$this->class_name` com
                LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                WHERE  com.`created_at` > '$start_time' $sqlShop $client_mngt_revenue_id $client_id
                GROUP BY com.`day`, com.`month`,com.`year`
                ORDER BY com.`created_at`";
        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking( $kq, $ck_start_time, 'day');

        return $kq;
		
    }

    public function chart_data_by_month(){
        global $db, $main;

        $shop_id                            = $this->get('shop_id');
        $client_id                          = $this->get('client_id');
        $client_mngt_revenue_id             = $this->get('client_mngt_revenue_id');

        if( $client_id != '' ){
            $client_id = " AND mb_group.`client_id` = '$client_id' ";//mb_group.`client_id` => người hưởng hoa hồng
            $sqlSumBy = "com.`value`";
        }else if( $client_mngt_revenue_id != '' ){
            $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";
            $sqlSumBy = "com.`total_order_real`";
        }else{
            $sqlSumBy = "com.`value`";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $start_time = $ck_start_time = strtotime( date('m/01/Y', time() - 334*86400 ) );

        $sql = "SELECT SUM($sqlSumBy) `y`, CONCAT(com.`month`, '/', com.`year` ) `x`, com.`created_at`
                FROM $db->tbl_fix`$this->class_name` com
                LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                WHERE  com.`created_at` > '$start_time' $sqlShop $client_mngt_revenue_id $client_id
                GROUP BY com.`month`, com.`year`
                ORDER BY com.`created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking( $kq, $ck_start_time, 'month');

        return $kq;
    }

    public function chart_data_by_quarter(){
        global $db, $main;

        $shop_id                            = $this->get('shop_id');
        $client_id                          = $this->get('client_id');
        $client_mngt_revenue_id             = $this->get('client_mngt_revenue_id');

        if( $client_id != '' ){
            $client_id = " AND mb_group.`client_id` = '$client_id' ";//mb_group.`client_id` => người hưởng hoa hồng
            $sqlSumBy = "com.`value`";
        }else if( $client_mngt_revenue_id != '' ){
            $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";
            $sqlSumBy = "com.`total_order_real`";
        }else{//rỗng là lấy hoa hồng tổng công ty
            $sqlSumBy = "com.`value`";
        }

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }

        $unixtimeQuater = $main->getUnixtimeTheQuater(strtotime("-1 year"));
        $start_time = $ck_start_time = $unixtimeQuater['start_time'];

        $sql = "SELECT SUM($sqlSumBy) `y`, CONCAT('Quí ', com.`quarter`, ' ', com.`year` ) `x`, com.`created_at`
                FROM $db->tbl_fix`$this->class_name` com
                LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                WHERE  com.`created_at` > '$start_time' $sqlShop $client_mngt_revenue_id $client_id
                GROUP BY com.`quarter`, com.`year`
                ORDER BY com.`created_at`";
        
        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'quarter');

        return $kq;
    }

    // public function client_filter_for_client_info_sum( $keyword, $grouped, $from, $to ){
    //     global $db;

    //     $shop_id                    = $this->get('shop_id');
    //     $client_id                  = $this->get('client_id');
    //     $member_department_id       = $this->get('member_department_id');

    //     $client_id = " AND mb_group.`client_id` = '$client_id' ";

    //     $sqlGroup = '';
    //     if( $grouped == 1 )
    //         $sqlGroup = " GROUP BY com.`member_department_id` ";
    //     else
    //         $sqlGroup = " GROUP BY com.`id` ";
            
    //     $sqlShop = '';
    //     if( $shop_id != '' ){
    //         $lSh = explode( ';', $shop_id);
    //         foreach ($lSh as $itde) {
    //             if( $itde != '' )
    //                 $sqlShop .= " com.`shop_id` = '$itde' OR ";
    //         }

    //         if( $sqlShop != '' ){
    //             $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
    //         }
    //     }
        
    //     if( $member_department_id != '' )
    //         $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

    //     if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR mb_group.`name` LIKE '%$keyword%' OR mb_group.`id` LIKE '%$keyword%' ) ";

    //     $sql = "SELECT COUNT(*) total_record
    //                 , SUM(`value`) total_commission
    //                 , SUM(`total_order`) total_order
    //                 , SUM(`total_order_real`) total_order_real
    //             FROM(

    //                 SELECT  
    //                     SUM(com.`value`) `value`,
    //                     SUM(com.`total_order`) `total_order`,
    //                     SUM(com.`total_order_real`) `total_order_real`
    //                 FROM $db->tbl_fix`$this->class_name` com
    //                 LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
    //                 LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
    //                 LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
    //                 WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
    //                 $client_id
    //                 $keyword
    //                 $sqlShop
    //                 $member_department_id

    //                 $sqlGroup

    //             ) ntb";

    //     $kq = $db->executeQuery( $sql, 1 );

    //     return array(
    //             'total_record' => isset($kq['total_record']) ? ($kq['total_record']+0):0,
    //             'total_commission' => isset($kq['total_commission']) ? ($kq['total_commission']+0):0,
    //             'total_order' => isset($kq['total_order']) ? ($kq['total_order']+0):0,
    //             'total_order_real' => isset($kq['total_order_real']) ? ($kq['total_order_real']+0):0
    //     );
		
    // }
    
    // public function client_filter_for_client( $keyword, $grouped, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
    //     global $db;

    //     $shop_id                    = $this->get('shop_id');
    //     $client_id                  = $this->get('client_id');
    //     $member_department_id       = $this->get('member_department_id');

    //     $client_id = " AND mb_group.`client_id` = '$client_id' ";
        
    //     $sqlGroup = '';
    //     if( $grouped == 1 )
    //         $sqlGroup = " GROUP BY com.`member_department_id` ";
    //     else
    //         $sqlGroup = " GROUP BY com.`id` ";
        
    //     $sqlShop = '';
    //     if( $shop_id != '' ){
    //         $lSh = explode( ';', $shop_id);
    //         foreach ($lSh as $itde) {
    //             if( $itde != '' )
    //                 $sqlShop .= " com.`shop_id` = '$itde' OR ";
    //         }

    //         if( $sqlShop != '' ){
    //             $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
    //         }
    //     }
        
    //     if( $member_department_id != '' )
    //         $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

    //     if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR mb_group.`name` LIKE '%$keyword%' OR mb_group.`id` LIKE '%$keyword%' ) ";

    //     if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        

    //     $sqlSort = " ORDER BY `order_created_at` DESC ";
    //     if( in_array($field, array(
                                    
    //                                 'order_created_at',
    //                                 'fullname',
    //                                 'code',
    //                                 'member_department_name',
    //                                 'member_department_id',
    //                                 'total_order_real',
    //                                 'total_order',
    //                                 'value',

    //                                 ))
                                    
    //     ){
        
    //         if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

    //             $sortFieldArr = array(  
    //                                     'order_created_at'         => '`order_created_at`',
    //                                     'fullname'                     => '`fullname`',
    //                                     'code'               => '`code`',
    //                                     'member_department_name'               => '`member_department_name`',
    //                                     'member_department_id'               => '`member_department_id`',
    //                                     'total_order_real'           => '`total_order_real`',
    //                                     'total_order'                  => '`total_order`',
    //                                     'value'                  => '`value`'
    //                             );

    //             $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

    //             if( $field != '' )
    //                 $sqlSort = " ORDER BY $field $sort ";
    //     }

    //     $sql = "SELECT *
    //             FROM(

    //                 SELECT  SUM(com.`value`) `value`
    //                         , SUM(`total_order`) total_order
    //                         , SUM(`total_order_real`) total_order_real
    //                         , com.`member_department_id`
    //                         , com.`order_id`
    //                         , colod.`shop_id`
    //                         , colod.`order_created_at` order_created_at
    //                         , IFNULL(mb_group.`name`, 'Chưa khai báo') member_department_name
    //                         , mb.`user_id` client_id
    //                         , mb.`fullname` fullname
    //                         , mb.`mobile` mobile
    //                         , IFNULL(mb.`code`, '') code
                    
    //                 FROM $db->tbl_fix`$this->class_name` com
    //                 LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
    //                 LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
    //                 LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
    //                 WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
    //                 $client_id
    //                 $keyword
    //                 $sqlShop
    //                 $member_department_id
    //                 $sqlGroup
                    
    //             ) ntb
    //             $sqlSort
    //             $limit";

    //     return $db->executeQuery_list( $sql );
		
    // }

    public function client_mngt_revenue_for_client_info_sum( $keyword, $grouped, $from, $to ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_mngt_revenue_id     = $this->get('client_mngt_revenue_id');
        $member_department_id       = $this->get('member_department_id');

        $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";

        $sqlGroup = '';
        if( $grouped == 1 )
            $sqlGroup = " GROUP BY com.`member_department_id` ";
        else
            $sqlGroup = " GROUP BY com.`id` ";
            
        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR mb_group.`name` LIKE '%$keyword%' OR mb_group.`id` LIKE '%$keyword%' ) ";

        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        SUM(com.`value`) `value`,
                        SUM(com.`point`) `point`,
                        SUM( com.`total_order`) `total_order`,
                        SUM(com.`total_order_real`) `total_order_real`
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
                    $client_mngt_revenue_id
                    $keyword
                    $sqlShop
                    $member_department_id

                    $sqlGroup

                ) ntb";

        $kq = $db->executeQuery( $sql, 1 );

        return array(
                'total_record' => isset($kq['total_record']) ? ($kq['total_record']+0):0,
                'total_commission' => isset($kq['total_commission']) ? ($kq['total_commission']+0):0,
                'total_point' => isset($kq['total_point']) ? ($kq['total_point']+0):0,
                'total_order' => isset($kq['total_order']) ? ($kq['total_order']+0):0,
                'total_order_real' => isset($kq['total_order_real']) ? ($kq['total_order_real']+0):0
        );
		
    }
    
    public function client_mngt_revenue_for_client( $keyword, $grouped, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db;

        $shop_id                    = $this->get('shop_id');
        $client_mngt_revenue_id     = $this->get('client_mngt_revenue_id');
        $member_department_id       = $this->get('member_department_id');

        $client_mngt_revenue_id = " AND mb_group.`client_mngt_revenue_id` = '$client_mngt_revenue_id' ";
        
        $sqlGroup = '';
        if( $grouped == 1 )
            $sqlGroup = " GROUP BY com.`member_department_id` ";
        else
            $sqlGroup = " GROUP BY com.`id` ";
        
        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
        }
        
        if( $member_department_id != '' )
            $member_department_id = " AND com.`member_department_id` = '$member_department_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' OR mb_group.`name` LIKE '%$keyword%' OR mb_group.`id` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        

        $sqlSort = " ORDER BY `order_created_at` DESC ";
        if( in_array($field, array(
                                    
                                    'order_created_at',
                                    'fullname',
                                    'code',
                                    'member_department_name',
                                    'member_department_id',
                                    'total_order_real',
                                    'total_order',
                                    'value',

                                    ))
                                    
        ){
        
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  
                                        'order_created_at'         => '`order_created_at`',
                                        'fullname'                     => '`fullname`',
                                        'code'               => '`code`',
                                        'member_department_name'               => '`member_department_name`',
                                        'member_department_id'               => '`member_department_id`',
                                        'total_order_real'           => '`total_order_real`',
                                        'total_order'                  => '`total_order`',
                                        'value'                  => '`value`'
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
        }

        $sql = "SELECT *
                FROM(

                    SELECT  SUM(com.`value`) `value`
                            , SUM(`total_order`) total_order
                            , SUM(`total_order_real`) total_order_real
                            , com.`member_department_id`
                            , com.`order_id`
                            , colod.`shop_id`
                            , colod.`order_created_at` order_created_at
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') member_department_name
                            , mb.`user_id` client_id
                            , mb.`fullname` fullname
                            , mb.`mobile` mobile
                            , IFNULL(mb.`code`, '') code
                    
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_department` mb_group ON mb_group.`id` = com.`member_department_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`order_created_at` AND colod.`order_created_at` < '$to'
                    
                    $client_mngt_revenue_id
                    $keyword
                    $sqlShop
                    $member_department_id
                    $sqlGroup
                    
                ) ntb
                $sqlSort
                $limit";

        return $db->executeQuery_list( $sql );
		
    }



}