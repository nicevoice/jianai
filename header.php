<?php 
	mb_internal_encoding('UTF-8');
	require_once "models/conn.php";
    require_once "models/bag.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>连连图 -- 个性化风格推荐 | 女包 | 男包 | 箱包</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style_showbox.css"/>
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/tabStyle.css" />
        <link rel="stylesheet" type="text/css" href="css/css_menu/pro_dropline_1.css" />
        
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/stuHover.js"></script>
	</head>
	<body>
		<div id="main_container">
			<div class="top_bar" align="center">  
				<div class="nav-bar auto-dropdown">
				    <ul class="nav nav-pills">
                      <li><a href="index.php">首页</a></li>
                      <li class="dropdown" id="nvbao">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#nvbao">
                          女包
                          <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="women.php">女包</a></li>
                          <li class="divider"></li>
                          <li><a href="more.php?tt=wdanjianbao">女士单肩包</a></li>
                          <li><a href="more.php?tt=wxiekuabao">女士斜挎包</a></li>
                          <li><a href="more.php?tt=wshoutibao">女士手提包</a></li>
                          <li><a href="more.php?tt=wshuangjianbao">女士双肩包</a></li>
                          <li><a href="more.php?tt=wshounabao">女士手包</a></li>
                        </ul>
                      </li>
                      <li class="dropdown" id="nanbao">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#nanbao">
                          男包
                          <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="men.php">男包</a></li>
                          <li class="divider"></li>
                          <li><a href="more.php?tt=mdanjianbao">男士单肩包</a></li>
                          <li><a href="more.php?tt=mgongwenbao">男士公文包</a></li>
                          <li><a href="more.php?tt=mqianbao_yaobao">男士钱包</a></li>
                          <li><a href="more.php?tt=mshounabao">男士手包</a></li>
                        </ul>
                      </li>
                      <li class="dropdown" id="xiangbao">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#xiangbao">
                          箱包
                          <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="xiangbao.php">箱包</a></li>
                          <li class="divider"></li>
                          <li><a href="more.php?tt=glaganxiang">拉杆箱</a></li>
                          <li><a href="more.php?tt=glvxingbao">旅行包</a></li>
                          <li><a href="more.php?tt=gyundongbao">运动包</a></li>
                        </ul>
                      </li>
                      <li><a href="history.php">浏览记录及个性推荐</a></li>
                      <li><a href="search.php">搜索</a></li>
                    </ul>
				</div>
				<div>
                    <a href="#"><img src="images/icons/logo.png"/></a>
                </div>
			</div>
			<!-- end of top_bar -->