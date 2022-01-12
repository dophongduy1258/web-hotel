<?php /* Smarty version Smarty-3.1.18, created on 2021-10-18 01:01:51
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:426366282616537b194ad39-08998332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cd56e4e4bed1810a16dc4e330ccd6f9866a5c7d' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/order.tpl',
      1 => 1634493697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '426366282616537b194ad39-08998332',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_616537b19861d7_44150054',
  'variables' => 
  array (
    'tpldirect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_616537b19861d7_44150054')) {function content_616537b19861d7_44150054($_smarty_tpl) {?><div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-order" id="formOrder">
                    <h3 class="title-profile" id="totalRecordOrder"></h3>
                    <div class="info-order-detail" id='lOrder'>
                        <ul class="title">
                            <li class="img">Hình ảnh</li>
                            <li class="code">Mã ĐH</li>
                            <li class="date">Ngày mua</li>
                            <li class="price">Tổng tiền</li>
                            <li class="status">Trạng thái</li>
                        </ul>
                    </div>
                    
                </div>
                <div class="item info-order" id="formDetail" style="display: none;">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <h3 class="title-profile" id="orderID"></h3>
                    <div class="info-order-detail" id='lProduct'>
                        <ul class="title">
                            <li class="img">Hình ảnh</li>
                            <li class="content">Tên sản phẩm</li>
                            <li class="price">Giá</li>
                            <li class="date">Ngày mua</li>
                            <li class="code">Mã ĐH</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div><?php }} ?>
