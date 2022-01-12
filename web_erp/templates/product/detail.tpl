<style type="text/css">
    @media(max-width:767px) {
        body {
            padding-bottom: 30px;
        }
    }
</style>
<div class="content-product-detail z2">
    <div class="container">
        <div class="detail-product">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 images-product-detail">
                    <div class="zoom-image targetarea">
                        <img alt="" class="cloudzoom" id="zoom-fancybox" src="{$data.img_1}"
                            data-cloudzoom="zoomImage: '{$data.img_1}'">
                    </div>
                    <div class="thumbs">
                        <div>
                            {if $data.img_1 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_1}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_1}' , zoomImage: '{$data.img_1}' ">
                                    <input class="hide" id="link_img" type="text" value="{$data.img_1}" />
                                </div>
                            {/if}
                            {if $data.img_2 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_2}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_2}' , zoomImage: '{$data.img_2}' ">
                                </div>
                            {/if}
                            {if $data.img_3 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_3}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_3}' , zoomImage: '{$data.img_3}' ">
                                </div>
                            {/if}
                            {if $data.img_4 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_4}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_4}' , zoomImage: '{$data.img_4}' ">
                                </div>
                            {/if}
                            {if $data.img_5 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_5}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_5}' , zoomImage: '{$data.img_5}' ">
                                </div>
                            {/if}
                            {if $data.img_6 != ''}
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="{$data.img_6}"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '{$data.img_6}' , zoomImage: '{$data.img_6}' ">
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 infomation-product-detail">
                    <div class="wrap-scroll-detail">
                        <div class="scroll-detail">
                            <div class="left">
                                <h1 class="title">{$data.name}</h1>
                                <span class="ma-sp"><b>SKU:</b>
                                    {$data.sku_code}{if isset($session.fullname_client)}<button type="button" class="btn-share" product_id="{$data.id}" id="btnCopy">Chia sẻ</button>{/if}</span>
                                <div class="clear"></div>
                                <div class="info">{$data.short_description}</div>
                            </div>
                            <div class="right">
                                <h2>Bán hàng không bỏ vốn</h2>
                                <p>Cộng tác viên/Đại lý online liên hệ để được nhận chiết khấu tốt nhất</p>
                                <div>
                                    <a href="tel:{$setup.company_phone}" title="Gọi tư vấn ngay">Gọi tư vấn ngay</a>
                                    <a href="{if isset($setup.link_fanpage) && $setup.link_fanpage!=''}{$setup.link_fanpage}{else}/lien-he{/if}" title="Fanpage hỗ trợ">Fanpage hỗ trợ</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            {if $data.decrement > 0}
                                <p class="old-price-detail">Giá gốc: <span>{$data.price|number_format:"0":".":","} vnđ</span></p>
                            {/if}
                            <p class="price-detail">{$data.price_decrement|number_format:"0":".":","} vnđ</p>
                            <p class="price-hh">HH: <span>{$data.commission_vnd|number_format:"0":".":","} <font>đ</font></span></p>
                            <p class="price-ln">Lợi nhuận: <span>{$data.commission_vnd|number_format:"0":".":","} <font>đ</font></span></p>
                            <div class="clear"></div>
                            <div class="size">
                                <label class="col-md-2 col-sm-3 col-xs-4">Số lượng:</label>
                                <div class="col-md-3 col-sm-3 col-xs-4 nopadding-l">
                                    <input class="form-control input-sm quantity-size" id="quantity" type="number" min=1
                                        value="1" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="color hide">
                                <label class="col-md-2 col-sm-3">Màu sắc</label>
                                <div class="col-md-10 col-sm-9">
                                    <ul>
                                        <li class="select_product active">
                                            <a href="" title=""><span style="background-color:#007000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product">
                                            <a href="" title=""><span style="background-color:#007000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#ff0000"></span></a>
                                        </li>
                                        <li class="select_product ">
                                            <a href="" title=""><span style="background-color:#0080ff"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <input class="hide" id="title" type="text" value="{$data.name}" />
                        <input class="hide" id="price" type="text" value="{$data.price}" />
                        <input class="hide" id="unique_id" type="text" value="{$data.unique_id}" />
                        <input class="hide" id="decrement" type="text" value="{$data.decrement}" />
                        <input class="hide" id="link" type="text"
                            value="{$rewrite_url}{$data.product_link}-p{$data.unique_id}/{if isset($session.username_client)}{$session.username_client}{/if}" />
                        <div class="action">
                            <!-- Load lại cái hình ảnh đại diện để làm sự kiện thêm vào giỏ hàng cho đẹp =)) -->
                            <div class="img_add_cart">
                                {if $data.img_1 != ''}
                                    <img alt="" src="{$data.img_1}" />
                                {/if}
                            </div>
                            <!-- End -->

                            <button type="button" class="btn btn-add-cart btn-width" product_id="{$data.id}"
                                id="add_cart"><i class="fa fa-cart-plus"></i><span>Thêm vào giỏ hàng</span></button>
                            <button type="button" class="btn btn-key btn-width" product_id="{$data.id}" id="buy_now">Mua
                                ngay</button>
                            <div class="clear"></div>
                        </div>
                        <div class="box_addcart_success">
                            <img src="{$domain}/images/addcart_success.png" alt="" class="img-responsive" />
                            <p>Đã thêm vào giỏ</p>
                        </div>
                        <div class="clear"></div>
                        <div class="img-free">
                            <span><img src="{$domain}/images/free_ship-01.png?v=1.0.01" alt=""
                                    class="img-responsive" /></span>
                            <span><img src="{$domain}/images/Giao_hang.png?v=1.0.01" alt=""
                                    class="img-responsive" /></span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detail">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Mô tả sản phẩm</a></li>
                {* <li class=""><a href="#tab2" data-toggle="tab">Thông tin chi tiết</a></li> *}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="content">
                        {$data.description}
                    </div>
                </div>
                <!--other info-->
                <div class="tab-pane" id="tab2">
                    <div class="content">
                        <div class="content">
                            <table class="table table-key">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Tên sản phẩm</strong></td>
                                        <td>Lavabo đá tự nhiên cao cấp Naston LDTN001</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mã số</strong></td>
                                        <td>LDTN001</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Thương hiệu</strong></td>
                                        <td>NASTON</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Màu sắc</strong></td>
                                        <td>Hồng</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cân nặng</strong></td>
                                        <td>8kg</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kích thước</strong></td>
                                        <td>410x410x140mm</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Chất liệu</strong></td>
                                        <td>đá tự nhiên</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Xuất sứ</strong></td>
                                        <td>Yên Bái - Việt Nam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--other info-->
            </div>
        </div>
    </div>
</div>

<div class="content-product">
    <div class="container">
        <div class="content">
            <div class="block-content">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 img-cate pull-right">
                        <div class="owl-1">
                            <a href="#"><img src="{$domain}/images/img-goiy1.jpg" alt="#" /></a>
                            <a href="#"><img src="{$domain}/images/img-goiy2.jpg" alt="#" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 img-product">
                        <div class="block-title">
                            <h2 class="title"><a href="product" title="#">Gợi ý sản phẩm</a></h2>
                            <div class="clear"></div>
                        </div>
                        <div class="row">
                            <div class="owl-4">
                                {assign var=x value=1}
                                {foreach from=$lSuggest item=product key=key}
                                    {if $x % 2 != 0}
                                        <div class="col-md-3 item">
                                            {assign var=x value=2}
                                        {else}
                                            {assign var=x value=1}
                                        {/if}
                                        <div class="iframe">
                                            <div class="img">
                                                <a href="/{$product.product_link}-p{$product.unique_id}"
                                                    title="{$product.product_name}"><img src="{$product.img_1}"
                                                        alt="{$product.product_name}" /></a>
                                            </div>
                                            <div class="info">
                                                <h3><a href="/{$product.product_link}-p{$product.unique_id}"
                                                        title="{$product.product_name}">{$product.product_name}</a>
                                                </h3>
                                                <p class="price">{$product.price|number_format:"0":".":","}<font>đ
                                                    </font>
                                                </p>
                                                <p class="price-hh">HH: {$data.commission_vnd|number_format:"0":".":","} <font>đ</font></p>
                                                <p class="price-ln">Lợi nhuận: <span>{$data.commission_vnd|number_format:"0":".":","} <font>đ</font></span></p>
                                            </div>
                                        </div>
                                        {if $x % 2 != 0}
                                        </div>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{if $lOnSales|@count > 0}
    <section class="block-news block-news-home block-news-km">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="news" title="#">Khuyến mãi</a></h2>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="owl-4">
                        {foreach from=$lOnSales item=product key=key}
                            <div class="col-md-3 item">
                                <div class="iframe">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="img">
                                                <a href="/{$product.product_link}-p{$product.unique_id}"
                                                    title="{$product.product_name}"><img src="{$product.img_1}"
                                                        alt="{$product.product_name}" width="100%" /></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info">
                                                <h3><a href="/{$product.product_link}-p{$product.unique_id}"
                                                        title="{$product.product_name}">{$product.product_name}</a>
                                                </h3>
                                                {* <p class="price">{$product.price|number_format:"0":".":","}<font>đ
                                                    </font>
                                                </p> *}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </section>
{/if}

{if $lNews|@count > 0}
    <section class="block-news block-news-home">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="/tin-tuc" title="#">Câu chuyện thương hiệu</a></h2>
                {if $lCat|@count > 0}
                    <ul class="sub-title">
                        {foreach from=$lCat item=item key=key}
                            <li><a href="/{$item.link_url}-cn{$item.id}" title="{$item.name}">{$item.name}</a></li>
                        {/foreach}
                    </ul>
                {/if}
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    {foreach from=$lNews item=item key=key}
                        {if $item@iteration == 1}
                            <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-left">
                                <div class="item">
                                    <a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}" class="img">
                                        <img src="{$item.avatar}" alt="{$item.title}">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}">{$item.title}</a>
                                        </h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i>{$item.created_at|date_format:"H:i d/m/Y"}</span>
                                        </div>
                                        <div class="info">{$item.short_description}</div>
                                    </div>
                                </div>
                            </div>
                        {/if}
                    {/foreach}
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-center">
                        <div class="row">
                            {foreach from=$lNews item=item key=key}
                                {if $item@iteration > 1 && $item@iteration <= 5}
                                    <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                        <div class="item">
                                            <a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}" class="img">
                                                <img src="{$item.avatar}" alt="{$item.title}">
                                            </a>
                                            <div class="wrap-info">
                                                <h3><a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}">{$item.title}</a>
                                                </h3>
                                                <div class="time">
                                                    <span><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i>{$item.created_at|date_format:"H:i d/m/Y"}</span>
                                                </div>
                                                <div class="info">{$item.short_description}</div>
                                            </div>
                                        </div>
                                    </div>
                                {/if}
                            {/foreach}
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-right">
                        {foreach from=$lNews item=item key=key}
                            {if $item@iteration > 5 && $item@iteration <= 10}
                                <div class="item">
                                    <a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}" class="img">
                                        <img src="{$item.avatar}" alt="{$item.title}">
                                    </a>
                                    <h3><a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}">{$item.title}</a></h3>
                                </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </section>
{/if}
<section class="block-news block-news-dmtc">
    <div class="container">
        <div class="wrap-item">
            <div class="item">
                <div class="img"><img src="{$domain}/images/dmtc1.png" /></div>
                <h3>Không cọc tiền, không bỏ vốn</h3>
                <div class="info">Cộng tác viên online chỉ cần đăng bán Vicosap thu cod khách hàng</div>
            </div>
            <div class="item">
                <div class="img"><img src="{$domain}/images/dmtc2.png" /></div>
                <h3>Không cần đóng gói giao hàng</h3>
                <div class="info">Vicosap chịu trách nhiệm đóng gói và giao hàng</div>
            </div>
            <div class="item">
                <div class="img"><img src="{$domain}/images/dmtc3.png" /></div>
                <h3>Chiết khấu tốt nhất</h3>
                <div class="info">Cộng tác viên và đại lý online được hưởng chiết khấu tốt nhất</div>
            </div>
            <div class="item">
                <div class="img"><img src="{$domain}/images/dmtc4.png" /></div>
                <h3>Bài viết mẫu cập nhật liên tục</h3>
                <div class="info">Bài viết mẫu được cập nhật thường xuyên, CTV dể dàng đăng bán</div>
            </div>
            <div class="item">
                <div class="img"><img src="{$domain}/images/dmtc5.png" /></div>
                <h3>Đội ngũ hỗ trợ 24/7</h3>
                <div class="info">Cộng tác viên và đại lý online được hưởng chiết khấu tốt nhất</div>
            </div>
        </div>
    </div>
</section>
<section class="download-app download-app-home">
    <div class="container">
        <h2>Tải ứng dụng Vicosap để bắt đầu kinh doanh online ngay!</h2>
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="text-center"><img src="{$link_qrweb}" alt="{$meta_title}" class="" width="240"></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 down_app">
                <a href="{$link_ios}" target="_blank"><img src="{$domain}/images/app_apple.jpg" alt=""
                        class="img-responsive"></a>
                <a href="{$link_android}" target="_blank"><img src="{$domain}/images/app_google.jpg" alt=""
                        class="img-responsive"></a>
            </div>
        </div>
    </div>
</section>