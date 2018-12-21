<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/9/28
 * Time: 19:37
 */
$val = '我是中文 news.net';
setcookie('cookie_normal', $val);
setrawcookie('cookie_raw', urlencode($val));
setrawcookie('cookie_raw2', rawurlencode($val));
header('Set-Cookie:cookie_header=' . urlencode('带 空+格 的中文'), false);
?>
<script src="src/js.cookie-2.2.0.min.js"></script>
<script>
    var cookie_normal = Cookies.get('cookie_normal');
    var cookie_raw = Cookies.get('cookie_raw');
    var cookie_raw2 = Cookies.get('cookie_raw2');
    var cookie_header = Cookies.get('cookie_header');
    document.write(document.cookie+'<br/><br/>noraml:' + cookie_normal + ',<br/>raw:' + cookie_raw + ',<br/>raw2:'
        + cookie_raw2 + ',<br/>header' + cookie_header);
</script>