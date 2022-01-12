<?php
/**
 * HC: 210615
 * Mục đích phân loại đơn hàng => đơn nhập đơn xuất/ đơn tạm/ đơn chuyển/ đơn báo giá ...
 */
class order_type extends model{

    protected $class_name = 'order_type';
    protected $id;
    protected $name;
    protected $is_export;// 0 import = 1 export: (version v2) có thể để cho mục đích sau này xuất hoặc nhập hoặc cái này có được sử dụng đưa vào báo cáo hay không
    protected $allow_in_report;//Hoạt động hay là không

    public function list_opt_all(){
		global $db;
		
		$sql = "SELECT `id`, `name` FROM `". $this->class_name ."` ORDER BY `id` ";
		
		$result = $db->executeQuery( $sql );

		$opt = '';
		while( $row = mysqli_fetch_assoc($result) ){
			$opt .= '<option value="'.$row['code'].'">'.($row['code'] != '' ? '['.$row['code'].']':'').' '.$row['name'].'</option>';
		}

		return $opt;
	}

}