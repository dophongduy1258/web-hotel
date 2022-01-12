<?php
class delivery_steps extends model{
    //Các bước phát triển 1 đơn hàng tùy vào ERP mà mình có các step khác nhau
    //Bảng này như là một nhóm các bước; trong mỗi bước này sẽ là có nhiều bước con trong bảng delivery_history
	protected $class_name = 'delivery_steps';
	protected $id;
	protected $name;
	protected $description;
	protected $step;
	protected $icon;
	protected $color;

	public function opt_all_steps(){
		global $db;
		
		$id = $this->get('id');
		$l = $this->list_all_sort_by_id('', '', 'ASC');
		$option = '';
		foreach($l as $el ){
			if( $id == $el['id'] ){
				$option .= "<option selected value='".$el['id']."'>".$el['name']."</option>";
			}else{
				$option .= "<option value='".$el['id']."'>".$el['name']."</option>";
			}
		}
		return $option;
	}

	public function list_for_app(){
		$l = $this->list_all_sort_by_id('', '', 'ASC');

		//Chờ xử lý
		$item['id'] 	= 0;
		$item['name'] 	= 'Chờ xử lý';
		$item['description'] = 'Waiting to processing';
		$item['step'] 	= '0';
		$item['icon'] 	= '';
		$item['color'] 	= '';
		array_unshift($l, $item);
		
		$item['id'] 	= -1;
		$item['name'] 	= 'Đơn hủy';
		$item['description'] = 'Cancel order';
		$item['step'] 	= COUNT($l).'';
		$item['icon'] 	= '';
		$item['color'] 	= '';
		$l[] = $item;

		return $l;
		
	}

}