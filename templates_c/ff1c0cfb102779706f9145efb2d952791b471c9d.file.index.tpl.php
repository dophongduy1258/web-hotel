<?php /* Smarty version Smarty-3.1.18, created on 2021-10-06 16:39:18
         compiled from "/Users/tungla/code/vina/web_retail/seesfrontend/templates/contact/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1934284995615d6ec67eb5b1-02499890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff1c0cfb102779706f9145efb2d952791b471c9d' => 
    array (
      0 => '/Users/tungla/code/vina/web_retail/seesfrontend/templates/contact/index.tpl',
      1 => 1633450915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1934284995615d6ec67eb5b1-02499890',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'setup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_615d6ec6811217_34724411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615d6ec6811217_34724411')) {function content_615d6ec6811217_34724411($_smarty_tpl) {?><div class="container">
    <div class="white-box contact">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="form-login">
                    <form class="form-horizontal" method="post">
                        <h2 class="box-title2 text-uppercase">Thông tin liên hệ</h2>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $_smarty_tpl->tpl_vars['setup']->value['company_address'];?>
</p>
                        <p><a href="tel:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $_smarty_tpl->tpl_vars['setup']->value['company_phone'];?>
</a></p>
                        <p><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['setup']->value['company_email'];?>
"><i class="fa fa-send" aria-hidden="true"></i><?php echo $_smarty_tpl->tpl_vars['setup']->value['company_email'];?>
</a></p>
                        <h2 class="box-title2 text-uppercase">Gửi thông tin</h2>
                        <div class="form-input">
                            <label>Họ & tên</label>
                            <input type="text" id='fullname' class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Email</label>
                            <input type="text" id='email' class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Số điện thoại</label>
                            <input type="text" id='mobile' maxlength="15" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Nội dung</label>
                            <textarea id='content'></textarea>
                        </div>
                        <div class="form-input text-center">
                            <button type="submit" id='submitInfo' class="btn btn-key btn-width100">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <h2 class="box-title2 text-uppercase">Maps</h2>
                <?php echo $_smarty_tpl->tpl_vars['setup']->value['link_google_map'];?>

            </div>
        </div>
    </div>
</div><?php }} ?>
