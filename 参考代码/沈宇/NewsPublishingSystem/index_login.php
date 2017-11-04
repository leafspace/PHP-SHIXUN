<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
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
<body  style="background:-webkit-linear-gradient(top,#200000,#D80000,#580000);        
		  background-repeat:no-repeat;background-size:250% 250%;
		    ">
<div align="center" style="height:1000px ;background-color:  ;"> <!-- 总画布 -->
	<div class="dh" align=left style=" "><!-- 顶部滚动导航栏 -->
	 	<table  style="background-color: ;margin-left:90px;align:center;margin-top:10px;width:89%" >
	 	<tr><td width="33%" id="login_click"><a href="index" >首页</a></td>
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
	 <div class="content" align="center" style="padding-top:8%" >
        <div class="middle">
            <form id="loginform" action="action.php" method="post" >
                <table border="0" width="31%"  style="background-color: ;color:#CCCCFF ;border-collapse:collapse">
               		<tr>
 				 		<td colspan="2" align="center" height="50"  style="font-size:300%;padding-top:10px;color: ">用户登录 </td> 
               		</tr>
                    <tr>
                        <td align="right" width="50%"style="font-size:120%;padding-right:20px">用户名：</td>
                        <td align="left">
                            <input type="text"  name="username" required="required"  >
                        	
                        </td>
                    </tr>
                    <tr>
                        <td align="right" width="50%"style="font-size:120%;padding-right:20px">密&nbsp;&nbsp;码：</td>
                        <td align="left"><input type="password"  name="password" style=" "></td>
                    </tr>
                    <tr>
                    	<td align="right" width="50%"style="font-size:120%;padding-right:20px"> 输入验证码： </td>
                        <td align="left"><input type="text"  name="yanzhma"  >
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="color:red;font-size:10px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="border-top:0;padding-left:20px">
							<br>
                            <input type="submit"   name="login"  onclick=" " value="登录"/>
                            <input type="reset"  name="reset" value="重置"/>
                        </td>
                    </tr>
                   
                    <tr >
               
                    <td colspan="2"   align="center" style="border-top:0;padding-left:50px">  
                         <br>
						<img src="Captcha.php" alt="" id="codeimg" onclick="javascript:this.src = 'Captcha.php?'+Math.random();">
						
                    </td>
                    
                    </tr>
                    <tr>
                      <td colspan="2"  align="center" style="border-top:0;padding-left:50px">  
                    <span>Click to Switch</span>   </td>
                    </tr>
                    <tr>
                   		 <td  colspan="2"    align="center"  style="border-top:0">
                  	       <?php
                                $err=isset($_GET["err"])?$_GET["err"]:0;
                                switch($err) {
                                    case 1:
                                    echo "密码不正确！";
                                    break;
                                    case 2:
                                    echo "不存在该用户！";
                                    break;
                                    case 3:
                                    echo "用户名不能为空！ ";
                                    break;
                                    case 4:
                                    echo "用户名密码不能为空！ ";
                                    break;
                                    case 5:
                                    echo "密码不能为空！ ";
                                    break;
                                    case 6:
                                    echo "请输入正确的验证码！ ";
                                    break;
                                  
                                }
                            ?>
                            </td>
       				</tr>                    
                </table>
            </form>
        </div>
    </div>
</div>
	






</body>
</html>

<?php
?>