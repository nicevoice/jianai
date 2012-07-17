<?php 
	mb_internal_encoding('UTF-8');
	require "conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>飘丝带：个性化风格推荐</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style_showbox.css"/>
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/tabStyle.css" />
        <link rel="stylesheet" type="text/css" href="css/css_menu/pro_dropline_1.css" />
        
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="css/css_menu/stuHover.js"></script>
	</head>
	<body>
		<div id="main_container">
			<div class="top_bar" style="height:90px;margin: 5px 0 10px 0">
				<div class="top_menu">
					<div id="nav">
						<ul class="select">
							<li><a href="index.php"><b>首页</b></a></li>
							<li>
								<a href="women.php"><b>女包</b></a>
								<ul class="sub">
									<li><a href="more.php?tt=wdanjianbao">单肩包</a></li>
									<li><a href="more.php?tt=wxiekuabao">斜挎包</a></li>
									<li><a href="more.php?tt=wshoutibao">手提包</a></li>
									<li><a href="more.php?tt=wshounabao">手拿包</a></li>
									<li><a href="more.php?tt=wshuangjianbao">双肩包</a></li>
								</ul>
							</li>
							<li>
								<a href="men.php"><b>男包</b></a>
								<ul class="sub">
									<li><a href="more.php?tt=mdanjianbao">单肩包</a></li>
									<li><a href="more.php?tt=mgongwenbao">公文包</a></li>
									<li><a href="more.php?tt=mqianbao_yaobao">钱包</a></li>
									<li><a href="more.php?tt=mshounabao">手拿包</a></li>
								</ul>
							</li>
							<li>
								<a href="xiangbao.php"><b>箱包</b></a>
								<ul class="sub">
									<li><a href="more.php?tt=glaganxiang">拉杆箱</a></li>
									<li><a href="more.php?tt=glvxingbao">旅行包</a></li>
									<li><a href="more.php?tt=gyundongbao">运动包</a></li>
								</ul>
							</li>
							<li>
								<a href="search.php"><b>搜索</b></a>
								<li><a href="precomm.php"><b>浏览记录及推荐</b></a></li>
						</ul>
					</div>
				</div>
				<a href="index.php"><img src="images/icons/logo.png"/></a>
			</div>
			<!-- end of top_bar -->