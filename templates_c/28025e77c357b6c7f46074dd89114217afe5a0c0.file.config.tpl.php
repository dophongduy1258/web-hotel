<?php /* Smarty version Smarty-3.1.18, created on 2021-08-28 01:06:27
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1574582669612929a3e94797-92314034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28025e77c357b6c7f46074dd89114217afe5a0c0' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/setting/config.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1574582669612929a3e94797-92314034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'setting' => 0,
    'item' => 0,
    'i' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_612929a3f0e9e0_86787729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612929a3f0e9e0_86787729')) {function content_612929a3f0e9e0_86787729($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="row">
    <div class="col-sm-1 col-xs-12">
    </div>
    <div class="col-sm-10 col-xs-12">
        <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['setting']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <div class="col-sm-6 col-xs-12 row-min-height">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['datatype']=='checkbox') {?>
                        <div class="input_name input_name_checkbox" style="margin-top:35px;">
                            <label title="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" class="label_name"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
. <input disabled type="<?php echo $_smarty_tpl->tpl_vars['item']->value['datatype'];?>
"
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['datatype']=='checkbox') {?><?php if ($_smarty_tpl->tpl_vars['item']->value['value']=='1') {?>checked="" <?php }?><?php }?>
                                    placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" varname="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
"
                                    class="ace form-control option-list-all" type="<?php echo $_smarty_tpl->tpl_vars['item']->value['datatype'];?>
" name="" value=""><span
                                    class="lbl <?php if ($_smarty_tpl->tpl_vars['item']->value['value']=='1') {?>active<?php }?>"></span><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
)</label>
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['datatype']=='text') {?>
                        <label title="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" class="label_name"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
. <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
)</label>
                        <div class="input_name">
                            <textarea rows="4" disabled placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" varname="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
"
                                class="form-control option-list-all nt_content"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['datatype']=='textarea') {?>
                        <label title="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" class="label_name"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
. <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
)</label>
                        <div class="input_name">
                            <textarea rows="4" disabled placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" varname="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
"
                                class="form-control option-list-all"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
                        </div>
                    <?php } else { ?>
                        <label title="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" class="label_name"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
. <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
)</label>
                        <div class="input_name">
                            <input disabled type="<?php echo $_smarty_tpl->tpl_vars['item']->value['datatype'];?>
"
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['datatype']=='checkbox') {?><?php if ($_smarty_tpl->tpl_vars['item']->value['value']=='1') {?>checked="" <?php }?><?php }?>
                                placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" varname="<?php echo $_smarty_tpl->tpl_vars['item']->value['varname'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
"
                                class="form-control option-list-all" type="<?php echo $_smarty_tpl->tpl_vars['item']->value['datatype'];?>
" name="" value="">
                        </div>
                    <?php }?>
                </div>
        <?php } ?>
        <br>
        <div class="col-sm-12 col-xs-12 top-20">
            <div class="text-right">
                <button style="display:none" id="btn_cancel" class="btn btn-cancel btn-width">Hủy</button>
                <button id="btn_update" class="btn btn-update btn-width">Cập nhật</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/setting_config.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js"></script><?php }} ?>
