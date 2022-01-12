<?php /* Smarty version Smarty-3.1.18, created on 2021-08-08 13:57:59
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/treasurer/setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52212363610f8077699542-74088687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '894321fbed8d4d262db2eea4ddaee20b320eaa41' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/treasurer/setting.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52212363610f8077699542-74088687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'lShops' => 0,
    'i' => 0,
    'item' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f80776e2940_08691383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f80776e2940_08691383')) {function content_610f80776e2940_08691383($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span class="font-size-20 uppercase">Chi nhánh </span>
            <div class="btn-group treasurer-shop-sl text-left">
                <select class="form-control text-left" id="shop_id">
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lShops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <option <?php if ($_smarty_tpl->tpl_vars['i']->value==1) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                        <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">

                <ul class="nav nav-tabs nav-storing">

                    <li id="tab_nhap" class="tab-modify active"><a data-toggle="tab" href="#lydothuchi">Lý do nhập</a></li>
                    <li id="tab_xuat" class="tab-modify"><a data-toggle="tab" href="#lydothuchi">Lý do xuất</a></li>
                    <li id="tab_thu" class="tab-modify "><a data-toggle="tab" href="#lydothuchi">Lý do thu</a></li>
                    <li id="tab_chi" class="tab-modify"><a data-toggle="tab" href="#lydothuchi">Lý do chi</a></li>
                    <li id="tab_loai_thu_chi" class="tab-modify"><a data-toggle="tab" href="#loaithuchi">Nhóm lý do</a></li>
                    <li id="tab_loai_report" class="tab-modify"><a data-toggle="tab" href="#loaireport">Nhóm cho báo cáo</a></li>
                    <li id="tab_loai_account" class="tab-modify"><a data-toggle="tab" href="#loaiaccount">Quản lý tài khoản (Định khoản)</a></li>

                </ul>

                <div class="tab-content">

                    <div id="lydothuchi" class="tab-pane fade in active">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-sm-12">
                                    - Chức năng dùng quản lý lý do thu/ chi
                                </div>
                                <div class="col-sm-12 top-10">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-stripped text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Mã lý do</th>
                                                <th>Lý do</th>
                                                <th>Tài khoản nợ</th>
                                                <th>Tài khoản có</th>
                                                <th>Nhóm lý do</th>
                                                <th>Nhóm báo cáo</th>
                                                <th class="hide">Thu/ Chi</th>
                                                <th width="10%">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_groups">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loaithuchi" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <div class="col-sm-12">
                                        - Chức năng dùng quản lý nhóm thu/ chi
                                    </div>
                                    <div class="col-sm-12 top-10">
                                    </div>
                                    <table class="table table-stripped text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Tên nhóm</th>
                                                <th width="10%">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_treasurer_type">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loaireport" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <div class="col-sm-12">
                                        - Quản lý loại báo cáo
                                    </div>
                                    <div class="col-sm-12 top-10">
                                    </div>
                                    <table class="table table-stripped text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th width="15%">Mã loại báo cáo</th>
                                                <th>Tên loại báo cáo</th>
                                                <th width="10%">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_report">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loaiaccount" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <div class="col-sm-8">
                                        - Quản lý tài khoản định khoản
                                    </div>
                                    <div class="col-sm-4">
                                        <button id="btn_del_list_account" class="btn btn-success">Chọn nhiều dòng</button>
                                    </div>
                                    <div class="col-sm-12 top-10">
                                    </div>
                                    <table class="table table-stripped text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Tài khoản</th>
                                                <th>Tài khoản cha</th>
                                                <th>Tên tài khoản</th>
                                                <th>Loại tài khoản</th>
                                                <th>Cấp</th>
                                                <th width="10%">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_account">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/treasurer_setting.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
