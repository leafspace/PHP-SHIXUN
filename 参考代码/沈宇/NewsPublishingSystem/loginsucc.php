<!doctype html> 
<html >  
 <head>    
  <meta charset="UTF-8">     
  <script LANGUAGE="JavaScript">
 function closed(){
window.close();
	 }
</script> 
  <title>登录</title>  
   </head>  
    <body >     
    <?php
    session_start();
	if(isset($_SESSION['logined'])&&$_SESSION['logined'])
	{
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   echo "欢迎您: ".$_SESSION['user']."!";}
	?>
	<input type="submit" onclick="closed()" value="关闭"> 
     </body> 
</html>