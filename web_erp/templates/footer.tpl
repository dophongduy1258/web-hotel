    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    {if isset($setup.info_footer) && $setup.info_footer!=''}
                        <div class="footer">
                            {$setup.info_footer}
                        </div>
                    {/if}
                    
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="menu-bottom">
                        <div class="row">
                            {$menu_bottom}
                        </div>
                    </div>
                </div>
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

    <script type="text/javascript" src="{$domain}/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$domain}/js/owlCarousel/owl.carousel.js"></script>
    <script type="text/javascript" src="{$domain}/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="{$domain}/js/rangeSlider.js"></script>
    <script type="text/javascript" src="{$domain}/js/cloudzoom.js"></script>
    <script type="text/javascript" src="{$domain}/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{$domain}/js/bootstrap/bootstrap-dialog.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/jquery-ui.min.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/jquery.nicescroll.min.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/main.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/upload/uploadfunction.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/upload/jquery.fileupload.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/upload/jquery.iframe-transport.js?{$version}"></script>
    <script type="text/javascript" src="{$domain}/js/js_act/{$m}_{$act}.js?{$version}"></script>
    {if "`$m``$act`" == 'newsdetail'}
        <!--detail album-->
        <script type="text/javascript" src="{$domain}/js/AnimOnScroll/modernizr.custom.js?{$version}"></script>
        <script type="text/javascript" src="{$domain}/js/AnimOnScroll/masonry.pkgd.min.js?{$version}"></script>
        <script type="text/javascript" src="{$domain}/js/AnimOnScroll/imagesloaded.js?{$version}"></script>
        <script type="text/javascript" src="{$domain}/js/AnimOnScroll/classie.js?{$version}"></script>
        <script type="text/javascript" src="{$domain}/js/AnimOnScroll/AnimOnScroll.js?{$version}"></script>
        <script type="text/javascript">
            if ($('#grid').length > 0) {
                new AnimOnScroll(document.getElementById('grid'), {
                    minDuration: 0.4,
                    maxDuration: 0.7,
                    viewportFactor: 0.2
                });
            }
            $('.fancybox-thumbs').fancybox({
                closeBtn: true,
                arrows: true,
                nextClick: true,

                helpers: {
                    thumbs: {
                        width: 70,
                        height: 50,
                    }
                }
            });
        </script>
        <!--detail album-->
    {/if}
    {* <script type="text/javascript" src="{$domain}js/global.js?{$version}"></script> *}
    </body>

</html>