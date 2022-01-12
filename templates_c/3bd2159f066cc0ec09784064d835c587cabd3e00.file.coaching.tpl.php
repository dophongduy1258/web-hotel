<?php /* Smarty version Smarty-3.1.18, created on 2021-08-13 23:55:59
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/commission/coaching.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19186158116116a41fbf7f08-58667040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bd2159f066cc0ec09784064d835c587cabd3e00' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/commission/coaching.tpl',
      1 => 1628747002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19186158116116a41fbf7f08-58667040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'opt_root_department' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6116a41fc2c3f5_88806741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6116a41fc2c3f5_88806741')) {function content_6116a41fc2c3f5_88806741($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<div class="top10">
	<div class="row">
        <div class="col-lg-2 col-xs-6 top-5">
            <div class="input-group ">
                <input placeholder="Từ ngày" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"01/m/Y");?>
" name="" id="from" type="text"/>
                <span class="input-group-addon">
                    <span class="icon-cate icon-other-date"></span>
                </span>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6 top-5">
            <div class="input-group ">
                <input placeholder="Đến ngày" class="form-control" name="" id="to" type="text"/>
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
                    <option value="">Xem theo khách hàng</option>
                    <option value="day">Xem theo ngày</option>
                    <option value="month">Xem theo tháng</option>
                    <option value="quarter">Xem theo quý</option>
                    <option value="year">Xem theo năm</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-xs-9 top-5 relative">
            <div class="input-group1 ">
                <input placeholder="Họ & Tên/ SĐT/ Mã KH" class="form-control" name="" id="keyword" type="text"/>
                <button id="filter" class="btn btn-primary btn-width" style="position: absolute;right: 8px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
            </div>
        </div>

        <div class="col-lg-1 col-xs-3 top5">
            <button id="btn_dl" class="btn btn-primary btn-width"><span class="glyphicon glyphicon-cloud-download"></span> Tải về</button>
        </div>

    </div>
	<div class="row">

        <div class="col-lg-1 col-xs-12 top-5">
        </div>
        <div class="col-lg-2 col-xs-12 top-10 text-right">
            Chọn phòng ban:
        </div>
        <div class="col-lg-3 col-xs-6 top-5">
            <select id="root_member_department_id" class="form-control width-100p">
                <option value="">Tất cả</option>
                <?php echo $_smarty_tpl->tpl_vars['opt_root_department']->value;?>

            </select>
        </div>

        <div class="col-lg-3 col-xs-6 top-5">
            <select id="member_department_id" disabled class="form-control width-100p">
                <option value="">Tất cả</option>
            </select>
        </div>

        <div class="col-lg-3 col-xs-12 top-5">
            <select id="group_by_member_group" class="form-control width-100p">
                <option value="">Doanh thu tổng phòng </option>
                <option value="1">Doanh thu chi tiết khách hàng </option>
            </select>
        </div>

    </div>

	<div class="top-10 product_index_t1">
        <div class="table-responsive">
    		<table class="table table-striped table-bordered text-center">
    			<thead>
    				<tr>
                        <th class="col_vi col_day" >Ngày <a field="day" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_month" >Tháng <a field="month" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_year" >Năm <a field="year" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_quarter" >Quý <a field="quarter" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_fullname" >Họ & Tên <a field="fullname" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_mobile" >SĐT</th>
                        <th class="col_vi col_code"> Mã KH <a field="code" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_member_group_name">Nhóm khách hàng <a field="member_group_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_member_department_name">Phòng ban <a field="member_department_name" class="glyphicon glyphicon-chevron-up sortBy"></a></th>

                        <th class="col_vi col_total_self_sale_real">DS giá lẻ <a field="total_self_sale_real" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_total_self_sale">DS thực thu <a field="total_self_sale" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_total_self_discount">Giảm giá</th>
                        
                        <th class="col_vi col_total_sale_real">Coach DS giá lẻ <a field="total_sale_real" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_total_sale">Coach DS thực thu <a field="total_sale" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                        <th class="col_vi col_total_discount">Coach Giảm giá</th>

                        <th class="col_vi col_total_value">Hoa hồng <a field="total_value" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
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
                        <th class="col_vi col_member_group_name"></th>
                        <th class="col_vi col_member_department_name">Tổng thực tế:</th>

                        <th class="col_vi col_total_self_sale_real"><a id="static_total_self_sale_real"></a></th>
                        <th class="col_vi col_total_self_sale"><a id="static_total_self_sale"></a></th>
                        <th class="col_vi col_total_self_discount"><a id="static_total_self_discount"></a></th>

                        <th class="col_vi col_total_sale_real"><a id=""></a></th>
                        <th class="col_vi col_total_sale"><a id=""></a></th>
                        <th class="col_vi col_total_discount"><a id=""></a></th>

                        <th class="col_vi col_total_value"></th>
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
                        <th class="col_vi col_code">Số dòng</th>
                        <th class="col_vi col_member_group_name"><a id="total_record"></a></th>
                        <th class="col_vi col_member_department_name">Tính tổng:</th>

                        <th class="col_vi col_total_self_sale_real"><a id="total_self_sale_real"></a></th>
                        <th class="col_vi col_total_self_sale"><a id="total_self_sale"></a></th>
                        <th class="col_vi col_total_self_discount"><a id="total_self_discount"></a></th>

                        <th class="col_vi col_total_sale_real"><a id="total_sale_real"></a></th>
                        <th class="col_vi col_total_sale"><a id="total_sale"></a></th>
                        <th class="col_vi col_total_discount"><a id="total_discount"></a></th>

                        <th class="col_vi col_total_value"><a id="total_value"></a></th>
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
/js/js_act/commission_coaching.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
