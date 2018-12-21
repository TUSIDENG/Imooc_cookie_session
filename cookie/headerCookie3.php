<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 17:19
 */
header('Set-Cookie:cookie_name=' . urlencode('设置有效域名/https/httponly' ) . '; expires=' .
    gmstrftime('%a, %d-%b-%Y %H:%M:%S GMT', time() + 3600*24) . '; Max-Age=3600; path=/; domain='
. $_SERVER['SERVER_NAME'] . '; httponly');
setcookie('cookie_name3', '设置有效域名/https/httponly', time() + 3600*24, '/',
    $_SERVER['SERVER_NAME'], isset($_SERVER['HTTPS']), true);