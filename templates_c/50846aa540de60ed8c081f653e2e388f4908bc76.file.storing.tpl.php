<?php /* Smarty version Smarty-3.1.18, created on 2021-09-23 14:13:11
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/storing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18347959606116b0fb3a9a08-13711389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50846aa540de60ed8c081f653e2e388f4908bc76' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/storing.tpl',
      1 => 1632038984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18347959606116b0fb3a9a08-13711389',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6116b0fb401061_83376755',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'opt_shop' => 0,
    'opt_providers' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6116b0fb401061_83376755')) {function content_6116b0fb401061_83376755($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">

    <div class="row search-order">

        <div class="col-md-6 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input id="keyword" placeholder="Tên/ Mã sản phẩm" type="text" name="" >
                    <img id="btn_view" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
                </div>
                <div class="col-md-4 col-sm-9 col-xs-12 lg">
                    <select id="warehouse_id" class="form-control sl-warehouse">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
                <div class="col-md-4 col-sm-9 col-xs-12 lg">
                    <select id="providers_id" class="form-control sl-warehouse">
                        <option value="" >Tất cả nhà cung cấp</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_providers']->value;?>

                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <input id="from" type="text" name="" placeholder="Từ ngày" value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <input id="to" type="text" name="" placeholder="Đến ngày">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/date.png" width="30" class="icon-date">
                </div>
            </div>
        </div>

        <div class="col-md-1 col-sm-2 col-xs-12">
            <span id="btn_dl" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/download.png" width="30"></span>
        </div>

    </div>

    <div class="row search-order">
        <div class="col-sm-4 col-xs-12">
            Tổng số dòng: <strong id="total_record"></strong>
        </div>
        <div class="col-sm-4 col-xs-12">
            Tống số lượng SP: <strong id="total_quantity"></strong>
        </div>
        <div class="col-sm-4 col-xs-12">
            Giá trị: <strong id="total_value"></strong>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bg-no">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày tạo <a field="created_date" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Ngày nhập <a field="import_date" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Mã phiếu <a field="wh_code" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th class="text-left">Kho hàng <a field="warehouse_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Mã NCC <a field="providers_id" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>NCC <a field="providers_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Người nhập</th>
                    <th>Mã hàng <a field="code" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Tên hàng <a field="product_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>ĐVT</th>
                    <th>SL <a field="amount" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Giá nhập <a field="price" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Thành tiền</th>
                    <th>Xác nhận <a field="confirmed_by" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                </tr>
            </thead>
            <tbody id="list">
            </tbody>
        </table>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
      <div class="paging L" id="page_html">
      </div>
    </div>

</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/report_storing.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
