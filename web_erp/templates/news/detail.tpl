<section class="detail-news z2">
    <div class="wrap-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="/tin-tuc" title="Tin tức">Tin tức</a></li>
                {if $data.cat_link!=''}
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><a href="/{$data.cat_link}" title="{$data.cat_name}">{$data.cat_name}</a></li>
                {/if}
                <li><i class="fa fa-angle-right"></i></li>
                <li><a href="/{$data.link_url}-dn{$data.id}" title="{$data.title}">{$data.title}</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12 left">
                <div class="detail-content">
                    <div class="detail">
                        {if $data.news_type_id == 1}
                            <h1 class="title">{$data.title}</h1>
                            <p class="info">Ngày đăng: {$data.created_at|date_format:"H:i d/m/Y"}</p>
                            {$data.description}
                        {else if $data.news_type_id == 2}
                            <h1 class="title">{$data.title}</h1>
                            <p class="info">Ngày đăng: {$data.created_at|date_format:"H:i d/m/Y"}</p>
                            <div class="galary-album">
                                <ul class="grid effect-2" id="grid">
                                    {foreach from=$data.image item=item key=key}
                                        <li><a href="{$item}" class="fancybox-thumbs" data-fancybox-group="thumb"><img class="img-responsive" src="{$item}" alt="{$data.title}"></a></li>
                                    {/foreach}
                                    <div class="clear"></div>
                                </ul>
                            </div>
                            <div class="content-product-detail">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Chi tiết Album</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="content">
                                    {$data.description}
                                </div>
                            </div>
                        {else $data.news_type_id == 3}
                            <iframe class="iframe-detail" width="100%" height="350" src="https://www.youtube.com/embed/{$data.link}"
                                title="{$data.title}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <h1 class="title">{$data.title}</h1>
                            <p class="info">Ngày đăng: {$data.created_at|date_format:"H:i d/m/Y"}</p>
                            <div class="content-product-detail">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Chi tiết Video</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="content">
                                    {$data.description}
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 right">
                <section class="sidebar-block-right">
                    <ul class="sidebar-content">
                        {foreach from=$suggest item=item key=key name=name}
                            <li>
                                <article>
                                    <a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}" class="img">
                                        <img src="{$item.avatar}" alt="{$item.title}" />
                                    </a>
                                    <h3><a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}">{$item.title}</a>
                                    </h3>
                                </article>
                            </li>
                        {/foreach}
                    </ul>
                </section>
            </div>
        </div>
    </div>
</section>