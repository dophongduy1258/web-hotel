<?php
/**
- Copy the main class in /pos/poscafe/class replace name class to treasurerHP, and repalce $db to $db_store
-
**/
class treasurerHP{

	private $id;
	private $MA;
	private $ngay;
	private $loai;
	private $nguoi_tao;
	private $nop_nhan;
	private $thu_quy;
	private $so_tien;
	private $hinh_thuc;	
	private $ghi_chu;
	private $ngay_tao;
	private $dau_ky;
	private $MATT;
	
	//set get id
	public function setid($val){
		$this->id = $val;
	}
	public function getid(){
		return $this->id;
	}
	//set get MA
	public function setMA($val){
		$this->MA = $val;
	}
	public function getMA(){
		return $this->MA;
	}
	//set get loai
	public function setloai($val){
		$this->loai = $val;
	}
	public function getloai(){
		return $this->loai;
	}
	//set get ngay
	public function setngay($val){
		$this->ngay = $val;
	}
	public function getngay(){
		return $this->ngay;
	}
	//set get nguoi_tao
	public function setnguoi_tao($val){
		$this->nguoi_tao = $val;
	}
	public function getnguoi_tao(){
		return $this->nguoi_tao;
	}
	//set get nop_nhan
	public function setnop_nhan($val){
		$this->nop_nhan = $val;
	}
	public function getnop_nhan(){
		return $this->nop_nhan;
	}
	//set get thu_quy
	public function setthu_quy($val){
		$this->thu_quy = $val;
	}
	public function getthu_quy(){
		return $this->thu_quy;
	}
	//set get so_tien
	public function setso_tien($val){
		$this->so_tien = $val;
	}
	public function getso_tien(){
		return $this->so_tien;
	}
	//set get hinh_thuc
	public function sethinh_thuc($val){
		$this->hinh_thuc = $val;
	}
	public function gethinh_thuc(){
		return $this->hinh_thuc;
	}
	//set get ghi_chu
	public function setghi_chu($val){
		$this->ghi_chu = $val;
	}
	public function getghi_chu(){
		return $this->ghi_chu;
	}
	//set get ngay_tao
	public function setngay_tao($val){
		$this->ngay_tao = $val;
	}
	public function getngay_tao(){
		return $this->ngay_tao;
	}
	//set get dau_ky
	public function setdau_ky($val){
		$this->dau_ky = $val;
	}
	public function getdau_ky(){
		return $this->dau_ky;
	}
	//set get MATT
	public function setMATT($val){
		$this->MATT = $val;
	}
	public function getMATT(){
		return $this->MATT;
	}
	public function setshop_id($val){
		$this->shop_id = $val;
	}
	public function getshop_id(){
		return $this->shop_id;
	}
	public function setchung_tu($val){
		$this->chung_tu = $val;
	}
	public function getchung_tu(){
		return $this->chung_tu;
	}
	public function setnoi_dung($val){
		$this->noi_dung = $val;
	}
	public function getnoi_dung(){
		return $this->noi_dung;
	}
	public function setliabilities_is($val){
		$this->liabilities_is = $val;
	}
	public function getliabilities_is(){
		return $this->liabilities_is;
	}
	public function setcustomer_id($val){
		$this->customer_id = $val;
	}
	public function getcustomer_id(){
		return $this->customer_id;
	}

	public function add(){
		global $db_store;

		$arr['MATT'] = $this->getMATT();
		$arr['MA'] = $this->getMA();
		$arr['ngay'] = $this->getngay();
		$arr['loai'] = $this->getloai();

		$arr['nguoi_tao'] = $this->getnguoi_tao();
		$arr['nop_nhan'] = $this->getnop_nhan();
		$arr['thu_quy'] = $this->getthu_quy();
		$arr['so_tien'] = $this->getso_tien();

		$arr['hinh_thuc'] = $this->gethinh_thuc();
		$arr['ghi_chu'] = $this->getghi_chu();
		$arr['noi_dung'] = $this->getnoi_dung();
		$arr['shop_id'] = $this->getshop_id();

		$arr['chung_tu'] = $this->getchung_tu();
		$arr['liabilities_is'] = $this->getliabilities_is();
		$arr['customer_id'] = $this->getcustomer_id();
		$arr['ngay_tao'] = time();
		
		$arr['dau_ky'] = $this->getdau_ky();

		$db_store->record_insert($db_store->tbl_fix."treasurer", $arr);
	}

	//bao cao ban hang trong ngay
	public function report_treasurer( $shop_id ){
		global $db_store;
		
		$on_date = strtotime(date('m/d/Y'));
		
		$sql = "SELECT dt.amount,dt.price,dt.decrement,dt.increment,dt.vat
				FROM ".$db_store->tbl_fix."`detail_order_".$shop_id."_".date('Y')."` AS dt
				LEFT JOIN ".$db_store->tbl_fix."`order_".$shop_id."_".date('Y')."` AS od ON od.id = dt.order_id
				WHERE od.status = '1' AND od.shop_id ='".$shop_id."'
				AND od.printed = '1' AND date_in > ".$on_date." AND date_in < ".($on_date + 86399);
		
		$result = $db_store->executeQuery ( $sql );
		
		$kq['giam_gia'] = 0;
		$kq['tong_free'] = 0;
		$kq['sum'] = 0;
		while( $row = mysqli_fetch_assoc( $result ) ){
			
			if( $row['decrement'] > 99 )
				$kq['tong_free'] += $row['amount']*$row['price'];
			if( 0 < $row['decrement'] && $row['decrement'] < 100 )
				$kq['giam_gia'] += $row['amount']*$row['price']*($row['decrement']/100);
			if( $row["amount"] > 0 ){
				$kq['sum'] += $row['amount']*$row['price'];
			}else{
				$kq['giam_gia'] += -1*$row['amount']*$row['price'];
			}
		}
		
		return $kq;
	}

	public function report_selling( $shop_id ){ 
		global $db_store;

		$on_date = strtotime(date('m/d/Y'));
		$sql =" SELECT dt.amount,dt.price,dt.decrement,dt.increment,dt.vat
				FROM ".$db_store->tbl_fix."`detail_order_".$shop_id."_".date('Y')."` AS dt
				LEFT JOIN ".$db_store->tbl_fix."`order_".$shop_id."_".date('Y')."` AS od ON od.id = dt.order_id
				WHERE od.status = '1' AND od.shop_id ='".$shop_id."'
				AND date_in > ".$on_date." AND date_in<".($on_date + 86399);
		$result = $db_store->executeQuery ( $sql);
		
		$total = 0;
		while( $row = mysqli_fetch_assoc($result) ){
			if( $row["amount"] > 0 )
				$total += $row["amount"] * $row["price"];
		}

		unset($giam_gia);
		unset($result);
		unset($row);
		return $total;
	}
	
	public function create_treasurer_thu( $shop_id ){
		$so_tien = $this->report_selling( $shop_id );
		if( $so_tien > 0 ){
			$MAT = $this->nextMa( $shop_id, 'T' );
			$this->setMA( $MAT);//mã thu
			$this->setMATT('');
			$this->setngay( date('d/m/Y') );
			$this->setloai( 'T' );
			$this->setnguoi_tao( 'Auto' );
			$this->setnop_nhan( 'Auto' );
			$this->setso_tien( $so_tien );
			$this->sethinh_thuc( 4 );//bán hàng
			$this->setnoi_dung( 'Thu nhập' );
			$this->setshop_id( $shop_id );
			$this->setchung_tu( '' );
			$this->setliabilities_is( '0' );
			$this->setcustomer_id( '0' );
			
			$dau_ky = $this->get_so_du_dau_ky( $this->getshop_id() );
			$arr['dau_ky'] = $dau_ky + $this->getso_tien();
			
			$this->add();
		}
		return true;
	}


	public function create_treasurer_chi( $shop_id ){
		$so_tien = $this->report_treasurer( $shop_id );
		$so_tien = $so_tien['giam_gia'] + $so_tien['tong_free'];
		if( $so_tien > 0 ){
			$MAT = $this->nextMa( $shop_id, 'C' );
			$this->setMA( $MAT);//mã thu
			$this->setMATT('');
			$this->setngay( date('d/m/Y') );
			$this->setloai( 'C' );
			$this->setnguoi_tao( 'Auto' );
			$this->setnop_nhan( 'Auto' );
			$this->setso_tien( $so_tien );
			$this->sethinh_thuc( 4 );//bán hàng
			$this->setnoi_dung( 'Chi tiêu' );
			$this->setshop_id( $shop_id );
			$this->setchung_tu( '' );
			$this->setliabilities_is( '0' );
			$this->setcustomer_id( '0' );

			$dau_ky = $this->get_so_du_dau_ky( $this->getshop_id() );
			$arr['dau_ky'] = $dau_ky - $this->getso_tien();

			$this->add();
		}
		return true;
	}
	
	public function create_treasurer( $db_store, $db_selected ){

		$sql = "SELECT id as shop_id FROM `$db_selected`.`shop` WHERE `id` > 0 ORDER BY `id`";
		$result = $db_store->executeQuery( $sql );

		while ($row  = mysqli_fetch_assoc($result) ){
			$this->create_treasurer_thu( $row['shop_id'] );
			$this->create_treasurer_chi( $row['shop_id'] );
		}
		mysqli_free_result( $result );
		unset($row);
		return true;
	}

	// public function update( $id ){
	// 	global $db_store;
	// 	$arr['MA'] = $this->getMA();
	// 	$arr['ngay'] = $this->getngay();
	// 	$arr['loai'] = $this->getloai();
	// 	$arr['nguoi_tao'] = $this->getnguoi_tao();
	// 	$arr['nop_nhan'] = $this->getnop_nhan();
	// 	$arr['thu_quy'] = $this->getthu_quy();
	// 	$arr['so_tien'] = $this->getso_tien();
	// 	$arr['hinh_thuc'] = $this->gethinh_thuc();
	// 	$arr['ghi_chu'] = $this->getghi_chu();
	// 	$arr['thu_quy'] = $this->getthu_quy();
	// 	$arr['ngay_tao'] = time();
	// 	$result = $db_store->record_update($db_store->tbl_fix."`treasurer`", $arr, " `id` ='".$id."'");
	// 	return $result;
	// }

	// public function update_info( $id ){
	// 	global $db_store;

	// 	$arr['MATT'] = $this->getMATT();
	// 	$arr['hinh_thuc'] = $this->gethinh_thuc();
	// 	$arr['ghi_chu'] = $this->getghi_chu();
	// 	$arr['chung_tu'] = $this->getchung_tu();
		
	// 	return $db_store->record_update($db_store->tbl_fix."treasurer", $arr," `id` ='".$id."'");
	// }
	
	// public function update_from_storing( $id, $shop_id, $so_tien_cu, $dau_ky_cu ){//cap nhat phieu thu chi khi xuat nhap kho
	// 	global $db_store;
		
	// 	$arr['hinh_thuc'] = $this->gethinh_thuc();
	// 	$arr['chung_tu'] = $this->getchung_tu();

	// 	//Số đầu kỳ là số đã cập nhật lại sau khi thu chi: đúng tại thời điểm đó
	// 	if( $this->getso_tien() != $so_tien_cu ){

	// 		$arr['so_tien'] = $this->getso_tien();
	// 		$loai = $this->getloai();
			
	// 		if( $loai == 'C'){
	// 			if($so_tien_cu > $arr['so_tien']){

	// 				$chenh_lech = $so_tien_cu - $arr['so_tien'];
	// 				$arr['dau_ky'] = $dau_ky_cu + $chenh_lech;
	// 				$this->update_dau_ky_from_storing($id, $shop_id, $chenh_lech);

	// 			}else if($so_tien_cu < $arr['so_tien']){

	// 				$chenh_lech =  $arr['so_tien'] - $so_tien_cu;
	// 				$arr['dau_ky'] = $dau_ky_cu - $chenh_lech;
	// 				$this->update_dau_ky_from_storing($id, $shop_id, -1*$chenh_lech);
	// 			}
	// 		}else{
	// 			if($so_tien_cu > $arr['so_tien']){

	// 				$chenh_lech = $so_tien_cu - $arr['so_tien'];
	// 				$arr['dau_ky'] = $dau_ky_cu - $chenh_lech;
	// 				$this->update_dau_ky_from_storing($id, $shop_id, -1*$chenh_lech);
	// 			}else if($so_tien_cu < $arr['so_tien']){

	// 				$chenh_lech =  $arr['so_tien'] - $so_tien_cu;
	// 				$arr['dau_ky'] = $dau_ky_cu + $chenh_lech;
	// 				$this->update_dau_ky_from_storing($id, $shop_id, $chenh_lech);
	// 			}
	// 		}
	// 	}
	// 	return true;
	// }

	// public function update_dau_ky_from_storing( $id, $shop_id, $chenh_lech){
	// 	global $db_store;
	// 	$sql = "UPDATE `treasurer` SET `dau_ky` = (`dau_ky` + ".$chenh_lech.") WHERE `shop_id` ='".$shop_id."' AND `id` > ".$id;
	// 	$db_store->executeQuery( $sql );
	// 	return true;
	// }

	// public function get_detail($id) {
	// 	global $db_store;		
	// 	$sql = "SELECT * FROM ".$db_store->tbl_fix."`treasurer` WHERE `id` = '".$id."'";
	// 	$result = $db_store->executeQuery ($sql, 1);
	// 	return $result;
	// }

	// public function get_detail_byMATT( $MATT ) {
	// 	//Lay chi tiet thong tin theo ma tham chieu
	// 	global $db_store;
	// 	$sql = "SELECT * FROM ".$db_store->tbl_fix."`treasurer` WHERE `MATT` = '".$MATT."'";
	// 	$result = $db_store->executeQuery ($sql, 1);
	// 	return $result;
	// }
	
	public function get_so_du_dau_ky( $shop_id ) {
		global $db_store;
		$sql = "SELECT `dau_ky` FROM ".$db_store->tbl_fix."`treasurer` WHERE `shop_id` = '".$shop_id."' ORDER BY id DESC limit 0,1";
		$result = $db_store->executeQuery ($sql, 1);
		return $result['dau_ky'];
	}

	public function getNewestMA($shop_id, $loai) {
		global $db_store;
		
		$time = strtotime(date('m/d/Y',time()));
		$time = $time-1;
		$sql = "SELECT `MA` FROM ".$db_store->tbl_fix."`treasurer` where ".$time."<ngay_tao AND ngay_tao<".($time+86400)." AND loai = '".$loai."' AND `shop_id` = '".$shop_id."' ORDER BY id DESC limit 0,1";
		$result = $db_store->executeQuery ($sql, 1);
		return $result['MA'];
	}

	public function nextMa( $shop_id, $loai ){
		$strid = $this->getNewestMA($shop_id, $loai);
		if( substr($strid,0,6) == date("ymd") ){
			//the same day continue +1
			$kq = substr($strid,-3,strlen($strid)+1);
			$kq = $kq+1;
			return date("ymd").$loai.sprintf( '%03d', $kq);
		}else{
			//set new session start with 001;
			return date("ymd").$loai.'001';
		}
	}

	// public function listFromToDay($shop_id, $from, $to, $nguoi_tao, $nop_nhan, $loai, $ofset, $limit, $total) { // from day list
	// 	Global $db_store;
		
	// 	if($nguoi_tao!=''){
	// 		$nguoi_tao  = " AND nguoi_tao='".$nguoi_tao."'";
	// 	}
	// 	if($nop_nhan!=''){
	// 		$nop_nhan  = " AND nop_nhan='".$nop_nhan."'";
	// 	}

	// 	if( $loai != ''){
	// 		$loai  = " AND `loai`='".$loai."'";
	// 	}
		
	// 	$from = $from -1;
		
	// 	$to = $to + 86400;
		
	// 	$date_add = " ngay_tao>".$from." AND ngay_tao<".$to;
	// 	$sql = "SELECT * FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' ".$loai." AND ".$date_add." ".$nguoi_tao.$nop_nhan."  ORDER BY id DESC LIMIT ".$ofset.",".$limit;	

	// 	$result = $db_store->executeQuery ( $sql );
		
	// 	$i = $total - $ofset;

	// 	$kq = array();
	// 	while ( $rows = mysqli_fetch_assoc ( $result ) ) {
	// 		$rows['STT'] = $i;
	// 		$kq[] = $rows;
	// 		$i --;
	// 	}
	// 	return $kq;
	// }

	// public function listFromToDay_excel($shop_id, $from, $to, $nguoi_tao, $nop_nhan) { // from day list
	// 	Global $db_store;
		
	// 	if($nguoi_tao!=''){
	// 		$nguoi_tao  = " AND nguoi_tao='".$nguoi_tao."'";
	// 	}
	// 	if($nop_nhan!=''){
	// 		$nop_nhan  = " AND nop_nhan='".$nop_nhan."'";
	// 	}

	// 	if( $loai != ''){
	// 		$loai  = " AND `loai`='".$loai."'";
	// 	}

	// 	$from = $from -1;

	// 	$to = $to + 86400;
		
	// 	$date_add = " ngay_tao>".$from." AND ngay_tao<".$to;
	// 	$sql = "SELECT * FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' ".$loai." AND ".$date_add." ".$nguoi_tao.$nop_nhan."  ORDER BY id DESC";	

	// 	$result = $db_store->executeQuery ( $sql );
		
	// 	$sql = "SELECT COUNT(id) as total FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' ".$loai." AND ".$date_add." ".$nguoi_tao.$nop_nhan." ORDER BY id DESC";		
	// 	$count = $db_store->executeQuery ( $sql, 1);
	// 	$i = $count['total'];
	// 	$kq = array();
	// 	while ( $rows = mysqli_fetch_assoc ( $result ) ) {
	// 		$rows['STT'] = $i;
	// 		$kq[] = $rows;
	// 		$i --;
	// 	}
	// 	return $kq;
	// }

	// public function listFromToDay_count($shop_id, $from, $to, $nguoi_tao, $nop_nhan, $loai) { // from day list
	// 	Global $db_store;
		
	// 	if($nguoi_tao != ''){
	// 		$nguoi_tao  = " AND nguoi_tao = '".$nguoi_tao."'";
	// 	}
	// 	if($nop_nhan != ''){
	// 		$nop_nhan  = " AND nop_nhan = '".$nop_nhan."'";
	// 	}

	// 	if( $loai != ''){
	// 		$loai  = " AND `loai`='".$loai."'";
	// 	}
		
	// 	$from = $from - 1;
		
	// 	$to = $to + 86400;
		
	// 	$date_add = " ngay_tao>".$from." AND ngay_tao<".$to;
		
	// 	$sql = "SELECT COUNT(id) as total FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' ".$loai." AND ".$date_add." ".$nguoi_tao.$nop_nhan." ORDER BY id DESC";		
	// 	$count = $db_store->executeQuery ( $sql , 1 );
		
	// 	return $count['total'];
	// }

	// public function so_du_from_to($shop_id, $from, $to, $nguoi_tao, $nop_nhan) { // from day list
	// 	Global $db_store;
		
	// 	if($nguoi_tao!=''){
	// 		$nguoi_tao  = " AND nguoi_tao='".$nguoi_tao."'";
	// 	}
	// 	if($nop_nhan!=''){
	// 		$nop_nhan  = " AND nop_nhan='".$nop_nhan."'";
	// 	}
		
	// 	$from = $from;
		
	// 	$to = $to + 86399;
		
	// 	$date_add = " ngay_tao < ".$from ;

	// 	$sql = "SELECT dau_ky FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' AND ".$date_add." ORDER BY id DESC LIMIT 0,1";		
		
	// 	$temp_dau_ky = $db_store->executeQuery ( $sql, 1 );

	// 	$dau_ky = $temp_dau_ky['dau_ky'];
		
	// 	$date_add = " ngay_tao >=".$from." AND ngay_tao < ".$to ;
	// 	$sql = "SELECT SUM(so_tien) as tong_thu FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' AND ".$date_add." AND `loai`= 'T' ORDER BY id DESC LIMIT 0,1";		
	// 	$tong_thu = $db_store->executeQuery ( $sql, 1 );

	// 	$date_add = " ngay_tao >= ".$from." AND ngay_tao < ".$to ;
	// 	$sql = "SELECT SUM(so_tien) as tong_chi FROM " . $db_store->tbl_fix . "`treasurer` WHERE `shop_id` = '".$shop_id."' AND ".$date_add." AND `loai`= 'C' ORDER BY id DESC LIMIT 0,1";		
	// 	$tong_chi = $db_store->executeQuery ( $sql, 1 );

	// 	$kq['dau_ky'] = @$dau_ky + 0;
	// 	$kq['tong_thu'] = @$tong_thu['tong_thu'] + 0;
	// 	$kq['tong_chi'] = @$tong_chi['tong_chi'] + 0;
	// 	$kq['cuoi_ky'] = @$dau_ky + $tong_thu['tong_thu'] - $tong_chi['tong_chi'] +0;

	// 	unset($sql);
	// 	unset($dau_ky);
	// 	unset($tong_thu);
	// 	unset($cuoi_ky);
	// 	unset($date_add);
	// 	unset($from);
	// 	unset($to);

	// 	return $kq;
	// }
}
$treasurerHP = new treasurerHP();