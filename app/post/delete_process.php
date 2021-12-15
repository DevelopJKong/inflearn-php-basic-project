<?php
require_once dirname(__DIR__) . '/bootstrap/app.php';

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];

    $token = filter_input(INPUT_GET, 'token');
    $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);

    if($id && hash_equals($token,$_SESSION['CSRF_TOKEN'])) {
        //프론트엔드에서 날아온 값들을 절대 믿지 말자
        $stmt = mysqli_prepare(
            $GLOBALS['DB_CONNECTION'],
            "SELECT * FROM posts WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt,'i',$id);
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            [
                'user_id' => $userId
            ] = mysqli_fetch_assoc($result);
        }
        mysqli_stmt_close($stmt);
    }
    if($user['id'] == $userId) {
        $stmt = mysqli_prepare(
            $GLOBALS['DB_CONNECTION'],
            "DELETE FROM posts WHERE id =? "
        );
        mysqli_stmt_bind_param($stmt, 'i',$id );
        if(mysqli_execute($stmt)){
            header("Location: /php_inflearn_board");
        } else {
            header("Location: /php_inflearn_board/posts/read.php");
        }
        return mysqli_stmt_close($stmt);
    }
    return header("Location: /php_inflearn_board/posts/read.php?id=".$id);
}
return header("Location: /php_inflearn_board/auth/login.php");