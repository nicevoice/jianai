<?php ob_start();
// 解决cookie问题
mb_internal_encoding('UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>荐爱网: 所荐即所爱</title>
		<link rel="stylesheet" type="text/css" href="css/style_similar.css" />
		<link rel="stylesheet" type="text/css" href="css/menu2.css" />
		<link rel="stylesheet" media="all" type="text/css" href="css/css_menu/pro_dropline_1.css" />
		<script src="css/css_menu/stuHover.js" type="text/javascript"></script>

		<script language="javascript">
			function checkstr(id, str, digit) {
				var n = 0;
				var ss = '';

				for ( i = 0; i < str.length; i++) {
					var leg = str.charCodeAt(i);
					if (leg > 255) {
						n += 2;
					} else {
						n += 1;
					}
				}
				if (n > digit)
					ss = str.substr(0, digit) + '...';
				else
					ss = str;

				document.getElementById(id).innerHTML = ss;
			}

		</script>

	</head>

	<body>
		<?php
		if (isset($_GET['type'])) {
			$bagtype = $_GET['type'];
			$bagID = $_GET['id'];
		} else
			die('不能直接访问该页面');

		require "conn.php";
		?>

		<div id="top_navigation"></div>

		<div id="main_container">
			<div class="top_bar">
				<div class="top_menu">
					<div id="nav">
						<ul class="select">
							<li>
								<a href="index.php"><b>首页</b></a>
							</li>
							<li>
								<a href="women.php"><b>女包</b></a>
								<ul class="sub">
									<li>
										<a href="more.php?tt=wdanjianbao">单肩包</a>
									</li>
									<li>
										<a href="more.php?tt=wxiekuabao">斜挎包</a>
									</li>
									<li>
										<a href="more.php?tt=wshoutibao">手提包</a>
									</li>
									<li>
										<a href="more.php?tt=wshounabao">手拿包</a>
									</li>
									<li>
										<a href="more.php?tt=wshuangjianbao">双肩包</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="men.php"><b>男包</b></a>
								<ul class="sub">
									<li>
										<a href="more.php?tt=mdanjianbao">单肩包</a>
									</li>
									<li>
										<a href="more.php?tt=mgongwenbao">公文包</a>
									</li>
									<li>
										<a href="more.php?tt=mqianbao_yaobao">钱包</a>
									</li>
									<li>
										<a href="more.php?tt=mshounabao">手拿包</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="xiangbao.php"><b>箱包</b></a>
								<ul class="sub">
									<li>
										<a href="more.php?tt=glaganxiang">拉杆箱</a>
									</li>
									<li>
										<a href="more.php?tt=glvxingbao">旅行包</a>
									</li>
									<li>
										<a href="more.php?tt=gyundongbao">运动包</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="search.php"><b>搜索</b></a>
								<li>
									<a href="precomm.php"><b>个性化服务</b></a>
						</ul>
					</div>
				</div>

				<img src="images/logo.jpg" style="padding:5px 0 0 360px"/>
			</div><!-- end of top_bar -->

			<div id="main_content">

				<div class="left_content">
					<div class="title_box">
						选中的包包
					</div>
					<img src="images/bar_bg_4.jpg" width="196" height="10" style="padding:0px" />
					<?php $mall = array('1001' => '麦包包', '1002' => '京东商城', '1003' => '亚马逊', '1004' => '走秀网', '1005' => '银泰网', '1006' => '凡客诚品', '1007' => '当当网', '1008' => '天猫商城', '1009' => '尊酷网', '1010' => '梦芭莎', '1011' => '新浪商城', '1012' => '爱上包包网');

					$sql_selected = 'select * from ' . $bagtype . ' where bagID=' . $bagID;
					$query_selected = mysql_query($sql_selected, $con);
					$row_selected = mysql_fetch_row($query_selected);

					//echo ' <img src="prod_img/'.$bagtype.'/'.$row_selected[0].'.jpg" width="190"/>';
					echo '<img src="' . $row_selected[4] . '" width="190"/>';
					echo '<div class="product_info"><ul> <li>' . $row_selected[1] . '</li>';
					echo '<li>价格：<span class="price">&yen;' . $row_selected[2] . '</span></li>';
					echo '<li>商家：' . $mall[$row_selected[6]] . '</li>';
					echo '</ul></div>';
					echo '<a class="button2" href="' . $row_selected[3] . '"  target="_blank"><span>去商城看看</span></a>';

					// 设置cookie
					if (isset($_COOKIE['browsed_bag_num'])) {
						$num = $_COOKIE['browsed_bag_num'];
						$cookieValue = $bagtype . '@' . $row_selected[4];

						$flag = 0;
						$count = 1;
						for ($i = $num; $i >= 1; $i--)//检查是否有重复选择
						{
							$name = 'browsed_bag_info_' . $i;
							if (isset($_COOKIE[$name])) {
								if ($_COOKIE[$name] == $cookieValue) {
									$flag = 1;
									break;
								}
							}
							$count++;
							if ($count >= 6)//cookie的数量
								break;
						}// end for

						if ($flag == 0)//没有重复选择
						{
							$num = $num + 1;
							$cookieName = 'browsed_bag_info_' . $num;
							setcookie('browsed_bag_num', $num, time() + 300);
							// cookie的时间
							setcookie($cookieName, $cookieValue, time() + 300);
						} // end if
					} else//如果浏览的包包只有一个
					{
						$cookieName = 'browsed_bag_info_1';
						$cookieValue = $bagtype . '@' . $row_selected[4];
						setcookie('browsed_bag_num', 1, time() + 300);
						setcookie($cookieName, $cookieValue, time() + 300);
					}
					?>

					<!-- 浏览过的包 -->
					<div>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>

					<table width="196" border="0" align="center" cellpadding="1" cellspacing="0" style="padding:10px 0px 0px 0px">
						<tr>
							<td class="title_box_like">浏览过的包包</td>
						</tr>
						<tr>
							<td align="left"><img src="images/bar_bg_4.jpg" width="196" height="10" style="padding:0px; margin:0px" /></td>
						</tr>
					</table>
					<?php
					if (isset($_COOKIE['browsed_bag_num'])) {
						$num = $_COOKIE['browsed_bag_num'];
						$count = 1;
						for ($i = $num; $i >= 1; $i--) {
							$cookieName = 'browsed_bag_info_' . $i;
							if (isset($_COOKIE[$cookieName])) {
								$browsed_info = explode("@", $_COOKIE[$cookieName]);
								$browsed_type = $browsed_info[0];
								$browsed_URL = $browsed_info[1];

								//检查cookie是否在更新的数据库中
								$sql_browsed = "select * from " . $browsed_type . " where bagImgURL='" . $browsed_URL . "'";
								$query_browsed = mysql_query($sql_browsed, $con) or die("Invalid query: " . mysql_error());

								if (mysql_num_rows($query_browsed))//如果cookie没有下架
								{
									$row_browsed = mysql_fetch_row($query_browsed);
									echo '<a href="similarbag.php?type=' . $browsed_type . '&id=' . $row_browsed[0] . '">';
									//echo '<img src="prod_img/'.$browsed_type.'/'.$row_browsed[0].'.jpg" title="'. $row_browsed[1].'" width="90" height="90"  border=0/>';
									echo '<img src="' . $row_browsed[4] . '" title="' . $row_browsed[1] . '" width="90" height="90"  border=0/>';
									echo '</a>';
									$count++;
								}
							}// end  if(isset($_COOKIE[$cookieName]))

							if ($count >= 7)
								break;
						} // end for
					} // end if
					?>
				</div><!-- end of left content -->

				<div class="center_content">
					<div class="center_title_bar">
						款式相似的包包
					</div>
					<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />

					<?php //检索相似的包包的ID
					$sql = 'select * from similar_' . $bagtype . '  where bagID=' . $bagID;
					$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error());
					$row = mysql_fetch_row($query);

					//显示款式相似的包包
					$root = 'prod_img/' . $bagtype . '/';

					for ($k = 1; $k <= 15; $k++) {
						$sql_lbp = 'select * from ' . $bagtype . ' where bagID=' . $row[$k];

						$query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error());
						$row_lbp = mysql_fetch_row($query_lbp);

						$path = $root . $row_lbp[0] . '.jpg';
						$imgID = 'imgID_' . $k;
						$imgPath = '<img id="' . $imgID . '" src="' . $row_lbp[4];
						$imgPath = $imgPath . '"  border=0 width="148px" height="148px"/>';
						echo '<div class="prod_box">';
						echo '<div class="product_img"><a href="similarbag.php?type=' . $bagtype . '&id=' . $row_lbp[0] . '">';
						echo $imgPath;
						echo '<span class="www_zzjs_net"><ul>';
						echo '<li id="lbpTitle' . $k . '"></li>';
						echo '<li>价格：&yen;' . $row_lbp[2] . '</li><li>商家：' . $mall[$row_lbp[6]] . '</li>';
						echo '</ul></span></a></div>';
						echo '<div class="bottom_prod_box"></div>';
						echo '</div>';
						echo '<script> checkstr(\'lbpTitle' . $k . '\',\'' . $row_lbp[1] . '\',22);</script>';
					} // end while
					?>

					<div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
					</div>
					<div class="center_title_bar">
						颜色相似的包包
					</div>
					<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />
					<?php
					for ($k = 16; $k <= 30; $k++) {
						$sql_hsv = 'select * from ' . $bagtype . ' where bagID=' . $row[$k];
						$query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error());
						$row_hsv = mysql_fetch_row($query_hsv);

						$path = $root . $row_hsv[0] . '.jpg';
						$imgID = 'imgID_' . $k;
						$imgPath = '<img id="' . $imgID . '" src="' . $row_hsv[4];
						$imgPath = $imgPath . '"  border=0 width="148px" height="148px" />';
						echo '<div class="prod_box">';
						echo '<div class="product_img"><a href="similarbag.php?type=' . $bagtype . '&id=' . $row_hsv[0] . '">';
						echo $imgPath;
						echo '<span class="www_zzjs_net"><ul>';
						echo '<li id="hsvTitle' . $k . '"></li>';
						echo '<li>价格：&yen;' . $row_hsv[2] . '</li><li>商家：' . $mall[$row_hsv[6]] . '</li>';
						echo '</ul></span></a></div>';
						echo '<div class="bottom_prod_box"></div>';
						echo '</div>';
						echo '<script> checkstr(\'hsvTitle' . $k . '\',\'' . $row_lbp[1] . '\',22);</script>';
					} // end while
					?>

					<div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
					</div>
					<div class="center_title_bar">
						你还可能喜欢的包包
					</div>
					<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />
					<?php
					for ($k = 31; $k <= 40; $k++) {
						$sql_com = 'select * from ' . $bagtype . ' where bagID=' . $row[$k];
						$query_com = mysql_query($sql_com, $con) or die("Invalid query: " . mysql_error());
						$row_com = mysql_fetch_row($query_com);

						$path = $root . $row_com[0] . '.jpg';
						$imgID = 'imgID_' . $k;
						$imgPath = '<img id="' . $imgID . '" src="' . $row_com[4];
						$imgPath = $imgPath . '"  border=0 width="148px" height="148px"/>';
						echo '<div class="prod_box">';
						echo '<div class="product_img"><a href="similarbag.php?type=' . $bagtype . '&id=' . $row_com[0] . '">';
						echo $imgPath;
						echo '<span class="www_zzjs_net"><ul>';
						echo '<li id="comTitle' . $k . '"></li>';
						echo '<li>价格：&yen;' . $row_com[2] . '</li><li>商家：' . $mall[$row_com[6]] . '</li>';
						echo '</ul></span></a></div>';
						echo '<div class="bottom_prod_box"></div>';
						echo '</div>';
						echo '<script> checkstr(\'comTitle' . $k . '\',\'' . $row_lbp[1] . '\',22);</script>';
					} // end while
					?>
					<div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
					</div>
				</div><!-- end of center content --><!-- end of right content -->
			</div><!-- end of main content -->

			<div class="footer">
				<div class="left_footer">
					<a href="#">首页</a>
					<a href="about.html">关于我们</a>
					<a href="#">联系我们</a>
					<a href="#">广告服务</a>
					<a href="#">诚聘英才</a>
				</div>
			</div>

		</div>
		<!-- end of main_container -->

		<?php

		//输出cookie
		for ($i = $num; $i >= 1; $i--)//检查是否有重复选择
		{
			$name = 'browsed_bag_info_' . $i;

			if (isset($_COOKIE[$name]))
				echo $_COOKIE[$name] . '<br />';
		}

		ob_end_flush();
		?>
	</body>
</html>

