var thePage = {};

$(function() {

    $("#birthday").datepicker({
        dateFormat: "dd/mm/yy"
    });

    $(".form-info").prop("disabled", true);
    $("#btn_update_info").click(function() {
        if ($("#btn_update_info").html() == 'Lưu') {
            thePage.funcsSave();
        } else {
            $(".form-info").prop("disabled", false);
            $("#btn_update_info").html("Lưu");
        }
    });

    thePage.getInfo();

})

thePage.getInfo = () => {

    _doAjaxNod('POST', '', 'user_profile', 'idx', 'info', true, (res) => {
        $('#fullname').val(res.data.fullname);
        $('#email').val(res.data.email);
        $('#mobile').val(res.data.mobile);
        $('#birthday').val(res.data.day != '' && res.data.day != '0' ? res.data.day + '/' + res.data.month + '/' + res.data.year : "");
        if (res.data.sex == 0) {
            $("#female").prop("checked", true);
        } else {
            $("#male").prop("checked", true);
        }
    })
}

thePage.funcsSave = () => {

    let _fullname = $('#fullname');
    let _mobile = $('#mobile');
    let _email = $('#email');
    let _birthday = $('#birthday');
    let _oldPass = $('#oldPass');
    let _newPass = $('#newPass');
    let _confirmPass = $('#confirmPass');
    var _sex = $("input[name='radio_gt']:checked").val();

    var mobile = _mobile.val().replace(/ +/g, "");

    let status_error = false;
    $(".err-modify-tv").remove();

    if (_fullname.val() == '') {
        _fullname.after(`<span class="err-modify-tv color-red">Vui lòng nhập Họ và Tên.</span>`);
        status_error = true;
    }
    if (_email.val() != '' && emailIsValid(_email.val()) == false) {
        _email.after(`<span class="err-modify-tv color-red">Email không đúng định dạng.</span>`);
        status_error = true;
    }
    if (mobile == '') {
        _mobile.after(`<span class="err-modify-tv color-red">Vui lòng nhập số điện thoại.</span>`);
        status_error = true;
    }
    if (mobile != '' && mobileIsValid(mobile) == false) {
        _mobile.after(`<span class="err-modify-tv color-red">Số điện thoại không đúng định dạng.</span>`);
        status_error = true;
    }
    if (_newPass.val() != '' && _oldPass.val() == '') {
        _confirmPass.after(`<span class="err-modify-tv color-red">Vui lòng nhập mật khẩu cũ.</span>`);
        status_error = true;
    }
    if (_newPass.val() != '' && _newPass.val() != _confirmPass.val()) {
        _confirmPass.after(`<span class="err-modify-tv color-red">Xác nhận mật khẩu không đúng.</span>`);
        status_error = true;
    }

    if (status_error) {
        return false;
    } else {
        let data = new FormData();
        data.append('fullname', _fullname.val());
        data.append('email', _email.val());
        data.append('mobile', _mobile.val());
        data.append('birthday', _birthday.val());
        data.append('sex', _sex);
        data.append('oldPass', _oldPass.val());
        data.append('newPass', _newPass.val());
        _doAjaxNod('POST', data, 'user_profile', 'update', 'info', true, (res) => {
            $(".form-info").prop("disabled", true);
            $("#btn_update_info").html("Cập nhật");
            alert_void('Cập nhật thành công.', 1);
        })
    }

}

var body = document.getElementsByTagName('body')[0];
var btnCopy = document.getElementById('btnCopy');
var link = $('#link').val();

var copyToClipboard = function(link) {
    var tempInput = document.createElement('INPUT');
    body.appendChild(tempInput);
    tempInput.setAttribute('value', link)
    tempInput.select();
    document.execCommand('copy');
    body.removeChild(tempInput);
}

$('body').on('click', '#btnCopy', function(e) {
    // e.preventDefault();
    copyToClipboard(link);
    alert_void("Đã copy thành công!", 1);
    return false;
});