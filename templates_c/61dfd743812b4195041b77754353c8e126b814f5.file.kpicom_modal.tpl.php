<?php /* Smarty version Smarty-3.1.18, created on 2021-09-26 00:34:13
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/members/subtpl/kpicom_modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:879867039610fa2aabd1334-02969998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61dfd743812b4195041b77754353c8e126b814f5' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/members/subtpl/kpicom_modal.tpl',
      1 => 1632486680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '879867039610fa2aabd1334-02969998',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_610fa2aac064e7_43580292',
  'variables' => 
  array (
    'link' => 0,
    'domain' => 0,
    'lProCommission' => 0,
    'i' => 0,
    'item' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_610fa2aac064e7_43580292')) {function content_610fa2aac064e7_43580292($_smarty_tpl) {?>
<!--BEGIN Modal Member department-->
<div class="modal fade" id="modal_commission_group" tabindex="-1" role="dialog" aria-spanledby="myModalspan" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a data-dismiss="modal" class="close" href="#">× </a>
        <h4 class="title" id="title_menu">Quản lý nhóm chiết khấu và KPI</h4>
      </div>
      <div class="modal-body">

        <div class="row modal-tag-height">
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li id="tab_departmentCommissionGroup" role="presentation" class="active">
                <a href="#departmentCommissionGroup" aria-controls="departmentCommissionGroup" role="tab" data-toggle="tab">
                  Nhóm chiết khấu
                </a>
              </li>

              <li id="tab_KPIManagement" role="presentation" class="">
                <a href="#KPIManagement" aria-controls="KPIManagement" role="tab" data-toggle="tab">
                  Nhóm KPI: phòng ban & nhóm khách hàng
                </a>
              </li>

              <li id="tab_KPILevelManagement" role="presentation" class="">
                <a href="#KPILevelManagement" aria-controls="KPILevelManagement" role="tab" data-toggle="tab">
                  Nhóm điều kiện lên cấp
                </a>
              </li>

              <li id="tab_blockManagement" role="presentation" class="">
                <a href="#blockManagement" aria-controls="blockManagement" role="tab" data-toggle="tab">
                  Phân khối phòng ban
                </a>
              </li>

            </ul>

            <!-- Tab panes -->
            <div class="custome-tab-content tab-content tab-setting">

              <!-- Tab Nhóm chiết khấu -->
              <div role="tabpanel" class="tab-pane active" id="departmentCommissionGroup">
                
                <div class="col-sm-12 col-xs-12 top-10">
                  <p><i>** Chú thích 1: Chức năng này dùng tạo ra nhiều nhóm chiết khấu khác nhau sử dụng cho việc cài đặt chiết khấu ở: Quản lý nhóm khách hàng, Quản lý phòng ban, Báo cáo biến phí.</i></p>
                  <p><i>** Chú thích 2: Để tạo thêm Nhóm sản phẩm chiết khấu vui lòng sử dụng chức năng thêm mới "Nhóm chiết khấu sản phẩm" <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category">click ở đây</a>.</i></p>
                </div>

                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="com_depart_list_tab_blocks">
                  <li class="block-department-listing-com" role="presentation" class="active">
                    <a role="tab" data-toggle="tab">
                      Nhóm chiết khấu
                    </a>
                  </li>
                </ul>

                
                <div class="custome-tab-content tab-content tab-setting">

                  <div class="col-sm-12 col-xs-12 hd-list-group">

                    <div class="hold-gid-add pull-right wrap-info-in">
                      <div id="hd_DCG_add_name" class="col-sm-10 hide">
                        <input id="DCG_add_name" class="" value="" placeholder="Nhập tên nhóm"/>
                      </div>
                      <div class="col-sm-2">
                        <span id="DCG_btn_add" style="display: inline;">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="30">
                        </span>
                      </div>
                    </div>

                    <div class="col-sm-12 top-20">
                      <ul id="DCG_list_tab" class="nav nav-tabs nav-storing tab-list-gid">
                      </ul>
                    </div>

                  </div>

                  <div id="theTableCommission" class="table-responsive top-20">
                    <div class="col-sm-12 top-20 text-right">
                      <button id="DGC_btn_modify" class="btn btn-success btn-width DGC_btn_modify">Cập nhật</button>
                    </div>
                    <table class="table table-stripped text-center table-bordered">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Kho hàng</th>
                          <th>Nhóm SP chiết khấu</th>
                          <th>VNĐ</th>
                          <th>Điểm</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(1, null, 0);?>
                          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lProCommission']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <tr>
                              <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                              <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['item']->value['parent_name'];?>
</td>
                              <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                              <td class="ncc_radio">

                                <div class="col-sm-6 col-xs-6">
                                  <label>Giá trị cài đặt</h3>
                                  <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="DCG_value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com DCG-pro-com-input form-control text-center" value="0"/>
                                  
                                  <div class="col-sm-6 col-xs-6">
                                    <label title="Phần trăm" class="nopadding">
                                      <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="radio" checked id="DCG_is_percent_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_is_percent_val_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com DCG-pro-com-checkbox DCG-pro-com-checkbox-1 ace" value="1"/>
                                      <span class="lbl"></span>
                                      <b class="fa fa-percent">%</b>
                                    </label>
                                  </div>

                                  <div class="col-sm-6 col-xs-6">
                                    <label class="nopadding">
                                      <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="radio" id="DCG_is_value_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_is_percent_val_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com DCG-pro-com-checkbox ace" value="0"/>
                                      <span class="lbl"></span>
                                      <b class="fa fa-tag"></b>
                                    </label>
                                  </div>

                                </div>

                                <div class="col-sm-6 col-xs-6 text-left">
                                    <label>Hoa hồng nhận tính theo</label>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" checked class="ace DCG-pro-com" type="radio" id="DCG_commission_by_1_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="1"/>
                                        <span class="lbl"></span>
                                        Doanh thu thực thu
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="ace DCG-pro-com" type="radio" id="DCG_commission_by_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="2"/>
                                        <span class="lbl"></span>
                                        Doanh thu giá lẻ
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="ace DCG-pro-com" type="radio" id="DCG_commission_by_0_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="0"/>
                                        <span class="lbl"></span>
                                        Tính trên chiết khấu
                                      </label>
                                    </div>
                                  
                                </div>

                              </td>
                              <td class="ncc_radio">

                                <div class="col-sm-6 col-xs-6">
                                  <label>Giá trị cài đặt</label>

                                  <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="DCG_value_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com form-control text-center" value="0"/>

                                  <div class="col-sm-6 col-xs-6">
                                    <label title="Phần trăm" class="nopadding">
                                      <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="radio" checked id="DCG_is_percent_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_is_percent_val_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com DCG-pro-com-checkbox DCG-pro-com-checkbox-1 ace" value="1"/>
                                      <span class="lbl"></span>
                                      <b class="fa fa-percent">%</b>
                                    </label>
                                  </div>

                                  <div class="col-sm-6 col-xs-6">
                                    <label title="Giá trị" class="">
                                      <input dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="radio" id="DCG_is_value_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_is_percent_val_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" disabled class="DCG-pro-com DCG-pro-com-checkbox ace" value="0"/>
                                      <span class="lbl"></span>
                                      <b class="fa fa-tag"></b>
                                    </label>
                                  </div>

                                </div>

                                <div class="col-sm-6 col-xs-6 text-left">
                                    <label>Hoa hồng nhận tính theo</label>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" checked class="ace DCG-pro-com" type="radio" id="DCG_commission_by_2_1_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="1"/>
                                        <span class="lbl"></span>
                                        Doanh thu thực thu
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="ace DCG-pro-com" type="radio" id="DCG_commission_by_2_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="2"/>
                                        <span class="lbl"></span>
                                        Doanh thu giá lẻ
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input disabled dcg_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="ace DCG-pro-com" type="radio" id="DCG_commission_by_2_0_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="DCG_commission_by_2_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="0"/>
                                        <span class="lbl"></span>
                                        Tính trên chiết khấu
                                      </label>
                                    </div>
                                  
                                </div>

                              </td>
                            </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-sm-12 top-20 text-center">
                    <button id="DGC_btn_modify" class="btn btn-success btn-width DGC_btn_modify">Cập nhật</button>
                  </div>

                </div>

              </div>

               <!-- Tab Nhóm KPI: Phòng ban & Chiết khấu -->
              <div role="tabpanel" class="tab-pane" id="KPIManagement">

                <div class="col-sm-12 col-xs-12 top-10">
                  <p class=""><i>** Chú thích 1: Chức năng này dùng tạo ra nhiều nhóm cấu hình KPI khác nhau sử dụng cho việc cài đặt chiết khấu ở: Quản lý nhóm khách hàng, Quản lý phòng ban.</i></p>
                  <p class=""><i>** Chú thích 2: Để tạo thêm Nhóm sản phẩm chiết khấu vui lòng sử dụng chức năng thêm mới "Nhóm chiết khấu sản phẩm" <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category">click ở đây</a>.</i></p>
                </div>
                <div class="col-sm-12 col-xs-12 top-20">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist" id="KPI_tab_list">
                  </ul>

                  <div role="tabpanel" class="tab-pane active" id="KPIManagement">
                    
                    <div id="theTableCommission" class="table-responsive top-20">

                      <div class="hold-gid-add pull-right wrap-info-in">
                        <div class="col-sm-2">
                          <span id="KPI_btn_add" style="display: inline;" style="cursor-pointer">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="30">
                          </span>
                        </div>
                      </div>

                      <!--List Nhóm KPI-->
                      <table class="table table-stripped text-center table-bordered">
                        <thead>
                          <tr>
                            <th width="3%">STT</th>
                            <th width="10%">Tên KPI</th>
                            <th>Doanh số</th>
                            <th>Nhân sự</th>
                            <th width="10%">Tỉ lệ</th>
                            <th width="10%">@</th>
                          </tr>
                        </thead>
                        <tbody id="KPI_list">

                          <tr>
                            <td>1</td>
                            <td>KPI 1</td>
                            
                            <td>
                              <div class="col-sm-12 col-xs-12">

                                  <div class="col-sm-6 col-xs-12">
                                    <label>KPI doanh thu cần đạt</label>
                                    <input class="form-control" value="120tr" />
                                  </div>
                                  <div class="col-sm-6 col-xs-12 text-left">

                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input checked class="ace" type="radio" name="is_revenue" value=""/>
                                        <span class="lbl"></span>
                                        Doanh thu thực thu
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input class="ace" type="radio" name="is_revenue" value=""/>
                                        <span class="lbl"></span>
                                        Doanh thu giá lẻ
                                      </label>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 ncc_radio">
                                      <label>
                                        <input class="ace" type="radio" name="is_revenue" value=""/>
                                        <span class="lbl"></span>
                                        Tính trên chiết khấu
                                      </label>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-sm-12 col-xs-12 table-responsive">
                                  <table class="table table-stripped">
                                    <thead>
                                      <tr>
                                        <th>
                                          <i class="glyphicon glyphicon-console"></i>
                                        </th>
                                        <th>
                                          Giá trị
                                        </th>
                                        <th>
                                          % nhận
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      <tr>
                                        <th>
                                          >=
                                        </th>
                                        <th>
                                          120tr
                                        </th>
                                        <th>
                                          100%
                                        </th>
                                      </tr>

                                      <tr>
                                        <th>
                                          <=
                                        </th>
                                        <th>
                                          80tr
                                        </th>
                                        <th>
                                          70%
                                        </th>
                                      </tr>

                                      <tr>
                                        <th>
                                          <=
                                        </th>
                                        <th>
                                          50tr
                                        </th>
                                        <th>
                                          40%
                                        </th>
                                      </tr>

                                    </tbody>
                                  </table>
                              </div>
                            </td>

                            
                            <td>
                              <div class="col-sm-12 col-xs-12">

                                  <div class="col-sm-12 col-xs-12">
                                    <label>KPI nhân sự cần đạt</label>
                                    <input class="form-control" value="120tr" />
                                  </div>
                              </div>
                              <div class="col-sm-12 col-xs-12 table-responsive">
                                  <table class="table table-stripped">
                                    <thead>
                                      <tr>
                                        <th>
                                          <i class="glyphicon glyphicon-console"></i>
                                        </th>
                                        <th>
                                          Số lượng
                                        </th>
                                        <th>
                                          % nhận
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      <tr>
                                        <th>
                                          >=
                                        </th>
                                        <th>
                                          1000 người
                                        </th>
                                        <th>
                                          100%
                                        </th>
                                      </tr>

                                      <tr>
                                        <th>
                                          <=
                                        </th>
                                        <th>
                                          800 người
                                        </th>
                                        <th>
                                          70%
                                        </th>
                                      </tr>

                                      <tr>
                                        <th>
                                          <=
                                        </th>
                                        <th>
                                          500 người
                                        </th>
                                        <th>
                                          40%
                                        </th>
                                      </tr>

                                    </tbody>
                                  </table>
                              </div>
                            </td>
                            <td>
                              <div class="col-sm-6 col-xs-12">
                                  <label>Tỉ lệ doanh số</label>
                                  60%
                                  <input class="form-control hide" value="60" />
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                  <label>Tỉ lệ chia</label>
                                  <span>40%</span>
                              </div>
                            </td>
                            <td>
                              <span id="btn_department_edit_11" onclick="theMemberDepartment.edit(11);" class="group_func icon-cate icon-other-edit active"></span>
                              <span onclick="theMemberDepartment.delete(11);" class="group_func icon-cate icon-other-x active"></span>
                            </td>
                          </tr>
                  
                        </tbody>
                      </table>
                      
                    </div>
                  </div>

                </div>

              </div>

               <!-- Tab Nhóm KPI -->
              <div role="tabpanel" class="tab-pane" id="KPILevelManagement">
                <div class="col-sm-12 col-xs-12 top-10">
                  <p class=""><i>** Chú thích 1: Chức năng này dùng tạo ra nhiều nhóm cấu hình KPI cho từng cấp khách hàng, tự động xét lên cấp.</i></p>
                </div>
                <div class="col-sm-12 col-xs-12 top-20">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist" id="KPILevel_tab_list">
                  </ul>

                  <div role="tabpanel" class="tab-pane active" id="KPILevelManagement">
                    
                    <div id="theTableCommission" class="table-responsive top-20">

                      <div class="hold-gid-add pull-right wrap-info-in">
                        <div class="col-sm-2">
                          <span id="KPILevel_btn_add" style="display: inline;" style="cursor-pointer">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/images/add_pro.png" width="30">
                          </span>
                        </div>
                      </div>

                      <!--List Nhóm KPI-->
                      <table class="table table-stripped text-center table-bordered">
                        <thead>
                          <tr>
                            <th width="3%">STT</th>
                            <th width="10%">Tên nhóm</th>
                            <th>Doanh số cá nhân</th>
                            <th>Doanh số hệ thống</th>
                            <th>Mục tiêu nhân sự</th>
                            <th>Cấp tiếp theo</th>
                            <th width="10%">@</th>
                          </tr>
                        </thead>
                        <tbody id="KPILevel_list">

                          <tr>
                            <td>1</td>
                            <td>KPI 1</td>
                            <td>
                              <input class="form-control" value="120tr" />
                            </td>
                            <td>
                              <input class="form-control" value="120tr" />
                            </td>
                             <td>
                              <input class="form-control" value="120tr" />
                            </td>
                            <td>
                              <span id="btn_department_edit_11" onclick="theMemberDepartment.edit(11);" class="group_func icon-cate icon-other-edit active"></span>
                              <span onclick="theMemberDepartment.delete(11);" class="group_func icon-cate icon-other-x active"></span>
                            </td>
                          </tr>
                  
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
                

              </div>

              <!-- BEGIN Tab Block Management -->
              <div role="tabpanel" class="tab-pane" id="blockManagement">
                <div class="col-sm-12 col-xs-12 top-10">
                  <p class="hide"><i>** Chú thích 1: Chức năng này dùng tạo ra nhiều nhóm chiết khấu khác nhau sử dụng cho việc cài đặt chiết khấu ở: Quản lý nhóm khách hàng, Quản lý phòng ban, Báo cáo biến phí.</i></p>
                  <p class="hide"><i>** Chú thích 2: Để tạo thêm Nhóm sản phẩm chiết khấu vui lòng sử dụng chức năng thêm mới "Nhóm chiết khấu sản phẩm" <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category">click ở đây</a>.</i></p>
                </div>
                <div id="theTableCommission" class="table-responsive top-20">
                  <div class="col-sm-6 col-xs-12">
                    <table class="table table-stripped text-center table-bordered">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên khối</th>
                          <th>@</th>
                        </tr>
                      </thead>
                      <tbody id="block_list">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- END Tab Block Management -->

            </div>

          </div>
		    </div>

		  </div>
      
      <div class="modal-footer">
        <div class="bootstrap-dialog-footer">
          <div class="bootstrap-dialog-footer-buttons">
            <button data-dismiss="modal" class="btn btn_w btn-default"><?php echo $_smarty_tpl->tpl_vars['lang']->value['lb_done'];?>
</button>
          </div>
        </div>
      </div>

		</div>
	</div>
</div>
<!--END Modal Member department-->
<?php }} ?>
