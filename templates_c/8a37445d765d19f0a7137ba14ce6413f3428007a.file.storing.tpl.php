<?php /* Smarty version Smarty-3.1.18, created on 2021-09-22 21:44:21
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/storing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:739547766611cb058257539-41863377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a37445d765d19f0a7137ba14ce6413f3428007a' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/storing.tpl',
      1 => 1632038984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '739547766611cb058257539-41863377',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_611cb05830ab48_83921600',
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'str_permission' => 0,
    'no_warehouse' => 0,
    'domain' => 0,
    'opt_shop_all' => 0,
    'opt_providers' => 0,
    'opt_shop' => 0,
    'setup' => 0,
    'opt_method_payment' => 0,
    'opt_period' => 0,
    'opt_payment_collect_fund' => 0,
    'lang' => 0,
    'is_cloud_printer' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_611cb05830ab48_83921600')) {function content_611cb05830ab48_83921600($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="primary-storing">
	<div class="container">

		<ul class="nav nav-tabs nav-storing">
		
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountant_storingimp_filter:'))!==false) {?>
			<li id="tab_import" class="tab-modify"><a data-toggle="tab" href="#nhapkho">Nhập kho</a></li>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['no_warehouse']->value>1) {?>
				<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountant_storingexp_filter:'))!==false) {?>
				<li id="tab_export" class="tab-modify"><a data-toggle="tab" href="#xuatkho">Xuất kho nội bộ</a></li>
				<?php }?>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountant_storingwh_rp_filter:'))!==false) {?>
			<li id="tab_general" class=""><a data-toggle="tab" href="#thongkekho">Thống kê kho hàng</a></li>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountant_storingimp_add:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountant_storingexp_add:'))!==false) {?>
			<li class="pull-right" style="margin-right: 10px;"><span id="btn_add"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="30"></span></li>
			<?php }?>

		</ul>

		<div class="tab-content">

		  	<div id="nhapkho" class="tab-pane fade in">
		  		<div class="row search-order extend">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								<label class="name">Kho hàng</label>
							</div>
							<div class="col-md-4 col-sm-9 col-xs-12">
								<select id="imp_filter_sl_warehouse_id" class="form-control sl-warehouse">
									<?php echo $_smarty_tpl->tpl_vars['opt_shop_all']->value;?>

								</select>
							</div>
							<div class="col-md-4 col-sm-9 col-xs-12">
								<select id="imp_filter_providers_id" class="form-control sl-warehouse">
									<option value="" >Tất cả nhà cung cấp</option>
									<?php echo $_smarty_tpl->tpl_vars['opt_providers']->value;?>

								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="imp_filter_from" type="text" name="" placeholder="Từ ngày">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="imp_filter_to" type="text" name="" placeholder="Đến ngày">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input id="imp_filter_txt" type="text" name="" placeholder="Mã đơn/ Người tạo">
							<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<span id="imp_filter_btn_view" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/eye.png" width="30"></span>
						<span id="imp_filter_btn_dl" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png" width="30"></span>
					</div>
				</div>

				<div id="list_import" class="table-responsive">
					<table class="table table-bg-no">
		                <thead>
		                    <tr>
		                        <th width="5%">#</th>
		                        <th width="8%">Ngày nhập</th>
		                        <th width="8%">Ngày tạo</th>
		                        <th class="text-left" width="">Kho hàng</th>
	                        	<th width="6%">Mã phiếu</th>
		                        <th width="12%">Tạo bởi</th>
		                        <th width="18%">Nhập từ</th>
		                        <th width="12%">Tổng tiền</th>
		                        <th width="8%">Hình thức</th>
		                        <th width="10%">Xác nhận</th>
		                        <th width="9%">Phiếu chi</th>
		                    </tr>
		                </thead>
		            </table>
		        </div>
				<!--LIST ITEM IMPORTS-->
				

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                <div class="paging L" id="imp_page_html">
                </div>
                <input id="imp_current_page" hidden class="hidden" value="1" />
                </div>

		  	</div>

		  	<div id="xuatkho" class="tab-pane fade in">
		  		<div class="row search-order extend">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								<label class="name">Kho hàng</label>
							</div>
							<div class="col-md-4 col-sm-9 col-xs-12">
								<select id="exp_filter_sl_warehouse_id" class="form-control">
									<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="exp_filter_from" type="text" name="" placeholder="Từ ngày">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="exp_filter_to" type="text" name="" placeholder="Đến ngày">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input id="exp_filter_txt" type="text" name="" placeholder="Mã đơn/ Người tạo">
							<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<span id="exp_filter_btn_view" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/eye.png" width="30"></span>
						<span id="exp_filter_btn_dl" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png" width="30"></span>
					</div>
				</div>
				<table id="list_export" class="table table-bg-no">
	                <thead>
	                    <tr>
	                        <th width="8%">#</th>
	                        <th width="8%">Ngày tạo</th>
	                        <th width="8%">Ngày xuất</th>
	                        <th class="text-left" width="">Kho hàng</th>
	                        <th width="6%">Mã phiếu</th>
	                        <th width="12%">Tạo bởi</th>
	                        <th width="18%">Xuất cho</th>
	                        <th width="12%">Tổng tiền</th>
							<th width="8%">Hình thức</th>
		                    <th width="9%">Phiếu thu</th>
	                    </tr>
	                </thead>
	            </table>
				<!--LIST ITEM EXPORTS-->
	            

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                <div class="paging L" id="exp_page_html">
                </div>
                <input id="ex_current_page" hidden class="hidden" value="1" />
                </div>

		  	</div>

		  	<div id="thongkekho" class="tab-pane fade in">
		  		<div class="row search-order extend">
					<div class="col-md-11 col-sm-10 col-xs-12">
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<input id="filter_keyword" type="text" name="" placeholder="Tên/ Mã sản phẩm" class="hasDatepicker">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="filter_from" type="text" name="" placeholder="Từ ngày">
										<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="filter_to" type="text" name="" placeholder="Đến ngày">
										<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
									</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<label class="name">Kho hàng</label>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<select id="filter_sl_warehouse_id" class="form-control sl-warehouse">
									<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

						        </select>
							</div>
							
							<div class="col-md-3 col-sm-3 col-xs-12 dr">
								<select multiple id="filter_sl_cat_id" class="form-control">
						          	<option selected value="">Danh mục phụ</option>
						        </select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-2 col-xs-12">
						<span id="filter_btn_inventory" class="icon1" style="margin-top: 8px;"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/sync.png" width="24"></span>
						<span id="filter_btn_dl" class="icon1" style="margin-top: 8px;"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png" width="30"></span>
					</div>
				</div>
				<div class="table-responsive">
		            <table class="table table-striped table-bordered text-center table-bg-no">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>
									Ảnh
								</th>
		                        <th>
									Mã sản phẩm
									<a field="sku_code" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Tên sản phẩm
									<a field="product_name" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Giá
								</th>
		                        <th>
									Giá vốn
								</th>
		                        <th>
									Đầu kỳ
									<a field="dau_ky" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Nhập hôm nay
									<a field="nhap_trong_ky" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Xuất hôm nay
									<a field="xuat_trong_ky" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Cuối kỳ
									<a field="cuoi_ky" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th>
									Giá trị
									<a field="gia_tri_ton" class="glyphicon glyphicon-chevron-up sortBy"></a>
								</th>
		                        <th class="hide">Tồn thực tế</th>
		                        <th class="hide">Chênh lệch</th>
		                        <th width="3%" class="">@</th>
		                    </tr>
		                </thead>
		                <thead>
							<tr>
								<td colspan="9"></td>
								<td id="inv_total_quantity"></td>
								<td id="inv_total_value"></td>
								<td ></td>
							</tr>
		                </thead>
		                <tbody id="filter_tpl_list">
		                </tbody>
		            </table>
		        </div>
				<div class="paging L" id="filter_page_html">
                </div>
			</div>

		</div>
		
	</div>
</div>

<div class="modal fade" id="modal_add_storing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T" id="title_modal_add_storing">Phiếu nhập kho</div>
        	<a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
            	<div class="row">
            			<div class="">
            				<div class="col-md-3 col-sm-4 col-xs-12">
            					<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-6 wrap-name">
										<label id="lable_code_type" class="name">Mã nhập kho</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
										<input class="not-allow-edit" id="add_code" type="text" name="" value="" placeholder="">
									</div>
						        </div>
            				</div>
            				<div class="col-md-3 col-sm-6 col-xs-12">
            					<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
										<label class="name">Ngày</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
										<input class="not-allow-edit" id="add_date" type="text" name="" value="" placeholder="<?php ob_start();?><?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
">
									</div>
						        </div>
            				</div>
            				<div class="col-md-3 col-sm-6 col-xs-12">
            					<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
										<label class="name">Kho hàng</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
										<select class="not-allow-edit form-control" id="add_sl_warehouse_id">
								          <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

								        </select>
									</div>
						        </div>
            				</div>
            				<div class="col-md-3 col-sm-6 col-xs-12">
            					<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
										<label class="name">Chứng từ</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-info wrap-info-in">
										<div class="col-md-4 col-sm-4 col-xs-12 wrap-info wrap-info-in">
											<span id="add_upload" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/attach.png" width="14"></span>
										</div>
										<div id="processing_uploaded" class="col-md-6 col-sm-6 col-xs-12 processing_uploaded">
											<!--Loading bar-->
										</div>
									</div>
									
									<div id="hd_review" class="col-sm-12">
									</div>
									<div class="hide">
										<input type="file" name="files" id="input_upload" accept="image/x-png,image/gif,image/jpeg,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.pdf"  value=""/>
									</div>
						        </div>
            				</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
										<label id="label_regarding_to" class="name">Nhập từ</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
										<div id="hd_export_for_customer" class="wrap-info-in ex-in-for">
											<input id="export_for_customer" class="autosear" type="text" name="" export_for_customer="" placeholder="Tên/ SĐT/ Email" hide-placeholder="">
											<i title="Xóa khách hàng này chọn lại" class="remove-item export-for icon-cate icon-other-x square_x"></i>
										</div>
										<div id="internal_disabled" class="wrap-info-in ex-in-for">
											<select class="not-allow-edit form-control" id="add_sl_providers_id" style="width:100%;">
												<?php echo $_smarty_tpl->tpl_vars['opt_providers']->value;?>

											</select>
										</div>
										<div id="internal_enabled" style="display:none;" class="wrap-info-in ex-in-for">
											<select class="not-allow-edit form-control" id="internal_warehouse_id">
												<?php if ($_smarty_tpl->tpl_vars['setup']->value['store_name']=='azone') {?>
													<?php echo $_smarty_tpl->tpl_vars['opt_shop_all']->value;?>

												<?php } else { ?>
													<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

												<?php }?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
										<label class="name">Thanh toán</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info">
										<select class="not-allow-edit form-control" id="add_sl_method_payment" class="form-control" style="width: 100%;">
											<?php echo $_smarty_tpl->tpl_vars['opt_method_payment']->value;?>

										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12" id="holder_hold_date">
								<div class="hold_date">
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-12 wrap-name">
											<label class="name">Công nợ trong</label>
										</div>
										<div class="col-md-9 col-sm-9 col-xs-12 wrap-info wrap-info-in">
											<select class="not-allow-edit form-control" id="add_sl_hold_date" class="form-control">
												<?php echo $_smarty_tpl->tpl_vars['opt_period']->value;?>

											</select>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12  wrap-name">
										<label class="name">Ghi chú</label>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12 wrap-info">
										<input id="add_note" class="form-control" type="text" name="" placeholder="">
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6 holder_internal">
										<label class="top-10">
											<input class="not-allow-edit ace" id="add_internal" type="checkbox">
											<span class="lbl" style="margin-top: 3px;"><label id="lb_add_internal" class="name">Nhập nội bộ</label></span>
										</label>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<label class="top-10">
											<input class="not-allow-edit ace" id="is_correction" type="checkbox">
											<span class="lbl" style="margin-top: 3px;"><label class="name">Phiếu điều chỉnh</label></span>
										</label>
									</div>
								</div>
							</div>
            			</div>
            			<div class="col-md-12 col-sm-12 col-xs-12 top-5">
							<div class="col-md-6 col-sm-6 col-xs-12 nopadding">
								<div class="col-sm-4 col-xs-6 wrap-name top-10 nopadding">
									<label id="lb_treasurer_group_id" class="name">Lý do</label>
								</div>
								<div class="col-sm-8 col-xs-6 nopadding">
									<select class="not-allow-edit form-control" id="treasurer_group_id" style="width: 100%;">
									</select>
								</div>
							</div>
            			</div>
            		</div>
            	</div>
				<div class="table-responsive">
		            <table class="table table-hover table-bordered table-bg">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>Ảnh</th>
		                        <th class="text-left" width="140">SKU</th>
		                        <th class="text-left">Tên sản phẩm</th>
		                        <th width="120">Đvt</th>
		                        <th width="120">Số lượng</th>
		                        <th width="140">Đơn giá</th>
		                        <th width="140">Thành tiền</th>
		                        <th width="120">Hạn sử dụng</th>
		                        <th width="90">&nbsp;</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	<tr id="add_row" >
		                        <td>@</td>
		                        <td class="img-item">
								</td>
		                        <td class="text-left">
									<input id="add_code_sku" type="text" name="" placeholder="Mã sản phẩm">
								</td>
		                        <td class="text-left">
									<input id="add_name" type="text" name="" placeholder="Nhập tên sản phẩm">
								</td>
		                        <td>
		                        	<select id="add_inverse">
		                        		<option id="add_inverse_0" value="0">Đơn vị nhập</option>
		                        		<option id="add_inverse_1" value="1">Đơn vị xuất</option>
		                        	</select>
		                        </td>
		                        <td><input id="add_quantity" class="number-format" type="text" name="" placeholder="Số lượng"></td>
		                        <td><input id="add_price" class="number-format" type="text" name="" placeholder="Giá một SP"></td>
		                        <td><input id="add_decrement" class="number-format text-center" type="text" name="" placeholder="% giảm giá"></td>
		                        <td><input id="add_expire_date" type="text" name="" placeholder="Hạn dùng"></td>
		                        <td>
		                        	<span id="add_btn_add" class="icon2"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/order-save.png" width="30"></span>
			                       	<span id="add_btn_delete" class="icon2"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/order-delete.png" width="30"></span>
		                        </td>
		                    </tr>
							
		                </tbody>
		            </table>
		        </div>
		        <font id="add_total" size="4"> <p class="text-right">Tổng tiền: <font color="#428BCA">0đ</font></p></font>
	    		<div class="text-right btn-success1">
	    			<a id="btn_cancel"  class="close" aria-label="Close">Huỷ</a>
	    			<a id="btn_done" href="javascript:;">Hoàn tất</a>
	    		</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_view_storing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T">Quản lý phiếu</div>
        	<a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="text-center"><img id="holder_img_show" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/chungtu.png" class="" style="max-width: 100%;"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_xuatkho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="pop_up_T_1">Thông báo</div>
        	<a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
            <div class="pupop_xuatkho">
            	<p>Xuất kho cho các sản phẩm có chênh lệch?</p>
            	<div class="text-right btn-success1">
	    			<a class="close" data-dismiss="modal" aria-label="Close">Không</a>
	    			<a id="filter_btn_execute" href="javascript:;">Có</a>
	    		</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_exported_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T_1">Lịch sử xuất hàng</div>
        	<a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12" id="tpl_export_history">
					</div>
					<div class="col-sm-12 top-20" id="tpl_export_history">
						<i class="color-red">
							*** Nếu số lượng trong lịch sử chi tiết không khớp, là do đã được tự động tính xuất bù do xuất âm hàng trước đó
							<a id="view_exported_history_before_imported" href="javascript:;">Xem những phiếu xuất âm</a>
						</i>
					</div>
				</div>
			</div>
			</div>
    </div>
</div>

<div class="modal fade" id="modal_exported_history_before_imported" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T_1">Lịch sử phiếu xuất âm hàng</div>
        	<a class="btn_pop_close btn_pop_close_1 close" data-dismiss="modal" aria-label="Close"></a>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12" id="tpl_export_history_before_imported">
					</div>
				</div>
			</div>
			</div>
    </div>
</div>

<!--BEGIN modal Thu công nợ-->
<div class="modal fade" id="modal_liabilities_collect_fund" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-small">
    <div class="modal-content">
      <div id="md_liabilities_title" class="pop_up_T">Chi trả tiền công nợ nhà cung cấp/Thu công nợ khách hàng</div>
        <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
        <div class="modal-body">
          <div class="row">

			<div class="col-sm-12 wrap_name">
              <div class="col-sm-3 col-xs-12">
              </div>
              <div class="col-sm-6 col-xs-12">
			  	<div id="md_liabilities_payment_type" class="col-sm-12 col-xs-12 top-5">
				  Hình thức thu chi
				</div>
			  	<div class="col-sm-12 col-xs-12 input_name top-5">
					<select id="payment_type" class="form-control">
						<?php echo $_smarty_tpl->tpl_vars['opt_payment_collect_fund']->value;?>

					</select>
				</div>
            </div>

			<div class="col-sm-12 wrap_name">
              <div class="col-sm-3 col-xs-12 top-10">
              </div>
              <div class="col-sm-6 col-xs-12">
			  	<div class="col-sm-12 col-xs-12 top-5">
				  Lý do
				</div>
			  	<div class="col-sm-12 col-xs-12 input_name top-5">
					<select id="lia_treasurer_group_id" class="form-control">
					</select>
				</div>
            </div>

			<div class="col-sm-12 wrap_name top-10">
              <div class="col-sm-3 text-right">
              </div>
              <div class="col-sm-6" >
				<div class="col-sm-12 input_name">
				Ghi chú:
				</div>
				<div class="col-sm-12 input_name">
					<textarea id="liabilities_note" class="form-control" rows="2"></textarea>
				</div>
              </div>
            </div>
			
            <div class="col-sm-12 text-center label_name" id="md_liabilities_notice">
            </div>
            <div class="col-sm-12 wrap_name top-10">
              <div class="col-sm-3 text-right">
              </div>
              <div class="col-sm-6 input_name">
			  	<a id="liabilities_all" class="collected-all">Tất cả</a>
                <input id="liabilities_total_paid" placeholder="Số tiền thu" class="form-control number-format" value=""/>
                <span id="liabilities_err" class="color-red"></span>
              </div>
            </div>

            <div class="col-sm-12 wrap_name top-10">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-2 text-center">
                <p id="md_liabilities_lb_total_left">Còn nợ</p>
                <p id="md_total_left">-</p>
              </div>
              <div class="col-sm-2 text-center color-red">
                <p id="md_liabilities_lb_total_paid">Đã chi</p>
                <p id="md_total_paid">-</p>
              </div>
            </div>
            <div class="col-sm-12 wrap_name top-10">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-6 text-center">
                <span id="liabilities_status"></span>
              </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <div class="bootstrap-dialog-footer">
            <div class="bootstrap-dialog-footer-buttons">
              <button data-dismiss="modal" class="btn btn_w btn-default"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
              <button id="btn_liabilities_done" class="btn btn_w btn-success"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
<!--END modal Thu công nợ-->

<a id="btn_print_link" is-cloud-printer="<?php echo $_smarty_tpl->tpl_vars['is_cloud_printer']->value;?>
" print-url="" href="javascript:;"></a>
<!--End - Quản lý kho - Mr Tân -->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/accountant_storing.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script>
<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!=0) {?>
<style>
.btn.btn-primary.edit-inventory{
  display: none;
}
</style>
<?php }?><?php }} ?>
