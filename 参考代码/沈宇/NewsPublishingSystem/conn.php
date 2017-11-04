<?php
error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
$host="localhost";
$user="root";
$password="";
$conn=mysql_connect($host,$user,$password);
if(!$conn)die("连接服务器失败");
$dbname="newsinfo";
$opendb=mysql_select_db($dbname,$conn);
if(!$opendb)die("数据库连接失败");
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库


?>
