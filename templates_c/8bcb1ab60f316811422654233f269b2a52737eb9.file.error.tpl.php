<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:45:28
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/home/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936690756160068772fdd9-18686126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bcb1ab60f316811422654233f269b2a52737eb9' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/home/error.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936690756160068772fdd9-18686126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61600687761572_52768199',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61600687761572_52768199')) {function content_61600687761572_52768199($_smarty_tpl) {?><div class="page404 z2">
    <div class="container">
        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/404.png" />
        <p class="title1">Lỗi</p>
        <p class="title2">Rất tiếc...</p>
        <p class="title2">Chúng tôi không tìm thấy trang mà bạn yêu cầu.</p>
        <a href="/trang-chu" class="btn btn-key">Quay lại trang chủ</a>
    </div>
</div>
<?php }} ?>
