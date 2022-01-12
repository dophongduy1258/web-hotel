{if isset($data.category.img_list) }
    <div class="banner header-slider">
        <div class="container">
            <div class="flexslider">
                <ul class="slides">
                    {foreach from=$data.category.img_list item=item key=key}
                        <li>
                            <a href="/{$item.cat_link}" style="{if $item.cat_link==''}pointer-events:none;{/if}" title="{$item.name}"><img src="{$item.banner}" alt="{$item.name}" /></a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
{/if}
<div class="wrap-anvanced-search z2 {if $data.category.l|@count < 1}hide{/if}">
    <div class="container">
        <div class="item-cate-product">
            <ul>
                {* <li class="icon-anvanced-search">
                    <span><i class="fa fa-filter" aria-hidden="true"></i> Bộ lọc</span>
                    <div class="advanced-search">
                        <h3 class="title"><i class="fa fa-filter" aria-hidden="true"></i> Tìm kiếm nâng cao</h3>
                        <div class="advanced-item advanced-brand">
                            <div class="title-info">Thương hiệu</div>
                            <ul class="advanced-click">
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                            </ul>
                        </div>
                        <div class="advanced-item advanced-tag">
                            <div class="title-info">Tag</div>
                            <ul class="advanced-click">
                                <li>#Áo thun</li>
                                <li>#Áo sơ mi</li>
                                <li>#Áo khoác & Áo vest</li>
                                <li>#Đầm</li>
                                <li>#Chân váy</li>
                                <li>#Điện thoại</li>
                                <li>#Máy tính bảng</li>
                                <li>#Đồ dùng cho bé</li>
                                <li>#Tã & Bỉm</li>
                                <li>#Thiết bị âm thanh</li>
                                <li>#Tai nghe</li>
                                <li>#Giày cao gót</li>
                            </ul>
                        </div>
                        <div class="advanced-item">
                            <div class="title-info">Màu sắc</div>
                            <ul class="advanced-click">
                                <li>Đỏ</li>
                                <li>Vàng</li>
                                <li>Cam</li>
                                <li>Lục</li>
                                <li>Lam</li>
                                <li>Tràm</li>
                                <li>Tím</li>
                                <li>Đa màu</li>
                            </ul>
                        </div>
                        <div class="advanced-item">
                            <div class="title-info">Chất liệu</div>
                            <ul class="advanced-click">
                                <li>Da bò</li>
                                <li>Vãi thô</li>
                                <li>Vãi đan leng</li>
                            </ul>
                        </div>
                        <div class="advanced-item advanced-price">
                            <div class="title-info">Giá</div>
                            <ul class="advanced-click">
                                <li>Dưới 2 triệu</li>
                                <li>Từ 2 - 5 triệu</li>
                                <li>Từ 5 - 10 triệu</li>
                                <li>Từ 10 - 20 triệu</li>
                                <li>Từ 20 - 50 triệu</li>
                                <li>Từ 50 - 100 triệu</li>
                                <li>Từ 100 - 200 triệu</li>
                                <li>Trên 200 triệu</li>
                            </ul>
                            <div class="advanced-price-orther">
                                <div class="title"><i class="fa fa-sliders" aria-hidden="true"></i> Hoặc chọn mức giá
                                    phù hợp với bạn<i class="fa fa-caret-down" aria-hidden="true"></i><i
                                        class="fa fa-caret-up" aria-hidden="true"></i></div>
                                <div id="range_price"></div>
                                <style type="text/css">
                                    .slider--horizontal .slider__tip::after {
                                        content: " Triệu";
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="advanced-action text-center">
                            <a class="cancel btn btn-cancel btn-width" title="">Bỏ chọn</a>
                            <a class="view btn btn btn-key btn-width" title="">Xem 3 kết quả</a>
                        </div>
                    </div>
                </li> *}
                {foreach from=$data.category.l item=item key=key}
                        <li>
                            <a href="/{$item.cat_link}-c{$item.id}" style="{if $item.cat_link==''}pointer-events:none;{/if}" title="{$item.name}">
                                <div class="icon">
                                    <img src="{$item.icon}" width="24" class="" alt="{$item.name}"/>
                                    <img src="{$item.icon}" width="24" class="h" alt="{$item.name}"/>
                                </div>
                                <span>{$item.name}</span>
                            </a>
                        </li>
                {/foreach}
            </ul>
            {* <ul>
                <li class="icon-anvanced-search">
                    <span><i class="fa fa-filter" aria-hidden="true"></i> Bộ lọc</span>
                    <div class="advanced-search">
                        <h3 class="title"><i class="fa fa-filter" aria-hidden="true"></i> Tìm kiếm nâng cao</h3>
                        <div class="advanced-item advanced-brand">
                            <div class="title-info">Thương hiệu</div>
                            <ul class="advanced-click">
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}/images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}/images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}/images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}/images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}/images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}/images/brand2.png" alt="#" /><span>Thời trang</span></li>
                            </ul>
                        </div>
                        <div class="advanced-item advanced-tag">
                            <div class="title-info">Tag</div>
                            <ul class="advanced-click">
                                <li>#Áo thun</li>
                                <li>#Áo sơ mi</li>
                                <li>#Áo khoác & Áo vest</li>
                                <li>#Đầm</li>
                                <li>#Chân váy</li>
                                <li>#Điện thoại</li>
                                <li>#Máy tính bảng</li>
                                <li>#Đồ dùng cho bé</li>
                                <li>#Tã & Bỉm</li>
                                <li>#Thiết bị âm thanh</li>
                                <li>#Tai nghe</li>
                                <li>#Giày cao gót</li>
                            </ul>
                        </div>
                        <div class="advanced-item">
                            <div class="title-info">Màu sắc</div>
                            <ul class="advanced-click">
                                <li>Đỏ</li>
                                <li>Vàng</li>
                                <li>Cam</li>
                                <li>Lục</li>
                                <li>Lam</li>
                                <li>Tràm</li>
                                <li>Tím</li>
                                <li>Đa màu</li>
                            </ul>
                        </div>
                        <div class="advanced-item">
                            <div class="title-info">Chất liệu</div>
                            <ul class="advanced-click">
                                <li>Da bò</li>
                                <li>Vãi thô</li>
                                <li>Vãi đan leng</li>
                            </ul>
                        </div>
                        <div class="advanced-item advanced-price">
                            <div class="title-info">Giá</div>
                            <ul class="advanced-click">
                                <li>Dưới 2 triệu</li>
                                <li>Từ 2 - 5 triệu</li>
                                <li>Từ 5 - 10 triệu</li>
                                <li>Từ 10 - 20 triệu</li>
                                <li>Từ 20 - 50 triệu</li>
                                <li>Từ 50 - 100 triệu</li>
                                <li>Từ 100 - 200 triệu</li>
                                <li>Trên 200 triệu</li>
                            </ul>
                            <div class="advanced-price-orther">
                                <div class="title"><i class="fa fa-sliders" aria-hidden="true"></i> Hoặc chọn mức giá
                                    phù hợp với bạn<i class="fa fa-caret-down" aria-hidden="true"></i><i
                                        class="fa fa-caret-up" aria-hidden="true"></i></div>
                                <div id="range_price"></div>
                                <style type="text/css">
                                    .slider--horizontal .slider__tip::after {
                                        content: " Triệu";
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="advanced-action text-center">
                            <a class="cancel btn btn-cancel btn-width" title="">Bỏ chọn</a>
                            <a class="view btn btn btn-key btn-width" title="">Xem 3 kết quả</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon1.png" class="" />
                            <img src="{$domain}/images/icon1-h.png" class="h" />
                        </div>
                        <span>Thời trang nam</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon2.png" class="" />
                            <img src="{$domain}/images/icon2-h.png" class="h" />
                        </div>
                        <span>Giày thời trang nữ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon3.png" class="" />
                            <img src="{$domain}/images/icon3-h.png" class="h" />
                        </div>
                        <span>Phụ kiện du lịch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon4.png" class="" />
                            <img src="{$domain}/images/icon4-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng cho em bé</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon5.png" class="" />
                            <img src="{$domain}/images/icon5-h.png" class="h" />
                        </div>
                        <span>Phụ kiện phòng ngủ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon6.png" class="" />
                            <img src="{$domain}/images/icon6-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon7.png" class="" />
                            <img src="{$domain}/images/icon7-h.png" class="h" />
                        </div>
                        <span>Thực phẩm thú cưng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon8.png" class="" />
                            <img src="{$domain}/images/icon8-h.png" class="h" />
                        </div>
                        <span>Trái cây siêu sạch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon9.png" class="" />
                            <img src="{$domain}/images/icon9-h.png" class="h" />
                        </div>
                        <span>Mỹ phẩm chính sản</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon10.png" class="" />
                            <img src="{$domain}/images/icon10-h.png" class="h" />
                        </div>
                        <span>Sản phẩm công nghệ</span>
                    </a>
                </li>
            </ul> *}
        </div>
    </div>
</div>
<div class="overlay-search-ad"></div>
<div class="form-search form-search-cate hide">
    <div class="container">
        <div class="relative">
            <div class="search">
                <form action="#" method="">
                    <img src="{$domain}/images/icon-search.png" alt="#" />
                    <input type="text" class="form-control" />
                    <buton class="btn btn-search">Tìm<span> kiếm</span></buton>
                </form>
            </div>
            <a class="icon-cart" href="/cart"><i class="fa fa-cart-plus" aria-hidden="true"></i><span
                    id="quantity_cart"></span></a>
        </div>
    </div>
</div>

<div class="content-product z2">
    <div class="container">
        <div class="block-title">
            <h2 class="title"><a href="" style="pointer-events: none;" title="#">Có <span style="color: black;">{$data.total_record}</span> kết quả tìm kiếm với từ khóa <span style="color: black;">"{if $keyword!=''}{$keyword}{else}{$data.category.name}{/if}"</span></a></h2>
            {* <h2 class="title"><a style="" href=""
                    title="#">{if isset($data.category.name)}{$data.category.name}{else}Danh sách sản phẩm{/if}</a></h2>
            {if isset($data.category.l)}
                <ul class="sub-title">
                    {foreach from=$data.category.l item=item key=key}
                        <li><a href="/product/cat/{$item.id}/1" title="#">{$item.name}</a></li>
                    {/foreach}
                </ul>
            {/if} *}
            <div class="view_type_product hide"><span type-view="th_product" class="view_th_product active"><i class="fa fa-th"></i></span><span type-view="list_product" class="view_list_product"><i class="fa fa-list-ul"></i></span></div>
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="block-content">
                <div class="row">
                    {foreach from=$data.l item=item key=key}
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="/{$item.product_link}-p{$item.unique_id}" title="{$item.product_name}"><img
                                            src="{$item.img_1}" alt="{$item.product_name}" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="/{$item.product_link}-p{$item.unique_id}" title="{$item.product_name}">{$item.product_name}</a></h3>
                                    <p class="price">{$item.price|number_format:"0":".":","}<font>đ</font>
                                    <p class="price-hh">HH: {$item.commission_vnd|number_format:"0":".":","} <font>đ</font></p>
                                    <p class="price-ln">Lợi nhuận: <span>{$item.commission_vnd|number_format:"0":".":","} <font>đ</font></span></p>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <nav class="text-center">
            <div id="hd_page_html">
                <div id="page_html">
                    {$data.page_html}
                </div>
            </div>
        </nav>
    </div>
</div>