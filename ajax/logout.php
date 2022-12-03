<?php
require_once dirname(__FILE__, 2).'/vendor/autoload.php';

COMMON::deleteSession('member_code');
setcookie("member_code", "", (time()-3600*24*30),"/");
?>