<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:19:44
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/deleted_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1135502364614f7650550f51-93624884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ea396df54bb3ed05d82bb74de3cc469fefd5b72' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/report/deleted_order.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1135502364614f7650550f51-93624884',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614f765057ef82_78562772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614f765057ef82_78562772')) {function content_614f765057ef82_78562772($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">

    <div class="row search-order">

        <div class="col-md-6 col-sm-5 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="keyword" placeholder="Tên/ Mã sản phẩm" type="text" name="" >
                    <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/search_code.png" width="30" class="icon-date">
                </div>
                
            </div>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12">
            
        </div>

        <div class="col-md-1 col-sm-2 col-xs-12">
            <span id="btn_view" class="icon1"><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/eye.png" width="30"></span>
            
        </div>

    </div>

    <div class="row search-order">
        <div class="col-sm-4 col-xs-12">
            Tổng số đơn: <strong id="total_record"></strong>
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
                    <th>Ngày xóa <a field="created_at" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Mã phiếu</th>
                    <th class="text-left">Kho hàng <a field="shop_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Người xóa <a field="fullname" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Giá trị đơn <a field="sum" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Đơn nhập/ xuất <a field="is_imported" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Loại đơn <a field="order_type" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                    <th>Ghi chú </th>
                    <th>@</th>
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
/js/js_act/report_deleted_order.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
