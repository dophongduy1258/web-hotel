<div class="banner">
    <div class="container">
        <div class="row">
            {if isset($data.category.img_list) }
                {foreach from=$data.category.img_list item=item key=key}
                    {if $data.category.img_list|@count > 1}
                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <a href="#" title="#"><img src="{$item.banner}" alt="#" /></a>
                        </div>
                    {else}
                        <div class="col-md-12 col-sm-12 col-xs-12 item">
                            <a href="#" title="#"><img src="{$item.banner}" alt="#" /></a>
                        </div>
                    {/if}
                {/foreach}
            {/if}
            {* <div class="col-md-6 col-sm-6 col-xs-12 item">
                <a href="#" title="#"><img src="{$domain}images/banner3.jpg" alt="#" /></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 item">
                <a href="#" title="#"><img src="{$domain}images/banner4.jpg" alt="#" /></a>
            </div> *}
        </div>
    </div>
</div>
<div class="wrap-anvanced-search hide">
    <div class="container">
        <div class="item-cate-product">
            <ul>
                <li class="icon-anvanced-search">
                    <span><i class="fa fa-filter" aria-hidden="true"></i> Bộ lọc</span>
                    <div class="advanced-search">
                        <h3 class="title"><i class="fa fa-filter" aria-hidden="true"></i> Tìm kiếm nâng cao</h3>
                        <div class="advanced-item advanced-brand">
                            <div class="title-info">Thương hiệu</div>
                            <ul class="advanced-click">
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
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
                {foreach from=$cat item=item key=key}
                    {if $item.level == '1'}
                        <li>
                            <a href="/product/cat/{$item.id}/1" title="#">
                                <div class="icon">
                                    <img src="{$item.icon}" width="24" class="" />
                                    <img src="{$item.icon}" width="24" class="h" />
                                </div>
                                <span>{$item.name}</span>
                            </a>
                        </li>
                    {/if}
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
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></li>
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
                            <img src="{$domain}images/icon1.png" class="" />
                            <img src="{$domain}images/icon1-h.png" class="h" />
                        </div>
                        <span>Thời trang nam</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon2.png" class="" />
                            <img src="{$domain}images/icon2-h.png" class="h" />
                        </div>
                        <span>Giày thời trang nữ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon3.png" class="" />
                            <img src="{$domain}images/icon3-h.png" class="h" />
                        </div>
                        <span>Phụ kiện du lịch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon4.png" class="" />
                            <img src="{$domain}images/icon4-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng cho em bé</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon5.png" class="" />
                            <img src="{$domain}images/icon5-h.png" class="h" />
                        </div>
                        <span>Phụ kiện phòng ngủ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon6.png" class="" />
                            <img src="{$domain}images/icon6-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon7.png" class="" />
                            <img src="{$domain}images/icon7-h.png" class="h" />
                        </div>
                        <span>Thực phẩm thú cưng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon8.png" class="" />
                            <img src="{$domain}images/icon8-h.png" class="h" />
                        </div>
                        <span>Trái cây siêu sạch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon9.png" class="" />
                            <img src="{$domain}images/icon9-h.png" class="h" />
                        </div>
                        <span>Mỹ phẩm chính sản</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="{$domain}images/icon10.png" class="" />
                            <img src="{$domain}images/icon10-h.png" class="h" />
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
                    <img src="{$domain}images/icon-search.png" alt="#" />
                    <input type="text" class="form-control" />
                    <buton class="btn btn-search">Tìm<span> kiếm</span></buton>
                </form>
            </div>
            <a class="icon-cart" href="/cart"><img src="{$domain}images/cart.png" alt="#" /><span
                    id="quantity_cart"></span></a>
        </div>
    </div>
</div>

<div class="content-product">
    <div class="container">
        <div class="block-title">
            <h2 class="title"><a href="" style="pointer-events: none;" title="#">Danh sách sản phẩm</a></h2>
                    <div class="clear"></div>
            {* <h2 class="title"><a style="" href=""
                    title="#">{if isset($data.category.name)}{$data.category.name}{else}Danh sách sản phẩm{/if}</a></h2>
            {if isset($data.category.l)}
                <ul class="sub-title">
                    {foreach from=$data.category.l item=item key=key}
                        <li><a href="/product/cat/{$item.id}/1" title="#">{$item.name}</a></li>
                    {/foreach}
                </ul>
            {/if} *}
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="block-content">
                <div class="row">
                    {foreach from=$data.l item=item key=key}
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="/{$item.product_link}-p{$item.unique_id}" title="#"><img src="{$item.img_1}"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="/{$item.product_link}-p{$item.unique_id}" title="#">{$item.product_name}</a></h3>
                                    <p class="price">{$item.price|number_format:"0":".":","}<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
                {* <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product11.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product12.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product13.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product14.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product15.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product16.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product17.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product18.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product19.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product20.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product6.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product7.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product7.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product8.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product10.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product1.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product2.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product3.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product4.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product5.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product1.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product2.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product3.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product4.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product5.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product11.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product12.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product13.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product14.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product15.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product21.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product22.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product23.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product24.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product25.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product26.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product27.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product28.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5 Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product29.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product30.jpeg" alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font></p>
                                </div>
                            </div>
                        </div>
                    </div> *}
                <nav class="text-center">
                    <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
                        <div id="page_html" class="col-lg-12 col-md-12 top10">
                            {$data.page_html}
                        </div>
                    </div>
                    {* <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-double-left"
                                        aria-hidden="true"></i></span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-double-right"
                                        aria-hidden="true"></i></span>
                            </a>
                        </li>
                    </ul> *}
                </nav>
            </div>
        </div>
    </div>
</div>