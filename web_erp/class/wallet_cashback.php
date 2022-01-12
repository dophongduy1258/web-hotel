<?php
class wallet_cashback extends model{

    protected $class_name = 'wallet_cashback';
	protected $product_commission_id;
	protected $member_group_id;
	protected $is_value;//Chiết khấu theo giá trị hay là percent
	protected $value;//float

    //for point config
	protected $is_point_value;//Là point tính theo giá trị = 1; =0 thì phần trăm
	protected $point;//giá trị point
    
    public function add(){
        global $db;
        
        $arr['product_commission_id']   = $this->get('product_commission_id');
        $arr['member_group_id']         = $this->get('member_group_id');
        $arr['is_value']                = $this->get('is_value');
        $arr['value']                   = $this->get('value');

        $arr['is_point_value']          = $this->get('is_point_value');
        $arr['point']                   = $this->get('point');

		$db->record_insert($db->tbl_fix.$this->class_name , $arr );

		return $db->mysqli_insert_id();
    }

    public function add_or_update(){
        global $db;

        $d = $this->get_detail_record();
        
        if( isset($d['product_commission_id']) ){

            $product_commission_id          = $this->get('product_commission_id');
            $member_group_id                = $this->get('member_group_id');
            $arr['is_value']                = $this->get('is_value');
            $arr['value']                   = $this->get('value');

            $arr['is_point_value']          = $this->get('is_point_value');
            $arr['point']                   = $this->get('point');

            $db->record_update($db->tbl_fix.$this->class_name , $arr, " `product_commission_id` = '$product_commission_id' AND `member_group_id` = '$member_group_id' " );
            return true;
        }else{
            $arr['product_commission_id']   = $this->get('product_commission_id');
            $arr['member_group_id']         = $this->get('member_group_id');
            $arr['is_value']                = $this->get('is_value');
            $arr['value']                   = $this->get('value');

            $arr['is_point_value']          = $this->get('is_point_value');
            $arr['point']                   = $this->get('point');

            $db->record_insert($db->tbl_fix.$this->class_name , $arr );
		    return $db->mysqli_insert_id();
        }

    }

    public function get_detail_record(){
		global $db;

        $product_commission_id   = $this->get('product_commission_id');
        $member_group_id         = $this->get('member_group_id');

		$sql = "SELECT * FROM $db->tbl_fix$this->class_name
                WHERE
                `product_commission_id` = '$product_commission_id' 
                AND `member_group_id` = '$member_group_id'
                LIMIT 1";
        
		$row = $db->executeQuery ( $sql, 1 );
		
		return $row;
    }
    
    public function update(){
        global $db;
        
        $product_commission_id   = $this->get('product_commission_id');
        $member_group_id         = $this->get('member_group_id');
        $arr['value']            = $this->get('value');

		$db->record_update($db->tbl_fix.$this->class_name , $arr, " `product_commission_id` = '$product_commission_id' AND `member_group_id` = '$member_group_id' " );
        
        return true;
    }
    
    public function delete_by(){
        global $db;
        
        $product_commission_id   = $this->get('product_commission_id');

        $db->record_delete( $db->tbl_fix.$this->class_name , " `product_commission_id` = '$product_commission_id' " );
        
        $arr['product_commission_id'] = 0;
		$db->record_update( $db->tbl_fix."`product`" ,$arr ," `product_commission_id` = '$product_commission_id' " );
        
        return true;
    }

    public function cal_commission( $dWalletCashback, $quantity, $price, $decrement ){

        $value_cashback_vnd     = 0;
        $value_cashback_point   = 0;

        if( $dWalletCashback['cash'] > 0 ){
                    
            if( $dWalletCashback['is_cash_value'] == 0 ){
                if( $dWalletCashback['cash_by'] == '1' ){//real =>> theo thực thu = 1
                    // Hoa hồng theo doanh thu thực thu
                    $value_cashback_vnd += ($quantity*$price*(100-$decrement)/100) * $dWalletCashback['cash'] /100;
                }else if( $dWalletCashback['cash_by'] == '0' ){//discount => theo giảm giá => 0
                    // Hoa hồng theo phần giảm giá được
                    $value_cashback_vnd += ($quantity*$price*($decrement)/100) * $dWalletCashback['cash'] /100;
                }else if( $dWalletCashback['cash_by'] == '2' ){//sale_price => giá bán lẻ 2
                    // Hoa hồng theo phần trăm giá bán lẻ ( chưa trừ chiết khấu )
                    $value_cashback_vnd += ($quantity*$price) * $dWalletCashback['cash'] /100;
                }
            }else{
                $value_cashback_vnd += $quantity*$dWalletCashback['cash'];
            }

        }

        //tính tích điểm vào ví điểm đổi điểm is_value;value;value_by;
        if( $dWalletCashback['value'] > 0 ){
            
            if( $dWalletCashback['is_value'] == 0 ){
                if( $dWalletCashback['value_by'] == '1' ){//real =>> theo thực thu = 1
                    // Hoa hồng theo doanh thu thực thu
                    $value_cashback_point += ($quantity*$price*(100-$decrement)/100) * $dWalletCashback['value'] /100;
                }else if( $dWalletCashback['value_by'] == '0' ){//discount => theo giảm giá => 0
                    // Hoa hồng theo phần giảm giá được
                    $value_cashback_point += ($quantity*$price*($decrement)/100) * $dWalletCashback['value'] /100;
                }else if( $dWalletCashback['value_by'] == '2' ){//sale_price => giá bán lẻ 2
                    // Hoa hồng theo phần trăm giá bán lẻ ( chưa trừ chiết khấu )
                    $value_cashback_point += ($quantity*$price) * $dWalletCashback['value'] /100;
                }
            }else{
                $value_cashback_point += $quantity*$dWalletCashback['value'];
            }

        }

        return array(
            'vnd'       => $value_cashback_vnd,//hoa hồng vào ví vnd
            'point'     => $value_cashback_point//hoa hồng vào ví point
        );
    }

    public function list_by_member_group(){//List theo nhóm thành viên được cung cấp cho từng sản phẩm
		global $db;

        $product_commission_id          = $this->get('product_commission_id');
        $member_group_id                = $this->get('member_group_id');

        $l = explode(';', $member_group_id);

        $sqlWhere = '';
        foreach ($l as $mbg_id) {
            if( $mbg_id != '' )
                $sqlWhere .= " tb.`member_group_id` = '$mbg_id' OR ";
        }

        $r = array();
        if( $sqlWhere != '' ){

            $sqlWhere = " ( ".substr($sqlWhere,0, -3)." )";
        
            $sql = "SELECT mg.`id`, mg.`name`, IFNULL(tb.`is_value`, 0) `is_value`, mg.`id` member_group_id,  IFNULL(tb.`value`, 0) `value` 
                    FROM $db->tbl_fix$this->class_name tb
                    RIGHT JOIN $db->tbl_fix`member_group` mg ON mg.`id` = tb.`member_group_id`
                    WHERE
                    `product_commission_id` = '$product_commission_id' 
                    AND $sqlWhere
                    ORDER BY tb.`value` ASC
                    ";

            $r = $db->executeQuery_list( $sql);
        }
		
		return $r;
    }
    
}