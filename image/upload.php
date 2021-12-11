<?php
require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];
    $file = $_FILES['upload'];
    $filename= $user['id'] . '_'. time() . '_' . hash('md5', $file('name'));
    $accepts = [
        'png',
        'jpg'
    ];

    $pathParts = pathinfo($file['name']);
    if (in_array(strtolower($pathParts['extension']), $accepts) && is_uploaded_file($file['tmp_name'])) {
        $path = config('image.path') . $filename;
        if (move_uploaded_file($file['tmp_name'], $path)) {
            echo json_encode([
                'uploaded'  => 1,
                'url'       => '/php_inflearn_board/uploads/' . $filename
            ]);        
            return http_response_code(200);
        }

    }
}
return http_response_code(400);
    