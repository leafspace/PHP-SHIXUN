<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
include 'conn.php';
$nid1=isset($_GET["nid"])?$_GET["nid"]:0;

$sql="select * from news where id='$nid1' ";
$result=mysql_query($sql,$conn);
$record=mysql_fetch_array($result);
$title=$record['title'];
$content=$record['content'];
$time=$record['time'];
$writer=$record['writer'];
$classname=$record['classname'];
?>
<form action="action.php" method="POST" class="definewidth m20" enctype="multipart/form-data">
<input type="hidden" name="id" value="" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
          <td width="10%" class="tableleft">id</td>
            <td> <?php echo"$nid1";?></td>
        </tr>
        <tr>
            <td class="tableleft">标题</td>
            <td><input type="text" value="<?php echo"$title";?>" name="rname" />  </td>
        </tr>
        <tr>
            <td class="tableleft">作者</td>
            <td><?php echo"$writer";if ($writer==null)echo"null";?> </td>
        </tr>
        <tr>
            <td class="tableleft">时间</td>
            <td><?php echo"$time";?></td>
        </tr>
        <tr>
            <td class="tableleft">板块</td>
            <td>
              <?php
				  header("content-type:text/html;charset=utf-8");
				  error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
				  include 'conn.php';
				  $sqlcmd="select classname from newsclass order by classid asc ";
				  $result=mysql_query($sqlcmd,$conn);
				  ?>
              <select name='cid'   >
				  <?php
				  $i=0;
				  while($record=mysql_fetch_array($result))
				  {
				  	$i++;
				  	$sn=$record['classname'];
				  	echo"<option value ='$i'>$sn</option>";
				  }
				  ?>
				</select>
            </td>
        </tr>
        <tr>
            <td class="tableleft" style="width:400px;height:400px">内容</td>
            <td>
            <textarea cols="100"style="width:900px;height:400px"> <?php echo"$content";?> </textarea>
          
            
            
            
             </td>
        </tr>
	
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary"   onclick="javascript:return del();">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
            
        </tr>
         <tr  ><td  colspan="2"   style=" text-align:center;color:red;font-size:16px;border-top:none" >
          <?php
             			    
          						$err=isset($_GET["err"])?$_GET["err"]:0;
                                switch($err) {
                                    case 1:
                                    echo "用户名不能小于5位！";
                                    break;
                                    case 2:
                                    echo "密码不能小于6位！";
                                    break;
                                    case 3:
                                    echo "用户名不能小于5位,密码不能小于6位！ ";
                                    break;
                                    case 4:
                                    echo "上传图片不能大于2M！ ";
                                    break;
                                    case 5:
                                    echo "上传的图片文件格式不正确！ ";
                                    break;
                                    case 6:
                                    echo "图片上传失败_请检查数据库操作！ ";
                                    break;
                                    case 7:
                                    echo "图片上传失败！ ";
                                    break;
                                    case 8:
                                    echo "修改成功！ ";
                                    break;
                                  
                                }
                       
                          
                          
                                
                                ?></td>
     </tr>
    </table>
</form>

</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
			window.location.href="newslist.php";
		 });

    });
    function del() 
    { var msg = "确定修改信息?";
     if (confirm(msg)==true  )
         {
    	 return true;
         }
     else
         {  return false; }
  	   }
</script>
