<?php /* Smarty version Smarty-3.1.18, created on 2021-09-23 13:04:08
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/posts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97661788361107803b089b2-70848639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df2984b8c2830a3d9bf084bd9020cbae7b52a94b' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/product/posts.tpl',
      1 => 1632377047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97661788361107803b089b2-70848639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_61107803b0b4e0_50537327',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61107803b0b4e0_50537327')) {function content_61107803b0b4e0_50537327($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container top10">
    <div class="col-sm-12 col-xs-12 top-20 border-t">
    </div>
    <div class="col-sm-12 col-xs-12 top-20 product_index_t">

        <div class="col-sm-1 col-xs-6 top-5 text-right">
            Chi nhánh:
        </div>

        <div class="col-sm-2 col-xs-6">
            <select id="f_shop_id" class="form-control" id="shop_id">
                <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

            </select>
        </div>
        <div class="col-sm-2 col-xs-12">
            <div class="input-group input-group-all filter-call" style="width:100%">
                <select id="f_cat_id" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="input-group">
                <input id="f_keyword" type="text" class="form-control" placeholder="Tên/ mã sản phẩm"
                    aria-describedby="basic-addon1">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </div>
        <div class="col-sm-1 col-xs-12">
            <button id="btn_view" class="btn-width btn btn-primary"> Xem
                <!--Xem-->
            </button>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 top-10 product_index_t1">
        <div class="table-responsive">
            <table class="table table-bg-no">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="10%">Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th width="12%">Giá lẻ</th>
                        <th width="10%">Hiện POS</th>
                        
                        <th width="12%">Số bài viết</th>
                    </tr>
                </thead>
                <tbody id="list" class="row-members">
                </tbody>
            </table>
        </div>

        <div class="col-sm-12">
            <div class="paging text-center" id="page_html">
            </div>
        </div>
    </div>
</div>

<input id="copytoclipboard" type="text" style="opacity:0" value="" />
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/product_posts.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/chosen/chosen.jquery.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
