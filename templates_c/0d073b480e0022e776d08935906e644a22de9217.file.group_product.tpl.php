<?php /* Smarty version Smarty-3.1.18, created on 2021-09-19 14:24:33
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/group_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15292877526146e5b11617b5-38039361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d073b480e0022e776d08935906e644a22de9217' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/group_product.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15292877526146e5b11617b5-38039361',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'opt_pro_com' => 0,
    'session' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6146e5b1180b75_48008505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6146e5b1180b75_48008505')) {function content_6146e5b1180b75_48008505($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <div class="">
        <div class="row">

            <div class="col-lg-3 col-sm-12 col-xs-12 top-5">
                <div class="input-group1 ">
                    <input placeholder="Tên SP/ Mã SP/ Mã đơn/ Tên KH/ Mã KH" class="form-control" name="" id="keyword" type="text"/>
                    <button id="filter" class="btn btn-primary btn-width" style="position: absolute;right: 8px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                </div>
            </div>

            <div class="col-lg-2 col-sm-4 col-xs-6 top-5">
                <div class="input-group ">
                    <input placeholder="Từ ngày" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
" name="" id="from" type="text"/>
                    <span class="input-group-addon">
                        <span class="icon-cate icon-other-date"></span>
                    </span>
                </div>
            </div>

            <div class="col-lg-2 col-sm-4 col-xs-6 top-5">
                <div class="input-group ">
                    <input placeholder="Đến ngày" class="form-control" name="" id="to" type="text"/>
                    <span class="input-group-addon">
                        <span class="icon-cate icon-other-date"></span>
                    </span>
                </div>
            </div>

            <div class="col-lg-2 col-sm-4 col-xs-12 top-5">
                <div class="input-group1 ">
                    <select id="shop_id" class="form-control width-100p">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-12 top-5">
                <select multiple id="product_commission_id" class="form-control width-100p selectpicker">
                    <option selected value="">Tất cả kho hàng</option>
                    <option value="0">Chưa khai báo kho</option>
                    <?php echo $_smarty_tpl->tpl_vars['opt_pro_com']->value;?>

                </select>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-12 top-5">
                <select multiple id="treasurer_group_id" class="form-control width-100p selectpicker">
                    <option selected value="">Tất cả lý do xuất</option>
                    <option value="0">Chưa khai báo lý do xuất</option>
                </select>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-12 top-5">
                <select multiple id="treasurer_id" class="form-control width-100p selectpicker">
                    <option selected value="">Tất cả lý do Thu</option>
                    <option value="0">Chưa khai báo lý do thu</option>
                </select>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-12 top-5 top-555">
                <select id="order_type" class="form-control">
                    <option selected value="">Tất cả loại đơn hàng</option>
                    <option value="0">Đơn hàng POS</option>
                    <option value="1">Đơn hàng xuất kho</option>
                </select>
            </div>
            
            <div class="col-sm-9 col-xs-12 top5">
                <button id="btn_dl" class="btn btn-warning btn-width">Tải về  chỉ chi nhánh đang chọn</button>
                <button id="btn_dl_all" class="btn btn-warning btn-width">Tải về tất cả chi nhánh</button>
                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']==0) {?>
                <button id="btn_update_all_root_price" class="btn btn-danger btn-width">Cập nhật lại toàn bộ giá vốn cho cửa hàng này</button>
                <?php }?>
            </div>

        </div>

        <div class="top-10 product_index_t1">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col_vi col_" >STT</th>
                            <th class="col_vi col_" >Ngày xuất <a field="created_at" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Mã đơn</th>
                            <th class="col_vi col_" >Kho <a field="product_commission_parent_name" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Nhóm CK <a field="product_commission_name" class="glyphicon glyphicon-chevron-down sortBy"></a></th>

                            <th class="col_vi col_" >ID khách hàng <a field="member_code" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Họ tên <a field="fullname" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >SĐT <a field="mobile" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Phòng ban <a field="department_name" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Người tạo <a field="user_add" class="glyphicon glyphicon-chevron-down sortBy"></a></th>

                            <th class="col_vi col_" >Mã SP <a field="code" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Tên sản phẩm <a field="product_name" class="glyphicon active glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Số lượng <a field="amount" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Đơn giá</th>
                            <th class="col_vi col_" >Tổng thành tiền</th>
                            <th class="col_vi col_" >Giảm giá <a field="discount" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Thành tiền <a field="thanh_tien" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_ allow_view" >Giá vốn <a field="cost" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_ allow_view" >Lãi BH <a field="lai" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Hình thức <a field="payment_type" class="glyphicon glyphicon-chevron-down sortBy"></a></th>
                            <th class="col_vi col_" >Ghi chú <a field="payment_type" class=""></a></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th class="col_vi col_ text-right" colspan="12">Tổng:</th>
                            <th class="col_vi col_" ><a id="total_quantity"></a></th>
                            <th class="col_vi col_"></th>
                            <th class="col_vi col_" ><a id="total_sum"></a></th>
                            <th class="col_vi col_" ><a id="total_discount"></a></th>
                            <th class="col_vi col_"><a id="total_revenue"></a></th>
                            <th class="col_vi col_ allow_view"><a id="total_cost"></a></th>
                            <th class="col_vi col_ allow_view"><a id="total_lai"></a></th>
                            <th class="col_vi col_"></th>
                        </tr>
                    </thead>
                    <tbody id="list" class="row-members">
                    </tbody>
                </table>
            </div>
            <div  class="col-lg-12 col-md-12 col-sm-12">
                <div class="paging text-center" id="page_html">
                </div>
            </div>
        </div>
    </div>
</div>
<input id="copytoclipboard" type="text" style="opacity:0" value=""/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/report_group_product.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/dropdownchecklist/src/ui.dropdownchecklist.js"></script><?php }} ?>
