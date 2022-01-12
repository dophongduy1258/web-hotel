<?php /* Smarty version Smarty-3.1.18, created on 2021-08-25 02:38:39
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1134118161610ee3da6cdcb5-13283545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84337bf5c9bde4439773ac58b098585d75703889' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/theme/block.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1134118161610ee3da6cdcb5-13283545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610ee3da711ad5_61573326',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610ee3da711ad5_61573326')) {function content_610ee3da711ad5_61573326($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">

    <div class="top-10">

        <div class="row">

            <div class="col-lg-2 col-xs-6 top-5">
            </div>

            <div class="col-lg-3 col-xs-6 top-5">
                <div class="input-group1 ">
                    <select id="f_shop_id" class="form-control filter-option width-100p">
                        <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-xs-9 top-5 relative">
                <div class="input-group1">
                    <input placeholder="Tên Block" class="form-control" name="" id="f_keyword" type="text" />
                    <button id="f_btn_view" class="btn btn-primary btn-width"
                        style="position: absolute;right: 8px;z-index: 111;top: 0px;border-radius: 0px 4px 4px 0px;"><span
                            class="glyphicon glyphicon-eye-open" style="top: 2px;"></span> Xem</button>
                </div>
            </div>

            <div class="col-lg-1 col-xs-3 top5">
            </div>

        </div>

        <div class="top-10 product_index_t1">
            <div class="">
                
                <table class="table">
                    <tr class="theme-cat-itemsx">
                        <td colspan="6" style="padding:0">
                            <table class="table">
                                <tr class="cat-info">
                                    <td width="5%"><i class="fa fa-bolt" aria-hidden="true"></i></td>
                                    <td width="8%" colspan="1" class="text-right">
                                        Tên Block:
                                    </td>
                                    <td>
                                        <input maxlength="256" placeholder="Tên Block" id="new_name" class="form-control" />
                                    </td>
                                    <td style="width:30%">
                                        <input placeholder="Ghi chú" id="new_note" class="form-control"
                                            type="text" value="" />
                                    </td>
                                    <td style="width:120px" class="text-center">
                                        <button class="new-item btn btn-success "><i class="fa fa-plus-circle"
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
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/upload_temp.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/theme_block.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
