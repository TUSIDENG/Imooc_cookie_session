<?php
header('Content-type:text/html; Charset=utf-8');
session_start();
$act = isset($_GET['act']) ? $_GET['act'] : '';

// 连接数据库
$link = mysqli_connect('localhost', 'root', 'root', 'php') or die('Connect Error');
mysqli_set_charset($link, 'utf8');

switch($act) {
    case 'login':
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';
    $verify = isset($_POST['verify']) ? strtolower($_POST['verify']) : '1';
    $vrifyCode = isset($_SESSION['verifyCode']) ? strtolower($_SESSION['verifyCode']): '2';
    // 校验验证码
    if ($verify !== $vrifyCode) {
        exit('<script>
        alert("验证码不正确");
        history.back();
        </script>');
    }
    $username = mysqli_escape_string($link, $username);
    $sql = "SELECT user_id as userId, name as userName FROM user WHERE name='{$username}' AND password='{$password}'";
    $result = mysqli_query($link, $sql);
    if (mysqli_affected_rows($link) === 1) {
        $_SESSION['username'] = mysqli_fetch_assoc($result)['userName'];
        $_SESSION['isLogin'] = 1;
        exit('<script>
        alert("登录成功");
        location.href="./index.php";
        </script>');
    } else {
        exit('<script>
        alert("密码或用户名错误");
        history.back();
        </script>');
    }
    break;

    case 'logout':
    // 将会话数据清空
    $_SESSION=[];
    // 删除会话cookie
     if (ini_get('session.use_cookies')) {
         $params = session_get_cookie_params();
         setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'],
         $params['httponly']);
     }
     // 销毁会话
    session_destroy();
    header('location:login.php');
    break;

    default:
    exit('<script>
    alert("非法登录");
    location.href="./login.php";
    </script>');
}
