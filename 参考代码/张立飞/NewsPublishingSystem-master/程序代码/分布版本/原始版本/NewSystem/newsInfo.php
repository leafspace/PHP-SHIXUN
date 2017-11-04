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
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/nprogress.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/nprogress.js"></script>
		<script type="text/javascript" src="js/jquery.lazyload.min.js"></script>

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
			require_once 'php/Classes/MysqlProxy.php';
			if (!isset($_GET['newsID'])) {
				$url = "index.php";
				Header("Location: $url"); 
			}
			$newsID = $_GET['newsID'];
		?>
	<body class="user-select single">
		<header class="header">
			<nav class="navbar navbar-default" id="navbar">
				<div class="container">
					<div class="header-topbar hidden-xs link-border">
						<ul class="site-nav topmenu">
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
						<form class="navbar-form visible-xs" action="index.php" method="post">
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

		<?php
			$mysqlProxy = new MysqlProxy();
			$mysqlConnect = $mysqlProxy->connect("MYSQL");
			$sqlStr = "UPDATE news SET opened = opened + 1 WHERE id = ".$newsID.";";
			$result = $mysqlProxy->query($sqlStr);
			$mysqlProxy->freeResourse();

			$mysqlProxy = new MysqlProxy();
			$mysqlConnect = $mysqlProxy->connect("MYSQL");
			$sqlStr = "SELECT title, time, opened, information, image, type, username FROM news WHERE id = ".$newsID.";";
			$result = $mysqlProxy->query($sqlStr);
			$mysqlProxy->freeResourse();
			$row = $mysqlProxy->getNext($result);

			$mysqlProxy = new MysqlProxy();
			$mysqlConnect = $mysqlProxy->connect("MYSQL");
			$sqlStr = "SELECT message, time FROM chat WHERE news_id = ".$newsID." ORDER BY time DESC;";
			$result = $mysqlProxy->query($sqlStr);
			$mysqlProxy->freeResourse();
			$num_chat = $mysqlProxy->getResultNumber($result);
		?>
		<section class="container">
			<div class="content-wrap">
				<div class="content">
					<header class="article-header">
						<h1 class="article-title"><a href="#" title="<?php echo $row[0]; ?>" ><?php echo $row[0]; ?></a></h1>
						<div class="article-meta">
							<span class="item article-meta-time">
								<time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：<?php echo $row[1]; ?>">
									<i class="glyphicon glyphicon-time"></i> <?php echo $row[1]; ?>
								</time>
							</span> 
							<span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：无差别在线新闻网">
								<i class="glyphicon glyphicon-globe"></i> 无差别在线新闻网
							</span> 
							<span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="即时新闻">
								<i class="glyphicon glyphicon-list"></i> 
								<a href="#" title="即时新闻" ><?php echo $row[5]; ?></a>
							</span> 
							<span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：<?php echo $row[2]; ?>">
								<i class="glyphicon glyphicon-eye-open"></i> <?php echo $row[2]; ?>
							</span> 
							<span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量">
								<i class="glyphicon glyphicon-comment"></i> <?php  echo $num_chat?>
							</span> 
						</div>
					</header>

					<?php
						$imageResourse = "images/advertising2.jpg";
						if ($row[4] != null) {
							$imageResourse = $row[4];
						}
					?>
					<article class="article-content">
						<p><img data-original="<?php echo $imageResourse; ?>" src="<?php echo $imageResourse; ?>" alt="" /></p>
						<div class="prettyprint lang-cs">
							<?php echo $row[3]; ?>
						</div>
					</article>
					<div class="article-tags">
						标签：
						<a href="#list/3/" rel="tag" >无差别在线新闻网</a>
						<a href="#list/4/" rel="tag" ><?php echo $row[5]; ?></a>
						<a href="#list/5/" rel="tag" ><?php  echo $row[6] ?></a>
					</div>
					<div class="relates">
						<div class="title"><h3>相关推荐</h3></div>
						<ul>
							<?php
								$mysqlProxy = new MysqlProxy();
								$mysqlConnect = $mysqlProxy->connect("MYSQL");
								$sqlStr = "SELECT id, title FROM news ORDER BY time DESC;";
								$result = $mysqlProxy->query($sqlStr);
								$mysqlProxy->freeResourse();

								$i = 0;
								while($row = $mysqlProxy->getNext($result)){
									echo "<li><a href='newInfo.php?newsID=".$row[0]."' title='".$row[1]."' >".$row[1]."</a></li>";
									if (++$i == 5) {
										break;
									}
								}
							?>
						</ul>
					</div>
					<div class="title" id="comment">
						<h3>评论</h3>
					</div>
					<div id="respond">
						<form id="comment-form" name="comment-form" action="php/comment.php" method="post">
							<div class="comment">
								<input type="hidden" name="newsID" value="<?php echo $newsID;?>" >
								<input name="username" id="" class="form-control" size="22" placeholder="您的昵称" maxlength="15" autocomplete="off" tabindex="1" type="text">
								<input name="email" id="" class="form-control" size="22" placeholder="您的网址或邮箱（非必填）" maxlength="58" autocomplete="off" tabindex="2" type="text">
								<div class="comment-box">
									<textarea placeholder="您的评论或留言（必填）" name="comment-textarea" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
									<div class="comment-ctrl">
										<div class="comment-prompt" style="display: none;"> 
											<i class="fa fa-spin fa-circle-o-notch"></i> 
											<span class="comment-prompt-text">评论正在提交中...请稍后</span> 
										</div>
										<div class="comment-success" style="display: none;"> 
											<i class="fa fa-check"></i> 
											<span class="comment-prompt-text">评论提交成功...</span> 
										</div>
										<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div id="postcomments">
						<ol id="comment_list" class="commentlist">
							<?php
								$mysqlProxy = new MysqlProxy();
								$mysqlConnect = $mysqlProxy->connect("MYSQL");
								$sqlStr = "SELECT message, time, username FROM chat WHERE news_id = ".$newsID." ORDER BY time DESC;";
								$result = $mysqlProxy->query($sqlStr);
								$mysqlProxy->freeResourse();

								$i = $mysqlProxy->getResultNumber($result);
								while($row = $mysqlProxy->getNext($result)){
									echo "<li class='comment-content'>";
									echo "	<span class='comment-f'>#".$i--."</span>";
									echo "	<div class='comment-main'>";
									echo "		<p>";
									echo "			<a class='address' href='#' rel='nofollow' target='_blank'>".$row[2]."</a>";
									echo "			<span class='time'>".$row[1]."</span><br>";
									echo "			".$row[0]."";
									echo "		</p>";
									echo "	</div>";
									echo "</li>";
								}

							?>
						</ol>
					</div>
				</div>
			</div>

			<aside class="sidebar">
				<div class="fixed">
					<div class="widget widget_search">
						<form class="navbar-form" action="index.php" method="get">
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
								echo "			<img class='thumb' data-original='".$imageResourse."' src='".$imageResourse."' alt='".$son_row['title']."'  style='display: block;'>";
								echo "		</span>";
								echo "		<span class='text'>".$row[1]."</span>";
								echo "		<span class='muted'><i class='glyphicon glyphicon-time'></i>".$row[2]."</span>";
								echo "		<span class='muted'><i class='glyphicon glyphicon-eye-open'></i>".rand(10, 100)."</span>";
								echo "	</a>";
								echo "</li>";
							}
						?>
						
					</ul>
				</div>
			</aside>
		</section>

		<footer class="footer">
			<div class="container"><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="index.php">在线新闻提交系统</a></p></div>
			<div id="gotop"><a class="gotop"></a></div>
		</footer>
	</body>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.ias.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</html>
