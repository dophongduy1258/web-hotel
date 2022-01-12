<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 16:41:36
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/cart/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1914356952615d6f506f69b4-30225550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db5ab7e5c303446e58dfdf076b7cd43b58086457' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/cart/index.tpl',
      1 => 1633361905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1914356952615d6f506f69b4-30225550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d6f50712b48_25333633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d6f50712b48_25333633')) {function content_615d6f50712b48_25333633($_smarty_tpl) {?><section class="container">
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
