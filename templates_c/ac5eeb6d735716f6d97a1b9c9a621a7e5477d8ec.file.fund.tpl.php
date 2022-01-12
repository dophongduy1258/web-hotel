<?php /* Smarty version Smarty-3.1.18, created on 2021-08-09 13:20:50
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/pub/fund.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16460361566110b9e0e40ba9-99113481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac5eeb6d735716f6d97a1b9c9a621a7e5477d8ec' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/pub/fund.tpl',
      1 => 1628490047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16460361566110b9e0e40ba9-99113481',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6110b9e0e436c3_98466271',
  'variables' => 
  array (
    'data' => 0,
    'key' => 0,
    'item' => 0,
    'client_id' => 0,
    'offset' => 0,
    'page_html' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6110b9e0e436c3_98466271')) {function content_6110b9e0e436c3_98466271($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/huan/Desktop/Data/Outsource/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?><div class="wrap-content-report">
    <div class="content-report">
        <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['item_data']['banner'];?>
?v=1.0.01" />
        <div class="step1">
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['link_activity'];?>
">Chi tiết hoạt động và thu chi <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
        <div class="step2">
            <h2><img src="public/imgs/ic_payment.png" />Báo cáo quỹ thu chi</h2>
            <div class="detail-fund">
                <div class="row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['lInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <div class="item color-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 money col-md-6 col-sm-6 col-xs-12">
                        <div class="iframe">
                            <h3><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</h3>
                            <p><span>Góp:</span> <b><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['total_value'],"0",".",",");?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_symbol'];?>
</b></p>
                            <p><span>Chi:</span> <b><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['total_paid'],0,".",",");?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_symbol'];?>
</b></p>
                            <p><span>Tồn:</span> <b><?php echo $_smarty_tpl->tpl_vars['item']->value['total_value']-number_format($_smarty_tpl->tpl_vars['item']->value['total_paid'],0,".",",");?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_symbol'];?>
</b></p>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        <div class="step3">
            <h2>Danh sách giao dịch thu chi</h2>
            <ul>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['l']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['item']->value['from_client']==$_smarty_tpl->tpl_vars['client_id']->value) {?>withdraw<?php } else { ?>deposit<?php }?>">
                    <span><?php echo $_smarty_tpl->tpl_vars['offset']->value++;?>
</span>
                    <div class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created_at'],"H:i d/m/Y");?>
</div>
                    <div class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['to_fullname'];?>
</div>
                    <div class="info"><?php echo $_smarty_tpl->tpl_vars['item']->value['note'];?>
</div>
                    <div class="price">+<?php echo number_format($_smarty_tpl->tpl_vars['item']->value['amount'],"0",".",",");?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['wallet_symbol'];?>
</div>
                </li>
                <?php } ?>
                
            </ul>
        </div>
        <div id="hd_page_html" class="col-lg-12 col-md-12 top10">
            <div id="page_html" class="col-lg-12 col-md-12 top10">
                <?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

            </div>
        </div>
    </div>
</div>

<link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/pub/css/main.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet" />
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/pub/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/pub/js/owlCarousel/owl.carousel.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/pub/js/jquery.flexslider.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/pub/js/main.js"></script><?php }} ?>
