<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 02:34:07
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/client.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133045692561169c1b49d272-54067448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '127a932da8f45edbe9327e70e0e0bb90b2633a84' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/client.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133045692561169c1b49d272-54067448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61169c1b504782_47396842',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'default_client_id' => 0,
    'default_fullname' => 0,
    'wallet_id' => 0,
    'noWallet' => 0,
    'filter_opt_wallet' => 0,
    'opt_group' => 0,
    'opt_transaction_type' => 0,
    'session' => 0,
    'str_permission' => 0,
    'setup' => 0,
    'lang' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61169c1b504782_47396842')) {function content_61169c1b504782_47396842($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
        <div id="theObjectPage" class="container" ng-controller="theObjectPage"
ng-init="client_id=<?php echo $_smarty_tpl->tpl_vars['default_client_id']->value;?>
;filterElements.txt_client='<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['default_fullname']->value,"'","\'");?>
';filterElements.wallet_id=<?php echo $_smarty_tpl->tpl_vars['wallet_id']->value;?>
;filter()">
           
            <div class="row search-order search-order1">
                <div class="col-sm-3 col-xs-12">
                </div>
                <div class="col-sm-6 col-xs-12 f-search">
                    <input disabled id="txt_client" type="text"
                        ng-model="filterElements.txt_client" name="" placeholder="Tên/ Mã KH/ SĐT" value="">
                        <span id="btn_remove" class="icon-x"><span class="glyphicon glyphicon-remove"></span></span>
                </div>
            </div>
             <hr>
            <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">

                     <div class="row text-center">
                         <div class="col-sm-2 col-xs-6 text-center top-10">
                             Số loại ví: <b id="total_package"><?php echo $_smarty_tpl->tpl_vars['noWallet']->value;?>
</b>
                         </div>
                         <div class="col-sm-2 col-xs-6 text-center top-10">
                             Tổng các ví: <b><<?php ?>%total_cashflow|number_format_replace_cog%<?php ?>></b>
                         </div>
                        <div ng-repeat="ite in lWalletBalance track by $index" class="col-sm-2 col-xs-6 text-center top-10">
                            <<?php ?>%ite.wallet_name%<?php ?>>: <b class="<<?php ?>%ite.amount >= 0 ? 'color-green':'color-red'%<?php ?>>" ><<?php ?>%ite.amount|number_format_replace_cog%<?php ?>></b>
                        </div>
                     </div>

                 </div>

            </div>
            <hr>
            <div class="row search-order extend search-order1">
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select id="filter_f_wallet_id" ng-change="filterElements.page = currentPage = 1; filter()" ng-model="filterElements.wallet_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['filter_opt_wallet']->value;?>

                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select ng-change="filterElements.page = currentPage = 1; filter()" ng-model="filterElements.member_group" class="form-control">
                        <option value="">Tất cả nhóm khách hàng</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_group']->value;?>

                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <input class="input-datepicker" ng-change="filterElements.page = currentPage = 1; fitler()" ng-model="filterElements.from" id="from" type="text" name="" placeholder="Từ ngày">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <input class="input-datepicker" ng-change="filterElements.page = currentPage = 1; filter()" id="to" ng-model="filterElements.to" type="text" name="" placeholder="Đến ngày">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 dr dr300">
                    <select id="transaction_type" multiple class="form-control">
                        <option selected value="">Tất cả loại giao dịch</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_transaction_type']->value;?>

                    </select>
                </div>
                <div class="col-sm-3 col-xs-12 f-search">
                    <input ng-change="filter();" id="keyword" type="text" ng-model="filterElements.keyword" name=""
                        placeholder="Tên/ Mã KH/ SĐT/ Mã GD" value="">
                </div>
                <div class="col-sm-3 col-xs-12">
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
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallet_transactiondeposit:'))!==false) {?>
                            <button id="btn_deposit" class="btn btn-success btn-width top-10">
                                Nạp
                            </button>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallet_transactionwithdraw:'))!==false) {?>
                            <button id="btn_withdraw" class="btn btn-danger btn-width top-10">
                                Rút
                            </button>
                        <?php }?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="col-sm-12">
                        <div class="col-sm-2 col-xs-6">
                            Số GD: <b id="total_record"><<?php ?>%total_record|number_format_replace_cog%<?php ?>></b>
                        </div>
                        <div class="col-sm-2 col-xs-6 text-center">
                            Tổng giá trị GD: <b id="total_sum"><<?php ?>%total_sum|number_format_replace_cog%<?php ?>></b>
                        </div>
                        <div class="col-sm-2 col-xs-6 text-center">
                            Tổng nhận: <b class="color-green" id="total_in">+<<?php ?>%total_in|number_format_replace_cog%<?php ?>></b>
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            Tổng chuyển: <b class="color-red" id="total_in">-<<?php ?>%total_out|number_format_replace_cog%<?php ?>></b>
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            Tổng quỹ: <b class="<<?php ?>%total_balance >= 0 ? 'color-green':'color-red'%<?php ?>>" id="total_in"><<?php ?>%total_balance|number_format_replace_cog%<?php ?>></b>
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
                            <th width="8%">Tên ví</th>
                            <th class="">Họ & Tên</th>
                            <th class="">SĐT</th>
                            <th>Người nhận/ chuyển</th>
                            <th>SĐT nhận/ chuyển</th>
                            <th width="10%">+</th>
                            <th width="10%">-</th>
                            <th>Mã GD</th>
                            <th>Chú thích</th>
                            <th>Bởi Admin</th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        <tr ng-repeat="item in lItems track by $index">
                            <td><b><<?php ?>%item.id%<?php ?>></b></td>
                            <td><<?php ?>%item.created_at*1000|date:'dd/MM/yyyy HH:mm'%<?php ?>></td>
                            <td class="<<?php ?>%item.wallet_id == 1 ? 'color-green':'color-orange'%<?php ?>>"><<?php ?>%item.wallet_name%<?php ?>></td>
                            <td class=""><b><<?php ?>%client_id == item.from_client ? item.from_fullname:item.to_fullname%<?php ?>></b></td>
                            <td class=""><<?php ?>%client_id == item.from_client ? item.from_mobile:item.to_mobile%<?php ?>></td>
                            <td><b><<?php ?>%client_id != item.from_client ? item.from_fullname:item.to_fullname%<?php ?>></b></td>
                            <td><<?php ?>%client_id != item.from_client ? item.from_mobile:item.to_mobile%<?php ?>></td>
                            <td ng-if="client_id == item.to_client"><b class="color-green">+<<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b></td>
                            <td ng-if="client_id != item.to_client">-</td>
                            <td ng-if="client_id == item.from_client"><b class="color-red">-<<?php ?>%item.amount|number_format_replace_cog%<?php ?>></b></td>
                            <td ng-if="client_id != item.from_client">-</td>
                            <td><<?php ?>%item.transaction_type%<?php ?>></td>
                            <td><<?php ?>%item.note%<?php ?>></td>
                            <td><<?php ?>%item.created_by_admin_fullname%<?php ?>></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 top-10">
                <ul uib-pagination total-items="totalItems" items-per-page="<?php echo $_smarty_tpl->tpl_vars['setup']->value['perpage'];?>
" ng-model="currentPage" max-size="maxSize" class="pagination" boundary-links="true" rotate="false" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;" ng-change="filterElements.page = currentPage; filter()"></ul>
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
                        <div class="col-lg-12 col-sm-12">
                            - Chọn người dùng:
                        </div>
                        <div class="form-search">
                            <input disabled id="txt_search" client_id="" type="text" name="" placeholder="Họ tên/ SĐT/ Email" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 top5">

                    <div class="col-lg-12 col-sm-12">
                        - Ví:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select id="wallet_id" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['filter_opt_wallet']->value;?>

                        </select>
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy--></button>
                <button type="button" id="btn_execute" class="btn btn-primary btn-width" id="btnPurchase">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/wallet_client.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_factories/factories.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_directive/directives.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script><?php }} ?>
