var thePage = {};

thePage.bankDefault = $("#bankdefault");
thePage.lBankInfo = $("#listBankInfo");
thePage.bankID = '';

$(function() {

    thePage.listBankInfo();

})

thePage.listBankInfo = () => {

    let data = new FormData();

    _doAjaxNod('POST', data, 'user_paymentcard', 'idx', 'list_bank_info', true, (res) => {
        // console.log(res.data);
        thePage.lBankInfo.html(thePage.render_list_bank_info(res.data));
    })
}

// render danh sách ngân hàng để người dùng chọn ngân hàng thêm thẻ mới
thePage.render_list_bank_info = (l) => {
    let h = '';
    l.forEach(function(item) {
        h += `<li>
                <div class="item">
                    <div class="img"><img src="${item.icon}" alt="#"></div>
                    <p><b>Số tài khoản: </b>${item.number}</p>
                    <p><b>Họ &amp; tên: </b>${item.name}</p>
                    <a class="delete" id="delete_bank_info" id_bank_info=${item.id}>Xóa</a>
                </div>
            </li>`;
    })
    return h;
}

$('body').on('click', '#delete_bank_info', function(e) {
    let _id = $(this).attr('id_bank_info');

    BootstrapDialog.show({
        title: "Xác nhận",
        message: `Bạn muốn xóa thẻ thanh toán này?`,
        buttons: [{
            label: 'Hủy',
            cssClass: 'btn-secondary btn-width',
            action: function(dialogItself) {
                dialogItself.close();
            }
        }, {
            label: ' Xác nhận',
            cssClass: 'btn-key btn-width',
            action: function(dialogItself) {
                thePage.delete_bank_info(_id);
                dialogItself.close();
            }
        }]
    });
});

thePage.delete_bank_info = (_id) => {
    let data = new FormData();
    data.append('id', _id);
    _doAjaxNod('POST', data, 'user_paymentcard', 'delete', 'delete_bank_info', true, (res) => {
        document.getElementById("form-add-address").style.display = "none";
        thePage.listBankInfo();
    });
}

$('body').on('click', '#btn_add_paymentcard', function(e) {
    // thePage.listBank();
    $("#fullname").val('');
    $("#number").val('');
});

// thePage.listBank = () => {

//     let data = new FormData();

//     _doAjaxNod('POST', data, 'user_paymentcard', 'idx', 'list_bank', true, (res) => {
//         thePage.bankDefault.html(thePage.render_list_bank(res.data.l));
//     })
// }

// // render danh sách ngân hàng để người dùng chọn ngân hàng thêm thẻ mới
// thePage.render_list_bank = (l) => {
//     let h = '';
//     l.forEach(function(item) {
//         h += `<li onclick="thePage.selectBank(${item.id});" data-name=""><img src="${item.icon}" alt="#"></li>`;
//     })
//     return h;
// }

thePage.selectBank = (_id) => {
    thePage.bankID = _id;
}

$('body').on('click', '#btn_save_paymentcard', function(e) {

    document.getElementById("loading_bar").style.display = "block";

    var _fullname = $("#fullname");
    var _number = $("#number");
    var _bank = thePage.bankID;

    let status_error = false;
    $(".err-modify-tv").remove();

    if (_fullname.val() == '') {
        _fullname.after(`<span class="err-modify-tv color-red">Vui lòng nhập Họ và Tên.</span>`);
        status_error = true;
    }

    if (_number.val() == '') {
        _number.after(`<span class="err-modify-tv color-red">Vui lòng nhập số tài khoản.</span>`);
        status_error = true;
    }
    if (_bank == '') {
        $("#bank_id").after(`<span class="err-modify-tv color-red">Vui lòng chọn ngân hàng.</span>`);
        status_error = true;
    }

    if (status_error) {
        document.getElementById("loading_bar").style.display = "none";
        return false;
    } else {
        e.preventDefault();
        var data = new FormData();
        data.append('fullname', _fullname.val());
        data.append('number', _number.val());
        data.append('bank_id', _bank);
        _doAjaxNod('POST', data, 'user_paymentcard', 'save', 'bank_info', true, (res) => {
            BootstrapDialog.show({
                title: "Thông báo!",
                message: `Đã thêm thẻ thanh toán thành công.`,
                buttons: [{
                    label: 'Xác nhận',
                    cssClass: 'btn-key btn-width',
                    action: function(dialogItself) {
                        dialogItself.close();
                        document.getElementById("loading_bar").style.display = "none";
                        thePage.listBankInfo();
                        document.getElementById("form-add-address").style.display = "none";
                        // location.replace(url_domain + '/paymentcard');
                    }
                }]
            });
        });
    }
});