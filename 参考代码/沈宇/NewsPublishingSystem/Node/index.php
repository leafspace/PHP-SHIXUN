<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
    include 'conn.php';
	if(isset($_SESSION['logined'])&&$_SESSION['logined'])
	{
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
  	 $name=$_SESSION['user'];
	$gourp=$_SESSION['ugroup'];
	$password=$_SESSION['password'];
	$uid=$_SESSION['uid'];
	}
	$sqlcmd="select picpath from user where id='$uid'";
	$result=mysql_query($sqlcmd,$conn);
	$row=mysql_fetch_assoc($result);
	$picpath=$row['picpath'];
	$_SESSION['picpath']=$picpath;
	?>
<body>
<form class="form-inline definewidth m20" action="index.php" method="get" >  
  管理员：<?php echo$name; ?>&nbsp;&nbsp;的信息
</form>
<table class="table table-bordered table-hover definewidth m10  "   >
    <tr >
        <th width="20%">用户名</th> <td  ><?php echo"$name"?></td>
    </tr>
    <tr>
     <th>用户组</th>  <td>管理员</td>
     </tr>
     <tr>
     <th>密码 </th>  <td><?php echo"$password";?></td>
     </tr>
        <tr>
        <th>个人头像</th>  <td > <img src="<?php echo"$picpath";?>" style="height:280px;width:200px"> </td>
        </tr>
	 <tr>
        <th>修改信息</th>  <td><a href="edit.php">编辑</a> </td>
        </tr>
  
</table>
 
</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>