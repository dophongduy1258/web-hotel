<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 18:16:06
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:633153961615d62fdce12a3-92666701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1e32c66744f72694f352a0c227a5a1452219b49' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/header.tpl',
      1 => 1633518955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '633153961615d62fdce12a3-92666701',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d62fdd125c0_24902777',
  'variables' => 
  array (
    'title' => 0,
    'domain' => 0,
    'version' => 0,
    'setup' => 0,
    'session' => 0,
    'link' => 0,
    'url_logo' => 0,
    'menu_top' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d62fdd125c0_24902777')) {function content_615d62fdd125c0_24902777($_smarty_tpl) {?><!DOCTYPE html>
<html lang="vi" debug="true">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/global.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/css/bootstrap.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
/css/font-awesome.min.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
    <meta property="og:url" content="#" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="#" />
    <meta property="og:description" content="ERP" />
    <meta property="og:image" content="#" />
</head>

<body>
    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/banner.jpeg?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="#" class="destop hide" />
    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/banner-n.jpg?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="#" class="mobile hide" />
    <div class="header">
        <div class="header-toolbar">
            <div class="container">
                <div class="support">
                    
                    <span><i class="fa fa-phone"></i> <a href="tel:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
</a></span>
                    <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_email'];?>
"
                            title=""><?php echo $_smarty_tpl->tpl_vars['setup']->value['company_email'];?>
</a></span>
                </div>
                <div class="wrap-icon">
                    <div class="login-menu">
                        
                        <?php if (!isset($_smarty_tpl->tpl_vars['session']->value['fullname_client'])) {?>
                            <a href="/dang-nhap" title=""><b>Đăng nhập</b></a>
                            <a href="/dang-ky-tai-khoan" title=""><b>Đăng ký</b></a>
                        <?php } else { ?>
                            <a href="/thong-tin" title=""><b><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname_client'];?>
</b></a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/logout.php" title=""><b>Đăng xuất</b></a>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="relative">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-12 logo">
                            <h1 class="hide">Erp</h1>
                            <a href="/trang-chu" title="Erp"><img src="<?php if (isset($_smarty_tpl->tpl_vars['url_logo']->value)&&$_smarty_tpl->tpl_vars['url_logo']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['url_logo']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/logo.png<?php }?>" alt="Erp"></a>
                            <div class="icon-cate-mobi">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-12 wrap-menu-top">
                            <div class="icon-menu-mobi">Menu</div>
                            <div class="menu-top">
                                <?php echo $_smarty_tpl->tpl_vars['menu_top']->value;?>

                                
                            </div>
                            <a class="icon-cart cart-detail" href="/gio-hang"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/cart.png" alt="#" /><span id='quantity_cart'></span></a>
                        </div>
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
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon1.png" class="" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/icon1-h.png" class="h" />
                        </div>
                        <span>Thời trang nam</span>
                    </a>
                </li>
                <li>
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
                    <a href="?m=product&act=index" title="#">
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
</div><?php }} ?>
