<?php

require_once dirname(__DIR__).'/bootstrap/app.php';

$email= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,'password');
$token = filter_input(INPUT_POST,'token');

if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
    
}
return header('Location: /php_inflearn_board/auth/login.php');