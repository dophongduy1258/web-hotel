<?php /* Smarty version Smarty-3.1.18, created on 2021-11-09 16:10:39
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/wallet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1592455700617f97fe384898-39035144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5d71bc7e85b3ded8a8326809c995883b7e1e2f0' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/wallet.tpl',
      1 => 1636449027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1592455700617f97fe384898-39035144',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_617f97fe3ac7d3_68856200',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lWallet' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_617f97fe3ac7d3_68856200')) {function content_617f97fe3ac7d3_68856200($_smarty_tpl) {?><div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-paymentcard">
                    <h3 class="title-profile">Quản lý ví điểm</h3>
                    <div class="box-wallet">
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Số ví</h2>
                                <div class="body">
                                    <b class="color-key"><?php echo count($_smarty_tpl->tpl_vars['lWallet']->value);?>
</b>
                                </div>
                            </div>
                        </div>
                        <?php if (count($_smarty_tpl->tpl_vars['lWallet']->value)>0) {?>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lWallet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <div class="box col-md-4 col-sm-6 col-xs-6">
                                    <div class="inner">
                                        <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_name'];?>
</h2>
                                        <div class="body">
                                            <b class="color-blue"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['amount'],"0",".",",");?>
</b>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }?>
                    </div>
                    <div class="top5">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <select id="wallet_id" class="form-control">
                                    <option value="">Tất cả loại ví</option>
                                    <?php if (count($_smarty_tpl->tpl_vars['lWallet']->value)>0) {?>
                                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lWallet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_name'];?>
</option>
                                        <?php } ?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <div class="relative">
                                    <input id="wallet_keyword" type="text" name="" placeholder="Người nhận/ chuyển"
                                        class="form-control">
                                    <button id="wallet_btn_view" class="btn btn-form"><span
                                            class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
                                        <!--Xem-->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">ID</th>
                                        <th>Ngày giao dịch</th>
                                        <th>Ví</th>
                                        <th>Họ &amp; Tên</th>
                                        <th>SĐT</th>
                                        <th class="text-right">Giá trị</th>
                                        <th>Nội dung</th>
                                    </tr>
                                </thead>
                                <tbody id="wallet_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <nav class="text-center">
                    <div id="hd_page_html">
                        <div id="page_html">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div><?php }} ?>
