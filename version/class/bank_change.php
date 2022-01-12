<?php
class bank_change extends model{

    protected $class_name = 'bank_change';
    protected $id;
    protected $bank_phone;
    protected $bank_account;
    protected $amount;
    protected $balance;
    protected $type;
    protected $content;
    protected $memo;
    protected $note;
    protected $deleted;//tin đã xóa hay chưa
    protected $transaction_bank_id;
    protected $created_at;
    
    public function add(){
        global $db;
        
        $arr['bank_phone']                     = $this->get('bank_phone');
        $arr['bank_account']                   = $this->get('bank_account');
        $arr['amount']                         = $this->get('amount');
        $arr['balance']                        = $this->get('balance');
        $arr['type']                           = $this->get('type');
        $arr['content']                        = $this->get('content');
        $arr['memo']                           = $this->get('memo');
        $arr['note']                           = $this->get('note');
        $arr['deleted']                        = $this->get('deleted');
        $arr['transaction_bank_id']            = $this->get('transaction_bank_id');
        $arr['created_at']                     = time();
        
        $db->record_insert( $db->tbl_fix.$this->class_name, $arr );
        
        return $db->mysqli_insert_id();
    }

    public function delete_item(){
        global $db;
        
        $id                     = $this->get('id');
        $arr['note']            = $this->get('note');
        $arr['deleted']         = 1;
        
        $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
        
        return true;
    }

    public function check_exist() {
        global $db;

        $bank_phone                     = $this->get('bank_phone');
        $content                        = $this->get('content');

        $sql = "SELECT * FROM $db->tbl_fix`$this->class_name` b
                WHERE `bank_phone` = '$bank_phone'
                AND `content` = '$content' LIMIT 1";

		$r = $db->executeQuery( $sql, 1 );

		return $r;
    }

    public function filter( $keyword = '', $from, $to,  $offset = 0, $limit = '' ) {
        global $db;

        $bank_account = $this->get('bank_account');
        $sqlFromBank = '';
        if( $bank_account != '' ){
            $lSh = explode( ';', $bank_account);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlFromBank .= " b.`bank_account` = '$itde' OR ";
            }
            
            if( $sqlFromBank != '' ){
                $sqlFromBank = "AND ( ".substr($sqlFromBank,0, -3)." )";
            }
        }
        
        if( $keyword != '' ) $keyword = "AND  `content` LIKE '%$keyword%'";

        if( $limit != '' ) $limit = "LIMIT $offset, $limit";
        

        //Vẫn hiện các item đã xóa trạng thái deleted = 1
        $sql = "SELECT b.*
                FROM $db->tbl_fix`$this->class_name` b
                WHERE '$from' < b.`created_at` AND b.`created_at` < '$to'
                $keyword $sqlFromBank
                ORDER BY `id` DESC
                $limit";

		$result = $db->executeQuery_list( $sql );

		return $result;
    }

    public function filter_sum( $keyword = '', $from, $to ) {
        global $db;
        
        $bank_account = $this->get('bank_account');
        $sqlFromBank = '';
        if( $bank_account != '' ){
            $lSh = explode( ';', $bank_account);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlFromBank .= " b.`bank_account` = '$itde' OR ";
            }
            
            if( $sqlFromBank != '' ){
                $sqlFromBank = "AND ( ".substr($sqlFromBank,0, -3)." )";
            }
        }
        
        if( $keyword != '' ) $keyword = "AND `content` LIKE '%$keyword%'";


        //Không sum các item đã xóa
        $sql = "SELECT COUNT(*) total_record
                    , SUM( IF( `type` = 1, `amount`, 0) ) total_in
                    , SUM( IF( `type` = -1, `amount`, 0) ) total_out
                FROM `$this->class_name` b
                WHERE '$from' < b.`created_at` AND b.`created_at` < '$to' AND `deleted` = 0
                $keyword $sqlFromBank";
        
		$r = $db->executeQuery( $sql, 1 );

		return array(
            'total_record' => isset($r['total_record']) ? $r['total_record']:0,
            'total_in' => isset($r['total_in']) ? $r['total_in']:0,
            'total_out' => isset($r['total_out']) ? $r['total_out']:0,
        );

    }

    public function get_balance_list() {// = '' mới nhất
        global $db;

        $bank_account = $this->get('bank_account');
        $sqlFromBank = '';
        if( $bank_account != '' ){
            $lSh = explode( ';', $bank_account);
            foreach ($lSh as $itde) {
                if( $itde != '' )
                    $sqlFromBank .= " bank.`bank_account` = '$itde' OR ";
            }
            
            if( $sqlFromBank != '' ){
                $sqlFromBank = "AND ( ".substr($sqlFromBank,0, -3)." )";
            }
        }

        $this_date = $this->get('created_at');

        $sql = "SELECT bank.*, ( bank.`balance` + IFNULL(nVal.`total`, 0 ) ) `total_change`
                FROM $db->tbl_fix`bank`
                LEFT JOIN (
                    SELECT b.`bank_account`, SUM(-1*`type`*`amount`) total
                    FROM $db->tbl_fix`$this->class_name` b
                    WHERE  '$this_date' < b.`created_at` AND b.`deleted` = '0' AND ( b.`type` = '1' OR b.`type` = '-1' )
                    GROUP BY b.`bank_account`
                ) nVal ON nVal.`bank_account` = bank.`bank_account`
                WHERE 1 $sqlFromBank
                ";

		$r = $db->executeQuery_list( $sql );

        return $r;
    }
    
}
$bank_change =  new bank_change();