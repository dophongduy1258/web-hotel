var thePage = {};

thePage.lOrder = $("#lOrder");
thePage.totalRecordOrder = $("#totalRecordOrder");

$(function() {

    thePage.listOrder();

})

thePage.listOrder = () => {

    let data = new FormData();

    _doAjaxNod('POST', data, 'user_order', 'idx', 'list_order', true, (res) => {
        // console.log(res.data);
        thePage.totalRecordOrder.html('Đơn hàng của tôi (' + res.data.dInfo.total_record + ')');
        res.data.lItems.forEach(function(item) {
            thePage.lOrder.after(thePage.render(item));
        });
    })
}

thePage.render = (l) => {
    let h = '';
    l.lItems.forEach(function(item) {
        let price_decrement = item.price - (item.price * item.decrement / 100);
        h += `<ul>
                <li class="img"><img src="${item.image}" /></li>
                <li class="content">
                    <a href="/san-pham-p${item.unique_id}" title="">${item.name}</a>
                    <span>Số lượng: ${number_format_replace_cog(item.quantity)}</span>
                </li>
                <li class="price">${number_format_replace_cog(item.price*item.quantity)} đ</li>
                <li class="date"><span class="mobile">Ngày mua:</span>${date_format('d/m/Y', item.date_add)}</li>
                <li class="code"><span class="mobile">Mã ĐH:</span>${item.order_id}</li>
                <li class="status"><span class="mobile">Trạng thái:</span><span class="${l.shipper_status > 3?'success':l.shipper_status==-1?'cancel': 'pending'}">${l.shipper_status_label}</span></li>
            </ul>`;
    })
    return h;
}