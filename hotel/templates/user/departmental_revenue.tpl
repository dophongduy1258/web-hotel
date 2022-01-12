<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
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
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="input-group ">
                                <input placeholder="Đến ngày" class="form-control hasDatepicker" name="" id="department_to" type="text">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div> *}
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="relative">
                                <select id="department_shop_id" class="form-control width-100p">
                                    <option value="">Tất cả chi nhánh</option>
                                    <option value="1">DSTORE-HCM</option>
                                    <option value="2">DSTORE-HN</option>
                                </select>
                            </div>
                        </div> *}
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="relative">
                                <select id="department_member_department_id" class="form-control width-100p">
                                    <option value="">Tất cả phòng ban</option>
                                </select>
                            </div>
                        </div> *}
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <div class="relative">
                                <input placeholder="Họ &amp; Tên/ SĐT/ Mã KH" class="form-control" name="" id="department_keyword" type="text">
                                <button id="department_btn_view" class="btn btn-primary" style="position: absolute;right: 0px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                            </div>
                        </div>
                        {* <div class="col-md-2 col-sm-4 col-xs-6 top5">
                            <button id="department_btn_dl" class="btn btn-info btn-width100"> Tải về</button>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 top14">
                            <label class="wrap-ace">
                                <input id="department_grouped" type="checkbox" class="ace checkbox" value="">
                                <span class="lbl"></span> Nhóm lại
                            </label>
                        </div> *}
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
</script>