<?php 
header("content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
include 'conn.php';
$name=$_POST['addname'];
$password=$_POST['addpassword'];
$files =$_FILES["uppic"];
$ln=strlen($name);
$lp=strlen($password);
$uptypes = array("image/jpg","image/jpeg","image/png","image/pjpeg","image/gif","image/bmp","image/x-png");
$ups=0;
 //输入用户名和密码数据操作
if(empty($name)&&empty($password)&&empty($files[name]))header("Location:index.php");
	if(!empty($name)&&!empty($password))//1.输入的用户和密码不为空
	{	 
		if($ln<5)
		{
			header("Location:index.php?err=1");
		}else if($lp<6){
			header("Location:index.php?err=2");
		}
		else if($files[name]==null)
		 {	$sql="insert into user(user,password)values('{$name}','{$password}')";
			$result1=mysql_query($sql);
			$ups=1;
			header("Location:index.php?err=10");
		}else if($files[name]!=null){
			{//更换头像处理
			//array数组中放图片的格式
			if($files["size"]>2097152){ //图片大小判断
				header("Location:index.php?err=4");
				exit;
			}
			$ftype =$files["type"];
			if(!in_array($ftype,$uptypes) ){ //图片格式判断
				header("Location:index.php?err=5");
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
			$sql="insert into user(user,password,picpath)values('{$name}','{$password}','{$str_file}')"; //将图片地址插入数据库mywork
			$result=mysql_query($sql,$conn);
			if($result==0){header("Location:index.php?err=6");exit;}
			if(!file_exists($upload_dir)){
				mkdir($upload_dir); //创建目录 成功则返回true 失败则返回flase
			}
			if(!move_uploaded_file($files["tmp_name"],$str_file)&&$files!=0){ //将上传的文件移动到新的目录 要移动文件和文件新目录 成功则返回true
				header("Location:index.php?err=7");
				exit;
					
			}
			else if($files!=0&&$result!=0){
				header("Location:index.php?err=10");
					
			}
				
			}
			
			
			
		}
			
	}else if((empty($name)&&!empty($password))||(!empty($name)&&empty($password))) header("Location:index.php?err=3");
	 
		
		

	
		

?>