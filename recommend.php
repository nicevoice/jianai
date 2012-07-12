<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
 suspendImg = suspendImg + "<ul><img border=0 src=include/upload_Img/" + "<?php echo $_GET['imName'];  ?>" + ".jpg width=100></ul></div>";

else
  suspendImg = suspendImg + "<ul><img border=0 src=include/upload_Img/" + "<?php echo $_GET['imName'];  ?>" + ".jpg width=160></ul></div>";

document.write(suspendImg);
window.setInterval("heartBeat()",1);
</script>

</head>

<body>

<div id="top_navigation">    </div>  
    
<div id="main_container">

	<div class="top_bar">
    <div class="top_search_2">
        	<div class="search_text_2"><span class="search_text_2">荐爱网 www.jian-ai.cn：所荐即所爱</span></div>
     </div>
<div class="top_search">
        	<div class="search_text"><a href="#">登录/注册</a></div>
            <div class="search_text"><a href="index.php">高级搜索</a></div>
	</div>
	</div><!-- end of top_bar -->
    
   <div id="main_content"> 
   
            <div id="navigation_menu" style="width:1000px; height:31px;background-color:#E3E3E3;">
               <ul id="navigation"> 
                  <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">首页</a> 
                   </li> 

              
               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">女包</a> 
                  <ul> 
                    <li><a href="#">单肩包</a></li> 
                    <li><a href="#">斜跨包</a></li> 
                    <li><a href="#">手提包</a></li> 
                    <li><a href="#">双肩包</a></li> 
                   </ul> 
              </li> 

               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">男包</a> 
                  <ul> 
                    <li><a href="#">公文包</a></li> 
                    <li><a href="#">休闲包</a></li> 
                  </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">功能箱包</a> 
                  <ul> 
                    <li><a href="#">旅行包</a></li> 
                    <li><a href="#">电脑包</a></li> 
                    <li><a href="#">拉杆箱</a></li> 
                    <li><a href="#">运动包</a></li> 
                    <li><a href="#">登山包</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">钱包/手包</a> 
                  <ul> 
                    <li><a href="#">女款钱包</a></li> 
                    <li><a href="#">男款钱包</a></li> 
                    <li><a href="#">女款手包</a></li> 
                    <li><a href="#">男款手包</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">奢侈品</a> 
               </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">团购包</a> 
                  <ul> 
                    <li><a href="#">菜单1</a></li> 
                    <li><a href="#">菜单2</a></li> 
                    <li><a href="#">菜单3</a></li> 
                    <li><a href="#">菜单4</a></li> 
                 </ul> 
              </li> 
              
            </ul> 
     </div>  <!-- end of navigation menu   -->
            
    <div class="crumb_navigation">
    您当前的位置: <span class="current">首页</span>
    
    </div>        
    
    
   <div class="left_content">
    <div class="title_box">来源商家</div>
    
        <ul class="left_menu">
        <li class="odd"><a href="services.html">麦包包</a></li>
        <li class="even"><a href="services.html">当当网</a></li>
         <li class="odd"><a href="services.html">京东网</a></li>
        <li class="even"><a href="services.html">淘宝商城</a></li>
         <li class="odd"><a href="services.html">卓越亚马逊</a></li>
         <li class="even"><a href="services.html">凡客诚品</a></li>
        <li class="odd"><a href="services.html">梦芭莎</a></li>
        <li class="even"><a href="services.html">银泰</a></li>
         <li class="odd"><a href="services.html">尊酷网</a></li>
        <li class="even"><a href="services.html">爱上包包网</a></li>
         <li class="odd"><a href="services.html">新浪奢品</a></li>
         <li class="even"><a href="services.html">走秀网</a></li>
        </ul> 
        
        
     <div class="title_box">您的收藏</div>  
     <div class="border_box">
          <div class="collect_img"><a href="details.html">
        <img src="prod_img/1.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
              
               <div class="border_box">
          <div class="collect_img"><a href="details.html">
        <img src="prod_img/2.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
         
          <div class="border_box">
          <div class="collect_img"><a href="details.html">
        <img src="prod_img/1.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
              
               <div class="border_box">
          <div class="collect_img"><a href="details.html">
        <img src="prod_img/3.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
          
      <div class="banner_adds"></div>    
    
   </div><!-- end of left content -->
   
   
   <div class="center_content">
       
 <?php
 
     $con = mysql_connect('localhost', 'root', 'cbzeng~231715');  
		if (!$con)
            die('Could not connect: ' . mysql_error());
		
		mysql_select_db('recommSys', $con) or die ('数据库选择错误 : ' . mysql_error());	
		$charset = mysql_query("set names 'utf8'"); 
		
		//$gbk = mysql_query("set names 'gbk'"); 
		$userID = $_GET["userID"];
		$sql = "select * from user_recomm where userID='" .$userID. "'  limit 8" ; 
		
   	 $query = mysql_query($sql, $con); 
	 while($row=mysql_fetch_row($query))
	 {
	  $complexity[] =  $row[2];
	  $hsv[]   = $row[3];
	  $lbp[]   = $row[4];
	  }
	
	$root = 'prod_img/img_danjianbao/';	
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'淘宝商城','1004'=>'当当网','1005'=>'亚马逊','1006'=>'凡客',
	'1007'=>'银泰网','1008'=>'走秀网','1009'=>'新浪商城','1010'=>'梦芭莎','1011'=>'尊酷网','1012'=>'爱上包包网');
      ////----------------款式相似的包包-------------------------------
  	echo '<div class="center_title_bar">款式相似的包包</div>';
	for($i=0; $i<8; $i++)
	{
     $sql_lbp = "select * from wdanjianbao where bagID='" .$lbp[$i]. "'" ; 
	$query_lbp = mysql_query($sql_lbp, $con);
	$row_lbp =  mysql_fetch_row($query_lbp); 
	
	$path = $root.$lbp[$i].'.jpg'; 
	$imgPath = '<img src="'.$path.'"  border=0 width="160px" height="160px"/>';
	$imgPath = htmlspecialchars_decode($imgPath);
	echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img"><a href="'. $row_lbp[3].'">';
	echo    $imgPath;
	echo    '</a></div>';	
    echo   '<div class="product_title"><a href="'. $row_lbp[3].'">'. $row_lbp[1] .'</a></div>';	
	echo   '<div class="product_title">来源商家：'.$mall[$row_lbp[6]]. '</div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">&yen;'. $row_lbp[2]  .'</span></div>';                        
    echo   '</div>';
    echo   '<div class="bottom_prod_box"></div>';             
    echo   '<div class="prod_details_tab">';
    echo   '<table class="inquiry_table" id="inquiry">';
    echo   '<tr>';
    echo   '<td id="inquiry_like"> <a href="#">喜欢</a></td>';           
    echo   '<td id="inquiry_mid"><a href="#">一般</a></td>'; 
	echo   '<td id="inquiry_dislike"><a href="#">不喜欢</a></td>';           
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
	}   // end for
  
   
  ////----------------颜色相似的包包-------------------------------
  	echo '<div class="center_title_bar">颜色相似的包包</div>';
	for($i=0; $i<8; $i++)
	{
  	 $sql_hsv = "select * from wdanjianbao where bagID='" .$hsv[$i]. "'" ; 
	$query_hsv = mysql_query($sql_hsv, $con);
	$row_hsv =  mysql_fetch_row($query_hsv); 
	
	$path = $root.$hsv[$i].'.jpg'; 
	$imgPath = '<img src="'.$path.'"  border=0 width="160px" height="160px"/>';
	//$imgPath = htmlspecialchars_decode($imgPath);
	echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img"><a href="'. $row_hsv[3].'">';
	echo    $imgPath;
	echo    '</a></div>';	
    echo   '<div class="product_title"><a href="'. $row_hsv[3].'">'. $row_hsv[1] .'</a></div>';	
	echo   '<div class="product_title">来源商家：'.$mall[$row_hsv[6]]. '</div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">&yen;'. $row_hsv[2]  .'</span></div>';                        
    echo   '</div>';
    echo   '<div class="bottom_prod_box"></div>';             
    echo   '<div class="prod_details_tab">';
    echo   '<table class="inquiry_table" id="inquiry">';
    echo   '<tr>';
    echo   '<td id="inquiry_like"> <a href="#">喜欢</a></td>';           
    echo   '<td id="inquiry_mid"><a href="#">一般</a></td>'; 
	echo   '<td id="inquiry_dislike"><a href="#">不喜欢</a></td>';           
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
	}  // end for
	
	
    echo '	<div class="center_title_bar">个性化推荐商品</div>';	
  for($i=0; $i<8; $i++)
   {
	 ////----------------个性化推荐的包包-------------------------------
	$sql_com = "select * from wdanjianbao where bagID='" .$complexity[$i]. "'" ; 
	$query_com = mysql_query($sql_com, $con);
	$row_com =  mysql_fetch_row($query_com); 
	
	$path = $root.$complexity[$i].'.jpg'; 
	$imgPath = '<img src="'.$path.'"  border=0 width="160px" height="160px"/>';
	$imgPath = htmlspecialchars_decode($imgPath);
	echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img"><a href="'. $row_com[3].'">';
	echo    $imgPath;
	echo    '</a></div>';	
    echo   '<div class="product_title"><a href="'. $row_com[3].'">'. $row_com[1] .'</a></div>';	
	echo   '<div class="product_title">来源商家：'.$mall[$row_com[6]]. '</div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">&yen;'. $row_com[2]  .'</span></div>';                        
    echo   '</div>';
    echo   '<div class="bottom_prod_box"></div>';             
    echo   '<div class="prod_details_tab">';
    echo   '<table class="inquiry_table" id="inquiry">';
    echo   '<tr>';
    echo   '<td id="inquiry_like"> <a href="#">喜欢</a></td>';           
    echo   '<td id="inquiry_mid"><a href="#">一般</a></td>'; 
	echo   '<td id="inquiry_dislike"><a href="#">不喜欢</a></td>';           
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
	
   }  
    
	    
	//$query = "delete from user_recomm where userID='" .$userID. "'" ; 
	//$sql = mysql_query($query, $con); 
	
    mysql_close($con);    // 关闭连接 
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