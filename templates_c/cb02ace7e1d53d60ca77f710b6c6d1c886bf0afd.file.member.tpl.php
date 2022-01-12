<?php /* Smarty version Smarty-3.1.18, created on 2021-11-10 16:32:29
         compiled from "/Users/tungla/code/vina/web/web_erp/templates/user/member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1862294122618b35c7b98fc0-87558973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb02ace7e1d53d60ca77f710b6c6d1c886bf0afd' => 
    array (
      0 => '/Users/tungla/code/vina/web/web_erp/templates/user/member.tpl',
      1 => 1636536736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1862294122618b35c7b98fc0-87558973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_618b35c7bf0472_53796223',
  'variables' => 
  array (
    'tpldirect' => 0,
    'rewrite_url' => 0,
    'session' => 0,
    'opt_group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_618b35c7bf0472_53796223')) {function content_618b35c7bf0472_53796223($_smarty_tpl) {?><div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 left">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."user/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 right">
                <div class="item info-member">
                    <h3 class="title-profile">Quản lý đội nhóm <span id="total_member"></span></h3>
                    <p class="referral-link top-10">Copy Link giới thiệu của bạn <a class="click-copy color-key pointer"
                            id="btnCopy">Tại đây</a><input type="text" class="form-control form-info hide"
                            id="link_referral"
                            value="<?php echo $_smarty_tpl->tpl_vars['rewrite_url']->value;?>
san-pham-rf<?php if (isset($_smarty_tpl->tpl_vars['session']->value['username_client'])) {?><?php echo $_smarty_tpl->tpl_vars['session']->value['username_client'];?>
<?php }?>" />
                    </p>
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-7 top5">
                            <div class="input-group input-group-small">
                                <input id="filter_joined_at" type="text" class="form-control" name="from_date"
                                    placeholder="Khách hàng từ" aria-describedby="sizing-addon1">
                                <span class="input-group-addon" id="sizing-addon1">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top5">
                            <select id="filter_member_group_id" class="form-control">
                                <option value="">Tất cả nhóm khách hàng</option>
                                <?php echo $_smarty_tpl->tpl_vars['opt_group']->value;?>

                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 top5 ">
                            <div class="relative">
                                <input id="filter_txt" type="text" class="form-control" placeholder="Email / mobile"
                                    aria-describedby="basic-addon1">
                                <span onclick="" id="manual_submit" class="input-group-addon hide"><i
                                        class="glyphicon glyphicon-search"></i></span>
                                <button id="filter_btn_view" class="btn btn-form"><span
                                        class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem
                                    <!--Xem-->
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="top10">
                        <div class="table-responsive">
                            <table class="table table-key members">
                                <thead id="">
                                    <tr>
                                        <th>
                                            <div class="short_up"><span>Họ Tên</span><a field="fullname"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th>Nhóm khách hàng</th>
                                        <th>
                                            <div class="short_up"><span>Từ ngày</span></div>
                                        </th>
                                        <th>Mobile</th>
                                        <th>
                                            <div class="short_up"><span>Công nợ</span><a field="total_liabilities"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th>
                                            <div class="short_up"><span>Đã mua</span><a field="total_spent"
                                                    class="glyphicon glyphicon-chevron-up sortBy"></a></div>
                                        </th>
                                        <th class="hide">
                                            <div class="short_up"><span>Tổng điểm</span><a id="sortby_point"
                                                    class="fa fa-caret-up sortBy"></a></div>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="list_members">
                                </thead>
                            </table>
                            <div class="">
                                <div class="paging text-center" id="page_html"></div>
                                <input id="recent_page" hidden class="hidden" value="1" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
