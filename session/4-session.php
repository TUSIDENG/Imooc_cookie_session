<?php
//通过url传递session id
session_start();
$_SESSION['a'] = 'aaa';
$_SESSION['b'] = 'bbb';
echo '<a href="dump2.php?' . session_name() . '=' . session_id() . '">查看会话信息</a>';