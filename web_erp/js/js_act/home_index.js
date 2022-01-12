// var thePage = {};
// thePage.keyword = '';
// thePage.current_page = 1;
// thePage.cat_id = '';
// thePage.type = '';
// thePage.for_point = 0;

// thePage.slide = $("#slide");
// thePage.brand = $("#brands");
// thePage.home_product = $("#home_product");

// $(function() {

//     // if (countItemCart() > 0) {
//     //     $("#quantity_cart").html(countItemCart());
//     // } else {
//     //     $("#quantity_cart").addClass('hide');
//     // }

//     thePage.filter();

//     // $(".brand").owlCarousel();

// })

// thePage.filter = () => {

//     let data = new FormData();
//     data.append('keyword', thePage.keyword);
//     data.append('page', thePage.current_page);
//     data.append('cat_id', thePage.cat_id);
//     data.append('type', thePage.type);
//     data.append('for_point', thePage.for_point);

//     _doAjaxNod('POST', data, 'home_index', 'idx', 'filter', true, (res) => {
//         // console.log(res.data);
//         res.data.theme.forEach(function(item) {
//             if (item.slide_size == 'big') {
//                 thePage.slide.html(thePage.render_slide(item.slide_list));
//                 thePage.brand.html(thePage.render_brand(item.category_1_list));
//                 $('.flexslider').flexslider({
//                     animation: "slide",
//                     slideshow: true,
//                     controlNav: false,
//                     directionNav: true,
//                     slideshowSpeed: 5000,
//                     animationSpeed: 1000,
//                     pauseOnHover: true,
//                     start: function(slider) {
//                         $('body').removeClass('loading');
//                     }
//                 });
//                 setTimeout(function() {
//                     if ($('.brand').length > 0) {
//                         $(".brand").owlCarousel({
//                             navigation: true,
//                             autoPlay: 8000,
//                             navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
//                             items: 5,
//                             itemsDesktop: [1199, 5],
//                             itemsDesktopSmall: [979, 4],
//                             itemsTabletSmall: [864, 3],
//                             itemsTablet: [768, 3],
//                             itemsMobile: [479, 3]
//                         });
//                     }
//                 }, 200);

//             } else {
//                 thePage.home_product.before(thePage.render_home_product(item));
//             }
//         })
//     })
// }

// thePage.render_slide = (l) => {
//     let h = '';
//     l.forEach(function(item) {
//         if (item.banner != '') {
//             h += `<li>
//                     <a href="#" title="#" target="#" class=""><img src="${item.banner}" alt="#" /></a>
//                 </li>`;
//         }
//     })
//     return h;
// }

// thePage.render_brand = (l) => {
//     let h = '';
//     l.forEach(function(item) {
//         h += `<div class="item">
//                 <a href="" title="#"><img src="${item.icon}" alt="#" width="20" /><span>${item.name}</span></a>
//             </div>`;
//     })
//     return h;
// }

// thePage.render_home_product = (l) => {
//     let h = '';
//     if (l.slide_list.length > 0 || l.product_1_list.length > 0) {
//         h += `<div class="banner">
//                 <div class="container">
//                     <div class="row">`;
//         l.slide_list.forEach(function(item) {
//             h += `<div class = "col-md-6 col-sm-6 col-xs-12 item">
//                 <a href = "#" title = "#"> <img src = "${item.banner}" alt = "#" /></a> 
//             </div>`;
//         });
//         // h += `
//         //         </div> 
//         //     </div> 
//         // </div>
//         // <div class="content-product">
//         //     <div class="container">
//         //         <div class="block-title">
//         //             <h2 class="title"><a style="${l.product_1_list.length > 0 ? '' : 'pointer-events:none;'}" href="/product/cat/${l.category_1 != '0' ? l.category_1 : l.product_1}/1" title="#">${l.name}</a></h2>
//         //             <ul class="sub-title">`;
//         // l.category_1_list.forEach(function(its) {
//         //     h += `<li><a href="/product/cat/${its.id}/1" title="#">${its.name}</a></li>`;
//         // });
//         // h += ` </ul>
//         // <div class="clear"></div>
//         // </div>`;
//         h += `      </div>
//                 </div>
//             </div>
//             <div class="content-product">
//                 <div class="container">
//                     <div class="block-title">
//                     <h2 class="title"><a style="${l.product_1_list.length > 0 ? '' : 'pointer-events:none;'}" href="/product/cat/${l.category_1 != '0' ? l.category_1 : l.product_1}/1" title="#">${l.name}</a></h2>
//                     <div class="clear"></div>
//                     </div>`;
//         if (l.product_1_list.length > 0) {
//             h += `
//                 <div class="content">
//                     <div class="clear"></div>
//                         <div class="block-content">
//                             <div class="row">`;


//             l.product_1_list.forEach(function(it) {
//                 h += `<div class="col-md-2 col-sm-4 col-xs-6 item">
//                     <div class="iframe">
//                         <div class="img">
//                             <a href="/product_detail/${it.product_link}/${it.product_id}/${it.sku_id}/" title="#"><img src="${it.image}" alt="#" /></a>
//                         </div>
//                         <div class="info">
//                             <h3><a href="/product_detail/${it.product_link}/${it.product_id}/${it.sku_id}/" title="#">${it.product_name}</a></h3>
//                             <p class="price">${number_format_replace_cog(it.price)}<font>đ</font>
//                             </p>
//                         </div>
//                     </div>
//                 </div>`;
//             });

//             h += `</div>
//             </div>
//             </div>
//             </div>`;
//         }

//         h += `
//             </div>
//             </div>`;
//     }
//     return h;
// }