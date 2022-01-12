<div class="form-login-v">
    <div class="container">
        <div class="form-content form-content-login">
            <h3 class="title-l">Đăng nhập</h3>
            <form class="form-action" id="formLogin" method="POST" action="{$link}/?m=user&act=sb_login">
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
</script>