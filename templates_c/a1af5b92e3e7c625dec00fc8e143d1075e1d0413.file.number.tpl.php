<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 14:28:51
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/lottery/number.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2029481135613e46686b4e86-28443103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1af5b92e3e7c625dec00fc8e143d1075e1d0413' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/lottery/number.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2029481135613e46686b4e86-28443103',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_613e46686b5968_01795100',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613e46686b5968_01795100')) {function content_613e46686b5968_01795100($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <div class="top10">
        <div class="row">

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group ">
                    <input placeholder="Từ ngày" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
" name=""
                        id="from" type="text" />
                    <span class="input-group-addon">
                        <span class="icon-cate icon-other-date"></span>
                    </span>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group ">
                    <input placeholder="Đến ngày" class="form-control" name="" id="to" type="text" />
                    <span class="input-group-addon">
                        <span class="icon-cate icon-other-date"></span>
                    </span>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="shop_id" class="form-control width-100p">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="by_value" class="form-control width-100p">
                        <option value="">Xem theo BO</option>
                        <option value="order">Xem theo đơn hàng</option>
                        <option value="day">Xem theo ngày</option>
                        <option value="month">Xem theo tháng</option>
                        <option value="quarter">Xem theo quý</option>
                        <option value="year">Xem theo năm</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-xs-12 top-5 relative">
                <div class="input-group1 ">
                    <input placeholder="Họ & Tên/ SĐT" class="form-control" name="" id="keyword" type="text" />
                    <button id="filter" class="btn btn-primary btn-width"
                        style="position: absolute;right: 8px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span
                            class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                </div>
            </div>


            <div class="col-lg-1 col-xs-12 top5">
                <button id="btn_dl" class="btn btn-primary btn-width"><span
                        class="glyphicon glyphicon-cloud-download"></span> Tải về</button>
            </div>

        </div>
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t1">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="col_vi col_day">Ngày <a field="day"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_month">Tháng <a field="month"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_year">Năm <a field="year"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_quarter">Quý <a field="quarter"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>

                            <th class="col_vi col_fullname">Họ & tên <a field="fullname"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_mobile">SĐT</th>
                            <th class="col_vi col_code">Mã KH <a field="code"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_order_id">Mã đơn <a field="order_id"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>

                            <th class="col_vi col_member_group_id">Tên phòng ban <a field="member_department_name"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_block_name">Khối <a field="block_name"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_total_sale_real">DS giá lẻ <a field="total_sale_real"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_total_sale">DS Thực thu <a field="total_sale"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th class="col_vi col_total_value">Hoa hồng <a field="total_value"
                                    class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th class="col_vi col_day"></th>
                            <th class="col_vi col_month"></th>
                            <th class="col_vi col_year"></th>
                            <th class="col_vi col_quarter"></th>

                            <th class="col_vi col_fullname"></th>
                            <th class="col_vi col_mobile"></th>
                            <th class="col_vi col_code"></th>
                            <th class="col_vi col_order_id"></th>
                            <th class="col_vi"></th>

                            <th class="col_vi col_member_group_id">Tổng cộng:</th>
                            <th class="col_vi col_total_sale_real"><a id="total_sale_real"></a></th>
                            <th class="col_vi col_total_sale"><a id="total_sale"></a></th>
                            <th class="col_vi col_total_value"><a id="total_value"></a></th>
                        </tr>
                    </thead>
                    <tbody id="list" class="row-members">
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="paging text-center" id="page_html">
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/lottery_number.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
