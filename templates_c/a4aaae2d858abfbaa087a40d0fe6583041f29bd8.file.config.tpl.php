<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 14:27:17
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/lottery/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684820020613e4664070dc4-00186478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4aaae2d858abfbaa087a40d0fe6583041f29bd8' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/lottery/config.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1684820020613e4664070dc4-00186478',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_613e4664071cd0_22823153',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lang' => 0,
    'setup' => 0,
    'optTimeZone' => 0,
    'opt_delivery_steps' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613e4664071cd0_22823153')) {function content_613e4664071cd0_22823153($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
    <div class="col-sm-10 col-sm-push-1 top5">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#general_config" aria-controls="general_config" role="tab" data-toggle="tab">
                        Cấu hình chung
                    </a>
                </li>
                <li role="presentation">
                    <a href="#prize_config" aria-controls="prize_config" role="tab" data-toggle="tab">
                       Bảng cơ cấu giải thưởng
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#fund_config" aria-controls="fund_config" role="tab" data-toggle="tab">
                        Cấu hình trích quỹ thưởng
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="custome-tab-content tab-content tab-setting">

            <!-- Tab Hot product -->
                <div role="tabpanel" class="tab-pane active" id="general_config">
                    <!--BEGIN CONFIG CURRENCY of system-->
                    <div class="col-sm-10 col-sm-push-1 top-15 border-b hide">
                        <h4 class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysLangRegi'];?>

                            <!-- Language and Region -->
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 lb-text-right top-5">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_country'];?>
:
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <select disabled id="country" class="form-control lang-region">
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['country']=='VN') {?>selected<?php }?> value="VN">Việt Nam</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['country']=='AU') {?>selected<?php }?> value="AU">Australia</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['country']=='US') {?>selected<?php }?> value="US">United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 lb-text-right top-5">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lang'];?>
:
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <select disabled id="language" class="form-control lang-region">
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['lang']=='vi') {?>selected<?php }?> value="vi">Tiếng Việt</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['lang']=='en') {?>selected<?php }?> value="en">English</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 lb-text-right top-5">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_curUnit'];?>
:
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <select disabled id="current_unit" class="form-control lang-region">
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['currency']=='VNĐ') {?>selected<?php }?> value="VNĐ">Việt Nam Đồng (VNĐ)
                                    </option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['currency']=='AU$') {?>selected<?php }?> value="AU$">Australia Dollar
                                        (AU$)</option>
                                    <option <?php if ($_smarty_tpl->tpl_vars['setup']->value['currency']=='US$') {?>selected<?php }?> value="US$">US Dollar (USD$)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 lb-text-right top-5">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysTimeZone'];?>

                                <!--Múi giờ hệ thống-->:
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <select disabled id="time_zone" class="form-control lang-region">
                                    <?php echo $_smarty_tpl->tpl_vars['optTimeZone']->value;?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 text-center">
                            <button id="btn_lang_region" class="btn btn-primary btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
                        </div>
                    </div>
                    <!--END CONFIG CURRENCY of system-->

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">CHO PHÉP SỬ DỤNG CHỨC NĂNG XỔ SỐ</h4>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>Cho phép sử dụng chức năng xổ số:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <label class="pull-right">
                                <input class="ace ace-switch ace-switch-4 lottery_enabled-option general_config" <?php if ($_smarty_tpl->tpl_vars['setup']->value['lottery_enabled']==1) {?>checked<?php }?>
                                    type="checkbox" class="type_checked" name="type" id="lottery_enabled" />
                                <span class="lbl"></span>
                            </label>
                        </div>
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Cấu hình hệ số quy đổi số may mắn</h4>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-5">
                            <span>Hệ số đổi:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <input class="form-control number-format lottery_ratio-option general_config" value="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['lottery_ratio'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['lottery_ratio'];?>
<?php } else { ?>0<?php }?>" type="text" name="type" id="lottery_ratio" /> / 1 số may mắn
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-10">
                            <span>Bước giao hàng nào được xác định đơn thành công:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center top-5">
                            <select class="lottery_ratio-option general_config form-control" id="lottery_steps_delivery" >
                                <?php echo $_smarty_tpl->tpl_vars['opt_delivery_steps']->value;?>

                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-10">
                            <span>Bao nhiêu ngày mới cấp số sau khi đã tới bước xác định đơn thành công:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center top-5">
                            <input class="form-control number-format lottery_ratio-option general_config" value="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['lottery_delay_day'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['lottery_delay_day'];?>
<?php } else { ?>0<?php }?>" type="number" name="type" id="lottery_delay_day" />
                        </div>
                        <div class="col-sm-12 text-center  top-10">
                            <i class="color-red">Ví dụ: Cài 100,000. Nghĩa là mỗi 100,000đ phát sinh đơn hàng thành công người dùng sẽ nhận được 1 số tham gia chương trình xổ số may mắn. (Phần số dữ trên mỗi đơn không được cộng dồn cho đơn sau)</i>
                        </div>
                        
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Cấu hình hệ số quy đổi số may mắn đối với đơn hàng mua bằng điểm</h4>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>Cho phép đơn đổi điểm:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <label class="pull-right">
                                <input class="ace ace-switch ace-switch-4 lottery_point_enabled-option general_config" <?php if ($_smarty_tpl->tpl_vars['setup']->value['lottery_point_enabled']==1) {?>checked<?php }?>
                                    type="checkbox" class="type_checked" name="type" id="lottery_point_enabled" />
                                <span class="lbl"></span>
                            </label>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-5">
                            <span>Hệ số đổi điểm:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <input class="form-control number-format lottery_point_enabled-option general_config" value="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['lottery_ratio'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['lottery_ratio'];?>
<?php } else { ?>0<?php }?>" type="text" name="type" id="lottery_ratio" /> / 1 số may mắn
                        </div>

                        <div class="col-sm-12 text-center  top-10">
                            <i class="">(Tương tự hệ số của đơn hàng thông thường)</i>
                        </div>
                        
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Cho phép cấp số ngay, khi đơn hàng thanh toán trước</h4>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>Cho phép:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <label class="pull-right">
                                <input class="ace ace-switch ace-switch-4 lottery_deli_num_after_paid-option general_config" <?php if ($_smarty_tpl->tpl_vars['setup']->value['lottery_deli_num_after_paid']==1) {?>checked<?php }?>
                                    type="checkbox" class="type_checked" name="type" id="lottery_deli_num_after_paid" />
                                <span class="lbl"></span>
                            </label>
                        </div>
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Giới thiệu khách hàng mới để nhận số</h4>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>Cho phép:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <label class="pull-right">
                                <input class="ace ace-switch ace-switch-4 lottery_allow_register-option general_config" <?php if ($_smarty_tpl->tpl_vars['setup']->value['lottery_allow_register']==1) {?>checked<?php }?>
                                    type="checkbox" class="type_checked" name="type" id="lottery_allow_register" />
                                <span class="lbl"></span>
                            </label>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-5">
                            <span>Số lượng số được cấp mỗi khi khách hàng kích hoạt thành công:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                                <input class="form-control lottery_allow_register-option general_config" value="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['lottery_allow_register_number'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['lottery_allow_register_number'];?>
<?php } else { ?>0<?php }?>" type="number" name="type" id="lottery_allow_register_number" />
                        </div>
                        <div class="col-sm-12 text-center  top-10">
                            <i class="color-red">Lưu ý: Tài khoản được xác nhận hợp lệ khi có 1 đơn hàng thành công đầu tiên.</i>
                        </div>
                        
                        <div class="top-15 col-sm-12">
                        </div>

                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Cấu hình độ dài của số cấp</h4>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-5">
                            <span>Độ dài số may mắn:</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                                <input class="form-control lottery_number_length-option general_config" value="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['lottery_number_length'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['lottery_number_length'];?>
<?php } else { ?>4<?php }?>" type="number" name="type" id="lottery_number_length" />
                        </div>
                        <div class="col-sm-12 text-center  top-10">
                            <i class="color-red">Ví dụ: Cài đặt là 4, thì các số may mắn là như sau: 1111, 8181, 4568 ... ( Lưu ý: Mặc định độ dài là 4, nếu cấu hình là 0)</i>
                        </div>
                        
                        <div class="top-15 col-sm-12">
                        </div>
                        
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Mô tả chương trình</h4>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <textarea id="lottery_description" class="form-control lottery_description-option general_config"></textarea>
                        </div>
                        
                        <div class="top-15 col-sm-12">
                        </div>
                        
                    </div>

                </div>

                <!-- GIới thiệu -->
                <div role="tabpanel" class="tab-pane " id="prize_config">
                    <div class="col-sm-12">
                        <div class="col-sm-9 col-sm-push-1 col-xs-12 top-15">

                            <div class="col-sm-12">
                                <div class="col-sm-3 top-10 text-right">
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optComName'];?>

                                    <!--Tên công ty-->(*):
                                </div>
                                <div class="col-sm-9 top-5">
                                    <input disabled id="company_title" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_title'];?>
">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3 top-10 text-right">
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optComS'];?>

                                    <!--Tên giao dịch viết tắt-->(*):
                                </div>
                                <div class="col-sm-9 top-5">
                                    <input disabled id="company_sort" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_sort'];?>
">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3 top-10 text-right">
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_address'];?>

                                    <!--Địa chỉ-->(*):
                                </div>
                                <div class="col-sm-9 top-5">
                                    <input disabled id="company_address" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_address'];?>
">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3 top-10 text-right">
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optTax'];?>

                                    <!--Mã số thuế-->:
                                </div>
                                <div class="col-sm-4 top-5">
                                    <input disabled id="company_tax" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_tax'];?>
">
                                </div>
                                <div class="col-sm-1 top-5 text-right">
                                    Fax:
                                </div>
                                <div class="col-sm-4 top-5">
                                    <input disabled id="company_fax" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_fax'];?>
">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3 top-10 text-right">
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optCont'];?>

                                    <!--Điện thoại-->:
                                </div>
                                <div class="col-sm-4 top-5">
                                    <input disabled id="company_phone" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
">
                                </div>
                                <div class="col-sm-1 top-5 text-right">
                                    Email:
                                </div>
                                <div class="col-sm-4 top-5">
                                    <input disabled id="company_email" type="text" class="form-control"
                                        value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_email'];?>
">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-9 top-10">
                                    <button disabled id="btn_company_reset"
                                        class="btn btn-default btn_width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                                    <button id="btn_company_update"
                                        class="btn btn-primary btn_width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- GIới thiệu -->
                <div role="tabpanel" class="tab-pane " id="fund_config">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-sm-push-3 top-15">
                            <div class="col-sm-12 top-10">
                                <div class="col-sm-5">
                                </div>
                                <div class="col-sm-7">
                                    <div id="change_pass_success" class="alert alert-success hide">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['lang']->value['nt_successed'];?>
!</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 top-10 text-right">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_recentPass'];?>

                                <!-- Mật khẩu hiện tại -->:
                            </div>
                            <div class="col-sm-7 top-5">
                                <input disabled id="password" type="password" class="form-control" value="">
                            </div>
                            <div class="col-sm-5 top-10 text-right">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_newPass'];?>

                                <!-- Mật khẩu mới -->:
                            </div>
                            <div class="col-sm-7 top-5">
                                <input disabled id="new_password" type="password" class="form-control" value="">
                            </div>
                            <div class="col-sm-5 top-10 text-right">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cfNewPass'];?>

                                <!-- Xác nhận mật khẩu -->:
                            </div>
                            <div class="col-sm-7 top-5">
                                <input disabled id="confirm_password" type="password" class="form-control" value="">
                            </div>
                            <div class="col-sm-6 top-10 text-right">
                                <button disabled id="reset_form_change_password"
                                    class="btn btn-default form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                            </div>
                            <div class="col-sm-6 top-10">
                                <button id="btn_change_pass"
                                    class="btn btn-primary form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

<!--BEGIN modal select device-->
<div class="modal fade" id="modal_select_device" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xsmall">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_choseMasterDevice'];?>
</h4>
            </div>
            <div class="modal-body noborder margintop-10y">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 top-20 text-right">
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_descDevice'];?>
:
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9 top-15">
                    <input id="master_name" class="form-control" value="" />
                    <input id="master_shop_id" class="hidden" value="" />
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 top-15">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9 top-15">
                    <label>
                        <input id="master_this_device" type="checkbox" class="ace form-control" value="" />
                        <span class="lbl"></span>
                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_choseThisMaster'];?>

                    </label>
                </div>
            </div>
            <div class="modal-footer top-20">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal">
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                </button>
                <button onclick="set_master_device();" type="button" class="btn btn-primary btn-width">
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>

                </button>
            </div>
        </div>
    </div>
</div>
<!--END modal cancel-->
<div class="clear">
    <br>
    <br>
</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/lottery_config.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
