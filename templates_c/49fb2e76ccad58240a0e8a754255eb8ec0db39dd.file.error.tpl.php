<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 17:20:17
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/home/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:348937146615d7861bacac0-83737160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49fb2e76ccad58240a0e8a754255eb8ec0db39dd' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/home/error.tpl',
      1 => 1633452296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '348937146615d7861bacac0-83737160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d7861bd70d2_08875594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d7861bd70d2_08875594')) {function content_615d7861bd70d2_08875594($_smarty_tpl) {?><div class="page404">
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
