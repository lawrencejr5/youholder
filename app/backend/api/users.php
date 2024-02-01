<?php


include "../module.php";

header('content-type: application/json');
$data['all_users'] = $modules->getAllUsers();
echo json_encode(["users" => $data['all_users']]);