<?php /* Smarty version Smarty-3.1.18, created on 2022-01-12 09:30:36
         compiled from "H:\php\hotel\web\web_erp\templates\cart\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2517761de3d4cc406e4-33002796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c217b933faa09a8a4d9ce4e6ba8a69a404e247' => 
    array (
      0 => 'H:\\php\\hotel\\web\\web_erp\\templates\\cart\\index.tpl',
      1 => 1641545056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2517761de3d4cc406e4-33002796',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61de3d4ce04312_74626400',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61de3d4ce04312_74626400')) {function content_61de3d4ce04312_74626400($_smarty_tpl) {?><section class="container z2">
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
