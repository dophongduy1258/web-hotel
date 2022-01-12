<?php
$nod        = $main->get('nod');

if ($act == 'idx') {
    if ($nod == 'opt_district') {

        $eco_district = new eco_district();

        $city_id = $main->post('city_id');
        $eco_district->set('id_city', $city_id);

        $kq = $eco_district->opt_by();

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else if ($nod == 'opt_ward') {

        $eco_ward = new eco_ward();

        $district_id = $main->post('district_id');
        $eco_ward->set('id_district', $district_id);

        $kq = $eco_ward->opt_by();

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'checkout') {
    if ($nod == 'checkoutxxx') {

        $collected_payments       = new collected_payments();
        $address_book             = new address_book();
        $delivery                 = new delivery();
        $delivery_history         = new delivery_history();
        $showroom                 = new showroom();
        $wallet_detail            = new wallet_detail();
        $wallet_transaction       = new wallet_transaction();
        $members                  = new members();

        // $wallet_detail->set('client_id', $dClient['user_id']);
        // $dWallet                  = $wallet_detail->get_total_wallet_by_client();

        /**
         * *****Đã tính toán toàn bộ
         * - payment_cod
         * - payment_wallet
         * - payment_cashback
         */
        $ship_fee           = 0;
        $package_fee        = 0;
        $payment_cod        = $main->post('payment_cod');
        $payment_wallet     = 0;
        $payment_cashback   = 0;
        $payment_dcredit    = 0;

        $referral_by              = $main->post('referral_by');

        $ship_name                = $main->post('ship_name');
        $ship_email               = $main->post('ship_email');
        $ship_mobile              = $main->post('ship_mobile');
        $ship_address             = $main->post('ship_address');
        $ship_note                = $main->post('ship_note');
        $ship_province            = $main->post('ship_province');
        $ship_district            = $main->post('ship_district');
        $ship_ward                = $main->post('ship_ward');
        $ship_street              = $main->post('ship_street');
        $address_id               = $main->post('address_id');

        if (isset($referral_by) && $referral_by != '') {
            $members->set('user_id', $referral_by);
            $dMember = $members->get_detail();
        } else {
            if (isset($_SESSION['username_client'])) {
                $members->set('mobile', $_SESSION['mobile_client']);
            } else {
                $members->set('mobile', $ship_mobile);
            }
            $dMember = $members->get_by_mobile();
            if (!isset($dMember['user_id'])) {

                $referral_by = '';
                $dMember = register_member($ship_name, $ship_email, $ship_mobile, '123456', $referral_by);
            }
        }

        // print_r($dMember);
        // exit();

        if (isset($dMember['user_id'])) {

            if (!isset($address_id) || $address_id == 'null' || $address_id == '') {
                $address_id  = register_location($dMember['user_id'], $ship_name, $ship_mobile, $ship_email, $ship_province, $ship_district, $ship_ward, $ship_street);
            }

            $address_book->set('id', $address_id);
            $dShip = $address_book->get_detail();
            $ship_address = $dShip['address'] . ', ' . $dShip['ward'] . ', ' . $dShip['district'] . ', ' . $dShip['city'];
            $dLocation = $address_id;

            $address_book_id          = $dLocation; // Địa chỉ giao hàng
            $lItems                   = $main->post('lItems'); //unique_id, product_id, amount, decrement
            $note                     = $main->post('note'); //unique_id, product_id, amount, decrement
            $order_type               = $main->post('order_type');
            $for_client_id            = $main->post('for_client_id'); //Tạo đơn hàng cho thành viên cấp dưới này; nếu tự tạo cho mình thì bỏ rỗng;
            $order_type               = $order_type == '' ? 2 : $order_type; //order_type=> đơn xác nhận chuyển lên trên; = 6 đơn báo giá
            $created_at               = time();

            $lItems                   = json_decode($lItems, true);
            $shop_id                  = 1; //$dClient['shop_id'];

            //Nếu for_client_id = rỗng => tự đặt cho nó
            $id_customer              = $dMember['user_id'];
            $mobile_customer          = $dMember['mobile'];
            $name_customer            = $dMember['fullname'];
            $is_official_customer     = $dMember['is_official'];

            if ($for_client_id != '') {
                //Đặt cho 1 thành viên con
                $members->set('user_id', $for_client_id);
                $dClientFor = $members->get_detail();
                if (isset($dClientFor['user_id'])) {
                    $id_customer              = $dClientFor['user_id'];
                    $mobile_customer          = $dClientFor['mobile'];
                    $name_customer            = $dClientFor['fullname'];
                    $is_official_customer     = $dClientFor['is_official'];
                }
            }

            if (!$lItems || COUNT($lItems) < 1) {
                echo 'done##', $main->toJsonData(403, 'Vui lòng chọn sản phẩm cho đơn hàng.', null);
            } else if ($payment_wallet > 0 && $dWallet['wallet_main'] < $payment_wallet) {
                echo 'done##', $main->toJsonData(403, 'Ví của bạn không đủ để thanh toán.', null);
            } else if ($payment_cashback > 0 && $dWallet['wallet_cashback'] < $payment_cashback) {
                echo 'done##', $main->toJsonData(403, 'Ví điểm của bạn không đủ để thanh toán.', null);
            } else if ($for_client_id != '' && !isset($dClientFor['user_id'])) {
                echo 'done##', $main->toJsonData(403, 'Ví điểm của bạn không đủ để thanh toán.', null);
            } else {

                //Khởi tạo đơn hàng
                $order->set('shop_id', $shop_id);
                $order->set('user_add',  '');
                $order->set('vat', $setup['taxs']);
                $order->set('id_customer', $id_customer);
                $order->set('mobile_customer', $mobile_customer);
                $order->set('name_customer', $name_customer);
                $order->set('is_official_customer', $is_official_customer);
                $dWH = $wh->get_detail_by_shop_id($shop_id);
                $order->set('warehouse_id', isset($dWH['id']) ?  $dWH['id'] : '0');

                $order->set('created_by_client_id', $dMember['user_id']);
                $order->set('longitude', 0);
                $order->set('latitude', 0);
                $order->set('order_type', $order_type); //Đơn từ app Client => order_type=> đơn xác nhận chuyển lên trên; = 6 đơn báo giá

                $order_id = $order->create_temp_by_customer();
                $order_created_at = time();

                $detail_order->delete_by_order_id($shop_id, $order_id, $order_created_at);

                //Thêm item vào đơn hàng
                foreach ($lItems as $key => $item) {


                    $expire_date            = 0;
                    $price                  = $main->number($item['price']);
                    $amount                 = $main->number($item['quantity']);
                    $decrement              = $main->number($item['decrement']);

                    $product->set('id', $item['product_id']);
                    $dProduct = $product->get_detail();

                    $dProduct['price']          = $price;
                    $dProduct['quantity']       = $amount;
                    $dProduct['inverse']        = 1;
                    $dProduct['expire_date']    = $expire_date;
                    $dProduct['decrement']      = $decrement;

                    if (isset($dProduct['id']) && $dProduct['multi_attribute'] == 0) {
                        $detail_order->add_product_item_client($shop_id, $dMember['fullname'], $order_id, $order_created_at, $dProduct, '', $dMember['user_id']);
                    } else {
                        $dSKU = $SKU->get_by_unique_id($item['unique_id']);
                        if (isset($dSKU['id'])) {
                            $detail_order->add_product_item_client($shop_id, $dMember['fullname'], $order_id, $order_created_at, $dProduct, $dSKU, $dMember['user_id']);
                        }
                    }
                }

                $dDOrder = $detail_order->listby_order_widthSKU_grouped($shop_id, $order_id, $order_created_at);
                $no_items = count($dDOrder) + 0;
                if ($no_items == 0) {
                    echo 'done##', $main->toJsonData(403, 'Vui lòng chọn sản phẩm cho đơn hàng.', null);
                } else {

                    $dSumOrder          = $detail_order->get_sum_general($shop_id, $order_id, $created_at);
                    $total_order        = $dSumOrder['total_order']; //Giá trị đơn hàng price*quality*(100 - decrement)/100
                    $total_default      = $dSumOrder['total_default']; //Giá trị đơn hàng default_price*quality
                    //tổng giá trị đơn hàng đang đặt
                    $total = $order->get_total_order($shop_id, $order_id, $created_at);
                    $available_balances = 0;
                    if ($payment_cashback > 0) {
                        $total_pending = $order->sum_total_order_processing($id_customer, $shop_id, $created_at, $setup['payment_type_wallet_cashback']);
                        $available_balances = $dWallet['wallet_cashback'] - $total_pending;
                    }

                    if (false && $total_order < $total_default) {

                        $order->delete_item($shop_id, $order_id, $created_at); //Xóa reset đơn hàng
                        echo 'done##', $main->toJsonData(403, 'Tổng giá trị đơn hàng không được thấp hơn tổng giá trị nhập hàng.', null);
                    } else {
                        if ($available_balances != 0 && $available_balances < $total) {
                            echo 'done##', $main->toJsonData(403, 'Bạn còn đơn hàng chưa thanh toán. Ví điểm của bạn không đủ để thanh toán.', null);
                        } else {
                            @$total_paid = $payment_wallet + $payment_cashback;

                            $order->set('shop_id', $shop_id);
                            $order->set('id', $order_id);
                            $order->set('ship_name', $dShip['fullname']);
                            $order->set('ship_mobile', $dShip['mobile']);
                            $order->set('ship_address', $ship_address);
                            $order->set('ship_note', $ship_note);
                            $order->set('address_book_id', $address_book_id);
                            $order->set('longitude', 0);
                            $order->set('latitude', 0);
                            $order->set('note', $note);
                            $order->set('created_at', $order_created_at);
                            $order->set('created_by_client_id', $dMember['user_id']);
                            $order->set('total_paid', 0); //do đơn hàng phải xác nhận thì mới trừ, nên total_paid phải set =0 => cho tạo sổ quỹ
                            $order->set('service_fee', $ship_fee + $package_fee);
                            $order->set('pro_allow_commission', 0);
                            $order->set('pro_allow_commission_value', 0);
                            $order->set('pro_allow_commission_percent', 0);
                            $order->set('voucher_id', 0);
                            $order->checkout_by_customer();

                            $order->set('id', $order_id);
                            $dOrder = $order->get_detail($shop_id, $order_id, $created_at);

                            //xử lý n hình thức thành toán
                            //$payment_wallet + $payment_cashback
                            $lPays      = array();

                            if ($payment_wallet > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_main'];
                                $isp['amount']             = $payment_wallet;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            if ($payment_cashback > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_cashback'];
                                $isp['amount']             = $payment_cashback;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            if ($payment_dcredit > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_dcredit'];
                                $isp['amount']             = $payment_dcredit;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            // if (($payment_wallet + $payment_cashback) < 0) {
                            if ($payment_cod  > 0) {
                                $isp['payment_type']       = $setup['payment_type_COD'];
                                $isp['amount']             = $payment_cod; //$tong_tien - $payment_wallet - $payment_cashback + $ship_fee + $package_fee;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            $payment_type = $setup['payment_type_COD'];
                            if (COUNT($lPays) > 0) {
                                $payment_type = 1; //Đơn tổng hợp là có payment_id = 1 => và hold_date = 1
                            }

                            $collected_orders->set('sum', $total);
                            $collected_orders->set('payment_type', $payment_type);
                            $collected_orders->set('created_at', time());
                            $collected_orders->set('order_id', $order_id);
                            $collected_orders->set('status', 0);
                            $collected_orders->set('total_paid', $dOrder['total_paid']);
                            $collected_orders->set('shop_id', $dOrder['shop_id']);
                            $collected_orders->set('created_by', 'Admin');
                            $collected_orders->set('members_id', $dOrder['id_customer']);
                            $collected_orders->set('members_name', $dOrder['name_customer']);
                            $collected_orders->set('members_mobile', $dOrder['mobile_customer']);
                            $collected_orders->set('is_official_member', $dOrder['is_official_customer']);
                            $collected_orders->set('is_booking', 1); //
                            $collected_orders->set('is_returned_order', 0); //
                            $collected_orders->set('nvkd_id', 0); //
                            $collected_orders->set('nvkd_commission', 0); //
                            $collected_orders->set('service_fee', $ship_fee); //
                            $collected_orders->set('order_type', $dOrder['order_type']); //
                            $collected_orders->set('is_internal', $dOrder['is_internal']); //
                            $collected_orders->set('created_by_client_id', $dOrder['created_by_client_id']); //
                            $collected_orders->set('export_for_wh_id', $dOrder['export_for_wh_id']); //
                            $collected_orders->set('cash', 0); //
                            $collected_orders->add(json_encode($lPays));

                            $dOrder = $order->get_detail($shop_id, $order_id, $order_created_at);

                            $collected_payments->set('shop_id', $shop_id);
                            $collected_payments->set('order_id', $order_id);
                            $lPayment     = $collected_payments->list_by_order();

                            $dOrder['is_cashback'] = false;
                            $register_back_value = 0;
                            foreach ($lPayment as $ssi) {
                                if (!$dOrder['is_cashback'] && $setup['payment_type_wallet_cashback'] == $ssi['id']) {
                                    $dOrder['is_cashback'] = true;
                                }
                            }
                            $dOrder['lPayment'] = $lPayment;

                            $dDiSer                   = $detail_order->devidend_service_fee($shop_id, $order_id, $order_created_at);
                            $discount_val             = $dDiSer['discount'];
                            $ship_fee_val             = $dDiSer['ship_fee'];
                            $package_fee_val          = $dDiSer['package_fee'];
                            $total_product            = $dDiSer['total_product'];
                            unset($dDiSer);

                            $dOrder['ship_fee']         = $ship_fee_val;
                            $dOrder['package_fee']      = $package_fee_val;
                            $dOrder['discount']         = $discount_val;
                            $dOrder['total_product']    = $total_product;

                            $dOrder['lItems']   = $detail_order->listby_order_only_product($shop_id, $order_id, $order_created_at);

                            if ($dShip['email'] != '') {
                                $mailer = new mailer();
                                $content_sms    =   $mailer->template_submit_order($dShip, $lItems, $order_id, $dOrder['total_product'], $ship_address);
                                $mailer->sendMailCustom($dShip['email'], $content_sms, 'Đặt hàng thành công', $dShip['fullname'], $setup, false);
                            }

                            $subject = 'Chúc mừng bạn đặt hàng thành công';
                            $content = 'Bạn đã đặt hàng thành công đơn hàng: ' . $order_id . '. Cảm ơn bạn đã tin dùng các sản phẩm của chúng tôi.';
                            $notification->set('to', $dOrder['id_customer'] . ';');
                            $notification->set('subject', $subject);
                            $notification->set('content', $content);
                            $notification->set('created_by', 0);
                            $notification_id = $notification->add();

                            $post['to'] = '/topics/client_' . $dOrder['id_customer'];
                            $post['priority']  = 'high';
                            $ii['title']  = '📣' . $subject;
                            $ii['body']   = $content;
                            $post['notification'] = $ii;
                            $post['data']['force_refresh'] = true;
                            $post['data']['notify_id']     = $notification_id;
                            $main->sendFCM($post);

                            echo 'done##', $main->toJsonData(200, 'Chúc mừng. Bạn đã đặt hàng thành công.', $dOrder);
                            unset($lPayment);
                            unset($dOrder);
                        }
                    }
                }
            }
        } else {
            echo 'done##', $main->toJsonData(200, $dMember, null);
        }
    } else if ($nod == 'checkout') {

        $collected_payments       = new collected_payments();
        $address_book             = new address_book();
        $delivery                 = new delivery();
        $delivery_history         = new delivery_history();
        $showroom                 = new showroom();
        $wallet_detail            = new wallet_detail();
        $wallet_transaction       = new wallet_transaction();
        $members                  = new members();

        // $wallet_detail->set('client_id', $dClient['user_id']);
        // $dWallet                  = $wallet_detail->get_total_wallet_by_client();

        /**
         * *****Đã tính toán toàn bộ
         * - payment_cod
         * - payment_wallet
         * - payment_cashback
         */
        $ship_fee           = $main->post('ship_fee');
        $package_fee        = $main->post('package_fee');
        $payment_cod        = $main->post('payment_cod');
        $payment_wallet     = 0;
        $payment_cashback   = 0;
        $payment_dcredit    = 0;

        $referral_by              = $main->post('referral_by');

        $ship_name                = $main->post('ship_name');
        $ship_email               = $main->post('ship_email');
        $ship_mobile              = $main->post('ship_mobile');
        $ship_address             = $main->post('ship_address');
        $ship_note                = $main->post('ship_note');
        $ship_province            = $main->post('ship_province');
        $ship_district            = $main->post('ship_district');
        $ship_ward                = $main->post('ship_ward');
        $ship_street              = $main->post('ship_street');
        $address_id               = $main->post('address_id');

        $rate_id                  = $main->post('rate_id');

        if (isset($referral_by) && $referral_by != '') {
            $members->set('user_id', $referral_by);
            $dMember = $members->get_detail();
        } else {
            if (isset($_SESSION['username_client'])) {
                $members->set('mobile', $_SESSION['mobile_client']);
            } else {
                $members->set('mobile', $ship_mobile);
            }
            $dMember = $members->get_by_mobile();
            if (!isset($dMember['user_id'])) {

                $referral_by = '';
                $dMember = register_member($ship_name, $ship_email, $ship_mobile, '123456', $referral_by);
            }
        }

        // print_r($dMember);
        // exit();

        if (isset($dMember['user_id'])) {

            if (!isset($address_id) || $address_id == 'null' || $address_id == '') {
                $address_id  = register_location($dMember['user_id'], $ship_name, $ship_mobile, $ship_email, $ship_province, $ship_district, $ship_ward, $ship_street);
            }

            $address_book->set('id', $address_id);
            $dShip = $address_book->get_detail();
            $ship_address = $dShip['address'] . ', ' . $dShip['ward'] . ', ' . $dShip['district'] . ', ' . $dShip['city'];
            $dLocation = $address_id;

            $address_book_id          = $dLocation; // Địa chỉ giao hàng
            $lItems                   = $main->post('lItems'); //unique_id, product_id, amount, decrement
            $note                     = $main->post('note'); //unique_id, product_id, amount, decrement
            $order_type               = $main->post('order_type');
            $for_client_id            = $main->post('for_client_id'); //Tạo đơn hàng cho thành viên cấp dưới này; nếu tự tạo cho mình thì bỏ rỗng;
            $order_type               = $order_type == '' ? 2 : $order_type; //order_type=> đơn xác nhận chuyển lên trên; = 6 đơn báo giá
            $created_at               = time();

            $lItems                   = json_decode($lItems, true);
            $shop_id                  = 1; //$dClient['shop_id'];

            //Nếu for_client_id = rỗng => tự đặt cho nó
            $id_customer              = $dMember['user_id'];
            $mobile_customer          = $dMember['mobile'];
            $name_customer            = $dMember['fullname'];
            $is_official_customer     = $dMember['is_official'];

            if ($for_client_id != '') {
                //Đặt cho 1 thành viên con
                $members->set('user_id', $for_client_id);
                $dClientFor = $members->get_detail();
                if (isset($dClientFor['user_id'])) {
                    $id_customer              = $dClientFor['user_id'];
                    $mobile_customer          = $dClientFor['mobile'];
                    $name_customer            = $dClientFor['fullname'];
                    $is_official_customer     = $dClientFor['is_official'];
                }
            }

            /**
             * BEGIN Tạo item là ship_fee cho vào list item
             */
            $dDeliveryFeeItem = array();
            if ($ship_fee > 0 && isset($setup['pro_delivery_fee']) && $setup['pro_delivery_fee'] > 0) { //đã cài sản phẩm dịch vụ giao hàng
                $dItemFee = array();
                $product->set('id', $setup['pro_delivery_fee']);
                $dDeliveryFeeItem = $product->get_detail_product(); //Giá sản phẩm dịch vụ đóng gói

                if (isset($dDeliveryFeeItem['id'])) {
                    $dDeliveryFeeItem['product_id']     = $dDeliveryFeeItem['id'];
                    $dDeliveryFeeItem['price']          = $ship_fee;
                    $dDeliveryFeeItem['quantity']       = 1;
                    $dDeliveryFeeItem['inverse']        = 1;
                    $dDeliveryFeeItem['expire_date']    = 0;
                    $dDeliveryFeeItem['decrement']      = 0;
                    $dDeliveryFeeItem['allow_root_price'] = 0;
                    $dDeliveryFeeItem['ratio_convert']   = 1;
                    $dDeliveryFeeItem['multi_attribute'] = 0;

                    if ($lItems && COUNT($lItems) > 0) {
                        $lItems[] = $dDeliveryFeeItem;
                    }
                }
            }
            /**
             * END Tạo item là ship_fee cho vào list item
             */

            if (!$lItems || COUNT($lItems) < 1) {
                echo 'done##', $main->toJsonData(403, 'Vui lòng chọn sản phẩm cho đơn hàng.', null);
            } else if ($payment_wallet > 0 && $dWallet['wallet_main'] < $payment_wallet) {
                echo 'done##', $main->toJsonData(403, 'Ví của bạn không đủ để thanh toán.', null);
            } else if ($ship_fee > 0 && !isset($dDeliveryFeeItem['id'])) {
                echo 'done##', $main->toJsonData(403, 'Chưa cài đặt phí dịch vụ giao hàng giao hàng.', 'Phải tạo sản phẩm dịch vụ tên là giao hàng rồi mới chạy được.');
            } else if ($payment_cashback > 0 && $dWallet['wallet_cashback'] < $payment_cashback) {
                echo 'done##', $main->toJsonData(403, 'Ví điểm của bạn không đủ để thanh toán.', null);
            } else if ($for_client_id != '' && !isset($dClientFor['user_id'])) {
                echo 'done##', $main->toJsonData(403, 'Ví điểm của bạn không đủ để thanh toán.', null);
            } else {

                //Khởi tạo đơn hàng
                $order->set('shop_id', $shop_id);
                $order->set('user_add',  '');
                $order->set('vat', $setup['taxs']);
                $order->set('id_customer', $id_customer);
                $order->set('mobile_customer', $mobile_customer);
                $order->set('name_customer', $name_customer);
                $order->set('is_official_customer', $is_official_customer);
                $dWH = $wh->get_detail_by_shop_id($shop_id);
                $order->set('warehouse_id', isset($dWH['id']) ?  $dWH['id'] : '0');

                $order->set('created_by_client_id', $dMember['user_id']);
                $order->set('longitude', 0);
                $order->set('latitude', 0);
                $order->set('order_type', $order_type); //Đơn từ app Client => order_type=> đơn xác nhận chuyển lên trên; = 6 đơn báo giá

                $order_id = $order->create_temp_by_customer();
                $order_created_at = time();

                $detail_order->delete_by_order_id($shop_id, $order_id, $order_created_at);

                //Thêm item vào đơn hàng
                foreach ($lItems as $key => $item) {


                    $expire_date            = 0;
                    $price                  = $main->number($item['price']);
                    $amount                 = $main->number($item['quantity']) + 0;
                    $decrement              = $main->number($item['decrement']);

                    $product->set('id', $item['product_id']);
                    $dProduct = $product->get_detail();

                    $dProduct['price']          = $price;
                    $dProduct['quantity']       = $amount;
                    $dProduct['inverse']        = 1;
                    $dProduct['expire_date']    = $expire_date;
                    $dProduct['decrement']      = $decrement;

                    if (isset($dProduct['id']) && $dProduct['multi_attribute'] == 0) {
                        $detail_order->add_product_item_client($shop_id, $dMember['fullname'], $order_id, $order_created_at, $dProduct, '', $dMember['user_id']);
                    } else {
                        $dSKU = $SKU->get_by_unique_id($item['unique_id']);
                        if (isset($dSKU['id'])) {
                            $detail_order->add_product_item_client($shop_id, $dMember['fullname'], $order_id, $order_created_at, $dProduct, $dSKU, $dMember['user_id']);
                        }
                    }
                }

                $dDOrder = $detail_order->listby_order_widthSKU_grouped($shop_id, $order_id, $order_created_at);
                $no_items = count($dDOrder) + 0;
                if ($no_items == 0) {
                    echo 'done##', $main->toJsonData(403, 'Vui lòng chọn sản phẩm cho đơn hàng.', null);
                } else {

                    $dSumOrder          = $detail_order->get_sum_general($shop_id, $order_id, $created_at);
                    $total_order        = $dSumOrder['total_order']; //Giá trị đơn hàng price*quality*(100 - decrement)/100
                    $total_default      = $dSumOrder['total_default']; //Giá trị đơn hàng default_price*quality
                    //tổng giá trị đơn hàng đang đặt
                    $total = $order->get_total_order($shop_id, $order_id, $created_at);
                    $available_balances = 0;
                    if ($payment_cashback > 0) {
                        $total_pending = $order->sum_total_order_processing($id_customer, $shop_id, $created_at, $setup['payment_type_wallet_cashback']);
                        $available_balances = $dWallet['wallet_cashback'] - $total_pending;
                    }

                    if (false && $total_order < $total_default) {

                        $order->delete_item($shop_id, $order_id, $created_at); //Xóa reset đơn hàng
                        echo 'done##', $main->toJsonData(403, 'Tổng giá trị đơn hàng không được thấp hơn tổng giá trị nhập hàng.', null);
                    } else {
                        if ($available_balances != 0 && $available_balances < $total) {
                            echo 'done##', $main->toJsonData(403, 'Bạn còn đơn hàng chưa thanh toán. Ví điểm của bạn không đủ để thanh toán.', null);
                        } else {
                            @$total_paid = $payment_wallet + $payment_cashback;

                            $order->set('shop_id', $shop_id);
                            $order->set('id', $order_id);
                            $order->set('ship_name', $dShip['fullname']);
                            $order->set('ship_mobile', $dShip['mobile']);
                            $order->set('ship_address', $ship_address);
                            $order->set('ship_note', $ship_note);
                            $order->set('address_book_id', $address_book_id);
                            $order->set('longitude', 0);
                            $order->set('latitude', 0);
                            $order->set('note', $note);
                            $order->set('created_at', $order_created_at);
                            $order->set('created_by_client_id', $dMember['user_id']);
                            $order->set('total_paid', 0); //do đơn hàng phải xác nhận thì mới trừ, nên total_paid phải set =0 => cho tạo sổ quỹ
                            $order->set('service_fee', $ship_fee + $package_fee);
                            $order->set('pro_allow_commission', 0);
                            $order->set('pro_allow_commission_value', 0);
                            $order->set('pro_allow_commission_percent', 0);
                            $order->set('voucher_id', 0);
                            $order->checkout_by_customer();

                            $order->set('id', $order_id);
                            $dOrder = $order->get_detail($shop_id, $order_id, $created_at);

                            //xử lý n hình thức thành toán
                            //$payment_wallet + $payment_cashback
                            $lPays      = array();

                            if ($payment_wallet > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_main'];
                                $isp['amount']             = $payment_wallet;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            if ($payment_cashback > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_cashback'];
                                $isp['amount']             = $payment_cashback;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            if ($payment_dcredit > 0) {
                                $isp['payment_type']       = $setup['payment_type_wallet_dcredit'];
                                $isp['amount']             = $payment_dcredit;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            // if (($payment_wallet + $payment_cashback) < 0) {
                            if ($payment_cod  > 0) {
                                $isp['payment_type']       = $setup['payment_type_COD'];
                                $isp['amount']             = $payment_cod; //$tong_tien - $payment_wallet - $payment_cashback + $ship_fee + $package_fee;
                                $isp['wallet_paid']        = 0;
                                $isp['wallet_transaction_id']        = 0;
                                $lPays[]                   = $isp;
                            }

                            $payment_type = $setup['payment_type_COD'];
                            if (COUNT($lPays) > 0) {
                                $payment_type = 1; //Đơn tổng hợp là có payment_id = 1 => và hold_date = 1
                            }

                            $collected_orders->set('sum', $total);
                            $collected_orders->set('payment_type', $payment_type);
                            $collected_orders->set('created_at', time());
                            $collected_orders->set('order_id', $order_id);
                            $collected_orders->set('status', 0);
                            $collected_orders->set('total_paid', $dOrder['total_paid']);
                            $collected_orders->set('shop_id', $dOrder['shop_id']);
                            $collected_orders->set('created_by', 'Admin');
                            $collected_orders->set('members_id', $dOrder['id_customer']);
                            $collected_orders->set('members_name', $dOrder['name_customer']);
                            $collected_orders->set('members_mobile', $dOrder['mobile_customer']);
                            $collected_orders->set('is_official_member', $dOrder['is_official_customer']);
                            $collected_orders->set('is_booking', 1); //
                            $collected_orders->set('is_returned_order', 0); //
                            $collected_orders->set('nvkd_id', 0); //
                            $collected_orders->set('nvkd_commission', 0); //
                            $collected_orders->set('service_fee', $ship_fee); //
                            $collected_orders->set('order_type', $dOrder['order_type']); //
                            $collected_orders->set('is_internal', $dOrder['is_internal']); //
                            $collected_orders->set('created_by_client_id', $dOrder['created_by_client_id']); //
                            $collected_orders->set('export_for_wh_id', $dOrder['export_for_wh_id']); //
                            $collected_orders->set('cash', 0); //
                            $collected_orders->add(json_encode($lPays));

                            $dOrder = $order->get_detail($shop_id, $order_id, $order_created_at);

                            $collected_payments->set('shop_id', $shop_id);
                            $collected_payments->set('order_id', $order_id);
                            $lPayment     = $collected_payments->list_by_order();

                            $dOrder['is_cashback'] = false;
                            $register_back_value = 0;
                            foreach ($lPayment as $ssi) {
                                if (!$dOrder['is_cashback'] && $setup['payment_type_wallet_cashback'] == $ssi['id']) {
                                    $dOrder['is_cashback'] = true;
                                }
                            }
                            $dOrder['lPayment'] = $lPayment;

                            $dDiSer                   = $detail_order->devidend_service_fee($shop_id, $order_id, $order_created_at);
                            $discount_val             = $dDiSer['discount'];
                            $ship_fee_val             = $dDiSer['ship_fee'];
                            $package_fee_val          = $dDiSer['package_fee'];
                            $total_product            = $dDiSer['total_product'];
                            unset($dDiSer);

                            $dOrder['ship_fee']         = $ship_fee_val;
                            $dOrder['package_fee']      = $package_fee_val;
                            $dOrder['discount']         = $discount_val;
                            $dOrder['total_product']    = $total_product;

                            $dOrder['lItems']   = $detail_order->listby_order_only_product($shop_id, $order_id, $order_created_at);

                            if ($dShip['email'] != '') {
                                $mailer = new mailer();
                                $content_sms    =   $mailer->template_submit_order($dShip, $lItems, $order_id, $dOrder['total_product'], $ship_address);
                                $mailer->sendMailCustom($dShip['email'], $content_sms, 'Đặt hàng thành công', $dShip['fullname'], $setup, false);
                            }

                            $delivery->set('shipper_id', 0);
                            $delivery->set('order_id', $order_id);
                            $delivery->set('order_created_at', $order_created_at);
                            $delivery->set('shop_id', $shop_id);
                            $delivery->set('customer_id', $dMember['user_id']);
                            $delivery->set('fee', $ship_fee_val);
                            $delivery->set('rate_id', $rate_id);
                            $delivery->set('shipments_status', isset($setup['go_ship_is_shipments']) && $setup['go_ship_is_shipments'] == 1 ? 1 : 0);
                            $id = $delivery->add();

                            $delivery->set('id', $id);
                            $de = $delivery->get_detail();

                            $delivery_history->set('note', 'Đơn hàng đã được gửi đến đơn vị giao.');
                            $delivery_history->set('shipper_id', 0);
                            $delivery_history->set('delivery_id', $id);
                            $delivery_history->set('order_id', $de['order_id']);
                            $delivery_history->set('order_created_at', $de['order_created_at']);
                            $delivery_history->set('shop_id', $de['shop_id']);
                            $delivery_history->add();

                            $subject = 'Chúc mừng bạn đặt hàng thành công';
                            $content = 'Bạn đã đặt hàng thành công đơn hàng: ' . $order_id . '. Cảm ơn bạn đã tin dùng các sản phẩm của chúng tôi.';
                            $notification->set('to', $dOrder['id_customer'] . ';');
                            $notification->set('subject', $subject);
                            $notification->set('content', $content);
                            $notification->set('created_by', 0);
                            $notification_id = $notification->add();

                            $post['to'] = '/topics/client_' . $dOrder['id_customer'];
                            $post['priority']  = 'high';
                            $ii['title']  = '📣' . $subject;
                            $ii['body']   = $content;
                            $post['notification'] = $ii;
                            $post['data']['force_refresh'] = true;
                            $post['data']['notify_id']     = $notification_id;
                            $main->sendFCM($post);

                            if (isset($setup['go_ship_is_shipments']) && $setup['go_ship_is_shipments'] == 1) {

                                // Gọi function tạo vận đơn
                                $create_shipments = create_shipments($rate_id, $order_id, $payment_cod, $note, $address_book_id, 1);

                                if ($create_shipments['code'] == 200) {
                                    echo 'done##', $main->toJsonData(200, 'Chúc mừng. Bạn đã đặt hàng thành công.', $dOrder);
                                    unset($lPayment);
                                    unset($dOrder);
                                } else {
                                    return $main->toJsonData($create_shipments['code'], $create_shipments['status'], $create_shipments['data']);
                                }
                            } else {
                                echo 'done##', $main->toJsonData(200, 'Chúc mừng. Bạn đã đặt hàng thành công.', $dOrder);
                                unset($lPayment);
                                unset($dOrder);
                            }
                        }
                    }
                }
            }
        } else {
            echo 'done##', $main->toJsonData(200, $dMember, null);
        }
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'shipments') {
    if ($nod == 'list') {
        $api = new api();

        $ship_province            = $main->post('ship_province');
        $ship_district            = $main->post('ship_district');
        $ship_ward                = $main->post('ship_ward');

        $address_id        = $main->post('address_id');
        $partner_id        = 1; //$app->request()->post('partner_id');

        $eco_ward_ship      = new eco_ward_ship();
        $eco_district_ship  = new eco_district_ship();
        $eco_city_ship      = new eco_city_ship();
        $address_book       = new address_book();

        $address = array();

        if (isset($address_id) && $address_id != '') {
            $address_book->set('id', $address_id);
            $address = $address_book->get_detail();
        } else {
            $address['ward_id'] = $ship_ward;
            $address['district_id'] = $ship_district;
            $address['city_id'] = $ship_province;
        }


        $eco_ward_ship->set('ward_id', $address['ward_id']);
        $eco_ward_ship->set('partner_id', $partner_id);
        $ward_id = $eco_ward_ship->get_detail_item();
        $ward_id = isset($ward_id['new_id']) && $ward_id['new_id'] != '' ? $ward_id['new_id'] : 0;

        $eco_district_ship->set('district_id', $address['district_id']);
        $eco_district_ship->set('partner_id', $partner_id);
        $district_id = $eco_district_ship->get_detail_item();
        $district_id = isset($district_id['new_id']) && $district_id['new_id'] != '' ? $district_id['new_id'] : 0;

        $eco_city_ship->set('city_id', $address['city_id']);
        $eco_city_ship->set('partner_id', $partner_id);
        $city_id = $eco_city_ship->get_detail_item();
        $city_id = isset($city_id['new_id']) && $city_id['new_id'] != '' ? $city_id['new_id'] : 0;

        $jsonData = array();

        $jsonData['shipment']['address_from']['ward'] = isset($setup["go_ship_address_from_ward"]) && $setup["go_ship_address_from_ward"] != '' ? $setup["go_ship_address_from_ward"] : '';
        $jsonData['shipment']['address_from']['district'] = isset($setup["go_ship_address_from_district"]) && $setup["go_ship_address_from_district"] != '' ? $setup["go_ship_address_from_district"] : '';
        $jsonData['shipment']['address_from']['city'] = isset($setup["go_ship_address_from_city"]) && $setup["go_ship_address_from_city"] != '' ? $setup["go_ship_address_from_city"] : '';

        $jsonData['shipment']['address_to']['ward'] = $ward_id;
        $jsonData['shipment']['address_to']['district'] = $district_id;
        $jsonData['shipment']['address_to']['city'] = $city_id;

        $jsonData['shipment']['parcel']['cod'] = isset($setup["go_ship_parcel_cod"]) && $setup["go_ship_parcel_cod"] != '' ? $setup["go_ship_parcel_cod"] : 0;
        $jsonData['shipment']['parcel']['weight'] = isset($setup["go_ship_parcel_weight"]) && $setup["go_ship_parcel_weight"] != '' ? $setup["go_ship_parcel_weight"] : '';
        $jsonData['shipment']['parcel']['width'] = isset($setup["go_ship_parcel_width"]) && $setup["go_ship_parcel_width"] != '' ? $setup["go_ship_parcel_width"] : '';
        $jsonData['shipment']['parcel']['height'] = isset($setup["go_ship_parcel_height"]) && $setup["go_ship_parcel_height"] != '' ? $setup["go_ship_parcel_height"] : '';
        $jsonData['shipment']['parcel']['length'] = isset($setup["go_ship_parcel_length"]) && $setup["go_ship_parcel_length"] != '' ? $setup["go_ship_parcel_length"] : '';

        $status_code = 403;
        $result = $api->exeAPIShip('POST', 'rates', $jsonData, $status_code);

        $result = json_decode($result, true);

        $shipments = isset($setup["go_ship_shipments"]) && $setup["go_ship_shipments"] != '' ? $setup["go_ship_shipments"] : 'ghn;ghtk;vtp';

        $kq = array();

        foreach ($result['data'] as $item) {
            if (in_array($item['carrier_short_name'], explode(';', $shipments))) {
                $kq[] = $item;
            }
        }

        if ($result['code'] == 200) {
            echo "done##", $main->toJsonData($result['code'], $result['status'], $kq);
        } elseif ($result['code'] == 401) {
            $token = $api->loginGoShip();
            if (!isset($token['code']) || $token['code'] != 200) {
                echo "done##", $main->toJsonData(403, 'Đăng nhập không thành công.', $token);
                exit();
            } else {
                $status_code = 403;
                $result = $api->exeAPIShip('POST', 'rates', $jsonData, $status_code);

                $result = json_decode($result, true);
                echo "done##", $main->toJsonData($result['code'], $result['status'], $result['data']);
            }
        } else {
            $status_code = 403;
            $result = $api->exeAPIShip('POST', 'rates', $jsonData, $status_code);

            $result = json_decode($result, true);
            echo "done##", $main->toJsonData($result['code'], $result['status'], $result['data']);
        }
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'info') {
    if ($nod == 'infoShip') {

        $kq = array();

        if (isset($_SESSION['username_client'])) {
            $address_book->set('client_id', $_SESSION['username_client']);
            $kq['l'] = $address_book->filter();

            $address_book->set('client_id', $_SESSION['username_client']);
            $kq['default'] = $address_book->get_default();
        }

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'fee') {
    if ($nod == "ship") {

        // $address_book_id         = $main->post('address_book_id');

        $product->set('id', $setup['pro_package_fee']);
        $package_fee = $product->get_detail(); //Giá sản phẩm dịch vụ đóng gói

        if (isset($package_fee['id'])) {
            $kq['package_fee'] = $package_fee['price'] * 1;
        } else {
            $kq['package_fee'] = 0;
        }

        $product->set('id', $setup['pro_delivery_fee']);
        $dDeliveryFee = $product->get_detail(); //Giá sản phẩm dịch vụ đóng gói

        if (isset($dDeliveryFee['id'])) {
            $kq['delivery_fee'] = $dDeliveryFee['price'] * 1;
        } else {
            $kq['delivery_fee'] = 0;
        }

        echo "done##", $main->toJsonData(200, 'success', $kq);
        unset($kq);
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

function create_shipments($rate_id, $order_id, $payment_cod, $note, $address_id, $partner_id)
{
    global $setup;

    $eco_ward_ship      = new eco_ward_ship();
    $eco_district_ship  = new eco_district_ship();
    $eco_city_ship      = new eco_city_ship();
    $address_book       = new address_book();
    $api                = new api();

    $address_book->set('id', $address_id);
    $address = $address_book->get_detail();

    $eco_ward_ship->set('ward_id', $address['ward_id']);
    $eco_ward_ship->set('partner_id', $partner_id);
    $ward_id = $eco_ward_ship->get_detail_item();
    $ward_id = isset($ward_id['new_id']) && $ward_id['new_id'] != '' ? $ward_id['new_id'] : 0;

    $eco_district_ship->set('district_id', $address['district_id']);
    $eco_district_ship->set('partner_id', $partner_id);
    $district_id = $eco_district_ship->get_detail_item();
    $district_id = isset($district_id['new_id']) && $district_id['new_id'] != '' ? $district_id['new_id'] : 0;

    $eco_city_ship->set('city_id', $address['city_id']);
    $eco_city_ship->set('partner_id', $partner_id);
    $city_id = $eco_city_ship->get_detail_item();
    $city_id = isset($city_id['new_id']) && $city_id['new_id'] != '' ? $city_id['new_id'] : 0;

    $jsonData = array();

    $jsonData['shipment']['rate'] = $rate_id;
    $jsonData['shipment']['order_id'] = $order_id;

    $jsonData['shipment']['address_from']['name'] = isset($setup["company_title"]) && $setup["company_title"] != '' ? $setup["company_title"] : '';
    $jsonData['shipment']['address_from']['phone'] = isset($setup["company_phone"]) && $setup["company_phone"] != '' ? $setup["company_phone"] : '';
    $jsonData['shipment']['address_from']['street'] = isset($setup["company_address"]) && $setup["company_address"] != '' ? $setup["company_address"] : '';
    $jsonData['shipment']['address_from']['ward'] = isset($setup["go_ship_address_from_ward"]) && $setup["go_ship_address_from_ward"] != '' ? $setup["go_ship_address_from_ward"] : '';
    $jsonData['shipment']['address_from']['district'] = isset($setup["go_ship_address_from_district"]) && $setup["go_ship_address_from_district"] != '' ? $setup["go_ship_address_from_district"] : '';
    $jsonData['shipment']['address_from']['city'] = isset($setup["go_ship_address_from_city"]) && $setup["go_ship_address_from_city"] != '' ? $setup["go_ship_address_from_city"] : '';

    $jsonData['shipment']['address_to']['name'] = $address['fullname'];
    $jsonData['shipment']['address_to']['phone'] = $address['mobile'];
    $jsonData['shipment']['address_to']['street'] = $address['address'];
    $jsonData['shipment']['address_to']['ward'] = $ward_id;
    $jsonData['shipment']['address_to']['district'] = $district_id;
    $jsonData['shipment']['address_to']['city'] = $city_id;

    $jsonData['shipment']['parcel']['cod'] = $payment_cod;
    $jsonData['shipment']['parcel']['weight'] = isset($setup["go_ship_parcel_weight"]) && $setup["go_ship_parcel_weight"] != '' ? $setup["go_ship_parcel_weight"] : '';
    $jsonData['shipment']['parcel']['width'] = isset($setup["go_ship_parcel_width"]) && $setup["go_ship_parcel_width"] != '' ? $setup["go_ship_parcel_width"] : '';
    $jsonData['shipment']['parcel']['height'] = isset($setup["go_ship_parcel_height"]) && $setup["go_ship_parcel_height"] != '' ? $setup["go_ship_parcel_height"] : '';
    $jsonData['shipment']['parcel']['length'] = isset($setup["go_ship_parcel_length"]) && $setup["go_ship_parcel_length"] != '' ? $setup["go_ship_parcel_length"] : '';
    $jsonData['shipment']['parcel']['metadata'] = $note . '';

    $status_code = 403;
    $result = $api->exeAPIShip('POST', 'shipments', $jsonData, $status_code);

    $result = json_decode($result, true);

    return $result;
}

function register_member($fullname, $email, $mobile, $password, $referral_by)
{
    global $main, $setup;

    $members = new members();

    $shop_id        = 1;

    if ($mobile == '') {
        $dMember = 'Vui lòng nhập số điện thoại.';
    } else {

        //nếu mã là code / mobile => nếu tồn tại gán lại bằng mobile
        $members->set('referral_by', $referral_by);
        $dParent = $members->get_by_referral();
        if (isset($dParent['user_id'])) {
            $referral_by = $dParent['code'] != '' ? $dParent['code'] : $dParent['mobile'];
            $shop_id  = $dParent['shop_id'];
        } else {
            //nếu mã giới thiệu là user_id => chuyển lại mã id
            $members->set('user_id', $referral_by); //Kiểm tra theo user_id
            $dParentByID = $members->get_detail();
            if (isset($dParentByID['user_id'])) {
                $referral_by = $dParentByID['code'] != '' ? $dParentByID['code'] : $dParentByID['mobile'];
                $shop_id  = $dParentByID['shop_id'];
            }
        }

        if ($referral_by != '' && !isset($dParent['user_id']) && !isset($dParentByID['user_id'])) {
            echo 'done##', $main->toJsonData(403, 'Mã giới thiệu không tồn tại.', null);
        } else {

            if ($referral_by == '') {
                $referral_by = isset($setup['default_referral_by']) ? $setup['default_referral_by'] : '';
            }

            $members->set('user_id', '');
            $members->set('avatar', '');
            $members->set('is_wholesale_customer', 0);
            $members->set('password', $password);
            $members->set('fullname', $fullname);
            $members->set('mobile', $mobile);

            $members->set('code', '');
            $members->set('referral_by', $referral_by);
            $members->set('pkd', '');

            $members->set('bank_name', '');
            $members->set('bank_account', '');
            $members->set('bank_fullname', '');
            $members->set('bank_branch', '');
            $members->set('bank_city', '');

            $members->set('member_department_id', isset($setup['default_member_department_id']) && $setup['default_member_department_id'] != '' ? $setup['default_member_department_id'] : 0);
            $members->set('cum', '');
            $members->set('kvkd', '');
            $members->set('gdkd', '');
            $members->set('chinhanh', '');

            $members->set('day', '');
            $members->set('month', '');
            $members->set('year', '');

            $members->set('city', '');
            $members->set('district', '');
            $members->set('ward', '');
            // $members->set('address', $address);
            // $members->set('direct_referral', $direct_referral);
            // $members->set('npp_referral', $npp_referral);

            $members->set('member_group_id', isset($setup['member_group_trial']) && $setup['member_group_trial'] != '' ? $setup['member_group_trial'] : 0);
            $members->set('total_spent', 0);
            $members->set('point', 0);
            $members->set('tax', 0);
            $members->set('email', $email);
            $members->set('facebook', '');
            $members->set('note', '');
            $members->set('by_user_cs', isset($setup['default_by_user_cs']) && $setup['default_by_user_cs'] != '' ? $setup['default_by_user_cs'] : 0);
            $members->set('shop_id', $shop_id);

            $members->set('mobile', $mobile);
            $dClientMobile = $members->get_by_mobile();

            $members->set('email', $email);
            $dClientEmail = $members->get_by_email();

            if (isset($dClientMobile['user_id']) || isset($dClientEmail['user_id'])) {

                if ($dClientMobile['activate'] == 1 && $dClientMobile['last_logged'] > 0) {
                    $dMember = 'Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác.';
                } else if ($dClientMobile['activate'] == 0 && $dClientMobile['last_logged'] > 0) {
                    // echo 'done##', $main->toJsonData(403, 'Số điện thoại này đã bị vô hiệu.', null);
                    $dMember = 'Số điện thoại này đã bị vô hiệu.';
                } else if ($dClientEmail['activate'] == 0 && $dClientEmail['last_logged'] > 0) {
                    // echo 'done##', $main->toJsonData(403, 'Email này đã bị vô hiệu.', null);
                    $dMember = 'Email này đã bị vô hiệu.';
                } else if (($dClientMobile['user_id']) != '') {
                    // echo 'done##', $main->toJsonData(403, 'Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác.', null);
                    $dMember = 'Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác.';
                } else if (($dClientEmail['user_id']) != '') {
                    // echo 'done##', $main->toJsonData(403, 'Email đã tồn tại, vui lòng chọn email khác.', null);
                    $dMember = 'Email đã tồn tại, vui lòng chọn email khác.';
                } else {
                    // echo 'done##', $main->toJsonData(403, 'Đã xảy ra lỗi.', null);
                    $dMember = 'Đã xảy ra lỗi.';
                }
            } else {

                $members->set('cmnd', ''); //
                $members->set('sex', 0); //
                $members->set('city_id', 0); //
                $members->set('district_id', 0); //
                $members->set('ward_id', 0); //

                $members->set('user_id', '');
                $members->set('created_by', 'Tự đăng ký');
                $members->set('is_local_created', 0);
                $user_id = $members->add();

                //cập nhật session_token cho user
                $members->set('user_id', $user_id);
                $members->set('session_token', md5(time() . $user_id . rand(1000, 100000)));
                $members->update_session_token();
                $members->update_activate();

                $dMember = $members->get_detail();


                //Khởi tạo trả dữ liệu
                // unset($dMember['salt']);
                // $dMember['password'] = $dMember['password'] != '' ? true : false;
                // $from   = strtotime(date('m/01/Y'));
                // $to     = time() + 86400;
                // $members->set('user_id', $dMember['user_id']);
                // $dMember = $members->render_detail_info( $dMember, $from, $to );


                // if ( isset($dMember['user_id']) ) { //kiểm tra có user_id để tạo gửi tin nhắn không

                //     $mailer         =   new mailer();
                //     $content_sms    =   $mailer->template_register($dMember, $password);
                //     $mailer->sendMailCustom($dMember['email'], $content_sms, 'Đăng ký tài khoản thành công', $dMember['fullname'], $setup, false);

                //     echo $main->toJsonData(200, 'success', $dMember);

                // } else {
                //     echo $main->toJsonData(403, 'Đăng ký thông tin thành công. Nhưng không thể khởi tạo dữ liệu đăng nhập!', null);
                // }
            }
        }
    }
    return $dMember;
}

//Thêm địa chỉ mới
function register_location($user_id, $fullname, $mobile, $ship_email, $city_id, $district_id, $ward_id, $ship_street)
{
    global $main;

    $address_book       = new address_book();
    $eco_city           = new eco_city();
    $eco_district       = new eco_district();
    $eco_ward           = new eco_ward();

    $fullname           = $fullname;
    $mobile             = $mobile;
    $email             = $ship_email;
    $ship_street        = $ship_street;
    $is_default         = 0;

    $eco_city->set('id_city', $city_id);
    $city = $eco_city->get_name();
    $eco_district->set('id_district', $district_id);
    $district = $eco_district->get_name();
    $eco_ward->set('id_ward', $ward_id);
    $ward = $eco_ward->get_name();

    // if ($city_id == 0 || $city == '') {
    //     $location = 'Không xác định được Tỉnh/ Thành';
    // } else if ($district_id == 0 || $district == '') {
    //     $location = 'Không xác định được Quận/ Huyện';
    // } else if ($ward_id == 0 || $ward == '') {
    //     $location = 'Không xác định được Phường/ Xã';
    // } else {

    $address_book->set('client_id', $user_id);
    $l = $address_book->filter();

    $address_book->set('is_default', COUNT($l) > 0 ? $is_default : 1);
    unset($l);

    $address_book->set('city_id', $city_id);
    $address_book->set('district_id', $district_id);
    $address_book->set('ward_id', $ward_id);

    $address_book->set('city', $city);
    $address_book->set('district', $district);
    $address_book->set('ward', $ward);
    $address_book->set('address', $ship_street);
    $address_book->set('country', 'Việt Nam');

    $address_book->set('fullname', $fullname);
    $address_book->set('mobile', $mobile);
    $address_book->set('email', $email);

    $location = $address_book->add();

    // }
    return $location;
}
