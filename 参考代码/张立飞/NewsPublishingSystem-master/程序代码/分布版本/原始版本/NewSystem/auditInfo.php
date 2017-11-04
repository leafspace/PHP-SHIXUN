<!doctype html>
<html lang="zh-CN">
	<head>
		<title>无差别在线新闻</title>
		<link rel="stylesheet" type="text/css" href="css/froala_editor.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.4.6.0.css">
		<style>
			body { text-align: center; }
			section { width: 80%; margin: auto; text-align: left; }
			.button { width: 80px; height: 40px; margin-right: 10px; float: right; color: #ffffff; background-color: #009100; line-height: 40px; text-align: center; }
			.button:hover{ background:#00EC00; }
		</style>
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
		<script type="text/javascript">
			var isCheckAll = false;  
			function swapCheck() {  
				if (isCheckAll) {  
					$("input[type='checkbox']").each(function() {  
						this.checked = false;  
					});  
					isCheckAll = false;  
				} else {  
					$("input[type='checkbox']").each(function() {  
						this.checked = true;  
					});  
					isCheckAll = true;  
				} 
			}  
    	</script> 
	</head>
		<?php
			if (isset($_GET['sid'])) {
				session_id($_GET['sid']);
				$sid = session_id();
			}
			
			$username = "";
			if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
				$sid = "asfsafsa";
				$id = $_SESSION['id'];
				$username = $_SESSION['username'];
			} else if (!empty($_COOKIE["id"]) && !empty($_COOKIE['username'])) {
				$sid = "asfsafsa";
				$id = $_COOKIE['id'];
				$username = $_COOKIE['username'];
			} else {
				$url = "index.php";
				#Header("Location: $url"); 
				#exit;
			}
		?>
	<body>
		<header class="header">
			<nav class="navbar navbar-default" id="navbar">
				<div class="container">
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
						<form class="navbar-form visible-xs" action="/Search" method="post">
							<div class="input-group">
								<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
								<span class="input-group-btn">
									<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
								</span> 
							</div>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<?php echo "<li><a>$username</a></li>"; ?>
							<li><a data-cont="无差别在线新闻网" title="无差别在线新闻网" href="index.php">首页</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<section id="editor" style="margin:0 auto;">
			<table border=1; style="width:100%;  ">
				<form id="auditForm" action="php/audit.php" method="post">
					<input type="hidden" name="sid" value="<?php echo $sid; ?>">
					<tr>
						<th style="text-align:center; "><input type="checkbox" onclick="swapCheck()" /></th>
						<th style="text-align:center; ">ID</th>
						<th>新闻</th>
						<th>发表时间</th>
						<th style="text-align:center; ">审核状态</th>
					</tr>
					<?php
						require_once 'php/Classes/MysqlProxy.php';
					    $mysqlProxy = new MysqlProxy();
					    $mysqlConnect = $mysqlProxy->connect("MYSQL");
					    $sqlStr = "SELECT id, title, time FROM news WHERE state = 0;";
					    $result = $mysqlProxy->query($sqlStr);
						if ($result === false) {
							exit;
						}

						while($row = $mysqlProxy->getNext($result)){
							echo "<tr>";
							echo "<td style='text-align:center;'><input name='choice[]' type='checkbox' value='".$row[0]."' /></td>";
							echo "	<td style='text-align:center;'>".$row[0]."</td>";
							echo "	<td>".$row[1]."</td>";
							echo "	<td>".$row[2]."</td>";
							echo "	<td style='text-align:center;'>";
							echo "		<select name='audit".$row[0]."'> ";
							echo "			<option value='1'>同意</option>";
							echo "			<option value='-1'>拒绝</option>";
							echo "		</select>";
							echo "	</td>";
							echo "</tr>";
						}
						$mysqlProxy->freeResourse();
					?>
				</form>
			</table>
			<div style="width:100%; height: 60px; margin-top: 10px;">
				<div class="button" onclick="document.getElementById('auditForm').submit();">提交</div>
			</div>
		</section>

		<footer class="footer" style="position: fixed; bottom: 0; width: 100%; ">
			<div class="container"><p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="index.php">在线新闻提交系统</a></p></div>
			<div id="gotop"><a class="gotop"></a></div>
		</footer>
	</body>

	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/froala_editor.min.js"></script>
	<!--[if lt IE 9]>
	<script src="../js/froala_editor_ie8.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/plugins/tables.min.js"></script>
	<script type="text/javascript" src="js/plugins/lists.min.js"></script>
	<script type="text/javascript" src="js/plugins/colors.min.js"></script>
	<script type="text/javascript" src="js/plugins/media_manager.min.js"></script>
	<script type="text/javascript" src="js/plugins/font_family.min.js"></script>
	<script type="text/javascript" src="js/plugins/font_size.min.js"></script>
	<script type="text/javascript" src="js/plugins/block_styles.min.js"></script>
	<script type="text/javascript" src="js/plugins/video.min.js"></script>

	<script>
		$(function(){
			$('#edit').editable({inlineMode: false, alwaysBlank: true})
		});
	</script>
</html>
