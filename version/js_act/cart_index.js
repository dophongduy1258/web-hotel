var thePage = {};

thePage.lProduct = $("#lProduct");

thePage.fullname = $("#fullname");
thePage.email = $("#email");
thePage.phone = $("#phone");
thePage.province = $("#province");
thePage.district = $("#district");
thePage.ward = $("#ward");
thePage.street = $("#street");
thePage.address_id = $("#address_id");
thePage.note = $("#note");
thePage.paymentCod = $("#payment_cod");

$(function() {

    // thePage.getItemCustomer();
    thePage.filterItemCart();

    // $("#addressBook").click(function() {
    //     $(".addressNew").addClass('hide');
    //     $(".addressBook").removeClass('hide');
    // })
    // $("#addressNew").click(function() {
    //     $(".addressNew").removeClass('hide');
    //     $(".addressBook").addClass('hide');
    // })

})

thePage.filterItemCart = () => {

    var itemCart = getLocalStorage(keyLocalStorageItemCart);
    if (itemCart != null && itemCart.length > 0) {
        thePage.lProduct.html(thePage.render(itemCart));
    } else {
        window.location = url_domain + '/san-pham';
    }

}

thePage.render = (itemCart) => {
    // console.log(itemCart);
    let h = '';
    let total = 0;
    if (itemCart != null && itemCart.length > 0) {
        itemCart.forEach(function(item) {
            let price_decrement = item.price - (item.price * item.decrement / 100);
            h += `<tr>
                    <td><img src="${item.link_img}" width="80"/></td>
                    <td><a title="${item.title}">${item.title}</a></td>
                    <td><input onchange="editQuantity('${item.product_id}')" type="number" min='1' id="quantity_${item.product_id}" name="quantity" data-id="${item.product_id}" data-size="0" data-manufacture="15147" value="${item.quantity}" style="border: 1px solid #ddd;padding: 4px 0px;width: 70px;min-width: inherit;text-align: center;"></td>
                    <td>${number_format_replace_cog(price_decrement)} đ</td>
                    <td><b>${number_format_replace_cog(price_decrement*item.quantity)} đ</b>&nbsp;&nbsp;<span class="fa-stack delete" data-id="${item.product_id}" data-size="0" data-manufacture="15147">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-close fa-stack-1x fa-inverse" id="delete_item" product_id=${item.product_id}></i>
                    </span></td>
                </tr>`;
            total = parseFloat(total) + parseFloat(price_decrement * item.quantity);
        })

        h += `<tr>
                <td colspan="4"><b>Tổng tiền</b></td>
                <td><b>${number_format_replace_cog(total)} đ</b></td>
                <input type="text" id="payment_cod" class="hide" value="${total}">
            </tr>`;
    } else {
        h += `<tr>
                <td colspan="3"><b style="display: block;margin: 20px 0px 0px 0px;text-align: center;">Không có sản phẩm nào trong giỏ hàng</b></td>
            </tr>`;
    }

    return h;

}

// thePage.getItemCustomer = () => {

//     var itemCustomer = getLocalStorage(keyLocalStorageItemCustomer);
//     // console.log(itemCustomer);

//     _doAjaxNod('POST', '', 'cart_index', 'idx', 'infoCustomer', false, (res) => {
//         // console.log(res.data);
//         if (Object.keys(res.data).length > 0) {
//             thePage.fullname.val(res.data.fullname);
//             thePage.email.val(res.data.email);
//             thePage.phone.val(res.data.mobile);
//         } else {
//             if (itemCustomer != null) {
//                 thePage.fullname.val(itemCustomer.fullname);
//                 thePage.email.val(itemCustomer.email);
//                 thePage.phone.val(itemCustomer.mobile);
//             } else {
//                 thePage.fullname.val('');
//                 thePage.email.val('');
//                 thePage.phone.val('');
//                 thePage.province.val('');
//                 thePage.district.val('');
//                 thePage.ward.val('');
//                 thePage.street.val('');
//                 thePage.note.val('');
//                 thePage.paymentCod.val('');
//             }
//         }
//     });

// }

$('body').on('click', 'i#delete_item', function(e) {
    let _id = $(this).attr('product_id');
    BootstrapDialog.show({
        title: "Xác nhận",
        message: `Bạn muốn xóa sản phẩm này khỏi giỏ hàng?`,
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
                removeLocalStorage(_id);
                countItemCart();
                thePage.filterItemCart();
                dialogItself.close();
            }
        }]
    });
});

function editQuantity(_product_id) {
    let product_id = _product_id;
    let quantity = $("#quantity_" + _product_id).val();

    editItemCart(product_id, quantity);
    countItemCart();
    thePage.filterItemCart();
}

$('body').on('click', '#submitOrder', function(e) {
    // let province = thePage.province.find('option:selected').text();
    // let district = thePage.district.find('option:selected').text();
    // let ward = thePage.ward.find('option:selected').text();

    // let status_error = false;
    // $(".err-modify-tv").remove();

    // if (getLocalStorage(keyLocalStorageItemCart) == null || getLocalStorage(keyLocalStorageItemCart).length < 1) {
    //     alert_dialog('Vui lòng chọn sản phẩm.');
    //     return false;
    // } else {
    //     if ($(".addressBook").hasClass('hide')) {
    //         if (thePage.fullname.val() == '') {
    //             thePage.fullname.after(`<span class="err-modify-tv color-red">Vui lòng nhập Họ và Tên.</span>`);
    //             status_error = true;
    //         }
    //         if (thePage.email.val() != '' && emailIsValid(thePage.email.val()) == false) {
    //             thePage.email.after(`<span class="err-modify-tv color-red">Email không đúng định dạng.</span>`);
    //             status_error = true;
    //         }
    //         if (thePage.phone.val() == '') {
    //             thePage.phone.after(`<span class="err-modify-tv color-red">Vui lòng nhập số điện thoại.</span>`);
    //             status_error = true;
    //         }
    //         if (mobileIsValid(thePage.phone.val()) == false) {
    //             thePage.phone.after(`<span class="err-modify-tv color-red">Số điện thoại không đúng định dạng.</span>`);
    //             status_error = true;
    //         }
    //         if (thePage.province.val() == '' || thePage.district.val() == '' || thePage.ward.val() == '' || thePage.street.val() == '') {
    //             thePage.street.after(`<span class="err-modify-tv color-red">Vui lòng nhập đầy đủ địa chỉ nhận hàng.</span>`);
    //             status_error = true;
    //         }
    //         if (status_error) return false;
    //     }
    // }

    // let address = thePage.street.val() + ', ' + ward + ', ' + district + ', ' + province;
    // var itemCustomer = created_customer(thePage.fullname.val(), thePage.email.val(), thePage.phone.val(), thePage.province.val(), thePage.district.val(), thePage.ward.val(),
    //     thePage.street.val(), thePage.address_id.val(), address, thePage.note.val());
    // saveLocalStorage(keyLocalStorageItemCustomer, itemCustomer);
    window.location = url_domain + '/thanh-toan';

});

function emailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

function mobileIsValid(mobile) {
    return /((09|03|07|08|05)+([0-9]{8})\b)/g.test(mobile)
}

// function loadDistrict() { // onchange district theo city tạo showroom mới
//     var _city_id = $("#province").val();

//     let data = new FormData();
//     data.append('city_id', _city_id);
//     _doAjaxNod('POST', data, 'cart_index', 'idx', 'opt_district', false, (res) => {
//         $("#district").html(res.data);
//         loadWard();
//     });
// }

// function loadWard() { // onchange district theo city tạo showroom mới

//     var _district_id = $("#district").val();

//     let data = new FormData();
//     data.append('district_id', _district_id);
//     _doAjaxNod('POST', data, 'cart_index', 'idx', 'opt_ward', false, (res) => {
//         $("#ward").html(res.data);
//     });
// }