<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-paymentcard">
                    <h3 class="title-profile">Quản lý ví điểm</h3>
                    <div class="box-wallet">
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Số ví</h2>
                                <div class="body">
                                    <b class="color-key">6</b>
                                </div>
                            </div>
                        </div>
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Ví Dcash</h2>
                                <div class="body">
                                    <b class="color-blue">10,000,000</b>
                                </div>
                            </div>
                        </div>
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Ví Dpoint</h2>
                                <div class="body">
                                    <b class="color-blue">100,000,000</b>
                                </div>
                            </div>
                        </div>
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Ví chính</h2>
                                <div class="body">
                                    <b class="color-blue">150,000,000</b>
                                </div>
                            </div>
                        </div>
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Ví chia sẻ</h2>
                                <div class="body">
                                    <b class="color-blue">5,000,000</b>
                                </div>
                            </div>
                        </div>
                        <div class="box col-md-4 col-sm-6 col-xs-6">
                            <div class="inner">
                                <h2>Ví hoàn tiền</h2>
                                <div class="body">
                                    <b class="color-green">2,000,000</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top5">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <select id="wallet_id" class="form-control">
                                    <option value="">Tất cả ví</option>
                                    <option value="1">Ví chính Dcash</option>
                                    <option value="2">Ví Dpoint</option>
                                    <option value="102">DCredit</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <div class="relative">
                                    <input id="wallet_keyword" type="text" name="" placeholder="Người nhận/ chuyển" class="form-control">
                                    <button id="wallet_btn_view" class="btn btn-form"><span class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
                                        <!--Xem-->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">ID</th>
                                        <th>Ngày giao dịch</th>
                                        <th>Ví</th>
                                        <th>Họ &amp; Tên</th>
                                        <th>SĐT</th>
                                        <th class="text-right">Giá trị</th>
                                        <th>Nội dung</th>
                                    </tr>
                                </thead>
                                <tbody id="wallet_list">
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">53</td>
                                        <td>01/06/2021 &nbsp;09:14</td>
                                        <td>Ví chính</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-green">1,000,000</b>
                                        </td>
                                        <td>a</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">44</td>
                                        <td>10/05/2021 &nbsp;15:51</td>
                                        <td>DCredit</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-green">987,000,000</b>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">35</td>
                                        <td>10/05/2021 &nbsp;15:13</td>
                                        <td>Ví chính</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-red">1,320,000</b>
                                        </td>
                                        <td>Khách tự gia hạn</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">33</td>
                                        <td>10/05/2021 &nbsp;15:12</td>
                                        <td>Ví chính</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-green">999,999,999</b>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">53</td>
                                        <td>01/06/2021 &nbsp;09:14</td>
                                        <td>Ví chính</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-green">1,000,000</b>
                                        </td>
                                        <td>a</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">44</td>
                                        <td>10/05/2021 &nbsp;15:51</td>
                                        <td>DCredit</td>
                                        <td>DStore Global</td>
                                        <td>0972558191111</td>
                                        <td class="text-right">
                                            <b class="color-green">987,000,000</b>
                                        </td>
                                        <td></td>
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