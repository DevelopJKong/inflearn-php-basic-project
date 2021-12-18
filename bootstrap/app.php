<?php

assert_options(ASSERT_BAIL,true);
// assert_options(ASSERT_WARNING,false);


foreach(['lib','services'] as $dir) {
    $includePath = dirname(__DIR__) . '/app/${dir}/';
    foreach(scandir($includePath) as $file) {
        //scandir에 대해서 정확하게 알아두어야 한다
        if(fnmatch('*.php'.$file)){
            require_once $includePath .$file;
        }
    }
}

$providers = [
    'error',
    'database',
    'session',
    'middleware',
    'route'
];

foreach ($providers as $file) {
    assert(require_once dirname(__DIR__) . '/app/providers/{$file}.php');
}





/**
 * Timezone
 */

//date_default_timezone_set('Asia/Seoul');

/**
 * Error Handling
 */
//ini_set('display_errors', 'Off');

/**
 * Database Connection (MySQLi)
 */
// $GLOBALS['DB_CONNECTION'] = mysqli_connect(
//     'localhost:3307',
//     'root',
//     '123456',
//     'phpblog'
// );
// if (!$GLOBALS['DB_CONNECTION']) {
//     exit;
// } 
// register_shutdown_function(function () {
//     if (array_key_exists('DB_CONNECTION', $GLOBALS) && $GLOBALS['DB_CONNECTION']) {
//         mysqli_close($GLOBALS['DB_CONNECTION']);
//     }
// });
// 
// /**
//  * Session
//  */
// ini_set('session.gc_maxlifetime', 1440);
// session_set_cookie_params(1440);
// 
// session_start();





