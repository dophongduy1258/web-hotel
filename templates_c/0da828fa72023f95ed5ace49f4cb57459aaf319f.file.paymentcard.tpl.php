<?php /* Smarty version Smarty-3.1.18, created on 2021-10-17 12:13:39
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/paymentcard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2723299906169286ca4a098-80073768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0da828fa72023f95ed5ace49f4cb57459aaf319f' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/paymentcard.tpl',
      1 => 1634291702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2723299906169286ca4a098-80073768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6169286ca857b2_66128489',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lBank' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6169286ca857b2_66128489')) {function content_6169286ca857b2_66128489($_smarty_tpl) {?><div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-paymentcard">
                    <h3 class="title-profile">Quản lý ngân hàng</h3>
                    <div class="add-address" id="add-address"><a id="btn_add_paymentcard"><i class="fa fa-plus" aria-hidden="true"></i> Thêm ngân hàng mới</a></div>
                    <div class="form-add-address form-default" id="form-add-address">
                        <ul class="bankdefault" id="bankdefault">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lBank']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <li onclick="thePage.selectBank(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" data-name=""><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
" alt="#"></li>
                        <?php } ?>
                            
                        </ul>
                        <input type="text" id="bank_id" class="hide">
                        <form action="" method="post">
                            <div class="namebank"></div>
                            <div class="form-group">
                                <label>Họ & tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="fullname" id="fullname" maxlength="45" value="" placeholder="Nhập họ & tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số tài khoản <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="number" id="number" maxlength="45" value="" placeholder="Nhập số tài khoản">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Chi nhánh <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="branch" id="branch" maxlength="45" value="" placeholder="Nhập chi nhánh">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Tỉnh thành <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="city" id="city" maxlength="45" value="" placeholder="Nhập tỉnh thành">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-key" type="submit" id="btn_save_paymentcard">Thêm ngân hàng</button>
                            </div>
                        </form>
                    </div>
                    <ul id="listBankInfo">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
