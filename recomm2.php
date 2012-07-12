<?php 
 mb_internal_encoding('UTF-8');
require "conn.php"; 
$imgName = $_GET['imName'];
$bagtype = $_GET['bagType'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="css/style_showbox.css"/>
<link rel="stylesheet" type="text/css" href="css/menu2.css" />
<link rel="stylesheet" media="all" type="text/css" href="css/css_menu/pro_dropline_1.css" />
<script src="css/css_menu/stuHover.js" type="text/javascript"></script>


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

</head>

<body>
<div id="top_navigation">    </div>  
<div id="main_container">
  <div class="top_bar"> 
     <div class="top_menu">
               <div id="nav">
<ul class="select">
<li><a href="index.php"><b>首页</b></a></li>
<li><a href="women.php"><b>女包</b></a>
	<ul class="sub">
		<li><a href="more.php?tt=wdanjianbao">单肩包</a></li>
		<li><a href="more.php?tt=wxiekuabao">斜挎包</a></li>
		<li><a href="more.php?tt=wshoutibao">手提包</a></li>
		<li><a href="more.php?tt=wshounabao">手拿包</a></li>
        <li><a href="more.php?tt=wshuangjianbao">双肩包</a></li>
	</ul>
</li>

<li><a href="men.php"><b>男包</b></a>
	<ul class="sub">
		<li><a href="more.php?tt=mdanjianbao">单肩包</a></li>
		<li><a href="more.php?tt=mgongwenbao">公文包</a></li>
		<li><a href="more.php?tt=mqianbao_yaobao">钱包</a></li>
		<li><a href="more.php?tt=mshounabao">手拿包</a></li>
     </ul>
</li>

<li><a href="xiangbao.php"><b>箱包</b></a>
	<ul class="sub">
		<li><a href="more.php?tt=glaganxiang">拉杆箱</a></li>
		<li><a href="more.php?tt=glvxingbao">旅行包</a></li>
		<li><a href="more.php?tt=gyundongbao">运动包</a></li>
	</ul>
</li>
<li><a href="search.php"><b>搜索</b></a>
<li><a href="precomm.php"><b>个性化服务</b></a>
</ul>
</div>
      </div>
     
     <img src="images/logo.jpg" style="padding:5px 0 0 320px"/> 
  </div> <!-- end of top_bar -->
   
   <div id="main_content"> 
 
   <div class="center_content">
   <div class="center_title_bar">款式相似的包包</div>
    <img src="images/bar_bg_4.jpg" style="padding:0px" />
             
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
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'亚马逊','1004'=>'走秀网','1005'=>'银泰网','1006'=>'凡客诚品',
	'1007'=>'当当网','1008'=>'天猫商城','1009'=>'尊酷网','1010'=>'梦芭莎','1011'=>'新浪商城','1012'=>'爱上包包网');
	
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
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_lbp[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_lbp[2].'</li><li>商家：'. $mall[$row_lbp[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while
	
	echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';
 	   
?>
 
   <div class="center_title_bar">颜色相似的包包</div>
   <img src="images/bar_bg_4.jpg" style="padding:0px" />
     
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
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_hsv[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_hsv[2].'</li><li>商家：'. $mall[$row_hsv[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while
 echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';	
  ?>
  
  <div class="center_title_bar">你还可能喜欢的包包</div>
   <img src="images/bar_bg_4.jpg" style="padding:0px" />
     
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
	echo  '<span class="www_zzjs_net"><ul>';
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

