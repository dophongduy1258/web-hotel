<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 01:00:26
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/showroom/storing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16952660756153583abb60a4-66194810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f4ce7cf6ec78eede560726974c8b32667979df8' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/showroom/storing.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16952660756153583abb60a4-66194810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_showroom' => 0,
    'lang' => 0,
    'link' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6153583abf7f00_00371769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6153583abf7f00_00371769')) {function content_6153583abf7f00_00371769($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
    <div class="col-sm-3 col-xs-12">
        <h4>Tổng số sản phẩm: <b class="color-red" id="inventory_total_records"></b>
            <h4>
    </div>
    <div class="col-sm-3 col-xs-12">
        
    </div>
</div>

<div class="search-order" style="padding: 0px;margin-bottom: 5px;margin-top: 0px;">
    <div class="row">
        <div class="col-sm-3 col-xs-12">
            <div class="col-sm-12 col-xs-12 relative">
                <select id="inventory_showroom_id" class="form-control">
                    <?php echo $_smarty_tpl->tpl_vars['opt_showroom']->value;?>

                </select>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <div class="col-sm-12 col-xs-12 relative">
                <input id="inventory_searching" type="text" name="" placeholder="Tìm theo tên sản phẩm"
                    class="ng-pristine ng-untouched ng-valid ng-empty" style="padding: 6px 12px;">
                <button id="inventory_btn_view" class="btn btn-primary"
                    style="position: absolute;right: 8px;z-index: 111;top: 4px;border-radius: 0px 4px 4px 0px;"><span
                        class="glyphicon glyphicon-eye-open" style="top: 2px;"></span>
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_view'];?>

                    <!--Xem-->
                </button>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <h4>Giỏ hàng có: <button id="product_detail_cart" title="Xem giỏ hàng" class="btn btn-danger"
                style="background: none;border: none;box-shadow: none;color: #000;font-size: 18px;padding: 0px;"><i
                    class="glyphicon glyphicon-shopping-cart"></i><span
                    style="position: relative;top: -3px;left: 3px;">(<b class="color-red"
                        id="product_cart_count"></b>)</span></button>
            <h4>
        </div>
        <div class="col-sm-2 col-xs-12">
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=showroom&act=export_order">Đơn đã xuất</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered table-bg">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="10%">Ảnh</th>
                <th width="">Tên sản phẩm</th>
                <th width="">SKU</th>
                <th width="">Giá</th>
                <th width="">Đơn vị</th>
                <th width="">Tổng nhập</th>
                <th width="">Chờ giao</th>
                <th width="">Đang giao</th>
                <th width="">Hoàn thành</th>
                <th width="">Tồn kho</th>
                <th width="">@</th>
            </tr>
        </thead>
        <tbody id="inventory_list">
        </tbody>
    </table>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
    <div class="paging L" id="inventory_page_html">
    </div>
</div>

<!--BEGIN Modal detail cart-->
<div class="modal fade" id="modal_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-medium">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="md_shop_title" class="header-collection">Giỏ hàng</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <div class="table-responsive">
                    <table class="table table-stripped text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th width="20%">Số lượng</th>
                                <th width="10%">Giá</th>
                                <th width="10%">Tổng</th>
                                <th width="15%">@</th>
                            </tr>
                        </thead>
                        <tbody id="product_cart_list">
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    <div>
                                        <img style="width:60px;"
                                            src="https://yobe365.ecopos.vn/posretail_yobe365/uploads/yobe365/14.186.41.99-citipos.vn-1595219348354.jpg">
                                        <p class="product-code-sell">AZ21001</p>
                                    </div>
                                </td>
                                <td class="text-left" width="20%">
                                    Mặt nạ Tế bào gốc Yobecell (5 miếng/hộp)
                                </td>
                                <td>
                                    <div class="input-group bootstrap-touchspin"><span
                                            class="input-group-btn"><button
                                                class="btn btn-default bootstrap-touchspin-down"
                                                type="button">-</button></span><span
                                            class="input-group-addon bootstrap-touchspin-prefix"
                                            style="display: none;"></span><input disabled=""
                                            id="cart-quantity-0000618082000008"
                                            class="cart-quantity text-center form-control" type="text" name=""
                                            placeholder="Số lượng" value="5.0000" style="display: block;"><span
                                            class="input-group-addon bootstrap-touchspin-postfix"
                                            style="display: none;"></span><span class="input-group-btn"><button
                                                class="btn btn-default bootstrap-touchspin-up"
                                                type="button">+</button></span></div>
                                </td>
                                <td>
                                    <b class="top-5">0</b>
                                </td>
                                <td>
                                    <b class="top-5">
                                        <p>1,475,000</p>
                                    </b>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button id="cart-edit-btn-0000618082000008"
                                            detail_order_id="0000618082000008" order_id="001200818GKM"
                                            created_at="1597734942" class="btn btn-primary btn-edit-item-cart"><i
                                                class="glyphicon glyphicon-edit"></i></button>
                                        <button detail_order_id="0000618082000008"
                                            class="btn btn-danger btn-delete-item-cart"><i
                                                class="glyphicon glyphicon-remove"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td rowspan="5">ádsd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="product_confirm_checkout" class="btn btn-success btn-width"
                    id="btnPurchase">Xuất hàng</button>
            </div>
        </div>
    </div>
</div>
<!--BEGIN Modal detail cart-->

<!--BEGIN Modal SHIPPING-->
<div class="modal fade" id="modal_shipping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-medium">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="header-collection">Nội dung xuất hàng</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <div class="col-sm-12">
                    <p class="top-5">Ghi chú xuất hàng:</p>
                    <textarea col="4" placeholder="Ghi chú xuất hàng" id="product_ship_note"
                        class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="btnSendCart" class="btn btn-success btn-width">Xuất</button>
            </div>
        </div>
    </div>
</div>
<!--BEGIN Modal SHIPPING-->

<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/showroom_storing.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }} ?>
