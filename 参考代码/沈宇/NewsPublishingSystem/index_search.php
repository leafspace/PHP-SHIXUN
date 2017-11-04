<<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻搜索</title>
<script LANGUAGE="JavaScript">
</script>
<script src="js/jquery-1.4.4.min.js"></script>
<script src="js/slides.min.jquery.js"></script>
 <script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(){
					$('.caption').animate({
						bottom:-35
					},100);
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log(current);
					};
				}
			});
		});
</script>
<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/test1.css">
<style>
.dh{
position: fixed;
 
background: ;color: #fff;
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
		  background-repeat:no-repeat;background-size:400% 400%;
		    ">
<div align="center" style="height:1500px ;background-color: "> <!-- 总画布 -->
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
	<div id="container" ><!-- 左边图片网页链接滚动显示 -->
		<div id="example">
			<div id="slides">
				<div class="slides_container">
					<div>
						<a href=" " title=" " target="_blank"><img src="img/slide-1.jpg" width="550" height="270" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p style="margin-top:-40px;margin-left:-250px; ">新闻1</p>
						</div>
					</div>
					<div>
						<a href=" " title=" " target="_blank"><img src="img/slide-2.jpg" width="500" height="270" alt="Slide 2"></a>
						<div class="caption">
							<p style="margin-top:-40px;margin-left:-250px;">新闻2</p>
						</div>
					</div>
					<div>
						<a href=" " title=" " target="_blank"><img src="img/slide-3.jpg" width="500" height="270" alt="Slide 3"></a>
						<div class="caption">
							<p style="margin-top:-40px;margin-left:-250px;">新闻3</p>
						</div>
					</div>
					 
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="上一张"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="下一张"></a>
			</div>
			<img src="img/example-frame.png" width="500" height="341" alt="Example Frame" id="frame">
		</div>
	</div>
	
	 
	<div id="container1" ><!-- 搜索栏 -->
	<div ><ul style="padding-left: 0px;padding-top:30px"><li style="list-style: none;color:white;font-size:25px;display:block;letter-spacing: 3px;line-height:28px;border-bottom:2px solid grey;width:400px;">新闻搜索</li></ul>
	<div id="search" class="search">
	
		<form action="index_search.php" method="GET">
			<input type="text" placeholder="请输入要查找的新闻信息" value=""  name="newsearch" >
			
				<button id="buton"   type="submit" >
				</button>
			
	
		</form>
	</div>
	</div>
	</div>
	<div id="sresult" style="margin-left:380px ;width:800px; height:800px;  background-color: ;
			margin-top:-520px ; "  >
		<?php
		error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
		$wherelist=array();		
		$urlist=array();
		if(!empty($_GET['newsearch']))
		{
		$wherelist[]=" content like '%".$_GET['newsearch']."%'";
		$wherelist[]=" title like '%".$_GET['newsearch']."%'"; 
		$urllist[]="newsearch=".$_GET['newsearch'];
		}
		$where="";
		if(count($wherelist)>0)
		{
		$where=" where ".implode('or ',$wherelist);
		$url='&'.implode('&',$urllist);
		}
		//分页的实现原理
		//1.获取数据表中总记录数
		include 'conn.php';
		$sql="select * from news $where "; 
		$result=mysql_query($sql);
		$totalnum=mysql_num_rows($result);
		//每页显示条数
		$pagesize=10;
		//总共有几页
		$maxpage=ceil($totalnum/$pagesize);
		$page=isset($_GET['page'])?$_GET['page']:1;
		if($page <1)
		{
		$page=1;
		}
		if($page>$maxpage)
		{
		$page=$maxpage;
		}
		$limit=" limit ".($page-1)*$pagesize.",$pagesize";
		$sql1="select * from news {$where} order by time desc {$limit}"; //此处加了id降序
		$res=mysql_query($sql1);
		?>
	   <?php
	   $s=empty($_GET['newsearch']);
	   $sum=0;
        if(!$s)
        {echo"<table   width=600px class='gridtable'>";
 		echo"<tr>";
		echo" <th width=40% >标题 </th>";
		 echo" <th width=20%>日期 </th>";
		echo" <th width=40% >内容 </th>";
	 	echo"</tr>";
		 while($row= mysql_fetch_assoc($res))
		 {
		 	$s1=$row['id'];
		 	$sum++;
		echo"<tr height=50px>";
		 
		 echo"<td    >";  echo "<a href='newsin.php?id=$s1'>";echo $row['title']; echo"</a>"; echo"</td>";
		echo "<td    >"; echo $row['time']; echo"</td>";
		echo "<td    >"; echo mb_substr($row['content'],0,30); 
		 if (mb_strlen($row['content'])>=30) echo "..";
		echo"</td>";
		 echo"</tr>";
		 } 
		 $sum=$pagesize-$sum;
		while($sum--)
		{
			echo "<tr height=50px >
				  <td colspan=3  style='border-top-style:none;border-bottom-style:none;'></td>
				</tr>";
		}
		echo"<tr>";
		 echo "<td colspan=3>";
		 
		echo " 当前{$page}/{$maxpage}页 共{$totalnum}条";
		echo " <a href='index_search.php?page=1{$url}'>首页</a> ";
		echo "<a href='index_search.php?page=".($page-1)."{$url}'>上一页</a>";
		echo "<a href='index_search.php?page=".($page+1)."{$url}'>下一页</a>";
		echo " <a href='index_search.php?page={$maxpage}{$url}'>尾页</a> ";
		echo "</td>";
		echo "</tr>";
		echo "</table>";	
        }
	?>
		</div>
	<div style="width:450px;height:300px;background-color: ;margin-top:-300px;margin-left:-1000px;position:relative ;">
		<ul style="padding-left: 0px;padding-top:30px;"><!-- 点击量统计栏-->
		<li style="list-style: none;color:white;font-size:25px;display:block;letter-spacing: 3px;line-height:28px;border-bottom:2px solid grey;width:400px;">热点新闻</li>
		<li style="float:right;list-style: none;margin-top:-20px;color:green;padding-right:30px;display:block;">Top8点击量</li>
		</ul>	
		<div style="background-color:;width:100%;height:100%">
		 <form style="color:white;padding-top:20px">
		 <table style="width:80%;color:white">
		<?php
			error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
			$sqlcmd="select *from news order by clicktimes desc limit  8";
			$result=mysql_query($sqlcmd);
			$topn=0;
			while($record=mysql_fetch_array($result))
			 {	$topn++;
			 	echo"<tr >";
			 	$titlec=mb_substr($record[title],0,15);
			 	$s11=$record['id'];
			 	echo"<td width=100%>NO.$topn&nbsp;&nbsp;<a href='newsin.php?id=$s11' >$titlec";  
			 	if (mb_strlen($record['title'])>=15) echo "..";
				echo"</a>";
				echo"</td>";
			 	 echo"<td align=center > $record[clicktimes]</td>";
			 	echo"</tr>"; 
			 }
		?>
		</table>
		</form>
		</div>
	</div>
	<div style="width:450px;height:300px;background-color: ;margin-top:-40px;margin-left:-1000px">
		<ul style="padding-left: 0px;padding-top:30px;"><!-- 新闻总数统计栏 -->
		<li style="list-style: none;color:white;font-size:25px;display:block;letter-spacing: 3px;line-height:28px;border-bottom:2px solid grey;width:400px;">新闻统计</li>
		</ul>
		<div style="background-color:;width:100%;height:100%">
		 <form style="color:white;padding-top:20px">
		 <table style="width:80%;color:white">
		<?php
			error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
			$sqlcmdc="select *from news";
			$resultc=mysql_query($sqlcmdc);
			$sc=array("时政"=>0,"国际"=>0,"社会"=>0,"财经"=>0,"金融"=>0,"娱乐"=>0,"文化"=>0);
			while($record=mysql_fetch_array($resultc))
			 {	
			 	if($record["classname"]=='时政')$sc["时政"]++;	
			 	if($record["classname"]=='国际')$sc["国际"]++;
			 	if($record["classname"]=='社会')$sc["社会"]++;
			 	if($record["classname"]=='财经')$sc["财经"]++;
			 	if($record["classname"]=='金融')$sc["金融"]++;
			 	if($record["classname"]=='娱乐')$sc["娱乐"]++;
			 	if($record["classname"]=='文化')$sc["文化"]++; }
		?>
		<?php 
			foreach ($sc as $k => $v) 
				{
			    echo"<tr><td align=left width=100%>&nbsp;&nbsp;&nbsp;&nbsp;{$k}新闻</td><td align=right>$v</td></tr>";
				}
		?>
		</table>
		</form>
		</div>	
		</div>
	 
		
	</div>







</body>
</html>

 