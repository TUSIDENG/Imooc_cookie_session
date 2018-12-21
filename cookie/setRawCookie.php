<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/27
 * Time: 17:13
 */
// 发送未经url编码的cookie
setrawcookie('cookie_name1', rawurlencode('test space'), time()+3600);

setcookie('cookie_name2', 'test space', time()+3600);