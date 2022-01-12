<?php /* Smarty version Smarty-3.1.18, created on 2021-08-13 23:21:59
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73058899861169c27bf6e80-14156450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28e5b8ef2c10ee3276cc7edf6fc9aefe5313b83a' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/index.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73058899861169c27bf6e80-14156450',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'noWallet' => 0,
    'totalCashFlow' => 0,
    'lWallet' => 0,
    'item' => 0,
    'setup' => 0,
    'lang' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61169c27c50b38_79736714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61169c27c50b38_79736714')) {function content_61169c27c50b38_79736714($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
		<div class="container" ng-controller="walletCashback" ng-init="list()" >
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row text-center">
						<div class="col-sm-2 col-xs-6 text-center">
							Số loại ví: <b id="total_package"><?php echo $_smarty_tpl->tpl_vars['noWallet']->value;?>
</b>
						</div>
						<div class="col-sm-2 col-xs-6 text-center">
							Đang lưu thông: <b id=""><?php echo number_format($_smarty_tpl->tpl_vars['totalCashFlow']->value,0,".",",");?>
</b>
						</div>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lWallet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
							<div class="col-sm-2 col-xs-6 text-center">
							    <?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_name'];?>
 : <b ><?php echo number_format(abs($_smarty_tpl->tpl_vars['item']->value['amount']),0,".",",");?>
</b>
							</div>
						<?php } ?>
					</div>


				</div>
				<div class="col-sm-12 col-xs-12 text-right">
					<button id="update">Cài đặt ví</button>
				</div>
				
			</div>
			<hr>
			<div class="table-responsive">
				<table  class="table table-hover table-bordered table-bg ng-cloak">
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã ví</th>
							<th>Tên ví</th>
							<th class="hide">% Cashback</th>
							<th class="hide">Nhóm SP chiết khấu</th>
							<th>@</th>
						</tr>
					</thead>
					<tbody id="list">
						<tr ng-repeat="item in lItems track by $index">
							<td width="5%"><b><<?php ?>%$index+1%<?php ?>></b></td>
							<td width="20%" ng-dblclick="edit($index)" ng-if="id_edited == item.id">
								<input ng-keypress="exSave($event)" ng-model="filterElements.wallet_code" class="form-control" placeholder="Mã ví Cashback" name="" value="<<?php ?>%item.wallet_code%<?php ?>>" >
							</td>
							<td ng-dblclick="edit($index)" ng-if="id_edited != item.id" ><b><<?php ?>%item.wallet_code%<?php ?>></b></td>
							<td ng-if="id_edited == item.id">
								<input ng-keypress="exSave($event)" ng-model="filterElements.wallet_name" class="form-control" placeholder="Tên ví Cashback" name="" value="<<?php ?>%item.wallet_name%<?php ?>>" >
							</td>
							<td ng-dblclick="edit($index)" ng-if="id_edited != item.id" ><b><<?php ?>%item.wallet_name%<?php ?>></b></td>
							<td class="hide" width="15%" ng-if="id_edited == item.id">
								<input ng-keypress="exSave($event)" ng-model="filterElements.wallet_commission" class="form-control text-center" placeholder="% Cashback trên giá lẻ" name="" value="<<?php ?>%item.wallet_commission%<?php ?>>" >
							</td>
							<td class="hide" ng-dblclick="edit($index)" ng-if="id_edited != item.id" ><b><<?php ?>%item.wallet_commission%<?php ?>>%</b></td>
							<td class="hide" ng-dblclick="edit($index)"><<?php ?>%item.name%<?php ?>></td>
							<td width="80px">
								<span ng-if="id_edited != item.id" ng-click="edit($index)" class="group_func icon-cate icon-other-edit active"></span>
								<span ng-if="id_edited == item.id" ng-click="save(item.id)" class="group_func icon-cate icon-other-check active"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<div class="col-lg-12 top-10 hide">
				<ul uib-pagination total-items="totalItems" items-per-page="<?php echo $_smarty_tpl->tpl_vars['setup']->value['perpage'];?>
" ng-model="currentPage" max-size="maxSize" class="pagination" boundary-links="true" rotate="false" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;" ng-change="filterElements.page = currentPage; filter()"></ul>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-small">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">×</a>
                <h4 id="balance_title" class="header-collection">Cài đặt ví</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
			<table class="table table-bg-no">
			<thead>
				<tr>
					<th>STT</th>
					<th class="text-left">Ví</th>
					<th class="text-center">Giao dịch</th>
					<th class="text-center">Ẩn/hiện</th>
				</tr>
			</thead>
			<tbody id="wallet_list">
				
			</tbody>
		</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy--></button>
                <button type="button" id="btn_execute" class="btn btn-primary btn-width">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/wallet_index.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_factories/factories.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/angularjs/angular_directive/directives.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
