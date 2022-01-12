<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 02:13:13
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/cashback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:864289283610f880e1d8082-27061982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2f3a82e8d8efac24634961a268975fb39a31b88' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/wallet/cashback.tpl',
      1 => 1632597169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '864289283610f880e1d8082-27061982',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610f880e231321_85219756',
  'variables' => 
  array (
    'tpldirect' => 0,
    'lMemberGroup' => 0,
    'item' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610f880e231321_85219756')) {function content_610f880e231321_85219756($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/comconfig.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container top10">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10 product_index_t">
        
        <div class="top-10">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <div id="dropdown_check_list" class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown">
                                <i class="glyphicon glyphicon-cog"></i> Ẩn/ hiện nhóm khách hàng
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lMemberGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                    <li>
                                        <label class="checkbox-field-lb">
                                            <input <?php if ($_smarty_tpl->tpl_vars['item']->value['is_hidden']==0) {?>checked<?php }?> class="checkbox-field ace"
                                                type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                            <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                                        </label>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 top-10 table-responsive">
                    <table
                        class="table table-hover table-bordered table-bg">
                        <thead id="tpl_mgnt_cashback_header">
                        </thead>
                        <tbody id="tpl_mgnt_cashback">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     </div>
</div>
<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/wallet_cashback.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
