<?php /* Smarty version Smarty-3.1.18, created on 2021-09-30 22:01:12
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:874071483615475d0e30b83-33021065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bb3390728a8fd7567d309e9ddb0635ba5ad3610' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/user/login.tpl',
      1 => 1633014049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '874071483615475d0e30b83-33021065',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475d0e72820_68990579',
  'variables' => 
  array (
    'tpldirect' => 0,
    'link' => 0,
    'session' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475d0e72820_68990579')) {function content_615475d0e72820_68990579($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."header_login_page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="top20">
	
	<div class="col-sm-push-4 col-sm-4">
		<div class="col-sm-12 col-xs-12">
			Bạn chưa có tài khoản khách hàng? <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/dang-ky/<?php echo $_smarty_tpl->tpl_vars['session']->value['referral_id'];?>
"> click ở đây ngay</a>
		</div>
		<div class="col-sm-12 col-xs-12 top-20">
		</div>
		<div role="tabpanel" class="">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				
				<li role="presentation" id="tab_client" class="active text-center" style="width:50%">
					<a href="#clientLogin" aria-controls="clientLogin" role="tab" data-toggle="tab">
						Khách hàng
					</a>
				</li>
				<li role="presentation" id="tab_login"  style="width:50%" class=" text-center">
					<a href="#userLogin" aria-controls="userLogin" role="tab" data-toggle="tab" style="margin-right: 0px;">
						Quản trị
					</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="custome-tab-content tab-content tab-setting">

					<!-- Người dùng -->
					<div role="tabpanel" class="tab-pane " id="userLogin">
						<div class="col-sm-12 top-20">
							<form method="POST" name="" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=user&act=sb_login">
								<div class="col-lg-12 col-md-12 col-xs-12 top20">
									<div class="input-group input-group-md">
									<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
										<input class="form-control" type="text" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['login_name'];?>
" value="" style="height: 38px;"/>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-xs-12 top10">
									<div class="input-group input-group-md">
									<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
										<input class="form-control" type="password" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['login_pass'];?>
" value="" style="height: 38px;"/>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-xs-12 text-center">
									<div class="margin-top">
										<div class="col-sm-6 col-xs-6 nopadding-l top-5">
											<input type="reset" class="btn btn-default form-control"  name="reset" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['reset'];?>
" style="height: 38px;"/>
										</div>
										<div class="col-sm-6 col-xs-6 nopadding-r top-5">
											<input type="submit" class="btn btn-primary form-control" onclick="return check_login();" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['login'];?>
" style="height: 38px;"/>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- Client -->
					<div role="tabpanel" class="tab-pane active" id="clientLogin">
						<div class="col-sm-12 top-20">
							<form method="POST" name="" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=sb_login">
								<div class="col-lg-12 col-md-12 col-xs-12 top20">
									<div class="input-group input-group-md">
									<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
										<input class="form-control" type="text" id="username" name="username" placeholder="Email/ Số điện thoại" value="" style="height: 38px;"/>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-xs-12 top10">
									<div class="input-group input-group-md">
									<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
										<input class="form-control" type="password" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['login_pass'];?>
" value="" style="height: 38px;"/>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-xs-12 text-center">
									<div class="margin-top">
										<div class="col-sm-6 col-xs-6 nopadding-l top-5">
											<input type="reset" class="btn btn-default form-control"  name="reset" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['reset'];?>
" style="height: 38px;"/>
										</div>
										<div class="col-sm-6 col-xs-6 nopadding-r top-5">
											<input type="submit" class="btn btn-primary form-control" onclick="return check_login();" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['login'];?>
" style="height: 38px;"/>
										</div>
										<br>
										<br>
										<p class="top-20">
											Tạo tài khoản mới? <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/dang-ky/<?php echo $_smarty_tpl->tpl_vars['session']->value['referral_id'];?>
"> click ở đây ngay</a>
										</p>
									</div>
								</div>
								
							</form>
						</div>
					</div>
			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	let activeTab = getCookie('activeTab');
	if( activeTab && activeTab == 'login' ){
		$("ul.nav.nav-tabs li").removeClass("active");
		$("div.tab-pane").removeClass("active");
		$("#tab_login").addClass("active");
		$("#userLogin").addClass("active");
	}else if( activeTab && activeTab == 'client' ){
		$("ul.nav.nav-tabs li").removeClass("active");
		$("div.tab-pane").removeClass("active");
		$("#tab_client").addClass("active");
		$("#clientLogin").addClass("active");
	}
	$("#tab_client").click(function(){
		createCookie('activeTab', 'client', 300);
	})
	$("#tab_login").click(function(){
		createCookie('activeTab', 'login', 300);
	})
})
</script><?php }} ?>
