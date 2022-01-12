var thePage = {};

$(function() {

    // if (countItemCart() > 0) {
    //     $("#quantity_cart").html(countItemCart());
    // } else {
    //     $("#quantity_cart").addClass('hide');
    // }

})

function paging_fund(_page) {
    // let url = window.location.href;
    let cat_id = $.urlParam("cat_id");
    if (cat_id != null) {
        window.location = url_domain + '/san-pham-c' + cat_id + '/' + _page;
    } else {
        window.location = url_domain + '/san-pham/' + _page;
    }

}