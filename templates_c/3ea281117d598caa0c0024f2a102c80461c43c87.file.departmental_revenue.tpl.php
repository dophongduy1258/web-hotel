<?php /* Smarty version Smarty-3.1.18, created on 2021-11-19 09:51:49
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/departmental_revenue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1807889216618b92f9617470-35221074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ea281117d598caa0c0024f2a102c80461c43c87' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/departmental_revenue.tpl',
      1 => 1636950280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1807889216618b92f9617470-35221074',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_618b92f96485d3_62526623',
  'variables' => 
  array (
    'tpldirect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_618b92f96485d3_62526623')) {function content_618b92f96485d3_62526623($_smarty_tpl) {?><div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-member">
                    <h3 class="title-profile">Doanh thu phòng ban</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <div class="input-group ">
                                <input placeholder="Từ ngày" class="form-control" value="" name="" id="department_from" type="text">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <div class="relative">
                                <input placeholder="Họ &amp; Tên/ SĐT/ Mã KH" class="form-control" name="" id="department_keyword" type="text">
                                <button id="department_btn_view" class="btn btn-primary" style="position: absolute;right: 0px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="top10">
						<div class="table-responsive">
							<table class="table table-key">
								<thead>
									<tr>
										<th class="col_vi">STT </th>
										<th class="col_vi col-de-full"><div class="short_up"><span>Ngày tạo</span><a field="order_created_at" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi col-de-full"><div class="short_up"><span>Họ &amp; Tên</span><a field="fullname" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi col-de-full">SĐT</th>
										<th class="col_vi col-de-full"><div class="short_up"><span>Mã KH</span><a field="code" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi "><div class="short_up"><span>Phòng ban</span><a field="member_department_name" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi "><div class="short_up"><span>Mã phòng ban</span><a field="member_department_id" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi col-de-full">Mã đơn hàng</th>
										<th class="col_vi "><div class="short_up"><span>DS giá lẻ</span><a field="total_order_real" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
										<th class="col_vi "><div class="short_up"><span>DS thực thu</span><a field="total_order" class="glyphicon glyphicon-chevron-up sortByDepartMRe sortBy"></a></div></th>
									</tr>
								</thead>

								<thead>
									<tr>
										<th class="col_vi col-de-full"></th>
										<th class="col_vi col-de-full"></th>
										<th class="col_vi col-de-full"></th>
										<th class="col_vi ">Số dòng</th>
										<th class="col_vi "><a id="departMRe_total_record"></a></th>
										<th class="col_vi col-de-full"></th>
										<th class="col_vi col-de-full"></th>
										<th class="col_vi">Tổng: </th>
										<th class="col_vi"><a id="departMRe_total_order_real"></a></th>
										<th class="col_vi"><a id="departMRe_total_order"></a></th>
									</tr>
								</thead>
								<tbody id="departMRe_list" class="row-members"></tbody>
							</table>
						</div>
						<div class="col-md-12 col-md-12 col-sm-12">
							<div class="paging text-center" id="departMRe_page_html"></div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.profile_info .nav li a').click(function() {
        var data_toggle = $(this).attr('data-toggle');
        $(this).parents('.profile_info').find('.tab-content .tab_pro').removeClass('active');
        $(this).parents('.profile_info').find('.tab-content .' + data_toggle).addClass('active');
        $(this).parents('.nav').find('li').removeClass('active');
        $(this).parent().addClass('active');
    });
    $('body').on('click', 'table.members tbody tr.profile_click', function() {
        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active');
        } else {
            $(".row-members").removeClass("active");
            $(this).parent().addClass('active');
        }
    });
</script><?php }} ?>
