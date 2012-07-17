<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="css/menu2.css" />

<link rel="stylesheet" type="text/css" href="include/style/tabStyle.css" />    
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="include/style/ui.tab.js"></script>
<script type="text/javascript" src="include/style/jquery.form.js"></script> 

<link rel="stylesheet" type="text/css"  href="css/popWin.css"/>
<script type="text/javascript" src="js/popWin.js"></script>

<script type="text/javascript"> 
function displaySubMenu(li) { 
var subMenu = li.getElementsByTagName("ul")[0]; 
subMenu.style.display = "block"; 
} 
function hideSubMenu(li) { 
var subMenu = li.getElementsByTagName("ul")[0]; 
subMenu.style.display = "none"; 
} 

function showMsg(imgID)	{
		var content = document.getElementById("test").innerHTML;
		popWin("相似的包包", content, 150, 400, imgID);
	}
	
</script> 

<script type="text/javascript"> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
			 var options = { 
        target:        '#output',   // target element(s) to be updated with server response 
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
       alert('开始提交'); 
       return true; 
   } 
 
   // post-submit callback 
   function showResponse()
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
        	<div class="search_text_2"><span class="search_text_2">荐爱网 www.jian-ai.com：所荐即所爱</span></div>
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
                    <li><a href="#">菜单1</a></li> 
                    <li><a href="#">菜单2</a></li> 
                    <li><a href="#">菜单3</a></li> 
                    <li><a href="#">菜单4</a></li> 
                 </ul> 
              </li> 

               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">男包</a> 
                  <ul> 
                    <li><a href="#">菜单1</a></li> 
                    <li><a href="#">菜单2</a></li> 
                    <li><a href="#">菜单3</a></li> 
                    <li><a href="#">菜单4</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">旅行包</a> 
                  <ul> 
                    <li><a href="#">菜单1</a></li> 
                    <li><a href="#">菜单2</a></li> 
                    <li><a href="#">菜单3</a></li> 
                    <li><a href="#">菜单4</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">钱包手包</a> 
                  <ul> 
                    <li><a href="#">菜单1</a></li> 
                    <li><a href="#">菜单2</a></li> 
                    <li><a href="#">菜单3</a></li> 
                    <li><a href="#">菜单4</a></li> 
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
        <li class="even"><a href="services.html">凡客诚品</a></li>
         <li class="odd"><a href="services.html">麦考林</a></li>
         <li class="even"><a href="services.html">尊酷网</a></li>
        <li class="odd"><a href="services.html">梦芭莎</a></li>
        <li class="even"><a href="services.html">上品折扣</a></li>
         <li class="odd"><a href="services.html">玛莎玛索</a></li>
        <li class="even"><a href="services.html">新蛋网</a></li>
         <li class="odd"><a href="services.html">梦露时尚</a></li>
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

  $flag = 1;
  if($flag)
  {
   for($i=1;$i<=8;$i++)
   {
    echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img"><img id="imgID1" src="prod_img/01.jpg"  border="0" title="" onClick="showMsg(\'imgID1\')" /></div>';	
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
	  
	echo  '<div id="test" style="display:none" ><img src="prod_img/02.jpg" width="145" height="145"> <img src="prod_img/03.jpg" width="145" height="145"></div>';
   } //end for
  }
  else 
  {
	  echo '<br />';
   include('include/search_tab.htm');
  }
    
?>
     
<div class="center_title_bar">今日团购</div>
     
      <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/01.jpg" alt="" title="" border="0" /></a></div>
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/01.jpg" alt="" title="" border="0" /></a></div>
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/01.jpg" alt="" title="" border="0" /></a></div>
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/01.jpg" alt="" title="" border="0" /></a></div>
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