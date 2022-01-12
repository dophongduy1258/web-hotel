<section class="block-news news z2">
    <div class="container">
        {if $cat|@count > 0}
            <div class="item-cate-product">
                <ul>
                    {foreach from=$cat item=item key=key}
                        <li>
                            <a href="/{$item.link_url}-cn{$item.id}" title="{$item.name}">
                                <div class="icon">
                                    <img src="{if $item.icon && $item.icon != ''}{$item.icon}{else}{$domain}/images/notfoundIcon.png{/if}" width="24" class=""
                                        alt="{$item.name}" />
                                    <img src="{if $item.icon && $item.icon != ''}{$item.icon}{else}{$domain}/images/notfoundIcon.png{/if}" width="24" class="h" alt="{$item.name}" />
                                </div>
                                <span>{$item.name}</span>
                            </a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        {/if}
        <div class="block-title">
            <h2 class="title"><a href="" style="pointer-events: none;"
                    title="{$data.category.name}">{$data.category.name}</a></h2>
            <div class="clear"></div>
        </div>
        <div class="block-content">
            <div class="row">
                {foreach from=$data.l item=item key=key}
                    <div class="col-md-4 col-sm-6 col-xs-12 wrap-item">
                        <div class="item">
                            <a href="/{$item.link_url}-dn{$item.id}" title="{$item.title}" class="img">
                                <img src="{if $item.avatar != ''}{$item.avatar}{else}{$item.thumbURL}{/if}"
                                    alt="{$item.title}">
                                {$item.icon}
                            </a>
                            <div class="wrap-info">
                                <h3><a href="/{$item.link_url}-dn{$item.id}"
                                        title="{$item.title}">{$item.icon}{$item.title}</a></h3>
                                <div class="time">
                                    <span><i class="fa fa-clock-o"
                                            aria-hidden="true"></i>{$item.created_at|date_format:"H:i d/m/Y"}</span>
                                    <span><i class="" aria-hidden="true"></i></span>
                                    {* <span><i class="fa fa-commenting-o" aria-hidden="true"></i></span> *}
                                </div>
                                <div class="info">{$item.short_description}</div>
                            </div>
                        </div>
                    </div>
                {/foreach}

            </div>
            <div class="text-center">
                <div id="hd_page_html">
                    <div id="page_html">
                        {$data.page_html}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>