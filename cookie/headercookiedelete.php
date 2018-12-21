<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 21:54
 */
header('Set-Cookie: name=helloking; expires=' . gmdate('D, d M Y H:i:s', 1));
header('Set-Cookie: test1=php; expires=' . gmdate(DATE_RSS, time() + 3600) . '; path=/');