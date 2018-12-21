<?php
session_start();
$_SESSION['username'] = 'dengWei';
$_SESSION['email'] = '1561799709@qq.com';
$_SESSION['age'] = 23;
setcookie(session_name(), session_id(), time() + 3600);