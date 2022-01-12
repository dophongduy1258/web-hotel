<div class="form-login-v z2">
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
</script>