<?php /* Smarty version Smarty-3.1.18, created on 2022-01-11 16:16:02
         compiled from "H:\php\hotel\web\web_erp\templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:783761dd3e095b5458-10023932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a03e4930cc27ccf833422c74262dc66c9f77a23' => 
    array (
      0 => 'H:\\php\\hotel\\web\\web_erp\\templates\\footer.tpl',
      1 => 1641892557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '783761dd3e095b5458-10023932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61dd3e095dba64_76678853',
  'variables' => 
  array (
    'setup' => 0,
    'menu_bottom' => 0,
    'domain' => 0,
    'version' => 0,
    'm' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61dd3e095dba64_76678853')) {function content_61dd3e095dba64_76678853($_smarty_tpl) {?>    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <?php if (isset($_smarty_tpl->tpl_vars['setup']->value['info_footer'])&&$_smarty_tpl->tpl_vars['setup']->value['info_footer']!='') {?>
                        <div class="footer">
                            <?php echo $_smarty_tpl->tpl_vars['setup']->value['info_footer'];?>

                        </div>
                    <?php }?>
                    
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="menu-bottom">
                        <div class="row">
                            <?php echo $_smarty_tpl->tpl_vars['menu_bottom']->value;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="modal_alert_dialog" class="modal fade modalAlert" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="close" data-dismiss="modal" aria-label="Close">x</span>
                    <h3>Thông báo</h3>
                    <p id="message_alert"></p>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="loading_bar"><i class="fa fa-spinner fa-spin fa-5x fa-fw margin-bottom"></i></div>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/owlCarousel/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/rangeSlider.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/cloudzoom.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/bootstrap/bootstrap-dialog.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery-ui.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery.nicescroll.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/main.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <?php if (((string)$_smarty_tpl->tpl_vars['m']->value).((string)$_smarty_tpl->tpl_vars['act']->value)=='newsdetail') {?>
        <!--detail album-->
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/AnimOnScroll/modernizr.custom.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/AnimOnScroll/masonry.pkgd.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/AnimOnScroll/imagesloaded.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/AnimOnScroll/classie.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/AnimOnScroll/AnimOnScroll.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
        <script type="text/javascript">
            if ($('#grid').length > 0) {
                new AnimOnScroll(document.getElementById('grid'), {
                    minDuration: 0.4,
                    maxDuration: 0.7,
                    viewportFactor: 0.2
                });
            }
            $('.fancybox-thumbs').fancybox({
                closeBtn: true,
                arrows: true,
                nextClick: true,

                helpers: {
                    thumbs: {
                        width: 70,
                        height: 50,
                    }
                }
            });
        </script>
        <!--detail album-->
    <?php }?>
    
    </body>

</html><?php }} ?>
