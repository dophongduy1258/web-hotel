<?php /* Smarty version Smarty-3.1.18, created on 2021-11-02 17:27:22
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/forgotpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9852230446181125b7a9435-87381447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c13a18d0ea5720b4895bd3dcf8c73144f0c953bb' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/forgotpassword.tpl',
      1 => 1635848818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9852230446181125b7a9435-87381447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6181125b7c4802_87255405',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6181125b7c4802_87255405')) {function content_6181125b7c4802_87255405($_smarty_tpl) {?><div class="form-login-v">
    <div class="container">
        <div class="form-content">
            <div class="form-content-left">
                <h3 class="title-l">Tìm tài khoản</h3>
                <p class="title-l1">Nhập số điện thoại hoặc email khôi phục</p>
                <form class="form-action">
                    <div class="form-group phone">
                        <input type="text" id="phone" class="form-control">
                        <span class="name1">Email hoặc Số điện thoại</span>
                    </div>
                    <div class="form-group">
                        <a class="a-login" href="?m=user&act=login">Đăng nhập</a><button type="submit" class="btn btn-key">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('body').on('click', '.form-login-v .form-content .form-action .form-group', function(){
        $('.form-login-v .form-content .form-action .form-group').removeClass('active');
        $(this).addClass('active');
    });
    function phone(){ $('.form_name').addClass('active1'); }
    $('.form-login-v .form-content .form-action .form-group input#phone').keyup(phone);
</script><?php }} ?>
