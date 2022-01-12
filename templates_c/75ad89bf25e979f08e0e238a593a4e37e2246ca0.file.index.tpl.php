<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 22:39:06
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/showroom/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8138283096123e214dff258-30043889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75ad89bf25e979f08e0e238a593a4e37e2246ca0' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/showroom/index.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8138283096123e214dff258-30043889',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6123e214e4d866_79377888',
  'variables' => 
  array (
    'tpldirect' => 0,
    'opt_city' => 0,
    'domain' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6123e214e4d866_79377888')) {function content_6123e214e4d866_79377888($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpldirect']->value)."supervisor/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div>

    <div class="search-order">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <input id="txt" class="form-control" type="text" name="" placeholder="Tìm kiếm theo tên/điện thoại">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-4">
                <select id="city" class="form-control" onchange="load_district()">
                    <option value="" selected>Tất cả tỉnh/ thành</option>
                    <?php echo $_smarty_tpl->tpl_vars['opt_city']->value;?>

                </select>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-4">
                <select id="district" class="form-control">
                    <option value="" selected>Tất cả quận/ huyện</option>
                </select>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-4">
                <button id="btn_view" type="button" class="btn top-5 btn-primary btn-width">Xem</button>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 pull-right">
                <span id="btn_add" class="add_real code_real">Thêm showroom <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/public/images/add.png" width="24"></span>
            </div>
        </div>
    </div>

    <div class="content-pr bg-white">
        <div class="wrap-table-detail">
            <div class="table-responsive table-detail table-0-15">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                    <table class="table table-bordered table-stripped table-hover ng-cloak">
                        <thead>
                            <tr>
                                <th style="width:5%">STT</th>
                                <th style="width:15%">Tên Showroom</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Chủ Showroom</th>
                                <th>Quản lý</th>
                                <th>Thành phố</th>
                                <th>Quận/Huyện</th>
                                <th>Trạng thái</th>
                                <th>Nhóm HH</th>
                                <th style="width:8%">@</th>
                            </tr>
                        </thead>
                        <tbody id="l">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-20">
                <div class="paging L" id="page_html">
                </div>
            </div>
        </div>

        <div id="md-showroom" class="modal fade modalAlert custom-md" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" style="text-align: left;">
                        <form autocomplete="off" name="form.formShop" novalidate ng-submit="form.formShop.$valid && submitShop()">
                            <span class="close" data-dismiss="modal">x</span>
                            <h3 style="float: left;">Thông tin Showroom</h3>
                            <div class="row">

                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-8 col-xs-12">
                                        <label class="label_name">Ảnh đại diện Showroom:</label>
                                        <div class="review_img_menu">
                                            <img id="img_review" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/assets/images/no_image.png?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" style="border: 1px solid #ececec;" width="150" height="150" alt="Avatar" onclick="$('#url').click()">
                                        </div>
                                        <input id="url" type="file" class="form-control hide" name="url" accept="image/*" />
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">
                                            <input id="is_hidden" class="ace" type="checkbox">
                                            <span class="lbl"></span> Không cho phép tìm kiếm
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">
                                           Nhóm hoa hồng quản lý khu vực
                                        </label>
                                        <select id="commission_group_id" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-6 col-xs-12">
                                        <label class="label_name">Tên Showroom (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <input id="name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <label class="label_name">Số điện thoại (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <input id="mobile" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12" style="padding-left: 7px;padding-right: 7px;">
                                        <label class="label_name">Độ ưu tiên:</label>
                                        <div class="input_name">
                                            <input id="priority" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">Tỉnh/ TP (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <select id="city_id" class="form-control" onchange="loadDistrict()">
                                                <option value="" selected>Chọn tỉnh/thành phố</option>
                                                <?php echo $_smarty_tpl->tpl_vars['opt_city']->value;?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">Quận/ huyện (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <select id="district_id" class="form-control" onchange="loadWard()">
                                                <option value="" selected>Chọn quận/ huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">Xã/ phường (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <select id="ward_id" class="form-control">
                                                <option value="" selected>Chọn xã/ phường</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 col-xs-12">

                                    <div class="col-md-6 col-xs-12">
                                        <label class="label_name">Địa chỉ (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <input id="address" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <label class="label_name">Liên kết bản đồ (<span class="color-red">*</span>):</label>
                                        <div class="input_name">
                                            <input id="link_map" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 col-xs-12">

                                    <div class="col-sm-4 col-xs-12">
                                        <label class="label_name">Chủ showroom:</label>
                                        <div class="input_name">
                                            <span id="owner_holder"></span>
                                            <input id="owner" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <label class="label_name">Quản lý showroom:</label>
                                        <div class="input_name">
                                            <span id="managers_holder"></span>
                                            <input id="managers" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Tỉnh/ Thành quản lý</label>
                                        <div class="input_name">
                                            <span id="city_allowed_holder"></span>
                                            <input id="city_allowed" placeholder="Nhập Tỉnh/ Thành" class="form-control top-10" type="text" name="city_allowed" autocomplete="off" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <label class="label_name">Quận/ Huyện quản lý</label>
                                        <div class="input_name">
                                            <span id="district_allowed_holder"></span>
                                            <input id="district_allowed" placeholder="Nhập Quận/ Huyện" class="form-control top-10" type="text" name="district_allowed" autocomplete="off" value="">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 col-xs-12" style="padding-left: 7px;padding-right: 7px;">
                                    <label class="label_name">Giới thiệu Showroom</label>
                                    <div class="col-sm-12 col-xs-12 nopadding">
                                        <textarea id="description" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xs-12" style="padding-left: 7px;padding-right: 7px;">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-width">Huỷ</button>
                                <button id="btn_save" type="button" class="btn btn-success btn-width">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/js/js_act/showroom_index.js?<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script><?php }} ?>
