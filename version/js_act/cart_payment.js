var thePage = {};

thePage.contentAddress = $("#content_address");
thePage.formContentAddress = $("#form_content_address");
thePage.lProduct = $("#lProduct");
thePage.totalPayment = $("#total_payment");
thePage.paymentCod = $("#payment_cod");

thePage.fullname = $("#fullname");
thePage.email = $("#email");
thePage.phone = $("#phone");
thePage.province = $("#province");
thePage.district = $("#district");
thePage.ward = $("#ward");
thePage.street = $("#street");
thePage.address_id = $("#address_id");
thePage.note = $("#note");
thePage.fee_ship = 0;

thePage.infoName = '';
thePage.infoPhone = '';
thePage.infoEmail = '';

$(function() {

    thePage.getInfo();
    // thePage.filterItemCart();
})

// thePage.filterItemCart = () => {

//     var itemCart = getLocalStorage(keyLocalStorageItemCart);
//     thePage.lProduct.html(thePage.render(itemCart));

// }

thePage.getInfo = () => {

    //get thông tin đơn hàng
    var itemCart = getLocalStorage(keyLocalStorageItemCart);

    if (itemCart != null && itemCart.length > 0) {
        thePage.lProduct.html(thePage.renderProduct(itemCart));

        thePage.feeShip();
        // alert(thePage.fee_ship);
        thePage.lProduct.after(thePage.renderTotal(thePage.sumTotal()));

        _doAjaxNod('POST', '', 'cart_payment', 'info', 'infoShip', true, (res) => {
            // console.log(res.data.l);
            if (!res.data.l) {
                thePage.contentAddress.addClass('hide');
                thePage.formContentAddress.removeClass('hide');
            } else {
                thePage.contentAddress.html(thePage.renderAddress(res.data.l));
                if (thePage.contentAddress.hasClass('hide')) {
                    thePage.infoName = res.data.default.fullname;
                    thePage.infoPhone = res.data.default.mobile;
                    thePage.infoEmail = res.data.default.email;
                }
            }
        });
    } else {
        window.location = url_domain + '/san-pham';
    }

}

thePage.renderAddress = (l) => {
    // console.log(l);
    let h = '';
    h += `<div class="line"></div>
    <p class="title"><i class="fa fa-map-marker" aria-hidden="true"></i> Địa Chỉ Nhận Hàng</p>
    <ul class="address-profile">`;
    l.forEach(function(item) {
        h += `
                <li><label class="wrap-ace"><input class="ace" type="radio" ${item.is_default == 1 ? 'checked' : ''} name="address_id" value="${item.id}"/><span class="lbl"></span><b>${item.fullname} - ${item.mobile}</b> - ${item.address}, ${item.ward}, ${item.district}, ${item.city} ${item.is_default == 1 ? '<span class="color-key">- Mặc định</span>' : ''}</label></li>
            `;
    })
    h += `
            <li><label class="wrap-ace"><input class="ace" type="radio" id="optionShipAddress" name="address_id" value=""/><span class="lbl"></span>Địa chỉ khác</label></li>
            </ul>`;

    return h;
}



$('body').on('click', '#optionShipAddress', function(e) {
    thePage.contentAddress.addClass('hide');
    thePage.formContentAddress.removeClass('hide');
    thePage.fullname.val(thePage.infoName);
    thePage.phone.val(thePage.infoPhone);
    thePage.email.val(thePage.infoEmail);
});

$('body').on('click', '#backAddressBook', function(e) {
    thePage.contentAddress.removeClass('hide');
    thePage.formContentAddress.addClass('hide');
});

thePage.feeShip = () => {
    _doAjaxNod('POST', '', 'cart_payment', 'fee', 'ship', true, (res) => {
        // console.log(res.data.delivery_fee);
        thePage.fee_ship = res.data.delivery_fee;
        thePage.totalPayment.html(thePage.renderTotalPayment(thePage.sumTotal(), thePage.fee_ship));
    });
}

thePage.renderProduct = (itemCart) => {
    let h = '';
    itemCart.forEach(function(item) {
        let price_decrement = item.price - (item.price * item.decrement / 100);
        h += `<tr>
                <td><img src="${item.link_img}" width="80"/></td>
                <td><a>${item.title}</a></td>
                <td class="text-center">${number_format_replace_cog(item.quantity)}</td>
                <td>${number_format_replace_cog(price_decrement)} đ</td>
                <td class="text-right"><b>${number_format_replace_cog(price_decrement * item.quantity)} đ</b></td>
            </tr>`;
    })

    return h;

}

thePage.renderTotalPayment = (total, _feeShip) => {
    h = `<li><span>Tổng tiền hàng:</span> <p>${number_format_replace_cog(total)} đ</p></li>
        <li><span>Phí vận chuyển:</span> <p>${_feeShip > 0?number_format_replace_cog(_feeShip):'Liên hệ'}</p></li>
        <li><span style="position: relative;top: 8px;">Tổng thanh toán:</span> <p>${number_format_replace_cog(total+_feeShip)} đ</p></li>`;

    thePage.paymentCod.val(total);

    return h;
}

thePage.renderTotal = (total) => {
    h = `<tr class="total">
            <td colspan="4" class="text-right">Tổng tiền</td>
            <td class="text-right">${number_format_replace_cog(total)} đ</td>
        </tr>`;

    return h;
}

thePage.sumTotal = () => {

    var jsonListItemCart = getLocalStorage(keyLocalStorageItemCart);
    if (jsonListItemCart != null) {
        var result = jsonListItemCart.reduce(function(total, product) {
            return total + ((product.price - (product.price * product.decrement / 100)) * product.quantity);
        }, 0);
        return result;
    }
    return 0;
}

$('body').on('click', '#submitOrder', function(e) {

    var itemCart = getLocalStorage(keyLocalStorageItemCart);
    // var itemCustomer = getLocalStorage(keyLocalStorageItemCustomer);

    var address = '';
    var address_id = '';
    var phone = thePage.phone.val().replace(/ +/g, "");

    var radios = document.getElementsByName('address_id');
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            address_id = radios[i].value;

            // only one radio can be logically checked, don't check the rest
            break;
        }
    }

    let status_error = false;
    $(".err-modify-tv").remove();

    if ($("#content_address").hasClass('hide')) {
        province = thePage.province.find('option:selected').text();
        district = thePage.district.find('option:selected').text();
        ward = thePage.ward.find('option:selected').text();
        address = $('#street').val() + ', ' + ward + ', ' + district + ', ' + province;

        if (thePage.fullname.val() == '') {
            thePage.fullname.after(`<span class="err-modify-tv color-red">Vui lòng nhập Họ và Tên.</span>`);
            status_error = true;
        }
        if (thePage.email.val() != '' && emailIsValid(thePage.email.val()) == false) {
            thePage.email.after(`<span class="err-modify-tv color-red">Email không đúng định dạng.</span>`);
            status_error = true;
        }
        if (phone == '') {
            thePage.phone.after(`<span class="err-modify-tv color-red">Vui lòng nhập số điện thoại.</span>`);
            status_error = true;
        }
        if (mobileIsValid(phone) == false) {
            thePage.phone.after(`<span class="err-modify-tv color-red">Số điện thoại không đúng định dạng.</span>`);
            status_error = true;
        }
        if (thePage.province.val() == '' || thePage.district.val() == '' || thePage.ward.val() == '' || thePage.street.val() == '') {
            thePage.street.after(`<span class="err-modify-tv color-red">Vui lòng nhập đầy đủ địa chỉ nhận hàng.</span>`);
            status_error = true;
        }

        if (status_error) return false;

    }
    document.getElementById("loading_bar").style.display = "block";
    var data = new FormData();
    data.append('ship_name', thePage.fullname.val());
    data.append('ship_email', thePage.email.val());
    data.append('ship_mobile', phone);
    data.append('ship_province', thePage.province.val());
    data.append('ship_district', thePage.district.val());
    data.append('ship_ward', thePage.ward.val());
    data.append('ship_street', thePage.street.val());
    data.append('ship_address', address);
    data.append('address_id', address_id);
    data.append('note', thePage.note.val());
    data.append('referral_by', $('#referral_by').val());
    data.append('payment_cod', thePage.paymentCod.val());
    data.append('lItems', JSON.stringify(itemCart));

    _doAjaxNod('POST', data, 'cart_payment', 'checkout', 'checkout', true, (res) => {
        // console.log(res.data);
        if (res.data != null) {
            removeDataLocalStorage(keyLocalStorageItemCart);
            removeDataLocalStorage(keyLocalStorageItemCustomer);
            // deleteCookie('referral_by');
        }
        BootstrapDialog.show({
            title: "Thông báo!",
            message: res.message,
            buttons: [{
                label: 'Xác nhận',
                cssClass: 'btn-key btn-width',
                action: function(dialogItself) {
                    dialogItself.close();
                    location.replace(url_domain + '/trang-chu');
                    document.getElementById("loading_bar").style.display = "none";
                }
            }]
        });
    });

});

function loadDistrict() { // onchange district theo city tạo showroom mới
    var _city_id = $("#province").val();

    let data = new FormData();
    data.append('city_id', _city_id);
    _doAjaxNod('POST', data, 'cart_payment', 'idx', 'opt_district', false, (res) => {
        $("#district").html(res.data);
        loadWard();
    });
}

function loadWard() { // onchange district theo city tạo showroom mới

    var _district_id = $("#district").val();

    let data = new FormData();
    data.append('district_id', _district_id);
    _doAjaxNod('POST', data, 'cart_payment', 'idx', 'opt_ward', false, (res) => {
        $("#ward").html(res.data);
    });
}