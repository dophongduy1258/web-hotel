<div class="container z2">
    <div class="white-box contact">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="form-login">
                    <form class="form-horizontal" method="post">
                        <h2 class="box-title2 text-uppercase">Thông tin liên hệ</h2>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{$setup.company_address}</p>
                        <p><a href="tel:{$setup.company_phone}"><i class="fa fa-phone" aria-hidden="true"></i>{$setup.company_phone}</a></p>
                        <p><a href="mailto:{$setup.company_email}"><i class="fa fa-send" aria-hidden="true"></i>{$setup.company_email}</a></p>
                        <h2 class="box-title2 text-uppercase">Gửi thông tin</h2>
                        <div class="form-input">
                            <label>Họ & tên</label>
                            <input type="text" id='fullname' class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Email</label>
                            <input type="text" id='email' class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Số điện thoại</label>
                            <input type="text" id='mobile' maxlength="15" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Nội dung</label>
                            <textarea id='content'></textarea>
                        </div>
                        <div class="form-input text-center">
                            <button type="submit" id='submitInfo' class="btn btn-key btn-width100">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <h2 class="box-title2 text-uppercase">Maps</h2>
                {$setup.link_google_map}
            </div>
        </div>
    </div>
</div>