<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 13:47:41
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:789833930616c770da5edd4-29869663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a7ff2bad9ed419acbdaeaf36fc4b78ffe70349' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/address.tpl',
      1 => 1641527190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '789833930616c770da5edd4-29869663',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_616c770da91362_60283733',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_city' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_616c770da91362_60283733')) {function content_616c770da91362_60283733($_smarty_tpl) {?><div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-address">
                    <h3 class="title-profile">Sổ địa chỉ</h3>
                    <div class="add-address"><a><i class="fa fa-plus" aria-hidden="true"></i> Thêm địa chỉ mới</a></div>
                    <div class="form-add-address form-default" id="form-add-address">
                        <div class="">
                            <input type="text" class="form-control hide" id="id" name="id" value="">
                            <div class="form-group">
                                <label>Họ và tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" maxlength="45"
                                    autocomplete="off" placeholder="Họ và tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="15" autocomplete="off"
                                    placeholder="Số điện thoại">
                                <span class="error"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tỉnh / thành phố <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="province" name="province" onchange="loadDistrict()">
                                            <option value="" selected>Tất cả tỉnh/ thành</option>
                                            <?php echo $_smarty_tpl->tpl_vars['opt_city']->value;?>

                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 nopadding">
                                    <div class="form-group">
                                        <label>Quận / huyện <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="district" name="district" onchange="loadWard()">
                                            <option value="" selected>Chọn quận/ huyện</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Phường / xã <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="ward" name="ward">
                                            <option value="" selected>Chọn xã/ phường</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tên đường, số nhà <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="street" name="street" maxlength="100" autocomplete="off"
                                    value="" placeholder="Tên đường, số nhà">
                                <span class="error"></span>
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="is_default" value="1" name="default">
                                <span></span> Đặt làm mặc định
                            </label>
                            <div class="form-group">
                                <button class="btn btn-width btn-key" id="submitAddress" type="submit" name="continue">Thêm địa
                                    chỉ</button>
                            </div>
                        </div>
                    </div>
                    <ul id="lAddress"></ul>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
