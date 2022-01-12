<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:15:01
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:599409035614811b9c0d3f9-66562079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56a54cb75e99aa5118dd6b551c001ead11b94083' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/manager/menu.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '599409035614811b9c0d3f9-66562079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614811b9c4d9f9_41563329',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614811b9c4d9f9_41563329')) {function content_614811b9c4d9f9_41563329($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container">
                <ul class="nav nav-tabs nav-storing">

                    <li id="tab_top" class="tab-modify active"><a data-toggle="tab" href="#top">Menu trên</a></li>
                    <li id="tab_bottom" class="tab-modify"><a data-toggle="tab" href="#bottom">Menu dưới</a></li>
                    </li>

                </ul>

                <div class="tab-content">
                    

                    
                    <div id="top" class="tab-pane fade in active">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="input-group">
                                        <input id="keyword_top" type="text" class="form-control"
                                            placeholder="Tên menu" aria-describedby="basic-addon1">
                                        <span id="btn_keyword_top" class="input-group-addon filter-class"><i
                                                class="glyphicon glyphicon-search"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-12">
                                    <button id="btn_view_top" type="button"
                                        class="btn btn-primary btn-width">Xem</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <button type_menu="0" class="btn btn-success btn-width btn_add_menu">Thêm menu
                                        trên</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                                <div class="table-responsive">
                                    <table
                                        class="table  table-striped table-bordered text-center members member_list table-bg-no">
                                        <thead id="">
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Hiển thị</th>
                                                <th width="150">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_top" class="row-members">
                                        </tbody>
                                    </table>
                                    <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
                                        <div id="page_html_top" class="col-lg-12 col-md-12 top10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    
                    <div id="bottom" class="tab-pane fade in">
                        <div class="row modal-tag-height">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="input-group">
                                        <input id="keyword_bottom" type="text" class="form-control"
                                            placeholder="Tên menu" aria-describedby="basic-addon1">
                                        <span id="btn_keyword_bottom" class="input-group-addon filter-class"><i
                                                class="glyphicon glyphicon-search"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-6 col-xs-12">
                                    <button id="btn_view_bottom" type="button"
                                        class="btn btn-primary btn-width">Xem</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <button type_menu="1" class="btn btn-success btn-width btn_add_menu">Thêm menu
                                        dưới</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                                <div class="table-responsive">
                                    <table
                                        class="table  table-striped table-bordered text-center members member_list table-bg-no">
                                        <thead id="">
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Hiển thị</th>
                                                <th width="150">@</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_bottom" class="row-members">
                                        </tbody>
                                    </table>
                                    <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
                                        <div id="page_html_bottom" class="col-lg-12 col-md-12 top10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T" id="modal_add_menu_title">Thêm menu</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Tên menu</label>
                                    <div class="input_name">
                                        <input id="name" class="form-control" type="text" name="" value="">
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Thuộc danh mục</label>
                                    <div class="input_name select_root_id">
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="wrap_name">
                                    <label class="label_name">Hình thức mở trang</label>
                                    <div class="input_name">
                                        <select class="form-control" id="open_page">
                                            <option value="0">Trang hiện tại</option>
                                            <option value="1">Mở trang mới</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="wrap_name">
                                    <label class="label_name">Thứ tự</label>
                                    <div class="input_name">
                                        <input id="priority" class="form-control" type="number" name="" value="">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="wrap_name">
                                    <label title="Biểu tượng" class="label_name">Chọn biểu tượng</label>
                                    <div class="avatar_thumbs">
                                        <a onclick="click_file('icon_file')" id="load_icon"
                                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                                            <img id="icon" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                                        </a>
                                    </div>
                                    <div class="hide">
                                        <input class="hide" name="files" type="file"
                                            accept="image/x-png,image/gif,image/jpeg" id="icon_file" value="">
                                        <input class="hide" name="" type="text" id="icon_val" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 top20">
                                <button id="btn_save_menu" style="float: right; margin-right:30px;" type_menu="0"
                                    class="btn btn-update btn-width">Lưu</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
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
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/manager_menu.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
