<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:57:40
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1285123166615eda1d462894-97797624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fedb33029d686afb0616af612d68d1d831a96b2b' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/home/index.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1285123166615eda1d462894-97797624',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615eda1d49f5b5_37485711',
  'variables' => 
  array (
    'data' => 0,
    'it' => 0,
    'item' => 0,
    'x' => 0,
    'banner' => 0,
    'items' => 0,
    'product' => 0,
    'lNews' => 0,
    'lCat' => 0,
    'lVideosBrand' => 0,
    'domain' => 0,
    'link_qrweb' => 0,
    'meta_title' => 0,
    'link_ios' => 0,
    'link_android' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615eda1d49f5b5_37485711')) {function content_615eda1d49f5b5_37485711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tungla/code/vina/web/web_erp/library/smarty/plugins/modifier.date_format.php';
?><!-- V2 Vicosop -->
<?php if (count($_smarty_tpl->tpl_vars['data']->value['slide_top'])>0) {?>
    <div class="header-slider">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 center">
                    <div class="iframe">
                        <div class="flexslider">
                            <ul class="slides" id="slide">
                                <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['slide_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['it']->value['banner']!='') {?>
                                        <li>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['it']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['it']->value['cat_link']=='') {?>pointer-events:none;<?php }?>"
                                                title="<?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
" class=""><img src="<?php echo $_smarty_tpl->tpl_vars['it']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
" /></a>
                                        </li>
                                    <?php }?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 right">
                    <div class="iframe">
                        <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['banner_right_slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
                            <div class="item1">
                                <a href="/<?php echo $_smarty_tpl->tpl_vars['it']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['it']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                    title="<?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['it']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
" /></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<div class="brand">
    <div class="container">
        <div class="owl">
            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['slide_size']=='big') {?>
                    <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['category_1_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                            <div class="item col-md-2">
                                <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(2, null, 0);?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                            <?php }?>
                            <a href="/<?php echo $_smarty_tpl->tpl_vars['it']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['it']->value['id'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['it']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                title="#"><img src="<?php echo $_smarty_tpl->tpl_vars['it']->value['icon'];?>
" alt="#" /><span><?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
</span></a>
                            <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                            </div>
                        <?php }?>
                    <?php } ?>
                <?php }?>
            <?php } ?>
        </div>
    </div>
</div>
</div>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['slide_size']!='big') {?>
        <?php if (count($_smarty_tpl->tpl_vars['item']->value['product_1_list'])<=0) {?>
            <?php if (count($_smarty_tpl->tpl_vars['item']->value['slide_list'])<=5) {?>
                <div class="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 item">
                                <div class="owl-1">
                                    <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['banner']->key;
 $_smarty_tpl->tpl_vars['banner']->iteration++;
?>
                                        <a href="/<?php echo $_smarty_tpl->tpl_vars['banner']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['banner']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                            title="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
" /></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="banner banner-small-run">
                    <div class="container">
                        <div class="content">
                            <div class="block-title">
                                <h2 class="title"><a>Thương hiệu đồng hành cùng cộng tác viên</a></h2>
                                <div class="clear"></div>
                            </div>
                            <div class="row">
                                <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['banner']->key;
 $_smarty_tpl->tpl_vars['banner']->iteration++;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['banner']->iteration==1) {?>
                                        <div class="col-md-3 col-sm-3 col-xs-12 banner-cate">
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['banner']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['banner']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                                title="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
" /></a>

                                        </div>
                                    <?php }?>
                                <?php } ?>
                                <div class="col-md-9 col-sm-9 col-xs-12 banner-product">
                                    <div class="row">
                                        <div class="owl-3">
                                            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['banner']->key;
 $_smarty_tpl->tpl_vars['banner']->iteration++;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['banner']->iteration>1) {?>
                                                    <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                                        <div class="col-md-4 item">
                                                            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(2, null, 0);?>
                                                        <?php } else { ?>
                                                            <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                                        <?php }?>
                                                        <div class="img">
                                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['banner']->value['cat_link'];?>
"
                                                                style="<?php if ($_smarty_tpl->tpl_vars['banner']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                                                title="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
" /></a>
                                                        </div>
                                                        <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                                        </div>
                                                    <?php }?>
                                                <?php }?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        <?php } else { ?>
            <div class="content-product">
                <div class="container">
                    <div class="content">
                        <div class="block-content">
                            <div class="row">
                                <?php if (count($_smarty_tpl->tpl_vars['item']->value['slide_list'])>0) {?>
                                    <div
                                        class="col-md-3 col-sm-3 col-xs-12 img-cate <?php if ($_smarty_tpl->tpl_vars['item']->value['slide_size']=='slideright') {?>pull-right<?php }?>">
                                        <div class="owl-1">
                                            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['banner']->key;
 $_smarty_tpl->tpl_vars['banner']->iteration++;
?>
                                                <a href="/<?php echo $_smarty_tpl->tpl_vars['banner']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['banner']->value['cat_link']=='') {?>pointer-events: none;<?php }?>"
                                                    title="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value['name'];?>
" /></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 img-product">
                                    <?php } else { ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 img-product">
                                        <?php }?>
                                        <div class="block-title">
                                            <h2 class="title"><a
                                                    style="<?php if (count($_smarty_tpl->tpl_vars['item']->value['product_1_list'])==0) {?>pointer-events:none;<?php }?>"
                                                    href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
-c<?php if ($_smarty_tpl->tpl_vars['item']->value['category_1']!='0') {?><?php echo $_smarty_tpl->tpl_vars['item']->value['category_1'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['item']->value['product_1'];?>
<?php }?>"
                                                    title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
                                            <?php if (count($_smarty_tpl->tpl_vars['item']->value['category_1_list'])>0) {?>
                                                <ul class="sub-title">
                                                    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['category_1_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['items']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['items']->key;
 $_smarty_tpl->tpl_vars['items']->iteration++;
?>
                                                        <?php if ($_smarty_tpl->tpl_vars['items']->iteration>=1&&$_smarty_tpl->tpl_vars['items']->iteration<=3) {?>
                                                            <li><a href="/<?php echo $_smarty_tpl->tpl_vars['items']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"
                                                                    style="<?php if ($_smarty_tpl->tpl_vars['items']->value['cat_link']=='') {?>pointer-events:none;<?php }?>"
                                                                    title="<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</a></li>
                                                        <?php }?>
                                                    <?php } ?>
                                                </ul>
                                            <?php }?>
                                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
-c<?php if ($_smarty_tpl->tpl_vars['item']->value['category_1']!='0') {?><?php echo $_smarty_tpl->tpl_vars['item']->value['category_1'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['item']->value['product_1'];?>
<?php }?>"
                                                title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"></i></a>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row">
                                            <div class="owl-4">
                                                <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['product_1_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['layout']['product_row']<2) {?>
                                                        <div class="col-md-3 item">
                                                        <?php } else { ?>
                                                            <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                                                <div class="col-md-3 item">
                                                                    <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(2, null, 0);?>
                                                                <?php } else { ?>
                                                                    <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(1, null, 0);?>
                                                                <?php }?>
                                                            <?php }?>
                                                            <div class="iframe">
                                                                <div class="img">
                                                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
"
                                                                        title="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
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
                                                                    <p class="price-hh">HH:
                                                                        <?php echo number_format($_smarty_tpl->tpl_vars['product']->value['commission_vnd'],"0",".",",");?>
 <font>đ
                                                                        </font>
                                                                    </p>
                                                                    <p class="price-ln">Lợi nhuận:
                                                                        <span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['commission_vnd'],"0",".",",");?>
 <font>
                                                                                đ</font></span></p>
                                                                </div>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['layout']['product_row']<2) {?>
                                                            </div>
                                                        <?php } else { ?>
                                                            <?php if ($_smarty_tpl->tpl_vars['x']->value%2!=0) {?>
                                                            </div>
                                                        <?php }?>
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
            </div>
        <?php }?>
    <?php }?>
<?php } ?>

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
<?php if (count($_smarty_tpl->tpl_vars['lVideosBrand']->value)>0) {?>
    <section class="block-news block-news-home">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="news" title="#">Video thương hiệu</a></h2>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lVideosBrand']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                        <div class="col-md-3 col-sm-6 col-xs-12 wrap-item video">
                            <div class="item">
                                <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbURL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
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
                <h3>Không cọc viên, không bỏ vốn</h3>
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
</section>
<!-- END V2 Vicosap --><?php }} ?>
