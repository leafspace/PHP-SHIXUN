
<!DOCTYPE HTML>
<html>
 <head>
  <title>世纪新闻发布系统后台管理</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
<?php
    session_start();
	if(isset($_SESSION['logined'])&&$_SESSION['logined'])
	{
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
  	$name=$_SESSION['user'];
	$gourp=$_SESSION['ugroup'];
	}
	?>
  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>
 
    <div class="dl-log">欢迎您，管理员:<span class="dl-log-user"><?php echo"$name"?></span><a href="logout.php" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">新闻管理</div></li>       

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bui-min.js"></script>
  <script type="text/javascript" src="assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'个人信息',href:'Node/index.php'},{id:'3',text:'用户管理',href:'user1/index.php'},{id:'4',text:'添加用户',href:'user2/index.php'}]}]},{id:'7',homePage : '9',menu:[{text:'新闻管理',items:[{id:'9',text:'发布新闻',href:'Node/newsindex.php'},{id:'10',text:'新闻列表',href:'Node/newslist.php'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>