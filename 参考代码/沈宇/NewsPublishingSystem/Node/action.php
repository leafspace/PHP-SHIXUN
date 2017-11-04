<?php
//新闻发布的action
session_start();
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
include 'conn.php';
if($_SESSION['logined']==0) exit;
$ids=$_POST['val'];
$ids1=$_POST['val1'];
$title=$_POST['newtitle'];
$writer=$_SESSION['user'];
$time=date("Y-m-d");
$cid=$_POST['cid'];
$sc=array(1=>'时政',2=>'国际',3=>'社会',4=>'财经',5=>'金融',6=>'文化');
$lt=strlen($title);
if (empty($title)) header("Location:newsindex.php?err=1");
else 
{ 
	foreach ($sc as $k => $v)
	{
		if($k==$cid)$cname=$v;
	}
	
	$sql="insert into news(title,content,time,writer,classname)values('$title','$ids','$time','$writer','$cname')";
	$result1=mysql_query($sql);
	if ($result1)header("Location:newsindex.php?err=10");
	
	
}
?>
 