<?php /* Smarty version Smarty-3.1.18, created on 2021-09-23 14:13:17
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/product_debt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161330194361364dab5ed211-30383140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4f4352969175fa6f52b6eb66d0fe7e9437589df' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/product_debt.tpl',
      1 => 1632156225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161330194361364dab5ed211-30383140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61364dab637586_97065080',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'opt_shop' => 0,
    'opt_year' => 0,
    'lang' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61364dab637586_97065080')) {function content_61364dab637586_97065080($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <ul class="nav nav-tabs nav-storing">

                    <li id="tab_product" class="tab-modify active"><a data-toggle="tab" href="#list_product">Thống kê theo sản phẩm</a>
                    </li>
                    <li id="tab_order" class="tab-modify"><a data-toggle="tab" href="#list_order">Danh sách đơn hàng còn nợ</a></li>
                    </li>
                    <li id="tab_history" class="tab-modify"><a data-toggle="tab" href="#list_history">Lịch sử trả hàng</a></li>
                    </li>

                </ul>

                <div class="tab-content">

                    <div id="list_product" class="tab-pane fade in active">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row search-order extend">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="keyword" placeholder="Tên sản phẩm" type="text" name="">
                                                <img id="" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30"
                                                    class="icon-date">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select id="shop_id" class="form-control sl-warehouse">
                                                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <select id="year" class="form-control sl-warehouse">
                                                    <?php echo $_smarty_tpl->tpl_vars['opt_year']->value;?>

                                                </select>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                <button style="margin-top: 5px;" id="btn_view"
                                                    class="form-control btn btn-primary"> Xem
                                                    <!--Xem-->
                                                </button>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 top-5">
                                                <i id="download_product"
                                                    class="glyphicon glyphicon-download-alt color-green font-size-30"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bg-no product">
                                        <thead>
                                            <tr>
                                                <div class="col-sm-6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="col-sm-6">
                                                        <h4>Tổng số lượng hàng nợ: <span class="color-red"
                                                                id="total_product_debt"></span></h4>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h4>Giá trị hàng nợ: <span class="color-red"
                                                                id="total_price_product_debt"></span></h4>
                                                    </div>
                                                </div>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình</th>
                                                <th>Mã SP</th>
                                                <th class="text-left">Tên sản phẩm <a field="name" class="glyphicon glyphicon-chevron-down sortBy active"></a></th>
                                                <th>Giá lẻ</th>
                                                <th>Số lượng nợ <a field="quantity_debt" class="glyphicon glyphicon-chevron-down sortBy active"></a></th>
                                                <th>Giá trị nợ <a field="total_value_debt" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                                                <th>Giá trị vốn <a field="total_value_debt_root" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                                            </tr>
                                        </thead>
                                        <tbody id="list">
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                                        <div class="paging L" id="page_html">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="list_order" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row search-order extend">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input id="order_keyword"
                                                    placeholder="Tên SP / Mã đơn hàng / Tên khách hàng / SĐT"
                                                    type="text" name="">
                                                <img id="" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30"
                                                    class="icon-date">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select id="order_shop_id" class="form-control sl-warehouse">
                                                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                                                </select>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <select id="order_year" class="form-control sl-warehouse">
                                                    <?php echo $_smarty_tpl->tpl_vars['opt_year']->value;?>

                                                </select>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                <button style="margin-top: 5px;" id="btn_view_order"
                                                    class="form-control btn btn-primary"> Xem
                                                    <!--Xem-->
                                                </button>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 top-5">
                                                <i id="download_order"
                                                    class="glyphicon glyphicon-download-alt color-green font-size-30"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <h4>Tổng số đơn hàng nợ: <span class="color-red"
                                                    id="total_order_debt"></span></h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Thành tiền: <span class="color-red" id="total_price_order_debt"></span>
                                            </h4>
                                        </div>
                                    </div>
                                    <table class="table table-bg-no order">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày tạo</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Khách hàng</th>
                                                <th>SĐT</th>
                                                <th>Tổng đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order_list">
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                                        <div class="paging L" id="order_page_html">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="list_history" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row search-order extend">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">

                                           <div class="col-md-2 col-xs-6 top-5 col-xs-12">
                                               <div class="input-group ">
                                                   <input placeholder="Từ ngày" class="form-control"
                                                       value="<?php echo smarty_modifier_date_format(time(),"01/01/Y");?>
" name="" id="history_from"
                                                       type="text" />
                                                   <span class="input-group-addon">
                                                       <span class="icon-cate icon-other-date"></span>
                                                   </span>
                                               </div>
                                           </div>

                                           <div class="col-md-2 col-xs-6 top-5 col-xs-12">
                                               <div class="input-group ">
                                                   <input placeholder="Đến ngày" class="form-control" name="" id="history_to"
                                                       type="text" />
                                                   <span class="input-group-addon">
                                                       <span class="icon-cate icon-other-date"></span>
                                                   </span>
                                               </div>
                                            </div>

                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input id="history_keyword"
                                                    placeholder="Tên SP / Mã đơn hàng / Tên khách hàng / SĐT"
                                                    type="text" name="">
                                                <img id="" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30"
                                                    class="icon-date">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select id="history_shop_id" class="form-control sl-warehouse">
                                                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                                                </select>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                <button style="margin-top: 5px;" id="btn_view_history"
                                                    class="form-control btn btn-primary"> Xem
                                                    <!--Xem-->
                                                </button>
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-12 top-5">
                                                <i id="download_history"
                                                    class="glyphicon glyphicon-download-alt color-green font-size-30"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bg-no">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình</th>
                                                <th>Ngày thực hiện</th>
                                                <th>Mã đơn</th>
                                                <th>Khách hàng</th>
                                                <th>SĐT</th>
                                                <th>Mã SP</th>
                                                <th>Tên SP</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Thành tiền</th>
                                                <th>Còn nợ</th>
                                                <th>Đã Trả</th>
                                                <th>Người thực hiện</th>
                                                <th>@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="history_list">
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                                        <div class="paging L" id="history_page_html">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_paid_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div id="md_liabilities_title" class="pop_up_T">Trả hàng
            </div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-12 wrap_name">
                        <div class="col-sm-3 col-xs-12">
                        </div>

                        <div class="col-sm-12 wrap_name">
                            <div class="col-sm-3 col-xs-12 top-10">
                            </div>
                            <div class="col-sm-12 wrap_name top-10">
                                <div class="col-sm-3 text-right">
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12 input_name">
                                        Ghi chú:
                                    </div>
                                    <div class="col-sm-12 input_name">
                                        <textarea id="paid_product_note" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center label_name" id="md_liabilities_notice">
                            </div>
                            <div class="col-sm-12 wrap_name top-10">
                                <div class="col-sm-3 text-right">
                                </div>
                                <div class="col-sm-6 input_name">
                                    <a id="btn_total_paid_all" class="collected-all">Tất cả</a>
                                    <input id="total_paid_all" placeholder="Số sản phẩm trả"
                                        class="form-control number-format text-center" value="" />
                                    <span id="product_err" class="color-red"></span>
                                </div>
                            </div>

                            <div class="col-sm-12 wrap_name top-10">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-2 text-center color-red">
                                    <p id="total_left">Còn nợ</p>
                                    <p id="total_left_quantity" total_left="">-</p>
                                </div>
                                <div class="col-sm-2 text-center color-green">
                                    <p id="total_paid">Đã trả</p>
                                    <p id="total_paid_quantity" total_paid="">-</p>
                                </div>
                            </div>
                            <div class="col-sm-12 wrap_name top-10">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6 text-center">
                                    <span id="product_status"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="bootstrap-dialog-footer">
                            <div class="bootstrap-dialog-footer-buttons">
                                <button data-dismiss="modal" class="btn btn_w btn-default"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                                <button id="btn_paid_product_done" class="btn btn_w btn-success"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/report_product_debt.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
