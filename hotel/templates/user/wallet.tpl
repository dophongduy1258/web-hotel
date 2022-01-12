<div class="profile z2">
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
                                    <b class="color-key">{$lWallet|@count}</b>
                                </div>
                            </div>
                        </div>
                        {if $lWallet|@count > 0}
                            {foreach from=$lWallet item=item key=key name=name}
                                <div class="box col-md-4 col-sm-6 col-xs-6">
                                    <div class="inner">
                                        <h2>{$item.wallet_name}</h2>
                                        <div class="body">
                                            <b class="color-blue">{$item.amount|number_format:"0":".":","}</b>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        {/if}
                    </div>
                    <div class="top5">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <select id="wallet_id" class="form-control">
                                    <option value="">Tất cả loại ví</option>
                                    {if $lWallet|@count > 0}
                                        {foreach from=$lWallet item=item key=key name=name}
                                            <option value="{$item.wallet_id}">{$item.wallet_name}</option>
                                        {/foreach}
                                    {/if}
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 top5">
                                <div class="relative">
                                    <input id="wallet_keyword" type="text" name="" placeholder="Người nhận/ chuyển"
                                        class="form-control">
                                    <button id="wallet_btn_view" class="btn btn-form"><span
                                            class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <nav class="text-center">
                    <div id="hd_page_html">
                        <div id="page_html">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>