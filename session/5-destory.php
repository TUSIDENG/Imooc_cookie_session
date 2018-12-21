<?php
session_start();

//将$_SESSION数据清空
$_SESSION = [];

//删除会话cookie
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'],
    $params['httponly']);
}

//销毁会话
session_destroy();