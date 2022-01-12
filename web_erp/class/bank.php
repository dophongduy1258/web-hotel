<?php
class bank extends model{

    protected $class_name = 'bank';
    protected $id;
    protected $bank_code;//50 char
    protected $bank_name;
    protected $bank_account;
    protected $bank_branch;
    protected $bank_account_name;
    protected $url;
    protected $shop_id;
    protected $is_hidden;//ẩn
    protected $balance;//

    public function add(){
        global $db;

        $arr['bank_code']               = strtoupper($this->get('bank_code'));//50 char
        $arr['bank_name']               = $this->get('bank_name');
        $arr['bank_account']            = $this->get('bank_account');
        $arr['bank_branch']             = $this->get('bank_branch');
        $arr['bank_account_name']       = $this->get('bank_account_name');
        $arr['url']                     = $this->get('url');
        $arr['shop_id']                 = $this->get('shop_id');
        $arr['balance']                 = $this->get('balance');
        $arr['is_hidden']               = $this->get('is_hidden') == ''? 0:$this->get('is_hidden');

        $db->record_insert( $db->tbl_fix.$this->class_name, $arr );

        return $db->mysqli_insert_id();
    }

    public function update(){
        global $db;

        $id                             = $this->get('id');

        $arr['bank_code']               = strtoupper($this->get('bank_code'));
        $arr['bank_name']               = $this->get('bank_name');
        $arr['bank_account']            = $this->get('bank_account');
        $arr['bank_branch']             = $this->get('bank_branch');
        $arr['bank_account_name']       = $this->get('bank_account_name');
        $arr['url']                     = $this->get('url');
        $arr['shop_id']                 = $this->get('shop_id');
        $arr['balance']                 = $this->get('balance');
        $arr['is_hidden']               = $this->get('is_hidden') == ''? 0:$this->get('is_hidden');
        
        $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );

        return true;
    }

    public function update_balance(){
        global $db;

        $id                             = $this->get('id');
        $arr['balance']                 = $this->get('balance');
        $db->record_update( $db->tbl_fix.$this->class_name, $arr,  " `id` = '$id' " );
        
        return true;
    }

    public function list_opt_all() {
		global $db;
        
        // $shop_id 
        // $is_hidden

        $lItems = $this->list_item_by();
        
		$opt = '';
		foreach ($lItems as $item) {
            $all .= $item['bank_account'].';';
			$opt .= '<option value="'.$item['bank_account'].'">'.$item['bank_name'].'</option>';
		}

		$opt = '<option value="'.$all.'">Tất cả ngân hàng</option>'.$opt;

		return $opt;
	}

    public function list_opt_defined( $defined ) {
		global $db;
        
        // $is_hidden

        $lItems = $this->list_item_defined( $defined );
        
		$opt = '';
		foreach ($lItems as $item) {
            $all .= $item['bank_account'].';';
			$opt .= '<option value="'.$item['bank_account'].'">'.$item['bank_name'].'</option>';
		}

		$opt = '<option value="'.$all.'">Tất cả ngân hàng</option>'.$opt;

		return $opt;
	}

    public function list_item_by() {
		global $db;

        $shop_id        = $this->get('shop_id');
        $is_hidden      = $this->get('is_hidden');

        $sqlShop = '';
        if( $shop_id != '' ){
            $lSh = explode( ';', $shop_id);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlShop .= " th.`shop_id` = '$itde' OR ";
            }

            if( $sqlShop != '' ){
                $sqlShop = "AND (".substr($sqlShop,0, -3)." ) AND `shop_id` > 0 ";
            }
        }
        
        if( $is_hidden != '' )
            $is_hidden = "AND `is_hidden` = '$is_hidden' ";
		
        $sql = "SELECT *
                FROM $db->tbl_fix`". $this->class_name ."` th
                WHERE 1 $sqlShop $is_hidden ";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}

    public function list_item_defined( $defined ) {
		global $db;
        
        $r = array();
        if( $defined != '' ){

            $sqlBankAccount = '';
            $lSh = explode( ';', $defined);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlBankAccount .= " th.`bank_account` = '$itde' OR ";
            }

            if( $sqlBankAccount != '' ){
                $sqlBankAccount = "AND (".substr($sqlBankAccount,0, -3)." )";
            }
            
            $is_hidden = $this->get('is_hidden');
            if( $is_hidden != '' )
                $is_hidden = "AND `is_hidden` = '$is_hidden' ";
            
            $sql = "SELECT *
                    FROM $db->tbl_fix`". $this->class_name ."` th
                    WHERE 1 $sqlBankAccount $is_hidden ";

            $r = $db->executeQuery_list( $sql );

        }

		return $r;
	}

    public function get_detail_by_code() {
		global $db;

        $bank_code    = strtoupper($this->get('bank_code'));

        $sql = "SELECT *
                FROM $db->tbl_fix`". $this->class_name ."` th
                WHERE `bank_code` = '$bank_code' LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );

		return $r;
	}

    public function searching( $keyword = '', $lExcept = '' ) {
		global $db;

        $sqlExcept = '';
        if( $lExcept != '' ){
            $lSh = explode( ';', $lExcept);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlExcept .= "AND th.`bank_account` <> '$itde' ";
            }
        }

        $sql = "SELECT *
                FROM $db->tbl_fix`". $this->class_name ."` th
                WHERE ( `bank_name` LIKE '%$keyword%' OR  `bank_account` LIKE '%$keyword%' ) $sqlExcept
                ORDER BY `bank_name`
                LIMIT 10";

		$r = $db->executeQuery_list( $sql );

		return $r;
	}

    public function get_detail_by_account() {
		global $db;

        $bank_account    = strtoupper($this->get('bank_account'));

        $sql = "SELECT *
                FROM $db->tbl_fix`". $this->class_name ."` th
                WHERE `bank_account` = '$bank_account' LIMIT 1";
        
		$r = $db->executeQuery( $sql, 1 );

		return $r;
	}

}
$bank =  new bank();