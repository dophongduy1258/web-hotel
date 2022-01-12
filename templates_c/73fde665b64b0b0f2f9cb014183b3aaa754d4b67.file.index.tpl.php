<?php /* Smarty version Smarty-3.1.18, created on 2021-10-07 15:56:41
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1302518716615d62fdd1a6a0-45823083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73fde665b64b0b0f2f9cb014183b3aaa754d4b67' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/home/index.tpl',
      1 => 1633596231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1302518716615d62fdd1a6a0-45823083',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d62fdd54de6_78902675',
  'variables' => 
  array (
    'domain' => 0,
    'data' => 0,
    'item' => 0,
    'it' => 0,
    'banner' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d62fdd54de6_78902675')) {function content_615d62fdd54de6_78902675($_smarty_tpl) {?><div class="form-search">
    <div class="container hide">
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
                    id='quantity_cart'></span></a>
        </div>
    </div>
</div>
<div class="header-slider">
    <div class="container">
        <div class="row">
            
            
            
            
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="iframe">
                    <div class="flexslider">
                        <ul class="slides" id="slide">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['slide_size']=='big') {?>
                                    <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['it']->key;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['it']->value['banner']!='') {?>
                                            <li>
                                                <a href="#" title="#" target="#" class=""><img src="<?php echo $_smarty_tpl->tpl_vars['it']->value['banner'];?>
" alt="#" /></a>
                                            </li>
                                        <?php }?>
                                    <?php } ?>
                                <?php }?>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    <div class="brand hide" id="brands">
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div id="home_product">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['slide_size']!='big') {?>
            <?php if (count($_smarty_tpl->tpl_vars['item']->value['slide_list'])>0||count($_smarty_tpl->tpl_vars['item']->value['product_1_list'])>0) {?>
                <div class="banner">
                    <div class="container">
                        <div class="row">
                            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['slide_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['banner']->key;
?>
                                <div class="col-md-6 col-sm-6 col-xs-12 item">
                                    <a href="#" title="#"> <img src="<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" alt="#" /></a>
                                </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            <?php }?>
            <div class="content-product">
                <div class="container">
                    <div class="block-title">
                        <h2 class="title"><a style="<?php if (count($_smarty_tpl->tpl_vars['item']->value['product_1_list'])==0) {?>pointer-events:none;<?php }?>"
                                href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_cat'];?>
-c<?php if ($_smarty_tpl->tpl_vars['item']->value['category_1']!='0') {?><?php echo $_smarty_tpl->tpl_vars['item']->value['category_1'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['item']->value['product_1'];?>
<?php }?>"
                                title="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
                        <div class="clear"></div>
                    </div>
                    <?php if (count($_smarty_tpl->tpl_vars['item']->value['product_1_list'])>0) {?>
                        <div class="content">
                            <div class="block-content">
                                <div class="row">
                                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['product_1_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                                        <div class="col-md-2 col-sm-4 col-xs-6 item">
                                            <div class="iframe">
                                                <div class="img">
                                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
" title="#"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
"
                                                            alt="#" /></a>
                                                </div>
                                                <div class="info">
                                                    <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_link'];?>
-p<?php echo $_smarty_tpl->tpl_vars['product']->value['unique_id'];?>
" title="#"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a></h3>
                                                    <p class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],"0",".",",");?>
<font>đ</font>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        <?php }?>
    <?php } ?>
</div>

<?php }} ?>
