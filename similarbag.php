<?php 
    ob_start();
    include 'header.php';
    include 'include/list_functions.php'
?>
        <link rel="stylesheet" type="text/css" href="css/style_similar.css" />
        <link rel="stylesheet" type="text/css" href="css/menu2.css" />
        <link rel="stylesheet" type="text/css" href="css/paginate.css">

<?php
    if (isset($_GET['type'])) {
        $bagtype = $_GET['type'];
        $bagID = $_GET['id'];
    } else 
        die('不能直接访问该页面');
?>
            <div id="main_content">
                <div class="left_content">
                    <ul class="nav nav-tabs gray-tab">
                      <li class="active"><a>选中的包包</a></li>
                    </ul>
                    <?php 
					$mall = array();
                    $mall_query = mysql_query("select mallID,mallName from mall_list") or die("Invalid query: " . mysql_error());
                    while($row=mysql_fetch_array($mall_query)){
                        $key = $row['mallID'];
                        $value = $row['mallName'];
                        $mall[$key] = $value;
                    }

                    $sql_selected = 'select * from ' . $bagtype . ' where bagID=' . $bagID;
                    $query_selected = mysql_query($sql_selected, $con);
                    $row_selected = mysql_fetch_array($query_selected);
                    $bag = new Bag($bagtype);
                    $bag = $bag->mapping_fields($row_selected);
                    ?>
                    <a href="similarbag.php?type=<?echo $bagtype;?>&id=<?php echo $bag->id; ?>">
                    <div class="item-box">
                         <div class="item-img">
                                <img src="<? echo $bag->img_url ?>" />
                         </div>
                         <div class="item-info">
                            <div>名称：<?php echo dynamic_substr($bag->name); ?></div>
                            <div>价格：&yen;<?php echo $bag->price; ?></div>
                            <div>商家：<?php echo $mall[$bag->mall_id] ?></div>
                        </div>
                        <a class="button2" href="<? echo $bag->url ?>"  target="_blank"><span>去商城看看</span></a>
                     </div>
                     </a>
                    <?php

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
                            setcookie('browsed_bag_num', $num, time() + 3000);
                            // cookie的时间
                            setcookie($cookieName, $cookieValue, time() + 3000);
                        } // end if
                    } else//如果浏览的包包只有一个
                    {
                        $cookieName = 'browsed_bag_info_1';
                        $cookieValue = $bagtype . '@' . $row_selected[4];
                        setcookie('browsed_bag_num', 1, time() + 3000);
                        setcookie($cookieName, $cookieValue, time() + 3000);
                    }
                    ?>

                    <!-- 浏览过的包 -->
                    <ul class="nav nav-tabs gray-tab">
                        <li class="active"><a>浏览过的包包</a></li>
                    </ul>
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
                                if($browsed_URL==''){
                                    continue;
                                }
                                //检查cookie是否在更新的数据库中
                                $sql_browsed = "select * from " . $browsed_type . " where bagImgURL='" . $browsed_URL . "'";
                                $query_browsed = mysql_query($sql_browsed, $con) or die("Invalid query: " . mysql_error());
                                if (mysql_num_rows($query_browsed)){
                                    $row_browsed = mysql_fetch_row($query_browsed);
                                ?>
                                    <a href="similarbag.php?type=<? echo $browsed_type ?>&id=<? echo $row_browsed[0] ?>">
                                        <img class="history-item" src="<?echo $row_browsed[4] ?>" title="<? echo $row_browsed[1] ?>"/>
                                    </a>
                                <?php
                                    $count++;
                                }
                            }// end  if(isset($_COOKIE[$cookieName]))

                            if ($count >= 7)
                                break;
                        } // end for
                    } // end if
                    ?>
                </div><!-- end of left content -->
     
     <?php
  // 计算总的页数，获取当前页数
	$page = (isset($_GET['page']))? intval($_GET['page']):1;
		
	//设置每页显示的数量
	$pageSize = 16;
	$adjacents = 3;
	
	//获取总的数据量
	$sql ='select * from sim_'.$bagtype.'  where bagID='.$bagID;
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
	$row=mysql_fetch_row($query);
	
	if($row[1]>$row[3])    // lbp, hsv 中，选择一个数量较小的作为总的显示数量
	   $amount = $row[3];
	else
	   $amount = $row[1]; 
	
	if($amount)
	{
	  if($amount < $pageSize)  //如果总数据量小于 pagesize, 那么只有一页
	     $page_count = 1;
	  if($amount % $pageSize)
	     $page_count = (int)($amount/$pageSize)+1; //如果有余数，则需加 1
	  else
	     $page_count = $amount/$pageSize;  //如果没有余数	
	  
	  if($page_count>20)
	    $page_count = 20;	    	 
	}  // end if($amount)
	else
	   $page_count = 0;
 ?>
    <div class="center_content">
        <ul class="nav nav-tabs gray-tab">
          <li class="active"><a>款式相似的包包</a></li>
        </ul>
        <?php //检索相似的包包的ID
        //检索相似的包包的ID
        $sim_lbp_ID = explode(",",$row[2]);

        //显示款式相似的包包
        $root = 'prod_img/'.$bagtype.'/';	
           $start_lbp = ($page-1)*$pageSize;

    	if($page<$page_count)
               $end_lbp = $start_lbp+$pageSize;
       	else                  //如果是最后一页
            $end_lbp =  $amount ;
		for($k=$start_lbp;$k<$end_lbp;$k++){
	         $sql_lbp = 'select * from '. $bagtype.' where bagID=' .$sim_lbp_ID[$k];
	         $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error()); 
	         $row_lbp = mysql_fetch_array($query_lbp);
	 
             $bag = new Bag($bagtype);
             $bag = $bag->mapping_fields($row_lbp);

	         $imgPath = '<img id="imgID_' . $k.'" src="'.$row_lbp[4].'"  border=0 width="148px" height="148px"/>';
        ?>
        <a href="similarbag.php?type=<?echo $bagtype;?>&id=<?php echo $bag->id; ?>">
        <div class="item-box">
             <div class="item-img">
                    <?php echo $imgPath; ?>
             </div>
             <div class="item-info">
                <div>名称：<?php echo dynamic_substr($bag->name); ?></div>
                <div>价格：&yen;<?php echo $bag->price; ?></div>
                <div>商家：<?php echo $mall[$bag->mall_id] ?></div>
            </div>
         </div>
         </a>
        <?php } ?>

        <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
        </div>
        <ul class="nav nav-tabs gray-tab">
          <li class="active"><a>颜色相似的包包</a></li>
        </ul>
      <?php
     $sim_hsv_ID = explode(",",$row[4]);
	
	//显示颜色相似的包包
	$root = 'prod_img/'.$bagtype.'/';	
	$start_hsv = ($page-1)*$pageSize;
	
	if($page<$page_count)
	   $end_hsv = $start_hsv + $pageSize;
	else                                //如果是最后一页
	    $end_hsv =  $amount ;
	
    for($k=$start_hsv;$k<$end_hsv;$k++)
	{
	 $sql_hsv = 'select * from '. $bagtype.' where bagID=' .$sim_hsv_ID[$k]; 
	 $query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error());  
	 $row_hsv = mysql_fetch_array($query_hsv);
	 $bag = new Bag($bagtype);
     $bag = $bag->mapping_fields($row_hsv);
     
	 $imgPath = '<img id="imgID_' . $k.'" src="'.$bag->img_url.'"  border=0 width="148px" height="148px"/>';
    ?>
    <a href="similarbag.php?type=<?echo $bagtype;?>&id=<?php echo $bag->id; ?>">
    <div class="item-box">
         <div class="item-img">
                <?php echo $imgPath; ?>
         </div>
         <div class="item-info">
            <div>名称：<?php echo dynamic_substr($bag->name); ?></div>
            <div>价格：&yen;<?php echo $bag->price; ?></div>
            <div>商家：<?php echo $mall[$bag->mall_id] ?></div>
        </div>
     </div>
     </a>
    <?php } ?>

    <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
    </div>
    <ul class="nav nav-tabs gray-tab">
      <li class="active"><a>您还可能喜欢的包包</a></li>
    </ul>
     <?php
     $sim_com_ID = explode(",",$row[6]);
     
	 $root = 'prod_img/'.$bagtype.'/';	
	 $start_com = ($page-1)*$pageSize;
     
	 if($page<$page_count)
	   $end_com = $start_com + $pageSize;
	 else                                //如果是最后一页
	    $end_com =  $amount ;
	
    for($k=$start_com;$k<$end_com;$k++){
	 $sql_com = 'select * from '. $bagtype.' where bagID=' .$sim_com_ID[$k]; 
	 $query_com  = mysql_query($sql_com , $con) or die("Invalid query: " . mysql_error());  
	 $row_com  = mysql_fetch_array($query_com );
	 $bag = new Bag($bagtype);
     $bag = $bag->mapping_fields($row_com);

	 $imgPath = '<img id="imgID_' . $k.'" src="'.$bag->img_url.'"  border=0 width="148px" height="148px"/>';
    ?>
    <a href="similarbag.php?type=<?echo $bagtype;?>&id=<?php echo $bag->id; ?>">
    <div class="item-box">
         <div class="item-img">
                <?php echo $imgPath; ?>
         </div>
         <div class="item-info">
            <div>名称：<?php echo dynamic_substr($bag->name); ?></div>
            <div>价格：&yen;<?php echo $bag->price; ?></div>
            <div>商家：<?php echo $mall[$bag->mall_id] ?></div>
        </div>
     </div>
     </a>
   <?php 
    }

  //分页页码显示 
   echo   ' <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" /></div>   ';             
     include("css/pagination3.php");
	 $reload = $_SERVER['PHP_SELF'] . '?type='.$bagtype.'&id='.$bagID;
	 $reload = $reload ."&page_count=" . $page_count;
	 echo paginate_three($reload, $page, $page_count, $adjacents);
     ?>
    <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" />
    </div>
                </div><!-- end of center content --><!-- end of right content -->
            </div><!-- end of main content -->
<?php
    ob_end_flush();
	include 'footer.php';
?>

