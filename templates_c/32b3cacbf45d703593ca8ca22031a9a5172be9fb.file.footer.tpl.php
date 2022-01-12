<?php /* Smarty version Smarty-3.1.18, created on 2021-09-20 11:44:31
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1696110344614811af7b9d55-02667792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32b3cacbf45d703593ca8ca22031a9a5172be9fb' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/footer.tpl',
      1 => 1632039467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1696110344614811af7b9d55-02667792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614811af7e8c64_36689149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614811af7e8c64_36689149')) {function content_614811af7e8c64_36689149($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



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
/js/js_act/manager_footer.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
