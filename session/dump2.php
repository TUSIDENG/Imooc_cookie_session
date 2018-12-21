<?php
//通过url传递session id
session_id($_GET[session_name()]);
session_start();
print_r($_SESSION);