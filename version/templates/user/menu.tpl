<div class="item">
    <div class="wrap-info">
        <div class="img"><img src="{if isset($dM.avatar) && $dM.avatar != ''}{$dM.avatar}{else}{$domain}/images/user_profile.png{/if}" /></div>
        <div class="info"> Tài khoản của<b>{if $session.fullname_client!=''}{$session.fullname_client}{/if}</b></div>
        <span>Xem thêm</span>
    </div>
    <ul>
        <li class="{if "`$m``$act`" == 'userprofile'}active{/if}"><a href="/thong-tin" title="Thông tin tài khoản"><i class="fa fa-user"></i>Thông tin tài khoản</a></li>
        <li class="{if "`$m``$act`" == 'userpaymentcard'}active{/if}"><a href="/thong-tin-thanh-toan" title="Quản lý ngân hàng"><i class="fa fa-credit-card-alt"></i>Quản lý ngân hàng</a></li>
        <li class="{if "`$m``$act`" == 'usernotification'}active{/if}"><a href="/404" title="Thông báo của tôi"><i class="fa fa-bell"></i>Thông báo của tôi</a></li>
        <li class="{if "`$m``$act`" == 'userorder'}active{/if}"><a href="/quan-ly-don-hang" title="Quản lý đơn hàng"><i class="fa fa-server"></i>Quản lý đơn hàng</a></li>
        <li class="{if "`$m``$act`" == 'useraddress'}active{/if}"><a href="/404" title="Sổ địa chỉ"><i class="fa fa-map"></i>Sổ địa chỉ</a></li>
        <li class="{if "`$m``$act`" == 'userwallet'}active{/if}"><a href="/404" title="Quản lý ví"><i class="fa fa-money"></i>Quản lý ví</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_roses'}active{/if}"><a href="/404" title="Hoa hồng quản lý phòng ban"><i class="fa fa-server"></i>Hoa hồng quản lý phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_revenue'}active{/if}"><a href="/404" title="Doanh thu phòng ban"><i class="fa fa-server"></i>Doanh thu phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'usertraining_roses'}active{/if}"><a href="/404" title="Hoa hồng huấn luyện"><i class="fa fa-server"></i>Hoa hồng huấn luyện</a></li>
        <li class="{if "`$m``$act`" == 'usermember'}active{/if}"><a href="/404" title="Quản lý đội nhóm"><i class="fa fa-server"></i>Quản lý đội nhóm</a></li>
        <li class="{if "`$m``$act`" == 'usertraining'}active{/if}"><a href="/404" title="Quản lý chứng chỉ"><i class="fa fa-server"></i>Quản lý chứng chỉ</a></li>

        {* <li class="{if "`$m``$act`" == 'usernotification'}active{/if}"><a href="?m=user&act=notification" title="Thông báo của tôi"><i class="fa fa-bell"></i>Thông báo của tôi <span class="noti">50</span></a></li>
        <li class="{if "`$m``$act`" == 'userorder'}active{/if}"><a href="?m=user&act=order" title="Quản lý đơn hàng"><i class="fa fa-server"></i>Quản lý đơn hàng</a></li>
        <li class="{if "`$m``$act`" == 'useraddress'}active{/if}"><a href="?m=user&act=address" title="Sổ địa chỉ"><i class="fa fa-map"></i>Sổ địa chỉ</a></li>
        <li class="{if "`$m``$act`" == 'userwallet'}active{/if}"><a href="?m=user&act=wallet" title="Quản lý ví"><i class="fa fa-money"></i>Quản lý ví</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_roses'}active{/if}"><a href="?m=user&act=departmental_roses" title="Hoa hồng quản lý phòng ban"><i class="fa fa-server"></i>Hoa hồng quản lý phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'userdepartmental_revenue'}active{/if}"><a href="?m=user&act=departmental_revenue" title="Doanh thu phòng ban"><i class="fa fa-server"></i>Doanh thu phòng ban</a></li>
        <li class="{if "`$m``$act`" == 'usertraining_roses'}active{/if}"><a href="?m=user&act=training_roses" title="Hoa hồng huấn luyện"><i class="fa fa-server"></i>Hoa hồng huấn luyện</a></li>
        <li class="{if "`$m``$act`" == 'usermember'}active{/if}"><a href="?m=user&act=member" title="Quản lý đội nhóm"><i class="fa fa-server"></i>Quản lý đội nhóm</a></li>
        <li class="{if "`$m``$act`" == 'usertraining'}active{/if}"><a href="?m=user&act=training" title="Quản lý chứng chỉ"><i class="fa fa-server"></i>Quản lý chứng chỉ</a></li> *}
    </ul>
</div>