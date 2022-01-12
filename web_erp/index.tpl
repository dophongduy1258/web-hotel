<!-- V2 Vicosop -->
{if $data.slide_top|@count > 0}
    <div class="header-slider">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 center">
                    <div class="iframe">
                        <div class="flexslider">
                            <ul class="slides" id="slide">
                                {foreach from=$data.slide_top item=it key=key}
                                    {if $it.banner != ''}
                                        <li>
                                            <a href="/{$it.cat_link}" style="{if $it.cat_link==''}pointer-events:none;{/if}"
                                                title="{$it.name}" class=""><img src="{$it.banner}" alt="{$it.name}" /></a>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 right">
                    <div class="iframe">
                        {foreach from=$data.banner_right_slide item=it key=key}
                            <div class="item1">
                                <a href="/{$it.cat_link}" title="{$it.name}"><img src="{$it.banner}" alt="{$it.name}" /></a>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
<div class="brand">
    <div class="container">
        <div class="owl">
            {assign var=x value=1}
            {foreach from=$data.theme item=item key=key}
                {if $item.slide_size == 'big'}
                    {foreach from=$item.category_1_list item=it key=key}
                        {if $x % 2 != 0}
                            <div class="item col-md-2">
                                {assign var=x value=2}
                            {else}
                                {assign var=x value=1}
                            {/if}
                            <a href="product" title="#"><img src="{$it.icon}" alt="#" /><span>{$it.name}</span></a>
                            {if $x % 2 != 0}
                            </div>
                        {/if}
                    {/foreach}
                {/if}
            {/foreach}
        </div>
    </div>
</div>

{foreach from=$data.theme item=item key=key}
    {if $item.slide_size != 'big'}
        {if $item.product_1_list|@count <= 0}
            {if $item.slide_list|@count <= 5}
                <div class="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 item">
                                <div class="owl-1">
                                    {foreach from=$item.slide_list item=banner key=key}
                                        <a href="/{$banner.cat_link}" title="{$banner.name}"><img src="{$banner.banner}"
                                                alt="{$banner.name}" /></a>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {else}
                <div class="banner banner-small-run">
                    <div class="container">
                        <div class="content">
                            <div class="block-title">
                                <h2 class="title"><a>Thương hiệu đồng hành cùng cộng tác viên</a></h2>
                                <div class="clear"></div>
                            </div>
                            <div class="row">
                                {foreach from=$item.slide_list item=banner key=key}
                                    {if $banner@iteration == 1}
                                        <div class="col-md-3 col-sm-3 col-xs-12 banner-cate">
                                            <a href="/{$banner.cat_link}" title="{$banner.name}"><img src="{$banner.banner}"
                                                    alt="{$banner.name}" /></a>

                                        </div>
                                    {/if}
                                {/foreach}
                                <div class="col-md-9 col-sm-9 col-xs-12 banner-product">
                                    <div class="row">
                                        <div class="owl-3">
                                            {assign var=x value=1}
                                            {foreach from=$item.slide_list item=banner key=key}
                                                {if $banner@iteration > 1}
                                                    {if $x % 2 != 0}
                                                        <div class="col-md-4 item">
                                                            {assign var=x value=2}
                                                        {else}
                                                            {assign var=x value=1}
                                                        {/if}
                                                        <div class="img">
                                                            <a href="/{$banner.cat_link}" title="{$banner.name}"><img src="{$banner.banner}"
                                                                    alt="{$banner.name}" /></a>
                                                        </div>
                                                        {if $x % 2 != 0}
                                                        </div>
                                                    {/if}
                                                {/if}
                                            {/foreach}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        {else}
            <div class="content-product">
                <div class="container">
                    <div class="content">
                        <div class="block-content">
                            <div class="row">
                                {if $item.slide_list|@count > 0}
                                    <div
                                        class="col-md-3 col-sm-3 col-xs-12 img-cate {if $item.slide_size == 'slideright'}pull-right{/if}">
                                        <div class="owl-1">
                                            {foreach from=$item.slide_list item=banner key=key}
                                                <a href="/{$banner.cat_link}" title="{$banner.name}"><img src="{$banner.banner}"
                                                        alt="{$banner.name}" /></a>
                                            {/foreach}
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 img-product">
                                    {else}
                                        <div class="col-md-12 col-sm-12 col-xs-12 img-product">
                                        {/if}
                                        <div class="block-title">
                                            <h2 class="title"><a
                                                    style="{if $item.product_1_list|@count == 0}pointer-events:none;{/if}"
                                                    href="/{$item.cat_link}-c{if $item.category_1 != '0'}{$item.category_1}{else}{$item.product_1}{/if}"
                                                    title="{$item.name}">{$item.name}</a></h2>
                                            {if $item.category_1_list|@count > 0}
                                                <ul class="sub-title">
                                                    {foreach from=$item.category_1_list item=items key=key}
                                                        <li><a href="/{$items.cat_link}-c{$items.id}"
                                                                style="{if $items.cat_link==''}pointer-events:none;{/if}"
                                                                title="{$items.name}">{$items.name}</a></li>
                                                    {/foreach}
                                                </ul>
                                            {/if}
                                            <a href="/{$item.cat_link}-c{if $item.category_1 != '0'}{$item.category_1}{else}{$item.product_1}{/if}"
                                                title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"></i></a>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="row">
                                            <div class="owl-4">
                                                {assign var=x value=1}
                                                {foreach from=$item.product_1_list item=product key=key}
                                                    {if $item.layout.product_row < 2}
                                                        <div class="col-md-3 item">
                                                        {else}
                                                            {if $x % 2 != 0}
                                                                <div class="col-md-3 item">
                                                                    {assign var=x value=2}
                                                                {else}
                                                                    {assign var=x value=1}
                                                                {/if}
                                                            {/if}
                                                            <div class="iframe">
                                                                <div class="img">
                                                                    <a href="/{$product.product_link}-p{$product.unique_id}"
                                                                        title="{$product.product_name}"><img src="{$product.image}"
                                                                            alt="{$product.product_name}" /></a>
                                                                </div>
                                                                <div class="info">
                                                                    <h3><a href="/{$product.product_link}-p{$product.unique_id}"
                                                                            title="{$product.product_name}">{$product.product_name}</a>
                                                                    </h3>
                                                                    <p class="price">{$product.price|number_format:"0":".":","}<font>đ
                                                                        </font>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            {if $item.layout.product_row < 2}
                                                            </div>
                                                        {else}
                                                            {if $x % 2 != 0}
                                                            </div>
                                                        {/if}
                                                    {/if}
                                                {/foreach}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
        {/if}
    {/foreach}

    <section class="block-news block-news-home">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="news" title="#">Câu chuyện thương hiệu</a></h2>
                <ul class="sub-title">
                    <li><a href="news" title="#">Kinh doanh online</a></li>
                    <li><a href="news" title="#">Ý tưởng kình doanh</a></li>
                    <li><a href="news" title="#">Xu hướng</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-left">
                        <div class="item">
                            <a href="news-detail"
                                title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                                <img src="{$domain}/images/news1.png"
                                    alt="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">
                            </a>
                            <div class="wrap-info">
                                <h3><a href="news-detail"
                                        title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">Tại
                                        sao
                                        dừa sáp lại đắt? Tại sao giá lại quá cao?</a></h3>
                                <div class="time">
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>09:22 AM 18/09/2017</span>
                                </div>
                                <div class="info">Tại sao dừa sáp lại đắt là câu hỏi mà rất nhiều người quan tâm
                                    hiện
                                    nay.
                                    Với giá một quả dừa sáp dao động từ 150 đến hơn 200 nghìn đồng một quả, có nơi
                                    giá
                                    bán
                                    lên đến 300</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-center">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                <div class="item">
                                    <a href="news-detail" title="Ông tổ nghề nail ở Czech" class="img">
                                        <img src="{$domain}/images/news2.jpeg" alt="Ông tổ nghề nail ở Czech">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="/ong-chu-viet-so-huu-20-tiem-nail-o-cong-hoa-sec-d73906/"
                                                title="Ông tổ nghề nail ở Czech">Lợi ích sức khỏe và dinh dưỡng của
                                                CACAO</a></h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>04:00 PM
                                                22/08/2017</span>
                                        </div>
                                        <div class="info">Cacao được sử dụng lần đầu tiên tại nền văn minh Maya ở
                                            Trung
                                            Mỹ.
                                            Nó bắt đầu được sử dụng ở châu Âu vào thế kỷ 16 và nhanh chóng trở nên
                                            phổ
                                            biến
                                            như một loại thuốc tăng</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                <div class="item">
                                    <a href="news-detail" title="Trồng dưa lưới công nghệ Israel" class="img">
                                        <img src="{$domain}/images/news3.jpeg" alt="Trồng dưa lưới công nghệ Israel">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="news-detail" title="Trồng dưa lưới công nghệ Israel">Trồng dưa
                                                lưới
                                                công nghệ Israel</a></h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>04:00 PM
                                                22/08/2017</span>
                                        </div>
                                        <div class="info">Dù đầu tư ban đầu lớn nhưng mô hình này có nhiều ưu việt,
                                            hiệu
                                            quả
                                            kinh tế cao, mở ra hướng sản xuất nông nghiệp bền vững trong điều kiện
                                            biến
                                            đổi
                                            khí hậu.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                <div class="item">
                                    <a href="news-detail" title="Làm thế nào biến Kiến thức là một loại tiền mới?"
                                        class="img">
                                        <img src="{$domain}/images/news4.jpeg"
                                            alt="Làm thế nào biến Kiến thức là một loại tiền mới?">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="news-detail"
                                                title="Làm thế nào biến Kiến thức là một loại tiền mới?">Làm thế nào
                                                biến
                                                Kiến thức là một loại tiền mới?</a></h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>04:00 PM
                                                22/08/2017</span>
                                        </div>
                                        <div class="info">KIẾN THỨC LÀ MỘT LOẠI TIỀN MỚI. Tất cả chúng ta đều có thể
                                            dễ
                                            dàng
                                            học vốn kiến thức hàng ngày từ Facebook, Youtube, Google, hội thảo, khoá
                                            học, từ
                                            rất nhiều người bạn gặp với các bài học thành công, thất bại trong cuộc
                                            sống.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 wrap-item">
                                <div class="item">
                                    <a href="news-detail"
                                        title="Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?" class="img">
                                        <img src="{$domain}/images/news5.jpeg"
                                            alt="Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?">
                                    </a>
                                    <div class="wrap-info">
                                        <h3><a href="news-detail"
                                                title="Mạng xã hội đã và đang thay đổi Nghề Nails như thế nào?">Mạng
                                                xã
                                                hội
                                                đã và đang thay đổi Nghề Nails như thế nào?</a></h3>
                                        <div class="time">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>04:00 PM
                                                22/08/2017</span>
                                        </div>
                                        <div class="info">Tuy Facebook ra đời đã 13 năm nhưng chỉ cho đến gần đây
                                            sau
                                            khi
                                            nhóm “All about Nghề Nails” ra đời, thì mạng xã hội đã tạo nên một cơn
                                            sốt
                                            thần
                                            kỳ và nhanh chóng đến cộng đồng Nails người Việt.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item news-right">
                        <div class="item">
                            <a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                                <img src="{$domain}/images/news6.jpeg" alt="TEKNAILS - KHÁT VỌNG VƯƠN XA">
                            </a>
                            <h3><a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">Tại sao dừa sáp lại đắt?
                                    Tại
                                    sao
                                    giá lại quá cao?</a></h3>
                        </div>
                        <div class="item">
                            <a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                                <img src="{$domain}/images/news7.jpeg" alt="TEKNAILS - KHÁT VỌNG VƯƠN XA">
                            </a>
                            <h3><a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">Lợi ích sức khỏe và dinh
                                    dưỡng
                                    của CACAO</a></h3>
                        </div>
                        <div class="item">
                            <a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                                <img src="{$domain}/images/news8.jpeg" alt="TEKNAILS - KHÁT VỌNG VƯƠN XA">
                            </a>
                            <h3><a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">Khi nào dừa sáp bị hư –
                                    hỏng
                                    –
                                    thối?</a></h3>
                        </div>
                        <div class="item">
                            <a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                                <img src="{$domain}/images/news2.jpeg" alt="TEKNAILS - KHÁT VỌNG VƯƠN XA">
                            </a>
                            <h3><a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">Tặng 15000 túi kẹo dừa
                                    sáp
                                    cho bà
                                    con vùng bị phong tỏa cách ly</a></h3>
                        </div>
                        <div class="item">
                            <a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA" class="img">
                                <img src="{$domain}/images/news3.jpeg" alt="TEKNAILS - KHÁT VỌNG VƯƠN XA">
                            </a>
                            <h3><a href="news-detail" title="TEKNAILS - KHÁT VỌNG VƯƠN XA">Đồng Tháp: Tiếp tục
                                    “Chuyến
                                    xe
                                    nghĩa tình” và khởi động Hành trình “Hạt gạo nghĩa tình” chung tay vượt qua
                                    Covid</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-news block-news-home">
        <div class="container">
            <div class="block-title block-title-news">
                <h2 class="title"><a href="news" title="#">Video thương hiệu</a></h2>
                <div class="clear"></div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 wrap-item video">
                        <div class="item">
                            <a href="news-detail"
                                title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                                <img src="{$domain}/images/news1.png"
                                    alt="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 wrap-item video">
                        <div class="item">
                            <a href="news-detail"
                                title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                                <img src="{$domain}/images/news2.jpeg"
                                    alt="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 wrap-item video">
                        <div class="item">
                            <a href="news-detail"
                                title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                                <img src="{$domain}/images/news3.jpeg"
                                    alt="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 wrap-item video">
                        <div class="item">
                            <a href="news-detail"
                                title="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí" class="img">
                                <img src="{$domain}/images/news4.jpeg"
                                    alt="Hoài Linh hỗ trợ học trò em trai đăng quang Tuyệt đỉnh song ca nhí">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-news block-news-dmtc">
        <div class="container">
            <div class="wrap-item">
                <div class="item">
                    <div class="img"><img src="{$domain}/images/dmtc1.png" /></div>
                    <h3>Không cọc viên, không bỏ vốn</h3>
                    <div class="info">Cộng tác viên online chỉ cần đăng bán Vicosap thu cod khách hàng</div>
                </div>
                <div class="item">
                    <div class="img"><img src="{$domain}/images/dmtc2.png" /></div>
                    <h3>Không cần đóng gói giao hàng</h3>
                    <div class="info">Vicosap chịu trách nhiệm đóng gói và giao hàng</div>
                </div>
                <div class="item">
                    <div class="img"><img src="{$domain}/images/dmtc3.png" /></div>
                    <h3>Chiết khấu tốt nhất</h3>
                    <div class="info">Cộng tác viên và đại lý online được hưởng chiết khấu tốt nhất</div>
                </div>
                <div class="item">
                    <div class="img"><img src="{$domain}/images/dmtc4.png" /></div>
                    <h3>Bài viết mẫu cập nhật liên tục</h3>
                    <div class="info">Bài viết mẫu được cập nhật thường xuyên, CTV dể dàng đăng bán</div>
                </div>
                <div class="item">
                    <div class="img"><img src="{$domain}/images/dmtc5.png" /></div>
                    <h3>Đội ngũ hỗ trợ 24/7</h3>
                    <div class="info">Cộng tác viên và đại lý online được hưởng chiết khấu tốt nhất</div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-app download-app-home">
        <div class="container">
            <h2>Tải ứng dụng Vicosap để bắt đầu kinh doanh online ngay!</h2>
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12"></div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="text-center"><img
                            src="{$link_qrweb}"
                            alt="{$meta_title}" class="" width="240"></div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 down_app">
                    <a href="{$link_ios}" target="_blank"><img
                            src="{$domain}/images/app_apple.jpg" alt=""
                            class="img-responsive"></a>
                    <a href="{$link_android}" target="_blank"><img
                            src="{$domain}/images/app_google.jpg" alt=""
                            class="img-responsive"></a>
                </div>
            </div>
        </div>
    </section>
<!-- END V2 Vicosap -->