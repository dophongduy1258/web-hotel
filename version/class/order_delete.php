<?php
class order_delete extends model{

    protected $class_name = 'order_delete';
    protected $id;
    protected $shop_id;
    protected $order_id;
    protected $order_created_at;
    protected $sum;
    protected $deleted_by;
    protected $order_content;//order_content json order
    protected $detail_order_content;//detail_order_content json 
    protected $collected_orders_content;//collected_orders_content json
    protected $note;
    protected $order_type;//=0 đơn hàng POS, = 1 đơn hàng xuất kho nội bộ ở Xuất KHO
    protected $created_at;
    protected $is_imported;
    
    public function add(){
		global $db;
        
        $arr['shop_id']                         = $this->get('shop_id');
        $arr['order_id']                        = $this->get('order_id');
        $arr['order_created_at']                = $this->get('order_created_at');
        $arr['sum']                             = $this->get('sum');
        $arr['deleted_by']                      = $this->get('deleted_by');
        $arr['order_content']                   = $this->get('order_content');
        $arr['detail_order_content']            = $this->get('detail_order_content');
        $arr['collected_orders_content']        = $this->get('collected_orders_content');
        $arr['order_type']                      = $this->get('order_type');
        $arr['note']                            = $this->get('note');
        $arr['is_imported']                     = $this->get('is_imported');

        $arr['created_at']                      = time();

		$db->record_insert( $this->class_name, $arr );

		return $db->mysqli_insert_id();
    }

    public function list_item( $keyword, $field, $sort, $ofset = 0, $limit = '' ) {
		  global $db;
		
        if( $limit != '' ) $limit = " LIMIT $ofset, $limit ";

        $order_type = '';
        // $order_type  = $this->get('order_type');
        // if( $order_type != '' ) $order_type = " AND order_type = '$order_type' ";
        
        if( $keyword != '' ) $keyword = " AND ( `order_id` LIKE '$keyword' 
                                        OR order_content LIKE '%$keyword%' 
                                        OR detail_order_content LIKE '%$keyword%' ) ";
        
        $sqlSort = " ORDER BY tb.`created_at` DESC ";
        
        if( in_array($field, array( 
                                    'created_at',
                                    'shop_name',
                                    'fullname',
                                    'order_type',
                                    'is_imported',
                                    'sum'
                                    ))
                                    
        ){
        
        if( !in_array( $sort, array('ASC', 'DESC') ) ) $sort = 'ASC';

                $sortFieldArr = array(  
                                        'created_at'                    => 'tb.`created_at`',
                                        'shop_name'                      => 'shop.`name`',
                                        'fullname'                      => 'user.`fullname`',
                                        'order_type'                      => 'tb.`order_type`',
                                        'sum'                           => 'tb.`sum`',
                                        'is_imported'                      => 'tb.`is_imported`',
                                );

                $field = isset($sortFieldArr[$field]) ? $sortFieldArr[$field]:'';

                if( $field != '' )
                    $sqlSort = " ORDER BY $field $sort ";
        }

		$sql = "SELECT tb.*, user.`fullname`, shop.`name` shop_name, IF(tb.`order_type` = 0, 'Đơn hàng POS', 'Đơn hàng xuất kho') order_type_name
                FROM `". $this->class_name ."` tb
                LEFT JOIN `user` ON user.id = tb.deleted_by
                LEFT JOIN `shop` ON shop.id = tb.shop_id
                WHERE tb.`id` > 0 $keyword $order_type
                $sqlSort
                $limit ";

		$result = $db->executeQuery_list( $sql );

		return $result;
	}

	public function list_item_info( $keyword ) {
		global $db;

        $order_type = '';
        // $order_type  = $this->get('order_type');
        // if( $order_type != '' ) $order_type = " AND order_type = '$order_type' ";

        if( $keyword != '' ) $keyword = " AND ( `order_id` LIKE '$keyword' 
                                        OR order_content LIKE '%$keyword%' 
                                        OR detail_order_content LIKE '%$keyword%' ) ";

		$sql = "SELECT COUNT(*) total_record, IFNULL( SUM(`sum`), 0) `total_value`
                FROM `". $this->class_name ."` tb
                WHERE tb.`id` > 0 $keyword $order_type";
  
		$result = $db->executeQuery( $sql, 1 );

		return $result;
    }

    public function detail_item( $order_id ) {
      global $db;
  
      $sql = "SELECT * FROM `". $this->class_name ."`";
  
      $result = $db->executeQuery( $sql );
  
      return $result;
    }

    public function delete_item() {
      global $db;

      $id   = $this->get('id');
      $arr['id'] = -1*$id;
      $db->record_update( $db->tbl_fix.$this->class_name, $arr, " `id` = '$id' " );
  
      return true;
    }

    public function delete_the_order( $act, $dOrder, $dUserLogin ) {
      global $db, $order, $detail_order, $collected_orders, $SKU, $product
            , $log, $wh_history, $liabilities, $liabilities_history, $treasurer;
        
      $order_delete           = new order_delete();
      $product_qrcode_detail  = new product_qrcode_detail();

      $shop_id            = $this->get('shop_id');
      $order_id           = $this->get('order_id');
      $created_at        = $this->get('created_at');
      $note               = $this->get('note');


      $lItems = $detail_order->listby_order( $shop_id, $order_id, $created_at );

      /**
      * BEGIN lưu thông tin xóa đơn hàng
      */
      $collected_orders->set('shop_id', $shop_id);
      $collected_orders->set('order_id', $order_id);
      $dCollected         = $collected_orders->get_detail_by_order_id();
      $tong_tien          = $detail_order->get_sum_order( $shop_id, $order_id, $created_at );

      $collected_payments = new collected_payments();
      $collected_payments->set('shop_id',  $shop_id);
      $collected_payments->set('order_id',  $order_id );
      $dOrder['collected_payments'] = $collected_payments->list_item_by_order();
      
      $this->set('shop_id', $shop_id);
      $this->set('order_id', $order_id);
      $this->set('order_created_at', $created_at);
      $this->set('sum', $tong_tien);
      $this->set('deleted_by', $dUserLogin['id']);
      $this->set('order_content', json_encode($dOrder) );
      $this->set('detail_order_content', json_encode($lItems) );
      $this->set('collected_orders_content', json_encode($dCollected) );
      $this->set('order_type', $this->get('order_type') );//= 0 đơn hàng POS; =1 đơn hàng xuất nội bộ
      $this->set('note', $note);
      $this->set('is_imported', 0);
      $this->add();

      unset( $tong_tien );
      unset( $dCollected );
      /**
       * END lưu thông tin xóa đơn hàng
       */

      if( $dOrder['is_booking'] == 0 && $dOrder['status'] == 1 && in_array($dOrder['order_type'], array(0, 1) ) ){
          
          foreach( $lItems as $item ){
              if( $item['wh_history_id'] > 0 ){
                  $wh_history->update_exported_warehouse_subtract( $item['wh_history_id'], $item['quantity'] );
              }
              //Xóa phiếu thì cộng lại số lượng
              $SKU->update_stock_plus( $item['product_id'], $item['sku_id'], $item['quantity'] );
          }
          
          //liabilities_id
          if( $dOrder['payment_type'] == 1 ||  $dOrder['liabilities_id']  > 0 ){
              $liabilities = new liabilities();

              $liabilities->set('id', $dOrder['liabilities_id'] );
              $liabilities->delete();
              
              $liabilities_history = new liabilities_history();
              $liabilities_history->set('liabilities_id', $dOrder['liabilities_id'] );
              $liabilities_history->delete_by();
          }

          //nếu có treasurer thì xóa treasurer
          if( $dOrder['treasurer_id'] != 0 ){

              $treasurer->set('id', $dOrder['treasurer_id'] );
              $treasurer->delete_record();

          }
          
      }

      $detail_order->delete_by_order_id( $shop_id, $order_id, $created_at );
      
      $order->delete_item( $shop_id, $order_id, $created_at );

      foreach($lItems as $si ){
          if( $si['barcode'] != '' ){
              $product_qrcode_detail->set('barcode', $si['barcode']);
              $product_qrcode_detail->barcode_de_activated();
          }
      }

      //ghi vào log
      $log->set('content', "Xóa đơn hàng: đơn hàng <b>#$order_id</b>;");
      $log->set('content_hidden', $act.';',json_encode($dOrder).';'.json_encode($lItems) );
      $log->set('is_show', 1);
      $log->add();

      //xóa hoa hồng của đơn hàng liên quan nếu có

      $commission_coaching      = new commission_coaching();
      $commission_department    = new commission_department();
      $commission_bo            = new commission_bo();
      
      $commission_coaching->set('shop_id', $shop_id);
      $commission_coaching->set('order_id', $order_id);
      $commission_coaching->delete_item_by_order();

      $commission_department->set('shop_id', $shop_id);
      $commission_department->set('order_id', $order_id);
      $commission_department->delete_item_by_order();

      $commission_bo->set('shop_id', $shop_id);
      $commission_bo->set('order_id', $order_id);
      $commission_bo->delete_item_by_order();

      return true;
    }
    
}