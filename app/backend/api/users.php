<?php


include "../module.php";

header('content-type: application/json');
header('access-control-allow-origin: *');
$data['all_users'] = $modules->getAllUsers();
echo json_encode(["users" => $data['all_users']]);