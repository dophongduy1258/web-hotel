<?php /* Smarty version Smarty-3.1.18, created on 2021-09-30 22:01:34
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/supervisor/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1982137354615475f8401e23-97675622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d0e531fe898b3beb222ea7ffb4b8e888ae6f75e' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/supervisor/index.tpl',
      1 => 1633014049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1982137354615475f8401e23-97675622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475f848f079_47656632',
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'str_permission' => 0,
    'lShops' => 0,
    'link' => 0,
    'lang' => 0,
    'db_pos' => 0,
    'no_day_left' => 0,
    'date_expire' => 0,
    'string' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475f848f079_47656632')) {function content_615475f848f079_47656632($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 top5 btn-80">

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':mainretail:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10" >
				<?php if (COUNT($_smarty_tpl->tpl_vars['lShops']->value)==1) {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=on_shop&shop_id=<?php echo $_smarty_tpl->tpl_vars['lShops']->value[0]['id'];?>
">
					<button title="<?php echo $_smarty_tpl->tpl_vars['lShops']->value[0]['name'];?>
" class="form-control btn btn-itemicon"><i class="icon-cate icon-other-cart icon-size"></i><p class="menu_name">POS<!--BÁN HÀNG--></p></button>
					</a>
				<?php } else { ?>
					<button class="form-control btn btn-itemicon" data-target="#modal_select_shop" data-toggle="modal"><i class="icon-cate icon-other-cart icon-size"></i><p class="menu_name">POS<!--BÁN HÀNG--></p></button>
				<?php }?>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorshop:'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shop"><button class="form-control btn btn-itemicon"><i class="icon-cate icon-other-store3 icon-size uppercase"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_shop'];?>
<!--CỬA HÀNG--></p></button></a>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcategory:'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category"><button class="form-control uppercase btn btn-itemicon"><i class="icon-cate icon-other-list icon-size icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['tt_product'];?>
</p></button></a>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisoruser:'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-10" id="user_pc">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=user"><button class="form-control uppercase btn btn-itemicon"><i class="icon-cate icon-other-peo icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_ttuser'];?>
<!--KHÁCH HÀNG--></p></button></a>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantindex:'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=index">
						<button class="form-control btn btn-itemicon"><i class="icon-cate icon-other-book icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_accounting'];?>
<!--KẾ TOÁN--></p></button></a>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'supervisorshifts_history'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shifts_history">
						<button class="form-control uppercase btn btn-itemicon"><i class="icon-cate icon-other-clock icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_shiftdate'];?>
<!--NHẬT KÝ GIAO CA--></p></button></a>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'coffersindex'))!==false) {?>
				<div class="col-xs-6 col-sm-3 col-lg-2 top-20 hidden">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=coffers&act=index">
						<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-euro icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_coffers'];?>
<!--Két tiền--></p></button>
					</a>
				</div>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':memberslist:'))!==false) {?>
	        <div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=list">
					<button class="form-control uppercase btn btn-itemicon">
						<i class="icon-cate icon-other-group icon-size"></i>
						<p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_customers'];?>
</p>
					</button>
				</a>
			</div>
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'voucherexport'))!==false) {?>
	        <div class="col-xs-6 col-sm-3 col-lg-2 hide top-20">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=voucher&act=export">
					<button class="form-control uppercase btn btn-itemicon">
						<i class="glyphicon glyphicon-qrcode icon-size"></i>
						<p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_exportVoucher'];?>
</p>
					</button>
				</a>
			</div>
	        <?php }?>

	        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'voucherindex'))!==false) {?>
	        <div class="col-xs-6 col-sm-3 col-lg-2 hide top-20">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=voucher">
					<button class="form-control uppercase btn btn-itemicon">
						<i class="glyphicon glyphicon-th icon-size"></i>
						<p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_VoucherCoupon'];?>
</p>
					</button>
				</a>
			</div>
	        <?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productindex:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=index">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-shopping-cart icon-size"></i><p class="menu_name">Kho sản phẩm</p></button>
				</a>
			</div>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorlog:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=log">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-tasks icon-size"></i><p class="menu_name">Nhật ký</p></button>
				</a>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['db_pos']->value=='derp') {?>
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcommission:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=commission">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-gift icon-size"></i><p class="menu_name">Hoa Hồng & Thưởng</p></button>
				</a>
			</div>
			<?php }?>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=bank">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-th-large icon-size"></i><p class="menu_name">Danh sách ngân hàng</p></button>
				</a>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank_transaction:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-20 hide">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=bank_transaction">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-briefcase icon-size"></i><p class="menu_name">Lệnh nạp/ rút SP</p></button>
				</a>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendtransaction_history:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-20 hide">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=transaction_history">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-list-alt icon-size"></i><p class="menu_name">Lịch sử giao dịch SP</p></button>
				</a>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendpackage:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-20 hide">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=package">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-inbox icon-size"></i><p class="menu_name">Lịch sử mua gói điểm SP</p></button>
				</a>
			</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':settingpos:'))!==false) {?>
			<div class="col-xs-6 col-sm-3 col-lg-2 top-10">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=index">
					<button class="form-control uppercase btn btn-itemicon"><i class="glyphicon glyphicon-cog icon-size"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_settings'];?>
</p></button>
				</a>
			</div>
			<?php }?>
			
			<div class="col-xs-6 col-sm-3 col-lg-2 hide top-20">
	          <div class="thumbnail main_menu expire_date btn-itemicon">
	            <p class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_validUntil'];?>
</p>
	            <?php if ($_smarty_tpl->tpl_vars['no_day_left']->value!=0) {?>
	              <?php if ($_smarty_tpl->tpl_vars['no_day_left']->value>0) {?>
	              <p class="date color-green"><?php echo $_smarty_tpl->tpl_vars['date_expire']->value;?>
</p>
	              <?php } else { ?>
	              <p class="date color-red"><?php echo $_smarty_tpl->tpl_vars['date_expire']->value;?>
</p>
	              <?php }?>
	              <p class="day_left">
	              	<?php echo $_smarty_tpl->tpl_vars['string']->value;?>

	              </p>
	            <?php } else { ?>
	              <p class="date color-green"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_unlimit'];?>
</p>
	              <p class="day_left">-</p>
	            <?php }?>
	          </div>
	        </div>

	        <div class="col-xs-6 col-sm-3 col-lg-2 top-20 hidden-lg hidden-md hidden-sm visibled-xs">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/logout.php">
					<button class="form-control uppercase btn btn-itemicon">
						<i class="glyphicon glyphicon-log-out icon-size"></i>
						<p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_logout'];?>
</p>
					</button>
				</a>
			</div>
			
		</div>
		<div class="col-lg-1">
		</div>
	</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']<1||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'mainretail'))!==false) {?>
<!--BEGIN MODAL-->
<div class="modal fade" id="modal_select_shop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-small">
		<div class="modal-header noborder">
			<a data-dismiss="modal" class="close" href="#">× </a>
			<h4 class="background-header-blue"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_chanelsell'];?>
<!--Kênh bán hàng--></h4>
		</div>
		<div class="modal-body nopadding margintop-10 bg-white bx-viewport">
			<div class="height250 btn-shop-height">					
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<div class="col-lg-4 col-md-4  col-xs-6 top10">
						<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=on_shop&shop_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><button title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</button></a>
					</div>
				<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
					<div class="col-lg-4 col-md-4  col-xs-6 top10">
						<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']<1||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'supervisorshop:'))!==false) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shop"><button title="Thêm mới shop" class="btn btn-default"><i class="glyphicon glyphicon-plus-sign"></i></button></a>
						<?php } else { ?>
							<p>Liên hệ Admin để thêm cửa hàng</p>
						<?php }?>
					</div>
				<?php } ?>
			</div>
			<div class="col-sm-12 col-md-12 col-xs-12 nopadding" data-dismiss="modal">
				<button class="btn btn-default btn-list-shop-close" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i></button>
			</div>
		</div>
	</div>
</div>
<!--END MODAL-->
<?php }?>

<script type="text/javascript">
$(window).resize(function() {
	
	/* var wwidth = $(window).width();
	if(wwidth>600){
		$("#user_pc").show();
		$("#user_mobile").hide();
	}else{
		$("#user_pc").hide();
		$("#user_mobile").show();
	} */

});

$(function(){
	var wwidth = $(window).width();
	if(wwidth>600){
		$("#user_pc").show();
		$("#user_mobile").hide();
	}else{
		$("#user_pc").hide();
		$("#user_mobile").show();
	}
});
</script>
<style type="text/css">
	h2.title-page { display: none; }
</style><?php }} ?>
