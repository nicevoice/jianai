<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>荐爱网: 所荐即所爱</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="css/menu2.css" />
		<link rel="stylesheet" type="text/css" href="include/style/tabStyle.css" />
		<script type="text/javascript" src="include/style/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="include/style/ui.tab.js"></script>

		<script type="text/javascript">
			function displaySubMenu(li) {
				var subMenu = li.getElementsByTagName("ul")[0];
				subMenu.style.display = "block";
			}

			function hideSubMenu(li) {
				var subMenu = li.getElementsByTagName("ul")[0];
				subMenu.style.display = "none";
			}
		</script>

	</head>

	<?php
	session_start();
	?>

	<body>

		<div id="top_navigation"></div>

		<div id="main_container">

			<div class="top_bar">
				<div class="top_search_2">
					<div class="search_text_2">
						<span class="search_text_2">荐爱网 www.jian-ai.cn：所荐即所爱</span>
					</div>
				</div>
				<div class="top_search">
					<div class="search_text">
						<a href="#">登录/注册</a>
					</div>
					<div class="search_text">
						<a href="#">搜索包包</a>
					</div>
				</div>
			</div><!-- end of top_bar -->

			<div id="main_content">

				<div id="navigation_menu" style="width:1000px; height:31px;background-color:#EAEAEA;">
					<ul id="navigation">
						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">首页</a>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">女包</a>
							<ul>
								<li>
									<a href="#">单肩包</a>
								</li>
								<li>
									<a href="#">斜跨包</a>
								</li>
								<li>
									<a href="#">手提包</a>
								</li>
								<li>
									<a href="#">双肩包</a>
								</li>
							</ul>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">男包</a>
							<ul>
								<li>
									<a href="#">公文包</a>
								</li>
								<li>
									<a href="#">休闲包</a>
								</li>
							</ul>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">功能箱包</a>
							<ul>
								<li>
									<a href="#">旅行包</a>
								</li>
								<li>
									<a href="#">电脑包</a>
								</li>
								<li>
									<a href="#">拉杆箱</a>
								</li>
								<li>
									<a href="#">运动包</a>
								</li>
								<li>
									<a href="#">登山包</a>
								</li>
							</ul>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">钱包/手包</a>
							<ul>
								<li>
									<a href="#">女款钱包</a>
								</li>
								<li>
									<a href="#">男款钱包</a>
								</li>
								<li>
									<a href="#">女款手包</a>
								</li>
								<li>
									<a href="#">男款手包</a>
								</li>
							</ul>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">奢侈品</a>
						</li>

						<li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)">
							<a href="#">团购包</a>
							<ul>
								<li>
									<a href="#">菜单1</a>
								</li>
								<li>
									<a href="#">菜单2</a>
								</li>
								<li>
									<a href="#">菜单3</a>
								</li>
								<li>
									<a href="#">菜单4</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
				<!-- end of navigation menu   -->

				<div class="crumb_navigation">
					您当前的位置: <span class="current">首页</span>

				</div>

				<div class="left_content">
					<div class="title_box">
						来源商家
					</div>

					<ul class="left_menu">
						<li class="odd">
							<a href="services.html">麦包包</a>
						</li>
						<li class="even">
							<a href="services.html">当当网</a>
						</li>
						<li class="odd">
							<a href="services.html">京东网</a>
						</li>
						<li class="even">
							<a href="services.html">淘宝商城</a>
						</li>
						<li class="odd">
							<a href="services.html">卓越亚马逊</a>
						</li>
						<li class="even">
							<a href="services.html">凡客诚品</a>
						</li>
						<li class="odd">
							<a href="services.html">梦芭莎</a>
						</li>
						<li class="even">
							<a href="services.html">银泰</a>
						</li>
						<li class="odd">
							<a href="services.html">尊酷网</a>
						</li>
						<li class="even">
							<a href="services.html">爱上包包网</a>
						</li>
						<li class="odd">
							<a href="services.html">新浪奢品</a>
						</li>
						<li class="even">
							<a href="services.html">走秀网</a>
						</li>
					</ul>

					<div class="title_box">
						您的收藏
					</div>
					<div class="border_box">
						<div class="collect_img">
							<a href="details.html"> <img src="prod_img/2.jpg" width="90" height="90" border="0" /></a>
						</div>
					</div>

					<div class="border_box">
						<div class="collect_img">
							<a href="details.html"> <img src="prod_img/2.jpg" width="90" height="90" border="0" /></a>
						</div>
					</div>

					<div class="border_box">
						<div class="collect_img">
							<a href="details.html"> <img src="prod_img/2.jpg" width="90" height="90" border="0" /></a>
						</div>
					</div>

					<div class="border_box">
						<div class="collect_img">
							<a href="details.html"> <img src="prod_img/2.jpg" width="90" height="90" border="0" /></a>
						</div>
					</div>

					<div class="banner_adds"></div>

				</div><!-- end of left content -->

				<div class="center_content">
					<div class="center_title_bar">
						输入图像 个性化推荐
					</div>

					<div class="prod_box_big">
						<div class="top_prod_box_big"></div>
						<div class="center_prod_box_big">
							<table width="250" border="1" align="center" cellpadding="5" cellspacing="5">
								<tr>
									<td>用户名：</td>
									<td>
									<input type="text" name="textfield" id="textfield" />
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>密码：</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>重复密码：</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>
									<input type="submit" name="button" id="button" value="提交" />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="button" name="button2" id="button2" value="重填" />
									</td>
									<td>&nbsp;</td>
								</tr>
							</table>

						</div>
						<div class="bottom_prod_box_big"></div>
					</div>

				</div><!-- end of main content -->

				<div class="footer">
					<div class="left_footer">
						<a href="index.html">首页</a>
						<a href="details.html">关于我们</a>
						<a href="details.html">联系我们</a>
						<a href="details.html">广告服务</a>
						<a href="contact.html">诚聘英才</a>
					</div>
				</div>

			</div>
			<!-- end of main_container -->
	</body>
</html>