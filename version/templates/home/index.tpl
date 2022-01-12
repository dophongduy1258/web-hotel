<div class="form-search">
    <div class="container hide">
        <div class="relative">
            <div class="search">
                <form action="#" method="">
                    <img src="{$domain}images/icon-search.png" alt="#" />
                    <input type="text" class="form-control" />
                    <buton class="btn btn-search">Tìm<span> kiếm</span></buton>
                </form>
            </div>
            <a class="icon-cart" href="/cart"><img src="{$domain}images/cart.png" alt="#" /><span
                    id='quantity_cart'></span></a>
        </div>
    </div>
</div>
<div class="header-slider">
    <div class="container">
        <div class="row">
            {* <div class="col-md-3 col-sm-3 col-xs-12 left hide">
                <div class="iframe category-product">
                    <div class="title">
                        <span><i></i><i></i><i></i></span>
                        <p>Danh mục</p>
                    </div>
                    <ul> *}
            {* {foreach from=$cat item=item key=key}
                {if $item.level == '1'}
                    <li>
                        <a href="/product/cat/{$item.id}" title="#">
                            <div class="icon">
                                <img src="{$item.icon}" width="24" class="" />
                                <img src="{$item.icon}" width="24" class="h" />
                            </div>
                            <span>{$item.name}</span>
                        </a>
                    </li>
                {/if}
            {/foreach} *}
            {* </ul> *}
            {* <ul>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon1.png" class="" />
                                    <img src="{$domain}images/icon1-h.png" class="h" />
                                </div>
                                <span>Thời trang nam</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon2.png" class="" />
                                    <img src="{$domain}images/icon2-h.png" class="h" />
                                </div>
                                <span>Giày thời trang nữ</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon3.png" class="" />
                                    <img src="{$domain}images/icon3-h.png" class="h" />
                                </div>
                                <span>Phụ kiện du lịch</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon4.png" class="" />
                                    <img src="{$domain}images/icon4-h.png" class="h" />
                                </div>
                                <span>Đồ gia dụng cho em bé</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon5.png" class="" />
                                    <img src="{$domain}images/icon5-h.png" class="h" />
                                </div>
                                <span>Phụ kiện phòng ngủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon6.png" class="" />
                                    <img src="{$domain}images/icon6-h.png" class="h" />
                                </div>
                                <span>Đồ gia dụng</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon7.png" class="" />
                                    <img src="{$domain}images/icon7-h.png" class="h" />
                                </div>
                                <span>Thực phẩm thú cưng</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon8.png" class="" />
                                    <img src="{$domain}images/icon8-h.png" class="h" />
                                </div>
                                <span>Trái cây siêu sạch</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon9.png" class="" />
                                    <img src="{$domain}images/icon9-h.png" class="h" />
                                </div>
                                <span>Mỹ phẩm chính sản</span>
                            </a>
                        </li>
                        <li>
                            <a href="?m=product&act=index" title="#">
                                <div class="icon">
                                    <img src="{$domain}images/icon10.png" class="" />
                                    <img src="{$domain}images/icon10-h.png" class="h" />
                                </div>
                                <span>Sản phẩm công nghệ</span>
                            </a>
                        </li>
                    </ul> *}
            {* </div>
            </div> *}
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="iframe">
                    <div class="flexslider">
                        <ul class="slides" id="slide">
                            {foreach from=$data.theme item=item key=key}
                                {if $item.slide_size == 'big'}
                                    {foreach from=$item.slide_list item=it key=key}
                                        {if $it.banner != ''}
                                            <li>
                                                <a href="#" title="#" target="#" class=""><img src="{$it.banner}" alt="#" /></a>
                                            </li>
                                        {/if}
                                    {/foreach}
                                {/if}
                            {/foreach}
                            {* <li>
                                <a href="#" title="#" target="#" class=""><img src="{$domain}images/slide1.jpg" alt="#" /></a>
                            </li>
                            <li>
                                <a href="#" title="#" target="#" class=""><img src="{$domain}images/slide2.jpg" alt="#" /></a>
                            </li> *}
                        </ul>
                    </div>
                    <div class="brand hide" id="brands">
                        {* <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand1.png" alt="#" /><span>Mỹ phẩm</span></a>
                        </div>
                        <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand2.png" alt="#" /><span>Thời trang</span></a>
                        </div>
                        <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand3.png" alt="#" /><span>Thể thao</span></a>
                        </div>
                        <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand4.png" alt="#" /><span>Du lịch</span></a>
                        </div>
                        <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand5.png" alt="#" /><span>Công nghệ</span></a>
                        </div>
                        <div class="item">
                            <a href="?m=product&act=index" title="#"><img src="{$domain}images/brand6.png" alt="#" /><span>Ăn nhậu</span></a>
                        </div> *}
                    </div>
                </div>
            </div>
            {* <div class="col-md-4 col-sm-4 col-xs-12 right">
                <div class="iframe">
                    <div class="item1">
                        <div class="icon"><img src="{$domain}images/icon_app.jpeg" alt="#" /></div>
                        <h3>Chào mừng bạn đến với Kho hàng Azone</h3>
                        <div class="clear"></div>
                        <a href="?m=user&act=register" title="#">Đăng ký</a>
                        <a href="?m=user&act=login" title="#">Đăng nhập</a>
                    </div>
                    <div class="item2 destop">
                        <a href="#" title="#"><img src="{$domain}images/banner1.jpg" alt="#" /></a>
                        <a href="#" title="#"><img src="{$domain}images/banner2.jpg" alt="#" /></a>
                    </div>
                </div>
            </div> *}
        </div>
    </div>
</div>
<div id="home_product">
    {foreach from=$data.theme item=item key=key}
        {if $item.slide_size != 'big'}
            {if $item.slide_list|@count > 0 || $item.product_1_list|@count > 0 }
                <div class="banner">
                    <div class="container">
                        <div class="row">
                            {foreach from=$item.slide_list item=banner key=key}
                                <div class="col-md-6 col-sm-6 col-xs-12 item">
                                    <a href="#" title="#"> <img src="{$banner.banner}" alt="#" /></a>
                                </div>
                            {/foreach}
                            {* <div class="col-md-6 col-sm-6 col-xs-12 item">
                        <a href="#" title="#"><img src="{$domain}images/banner3.jpg" alt="#" /></a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 item">
                        <a href="#" title="#"><img src="{$domain}images/banner4.jpg" alt="#" /></a>
                    </div> *}
                        </div>
                    </div>
                </div>
            {/if}
            <div class="content-product">
                <div class="container">
                    <div class="block-title">
                        <h2 class="title"><a style="{if $item.product_1_list|@count == 0}pointer-events:none;{/if}"
                                href="/{$item.link_cat}-c{if $item.category_1 != '0'}{$item.category_1}{else}{$item.product_1}{/if}"
                                title="#">{$item.name}</a></h2>
                        <div class="clear"></div>
                    </div>
                    {if $item.product_1_list|@count > 0}
                        <div class="content">
                            <div class="block-content">
                                <div class="row">
                                    {foreach from=$item.product_1_list item=product key=key}
                                        {if $db_pos == 'chodaumoi'}
                                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                        {else}
                                            <div class="col-md-2 col-sm-4 col-xs-6 item">
                                        {/if}
                                            <div class="iframe">
                                                <div class="img">
                                                    <a href="/{$product.product_link}-p{$product.unique_id}" title="#"><img src="{$product.image}"
                                                            alt="#" /></a>
                                                </div>
                                                <div class="info">
                                                    <h3><a href="/{$product.product_link}-p{$product.unique_id}" title="#">{$product.product_name}</a></h3>
                                                    <p class="price">{$product.price|number_format:"0":".":","}<font>đ</font>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    {/if}
                </div>
            </div>
        {/if}
    {/foreach}
</div>
{* <div id="home_product">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner3.jpg" alt="#" /></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner4.jpg" alt="#" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-product">
        <div class="container">
            <div class="block-title">
                <h2 class="title"><a href="?m=product&act=index" title="#">Sản phẩm nổi bật</a></h2>
                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product11.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product12.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product13.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product14.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product15.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product16.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product17.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc
                                            Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product18.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product19.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product20.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product6.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product7.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product7.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product8.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product10.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product1.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product2.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc
                                            Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product3.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product4.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product5.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner3.jpg" alt="#" /></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner4.jpg" alt="#" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-product">
        <div class="container">
            <div class="block-title">
                <h2 class="title"><a href="?m=product&act=index" title="#">Thời trang</a></h2>
                <ul class="sub-title">
                    <li><a href="?m=product&act=index" title="#">Thời trang nam</a></li>
                    <li><a href="?m=product&act=index" title="#">Thời trang nữ</a></li>
                    <li><a href="?m=product&act=index" title="#">Phụ kiện</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product1.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product2.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc
                                            Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product3.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product4.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product5.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product11.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product12.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product13.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product14.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product15.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner3.jpg" alt="#" /></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 item">
                    <a href="#" title="#"><img src="{$domain}images/banner4.jpg" alt="#" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-product">
        <div class="container">
            <div class="block-title">
                <h2 class="title"><a href="?m=product&act=index" title="#">Vật liệu xây dựng</a></h2>
                <ul class="sub-title">
                    <li><a href="?m=product&act=index" title="#">Gạch Ấn Độ</a></li>
                    <li><a href="?m=product&act=index" title="#">Bồn cầu</a></li>
                    <li><a href="?m=product&act=index" title="#">Sơn</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="content">
                <div class="clear"></div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product21.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product22.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Trang Điểm Trắng Da Tế Bào Gốc
                                            Yobe Stem Cell - 3 trong 1</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product23.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK31021VN</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product24.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Ngăn Ngừa Mụn Và Thâm Yobeskin</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product25.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Áo Khoác Vinabrands AK50920DL</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product26.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chấm Mụn Yobeskin</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product27.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Tinh Chất Tế Bào Gốc Yobecell (1
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product28.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Set Tinh Chất Tế Bào Gốc Yobecell (5
                                            Chai)</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product29.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Xịt Dưỡng Tế Bào Gốc YobeCell</a></h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="?m=product&act=detail" title="#"><img src="{$domain}images/product30.jpeg"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="?m=product&act=detail" title="#">Kem Chống Nắng Tế Bào Gốc YobeCell</a>
                                    </h3>
                                    <p class="price">880,000<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> *}
{* <section class="sidebar-block">
    <div class="container">
        <div class="block-title">
            <h2 class="title"><a href="?m=news&act=index" title="#">Tin tức thời trang</a></h2>
            <ul class="sub-title">
                <li><a href="?m=news&act=index" title="#">Kinh doanh online</a></li>
                <li><a href="?m=news&act=index" title="#">Ý tưởng kình doanh</a></li>
                <li><a href="?m=news&act=index" title="#">Xu hướng</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <ul class="sidebar-content news">
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                        <img src="{$domain}images/duc-vinh-quynh-anh-12-1504757901.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <h3><a href="?m=news&act=detail" title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí</a></h3>
                    <div class="info">Danh hài xuất hiện trong tiết mục song ca của Đức Vĩnh - Quỳnh Anh đến từ đội Dương Triệu Vũ - Thu Trang và thể hiện một đoạn vọng cổ.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Ông tổ nghề nail ở Czech" class="img">
                        <img src="{$domain}images/10-13-11-1-1495605819.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <h3><a href="?m=news&act=detail" title="Ông tổ nghề nail ở Czech">Ông tổ nghề nail ở Czech</a></h3>
                    <div class="info">Cộng đồng người Việt đã và đang chiếm giữ thị phần lớn nhất trong nghề nail tại Châu Âu với mức thu nhập thậm chí còn cao hơn so với thu nhập bình quân của người bản địa.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Trồng dưa lưới công nghệ Israel" class="img">
                        <img src="{$domain}images/957fd070196040eb8caaac2f727192fe-1493872327.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <a href="?m=news&act=index" class="news-category bd2891" title="Ý tưởng kình doanh" style="background: rgb(189, 40, 145);">Ý tưởng kình doanh</a>
                    <h3><a href="?m=news&act=detail" title="Trồng dưa lưới công nghệ Israel">Trồng dưa lưới công nghệ Israel</a></h3>
                    <div class="info">Dù đầu tư ban đầu lớn nhưng mô hình này có nhiều ưu việt, hiệu quả kinh tế cao, mở ra hướng sản xuất nông nghiệp bền vững trong điều kiện biến đổi khí hậu.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Làm thế nào biến Kiến thức là một loại tiền mới?" class="img">
                        <img src="{$domain}images/162425-1-1--1495959552.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <a href="?m=news&act=index" class="news-category a238ce" title="Xu hướng" style="background: rgb(162, 56, 206);">Xu hướng</a>
                    <h3><a href="?m=news&act=detail" title="Làm thế nào biến Kiến thức là một loại tiền mới?">Làm thế nào biến Kiến thức là một loại tiền mới?</a></h3>
                    <div class="info">KIẾN THỨC LÀ MỘT LOẠI TIỀN MỚI.<br>
                        Tất cả chúng ta đều có thể dễ dàng học vốn kiến thức hàng ngày từ Facebook, Youtube, Google, hội thảo, khoá học, từ rất nhiều người bạn gặp với các bài học thành công, thất bại trong cuộc sống.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?" class="img">
                        <img src="{$domain}images/20150516081412mcharlieton1-1490059217.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <a href="?m=news&act=index" class="news-category DF004A" title="Xây dựng thương hiệu" style="background: rgb(223, 0, 74);">Xây dựng thương hiệu</a>
                    <h3><a href="?m=news&act=detail" title="Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?">Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?</a></h3>
                    <div class="info">Tuy Facebook ra đời đã 13 năm nhưng chỉ cho đến gần đây sau khi nhóm “All about Nghề Nails” ra đời, thì mạng xã hội đã tạo nên một cơn sốt thần kỳ và nhanh chóng đến cộng đồng Nails người Việt.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                        <img src="{$domain}images/ban-da-biet-rua-mat-dung-cach-1478149651.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <a href="?m=news&act=index" class="news-category e02765" title="Phát triển đội ngũ" style="background: rgb(224, 39, 101);">Phát triển đội ngũ</a>
                    <h3><a href="?m=news&act=detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">TEKNAILS - KHÁT VỌNG VƯƠN XA</a></h3>
                    <div class="info">Công ty TEKNAILS là một công ty có người tiền nhiệm và cũng là người đồng sáng lập ra công ty cổ phần Kềm ViBa-Ông TRẦN VĨNH BẢO. Người có một niềm đam mê nhiệt huyết không biết từ bỏ ước mơ của mình-SỨ MỆNH CHO NGÀNH NAILS.</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="CHÍNH SÁCH TUYỂN NHÂN VIÊN KINH DOANH  VINACOS" class="img">
                        <img src="{$domain}images/cang-lam-dep-cang-xau-neu-ban-khong-biet-nhung-dieu-duoi-day-sai-lam-khi-lam-dep2-1470998163-width500height332-1489394468.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <h3><a href="?m=news&act=detail" title="CHÍNH SÁCH TUYỂN NHÂN VIÊN KINH DOANH  VINACOS">CHÍNH SÁCH TUYỂN NHÂN VIÊN KINH DOANH VINACOS</a></h3>
                    <div class="info">BẠN ĐANG MUỐN TĂNG THÊM THU NHẬP?<br>
                        BẠN MUỐN VIỆC TỰ DO VỀ THỜI GIAN?<br>
                        BẠN MUỐN LÀM VIỆC TRONG MÔI TRƯỜNG CHUYÊN NGHIỆP?<br>
                        =&gt; HÃY ĐẾN VỚI CHÚNG TÔI</div>
                </article>
            </li>
            <li class="item">
                <article>
                    <a href="?m=news&act=detail" title="Cà phê không có hại như nhiều người lầm tưởng" class="img">
                        <img src="{$domain}images/learning-1495604304.jpeg" />
                        <span class="star-fa"><i class="fa fa-star" aria-hidden="true"></i></span>
                    </a>
                    <a href="?m=news&act=index" class="news-category bd2891" title="Câu chuyện thành công" style="background: rgb(189, 40, 145);">Câu chuyện thành công</a>
                    <h3><a href="?m=news&act=detail" title="Cà phê không có hại như nhiều người lầm tưởng">Cà phê không có hại như nhiều người lầm tưởng</a></h3>
                    <div class="info">Tin vui dành cho những người yêu cà phê, nếu bạn uống ít hơn 4 tách mỗi ngày sẽ không gây hại cho sức khỏe.</div>
                </article>
            </li>
        </ul>
    </div>
</section> *}