<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 16:11:52
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175271859612929fe66e4b7-47571277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77583053cae173b4175f4e7cc6b708b014e62124' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/home.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175271859612929fe66e4b7-47571277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_612929fe675f46_87091592',
  'variables' => 
  array (
    'tpldirect' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612929fe675f46_87091592')) {function content_612929fe675f46_87091592($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
