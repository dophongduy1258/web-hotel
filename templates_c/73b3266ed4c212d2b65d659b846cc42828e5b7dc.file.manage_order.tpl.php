<?php /* Smarty version Smarty-3.1.18, created on 2021-09-10 11:26:02
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/manage_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2094328926613ade5af194f9-30549998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73b3266ed4c212d2b65d659b846cc42828e5b7dc' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/manage_order.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2094328926613ade5af194f9-30549998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'str_permission' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'is_cloud_printer' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_613ade5b01e766_15888830',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613ade5b01e766_15888830')) {function content_613ade5b01e766_15888830($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="primary-storing">
	<div class="container">

		<ul class="nav nav-tabs nav-storing">
			<li id="tab_import" class="tab-modify active" status-booking-filter="0"><a data-toggle="tab" href="#tab_ticket">Phiếu tạm <span id="total_record_0" style="color:#f00">(3)</span></a></li>
			<li id="tab_export" class="tab-modify" status-booking-filter="1"><a data-toggle="tab" href="#tab_Delivery">Đang giao hàng <span id="total_record_1" style="color:#f00">(3)</span></a></li>
			<li id="tab_general" class="tab-modify" status-booking-filter="2"><a data-toggle="tab" href="#tab_Success">Hoàn thành <span id="total_record_2" style="color:#f00">(3)</span></a></li>
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainretail:'))!==false) {?>
			<li id="" class="pull-right" style="margin-right: 10px;"><span id="btn_add_order">Đặt hàng</span></li>
			<?php }?>
		</ul>
		
		<div class="tab-content">

			<div class="row search-order search-order111">
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="name">Cửa hàng</label>
						</div>
						<div class="col-md-4 col-sm-9 col-xs-12">
							<select id="sl_shop_id" class="form-control">
								<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-5 col-xs-12">
					<div class="row">
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="from" type="text" name="" placeholder="Từ ngày">
							<img id="imp_filter_from" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
						</div>
						<div class="col-md-5 col-sm-6 col-xs-12">
							<input id="to" type="text" name="" placeholder="Đến ngày">
							<img id="imp_filter_to" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
						</div>
					</div>
				</div>
				<div class="col-md-1 col-sm-2 col-xs-12">
					<span id="btn_view" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/eye.png" width="30"></span>
					<span id="btn_download" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png" width="30"></span>
				</div>
			</div>
			
			<div class="table-responsive">
				<table class="table table-bg-no">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="12%">Ngày tạo</th>
							<th width="10%">Mã đặt hàng</th>
							<th class="text-left">Khách hàng</th>
							<th width="18%">Tổng tiền</th>
							<th width="18%">Khách đã trả</th>
							<th width="15%">Trạng thái</th>
						</tr>
					</thead>
				</table>
			</div>

		  	<div id="tab_ticket" class="tab-pane fade in active">
				<!--LIST ITEM IMPORTS-->
				<div id="tpl_list_0" class="table-responsive item-rows">
		            
		        </div>
				<!--END LIST ITEM IMPORTS-->
		  	</div>
		  	<div id="tab_Delivery" class="tab-pane fade in">
			  <!--LIST ITEM IMPORTS-->
				<div id="tpl_list_1" class="table-responsive item-rows">
		        </div>
				<!--END LIST ITEM IMPORTS-->
		  	</div>
		  	<div id="tab_Success" class="tab-pane fade in">
			   <!--LIST ITEM IMPORTS-->
				<div id="tpl_list_2" class="table-responsive item-rows">
		        </div>
				<!--END LIST ITEM IMPORTS-->
			</div>

			<div class="row" id="page_html">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mode_cancel_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="pop_up_T_1">Huỷ đơn hàng</div>
        	<a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
        	<div class="modal-body">
				<label style="font-size:16px;">Bạn có muốn huỷ đơn đặt hàng này không?</label>
				<div class="clear"></div>
				<div class="text-right btn-success1">
	    			<a class="close" data-dismiss="modal" aria-label="Close">Huỷ</a>
	    			<a href="javascript:;" id="btn_delete_order">Đồng ý</a>
	    		</div>
				<div class="clear"></div>
		    </div>
        </div>
    </div>
</div>

<!--End - Quản lý kho - Mr Tân -->
<a id="btn_print_link" is-cloud-printer="<?php echo $_smarty_tpl->tpl_vars['is_cloud_printer']->value;?>
" print-url="" href="javascript:;"></a>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/accountant_mngt_order.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
