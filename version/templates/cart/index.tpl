<section class="container">
    <div class="cart order cart_checkout">
        <div class="wrap-block-title">
            <div class="block-title">
                <h3>Thông tin đơn hàng</h3>
            </div>
        </div>
        <div class="white-box">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="right">
                        <h3>Giỏ hàng</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="lProduct"></tbody>
                            </table>
                        </div>
                        <a href="/san-pham" title="" class="cart-change">Tiếp tục xem sản phẩm</a>
                    </div>
                    <div class="text-right">
                        <!-- <button class="btn" type="submit" name="continue">Mua hàng ngay</button> -->
                        <a href="#" class="btn btn-key btn-width" type="submit" id="submitOrder" name="continue">Mua hàng</a>
                    </div>
                </div>
                {* <div class="col-md-6 col-sm-6 col-xs-12 left">
                    <h3>Thông tin giao hàng</h3>
                    <p>Bạn hãy điền thông tin bên dưới nhé!</p>
                    <div class="form-default">
                        <form method="post" action="" class="">
                            <div class="form-group">
                                <label>Họ và tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" maxlength="45"
                                    autocomplete="off" placeholder="Họ và tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <!-- <label>Email <font color="#e5101d">*</font></label> -->
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" maxlength="100"
                                    autocomplete="off" placeholder="Email">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="10"
                                    autocomplete="off" placeholder="Số điện thoại">
                                <span class="error"></span>
                            </div>
                            <div class="form-group {if !isset($opt_address)}hide{/if}">
                                <div class="col-sm-6">
                                    <label>Số địa chỉ <font color="#e5101d">*</font></label>
                                        <input type="radio" style="width: 24px;" id="addressBook" checked name="radioAddress"
                                            value="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Địa chỉ mới <font color="#e5101d">*</font></label>
                                        <input type="radio" style="width: 24px;" id="addressNew" name="radioAddress" value="">
                                </div>

                            </div>
                            <div class="form-group addressBook {if !isset($opt_address)}hide{/if}">
                                <label>Địa chỉ nhận hàng <font color="#e5101d">*</font></label>
                                <select class="form-control" id="address_id" name="address_id">
                                    <!-- <option value="" selected>Chọn địa chỉ nhận hàng</option> -->
                                    {if isset($opt_address)}{$opt_address}{/if}
                                </select>
                                <span class="error"></span>
                            </div>
                            <div class="addressNew {if isset($opt_address)}hide{/if}">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Tỉnh / thành phố <font color="#e5101d">*</font></label>
                                            <select class="form-control" id="province" name="province"
                                                onchange="loadDistrict()">
                                                <option value="" selected>Tất cả tỉnh/ thành</option>
                                                {$opt_city}
                                            </select>
                                            <span class="error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 nopadding">
                                        <div class="form-group">
                                            <label>Quận / huyện <font color="#e5101d">*</font></label>
                                            <select class="form-control" id="district" name="district"
                                                onchange="loadWard()">
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
                                    <input type="text" class="form-control" id="street" name="street" maxlength="100"
                                        autocomplete="off" value="" placeholder="Tên đường, số nhà">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="show">Ghi chú</label>
                                <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                            </div>
                            <div class="form-group">
                                <!-- <button class="btn" type="submit" name="continue">Mua hàng ngay</button> -->
                                <a href="#" class="btn btn-key btn-width" type="submit" id="submitOrder"
                                    name="continue">Mua hàng ngay</a>
                            </div>
                        </form>
                    </div>
                </div> *}
            </div>
        </div>
    </div>
</section>