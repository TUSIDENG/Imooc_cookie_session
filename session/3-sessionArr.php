<?php
//会话保存数组
session_start();
$userlist = [
    'user1' => ['username' => 'dengwei1', 'email' => '132@qq.com', 'age' => 22],
    'user2' => ['username' => 'dengwei2', 'email' => '234@qq.com', 'age' => 22]
];
$_SESSION = $userlist;