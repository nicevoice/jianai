<?php 
ob_start();  // 解决cookie问题
 mb_internal_encoding('UTF-8');
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="css/style_similar.css" />

</head>


<body>
<?php

if(isset($_GET['type']))
{
  $bagtype = $_GET['type'];
  $bagID = $_GET['id'];
}
else
  die('不能直接访问该页面');
  
 require "conn.php"; 


function dynamic_substr($str)
{
  $str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
  $str = str_replace('&nbsp;','',$str);
  $substr = mb_substr($str,0,10);
  
  $len = strlen($substr);
  
  if($len<16)
    $substr = mb_substr($str,0,12); 
  if($len>=26)
    $substr = mb_substr($str,0,8); 
	
 return $substr;	
}
?>

<div id="top_navigation">    </div>  
    
<div id="main_container">
	<div class="top_bar"> 
         
      <div class="top_menu">
            <div class="top_text"><a href="personalize_recomm.php">个性化服务</a></div>
            <div class="top_text"><a href="search.php">图像搜索</a></div>
        	<div class="top_text"><a href="index.php">功能箱包厅</a></div>
            <div class="top_text"><a href="index.php">男包厅</a></div>
            <div class="top_text"><a href="women.php">女包厅</a></div>
            <div class="top_text"><a href="index.php">大厅</a></div>          
      </div>
     
     <img src="images/logo.jpg" style="padding:5px 0px 0px 0px"/>
  	</div><!-- end of top_bar -->
 
  
 <div id="main_content"> 
     
   <div class="left_content">
    <div class="title_box">选中的包包</div>
    <img src="images/bar_bg_4.jpg" width="196" height="10" style="padding:0px" />
    <?php   
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'淘宝商城','1004'=>'当当网','1005'=>'亚马逊','1006'=>'凡客',
	'1007'=>'银泰网','1008'=>'走秀网','1009'=>'新浪商城','1010'=>'梦芭莎','1011'=>'尊酷网','1012'=>'爱上包包网');
	
	 $sql_selected = 'select * from '. $bagtype.' where bagID=' .$bagID; 
	 $query_selected = mysql_query($sql_selected, $con); 
	 $row_selected = mysql_fetch_row($query_selected);	
	 echo ' <img src="prod_img/img_danjianbao/'.$row_selected[0].'.jpg" width="190"/>';
	 echo '<div class="product_info"><ul> <li>'.$row_selected[1].'</li>';
	 echo '<li>价格：<span class="price">&yen;'.$row_selected[2].'</span></li>';
	 echo '<li>商家：'.$mall[$row_selected[6]].'</li>';
	 echo '</ul></div>';  
	 echo '<a class="button2" href="'.$row_selected[3].'"  target="_blank"><span>去商城看看</span></a>';
	 
	 // 设置cookie
	  if(isset($_COOKIE['browsed_bag_num']))
	  {
		$num = $_COOKIE['browsed_bag_num'];
	  	$cookieValue =  $bagtype . '-'. $bagID;
	   
	   $flag = 0;
	   for($i=0;$i<=3;$i++)  //检查是否有重复选择
	   {		 
	    $name = 'browsed_bag_info_'. $i;
		if(isset($_COOKIE[$name]))
		{
		 if($_COOKIE[$name] == $cookieValue)
		 {
		  $flag = 1;
		  break;
		 }
		}
	   } // end for
	  
	   if($flag ==0)	//没有重复选择
       {
		 $num = fmod($num+1, 4);
		 $cookieName = 'browsed_bag_info_'.$num;
		 setcookie('browsed_bag_num', $num, time()+300); 
	     setcookie($cookieName, $cookieValue, time()+300);
		} // end if
	  }
	  else  //如果浏览的包包只有一个
	  {
	   $cookieName = 'browsed_bag_info_0';
	   $cookieValue =  $bagtype . '-'. $bagID; 
	   setcookie('browsed_bag_num', 0, time()+300);
	   setcookie($cookieName, $cookieValue, time()+300);
	  }
?>
         
          
      <!-- 浏览过的包 -->  
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      
      <table width="196" border="0" align="center" cellpadding="1" cellspacing="0" style="padding:10px 0px 0px 0px">
       <tr>
         <td class="title_box_like">浏览过的包包</td>
      </tr>
      <tr>
          <td align="left"><img src="images/bar_bg_4.jpg" width="196" height="10" style="padding:0px; margin:0px" /></td>
     </tr>
     </table>
         <?php
		 if(isset($_COOKIE['browsed_bag_num']))
	     {
	      for($i=0;$i<=3;$i++)
		  {
		  $cookieName = 'browsed_bag_info_'. $i;
		  if(isset($_COOKIE[$cookieName]))
		  {
		  $browsed_info = explode("-",$_COOKIE[$cookieName]);
		  $browsed_type =  $browsed_info[0];
		  $browsed_ID =  $browsed_info[1];
		  
		   // 查询数据库
		  $sql_browsed = 'select * from '. $browsed_type.' where bagID=' .$browsed_ID; 
	      $query_browsed = mysql_query($sql_browsed, $con)  or die("Invalid query: " . mysql_error());
	      $row_browsed = mysql_fetch_row($query_browsed);	
		  
		  echo '<a href="similarbag.php?type='. $browsed_type.'&id='.$browsed_ID.'">'; 
		  echo '<img src="prod_img/img_danjianbao/'.$browsed_ID.'.jpg" width="90" height="90"  border=0/>';
          echo '</a>';
		   } // end if
		  } // end for
	     } // end if
		 ?>     
     
      
   </div><!-- end of left content -->
   
   <div class="center_content">
   <div class="center_title_bar">款式相似的包包</div>
	<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />
          
 <?php
    //检索相似的包包的ID
	$sql ='select * from similar_wdanjianbao  where bagID='.$bagID;
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
	$row=mysql_fetch_row($query);
	
	
	//显示款式相似的包包
	$root = 'prod_img/img_danjianbao/';	
			
    for($k=1;$k<=15;$k++)
	{
	 $sql_lbp = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	
	 $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error()); 
	 $row_lbp = mysql_fetch_row($query_lbp);
	 
	 $path = $root.$row_lbp[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$path;
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type=wdanjianbao&id='.$row_lbp[0].'">';
	echo    $imgPath;
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_lbp[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_lbp[2].'</li><li>商家：'. $mall[$row_lbp[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while
   
?>

<div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" /></div>
<div class="center_title_bar">颜色相似的包包</div>
	<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />
  <?php  
   for($k=16;$k<=30;$k++)
	{
	 $sql_hsv = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	 $query_hsv = mysql_query($sql_hsv, $con) or die("Invalid query: " . mysql_error());  
	 $row_hsv = mysql_fetch_row($query_hsv);
	 
	 $path = $root.$row_hsv[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$path;
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type=wdanjianbao&id='.$row_hsv[0].'">';
	echo    $imgPath;
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_hsv[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_hsv[2].'</li><li>商家：'. $mall[$row_hsv[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while
  ?>
 
 <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" /></div>
<div class="center_title_bar">你还可能喜欢的包包</div>
	<img src="images/bar_bg_4.jpg" width="780" height="10" style="padding:1px 0 0 5px" />
  <?php  
   for($k=31;$k<=40;$k++)
	{
	 $sql_com = 'select * from '. $bagtype.' where bagID=' .$row[$k]; 
	 $query_com  = mysql_query($sql_com , $con) or die("Invalid query: " . mysql_error());  
	 $row_com  = mysql_fetch_row($query_com );
	 
	 $path = $root.$row_com [0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$path;
	 $imgPath = $imgPath. '"  border=0 width="148px" height="148px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type=wdanjianbao&id='.$row_com[0].'">';
	echo    $imgPath;
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row_com[1]).'...</li>';
	echo  '<li>价格：&yen;'.$row_com [2].'</li><li>商家：'. $mall[$row_com [6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';		
	}   // end while  
  ?> 
   <div><img src="images/division_border.jpg" width="780px" style=" padding:15px 0 5px 0;" /></div>   
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
 

<?php ob_end_flush(); ?>
</body>
</html>

