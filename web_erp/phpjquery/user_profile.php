<?php
$nod        = $main->get('nod');

if ($act == "idx") {
    if ($nod == 'info') {
        $members = new members();
        $members->set('user_id', isset($_SESSION['username_client']) ? $_SESSION['username_client'] : '');
        $dM = $members->get_detail();
        echo "done##", $main->toJsonData(200, 'success', $dM);
    } else {
        echo 'Missing action';
        $db->close();
        exit();
    }
} else if ($act == 'update') {
    if ($nod == 'info') {
        $fullname           = $main->post('fullname');
        $email              = $main->post('email');
        $mobile             = $main->post('mobile');
        $birth_day          = $main->post('birthday');
        $sex                = $main->post('sex');
        $oldPass            = $main->post('oldPass');
        $newPass            = $main->post('newPass');

        $members = new members();

        $members->set('user_id', isset($_SESSION['username_client']) ? $_SESSION['username_client'] : '');
        $dM = $members->get_detail();

        if (isset($dM['user_id']) && $dM['user_id']!='') {
            $members->set('fullname', $fullname);
            $members->set('email', $email);
            $members->set('mobile', $mobile);
            $members->set('sex', $sex);
            $members->set('user_id', $dM['user_id']);

            $checkMobileEmail = $members->get_by_email_or_mobile();

            if (isset($checkMobileEmail['user_id'])) {
                echo "done##", $main->toJsonData(403, 'Số điện thoại hoặc email đã tồn tại', null);
            } else {
                if ($newPass != '') {
                    if (md5(md5($oldPass) . $dM['salt']) == $dM['password']) {
                        $members->set('password', md5(md5($newPass) . $dM['salt']));
                        if ($birth_day != '')
                            $birth_day = explode('/', $birth_day);

                        if (is_array($birth_day) && COUNT($birth_day) == 3) {
                            $members->set('day', $birth_day[0]);
                            $members->set('month', $birth_day[1]);
                            $members->set('year', $birth_day[2]);
                        } else {
                            $members->set('day', '');
                            $members->set('month', '');
                            $members->set('year', '');
                        }

                        $members->update_info();

                        echo "done##", $main->toJsonData(200, 'success', null);
                    }else{
                        echo "done##", $main->toJsonData(403, 'Mật khẩu cũ không đúng.', null);
                    }
                } else {
                    if ($birth_day != '')
                        $birth_day = explode('/', $birth_day);
                    if (is_array($birth_day) && COUNT($birth_day) == 3) {
                        $members->set('day', $birth_day[0]);
                        $members->set('month', $birth_day[1]);
                        $members->set('year', $birth_day[2]);
                    } else {
                        $members->set('day', '');
                        $members->set('month', '');
                        $members->set('year', '');
                    }

                    $members->update_info();

                    echo "done##", $main->toJsonData(200, 'success', null);
                }
            }
        } else {
            echo "done##", $main->toJsonData(403, 'Người dùng không tồn tại', null);
        }
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
