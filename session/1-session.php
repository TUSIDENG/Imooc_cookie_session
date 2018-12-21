<?php
header('Content-type:text/html; Charset=utf-8');
//开启会话
session_start();
//设置会话数据
$_SESSION['username'] = 'dengwei';
$_SESSION['sex'] = 1;
$_SESSION['age'] = 22;

echo 'SESSION名字：' . session_name() . '<br>';
echo 'SESSION ID：' . session_id() . '<br>';
