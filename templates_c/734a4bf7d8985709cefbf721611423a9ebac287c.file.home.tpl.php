<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 21:19:40
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/setting/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301372777615475fc9b45e5-36502524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '734a4bf7d8985709cefbf721611423a9ebac287c' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/setting/home.tpl',
      1 => 1632924511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301372777615475fc9b45e5-36502524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475fc9e3937_02786134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475fc9e3937_02786134')) {function content_615475fc9e3937_02786134($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="col-sm-12 col-xs-12">
    <div class="col-sm-1 col-xs-12">
    </div>
    <div class="col-sm-10 col-xs-12">
        <div class="col-sm-12 col-xs-12">
            <div class="col-sm-4 col-xs-12">
            </div>
            <div class="col-sm-4 col-xs-6 setting-pro-price-detail">
                <label>
                    <input <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['home_page_enabled'])&&$_smarty_tpl->tpl_vars['setup']->value['home_page_enabled']==1) {?>checked<?php }?> id="home_page_enabled" class="ace ace-switch ace-switch-4" type="checkbox" value="0">
                    <span class="lbl"></span> Cho phép sử dụng trang chủ
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 top-20 text-right">
            <button id="btn_edit" class="btn btn-primary btn-width"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cập nhật</button>
        </div>
        <div class="col-sm-12 col-xs-12 top-5">
            <textarea id="content_home_page"><?php if (isset($_smarty_tpl->tpl_vars['setup']->value['content_home_page'])) {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['content_home_page'];?>
<?php }?></textarea>
        </div>
    </div>
</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/setting_home.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }} ?>
