<?php /* Smarty version Smarty-3.1.18, created on 2021-09-22 16:36:41
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:566542344610fc1986b9773-81433538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9376acd4f416133eea7b712e1cda9100b65d6800' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/supervisor/category.tpl',
      1 => 1632035470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '566542344610fc1986b9773-81433538',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610fc1987ef5d8_26022285',
  'variables' => 
  array (
    'tpldirect' => 0,
    'session' => 0,
    'str_permission' => 0,
    'lang' => 0,
    'totalWaitSortedProductFromWeb' => 0,
    'opt_pro_comm' => 0,
    'opt_brand' => 0,
    'opt_supplier' => 0,
    'setup' => 0,
    'list_business' => 0,
    'item' => 0,
    'opt_shop' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610fc1987ef5d8_26022285')) {function content_610fc1987ef5d8_26022285($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="col-sm-12">
    <div class="btn-group" role="group" aria-label="...">
        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':clone_catclone:'))!==false) {?>
            <button id="clone_category" onclick="show_clone_cat();" class="btn btn-warning btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_copyProduct'];?>

                <!--Sao chép-->
            </button>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':ex2ppt1:'))!==false) {?>
            <button id="print_code" onclick="print_code_f();" class="btn btn-default btn-width"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_productLabel'];?>

                <!--In Mã SP-->
            </button>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categorydl:'))!==false) {?>
            <button id="download_all_product" onclick="download_all_product();" class="btn btn-info btn-width">Tải sản
                phẩm</button>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categoryimport_excel:'))!==false) {?>
            <button title="Nhập sản phẩm từ file excel" id="btn_import_excel" class="btn btn-default btn-width">Nhập
                Excel</button>
        <?php }?>
    </div>
</div>
<!--*### Product Mới ###* -->

<!--*### End Product Mới ###*-->
<div class="container1">
    <div class="category_holder">
        <div id="holder_category">
            <input id="shop_id" class="display-none" hidden value="" />
            <ul class="maincate_menu" style="width:100%;margin-top:60px;" id="tpl_shop">
                <h4>
                    <!-- Chưa tạo cửa hàng  -->
                </h4>
            </ul>
        </div>
    </div>
    <div class="category_holder">
        <h4 class="title border-separate"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catRoot'];?>

            <!-- Danh mục chính  -->
            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categorycat:'))!==false) {?>
                <a onclick="addRootCat();" class="btn_brand_sm btn_add_category float-right">
                    <i class="glyphicon glyphicon-plus-sign font-size-16"></i>
                    <span class="in_btn_text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_addNew'];?>

                        <!-- Thêm mới -->
                    </span>
                </a>
            <?php }?>
        </h4>
        <input id="root_id" class="display-none" hidden value="" />
        <ul class="cate_menu">
            <span id="tpl_adminRootCat"></span>
        </ul>

        <h4 class="title border-separate"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catSub'];?>

            <!-- Danh mục phụ  -->
            <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categorycat:'))!==false) {?>
                <a onclick="addCat();" class="btn_brand_sm btn_add_category float-right">
                    <i class="glyphicon glyphicon-plus-sign font-size-16"></i>
                    <span class="in_btn_text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_addNew'];?>
</span>
                </a>
            <?php }?>
        </h4>
        <input id="cat_id" class="display-none" hidden value="" />
        <ul class="cate_menu">
            <span id="tpl_adminCat">
                <!-- HTML DOM -->
            </span>
        </ul>

    </div>

    <div class="title_tab border-separate title_tab_t">
        <h4 class="title padding-top-12p"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_listPro'];?>

            <!-- Danh sách sản phẩm -->
            <a href="javascript:;" id="btn_show_no_category" class="btn btn-danger no_category pull-left">Chưa phân loại
                (<span id="totalWaitSortedProductFromWeb"><?php echo $_smarty_tpl->tpl_vars['totalWaitSortedProductFromWeb']->value;?>
</span>)</a>
            <div class="pull-right">

                <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']=='0'||(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categoryadd:'))!==false) {?>
                    <a onclick="addProduct();" class="btn_brand_sm R">
                        <i class="glyphicon glyphicon-plus-sign font-size-16"></i>
                        <span class="in_btn_text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_addNew'];?>
</span>
                    </a>
                <?php }?>

                <div class="search R search_cus">
                    <a onclick="clearInputSearch();" class="icon-cate icon-other-x square_x"></a>
                    <span id="icon-txt-search-product" class="icon-cate icon-other-search1"></span>
                    <input id="keyword" type="text" maxlength="200" class="search_text"
                        placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['rpholder_ProName'];?>
">
                </div>

            </div>
        </h4>
    </div>

    <div class="col-sm-12 bg-white">
        <div class="table-responsive">
            <table class="list_table list_table_t11 text-center text-center" width="100%" border="0" cellspacing="0"
                cellpadding="0">
                <thead>
                    <tr class="headertable">
                        <th width="14%" scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proImg'];?>

                            <!-- Hình ảnh -->
                        </th>
                        <th width="5%" scope="col">ID</th>
                        <th scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proName'];?>

                            <!-- Tên sản phẩm -->
                        </th>
                        <th width="13%" scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proPriceSell'];?>

                            <!-- Giá bán -->
                        </th>
                        <th width="11%" scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proAmount'];?>

                            <!-- Số lượng -->
                        </th>
                        <th width="5%" scope="col">
                            Ẩn/ Hiện <a id="btn_hidden_ck" class="btn btn-success"><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        </th>
                        <th width="140" scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_function'];?>

                            <!-- Chức năng -->
                        </th>
                    </tr>
                </thead>
                <tbody id="tpl_Products">
                    <!-- HTML DOM -->
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <span id="page_html">
            </span>
            <div class="info_table">
                <input hidden class="hidden" value="1" id="current_page">
                <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_show'];?>

                    <select id="perpage" class="choose_record">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_record'];?>
</label>
                |
                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_found'];?>
 [<span id="total_product">0</span>] <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_recordTotal'];?>

            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>

<input hidden class="display-none" value="" id="product_id">

<!--BEGIN ADD PRODUCT modal-->
<div class="modal fade" id="modal_add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proNewHeader'];?>

                <!-- Tạo Sản Phẩm Mới -->
            </div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="table-product">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="label_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_proName'];?>

                                <!-- Tên sản phẩm --><span class="other_color">*</span>
                            </label>
                            <div class="input_name">
                                <input id="md_name" maxlength="250" class="form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_productID'];?>

                                <!-- Mã sản phẩm -->
                            </label>
                            <div class="input_name">
                                <input id="md_code" placeholder="" class="form-control" maxlength="20" type="text">
                                <!--Mã sản phẩm-->
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_subCat2'];?>

                                <!-- Danh mục phụ-->
                            </label>
                            <select id="md_select_cat_id" class="choose_cate selectpicker show-tick form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Đơn vị nhập</label>
                            <div class="input_name">
                                <input maxlength="10" placeholder="Ví dụ: Thùng, kiện ..." id="md_unit_import"
                                    class="form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Hệ số</label>
                            <div class="input_name">
                                <input maxlength="10" id="md_ratio_convert" class="form-control number-format"
                                    type="text" name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Đơn vị xuất</label>
                            <div class="input_name">
                                <input placeholder="Ví dụ: Cái, chiếc ..." id="md_unit_export" class="form-control"
                                    maxlength="10" type="text">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="input-check">
                                <label class="label_name">&nbsp;</label>
                                <label class="field_L1">
                                    <input id="md_have_serial" checked="" class="ace" type="checkbox">
                                    <span class="lbl active"></span>
                                    Sản phẩm có Serial No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Giá bán (theo đơn vị xuất)</label>
                            <div class="input_name">
                                <input id="md_price" maxlength="13" id="md_price" class="form-control number-format"
                                    type="text" name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">
                                <input id="md_on_sales" maxlength="13" class="ace" type="checkbox"><span
                                    class="lbl"></span>
                                Khuyến mãi
                            </label>
                            <div class="input_name hide">
                                <input id="md_sales" maxlength="13" class="form-control number-format" type="text"
                                    name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 hide">
                            <label class="label_name">Giá sỉ</label>
                            <div class="input_name">
                                <input id="md_wholesale_price" placeholder="" class="form-control number-format"
                                    maxlength="10" type="text">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="input-check">
                                <label class="label_name">&nbsp;</label>
                                <label class="field_L1">
                                    <input id="md_return" class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                    Cho phép đổi trả hàng
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Nhóm chiết khấu</label>
                            <select id="md_product_commission_id"
                                class="choose_cate selectpicker show-tick form-control">
                                <option value="0">Mặc định</option>
                                <?php echo $_smarty_tpl->tpl_vars['opt_pro_comm']->value;?>

                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Mã SP KHT</label>
                            <div class="input_name">
                                <input placeholder="" id="md_web_id" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Giá vốn</label>
                            <div class="input_name">
                                <input id="md_root_price" class="form-control number-format" type="text" name="">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="label_name">&nbsp;</label>
                            <label class="field_L1">
                                <input id="md_allow_root_price" class="ace" type="checkbox">
                                <span class="lbl"></span>
                                Áp dụng giá vốn được khai báo
                                <a href="#" data-toggle="tooltip"
                                    title="Nếu bật chức năng này, giá vốn sẽ lấy cố định theo giá được khai báo, còn khi tắt giá vốn sẽ được lấy dựa trên giá nhập">(?)</a>
                            </label>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="label_name">&nbsp;</label>
                            <label class="field_L1">
                                <input id="md_pro_type" class="ace" type="checkbox">
                                <span class="lbl"></span>
                                Là sản phẩm dịch vụ
                                <a href="#" data-toggle="tooltip"
                                    title="Nếu là sản phẩm dịch vụ sẽ không có nhập kho, chỉ có xuất. Sẽ không thể thay đổi nếu chọn là sản phẩm dịch vụ.">(?)</a>
                            </label>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <label class="label_name">&nbsp;</label>
                            <label class="field_L1">
                                <input id="md_hot" class="ace" type="checkbox">
                                <span class="lbl"></span>
                                Nổi bật
                                <a href="#" data-toggle="tooltip" title="Sản phẩm nổi bật trên hệ thống APP.">(?)</a>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 hide">
                            <label class="label_name">&nbsp;</label>
                            <label class="field_L1">
                                <input id="md_allow_free" class="ace" type="checkbox">
                                <span class="lbl"></span>
                                Cho phép đại lý chọn miễn phí
                                <a href="#" data-toggle="tooltip" title="Sản phẩm cho đại lý chọn miễn phí.">(?)</a>
                            </label>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <label class="label_name">
                                Điểm quy đổi
                            </label>
                            <div class="input_name">
                                <input id="md_point" maxlength="11" class="form-control number-format" type="text"
                                    name="">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Thuộc kho hàng</label>
                            <select id="md_for_point" class="choose_cate selectpicker show-tick form-control">
                                <option value="0">Chỉ kho hàng</option>
                                <option value="1">Chỉ kho điểm</option>
                                <option value="2">Tất cả kho hàng</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="row hide">
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12"><label class="label_name">Hình ảnh sản phẩm</label></div>
                        </div>
                        <div class="avatar_thumbs row">
                            <a class="col-md-2" id="load_img_1">
                                
                            </a>
                            <a class="col-md-2" id="load_img_2">
                                
                            </a>
                            <a class="col-md-2" id="load_img_3">
                                
                            </a>
                            <a class="col-md-2" id="load_img_4">
                                
                            </a>
                            <a class="col-md-2" id="load_img_5">
                                
                            </a>
                            <a class="col-md-2" id="load_img_6">
                                
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="input-check">
                                <label class="label_name"></label>
                                <label class="field_L1">
                                    <input id="md_online" checked="" class="ace" type="checkbox">
                                    <span class="lbl active"></span>
                                    Hiển thị trên website
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="input-check">
                                <label class="label_name"></label>
                                <label class="field_L1">
                                    <input id="md_hidden" checked="" class="ace" type="checkbox">
                                    <span class="lbl active"></span>
                                    Hiển thị trên POS
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Thương hiệu</label>
                            <select id="md_brand_id" class="form-control">
                                <option value="0">Mặc định</option>
                                <?php echo $_smarty_tpl->tpl_vars['opt_brand']->value;?>

                            </select>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="label_name">Đại diện cung cấp</label>
                            <select id="md_supplier_id" class="form-control">
                                <option value="0">Mặc định</option>
                                <?php echo $_smarty_tpl->tpl_vars['opt_supplier']->value;?>

                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="label_name">Thẻ</label>
                            <div class="info tags md_attribute" inp-id="md_tags">
                                
                                
                                <input id="md_tags" maxlength="20" type="text" name="" placeholder="Nhập tên thẻ"
                                    hide-placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row <?php if ($_smarty_tpl->tpl_vars['setup']->value['enabled_product_description']!=1) {?>hide<?php }?>">
                        <div class="ol-sm-12 col-xs-12">
                            <label class="label_name">Mô tả ngắn</label>
                            <textarea id="md_short_description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row <?php if ($_smarty_tpl->tpl_vars['setup']->value['enabled_product_description']!=1) {?>hide<?php }?>">
                        <div class="col-sm-12 col-xs-12">
                            <label class="label_name">Mô tả sản phẩm</label>
                            <textarea id="md_description"></textarea>
                        </div>
                    </div>

                </div>

                <div class="table-product">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h2 class="title">
                                <a href=".collapseOneSKU" id="collapseOneSKUClick" role="button" data-toggle="collapse"
                                    data-parent="#accordion" aria-expanded="false" aria-controls="collapseOne"
                                    class="">Thuộc tính sản phẩm <span
                                        class="arrow fa fa-angle-down pull-right"></span></a>
                            </h2>
                        </div>
                        <div class="panel-collapse collapse collapseOneSKU" role="tabpanel" id="collapseOne"
                            aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><input type="text" name=""
                                                value="Thuộc Tính 1" class="name"></div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                            <div class="info md_attribute" inp-id="md_attribute_1">
                                                
                                                <input id="md_attribute_1" maxlength="10" type="text" name=""
                                                    placeholder="Nhập giá trị">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><input type="text" name=""
                                                value="Thuộc Tính 2" class="name"></div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                            <div class="info md_attribute" inp-id="md_attribute_2">
                                                
                                                <input id="md_attribute_2" maxlength="10" type="text" name=""
                                                    placeholder="Nhập giá trị">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><input type="text" name=""
                                                value="Thuộc Tính 3" class="name"></div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                            <div class="info md_attribute" inp-id="md_attribute_3">
                                                
                                                <input id="md_attribute_3" maxlength="10" type="text" name=""
                                                    placeholder="Nhập giá trị">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2"><input type="text" name=""
                                                value="Thuộc Tính 4" class="name"></div>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                            <div class="info md_attribute" inp-id="md_attribute_4">
                                                
                                                <input id="md_attribute_4" maxlength="10" type="text" name=""
                                                    placeholder="Nhập giá trị">
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-product version_product collapseOneSKU collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="title">Phiên bản sản phẩm</h2>
                        </div>
                        <div class="panel-collapse">
                            <div class="panel-body">
                                <table class="table table_version">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Phiên bản</th>
                                            <th>SKU</th>
                                            <th class="">Web ID</th>
                                            <th>Giá sản phẩm</th>
                                            <th class="hide">Giá khuyến mại</th>
                                            <th width="15%">Hình ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tpl_sku_list">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right btn-success1">
                    <a class="close" data-dismiss="modal" aria-label="Close" id="md_btn_cancel">Huỷ</a>
                    <a href="javascript:;" id="md_btn_done">Hoàn tất</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hide">
    <input type="file" name="files" id="file_1" value="" accept=".png,.jpg,.jpeg,.gif" />
    <input type="file" name="files" id="file_2" value="" accept=".png,.jpg,.jpeg,.gif" />
    <input type="file" name="files" id="file_3" value="" accept=".png,.jpg,.jpeg,.gif" />
    <input type="file" name="files" id="file_4" value="" accept=".png,.jpg,.jpeg,.gif" />
    <input type="file" name="files" id="file_5" value="" accept=".png,.jpg,.jpeg,.gif" />
    <input type="file" name="files" id="file_6" value="" accept=".png,.jpg,.jpeg,.gif" />

    <input type="file" hidden name="files" id="file_sku" value="" accept=".png,.jpg,.jpeg,.gif" />

    <input type="text" name="" id="text_img_1" value="" />
    <input type="text" name="" id="text_img_2" value="" />
    <input type="text" name="" id="text_img_3" value="" />
    <input type="text" name="" id="text_img_4" value="" />
    <input type="text" name="" id="text_img_5" value="" />
    <input type="text" name="" id="text_img_6" value="" />
</div>

<!--BEGIN ROOT-->
<div class="modal fade" id="modal_root" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="background-header-blue text-center top0 header-collection"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catRootAdd'];?>

                    <!-- Tạo Danh Mục Chính -->
                </h4>
            </div>

            <div class="modal-body nopadding margintop-10 bg-white bx-viewport">

                <h4 class="text-center border-b overflow-hidden">
                    <div class="col-sm-5 text-right top7">
                        <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catOnShop'];?>

                        <!-- Thuộc cửa hàng -->:
                    </div>
                    <b>
                        <div class="col-sm-7 text-left top7" id="ten_cua_hang">
                        </div>
                    </b>
                </h4>

                <div class="col-sm-12">
                    <div onclick="select_root_icon();" class="col-sm-1 col-xs-2 top-20 hide" id="review_root_icon">
                        <span class="icon_empty"></span>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <label>Tên danh mục chính</label>
                        <input id="modal_root_name" class="form-control" placeholder="Tên danh mục" value="">
                        <input id="modal_select_root_icon" value="" class="hidden" hidden />
                        <input id="modal_root_id" value="" class="hidden" hidden />
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <label>Độ ưu tiên</label>
                        <input id="modal_root_priority" type="number" class="form-control" placeholder="Độ ưu tiên"
                            value="">
                    </div>
                    <div class="col-sm-2 col-xs-12 text-center">
                        <label>Ẩn đi</label>
                        <p>
                            <label class="top-5">
                                <input id="modal_root_is_hidden" class="ace" type="checkbox" value="">
                                <span class="lbl"></span>
                            </label>
                        </p>
                    </div>
                </div>

                <div class="col-sm-12 top-5">
                    <label class="label_name">Tải lên ảnh danh mục:</label>
                    <a onclick="click_file('banner_root')" class="cursor-pointer">
                        <i class="icon-up glyphicon glyphicon-cloud-upload"></i>
                        <i>(Click để chọn ảnh)</i>
                    </a>
                    <div id="banner_root_processing" class="col-sm-12 col-xs-12">
                    </div>
                    <input class="hide" type="file" name="files" id="banner_root"
                        accept="image/x-png,image/gif,image/jpeg" value="" />
                </div>
                <div id="hd_banner_root" class="col-sm-12 top-5">
                    
                </div>

            </div>
            <div class="modal-footer top5">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!-- Hủy -->
                </button>

                <button onclick="exeModalRootCat();" type="button" class="btn btn-primary btn_w"><i
                        class="glyphicon glyphicon-floppy-save"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_save'];?>

                    <!-- Lưu lại -->
                </button>
            </div>
        </div>
    </div>
</div>
<!--END ROOT modal-->


<!--BEGIN ROOT ICON-->
<div class="modal fade hide" id="modal_root_icon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-medium">
        <div class="modal-content">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="background-header-blue text-center top0 header-collection"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectRootIcon'];?>

                    <!-- Chọn Icon Cho Danh Mục -->
                </h4>
            </div>
            <div class="modal-body nopadding margintop-10 bg-white bx-viewport">

                <div class="col-sm-12 top5">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list_business']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <a class="btn btn-default form-control root_icon_main"
                            root_icon_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span></a>
                    <?php } ?>
                </div>

                <div class="col-sm-12 top5 border-t icon-select-list" id="tpl_root_icon" style="padding-top:10px;">
                    <i>Vui lòng chọn danh mục icon</i>
                </div>

            </div>
            <input class="display-none" hidden type="text" id="modal_root_icon_value" />
            <div class="modal-footer top15">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!-- Hủy -->
                </button>

                <button onclick="save_select_root_icon();" type="button" class="btn btn-primary btn_w"><i
                        class="glyphicon glyphicon-floppy-save"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectIcon'];?>

                    <!-- Chọn Icon -->
                </button>
            </div>

        </div>
    </div>
</div>
<!--END ROOT ICON modal-->

<!--BEGIN CATEGORY-->
<div class="modal fade" style="z-index:999" id="modal_category" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">

            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="background-header-blue text-center top0"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catSubAdd'];?>

                    <!-- Tạo Danh Mục Phụ -->
                </h4>
            </div>
            <h4 class="overflow-hidden">
                <div class="col-sm-5 text-right top7"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_catOnRoot'];?>

                    <!-- Thuộc danh mục -->:
                </div>
                <div class="col-sm-6 text-left" id="ten_danh_muc">
                    <select id="modal_type_id" class="form-control">
                    </select>
                </div>
            </h4>
            <div class="modal-body nopadding top5 bg-white bx-viewport">

                <div class="col-sm-12 border-t">

                    <div class="col-sm-12 top-5">
                        <div onclick="select_cat_icon();" class="col-sm-1 col-xs-2 top-20 hide" id="review_cat_icon">
                            <span class="icon_empty"></span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <label>Tên danh mục</label>
                            <input id="modal_cat_name" class="form-control" placeholder="Tên danh mục" value="">
                            <input id="modal_select_cat_icon" value="" class="hidden" hidden />
                            <input id="modal_cat_id" value="" class="hidden" hidden />
                        </div>
                        <div class="col-sm-2 col-xs-4">
                            <label>Độ ưu tiên</label>
                            <input id="modal_cat_priority" type="number" class="form-control" placeholder="Độ ưu tiên"
                                value="">
                        </div>
                        <div class="col-sm-2 col-xs-12 text-center">
                            <label>Ẩn đi</label>
                            <p>
                                <label class="top-5">
                                    <input id="modal_cat_is_hidden" class="ace" type="checkbox" value="">
                                    <span class="lbl"></span>
                                </label>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-12 top-5">
                        <label class="label_name">Tải lên ảnh danh mục:</label>
                        <a onclick="click_file('banner_cat')" class="cursor-pointer">
                            <i class="icon-up glyphicon glyphicon-cloud-upload"></i>
                            <i>(Click để chọn ảnh)</i>
                        </a>
                        <div id="banner_cat_processing" class="col-sm-12 col-xs-12">
                        </div>
                        <input class="hide" type="file" name="files" id="banner_cat"
                            accept="image/x-png,image/gif,image/jpeg" value="" />
                    </div>
                    <div id="hd_banner_cat" class="col-sm-12 top-5">
                        
                    </div>

                </div>

                

            </div>

            <div class="modal-footer top10">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                <button onclick="exeModalCat();" type="button" class="btn btn-primary btn_w"><i
                        class="glyphicon glyphicon-floppy-save"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_save'];?>
</button>
            </div>

        </div>
    </div>
</div>
<!--END CATEGORY modal-->

<div style="z-index:1001" class="modal fade" id="modal_lcat_icon" tabindex="1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-medium">
        <div class="modal-content">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="background-header-blue text-center top0"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_slSubIcon'];?>

                    <!-- Chọn Icon Cho Danh Mục Phụ -->
                </h4>
            </div>
            <div class="modal-body nopadding margintop-10 bg-white bx-viewport">
                <div class="col-sm-12 top5">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list_business']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <a class="btn btn-default form-control cat_icon_main" cat_icon_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                    <?php } ?>
                </div>
                <div class="col-sm-12 top5 border-t icon-select-list" id="tpl_cat_icon">
                    <i><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_slCatIcon'];?>

                        <!-- Vui lòng chọn danh mục icon -->
                    </i>
                </div>

            </div>
            <input hidden class="display-none" type="text" id="modal_cat_icon_value" />
            <div class="modal-footer top15">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                <button onclick="save_select_cat_icon();" type="button" class="btn btn-primary btn_w"><i
                        class="glyphicon glyphicon-floppy-save"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_selectIcon'];?>

                    <!-- Chọn Icon -->
                </button>
            </div>
        </div>
    </div>
</div>

<!--BEGIN Printing Code-->
<div class="modal fade" id="modal_print_code" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#"> × </a>
                <h4 class="background-header-blue text-center top0 header-collection"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printProductLabel'];?>

                    <!--In Mã Sản Phẩm-->
                </h4>
            </div>
            <div class="modal-body nopadding margintop-10 bx-viewport hd-print">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 nopadding">
                        <div class="col-sm-12 left-printing">
                            <h4 class="title-left-print"> <i class="glyphicon glyphicon-cog"></i><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPOption'];?>

                                <!--Thiết Lập-->
                            </h4>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <fieldset class="option-print code">
                                    <legend><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPType'];?>

                                        <!--Kiểu mã-->
                                    </legend>
                                    <div class="col-sm-12 ncc_radio">
                                        <p>
                                            <label>
                                                <input type="radio" id="print_barcode" class="ace" name="type_code"
                                                    value="">
                                                <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPBarcode'];?>

                                                <!--Mã vạch-->
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input checked type="radio" id="print_qrcode" class="ace"
                                                    name="type_code" value="">
                                                <span class="lbl"></span> QR code
                                            </label>
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="option-print paper">
                                    <legend><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPPaperSize'];?>

                                        <!--Khổ giấy-->
                                    </legend>
                                    <div class="col-sm-12 ncc_radio">
                                        <label>
                                            <input checked type="radio" id="print_A4" class="ace" name="type_paper"
                                                value="">
                                            <span class="lbl"></span> A4
                                        </label>
                                        <label>
                                            <input type="radio" id="print_A5" class="ace" name="type_paper" value="">
                                            <span class="lbl"></span> A5
                                        </label>
                                        </p>
                                    </div>
                                </fieldset>
                                <fieldset class="option-print show">
                                    <legend><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPDisplay'];?>

                                        <!--Hiển thị-->
                                    </legend>
                                    <div class="col-sm-12 ">
                                        <p>
                                            <label>
                                                <input checked type="checkbox" id="print_pro_name" class="ace"
                                                    name="options" value="">
                                                <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPName'];?>

                                                <!--Tên sản phẩm-->
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                                <input checked type="checkbox" id="print_pro_code" class="ace"
                                                    name="options" value="">
                                                <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPId'];?>

                                                <!--Mã sản phẩm-->
                                            </label>
                                        <p>
                                            <label>
                                                <input checked type="checkbox" id="print_pro_price" class="ace"
                                                    name="options" value="">
                                                <span class="lbl"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPPrice'];?>

                                                <!--Giá sản phẩm-->
                                            </label>
                                        </p>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 nopadding-r">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding-r">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-search-bl">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="search search_cus">
                                        <a class="icon-cate icon-other-x square_x"
                                            onclick="return x_inp('#pro_search_text')"></a>
                                        <span class="icon-cate icon-other-search1" id="icon-txt-search"></span>
                                        <span role="status" aria-live="polite"
                                            class="ui-helper-hidden-accessible"></span>
                                        <input product-id="" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPNameId'];?>
"
                                            class="search_text ui-autocomplete-input" id="pro_search_text" user-id="0"
                                            autocomplete="off">
                                        <!--Tên/ Mã Sản Phẩm-->
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <button onclick="exe_f('I');"
                                        class="btn btn-success btn-width R"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPPreview'];?>

                                        <!--Xem trước-->
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hd-list-printing">
                                <table class="table table-responsive table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <td width="18%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPId'];?>

                                                <!--Mã sản phẩm-->
                                            </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPName'];?>

                                                <!--Tên sản phẩm-->
                                            </td>
                                            <td width="14%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPPriceSale'];?>

                                                <!--Giá Bán-->
                                            </td>
                                            <td width="18%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPQty'];?>

                                                <!--Số Lượng-->
                                            </td>
                                            <td width="4%">Hiển thị trên POS</td>
                                            <td width="12%"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPFunc'];?>

                                                <!--Chức năng-->
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="list_skus">
                                        <!-- HTML DOM -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                <button onclick="exe_f('D');" type="button" class="btn btn-primary btn_w"><i
                        class="glyphicon glyphicon-floppy-save"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_printPExp'];?>

                    <!--Xuất File-->
                </button>
            </div>
        </div>
    </div>
</div>
<!--END Printing Code-->

<div class="modal fade" id="modal_no_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="pop_up_T">Phân loại sản phẩm</div>
            <a class="btn_pop_close close" data-dismiss="modal" aria-label="Close"></a>
            <div class="modal-body">
                <div class="table-product">
                    <div class="panel panel-default">
                        <div class="panel-collapse">
                            <div class="panel-body">
                                <table class="table table_no_category">
                                    <thead>
                                        <tr>
                                            <th width="180px">Hình ảnh</th>
                                            <th>Thông tin sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="page_no_cat_html" class="col-lg-12 col-md-12 top10"></div>
                        <input id="page_no_cat" class="hidden" value="1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--BEGIN Modal import file excel-->
<div class="modal fade" id="modal_upload_excel" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="title" id="title_menu">Nhập sản phẩm từ Excel</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn cửa hàng:
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <select id="import_excel_shop_id" class="form-control">
                                    <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5 text-center">
                                - Chọn file Excel:
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <input type="file" class="form-control" name="" id="file_excel"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    value="">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                <button id="btn_exe_import_excel" class="btn btn-primary btn-width">Import</button>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 top-5">
                                <p>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/uploads/attachment/FormProductSingle.xlsx" download>
                                        Tải file mẫu không thuộc tính
                                    </a>
                                <p>
                                </p>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/uploads/attachment/FormProductMulti.xlsx" download>
                                    Tải file mẫu nhiều thuộc tính
                                </a>
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-10">
                            <div id="hd_table_import_excel_menu" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table id="table_import_excel_menu" class="table table-striped">
                                    <tbody id="html_excel">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END Modal import file excel-->

<!--BEGIN clone category-->
<div class="modal fade" id="modal_clone_category" tabindex="-1" role="dialog" aria-spanledby="myModalspan"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <a onclick="cl_clear_all();" class="close" href="#">× </a>
                <h4 class="title" id="title_menu"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cloneCat'];?>

                    <!-- Sao chép danh mục -->
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                            - <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_clChooseShop'];?>

                            <!-- Chọn cửa hàng -->:
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-5">
                            <select class="form-control" id="cl_from_shop_id">
                                <?php echo $_smarty_tpl->tpl_vars['opt_shop']->value;?>

                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 top-5">
                            <label class="top-5"> <input type="checkbox" id="cl_price" /> &nbsp;&nbsp;&nbsp;
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_clPrice'];?>

                                <!-- Sao chép giá -->
                            </label>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                <label class="top-5"><input type="checkbox" id="cl_root_cat" /> &nbsp;&nbsp;&nbsp;
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_clRootCat'];?>

                                    <!-- Sao chép danh mục phụ -->
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                <label class="top-5"><input type="checkbox" id="cl_category" /> &nbsp;&nbsp;&nbsp;
                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_clCategory'];?>

                                    <!-- Sao chép danh mục phụ -->
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading" id="cl_from_shop_title"> - </div>
                                <div class="panel-body clone-cat">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                            <select class="form-control" id="cl_from_root_cat">

                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                            <select class="form-control" id="cl_from_sub_cat">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5 nopadding">
                                        <div class="panel panel-default">
                                            <!-- Default panel contents -->
                                            <div
                                                class="panel-heading header-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top-5">
                                                    <input id="check_from"
                                                        onclick="check_all('#check_from', '.from_items');"
                                                        type="checkbox">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-5">
                                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cloneCat'];?>

                                                    <!-- Danh mục -->
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                                                    <button onclick="clone_category();"
                                                        class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_btnClone'];?>

                                                        <!-- Sao chép -->
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hold_items_clone">
                                                <!-- Table -->
                                                <table class="table table-responsive table-striped">
                                                    <tbody id="cl_from_list_items">
                                                        <!--List items menu-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="cl_to_shop_id" class="hidden" hidden value="1" />
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading" id="cl_to_shop_title"> - </div>
                                <div class="panel-body clone-cat">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12nopadding">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                            <select class="form-control" id="cl_to_root_cat">
                                                <option value="1"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_dish'];?>
</option>
                                                <option value="2"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_drinking'];?>
</option>
                                                <option value="3"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_others'];?>
</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top-5">
                                            <select class="form-control" id="cl_to_sub_cat">
                                                <--List Sub category-->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-5 nopadding">
                                        <div class="panel panel-default">
                                            <!-- Default panel contents -->
                                            <div
                                                class="panel-heading header-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top-5">
                                                    <input id="check_to" onclick="check_all('#check_to', '.to_items');"
                                                        type="checkbox">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-5">
                                                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cloneCat'];?>

                                                    <!-- Danh mục -->
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                                                    <button onclick="clone_delete_items();"
                                                        class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_btnDelDish'];?>

                                                        <!--Xóa món-->
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hold_items_clone">
                                                <!-- Table -->
                                                <table class="table table-responsive table-striped">
                                                    <tbody id="cl_to_list_items">
                                                        <!--List items menu-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer clone">
                    <div class="bootstrap-dialog-footer">
                        <div class="bootstrap-dialog-footer-buttons">
                            <button onclick="cl_clear_all();" class="btn btn-default btn_w"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>
</button>
                            <button onclick="cl_apply_all();" class="btn btn_w btn-primary"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--END clone category-->


<!--BEGIN modal thêm hình bằng link không cần upload nữa-->
<div class="modal fade" id="modal_link_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div class="modal-header noborder">
                <a data-dismiss="modal" class="close" href="#">× </a>
                <h4 class="background-header-blue text-center top0 header-collection">Thêm hình ảnh</h4>
            </div>

            <div class="modal-body nopadding margintop-10 bg-white bx-viewport">

                <div class="col-sm-12">
                    <div class="col-sm-12 col-xs-12">
                        <label>Link hình</label>
                        <input id="link_img" class="form-control" placeholder="Link hình ảnh" value="">
                        <input id="position_link_img" class="form-control hide" value="">
                    </div>
                </div>

            </div>
            <div class="modal-footer top5">
                <button type="button" class="btn btn-default btn_w" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_cancel'];?>

                    <!-- Hủy -->
                </button>

                <button type="button" class="btn btn-primary btn_w btn_save_link_img"><i class="glyphicon glyphicon-floppy-save"></i>
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_save'];?>

                    <!-- Lưu lại -->
                </button>
            </div>
        </div>
    </div>
</div>
<!--END modal thêm hình bằng link không cần upload nữa-->

<link href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/upload_temp.css" rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/tinymce/tinymce.min.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/supervisor_category.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/uploadfunction.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.fileupload.js?"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/upload/jquery.iframe-transport.js?"></script>




<style>
    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categorycat:'))===false) {?>
        ul.cate_menu li>a.btn_top,
        ul.cate_menu li>a.btn_bottom {
            display: none;
            z-index: -1000;
        }

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['session']->value['gid']!='0'&&(strpos($_smarty_tpl->tpl_vars['str_permission']->value,':supervisor_categorydelete:'))===false) {?>
        a.deleteProduct {
            display: none;
            z-index: -1000;
        }

    <?php }?>
</style><?php }} ?>
