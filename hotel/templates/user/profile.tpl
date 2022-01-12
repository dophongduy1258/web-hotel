<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-profile">
                    <h3 class="title-profile">Thông tin tài khoản</h3>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="form-default">
                                <div class="form-action">
                                    <div class="form-group">
                                        <label>Họ và tên <font color="#e5101d">*</font></label>
                                        <input type="text" id="fullname" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại <font color="#e5101d">*</font></label>
                                        <input type="text" id="mobile" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email <font color="#e5101d">*</font></label>
                                        <input type="text" id="email" class="form-control form-info"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính <font color="#e5101d">*</font></label>
                                        <label class="wrap-ace">
                                            <input id="male" name="radio_gt" class="ace form-info" value="1" type="radio">
                                            <span class="lbl active"></span>Nam
                                        </label>
                                        <label class="wrap-ace">
                                            <input id="female" name="radio_gt" class="ace form-info" value="0" type="radio">
                                            <span class="lbl"></span>Nữ
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh <font color="#e5101d">*</font></label>
                                        <input id="birthday" class="form-control form-info" type="text" name="">
                                    </div>
                                    <div class="form-group">
                                        <label>Link giới thiệu mua hàng <font color="#e5101d">*</font> <button class="btn-share" id="btnCopy">Copy link</button></label>
                                        <input type="text" class="form-control form-info" id="link" value="{$rewrite_url}san-pham-rf{if isset($session.username_client)}{$session.username_client}{/if}" />
                                    </div>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <p class="nomargin"><b><font size="3">THAY ĐỔI MẬT KHẨU</font></b></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input type="text" id="oldPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="text" id="newPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="text" id="confirmPass" class="form-control form-info" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-key btn-width" id="btn_update_info">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>