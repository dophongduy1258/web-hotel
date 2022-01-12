<?php
$nod        = $main->get('nod');

if ($act == 'idx') {
    if ($nod == 'list_bank') {

        $bank_list = new bank_list();

        $kq['l'] = $bank_list->list_all_item();

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else if ($nod == 'list_bank_info') {

        $bank_info->set( 'client_id', $_SESSION['username_client']);
        $lItems = $bank_info->list_by( '', '' );//lấy hình avatar ra

        echo 'done##', $main->toJsonData(200, 'success', $lItems);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'save') {
    if ($nod == 'bank_info') {
        $bank_list = new bank_list();

        $number     = $main->post('number');
        $fullname   = $main->post('fullname');
        $bank_id    = $main->post('bank_id');

        $bank_list->set('id', $bank_id);
        $bank = $bank_list->get_by_id();

        if (!isset($bank['id'])) {
            echo 'done##', $main->toJsonData(403, 'Ngân hàng không tồn tại', null);
        } else {
            $bank_info->set('number', $number+0);
            $bank_info->set('branch', '');
            $bank_info->set('bank_id', $bank_id + 0);
            $bank_info->set('name', $fullname);
            $bank_info->set('bank', $bank['name']);
            $bank_info->set('client_id', $_SESSION['username_client']);
            $id = $bank_info->add();
            if (!isset($id)) {
                echo 'done##', $main->toJsonData(403, 'Đăng ký không thành công', null);
            } else {
                echo 'done##', $main->toJsonData(200, 'success', null);
            }
        }
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
}else if ($act == 'delete') {
    if ($nod == 'delete_bank_info') {

        $id    = $main->post('id');
	
        $bank_info->set( 'id', $id );
        $bank_info->set( 'client_id', $_SESSION['username_client'] );
        $bank_info->delete_by();

        echo 'done##', $main->toJsonData(200, 'success', null);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else {
    echo 'Missing action';
    $db->close();
    exit();
}
