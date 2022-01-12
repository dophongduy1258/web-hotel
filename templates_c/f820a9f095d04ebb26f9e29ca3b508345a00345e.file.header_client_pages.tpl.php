<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 21:39:15
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/header_client_pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105506492261547a936ed5e0-37098595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f820a9f095d04ebb26f9e29ca3b508345a00345e' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/header_client_pages.tpl',
      1 => 1632925337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105506492261547a936ed5e0-37098595',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'session' => 0,
    'dClientLogin' => 0,
    'dMemberGroup' => 0,
    'm' => 0,
    'act' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61547a93738b65_78551177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61547a93738b65_78551177')) {function content_61547a93738b65_78551177($_smarty_tpl) {?><section class="head-new">
    <div class="container">
        <div class="logo-news">
            <div class="icon-menu-pc">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=<?php if (isset($_smarty_tpl->tpl_vars['setup']->value['is_yobe365'])||$_smarty_tpl->tpl_vars['setup']->value['is_yobe365']==0) {?>dashboard<?php } else { ?>delivery<?php }?>">
            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/dlclogo.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="" class="" />
            </a>
        </div>
        <ul class="nav-admin">
            <li role="presentation" class="dropdown">
                <a href="#" class="dropdown-toggle profile-pic" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/user_profile.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="user-img" width="36" class="img-circle">
                  <span><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname'];?>
</span>
                  <span><?php echo $_smarty_tpl->tpl_vars['dClientLogin']->value['code'];?>
</span>
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu sub-menu">
                    <li ><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['dClientLogin']->value['code'];?>
</a>
                    </li>
                    <li ><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['dClientLogin']->value['mobile'];?>
</a>
                    </li>
                    <li ><a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['dClientLogin']->value['facebook'];?>
</a>
                    </li>
                    <li onclick="change_password_client();"><a href="javascript:;"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/change_pw.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Thay đổi mật khẩu</a>
                    </li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/logout.php"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/logout.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">Thoát</a></li>
                </ul>
            </li>
        </ul>
        <div class="toolbar-new hide">
            <ul>
                <li><a><i class="fa fa-paint-brush"></i> <span>Chủ đề</span></a></li>
                <li><a><i class="fa fa-comments-o" aria-hidden="true"></i> <span>Hỗ trợ</span></a></li>
            </ul>
        </div>
    </div>
</section>

<section class="menu-new">
    <div class="container">
        <div class="logo-mobile">
            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/dlclogo.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" alt="" class="" />
            <div class="back-menu"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
        </div>
        <ul class="menu1">
            <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['is_yobe365'])&&$_smarty_tpl->tpl_vars['setup']->value['is_yobe365']==1) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['dMemberGroup']->value['id'])&&($_smarty_tpl->tpl_vars['dMemberGroup']->value['root_id']==1||$_smarty_tpl->tpl_vars['dMemberGroup']->value['root_id']==15)) {?>
                    
                    <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientwallet') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=wallet" title="Ví & hoa hồng"><i class="fa fa-credit-card" aria-hidden="true"></i> Ví & hoa hồng</a></li>
                    <?php if (isset($_smarty_tpl->tpl_vars['dMemberGroup']->value['id'])&&($_smarty_tpl->tpl_vars['dMemberGroup']->value['id']==$_smarty_tpl->tpl_vars['setup']->value['member_group_id_diem_giao_hang'])) {?>
                        <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientorder') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=order" title="Sản phẩm"><i class="fa fa-cube" aria-hidden="true"></i> Sản phẩm</a></li>
                    <?php }?>
                    <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientdelivery') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=delivery" title="Đơn hàng"><i class="fa fa-list-alt" aria-hidden="true"></i> Đơn hàng</a></li>
                    
                <?php } else { ?>
                
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientwallet') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=wallet" title="Ví & hoa hồng"><i class="fa fa-credit-card" aria-hidden="true"></i> Ví & hoa hồng</a></li>
                
                <?php }?>
            <?php } else { ?>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientprofile') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=profile" title="Thông tin cá nhân"><i class="fa fa-user" aria-hidden="true"></i> Thông tin cá nhân</a></li>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientdashboard') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=dashboard" title="Bảng điều khiển"><i class="fa fa-dashboard" aria-hidden="true"></i> Bảng điều khiển</a></li>
                
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientmember') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=member" title="Đội nhóm"><i class="fa fa-users" aria-hidden="true"></i> Đội nhóm</a></li>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientcommission') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=commission" title="Hoa hồng"><i class="fa fa-credit-card" aria-hidden="true"></i> Hoa hồng</a></li>
                <li <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='clientstatistical') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=client&act=statistical" title="Thống kê"><i class="fa fa-credit-card" aria-hidden="true"></i> Thống kê</a></li>
                
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
    $(window).load(function(){
        var screenHeight = $(this).height() - 61;
        if(screenHeight < 768){
            $('.menu-new ul.menu1').css('height', screenHeight);
        }
    });
    $(window).resize(function(){
        var screenHeight = $(this).height() - 61;
        if(screenHeight < 768){
            $('.menu-new ul.menu1').css('height', screenHeight);
        }
    });
</script>


<div class="container"><h2 class="title-page"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2></div>
<?php }} ?>
