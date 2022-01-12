<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-member">
                    <h3 class="title-profile">Hoa hồng huấn luyện</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <div class="input-group ">
                                <input placeholder="Từ ngày" class="form-control" value="" name="" id="coaching_from" type="text" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="input-group ">
                                <input placeholder="Đến ngày" class="form-control" name="" id="coaching_to" type="text" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div> *}
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="relative">
                                <select id="coaching_shop_id" class="form-control width-100p">
                                    <option value="">Tất cả chi nhánh</option>
                                    {$opt_shop}
                                </select>
                            </div>
                        </div> *}
                        {* <div class="col-md-4 col-sm-4 col-xs-6 top5">
                            <div class="relative">
                                <select id="coaching_member_group_id" class="form-control width-100p">
                                    <option value="">Tất cả nhóm khách hàng</option>
                                    {$opt_member_group}
                                </select>
                            </div>
                        </div> *}
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <div class="relative">
                                <input placeholder="Họ & Tên/ SĐT/ Mã KH" class="form-control" name="" id="coaching_keyword" type="text" />
                                <button id="coaching_btn_view" class="btn btn-primary" style="position: absolute;right: 0px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                            </div>
                        </div>
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key">
                                <thead>
                                    <tr>
                                        <th class="col_vi col_stt">STT </th>
                                        <th class="col_vi col_order_created_at"><div class="short_up"><span>Ngày tạo</span><a field="order_created_at" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_fullname"><div class="short_up"><span>Họ & Tên</<a field="fullname" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_mobile">SĐT</th>
                                        <th class="col_vi col_code"><div class="short_up"><span>Mã KH</span><a field="code" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_member_group_name"><div class="short_up"><span>Nhóm thành viên</span><a field="member_group_name" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_order_id">Mã đơn hàng</th>
                                        <th class="col_vi col_total_self_sale_real"><div class="short_up"><span>DS giá lẻ</span><a field="total_order_real" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_total_self_sale"><div class="short_up"><span>DS thực thu</span><a field="total_order" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                        <th class="col_vi col_value"><div class="short_up"><span>Hoa hồng</span><a field="value" class="fa fa-caret-up sortByCoaching sortBy"></a></div></th>
                                    </tr>
                                </thead>

                                <thead>
                                    <tr>
                                        <th class="col_vi col_stt"></th>
                                        <th class="col_vi col_order_created_at"></th>
                                        <th class="col_vi col_fullname"></th>
                                        <th class="col_vi col_mobile">Số dòng</th>
                                        <th class="col_vi col_code"><a id="coaching_total_record"></a></th>
                                        <th class="col_vi col_code"><a></a></th>
                                        <th class="col_vi col_member_group_name">Tổng: </th>
                                        <th class="col_vi col_total_self_sale"><a id="coaching_total_order_real"></a></th>
                                        <th class="col_vi col_total_self_sale_real"><a id="coaching_total_order"></a></th>
                                        <th class="col_vi col_total_value"><a id="coaching_total_commission"></a></th>
                                    </tr>
                                </thead>
                                <tbody id="coaching_list" class="row-members">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-md-12 col-sm-12">
                            <div class="paging text-center" id="coaching_page_html">
                            </div>
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