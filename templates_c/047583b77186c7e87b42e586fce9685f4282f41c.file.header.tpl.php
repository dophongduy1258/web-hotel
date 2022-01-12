<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 21:18:46
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173574662615475c685f997-27241460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '047583b77186c7e87b42e586fce9685f4282f41c' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/header.tpl',
      1 => 1632798463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173574662615475c685f997-27241460',
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
  'unifunc' => 'content_615475c687e154_62036199',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475c687e154_62036199')) {function content_615475c687e154_62036199($_smarty_tpl) {?><!DOCTYPE html>
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
