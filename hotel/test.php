<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

include_once 'library/smarty/Smarty.class.php';

include '../include/global.php';
include '../include/model.php';
include '../include/db.php';
$db_pos = 'dmember';
$domain_http_type = 0;

$st = new Smarty();

$models = __DIR__.'/class';
$routeFiles = scandir($models);

foreach ($routeFiles as $routeFile) {
    $routeFilePath = $models . '/' . $routeFile;
    if (is_file($routeFilePath) && preg_match('/^.*\.(php)$/i', $routeFilePath))
        require_once $routeFilePath;
}

include_once '#directthumuc/config.php';
// ****************** //


// $members = new members();
// $members->set('user_id', 42101);
// $dM = $members->get_detail();

$dM = $order->get_newest_id_by_customer(1, 42101);

print_r($dM['code']);