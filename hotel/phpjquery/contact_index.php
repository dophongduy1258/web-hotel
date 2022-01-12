<?php
$nod        = $main->get('nod');

if ($act == 'save') {
    if ($nod == 'save') {
        $fullname         = $main->post('fullname');
        $email            = $main->post('email');
        $mobile           = $main->post('mobile');
        $content          = $main->post('content');

        $contact_list = new contact_list();
        $contact_list->set('fullname', $fullname);
        $contact_list->set('email', $email);
        $contact_list->set('mobile', $mobile);
        $contact_list->set('content', $content);
        $contact_list->set('code', '');
        $contact_list->add();

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