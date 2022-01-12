<?php /* Smarty version Smarty-3.1.18, created on 2021-10-07 15:48:09
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/product/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1360536834615d6ec03ba3a6-78786215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbbeab5f22894f135032f40aad8d845aac349c49' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/product/index.tpl',
      1 => 1633596203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1360536834615d6ec03ba3a6-78786215',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d6ec0417470_79617064',
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'domain' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d6ec0417470_79617064')) {function content_615d6ec0417470_79617064($_smarty_tpl) {?><div class="banner">
    <div class="container">
        <div class="row">
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value['category']['img_list'])) {?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['category']['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <?php if (count($_smarty_tpl->tpl_vars['data']->value['category']['img_list'])>1) {?>
                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <a href="#" title="#"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['banner'];?>
" alt="#" /></a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 item">
                            <a href="#" title="#"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['banner'];?>
" alt="#" /></a>
                        </div>
                    <?php }?>
                <?php } ?>
            <?php }?>
            
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
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand2.png" alt="#" /><span>Thời trang</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand3.png" alt="#" /><span>Thể thao</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand4.png" alt="#" /><span>Du lịch</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand5.png" alt="#" /><span>Công nghệ</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand6.png" alt="#" /><span>Ăn nhậu</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand1.png" alt="#" /><span>Mỹ phẩm</span></li>
                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/brand2.png" alt="#" /><span>Thời trang</span></li>
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
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='1') {?>
                        <li>
                            <a href="/product/cat/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/1" title="#">
                                <div class="icon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="" />
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="h" />
                                </div>
                                <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
                            </a>
                        </li>
                    <?php }?>
                <?php } ?>
            </ul>
            
        </div>
    </div>
</div>
<div class="overlay-search-ad"></div>
<div class="form-search form-search-cate hide">
    <div class="container">
        <div class="relative">
            <div class="search">
                <form action="#" method="">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/icon-search.png" alt="#" />
                    <input type="text" class="form-control" />
                    <buton class="btn btn-search">Tìm<span> kiếm</span></buton>
                </form>
            </div>
            <a class="icon-cart" href="/cart"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/cart.png" alt="#" /><span
                    id="quantity_cart"></span></a>
        </div>
    </div>
</div>

<div class="content-product">
    <div class="container">
        <div class="block-title">
            <h2 class="title"><a href="" style="pointer-events: none;" title="#">Danh sách sản phẩm</a></h2>
                    <div class="clear"></div>
            
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="block-content">
                <div class="row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                            <div class="iframe">
                                <div class="img">
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['item']->value['unique_id'];?>
" title="#"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_1'];?>
"
                                            alt="#" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['item']->value['unique_id'];?>
" title="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></h3>
                                    <p class="price"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],"0",".",",");?>
<font>đ</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <nav class="text-center">
                    <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
                        <div id="page_html" class="col-lg-12 col-md-12 top10">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['page_html'];?>

                        </div>
                    </div>
                    
                </nav>
            </div>
        </div>
    </div>
</div><?php }} ?>
