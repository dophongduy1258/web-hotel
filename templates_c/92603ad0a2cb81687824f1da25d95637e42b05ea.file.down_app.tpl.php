<?php /* Smarty version Smarty-3.1.18, created on 2021-12-03 09:26:42
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/home/down_app.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141104901561a446e0632a71-80777945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92603ad0a2cb81687824f1da25d95637e42b05ea' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/home/down_app.tpl',
      1 => 1638498396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141104901561a446e0632a71-80777945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61a446e06ed703_95530425',
  'variables' => 
  array (
    'meta_title' => 0,
    'url_logo' => 0,
    'domain' => 0,
    'title' => 0,
    'link_ios' => 0,
    'link_android' => 0,
    'link_qrweb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61a446e06ed703_95530425')) {function content_61a446e06ed703_95530425($_smarty_tpl) {?><div class="container">
    <div class="download-app">
        <a href="/" title="<?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?>"><img src="<?php if (isset($_smarty_tpl->tpl_vars['url_logo']->value)&&$_smarty_tpl->tpl_vars['url_logo']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['url_logo']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/logo.png<?php }?>" alt="<?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?>"></a>
        <h2>Tải App <?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)&&$_smarty_tpl->tpl_vars['meta_title']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php }?></h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 down_app">
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_ios']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/app_apple.jpg" alt="" class="img-responsive" /></a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_android']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/app_google.jpg" alt="" class="img-responsive" /></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center"><img src="<?php echo $_smarty_tpl->tpl_vars['link_qrweb']->value;?>
" alt="" class="" width="240"/></div>
            </div>
        </div>
    </div>
</div><?php }} ?>
