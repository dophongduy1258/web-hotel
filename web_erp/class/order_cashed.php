<?php

class order_cashed extends model{
 
    protected $shop_id;
    protected $order_id;
    protected $created_at;
    protected $no_items;
    protected $dOrder;
    protected $dDOrder;
    protected $dUserLogin;
    protected $is_storing;
    protected $payment_type;
    protected $is_create_treasurer;
    protected $treasurer_group_id_xuat;
    protected $treasurer_group_id_thu;
    
    public function execute_cashed( &$message, &$total_coffers, &$tong_tien, &$liabilities_id, $lGeneralPayment = '' ){
        global $collected_orders, $detail_order, $order, $members, $template, $treasurer, $lang, $setup, $shop, $user;
        $mTrans = new member_transaction();

        $shop_id                = $this->get('shop_id');
        $order_id               = $this->get('order_id');
        $created_at             = $this->get('created_at');
        $no_items               = $this->get('no_items');
        $dOrder                 = $this->get('dOrder');
        $dDOrder                = $this->get('dDOrder');
        $dUserLogin             = $this->get('dUserLogin');
        $is_storing             = $this->get('is_storing');
        $payment_type           = $this->get('payment_type');
        $hold_date              = $this->get('hold_date');
        $is_create_treasurer    = $this->get('is_create_treasurer');
        $treasurer_group_id_xuat = $this->get('treasurer_group_id_xuat');
        $treasurer_group_id_thu  = $this->get('treasurer_group_id_thu');

        //Block 1: kiểm tra số lượng trong order nếu = true tất cả các sản phẩm trong kho đều có đủ để xuất
        $enought = true;
        $position = null;
        for( $i = 0; $i < $no_items; $i++ ){
            if( $enought ){
                if( $dDOrder[$i]['on_stock'] < $dDOrder[$i]['quantity'] ){
                    $enought = false;//Không còn đủ hàng trong kho
                    $position = $i;//Sản phẩm không đủ hàng nằm ở position
                    break;
                }
            }
        }
        
        // if( false && $enought ){
        //     //kiểm tra để biết xem hàng trong kho có cần tách dòng giao thoa không = true: đủ hàng ko quan tâm thiếu đủ
            
        //     $dDOrder = $detail_order->listby_order_widthSKU( $shop_id, $order_id, $created_at );
            
        //     //Có đủ sản phẩm thực hiện tách các dòng giao thoa mà zeroSell không cần quan tâm
        //     $result 		= true;
        //     $total_items 	= 0;
        //     for( $i = 0; $i < COUNT($dDOrder) && $result; $i++ ){
        //         $order_item = $dDOrder[$i];
        //         if( $order_item['quantity'] > 0 ){
        //             $total_items += $order_item['quantity'];
        //         }
        //         $result = $template->interfering_withOut_zeroSell( $shop_id, $order_item, $dUserLogin['username'], $created_at );
        //     }

        //     if( !$result ){
        //         $message = $lang['lb_erEmptyInStock'];
        //         return false;
        //     }else{

        //         // if( $dOrder['id_customer'] > 0 || $payment_type == '0' )
        //         $tong_tien = $detail_order->get_sum_order( $shop_id, $order_id, $created_at );

        //         //chỉ tính khi tính tiền ở POS
        //         $total_coffers = $dUserLogin['total_coffers'];
        //         if( $is_storing == 0 ){
        //             if( $payment_type == '0' ){

        //                 $tien_coffers = $tong_tien;
        //                 // if( $dOrder['liabilities_is'] == '1' && $dOrder['liabilities_paid'] > 0 ){
        //                 //     //Công nợ có trả trước: coffer chỉ cộng thêm phần trả trước bằng tiền mặt
        //                 //     $tien_coffers = $dOrder['liabilities_paid'];
        //                 // }

        //                 if( $dUserLogin['total_coffers'] < 90000000 ){ //90mil
        //                     $user->plus_total_coffer( $dUserLogin['username'] , $tien_coffers );
        //                     $total_coffers = $dUserLogin['total_coffers'] + $tien_coffers;
        //                 }else{
        //                     $user->update_total_coffer( $dUserLogin['username'] , $tien_coffers);
        //                     $total_coffers = $tien_coffers;
        //                 }
        //                 unset( $tien_coffers );
        //             }

        //         }
                
        //         if( $dOrder['id_customer'] > 0 ){
        //             /*
        //             - Thêm spent vào members
        //             - Tích điểm theo cơ chế định sẵn
        //             - Thêm vào member_transaction
        //             */
        //             if( $setup['loyalty_status'] == 1 ){
        //                 if( $tong_tien > 0 && $setup['loyalty_convert'] > 0 )
        //                     $extra_point = floor(@$tong_tien/$setup['loyalty_convert']);
        //                 else
        //                     $extra_point = 0;
        //             }else{
        //                 $extra_point = 0;
        //             }
                    
        //             //update spent total
        //             $members->set('user_id', $dOrder['id_customer']);
        //             $members->set('total_spent', $tong_tien);
        //             $members->set('point', $extra_point);
        //             $members->update_spent_and_point();
                    
        //             //thêm transaction
        //             $dShop = $shop->get_detail( $dOrder['shop_id'] );
        //             $mTrans->set('user_id', $dOrder['id_customer']);
        //             $mTrans->set('point', $extra_point );//tích điểm và cập nhật điểm
        //             $mTrans->set('spent', $tong_tien);
        //             $mTrans->set('shop_name', $dShop['name']);
        //             $mTrans->set('shop_id', $dOrder['shop_id']);
        //             $mTrans->set('order_id', $dOrder['id'] );
        //             $mTrans->add_update();
        //             unset( $dShop );

        //         }
                
        //         $collected_orders->set( 'sum', $tong_tien);
        //         $collected_orders->set( 'payment_type', $payment_type );
        //         $collected_orders->set( 'created_at',  $dOrder['order_type'] == 1 ? $dOrder['created_at']:time() );//Ngày tạo đới với đơn hàng kho thì giữ nguyên created_at
        //         $collected_orders->set( 'order_id', $dOrder['id']);
        //         $collected_orders->set( 'total_paid', $dOrder['total_paid'] );
        //         $collected_orders->set( 'shop_id', $dOrder['shop_id'] );
        //         $collected_orders->set( 'created_by', $dUserLogin['username']);
        //         $collected_orders->set( 'members_id', $dOrder['id_customer']);
        //         $collected_orders->set( 'members_name', $dOrder['name_customer']);
        //         $collected_orders->set( 'members_mobile', $dOrder['mobile_customer']);
        //         $collected_orders->set( 'is_booking', 0);//
        //         $collected_orders->set( 'is_returned_order', 0);//
        //         $collected_orders->set( 'nvkd_id', 0);//
        //         $collected_orders->set( 'nvkd_commission', 0);//
        //         $collected_orders->set( 'order_type', $dOrder['order_type']);//
        //         $collected_orders->set( 'created_by_client_id', $dOrder['created_by_client_id']);//
        //         $collected_orders->set( 'is_internal', $dOrder['is_internal']);//
        //         $collected_orders->set( 'export_for_wh_id', $dOrder['export_for_wh_id']);//
        //         $collected_orders->add( $lGeneralPayment );

        //         $treasurer_so_tien = $tong_tien;
        //         if( $dOrder['created_from_order'] != '' && $dOrder['created_from_order_at'] > 0  ){

        //             $dOrderBooking = $order->get_detail( $dOrder['shop_id'], $dOrder['created_from_order'], $dOrder['created_from_order_at'] );
        //             $left_total_paid = 0;
        //             if( isset($dOrderBooking['id']) && $dOrderBooking['total_paid'] > 0 ){
        //                 //Tổng tiền tiền các order con
        //                 $total_paid_sub_orders = $detail_order->get_sum_order_sub_orders( $dOrder['shop_id'], $dOrderBooking['sub_orders'] );
        //                 if( $total_paid_sub_orders < $dOrderBooking['total_paid'] ){
        //                     $left_total_paid = $dOrderBooking['total_paid'] - $total_paid_sub_orders;//Số tiền đã trả ít hơn tổng tiền của order rồi; chỗ này cần phải thu thêm tiền mặt
        //                     $treasurer_so_tien = $tong_tien - $left_total_paid;//Tổng tiền ghi nhận vào treasurer là tiền thu thêm sau khi trừ số tiền cọc trước đó
        //                 }
        //             }
        //             //toi co total_paid của order này
        //             //Tôi có tổng trả của order tổng
        //             //Tôi cần tính số tiền mặt phải thu thêm
        //         }
                
        //         if( ($treasurer_so_tien > 0 && $is_storing == 0 ) || ( $is_storing == 1 && $is_create_treasurer == 1 ) ){

        //             //thêm record thu tiền bán hàng
        //             $treasurer->set('loai', 'T');
        //             $treasurer->set('shop_id', $dOrder['shop_id'] );
        //             $treasurer->set('MATT', $dOrder['id']);
        //             $treasurer->set('nguoi_tao', $dUserLogin['username'] );
        //             $treasurer->set('so_tien', abs($treasurer_so_tien) );

        //             $nop_nhan = $dOrder['name_customer'];
        //             $customer_id = $dOrder['id_customer'];
        //             if( $dOrder['is_internal'] == '1' ){
        //                 $nop_nhan = $shop->get_shop_name( $dOrder['export_for_wh_id'] ).'';
        //                 $customer_id = $dOrder['export_for_wh_id'];
        //             }

        //             $treasurer->set('customer_id', $customer_id );
        //             $treasurer->set('nop_nhan', $nop_nhan );//customer_name = members_name
        //             $treasurer->set('hinh_thuc', $payment_type);//payment_type = hinh_thu => hình thức thanh toán

        //             if( $is_storing == 1 && $is_create_treasurer == 1 ){

        //                 $treasurer->set('chung_tu', $dOrder['url_chung_tu']);
        //                 $treasurer_id = $treasurer->add_storing_export();//them thu chi record xuất hàng
                        
        //                 $order->set( 'treasurer_id', $treasurer_id );
        //                 $order->update_field( $dOrder['shop_id'], $dOrder['id'], $dOrder['created_at'] );//update trạng thái của phiếu từ đang status =0 sang 1 và các thông tin liên quan;
                        
        //             }else{

        //                 if( $payment_type == 1 ){
        //                     $treasurer->set('hinh_thuc', 0);//payment_type = hinh_thuc => hình thức thanh toán
        //                     $treasurer->set('so_tien', $dOrder['total_paid']);
        //                 }

        //                 if(  $payment_type != 1 || $dOrder['total_paid'] > 0 ){//Không phải công nợ hoặc là công nợ và total_paid > 0 
        //                     $treasurer_id = $treasurer->add_selling();//them thu chi record ban hang
        //                 }

        //             }

        //         }
                
        //         if( $payment_type == 1 ){

        //             $liabilities = new liabilities();
        //             //Công nợ=> tạo công nợ record
        //             //next date to pay
        //             $next_pay = strtotime(date('m/d/Y')) + $hold_date*86400;
                    
        //             $members->set('id', $dOrder['id_customer']);
        //             $dMembers = $members->get_detail();//detail customer
                    
        //             //first is creating liabilities
        //             $liabilities->set('customer_id', $dMembers['user_id']);
        //             $liabilities->set('customer_name', $dMembers['fullname']);
        //             $liabilities->set('customer_mobile', $dMembers['mobile']);
        //             $liabilities->set('customer_city', $dMembers['address'].', '.$dMembers['ward'].', '.$dMembers['district'].', '.$dMembers['city'] );
        //             unset($dMembers);
                    
        //             $liabilities->set('total', $tong_tien - $dOrder['total_paid'] );
        //             $liabilities->set('total_paid', 0);
        //             $liabilities->set('next_pay', $next_pay);//thời gian tiếp đến để lấy công nợ khách hàng này dạng time LINUX
        //             $liabilities->set('updated_by', $dUserLogin['fullname']);
        //             $liabilities->set('username', $dUserLogin['username']);
        //             $liabilities->set('shop_id', $dOrder['shop_id'] );
                    
        //             $dShop = $shop->get_detail( $dOrder['shop_id'] );
        //             $liabilities->set('shop_name', $dShop['name']);
        //             unset($dShop);

        //             $liabilities->set('type', 'KH');//type is KH (other is CC = supplier)
        //             $liabilities->set('receipt', '');
        //             $liabilities->set('order_id', $dOrder['id']);
        //             $liabilities->set('order_created_at', time());
        //             $liabilities->set('is_from_warehouse', $is_storing == 1 ? 1:0);
        //             $liabilities->set('hold_date', $hold_date);//Mỗi một khoản thời gian là con số này, ví dụ công nợ 7 ngày thì liabilities_time = 7
        //             $liabilities_id = $liabilities->add();

        //             $order->set('liabilities_id', $liabilities_id );
        //             $order->set('hold_date', $hold_date );
        //             $order->set('treasurer', $dUserLogin['username'] );
        //             $order->liabilities_order_user_local( $dOrder['shop_id'], $dOrder['id'] , $dOrder['created_at'] );

        //         }
                
        //         //Begin: Trả về kết quả xong order
        //         $order->set('shop_id', $shop_id );
        //         $order->set('user_add', $dUserLogin['username'] );
        //         $order->set('id', $order_id );
        //         $order->set('created_at', $created_at );
        //         $order->set('payment_type', $payment_type );
        //         $order->set('created_from_order', $dOrder['created_from_order'] );
        //         $order->set('created_from_order_at', $dOrder['created_from_order_at'] );
        //         if( $is_storing == 1 ){
        //             $order->update_finished_storing();
        //         }else{
        //             $order->update_finished();
        //         }
        //         unset($dOrder);
        //         unset($order);
        //         $order = new order();


        //         $message = 'success';
        //         return true;
        //     }

        // }else{
            //Không đủ sản phẩm -> Thông báo sản phẩm này không đủ và còn bao nhiều
            if( $setup['allow_zero_sell'] == 0 ){
                $message = $lang['lb_itemsExist'].' '.$dDOrder[$position]['on_stock'].' '.$lang['lb_items'].' <b>'.$dDOrder[$position]['name'].'</b>';
                return false;
            }else{

                $dDOrder = $detail_order->listby_order_widthSKU( $shop_id, $order_id, $created_at );

                //van thuc hien tru binh thuong va cai nao khong du thi thuc hien tru am
                //Có đủ sản phẩm thực hiện tách các dòng giao thoa cho phép thực hiện zeroSell
                $total_items = 0;
                for( $i = 0; $i < COUNT($dDOrder); $i++ ){
                    $order_item = $dDOrder[$i];

                    if( $order_item['pro_type'].'' == '0' ){//Không phải là sản phẩm dịch vụ/ voucher mới thực hiện trừ kho                        
                        if( $order_item['quantity'] > 0 ){
                            $total_items += $order_item['quantity'];
                        }
                        $template->interfering_zeroSell( $shop_id, $order_item, $dUserLogin['username'], $created_at);
                    }

                }

                // if( $dOrder['id_customer'] > 0 || $payment_type == '0' )
                $tong_tien = $detail_order->get_sum_order( $shop_id, $order_id, $created_at );

                $total_coffers = $dUserLogin['total_coffers'];
                if( $is_storing == 0 ){
                    if( $payment_type == '0' ){
                        $tien_coffers = $tong_tien;
                        // if( $dOrder['liabilities_is'] == '1' && $dOrder['liabilities_paid'] > 0 ){
                        //     //Công nợ có trả trước: coffer chỉ cộng thêm phần trả trước bằng tiền mặt
                        //     $tien_coffers = $dOrder['liabilities_paid'];
                        // }
                        if( $dUserLogin['total_coffers'] < 90000000 ){ //90mil
                            $user->plus_total_coffer( $dUserLogin['username'] , $tien_coffers );
                            $total_coffers = $dUserLogin['total_coffers'] + $tien_coffers;
                        }else{
                            $user->update_total_coffer( $dUserLogin['username'] , $tien_coffers);
                            $total_coffers = $tien_coffers;
                        }
                        unset( $tien_coffers );
                    }
                }
                
                if( $dOrder['id_customer'] > 0 ){
                    /*
                    - Thêm spent vào members
                    - Tích điểm theo cơ chế định sẵn
                    - Thêm vào member_transaction
                    */
                    if( $setup['loyalty_status'] == 1 ){
                        if( $tong_tien > 0 )
                            $extra_point = floor(@$tong_tien/$setup['loyalty_convert']);
                        else
                            $extra_point = 0;
                    }else{
                        $extra_point = 0;
                    }
                    
                    //update spent total
                    $members->set('user_id', $dOrder['id_customer']);
                    $members->set('total_spent', $tong_tien);
                    $members->set('point', $extra_point);
                    $members->update_spent_and_point();
                    
                    //thêm transaction
                    $dShop = $shop->get_detail( $dOrder['shop_id'] );
                    $mTrans->set('user_id', $dOrder['id_customer']);
                    $mTrans->set('point', $extra_point );//tích điểm và cập nhật điểm
                    $mTrans->set('spent', $tong_tien);
                    $mTrans->set('shop_name', $dShop['name']);
                    $mTrans->set('shop_id', $dOrder['shop_id']);
                    $mTrans->set('order_id', $dOrder['id'] );
                    $mTrans->add_update();

                }
                
                $collected_orders->set( 'sum', $tong_tien);
                $collected_orders->set( 'payment_type', $payment_type );
                $collected_orders->set( 'created_at',  $dOrder['order_type'] == 1 ? $dOrder['created_at']:time() );//Ngày tạo đới với đơn hàng kho thì giữ nguyên created_at
                $collected_orders->set( 'order_id', $dOrder['id']);
                $collected_orders->set( 'total_paid', $dOrder['total_paid'] );
                $collected_orders->set( 'shop_id', $dOrder['shop_id'] );
                $collected_orders->set( 'created_by', $dUserLogin['username']);
                $collected_orders->set( 'members_id', $dOrder['id_customer']);
                $collected_orders->set( 'members_name', $dOrder['name_customer']);
                $collected_orders->set( 'members_mobile', $dOrder['mobile_customer']);
                $collected_orders->set( 'is_official_member', $dOrder['is_official_customer']);
                $collected_orders->set( 'is_booking', 0);//
                $collected_orders->set( 'is_returned_order', 0);//
                $collected_orders->set( 'nvkd_id', 0);//
                $collected_orders->set( 'status', 1);//
                $collected_orders->set( 'nvkd_commission', 0);//
                $collected_orders->set( 'order_type', $dOrder['order_type']);//
                $collected_orders->set( 'created_by_client_id', $dOrder['created_by_client_id']);//
                $collected_orders->set( 'is_internal', $dOrder['is_internal']);//
                $collected_orders->set( 'export_for_wh_id', $dOrder['export_for_wh_id']);//
                $collected_orders->add( $lGeneralPayment );

                $treasurer_so_tien = $tong_tien;
                if( $dOrder['created_from_order'] != '' && $dOrder['created_from_order_at'] > 0  ){

                    $dOrderBooking = $order->get_detail( $dOrder['shop_id'], $dOrder['created_from_order'], $dOrder['created_from_order_at'] );
                    $left_total_paid = 0;
                    if( isset($dOrderBooking['id']) && $dOrderBooking['total_paid'] > 0 ){
                        //Tổng tiền các order con
                        $total_paid_sub_orders = $detail_order->get_sum_order_sub_orders( $dOrder['shop_id'], $dOrderBooking['sub_orders'] );
                        if( $total_paid_sub_orders < $dOrderBooking['total_paid'] ){
                            $left_total_paid = $dOrderBooking['total_paid'] - $total_paid_sub_orders;//Số tiền đã trả ít hơn tổng tiền của order rồi; chỗ này cần phải thu thêm tiền mặt
                            $treasurer_so_tien = $tong_tien - $left_total_paid;//Tổng tiền ghi nhận vào treasurer là tiền thu thêm sau khi trừ số tiền cọc trước đó
                        }
                    }
                    //toi co total_paid của order này
                    //Tôi có tổng trả của order tổng
                    //Tôi cần tính số tiền mặt phải thu thêm
                }

                if( ($treasurer_so_tien > 0 && $is_storing == 0 ) || ( $is_storing == 1 && $is_create_treasurer == 1 ) ){

                    //thêm record thu tiền bán hàng
                    $treasurer->set('loai', 'T');
                    $treasurer->set('shop_id', $dOrder['shop_id'] );
                    $treasurer->set('MATT', $dOrder['id']);
                    $treasurer->set('nguoi_tao', $dUserLogin['username'] );
                    $treasurer->set('so_tien', abs($treasurer_so_tien) );

                    $nop_nhan = $dOrder['name_customer'];
                    $customer_id = $dOrder['id_customer'];
                    if( $dOrder['is_internal'] == '1' ){
                        $nop_nhan = $shop->get_shop_name( $dOrder['export_for_wh_id'] ).'';
                        $customer_id = $dOrder['export_for_wh_id'];
                    }

                    $treasurer->set('customer_id', $customer_id );
                    $treasurer->set('treasurer_group_id', $treasurer_group_id_thu );
                    $treasurer->set('nop_nhan', $nop_nhan );//customer_name = members_name
                    $treasurer->set('hinh_thuc', $payment_type);//payment_type = hinh_thu => hình thức thanh toán

                    if( $is_storing == 1 && $is_create_treasurer == 1 && $payment_type != 1){//chi tạo khi không phải là công nợ
                        //Đơn xuất hàng nội bộ

                        // $treasurer->set('chung_tu', $dOrder['url_chung_tu']);
                        // $treasurer_id = $treasurer->add_storing_export();//them thu chi record xuất hàng
                        
                        // $order->set( 'treasurer_id', $treasurer_id );
                        // $order->update_field( $dOrder['shop_id'], $dOrder['id'], $dOrder['created_at'] );//update trạng thái của phiếu từ đang status =0 sang 1 và các thông tin liên quan;
                        
                    }else if( $is_storing == 0  ) {//Bán hàng ở POS

                        if( $payment_type == 1 ){
                            $treasurer->set('hinh_thuc', 0);//payment_type = hinh_thuc => hình thức thanh toán
                            $treasurer->set('so_tien', $dOrder['total_paid']);
                        }
                        
                        if(  $payment_type != 1 || $dOrder['total_paid'] > 0 ){//Không phải công nợ hoặc là công nợ và total_paid > 0 
                            $treasurer_id = $treasurer->add_selling();//them thu chi record ban hang
                        }

                    }

                }

                if( $payment_type == 1 ){
                    $liabilities = new liabilities();
                    //Công nợ=> tạo công nợ record
                    //next date to pay
                    $next_pay = strtotime(date('m/d/Y')) + $hold_date*86400;
                    
                    $members->set('id', $dOrder['id_customer']);
                    $dMembers = $members->get_detail();//detail customer
                    
                    //first is creating liabilities
                    $liabilities->set('customer_id', $dMembers['user_id']);
                    $liabilities->set('customer_name', $dMembers['fullname']);
                    $liabilities->set('customer_mobile', $dMembers['mobile']);
                    $liabilities->set('customer_city', $dMembers['address'].', '.$dMembers['ward'].', '.$dMembers['district'].', '.$dMembers['city'] );
                    unset($dMembers);
                    
                    $liabilities->set('total', $tong_tien - $dOrder['total_paid'] );
                    $liabilities->set('total_paid', 0);
                    $liabilities->set('next_pay', $next_pay);//thời gian tiếp đến để lấy công nợ khách hàng này dạng time LINUX
                    $liabilities->set('updated_by', $dUserLogin['fullname']);
                    $liabilities->set('username', $dUserLogin['username']);
                    $liabilities->set('shop_id', $dOrder['shop_id'] );
                    $dShop = $shop->get_detail( $dOrder['shop_id'] );
                    $liabilities->set('shop_name', $dShop['name']);
                    unset($dShop);

                    $liabilities->set('type', 'KH');//type is KH (other is CC = supplier)
                    $liabilities->set('receipt', '');
                    $liabilities->set('order_id', $dOrder['id']);
                    $liabilities->set('order_created_at', time());
                    $liabilities->set('is_from_warehouse', $is_storing == 1? 1:0);//kho là bằng 1;
                    $liabilities->set('hold_date', $hold_date);//Mỗi một khoản thời gian là con số này, ví dụ công nợ 7 ngày thì liabilities_time = 7
                    $liabilities_id = $liabilities->add();

                    $order->set('liabilities_id', $liabilities_id );
                    $order->set('hold_date', $hold_date );
                    $order->set('treasurer', $dUserLogin['username'] );
                    $order->liabilities_order_user_local( $dOrder['shop_id'], $dOrder['id'] , $dOrder['created_at'] );
                    
                }
                
                //Begin: Trả về kết quả xong order
                $order->set('shop_id', $shop_id );
                $order->set('user_add', $dUserLogin['username'] );
                $order->set('id', $order_id );
                $order->set('created_at', $created_at );
                $order->set('payment_type', $payment_type );
                $order->set('treasurer_group_id', $treasurer_group_id_xuat );
                $order->set('treasurer_id', $treasurer_group_id_thu );
                $order->set('created_from_order', $dOrder['created_from_order'] );
                $order->set('created_from_order_at', $dOrder['created_from_order_at'] );
                if( $is_storing == 1 ){
                    $order->update_finished_storing();
                }else{
                    $order->update_finished();
                }
                unset($dOrder);
                unset($order);
                $order = new order();

                $message = 'success';
                return true;

               
            }
        // }
        
                    
    }
}