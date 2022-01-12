<?php /* Smarty version Smarty-3.1.18, created on 2022-01-11 11:29:37
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1591110562615f0448e15741-98433081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c08b2f4d1a47e112141871a1e5172ccdbca7d69d' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/profile.tpl',
      1 => 1641875309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1591110562615f0448e15741-98433081',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615f0448e57ce8_29153090',
  'variables' => 
  array (
    'tpldirect' => 0,
    'rewrite_url' => 0,
    'session' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615f0448e57ce8_29153090')) {function content_615f0448e57ce8_29153090($_smarty_tpl) {?><div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-profile">
                    <h3 class="title-profile">Thông tin tài khoản</h3>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="form-default">
                                <div class="form-action">
                                    <div class="form-group">
                                        <label>Họ và tên <font color="#e5101d">*</font></label>
                                        <input type="text" id="fullname" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại <font color="#e5101d">*</font></label>
                                        <input type="text" id="mobile" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email <font color="#e5101d">*</font></label>
                                        <input type="text" id="email" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính <font color="#e5101d">*</font></label>
                                        <label class="wrap-ace">
                                            <input id="male" name="radio_gt" class="ace form-info" value="1" type="radio">
                                            <span class="lbl active"></span>Nam
                                        </label>
                                        <label class="wrap-ace">
                                            <input id="female" name="radio_gt" class="ace form-info" value="0" type="radio">
                                            <span class="lbl"></span>Nữ
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh <font color="#e5101d">*</font></label>
                                        <input id="birthday" class="form-control form-info" type="text" name="">
                                    </div>
                                    <div class="form-group">
                                        <label>Link giới thiệu mua hàng <font color="#e5101d">*</font> <button class="btn-share" id="btnCopy">Copy link</button></label>
                                        <input type="text" class="form-control form-info" id="link" value="<?php echo $_smarty_tpl->tpl_vars['rewrite_url']->value;?>
san-pham-rf<?php if (isset($_smarty_tpl->tpl_vars['session']->value['username_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['username_client'];?>
<?php }?>" />
                                    </div>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <p class="nomargin"><b><font size="3">THAY ĐỔI MẬT KHẨU</font></b></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input type="text" id="oldPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="text" id="newPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="text" id="confirmPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-key btn-width" id="btn_update_info">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
