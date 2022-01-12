<?php /* Smarty version Smarty-3.1.18, created on 2021-09-02 20:22:40
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6620841916130d020609cb3-96151030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '476120a82dcdaa7379ed4570ed46f6a913072e43' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/index.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6620841916130d020609cb3-96151030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'link' => 0,
    'lang' => 0,
    'session' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6130d0206787d8_30114843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6130d0206787d8_30114843')) {function content_6130d0206787d8_30114843($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
	<div class="col-sm-12">

		<div class="col-lg-1">
		</div>
		<div class="col-lg-12 btn-80">

			<div class="col-lg-2 top20">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=pos">
					<button class="form-control uppercase btn btn-itemicon"><i class="icon-cate icon-electric21 font-size-40"></i><p class="menu_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_optPos'];?>
<!-- Tùy chỉnh POS --></p></button>
				</a>
			</div>

			<?php if ($_smarty_tpl->tpl_vars['session']->value['gid']==0) {?>
				
			<?php }?>
	
		</div>
		<div class="col-lg-1">
		</div>
	</div>
</div>

<!--BEGIN MODAL-->
<div class="modal fade" id="modal_select_lang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-small">
		<div class="modal-header noborder">
			<a data-dismiss="modal" class="close" href="#">× </a>
			<h4 class="background-header-blue"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectlang'];?>
<!--Chọn ngôn ngữ hệ thống--></h4>
		</div>
		<div class="modal-body nopadding margintop-10 btn-shop-height">
			<div class="height250 btn-80">
				<div class="col-lg-4 col-md-4 col-xs-6 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=change_lang&lang=en">
						<button class="btn btn-default">ENGLISH</button>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-6 top-10">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=change_lang&lang=vi">
						<button class="btn btn-default">TIẾNG VIỆT</button>
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-12  col-xs-12 nopadding" data-dismiss="modal">
			<button class="btn btn-default btn-list-shop-close" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i></button>
		</div>
	</div>
</div>
<!--END MODAL-->
<?php }} ?>
