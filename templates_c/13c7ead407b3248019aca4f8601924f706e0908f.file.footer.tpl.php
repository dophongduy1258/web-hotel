<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 15:55:43
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1498246016615d62fdd5caa3-56799650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13c7ead407b3248019aca4f8601924f706e0908f' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/footer.tpl',
      1 => 1633510508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1498246016615d62fdd5caa3-56799650',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d62fdd699a5_11150939',
  'variables' => 
  array (
    'menu_suggest' => 0,
    'menu_bottom' => 0,
    'setup' => 0,
    'domain' => 0,
    'version' => 0,
    'm' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d62fdd699a5_11150939')) {function content_615d62fdd699a5_11150939($_smarty_tpl) {?>    <div class="menu-top-bottom">
        <ul>
            <?php echo $_smarty_tpl->tpl_vars['menu_suggest']->value;?>

            
        </ul>
    </div>
    <footer>
        <div class="container">
            <div class="menu-bottom">
                <div class="row">
                    <?php echo $_smarty_tpl->tpl_vars['menu_bottom']->value;?>

                    
                </div>
            </div>
            <div class="footer">
                <?php echo $_smarty_tpl->tpl_vars['setup']->value['info_footer'];?>

                
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
/js/bootstrap.min.js"></script>
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
/js/bootstrap-dialog.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/jquery-ui.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/main.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
    
    </body>

</html><?php }} ?>
