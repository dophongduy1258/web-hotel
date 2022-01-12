<div class="profile z2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                {include "`$tpldirect`user/menu.tpl"}
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-order" id="formOrder">
                    <h3 class="title-profile" id="totalRecordOrder"></h3>
                    <div class="info-order-detail" id='lOrder'>
                        <ul class="title">
                            <li class="img">Hình ảnh</li>
                            <li class="code">Mã ĐH</li>
                            <li class="date">Ngày mua</li>
                            <li class="price">Tổng tiền</li>
                            <li class="status">Trạng thái</li>
                        </ul>
                    </div>
                </div>
                <div class="item info-order" id="formDetail" style="display: none;">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <h3 class="title-profile" id="orderID"></h3>
                    <div class="info-order-detail" id='lProduct'>
                        <ul class="title">
                            <li class="img">Hình ảnh</li>
                            <li class="content">Tên sản phẩm</li>
                            <li class="price">Giá</li>
                            <li class="date">Ngày mua</li>
                            <li class="code">Mã ĐH</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>