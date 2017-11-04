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
<form action="edit.php" method="POST" class="definewidth m20" enctype="multipart/form-data">
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">用户名</td>
        <td><input type="text" name="rname" /></td>
    </tr>
    <tr>
        <td class="tableleft">用户组</td>
        <td ><input type="hidden" name="moduletitle" value=""/>管理员(不可更改)</td>
    </tr>  
    <tr>
        <td class="tableleft">密码</td>
        <td >
         <input type="text" name="rpassword" placeholder="重置密码" /> 
        </td>
    </tr>
      <tr>
        <td class="tableleft">个人头像</td>
        <td >
         <img src="<?php session_start(); $picpath=$_SESSION['picpath']; echo"$picpath";?>" style="height:280px;width:200px"> 
         <input   type="file" name="uppic" value="选择上传图片"/>
        
        </td>
    
        
     
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary"   onclick="javascript:return del();">修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>

</body>
</html>
<script  LANGUAGE="JavaScript">
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.php";
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
<?php 
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
include 'conn.php';
$rname=$_POST['rname'];
$rpassword=$_POST['rpassword'];
$login=$_SESSION['logined'];
$name=$_SESSION['user'];
$uid=$_SESSION['uid'];
$ln=strlen($rname);
$lp=strlen($rpassword);
 
	if(!empty($rname)&&!empty($rpassword))
	{	 
		if($ln<5||$lp<6)
		{
			echo '<script language="javascript">';
			echo 'alert("用户名不能小于5位,密码不能小于6位");';
			echo '</script>';
		}else {
			$sql="update user set user='$rname',password='$rpassword' where id='$uid'";
			$result=mysql_query($sql,$conn);
			$_SESSION['user']=$rname;
			$name=$rname;
			$_SESSION['password']=$rpassword;
			echo '<script language="javascript">';
			echo 'alert("修改用户名和密码成功");';
			echo '</script>';
		}
	}else if(!empty($rname)&&empty($rpassword))
	{
		if($ln<5){echo '<script language="javascript">';
				echo 'alert("用户名不能小于5位");';
				echo '</script>';}
		else {$sql="update user set user='$rname' where id='$uid'";
			$result=mysql_query($sql,$conn);
			$_SESSION['user']=$rname;
			$name=$rname;
			echo '<script language="javascript">';
			echo 'alert("修改用户名成功");';
			echo '</script>';
		}}else if(empty($rname)&&!empty($rpassword)){
		if($lp<6){
			
				echo '<script language="javascript">';
				echo 'alert("密码不能小于6位");';
				echo '</script>';}
		else {$sql="update user set password='$rpassword' where id='$uid'";
			$result=mysql_query($sql,$conn);
			$_SESSION['password']=$rpassword;
			echo '<script language="javascript">';
			echo 'alert("修改密码成功");';
			echo '</script>';
		}}
		
	//更换头像处理
		//array数组中放图片的格式
		$uptypes = array("image/jpg","image/jpeg","image/png","image/pjpeg","image/gif","image/bmp","image/x-png");
		$files =$_FILES["uppic"];
		 
		if($files[name]!=null)
		{if($files["size"]>2097152){ //图片大小判断
			echo "上传图片不能大于2M";
			exit;
		}
		$ftype =$files["type"];
		if(!in_array($ftype,$uptypes) ){ //图片格式判断
			echo '<script language="javascript">';
			echo 'alert("上传的图片文件格式不正确");';
			echo '</script>';
			exit;
		}
		$fname = $files["tmp_name"]; //在服务器临时存储名称
		$image_info = getimagesize($fname);
		$name1 = $files["name"];
		$str_name = pathinfo($name1); //以数组的形式返回文件路径的信息
		$extname = strtolower($str_name["extension"]); //把字符串改为小写 extensiorn扩展名
		$upload_dir = "../upload/"; //upload文件夹
		$file_name = date("YmdHis").rand(1000,9999).".".$extname;
		$str_file = $upload_dir.$file_name; //文件目录
		//存入数据库
 
		$sql="update user set picpath='$str_file' where user='$name'"; //将图片地址插入数据库mywork
		$result=mysql_query($sql,$conn);
		if($result==0){echo "图片上传失败_请检查数据库操作";exit;}
		if(!file_exists($upload_dir)){
			mkdir($upload_dir); //创建目录 成功则返回true 失败则返回flase
		}
		if(!move_uploaded_file($files["tmp_name"],$str_file)&&$files!=0){ //将上传的文件移动到新的目录 要移动文件和文件新目录 成功则返回true
			echo "图片上传失败";
			exit;
		 
		}
		else if($files!=0&&$result!=0){
			echo "<img src=".$str_file.">";
			echo "图片上传成功";
		 
		}
		mysql_close($conn);
		}
			
			

		


?>