<?php /* Smarty version Smarty-3.1.18, created on 2021-09-07 13:34:39
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1798228374610ee32b18a0d6-69246443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd6c5cdfcac885c19dab6acd813c3ec5178c1ac3' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/list.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1798228374610ee32b18a0d6-69246443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ee32b1b3ac9_88296169',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ee32b1b3ac9_88296169')) {function content_610ee32b1b3ac9_88296169($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">

    <!--BEGIN a theme-->
    <div id="list_theme" class="top-10">
        <div class="row">
            <div class="col-sm-10 col-xs-12 top-5">
            </div>
            <div class="col-sm-2 col-xs-12 top-5 text-right">
                <button id="btn_modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Giao diện mới</button>
            </div>
        </div>
        <div class="row">
    
            <div class="col-lg-2 col-xs-6 top-5">
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="f_shop_id" class="form-control width-100p filter-change">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="f_status" class="form-control width-100p filter-change">
                        <option value="">Trạng thái</option>
                        <option value="1">Kích hoạt</option>
                        <option value="0">Khóa</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-xs-9 top-5 relative">
                <div class="input-group1 ">
                    <input placeholder="Tên giao diện" class="form-control" name="" id="f_keyword"
                        type="text" />
                    <button id="f_btn_view" class="btn btn-primary btn-width"
                        style="position: absolute;right: 8px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span
                            class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                </div>
            </div>

            <div class="col-lg-1 col-xs-3 top5">
                
            </div>

        </div>

        <div class="top-10 product_index_t1">
            <div class="table-responsive">
                <table class="table table-bg-no">
                    <thead>
                        <tr>
                            <th class="col_vi">STT</th>
                            <th class="col_vi">Ngày tạo</th>
                            <th class="col_vi">Tên giao diện</th>
                            <th class="col_vi">Bắt đầu</th>
                            <th class="col_vi">Kết thúc</th>
                            <th width="15%" class="col_vi">Ghi chú</th>
                            <th class="col_vi">Người tạo</th>
                            <th class="col_vi">Cập nhật cuối</th>
                            <th class="col_vi">Trạng thái</th>
                            <th width="10%" class="col_vi">@</th>
                        </tr>
                    </thead>
                    <tbody id="f_list" class="row-members">
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="paging text-center" id="f_page_html">
                </div>
            </div>
        </div>
    </div>
    <!--END a theme-->

    <!--BEGIN info of a theme to modify-->
    <div id="modify_theme" class="top-10" style="display:none">
        <div class="row">

            <div class="col-sm-1 col-xs-12">
            </div>
            <div class="col-sm-10 col-xs-12">
                
                <div class="col-sm-12 col-xs-12 text-right">
                    <button class="btn-theme-back btn btn-default btn-width">Trở lại</button>
                    <button class="btn-add-theme btn btn-success btn-width">Cập nhật</button>
                </div>

                <div class="col-sm-12 col-xs-12">

                    <div class="col-sm-12 col-xs-12">
                        <h3>Quản lý block</h3>
                    </div>

                    <div class="col-sm-6 col-xs-12">

                        <div class="col-sm-12 col-xs-12">
                            <label class="header">Tên theme:</label>
                            <input id="name" class="form-control" type="text">
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <label class="header">Từ ngày:</label>
                            <div class="input-group">
                                <input id="start_at" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <span class="icon-cate icon-other-date"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <label class="header">Đến ngày:</label>
                            <div class="input-group">
                                <input id="end_at" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <span class="icon-cate icon-other-date"></span>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label class="header">Ghi chú:</label>
                        <textarea rows="4" id="note" class="form-control"></textarea>
                    </div>

                    <div class="col-sm-12 col-xs-12 top-10">
                        <div class="input-group">
                            <input placeholder="Tìm theo: Tên block/ Ghi chú block cần thêm" id="block_searching" class="form-control" type="text">
                            <span class="input-group-addon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xs-12 top-10">
                        <div class="col-sm-4 col-xs-12 top-10">
                        </div>
                        <div id="tpl_blocks" class="col-sm-4 col-xs-12 blocks-holder">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--END info of a theme to modify-->

</div>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/theme_list.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
