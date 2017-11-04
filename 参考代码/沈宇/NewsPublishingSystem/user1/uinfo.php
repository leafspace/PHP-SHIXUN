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
include 'conn.php';
$uid=isset($_GET["uid"])?$_GET["uid"]:0;
$sql="select * from user where id='$uid' ";
$result=mysql_query($sql,$conn);
$record=mysql_fetch_array($result);
$user=$record['user'];
$password=$record['password'];
$ugroup=$record['ugroup'];
if ($ugroup==0)$ugroup="会员";else $ugroup="管理员";
$picpath=$record['picpath'];
 
?>
<form action="" method="post" class="definewidth m20">
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">id</td>
            <td> <?php echo"$uid";?></td>
        </tr>
        <tr>
            <td class="tableleft">用户名</td>
            <td><?php echo"$user";?></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><?php if($ugroup=="会员")echo"$password";?></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><?php echo"";?></td>
        </tr>
        <tr>
            <td class="tableleft">头像</td>
            <td>
            <img src="<?php echo"$picpath";?>" style="height:280px;width:200px">
            </td>
        </tr>
        <tr>
            <td class="tableleft">用户组</td>
            <td><?php echo"$ugroup";?></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                 			 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
			window.location.href="index.php";
		 });

    });
</script>