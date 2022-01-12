<?php /* Smarty version Smarty-3.1.18, created on 2021-09-08 11:44:45
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/training/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135077182261383fbdb33546-68073063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd267d4f182e9b73b0933f5623ed57e8468fd0b3' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/training/index.tpl',
      1 => 1628747003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135077182261383fbdb33546-68073063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'link' => 0,
    'lCertificate' => 0,
    'item' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61383fbdb733e3_29703268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61383fbdb733e3_29703268')) {function content_61383fbdb733e3_29703268($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
    <!--<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-right dnsd2 top10">
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=user" id="btn_add" class="btn btn-success top5"><i class="glyphicon glyphicon-plus"></i> Thêm khách hàng</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=user" id="gid_btn_open_modal" class="btn btn-primary top5"><i class="glyphicon glyphicon-th-large"></i> Quản lý nhóm</a>
        </div>
    </div>-->
    <div class="traning-lever traning-lever-index hide1">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lCertificate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li data-item="item7" class="lever<?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>
">
                    <div class="img" id="detail_lever" idCertificate="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/img/traning/lever<?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>
.png" class="img-responsive" alt="" />
                        <p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                    </div>
                     <div class="traning-lever0">
                         <div class="item item<?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>
">
                            <h2 class="title">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/img/traning/checkpoint-castle-complete<?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>
.png"
                                    class="img-responsive" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['item']->value['priority'];?>
</span>
                                <p><?php echo $_smarty_tpl->tpl_vars['item']->value['sub_description'];?>
</p>
                            </h2>
                             <div id="detailCertificate<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            </div>
                         </div> 
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/training_index.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
