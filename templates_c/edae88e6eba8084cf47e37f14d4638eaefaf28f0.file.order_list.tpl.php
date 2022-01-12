<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 02:39:56
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/order_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2091807167610f9786f42189-20304045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edae88e6eba8084cf47e37f14d4638eaefaf28f0' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/order_list.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2091807167610f9786f42189-20304045',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f978707bb10_55459967',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'listPayment' => 0,
    'item' => 0,
    'opt_users' => 0,
    'opt_delivery_steps' => 0,
    'opt_showroom' => 0,
    'lang' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f978707bb10_55459967')) {function content_610f978707bb10_55459967($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <div class="row">
        <div class="col-sm-12  col-xs-12 nopadding manage_report">
            <div class="col-sm-12  col-xs-12 input-date-ex-rp">
                <div class="col-sm-2 col-xs-6">
                    <div class="top-5">
                        <select id="ods_shop_id" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="">
                        <input id="ods_keyword" type="text" name="" value="" placeholder="Tên KH/ ID KH/ Order ID"
                            class="" hide-placeholder="">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="">
                        <input id="ods_from" type="text" name="" value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
"
                            placeholder="Từ ngày" class="" hide-placeholder="">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="">
                        <input id="ods_to" type="text" name="" value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
"
                            placeholder="Từ ngày" class="" hide-placeholder="">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6 dr">
                    <select multiple id="ods_payment_type" class="">
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
                <div class="col-sm-2 col-xs-6">
                    <select id="ex_created_by" class="form-control top-5">
                        <option value="">Tất cả user</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_users']->value;?>

                    </select>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <select id="ods_delivery_steps" class="form-control top-5">
                        <option value="">Tất cả trạng thái giao</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_delivery_steps']->value;?>

                    </select>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <select id="ods_showroom_id" class="form-control top-5">
                        <option value="">Tất cả Showroom đơn hàng</option>
                        <option value="0">Không xác định Showroom</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_showroom']->value;?>

                    </select>
                </div>
                <div class="col-sm-1 col-xs-3">
                    <button id="ods_btn_view"
                        class="btn-success color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>
</button>
                </div>
                <div class="col-sm-1 col-xs-3">
                    <button id="ods_btn_dl"
                        class="btn-primary color-white btn form-control top-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_download'];?>
</button>
                </div>
            </div>
            <div class="col-sm-12  col-xs-12 top-10">
                <div id="ods_lpayment" class="col-sm-2 col-xs-6">
                    <b>Tổng cộng:</b>
                    <b class="color-red" id="ods_total_revenue"></b>/ <b id="ods_total_record"></b> đơn
                </div>
            </div>
            <div id="processing_uploaded" class="col-sm-12 col-xs-12 nopadding processing_uploaded top10">
            </div>
            <div class="col-sm-12  col-xs-12 nopadding top10 content-ex-bao-cao">
                <table class="table table-responsive table-stripped text-center table-bg-no order">
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
            <div class="col-sm-12 col-sm-12">
                <div class="paging text-center" id="ods_page_html">
                </div>
            </div>
        </div>
        <div class="col-sm-12  col-xs-12 ">
        </div>
    </div>
</div>

<!--BEGIN Modal import file excel-->
<div class="modal fade" id="modal_change_payment" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Cập nhật hình thức thanh toán</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-xs-12">
                        
                        <div class="col-sm-12 col-sm-12 col-xs-12 top-10">
                            <div class="col-sm-4 col-xs-12">
                                - Tổng đơn: <span id="total_value_order" class=""></span>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                - Tổng cập nhật: <span id="total_value_order_modify" class="color-green"></span>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                - Còn lại: <span id="total_value_order_left" class="color-red"></span>
                            </div>
                        </div>

                        <div class="col-sm-12 col-sm-12 col-xs-12 top-10">
                            <div id="hd_table_import_excel_menu" class="col-sm-12 col-sm-12 col-xs-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hình thức</th>
                                            <th>Số tiền</th>
                                            <th width="6%">@</th>
                                        </tr>
                                    </thead>
                                    <tbody id="html_list">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <div class="modal-footer top-10">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal">Hủy</button>
                <button type="button" id="btn_payment_modify" class="btn btn-primary btn-width btn-success">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
<!--END EDIT -->

<!--BEGIN Modal delivery history step/ edit-->
<div class="modal fade" id="modal_delivery_steps" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Chi tiết trạng thái giao hàng</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-xs-12">

                        <div class="col-sm-12 col-sm-12 col-xs-12 top-10">
                            <div class="col-sm-2 col-xs-12 top-5 text-right">
                            Nội dung:
                            </div>
                            <div class="col-sm-7 col-xs-12">
                               <input id="new_delivery_steps" class="form-control" value="" >
                            </div>
                            <div class="col-sm-1 col-xs-12 top-5">
                                <label>
                                    <input id="new_is_hidden" type="checkbox" class="ace" value="" >
                                    <span class="lbl"></span>
                               </label>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <button id="btn_new_delivery_steps" class="btn btn-success btn-width">
                                    <i class="glyphicon glyphicon-plus-sign"></i> Thêm
                                </button>
                            </div>
                        </div>

                        <div class="col-sm-12 col-sm-12 col-xs-12 top-10">
                            <div id="hd_table_import_excel_menu" class="col-sm-12 col-sm-12 col-xs-12">
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th width="6%">STT</th>
                                            <th width="14%">Ngày</th>
                                            <th>Nội dung</th>
                                            <th>Người tạo</th>
                                            <th>Ẩn đi</th>
                                            <th width="15%">@</th>
                                        </tr>
                                    </thead>
                                    <tbody id="html_delivery_steps">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer top-10">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!--END Modal delivery history step/ edit-->

<!--END Modal change showroom-->
<div class="modal fade" id="modal_showroom" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Chuyển đơn hàng đến Showroom</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-xs-12">

                        <div style="min-height: 400px;" class="col-sm-12 col-sm-12 col-xs-12 top-10">
                            <div class="col-sm-2 col-xs-12 top-5 text-right">
                                Chọn Showroom:
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <select id="new_showroom" class="form-control chosen-box">
                                    <option value="0">Không xác định Showroom</option>
                                    <?php echo $_smarty_tpl->tpl_vars['opt_showroom']->value;?>

                                </select>
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <button id="btn_update_showroom" class="btn btn-success btn-width">
                                    <i class="fa fa-pencil-square-o"></i> Cập nhật
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer top-10">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!--END Modal change showroom-->

 <div class="hide">
     <input type="file" name="files" id="avatar_file" value="" accept=".png,.jpg,.jpeg,.gif" />
     <input type="text" name="" id="output_cus_avatar" value="" />
     <!--For upload chung tu order-->
     <input type="file" name="files" id="upload_chung_tu" value=""
         accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" />
 </div>
 
<a id="btn_print_link" print-url="" href="javascript:;"></a>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
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
/js/js_act/report_order_list.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
