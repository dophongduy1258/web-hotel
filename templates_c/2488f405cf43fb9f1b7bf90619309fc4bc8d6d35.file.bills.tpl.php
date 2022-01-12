<?php /* Smarty version Smarty-3.1.18, created on 2021-09-11 23:58:46
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/bills.tpl" */ ?>
<?php /*%%SmartyHeaderCode:885405987613ce046053094-69086657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2488f405cf43fb9f1b7bf90619309fc4bc8d6d35' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/accountant/bills.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '885405987613ce046053094-69086657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'lang' => 0,
    'opt_year' => 0,
    'opt_shop' => 0,
    'opt_payment' => 0,
    'is_cloud_printer' => 0,
    'shop' => 0,
    'item' => 0,
    'sitem' => 0,
    'giam_gia' => 0,
    'sum' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_613ce0461180b9_74212124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613ce0461180b9_74212124')) {function content_613ce0461180b9_74212124($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="col-sm-12 top15 hide">
	<div class="col-sm-3 col-xs-12 badge_storing badge_storing_1 top0">
		<div class="col-sm-6 col-xs-6 text-center  font-size-20">
			<label class="ace">
				<input type="radio" id="type_bills_pos" name="type" checked="" class="type_checked ace radio">
				<span class="lbl"> POS</span>
			</label>
		</div>

		<div class="col-sm-6 col-xs-6   font-size-20">
			<label class="ace">
				<input type="radio" id="type_bills_online" name="type" class="type_checked ace radio">
				<span class="lbl"> Online</span>
			</label>
		</div>
	</div>
	<div class="col-lg-1 text-center">
		<button class="form-control btn btn-default hide" onclick="return change_bills();">
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_dataDelete'];?>
<!-- Điều chỉnh -->
		</button>
	</div>
</div>

<div class="col-lg-12 top10">
	
	<div class="col-lg-12 top5">
		<div class="col-lg-1 col-md-1 font13 top10">
			<b>- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_acbill_find_order'];?>
:</b>
		</div>
		<div class="col-lg-2 col-md-5 top5">
			<input class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_exampleSearchBill'];?>
" name="" id="code" type="text"/>
		</div>
		<div class="col-lg-1 col-md-1 font13 top10">
			<b>- Của năm:</b>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-5 col-xs-5 top5">
			<div class="input-group1">
				<select class="form-control" name="" id="on_year" type="text">
					<?php echo $_smarty_tpl->tpl_vars['opt_year']->value;?>

				</select>
			</div>
		</div>
		<div class="col-lg-3 col-md-10 col-sm-5 col-xs-5 top5">
			<select id="search_shop_id" class="form-control" name="">
				<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

			</select>
		</div>
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 top5">
			<button class="form-control  btn btn-default" onclick="return search_order();"><i class="glyphicon glyphicon-search"></i> Tìm</button>
		</div>
	</div>
	
	<div class="col-lg-12 top20 bill_m">
		<div class="row">
			<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12 font13 top10">
				<b>- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_acbill_lorder'];?>
:</b>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 top5">
				<select id="shop_id" class="form-control" name=>
					<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

				</select>
			</div>
		
			<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 top5">
				<div class="input-group ">
					<input placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_acbill_from'];?>
" class="form-control" name="" id="from_date" type="text"/>
					<span class="input-group-addon">
						<span class="icon-cate icon-other-date"></span>
					</span>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 top5">
				<div class="input-group ">
					<input placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_acbill_to'];?>
"  class="form-control" name="" id="to_date" type="text"/>
					<span class="input-group-addon">
						<span class="icon-cate icon-other-date"></span>
					</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 top5">
				<select id="payment_type" class="form-control" >
					<option value=""><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectAll'];?>
<!-- Tất cả --></option>
					
					<?php echo $_smarty_tpl->tpl_vars['opt_payment']->value;?>

				</select>
			</div>
			<div class="col-lg-1 col-md-6 col-sm-6 col-xs-6 top5">
				<button class="form-control btn btn-primary" onclick="return view_bills('');"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>
</button>
			</div>
			<div class="col-lg-1 col-md-6 col-sm-6 col-xs-6 top5">
				<button class="form-control btn btn-primary" onclick="return print_list_bill();"><i class="glyphicon glyphicon-print"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_reprintListBill'];?>
 <!-- In DS --></button>
				<a id="btn_print_link" is-cloud-printer="<?php echo $_smarty_tpl->tpl_vars['is_cloud_printer']->value;?>
" href="" print-url=""></a>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12 top10">
	<div class="col-lg-1">
	</div>
	<div class="col-lg-10" id="view_report_holder">
		
		<!-- <div class="col-lg-3 top10 display-none">
			<div class="invoice">
				<div class="col-lg-12">
					<h4 class="text-center font-size-25"><b><?php echo $_smarty_tpl->tpl_vars['shop']->value['name'];?>
</b></h4>
				</div>
				<div class="col-lg-12 text-center">
					<b><?php echo $_smarty_tpl->tpl_vars['shop']->value['address'];?>
</b>
				</div>
				<div class="col-lg-12">
					<h4 class="text-center"><b>PHIẾU IN TẠM</b></h4>
				</div>
				<div class="col-lg-12">
					<b><i>Liên: <?php echo $_smarty_tpl->tpl_vars['item']->value['count_print'];?>
</i></b>
				</div>
				<div class="col-lg-12">
					<b><i><?php echo smarty_modifier_date_format(time(),"d/m/Y");?>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_date_format(time()," H : i : s");?>
</i></b>
				</div>
				<div class="col-lg-12">
					<b><i><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
</i></b>
				</div>
				<div class="col-lg-12">
					<b><i><?php echo $_smarty_tpl->tpl_vars['item']->value['table_name'];?>
</i></b>
				</div>
				<div class="col-lg-12">
					<b><i><?php echo $_smarty_tpl->tpl_vars['item']->value['waiter'];?>
</i></b>
				</div>
				<div class="col-lg-12 top5">				
				</div>
				<div class="col-lg-12 font-size-18">
					<b><u><i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_in']," H : i : s");?>
</i></u></b>
				</div>
				<div class="col-lg-12 top5">
					<table class="table-invoice  border-t">
						<?php $_smarty_tpl->tpl_vars["sum"] = new Smarty_variable("0", null, 0);?>
						<?php $_smarty_tpl->tpl_vars["giam_gia"] = new Smarty_variable("0", null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['sitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sitem']->_loop = false;
 $_smarty_tpl->tpl_vars['skey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['detail_order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sitem']->key => $_smarty_tpl->tpl_vars['sitem']->value) {
$_smarty_tpl->tpl_vars['sitem']->_loop = true;
 $_smarty_tpl->tpl_vars['skey']->value = $_smarty_tpl->tpl_vars['sitem']->key;
?>
							<tr>
								<td><i><?php echo $_smarty_tpl->tpl_vars['sitem']->value['name'];?>
</i></td>
							</tr>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['sitem']->value['amount'];?>
x</td>
								<td> <?php echo number_format($_smarty_tpl->tpl_vars['sitem']->value['price'],"0",".",",");?>
</td>
								<td class="text-right"> <?php echo number_format(($_smarty_tpl->tpl_vars['sitem']->value['price']*$_smarty_tpl->tpl_vars['sitem']->value['amount']),"0",".",",");?>
</td>
							</tr>
							<?php if ($_smarty_tpl->tpl_vars['sitem']->value['decrement']>0) {?>
								<?php $_smarty_tpl->tpl_vars['giam_gia'] = new Smarty_variable($_smarty_tpl->tpl_vars['giam_gia']->value+($_smarty_tpl->tpl_vars['sitem']->value['amount']*$_smarty_tpl->tpl_vars['sitem']->value['price']*(($_smarty_tpl->tpl_vars['sitem']->value['decrement'])/100)), null, 0);?>
							<?php }?>
							<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+($_smarty_tpl->tpl_vars['sitem']->value['price']*$_smarty_tpl->tpl_vars['sitem']->value['amount']), null, 0);?>
						<?php } ?>
						<?php if ($_smarty_tpl->tpl_vars['giam_gia']->value>0) {?>
							<tr class=" font-size-13 border-t">
								<td><b>THÀNH TIỀN</b></td>
								<td></td>
								<td class="text-right"><b><?php echo number_format($_smarty_tpl->tpl_vars['sum']->value,"0",".",",");?>
</b></td>
							</tr>
							<tr class=" font-size-13">
								<td><b>GIẢM GIÁ <?php echo number_format((($_smarty_tpl->tpl_vars['giam_gia']->value/$_smarty_tpl->tpl_vars['sum']->value)*100),"0",".",",");?>
%</b></td>
								<td></td>
								<td class="text-right"><b><?php echo number_format($_smarty_tpl->tpl_vars['giam_gia']->value,"0",".",",");?>
</b></td>
							</tr>
							<tr class=" font-size-18">
								<td><b>T.CỘNG</b></td>
								<td></td>
								<td class="text-right"><b><?php echo number_format(($_smarty_tpl->tpl_vars['sum']->value-$_smarty_tpl->tpl_vars['giam_gia']->value),"0",".",",");?>
</b></td>
							</tr>
						<?php } else { ?>
							<tr class=" font-size-18 border-t">
								<td><b>T.CỘNG</b></td>
								<td></td>
								<td class="text-right"><b><?php echo number_format(($_smarty_tpl->tpl_vars['sum']->value-$_smarty_tpl->tpl_vars['giam_gia']->value),"0",".",",");?>
</b></td>
							</tr>
						<?php }?>
						<tr class="border-bottom">
							<td><br></td>
						</tr>
					</table>
				</div>
				<div class="col-lg-12 top5">
					<p class="text-center">Xin cảm ơn quý khách</p><br><br>
				</div>
			</div> 
		</div>-->
	</div>
</div>

<div class="col-lg-12 top10">
	<div id="paging" >		
	</div>
</div>



<div class="modal fade" id="pop_change_bill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!--BEGIN TAO SHOP-->
	<div class="modal-dialog modal-small">
		<div class="modal-content noborder">
			<div class="modal-header noborder">
				<a data-dismiss="modal" class="close" href="#">× </a>
				<h4 id="md_shop_title" class="header-collection"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_dataDeleteTitle'];?>
<!-- Điều chỉnh doanh thu --></h4>
			</div>
			<div class="modal-body noborder margintop-10 padding-bottom-10">
				<div class="col-lg-12 top5">
					<div class="col-lg-2">
						- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_shop'];?>
<!-- Cửa hàng -->:
					</div>
					<div class="col-lg-4">
						<select id="shop_id_change" class="form-control" name="" >
							<?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

						</select>
					</div>
					<div class="col-lg-2 nopadding">

					</div>
					<div class="col-lg-4">

					</div>
				</div>
				<div class="col-lg-12 top5">
					<div class="col-lg-2">
						- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectADate'];?>
<!-- Chọn ngày -->:
					</div>
					<div class="col-lg-4">
						<input class="form-control" id="date_change" value="<?php echo smarty_modifier_date_format(time(),'d/m/Y');?>
">
					</div>
					<div class="col-lg-2 nopadding">
						- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_sumAllCash'];?>
<!-- Tổng tiền mặt -->:
					</div>
					<div class="col-lg-4">
						<input class="form-control" id="total_cash" value="">
					</div>
				</div>

				<div class="col-lg-12 top5">
					<div class="col-lg-2 nopadding">
						- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cashToChange'];?>
<!-- Số tiền giảm -->:
					</div>
					<div class="col-lg-4">
						<input onkeyup="input_number('#value_change')" class="form-control" id="value_change" value="">
					</div>
					<div class="col-lg-2">
						- <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cashResult'];?>
<!-- Kết quả -->:
					</div>
					<div class="col-lg-4">
						<input class="form-control" id="result_change" value="">
					</div>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default"   data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
<!--Hủy--></button>
                <button type="button" class="btn btn-primary" onclick="return start_change()"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
<!--Hoàn tất--></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/accountant_bills.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }} ?>
