<div class="profile">
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
                                <form class="form-action">
                                    <div class="form-group">
                                        <label>Họ và tên <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="{if isset($session.fullname_client)}{$session.fullname_client}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="{if isset($session.mobile_client)}{$session.mobile_client}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email <font color="#e5101d">*</font></label>
                                        <input type="text" class="form-control"
                                            value="{if isset($session.email_client)}{$session.email_client}{/if}" />
                                    </div>
                                    {* <div class="form-group">
                                        <label>Giới tính <font color="#e5101d">*</font></label>
                                        <label class="wrap-ace">
                                            <input name="radio_gt" checked="" class="ace" type="radio">
                                            <span class="lbl active"></span>Nam
                                        </label>
                                        <label class="wrap-ace">
                                            <input name="radio_gt" class="ace" type="radio">
                                            <span class="lbl"></span>Nữ
                                        </label>
                                    </div> *}
                                    <div class="form-group">
                                        <label>Ngày sinh <font color="#e5101d">*</font></label>
                                        <input type="date" class="form-control"
                                            value="{if isset($session.birthday_client)}{$session.birthday_client}{else}{/if}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Link giới thiệu mua hàng <font color="#e5101d">*</font> <button class="btn-share" id="btnCopy">Copy link</button></label>
                                        <input type="text" class="form-control" id="link" value="{$rewrite_url}san-pham-rf{if isset($session.username_client)}{$session.username_client}{/if}" />
                                    </div>
                                    {* <div class="form-group">
                                        <p class="nomargin"><b><font size="3">THAY ĐỔI MẬT KHẨU</font></b></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu củ</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-key btn-width">Cập nhật</button>
                                    </div> *}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>