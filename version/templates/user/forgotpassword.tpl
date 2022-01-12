<div class="form-login-v">
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
</script>