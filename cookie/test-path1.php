<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/8/28
 * Time: 18:00
 */
setcookie('testPath1', 'path1', time() + 3600);
setcookie('testPath2', 'path2', time() + 3600, '/');
setcookie('testPath3', 'path3', time() + 3600, '/test/cookie/testpath/');
setcookie('test-Secure1', 'secure', time() + 3600, '', '', true);
setcookie('test-Secure2', 'secure', time() + 3600, '', '', false);
setcookie('timezone', 'timezone', time() + 24 * 3600);
setcookie('expire', 'once');