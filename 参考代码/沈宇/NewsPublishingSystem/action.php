 
<?php
 
session_start();
					error_reporting(E_ALL ^ E_DEPRECATED&&E_ALL ^ E_NOTICE);
					include 'conn.php';
					$code=isset($_SESSION['code'])?$_SESSION['code']:"";
					$name=$_POST['username'];
					$s=$_POST['yanzhma'];
					$password=$_POST['password'];
					if(!empty($name)&&!empty($password))
					 {
					 	
						$sql="select id,user,password,ugroup from user where user='$name' ";
						$result=mysql_query($sql,$conn);
						$record=mysql_fetch_array($result);
						 
						if ($record['user']==$name&&$record['password']==$password&&$s==$code)
						{ 
							$_SESSION['logined']=1;   //判断是否已经登录的依据。
							$_SESSION['user']=$name;
							$_SESSION['ugroup']=$record['ugroup'];
							$_SESSION['password']=$record['password'];
							$_SESSION['uid']=$record['id'];
							if ($record['ugroup']==1)
							header("Location:admin.php?userl=1");
							else 
								header("Location:loginsucc.php?userl=1");
						}
						else if($record['user']==$name&&$record['password']!=$password)
							 header("Location:index_login.php?err=1");
						else if ($record['user']==null)
							 header("Location:index_login.php?err=2");
						else if($s!=$code)
							 header("Location:index_login.php?err=6");
						mysqli_close($conn);
					}	
					else if(empty($name)&&!empty($password))
						  header("Location:index_login?err=3");
					else if(empty($name)&&empty($password))
						  header("Location:index_login?err=4");
					else if(!empty($name)&&empty($password))header("Location:index_login?err=5");
					 

					
?>