<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 17:20:07
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320239726615d78570f7093-31216888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab466e85c576587a7e4afb4dee468dd5f26bc34b' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/login.tpl',
      1 => 1633362632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320239726615d78570f7093-31216888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d7857117c63_09740044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d7857117c63_09740044')) {function content_615d7857117c63_09740044($_smarty_tpl) {?><div class="form-login-v">
    <div class="container">
        <div class="form-content form-content-login">
            <h3 class="title-l">Đăng nhập</h3>
            <form class="form-action" id="formLogin" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=user&act=sb_login">
                <div class="form-group see_email active1">
                    <input type="text" name="see_email" class="form-control">
                    <span class="name1">Số điện thoại hoặc địa chỉ email</span>
                </div>
                <div class="form-group form_password active1">
                    <input type="password" name="form_password" class="form-control">
                    <span class="name1">Mật khẩu</span>
                </div>
                <p class="link-forgot text-right hide"><a href="?m=user&act=forgotpassword">Quên mật khẩu?</a></p>
                <div class="form-group">
                    <a class="a-login" href="/dang-ky-tai-khoan">Tạo tài khoản</a>
                    <a href="javascript:{}" onclick="document.getElementById('formLogin').submit();" class="btn btn-key btn-width">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('body').on('click', '.form-login-v .form-content .form-action .form-group', function(){
        $('.form-login-v .form-content .form-action .form-group').removeClass('active');
        $(this).addClass('active');
    });
</script><?php }} ?>
