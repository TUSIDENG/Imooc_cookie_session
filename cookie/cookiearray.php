<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/6/2
 * Time: 0:18
 */
//设置cookie数组
setcookie('cookie[three]', 'cookiethree');
setcookie('cookie[two]', 'cookietwo');
setcookie('cookie[one]', 'cookieone');

var_dump($_COOKIE['cookie']);

if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />";
    }
}