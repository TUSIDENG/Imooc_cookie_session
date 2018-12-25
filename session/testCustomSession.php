<?php
include 'CustomSession.php';
ini_set('session.save_handler', 'user');
$customSession = new CustomSession;
session_set_save_handler($customSession, true);
session_start();
// $_SESSION['username']='tusi123';
// $_SESSION['email']='aa@qq.com';
// $_SESSION['age']=18;
print_r($_SESSION);
