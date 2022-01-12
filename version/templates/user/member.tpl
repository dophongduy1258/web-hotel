<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-member">
                    <h3 class="title-profile">Quản lý đội nhóm <span>(57)</span></h3>
                    <p class="referral-link top-10">Copy Link giới thiệu của bạn <a class="click-copy color-key pointer">Tại đây</a><a href="#" class="click-copy hide">https://sv2.sees.vn/dang-ky/27421</a></p>
                    <p class="referral-link top-8">Website của tôi: <a class="color-key" title="Nếu bạn muốn thay đổi tên web, vui lòng liên hệ bộ phận quản trị Website." href="https://vinagroups.ecosite.vn/" target="_blank">https://vinagroups.ecosite.vn/</a>       </p>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-7 top5">
                            <div class="input-group input-group-small">
                                <input id="filter_joined_at" type="text" class="form-control hasDatepicker" name="from_date" placeholder="Khách hàng từ" aria-describedby="sizing-addon1">
                                <span class="input-group-addon" id="sizing-addon1">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <select id="filter_member_group_id" class="form-control">
                                <option value="">Tất cả nhóm khách hàng</option>
                                <option value="76">[PV]PV</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top5 ">
                            <div class="relative">
                                <input id="filter_txt" type="text" class="form-control" placeholder="Email / mobile" aria-describedby="basic-addon1">
                                <span onclick="list_searching();" id="manual_submit" class="input-group-addon hide"><i class="glyphicon glyphicon-search"></i></span>
                                <button id="filter_btn_view" class="btn btn-form"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
                                    <!--Xem-->
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-5 top5">
                            <button id="btn_add_member" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Thêm khách hàng mới</button>
                        </div>
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key members">
                                <thead id="">
                                    <tr>
                                        <th>
                                            <label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_all" onclick="check_all('#ck_all', '.ck_items')" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>
                                            <div class="short_up"><span>Họ Tên</span><a id="sortby_name" class="fa fa-caret-up sortBy"></a></div>
                                        </th>
                                        <th>Nhóm khách hàng</th>
                                        <th>
                                            <div class="short_up"><span>Từ ngày</span><a id="sortby_joined" class="fa fa-caret-down sortBy active"></a></div>
                                        </th>
                                        <th>Mobile</th>
                                        <th>Công nợ</th>
                                        <th>
                                            <div class="short_up"><span>Đã mua</span><a id="sortby_spent" class="fa fa-caret-up sortBy"></a></div>
                                        </th>
                                        <th class="hide">
                                            <div class="short_up"><span>Tổng điểm</span><a id="sortby_point" class="fa fa-caret-up sortBy"></a></div>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="list_members">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Tổng:</th>
                                        <th class="color-red" id="tpl_total_debt">1,676,470,200</th>
                                        <th id="tpl_total_spent">15,826,930,811</th>
                                    </tr>
                                </thead>
                                <tbody class="row-members">
                                    <tr id="profile_click_556" class="profile_click" members_id="556">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_556" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>NGUYỄN THỊ KIM ÚT</td>
                                        <td>P-GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0777145134</td>
                                        <td>0</td>
                                        <td><b>36,284,600</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs">
                                                <li user_id="556" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_liabilities"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005601</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>HUỲNH THỊ THU HÀ</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>215312034</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/01/1970">01/01/1970</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title="xukashoponline.ecosite.vn">xukashoponline.ecosite.vn</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>P-GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 3.1</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 21</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM III</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>xukashop0103@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0777145134</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong>xukashoponline.ecosite.vn</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>Ân Thạnh, Hoài Ân, Bình Định</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>36,284,600</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>3,337</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong>Trụ sở Sài Gòn</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_628" class="profile_click" members_id="628">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_628" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>PHAN TOÀN</td>
                                        <td>GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0938841859</td>
                                        <td>0</td>
                                        <td><b>21,636,450</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs nav-storing" style="margin: 0px;">
                                                <li user_id="628" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_liabilities hide"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005560</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>TRẦN THỊ TUYẾT MAI</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>371817237</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/07/2020">01/07/2020</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title=""></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 1.3</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 16</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM I</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>tuyetmaikg97@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0938841859</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>21,636,450</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>2,051</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_556" class="profile_click" members_id="556">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_556" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>TRẦN THỊ TUYẾT MAI</td>
                                        <td>P-GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0777145134</td>
                                        <td>0</td>
                                        <td><b>36,284,600</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs">
                                                <li user_id="556" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_liabilities"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005601</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>HUỲNH THỊ THU HÀ</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>215312034</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/01/1970">01/01/1970</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title="xukashoponline.ecosite.vn">xukashoponline.ecosite.vn</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>P-GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 3.1</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 21</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM III</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>xukashop0103@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0777145134</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong>xukashoponline.ecosite.vn</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>Ân Thạnh, Hoài Ân, Bình Định</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>36,284,600</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>3,337</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong>Trụ sở Sài Gòn</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_628" class="profile_click" members_id="628">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_628" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>NGUYỄN THỊ THỊNH</td>
                                        <td>GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0938841859</td>
                                        <td>0</td>
                                        <td><b>21,636,450</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs nav-storing" style="margin: 0px;">
                                                <li user_id="628" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_liabilities hide"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005560</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>TRẦN THỊ TUYẾT MAI</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>371817237</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/07/2020">01/07/2020</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title=""></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 1.3</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 16</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM I</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>tuyetmaikg97@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0938841859</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>21,636,450</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>2,051</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_556" class="profile_click" members_id="556">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_556" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>HUỲNH THỊ THU HÀ</td>
                                        <td>P-GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0777145134</td>
                                        <td>0</td>
                                        <td><b>36,284,600</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs">
                                                <li user_id="556" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_liabilities"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005601</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>HUỲNH THỊ THU HÀ</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>215312034</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/01/1970">01/01/1970</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title="xukashoponline.ecosite.vn">xukashoponline.ecosite.vn</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>P-GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 3.1</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 21</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM III</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>xukashop0103@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0777145134</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong>xukashoponline.ecosite.vn</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>Ân Thạnh, Hoài Ân, Bình Định</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>36,284,600</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>3,337</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong>Trụ sở Sài Gòn</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_628" class="profile_click" members_id="628">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_628" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>NGUYỄN ĐẶNG CAO NGUYÊN</td>
                                        <td>GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0938841859</td>
                                        <td>0</td>
                                        <td><b>21,636,450</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs nav-storing" style="margin: 0px;">
                                                <li user_id="628" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_liabilities hide"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005560</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>TRẦN THỊ TUYẾT MAI</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>371817237</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/07/2020">01/07/2020</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title=""></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 1.3</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 16</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM I</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>tuyetmaikg97@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0938841859</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>21,636,450</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>2,051</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_556" class="profile_click" members_id="556">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_556" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>HUỲNH THỊ THU HÀ</td>
                                        <td>P-GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0777145134</td>
                                        <td>0</td>
                                        <td><b>36,284,600</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs">
                                                <li user_id="556" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="556" class="p_tab_pro p_tab_liabilities"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005601</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>HUỲNH THỊ THU HÀ</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>215312034</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/01/1970">01/01/1970</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title="xukashoponline.ecosite.vn">xukashoponline.ecosite.vn</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>P-GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 3.1</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 21</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM III</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>xukashop0103@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0777145134</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong>xukashoponline.ecosite.vn</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>Ân Thạnh, Hoài Ân, Bình Định</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>36,284,600</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>3,337</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong>Trụ sở Sài Gòn</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_556">
                                                    <div class="notfoundIcon">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="row-members">
                                    <tr id="profile_click_628" class="profile_click" members_id="628">
                                        <td><label class="wrap-ace nomargin">
                                                <input class="ace" id="ck_item_628" type="checkbox">
                                                <span class="lbl"></span>
                                            </label></td>
                                        <td>ĐỖ THIÊN QUÂN</td>
                                        <td>GĐKD</td>
                                        <td>10/10/2019 &nbsp;10:30</td>
                                        <td>0938841859</td>
                                        <td>0</td>
                                        <td><b>21,636,450</b></td>
                                    </tr>
                                    <tr class="profile_info">
                                        <td colspan="9">
                                            <ul class="nav nav-tabs nav-storing" style="margin: 0px;">
                                                <li user_id="628" class="p_tab_pro p_tab_members_profile active"><a data-toggle="tab_infomation_profile">Khách hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_members_history "><a data-toggle="tab_infomation_history">Lịch sử bán/trả hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_infomation_order_booking "><a data-toggle="tab_infomation_order_booking">Đơn đặt hàng</a></li>
                                                <li user_id="628" class="p_tab_pro p_tab_liabilities hide"><a data-toggle="tab_liabilities">Công nợ</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab_pro tab_infomation_profile active top15">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <div class="img_avatar_profile">
                                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã khách hàng:</label>
                                                                        <div class="form-wrap"><strong>DS00005560</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tên khách:</label>
                                                                        <div class="form-wrap"><strong>TRẦN THỊ TUYẾT MAI</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">CMND:</label>
                                                                        <div class="form-wrap"><strong>371817237</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày sinh:</label>
                                                                        <div class="form-wrap"><strong title="01/07/2020">01/07/2020</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Website:</label>
                                                                        <div class="form-wrap"><strong title=""></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Nhóm khách hàng:</label>
                                                                        <div class="form-wrap"><strong>GĐKD</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Cụm:</label>
                                                                        <div class="form-wrap"><strong>HCM 1.3</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phòng kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM 16</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Khu vực kinh doanh:</label>
                                                                        <div class="form-wrap"><strong>HCM I</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Giám đốc kinh doanh:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Chi nhánh:</label>
                                                                        <div class="form-wrap"><strong>Hồ Chí Minh</strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người giới thiệu:</label>
                                                                        <div class="form-wrap"><strong>0908314344</strong></div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Mã số thuế:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Email:</label>
                                                                        <div class="form-wrap"><strong>tuyetmaikg97@gmail.com</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Điện thoại:</label>
                                                                        <div class="form-wrap"><strong>0938841859</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Facebook:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tỉnh Thành:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Quận/ Huyện:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Phường xã:</label>
                                                                        <div class="form-wrap"><strong>undefined</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Địa chỉ:</label>
                                                                        <div class="form-wrap"><strong>0</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Người tạo:</label>
                                                                        <div class="form-wrap"><strong>-</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ngày tạo:</label>
                                                                        <div class="form-wrap"><strong title="10/10/2019 &nbsp;10:30">10/10/2019</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng đã dùng:</label>
                                                                        <div class="form-wrap"><strong>21,636,450</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Tổng điểm:</label>
                                                                        <div class="form-wrap"><strong>2,051</strong></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label control-label ng-binding">Ghi chú:</label>
                                                                        <div class="form-wrap"><strong></strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <a class="btn btn-success members_edit" user_id="628"><img src="{$domain}images/save.png" class="relative-2" width="18">&nbsp;&nbsp;Cập nhật</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_history" id="member_transaction_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_infomation_order_booking" id="member_booking_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                                <div class="tab_pro tab_liabilities" id="liabilities_628">
                                                    <div class="notfoundIcon" style="color: #666;">
                                                        <img src="{$domain}images/notfoundIcon.png" width="50" style="margin: 20px 0px 10px;">
                                                        <p>Không tìm thấy kết quả nào phù hợp</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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