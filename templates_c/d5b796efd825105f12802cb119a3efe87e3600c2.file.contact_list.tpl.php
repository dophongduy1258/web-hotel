<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:14:58
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/contact_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1605168129614811b38df137-81961740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b796efd825105f12802cb119a3efe87e3600c2' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/contact_list.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605168129614811b38df137-81961740',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614811b3916495_25232279',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614811b3916495_25232279')) {function content_614811b3916495_25232279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="search-order">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <input id="txt_search" class="form-control" type="text" name="" placeholder="Tìm kiếm theo tên/ điện thoại/ email">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <select id="filter_status" class="form-control">
                <option value="">Tất cả</option>
                <option value="0">Đang chờ</option>
                <option value="1">Liên hệ lại</option>
                <option value="2">Đã liên hệ</option>
            </select>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-4">
            <button id="btn_view" type="button" class="btn top-5 btn-primary btn-width">Xem</button>
        </div>
    </div>
</div>

<div class="content-pr bg-white">
    <div class="wrap-table-detail">
        <div class="table-responsive">
            <table class="table  table-striped table-bordered text-center members member_list table-bg-no">
                <thead id="">
                    <tr>
                        <th>#</th>
                        <th>Họ và Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th width="150">@</th>
                    </tr>
                </thead>
                <tbody id="list" class="row-members">
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
            <div class="paging L" id="page_html">
            </div>
        </div>
    </div>
</div>

<div id="modal_update_status" class="modal fade" aria-labelledby="myModalLabel" tabindex="-1" role="dialog"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div class="pop_up_T" id="">Cập nhật thông tin</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label style="float: left;" class="label_name">Ghi chú</label>
                        <div class="input_name">
                            <textarea id="note" type="text" placeholder="Vui lòng nhập ghi chú" rows="4"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label style="float: left;" class="label_name">Trạng Thái</label>
                        <select id="status" class="form-control">
                            <option value="0">Đang chờ</option>
                            <option value="1">Liên hệ lại</option>
                            <option value="2">Đã liên hệ</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">Đóng</button>
                    <button id="btn_confirm" class="btn btn-success">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/manager_contact_list.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
