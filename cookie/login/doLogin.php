<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/10/4
 * Time: 20:41
 */
header('Content-type:text/html; Charset=utf8');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';
$autoLogin = isset($_POST['autoLogin']) ? $_POST['autoLogin'] : '';
$link = mysqli_connect('localhost', 'root', 'root') or die('Connect error');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'php') or die('Database open error');
$username = mysqli_escape_string($link, $username); //由于密码使用php的md5加密，没有使用mysql的，所以不用转义
$sql = "SELECT user_id AS userId, name AS username, password FROM user WHERE name = '{$username}' && password = '{$password}'";
//$sql = mysqli_escape_string($link, $sql);
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $salt = 'king';
    $auth = md5($username.$password.$salt).":".$row['userId'];
    if ($autoLogin == 1) {
        setcookie('username', $username, strtotime('+7 days'));
        setcookie('auth', $auth, strtotime('+7 days'));
    } else {
        setcookie('username', $username);
        setcookie('auth', $auth);
    }
    exit("<script>
alert('登录成功');
location.href='index.php';
</script>");
} else {
    exit("<script>
alert('登录失败');
location.href='login.php';
</script>");
}
