<!DOCTYPE html>
<html lang="vi" debug="true">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$title}</title>
    <script type="text/javascript" src="{$domain}/js/global.js?{$version}"></script>
    <script src="{$domain}/js/jquery.min.js?{$version}"></script>
    <link href="{$domain}/css/bootstrap.min.css?{$version}" rel="stylesheet" />
    <link href="{$domain}/css/bootstrap.css?{$version}" rel="stylesheet" />
    <link href="{$domain}/images/favicon.png?{$version}" rel="shortcut icon" />
    {* <script src="{$domain}/js/js_act/{$session.lang}/home.js?{$version}"></script> *}
    <link href="{$domain}/fonts/montserrat/fonts.css?{$version}" rel="stylesheet">
    <link href="{$domain}/js/owlCarousel/owl.carousel.css?{$version}" rel="stylesheet" type="text/css" />
    <link href="{$domain}/css/rangeSlider.css?{$version}" rel="stylesheet" />
    <link href="{$domain}/css/cloudzoom.css?{$version}" rel="stylesheet" />
    <link href="{$domain}/css/fancybox/jquery.fancybox.css?{$version}" rel="stylesheet" />
    {if $db_pos == 'chodaumoi'}
    <link href="{$domain}/css/main_chodaumoi.css?{$version}" rel="stylesheet">
    {else}
    <link href="{$domain}/css/main.css?{$version}" rel="stylesheet">
    {/if}
    <link href="{$domain}/css/font-awesome.min.css?{$version}" rel="stylesheet" />
    <script src="{$domain}/js/{$session.lang}/home.js?{$version}"></script>
    <meta property="og:url" content='{if isset($meta_url)}{$meta_url}{/if}' />
    <meta property="og:type" content='website' />
    <meta property="og:title" content='{if isset($meta_title)}{$meta_title}{/if}' />
    <meta property="og:description" content='{if isset($meta_description)}{$meta_description}{/if}' />
    <meta property="og:image" content='{if isset($meta_image)}{$meta_image}{/if}' />
</head>

<body>
    <img src="{$domain}/images/banner.jpeg?{$version}" alt="#" class="destop hide" />
    <img src="{$domain}/images/banner-n.jpg?{$version}" alt="#" class="mobile hide" />
    <div class="header">
        <div class="header-toolbar">
            <div class="container">
                <div class="support">
                    {* {$setup.info_contact} *}
                    <span><i class="fa fa-phone"></i> <a href="tel:{$setup.company_phone}" title="">{$setup.company_phone}</a></span>
                    <span><i class="fa fa-envelope"></i> <a href="mailto:{$setup.company_email}"
                            title="">{$setup.company_email}</a></span>
                </div>
                <div class="wrap-icon">
                    <div class="login-menu">
                        {* <a class="destop" href="?m=about&act=index" title="Giới thiệu">Giới thiệu</a>
                        <a href="?m=contact&act=index" title="Liên hệ">Liên hệ</a> *}
                        {if !isset($session.fullname_client)}
                            <a href="/dang-nhap" title=""><b>Đăng nhập</b></a>
                            <a href="/dang-ky-tai-khoan" title=""><b>Đăng ký</b></a>
                        {else}
                            <a href="/thong-tin" title=""><b>{$session.fullname_client}</b></a>
                            <a href="{$link}/web_erp/logout.php" title=""><b>Đăng xuất</b></a>
                        {/if}
                        {* <a href="?m=user&act=profile" title=""><b>Profile</b></a> *}
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="relative">
                    <div class="row">
                        {if $db_pos == 'chodaumoi'}
                            <div class="col-md-12 col-sm-12 col-xs-12 logo" style="text-align: center;">
                                <h1 class="hide">Erp</h1>
                                <a href="/trang-chu" title="Erp"><img src="{if isset($url_logo) && $url_logo != ''}{$url_logo}{else}{$domain}images/logo.png{/if}" alt="Erp"></a>
                                <div class="icon-cate-mobi">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                                <a class="icon-cart cart-detail" href="/gio-hang"><img src="{$domain}/images/cart1.png" alt="#" /><span id='quantity_cart'></span></a>
                            </div>
                        {else}
                            <div class="col-md-2 col-sm-3 col-xs-12 logo">
                                <h1 class="hide">Erp</h1>
                                <a href="/trang-chu" title="Erp"><img src="{if isset($url_logo) && $url_logo != ''}{$url_logo}{else}{$domain}images/logo.png{/if}" alt="Erp"></a>
                                <div class="icon-cate-mobi">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12 wrap-menu-top">
                                <div class="icon-menu-mobi">Menu</div>
                                <div class="menu-top">
                                    {$menu_top}
                                </div>
                                <a class="icon-cart cart-detail" href="/gio-hang"><img src="{$domain}/images/cart.png" alt="#" /><span id='quantity_cart'></span></a>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
        <div class="category-product category-product-mobile">
            <div class="title">
                <span><i></i><i></i><i></i></span>
                <p>Danh mục</p>
            </div>
            <ul>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon1.png" class="" />
                            <img src="{$domain}/images/icon1-h.png" class="h" />
                        </div>
                        <span>Thời trang nam</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon2.png" class="" />
                            <img src="{$domain}/images/icon2-h.png" class="h" />
                        </div>
                        <span>Giày thời trang nữ</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon3.png" class="" />
                            <img src="{$domain}/images/icon3-h.png" class="h" />
                        </div>
                        <span>Phụ kiện du lịch</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon4.png" class="" />
                            <img src="{$domain}/images/icon4-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng cho em bé</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon5.png" class="" />
                            <img src="{$domain}/images/icon5-h.png" class="h" />
                        </div>
                        <span>Phụ kiện phòng ngủ</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon6.png" class="" />
                            <img src="{$domain}/images/icon6-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon7.png" class="" />
                            <img src="{$domain}/images/icon7-h.png" class="h" />
                        </div>
                        <span>Thực phẩm thú cưng</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon8.png" class="" />
                            <img src="{$domain}/images/icon8-h.png" class="h" />
                        </div>
                        <span>Trái cây siêu sạch</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon9.png" class="" />
                            <img src="{$domain}/images/icon9-h.png" class="h" />
                        </div>
                        <span>Mỹ phẩm chính sản</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
                        <div class="icon">
                            <img src="{$domain}/images/icon10.png" class="" />
                            <img src="{$domain}/images/icon10-h.png" class="h" />
                        </div>
                        <span>Sản phẩm công nghệ</span>
                    </a>
                </li>
            </ul>
        </div>
</div>