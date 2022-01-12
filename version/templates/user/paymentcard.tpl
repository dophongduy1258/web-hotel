<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-paymentcard">
                    <h3 class="title-profile">Quản lý ngân hàng</h3>
                    <div class="add-address"><a id="btn_add_paymentcard"><i class="fa fa-plus" aria-hidden="true"></i> Thêm ngân hàng mới</a></div>
                    <div class="form-add-address form-default" id="form-add-address">
                        <ul class="bankdefault" id="bankdefault">
                        {foreach from=$lBank item=item key=key}
                            <li onclick="thePage.selectBank({$item.id});" data-name=""><img src="{$item.icon}" alt="#"></li>
                        {/foreach}
                            {* <li data-name="Ngân hàng TMCP Kỹ thương Việt Nam (TCB)"><img src="{$domain}images/bankdefault/techcombank.jpg" alt="#"></li>
                            <li data-name="Ngân hàng thương mại cổ phần Ngoại thương Việt Nam (VCB)"><img src="{$domain}images/bankdefault/vietcombank.jpg" alt="#"></li>
                            <li data-name="Ngân hàng Thương mại cổ phần Công Thương Việt Nam (VTB)"><img src="{$domain}images/bankdefault/viettinbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/mbbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/acb.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/ABBank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/agribank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/baca.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/banviet.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/baoviet.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/bidv.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/Eximbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/gpbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/hdbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/idvbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/kienlong.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/lienviet.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/msb.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/namabank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/ncb.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/ocb.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/oceanbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/pgbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/publicbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/pvcombank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/sacombank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/saigon.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/seabank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/shb.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/shinhan.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/tpbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/uob.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/vib.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/viet-ngabank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/vieta.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/vietbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/vpbank.jpg" alt="#"></li>
                            <li><img src="{$domain}images/bankdefault/woori.jpg" alt="#"></li> *}
                        </ul>
                        <input type="text" id="bank_id" class="hide">
                        <form action="" method="post">
                            <div class="namebank"></div>
                            <div class="form-group">
                                <label>Họ & tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="fullname" id="fullname" maxlength="45" value="" placeholder="Nhập họ & tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số tài khoản <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="number" id="number" maxlength="45" value="" placeholder="Nhập số tài khoản">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-key" type="submit" id="btn_save_paymentcard">Thêm ngân hàng</button>
                            </div>
                        </form>
                    </div>
                    <ul id="listBankInfo">
                        {* <li>
                            <div class="item">
                                <div class="img"><img src="{$domain}images/bankdefault/techcombank.jpg" alt="#"></div>
                                <p><b>Số tài khoản: </b>19033743209016</p>
                                <p><b>Họ &amp; tên: </b>Nguyễn Thành Tân</p>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="img"><img src="{$domain}images/bankdefault/agribank.jpg" alt="#"></div>
                                <p><b>Số tài khoản: </b>0251002717858</p>
                                <p><b>Họ &amp; tên: </b>Nguyễn Thành Tân</p>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                            <div class="img"><img src="{$domain}images/bankdefault/bidv.jpg" alt="#"></div>
                                <p><b>Số tài khoản: </b>0881000468479</p>
                                <p><b>Họ &amp; tên: </b>Nguyễn Thành Tân</p>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="img"><img src="{$domain}images/bankdefault/techcombank.jpg" alt="#"></div>
                                <p><b>Số tài khoản: </b>19033743209016</p>
                                <p><b>Họ &amp; tên: </b>Nguyễn Thành Tân</p>
                                <a class="delete">Xoá</a>
                            </div>
                        </li> *}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>