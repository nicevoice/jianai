<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="../../css/menu2.css" />
<?php
   	
  $flag = 1;
  if($flag)
  {
    echo '<link rel="stylesheet" type="text/css" href="include/style/tabStyle.css" />';  
   echo '<script type="text/javascript" src="include/style/jquery-1.3.2.min.js"></script>';
   echo  '<script type="text/javascript" src="include/style/ui.tab.js"></script>';
   echo  '<script type="text/javascript" src="include/style/jquery.form.js"></script>';
  }
 
?>

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

<script type="text/javascript"> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
			 var options = { 
        target:        '#img_form_div',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
              }; 
			  
			// bind to the form's submit event 
    $('#img_form').submit(function()
	 { 
        $(this).ajaxSubmit(options); 
        return false; 
     }); 
  });
		
		// pre-submit callback 
    function showRequest() 
	{ 
      document.getElementById('img_form_div').innerHTML = '正在上传图片,请稍候...';
       return true; 
   } 
 
   // post-submit callback 
   function showResponse()
     { 
	  var path = document.getElementById('upload_Img').src;
	  var ind = path.lastIndexOf('/')+1;
	  var imgName = path.substring(ind); 
	  
	  var root = 'C:/PHPnow/htdocs/jian-ai/include/upload_Img/';
	  var imgPath = root + imgName;
	  
	   var flag;
	  flag = document.getElementById('flag').innerHTML;
	  
	  alert(flag);
	 	  
	  return true;
	 	  }  
    </script> 
 
 
 <script type="text/javascript"> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
			 var options = { 
        target:        '#web_img_div',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest2,  // pre-submit callback 
        success:       showResponse2  // post-submit callback 
              }; 
			  
			// bind to the form's submit event 
    $('#web_img_form').submit(function()
	 { 
        $(this).ajaxSubmit(options); 
        return false; 
     }); 
  });
		
		// pre-submit callback 
    function showRequest2() 
	{ 
       
       return true; 
   } 
 
   // post-submit callback 
   function showResponse2()
     { 
        alert('提交成功'); 
         }  
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
            <div class="search_text"><a href="#">高级搜索</a></div>
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
          <div class="product_img"><a href="details.html">
        <img src="prod_img/02.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
              
               <div class="border_box">
          <div class="product_img"><a href="details.html">
        <img src="prod_img/02.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
         
          <div class="border_box">
          <div class="product_img"><a href="details.html">
        <img src="prod_img/02.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
              
               <div class="border_box">
          <div class="product_img"><a href="details.html">
        <img src="prod_img/02.jpg" width="90" height="90" border="0" /></a></div>
              </div>  
          
      <div class="banner_adds"></div>    
    
   </div><!-- end of left content -->
   
   
   <div class="center_content">
   	<div class="center_title_bar">个性化推荐商品</div>
    
 <?php

  if($flag)
  {
    echo '<br />';
   include('include/search_tab.htm');   
  }
  else 
  {
	for($i=1;$i<=8;$i++)
   {
    $imgPath = '<img src="prod_img/'.$i.'.jpg" width="160px" height="160px"/>';
	$imgPath = htmlspecialchars_decode($imgPath);
	echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img">';
	echo    $imgPath;
	echo    '</div>';	
    echo   '<div class="product_title"><a href="details.html">[美思蒂]时尚型格系列单肩斜挎包 西瓜红</a></div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">270$</span></div>';                        
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
	   } //end for
  
   
  ////----------------颜色相似的包包-------------------------------
  	echo '<div class="center_title_bar">颜色相似的包包</div>';
   for($i=1;$i<=4;$i++)
   {
     $im = $i + 200;
	 $imgPath = '<img src="prod_img/'.$im.'.jpg" width="160px" height="160px"/>';
	 echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';  
	echo   '<div class="product_img">';          
    echo   $imgPath;
	echo   '</div>';
    echo   '<div class="product_title"><a href="details.html">[美思蒂]时尚型格系列单肩斜挎包 西瓜红</a></div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">270$</span></div>';                        
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
   } //end for 
   
    ////----------------款式相似的包包-------------------------------
  	echo '<div class="center_title_bar">款式相似的包包</div>';
   for($i=1;$i<=4;$i++)
   {
     $im = 2*$i;
	 $imgPath = '<img src="prod_img/'.$im.'.jpg" width="160px" height="160px"/>';
	 echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';  
	echo   '<div class="product_img">';          
    echo   $imgPath;
	echo   '</div>';
    echo   '<div class="product_title"><a href="details.html">[美思蒂]时尚型格系列单肩斜挎包 西瓜红</a></div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">270$</span></div>';                        
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
	
   } //end for 
   
    ////----------------图案相似的包包-------------------------------
  	echo '<div class="center_title_bar">图案相似的包包</div>';
   for($i=1;$i<=4;$i++)
   {
     $im = $i + 200;
	 $imgPath = '<img src="prod_img/'.$im.'.jpg" width="160px" height="160px"/>';
	 echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';  
	echo   '<div class="product_img">';          
    echo   $imgPath;
	echo   '</div>';
    echo   '<div class="product_title"><a href="details.html">[美思蒂]时尚型格系列单肩斜挎包 西瓜红</a></div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">270$</span></div>';                        
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
	
   } //end for 
    
  }  // end else
    
?>
    
<div class="center_title_bar">今日团购</div>
     
      <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/1.jpg" alt="" title="" border="0" /></a></div>
              <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
                 <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="details.html" class="prod_details">details</a>            
            </div>                     
        </div>
    
 
     	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/3.jpg" alt="" title="" border="0" /></a></div>
              <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
                 <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="details.html" class="prod_details">details</a>            
            </div>                     
        </div>
        
 
     	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/201.jpg" alt="" title="" border="0" /></a></div>
              <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
                 <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="details.html" class="prod_details">details</a>            
            </div>                     
        </div>
        
        <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/8.jpg" alt="" title="" border="0" /></a></div>
              <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
                 <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="details.html" class="prod_details">details</a>            
            </div>                     
        </div>
 
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