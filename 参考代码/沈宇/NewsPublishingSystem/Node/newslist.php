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
<body>
<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
	if(isset($_SESSION['logined'])&&$_SESSION['logined'])
	{
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
  	$name=$_SESSION['user'];
	$gourp=$_SESSION['ugroup'];
	 
	}
	?>
<form class="form-inline definewidth m20" action="index.php" method="get" style="height: 20px">  
   
</form>
<table class="table table-bordered table-hover definewidth m10"  style="height: 500px">
    <thead>
    <tr>
        <th>新闻id</th>
        <th>标题</th>
        <th>板块</th>
        <th>日期</th>
        <th>删除</th>
        <th>操作</th>
 
    </tr>
    </thead>
    	<?php
    	include 'conn.php';
    	 

    	$sql="select * from news  ";
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
    	$sql1="select * from news order by id asc {$limit}"; //此处加了id降序
    	$res=mysql_query($sql1);
		?>
	   <?php
	 
	   $sum=0;
        if($_SESSION['logined'])
        {
		 while($row= mysql_fetch_assoc($res))
		 {
		 	$s1=$row['id'];
		 	$sum++;
		echo"<tr>";
		echo"<td    >";  echo "$s1"; echo"</td>";
		echo "<td    >"; echo $row['title']; echo"</td>";
		echo "<td    >"; echo $row['classname'];echo"</td>";
		echo "<td    >"; echo $row['time']; echo"</td>";
		echo "<td    >"; echo"<a style="."'text-decoration:none;font-size:15px;'"."href='newslist.php?duid=$s1'>✖</a>";echo"</td>"; 
		echo"<td width=15%   >"; 
		echo"<a href='edit1.php?nid=$s1'>修改</a>";
		echo"</td>"; 
		echo"</tr>";
		 } 
		 $sum=$pagesize-$sum;
		while($sum--)
		{
			echo "<tr height=45px  >
				  <td  ></td><td  ></td><td  ></td><td  ></td><td  ></td><td  ></td>
				</tr>";
		}
		echo"<tr >";
		 echo "<td colspan=6  >";
		echo "当前{$page}/{$maxpage}页 共{$totalnum}条";
		echo " <a href='newslist.php?page=1{$url}'>首页</a> ";
		echo "<a href='newslist.php?page=".($page-1)."{$url}'>上一页</a>";
		echo "<a href='newslist.php?page=".($page+1)."{$url}'>下一页</a>";
		echo " <a href='newslist.php?page={$maxpage}{$url}'>尾页</a> ";
		echo "</td>";
		echo "</tr>";
		
        }
        
	    ?>
	    <?php 
	    $duid=isset($_GET["duid"])?$_GET["duid"]:0;
	   	if($duid!=0)
	   	{
	   		$sqlcmd1="select *from news where id='$duid'";
	   		$result=mysql_query($sqlcmd1,$conn);
	   		$f=mysql_result($result,0);
	   		if($f!=false)
	   		{$sqlcmd="delete from news where id='$duid'";
	   		$result=mysql_query($sqlcmd,$conn);
	   		echo "<meta http-equiv='REFRESH' CONTENT='0'>";
	   		}

	   	
	   	}
	   		
	    
	    ?>
	    
	    
	    </table>
		</body>
		</html>

<script>
   
</script>