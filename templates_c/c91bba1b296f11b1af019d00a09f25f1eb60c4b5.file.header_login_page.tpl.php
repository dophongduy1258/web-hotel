<?php /* Smarty version Smarty-3.1.18, created on 2021-08-25 13:18:44
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/header_login_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5947501436110b9db609292-80815478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91bba1b296f11b1af019d00a09f25f1eb60c4b5' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/header_login_page.tpl',
      1 => 1628747002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5947501436110b9db609292-80815478',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6110b9db6249c4_67841737',
  'variables' => 
  array (
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6110b9db6249c4_67841737')) {function content_6110b9db6249c4_67841737($_smarty_tpl) {?><section class="head-new">
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
