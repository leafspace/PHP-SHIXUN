<?php 

error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
include 'conn.php';
$id=$_GET['id'];
$sql = "select * from news where id=$id";
$res2 = mysql_query($sql);
$row=mysql_fetch_assoc($res2);
 
$clicktimes1=$row['clicktimes']+1;
$sqlcmd="update news set clicktimes=$clicktimes1 where id=$id ";
$result=mysql_query($sqlcmd) or die( mysql_error()) ;
$title = $row['title'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo " $title ";?></title>
<script LANGUAGE="JavaScript">

</script>
 <style>
 .t1{
 colspan:2 ; 
padding-left: 320px;
 }
.t2 {  color: #FFFFff; text-decoration: none;   
 font-family: "宋体"; font-size: 18px; 
 padding-left:  px}
.t2:hover {  color: #000000; text-decoration: none;
  padding-left: 1px
 }

 </style>
<style>
.dh{
position: fixed; background: ;color: #fff;
width:100%;height:60px; margin-top:-60px;font-size:25px;
margin-left:-8px;
background:-webkit-linear-gradient(top,#200000,#580000,#900000);
}
#login_click{ margin-top:32px; height:40px;}
#login_click a 
{ 
    text-decoration:none;
	background:#383838;
	color:#f2f2f2;
	padding: 10px 30px 10px 30px;
	font-size:16px;
	font-family: 微软雅黑,宋体,Arial,Helvetica,Verdana,sans-serif;
	font-weight:bold;
	border-radius:3px;
	-webkit-transition:all linear 0.30s;
	-moz-transition:all linear 0.30s;
	transition:all linear 0.30s;
}
#login_click a:hover { background:#385f9e; }

.nav ul{
width:850px;
margin:0px auto;
height:38px;
padding:8px;
margin-left:90px;
border: 0 solid;
}
.nav ul li{
float:left;
list-style: none;

}
.nav ul li a{
width:90px;
height:35px;
line-height:28px;
background:grey;
color:#FFF;
margin:5px 10px;
font-size:12px;
 
display:block;
text-align:center;
text-decoration:none;
}
.nav ul li a:hover{
width:90px;
height:30px;
line-height:28px;
border-bottom:2px solid red;
color:red;
background:grey;
}
</style> 
</head>
<body style="background:-webkit-linear-gradient(top,#200000,#D80000,#580000);        
		  background-repeat:no-repeat;background-size:250% 250%;
		    ">
<div align="center" style="height:1000px ;background-color: "> <!-- 总画布 -->

	<div class="dh" align=left style=" "><!-- 顶部滚动导航栏 -->
	 	<table  style="background-color: ;margin-left:90px;align:center;margin-top:10px;width:89%" >
	 	<tr><td width="33%" id="login_click"><a href="index.php" >首页</a></td>
	 		<td width="33%" align="right" id="login_click">
	 		<a href="" >关于我们</a>
	 		<a>联系我们</a>
	 		<a href="index_login.php" onclick="">登录</a>
	 		<a href="index_zhuce.php">注册</a>
	 		</td>
	 	</tr>
	 	</table>
	</div> 
	<div   class="top" style="background-color: 	#C8C8C8;width:90%;height:120px" ><!--顶部网站名称 -->
		<p align="left" style=" color:#303030;font-style:italic;font-size:60px;letter-spacing: 10px;padding-top:40px;font-family:serif">世纪新闻网</p>
	 	<p id="dt" align="right" style="font-weight: ;border: ;margin-top: -80px;background-color:;">
			<script>
			document.write(new Date("
			<?php  date_default_timezone_set("Asia/Shanghai");echo date("Y年/m/d H:i:s")?>").toLocaleString())
			</script>
			<script >
			var dd=new Date("<?php date_default_timezone_set("Asia/Shanghai");echo date("Y/m/d H:i:s")?>");
			setInterval("dd.setSeconds(dd.getSeconds()+1);dt.innerText=dd.toLocaleString();",1000)
			</script>
		</p>
	</div>
		<div class="nav" style="background-color:grey;width:90%;height:60px;margin-top: "  ><!-- 顶部新闻导航栏 -->	 
	 <ul >
	   <li><a href="shizheng.php">时政</a></li>
	   <li><a href="#">国际</a></li>
	   <li><a href="#">社会</a></li>
	   <li><a href="#">财经</a></li>
	   <li><a href="#">金融</a></li>
	   <li><a href="#">娱乐</a></li>
	   <li><a href="#">文化</a></li>
	 </ul>
	</div>

	<div style="background: ; height:100px;width:90%; border-top-style:groove;border-bottom-style:solid;
	border-top-color:#980000; border-bottom-color:white;" >
	<div style="background:   ; height:100px;width:90%;margin-top:-20px;  "  >
	<p style=" padding-top: 0px;font-size:300%;color:#FFFFFF;letter-spacing: 10px; font-family:KaiTi">  
	<?php
   	$title = $row['title'];
	echo " $title ";
	?>
	</p>
	
	</div>
	</div>
	<div style="background:   ; height:600px;width:90%;color:white " >
	<div style="padding-left:30px;padding-top:60px; width:80%; "   >
	<p align="left" style="text-indent:2em"><?php
	$content = $row['content'];
	echo"$content";	
 
	?>
	</p>
	</div>
	 </div>
	 
	</div>

</body>
</html>

 