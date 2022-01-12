    <div class="menu-top-bottom">
        <ul>
            {$menu_suggest}
            {* <li><a href="?m=home&act=index">Trang chủ</a></li>
            <li><a href="?m=about&act=index">Giới thiệu</a></li>
            <li><a href="?m=product&act=index">Sản phẩm</a></li>
            <li><a href="?m=news&act=index">Tin Tức</a></li>
            <li><a href="?m=contact&act=index">Liên hệ</a></li> *}
        </ul>
    </div>
    <footer>
        <div class="container">
            <div class="menu-bottom">
                <div class="row">
                    {$menu_bottom}
                    {* <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <h3 class="title"><a href="" title="How to Buy" target="_self">How to Buy</a></h3>
                            <ul>
                                <li><a href="" title="" target="_self">Making Payments</a></li>
                                <li><a href="" title="" target="_self">Delivery Options</a></li>
                                <li><a href="" title="" target="_self">Buyer Protection</a></li>
                                <li><a href="" title="" target="_self">New User Guide</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <h3 class="title"><a href="" title="Customer Service" target="_self">Customer Service</a>
                            </h3>
                            <ul>
                                <li><a href="" title="" target="_self">Customer Service</a></li>
                                <li><a href="" title="" target="_self">Transaction Service Agreement</a></li>
                                <li><a href="" title="" target="_self">Take Our Survey</a></li>
                                <li><a href="" title="" target="_self">Organization &amp; Technical Support</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <h3 class="title"><a href="" title="Partner Promotion" target="_self">Partner Promotion</a>
                            </h3>
                            <ul>
                                <li><a href="" title="" target="_self">Partnerships</a></li>
                                <li><a href="" title="" target="_self">Affiliate Program</a></li>
                                <li><a href="" title="" target="_self">Nhà hàng</a></li>
                                <li><a href="" title="" target="_self">Sự kiện</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <h3 class="title"><a href="" title="How to Buy" target="_self">How to Buy</a></h3>
                            <ul>
                                <li><a href="" title="" target="_self">Making Payments</a></li>
                                <li><a href="" title="" target="_self">Delivery Options</a></li>
                                <li><a href="" title="" target="_self">Buyer Protection</a></li>
                                <li><a href="" title="" target="_self">New User Guide</a></li>
                            </ul>
                        </div>
                    </div> *}
                </div>
            </div>
            <div class="footer">
                {if isset($setup.info_footer)}
                    {$setup.info_footer}
                {else}
                    <p style="text-align: center;">&nbsp;</p>
                {/if}
                {* <p style="text-align: center;">&nbsp;</p>
                <p style="text-align: center;"><span style="font-size: 13pt;"><strong>CÔNG TY CỔ PHẦN ĐIỆN TỬ KINH TẾ
                            VIỆT NAM - VINAGROUPS</strong></span></p>
                <p style="text-align: center;"><strong>Địa chỉ</strong>: Lô B3, Khu Dân Cư Kim Sơn, Nguyễn Hữu Thọ, Quận
                    7, TP Hồ Chí Minh</p>
                <p style="text-align: center;"><strong>Chi Nhánh</strong>: P 1209, Tháp T1, Toà Bắc Hà C37 Bộ Công An,
                    Đ.Tố Hữu, Nam Từ Liêm, Hà Nội</p>
                <p style="text-align: center;"><strong>Hotline</strong>: <a href="tel:19000126">1900 0126</a></p>
                <p style="text-align: center;"><strong>Email</strong>: <a
                        href="mailto:hotro@vinagroups.vn">hotro@vinagroups.vn</a></p>
                <p style="text-align: center;"><strong>Thời gian làm việc</strong>: 08h - 17h30 (Từ thứ 2 đến thứ 7)</p> *}
            </div>
        </div>
    </footer>

    <div id="modal_alert_dialog" class="modal fade modalAlert" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="close" data-dismiss="modal" aria-label="Close">x</span>
                    <h3>Thông báo</h3>
                    <p id="message_alert"></p>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="loading_bar"><i class="fa fa-spinner fa-spin fa-5x fa-fw margin-bottom"></i></div>

    <script type="text/javascript" src="{$domain}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$domain}/js/owlCarousel/owl.carousel.js"></script>
    <script type="text/javascript" src="{$domain}/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="{$domain}/js/rangeSlider.js"></script>
    <script type="text/javascript" src="{$domain}/js/cloudzoom.js"></script>
    <script type="text/javascript" src="{$domain}/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{$domain}/js/bootstrap-dialog.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/jquery-ui.min.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/main.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/js_act/{$m}_{$act}.js?{$version}"></script>
    {* <script type="text/javascript" src="{$domain}js/global.js?{$version}"></script> *}
    </body>

</html>