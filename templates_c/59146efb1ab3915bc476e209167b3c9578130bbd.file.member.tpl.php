<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:11:27
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16018661676116a357507648-55808235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59146efb1ab3915bc476e209167b3c9578130bbd' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/member.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16018661676116a357507648-55808235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6116a357536cc8_34724287',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'filter_opt_wallet' => 0,
    'opt_group' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6116a357536cc8_34724287')) {function content_6116a357536cc8_34724287($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div>
    <div class="primary-order1 primary-order-1">
        <div class="container">
           
            <div class="row search-order extend search-order1">
                <div class="col-sm-1 col-xs-12">
                </div>
                <div class="col-sm-2 col-xs-6">
                    <select id="f_shop_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <select id="f_wallet_id" class="form-control">
                        <?php echo $_smarty_tpl->tpl_vars['filter_opt_wallet']->value;?>

                    </select>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <select id="f_member_group_id" class="form-control">
                        <option value="">Tất cả nhóm khách hàng</option>
                        <?php echo $_smarty_tpl->tpl_vars['opt_group']->value;?>

                    </select>
                </div>
                <div class="col-sm-3 col-xs-12 f-search">
                    <input id="f_keyword" type="text" name="" placeholder="Tên/ Mã KH/ SĐT" value="">
                </div>
                <div class="col-sm-2 col-xs-12 top-10">
                    <button id="btn_view" class="btn btn-primary btn-width"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button>
                    <button id="btn_download" class="btn btn-primary btn-width"><i class="fa fa-cloud-download" aria-hidden="true"></i> Tải về</button>
                </div>
            </div>

            <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày Tạo <a field="joined_at" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th>Mã KH</th>
                            <th>Họ & Tên</th>
                            <th>SĐT</th>
                            <th>Tên ví</th>
                            <th>Tổng cấp <a field="from_global" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th>Từ KH <a field="from_other" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th>Sử dụng <a field="to_other" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th>Số dư <a field="amount" class="glyphicon glyphicon-chevron-down active sortBy"></a></th>
                            <th>GD gần nhất <a field="last_change" class="glyphicon glyphicon-chevron-up sortBy"></a></th>
                            <th>@</th>
                        </tr>
                        <tr>
                            <th colspan="6" class="text-center">
                                Tổng số dòng: <b class="" id="total_record"></b>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><b class="color-red" id="total_value"></b></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list">
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-xs-12 top-10" id="page_html">
                
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/wallet_member.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
