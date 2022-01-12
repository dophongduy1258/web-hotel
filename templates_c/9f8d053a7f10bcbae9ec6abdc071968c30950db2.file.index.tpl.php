<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 02:39:32
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/treasurer/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1343790899610f801aa371e3-47647858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f8d053a7f10bcbae9ec6abdc071968c30950db2' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/treasurer/index.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1343790899610f801aa371e3-47647858',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f801ab027d0_81921327',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lShops' => 0,
    'i' => 0,
    'item' => 0,
    'session' => 0,
    'str_permission' => 0,
    'lang' => 0,
    'opt_method_payment' => 0,
    'opt_treasurer_group' => 0,
    'opt_treasurer_account_no' => 0,
    'opt_treasurer_account_co' => 0,
    'opt_treasurer_report' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f801ab027d0_81921327')) {function content_610f801ab027d0_81921327($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container top15">
    <div class="col-sm-12 col-xs-12 text-center">
        <span class="font-size-20 uppercase">Chi nhánh </span>
        <div class="btn-group treasurer-shop-sl text-left">
            <select multiple class="form-control text-left" id="shop_id">
                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <option <?php if ($_smarty_tpl->tpl_vars['i']->value==1) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                    <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                <?php } ?>
            </select>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right text-right-treasurer">
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurer_indexadd_in:'))!==false) {?>
                        <button id="btn_add_thu" class="btn btn_w btn-success"><i
                                class="glyphicon glyphicon-plus-sign font-size-16"></i> Tạo giao dịch thu</button>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurer_indexadd_out:'))!==false) {?>
                        <button id="btn_add_chi" class="btn btn_w btn-danger"><i
                                class="glyphicon glyphicon-plus-sign font-size-16"></i> Tạo giao dịch chi</button>
                    <?php }?>
                </div>
                <div style="clear: both;"></div>
                <h4 class=" text-center top-15"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_listTrans'];?>

                    <!-- DANH SÁCH GIAO DỊCH -->
                </h4>
                <div class="top-5">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <div class="input-group input-group-small">
                            <input id="from_date" type="text" class="form-control"
                                value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
" name="from_date" placeholder="Từ ngày"
                                aria-describedby="sizing-addon1">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <div class="input-group input-group-small">
                            <input id="to_date" type="text" class="form-control" name="to_date" placeholder="Đến ngày"
                                aria-describedby="sizing-addon1">
                            <span class="input-group-addon" id="sizing-addon1">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select multiple id="hinh_thuc" class="form-control">
                            <option selected value="">Tất cả hình thức</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_method_payment']->value;?>

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select id="loai" class="form-control">
                            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||((strpos($_smarty_tpl->tpl_vars['str_permission']->value,':view_earning:'))!==false&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':view_spending:'))!==false)) {?>
                                <option value="">Tất cả thu/ chi</option>
                                <option value="T"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transEarn'];?>
</option>
                                <option value="C"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transSpend'];?>
</option>
                            <?php } elseif ((strpos($_smarty_tpl->tpl_vars['str_permission']->value,'view_earning'))!==false) {?>
                                <option value="T"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transEarn'];?>
</option>
                            <?php } elseif ((strpos($_smarty_tpl->tpl_vars['str_permission']->value,'view_spending'))!==false) {?>
                                <option value="C"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transSpend'];?>
</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_treasurer_group_id" class="form-control">
                            <option selected value="">Tất cả lý do</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_treasurer_group']->value;?>

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_treasurer_group_code" class="form-control">
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_treasurer_type" class="form-control">
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_account_no" class="form-control">
                            <option selected value="">Tất cả tài khoản nợ</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_treasurer_account_no']->value;?>

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_account_co" class="form-control">
                            <option selected value="">Tất cả tài khoản có</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_treasurer_account_co']->value;?>

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select size="1" multiple id="f_treasurer_report" class="form-control">
                            <option selected value="">Tất cả loại báo cáo</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_treasurer_report']->value;?>

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                        <select id="approved_status" class="form-control">
                            <option selected value="">Tất cả phiếu</option>
                            <option value="1">Phiếu đã duyệt</option>
                            <option value="0">Phiếu chưa duyệt</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                        <div class="input-group1 input-group-small">
                            <input id="txt_searching" type="text" class="form-control" name=""
                                placeholder="Tìm theo mã tham chiếu/ người nộp nhận">
                            <button id="btn_view" class="btn btn-primary btn_filter"
                                style="position: absolute;right: 4px;z-index: 0;top: 0px;border-radius: 0px 4px 4px 0px;"><span
                                    class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>

                            </button>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 top-5">
                        <button id="btn_download" class="btn btn-primary form-control"><span
                                class="glyphicon glyphicon-cloud-download"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_download'];?>
 </button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
                    <div class="row">
                        <div class="panel panel-default" style="box-shadow: none;border: none;">
                            <!-- Default panel contents -->
                            <div class="panel-heading col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transStart'];?>

                                        <!-- Số dư đầu kỳ -->: <b class="color-success" id="dau_ky"></b>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sumEarn'];?>

                                        <!-- Tổng thu -->: <b class="color-primary" id="tong_thu"></b>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sumSpend'];?>

                                        <!-- Tổng chi -->: <b class="color-red" id="tong_chi"></b>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transEnd'];?>

                                        <!-- Số dư cuối kỳ -->: <b class="color-success" id="cuoi_ky"></b>
                                    </div>
                                </div>
                            </div>
                            <!-- Table -->
                            <div class="treasurer-list col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding top5">
                                <div class="table-responsive">
                                    <table class="table table-bordered table_mau">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">ID</th>
                                                <th width="9%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAt'];?>

                                                    <!-- Thời gian -->
                                                </th>
                                                <th>
                                                    Chi nhánh
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAlias'];?>

                                                    <!-- Tham chiếu -->
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAmount'];?>

                                                    <!-- Số tiền -->
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transType'];?>

                                                    <!-- Hình thức -->
                                                </th>
                                                <th width="10%">
                                                    Mã lý do
                                                </th>
                                                <th width="10%">
                                                    Lý do
                                                </th>
                                                <th width="10%">
                                                    TK nợ
                                                </th>
                                                <th width="10%">
                                                    TK có
                                                </th>
                                                <th width="10%">
                                                    Nhóm lý do
                                                </th>
                                                <th width="10%">
                                                    Nhóm báo cáo
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transCreater'];?>

                                                    <!-- Người tạo -->
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transNopNhan'];?>

                                                    <!-- Người nộp/nhận -->
                                                </th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transNote'];?>

                                                    <!-- Ghi chú -->
                                                </th>
                                                <th>
                                                    Xác nhận
                                                </th>
                                                <th width="80px">@</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_order_online" id="list_transactions">
                                            <!--List transaction-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="paging" id="paging">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--BEGIN Modal add transaction-->
<div class="modal fade" id="modal_modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T" id="title_modal_add_treasurer">Thêm Giao dịch</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - Cửa hàng:
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <select class="form-control" id="t_shop_id">
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right hide">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transCode'];?>
:
                                        <!-- Mã giao dịch -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5 hide">
                                        <input id="t_MA" disabled value="" class="form-control" type="text ">
                                    </div>

                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transType'];?>
:
                                        <!-- Hình thức -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10">
                                        <select id="t_hinh_thuc" class="form-control">
                                            
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - Lý do:
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <div id="treasurer_group" class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <select id="treasurer_group_id" class="form-control">
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - Tài khoản nợ
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <div class="">
                                            <input id="account_no" value="" account_no_id=""
                                                class="form-control" type="text ">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - Tài khoản có
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <div class="">
                                            <input id="account_co" value="" account_co_id=""
                                                class="form-control" type="text ">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div id="info_liabilities" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding"
                                    style="display:none">
                                    <div id="lb_debt_customer"
                                        class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - Khách hàng:
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <input id="t_User" placeholder="Email/Mobile" type="text"
                                            class="form-control autosear">
                                        <i title="Xóa khách hàng này chọn lại"
                                            class="remove-item customer icon-cate icon-other-x square_x"></i>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAmount'];?>
:
                                        <!-- Số tiền -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5 nopadding">
                                        <div class="col-sm-8 col-xs-8">
                                            <input id="t_so_tien_liabilities"
                                                onkeyup="input_number2('#t_so_tien_liabilities');" value=""
                                                class="form-control" type="text">
                                            <input id="lExcept" value="" class="hidden" type="text" />
                                        </div>
                                        <div class="col-sm-4 col-xs-4 top-5 nopadding">
                                            <a id="detail_liabilities" href="javascript:;">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="info_treasurer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAlias'];?>
:
                                        <!-- Mã tham chiếu -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <input id="t_MATT" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAlias'];?>
" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transAmount'];?>
:
                                        <!-- Số tiền -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <input id="t_so_tien" onkeyup="input_number2('#t_so_tien');" value=""
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transNopNhan'];?>
:
                                        <!-- Người nộp/nhận -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <input id="t_nop_nhan" value="" class="form-control" key="nop_nhan" type="text">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right ">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transDate'];?>
:
                                        <!-- Ngày -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                        <input id="t_ngay" value="<?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
"
                                            class="form-control" type="text">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right hide">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transCreater'];?>
:
                                        <!-- Người tạo GD -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5 hide">
                                        <input disabled id="t_nguoi_tao" value="<?php echo $_smarty_tpl->tpl_vars['session']->value['username'];?>
" key="nguoi_tao"
                                            class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-10 text-right">
                                        - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_transNote'];?>
:
                                        <!-- Ghi chú -->
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 top-5">
                                        <textarea id="t_ghi_chu" key="ghi_chu" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                

                                <div class="avatar_thumbs row">
                                    <a id="hold_img_show" class="col-md-2"
                                        style="width: 100px; height: 80px; display: inline-block;"><img
                                            src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/clicktoup.jpg" style="opacity:0.3;cursor:pointer;"
                                            class="img-responsive"></a>

                                </div>
                                <input class="hide" hide id="file_uploading" type="file" name="files" value=""
                                    accept="image/x-png,image/gif,image/jpeg" />
                                <div class="avatar_thumbs row">
                                    <a id="hold_file_show" class="col-md-2"
                                        style="width: 100px; height: 80px; display: inline-block;"><img filename=""
                                            src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/attachno.png" style="opacity:0.3;cursor:pointer;"
                                            class="file-responsive"></a>

                                </div>
                                <input class="hide" hide id="file_chungtu_uploading" type="file" name="files" value=""
                                    accept=".doc, .docx, .ppt, .pptx, .xls, .xlsx, .pdf" />

                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-right btn-success1">
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'treasurer_indexadd'))!==false) {?>
                        <button data-dismiss="modal" id="t_btn_reset"
                            class="btn btn-default btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                        <button id="t_btn_submit" class="btn btn-primary btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
                    <?php } else { ?>
                        <button data-dismiss="modal" id="t_btn_reset"
                            class="btn btn-default btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                        <button disabled class="btn btn-default btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Modal add transaction-->

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
                        <span class="pay" id="customer_pay">7,000,000</span>/ <span id="total_left"
                            class="total">13,000,000</span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-table">
                        <table class="table table-responsive table-bordered table-">
                            <thead>
                                <tr>
                                    <td><label><input class="ace" type="checkbox" /> <span class="lbl"></span></label>
                                    </td>
                                    <td>ID</td>
                                    <td>MATT</td>
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

<!--BEGIN Modal member group-->
<div class="modal fade" id="modal_groups" tabindex="-1" role="dialog" aria-spanledby="myModalspan" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-medium">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Lý do thu/ chi</h4>
            </div>
            <div class="modal-body">

                <div class="container">

                    <ul class="nav nav-tabs nav-storing">

                        <li id="tab_thu" class="tab-modify"><a data-toggle="tab" href="#lydothuchi">Lý do thu</a></li>
                        <li id="tab_chi" class="tab-modify"><a data-toggle="tab" href="#lydothuchi">Lý do chi</a></li>
                        <li id="tab_loai_thu_chi" class="tab-modify"><a data-toggle="tab" href="#loaithuchi">Loại thu/
                                chi</a></li>

                    </ul>

                    <div class="tab-content">

                        <div id="lydothuchi" class="tab-pane fade in active">
                            <div class="row modal-tag-height">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-sm-12">
                                        - Chức năng dùng quản lý lý do thu/ chi
                                    </div>
                                    <div class="col-sm-12 top-10">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-stripped text-center table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã định khoản</th>
                                                    <th>Lý do</th>
                                                    <th>Loại</th>
                                                    <th class="hide">Thu/ Chi</th>
                                                    <th>@</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_groups">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="loaithuchi" class="tab-pane fade in">
                            <div class="row modal-tag-height">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <div class="col-sm-12">
                                            - Chức năng dùng quản lý loại thu/ chi cho lý do thu/ chi
                                        </div>
                                        <div class="col-sm-12 top-10">
                                        </div>
                                        <table class="table table-stripped text-center table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>@</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_treasurer_type">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="modal-footer">
                    <div class="bootstrap-dialog-footer">
                        <div class="bootstrap-dialog-footer-buttons">
                            <button data-dismiss="modal" class="btn btn_w btn-primary"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END Modal member group-->

<a id="btn_print_link" print-url="" href="javascript:;"></a>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/treasurer_index.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0') {?>
        button.delete_alt {
            display: none !important;
        }

    <?php }?>
</style><?php }} ?>
