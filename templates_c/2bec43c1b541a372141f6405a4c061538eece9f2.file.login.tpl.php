<?php /* Smarty version Smarty-3.1.18, created on 2022-01-12 09:30:40
         compiled from "H:\php\hotel\web\web_erp\templates\user\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1180661de3d50ac97e8-05184703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bec43c1b541a372141f6405a4c061538eece9f2' => 
    array (
      0 => 'H:\\php\\hotel\\web\\web_erp\\templates\\user\\login.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1180661de3d50ac97e8-05184703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61de3d50b62ad0_64121571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61de3d50b62ad0_64121571')) {function content_61de3d50b62ad0_64121571($_smarty_tpl) {?><div class="form-login-v z2">
    <div class="container">
        <div class="form-content form-content-login">
            <h3 class="title-l">Đăng nhập</h3>
            <div class="form-action" id="formLogin">
                <div class="form-group see_email active1">
                    <input type="text" id="see_email" name="see_email" class="form-control">
                    <span class="name1">Số điện thoại hoặc địa chỉ email</span>
                </div>
                <div class="form-group form_password active1">
                    <input type="password" id="form_password" name="form_password" class="form-control">
                    <span class="name1">Mật khẩu</span>
                </div>
                <p class="link-forgot text-right hide"><a href="/quen-mat-khau">Quên mật khẩu?</a></p>
                <div class="form-group">
                    <a class="a-login" href="/dang-ky-tai-khoan">Tạo tài khoản</a>
                    <a style="cursor: pointer;" class="btn btn-key btn-width" id="btn_submit">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('body').on('click', '.form-login-v .form-content .form-action .form-group', function(){
        $('.form-login-v .form-content .form-action .form-group').removeClass('active');
        $(this).addClass('active');
    });
</script><?php }} ?>
