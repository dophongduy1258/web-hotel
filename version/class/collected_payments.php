<?php

class collected_payments extends model
{

	protected $class_name = 'collected_payments';
	protected $id;
	protected $shop_id;
	protected $order_id;
	protected $order_created_at;
	protected $collected_orders_id;
	protected $payment_type;
	protected $value;
	protected $wallet_paid; //Huan: nếu thanh toán ví thì giá trị này dùng để xác nhận là đã xác nhận thanh toán chưa
	protected $wallet_transaction_id; //Huan: ID của giao dịch chuyển tiền này

	public function add()
	{
		global $db;

		$arr['shop_id'] 							= $this->get('shop_id');
		$arr['order_id'] 							= $this->get('order_id');
		$arr['order_created_at']    				= $this->get('order_created_at');
		$arr['collected_orders_id'] 				= $this->get('collected_orders_id');
		$arr['payment_type'] 						= $this->get('payment_type');
		$arr['value'] 			    				= $this->get('value')+0;
		$arr['wallet_paid'] 			    		= $this->get('wallet_paid');
		$arr['wallet_transaction_id'] 			    = $this->get('wallet_transaction_id');

		$db->record_insert($this->class_name, $arr);
		return $db->mysqli_insert_id();
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function list_by_order()
	{
		global $db, $db_store;

		$shop_id 		= 	$this->get('shop_id');
		$order_id 		= 	$this->get('order_id');

		$sql = "SELECT `cp`.`value` total, `mt`.id, IFNULL( mt.`wallet_id`, 0) `wallet_id`, IFNULL( mt.`name`, 'Không xác định') `name`, cp.`payment_type`, cp.`wallet_paid`
				FROM $db->tbl_fix$this->class_name cp
				LEFT JOIN $db_store->tbl_fix`method_payment` mt ON mt.`id` = cp.`payment_type`
				WHERE '$shop_id' = cp.`shop_id`
				AND cp.`order_id` = '$order_id'
				ORDER BY `mt`.id ASC
				";

		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Chỉ lấy item, ko merge dữ liệu
	public function list_item_by_order()
	{
		global $db, $db_store;

		$shop_id 		= 	$this->get('shop_id');
		$order_id 		= 	$this->get('order_id');

		$sql = "SELECT *
				FROM $db->tbl_fix$this->class_name cp
				WHERE '$shop_id' = cp.`shop_id`
				AND cp.`order_id` = '$order_id'
				";
	
		$result = $db->executeQuery_list($sql);

		return $result;
	}

	//Tổng hợp cho báo cáo bán hàng tổng hợp
	public function delete_by_order()
	{
		global $db, $db_store;

		$shop_id 		= 	$this->get('shop_id');
		$order_id 		= 	$this->get('order_id');

		$sql = "DELETE FROM $db->tbl_fix$this->class_name
				WHERE '$shop_id' = `shop_id`
				AND `order_id` = '$order_id'";

		$result = $db->executeQuery($sql);

		return $result;
	}

	//Tính tổng số tiền chưa thanh toán của user (tùng code - 19/03/2021)
	public function sum_total_pending($client_id, $shop_id='', $year='')
	{
		global $db, $db_store;

		$order_id 		= 	$this->get('order_id');
		$payment_type 	= 	$this->get('payment_type');

		$sql = " SELECT IFNULL(SUM(`value`), 0) total FROM(
					SELECT cp.* 
					FROM order_".$shop_id."_".$year." od
					INNER JOIN collected_payments cp ON cp.`order_id` = od.`id`
					WHERE od.`id_customer` = $client_id AND cp.`payment_type` = $payment_type AND cp.`wallet_paid` = 0 AND cp.`order_id` != '$order_id'
				)ntb ";

		$result = $db->executeQuery($sql, 1);

		return $result['total'] + 0;
	}

	//Cập nhật trạng thái thanh toán của đơn hàng (tùng code - 22/03/2021)
	public function update_pay_order()
	{
		global $db;
		
        $order_id 				= $this->get('order_id');
		$payment_type 			= $this->get('payment_type');
        $wallet_transaction_id 	= $this->get('wallet_transaction_id');
        $wallet_paid 			= $this->get('wallet_paid');
		
        $sql = "UPDATE " . $db->tbl_fix . $this->class_name . " 
				SET `wallet_paid`= $wallet_paid, `wallet_transaction_id`= '$wallet_transaction_id'
				WHERE 
				`order_id` = '$order_id' 
				AND `payment_type` = '$payment_type' ";
        $db->executeQuery ( $sql );
        
        return true;

	}

	//Xóa hình thức thanh toán cho cs cập nhật(tùng code - 22/03/2021)
	// public function reset_payments_type()
	// {
	// 	global $db, $setup;

    //     $order_id 	= $this->get('order_id');
    //     $shop_id = $this->get('shop_id');
    //     $sql = "DELETE FROM" . $db->tbl_fix . $this->class_name . " WHERE `order_id` = '$order_id' AND `shop_id` = '$shop_id'";
	// 	$db->executeQuery($sql,1);
        
    //     return true;

	// }

}
