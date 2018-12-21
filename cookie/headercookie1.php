<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 0:09
 */
header('Set-Cookie:cookie_name1_cp=' . urlencode('浏览器关闭失效'));
setcookie('cookie_name1', '浏览器关闭失效');