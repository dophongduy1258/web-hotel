<?php
class commission_coaching extends model {

    protected $class_name = 'commission_coaching';
    
	protected $id;
	protected $client_id;//Hoa hồng của user_id nào hưởng (ở đây muốn xác định con nào thì dựa vào bảng collected_order join với members)
	protected $commission;
	protected $value;
	protected $point;
	protected $member_group_id;
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
        $arr['member_group_id'] 	    = $this->get('member_group_id');
        $arr['order_id'] 			    = $this->get('order_id');
        $arr['shop_id'] 			    = $this->get('shop_id');
        $arr['total_order'] 			= $this->get('total_order');
        $arr['total_order_real'] 		= $this->get('total_order_real');
        
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
        $arr['client_id'] 	            = $this->get('client_id');
        $arr['member_group_id'] 	    = $this->get('member_group_id');
        $arr['commission'] 			    = $this->get('commission');
        $arr['value'] 			        = $this->get('value');
        $arr['point'] 			        = $this->get('point');
        $arr['total_order'] 			= $this->get('total_order');
        $arr['total_order_real'] 		= $this->get('total_order_real');

		$db->record_update( $db->tbl_fix.'`'.$this->class_name.'`', $arr, " `id` = '$id' " );
		
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

        $client_id 		= $this->get('client_id');
        $order_id 		= $this->get('order_id');
        $shop_id 		= $this->get('shop_id');
        $day 		    = $this->get('day');
        $month 		    = $this->get('month');
        $year 		    = $this->get('year');
        
        $sql = "SELECT * FROM ".$db->tbl_fix.'`'.$this->class_name.'`'." com
                WHERE 
                `day` = '$day' AND
                `month` = '$month' AND 
                `year` = '$year' AND 
                `shop_id` = '$shop_id' AND 
                `order_id` = '$order_id' AND 
                `client_id` = '$client_id'
                LIMIT 1";

        return $db->executeQuery( $sql, 1);

    }

    public function get_commission_by_client(){
        global $db;

        $client_id 		= $this->get('client_id');
        $order_id 		= $this->get('order_id');
        $shop_id 		= $this->get('shop_id');
        
        $sql = "SELECT `value` FROM ".$db->tbl_fix.'`'.$this->class_name.'`'." com
                WHERE 
                `shop_id` = '$shop_id' AND 
                `order_id` = '$order_id' AND 
                `client_id` = '$client_id'
                LIMIT 1";

        $d = $db->executeQuery( $sql, 1);
        
        return isset($d['value']) ? $d['value']:0;

    }
    
    public function filter_info_sum( $keyword, $group_by_member_group, $by_department_id, $by_value, $from, $to ){
        global $db, $setup;

		$payment_type_wallet_cashback = !isset($setup['payment_type_wallet_cashback']) ? -100:$setup['payment_type_wallet_cashback'];
        
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
        $sqlShop2 = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' ){
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
                    $sqlShop2 .= " col.`shop_id` = '$itde' OR ";
                }
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
            if( $sqlShop2 != '' ){
                $sqlShop2 = "AND (".substr($sqlShop2,0, -3)." )";
            }
        }

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' ) ";
        
        $sql_group_by_member_group = '';
        $sql_select_member_group_name = ", IFNULL(mb_group_out.`name`, 'Mặc định') member_group_name";//Trường hợp không gộp nhóm khách hàng thì lấy nhóm khách hàng của bảng memberes
        if( $group_by_member_group == 1 ){
            $sql_group_by_member_group = " , com.`member_group_id` ";
            $sql_select_member_group_name = ", IFNULL(coachTable.`member_group_name`, IFNULL(mb_group_out.`name`, 'Mặc định') ) member_group_name";//Trường hợp gộp; thì tách lấy theo nhóm khách hàng khác nhau, nếu ko có mới trả về mặc định
        }

        if( $by_value == 'day' )
            $by_value = ", com.`year`, com.`month`, com.`$by_value`";
        else if( $by_value == 'month' )
            $by_value = ", com.`year`, com.`month`";
        else if( $by_value == 'quarter' )
            $by_value = ", com.`year`, com.`quarter`";
        else if( $by_value == 'year' )
            $by_value = ", com.`year`";
        else
            $by_value = '';

        $sql = "SELECT  
                        COUNT(*) total_record,

                        SUM(`total_self_sale_real`) total_self_sale_real,
                        SUM(`total_self_sale`) total_self_sale,
                        SUM(`total_self_discount`) total_self_discount,
                        
                        SUM(`total_sale_real`) total_sale_real,
                        SUM(`total_sale`) total_sale,
                        SUM(`total_sale_real`-`total_sale`) total_discount,
                        SUM(`total_value`) total_value,
                        SUM(`total_point`) total_point

                    FROM (   
                    SELECT 
                    
                        IFNULL(buyTable.`total_self_sale_real`, 0) total_self_sale_real
                        , IFNULL(buyTable.`total_self_sale`, 0) total_self_sale
                        , IFNULL(buyTable.`total_self_discount`, 0) total_self_discount

                        , IFNULL(coachTable.`total_sale_real`, 0) total_sale_real
                        , IFNULL(coachTable.`total_sale`, 0) total_sale

                        , IFNULL(coachTable.`total_value`, 0) total_value
                        , IFNULL(coachTable.`total_point`, 0) total_point
                        
                    FROM $db->tbl_fix`members` mb
                    LEFT JOIN (

                        SELECT    SUM( col.`sum`) total_self_sale
                                , SUM( col.`discount`) total_self_discount
                                , SUM(col.`sum` + col.`discount` ) total_self_sale_real
                                
                                , col.`members_id`
                        FROM $db->tbl_fix`collected_orders` col
                        WHERE '$from' < col.`created_at` AND col.`created_at` < '$to' 
                            AND ( `col`.order_type = 0 OR `col`.order_type = 1) $sqlShop2
                            AND col.`payment_type` <> '$payment_type_wallet_cashback'
                        GROUP BY col.`members_id`

                    ) buyTable ON buyTable.`members_id` = mb.`user_id`
                    LEFT JOIN
                    (

                        SELECT  com.`day`, com.`month`, com.`year`, com.`quarter`
                                
                                , SUM( com.`value`) total_value
                                , SUM( com.`point`) total_point
                                , SUM( `total_order` ) total_sale
                                , SUM( `total_order_real` ) total_sale_real
                                
                                , com.`client_id`

                                , com.`member_group_id`
                                , IFNULL(mb_group.`name`, 'Chưa khai báo') member_group_name
                        FROM $db->tbl_fix`$this->class_name` com
                        LEFT JOIN $db->tbl_fix`member_group` mb_group ON mb_group.`id` = com.`member_group_id`
                        WHERE
                        '$from' < com.`created_at` AND com.`created_at` < '$to'
                        $sqlShop
                        GROUP BY com.`client_id` $sql_group_by_member_group $by_value
                        
                    ) coachTable ON coachTable.`client_id` = mb.`user_id`
                    LEFT JOIN $db->tbl_fix`member_department` mb_depart ON mb_depart.`id` = mb.`member_department_id`
                    LEFT JOIN $db->tbl_fix`member_group` mb_group_out ON mb_group_out.`id` = mb.`member_group_id`
                    WHERE mb.`user_id` > 5 AND ( buyTable.`total_self_sale_real` > 0 OR coachTable.`total_sale_real` > 0 )  $keyword $sqlDe
                ) n
                ";

        $d = $db->executeQuery( $sql, 1 );
        
        return array(
            'total_record'          => isset($d['total_record']) ? $d['total_record']:0,

            'total_self_sale_real'  => isset($d['total_self_sale_real']) ? $d['total_self_sale_real']:0,
            'total_self_sale'       => isset($d['total_self_sale']) ? $d['total_self_sale']:0,
            'total_self_discount'   => isset($d['total_self_discount']) ? $d['total_self_discount']:0,

            'total_sale_real'       => isset($d['total_sale_real']) ? $d['total_sale_real']:0,
            'total_sale'            => isset($d['total_sale']) ? $d['total_sale']:0,
            'total_discount'        => isset($d['total_discount']) ? $d['total_discount']:0,
            'total_value'           => isset($d['total_value']) ? $d['total_value']:0,
            'total_point'           => isset($d['total_point']) ? $d['total_point']:0
        );
    }

    public function filter( $keyword, $group_by_member_group, $by_department_id, $by_value, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db, $setup;

		$payment_type_wallet_cashback = !isset($setup['payment_type_wallet_cashback']) ? -100:$setup['payment_type_wallet_cashback'];
        
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
        $sqlShop2 = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' ){
                    $sqlShop .= " com.`shop_id` = '$itde' OR ";
                    $sqlShop2 .= " col.`shop_id` = '$itde' OR ";
                }
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." )";
            }
            if( $sqlShop2 != '' ){
                $sqlShop2 = "AND (".substr($sqlShop2,0, -3)." )";
            }
        }

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' ) ";
        
        $sql_group_by_member_group = '';
        $sql_select_member_group_name = ", IFNULL(mb_group_out.`name`, 'Mặc định') member_group_name";//Trường hợp không gộp nhóm khách hàng thì lấy nhóm khách hàng của bảng memberes
        if( $group_by_member_group == 1 ){
            $sql_group_by_member_group = " , com.`member_group_id` ";
            $sql_select_member_group_name = ", IFNULL(coachTable.`member_group_name`, IFNULL(mb_group_out.`name`, 'Mặc định') ) member_group_name";//Trường hợp gộp; thì tách lấy theo nhóm khách hàng khác nhau, nếu ko có mới trả về mặc định
        }

        if( $by_value == 'day' )
            $by_value = ", com.`year`, com.`month`, com.`$by_value`";
        else if( $by_value == 'month' )
            $by_value = ", com.`year`, com.`month`";
        else if( $by_value == 'quarter' )
            $by_value = ", com.`year`, com.`quarter`";
        else if( $by_value == 'year' )
            $by_value = ", com.`year`";
        else
            $by_value = '';

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        
        $sqlSort = " ORDER BY mb.`fullname` ASC ";
        
        if( in_array($field, array( 'fullname',
                                    'code',
                                    
                                    'total_sale',
                                    'total_sale_real',
                                    'total_value',
                                    'total_point',

                                    'day',
                                    'month',
                                    'year',
                                    'quarter',

                                    'member_group_name',
                                    'member_department_name',

                                    'total_self_sale',
                                    'total_self_discount',
                                    'total_self_sale_real'
                                    ))
                                    
        ){
        
            if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  'fullname'                  => 'mb.`fullname`',
                                        'code'                      => 'mb.`code`',
                                        
                                        'total_sale'                => 'coachTable.`total_sale`',
                                        'total_sale_real'           => 'coachTable.`total_sale_real`',
                                        'total_value'               => 'coachTable.`total_value`',
                                        'total_point'               => 'coachTable.`total_point`',

                                        'day'                       => 'coachTable.`day`',
                                        'month'                     => 'coachTable.`month`',
                                        'year'                      => 'coachTable.`year`',
                                        'quarter'                   => 'coachTable.`quarter`',

                                        'member_group_name'         => 'mb_group_out.`name`',

                                        'member_department_name'    => 'mb_depart.`name`',

                                        'total_self_sale'           => 'buyTable.`total_self_sale`',
                                        'total_self_discount'       => 'buyTable.`total_self_discount`',
                                        'total_self_sale_real'      => 'buyTable.`total_self_sale_real`'
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
        }
        
        $sql = "SELECT 
                    mb.`user_id`, mb.`fullname`, mb.`mobile`, mb.`member_group_id`, mb.`member_group_id`, mb.`member_department_id`, mb.`code`, mb.`avatar`

                    , mb.`cmnd`, mb.`email`, mb.`facebook` website, CONCAT(mb.`day`, '/',  mb.`year`, '/', mb.`year`) birth_day, mb.`city`, mb.`district`, mb.`ward`, mb.`address`
                    , mb.`bank_name`, mb.`bank_account`, mb.`bank_fullname`, mb.`bank_branch`, mb.`bank_city`
                    , mb.`tax`, mb.`referral_by`, mb.`note`, IF(mb.`sex` = 0, 'Nữ', 'Nam') gender, mb.`by_user_cs`, mb.`joined_at`
                    
                    , IFNULL(coachTable.`day`, '-') `day`, IFNULL(coachTable.`month`, '-') `month`, IFNULL(coachTable.`year`, '-') `year`, IFNULL(coachTable.`quarter`, '-')`quarter`

                    , IFNULL(coachTable.`total_value`, 0) total_value
                    , IFNULL(coachTable.`total_point`, 0) total_point
                    , IFNULL(coachTable.`total_sale`, 0) total_sale
                    , IFNULL(coachTable.`total_sale_real`, 0) total_sale_real

                    $sql_select_member_group_name
                    
                    , IFNULL(buyTable.`total_self_sale`, 0) total_self_sale
                    , IFNULL(buyTable.`total_self_discount`, 0) total_self_discount
                    , IFNULL(buyTable.`total_self_sale_real`, 0) total_self_sale_real

                    , IFNULL(mb_depart.`name`, 'Mặc định') member_department_name
                    
                FROM $db->tbl_fix`members` mb
                LEFT JOIN (

                    SELECT    SUM( col.`sum`) total_self_sale
                            , SUM( col.`discount`) total_self_discount
                            , SUM(col.`sum` + col.`discount` ) total_self_sale_real
                            
                            , col.`members_id`
                    FROM $db->tbl_fix`collected_orders` col
                    WHERE '$from' < col.`created_at` AND col.`created_at` < '$to' 
                          AND ( `col`.order_type = 0 OR `col`.order_type = 1) $sqlShop2
                          AND col.`payment_type` <> '$payment_type_wallet_cashback'
                    GROUP BY col.`members_id`

                ) buyTable ON buyTable.`members_id` = mb.`user_id`
                LEFT JOIN
                (

                    SELECT  com.`day`, com.`month`, com.`year`, com.`quarter`
                            
                            , SUM( com.`value`) total_value
                            , SUM( com.`point`) total_point
                            , SUM( `total_order` ) total_sale
                            , SUM( `total_order_real` ) total_sale_real
                            
                            , com.`client_id`

                            , com.`member_group_id`
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') member_group_name
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_group` mb_group ON mb_group.`id` = com.`member_group_id`
                    WHERE
                    '$from' < com.`created_at` AND com.`created_at` < '$to'
                    $sqlShop
                    GROUP BY com.`client_id` $sql_group_by_member_group $by_value
                    
                ) coachTable ON coachTable.`client_id` = mb.`user_id`
                LEFT JOIN $db->tbl_fix`member_department` mb_depart ON mb_depart.`id` = mb.`member_department_id`
                LEFT JOIN $db->tbl_fix`member_group` mb_group_out ON mb_group_out.`id` = mb.`member_group_id`
                WHERE mb.`user_id` > 5 AND ( buyTable.`total_self_sale_real` > 0 OR coachTable.`total_sale_real` > 0 )  $keyword $sqlDe
                $sqlSort $limit";

        return $db->executeQuery_list( $sql );
		
    }

    public function client_filter_info_sum( $keyword, $from, $to ){
        global $db;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');
        $member_group_id    = $this->get('member_group_id');

        $client_id = " AND com.`client_id` = '$client_id' ";

        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_group_id != '' )
            $member_group_id = " AND com.`member_group_id` = '$member_group_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' ) ";

        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        com.`value`,
                        com.`point`,
                        com.`total_order`,
                        com.`total_order_real`
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_group` mb_group ON mb_group.`id` = com.`member_group_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    
                    $keyword
                    $client_id
                    $sqlShop
                    $member_group_id

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
    
    public function client_filter( $keyword, $grouped, $from, $to, $field, $sort, $offset = 0, $limit = '' ){
        global $db;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');
        $member_group_id    = $this->get('member_group_id');

        $client_id = " AND com.`client_id` = '$client_id' ";
        
        $sqlGroup = '';
        if( $grouped == 1 )
            $sqlGroup = " GROUP BY com.`member_group_id` ";
        
        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $member_group_id != '' )
            $member_group_id = " AND com.`member_group_id` = '$member_group_id' ";

        if( $keyword != '' ) $keyword = " AND ( mb.`fullname` LIKE '%$keyword%' OR mb.`mobile` LIKE '%$keyword%' OR mb.`code` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";
        

        $sqlSort = " ORDER BY `order_created_at` DESC ";
        if( in_array($field, array( 
                                    
                                    'order_created_at',
                                    'fullname',
                                    'code',
                                    'member_group_name',
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
                                        'member_group_name'               => '`member_group_name`',
                                        'code'               => '`code`',
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

                    SELECT  com.`value`
                            , com.`point`
                            , `total_order`
                            , total_order_real
                            , com.`member_group_id`
                            , com.`member_group_id` fitler_id
                            , com.`order_id`
                            , colod.`order_created_at`
                            , colod.`shop_id`
                            , IFNULL(mb_group.`name`, 'Chưa khai báo') member_group_name
                            , colod.`members_id` client_id
                            , mb.`fullname` fullname
                            , mb.`mobile` mobile
                            , IFNULL(mb.`code`, '') code
                            
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`member_group` mb_group ON mb_group.`id` = com.`member_group_id`
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    LEFT JOIN $db->tbl_fix`members` mb ON mb.`user_id` = colod.`members_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    $keyword
                    $client_id
                    $sqlShop
                    $member_group_id

                    $sqlGroup
                    
                ) ntb WHERE `value` IS NOT NULL
                $sqlSort
                $limit";

        return $db->executeQuery_list( $sql );
    }
    
    //HC: 210505 GROUP BY client to show on app
    public function client_filter_app_info( $child_client_id, $keyword, $from, $to ){
        global $db;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');

        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        $sqlChild = '';
        if( $child_client_id != '' )
            $sqlChild = " AND colod.`members_id` = '$child_client_id' ";
        
        if( $client_id != '' ){//điều kiện filter_id
            $client_id = " AND com.`client_id` = '$client_id' ";
        }

        if( $keyword != '' ) $keyword = " AND ( colod.`members_name` LIKE '%$keyword%' OR colod.`members_mobile` LIKE '%$keyword%' ) ";

        $sql = "SELECT COUNT(*) total_record
                    , SUM(`value`) total_commission
                    , SUM(`point`) total_point
                    , SUM(`total_order`) total_order
                    , SUM(`total_order_real`) total_order_real
                FROM(

                    SELECT  
                        SUM(com.`value`) `value`,
                        SUM(com.`point`) `point`,
                        SUM(com.`total_order`) `total_order`,
                        SUM(com.`total_order_real`) total_order_real
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    
                    AND `colod`.status = 1 AND `colod`.order_type = 0
                    $sqlChild
                    $keyword
                    $client_id
                    $sqlShop

                    GROUP BY com.`client_id`
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
    
    //HC: 210505 GROUP BY client to show on app.client
    public function client_filter_app( $child_client_id, $keyword, $from, $to, $offset = 0, $limit = '' ){
        global $db;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');//child of the $dParent - filter_id

        $sqlChild = '';
        if( $child_client_id != '' )
            $sqlChild = " AND colod.`members_id` = '$child_client_id' ";
        
        $sqlShop = '';
        if( $shop_id != '' )
            $sqlShop = " AND com.`shop_id` = '$shop_id' ";
        
        if( $client_id != '' ){//điều kiện filter_id
            $client_id = " AND com.`client_id` = '$client_id' ";
            // $sqlGroup = "";
        }else {
            // $sqlGroup = "GROUP BY colod.`members_id`";
        }
        $sqlGroup = "GROUP BY colod.`members_id`";

        if( $keyword != '' ) $keyword = " AND ( colod.`members_name` LIKE '%$keyword%' OR colod.`members_mobile` LIKE '%$keyword%' ) ";

        if( $limit != ''  ) $limit  =" LIMIT $offset, $limit";

        $sql = "SELECT *
                FROM(

                    SELECT  SUM(com.`value`) `value`
                            , SUM(com.`point`) `point`
                            , SUM(`total_order`) total_order
                            , SUM(`total_order_real`) total_order_real
                            , colod.`members_id` filter_id
                            , com.`client_id` client_id
                            , colod.`shop_id`
                            , colod.`order_id`
                            , colod.`order_created_at`
                            , IFNULL(colod.`members_mobile`, '') mobile
                            , IFNULL(colod.`members_name`, 'Vãng lai') `name`
                            , IFNULL(colod.`members_name`, 'Vãng lai') `fullname`
                    
                    FROM $db->tbl_fix`$this->class_name` com
                    LEFT JOIN $db->tbl_fix`collected_orders` colod ON colod.`order_id` = com.`order_id` AND colod.`shop_id` = com.`shop_id`
                    WHERE '$from' < colod.`created_at` AND colod.`created_at` < '$to'
                    AND `colod`.status = 1 AND `colod`.order_type = 0
                    $sqlChild
                    $keyword
                    $client_id
                    $sqlShop
                    
                    $sqlGroup
                ) ntb WHERE `value` IS NOT NULL
                ORDER BY ntb.`name`
                $limit";

        return $db->executeQuery_list( $sql );
    }
    
    //HuanCoder Modify: 31/03/2021
    public function chart_data_type( $type_chart = 'day' ){
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
        
        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');

        $sqlClient = '';
        if( $client_id != '' ){
            $sqlClient = "AND `client_id` = '$client_id'";
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

        $sql = "SELECT SUM(`value`) `y`, CONCAT(`day`, '/', `month`, '/', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE  
                `created_at` > '$start_time' 
                $sqlClient
                $sqlShop
                GROUP BY `day`, `month`, `year`
                ORDER BY `created_at`";
        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'day');

        return $kq;
		
    }

    public function chart_data_by_month(){
        global $db, $main;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');
        $sqlClient = '';
        if( $client_id != '' ){
            $sqlClient = "AND `client_id` = '$client_id'";
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

        $sql = "SELECT SUM(`value`) `y`, CONCAT(`month`, '/', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE `created_at` > '$start_time' 
                $sqlClient
                $sqlShop
                GROUP BY `month`, `year`
                ORDER BY `created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'month');
        
        return $kq;
    }

    public function chart_data_by_quarter(){
        global $db, $main;

        $shop_id            = $this->get('shop_id');
        $client_id          = $this->get('client_id');

        $sqlClient = '';
        if( $client_id != '' ){
            $sqlClient = "AND `client_id` = '$client_id'";
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

        $sql = "SELECT SUM(`value`) `y`, CONCAT('Quí ', `quarter`, ' ', `year` ) `x`, `created_at`
                FROM $db->tbl_fix`$this->class_name` com
                WHERE 
                `created_at` > '$start_time' 
                $sqlClient
                $sqlShop
                GROUP BY `quarter`, `year`
                ORDER BY `created_at`";

        $kq = $db->executeQuery_list( $sql );

        $kq = $main->chartDateChecking($kq, $ck_start_time, 'quarter');

        return $kq;
    }
    
}