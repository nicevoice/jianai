<?php ob_start();
    include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="css/style_similar.css" />
<link rel="stylesheet" type="text/css" href="css/menu2.css" />

			<div id="main_content">

				<div class="left_content">
					<div>
						<ul class="nav nav-tabs">
                          <li class="active"><a>刚刚浏览过的包包</a></li>
                        </ul>
					</div>
					<?php

						$mall = array('1001' => '麦包包', '1002' => '京东商城', '1003' => '亚马逊', '1004' => '走秀网', '1005' => '银泰网', '1006' => '凡客诚品', '1007' => '当当网', '1008' => '天猫商城', '1009' => '尊酷网', '1010' => '梦芭莎', '1011' => '新浪商城', '1012' => '爱上包包网');

						if (isset($_COOKIE['browsed_bag_num'])) {
							$num = $_COOKIE['browsed_bag_num'];
							$count = 0;
							for ($i = $num; $i >= 1; $i--) {
								$cookieName = 'browsed_bag_info_' . $i;
								if (isset($_COOKIE[$cookieName])) {
									$tmp = explode("@", $_COOKIE[$cookieName]);
									$browsed_type = $tmp[0];
									$browsed_URL = $tmp[1];

									//检查cookie是否在更新的数据库中
									$sql_browsed = "select bagID from " . $browsed_type . " where bagImgURL='" . $browsed_URL . "'";
									$query_browsed = mysql_query($sql_browsed, $con) or die("Invalid query: " . mysql_error());

									if (mysql_num_rows($query_browsed))//如果cookie没有下架
									{
										$row_browsed = mysql_fetch_row($query_browsed);
										$browsed_info[$count]['type'] = $browsed_type;
										$browsed_info[$count]['ID'] = $row_browsed[0];
										$count++;
									}
								}

								if ($count >= 6)
									break;
							}
						}// end if

						else
							die('没有您的浏览记录，无法提供个性化的推荐，请先浏览:)');

						$browsed_num = count($browsed_info);

						for ($i = 0; $i < $browsed_num; $i++) {
							$bagtype = $browsed_info[$i]['type'];
							$sql_selected = 'select * from ' . $bagtype . ' where bagID=' . $browsed_info[$i]['ID'];
							$query_selected = mysql_query($sql_selected, $con) or die("Invalid query: " . mysql_error());
							$row_selected = mysql_fetch_row($query_selected);
							if ($i == 0)
								//echo ' <img src="prod_img/'.$bagtype.'/'.$row_selected[0].'.jpg" width="190px"/>';
								echo ' <img src="' . $row_selected[4] . '" width="190px"/>';
							else
								//echo ' <img src="prod_img/'.$bagtype.'/'.$row_selected[0].'.jpg" width="190" style="padding:90px 0 0 0"/>';
								echo ' <img src="' . $row_selected[4] . '" width="190" style="padding:90px 0 0 0"/>';

							echo '<div class="product_info"><ul> <li>' . $row_selected[1] . '</li>';
							echo '<li>价格：<span class="price">&yen;' . $row_selected[2] . '</span></li>';
							echo '<li>商家：' . $mall[$row_selected[6]] . '</li>';
							echo '</ul></div>';
							echo '<a class="button2" href="' . $row_selected[3] . '"  target="_blank"><span>去商城看看</span></a>';
						}
					?>
              
   </div><!-- end of left content -->
   
  
   <div class="center_content">
  <?php
  
  function dynamic_substr($str)
   {
  //$str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
  //$str = str_replace('&nbsp;','',$str);
  $len1= strlen($str);
  
  $substr = mb_substr($str,0,32);  
   $len2 = strlen($substr); 
  if($len2<=55)
    $substr = mb_substr($str,0,36); 
  if($len2>=70)
    $substr = mb_substr($str,0,26);
  
   $len2 = strlen($substr); 
  
  if($len2<$len1)
     $substr = $substr . '...';
	
   return $substr;	
  }
  
  function detect_repeat($row)
  {
	for($k=1;$k<=5;$k++)
	{
	  $slbp[]= $row[$k]; 
	  $shsv[]= $row[15+$k]; 	  
	 }
  $result = array_intersect($shsv, $slbp);
	
  if(count($result)>0)  //如果有重复
  {
   $ind = array_keys($result); // 找出重复的元素的下标
   for($i=0;$i<count($ind);$i++)
     $shsv[$ind[$i]] = $row[21+$i];
   }
  return $shsv;
}
  
  $title_idx = array('1'=>'一','2'=>'二','3'=>'三','4'=>'四','5'=>'五','6'=>'六','7'=>'七','8'=>'八');
  $tidx = 1;
  for($i=0;$i<$browsed_num;$i++)
  {
   if($i>0)
      echo '<div><img src="images/division_border.jpg" width="780px" style=" padding:19px 0 30px 0;" /></div>';
   
   ?>
   <div>
        <ul class="nav nav-tabs">
          <li class="active"><a>给您推荐的包包</a></li>
        </ul>
    </div>
    <?php
   //检索相似的包包的ID
     $bagtype = $browsed_info[$i]['type'];
	 
    $table = 'similar_'. $bagtype;
	$sql = 'select * from '.  $table.' where bagID=' .$browsed_info[$i]['ID']; 
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
	$row=mysql_fetch_row($query);
		
	//显示款式相似的包包
	$root = 'prod_img/'.$bagtype.'/';	
	for($k=1;$k<=5;$k++)
	{
	 $sql_lbp = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	
	 $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error()); 
	 $row_lbp = mysql_fetch_row($query_lbp);
	 
	 $path = $root.$row_lbp[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$row_lbp[4];
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row_lbp[0].'">';
	echo    $imgPath;
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_lbp[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_lbp[2].'</li><li>商家：'. $mall[$row_lbp[6]].'</li>';
	echo  '</ul></span></a></div>';	
   	echo  '</div>';		
	}   // end for-k
	
   //显示颜色相似的包包
   //判断是否有重复的包包
    $similar_hsv = detect_repeat($row);
   
	for($k=0;$k<5;$k++)
	{
	 $sql_hsv = 'select * from '. $bagtype.' where bagID=' .$similar_hsv[$k]; 
	 $query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error()); 
	 $row_hsv = mysql_fetch_row($query_hsv);
	 
	 $path = $root.$row_hsv[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$row_hsv[4];
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	  echo  '<div class="prod_box">';
      echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row_hsv[0].'">';
	  echo    $imgPath;
	  echo  '<span class="www_zzjs_net"><ul>';
	 echo  '<li>'.dynamic_substr($row_hsv[1]).'...</li>';
	  echo  '<li>价格：&yen;'.$row_hsv[2].'</li><li>商家：'. $mall[$row_hsv[6]].'</li>';
	  echo  '</ul></span></a></div>';	
      echo   '<div class="bottom_prod_box"></div>';             
  	  echo  '</div>';		
	}   // end for-k	 
  }  //end for
?>
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

		<?php ob_end_flush();
		?>
	</body>
</html>

