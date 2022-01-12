<?php
$nod        = $main->get('nod');

if ($act == 'idx') {
    if ($nod == 'opt_district') {

        $city_id = $main->post('city_id');

        $kq = $showroom->opt_district($city_id);

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else if ($nod == 'opt_ward') {

        $district_id = $main->post('district_id');

        $kq = $showroom->opt_ward($district_id);

        echo 'done##', $main->toJsonData(200, 'success', $kq);
    } else if ($nod == 'infoCustomer') {

        $members = new members();

        $dM = new stdClass();

        if(isset($_SESSION['username_client']) && $_SESSION['username_client'] != ''){
            $members->set('user_id', $_SESSION['username_client']);
            $dM = $members->get_detail();
        }

        echo 'done##', $main->toJsonData(200, 'success', $dM);
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
