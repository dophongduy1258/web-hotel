<?php /* Smarty version Smarty-3.1.18, created on 2021-09-30 22:01:12
         compiled from "/Users/tungla/code/vina/erp/posretail/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1102558455615475c6b17cb8-99569857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d29db78a60f50600988f31d192a4bfee65c0f6' => 
    array (
      0 => '/Users/tungla/code/vina/erp/posretail/templates/footer.tpl',
      1 => 1633014049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1102558455615475c6b17cb8-99569857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615475c6b37079_35241497',
  'variables' => 
  array (
    'm' => 0,
    'act' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615475c6b37079_35241497')) {function content_615475c6b37079_35241497($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tungla/code/vina/erp/posretail/library/smarty/plugins/modifier.date_format.php';
?>		
	<?php if (($_smarty_tpl->tpl_vars['m']->value!="main"||$_smarty_tpl->tpl_vars['act']->value!="retail")&&$_smarty_tpl->tpl_vars['m']->value!="print") {?>
	<script type="text/javascript">
	$(function(){
	  	var wheight = $(window).height();
	  	var footer_index = $("#footer-bar").offset();
	  	var footer_index = parseInt(footer_index.top);
	  	var difference = wheight - footer_index;
	  	if( difference > 40 ){
			$('#footer-bar').css("top",  difference - 30);
		}
	});
	</script>
	<footer id="footer-bar">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-footer">
			<div class="row">
				<div class="col-sm-12 text-center">
					Copyright &copy; <?php echo smarty_modifier_date_format(time(),"Y");?>
 - <a target="_blank" href="https://sees.vn">SeeS.vn</a> ERP SYSTEM
				</div>
			</div>
		</div>
	</footer>
	<?php }?>
	
	<div id="loading_bar" style="display:none">
		<img border="0" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/loading.gif"><br>
		loading...
	</div>
	
	<a href="#top" class="back-top text-center" onclick="$('body,html').animate({scrollTop:0},500); return false" style="display: none;">
		<i class="glyphicon glyphicon-arrow-up"></i>
	</a>
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/bootstrap.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/bootstrap-dialog.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.bootstrap-touchspin.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>		
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.nicescroll.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/owlCarousel/owl.carousel.css?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" rel="stylesheet">
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/owlCarousel/owl.carousel.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/global.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
	<script>
		
	</script>
	</body>
</html>


<?php }} ?>
