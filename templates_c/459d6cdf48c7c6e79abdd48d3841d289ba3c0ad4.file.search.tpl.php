<?php /* Smarty version Smarty-3.1.18, created on 2021-12-13 15:40:29
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/product/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128883117061aecf8ff19142-55596661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '459d6cdf48c7c6e79abdd48d3841d289ba3c0ad4' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/product/search.tpl',
      1 => 1639383397,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128883117061aecf8ff19142-55596661',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61aecf90040b32_24607562',
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'domain' => 0,
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61aecf90040b32_24607562')) {function content_61aecf90040b32_24607562($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['data']->value['category']['img_list'])) {?>
    <div class="banner header-slider">
        <div class="container">
            <div class="flexslider">
                <ul class="slides">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['category']['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li>
                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['item']->value['cat_link']=='') {?>pointer-events:none;<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['banner'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" /></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php }?>
<div class="wrap-anvanced-search z2 <?php if (count($_smarty_tpl->tpl_vars['data']->value['category']['l'])<1) {?>hide<?php }?>">
    <div class="container">
        <div class="item-cate-product">
            <ul>
                
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['category']['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li>
                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['cat_link'];?>
-c<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style="<?php if ($_smarty_tpl->tpl_vars['item']->value['cat_link']=='') {?>pointer-events:none;<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                <div class="icon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="h" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
                                </div>
                                <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
                            </a>
                        </li>
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
/images/icon-search.png" alt="#" />
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
            <h2 class="title"><a href="" style="pointer-events: none;" title="#">Có <span style="color: black;"><?php echo $_smarty_tpl->tpl_vars['data']->value['total_record'];?>
</span> kết quả tìm kiếm với từ khóa <span style="color: black;">"<?php if ($_smarty_tpl->tpl_vars['keyword']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['data']->value['category']['name'];?>
<?php }?>"</span></a></h2>
            
            <div class="view_type_product hide"><span type-view="th_product" class="view_th_product active"><i class="fa fa-th"></i></span><span type-view="list_product" class="view_list_product"><i class="fa fa-list-ul"></i></span></div>
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
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
"><img
                                            src="<?php echo $_smarty_tpl->tpl_vars['item']->value['img_1'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
" /></a>
                                </div>
                                <div class="info">
                                    <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['item']->value['unique_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></h3>
                                    <p class="price"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],"0",".",",");?>
<font>đ</font>
                                    <p class="price-hh">HH: <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></p>
                                    <p class="price-ln">Lợi nhuận: <span><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['commission_vnd'],"0",".",",");?>
 <font>đ</font></span></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <nav class="text-center">
            <div id="hd_page_html">
                <div id="page_html">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['page_html'];?>

                </div>
            </div>
        </nav>
    </div>
</div><?php }} ?>
