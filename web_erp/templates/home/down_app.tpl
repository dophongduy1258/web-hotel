<div class="container z2">
    <div class="download-app">
        <a href="/" title="{if isset($meta_title)}{$meta_title}{/if}"><img src="{if isset($url_logo) && $url_logo != ''}{$url_logo}{else}{$domain}/images/logo.png{/if}" alt="{if isset($meta_title)}{$meta_title}{/if}"></a>
        <h2>Tải App {if isset($meta_title) && $meta_title!=''}{$meta_title}{else}{$title}{/if}</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 down_app">
                <a href="{$link_ios}" target="_blank"><img src="{$domain}/images/app_apple.jpg" alt="" class="img-responsive" /></a>
                <a href="{$link_android}" target="_blank"><img src="{$domain}/images/app_google.jpg" alt="" class="img-responsive" /></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center"><img src="{$link_qrweb}" alt="" class="" width="240"/></div>
            </div>
        </div>
    </div>
</div>