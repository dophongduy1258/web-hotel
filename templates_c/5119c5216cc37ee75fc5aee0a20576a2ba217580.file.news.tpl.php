<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:14:24
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12741871126146dff52de453-42043594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5119c5216cc37ee75fc5aee0a20576a2ba217580' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/news.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12741871126146dff52de453-42043594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6146dff53171d4_59862429',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6146dff53171d4_59862429')) {function content_6146dff53171d4_59862429($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="search-order">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <input id="txt_searching" class="form-control" type="text" name="" placeholder="Tìm kiếm theo tiêu đề">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <select id="filter_news_type_id" class="form-control">
                <option value="">Tất cả loại</option>
                <option value="1">Tin tức</option>
                <option value="2">Album</option>
                <option value="3">Video</option>
            </select>
        </div>
        <div class="col-md-1 col-sm-6 col-xs-12">
            <button id="btn_view" type="button" class="btn top-5 btn-primary btn-width">Xem</button>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12 pull-right">
            <button id="btn_add_news" class="btn btn-success btn-width">Thêm tin tức</button>
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
                        <th>Tiêu đề</th>
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
            <div class="pop_up_T" id="modal_add_news_title">Thêm tin tức</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Tiêu đề</label>
                                    <div class="input_name">
                                        <input id="title" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Thuộc danh mục</label>
                                    <div class="input_name select_root_id">
                                        
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Loại tin tức</label>
                                    <div class="input_name">
                                        <select class="form-control" id="news_type_id">
                                            <option value="1">Tin tức</option>
                                            <option value="2">Album</option>
                                            <option value="3">Video</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Nhóm tin tức</label>
                                    <div class="input_name">
                                        <select class="form-control" id="news_group_id">
                                            <option value="0">Chọn nhóm tin tức</option>
                                            <option value="1">Tin tức nổi bật</option>
                                            <option value="2">Tin tức tiêu điểm</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Mô tả ngắn</label>
                                    <div class="input_name">
                                        <textarea id="short_description" rows="4" class="form-control" name=""
                                            maxlength="300"></textarea>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Mô tả</label>
                                    <div class="input_name">
                                        <textarea id="description" rows="4" class="form-control" name=""></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Meta tiêu đề</label>
                                    <div class="input_name">
                                        <input id="meta_title" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Meta mô tả</label>
                                    <div class="input_name">
                                        <textarea id="meta_description" rows="4" class="form-control" name=""
                                            maxlength="300"></textarea>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Meta từ khóa</label>
                                    <div class="input_name">
                                        <textarea id="meta_keyword" rows="4" class="form-control" name=""
                                            maxlength="300"></textarea>
                                    </div>
                                </div>
                                <div class="wrap_name div_link hidden">
                                    <label class="label_name">Link video (link được lấy từ youtube, ...)</label>
                                    <div class="input_name">
                                        <input id="link" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>
                                <div class="wrap_name div_link_url hidden">
                                    <label class="label_name">Đường dẫn</label>
                                    <div class="input_name">
                                        <input id="link_url" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label title="Chọn ảnh đại diện" class="label_name">Chọn ảnh đại diện</label>
                                    <div class="avatar_thumbs">
                                        <a onclick="click_file('avatar_file')" id="load_avatar"
                                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                                        </a>
                                    </div>
                                    <div class="hide">
                                        <input class="hide" name="files" type="file"
                                            accept="image/x-png,image/gif,image/jpeg" id="avatar_file" value="">
                                        <input class="hide" name="" type="text" id="avatar_val" value="">
                                    </div>
                                </div>

                                <div class="wrap_name div_album hidden">
                                    <label class="label_name">Hình ảnh</label>
                                    <div class="avatar_thumbs row">
                                        <a id="hold_img_show" class="col-md-2"
                                            style="width: 100px; height: 80px; display: inline-block;"><img
                                                src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" style="opacity:0.3;cursor:pointer;"
                                                class="img-responsive"></a>

                                    </div>
                                    <input class="hide" hide id="file_uploading" type="file" name="files" value="" />
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
/js/js_act/news_news.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
