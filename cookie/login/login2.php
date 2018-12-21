<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/10/4
 * Time: 19:51
 */
header( 'Content-type:text/html;Charset=utf8' );
if ( isset( $_COOKIE['username'] ) && isset( $_COOKIE['auth'] ) ) {
//校验用户凭证
$auth = $_COOKIE['auth'];
$resArr = explode( ':', $auth );
$userId = end( $resArr );
$link = mysqli_connect( 'localhost', 'root', 'root' ) or die( 'Connect error' );
mysqli_set_charset( $link, 'utf8' );
mysqli_select_db( $link, 'php' ) or die( 'Database open error' );
$sql = 'SELECT user_id AS userId, name AS username, password FROM user WHERE user_id = ' . $userId;
$result = mysqli_query( $link, $sql );
if ( mysqli_num_rows( $result ) == 1 ) {
    $row = mysqli_fetch_assoc( $result );
    $username = $row['username'];
    $password = $row['password'];
    $salt = 'king';
    $authStr = md5( $username.$password.$salt );
    if ($authStr == $resArr[0]) {
        exit( "
        <script>
        alert('你已经登录，即将跳转');
        location.href='index.php';        
        </script>
        " );
    }
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="container">
            <div class="form row">
                <form action="doLogin.php" method="POST">
                <div class="form-horizontal col-md-offset-3" id="login_form">
                    <h3 class="form-tilte">登录</h3>
                    <div class="col-md-9">
                        <div class="form-group">
                            <i class="fa fa-user fa-lg"></i>
                            <input class="form-control required" type="text" placeholder="Username" id="username" name="username" autofocus maxlength="20">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock fa-lg"></i>
                            <input class="form-control required" type="password" placeholder="Password" id="password" name="password" maxlength="8">
                        </div>
                        <div class="form-group">
                                <label class="checkbox">
                                    <input type="checkbox" name="autoLogin">一周内自动登录
                                </label>
                        </div>
                        <div class="form-group col-md-offset-9">
                            <button type="submit" class="btn btn-success pull-right">登录</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
    </div>
</body>
</html>