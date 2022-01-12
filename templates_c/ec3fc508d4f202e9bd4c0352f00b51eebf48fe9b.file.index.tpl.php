<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 02:25:34
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:277854635610ed4b3a25cc3-10669970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec3fc508d4f202e9bd4c0352f00b51eebf48fe9b' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/index.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277854635610ed4b3a25cc3-10669970',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ed4b3a7b5f8_12172434',
  'variables' => 
  array (
    'act' => 0,
    'm' => 0,
    'tpldirect' => 0,
    'temp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ed4b3a7b5f8_12172434')) {function content_610ed4b3a7b5f8_12172434($_smarty_tpl) {?><?php if (!($_smarty_tpl->tpl_vars['act']->value=='home'&&$_smarty_tpl->tpl_vars['m']->value=='pub')) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div id="main-container" class="">
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value).((string)$_smarty_tpl->tpl_vars['temp']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value).((string)$_smarty_tpl->tpl_vars['temp']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
