<?php /* Smarty version Smarty-3.1.18, created on 2022-01-07 15:45:27
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/cart/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:620766447615edbd74bf0e1-92969069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9550749708e23689deadc607e189dfe314c1b13' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/cart/payment.tpl',
      1 => 1641545099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '620766447615edbd74bf0e1-92969069',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615edbd74f4c52_43339639',
  'variables' => 
  array (
    'session' => 0,
    'opt_city' => 0,
    'domain' => 0,
    'referral_by' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615edbd74f4c52_43339639')) {function content_615edbd74f4c52_43339639($_smarty_tpl) {?><section class="container z2">
    <div class="cart payment cart_payment">
        <div class="wrap-block-title">
            <div class="block-title">
                <h3>Thanh toán</h3>
            </div>
        </div>
        <div class="content">
            <input type="text" class="form-control hide" id="inp_id_shipments" name="inp_id_shipments" value="">
            <div class="content-address <?php if ($_smarty_tpl->tpl_vars['session']->value['fullname_client']=='') {?>hide<?php }?>" id="content_address">
            </div>
            <div class="content-address <?php if ($_smarty_tpl->tpl_vars['session']->value['fullname_client']!='') {?>hide<?php }?>" id="form_content_address">
                <h3>Thông tin giao hàng</h3>
                <p>Bạn hãy điền thông tin bên dưới nhé!
                    <?php if (isset($_smarty_tpl->tpl_vars['session']->value['fullname_client'])&&$_smarty_tpl->tpl_vars['session']->value['fullname_client']!='') {?><span id="backAddressBook"><u
                            class="pointer">Quay lại sổ địa chỉ</u></span><?php }?></p>
                <div class="form-default">
                    <div>
                        <div class="form-group">
                            <label>Họ và tên <font color="#e5101d">*</font></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="45"
                                autocomplete="off" placeholder="Họ và tên">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <!-- <label>Email <font color="#e5101d">*</font></label> -->
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" maxlength="100"
                                autocomplete="off" placeholder="Email">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại <font color="#e5101d">*</font></label>
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="15"
                                autocomplete="off" placeholder="Số điện thoại">
                            <span class="error"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tỉnh / thành phố <font color="#e5101d">*</font></label>
                                    <select class="form-control" id="province" name="province"
                                        onchange="loadDistrict()">
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
                            <input type="text" class="form-control" id="street" name="street" maxlength="100"
                                autocomplete="off" value="" placeholder="Tên đường, số nhà">
                            <span class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="btn btn-key btn-width" type="submit" id="btn_shipments_form" name="btn_shipments">
                        Hình thức giao hàng</div>
                </div>
            </div>
            <div class="content-payment">
                <p class="title"><i class="fa fa-cube" aria-hidden="true"></i> Sản phẩm</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th>Đơn giá</th>
                                <th class="text-right">Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody id="lProduct"></tbody>
                    </table>
                </div>
            </div>
            <div class="content-payment">
                <p class="title"><i class="fa fa-bank" aria-hidden="true"></i> Hình thức thanh toán</p>
                <ul class="">
                    
                    <li data-class="cod" class="cod active">Thanh toán khi nhận hàng</li>
                </ul>
                <div class="form form-bank">
                    <ul>
                        <li data-bank="vietcombank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/vietcombank.png" alt="#" /></li>
                        <li data-bank="viettinbank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/viettinbank.png" alt="#" /></li>
                        <li data-bank="techcombank"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/techcombank.png" alt="#" /></li>
                    </ul>
                </div>
                <div class="form-detail form-bank-vietcombank">
                    <p><b>Ngân hàng: </b>Techcombank</p>
                    <p><b>Số tài khoản: </b>19033743209016</p>
                    <p><b>Họ & tên: </b>Nguyễn Thành Tân</p>
                    <p><b>Chi nhánh: </b>Tân Sơn Nhất</p>
                </div>
                <div class="form-detail form-bank-viettinbank">
                    <p><b>Ngân hàng: </b>Vietcombank</p>
                    <p><b>Số tài khoản: </b>0251002717858</p>
                    <p><b>Họ & tên: </b>Nguyễn Thành Tân</p>
                    <p><b>Chi nhánh: </b>Bình Tân</p>
                </div>
                <div class="form-detail form-bank-techcombank">
                    <p><b>Ngân hàng: </b>Viettinbank</p>
                    <p><b>Số tài khoản: </b>0881000468479</p>
                    <p><b>Họ & tên: </b>Nguyễn Thành Tân</p>
                    <p><b>Chi nhánh: </b>Gia Định</p>
                </div>
                <div class="total-payment">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="show">Ghi chú</label>
                            <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ul id="total_payment"></ul>
                        <input type="text" id="payment_cod" class="hide" value="">
                        <div class="clear"></div>
                        <div class="text-right">
                            <input type='text' id="referral_by" value="<?php echo $_smarty_tpl->tpl_vars['referral_by']->value;?>
" class="hide" />
                            <a class="btn btn-key" id="submitOrder">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalShipments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="shipments_title" class="header-collection">Hình thức giao hàng</h4>
            </div>
            <div class="modal-body noborder padding-bottom-10">
                <div class="table-responsive">
                    <table class="table table-stripped text-center table-bordered">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Đơn vị vận chuyển</th>
                                <th>Dịch vụ giao hàng</th>
                                <th>Giá tiền</th>
                                <th>Dự kiến giao</th>
                            </tr>
                        </thead>
                        <tbody id="list_shipments">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div><?php }} ?>
