<?php /* Smarty version Smarty-3.1.18, created on 2021-09-30 22:01:12
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/header_login_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1418086391615475d0e77aa2-70875935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a5c8bcf8068e204d3abe566dddd8891bbf60f51' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/header_login_page.tpl',
      1 => 1633014049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1418086391615475d0e77aa2-70875935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475d0e849c4_42610871',
  'variables' => 
  array (
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475d0e849c4_42610871')) {function content_615475d0e849c4_42610871($_smarty_tpl) {?><section class="head-new">
    <div class="container">
        <div class="logo-news">
            <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['url_logo'])&&$_smarty_tpl->tpl_vars['setup']->value['url_logo']!='') {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['setup']->value['url_logo'];?>
" alt="" class="" />
            <?php } else { ?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/ecoposlogo.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="" class="" />
            <?php }?>
        </div>
    </div>
</section>

<section class="menu-new">
    <div class="container">
        <div class="col-sm-12 text-center color-white">
            <h4><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h4>
        </div>
    </div>
</section><?php }} ?>
