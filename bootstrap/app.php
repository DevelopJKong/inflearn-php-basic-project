<?php

/**
 * Timezone
 */
 date_default_timezone_set('Asia/Seoul');

/**
 * Error Handling
 */
 ini_set('display_errors','Off');

 /**
  * Database Connection (MySQLi)
  */
  //싱글톤 방식?
  $GLOBALS['DB_CONNECTION'] = mysqli_connect("localhost:3307","root","123456","phpblog");
  if(!$GLOBALS['DB_CONNECTION']) {
    exit;
  } 

  register_shutdown_function(function() {
    if(array_key_exists('DB_CONNECTION',$GLOBALS) && $GLOBALS['DB_CONNECTION']){
        mysqli_close($GLOBALS['DB_CONNECTION']);
    }
  });

  /**
   * Session
   */
  //session_use_strict_mode = 1
  //session_use_cookie = 1
  //session_use_only_cookie = 1
  //이렇게 세개는 반드시 켜주어야합니다     

  ini_set('session_maxlifetime',1440);
  session_set_cookie_param(1440);

  session_start();