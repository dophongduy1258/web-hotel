<?php /* Smarty version Smarty-3.1.18, created on 2021-12-13 17:19:46
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2012215892616c65de79d0f6-50953936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdd474f401a420437df3d465e3c1fbdd19577289' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/notification.tpl',
      1 => 1639383397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2012215892616c65de79d0f6-50953936',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_616c65de7c1db2_17543748',
  'variables' => 
  array (
    'tpldirect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_616c65de7c1db2_17543748')) {function content_616c65de7c1db2_17543748($_smarty_tpl) {?><div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-noti" id="formNoti">
                    <h3 class="title-profile" id="totalNoti"></h3>
                    <ul id="lNoti"></ul>
                </div>
                <div class="paging text-center" id="page_html"></div>
                <div class="item info-noti" id="formDetail" style="display: none;">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <div id="dNoti"></div>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
