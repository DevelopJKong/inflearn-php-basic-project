<?php

function createUser($email,$password,$username) 
{
    return execute('INSERT INTO users(email,password,username) VALUES(?,?,?)',$email,$password,$username);
}

function updateUser($email,$password,$username,$id)
{
//     $stmt= mysqli_prepare(
//         $GLOBALS['DB_CONNECTION'],
//         'UPDATE users SET email = ?, password = ? , username = ? WHERE id = ?'
//     );
//     mysqli_stmt_bind_param($stmt,'sssi',$email,$password,$username,$user['id']);
//     if(mysqli_execute($stmt)){
//         session_unset();
//         session_destroy();
//         return header('Location: /php_inflearn_board/auth/login.php');
// 
//     } else {
//         return header('Location: /php_inflearn_board/user/update.php');
//     }
//     return mysqli_stmt_close($stmt);
    return execute('UPDATE users SET email = ?, password = ? , username = ? WHERE id = ?',$email,$password,$username,$id);
}