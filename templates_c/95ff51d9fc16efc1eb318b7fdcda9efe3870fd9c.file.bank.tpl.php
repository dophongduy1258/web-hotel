<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 19:39:03
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/extend/bank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13923638926135afbea57c74-54230004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95ff51d9fc16efc1eb318b7fdcda9efe3870fd9c' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/extend/bank.tpl',
      1 => 1632486679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13923638926135afbea57c74-54230004',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6135afbea864b0_29716291',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6135afbea864b0_29716291')) {function content_6135afbea864b0_29716291($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="col-sm-12">
        <div class="col-md-2 col-sm-6 col-xs-4 pull-right">
            <span id="btn_add_bank" class="add_real code_real">Thêm ngân hàng <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/public/images/add.png" width="24"></span>
        </div>
    </div>
    <div class="container">
        <div class="content-pr">
            <div id="tpl_list" class="row">
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal fade modalAlert" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-body">
                    <span class="close" data-dismiss="modal" aria-label="Close">x</span>
                    <h3>Thông báo</h3>
                    <p>Xác nhận xóa: <b id="delete_bank"></b></p>
                    <div class="modal-footer">
                        <div class="col-sm-12 col-xs-12">
                            <button type="button" class=" btn" data-dismiss="modal" aria-label="Close">Huỷ</button>
                            <button id="btn_confirm_delete" class="btn btn-danger">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="addModal" class="modal fade modalAlert" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-body">
                    <span class="close" data-dismiss="modal" aria-label="Close">x</span>
                    <h3>Thêm tài khoản ngân hàng</h3>
                    <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-12 col-xs-12 bg-white bank-holder">
                            <div class="holder-suggested1">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Tên Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="VD: Ngân hàng ngoại thương Việt Nam" id="bank-name" value="" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Mã Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="VD: VCB" id="bank-code" value="" class="form-control uppercase" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Tài Khoản Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="VD: 0421000xxxxxx" id="bank-account" value="" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Tên Tài Khoản Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="LE NGOC H" id="bank-account-name" value="" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Chi Nhánh Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="" id="bank-branch" value="" class="form-control" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Link logo Ngân Hàng</label>
                                        <div class="input_name">
                                            <input placeholder="" id="bank-url" value="" class="form-control" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12 hide">
                                        <label class="label_name">Chi nhánh</label>
                                        <div class="input_name">
                                            <select id="shop-id" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Số dư</label>
                                        <div class="input_name">
                                            <input placeholder="" id="balance" value="" class="form-control number-format" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12 top-5">
                                        <div class="input_name">
                                            <label>
                                                <input placeholder="" id="is-hidden" value="" class="ace" type="checkbox">
                                                <span class="lbl"></span> Ẩn
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 margin-b-30">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 text-right top-10">
                        <button type="button" class="btn btn-width" data-dismiss="modal" aria-label="Close">Huỷ</button>
                        <button id="btn_add" class="btn btn-success btn-width">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/extend_bank.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<?php }} ?>
