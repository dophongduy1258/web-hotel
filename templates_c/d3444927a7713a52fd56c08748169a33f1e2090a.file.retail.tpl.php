<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 14:26:28
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/main/retail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12147001610ed4b3ad4ed2-63153151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3444927a7713a52fd56c08748169a33f1e2090a' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/main/retail.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12147001610ed4b3ad4ed2-63153151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ed4b3ca7e30_00483604',
  'variables' => 
  array (
    'shop_name' => 0,
    'link' => 0,
    'lang' => 0,
    'no_noti' => 0,
    'session' => 0,
    'shop_id' => 0,
    'total_coffers' => 0,
    'decimal' => 0,
    'str_permission' => 0,
    'domain' => 0,
    'is_wholesale_price' => 0,
    'setup' => 0,
    'lTreasurerGroupThu' => 0,
    'item' => 0,
    'lTreasurerGroupXuat' => 0,
    'listPayment' => 0,
    'opt_period' => 0,
    'sit' => 0,
    'opt_member_group' => 0,
    'opt_member_department' => 0,
    'opt_year' => 0,
    'opt_manage' => 0,
    'foo' => 0,
    'opt_users' => 0,
    'treasurer_group_id' => 0,
    'treasurer_id' => 0,
    'version' => 0,
    'is_cloud_printer' => 0,
    'show_btn_print_hide_price' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ed4b3ca7e30_00483604')) {function content_610ed4b3ca7e30_00483604($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><!--Start - Home - Mr Tân -->
<div style="padding: 0px 5px;">
    <div class="row bg-gray color-white font-size-15">
        <div class="col-lg-1 col-md-12 col-sm-12 mcol-sm-12 hidden-md hidden-sm hidden-xs">
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 text-right">
            <div class="col-sm-4 col-xs-6 text-left">
                <i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>

            </div>
            <div class="col-sm-8 col-xs-6 hd-info-head">
                <div class="mp-head">
                    <a class="color-white cursor-pointer" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/logout.php"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_logout'];?>

                        <!-- Thoát -->
                    </a>
                    <i class="glyphicon glyphicon-off font-size-13"></i>
                </div>
                <div class="mp-head">
                    <span onclick="click_noti()" class="notification" id="holder_noti"><?php echo $_smarty_tpl->tpl_vars['no_noti']->value;?>
</span>
                </div>
                <div class="mp-head hidden-xs">
                    <?php echo smarty_modifier_date_format(time(),"H:i");?>

                </div>
                <div class="mp-head hidden-xs">
                    <?php echo smarty_modifier_date_format(time(),"d/m/Y");?>

                </div>
                <div class="mp-head Foo hidden-xs">
                    <?php if (isset($_smarty_tpl->tpl_vars['session']->value['fullname'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['session']->value['username'];?>
<?php }?>
                    <input class="hidden" hidden id="shop_id" value="<?php echo $_smarty_tpl->tpl_vars['shop_id']->value;?>
" />
                    <input class="hidden" hidden id="order_id" value="" />
                    <input class="hidden" hidden id="created_at" value="" />
                    <input class="hidden" hidden id="product_id" value="" />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 head-search-main">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-3 nopadding-l">
                    <div class="btn-group" role="group">
                        <a class="menu-home badge" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=index">
                            <span class="icon-cate icon-other-home"></span>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                            style="font-size: 24px;color: #0090da;cursor: pointer;padding: 0px 7px 0px 7px;position: relative;top: 1px;">
                            <span class="fa fa-list-ul"></span>
                        </a>
                        <ul class="dropdown-menu main_menu_index" role="menu">
                            <li class="hd-coffers">
                                <span id="hd-total-coffers"><?php echo number_format($_smarty_tpl->tpl_vars['total_coffers']->value,$_smarty_tpl->tpl_vars['decimal']->value,'.',',');?>
</span>
                                <button onclick="reset_coffer();" class="btn btn-default input-sm">Reset</button>
                            </li>
                            <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=index"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_setting'];?>

                                    <!-- Nâng cao -->
                                </a></li>
                            
                            
                            <li class="hide"><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_main_addbalance'];?>
</a></li>
                            
                                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':script_reportm_load_report:'))) {?>
                                    <li><a data-toggle="modal" onclick="xem_bao_cao();" data-target="#modal_bao_cao"
                                            href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_salereport'];?>

                                            <!-- Báo cáo -->
                                        </a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainexport_report:'))) {?>
                                    <li><a id="ex_modal" href="javascript:;">Báo cáo chi tiết</a></li>
                                    <li><a id="ex_order_sum_modal" href="javascript:;">Báo cáo tổng hợp</a></li>
                                    <li><a id="" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=report&act=product_debt" target="_blank">Báo cáo hàng nợ</a></li>
                                <?php }?>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-xs-7">
                        <div class="form-search form-search1111">
                            <input id="txt_mobile" name_customer="" id_customer="" mobile_customer="" type="text" name=""
                                placeholder="Số điện thoại/ Email">
                            <button class="hide"><span class="icon-cate icon-other-search1"></span></button>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" class="search_code" width="30">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span id="btn_modify_customer" class="icon-home1"><img id="icon_modify_customer"
                                src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_client.png" width="24"></span>
                        <div id="choosen_customer" class="TAN_add_customer">
                            <div class="img"><img id="choosen_customer_img" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_joined.png" alt=""
                                    width="50"></div>
                            <div class="name">
                                <span id="choosen_customer_name_customer">Nguyễn Thành Tân</span>
                                <span id="choosen_customer_mobile_customer">0900 000 000 | tanntxxx@gmail.com</span>
                                <p class="text-right">
                                    <span id="choosen_customer_btn_edit">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/edit_client.png" width="16">
                                    </span>
                                    <span id="choosen_customer_btn_remove">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/remove_client.png" width="20">
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="icon-home1" data-toggle="modal" data-target="#click_note"><img
                                src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/note.png" width="19"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 head-search-main" style="border-right: none;">
                <div class="row">
                    <div class="col-md-11 col-sm-11 col-xs-11">
                        <div class="form-search">
                            <input id="txt_searching" type="text" name="" placeholder="Tên/Mã sản phẩm">
                            <button class="hide"><span class="icon-cate icon-other-search1"></span></button>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" class="search_code" width="30">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <span class="icon-home1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="24"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-home" style="padding: 0px 5px;">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 main-home-left">
                <div class="row search-order" style="padding-top: 0px;margin-top: -6px;">
                    <div class="col-md-2 col-sm-3 col-xs-3">
                        <label class="name">Tìm đơn hàng</label>
                    </div>
                    <div class="col-md-7 col-sm-6 col-xs-6">
                        <div class="form-search">
                            <input id="txt_orderID" type="text" name="" placeholder="Nhập mã đơn hàng">
                            <button class="hide"><span class="icon-cate icon-other-search1"></span></button>
                            <img id="btn_search_order_code" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" class="search_code"
                                width="30">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div id="btn_return" class="text-center btn-success1">
                            <a class="th">Trả hàng</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive scroll-item-table">
                    <table class="table table-bg-no">
                        <thead class="hide">
                            <tr>
                                <th>#</th>
                                <th class="text-left">Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th class="text-right">Thành tiền</th>
                                <th width="5%" class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody id="list_order_detail">

                        </tbody>
                    </table>
                </div>

                
                <ul class="nav nav-tabs tab-order-type">
                    <li class="active"><a id="tab-sell" class="tab-sell-order" data-toggle="tab"
                            href="#tab_content_sell">Bán hàng</a></li>
                    <li><a id="tab-order" data-toggle="tab" class="tab-sell-order" href="#tab_content_order">Đặt hàng</a>
                    </li>
                </ul>
                <div class="content-pr bg-white">
                    <div class="tab-content TAN_tab_news">

                        <div class="table-responsive">
                            <table class="table table-bg-no order-footer" style="margin-bottom: 0px;">
                                <tbody>
                                    <tr class="no">
                                        <td colspan="5">
                                            <div class="input_quantity_sale input_quantity_sale1 text-left">
                                                <div class="ncc_radio hide">
                                                    <label>
                                                        <input <?php if ($_smarty_tpl->tpl_vars['is_wholesale_price']->value==0) {?>checked<?php }?> id="ck_sell_retail"
                                                            name="ncc" checked="" class="ace" type="radio">
                                                        <span class="lbl active"></span>
                                                        Giá lẻ
                                                    </label>
                                                </div>
                                                <div class="ncc_radio hide">
                                                    <label><input <?php if ($_smarty_tpl->tpl_vars['is_wholesale_price']->value!=0) {?>checked<?php }?>
                                                            id="ck_sell_wholesale" name="ncc" class="ace" type="radio">
                                                        <span class="lbl"></span>
                                                        Giá sỉ
                                                    </label>
                                                </div>
                                                <div id="btn_print" class=" btn-success1">
                                                    <a class="">In</a>
                                                </div>
                                                <div id="btn_print_hide_price" class="btn_hide_price btn-success1">
                                                    <a class="">In 1</a>
                                                </div>
                                                <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['jetprint_enabled'])&&$_smarty_tpl->tpl_vars['setup']->value['jetprint_enabled']==1) {?>
                                                    <div id="btn_print_kim" class=" btn-success1">
                                                        <a class="">In kim</a>
                                                    </div>
                                                <?php }?>
                                                <div id="btn_sale" class="btn-success1">
                                                    <div id="popup-sale" class="wrap-input-group discount_bill">
                                                        <i>x</i>
                                                        <p>Giảm giá % tổng đơn</p>
                                                        <div class="wrap-tab-content-price">
                                                            <div class="tab-content-price">
                                                                <div class="tab-pane-percent active">
                                                                    <input id="txt_sale_percent" type="text" value=""
                                                                        placeholder="Vd: 10%" name="">
                                                                </div>
                                                                <div class="tab-pane-price">
                                                                    <input id="txt_sale_price" type="text" value=""
                                                                        placeholder="100,000đ" name="">
                                                                </div>
                                                            </div>
                                                            <ul class="nav">
                                                                <li id="tab_sale_percent" class="nav-percent active">
                                                                    <a>%</a>
                                                                </li>
                                                                <li class="nav-price"><a>$</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a class="span_quantity">Giảm giá bill</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="no">
                                        <td>

                                            <div class="order_news">
                                                <span>Tổng giá lẻ</span>
                                                <span class="pull-right"><span id="label_total_retail"
                                                        class="text-right">0</span></span>
                                            </div>
                                            <div class="order_news">
                                                <span>Tổng chiết khấu</span>
                                                <span class="pull-right"><span id="label_total_discount"
                                                        class="text-right">0</span></span>
                                            </div>

                                            <div class="order_news">
                                                <span><b>Trả trước</b></span>
                                                <span class="pull-right"><input id="total_paid"
                                                        class="number-format text-right" type="text" value="0" /></span>
                                            </div>
                                            <div class="order_news">
                                                <span><b>Còn lại</b></span>
                                                <span class="pull-right"><input id="total_left"
                                                        class="number-format text-right" type="text" value="0" /></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="order_news">
                                                <span><b>Tổng tiền</b></span>
                                                <span class="pull-right"><b id="lb_sum_item">0.00</b></span>
                                            </div>
                                            <div class="order_news">
                                                <span><b>Giảm giá</b></span>
                                                <span class="pull-right"><b id="lb_sum_sale">0</b></span>
                                            </div>
                                            <div class="order_news">
                                                <span><b>Thuế VAT</b></span>
                                                <span class="pull-right"><b id="lb_sum_vat">0.00</b></span>
                                            </div>
                                            <div class="order_news">
                                                <span><b>Phải trả</b></span>
                                                <span class="pull-right"><b style="color:#418bca" id="must_paid"
                                                        class="lb_sum_order">-</b></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="no">
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr id="tab_content_sell" class="tab-pane active last">
                                        <td colspan="5">
                                            <div class="total_bill">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/menu-side.png" class="menu-side-left">
                                                <span class="lb_sum_order">-</span>
                                                <i class="btn_save"
                                                    style="margin: 8px 48px 0px;font-size: 14px;position: absolute;right: 0px;">Lưu
                                                    tạm</i><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/check-ok.png"
                                                    class="menu-check-ok btn_save">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="tab_content_order" class="tab-pane last">
                                        <td colspan="5">
                                            <div class="total_bill">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/menu-side.png" class="menu-side-left">
                                                <span class="create_booking_order">Tạo đơn hàng</span>
                                                <i class="btn_save"
                                                    style="margin: 8px 48px 0px;font-size: 14px;position: absolute;right: 0px;">Lưu
                                                    tạm</i>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/check-ok.png" class="menu-check-ok btn_save">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 main-home-right">
                <div class="hide_menuRight">Thu gọn »</div>
                <div class="show_menuRight"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                <ul class="menu-right scroll-item" id="list_categories">
                    <!--Categories -->
                </ul>
                <div class="TAN_product_main">
                    <div id="list_products" class="scroll-item">
                        <!--LIST ITEM PRODUCTs-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-left">
        <ul>
            <li class="tax">
                <a title="">Thuế</a>
                <div class="wrap-input-group">
                    <i>x</i>
                    <p>Thuế</p>
                    <input id="txt_setting_taxs" class="input-number-touch-decimal text-center" type="text"
                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['taxs'];?>
" name="">
                </div>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainfree:'))===false) {?>
                <li><a id="btn_free" href="javascript:;" title="">Miễn phí</a></li>
            <?php }?>
            <li class="shipping">
                <a title="">Shipping</a>
                <div class="T-shipping">
                    <h4>Thông tin giao hàng</h4>
                    <a class="btn_pop_close btn_pop_close_1"></a>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 wrap-info wrap-info-in">
                        </div>
                        <div class="col-sm-6 col-xs-12 wrap-name">
                            <label id="addbook_btn" class="address-book-icon">
                                <i class="glyphicon glyphicon-th-list"></i>
                                Chọn địa chỉ
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
                            <label class="name">Họ & tên</label>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
                            <input id="txt_ship_name" type="text" name="" value="" placeholder="Nguyễn Văn A">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
                            <label class="name">Số điện thoại</label>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
                            <input id="txt_ship_mobile" type="text" name="" value="0976 674 647" placeholder="0925 360 360">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
                            <label class="name">Địa chỉ giao hàng</label>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
                            <input id="txt_ship_address" type="text" name="" value=""
                                placeholder="23 Nguyễn Kiệm, P14, Q.Gò Gấp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
                            <label class="name">Ghi chú</label>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
                            <textarea id="txt_ship_note" placeholder="Nhập ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="text-right btn-success1">
                        <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                        <a href="javascript:;" id="btn_ship_save">Lưu</a>
                    </div>
                </div>
            </li>
            <li><a id="btn_order_history" href="javascript:;" title="">Lịch sử thu tiền</a></li>
            <li><a id="btn_order_saved" class="order_saved_list" href="javascript:;">Đơn hàng đã lưu (<span
                        class="color-red" id="total_order_retrieve">0</span>)</a></li>
            <li><a id="btn_order_booking" href="javascript:;">Khách lên đơn (<span class="color-red"
                        id="total_order_booking">0</span>)</a></li>
            <li><a id="btn_order_delete" href="javascript:;" title="">Xoá đơn hàng</a></li>
            <li><a class="back" title="">Back <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        </ul>
    </div>

    <div class="overlay-menu-left"></div>
    <div class="modal fade" id="modal_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="pop_up_T_1">Thanh toán</div>
                <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                <div class="modal-body">
                    <div class="row payment_name">

                        <div
                            class="col-md-2 col-sm-2 col-xs-12 text-right top-5 <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value)<2) {?>hide<?php }?>">
                            <label>Lý do thu</label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value)<2) {?>hide<?php }?>">
                            <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value)>1) {?>
                                <select class="form-control" id="md_treasurer_group_id_thu">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                    <?php } ?>}
                                </select>
                            <?php } else { ?>
                                <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value)==1) {?>
                                    <input id="md_treasurer_group_id_thu" class="hide" value="<?php echo $_smarty_tpl->tpl_vars['lTreasurerGroupThu']->value['0']['id'];?>
">
                                <?php } else { ?>
                                    <input id="md_treasurer_group_id_thu" class="hide" value="0">
                                <?php }?>
                            <?php }?>
                        </div>

                        <div
                            class="col-md-2 col-sm-2 col-xs-12 text-right top-5 <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value)<2) {?>hide<?php }?>">
                            <label>Lý do xuất</label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value)<2) {?>hide<?php }?>">
                            <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value)>1) {?>
                                <select class="form-control" id="md_treasurer_group_id_xuat">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                    <?php } ?>}
                                </select>
                            <?php } else { ?>
                                <?php if (COUNT($_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value)==1) {?>
                                    <input id="md_treasurer_group_id_xuat" class="hide" value="<?php echo $_smarty_tpl->tpl_vars['lTreasurerGroupXuat']->value['0']['id'];?>
">
                                <?php } else { ?>
                                    <input id="md_treasurer_group_id_xuat" class="hide" value="0">
                                <?php }?>
                            <?php }?>
                        </div>

                    </div>
                    <hr>
                    <div class="row payment_name">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Tổng tiền</label>
                            <span id="md_payment_total">-</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Tiền mặt khách đưa</label>
                            <span id="md_payment_received">0</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Tiền trả lại khách</label>
                            <span id="md_payment_return">0</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row payment_order">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listPayment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <div class="col-md-4 col-sm-4 col-xs-6 item">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1) {?>
                                    <div id="popup-liabilities" style="display:none"
                                        class="wrap-input-group popup-item-liabilities">
                                        <div class="col-sm-12">
                                            <i>x</i>
                                            <p>Chọn số ngày công nợ:</p>
                                            <select id="sl_hold_date" class="form-control">
                                                <?php echo $_smarty_tpl->tpl_vars['opt_period']->value;?>

                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <div id="btn_submit_liabilities" class="btn-success1">
                                                <a class="">OK</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                
                                    <div class="iframe payment-type-cash" type="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" alt="">
                                        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                            <span style="padding:0;" id="payment-type-value-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                class="color-green payment-type-value">100,000</span>
                                        </span>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (array_search(1,array_column($_smarty_tpl->tpl_vars['listPayment']->value,'id'))!==false) {?>
                                <div class="col-md-4 col-sm-4 col-xs-6 item">
                                    <div id="payment-type-cash-general" class="iframe payment-type-cash" type="-1">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" alt="">
                                        <span>Tổng hợp</span>
                                    </div>
                                </div>
                            <?php }?>

                            
                        </div>
                        <!-- popup tổng hợp -->
                        <div id="popup-general" style="display:none" class="wrap-input-group popup-item-general">
                            <div class="row">
                                <div class="col-sm-12">
                                    <i class="cycle-close">x</i>
                                    <p>Chia hình thức</p>
                                    <div class="row">
                                        <div id="popup-general-error" class="col-sm-12 col-xs-12 color-red top-10">
                                        </div>
                                        <?php  $_smarty_tpl->tpl_vars['sit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sit']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listPayment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sit']->key => $_smarty_tpl->tpl_vars['sit']->value) {
$_smarty_tpl->tpl_vars['sit']->_loop = true;
?>
                                            <div class="col-sm-4 col-xs-6 top-10">
                                                <label><strong><?php echo $_smarty_tpl->tpl_vars['sit']->value['name'];?>
:</strong></label>
                                                <input title="Còn lại là công nợ" <?php if ($_smarty_tpl->tpl_vars['sit']->value['id']==1) {?>disabled<?php }?>
                                                    id="genaral-payment-<?php echo $_smarty_tpl->tpl_vars['sit']->value['id'];?>
" payment-type="<?php echo $_smarty_tpl->tpl_vars['sit']->value['id'];?>
"
                                                    class="form-control genaral-payment number-format" value=""
                                                    placeholder="Số tiền" />
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="btn_submit_general" class="btn-success1">
                                        <a class="">OK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end popup tổng hợp -->
                        <hr>
                        <div class="row chosse_price">
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="1000000">
                                    <span>1,000,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="500000">
                                    <span>500,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="200000">
                                    <span>200,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="100000">
                                    <span>100,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="50000">
                                    <span>50,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="30000">
                                    <span>30,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="20000">
                                    <span>20,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="10000">
                                    <span>10,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="5000">
                                    <span>5,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" amount="2000">
                                    <span>2,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" type="1000">
                                    <span>1,000đ</span>
                                    <i></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe payment-cash-received" type="500">
                                    <span>500đ</span>
                                    <i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_SKU" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            data-backdrop="static">
            <div class="modal-dialog modal-medium">
                <div class="modal-content">
                    <div class="pop_up_T_1">Chọn sản phẩm</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="row" id="list_SKU">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_booking_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-small">
                <div class="modal-content">
                    <div class="pop_up_T_1">Xác nhận tạo đơn đặt hàng</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="row font-size-18 text-right">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-12">Phải trả:</div>
                                <div class="col-md-2 col-sm-2 col-xs-12"><b id="md_bcf_total">-</b></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-12 text-right">Trả trước:</div>
                                <div class="col-md-2 col-sm-2 col-xs-12"><b id="md_bcf_total_paid" class="color-green">-</b>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-12 text-right">Còn lại:</div>
                                <div class="col-md-2 col-sm-2 col-xs-12"><b id="md_bcf_total_left" class="color-red">-</b></div>
                            </div>
                        </div>
                        <div class="row top-10">
                            <div class="text-right btn-success1">
                                <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                                <a href="javascript:;" id="btn_save_booking_order">Tạo đơn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="click_note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="pop_up_T_1">Ghi chú</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="pupop_xuatkho">
                        <textarea id="txt_note"></textarea>
                        <div class="text-right btn-success1">
                            <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                            <a href="javascript:;" id="btn_save_note">Lưu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="click_save_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="pop_up_T_1">Lưu tạm đơn hàng</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="row search-order">
                            <div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
                                <label class="name">Tên đơn hàng</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12 wrap-info">
                                <input id="txt_park_note" type="text" name="" value="" placeholder="Ghi chú">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="text-right btn-success1">
                            <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                            <a href="javascript:;" id="btn_park_save">Lưu</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_add_customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="pop_up_T">Thông tin khách hàng</div>
                    <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Họ & tên</label>
                                <div class="input_name">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <input id="add_cus_fullname" maxlength="50" class="form-control" type="text" name=""
                                            value="" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Số điện thoại</label>
                                <div class="input_name">
                                    <input id="add_cus_mobile" maxlength="50" class="form-control" type="text" name="" value=""
                                        placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Mã khách hàng</label>
                                <div class="input_name">
                                    <input id="add_cus_code" maxlength="50" class="form-control" type="text" name="" value=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Email</label>
                                <div class="input_name">
                                    <input id="add_cus_email" maxlength="50" class="form-control" type="text" name=""
                                        value="email@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Địa chỉ khách hàng</label>
                                <div class="input_name">
                                    <input id="add_cus_address" maxlength="255" class="form-control" type="text" name=""
                                        value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Địa chỉ giao hàng</label>
                                <div class="input_name">
                                    <input id="add_cus_delivery_address" maxlength="50" class="form-control" type="text" name=""
                                        value="124, Trần Hưng Đạo, Quận 1, HCM">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <div class="ncc_radio ncc_radio_add_customer">
                                    <p><label class="field_L1">
                                            <input checked id="add_cus_is_use_address" name="radio_add_customer" checked=""
                                                class="ace" type="radio">
                                            <span class="lbl active"></span>
                                            Giao hàng theo địa chỉ khách hàng
                                        </label></p>
                                    <p><label class="field_L1">
                                            <input id="add_cus_is_not_use_address" name="radio_add_customer" class="ace"
                                                type="radio">
                                            <span class="lbl"></span>
                                            Giao hàng theo địa chỉ giao hàng
                                        </label></p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Nhóm khách hàng</label>
                                <div class="input_name">
                                    <select id="member_group_id" class="form-control">
                                        <?php echo $_smarty_tpl->tpl_vars['opt_member_group']->value;?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Cụm</label>
                                <div class="input_name">
                                    <input id="add_cum" maxlength="255" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Phòng kinh doanh</label>
                                <div class="input_name">
                                    <input id="add_pkd" maxlength="255" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Khu vực kinh doanh</label>
                                <div class="input_name">
                                    <input id="add_kvkd" maxlength="255" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Giám đốc kinh doanh</label>
                                <div class="input_name">
                                    <input id="add_gdkd" maxlength="255" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 hide">
                                <label class="label_name">Chi nhánh</label>
                                <div class="input_name">
                                    <input id="add_chinhanh" maxlength="255" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Người giới thiệu</label>
                                <div class="input_name">
                                    <input id="add_referral_by" maxlength="255" class="form-control" type="text" name=""
                                        value="">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Phòng ban</label>
                                <div class="input_name">
                                    <select id="member_department_id" class="form-control">
                                        <?php echo $_smarty_tpl->tpl_vars['opt_member_department']->value;?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="label_name">Loại khách hàng</label>
                                <div class="input_name">
                                    <select id="add_is_official" class="form-control">
                                        <option value="0">Khách hàng mới</option>
                                        <option value="1">Khách hàng chính thức</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="label_name">Notes</label>
                                <div class="input_name">
                                    <input id="add_cus_note" class="form-control" type="text" name="" value="">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 top-10">
                                <div class="col-sm-6 top-10">
                                    <label class="">Hạn SD:</label> <span id="lb_license_to" class="color-green"></span>
                                </div>
                                <div class="col-sm-6 top-10">
                                    <a class="web_extend btn btn-danger" user_id=""><i
                                            class="glyphicon glyphicon-expand"></i>Gia hạn</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="label_name">Hình đại diện</label>
                                <div class="avatar_thumbs">
                                    <a onclick="click_file('avatar_file')" id="add_cus_avatar"
                                        style="width: 130px;height: 130px;">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_joined.png">
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="clear"></div>
                        <div class="text-right btn-success1">
                            <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                            <a id="add_cus_btn_save" href="javascript:;">Lưu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hide">
            <input type="file" name="files" id="avatar_file" value="" accept=".png,.jpg,.jpeg,.gif" />
            <input type="text" name="" id="output_cus_avatar" value="" />
            <!--For upload chung tu order-->
            <input type="file" name="files" id="upload_chung_tu" value=""
                accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" />
        </div>

        <div class="modal fade" id="modal_order_saved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-full">
                <div class="modal-content">
                    <div class="pop_up_T"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_posListPacked'];?>
</div>
                    <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="form-search">
                            <div class="col-sm-5">
                                <input id="txt_order_saved_keyword" type="text" name=""
                                    placeholder="Họ tên/ SĐT/ Mã TV/ Mã đơn">
                                <button class="hide"><span class="icon-cate icon-other-search1"></span></button>
                                <img id="order_saved_list" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" class="search_code"
                                    width="30">
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary order_saved_list">Xem</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bg-no">
                                <thead>
                                    <tr>
                                        
                                        <th width="3%">#</th>
                                        <th width="6%">Ngày tạo</th>
                                        <th width="6%">Mã TV</th>
                                        <th width="8%">SĐT</th>
                                        <th>Khách hàng</th>
                                        <th width="8%">Order ID</th>
                                        <th width="10%" class="text-right">Tổng đơn</th>
                                        <th width="10%">Hình thức</th>
                                        <th width="12%">Ghi chú</th>
                                        <th width="12%">@</th>
                                    </tr>
                                </thead>
                                <tbody id="tpl_order_saved">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="paging text-center" id="paging_order_saved">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_order_booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-full">
                <div class="modal-content">
                    <div class="pop_up_T">Đơn hàng khách lên</div>
                    <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="form-search">
                            <div class="col-sm-5">
                                <input id="txt_booking_searching" type="text" name="" placeholder="Họ tên/ SĐT/ Mã TV/ Mã đơn">
                                <button class="hide"><span class="icon-cate icon-other-search1"></span></button>
                                <img id="btn_booking_searching" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" class="search_code"
                                    width="30">
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control" id="txt_payment_type">
                                    <option value="">Tất cả hình thức thanh toán</option>
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listPayment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1) {?> & Tổng hợp<?php }?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" id="txt_booking_year">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_year']->value;?>

                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a onclick="thisObj.listOrderBooking();" class="btn btn-primary">Xem</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bg-no">
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="6%">Ngày tạo</th>
                                        <th width="6%">Mã TV</th>
                                        <th width="8%">SĐT</th>
                                        <th>Khách hàng</th>
                                        <th width="8%">Order ID</th>
                                        <th width="10%" class="text-right">Tổng đơn</th>
                                        <th width="10%">Hình thức</th>
                                        <th width="12%">Ghi chú</th>
                                        <th width="12%">@</th>
                                    </tr>
                                </thead>
                                <tbody id="tpl_order_booking">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="paging text-center" id="paging_order_booking">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_order_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="pop_up_T">Lịch sử thu tiền</div>
                    <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="col-xs-12 nopadding">
                            <div class="col-lg-6 col-md-6  col-xs-6 top-5">
                                <div class="input-group">
                                    <input id="txt_date_order_history" class="form-control"
                                        value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bg-no">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Lúc</th>
                                        <th>Người thu</th>
                                        <th>Số tiền</th>
                                        <th>Hình thức</th>
                                        <th>@</th>
                                    </tr>
                                </thead>
                                <tbody id="tpl_order_history">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!--End - Home - Mr Tân -->

        <!--Begin modal load liabilities-->
        <div class="modal fade" id="modal_liabilities" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-small">
                <div class="modal-content noborder">
                    <div class="modal-header noborder">
                        <a data-dismiss="modal" class="close close-qr-member" href="#">×</a>
                        <h4>Danh sách công nợ khách hàng</h4>
                    </div>
                    <div class="modal-body nopadding">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-md-liabilities">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-sum">
                                <span class="pay" id="customer_pay">-</span>/ <span id="total_left" class="total">-</span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-table">
                                <table class="table table-responsive table-bordered table-">
                                    <thead>
                                        <tr>
                                            <td><label><input class="ace" type="checkbox" /> <span class="lbl"></span></label>
                                            </td>
                                            <td>Hạn thu</td>
                                            <td>Cửa hàng</td>
                                            <td>Thanh toán</td>
                                            <td>Còn lại</td>
                                        </tr>
                                    </thead>
                                    <tbody id="list_liabilities">
                                        <!-- <tr>
            					<td><label><input class="ace" type="checkbox"/> <span class="lbl"></span></label></td>
            					<td> 16/10 </td>
            					<td> Dân Cua </td>
            					<td> 5tr </td>
            					<td> Hết Nợ </td>
            				</tr>
            				<tr>
            					<td><label><input class="ace" type="checkbox"/> <span class="lbl"></span></label></td>
            					<td> 16/10 </td>
            					<td> Dân Cua </td>
            					<td> 5tr </td>
            					<td> Hết Nợ </td>
            				</tr>
            				<tr>
            					<td><label><input class="ace" type="checkbox"/> <span class="lbl"></span></label></td>
            					<td> 16/10 </td>
            					<td> Dân Cua </td>
            					<td> 5tr </td>
            					<td> Hết Nợ </td>
            				</tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" id="btn-cancel"
                            class="btn btn-default btn-width close-qr-member">Hủy</button>
                        <button data-dismiss="modal" id="btn-confirm" class="btn btn-primary btn-width close-qr-member">Hoàn
                            tất</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--END modal load liabilities-->

        <div class="modal fade" id="modal_confirm_order_return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-medium">
                <div class="modal-content">
                    <div class="pop_up_T_1">Xác nhận số lượng hàng trả</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="pupop_xuatkho">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bg-no">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sản phẩm</th>
                                                <th width="20%">Số lượng trả</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tpl_return">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong class="">Tổng tiền phải trả:</strong>
                                <strong class="color-red" id="return_total">-</strong>
                            </div>
                            <div class="col-sm-12">
                                <strong class="">Phương thức thanh toán:</strong>
                                <strong class="color-green" id="return_payment">-</strong>
                            </div>
                            <div class="col-sm-12 top-15">
                                <textarea placeholder="Lý do trả hàng" class="form-control" id="txt_return_note"></textarea>
                            </div>
                        </div>
                        <div class="text-right btn-success1">
                            <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                            <a href="javascript:;" id="btn_save_return_order">Xác nhận trả hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--BEGIN modal create order from booking order = cofbo-->
        
        <!--END modal create order from booking order-->

        <select id="list_option_manager" class="form-control display-none" hidden="">
            <?php echo $_smarty_tpl->tpl_vars['opt_manage']->value;?>

        </select>

        <!--BEGIN MODAL BAO CAO-->
        <div class="modal fade" id="modal_bao_cao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            data-backdrop="static">
            <div class="modal-dialog modal-small">
                <div class="modal-header noborder">
                    <a data-dismiss="modal" class="close" href="#">× </a>
                    <h4 class="background-header-blue"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_reportfinance'];?>

                        <!--Báo cáo tài chính-->
                    </h4>
                </div>
                <div class="modal-body nopadding margintop-10 bg-white">
                    <div class="col-lg-12 col-md-12  col-xs-12 nopadding manage_report">
                        <br>
                        <div class="col-lg-12 col-md-12  col-xs-12">
                            <div class="col-lg-6 col-md-6  col-xs-6 nopadding">
                                <input id="m_report_year" class="form-control input-number-touch" name=""
                                    value="<?php echo smarty_modifier_date_format(time(),'Y');?>
" readonly />
                            </div>
                            <div class="col-lg-6 col-md-6  col-xs-6 nopadding">
                                <select id="m_report_month" class="form-control">
                                    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
                                        <option <?php if ($_smarty_tpl->tpl_vars['foo']->value==smarty_modifier_date_format(time(),'m')) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_month'];?>
 <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</li>
                                        <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12">
                            <div class="col-lg-6 col-md-6  col-xs-6 nopadding">
                            </div>
                            <div class="col-lg-6 col-md-6  col-xs-6 text-center">
                                <b class="color-red " id="month_report">0</b> đ
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12">
                            <div class="col-lg-6 col-md-6  col-xs-6 nopadding">
                                <select id="m_report_day" class="form-control">
                                    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
                                        <option <?php if ($_smarty_tpl->tpl_vars['foo']->value==smarty_modifier_date_format(time(),'d')) {?>selected<?php }?> class="m_report_opt"
                                            id="m_report_opt_<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_day'];?>

                                            <!--Ngày--> <?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</li>
                                        <?php }} ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3  col-xs-3">
                                <button class="btn-success color-white btn form-control"
                                    onclick="return xem_bao_cao();"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>

                                    <!--Xem-->
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-3  col-xs-3">
                                <button class="btn-primary color-white hide btn form-control"
                                    onclick="return add_balance();"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_main_addbalance'];?>

                                    <!--NẠP TIỀN ĐẦU CA-->
                                </button>
                            </div>
                        </div>
                        <div id="html_report" class="col-lg-12 col-md-12  col-xs-12 nopadding top10">

                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12  col-xs-12 nopadding">
                        <button class="btn-warning color-white btn form-control btn-report-close" data-dismiss="modal"><i
                                class="glyphicon glyphicon-ok"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL BAO CAO-->

        <!--BEGIN MODAL BAO CAO-->
        <div class="modal fade" id="modal_xuat_bao_cao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xuat-bao-cao">
                <div class="modal-header noborder">
                    <a data-dismiss="modal" class="close" href="#">× </a>
                    <h4 class="background-header-blue"> Xuất báo cáo bán hàng </h4>
                </div>
                <div class="modal-body nopadding margintop-10 bg-white">
                    <div class="col-lg-12 col-md-12  col-xs-12 nopadding manage_report">
                        <div class="col-lg-12 col-md-12  col-xs-12 input-date-ex-rp">
                            <div class="col-lg-2 col-md-2 col-xs-12 nopadding">
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-6 dr">
                                <select multiple id="ex_payment_type" class="">
                                    <option selected value="">Tất cả</option>
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listPayment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1) {?> & Tổng hợp<?php }?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3  col-xs-6">
                                <div class="">
                                    <input id="ex_date" type="text" name="" value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
"
                                        placeholder="Từ ngày" class="" hide-placeholder="">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-3">
                                <button id="ex_btn_view"
                                    class="btn-success color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>
</button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-3">
                                <button id="ex_btn_dl"
                                    class="btn-primary color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_download'];?>
</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12 top-10">
                            <div class="col-lg-9 col-md-9  col-xs-6">
                            </div>
                            <div class="col-lg-3 col-md-3  col-xs-6">
                                <b>Tổng cộng:</b>
                                <b class="color-red" id="ex_total_sum"></b>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12 nopadding top10 content-ex-bao-cao">
                            <table class="table table-responsive table-stripped text-center table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã SP</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Giá vốn</th>
                                        <th>Thành tiền</th>
                                        <th>Hình thức</th>
                                    </tr>
                                </thead>
                                <tbody id="ex_list">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="paging text-center" id="ex_page_html">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12  col-xs-12 ">
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL BAO CAO-->

        <!--BEGIN MODAL BAO CAO TONG HOP-->
        <div class="modal fade" id="modal_order_sum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xuat-bao-cao">
                <div class="modal-header noborder">
                    <a data-dismiss="modal" class="close" href="#">× </a>
                    <h4 class="background-header-blue"> Báo cáo bán hàng tổng hợp </h4>
                </div>
                <div class="modal-body nopadding margintop-10 bg-white">
                    <div class="col-lg-12 col-md-12  col-xs-12 nopadding manage_report">
                        <div class="col-lg-12 col-md-12  col-xs-12 input-date-ex-rp">
                            <div class="col-lg-2 col-md-2 col-xs-6">
                                <div class="">
                                    <input id="ods_keyword" type="text" name="" value="" placeholder="Tên KH/ ID KH/ Order ID"
                                        class="" hide-placeholder="">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-6">
                                <div class="">
                                    <input id="ods_from" type="text" name="" value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
"
                                        placeholder="Từ ngày" class="" hide-placeholder="">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-6">
                                <div class="">
                                    <input id="ods_to" type="text" name="" value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
"
                                        placeholder="Từ ngày" class="" hide-placeholder="">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-6 dr">
                                <select multiple id="ods_payment_type" class="form-control width-100p">
                                    <option selected value="">Tất cả</option>
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listPayment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==1) {?> & Tổng hợp<?php }?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-6">
                                <select id="ex_created_by" class="form-control top-5">
                                    <option value="">Tất cả user</option>
                                    <?php echo $_smarty_tpl->tpl_vars['opt_users']->value;?>

                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-12 top-5 dr">
                                <select multiple id="treasurer_group_id" class="form-control width-100p">
                                    <?php echo $_smarty_tpl->tpl_vars['treasurer_group_id']->value;?>

                                </select>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12 top-5 dr">
                                <select multiple id="treasurer_id" class="form-control width-100p">
                                    <?php echo $_smarty_tpl->tpl_vars['treasurer_id']->value;?>

                                </select>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-3">
                                <button id="ods_btn_view"
                                    class="btn-success color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>
</button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-3">
                                <button id="ods_btn_dl"
                                    class="btn-primary color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_download'];?>
</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12 top-10">
                            <div id="ods_lpayment" class="col-sm-2 col-xs-6">
                                <b>Tổng cộng:</b>
                                <b class="color-red" id="ods_total_revenue"></b>/ <b id="ods_total_record"></b> đơn
                            </div>

                            

                        </div>
                        <div id="processing_uploaded" class="col-lg-12 col-md-12 col-xs-12 nopadding processing_uploaded top10">
                        </div>
                        <div class="col-lg-12 col-md-12  col-xs-12 nopadding top10 content-ex-bao-cao">
                            <table class="table table-responsive text-center table-bg-no order">
                                <thead>
                                    <tr>
                                        <th>Ngày tạo</th>
                                        <th>Order ID</th>
                                        <th>Mã KH</th>
                                        <th>Khách hàng</th>
                                        <th>Mobile</th>
                                        <th>Người tạo</th>
                                        <th>Hình thức</th>
                                        <th width="14.2%">Thành tiền</th>
                                        <th class="hide">Giá vốn</th>
                                        <th class="hide">Lãi BH</th>
                                        <th>Ghi chú</th>
                                        <th width="10%">Chứng từ</th>
                                        <th>@</th>
                                    </tr>
                                </thead>
                                <tbody id="ods_list">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="paging text-center" id="ods_page_html">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12  col-xs-12 ">
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL BAO CAO TONG HOP-->

        <div class="modal fade" id="modal_barcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="pop_up_T_1">Mã Barcode xuất hàng</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="modal-body">
                        <div class="col-sm-12 info-bar-head">
                            <div class="col-sm-12">
                                <p><b id="barcode-pro-name"></b></p>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-search">
                                    <input maxlength="20" id="barcode-txt" type="text" name=""
                                        placeholder="Nhập mã Barcode cần thêm/ cần xóa" payment_type="0">
                                    <img id="" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/code.png" class="search_code" width="30">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <p class="barcode-no-bar">Đang có: <b id="barcode-number"></b> mã</p>
                            </div>
                            <div class="col-sm-2">
                                <button id="barcode_btn_save" class="btn btn-success btn-save">Cập nhật</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="barcode-list" id="barcode-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_address_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-addbook">
                <div class="modal-content">
                    <div class="pop_up_T_1">Danh sách địa chỉ giao hàng</div>
                    <a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="pupop_xuatkho">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <table class="table table-responsive table-stripped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ & Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Tỉnh/ Thành</th>
                                            <th>Quận/ Huyện</th>
                                            <th>Phường/ Xã</th>
                                            <th>Địa chỉ</th>
                                            <th width="6%">Mặc định</th>
                                            <th>@</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addbook_list">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-right btn-success1 top-10">
                            <a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
                            <a href="javascript:;" id="addbook_btn_save">Lưu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--BEGIN MODAL Cập nhật số lượng sản phẩm còn nợ của đơn hàng-->
        <div class="modal fade" id="modal_edit_quantity_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-small">
                <div class="modal-header noborder">
                    <a data-dismiss="modal" class="close" href="#">× </a>
                    <h4 class="background-header-blue" id="modal_edit_quantity_product_title"></h4>
                </div>
                <div class="modal-body nopadding margintop-10 bg-white">
                    <div class="col-lg-12 col-md-12  col-xs-12 nopadding top10 content-ex-bao-cao">
                        <table class="table table-responsive table-stripped text-center table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên SP</th>
                                    <th>Số lượng</th>
                                    <th>Còn nợ</th>
                                </tr>
                            </thead>
                            <tbody id="list_product_edit">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="paging text-center" id="ods_page_html">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12  col-xs-12 ">
                </div>
            </div>
        </div>
        </div>
        <!--END MODAL Cập nhật số lượng sản phẩm còn nợ của đơn hàng-->

        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/script_report.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <a id="btn_print_link" is-cloud-printer="<?php echo $_smarty_tpl->tpl_vars['is_cloud_printer']->value;?>
" print-url="" href="javascript:;"></a>
        
        
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/localstoragedb.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/main_retail.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script>

        <style>
            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainreturn:'))===false) {?>
                #btn_return,
                .wrap_order_return.blocked {
                    display: none !important;
                    z-index: -1000;
                }

            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':maindiscount:'))===false) {?>
                #btn_sale.btn-success1 {
                    display: none !important;
                    z-index: -1000;
                }

            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainupdate_percent:'))===false) {?>
                .in-row-item .tab-price-percent input,
                .in-row-item li.nav-percent a {
                    pointer-events: none;
                    background: #ebebeb !important;
                }

            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainupdate_price:'))===false) {?>
                .in-row-item .tab-pane-price input,
                .in-row-item li.nav-price a {
                    pointer-events: none;
                    background: #ebebeb !important;
                }

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainupdate_percent:'))===false&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainupdate_price:'))===false) {?>
                div.popup-item-price-in-rows {
                    display: none !important;
                }

            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['show_btn_print_hide_price']->value!='1') {?>
                .btn_hide_price {
                    display: none !important;
                }

            <?php }?>
        </style>
        <script>
            var widthShop = $('.TAN_product_main .item .img').width();
            var heightShop = widthShop * 480 / 400;
            $('.TAN_product_main .item .img').css('height', heightShop + 'px');
            $(window).resize(function() {
                var widthShop = $('.TAN_product_main .item .img').width();
                var heightShop = widthShop * 480 / 400;
                $('.TAN_product_main .item .img').css('height', heightShop + 'px');
            });
        </script><?php }} ?>
