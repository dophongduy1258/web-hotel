var thePage = {};

$(function() {

})

$('body').on('click', '#btn_submit', function(e) {
    thePage.funcsLogin();
});

thePage.funcsLogin = () => {

    let _see_email = $('#see_email');
    let _form_password = $('#form_password');

    let status_error = false;
    $(".err-modify-tv").remove();

    if (_see_email.val() == '') {
        _see_email.after(`<span class="err-modify-tv color-red">Vui lòng nhập thông tin đăng nhập.</span>`);
        status_error = true;
    }
    if (_form_password.val() == '') {
        _form_password.after(`<span class="err-modify-tv color-red">Vui lòng nhập mật khẩu.</span>`);
        status_error = true;
    }

    if (status_error) {
        return false;
    } else {
        let data = new FormData();
        data.append('email', _see_email.val());
        data.append('form_password', _form_password.val());
        _doAjaxNod('POST', data, 'user_login', 'login', 'login', true, (res) => {
            if (res.status == 200) {
                location.href = "/trang-chu";
            }
        })
    }

}