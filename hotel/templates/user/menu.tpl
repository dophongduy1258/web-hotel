<div class="item">
    <div class="wrap-info">
        <div class="img" id="avatar_menu">
            <a id="load_avatar">
                <img src="{if isset($dM.avatar) && $dM.avatar != ''}{$dM.avatar}{else}{$domain}/images/user_profile.png{/if}" />
            </a>
            <div class="camera" onclick="click_file('avatar_file')"><img src="{$domain}/images/camera.png"></div>
        </div>
        <div class="hide">
            <input class="hide" name="files" type="file" accept="image/x-png,image/gif,image/jpeg" id="avatar_file"
                value="{if $dM.avatar !=''}{$dM.avatar}{/if}">
            <input class="hide img-list-all" name="" type="text" id="avatar_val"
                value="{if $dM.avatar !=''}{$dM.avatar}{/if}">
        </div>
        <div class="info"> Tài khoản của<b>{if $session.fullname_client!=''}{$session.fullname_client}{/if}</b></div>
        <span>Xem thêm</span>
    </div>
    <ul>
        <li class="{if "`$m``$act`" == 'userprofile'}active{/if}"><a href="/thong-tin" title="Thông tin tài khoản"><i
                    class="fa fa-user"></i>Thông tin tài khoản</a></li>
        <li class="{if "`$m``$act`" == 'userpaymentcard'}active{/if}"><a href="/thong-tin-thanh-toan"
                title="Quản lý ngân hàng"><i class="fa fa-credit-card-alt"></i>Quản lý ngân hàng</a></li>
        <li class="{if "`$m``$act`" == 'usernotification'}active{/if}"><a href="/thong-bao" title="Thông báo của tôi"><i
                    class="fa fa-bell"></i>Thông báo của tôi</a></li>
        <li class="{if "`$m``$act`" == 'userorder'}active{/if}"><a href="/quan-ly-don-hang" title="Quản lý đơn hàng"><i
                    class="fa fa-server"></i>Quản lý đơn hàng</a></li>
        <li class="{if "`$m``$act`" == 'useraddress'}active{/if}"><a href="/so-dia-chi" title="Sổ địa chỉ"><i
                    class="fa fa-map"></i>Sổ địa chỉ</a></li>
        <li class="{if "`$m``$act`" == 'userwallet'}active{/if}"><a href="/quan-ly-vi" title="Quản lý ví"><i
                    class="fa fa-money"></i>Quản lý ví</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_roses'}active{/if}"><a href="/hoa-hong-quan-ly-phong-ban"
                title="Hoa hồng quản lý phòng ban"><i class="fa fa-server"></i>Hoa hồng quản lý phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_revenue'}active{/if}"><a href="/doanh-thu-phong-ban"
                title="Doanh thu phòng ban"><i class="fa fa-server"></i>Doanh thu phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'usertraining_roses'}active{/if}"><a href="/hoa-hong-huan-luyen" title="Hoa hồng huấn luyện"><i
                    class="fa fa-server"></i>Hoa hồng huấn luyện</a></li>
        <li class="{if "`$m``$act`" == 'usermember'}active{/if}"><a href="/quan-ly-doi-nhom" title="Quản lý đội nhóm"><i
                    class="fa fa-server"></i>Quản lý đội nhóm</a></li>
        {* <li class="{if "`$m``$act`" == 'usertraining'}active{/if}"><a href="/quan-ly-chung-chi" title="Quản lý chứng chỉ"><i
                    class="fa fa-server"></i>Quản lý chứng chỉ</a></li> *}
    </ul>
</div>

<script type="text/javascript" src="{$domain}/js/js_act/user_menu.js?{$version}"></script>