<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:14:54
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1385285968614811b1508664-64491728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b2125cab11818e14c1b05a38d6d5dd16403ddab' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/contact.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1385285968614811b1508664-64491728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614811b153a1b5_75657366',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614811b153a1b5_75657366')) {function content_614811b153a1b5_75657366($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <textarea id="description" rows="4" class="form-control" name=""></textarea>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 top20">
            <button id="btn_save" style="float: right; margin-right:30px;"
                class="btn btn-update btn-width">Lưu</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/manager_contact.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
