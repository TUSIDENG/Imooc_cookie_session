<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/6/2
 * Time: 0:14
 */
setcookie('testPath1', 'path1', time() - 1);
setcookie('testPath2', 'path2', time() - 1, '/');
setcookie('TestCookie', '', time()-3600);
setcookie('testPath3', '', time() - 1);
print_r($_COOKIE);