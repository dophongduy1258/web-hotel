<?php /* Smarty version Smarty-3.1.18, created on 2021-09-19 16:26:03
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/inventory/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11301302526147022b6be7d3-92642573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac30599aecf127f9d13390c6fcf214b3ecd5a375' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/inventory/index.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11301302526147022b6be7d3-92642573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'lang' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6147022b7048c1_05710412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6147022b7048c1_05710412')) {function content_6147022b7048c1_05710412($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<input class="hidden" type="text" value="" id="slip_id" />
<div class="container">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inventory-input inventory-input-1">
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invInput'];?>
<!--Kiểu nhập-->:
			<label class="ace">
				<input checked name="check_type_in" id="auto_input" class="ace" type="radio" value=""/>
				<span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invAutomatic'];?>
<!--Tự động-->
			</label>
			<label class="ace">
				<input name="check_type_in"  id="manual_input" class="ace" type="radio" value=""/>
				<span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invManual'];?>
<!--Nhập tay-->
			</label>
		</div>

		<div id="hd-manual" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 hidden">
			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
			</div>
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<input id="mn_code" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invProId'];?>
" class="form-control"><!--Mã sản phẩm-->
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<input id="mn_product_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invProName'];?>
" class="form-control"><!--Tên sản phẩm-->
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<input id="mn_quantity" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invQty'];?>
" class="form-control"><!--Số lượng-->
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<button id="btn-submit-manual" class="btn btn-primary btn-width"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invEnter'];?>
<!--Nhập--> </button>
				</div>
			</div>
		</div>

		<div id="hd-auto" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<input id="auto_code" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invProId'];?>
" class="form-control"><!--Mã sản phẩm-->
				</div>
			</div>
		</div>

		<div id="hd-list-product" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
			
			<div class="col-lg-1 col-md-1 hidden-sm hidden-xs nopadding">
		    </div>
		    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 nopadding">
				<div class="panel panel-default">
					<!-- Default panel contents -->
				    <div class="panel-heading col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				    	<b><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invList'];?>
<!--Danh Sách Sản Phẩm--></b>

				    	<button id="btn-download" class="btn btn-primary R">
				    		<i class="glyphicon glyphicon-cloud-download"></i>
				    		<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invDown'];?>
<!--Tải về-->
				    	</button>
				    </div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
			        	<div class="table-responsive">
					      	<table class="table table_mau table-bordered text-center">
						        <thead>
						          <tr class="text-center">
						            <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invStt'];?>
<!--STT--></th>
						            <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invProId'];?>
<!--Mã sản phẩm--></th>
						            <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invProName'];?>
<!--Tên sản phẩm--></th>
						            <th width="16%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invQty'];?>
<!--Số lượng--></th>
						            <th width="10%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_invFunc'];?>
<!--Chức năng--></th>
						          </tr>
						        </thead>
						        <tbody id="list_product">
						        	<!--List products-->
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/inventory_index.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }} ?>
