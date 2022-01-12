<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:37:26
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/comconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:449610343614f74c9993738-86770086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b61881cfa3682786d044fc2b49daebdb408ec0bb' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/comconfig.tpl',
      1 => 1632598644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '449610343614f74c9993738-86770086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614f74c99946f2_66992968',
  'variables' => 
  array (
    'session' => 0,
    'str_permission' => 0,
    'm' => 0,
    'act' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614f74c99946f2_66992968')) {function content_614f74c99946f2_66992968($_smarty_tpl) {?><ul class="nav nav-tabs nav-storing">


    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productcommission:'))!==false) {?>
    <li class="tab-modify <?php if ($_smarty_tpl->tpl_vars['m']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='commission') {?>active<?php }?>">
        <a title="Giảm giá trực tiếp theo nhóm khách hàng" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=commission">Giảm giá trực tiếp theo nhóm KH</a>
    </li>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productprice:'))!==false) {?>
    <li class="tab-modify <?php if ($_smarty_tpl->tpl_vars['m']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='price') {?>active<?php }?>">
        <a title="Cài giá sản phẩm theo nhóm khách hàng" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=price">Cài giá sản phẩm theo nhóm KH</a>
    </li>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletcashback:'))!==false) {?>
    <li class="tab-modify <?php if ($_smarty_tpl->tpl_vars['m']->value=='wallet'&&$_smarty_tpl->tpl_vars['act']->value=='cashback') {?>active<?php }?>">
        <a title="Cài đặt tích VNĐ/ tích điểm" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=cashback">Tích VNĐ/ tích điểm</a>
    </li>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletpoint:'))!==false) {?>
    <li class="tab-modify <?php if ($_smarty_tpl->tpl_vars['m']->value=='wallet'&&$_smarty_tpl->tpl_vars['act']->value=='point') {?>active<?php }?>">
        <a title="Cài đặt điểm đổi cho kho hàng đổi điểm" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=point">Cài đặt điểm đổi cho kho hàng đổi điểm</a>
    </li>
    <?php }?>

</ul><?php }} ?>
