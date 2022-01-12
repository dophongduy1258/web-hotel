<?php /* Smarty version Smarty-3.1.18, created on 2021-09-25 03:41:02
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1828195353614c1e2ae3f645-60276877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bc9a77a62b71f5b89ff63c41c9bc6ec9f8a408a' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/post.tpl',
      1 => 1632516061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1828195353614c1e2ae3f645-60276877',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_614c1e2ae7de93_49893525',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'lang' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_614c1e2ae7de93_49893525')) {function content_614c1e2ae7de93_49893525($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container top10">
    <div class="col-sm-12 col-xs-12 top-20 border-t">
    </div>
    <div class="col-sm-12 col-xs-12 top-20 product_index_t">

        <div class="col-sm-1 col-xs-6 top-5 text-right">
            Chi nhánh:
        </div>

        <div class="col-sm-2 col-xs-6">
            <select id="f_shop_id" class="form-control" id="shop_id">
                <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

            </select>
        </div>
        <div class="col-sm-2 col-xs-12">
            <div class="input-group input-group-all filter-call" style="width:100%">
                <select id="f_cat_id" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-sm-2 col-xs-12">
            <div class="input-group input-group-all filter-call" style="width:100%">
                <select id="f_hidden" class="form-control">
                    <option value="">Tất cả sản phẩm</option>
                    <option value="0">Hiện POS</option>
                    <option value="1">Ẩn POS</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="input-group">
                <input id="f_keyword" type="text" class="form-control" placeholder="Tên/ mã sản phẩm"
                    aria-describedby="basic-addon1">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="col-sm-1 col-xs-12">
            <button id="btn_view" class="btn-width btn btn-primary"> Xem
                <!--Xem-->
            </button>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 top-10 product_index_t1">
        <div class="table-responsive">
            <table class="table table-bg-no">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="10%">Mã SP</th>
                        <th class="text-left">Tên sản phẩm</th>
                        <th width="12%">Giá lẻ</th>
                        <th width="10%">Hiện POS</th>
                        <th width="12%">Số bài viết</th>
                    </tr>
                </thead>
                <tbody id="list" class="row-members">
                </tbody>
            </table>
        </div>

        <div class="col-sm-12">
            <div class="paging text-center" id="page_html">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--BEGIN TAO SHOP-->
    <div class="modal-dialog modal-small">
        <div class="modal-content noborder">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 id="balance_title" class="header-collection">Thêm bài viết</h4>
            </div>
            <div class="modal-body noborder margintop-10 padding-bottom-10">
                
                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Tiêu đề:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <input placeholder="Tiêu đề bài mẫu" id="title" class="form-control" value="" />
                    </div>
                </div>

                <div class="col-lg-12 top-5">
                    <div class="col-lg-12 col-sm-12">
                        - Nội dung:
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <textarea placeholder="Nội dung bài viết" id="content" class="form-control" rows="15"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 top-5">
                    <label>
                        <input type="checkbox" class="ace" id="hidden" value=""/>
                        <span class="lbl"></span> Ẩn
                    </label>
                </div>
                <div class="col-lg-12 top-5">
                    <label class="label_name">Hình ảnh/ Videos</label>
                </div>
                <div class="col-lg-12">
                    <div id="before_media" class="avatar_thumbs avatar_thumbs_lq col-sm-2">
                        <a onclick="click_file('media')" id="load_media">
                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/upload.png">
                        </a>
                    </div>
                    <input class="hide" name="files" type="file"
                    accept="image/x-png,image/gif,image/jpeg,.pdf,.doc,.xls,.xlsx,.docx,.ptt,.pttx" id="media" value="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-width" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!--Hủy-->
                </button>
                <button type="button" id="btn_post_save" class="btn btn-primary btn-width" id="btnPurchase">Hoàn
                    tất</button>
            </div>
        </div>
    </div>
</div>

<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/product_post.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
