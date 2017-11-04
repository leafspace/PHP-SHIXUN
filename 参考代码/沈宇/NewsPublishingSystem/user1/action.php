<?php 
session_start();
include 'conn.php';
header("content-type:text/html;charset=utf-8");
$uid1=$_SESSION['uid1'];
$rname=$_POST['rname'];
$rpassword=$_POST['rpassword'];
$ln=strlen($rname);
$lp=strlen($rpassword);
$ups=0;
 //输入用户名和密码数据操作
	if(!empty($rname)&&!empty($rpassword))//1.输入的用户和密码不为空
	{	 
		if($ln<5||$lp<6)
		{
			header("Location:edit.php?err=3&uid=$uid1");
		}else {
			$sql1="update user set user='$rname',password='$rpassword' where id='$uid1'";
			$result1=mysql_query($sql1,$conn);
			$ups=1;
		}
	}else if(!empty($rname)&&empty($rpassword))//2.只输入用户名，不输入密码
	{
		if($ln<5){
			header("Location:edit.php?err=1&uid=$uid1");
		}
		else {$sql1="update user set user='$rname' where id='$uid1'";
			$result1=mysql_query($sql1,$conn);
			$ups=1;
		}
	}else if(empty($rname)&&!empty($rpassword)){ //3.只输入密码，不输入用户名
		if($lp<6){header("Location:edit.php?err=2&uid=$uid1");}
		else {$sql1="update user set password='$rpassword' where id='$uid1'";
			$result1=mysql_query($sql1,$conn);
			$ups=1;
		}
	}
	$files =$_FILES["uppic"];
		if(empty($rname)&&empty($rpassword)&&empty($files[name]))header("Location:index.php");
		if(empty($rname)&&empty($rpassword))$ups=1;
		if($ups==1&&empty($files[name]))header("Location:index.php");
		
		
	//更换头像处理
		//array数组中放图片的格式
		$uptypes = array("image/jpg","image/jpeg","image/png","image/pjpeg","image/gif","image/bmp","image/x-png");
		
		 
		if($files[name]!=null&&$ups==1)
		{if($files["size"]>2097152){ //图片大小判断
			header("Location:edit.php?err=4&uid=$uid1");
			exit;
		}
		$ftype =$files["type"];
		if(!in_array($ftype,$uptypes) ){ //图片格式判断
			header("Location:edit.php?err=5&uid=$uid1");
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
 
		$sql="update user set picpath='$str_file' where id='$uid1'"; //将图片地址插入数据库mywork
		$result=mysql_query($sql,$conn);
		if($result==0){header("Location:edit.php?err=6&uid=$uid1");exit;}
		if(!file_exists($upload_dir)){
			mkdir($upload_dir); //创建目录 成功则返回true 失败则返回flase
		}
		if(!move_uploaded_file($files["tmp_name"],$str_file)&&$files!=0){ //将上传的文件移动到新的目录 要移动文件和文件新目录 成功则返回true
			header("Location:edit.php?err=7&uid=$uid1");
			exit;
		 
		}
		else if($files!=0&&$result!=0){
			header("Location:edit.php?err=8&uid=$uid1");
		 
		}
		 
		}
?>