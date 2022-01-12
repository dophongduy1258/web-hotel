<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:58:49
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/product/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1565104298615edba23907d5-76430055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38dcbbd474d46b9617b55788b3676492a3258259' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/product/detail.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1565104298615edba23907d5-76430055',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615edba23ea818_86801837',
  'variables' => 
  array (
    'data' => 0,
    'session' => 0,
    'setup' => 0,
    'rewrite_url' => 0,
    'domain' => 0,
    'lSuggest' => 0,
    'x' => 0,
    'product' => 0,
    'lOnSales' => 0,
    'lNews' => 0,
    'lCat' => 0,
    'item' => 0,
    'link_qrweb' => 0,
    'meta_title' => 0,
    'link_ios' => 0,
    'link_android' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615edba23ea818_86801837')) {function content_615edba23ea818_86801837($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tungla/code/vina/web/web_erp/library/smarty/plugins/modifier.date_format.php';
?><style type="text/css">
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
                        <img alt="" class="cloudzoom" id="zoom-fancybox" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
"
                            data-cloudzoom="zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
'">
                    </div>
                    <div class="thumbs">
                        <div>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_1']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
' ">
                                    <input class="hide" id="link_img" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
" />
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_2']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_2'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_2'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_2'];?>
' ">
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_3']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_3'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_3'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_3'];?>
' ">
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_4']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_4'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_4'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_4'];?>
' ">
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_5']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_5'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_5'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_5'];?>
' ">
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['img_6']!='') {?>
                                <div class="item">
                                    <img alt="" class="cloudzoom-gallery" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_6'];?>
"
                                        data-cloudzoom="useZoom:'.cloudzoom', image: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_6'];?>
' , zoomImage: '<?php echo $_smarty_tpl->tpl_vars['data']->value['img_6'];?>
' ">
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12 infomation-product-detail">
                    <div class="wrap-scroll-detail">
                        <div class="scroll-detail">
                            <div class="left">
                                <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</h1>
                                <span class="ma-sp"><b>SKU:</b>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['sku_code'];?>
<?php if (isset($_smarty_tpl->tpl_vars['session']->value['fullname_client'])) {?><button type="button" class="btn-share" product_id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" id="btnCopy">Chia sẻ</button><?php }?></span>
                                <div class="clear"></div>
                                <div class="info"><?php echo $_smarty_tpl->tpl_vars['data']->value['short_description'];?>
</div>
                            </div>
                            <div class="right">
                                <h2>Bán hàng không bỏ vốn</h2>
                                <p>Cộng tác viên/Đại lý online liên hệ để được nhận chiết khấu tốt nhất</p>
                                <div>
                                    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
" title="Gọi tư vấn ngay">Gọi tư vấn ngay</a>
                                    <a href="<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['link_fanpage'])&&$_smarty_tpl->tpl_vars['setup']->value['link_fanpage']!='') {?><?php echo $_smarty_tpl->tpl_vars['setup']->value['link_fanpage'];?>
<?php } else { ?>/lien-he<?php }?>" title="Fanpage hỗ trợ">Fanpage hỗ trợ</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['decrement']>0) {?>
                                <p class="old-price-detail">Giá gốc: <span><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['price'],"0",".",",");?>
 vnđ</span></p>
                            <?php }?>
                            <p class="price-detail"><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['price_decrement'],"0",".",",");?>
 vnđ</p>
                            <p class="price-hh">HH: <span><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></span></p>
                            <p class="price-ln">Lợi nhuận: <span><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></span></p>
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
                        <input class="hide" id="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" />
                        <input class="hide" id="price" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
" />
                        <input class="hide" id="unique_id" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['unique_id'];?>
" />
                        <input class="hide" id="decrement" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['decrement'];?>
" />
                        <input class="hide" id="link" type="text"
                            value="<?php echo $_smarty_tpl->tpl_vars['rewrite_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['data']->value['unique_id'];?>
/<?php if (isset($_smarty_tpl->tpl_vars['session']->value['username_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['username_client'];?>
<?php }?>" />
                        <div class="action">
                            <!-- Load lại cái hình ảnh đại diện để làm sự kiện thêm vào giỏ hàng cho đẹp =)) -->
                            <div class="img_add_cart">
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['img_1']!='') {?>
                                    <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['img_1'];?>
" />
                                <?php }?>
                            </div>
                            <!-- End -->

                            <button type="button" class="btn btn-add-cart btn-width" product_id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"
                                id="add_cart"><i class="fa fa-cart-plus"></i><span>Thêm vào giỏ hàng</span></button>
                            <button type="button" class="btn btn-key btn-width" product_id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" id="buy_now">Mua
                                ngay</button>
                            <div class="clear"></div>
                        </div>
                        <div class="box_addcart_success">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/addcart_success.png" alt="" class="img-responsive" />
                            <p>Đã thêm vào giỏ</p>
                        </div>
                        <div class="clear"></div>
                        <div class="img-free">
                            <span><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/free_ship-01.png?v=1.0.01" alt=""
                                    class="img-responsive" /></span>
                            <span><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/Giao_hang.png?v=1.0.01" alt=""
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
                
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="content">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

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
                            <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/img-goiy1.jpg" alt="#" /></a>
                            <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/img-goiy2.jpg" alt="#" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 img-product">
                        <div class="block-title">
                            <h2 class="title"><a href="product" title="#">Gợi ý sản phẩm</a></h2>
                            <div class="clear"></div>
                        </div>
                        <div class="row">
                            <div class="owl-4">
                                <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lSuggest']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                        <div class="col-md-3 item">
                                            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(2, null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                        <?php }?>
                                        <div class="iframe">
                                            <div class="img">
                                                <a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
"
                                                    title="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
"
                                                        alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" /></a>
                                            </div>
                                            <div class="info">
                                                <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a>
                                                </h3>
                                                <p class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],"0",".",",");?>
<font>đ
                                                    </font>
                                                </p>
                                                <p class="price-hh">HH: <?php echo number_format($_smarty_tpl->tpl_vars['data']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></p>
                                                <p class="price-ln">Lợi nhuận: <span><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></span></p>
                                            </div>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                        </div>
                                    <?php }?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (count($_smarty_tpl->tpl_vars['lOnSales']->value)>0) {?>
    <section class="block-news block-news-home block-news-km">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="news" title="#">Khuyến mãi</a></h2>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="owl-4">
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lOnSales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                            <div class="col-md-3 item">
                                <div class="iframe">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="img">
                                                <a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
"
                                                    title="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
"
                                                        alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" width="100%" /></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info">
                                                <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['lNews']->value)>0) {?>
    <section class="block-news block-news-home">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="/tin-tuc" title="#">Câu chuyện thương hiệu</a></h2>
                <?php if (count($_smarty_tpl->tpl_vars['lCat']->value)>0) {?>
                    <ul class="sub-title">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lCat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                            <li><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-cn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                        <?php } ?>
                    </ul>
                <?php }?>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->iteration==1) {?>
                            <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-left">
                                <div class="item">
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                                        </h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created_at'],"H:i d/m/Y");?>
</span>
                                        </div>
                                        <div class="info"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_description'];?>
</div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    <?php } ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-center">
                        <div class="row">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->iteration>1&&$_smarty_tpl->tpl_vars['item']->iteration<=5) {?>
                                    <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                        <div class="item">
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                            </a>
                                            <div class="wrap-info">
                                                <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                                                </h3>
                                                <div class="time">
                                                    <span><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created_at'],"H:i d/m/Y");?>
</span>
                                                </div>
                                                <div class="info"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_description'];?>
</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-right">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->iteration>5&&$_smarty_tpl->tpl_vars['item']->iteration<=10) {?>
                                <div class="item">
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                    </a>
                                    <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h3>
                                </div>
                            <?php }?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }?>
<section class="block-news block-news-dmtc">
    <div class="container">
        <div class="wrap-item">
            <div class="item">
                <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/dmtc1.png" /></div>
                <h3>Không cọc tiền, không bỏ vốn</h3>
                <div class="info">Cộng tác viên online chỉ cần đăng bán Vicosap thu cod khách hàng</div>
            </div>
            <div class="item">
                <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/dmtc2.png" /></div>
                <h3>Không cần đóng gói giao hàng</h3>
                <div class="info">Vicosap chịu trách nhiệm đóng gói và giao hàng</div>
            </div>
            <div class="item">
                <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/dmtc3.png" /></div>
                <h3>Chiết khấu tốt nhất</h3>
                <div class="info">Cộng tác viên và đại lý online được hưởng chiết khấu tốt nhất</div>
            </div>
            <div class="item">
                <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/dmtc4.png" /></div>
                <h3>Bài viết mẫu cập nhật liên tục</h3>
                <div class="info">Bài viết mẫu được cập nhật thường xuyên, CTV dể dàng đăng bán</div>
            </div>
            <div class="item">
                <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/dmtc5.png" /></div>
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
                <div class="text-center"><img src="<?php echo $_smarty_tpl->tpl_vars['link_qrweb']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
" class="" width="240"></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 down_app">
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_ios']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/app_apple.jpg" alt=""
                        class="img-responsive"></a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['link_android']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/app_google.jpg" alt=""
                        class="img-responsive"></a>
            </div>
        </div>
    </div>
</section><?php }} ?>
