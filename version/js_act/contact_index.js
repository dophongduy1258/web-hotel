var thePage = {};

thePage.fullname = $("#fullname");
thePage.email = $("#email");
thePage.mobile = $("#mobile");
thePage.content = $("#content");

$(function() {

    thePage.getItemCustomer();

});

thePage.getItemCustomer = () => {

    var itemCustomer = getLocalStorage(keyLocalStorageItemCustomer);
    // console.log(itemCustomer);
    if (itemCustomer != null) {
        thePage.fullname.val(itemCustomer.fullname);
        thePage.email.val(itemCustomer.email);
        thePage.mobile.val(itemCustomer.mobile);
    } else {
        thePage.fullname.val('');
        thePage.email.val('');
        thePage.mobile.val('');
        thePage.content.val('');
    }

}

$('body').on('click', '#submitInfo', function(e) {

    let status_error = false;
    $(".err-modify-tv").remove();

    var mobile = thePage.mobile.val().replace(/ +/g, "");

    if (thePage.fullname.val() == '') {
        thePage.fullname.after(`<span class="err-modify-tv color-red">Vui lòng nhập Họ và Tên.</span>`);
        status_error = true;
    }
    if (thePage.email.val() != '' && emailIsValid(thePage.email.val()) == false) {
        thePage.email.after(`<span class="err-modify-tv color-red">Email không đúng định dạng.</span>`);
        status_error = true;
    }
    if (mobile == '') {
        thePage.mobile.after(`<span class="err-modify-tv color-red">Vui lòng nhập số điện thoại.</span>`);
        status_error = true;
    }
    if (mobile != '' && mobileIsValid(mobile) == false) {
        thePage.mobile.after(`<span class="err-modify-tv color-red">Số điện thoại không đúng định dạng.</span>`);
        status_error = true;
    }
    if (thePage.content.val() == '') {
        thePage.content.after(`<span class="err-modify-tv color-red">Nội dung không được để trống.</span>`);
        status_error = true;
    }

    if (status_error) {
        return false;
    } else {
        e.preventDefault();
        var data = new FormData();
        data.append('fullname', thePage.fullname.val());
        data.append('mobile', mobile);
        data.append('email', thePage.email.val());
        data.append('content', thePage.content.val());
        _doAjaxNod('POST', data, 'contact_index', 'save', 'save', true, (res) => {
            // console.log(res.data);
            BootstrapDialog.show({
                title: "Thông báo!",
                message: `Đã gửi thông tin thành công. Chúng tôi sẽ sớm liên lạc với bạn.`,
                buttons: [{
                    label: 'Xác nhận',
                    cssClass: 'btn-key btn-width',
                    action: function(dialogItself) {
                        dialogItself.close();
                        removeDataLocalStorage(keyLocalStorageItemCustomer);
                        location.replace(url_domain + '/contact');
                    }
                }]
            });
        });
    }

});

function emailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

function mobileIsValid(mobile) {
    return /((09|03|07|08|05)+([0-9]{8})\b)/g.test(mobile)
}