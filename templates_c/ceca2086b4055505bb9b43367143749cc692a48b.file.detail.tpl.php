<?php /* Smarty version Smarty-3.1.18, created on 2021-12-09 14:03:21
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/news/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128253092617b7a38cfcc34-15133414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ceca2086b4055505bb9b43367143749cc692a48b' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/news/detail.tpl',
      1 => 1638498146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128253092617b7a38cfcc34-15133414',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_617b7a38d3b2d2_37469607',
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'suggest' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_617b7a38d3b2d2_37469607')) {function content_617b7a38d3b2d2_37469607($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tungla/code/vina/web/web_erp/library/smarty/plugins/modifier.date_format.php';
?><section class="detail-news">
    <div class="wrap-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="/tin-tuc" title="Tin tức">Tin tức</a></li>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['cat_link']!='') {?>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['data']->value['cat_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['cat_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['cat_name'];?>
</a></li>
                <?php }?>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="/<?php echo $_smarty_tpl->tpl_vars['data']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12 left">
                <div class="detail-content">
                    <div class="detail">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['news_type_id']==1) {?>
                            <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
                            <p class="info">Ngày đăng: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['created_at'],"H:i d/m/Y");?>
</p>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['news_type_id']==2) {?>
                            <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
                            <p class="info">Ngày đăng: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['created_at'],"H:i d/m/Y");?>
</p>
                            <div class="galary-album">
                                <ul class="grid effect-2" id="grid">
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" class="fancybox-thumbs" data-fancybox-group="thumb"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
"></a></li>
                                    <?php } ?>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                            <div class="content-product-detail">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Chi tiết Album</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="content">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

                                </div>
                            </div>
                        <?php } else { ?>
                            <iframe class="iframe-detail" width="100%" height="350" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['data']->value['link'];?>
"
                                title="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1>
                            <p class="info">Ngày đăng: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['created_at'],"H:i d/m/Y");?>
</p>
                            <div class="content-product-detail">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Chi tiết Video</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="content">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 right">
                <section class="sidebar-block-right">
                    <ul class="sidebar-content">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['suggest']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <li>
                                <article>
                                    <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" />
                                    </a>
                                    <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                                    </h3>
                                </article>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</section><?php }} ?>
