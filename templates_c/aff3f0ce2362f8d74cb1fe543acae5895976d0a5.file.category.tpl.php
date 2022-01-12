<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:14:26
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14907676266146e00eea7751-47111341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aff3f0ce2362f8d74cb1fe543acae5895976d0a5' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/category.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14907676266146e00eea7751-47111341',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6146e00eee5545_00494869',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6146e00eee5545_00494869')) {function content_6146e00eee5545_00494869($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="search-order">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <input id="txt_searching" class="form-control" type="text" name="" placeholder="Tìm kiếm theo tên">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="col-md-1 col-sm-6 col-xs-12">
            <button id="btn_view" type="button" class="btn top-5 btn-primary btn-width">Xem</button>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12 pull-right">
            <button id="btn_add_news" class="btn btn-success btn-width">Thêm danh mục</button>
        </div>
    </div>
</div>


<div class="content-pr bg-white">
    <div class="wrap-table-detail">
        <div class="table-responsive">
            <table class="table  table-striped table-bordered text-center members member_list table-bg-no">
                <thead id="">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Hiển thị</th>
                        <th width="150">@</th>
                    </tr>
                </thead>
                <tbody id="list_news" class="row-members">
                </tbody>
            </table>
            <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
                <div id="page_html" class="col-lg-12 col-md-12 top10">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_add_news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T" id="modal_add_news_title">Thêm danh mục</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Tên danh mục</label>
                                    <div class="input_name">
                                        <input id="nname" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Thuộc danh mục</label>
                                    <div class="input_name select_root_id">
                                        
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Mô tả</label>
                                    <div class="input_name">
                                        <input id="ndescription" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Thứ tự</label>
                                    <div class="input_name">
                                        <input id="npriority" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Meta tiêu đề</label>
                                    <div class="input_name">
                                        <input id="nmeta_title" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Meta mô tả</label>
                                    <div class="input_name">
                                        <textarea id="nmeta_description" rows="4" class="form-control" name=""
                                            maxlength="300"></textarea>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Meta từ khóa</label>
                                    <div class="input_name">
                                        <textarea id="nmeta_keyword" rows="4" class="form-control" name=""
                                            maxlength="300"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="wrap_name">
                                    <label class="label_name">Hình ảnh</label>
                                    <div class="avatar_thumbs row">
                                        <a id="nhold_img_show" class="col-md-2"
                                            style="width: 100px; height: 80px; display: inline-block;"><img
                                                src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" style="opacity:0.3;cursor:pointer;"
                                                class="img-responsive"></a>

                                    </div>
                                    <input class="hide" hide id="nfile_uploading" type="file" name="files" value=""
                                        accept="image/x-png,image/gif,image/jpeg" />
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-sm-4 col-lg-4">
                                    <label title="Chọn biểu tượng" class="label_name">Chọn biểu tượng</label>
                                    <div class="avatar_thumbs">
                                        <a onclick="click_file('nicon_file')" id="load_nicon"
                                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                                            <img id="nicon" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                                        </a>
                                    </div>
                                    <div class="hide">
                                        <input class="hide" name="files" type="file"
                                            accept="image/x-png,image/gif,image/jpeg" id="nicon_file" value="">
                                        <input class="hide" name="" type="text" id="nicon_val" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <label title="Chọn ảnh nền" class="label_name">Chọn ảnh nền</label>
                                    <div class="avatar_thumbs">
                                        <a onclick="click_file('nbackground_file')" id="load_nbackground"
                                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                                            <img id="nbackground" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                                        </a>
                                    </div>
                                    <div class="hide">
                                        <input class="hide" name="files" type="file"
                                            accept="image/x-png,image/gif,image/jpeg" id="nbackground_file" value="">
                                        <input class="hide" name="" type="text" id="nbackground_val" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 top20">
                                <button id="btn_save_news" style="float: right; margin-right:30px;"
                                    class="btn btn-update btn-width">Lưu</button>
                            </div>

                        </div>
                    </div>
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
/js/js_act/news_category.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
