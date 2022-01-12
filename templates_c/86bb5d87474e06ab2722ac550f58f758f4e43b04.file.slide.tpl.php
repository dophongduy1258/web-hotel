<?php /* Smarty version Smarty-3.1.18, created on 2021-09-07 13:34:34
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/slide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1230844549610ee31f4a0325-80930455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86bb5d87474e06ab2722ac550f58f758f4e43b04' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/slide.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1230844549610ee31f4a0325-80930455',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ee31f4dad13_97254474',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ee31f4dad13_97254474')) {function content_610ee31f4dad13_97254474($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">

    <div class="top-10">

        <div class="row">

            <div class="col-lg-2 col-xs-6 top-5">
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="f_shop_id" class="form-control filter-option width-100p">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="f_hidden" class="form-control filter-option width-100p">
                        <option value="">Tất cả</option>
                        <option value="1">Ẩn</option>
                        <option value="0">Hiện</option>
                    </select>
                </div>
            </div>

            

            <div class="col-lg-3 col-xs-9 top-5 relative">
                <div class="input-group1">
                    <input placeholder="Tên Slide" class="form-control" name="" id="f_keyword" type="text" />
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
                <table class="table">
                    <tr>
                        <th></th>
                        <th style="width:100px">Ưu tiên</th>
                        <th style="width:45px">
                            Hiện
                            <button id="btn-edit-all-hidden" title="Cập nhật trạng thái ẩn/ hiện của Slide"
                                class="btn btn-primary btn-edit-all-hidden"><i class="fa fa-pencil-square-o"></i> Cập
                                nhật</button>
                        </th>
                        <th style="width:120px">@</th>
                    </tr>
                </table>
                <table class="table">
                    <tr class="theme-cat-itemsx">
                        <td colspan="6" style="padding:0">
                            <table class="table">
                                <tr class="cat-info">
                                    <td width="5%"><i class="fa fa-bolt" aria-hidden="true"></i></td>
                                    <td width="8%" colspan="1" class="text-right">
                                        Tên Slide:
                                    </td>
                                    <td>
                                        <input placeholder="Tên Slide" id="new_root_name" class="form-control" />
                                    </td>
                                    <td style="width:100px">
                                        <input placeholder="Ưu tiên" id="new_root_priority" class="form-control"
                                            type="number" value="" />
                                    </td>
                                    <td style="width:100px">
                                        <select id="new_root_hidden" class="form-control">
                                            <option selected value="0">Hiện</option>
                                            <option value="1">Ẩn</option>
                                        </select>
                                    </td>
                                    <td style="width:120px" class="text-center">
                                        <button class="new-root-item btn btn-success "><i class="fa fa-plus-circle"
                                                aria-hidden="true"></i> Thêm</button>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div id="f_list" class="col-sm-12 col-xs-12">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="paging text-center" id="f_page_html">
                </div>
            </div>
        </div>
    </div>

</div>

<input class="hide" type="file" name="files" id="banner_root" accept="image/x-png,image/gif,image/jpeg" value="" />
<input class="hide" type="file" name="files" id="banner_icon" accept="image/x-png,image/gif,image/jpeg" value="" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/upload_temp.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/theme_slide.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
