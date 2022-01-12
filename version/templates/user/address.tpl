<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-address">
                    <h3 class="title-profile">Sổ địa chỉ</h3>
                    <div class="add-address"><a><i class="fa fa-plus" aria-hidden="true"></i> Thêm địa chỉ mới</a></div>
                    <div class="form-add-address form-default">
                        <form action="" method="">
                            <div class="form-group">
                                <label>Họ và tên <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="fullname" maxlength="45" autocomplete="off" placeholder="Họ và tên">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="phone" maxlength="11" autocomplete="off" placeholder="Số điện thoại">
                                <span class="error"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tỉnh / thành phố <font color="#e5101d">*</font></label>
                                        <select class="form-control" name="province">
                                            <option value="1" selected="">Hồ Chí Minh</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 nopadding">
                                    <div class="form-group">
                                        <label>Quận / huyện <font color="#e5101d">*</font></label>
                                        <select class="form-control" name="district">
                                            <option value="7" selected="">Quận 7</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Phường / xã <font color="#e5101d">*</font></label>
                                        <select class="form-control" name="ward">
                                            <option value="Phường Tân Phú" selected="">Phường Tân Phú</option>
                                        </select>
                                        <span class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tên đường, số nhà <font color="#e5101d">*</font></label>
                                <input type="text" class="form-control" name="street" maxlength="100" autocomplete="off" value="1242 Huỳnh Tấn Phát" placeholder="Tên đường, số nhà">
                                <span class="error"></span>
                            </div>
                            <label class="switch">
                                <input type="checkbox" value="1" name="default">
                                <span></span> Đặt làm mặc định
                            </label>
                            <div class="form-group">
                                <button class="btn btn-width btn-key" type="submit" name="continue">Thêm địa chỉ</button>
                            </div>
                        </form>
                    </div>
                    <ul>
                        <li>
                            <div class="name">NGUYỄN THÀNH TÂN <span><i class="fa fa-check-square-o" aria-hidden="true"></i> Địa chỉ mặc định</span></div>
                            <div class="ad"><b>Địa chỉ:</b> 1242 Huỳnh Tấn Phát, Phường Tân Phú, Quận 7, Hồ Chí Minh</div>
                            <div class="phone"><b>Điện thoại:</b> 0976674647</div>
                            <div class="action">
                                <a class="edit">Chỉnh sửa</a>
                            </div>
                        </li>
                        <li>
                            <div class="name">NGUYỄN THÀNH TÂN</div>
                            <div class="ad"><b>Địa chỉ:</b> 1242 Huỳnh Tấn Phát, Phường Tân Phú, Quận 7, Hồ Chí Minh</div>
                            <div class="phone"><b>Điện thoại:</b> 0976674647</div>
                            <div class="action">
                                <a class="edit">Chỉnh sửa</a>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                        <li>
                            <div class="name">NGUYỄN THÀNH TÂN</div>
                            <div class="ad"><b>Địa chỉ:</b> B82 Bạch Đằng, Phường 02, Quận Tân Bình, Hồ Chí Minh</div>
                            <div class="phone"><b>Điện thoại:</b> 0932 337 147</div>
                            <div class="action">
                                <a class="edit">Chỉnh sửa</a>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                        <li>
                            <div class="name">NGUYỄN THÀNH TÂN</div>
                            <div class="ad"><b>Địa chỉ:</b> 1242 Huỳnh Tấn Phát, Phường Tân Phú, Quận 7, Hồ Chí Minh</div>
                            <div class="phone"><b>Điện thoại:</b> 0976674647</div>
                            <div class="action">
                                <a class="edit">Chỉnh sửa</a>
                                <a class="delete">Xoá</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>