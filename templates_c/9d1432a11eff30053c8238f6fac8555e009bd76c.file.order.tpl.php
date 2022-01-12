<?php /* Smarty version Smarty-3.1.18, created on 2021-08-19 00:45:02
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/members/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1332466481611d471e01e933-49452641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d1432a11eff30053c8238f6fac8555e009bd76c' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/members/order.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1332466481611d471e01e933-49452641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'opt_showroom' => 0,
    'lang' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_611d471e05f460_67027487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_611d471e05f460_67027487')) {function content_611d471e05f460_67027487($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <div class="row search-order">
        <div class="col-sm-3 col-xs-12">
            <h4>Số đơn đang xử lý: <b class="color-red" id="processing_record"></b>
                <h4>
        </div>
        <div class="col-sm-3 col-xs-12">
            <h4>Tổng giá trị: <b class="color-red" id="processing_total"></b>
                <h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="input-group">
                <input id="keyword" type="text" class="form-control" placeholder="ID đơn hàng/Người đặt hàng"
                    aria-describedby="basic-addon1">
                <span id="btn_keyword" class="input-group-addon filter-class"><i
                        class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
            <span style="display: inline-block;margin-top: 6px;margin-right: 10px;">Chi nhánh:</span>
            <div class="input-group" style="width:calc(100% - 78px);float: right;">
                <select class="form-control" id="shop_id">
                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6">
            <span style="display: inline-block;margin-top: 6px;margin-right: 15px;">Showroom:</span>
            <div class="input-group" style="width:calc(100% - 86px);float: right;">
                <select class="form-control" id="status_showroom">
                    <?php echo $_smarty_tpl->tpl_vars['opt_showroom']->value;?>

                </select>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <span style="display: inline-block;margin-top: 10px;margin-right: 10px;">Thanh toán:</span>
            <div class="input-group" style="width:calc(100% - 86px);margin-top: 5px;float: right;">
                <select class="form-control" id="payments">
                    <option value="">Tất cả</option>
                    <option value="1">Ví điểm</option>
                    <option value="2">Ví chính</option>
                    <option value="3">COD</option>
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <span style="display: inline-block;margin-top: 10px;margin-right: 10px;">Trạng thái:</span>
            <div class="input-group" style="width:calc(100% - 78px);margin-top: 5px;float: right;">
                <select class="form-control" id="status_order">
                    <option value="">Tất cả</option>
                    <option value="-3">Từ chối sau khi nhận</option>
                    <option value="-2">Khách hủy</option>
                    <option value="-1">Từ Chối</option>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Cần giao</option>
                    <option value="2">Đang giao</option>
                    <option value="3">Hoàn thành</option>
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="input-group top-5">
                <input id="from" type="text" class="form-control" placeholder="Từ ngày"
                    aria-describedby="basic-addon1">
                <span class="input-group-addon filter-class"><i
                        class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="input-group top-5">
                <input id="to" type="text" class="form-control" placeholder="Đến ngày"
                    aria-describedby="basic-addon1">
                <span class="input-group-addon filter-class"><i
                        class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hide">
            <span style="display: inline-block;margin-top: 10px;margin-right: 0px;">Loại:</span>
            <div class="input-group" style="width:calc(100% - 40px);margin-top: 5px;float: right;">
                <select class="form-control" id="order_type">
                    <option value="">Tất cả</option>
                    <option value="3">Khách hàng đặt</option>
                    <option value="2">Showroom đặt</option>
                </select>
            </div>
        </div>

        

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <button style="margin-top: 5px;" id="btn_view" class="form-control filter-class btn btn-primary"> Xem
                <!--Xem-->
            </button>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <button style="margin-top: 5px;" id="btn_dl" class="form-control btn btn-info"> 
                <i class="glyphicon glyphicon-cloud-download"></i>
                Sản phẩm
            </button>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-bg-no">
            <thead>
                <tr>
                    <th width="5%">Mã đơn hàng</th>
                    <th width="12%">Ngày tạo</th>
                    <th width="">Kho hàng</th>
                    <th width="">Khách hàng</th>
                    <th width="">SĐT</th>
                    <th>Thành tiền</th>
                    <th width="">Thu của khách</th>
                    <th width="10%">@</th>
                </tr>
            </thead>
            <tbody id="processing_list">
            </tbody>
        </table>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
    <div class="paging L" id="processing_page_html">
    </div>
</div>


<div class="modal fade" id="modal_modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T" id="title_modal_add_storing">Thông tin đơn hàng</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 bg-hold-main-content modal-modify-user">
                        <div class="col-lg-12 nopading top5">
                            <div class="col-lg-6">
                                <input id="order_id" hidden type="text" value="" />
                                <input id="order_shop_id" hidden type="text" value="" />
                                <input id="created_at" hidden type="text" value="" />
                                <div class="col-lg-4 label-name">
                                    <b>Họ và Tên:</b>
                                </div>
                                <div class="col-lg-8">
                                    <input id="username" class="form-control" type="text" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-4 label-name">
                                    <b>SĐT:</b>
                                </div>
                                <div class="col-lg-8">
                                    <input id="mobile" class="form-control" type="text" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 nopading top5">
                            <div class="col-lg-6">
                                <div class="col-lg-4 label-name">
                                    <b>Địa chỉ:</b>
                                </div>
                                <div class="col-lg-8">
                                    <input id="address" class="form-control" type="text" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-4 label-name">
                                    <b>Ghi chú:</b>
                                </div>
                                <div class="col-lg-8">
                                    <input id="note" class="form-control" type="text" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 nopading top5">
                            <div class="col-lg-6">
                                <div class="col-lg-4 label-name">
                                    <b>Trạng thái:</b>
                                </div>
                                <div class="col-lg-8">
                                    <select name="" id="order_status" class="form-control">
                                        <option value="-1">Đã xem</option>
                                        <option value="0">Đang xử lý</option>
                                        <option value="1">Hoàn thành</option>
                                        <option value="2">Chờ xử lý</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        

                        <div class="col-lg-12 nopading top20">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-2">
                                <button data-dismiss="modal" class="btn btn-default form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                                    <!--Nhập lại-->
                                </button>
                            </div>
                            <div class="col-lg-2">
                                <button id="btn_save" class="btn btn-success form-control"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>

                                    <!--Hoàn tất-->
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_showroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--Danh sách showroom muốn chuyển đơn-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="md_shop_title">Danh sách showroom</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <table class="table table-responsive table-striped text-center vertical-middle">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="text-center">Tên Showroom</th>
                            <th class="text-center">Địa chỉ</th>
                            <th>@</th>
                        </tr>
                    </thead>
                    <tbody id="showroom_list">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width btn-showroom" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--Danh sách sản phẩm của đơn hàng-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="md_shop_title">Danh sách sản phẩm</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <table class="table table-bg-no">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="text-left">Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giá</th>
                            
                        </tr>
                    </thead>
                    <tbody id="product_list">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_journey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--Danh sách sản phẩm của đơn hàng-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="md_shop_title">Chi tiết hành trình đơn hàng</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <table class="table table-bg-no">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="text-left">Ngày tạo</th>
                            <th class="text-left">Showroom</th>
                            <th class="text-left">Trạng thái</th>
                            <th class="text-left">Ghi chú</th>
                            <th class="text-left">Tạo bởi</th>
                            <th class="text-center">@</th>
                        </tr>
                    </thead>
                    <tbody id="journey_list">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-width" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pay_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <!--Danh sách sản phẩm của đơn hàng-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="md_shop_title">Chi tiết đơn hàng</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                <table class="table table-hover table-bordered table-bg">
                    <thead>
                        <tr>
                            <th>Tiền hàng</th>
                            <th>Phí ship</th>
                            <th>Giảm tiền</th>
                            <th>Tổng đơn</th>
                            <th>Ví chính</th>
                            <th>Ví điểm</th>
                            <th>Thu của khách</th>
                        <tr>
                    </thead>
                    <tbody id="pay_list">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel btn-width" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<a id="btn_print_link" print-url="" href="javascript:;"></a>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.printPage.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/members_order.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
