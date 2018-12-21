<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 0:05
 */
setcookie('cookie_name', 'cookie_value', time() + 3600, '/', $_SERVER['SERVER_NAME'],
    isset($_SERVER['HTTPS']), true);