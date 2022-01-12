<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:14:27
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21398998366146e03771b6e6-12658916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29a25e6691d3f52a68bf49f8bf8a5f7c08175ee3' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/news/config.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21398998366146e03771b6e6-12658916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6146e037754225_38916903',
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6146e037754225_38916903')) {function content_6146e037754225_38916903($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
    <div class="col-xs-3 col-sm-3 col-lg-3">
        <input id="id" class="form-control hide" type="text" name="" value="">
    </div>

    <div class="col-xs-6 col-sm-6 col-lg-6">
        <div class="wrap_name">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <label class="label_name">Meta tiêu đề</label>
                <div class="input_name">
                    <input id="meta_title" class="form-control" type="text" name="" value="">
                </div>
            </div>
        </div>
        <div class="wrap_name">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <label class="label_name">Meta mô tả</label>
                <div class="input_name">
                    <input id="meta_description" class="form-control" type="text" name="" value="">
                </div>
            </div>
        </div>
        <div class="wrap_name">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <label class="label_name">Meta từ khóa</label>
                <div class="input_name">
                    <input id="meta_keyword" class="form-control" type="text" name="" value="">
                </div>
            </div>
        </div>
        <div class="wrap_name">

            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <p><label class="label_name">Hình ảnh</label></p>
                <div class="col-sm-4 col-lg-4">
                    <label title="Ảnh đại diện" class="label_name">Chọn ảnh đại diện</label>
                    <div class="avatar_thumbs">
                        <a onclick="click_file('avatar_file')" id="load_avatar"
                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                            <img id="avatar" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                        </a>
                    </div>
                    <div class="hide">
                        <input class="hide" name="files" type="file" accept="image/x-png,image/gif,image/jpeg"
                            id="avatar_file" value="">
                        <input class="hide" name="" type="text" id="avatar_val" value="">
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <label title="Biểu tượng" class="label_name">Chọn biểu tượng</label>
                    <div class="avatar_thumbs">
                        <a onclick="click_file('icon_file')" id="load_icon"
                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                            <img id="icon" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                        </a>
                    </div>
                    <div class="hide">
                        <input class="hide" name="files" type="file" accept="image/x-png,image/gif,image/jpeg"
                            id="icon_file" value="">
                        <input class="hide" name="" type="text" id="icon_val" value="">
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <label title="Ảnh nền" class="label_name">Chọn ảnh nền</label>
                    <div class="avatar_thumbs">
                        <a onclick="click_file('background_file')" id="load_background"
                            style="width: 224px;height: 150px;display:inline-block;margin: 0px;">
                            <img id="background" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/no_image.png">
                        </a>
                    </div>
                    <div class="hide">
                        <input class="hide" name="files" type="file" accept="image/x-png,image/gif,image/jpeg"
                            id="background_file" value="">
                        <input class="hide" name="" type="text" id="background_val" value="">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-lg-3">
    </div>
    <div class="col-xs-4 col-sm-4 col-lg-4">
    </div>
    <div class="col-xs-4 col-sm-4 col-lg-4">
    </div>
    <div class="col-xs-4 col-sm-4 col-lg-4 top20">
        <div>
            <button id="btn_update" class="btn btn-update btn-width">Lưu</button>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
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
/js/js_act/news_config.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
