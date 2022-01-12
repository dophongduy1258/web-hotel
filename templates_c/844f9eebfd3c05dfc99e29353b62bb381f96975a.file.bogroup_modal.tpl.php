<?php /* Smarty version Smarty-3.1.18, created on 2021-09-29 01:42:47
         compiled from "/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/commission/subtpl/bogroup_modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18816162266116b1000e00c2-30955188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '844f9eebfd3c05dfc99e29353b62bb381f96975a' => 
    array (
      0 => '/Users/huan/Desktop/Data/Outsource/erp/posretail/templates/commission/subtpl/bogroup_modal.tpl',
      1 => 1632854546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18816162266116b1000e00c2-30955188',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_6116b1000e8124_38731758',
  'variables' => 
  array (
    'link' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6116b1000e8124_38731758')) {function content_6116b1000e8124_38731758($_smarty_tpl) {?>
<!--BEGIN Modal Member department-->
<div class="modal fade" id="modal_commission_group" tabindex="-1" role="dialog" aria-spanledby="myModalspan" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
        <div class="modal-header">
            <a data-dismiss="modal" class="close" href="#">× </a>
            <h4 class="title" id="title_menu">Quản lý BO</h4>
        </div>
        <div class="modal-body">

            <div class="row modal-tag-height">
                <div role="tabpanel">

                    <!-- Nav tabs -->
                    

                    <!-- Tab panes -->
                    

                    <!-- BEGIN Tab Block Management -->
                    <div role="tabpanel" class="tab-pane active" id="blockManagement">
                        <div class="col-sm-12 col-xs-12 top-10">
                        <p class="hide"><i>** Chú thích 1: Chức năng này dùng tạo ra nhiều nhóm chiết khấu khác nhau sử dụng cho việc cài đặt chiết khấu ở: Quản lý nhóm khách hàng, Quản lý phòng ban, Báo cáo biến phí.</i></p>
                        <p class="hide"><i>** Chú thích 2: Để tạo thêm Nhóm sản phẩm chiết khấu vui lòng sử dụng chức năng thêm mới "Nhóm chiết khấu sản phẩm" <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
/?m=supervisor&act=category">click ở đây</a>.</i></p>
                        </div>
                        <div id="theTableCommission" class="table-responsive top-20">
                        <div class="col-sm-12 col-xs-12">
                            <table class="table table-stripped text-center table-bordered">
                            <thead>
                                <tr>
                                <th>STT</th>
                                <th>Tên BO</th>
                                <th class="hide">Khối</th>
                                <th>Nhóm chiết khấu</th>
                                <th class="hide">Tính trên</th>
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
