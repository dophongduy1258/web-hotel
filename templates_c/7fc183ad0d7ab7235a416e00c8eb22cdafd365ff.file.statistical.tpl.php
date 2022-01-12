<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 21:39:15
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/client/statistical.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180250224361547a93670704-74277808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fc183ad0d7ab7235a416e00c8eb22cdafd365ff' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/client/statistical.tpl',
      1 => 1632925337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180250224361547a93670704-74277808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_week' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61547a936e3080_22024195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61547a936e3080_22024195')) {function content_61547a936e3080_22024195($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."header_client_pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="primary-order1">
    <div class="container">

        <div class="row" style="margin: 5px -5px;">
            <div class="box-wallet box-wallet-detail">
                <h5
                    style="margin-top: 5px; margin-bottom: 10px; font-size: 20px; font-weight: 600; text-transform: uppercase; color: #005AA9;">
                    Thông tin cơ bản
                </h5>
                <div id="tplInfo"></div>
            </div>
        </div>

        <h5
            style="margin-top: 10px; margin-bottom: 20px; font-size: 20px; font-weight: 600; text-transform: uppercase; color: #005AA9;">
            Chi tiết hoa hồng
        </h5>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 hide">
                <input id="keyword" placeholder="Tên/ SĐT thành viên" class="form-control" type="text" name="">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 top5">
                <select id="week_no" class="form-control">
                    <?php echo $_smarty_tpl->tpl_vars['opt_week']->value;?>

                </select>
            </div>
            <div class="col-md-1 col-sm-6 col-xs-12">
                <button id="btn_view" type="button" class="btn top-5 btn-primary btn-width">Xem</button>
            </div>
            
        </div>
        <div class="content-pr bg-white">
            <div class="wrap-table-detail">
                <div class="table-responsive table-detail table-0-15">
                    <table class="table table-bg-no table-hover ng-cloak">
                        <thead>
                            <tr>
                                <th>ID NPP<a field="parent_fullname" class=""></a></th>
                                <th>Họ và Tên<a field="parent_mobile" class=""></a></th>
                                <th>Doanh số cá nhân (PV)<a field="group_level" class=""></a> </th>
                                <th>Doanh số nhóm (PV)<a field="group_percent" class=""></a> </th>
                                <th>% Hoa hồng<a field="group_revenue_self" class=""></a> </th>
                                <th>Hoa hồng nhận (VNĐ)<a field="group_revenue" class=""></a> </th>
                            </tr>
                        </thead>
                        <tbody id="l">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/client_statistical.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
