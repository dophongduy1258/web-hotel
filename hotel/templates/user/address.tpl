<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-address">
                    <h3 class="title-profile">Sổ địa chỉ</h3>
                    <div class="add-address"><a><i class="fa fa-plus" aria-hidden="true"></i> Thêm địa chỉ mới</a></div>
                    <div class="form-add-address form-default" id="form-add-address">
                        <div class="">
                            <input type="text" class="form-control hide" id="id" name="id" value="">
                            <div class="form-group">
                                <label>Họ và tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" maxlength="45"
                                    autocomplete="off" placeholder="Họ và tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="15" autocomplete="off"
                                    placeholder="Số điện thoại">
                                <span class="error"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tỉnh / thành phố <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="province" name="province" onchange="loadDistrict()">
                                            <option value="" selected>Tất cả tỉnh/ thành</option>
                                            {$opt_city}
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 nopadding">
                                    <div class="form-group">
                                        <label>Quận / huyện <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="district" name="district" onchange="loadWard()">
                                            <option value="" selected>Chọn quận/ huyện</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Phường / xã <font color="#e5101d">*</font></label>
                                        <select class="form-control" id="ward" name="ward">
                                            <option value="" selected>Chọn xã/ phường</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tên đường, số nhà <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="street" name="street" maxlength="100" autocomplete="off"
                                    value="" placeholder="Tên đường, số nhà">
                                <span class="error"></span>
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="is_default" value="1" name="default">
                                <span></span> Đặt làm mặc định
                            </label>
                            <div class="form-group">
                                <button class="btn btn-width btn-key" id="submitAddress" type="submit" name="continue">Thêm địa
                                    chỉ</button>
                            </div>
                        </div>
                    </div>
                    <ul id="lAddress"></ul>
                </div>
            </div>
        </div>
    </div>
</div>