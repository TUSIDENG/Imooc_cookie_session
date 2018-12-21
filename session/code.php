<?php
require_once './verify.php';

session_start();
$_SESSION['verifyCode'] = generateVerify();
