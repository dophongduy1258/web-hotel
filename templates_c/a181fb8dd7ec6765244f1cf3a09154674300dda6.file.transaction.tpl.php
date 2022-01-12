<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 02:34:20
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/transaction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1446774349610f7e594f1d55-18964256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a181fb8dd7ec6765244f1cf3a09154674300dda6' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/transaction.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1446774349610f7e594f1d55-18964256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f7e5958eb20_11298184',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'wallet_id' => 0,
    'noWallet' => 0,
    'totalCashFlow' => 0,
    'lWallet' => 0,
    'item' => 0,
    'session' => 0,
    'str_permission' => 0,
    'opt_wallet_all' => 0,
    'opt_group' => 0,
    'opt_transaction_type' => 0,
    'setup' => 0,
    'opt_wallet' => 0,
    'lang' => 0,
    'dGlobal' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f7e5958eb20_11298184')) {function content_610f7e5958eb20_11298184($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular-messages.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular-sanitize.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/libraries/ui-bootstrap-tpls-2.5.0.js"></script>

<div ng-app="ERP">
    <div class="primary-order1 primary-order-1">
        <div id="walletTransaction" class="container" ng-controller="walletTransaction" ng-init="filterElements.wallet_id=<?php echo $_smarty_tpl->tpl_vars['wallet_id']->value;?>
;filter()">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="row text-center">
                        <div class="col-sm-2 col-xs-6 text-center top-10">
                            Số loại ví: <b id="total_package"><?php echo $_smarty_tpl->tpl_vars['noWallet']->value;?>
</b>
                        </div>
                        <div class="col-sm-2 col-xs-6 text-center top-10">
                            Đang lưu thông: <b
                                id="total_quantity"><?php echo number_format_replace_cog($_smarty_tpl->tpl_vars['totalCashFlow']->value,0,".",",");?>
</b>
                        </div>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lWallet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <div class="col-sm-2 col-xs-6 text-center top-10">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_name'];?>
 : <b><?php echo number_format(abs($_smarty_tpl->tpl_vars['item']->value['amount']),0,".",",");?>
</b>
                            </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
            <hr>
            <div class="row search-order1 ">

		        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallet_transactiondeposit:'))!==false) {?>
                <div class="col-sm-2 col-xs-12">
                    <button id="btn_deposit" class="btn btn-success form-control">
                        Nạp
                    </button>
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallet_transactionwithdraw:'))!==false) {?>
                <div class="col-sm-2 col-xs-12">
                    <button id="btn_withdraw" class="btn btn-danger form-control">
                        Rút
                    </button>
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallettransaction:wallet_transactionimport_excel:'))!==false) {?>
                <div class="col-sm-2 col-xs-12">
                    <button id="btn_import_excel" class="btn btn-info form-control">
                        Chuyển hàng loạt
                    </button>
                </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallettransaction:wallet_transactionimport_excel_withdraw:'))!==false) {?>
                <div class="col-sm-2 col-xs-12">
                    <button id="btn_import_excel_withdraw" class="btn btn-danger form-control">
                        Rút hàng loạt
                    </button>
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallet_transactiontransfers:'))!==false) {?>
                <div class="col-sm-3 col-xs-12">
                    <button id="btn_transfers" class="btn btn-warning form-control">
                        Chuyển người dùng đến người dùng
                    </button>
                </div>
                <?php }?>
                
            </div>
            <hr>
            <div class="row search-order search-order1 extend">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input id="keyword" ng-keyup="$event.keyCode == 13 ? filter():false" type="text"
                        ng-model="filterElements.keyword" name="" placeholder="Tên/ Số điện thoại" value="">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select id="filter_wallet_id" ng-change="filterElements.page = currentPage = 1; filter()"
                        ng-model="filterElements.wallet_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['opt_wallet_all']->value;?>

                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select ng-change="filterElements.page = currentPage = 1; filter()"
                        ng-model="filterElements.member_group" class="form-control">
                        <option value="">Tất cả nhóm khách hàng</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_group']->value;?>

                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <input class="input-datepicker" ng-change="filterElements.page = currentPage = 1; fitler()"
                        ng-model="filterElements.from" id="from" type="text" name="" placeholder="Từ ngày">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <input class="input-datepicker" ng-change="filterElements.page = currentPage = 1; filter()" id="to"
                        ng-model="filterElements.to" type="text" name="" placeholder="Đến ngày">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 dr dr300">
                    <select id="transaction_type" multiple class="form-control">
                        <option selected value="">Tất cả loại giao dịch</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select ng-change="filterElements.page = currentPage = 1; filter()"
                        ng-model="filterElements.filter_type" class="form-control">
                        <option value="">Tất cả loại giao dịch</option>
                        <option value="0">GD tổng chuyển ra/ thu về</option>
                        <option value="-1">GD tổng chuyển ra</option>
                        <option value="1">GD tổng thu về</option>
                        <option value="2">Giao dịch chuyển</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <span ng-click="filterElements.page = currentPage = 1; filter()" id="btn_view" class="icon1"><img
                            src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/eye.png" width="30"></span>
                    <span id="btn_dl" ng-click="dl()" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png"
                            width="30"></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="col-sm-12 text-center">
                        <div class="col-sm-3 col-xs-6 text-center">
                            Tổng số giao dịch: <b id="total_package">
                                <<?php ?>%totalItems|number_format_replace_cog%<?php ?>>
                            </b>
                        </div>
                        <div class="col-sm-4 col-xs-6 text-center">
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            Giá trị giao dịch: <b id="total_quantity">
                                <<?php ?>%totalValue|number_format_replace_cog%<?php ?>>
                            </b>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-bg ng-cloak">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Ngày GD</th>
                            <th>Ví</th>

                            <th ng-if="filterElements.filter_type == '' || filterElements.filter_type == '2'">Người
                                chuyển</th>
                            <th ng-if="filterElements.filter_type == '' || filterElements.filter_type == '2'">SĐT chuyển
                            </th>
                            <th ng-if="filterElements.filter_type == '' || filterElements.filter_type == '2'">Người nhận
                            </th>
                            <th ng-if="filterElements.filter_type == '' || filterElements.filter_type == '2'">SĐT nhận
                            </th>

                            <th ng-if="filterElements.filter_type != '' && filterElements.filter_type != '2'">User Tổng
                            </th>
                            <th ng-if="filterElements.filter_type != '' && filterElements.filter_type != '2'">SĐT tổng
                            </th>

                            <th ng-if="filterElements.filter_type == '-1'">Người nhận</th>
                            <th ng-if="filterElements.filter_type == '-1'">SĐT nhận</th>

                            <th ng-if="filterElements.filter_type == '1'">Người chuyển</th>
                            <th ng-if="filterElements.filter_type == '1'">SĐT chuyển</th>

                            <th ng-if="filterElements.filter_type == '0'">Người chuyển/ nhập</th>
                            <th ng-if="filterElements.filter_type == '0'">SĐT chuyển/ nhập</th>

                            <th width="8.6%" class="color-red" ng-if="filterElements.filter_type == '0'">-</th>
                            <th width="8.6%" class="color-green" ng-if="filterElements.filter_type == '0'">+</th>
                            <th ng-if="( filterElements.filter_type == '' || filterElements.filter_type == '2' )">Số
                                điểm</th>
                            <th width="8.6%"
                                ng-if="filterElements.filter_type == '1' || filterElements.filter_type == '-1'">-</th>
                            <th width="8.6%"
                                ng-if="filterElements.filter_type == '1' || filterElements.filter_type == '-1'">+</th>
                            <th>Chú thích</th>
                            <th>Bởi Admin</th>
                            <th>@</th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        <tr ng-repeat="item in lItems track by $index">
                            <td><b>
                                    <<?php ?>%item.id%<?php ?>>
                                </b></td>
                            <td>
                                <<?php ?>%item.created_at*1000|date:'dd /MM/yyyy HH:mm'%<?php ?>>
                            </td>
                            <td>
                                <<?php ?>%item.wallet_name%<?php ?>>
                            </td>

                            <td class="text-left"
                                ng-if="filterElements.filter_type != '1' && filterElements.filter_type != '0'"><b>
                                    <<?php ?>%item.from_fullname%<?php ?>>
                                </b></td>
                            <td ng-if="filterElements.filter_type != '1' && filterElements.filter_type != '0'">
                                <<?php ?>%item.from_mobile%<?php ?>>
                            </td>
                            <td class="text-left"
                                ng-if="filterElements.filter_type != '1' && filterElements.filter_type != '0'"><b>
                                    <<?php ?>%item.to_fullname%<?php ?>>
                                </b></td>
                            <td ng-if="filterElements.filter_type != '1' && filterElements.filter_type != '0'">
                                <<?php ?>%item.to_mobile%<?php ?>>
                            </td>

                            <td class="text-left"
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client == 1">
                                <b>
                                    <<?php ?>%item.from_fullname%<?php ?>>
                                </b>
                            </td>
                            <td
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client == 1">
                                <<?php ?>%item.from_mobile%<?php ?>>
                            </td>
                            <td class="text-left"
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client == 1">
                                <b>
                                    <<?php ?>%item.to_fullname%<?php ?>>
                                </b>
                            </td>
                            <td
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client == 1">
                                <<?php ?>%item.to_mobile%<?php ?>>
                            </td>

                            <td class="text-left"
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client != 1">
                                <b>
                                    <<?php ?>%item.to_fullname%<?php ?>>
                                </b>
                            </td>
                            <td
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client != 1">
                                <<?php ?>%item.to_mobile%<?php ?>>
                            </td>
                            <td class="text-left"
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client != 1">
                                <b>
                                    <<?php ?>%item.from_fullname%<?php ?>>
                                </b>
                            </td>
                            <td
                                ng-if="(filterElements.filter_type == '1' || filterElements.filter_type == '0') && item.from_client != 1">
                                <<?php ?>%item.from_mobile%<?php ?>>
                            </td>

                            <td class="text-right" ng-if="item.from_client == 1 && filterElements.filter_type == '0' ">
                                <b class="color-red">-<<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b>
                            </td>
                            <td ng-if="item.from_client == 1 && filterElements.filter_type == '0' ">-</td>
                            <td ng-if="item.to_client == 1 && filterElements.filter_type == '0' ">-</td>
                            <td class="text-right" ng-if="item.to_client == 1 && filterElements.filter_type == '0' "><b
                                    class="color-green">+<<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b></td>

                            <td class="text-right" ng-if="filterElements.filter_type == '1' "><b class="color-green">+
                                    <<?php ?>%item.amount|number_format_replace_cog%<?php ?>>
                                </b></td>
                            <td ng-if="filterElements.filter_type == '1' ">-</td>
                            <td ng-if="filterElements.filter_type == '-1' ">-</td>
                            <td class="text-right" ng-if="filterElements.filter_type == '-1' "><b class="color-red">-
                                    <<?php ?>%item.amount|number_format_replace_cog%<?php ?>>
                                </b></td>

                            <td class="text-right"
                                ng-if="item.from_client != 1 && item.to_client != 1 && (filterElements.filter_type == '' || filterElements.filter_type == '2')">
                                <b class="color-orange">-/+ <<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b>
                            </td>
                            <td class="text-right"
                                ng-if="item.from_client == 1 &&  (filterElements.filter_type == '' || filterElements.filter_type == '2')">
                                <b class="color-red">- <<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b>
                            </td>
                            <td class="text-right"
                                ng-if="item.to_client == 1  && (filterElements.filter_type == '' || filterElements.filter_type == '2')">
                                <b class="color-green">+ <<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b>
                            </td>
                            <td class="text-left">
                                <<?php ?>%item.note%<?php ?>>
                            </td>
                            <td class="text-left">
                                <<?php ?>%item.created_by_admin_fullname%<?php ?>>
                            </td>
                            <td class="text-left"><span id="btn_edit"
                                    class="group_func icon-cate icon-other-edit active"
                                    transaction-id="<<?php ?>%item.id%<?php ?>>"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 top-10">
                <ul uib-pagination total-items="totalItems" items-per-page="<?php echo $_smarty_tpl->tpl_vars['setup']->value['perpage'];?>
" ng-model="currentPage"
                    max-size="maxSize" class="pagination" boundary-links="true" rotate="false" previous-text="&lsaquo;"
                    next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"
                    ng-change="filterElements.page = currentPage; filter()"></ul>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalBalance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-small">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="balance_title" class="header-collection">Nạp tiền</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <div class="col-lg-12 top5">

                    <div class="col-lg-12 col-sm-12">
                        - Ví:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select id="wallet_id" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['opt_wallet']->value;?>

                        </select>
                    </div>

                </div>
                <div class="col-lg-12 top5">
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-12 col-sm-12">
                            - Chọn người dùng:
                        </div>
                        <div class="form-search">
                            <input id="txt_search" type="text" name="" placeholder="Họ tên/ SĐT/ Email" value="">
                            <button id="btn_txt"><span class="icon-cate icon-other-x hidden"></span></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Số tiền:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <input id="amount" class="form-control number-format" value="" />
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Mã GD:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select id="type" class="form-control">
                            <option value="">Bỏ trống</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                        </select>
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Ghi chú:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <textarea id="note" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 top-5">
                    <label class="label_name">Hình ảnh/ chứng từ liên quan</label>
                </div>
                <div class="col-lg-12">
                    <div id="before_docs_transaction" class="avatar_thumbs avatar_thumbs_lq col-sm-2">
                        <a onclick="click_file('docs_transaction')" id="load_img_docs_transaction">
                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/upload.png">
                        </a>
                    </div>
                    <input class="hide" name="files" type="file"
                    accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" id="docs_transaction" value="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="btn_execute" class="btn btn-primary btn-width" id="btnPurchase">Hoàn
                    tất</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalTransfers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-small">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="transfers_title" class="header-collection">Chuyển tiền</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <div class="col-lg-12 top5">

                    <div class="col-lg-12 col-sm-12">
                        - Ví:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select id="transfers_wallet_id" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['opt_wallet']->value;?>

                        </select>
                    </div>

                </div>
                <div class="col-lg-12 top5">
                    <div class="col-lg-8 col-sm-12">
                        <div class="col-lg-12 col-sm-12">
                            - Chọn người dùng chuyển:
                        </div>
                        <div class="form-search">
                            <input id="txt_search_from" type="text" name="" placeholder="Họ tên/ SĐT/ Email" value="">
                            <button id="btn_txt_from"><span class="icon-cate icon-other-x hidden"></span></button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="col-lg-12 col-sm-12">
                            - Số dư người dùng chuyển:
                        </div>
                        <div class="form-search">
                            <input id="balance_from_transfer" disabled type="text" name="" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 top5">
                    <div class="col-lg-8 col-sm-12">
                        <div class="col-lg-12 col-sm-12">
                            - Chọn người dùng nhận:
                        </div>
                        <div class="form-search">
                            <input id="txt_search_to" type="text" name="" placeholder="Họ tên/ SĐT/ Email" value="">
                            <button id="btn_txt_to"><span class="icon-cate icon-other-x hidden"></span></button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="col-lg-12 col-sm-12">
                            - Số dư người dùng nhận:
                        </div>
                        <div class="form-search">
                            <input id="balance_to_transfer" disabled type="text" name="" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Số tiền:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <input id="transfers_amount" class="form-control number-format" value="" />
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Mã GD:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select id="type_transfer" class="form-control">
                            <option value="">Bỏ trống</option>
                            <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                        </select>
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Ghi chú:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <textarea id="transfers_note" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 top-5">
                    <label class="label_name">Hình ảnh/ chứng từ liên quan</label>
                </div>
                <div class="col-lg-12">
                    <div id="before_docs_transaction_client" class="avatar_thumbs avatar_thumbs_lq col-sm-2">
                        <a onclick="click_file('docs_transaction_client')" id="load_img_docs_transaction_client">
                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/upload.png">
                        </a>
                    </div>
                    <input class="hide" name="files" type="file"
                    accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" id="docs_transaction_client" value="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="btn_execute_transfers" class="btn btn-primary btn-width" id="btnPurchase">Hoàn
                    tất</button>
            </div>
        </div>
    </div>
</div>


<!--BEGIN Modal import file excel-->
<div class="modal fade" id="modal_upload_excel" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Chuyển khoản hàng loạt</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-12 col-xs-12">
                            <div class="col-sm-4 col-xs-12 top-5 text-center">
                                - Chọn tiệp Excel giao dịch:
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <input type="file" class="form-control" name="" id="file_excel"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    value="">
                            </div>
                            <div class="col-sm-2 col-xs-4 top-5">
                                <p>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/uploads/attachment/FormTransferPoint.xlsx" download>
                                        Tải tiệp mẫu
                                    </a>
                                <p>
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center total_file_excel hidden">
                                - Tổng cộng chuyển:
                            </div>
                            <div class="col-sm-2 col-xs-12 text-center">
                                <div class="total_file_excel hidden">
                                    <input id="total_file_excel" disabled class="form-control" type="text" value="">
                                </div>
                            </div>
                        </div>
                        <hr class="border-bottom" />
                        <div id="hd_select_option" class="col-sm-12 col-xs-12 top-5">
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn người chuyển:
                            </div>
                            <div class="col-sm-4 col-xs-12 text-center">
                                <div class="">
                                    <input id="from_transfer" disabled class="form-control" type="text"
                                        user_id="<?php echo $_smarty_tpl->tpl_vars['dGlobal']->value['user_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dGlobal']->value['fullname'];?>
" width="100%">
                                    <button id="btn_from_transfer"
                                        style="position: absolute; right: 0px; top: 0px; background: none; border: none; font-size: 20px; color: #555; height: 42px; width: 50px;"><span
                                            class="icon-cate icon-other-x hidden"></span></button>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Số dư:
                            </div>
                            <div class="col-sm-2 col-xs-12 text-center">
                                <div class="">
                                    <input id="balance_import_transfer" disabled class="form-control" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div id="hd_select_option" class="col-sm-12 col-xs-12 top-5">
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn ví:
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <select id="import_wallet_id" class="form-control">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_wallet']->value;?>

                                </select>
                            </div>

                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Loại giao dịch:
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <select id="import_transaction_type" class="form-control">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                                </select>
                            </div>

                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <button id="btn_execute_excel" class="btn btn-primary btn-width">Thực hiện
                                    chuyển</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 top-10">
                            <div id="hd_table_import_excel_menu" class="col-sm-12 col-xs-12">
                                <table id="table_import_excel_menu" class="table table-striped">
                                    <tbody id="html_excel">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END Modal import file excel-->

<!--BEGIN Modal import for deposit file excel-->
<div class="modal fade" id="modal_upload_excel_withdraw" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title title_menu" id="title_menu">Rút điểm tài khoản hàng loạt</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-12 col-xs-12">
                            <div class="col-sm-4 col-xs-12 top-5 text-center">
                                - Chọn tiệp Excel danh sách rút:
                            </div>
                            <div class="col-sm-2 col-xs-12">
                                <input type="file" class="form-control" name="" id="file_excel_withdraw"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    value="">
                            </div>
                            <div class="col-sm-2 col-xs-4 top-5">
                                <p>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/uploads/attachment/FormTransferPoint.xlsx" download>
                                        Tải tiệp mẫu
                                    </a>
                                <p>
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center total_file_excel_withdraw hidden">
                                - Tổng cộng rút:
                            </div>
                            <div class="col-sm-2 col-xs-12 text-center">
                                <div class="total_file_excel_withdraw hidden">
                                    <input id="total_file_excel_withdraw" disabled class="form-control" type="text" value="">
                                </div>
                            </div>
                        </div>
                        <hr class="border-bottom" />
                        <div id="hd_select_option_withdraw" class="col-sm-12 col-xs-12 top-5">
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn người nhận:
                            </div>
                            <div class="col-sm-4 col-xs-12 text-center">
                                <div class="">
                                    <input id="from_transfer_withdraw" disabled class="form-control" type="text"
                                        user_id="<?php echo $_smarty_tpl->tpl_vars['dGlobal']->value['user_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dGlobal']->value['fullname'];?>
" width="100%">
                                    <button id="btn_from_transfer_withdraw"
                                        style="position: absolute; right: 0px; top: 0px; background: none; border: none; font-size: 20px; color: #555; height: 42px; width: 50px;"><span
                                            class="icon-cate icon-other-x hidden"></span></button>
                                </div>
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Số dư:
                            </div>
                            <div class="col-sm-2 col-xs-12 text-center">
                                <div class="">
                                    <input id="balance_import_transfer_withdraw" disabled class="form-control" type="text"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div id="hd_select_option_withdraw" class="col-sm-12 col-xs-12 top-5">
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn ví:
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <select id="import_wallet_id_withdraw" class="form-control">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_wallet']->value;?>

                                </select>
                            </div>

                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                - Loại giao dịch:
                            </div>
                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <select id="import_transaction_type_withdraw" class="form-control">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                                </select>
                            </div>

                            <div class="col-sm-2 col-xs-12 top-5 text-center">
                                <button id="btn_execute_excel_withdraw" class="btn btn-primary btn-width">Thực hiện
                                    rút</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 top-10">
                            <div id="hd_table_import_excel_menu_withdraw" class="col-sm-12 col-xs-12 hd_table_import_excel_menu">
                                <table id="table_import_excel_menu_withdraw" class="table table-striped table_import_excel_menu">
                                    <tbody id="html_excel_withdraw">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END Modal import for deposit file excel-->


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-small">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="transfers_title" class="header-collection">Cập nhật thông tin giao dịch</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">

                <div class="wrap_name">
                    <label class="label_name">Ghi chú:</label>
                    <div class="input_name">
                        <textarea id="edit_note" rows="4" class="form-control" name="" maxlength="300"></textarea>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="label_name">Hình ảnh/ chứng từ liên quan</label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="before_docs" class="avatar_thumbs avatar_thumbs_lq col-sm-2">
                        <a onclick="click_file('docs')" id="load_img_docs">
                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/upload.png">
                        </a>
                    </div>
                    <input class="hide" name="files" type="file"
                    accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" id="docs" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="btn_execute_edit" class="btn btn-primary btn-width" id="btnPurchase">Hoàn
                    tất</button>
            </div>
        </div>
    </div>
</div>


<!--BEGIN Modal import file excel chuyển khoản từ người dùng-->

<!--END Modal import file excel-->

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/wallet_transaction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_factories/factories.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_directive/directives.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
