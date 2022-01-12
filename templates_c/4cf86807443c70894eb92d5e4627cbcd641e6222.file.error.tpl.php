<?php /* Smarty version Smarty-3.1.18, created on 2022-01-12 11:54:23
         compiled from "D:\web-hotel\hotel\templates\home\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2958561de5effb4bcf3-79635602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cf86807443c70894eb92d5e4627cbcd641e6222' => 
    array (
      0 => 'D:\\web-hotel\\hotel\\templates\\home\\error.tpl',
      1 => 1641963015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2958561de5effb4bcf3-79635602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61de5effbb01d5_34967569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61de5effbb01d5_34967569')) {function content_61de5effbb01d5_34967569($_smarty_tpl) {?><div class="page404 z2">
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
