<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-paymentcard">
                    <h3 class="title-profile">Quản lý ngân hàng</h3>
                    <div class="add-address" id="add-address"><a id="btn_add_paymentcard"><i class="fa fa-plus" aria-hidden="true"></i> Thêm ngân hàng mới</a></div>
                    <div class="form-add-address form-default" id="form-add-address">
                        <ul class="bankdefault" id="bankdefault">
                        {foreach from=$lBank item=item key=key}
                            <li onclick="thePage.selectBank({$item.id});" data-name=""><img src="{$item.icon}" alt="#"></li>
                        {/foreach}
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
                                <label>Chi nhánh <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="branch" id="branch" maxlength="45" value="" placeholder="Nhập chi nhánh">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Tỉnh thành <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="city" id="city" maxlength="45" value="" placeholder="Nhập tỉnh thành">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-key" type="submit" id="btn_save_paymentcard">Thêm ngân hàng</button>
                            </div>
                        </form>
                    </div>
                    <ul id="listBankInfo"></ul>
                </div>
            </div>
        </div>
    </div>
</div>