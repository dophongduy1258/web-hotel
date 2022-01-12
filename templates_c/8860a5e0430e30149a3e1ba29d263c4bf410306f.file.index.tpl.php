<?php /* Smarty version Smarty-3.1.18, created on 2021-09-30 22:01:11
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1189566408615475c681fe94-65024011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8860a5e0430e30149a3e1ba29d263c4bf410306f' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/index.tpl',
      1 => 1633014049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1189566408615475c681fe94-65024011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475c68584c1_22656343',
  'variables' => 
  array (
    'act' => 0,
    'm' => 0,
    'tpldirect' => 0,
    'temp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475c68584c1_22656343')) {function content_615475c68584c1_22656343($_smarty_tpl) {?><?php if (!($_smarty_tpl->tpl_vars['act']->value=='home'&&$_smarty_tpl->tpl_vars['m']->value=='pub')) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div id="main-container" class="">
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value).((string)$_smarty_tpl->tpl_vars['temp']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value).((string)$_smarty_tpl->tpl_vars['temp']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
