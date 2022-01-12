<?php /* Smarty version Smarty-3.1.18, created on 2021-08-28 01:42:31
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15936666896129321752ab25-66914219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4ae8054cc74028a03508122c784c34347bb9648' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/payment.tpl',
      1 => 1628362138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15936666896129321752ab25-66914219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpldirect' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6129321756eb58_43968782',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6129321756eb58_43968782')) {function content_6129321756eb58_43968782($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--main content-->
<div class="admin_middle">
    <div class="container">
        <table class="table table-hover table-bordered table-bg">
            <thead>
                <tr>
                    <th>STT</th>
                    <th class="text-left">Tên hình thức</th>
                    <th width="15%">Sắp xếp</th>
                    <th width="15%">Của ví điểm</th>
                    <th>@</th>
                </tr>
            </thead>
            <tbody id="payment_list">
            </tbody>
        </table>
    </div>
</div>
<!--end main content-->


<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/supervisor_payment.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script>
    var widthShop = $('.list-shop li .img').width();
    var heightShop = widthShop * 220 / 400;
    $('.list-shop li .img').css('height', heightShop + 'px');
    $(window).resize(function() {
        var widthShop = $('.list-shop li .img').width();
        var heightShop = widthShop * 220 / 400;
        $('.list-shop li .img').css('height', heightShop + 'px');
    });
</script><?php }} ?>
