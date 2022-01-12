<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 14:27:08
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:779257249610ed4b810a283-71820324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5d9b7fd31e94c017abe6b824d18cf14ee2c72fa' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/header.tpl',
      1 => 1632641226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '779257249610ed4b810a283-71820324',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ed4b84fb893_40218351',
  'variables' => 
  array (
    'link' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'session' => 0,
    'str_permission' => 0,
    'm' => 0,
    'act' => 0,
    'lShops' => 0,
    'item' => 0,
    'lang' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ed4b84fb893_40218351')) {function content_610ed4b84fb893_40218351($_smarty_tpl) {?><section class="head-new">
    <div class="container">
        <div class="logo-news">
            <div class="icon-menu-pc">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=index">
                <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['url_logo'])&&$_smarty_tpl->tpl_vars['setup']->value['url_logo']!='') {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['setup']->value['url_logo'];?>
" alt="" class="" />
                <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/ecoposlogo.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="" class="" />
                <?php }?>
            </a>
        </div>
        <ul class="nav-admin">
            <li role="presentation" class="dropdown">
                <a href="#" class="dropdown-toggle profile-pic" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/user_profile.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="user-img" width="36"
                        class="img-circle">
                    <span><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname'];?>
</span>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu sub-menu">
                    <li class="change_password_user"><a href="javascript:;"><img
                                src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/change_pw.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Thay đổi mật khẩu</a>
                    </li>
                    <?php if (isset($_smarty_tpl->tpl_vars['session']->value['gid'])&&$_smarty_tpl->tpl_vars['session']->value['gid']==0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=config"><img
                                    src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/setting.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Cài đặt hệ thống</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=config_web"><img
                                    src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/setting.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Cài đặt cho web</a></li>
                        
                    <?php }?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/logout.php"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/logout.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Thoát</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="toolbar-new">
            <ul>
                <li><a><i class="fa fa-paint-brush"></i> <span>Chủ đề</span></a></li>
                <li><a><i class="fa fa-comments-o" aria-hidden="true"></i> <span>Hỗ trợ</span></a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=pos"><i class="fa fa-cog" aria-hidden="true"></i> <span>Thiết
                            lập</span></a></li>
            </ul>
        </div>
    </div>
</section>

<section class="menu-new">
    <div class="container">
        <div class="logo-mobile">
            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/ecoposlogo.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="" class="" />
            <div class="back-menu"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
        </div>
        <ul class="menu1">

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorshop:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorpayment:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':showroomindex:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':themelist:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':themecategory:'))!==false) {?>
            <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorshop'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorpayment'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='showroomindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='themecategory'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='themelist') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title="" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=index"><i class="fa fa-dashboard" aria-hidden="true"></i>
                    Tổng quan</a>
                <ul class="sub" style="right: auto;">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorshop:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shop" title="Chi nhánh"><i
                                    class="icon-cate icon-other-store3" aria-hidden="true"></i> Chi nhánh</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':showroomindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=showroom&act=index" title="Showroom"><i class="icon-cate icon-other-store3"
                                    aria-hidden="true"></i> Showroom</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorpayment:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=payment" title="Hình thức thanh toán"><i
                                    class="glyphicon glyphicon-usd" aria-hidden="true"></i> Hình thức thanh toán</a></li>
                    <?php }?>

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=theme&act=category" title="Tin tức">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>QL Danh mục giao
                                    diện KH</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=theme&act=slide" title="Tin tức">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>QL Slide giao
                                    diện KH</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=theme&act=product" title="Tin tức">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>QL Sản phẩm giao
                                    diện KH</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=theme&act=block" title="Quản lý block giao diện"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Quản lý Block giao diện KH</a>
                            </li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=theme&act=list" title="Quản lý giao diện"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Quản lý giao diện KH</a>
                            </li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=setting&act=home" title="Cài đặt trang chủ"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Cài đặt trang chủ</a>
                            </li>


                            <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=lottery&act=config" title="Cài đặt xổ số may mắn"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Cài đặt xổ số may mắn</a>
                            </li>
                            <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=lottery&act=number" title="Lịch sử phát số may mắn"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Lịch sử phát số may mắn</a>
                            </li>
                            <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=lottery&act=result" title="Kết quả giải thưởng"><i class="fa fa-th-list"
                                        aria-hidden="true"></i>Kết quả giải thưởng</a>
                            </li>
                            
                </ul>
            </li>
            <?php } else { ?>
            <li>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title=""><i class=""
                        aria-hidden="true"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorindex:mainretail:supervisoron_shop:'))!==false) {?>
                <li>
                    <span class="menu-minus">-</span>
                    <span class="menu-plus">+</span>
                    <a title="POS bán hàng"><i class="fa fa-desktop" aria-hidden="true"></i> POS</a>
                    <ul class="sub" style="right: auto;">
                        <?php if (COUNT($_smarty_tpl->tpl_vars['lShops']->value)==1) {?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=on_shop&shop_id=<?php echo $_smarty_tpl->tpl_vars['lShops']->value[0]['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['lShops']->value[0]['name'];?>
"><i
                                        class="fa fa-barcode" aria-hidden="true"></i><?php echo $_smarty_tpl->tpl_vars['lShops']->value[0]['name'];?>
</a></li>
                        <?php } else { ?>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=on_shop&shop_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><i
                                            class="fa fa-barcode" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                            <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']<1||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,'supervisorshop:'))!==false) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shop" title="Thêm mới cửa hàng"><i
                                                class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i> Thêm mới cửa hàng</a></li>
                                <?php } else { ?>
                                    <li><a>Liên hệ Admin để thêm cửa hàng</a></li>
                                <?php }?>
                            <?php } ?>
                        <?php }?>
                    </ul>
                </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcategory:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productpost:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productindex:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantstoring:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':inventoryindex:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productprice:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantstock:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productqrcode:'))!==false) {?>
            <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorcategory'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='inventoryindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='productpost'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='productindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantstoring'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='productqrcode'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='productprice'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantstock') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title="Sản phẩm hàng hóa"><i class="fa fa-cubes" aria-hidden="true"></i> Hàng hóa</a>
                <ul class="sub">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcategory:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category" title="Tạo/ chỉnh sửa sản phẩm hàng hóa"><i
                                    class="fa fa-cube" aria-hidden="true"></i> Tạo/ chỉnh sửa hàng hóa</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productpost:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=post" title="Tạo/ chỉnh sửa sản phẩm hàng hóa"><i
                                    class="fa fa-cube" aria-hidden="true"></i> Bài viết mẫu</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productbrand:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=brand" title="Quản lý thương hiệu sản phẩm"><i
                                    class="fa fa-cube" aria-hidden="true"></i> Thương hiệu sản phẩm</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productqrcode:'))!==false) {?>

                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=product&act=qrcode" title="Phát hành QR-BARCODE"><i
                                    class="fa fa-cube" aria-hidden="true"></i> Phát hành QR-BARCODE</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantstoring:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=storing" title=""><i class="fa fa-square"
                                    aria-hidden="true"></i> Xuất nhập kho</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantstock:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=stock" title=""><i class="fa fa-archive"
                                    aria-hidden="true"></i> Lịch sử nhập/ xuất một sản phẩm</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=product&act=commission" title=""><i class="fa fa-delicious"
                                    aria-hidden="true"></i>
                                Cài đặt chiết khấu sản phẩm</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=product&act=index" title=""><i class="fa fa-star" aria-hidden="true"></i>
                                Chiết khấu theo khách hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':productprice:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=product&act=price" title=""><i class="fa fa-money" aria-hidden="true"></i>
                                Cài đặt giá cho nhóm khách hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':inventoryindex:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=inventory&act=index" title=""><i class="glyphicon glyphicon-filter"
                                    aria-hidden="true"></i> Kiểm kho</a></li>
                    <?php }?>

                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantbills:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantorder:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantmanage_order:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank_transaction:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank_change:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendtransaction_history:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendpackage:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorshifts_history:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersinternal_ordering:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportdeleted_order:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersorder:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersorder_lstream:'))!==false) {?>
            <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantbills'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantorder'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantmanage_order'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='extendbank'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='extendbank_transaction'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='extendbank_change'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='extendtransaction_history'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='extendpackage'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorshifts_history'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='membersinternal_ordering'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reportdeleted_order'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='membersorder'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='membersorder_lstream'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='contractindex') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title=""><i class="fa fa-exchange" aria-hidden="true"></i> Giao dịch</a>
                <ul class="sub">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantbills:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=bills" title="Lịch sử đơn hàng"><i
                                    class="icon-cate icon-other-map" aria-hidden="true"></i> Lịch sử đơn hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorshifts_history:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=shifts_history" title=""><i
                                    class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> Lịch sử giao ca</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantorder:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=order" title=""><i
                                    class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> Đơn hàng liên thông POS</a>
                        </li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantmanage_order:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=manage_order" title=""><i class="fa fa-list-ol"
                                    aria-hidden="true"></i> QL đơn đặt hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':showroomorder:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=showroom&act=order" title=""><i class="fa fa-list-ol"
                                    aria-hidden="true"></i>
                                QL đơn hàng khách hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersorder:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=order" title=""><i class="fa fa-list-ol"
                                    aria-hidden="true"></i>
                                QL đơn hàng ứng dụng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersorder_lstream:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=order_lstream" title=""><i class="fa fa-list-ol"
                                    aria-hidden="true"></i>Nhập đơn hàng live stream</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':membersinternal_ordering:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=internal_ordering" title=""><i
                                    class="fa fa-list-ol" aria-hidden="true"></i> Giám sát đơn hàng nội bộ NPP</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=bank" title=""><i class="fa fa-bank" aria-hidden="true"></i> Danh
                                sách ngân hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank_change:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=bank_change" title=""><i class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></i> Số dư ngân hàng thay đổi</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':extendbank_transaction:'))!==false) {?>
                        <li class="" class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=extend&act=bank_transaction" title=""><i
                                    class="fa fa-exchange" aria-hidden="true"></i> Lệnh nạp/ rút điểm</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportdeleted_order:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=deleted_order" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Lịch sử xóa đơn hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':contractindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=contract&act=index" title=""><i class="fa fa-star" aria-hidden="true"></i>
                                Hợp đồng cho thuê</a></li>
                    <?php }?>

                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantsupplier:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':memberslist:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':trainingindex:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':traininguser:'))!==false) {?>
            <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantsupplier'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='memberslist'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='trainingindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='traininguser') {?>class="active" <?php }?>>

                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title=""><i class="fa fa-user" aria-hidden="true"></i> Đối tác</a>
                <ul class="sub">
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantsupplier:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=accountant&act=supplier" title=""><i class="icon-cate icon-other-store4"
                                    aria-hidden="true"></i>Nhà cung cấp</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':memberslist:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=list" title=""><i class="icon-cate icon-other-group"
                                    aria-hidden="true"></i>Khách hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':memberslogs:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=logs" title=""><i class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></i>Nhật ký chăm sóc khách hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':trainingindex:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=training&act=index" title=""><i
                                    class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>Hệ thống chứng chỉ</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':traininguser:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=training&act=user" title=""><i class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></i>Chứng chỉ của khách hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':memberstitle:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=members&act=title" title=""><i class="glyphicon glyphicon-list-alt"
                                    aria-hidden="true"></i>Chức danh khách hàng</a></li>
                    <?php }?>
                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisoruser:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorlog:'))!==false) {?>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisoruser'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorcalendar'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='supervisorlog') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=user" title="Nhân viên"><i class="fa fa-users"
                        aria-hidden="true"></i> Nhân viên</a>
                <ul class="sub">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorcalendar:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=user" title=""><i class="fa fa-users"
                                    aria-hidden="true"></i>Nhân viên</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=calendar" title=""><i class="fa fa-calendar"
                                    aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['tt_calendar'];?>
</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisorlog:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=log" title=""><i class="glyphicon glyphicon-tasks"
                                    aria-hidden="true"></i> Nhật ký</a></li>
                    <?php }?>

                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='treasurerindex') {?>class="active" <?php }?>>
                    <span class="menu-minus">-</span>
                    <span class="menu-plus">+</span>
                    <a title=""><i class="fa fa-bank" aria-hidden="true"></i> Sổ quỹ</a>
                    <ul class="sub">

                        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=treasurer&act=index" title="Sổ quỹ"><i class="fa fa-bank"
                                        aria-hidden="true"></i> Sổ quỹ</a></li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=treasurer&act=setting" title="Tạo lý do thu/ chi"><i class="fa fa-bank"
                                        aria-hidden="true"></i> Tạo lý do thu/ chi</a></li>
                        <?php }?>

                    </ul>
                </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletindex:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletcashback:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallettransaction:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletclient:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletmember:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletvoucher:'))!==false) {?>
            <li class="" <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='walletindex'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='walletcashback'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='wallettransaction'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='walletclient'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='walletmember'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='walletvoucher') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title=""><i class="fa fa-bank" aria-hidden="true"></i> Ví</a>
                <ul class="sub">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=index" title="Ví"><i class="fa fa-bank" aria-hidden="true"></i>
                                Danh sách ví</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':wallettransaction:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=transaction" title="Giao dịch các ví"><i class="fa fa-bank"
                                    aria-hidden="true"></i> Giao dịch các ví</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletclient:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=client" title="Giao dịch các ví theo cá nhân"><i class="fa fa-bank"
                                    aria-hidden="true"></i> Giao dịch theo cá nhân</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletmember:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=member" title="Tài khoản ví khách hàng"><i class="fa fa-bank"
                                    aria-hidden="true"></i> Tài khoản ví khách hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletcashback:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=cashback" title="Ví"><i class="fa fa-bank"
                                    aria-hidden="true"></i>
                                Cài đặt tích điểm khách hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':walletvoucher:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=wallet&act=voucher" title="Ví"><i class="fa fa-bank" aria-hidden="true"></i>
                                Cài đặt gói điểm Voucher</a></li>
                    <?php }?>

                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantreport:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissioncoaching:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportstoring:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissionbocom:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportgroup_product:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportdetail_product:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reporttop:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportorder_list:'))!==false) {?>
            <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='accountantreport'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='commissioncoaching'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reportstoring'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='commissionbocom'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reportgroup_product'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reportdetail_product'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reporttop'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='voucher'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='showroomstoring'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='reportorder_list') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title="Hệ thống báo cáo"><i class="fa fa-line-chart" aria-hidden="true"></i> Báo cáo</a>
                <ul class="sub">
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':accountantreport:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=accountant&act=report" title=""><i class="fa fa-line-chart"
                                    aria-hidden="true"></i> Báo cáo</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissioncoaching:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=commission&act=coaching" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Hoa hồng huấn luyện</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissioncoaching:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=commission&act=department" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Hoa hồng phòng ban</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportgroup_product:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=group_product" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Doanh số theo kho hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportgroup_product:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=warehouse_borrowed" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Báo cáo kho hàng mượn</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportdetail_product:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=detail_product" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Báo cáo thống kê xuất hàng</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportgp_department:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=gp_department" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> DS nhóm chiết khấu & phòng ban</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportstoring:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=storing" title=""><i class="fa fa-star" aria-hidden="true"></i>
                                Báo cáo nhập kho</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':showroomstoring:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=showroom&act=storing" title=""><i class="fa fa-star" aria-hidden="true"></i>
                                BC tồn kho Showroom</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissionbocom:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=commission&act=bocom" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i>
                                Báo cáo hoa hồng BO</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reporttop:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=top" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i> Top
                                hàng bán chạy</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportvoucher:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=voucher" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i>
                                Báo cáo danh sách voucher</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportvoucher:'))!==false) {?>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=dlc&act=revenue" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i>
                                Doanh số cá nhân</a></li>
                        <li class="hide"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=dlc&act=week" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i>
                                Doanh số chia sẻ</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':commissionbocom:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=product_debt" title=""><i class="fa fa-star"
                                    aria-hidden="true"></i>Báo cáo hàng nợ thành viên</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':reportorder_list:'))!==false) {?>
                        <li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?m=report&act=order_list" title=""><i
                                    class="glyphicon glyphicon-filter" aria-hidden="true"></i> Danh sách đơn hàng</a></li>
                    <?php }?>
                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':newsconfig:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':newscategory:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':newsnews:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':managerinfo:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':managerfooter:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':managercontact:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':managercontact_list:'))!==false||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':managerslide:'))!==false) {?>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='newsconfig'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='newscategory'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='newsnews'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='managerinfo'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='managerfooter'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='managercontact'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='managercontact_list'||((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='managerslide') {?>class="active" <?php }?>>
                <span class="menu-minus">-</span>
                <span class="menu-plus">+</span>
                <a title=""><i class="fa fa-globe" aria-hidden="true"></i> Website</a>
                <ul class="sub">

                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=news&act=news" title="Tin tức"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Tin tức</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=news&act=category" title="Danh mục"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Danh mục</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=news&act=config" title="Cài đặt"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Cài đặt</a></li>
                    <?php }?>


                    <!--Danh cho menu quản lý web-->
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=manager&act=info" title="Thông tin giới thiệu"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Thông tin giới thiệu</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=manager&act=footer" title="Thông tin footer"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Thông tin footer</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=manager&act=contact" title="Thông tin liên hệ"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Thông tin liên hệ</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=manager&act=contact_list" title="Danh sách liên hệ"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Danh sách liên hệ</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':treasurerindex:'))!==false) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=manager&act=menu" title="Danh sách menu"><i class="fa fa-globe"
                                    aria-hidden="true"></i> Danh sách menu</a></li>
                    <?php }?>
                    
                </ul>
            </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':creditcredit:'))!==false) {?>
                

                    
                    
                    
                
            <?php }?>

        </ul>
    </div>
</section>
<div class="overlay-menu-new"></div>


<script>
    $('body').on('click', '.icon-menu-pc', function() {
        $('.menu-new').toggleClass('active');
        $('.overlay-menu-new').toggle();
    });
    $('body').on('click', '.overlay-menu-new', function() {
        $('.menu-new').toggleClass('active');
        $('.overlay-menu-new').toggle();
    });
    $('body').on('click', '.back-menu', function() {
        $('.menu-new').toggleClass('active');
        $('.overlay-menu-new').toggle();
    });
    $('body').on('click', '.menu-minus', function() {
        $(this).parents('li').find('.sub').slideToggle();
        $('.menu-new ul.menu1>li').removeClass('active');
        $('.menu-minus').removeClass('active');
        $(this).parents('li').addClass('active');
        $(this).removeClass('active');
        $(this).parents('li').find('.menu-plus').addClass('active');
    });
    $('body').on('click', '.menu-plus', function() {
        $(this).parents('li').find('.sub').slideToggle();
        $('.menu-new ul.menu1>li').removeClass('active');
        $('.menu-minus').removeClass('active');
        $(this).parents('li').addClass('active');
        $(this).removeClass('active');
        $(this).parents('li').find('.menu-minus').addClass('active');
    });
    $(window).load(function() {
        var screenHeight = $(this).height() - 61;
        if (screenHeight < 768) {
            $('.menu-new ul.menu1').css('height', screenHeight);
        }
    });
    $(window).resize(function() {
        var screenHeight = $(this).height() - 61;
        if (screenHeight < 768) {
            $('.menu-new ul.menu1').css('height', screenHeight);
        }
    });
</script>


<div class="container">
    <h2 class="title-page"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
</div><?php }} ?>
