<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:27:37
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8823491056113973f2667c5-61261278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71a5c7175a5f8ec2a3d0df6773b2034784b5290b' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/price.tpl',
      1 => 1632598023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8823491056113973f2667c5-61261278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6113973f2b1628_79820789',
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'setup' => 0,
    'opt_shop' => 0,
    'lMemberGroup' => 0,
    'item' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6113973f2b1628_79820789')) {function content_6113973f2b1628_79820789($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/comconfig.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container top10">

    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']==0) {?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t">
        <div class="col-sm-4 col-xs-6">
        </div>
        <div class="col-sm-4 col-xs-6 setting-pro-price-detail">
            <label>
                <input id="ckb_setting_enabled" <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['enabled_apply_discount_on_price'])&&$_smarty_tpl->tpl_vars['setup']->value['enabled_apply_discount_on_price']) {?>checked<?php }?> class="ace ace-switch ace-switch-4" type="checkbox" value="0"/>
                <span class="lbl"></span> Bắt đầu cho phép sử dụng bảng giá này.
            </label>
        </div>
    </div>
    <?php }?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t">
        <div class="col-sm-3 col-xs-6">
            <div class="input-group">
                <input id="txt_searching" type="text" class="form-control" placeholder="Tên/ mã sản phẩm"
                    aria-describedby="basic-addon1">
                <span id="btn_txt_searching" class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <span style="display: inline-block;margin-top: 6px;margin-right: 10px;">Chi nhánh:</span>
            <div class="input-group" style="width:calc(100% - 78px);float: right;">
                <select class="form-control" id="shop_id">
                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                </select>
            </div>
        </div>
        <div class="col-sm-2 col-xs-12">
            <div class="input-group input-group-all" style="width:100%">
                <select class="form-control" id="cat_id">
                </select>
            </div>
        </div>
        <div class="col-sm-2 col-xs-6 top-5">
            Tổng số sản phẩm: <a id="total">-</a>
        </div>
        <div class="col-lg-2 col-md-1 col-sm-1 col-xs-12">
            <button id="btn_view" class="btn-width btn btn-primary"> Xem
                <!--Xem-->
            </button>
            <button id="btn_dl" class="btn-width btn btn-primary"> Tải
                <!--Xem-->
            </button>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t1">
        <div id="dropdown_check_list" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                <i class="glyphicon glyphicon-cog"></i>
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
                            <input <?php if ($_smarty_tpl->tpl_vars['item']->value['is_hidden']==0) {?>checked<?php }?> class="checkbox-field ace" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                        </label>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t1">
        <div class="table-responsive" style="display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá lẻ</th>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lMemberGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <th class="group-com checkbox-field-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</th>
                        <?php } ?>
                        <th>@</th>
                    </tr>
                </thead>
                <tbody id="tpl_list" class="row-members">
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="paging text-center" id="page_html">
            </div>
        </div>
    </div>
</div>
<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/product_price.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
