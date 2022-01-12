<?php /* Smarty version Smarty-3.1.18, created on 2021-08-28 01:06:30
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/pos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282370815612929a6c74910-47675183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea30cf0eb769c84c2465f2ff7dbf3664f5b85c30' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/pos.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282370815612929a6c74910-47675183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'lang' => 0,
    'setup' => 0,
    'optTimeZone' => 0,
    'lShops' => 0,
    'item' => 0,
    'tablePrinter' => 0,
    'tableEpson' => 0,
    'i' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_612929a6dd5ca8_12906313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612929a6dd5ca8_12906313')) {function content_612929a6dd5ca8_12906313($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
    <div class="col-sm-10 col-sm-push-1 top5">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#hot_product" aria-controls="hot_product" role="tab" data-toggle="tab">
                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optSetting'];?>

                        <!-- Tùy chỉnh -->
                    </a>
                </li>
                <li role="presentation">
                    <a href="#genaralInfo" aria-controls="changepass" role="tab" data-toggle="tab">
                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optComInf'];?>

                        <!--Thông tin công ty-->
                    </a>
                </li>
                <li role="presentation" class="hide">
                    <a href="#changepass" aria-controls="changepass" role="tab" data-toggle="tab">
                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_changePassword'];?>

                        <!-- Đổi mật khẩu -->
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="custome-tab-content tab-content tab-setting">
                <!-- GIới thiệu -->
                <div role="tabpanel" class="tab-pane " id="genaralInfo">
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
                <div role="tabpanel" class="tab-pane " id="changepass">
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

                <!-- Tab Hot product -->
                <div role="tabpanel" class="tab-pane active" id="hot_product">
                    <!--BEGIN CONFIG CURRENCY of system-->
                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
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
                        <h4 class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printSett'];?>
</h4>

                        <?php if (isset($_smarty_tpl->tpl_vars['lShops']->value)) {?>
                            <div class="col-sm-10 col-sm-push-1 top-15">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table class="table-responsive table-striped table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysStore'];?>

                                                    <!--Cửa hàng-->
                                                </td>
                                                <td>
                                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysPrintNote'];?>

                                                    <!--In ghi chú trên bill-->
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                                <tr>
                                                    <td class="text-left">
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                                    </td>
                                                    <td>
                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['note_in_bill']>0) {?>
                                                            <label class="pull-center inline" val="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                                <input id="note_in_bill_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                                    onclick="change_note_in_bill(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" checked=""
                                                                    type="checkbox" class=" ace ace-switch ace-switch-4"
                                                                    value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                                <span class="lbl middle"></span>
                                                            </label>
                                                        <?php } else { ?>
                                                            <label class="pull-center inline">
                                                                <input id="note_in_bill_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                                    onclick="change_note_in_bill(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" type="checkbox"
                                                                    class="ace ace-switch ace-switch-4" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                                <span class="lbl middle"></span>
                                                            </label>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php }?>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-10 text-right">
                                <b><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysShowTax'];?>

                                    <!--Hiển thị VAT trên hóa đơn in?-->
                                </b>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 top-10">
                                <label class="pull-right">
                                    <input onclick="change_show_vat();" <?php if ($_smarty_tpl->tpl_vars['setup']->value['show_vat']=='1') {?>checked<?php }?>
                                        id="show_vat" class="ace ace-switch ace-switch-4" type="checkbox"
                                        name="show_vat">
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-10 text-right">
                                <b><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysPrintBill'];?>

                                    <!--In bill khi thực hiện tính tiền?-->
                                </b>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 top-10">
                                <label class="pull-right">
                                    <input onclick="change_printing_on_cashed();"
                                        <?php if ($_smarty_tpl->tpl_vars['setup']->value['printing_on_cashed']=='1') {?>checked<?php }?> id="printing_on_cashed_yes"
                                        class="ace ace-switch ace-switch-4" type="checkbox" name="print_on_cash">
                                    <span class="lbl"></span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 top-10">
                            </div>
                        </div>
                        <div class="col-sm-12 top-10">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 text-right">
                                <div style="margin-top: 12px;"><b><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printerType'];?>
:</b></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                <div class="ncc_radio">
                                    <label>
                                        <input <?php if ($_smarty_tpl->tpl_vars['setup']->value['is_cloud_printer']==0) {?>checked<?php }?> class="ace" type="radio"
                                            name="printer_setting" id="local_printer">
                                        <span class="lbl"></span> <b>Local printer</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                <div class="ncc_radio">
                                    <label>
                                        <input class="ace" <?php if ($_smarty_tpl->tpl_vars['setup']->value['is_cloud_printer']==1) {?>checked<?php }?> type="radio"
                                            name="printer_setting" id="cloud_printer">
                                        <span class="lbl"></span> <b>Google cloud printer</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                <div class="ncc_radio">
                                    <label>
                                        <input class="ace" <?php if ($_smarty_tpl->tpl_vars['setup']->value['is_cloud_printer']==2) {?>checked<?php }?> type="radio"
                                            name="printer_setting" id="epson_printer">
                                        <span class="lbl"></span> <b>Epson TM Intelligent</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 top-10">
                            <div id="hd-google-cloud-printer"
                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered <?php if ($_smarty_tpl->tpl_vars['setup']->value['is_cloud_printer']!=1) {?>hide<?php }?>">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-centered">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 top-10">
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 top-10 text-right">
                                        <?php if ($_smarty_tpl->tpl_vars['setup']->value['google_access_token']=='') {?>
                                            <button id="btn_connect_app_signin" class="btn btn-primary btn-width">Connect
                                                Google Cloud Print</button>
                                            <div class="g-signin2 hide" id="hide_btn_google_connect"
                                                data-onsuccess="onSignIn" data-theme="dark"></div>
                                        <?php } else { ?>
                                            <button id="btn_connect_app_signout"
                                                class="btn btn-primary btn-width">Disconnect Google Cloud Print</button>
                                        <?php }?>
                                    </div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['setup']->value['google_access_token']!='') {?>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-centered">
                                        <div class="col-sm-12 col-xs-12 top-10">
                                            <table class="table table-responsive table-bordered table-striped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lbShop'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lbPrinterName'];?>
</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $_smarty_tpl->tpl_vars['tablePrinter']->value;?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 text-center">
                                            <button id="btn_update_printer_id"
                                                class="btn btn-primary btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <div id="hd-epson-printer"
                                class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered <?php if ($_smarty_tpl->tpl_vars['setup']->value['is_cloud_printer']!=2) {?>hide<?php }?>">
                                <div class="col-sm-12 col-xs-12 top-10">
                                    <table class="table table-responsive table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lbShop'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lbPrinterIP'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_lbPrinterName'];?>
</td>
                                                <td>@</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $_smarty_tpl->tpl_vars['tableEpson']->value;?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 text-center">
                                    <button id="btn_update_printer_epson"
                                        class="btn btn-primary btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                                </div>
                            </div>
                        </div>

                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_accoutingSetting'];?>
</h4>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                            <b><?php echo $_smarty_tpl->tpl_vars['lang']->value['tt_allowZeroSell'];?>
</b>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <label class="pull-right">
                                <input class="ace ace-switch ace-switch-4" <?php if ($_smarty_tpl->tpl_vars['setup']->value['allow_zero_sell']==1) {?>checked<?php }?>
                                    type="checkbox" class="type_checked" name="type" id="allow_zero_sell" />
                                <span class="lbl"></span>
                            </label>
                        </div>
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Thuế VAT mặc định</h4>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right top-5">
                            Giá trị thuế VAT mặc định:
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                            <input id="taxs" class="form-control" type="number" value="<?php echo $_smarty_tpl->tpl_vars['setup']->value['taxs'];?>
" />
                        </div>
                        <div class="top-15 col-sm-12">
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysSetAuto'];?>

                            <!--Cài đặt phụ thu-->
                        </h4>
                        <table class="table-responsive table-striped table table-bordered top-20">
                            <thead>
                                <tr class="text-center">
                                    <th width="16%">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysSur'];?>

                                        <!--Phụ thu (%)-->
                                    </th>
                                    <th>
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_liaSto'];?>

                                        <!--Cửa hàng-->
                                    </th>
                                    <th class="text-center">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysTimeFrame'];?>

                                        <!--Giờ áp dụng-->
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="list-shop-surcharge">
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                    <tr>
                                        <td>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center top-5">
                                                <label>
                                                    <input <?php if ($_smarty_tpl->tpl_vars['item']->value['surcharge_on']=='1') {?>checked<?php }?>
                                                        id="surcharge_on_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                        class="ace surcharge_on" type="checkbox" value="" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-center">
                                                <input id="surcharge_percent_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" placeholder="%"
                                                    class="form-control text-right surcharge_percent" type="text"
                                                    value="<?php echo $_smarty_tpl->tpl_vars['item']->value['surcharge_percent'];?>
" />
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                        </td>
                                        <td class="text-center">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center top-5">
                                                Từ
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <select id="surcharge_from_hour_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                    class="form-control surcharge_from_hour">
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 23+1 - (0) : 0-(23)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <option <?php if ($_smarty_tpl->tpl_vars['item']->value['surcharge_from_hour']==$_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                            <?php echo sprintf("%02d",$_smarty_tpl->tpl_vars['i']->value);?>
</option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <select id="surcharge_from_minute_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                    class="form-control surcharge_from_minute">
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <option <?php if ($_smarty_tpl->tpl_vars['item']->value['surcharge_from_minute']==$_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?>
                                                            value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo sprintf("%02d",$_smarty_tpl->tpl_vars['i']->value);?>
</option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center top-5">
                                                đến
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <select id="surcharge_to_hour_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                    class="form-control surcharge_to_hour">
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 23+1 - (0) : 0-(23)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <option <?php if ($_smarty_tpl->tpl_vars['item']->value['surcharge_to_hour']==$_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                            <?php echo sprintf("%02d",$_smarty_tpl->tpl_vars['i']->value);?>
</option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <select id="surcharge_to_minute_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                    class="form-control surcharge_to_minute">
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <option <?php if ($_smarty_tpl->tpl_vars['item']->value['surcharge_to_minute']==$_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                                            <?php echo sprintf("%02d",$_smarty_tpl->tpl_vars['i']->value);?>
</option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center top-20">
                            <button id="btn_surcharge_edit" class="btn btn-primary btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_update'];?>
</button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                        </div>
                    </div>

                    <?php if (isset($_smarty_tpl->tpl_vars['lShops']->value)) {?>
                        <div class="col-sm-10 col-sm-push-1 top-15 border-b hide">
                            <h4 class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_offlineMode'];?>

                                <!-- Chế độ offline-->
                            </h4>
                            <div class="text-center" style="padding:5px 0px;color:#555"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysText'];?>

                                <!--(*) Khi bị ngắt kết nối Internet, chế độ Offline sẽ được kích hoạt và chỉ có máy chủ mới có thể duy trì hoạt động trong lúc này.-->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table-responsive table-striped table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_liaSto'];?>

                                                <!--Cửa hàng-->
                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_offlineMode'];?>

                                                <!-- Chế độ offline-->
                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysCom'];?>

                                                <!--Máy chủ-->
                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysOS'];?>

                                                <!--Hệ điều hành-->
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="list_shop_master">
                                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                            <tr>
                                                <td class="text-left">
                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                                </td>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['online_status']>0) {?>
                                                        <label class="pull-center inline " val="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                            <input disabled id="enable_offline_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" checked=""
                                                                type="checkbox" class="enabled_offline ace ace-switch ace-switch-4"
                                                                value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                            <span class="lbl middle"></span>
                                                        </label>
                                                    <?php } else { ?>
                                                        <label class="pull-center inline enabled_offline" val="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                            <input disabled id="enable_offline_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="checkbox"
                                                                class="enabled_offline ace ace-switch ace-switch-4"
                                                                value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                            <span class="lbl middle"></span>
                                                        </label>
                                                    <?php }?>
                                                </td>
                                                <td id="master_name_holder_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['master_name']=='') {?>
                                                        <button disabled id="btn_sl_master_device_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                                            onclick="select_master_device( <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 )" class="btn btn-default">
                                                            <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sysSelect'];?>

                                                            <!--Chọn-->
                                                        </button>
                                                    <?php } else { ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['master_name'];?>

                                                    <?php }?>
                                                </td>
                                                <td id="master_info_holder_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['master_info']!='') {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['master_info'];?>

                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php }?>

                    <div class="col-sm-10 col-sm-push-1 top-15 border-b">
                        <h4 class="title">Cài đặt lí do thu/chi gia hạn tài khoản</h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center top-20">
                            <select id="shop_id" class="form-control" type="text" name="">
                                <option value="">Tất cả chi nhánh</option>
                                <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                            </select>
                            <div class="col-lg-4 top5">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="col-lg-12 col-sm-12">
                                        - Lí do thu:
                                    </div>
                                    <div class="form-search">
                                        <input id="txt_treasurer" type="text" name="" placeholder="Lí do thu"
                                            value="">
                                        <button id="btn_treasurer"><span
                                                class="icon-cate icon-other-x hidden"></span></button>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-4 top5">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="col-lg-12 col-sm-12">
                                        - Lí do xuất:
                                    </div>
                                    <div class="form-search">
                                        <input id="txt_treasurer_group" type="text" name="" placeholder="Lí do xuất"
                                            value="">
                                        <button id="btn_treasurer_group"><span
                                                class="icon-cate icon-other-x hidden"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
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
/js/js_act/setting_pos.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php if ($_smarty_tpl->tpl_vars['setup']->value['google_access_token']=='') {?>
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/cloudprint">
    <meta name="google-signin-client_id" content="568321957859-oa6cb4nsnjpa2336p9cdrfpvrkv4mpil.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<?php }?>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/epos-2.0.0.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
