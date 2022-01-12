<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:27:35
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/commission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16878324256113973a74aaf9-56877172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67f5b336ea237498b8fca5a02e3cf2cb5b8f5329' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/commission.tpl',
      1 => 1632598053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16878324256113973a74aaf9-56877172',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6113973a78ef44_27853334',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lMemberGroup' => 0,
    'item' => 0,
    'link' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6113973a78ef44_27853334')) {function content_6113973a78ef44_27853334($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/comconfig.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container top10">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t">
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li id="tab_ProCommissionGroup" role="presentation" class="active">
                    <a href="#ProCommissionGroup" aria-controls="ProCommissionGroup" role="tab"
                        data-toggle="tab">
                        Nhóm chiết khấu
                    </a>
                </li>
                <li id="tab_ProCommissionGroupParent" role="presentation" class="">
                    <a href="#ProCommissionGroupParent" aria-controls="ProCommissionGroupParent" role="tab"
                        data-toggle="tab">
                        Loại kho
                    </a>
                </li>
            </ul>

            <div class="custome-tab-content tab-content tab-setting">

                <div role="tabpanel" class="tab-pane active" id="ProCommissionGroup">
                    <div class="top-10">
                        <div class="row">
                            <div class="col-sm-12 top-10">
                                <div class="col-sm-12">
                                    <div id="dropdown_check_list" class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                            data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-cog"></i> Ẩn/ hiện nhóm khách hàng
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lMemberGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                                <li>
                                                    <label class="checkbox-field-lb">
                                                        <input <?php if ($_smarty_tpl->tpl_vars['item']->value['is_hidden']==0) {?>checked<?php }?> class="checkbox-field ace"
                                                            type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                        <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                                    </label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 top-10 table-responsive">
                                <table class="table table-hover table-bordered table-bg">
                                    <thead id="tpl_mgnt_commission_header">
                                    </thead>
                                    <tbody id="tpl_mgnt_commission">
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="ProCommissionGroupParent">
                    <div class="top-10">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 top-10">
                                <table class="table table-hover table-bordered table-bg">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên kho</th>
                                            <th>@</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tpl_procom_parent">
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <p><i>** Ghi chú: Chức năng dùng để tạo và quản lý loại kho hàng, loại kho hàng
                                        dùng để nhóm nhiều nhóm chiết khấu sản phẩm khác nhau được sử dụng cho
                                        báo cáo doanh số theo kho hàng <a
                                            href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=report&act=group_product">ở đây</a>. </i></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
     </div>
</div>
<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/product_commission.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
