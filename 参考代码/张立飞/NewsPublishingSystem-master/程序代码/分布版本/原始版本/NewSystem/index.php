<!doctype html>
<html lang="zh-CN">
	<head>
		<title>无差别在线新闻</title>
		<meta http-equiv="Content-Type" content="text/html；charset=utf-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="icon" href="images/logo.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="images/logo.ico" type="image/x-icon" />

		<link rel="stylesheet" type="text/css" media="all" href="css/loginstyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/nprogress.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/nprogress.js"></script>
		<script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<!--[if gte IE 9]>
		<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="js/html5shiv.min.js" type="text/javascript"></script>
		<script src="js/respond.min.js" type="text/javascript"></script>
		<script src="js/selectivizr-min.js" type="text/javascript"></script>
		<![endif]-->
		<!--[if lt IE 9]>
		<script>window.location.href='upgrade-browser.html';</script>
		<![endif]-->
	</head>
		<?php
			require_once 'php/Classes/StringHandle.php';
			require_once 'php/Classes/MysqlProxy.php';
			$mysqlProxy = new MysqlProxy();
			$mysqlConnect = $mysqlProxy->connect("MYSQL");
			if (isset($_GET['keyword'])) {
				if (isset($_GET['newstype'])) {
					$sqlStr = "SELECT id, title, time, opened, information, image FROM news WHERE state = 1 AND type='".$_GET['newstype']."' AND title LIKE '%".$_GET['keyword']."%' ORDER BY time DESC;";
				} else {
					$sqlStr = "SELECT id, title, time, opened, information, image FROM news WHERE state = 1 AND title LIKE '%".$_GET['keyword']."%' ORDER BY time DESC;";
				}
				
			} else {
				if (isset($_GET['newstype'])) {
					$sqlStr = "SELECT id, title, time, opened, information, image FROM news WHERE state = 1 AND type='".$_GET['newstype']."' ORDER BY time DESC;";
				} else {
					$sqlStr = "SELECT id, title, time, opened, information, image FROM news WHERE state = 1 ORDER BY time DESC;";
				}
				
			}
			
			$result = $mysqlProxy->query($sqlStr);
			$mysqlProxy->freeResourse();
			$num_rows = $mysqlProxy->getResultNumber($result);
		?>
	<body class="user-select">
		<div id="loginmodal" style="display:none;">
			<h1>用户登陆</h1>
			<form id="loginform" name="loginform" method="post" action="php/login.php">
				<label for="username">用户名:</label>
				<input type="text" name="username" id="username" class="txtfield" tabindex="1">
				<label for="password">密 码:</label>
				<input type="password" name="password" id="password" class="txtfield" tabindex="2">
				<div class="center">
					<input type="button" class="flatbtn-blu hidemodal" value="登 陆" onclick="document.getElementById('loginform').submit();" tabindex="3">
				</div>
			</form>
		</div>

		<header class="header">
			<nav class="navbar navbar-default" id="navbar">
				<div class="container">
					<div class="header-topbar hidden-xs link-border">
						<ul class="site-nav topmenu">
							<li>
								<?php
									if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
										echo "<a>".$_SESSION['username']."</a>";
									} else {
										echo "<a href='#loginmodal' title='登陆' id='modaltrigger' >登陆</a>";
									}
								?>
							</li>
							<li>
								<a href="editNews.php" title="编辑新闻" >
									<i class="fa fa-edit"></i> <span style="color:#00FF00">编辑新闻</span>
								</a>
							</li>
							<li>
								<a href="#" title="RSS订阅" >
									<i class="fa fa-rss"></i> RSS订阅
								</a>
							</li>
						</ul>
						分享最即时的信息
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> 
							<span class="sr-only"></span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1 class="logo hvr-bounce-in"><a href="#" title="无差别在线新闻网"><img src="" alt="无差别在线新闻网"></a></h1>
					</div>
					<div class="collapse navbar-collapse" id="header-navbar">
						<form class="navbar-form visible-xs" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<div class="input-group">
								<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
								<span class="input-group-btn">
									<button class="btn btn-default btn-search" type="submit">搜索</button>
								</span>
							</div>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php">首页</a></li>
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php?newstype=娱乐新闻">娱乐新闻</a></li>
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php?newstype=科技新闻">科技新闻</a></li>
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php?newstype=体育新闻">体育新闻</a></li>
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php?newstype=外国新闻">外国新闻</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<section class="container">
			<div class="content-wrap">
				<div class="content">
					<div id="focusslide" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#focusslide" data-slide-to="0" class="active"></li>
							<li data-target="#focusslide" data-slide-to="1"></li>
							<li data-target="#focusslide" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<a href="#" target="_blank" title="无差别在线新闻网" >
								<img src="images//advertising1.jpg" alt="无差别在线新闻网" class="img-responsive"></a>
							</div>
							<div class="item">
								<a href="#" target="_blank" title="无差别在线新闻网" >
								<img src="images//advertising2.jpg" alt="无差别在线新闻网" class="img-responsive"></a>
							</div>
							<div class="item">
								<a href="#" target="_blank" title="无差别在线新闻网" >
								<img src="images//advertising3.jpg" alt="无差别在线新闻网" class="img-responsive"></a>
							</div>
						</div>
						<a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> 
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">上一个</span>
						</a>
						<a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">下一个</span>
						</a>
					</div>

					<div class="title">
						<div style="float:left">
							<?php
								if (isset($_GET['newstype'])) {
									echo "<h3>".$_GET['newstype']."</h3>";
								} else {
									echo "<h3>最新发布</h3>";
								}
							?>
						</div>
						<div style="float:right">
							分类总数：<?php echo $num_rows; ?>
						</div>
						
					</div>
					<?php
						if ($num_rows % 10 > 0) {
							$pages = $num_rows / 10 + 1;
						} else {
							$pages = $num_rows / 10;
						}
						$pages = floor($pages);

						$index = 1;
						if (isset($_GET['index'])) {
							$index = $_GET['index'];
							if ($index <= 0 || $index > $pages) {
								$index = 1;
							}
						}

						$i = 0;
						while($row = $mysqlProxy->getNext($result)){
							if ($i < ($index -1) * 10 ) {
								$i++;
								continue;
							} else if ($i > ($index * 10 - 1)) {
								break;
							}
							$i++;

							$mysqlProxy = new MysqlProxy();
							$mysqlConnect = $mysqlProxy->connect("MYSQL");
							$sqlStr = "SELECT message, time FROM chat WHERE news_id = ".$row[0].";";
							$chatResult = $mysqlProxy->query($sqlStr);
							$mysqlProxy->freeResourse();
							$num_chat = $mysqlProxy->getResultNumber($chatResult);

							$stringHandle = new StringHandle();
							$imageResourse = "images/deault_big.jpg";
							if ($row[5] != null) {
								$imageResourse = $row[5];
							}
							echo "<article class='excerpt excerpt-1' style=''>";
							echo "<a class='focus' href='newsInfo.php?newsID=".$row[0]."' title='".$row[1]."' target='_blank' >";
							echo "	<img class='thumb' data-original='".$imageResourse."' src='".$imageResourse."' alt='".$row[1]."'  style='display: inline;'>";
							echo "</a>";
							echo "<header>";
							echo "	<a class='cat' title='新闻'>新闻<i></i></a>";
							echo "	<h2><a href='newsInfo.php?newsID=".$row[0]."' title='' target='_blank'>".$row[1]."</a></h2>";
							echo "</header>";
							echo "<p class='meta'>";
							echo "	<time class='time'><i class='glyphicon glyphicon-time'></i> ".$row[2]."</time>";
							echo "	<span class='views'><i class='glyphicon glyphicon-eye-open'></i> ".$row[3]."</span> ";
							echo "	<a class='comment' title='评论' target='_blank' ><i class='glyphicon glyphicon-comment'></i> ".$num_chat."</a>";
							echo "</p>";
							echo "<p class='note'>".$stringHandle->findDivText($row[4])."</p>";
							echo "</article>";
						}
					?>

					<nav class="pagination" >
						<ul>
							<?php
								if ($index <= 1) {
									echo "<li class='prev-page'><span>上一页</span></li>";
								} else {
									if (isset($_GET['newstype'])) {
										echo "<li class='prev-page'><a href='index.php?index=".($index - 1)."&newstype=".$_GET['newstype']."'><span>上一页</span></a></li>";
									} else {
										echo "<li class='prev-page'><a href='index.php?index=".($index - 1)."'><span>上一页</span></a></li>";
									}
									
								}
								
								for ($i = $index - 3; $i <= $index + 3; $i++) {
									if ($i == $index) {
										echo "<li class='active'><span>".$index."</span></li>";
									} else {
										if ($i > 0 && $i <= $pages) {
											if (isset($_GET['newstype'])) {
												echo "<li><a href='index.php?index=".$i."&newstype=".$_GET['newstype']."'><span>".$i."</span></a></li>";
											} else {
												echo "<li><a href='index.php?index=".$i."'><span>".$i."</span></a></li>";
											}
											
										}
									}
								}

								if ($index >= $pages) {
									echo "<li class='next-page'><span>下一页</span></li>";
								} else {
									if (isset($_GET['newstype'])) {
										echo "<li class='next-page'><a href='index.php?index=".($index + 1)."&newstype=".$_GET['newstype']."'><span>下一页</span></a></li>";
									} else {
										echo "<li class='next-page'><a href='index.php?index=".($index + 1)."'><span>下一页</span></a></li>";
									}
									
								}
								echo "<li><span>共 ".$pages." 页</span></li>";
							?>
						</ul>
					</nav>
				</div>
			</div>

			<aside class="sidebar">
				<div class="fixed">
					<div class="widget widget_search">
						<form class="navbar-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
							<div class="input-group">
								<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
								<span class="input-group-btn">
									<button class="btn btn-default btn-search" type="submit">搜索</button>
								</span>
							</div>
						</form>
					</div>
				</div>
				<?php
					$mysqlProxy = new MysqlProxy();
					$mysqlConnect = $mysqlProxy->connect("MYSQL");
					$sqlStr = "SELECT news_id, message, time FROM chat ORDER BY time DESC;";
					$result = $mysqlProxy->query($sqlStr);
					$mysqlProxy->freeResourse();
					$num_rows = $mysqlProxy->getResultNumber($result);
					if ($num_rows > 5) {
						$num_rows = 5;
					}
				?>
				<div class="widget widget_hot">
					<h3>最新评论文章</h3>
					<ul>
						<?php
							$i = 0;
							while($row = $mysqlProxy->getNext($result)){
								$mysqlProxy = new MysqlProxy();
								$mysqlConnect = $mysqlProxy->connect("MYSQL");
								$sqlStr = "SELECT title, image FROM news WHERE id = ".$row[0].";";
								$son_result = $mysqlProxy->query($sqlStr);
								$mysqlProxy->freeResourse();
								$son_row = $mysqlProxy->getNext($son_result);

								$imageResourse = "images/deault_big.jpg";
								if ($son_row[1] != null) {
									$imageResourse = $son_row[1];
								}

								echo "<li>";
								echo "	<a title='".$son_row[0]."' href='newsInfo.php?newsID=".$row[0]."' >";
								echo "		<span class='thumbnail'>";
								echo "			<img class='thumb' data-original='".$imageResourse."' src='".$imageResourse."' alt='".$son_row[0]."'  style='display: block;'>";
								echo "		</span>";
								echo "		<span class='text'>".$row[1]."</span>";
								echo "		<span class='muted'><i class='glyphicon glyphicon-time'></i>"." ".$row[2]."</span>";
								echo "		<span class='muted'><i class='glyphicon glyphicon-eye-open'></i>"." ".rand(10, 100)."</span>";
								echo "	</a>";
								echo "</li>";

								if (++$i == 10) {
									break;
								}
							}
						?>
					</ul>
				</div>
				<div class="widget widget_sentence">
					<h3>友情链接</h3>
					<div class="widget-sentence-link">
						<a href="https://www.ithome.com/" title="IT之家" target="_blank" >IT之家</a>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="widget-sentence-link">
						<a href="http://www.geekpark.net/" title="极客公园" target="_blank" >极客公园</a>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="widget-sentence-link">
						<a href="http://www.pcbeta.com/" title="远景在线" target="_blank" >远景在线</a>&nbsp;&nbsp;&nbsp;
					</div>
					<div class="widget-sentence-link">
						<a href="http://www.chinamac.com/" title="苹果在线" target="_blank" >苹果在线</a>&nbsp;&nbsp;&nbsp;
					</div>
				</div>
			</aside>
		</section>

		<footer class="footer">
			<div class="container"><p>Copyright &copy; 2016.Company name All rights reserved.<a href="#">在线新闻提交系统</a></p></div>
			<div id="gotop"><a class="gotop"></a></div>
		</footer>
	</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.ias.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" type="text/javascript">
		$(function(){
			$('#loginform').submit(function(e){
				return false;
			});
			$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
		});
	</script>
</html>
