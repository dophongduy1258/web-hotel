<?php /* Smarty version Smarty-3.1.18, created on 2021-09-05 21:46:49
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:847409304610f98abcab4d7-20483129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '646ac38192314c8307177d0345a9991877f0409b' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/user.tpl',
      1 => 1630852836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847409304610f98abcab4d7-20483129',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f98abd8b628_07607279',
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'str_permission' => 0,
    'link' => 0,
    'opt_gid' => 0,
    'lang' => 0,
    'domain' => 0,
    'lShops' => 0,
    'item' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f98abd8b628_07607279')) {function content_610f98abd8b628_07607279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="pull-right">
		</div>
	</div>
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-15">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 dsnd1">
			<h4 class="title" style="margin-top: 0px;padding-top: 8px;"> DANH SÁCH NGƯỜI DÙNG (<a id="total">-</a>)</h4>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right dnsd2">
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_useradd:'))!==false) {?>
			<button id="btn_add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Thêm người dùng</button>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_usergid:'))!==false) {?>
				<button id="gid_btn_open_modal" class="btn btn-primary"><i class="glyphicon glyphicon-th-large"></i> Quản lý nhóm</button>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcalendar:'))!==false) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=calendar">
				<button id="gid_btn_open_modal" class="btn btn-primary"><i class="icon-cate icon-other-datetime"></i> Đặt lịch làm việc</button>
				</a>
			<?php }?>
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
          
		  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <select id="filter_gid" class="form-control">
              <option value="">Nhóm người dùng</option>
			  <?php echo $_smarty_tpl->tpl_vars['opt_gid']->value;?>

            </select>
          </div>
		  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hide">
            <select id="filter_shop_id" class="form-control">
              <option selected value="">Cửa hàng</option>
            </select>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="input-group1">
              <input id="filter_txt" type="text" class="form-control" placeholder="Username/ Fullname/ Mobile" aria-describedby="basic-addon1">
			  <button id="filter_btn_view" class="btn btn-primary" style="position: absolute;right: 0px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem<!--Xem--> </button>
            </div>
          </div>
        </div>
		
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
	<div class="table-responsive">
		<table class="table  table-striped table-bordered text-center members member_list table-bg-no">
			<thead id="">
				<tr>
				<th><input class="" id="ck_all" onclick="check_all('#ck_all', '.ck_items')" type="checkbox"></th>
				<th>User name</th>
				<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cusFullN'];?>
</th>
				<th>Nhóm</th>
				<th>Mobile</th>
				<th>Trạng thái</th>
				<th width="150">@</th>
				</tr>
			</thead>
			<tbody id="list_users" class="row-members">
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>

<div class="modal fade" id="modal_modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T" id="title_modal_add_storing">Thông tin người dùng</div>
        	<a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
            	<div class="row">
					<div class="col-lg-12 bg-hold-main-content modal-modify-user">
						<div class="col-lg-12 nopading top5">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_username'];?>
<!--Username-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="username" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_pass'];?>
<!--Mật khẩu-->:</b>				
								</div>
								<div class="col-lg-8">
									<input placeholder="********" id="password" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>
						<div class="col-lg-12 nopading top5">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_fullname'];?>
<!--Tên đầy đủ-->:</b>				
								</div>
								<div class="col-lg-8">
									<input id="fullname" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_status'];?>
<!--Trạng thái-->:</b>
								</div>
								<div class="col-lg-8">
									<select class="form-control" id="status">
										<option value="Active">Active</option>
										<option value="Deactive">Deactive</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12 nopading top5">
							<div class="col-lg-6 hide">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_bl2shop'];?>
<!--Trực thuộc:-->:</b>
								</div>
								<div class="col-lg-8">
									<select name="" id="shop_id" class="form-control">
										<option value="1">SHOP 1</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_group'];?>
<!--Nhóm-->:</b>
								</div>
								<div class="col-lg-8">
									<select class="form-control" id="gid">
										<?php echo $_smarty_tpl->tpl_vars['opt_gid']->value;?>

									</select>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 nopading top5">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cellphone'];?>
<!--Di động-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="mobile" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_phone'];?>
<!--Điện thoại-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="phone" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>
						
						<div id="for_delivery" class="col-lg-12 nopading top5 hide">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name top-5">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_userVehicle'];?>
<!--Phương tiện-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="vehicle" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name top-5">
									<b >Unit cost:</b>
								</div>
								<div class="col-lg-8">
									<input placeholder="($/Km)" id="unit_cost" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>

						<div class="col-lg-12 nopading top5">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_address'];?>
<!--Địa chỉ-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="address" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_email'];?>
<!--Email-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="email" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 nopading top5 display-none">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_bankname'];?>
<!--Tên Ngân Hàng-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="bank_name" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_branch'];?>
<!--Chi nhánh-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="bank_branch" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 nopading top5 display-none">
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_accname'];?>
<!--Tên TK-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="bank_account" class="form-control" type="text" value=""/>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4 label-name">
									<b ><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_accno'];?>
<!--Số TK-->:</b>
								</div>
								<div class="col-lg-8">
									<input id="bank_id" class="form-control" type="text" value=""/>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 nopading top5">
							<div class="col-lg-2 label-name">
								<b class="margin-left-5"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_note'];?>
<!--Ghi chú-->:</b>	
							</div>
							<div class="col-lg-10 nopadding">
								<div class="col-lg-12 ">
									<textarea rows="3" class="form-control" id="note"></textarea>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12 nopading top20">
							<div class="col-lg-2">
								<button onclick="return delete_user();" class="btn btn-danger hide form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_deleteuser'];?>
<!--Xóa user--></button>
							</div>
							<div class="col-lg-2">
							</div>
							<div class="col-lg-1">
							</div>
							<div class="col-lg-1">
							</div>
							<div class="col-lg-2">
								<button data-dismiss="modal" class="btn btn-default form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
<!--Nhập lại--></button>
							</div>
							<div class="col-lg-2">
								<button id="btn_save" class="btn btn-success form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
<!--Hoàn tất--></button>
							</div>
						</div>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_gid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="pop_up_T" id="title_modal_add_storing">Quản lý nhóm người dùng</div>
        	<a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
            	<div class="row">
	
					<div class="hold-gid-add pull-right wrap-info-in">
						<div id="hd_gid_add_name" class="col-sm-10 hide">
							<input id="gid_add_name" class="" value="" placeholder="Nhập tên nhóm"/>
						</div>
						<div class="col-sm-2">
							<span id="gid_btn_add" style="display: inline;">
								<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="30">
							</span>
						</div>
					</div>

					<div class="col-sm-12 top-20">
						<ul id="tab-list-gid" class="nav nav-tabs nav-storing tab-list-gid">
							
						</ul>
					</div>

					<div class="col-sm-12">
						<div class="col-lg-12 nopadding">
							<hr>
							<h4 class="uppercase text-center">
								Cửa Hàng Được Phép
							</h4>
						</div>
						<div class="col-lg-12 text-center">
							<label id="user_ck_all">
								<input id="inp_ck_all_shop" class="ace" type="checkbox" value="">
								<span class="lbl"></span> Chọn tất cả
							</label>
						</div>
						<div id="shop_accessed" class="col-lg-12 ">
							<ul class="store_menu">
							<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
								<li id="block_shop_item_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="block_shop_item" onclick="check_shop('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')">
									<a href="javascript:;" class="item check">
										<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

										<span id="shop_item_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" shop-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="icon-cate icon-other-check1 shop_item disabled"></span>
									</a>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>

					<div class="col-sm-12 col-sm-12">
						<hr>
						<div class="col-sm-9 col-sm-12">
							<label>Ngân hàng được phép</label>
							<p id="bank_account_list">
								<span class="item-span-name item-bank-name-idbank" bank_account="41">
									abc
									<i>x</i>
								</span>
								<span class="item-span-name item-bank-name-idbank" bank_account="41">
									abc1
									<i>x</i>
								</span>
								<span class="item-span-name item-bank-name-idbank" bank_account="41">
									abc2
									<i>x</i>
								</span>
							</p>
							<input item-id="0" id="bank_account_keyword" placeholder="Tên/ TK ngân hàng"
							    class="form-control" type="text" name="" autocomplete="off" value="">
						</div>
						<div class="col-sm-3 col-sm-12">
							<label>
								<input id="treasurer_allow_all" class="ace" type="checkbox" value="">
								<span class="lbl"></span> <span id="treasurer_allow_all_txt">Cho xem tất cả thu chi/ bỏ chọn chỉ mình tự tạo</span>
							</label>
						</div>
					</div>

					<div class="col-sm-12 col-sm-12">
						<hr>
						<div class="col-sm-6 col-sm-12">
							<label>Ví được phép</label>
							<p id="wallet_list">
								<span class="item-span-wallet item-hdl" wallet_id="41">
									Wallet 1
									<i>x</i>
								</span>
								<span class="item-span-wallet item-hdl" wallet_id="41">
									Wallet 2
									<i>x</i>
								</span>
								<span class="item-span-wallet item-hdl" wallet_id="41">
									Wallet 3
									<i>x</i>
								</span>
							</p>
							<input item-id="0" id="wallet_keyword" placeholder="Tên ví/ Mã ví"
							    class="form-control" type="text" name="" autocomplete="off" value="">
						</div>
						<div class="col-sm-6 col-sm-12">
						
						</div>
					</div>

					<div class="col-sm-12">
						<div class="col-lg-12 nopadding">
							<hr>
							<h4 class="uppercase text-center">
								<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_permission'];?>
<!-- Bảng phân quyền -->
							</h4>
						</div>
						<div class="col-lg-12 nopadding text-center">
							<label id="user_ck_all">
								<input id="inp_ck_all" class="ace" type="checkbox" value="">
								<span class="lbl"></span> Chọn tất cả
							</label>
						</div>
						<div id="permission" class="col-lg-12 nopadding top10 permission margin-b-40">
						</div>
					</div>

            	</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/supervisor_user.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
