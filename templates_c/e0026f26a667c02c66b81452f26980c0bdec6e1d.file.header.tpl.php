<?php /* Smarty version Smarty-3.1.18, created on 2021-08-08 01:45:07
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:408630797610ed4b3a83024-02270860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0026f26a667c02c66b81452f26980c0bdec6e1d' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/header.tpl',
      1 => 1628361462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '408630797610ed4b3a83024-02270860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'session' => 0,
    'is_cloud_printer' => 0,
    'decimal' => 0,
    'printer_id' => 0,
    'printer_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ed4b3acf065_99100249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ed4b3acf065_99100249')) {function content_610ed4b3acf065_99100249($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en" debug="true">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['setup']->value['webtitle'];?>
</title>
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/default/favicon.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="shortcut icon"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap-dialog.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/icon.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/style.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/font-awesome.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/external/prettify.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/jquery.bootstrap-touchspin.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/jquery-ui-1.10.4.custom.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/upload_temp.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery-1.10.2.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery-ui-1.10.4.custom.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/<?php echo $_smarty_tpl->tpl_vars['session']->value['lang'];?>
/home.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php if (isset($_smarty_tpl->tpl_vars['is_cloud_printer']->value)&&$_smarty_tpl->tpl_vars['is_cloud_printer']->value=='2') {?>
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/epos-2.0.0.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php }?>
    <script type="text/javascript">
        var setup = {};
        setup.decimal = <?php echo $_smarty_tpl->tpl_vars['decimal']->value;?>
;
        <?php if (isset($_smarty_tpl->tpl_vars['is_cloud_printer']->value)&&$_smarty_tpl->tpl_vars['is_cloud_printer']->value=='2') {?>
        setup.printer_id = '<?php echo $_smarty_tpl->tpl_vars['printer_id']->value;?>
';
        setup.printer_name = '<?php echo $_smarty_tpl->tpl_vars['printer_name']->value;?>
';
        <?php } else { ?>
        setup.printer_id = '';
        setup.printer_name = '';
        <?php }?>
    </script>    
</head>
<body >

<?php }} ?>
