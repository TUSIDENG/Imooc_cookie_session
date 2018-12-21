<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 21:14
 */
//header('Set-Cookie: b=test; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() + 3600) . '; path=/test/cookie/testpath/');
//header('Set-Cookie: c=secure');
header('Set-Cookie: s=ssl; httponly; path=/test/cookie/testpath');
header('Set-Cookie: test1=helloking; httponly; path=/; expires=' . gmdate('D, d M Y H:i:s \G\M\T',
        time() + 3600));
//如果不是https，下面无法设置cookie
setcookie('secure_test', 'secure', time(), '/', $_SERVER['SERVER_NAME'], 'secure');