<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:45:27
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:413233472615eda1d427740-03201224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8b7c49c2b6757491cc16c89971079d7ecdae16f' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/header.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '413233472615eda1d427740-03201224',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615eda1d45b7c6_10689857',
  'variables' => 
  array (
    'meta_title' => 0,
    'meta_description' => 0,
    'title' => 0,
    'domain' => 0,
    'version' => 0,
    'db_pos' => 0,
    'session' => 0,
    'meta_url' => 0,
    'meta_image' => 0,
    'setup' => 0,
    'link' => 0,
    'url_logo' => 0,
    'menu_header' => 0,
    'item' => 0,
    'items' => 0,
    'itemss' => 0,
    'menu_top' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615eda1d45b7c6_10689857')) {function content_615eda1d45b7c6_10689857($_smarty_tpl) {?><!DOCTYPE html>
<html lang="vi" debug="true">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="<?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?>" />
    <meta name="description" content="<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
<?php }?>" />
    <title><?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)&&$_smarty_tpl->tpl_vars['meta_title']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php }?></title>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/global.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap/bootstrap.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap/bootstrap.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/jquery-ui-1.10.4.custom.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/favicon.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="shortcut icon" />
    
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/fonts/montserrat/fonts.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/owlCarousel/owl.carousel.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/rangeSlider.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/cloudzoom.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/fancybox/jquery.fancybox.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/main.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['db_pos']->value;?>
.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/fonts/font-awesome.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['session']->value['lang'];?>
/home.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <meta property="og:url" content='<?php if (isset($_smarty_tpl->tpl_vars['meta_url']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_url']->value;?>
<?php }?>' />
    <meta property="og:type" content='website' />
    <meta property="og:title" content='<?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?>' />
    <meta property="og:description" content='<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
<?php }?>' />
    <meta property="og:image" content='<?php if (isset($_smarty_tpl->tpl_vars['meta_image']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_image']->value;?>
<?php }?>' />
    <meta property="og:image:alt" content='<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
<?php }?>' />
</head>

<body>
    <div class="header">
        <div class="header-toolbar">
            <div class="container">
                <div class="support">
                    <span><a href="/tai-ung-dung" title="">Tải ứng dụng</a></span>
                    <span><a href="tel:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
" title="">Hotline: <?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
</a></span>
                </div>
                <div class="wrap-icon">
                    <div class="login-menu">
                        <?php if (!isset($_smarty_tpl->tpl_vars['session']->value['fullname_client'])) {?>
                            <a href="#" title="Hỗ trợ"> <i class="fa fa-question-circle-o"></i> Hỗ trợ</a>
                            <a href="/dang-nhap" title="">Đăng nhập</a>
                            <a href="/dang-ky-tai-khoan" title="">Đăng ký</a>
                        <?php } else { ?>
                            <a class="destop" href="/thong-bao" title="Thông báo"><i class="fa fa-bell"></i> Thông báo</a>
                            <a href="#" title="Hỗ trợ"> <i class="fa fa-question-circle-o"></i> Hỗ trợ</a>
                            <a href="/thong-tin" title=""><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname_client'];?>
</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/web_erp/logout.php" title="">Đăng xuất</a>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="relative">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 logo">
                            <h1 class="hide"><?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?></h1>
                            <a href="/" title="Erp"><img src="<?php if (isset($_smarty_tpl->tpl_vars['url_logo']->value)&&$_smarty_tpl->tpl_vars['url_logo']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['url_logo']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/logo.png<?php }?>" alt="<?php if (isset($_smarty_tpl->tpl_vars['meta_title']->value)) {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?>"></a>
                            <div class="icon-cate-mobi">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 wrap-menu-top">
                            <div class="form-search">
                                <div class="relative">
                                    <div class="search">
                                        <div>
                                            <input type="text" class="form-control" name="keyword" id="keyword"
                                                placeholder="Tìm kiếm trên Vicosap..." />
                                            <button class="btn btn-search" id="btn_search"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon-search.png"
                                                    alt="Tìm kiếm" /></button>
                                            <div class="search-sub">
                                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->iteration>=1&&$_smarty_tpl->tpl_vars['item']->iteration<=4) {?>
                                                        <span><a href="/tim-kiem-<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
-cq<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></span>
                                                        
                                                    <?php }?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="icon-cart cart-detail" href="/gio-hang"><img
                                            src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/cart.png" alt="#" /><span
                                            id='quantity_cart'></span><i>Giỏ hàng</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <div class="header-menu1">
                    <div class="icon-menu-mobi">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <div class="category-product">
                        <div class="title">
                            <span><i></i><i></i><i></i></span>
                            <p>Danh mục</p>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                                <li class="li-sub">
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                        <div class="icon">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" class="" />
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" class="h" />
                                        </div>
                                        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 <?php if (count($_smarty_tpl->tpl_vars['item']->value['l'])>0) {?><i
                                                class="fa fa-angle-right"></i><?php }?></span>
                                    </a>
                                    <?php if (count($_smarty_tpl->tpl_vars['item']->value['l'])>0) {?>
                                        <ul class="sub">
                                            <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
                                                <li>
                                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['items']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
<?php if (count($_smarty_tpl->tpl_vars['items']->value['l'])>0) {?><i
                                                            class="fa fa-angle-right"></i><?php }?></a>
                                                    <?php if (count($_smarty_tpl->tpl_vars['items']->value['l'])>0) {?>
                                                        <ul class="sub">
                                                            <?php  $_smarty_tpl->tpl_vars['itemss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemss']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemss']->key => $_smarty_tpl->tpl_vars['itemss']->value) {
$_smarty_tpl->tpl_vars['itemss']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['itemss']->key;
?>
                                                                <li><a href="/<?php echo $_smarty_tpl->tpl_vars['itemss']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['itemss']->value['id'];?>
"
                                                                        title="<?php echo $_smarty_tpl->tpl_vars['itemss']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemss']->value['name'];?>
</a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php }?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php }?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="menu-top">
                        <?php echo $_smarty_tpl->tpl_vars['menu_top']->value;?>

                    </div>
                    <div class="clear"></div>
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
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon1.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon1-h.png" class="h" />
                        </div>
                        <span>Thời trang nam</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon2.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon2-h.png" class="h" />
                        </div>
                        <span>Giày thời trang nữ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon3.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon3-h.png" class="h" />
                        </div>
                        <span>Phụ kiện du lịch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon4.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon4-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng cho em bé</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon5.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon5-h.png" class="h" />
                        </div>
                        <span>Phụ kiện phòng ngủ</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon6.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon6-h.png" class="h" />
                        </div>
                        <span>Đồ gia dụng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon7.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon7-h.png" class="h" />
                        </div>
                        <span>Thực phẩm thú cưng</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon8.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon8-h.png" class="h" />
                        </div>
                        <span>Trái cây siêu sạch</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon9.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon9-h.png" class="h" />
                        </div>
                        <span>Mỹ phẩm chính sản</span>
                    </a>
                </li>
                <li>
                    <a href="product" title="#">
                        <div class="icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon10.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon10-h.png" class="h" />
                        </div>
                        <span>Sản phẩm công nghệ</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="height-header"></div><?php }} ?>
