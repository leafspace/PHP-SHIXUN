<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<script LANGUAGE="JavaScript">

</script>
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
	<div class="nav" style="background-color:grey;width:90%;height:60px"  ><!-- 顶部新闻导航栏 -->	 
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
	<div>
<form name="frm" method="post" action="index_zhuce.php" style="padding-top:8%;color:#CCCCFF">
<table width="31%"  border="0" align="center" style="border-color: ;border-collapse:collapse;color:#CCCCFF"  >
  <tr  >
	<td colspan="2" align="center" height="50" style="font-size:300%;padding-top:20px" >用户注册</td> </tr>
  <tr>
    <td width="50%" height="35" align="right"style="font-size:120%;padding-right:20px">用户名：</td>
    <td   height="35"><input type="text" name="name"  style=" required="required"/></td>
  </tr>
  <tr>
    <td width="50%" height="35" align="right"style="font-size:120%;padding-right:20px">密&nbsp;&nbsp;码：</td>
    <td  height="35"><input type="password" name="password" /></td>
  </tr>
  <tr>
    <td width="50%" height="35" align="right"style="font-size:120%;padding-right:20px">邮&nbsp;&nbsp;箱：</td>
    <td  height="35"><input type="password" name="password" /></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center" ><input type="submit" name="sub" value="提交" />
       <input type="reset" id="reset" name="reset" value="重置">
    </td>
   
   </tr> 
   <tr>
    <td  colspan="2" align="center" rowspan="2" style="border-top:0">
	<?php
	error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
	include 'conn.php';
	$name=$_POST['name'];
	$password=$_POST['password'];
	$n=strlen($name);
	$p=strlen($password);
	if($n==0){
		echo "  ";
	}elseif(!($n>=5 && $n<=16)){
		echo "用户名长度为5-16位";
	}elseif($p==0){
		echo "请输入密码";
	}elseif(!($p>=5 && $p<=16)){
		echo "密码长度为5-16位";
	}else{
		$sql="insert into user(user,password)values('{$name}','{$password}')";
		mysql_query($sql);
		$row=mysql_affected_rows($conn);
		if($row>0)
		{
		echo "注册成功";
		}else
		{
		echo "注册失败(用户已存在)";
		}
	}	
	?>
 </td>
</tr>
</table>
</form>
	</div>
</div>

</body>
</html>

<?php
?>