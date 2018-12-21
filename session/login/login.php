<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>登录表单</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
<h1 class="text-center">登录页面</h1>
<form action="doLogin.php?act=login" method="post" role="form">
    <legend>登录</legend>
    <div class="row">
    <div class="form-group">
        <label for="username" class="col-sm-2">用户名</label>
        <div class="col-sm-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="password" id="password" placeholder="Enter password">
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-3">
        <img id="captcha" src="../code.php">
        <a href="javascript:;" onclick="document.getElementById('captcha').src='../code.php?r='+Math.random()">换一个?</a>
        </div>
    </div>
    <div class="row">
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">验证码</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="verify" id="verify" placeholder="Enter verify-code">
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="autoLogin" value="1">一周内自动登录
                </label>
            </div>
        </div>
    </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>