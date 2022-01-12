<?php
$nod        = $main->get('nod');

if ($act == 'idx') {
    if ($nod == 'list_order') {

        $collected_payments = new collected_payments();
        $delivery_history   = new delivery_history();
        $members            = new members();

        $client_id          = $_SESSION['username_client'];
        $year               = date('Y');

        $members->set('user_id', $client_id);
        $dClient = $members->get_detail();

        $keyword        = '';
        $page           = '';
        $type           = ''; // rỗng = all; type = waiting; type = done; type = processing; type = cancel; waiting_pay = chờ xác nhận thanh toán
        $payment_type   = ''; // = hình thức nào thì load lên hình thức đó: 1;2;3 .. => nếu rỗng sẽ load mặc định không phải kho điểm tích lũy/cashback

        if ($page < 1)      $page = 1;
        $limit              = $setup['perpage'];
        $offset             = ($page - 1) * $limit;
    
        $shop_id            = 1;
        if( isset($dClient['shop_id']) && $dClient['shop_id'] > 1 )
            $shop_id = $dClient['shop_id'];
        
        if( $dClient['member_group_id'] != $setup['member_group_id_showroom'] ){
            $order->set('id_customer', '');
            $order->set('for_client_id', $client_id);
        } else {
            $order->set('id_customer', $client_id);
            $order->set('for_client_id', '');
        }
    
        $order->set('payment_type', $payment_type);
        $lItems         = $order->client_order_history_steps( $shop_id, $keyword, $type, $offset, $limit);
        $dInfo          = $order->client_order_history_steps_count( $shop_id, $keyword, $type);
        
        foreach($lItems as $key=>$item ){
            $delivery->set('shipper_status', $item['shipper_status']);
            $item['shipper_status_label'] = $delivery->delivery_status_label();
            $item = $order->order_detail_general( $dClient, $item );
            $delivery_history->set('order_id', $item['id']);
            $delivery_history->set('order_created_at', $item['created_at']);
            $delivery_history->set('shop_id', $item['shop_id']);
            $item['delivery_history'] = $delivery_history->list_by_steps();
            $lItems[$key] = $item;
        }
        
        echo 'done##', $main->toJsonData(200, 'success', array('lItems' => $lItems, 'dInfo' => $dInfo));
        unset($lItems);
        unset($dInfo);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else {
    echo 'Missing action';
    $db->close();
    exit();
}
