<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 17:20:15
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:498984170615d785fa065b2-49082363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '860a4485f9d169e7ff57acfe8613bda0d8adc73f' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/user/profile.tpl',
      1 => 1633357719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '498984170615d785fa065b2-49082363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'rewrite_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d785fa39b16_93361768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d785fa39b16_93361768')) {function content_615d785fa39b16_93361768($_smarty_tpl) {?><div class="profile">
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
                                <form class="form-action">
                                    <div class="form-group">
                                        <label>Họ và tên <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="<?php if (isset($_smarty_tpl->tpl_vars['session']->value['fullname_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['fullname_client'];?>
<?php }?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="<?php if (isset($_smarty_tpl->tpl_vars['session']->value['mobile_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['mobile_client'];?>
<?php }?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="<?php if (isset($_smarty_tpl->tpl_vars['session']->value['email_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['email_client'];?>
<?php }?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Ngày sinh <font color="#e5101d">*</font></label>
                                        <input type="date" class="form-control"
                                            value="<?php if (isset($_smarty_tpl->tpl_vars['session']->value['birthday_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['birthday_client'];?>
<?php } else { ?><?php }?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Link giới thiệu mua hàng <font color="#e5101d">*</font> <button class="btn-share" id="btnCopy">Copy link</button></label>
                                        <input type="text" class="form-control" id="link" value="<?php echo $_smarty_tpl->tpl_vars['rewrite_url']->value;?>
san-pham-<?php if (isset($_smarty_tpl->tpl_vars['session']->value['username_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['username_client'];?>
<?php }?>" />
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
