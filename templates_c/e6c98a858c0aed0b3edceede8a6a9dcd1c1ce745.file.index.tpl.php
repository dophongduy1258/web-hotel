<?php /* Smarty version Smarty-3.1.18, created on 2021-11-02 16:32:59
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/news/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:366460576617a6a9dee6d88-07529817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6c98a858c0aed0b3edceede8a6a9dcd1c1ce745' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/news/index.tpl',
      1 => 1635845578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '366460576617a6a9dee6d88-07529817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_617a6a9df21050_93012158',
  'variables' => 
  array (
    'cat' => 0,
    'item' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_617a6a9df21050_93012158')) {function content_617a6a9df21050_93012158($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tungla/code/vina/web/web_erp/library/smarty/plugins/modifier.date_format.php';
?><section class="block-news news">
    <div class="container">
        <?php if (count($_smarty_tpl->tpl_vars['cat']->value)>0) {?>
            <div class="item-cate-product">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li>
                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-cn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                <div class="icon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" width="24" class="h" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
                                </div>
                                <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php }?>
        <div class="block-title">
            <h2 class="title"><a href="" style="pointer-events: none;"
                    title="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['category']['name'];?>
</a></h2>
            <div class="clear"></div>
        </div>
        <div class="block-content">
            <div class="row">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item">
                        <div class="item">
                            <a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" class="img">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>

                            </a>
                            <div class="wrap-info">
                                <h3><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
-dn<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                        title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h3>
                                <div class="time">
                                    <span><i class="fa fa-clock-o"
                                            aria-hidden="true"></i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created_at'],"H:i d/m/Y");?>
</span>
                                    <span><i class="" aria-hidden="true"></i></span>
                                    
                                </div>
                                <div class="info"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_description'];?>
</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="text-center">
                <div id="hd_page_html">
                    <div id="page_html">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['page_html'];?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php }} ?>
