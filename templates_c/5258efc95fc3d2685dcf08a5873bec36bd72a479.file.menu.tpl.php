<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 17:20:15
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312198742615d785fa3dde1-11886521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5258efc95fc3d2685dcf08a5873bec36bd72a479' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/menu.tpl',
      1 => 1633452668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312198742615d785fa3dde1-11886521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'session' => 0,
    'm' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d785fa551e7_85555006',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d785fa551e7_85555006')) {function content_615d785fa551e7_85555006($_smarty_tpl) {?><div class="item">
    <div class="wrap-info">
        <div class="img"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
images/user_profile.png" /></div>
        <div class="info"> Tài khoản của<b><?php if ($_smarty_tpl->tpl_vars['session']->value['fullname_client']!='') {?><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname_client'];?>
<?php }?></b></div>
        <span>Xem thêm</span>
    </div>
    <ul>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userprofile') {?>active<?php }?>"><a href="/thong-tin" title="Thông tin tài khoản"><i class="fa fa-user"></i>Thông tin tài khoản</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userpaymentcard') {?>active<?php }?>"><a href="/thong-tin-thanh-toan" title="Quản lý ngân hàng"><i class="fa fa-credit-card-alt"></i>Quản lý ngân hàng</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='usernotification') {?>active<?php }?>"><a href="/404" title="Thông báo của tôi"><i class="fa fa-bell"></i>Thông báo của tôi</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userorder') {?>active<?php }?>"><a href="/404" title="Quản lý đơn hàng"><i class="fa fa-server"></i>Quản lý đơn hàng</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='useraddress') {?>active<?php }?>"><a href="/404" title="Sổ địa chỉ"><i class="fa fa-map"></i>Sổ địa chỉ</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userwallet') {?>active<?php }?>"><a href="/404" title="Quản lý ví"><i class="fa fa-money"></i>Quản lý ví</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userdepartmental_roses') {?>active<?php }?>"><a href="/404" title="Hoa hồng quản lý phòng ban"><i class="fa fa-server"></i>Hoa hồng quản lý phòng ban</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='userdepartmental_revenue') {?>active<?php }?>"><a href="/404" title="Doanh thu phòng ban"><i class="fa fa-server"></i>Doanh thu phòng ban</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='usertraining_roses') {?>active<?php }?>"><a href="/404" title="Hoa hồng huấn luyện"><i class="fa fa-server"></i>Hoa hồng huấn luyện</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='usermember') {?>active<?php }?>"><a href="/404" title="Quản lý đội nhóm"><i class="fa fa-server"></i>Quản lý đội nhóm</a></li>
        <li class="<?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='usertraining') {?>active<?php }?>"><a href="/404" title="Quản lý chứng chỉ"><i class="fa fa-server"></i>Quản lý chứng chỉ</a></li>

        
    </ul>
</div><?php }} ?>
