<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];

    $file = $_FILES['upload'];
    $filename = $user['id'] . "_" . time() . "_" . hash('md5', $file['name']);
    $accepts = [
        'png',
        'jpg'
    ];
}
return http_response_code(400);