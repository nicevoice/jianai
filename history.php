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

						$mall = array();
                        $mall_query = mysql_query("select mallID,mallName from mall_list") or die("Invalid query: " . mysql_error());
                        while($mall_row=mysql_fetch_array($mall_query)){
                            $key = $mall_row['mallID'];
                            $value = $mall_row['mallName'];
                            $mall[$key] = $value;
                        }
                        
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
							$row_selected = mysql_fetch_array($query_selected);
							$bag = new Bag($bagtype);
                            $bag = $bag->mapping_fields($row_selected);
							if ($i == 0){
							    echo ' <img src="' . $bag->img_url . '" width="190px"/>';
							}else{
							    echo ' <img src="' . $bag->img_url . '" width="190" style="padding:90px 0 0 0"/>';
							}

							echo '<div class="product_info"><ul> <li>' . $bag->name . '</li>';
							echo '<li>价格：<span class="price">&yen;' . $bag->price . '</span></li>';
							echo '<li>商家：' . $mall[$bag->mall_id] . '</li>';
							echo '</ul></div>';
							echo '<a class="button2" href="' . $bag->url . '"  target="_blank"><span>去商城看看</span></a>';
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
  for($i=0;$i<$browsed_num;$i++){
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
    $table = 'sim_'. $bagtype;
	$sql = 'select * from '.  $table.' where bagID=' .$browsed_info[$i]['ID']; 
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
	$row=mysql_fetch_array($query);
    
    $slbp = explode(",",$row['slbp']);
    $shsv = explode(",",$row['shsv']);
    $scom = explode(",",$row['scom']);
    
	//显示款式相似的包包
	$root = 'prod_img/'.$bagtype.'/';	
	for($k=1;$k<=5;$k++){
        $sql_lbp = 'select * from '. $bagtype.' where bagID=' .$slbp[$k-1];
	    $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error()); 
	    $row_lbp = mysql_fetch_array($query_lbp);
        $bag = new Bag($bagtype);
        $bag = $bag->mapping_fields($row_lbp);
	    $path = $root.$bag->id.'.jpg'; 
	    $imgID = 'imgID_' . $k;
	    $imgPath = '<img id="'.$imgID.'" src="'.$bag->img_url;
	    $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
        echo  '<div class="prod_box">';
        echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$bag->id.'">';
        echo   $imgPath;
        echo  '<span class="prod_info"><ul>';
        echo  '<li>'.dynamic_substr($bag->name).'...</li>';
        echo  '<li>价格：&yen;'.$bag->price.'</li><li>商家：'. $mall[$bag->mall_id].'</li>';
        echo  '</ul></span></a></div>';	
        echo  '</div>';
	}

   //显示颜色相似的包包
   //判断是否有重复的包包
    $similar_hsv = detect_repeat($row);
    
	for($k=0;$k<5;$k++)
	{
	 $sql_hsv = 'select * from '. $bagtype.' where bagID=' .$shsv[$k]; 
	 $query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error()); 
	 $row_hsv = mysql_fetch_array($query_hsv);
	 $bag = new Bag($bagtype);
     $bag = $bag->mapping_fields($row_hsv);
	 $path = $root.$bag->id.'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$bag->img_url;
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	  echo  '<div class="prod_box">';
      echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$bag->id.'">';
	  echo    $imgPath;
	  echo  '<span class="prod_info"><ul>';
	 echo  '<li>'.dynamic_substr($bag->name).'...</li>';
	  echo  '<li>价格：&yen;'.$bag->price.'</li><li>商家：'. $mall[$bag->mall_id].'</li>';
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

		<?php 
		  ob_end_flush();
		?>
	</body>
</html>

