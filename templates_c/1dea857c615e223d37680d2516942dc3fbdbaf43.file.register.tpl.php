<?php /* Smarty version Smarty-3.1.18, created on 2021-12-03 09:46:58
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211641336761614bd5b882d2-30125344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dea857c615e223d37680d2516942dc3fbdbaf43' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/register.tpl',
      1 => 1638498147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211641336761614bd5b882d2-30125344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61614bd5bbda29_17727143',
  'variables' => 
  array (
    'link' => 0,
    'referral_by' => 0,
    'fullname' => 0,
    'email' => 0,
    'mobile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61614bd5bbda29_17727143')) {function content_61614bd5bbda29_17727143($_smarty_tpl) {?><div class="form-login-v">
    <div class="container">
        <div class="form-content">
            <div class="form-content-left">
                <h3 class="title-l">Tạo Tài khoản</h3>
                <div class="form-action" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=user&act=sb_register">
                <?php if ($_smarty_tpl->tpl_vars['referral_by']->value=='') {?>
                    <div class="form-group username active1">
                        <input type="text" id="referral_by" name="referral_by" class="form-control" value="">
                        <span class="name1">Mã giới thiệu (nếu có)</span>
                    </div>
                <?php } else { ?>
                    <input type="text" id="referral_by" name="referral_by" class="form-control hide" value="<?php echo $_smarty_tpl->tpl_vars['referral_by']->value;?>
">
                <?php }?>
                    <div class="form-group form_name active1">
                        <input type="text" id="see_name" name="see_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>
">
                        <span class="name1">Họ & tên</span>
                    </div>
                    <div class="form-group see_email active1">
                        <input type="text" id="see_email" name="see_email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
                        <span class="name1">Địa chỉ email</span>
                    </div>
                    <div class="form-group see_phone active1">
                        <input type="text" id="see_phone" name="see_phone" maxlength="15" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
">
                        <span class="name1">Số điện thoại</span>
                    </div>
                    <div class="form-group input-password form_password active1">
                        <input type="password" id="form_password" name="form_password" class="form-control">
                        <span class="name1">Mật khẩu</span>
                    </div>
                    <div class="form-group input-password form_re_password active1">
                        <input type="password" id="form_re_password" name="form_re_password" class="form-control">
                        <span class="name1">Xác nhận</span>
                    </div>
                    <div class="eye-password eye-password1"><i class="fa fa-eye"></i><i class="fa fa-eye-slash"></i>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <a class="a-login" href="/dang-nhap">Đăng nhập</a><button type="submit"
                            class="btn btn-key btn-width" id="btn_submit">Tạo tài khoản</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_alert_dialog" class="modal fade modalAlert in" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close" data-dismiss="modal" aria-label="Close">x</span>
                <h3>Thông báo</h3>
                <p id="message_alert"></p>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">OK</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('body').on('click', '.form-login-v .form-content .form-action .form-group', function() {
        $('.form-login-v .form-content .form-action .form-group').removeClass('active');
        $(this).addClass('active');
        $(this).find('input').focus();
    });

    

    $('body').on('click', '.form-login-v .form-content .form-action .eye-password1', function() {
        $(this).addClass('eye-password2');
        $(this).removeClass('eye-password1');
        $('.input-password input').attr('type', 'text');
    });
    $('body').on('click', '.form-login-v .form-content .form-action .eye-password2', function() {
        $(this).addClass('eye-password1');
        $(this).removeClass('eye-password2');
        $('.input-password input').attr('type', 'password');
    });
</script><?php }} ?>
