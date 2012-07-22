<?php 
    include 'header.php';
    $imgName = $_GET['imName'];
    $bagtype = $_GET['bagType'];
?>
<link rel="stylesheet" type="text/css" href="css/menu2.css" />

<script language="javascript">
    lastScrollY=0;
    function heartBeat(){
    var diffY;
    if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
    else if (document.body)
    diffY = document.body.scrollTop
    else
    {/*Netscape stuff*/}
    
    percent=.1*(diffY-lastScrollY);
    if(percent>0)
        percent=Math.ceil(percent);
    else 
       percent=Math.floor(percent);
       
    document.getElementById("scrollDIV").style.top=parseInt(document.getElementById("scrollDIV").style.top)+percent+"px";
    lastScrollY=lastScrollY+percent;
    //alert(lastScrollY);
    }
    
    suspendImg="<DIV id=\"scrollDIV\" style='right:0px;POSITION:absolute;TOP:69px; background:none'> <ul class='product_title'> 您输入的图片如下：</ul>";
    
    if(window.screen.width <=1024)
     suspendImg = suspendImg + "<ul><img border=0 src=include/upload_Img/" + "<?php echo $imgName; ?>" + ".jpg width=100></ul></div>";
    
    else
      suspendImg = suspendImg + "<ul><img border=0 src=include/upload_Img/" + "<?php echo $imgName;  ?>" + ".jpg width=160></ul></div>";
    
    document.write(suspendImg);
    window.setInterval("heartBeat()",1);
</script>
   
   <div id="main_content"> 
   <div class="center_content">
   <ul class="nav nav-tabs">
      <li class="active"><a>款式相似的包包</a></li>
   </ul>
 <?php
 
 function dynamic_substr($str)
{
  $str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
  $str = str_replace('&nbsp;','',$str);
  $substr = mb_substr($str,0,30);

  $len = strlen($substr);
  
  if($len<50)
    $substr = mb_substr($str,0,34); 
  if($len>=70)
    $substr = mb_substr($str,0,25); 
	
 return $substr;	
}

    // 查找相似的包包ID
	$sql ='select * from img_search where upImgID='.$imgName;
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
	$row=mysql_fetch_row($query);
	
	// 显示款式相似的包包	
	$root = 'prod_img/'.$bagtype.'/';	
	$mall = array();
    $mall_query = mysql_query("select mallID,mallName from mall_list") or die("Invalid query: " . mysql_error());
    while($row=mysql_fetch_array($mall_query)){
        $key = $row['mallID'];
        $value = $row['mallName'];
        $mall[$key] = $value;
    }
	
	 for($k=1;$k<=12;$k++)
	{
	 $sql_lbp = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	
	 $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error()); 
	 $row_lbp = mysql_fetch_row($query_lbp);
	 
	 $path = $root.$row_lbp[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$row_lbp[4];
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row_lbp[0].'">';
	echo    $imgPath;
	echo  '<span class="prod_info"><ul>';
	echo  '<li>'.dynamic_substr($row_lbp[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_lbp[2].'</li><li>商家：'. $mall[$row_lbp[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';
	}   // end while
	
	echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';
 	   
?>
 
   <ul class="nav nav-tabs">
      <li class="active"><a>颜色相似的包包</a></li>
   </ul>
     
 <?php  
   for($k=13;$k<=24;$k++)
	{
	 $sql_hsv = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	 $query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error());  
	 $row_hsv = mysql_fetch_row($query_hsv);
	 
	 $path = $root.$row_hsv[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$row_hsv[4];
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row_hsv[0].'">';
	echo    $imgPath;
	echo  '<span class="prod_info"><ul>';
	echo  '<li>'.dynamic_substr($row_hsv[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_hsv[2].'</li><li>商家：'. $mall[$row_hsv[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while
 echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';	
  ?>
  
  <ul class="nav nav-tabs">
      <li class="active"><a>您还可能喜欢的包包</a></li>
   </ul>
     
 <?php  
   for($k=25;$k<=36;$k++)
	{
	 $sql_com = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	 $query_com = mysql_query($sql_com, $con) or die("Invalid query: " . mysql_error());  
	 $row_com = mysql_fetch_row($query_com);
	 
	 $path = $root.$row_com[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$row_com[4];
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row_com[0].'">';
	echo    $imgPath;
	echo  '<span class="prod_info"><ul>';
	echo  '<li>'.dynamic_substr($row_com[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_com[2].'</li><li>商家：'. $mall[$row_com[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';
	}   // end while
    echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';	
  ?>
     </div><!-- end of center content --><!-- end of right content -->   
 </div><!-- end of main content -->

<?php
    include 'footer.php';
?>