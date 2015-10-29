<?php
 
$db_server = "sql207.byethost32.com";
$db_user = "b32_16092486";
$db_passwd = "vincent124321707";
$db_name = "b32_16092486_e24p21";
 
if(!@mysql_connect($db_server, $db_user, $db_passwd)){
        die("無法對資料庫連線");
}
 
mysql_query("SET NAMES utf8");
 
if(!@mysql_select_db($db_name)){
        die("無法使用資料庫");
}
 
?>
