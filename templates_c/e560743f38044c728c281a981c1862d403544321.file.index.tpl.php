<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:58:45
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/cart/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1433392202615edbd649df44-05205198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e560743f38044c728c281a981c1862d403544321' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/cart/index.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1433392202615edbd649df44-05205198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615edbd64c7e26_52768245',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615edbd64c7e26_52768245')) {function content_615edbd64c7e26_52768245($_smarty_tpl) {?><section class="container z2">
    <div class="cart order cart_checkout">
        <div class="wrap-block-title">
            <div class="block-title">
                <h3>Thông tin đơn hàng</h3>
            </div>
        </div>
        <div class="white-box">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="right">
                        <h3>Giỏ hàng</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="lProduct"></tbody>
                            </table>
                        </div>
                        <a href="/san-pham" title="" class="cart-change">Tiếp tục xem sản phẩm</a>
                    </div>
                    <div class="text-right">
                        <!-- <button class="btn" type="submit" name="continue">Mua hàng ngay</button> -->
                        <a href="#" class="btn btn-key btn-width" type="submit" id="submitOrder" name="continue">Mua hàng</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section><?php }} ?>
