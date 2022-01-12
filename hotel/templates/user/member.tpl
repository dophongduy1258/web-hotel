<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-member">
                    <h3 class="title-profile">Quản lý đội nhóm <span id="total_member"></span></h3>
                    <p class="referral-link top-10">Copy Link giới thiệu của bạn <a class="click-copy color-key pointer"
                            id="btnCopy">Tại đây</a><input type="text" class="form-control form-info hide"
                            id="link_referral"
                            value="{$rewrite_url}san-pham-rf{if isset($session.username_client)}{$session.username_client}{/if}" />
                    </p>
                    {* <p class="referral-link top-8">Website của tôi: <a class="color-key" title="Nếu bạn muốn thay đổi tên web, vui lòng liên hệ bộ phận quản trị Website." href="https://vinagroups.ecosite.vn/" target="_blank"></a></p> *}
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6 top5">
                            <div class="input-group input-group-small">
                                <input id="filter_joined_at" type="text" class="form-control" name="from_date"
                                    placeholder="Khách hàng từ" aria-describedby="sizing-addon1">
                                <span class="input-group-addon" id="sizing-addon1">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 top5">
                            <select id="filter_member_group_id" class="form-control">
                                <option value="">Tất cả nhóm khách hàng</option>
                                {$opt_group}
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 top5 ">
                            <div class="relative">
                                <input id="filter_txt" type="text" class="form-control" placeholder="Email / mobile"
                                    aria-describedby="basic-addon1">
                                <span onclick="" id="manual_submit" class="input-group-addon hide"><i
                                        class="glyphicon glyphicon-search"></i></span>
                                <button id="filter_btn_view" class="btn btn-form"><span
                                        class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
                                    <!--Xem-->
                                </button>
                            </div>
                        </div>
                        {* <div class="col-md-6 col-sm-6 col-xs-5 top5">
                            <button id="btn_add_member" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Thêm khách hàng mới</button>
                        </div> *}
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key members">
                                <thead id="">
                                    <tr>
                                        <th>
                                            <div class="short_up"><span>Họ Tên</span><a field="fullname"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th>Nhóm khách hàng</th>
                                        <th>
                                            <div class="short_up"><span>Từ ngày</span></div>
                                        </th>
                                        <th>Mobile</th>
                                        <th>
                                            <div class="short_up"><span>Công nợ</span><a field="total_liabilities"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th>
                                            <div class="short_up"><span>Đã mua</span><a field="total_spent"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th class="hide">
                                            <div class="short_up"><span>Tổng điểm</span><a id="sortby_point"
                                                    class="fa fa-caret-up sortBy"></a></div>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="list_members">
                                </thead>
                            </table>
                            <div class="">
                                <div class="paging text-center" id="page_html"></div>
                                <input id="recent_page" hidden class="hidden" value="1" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>