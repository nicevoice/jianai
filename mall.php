<?php require "conn.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="css/menu2.css" />
<link rel="stylesheet" type="text/css" href="css/loginWin.css" />
<link rel="stylesheet" type="text/css" href="include/style/tabStyle.css" />

<link rel="stylesheet" type="text/css" href="pro_dropdown_2/pro_dropdown_2.css" />
<script src="pro_dropdown_2/stuHover.js" type="text/javascript"></script>

<script type="text/javascript" src="include/style/jquery-1.3.2.min.js"></script>  
<script type="text/javascript" src="include/style/ui.tab.js"></script>


<script type="text/javascript">
var is_login =0;	
function checklogin(voteType,userID, bagType, bagID, bagName,bagPrice,mall,localPath,bagURL)
{
  if(!is_login)
   alertWin(400,160,'登录后才能投票，并能享受个性化的推荐服务！');
 else
 {
  userID = document.getElementById("userID").innerHTML;
 if(voteType==1)
   post_vote_like(voteType,userID, bagType, bagID, bagName,bagPrice,mall,localPath,bagURL);
 
 if(voteType==2)
    post_vote_midlike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL);
   
 if(voteType==3)
    post_vote_dislike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL);
 }
}


function postdata(){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "login_ok.php", //把数据提交到ok.php
data: "writer="+$("#txtName").val()+"&pass="+$("#txtPwd").val(), //输入框writer中的值作为提交的数据
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
is_login = 1;
$("#login_ok").html(msg); //如果有必要，可以把msg变量的值显示到某个DIV元素中
}
});
}

function post_vote_like(voteType,userID, bagType,bagID, bagName,bagPrice,mall,localPath,bagURL){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "vote_img_like.php", //把数据提交到ok.php
data: "voteType="+voteType+ "&userID="+userID+"&bagType="+bagType+"&bagID="+bagID+"&bagName="+bagName+"&bagPrice="+bagPrice+"&mall="+mall+"&localPath="+localPath+"&bagURL="+bagURL, //输入框writer中的值作为提交的数据
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
$("#div_like").html(msg); //如果有必要，可以把msg变量的值显示到某个DIV元素中
}
});
}

function post_vote_dislike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "vote_img_dislike.php", //把数据提交到ok.php
data: "voteType="+voteType+ "&userID="+userID+"&bagType="+bagType+"&bagName="+bagName+"&bagPrice="+bagPrice+"&mall="+mall+"&localPath="+localPath+"&bagURL="+bagURL, //输入框writer中的值作为提交的数据
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
$("#div_dislike").html(msg); //如果有必要，可以把msg变量的值显示到某个DIV元素中
}
});
}

function post_vote_midlike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "vote_img_midlike.php", //把数据提交到ok.php
data: "voteType="+voteType+ "&userID="+userID+"&bagType="+bagType+"&bagName="+bagName+"&bagPrice="+bagPrice+"&mall="+mall+"&localPath="+localPath+"&bagURL="+bagURL, //输入框writer中的值作为提交的数据
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
$("#div_dislike").html(msg); //如果有必要，可以把msg变量的值显示到某个DIV元素中
}
});
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
<div class="top_search"  id="login_ok">
        	<div class="search_text"><a href="#">注册</a></div>
            <div class="search_text"><a href="#" onclick="alertWin(400,160,'登录后才能投票，没有注册请先注册成为会员。');">登录</a></div>  
	</div>
	</div><!-- end of top_bar -->
 
  
   <div id="main_content"> 
      
 <!-- 导航菜单开始 -->
	<span class="preload1"></span>
   <span class="preload2"></span>

<ul id="nav">
	<li class="top"><a href="#nogo1" class="top_link"><span>首页</span></a></li>
		
	<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">女包</span></a>
		<ul class="sub">
			<li><a href="#nogo54">Online</a></li>
			<li><a href="#nogo55">Catalogue</a></li>
			<li><a href="#nogo56">Mail Order</a></li>
		</ul>
	</li>
    
    	
	<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">男包</span></a>
		<ul class="sub">
			<li><a href="#nogo54">Online</a></li>
			<li><a href="#nogo55">Catalogue</a></li>
			<li><a href="#nogo56">Mail Order</a></li>
		</ul>
	</li>
    
    	
	<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">功能箱包</span></a>
		<ul class="sub">
			<li><a href="#nogo54">Online</a></li>
			<li><a href="#nogo55">Catalogue</a></li>
			<li><a href="#nogo56">Mail Order</a></li>
		</ul>
	</li>
    
    <li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">功能箱包</span></a>
		<ul class="sub">
			<li><a href="#nogo54">Online</a></li>
			<li><a href="#nogo55">Catalogue</a></li>
			<li><a href="#nogo56">Mail Order</a></li>
		</ul>
	</li>
	<li class="top"><a href="#nogo57" id="privacy" class="top_link"><span>奢侈品</span></a></li>
</ul> 

 <!-- 导航菜单 结束 -->
         
            
    <div class="crumb_navigation">
    您当前的位置: <span class="current">首页</span>
    
    </div>        
    
    
   <div class="left_content">
    <div class="title_box">来源商家</div>
    
        <ul class="left_menu">
        <li class="odd"><a href="product_list.php">麦包包</a></li>
        <li class="even"><a href="product_list.php">当当网</a></li>
         <li class="odd"><a href="product_list.php">京东网</a></li>
        <li class="even"><a href="product_list.php">淘宝商城</a></li>
         <li class="odd"><a href="product_list.php">卓越亚马逊</a></li>
         <li class="even"><a href="product_list.php">凡客诚品</a></li>
        <li class="odd"><a href="product_list.php">梦芭莎</a></li>
        <li class="even"><a href="product_list.php">银泰</a></li>
         <li class="odd"><a href="product_list.php">尊酷网</a></li>
        <li class="even"><a href="product_list.php">爱上包包网</a></li>
         <li class="odd"><a href="product_list.php">新浪奢品</a></li>
         <li class="even"><a href="product_list.php">走秀网</a></li>
        </ul> 
        
        
     <div class="title_box">你喜欢的包包 </div>  
     <div id="div_like">     
     
      </div>  <!-- end of id="div_like" -->
      
      <div id="div_dislike">     
     
      </div>  
      
        <div class="title_box">你喜欢的包包 </div>  
            <div class="banner_adds"></div>    
    
   </div><!-- end of left content -->
   
  <?php  
  $userID = 1;
  /*if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
  {
   if($_COOKIE['username'] == 'zcb' && $_COOKIE['password'] == '123')
   {
	$userID = 1;
	echo '<script>';
	echo 'document.getElementById("login_ok").innerHTML= "<div class=\"login_text\">欢迎你：'.$_COOKIE['username']. '</div><div class=\"login_text\" id=\"userID\" style=\"display:none\">'.$userID.'</div>";';
	echo 'is_login=1;';
	echo '</script>'; */
	
	// 显示喜欢的包包	  
   $sql = "select userID, localAddress, bagURL from user_likebag where userID=" .$userID; 
   $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
   $show_like_bag ='';
   while($row=mysql_fetch_row($query))
   { 
    $show_like_bag= $show_like_bag. '<div class="border_box">';
    $show_like_bag= $show_like_bag. '<div class="collect_img"><a href="'.$row[2].'">';
    $show_like_bag= $show_like_bag. '<img src="'. $row[1]. '" width="90" height="90" border="0" />';
    $show_like_bag= $show_like_bag. '</a></div> </div>';  
   }
   
    echo '<script>';
	echo 'document.getElementById("div_like").innerHTML=\'' .$show_like_bag.'\''; 
	echo '</script>';	
	//}
  //}  
?>  

   <div class="center_content">
   	<div class="center_title_bar">输入图像 个性化推荐</div>
    
        
 <?php
    
   include('include/search_tab.htm');   
   
   //------热销的包包
    //$gbk = mysql_query("set names 'gbk'"); 
		
	$root = 'prod_img/img_danjianbao/';	
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'淘宝商城','1004'=>'当当网','1005'=>'亚马逊','1006'=>'凡客',
	'1007'=>'银泰网','1008'=>'走秀网','1009'=>'新浪商城','1010'=>'梦芭莎','1011'=>'尊酷网','1012'=>'爱上包包网');
	
	echo '<div class="center_title_bar">热销的包包</div>';
	$i=0;
    
	for($k=1;$k<=40;$k++)
	{
	 $sql = "select * from wdanjianbao where bagID=" .$k; 
	 $query = mysql_query($sql, $con); 
	 $row=mysql_fetch_row($query);
	 
	 $path = $root.$row[0].'.jpg'; 
	 $imgID = 'imgID_' . $k;
	 $imgPath = '<img id="'.$imgID.'" src="'.$path;
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px" title="点击查看相似的包包" />';
	echo   '<div class="prod_box">';
    echo   '<div class="top_prod_box"></div>';
    echo   '<div class="center_prod_box">';            
    echo   '<div class="product_img"><a href="'. $row[3].'">';
	echo    $imgPath;
	echo    '</a></div>';	
    echo   '<div class="product_title"><a href="'. $row[3].'">'. $row[1] .'</a></div>';	
	echo   '<div class="product_title">来源商家：'.$mall[$row[6]]. '</div>';	
   
    echo   '<div class="prod_price"><span class="product_title">价格：</span> <span class="price">&yen;'. $row[2]  .'</span></div>';                        
    echo   '</div>';
    echo   '<div class="bottom_prod_box"></div>';             
    echo   '<div class="prod_details_tab">';
    echo   '<table class="inquiry_table" id="inquiry">';
    echo   '<tr>';
    echo   '<td id="inquiry_like">';
	echo   '<a href="#" onclick="checklogin(1,\''.$userID. '\',\'wdanjianbao\',\''.$row[0].'\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">喜欢</a></td>';        
    echo   '<td id="inquiry_mid">'; 
	echo   '<a href="#" onclick="checklogin(2,\''.$userID. '\',\'wdanjianbao\',\''.$row[0].'\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">一般</a></td>';     
	echo   '<td id="inquiry_dislike">';  
	echo   '<a href="#" onclick="checklogin(3,\''.$userID. '\',\'wdanjianbao\',\''.$row[0].'\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">不喜欢</a></td>';              
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
		
	}   // end while
   
?>
 
    
<div class="center_title_bar">今日团购</div>
     
      <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_img"><a href="details.html"><img src="prod_img/3.jpg" border=0 width="160px" height="160px"/></a></div>
              <div class="product_title"><a href="details.html">ELLE(她)paradis帕瑞斯系列进口经典LOGO图案PVC料女士手袋E1024P08149BG米色</a></div>
                 <div class="prod_price"><span class="reduce">&yen;350</span> <span class="price">&yen;270</span></div>                        
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/1.jpg" border=0 width="160px" height="160px"/></a></div>
              <div class="product_title"><a href="details.html">ELLE(她)paradis帕瑞斯系列进口经典LOGO图案PVC料女士手袋E1024P08149BG米色</a></div>
                 <div class="prod_price"><span class="reduce">&yen;350</span> <span class="price">&yen;270</span></div>                        
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/1.jpg" border=0  width="160px" height="160px"/></a></div>
              <div class="product_title"><a href="details.html">ELLE(她)paradis帕瑞斯系列进口经典LOGO图案PVC料女士手袋E1024P08149BG米色</a></div>
                 <div class="prod_price"><span class="reduce">&yen;350</span> <span class="price">&yen;270</span></div>                        
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
                 <div class="product_img"><a href="details.html"><img src="prod_img/1.jpg" border=0 width="160px" height="160px"/></a></div>
              <div class="product_title"><a href="details.html">ELLE(她)paradis帕瑞斯系列进口经典LOGO图案PVC料女士手袋E1024P08149BG米色</a></div>
                 <div class="prod_price"><span class="reduce">&yen;350</span> <span class="price">&yen;270</span></div>                        
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

 <script language="javascript">
function alertWin(w, h, title){
     var titleheight = "22px"; // 提示窗口标题高度 
    var bordercolor = "#666699"; // 提示窗口的边框颜色 
    var titlecolor = "#FFFFFF"; // 提示窗口的标题颜色 
    var titlebgcolor = "#666699"; // 提示窗口的标题背景色
    var bgcolor = "#FFFFFF"; // 提示内容的背景色
   
    var iWidth = document.documentElement.clientWidth;
    var iHeight = document.documentElement.clientHeight;
    var bgObj = document.createElement("div");
    bgObj.id="bgObjId";
    bgObj.style.cssText = "position:absolute;left:0px;top:0px;width:"+iWidth+"px;height:"+Math.max(document.body.clientHeight, iHeight)+"px;filter:Alpha(Opacity=30);opacity:0.3;background-color:#000000;z-index:101;";
    document.body.appendChild(bgObj);
   
    var msgObj=document.createElement("div");
    msgObj.id="msgObjId";
    msgObj.style.cssText = "position:absolute;font:11px '宋体';top:"+(iHeight-h)/2+"px;left:"+(iWidth-w)/2+"px;width:"+w+"px;height:"+h+"px;text-align:center;border:1px solid "+bordercolor+";background-color:"+bgcolor+";padding:1px;line-height:22px;z-index:102;";
    document.body.appendChild(msgObj);
   
    var table = document.createElement("table");
    msgObj.appendChild(table);
    table.style.cssText = "margin:0px;border:0px;padding:0px;";
    table.cellSpacing = 0;
   
    var msgBox = table.insertRow(-1).insertCell(-1);
    msgBox.style.cssText = "font:10pt '宋体';";
    msgBox.colSpan = 2;
   
    /*var msgs = "<span>账 号：</span><input type='text' id='txtName' style='width: 120px' /><br />"
                +"<span>密 码：</span><input type='password' id='txtPwd' style='width: 120px' /><br />"
                +"<input type='button' value='登录' onclick='getValue(\""+bgObj.id+"\",\""+msgObj.id+"\")' />";	*/
				
	var msgs = "<div id='login'><div id='title'>" + title +
	           "</div><div style='width:320px;height:80px;margin:0px auto;'>"	
	           + "<table id='loginbox' border='0' cellpadding='0' cellspacing='0'>  <tr style='height:30px'>"	
			   + "<td class='bfont'>用户名：</td>   <td><input class='txtbox' type='text'  id='txtName' /></td>  </tr> <tr>"	
			   + " <td class='bfont'>密&nbsp;&nbsp;码：</td>"+
			   " <td><input class='txtbox' type='password' id='txtPwd' value='' /></td>    </tr>  </table>"
			   + "  <div id='btnlogin'><a href='#'><img src='images/login.gif' width='55' height='55' onclick='getValue()' /></a></div> </div>"
               + "<div id='forget'>  <span style='float:left;'><a href='#' onclick='closeDIV()'>不想登录</a></span> 	<span style='float:left;'><a href='#'>忘记密码</a></span></div>"
			   + "<div style='height:25px;line-height:25px;text-align:center'>马上注册, 即可享受每月一次的个性化推荐服务。" 
			   + "<a style='color:#06F;text-decoration:underline;font-weight:700' href='#'>点击注册</a></div></div>";
			    	    		  			
    msgBox.innerHTML = msgs;
   
    // 获得事件Event对象，用于兼容IE和FireFox
    function getEvent() {
        return window.event || arguments.callee.caller.arguments[0];
    }
}
//执行后台 click()
function getValue()
{
  // document.getElementById("login_button").click();
  postdata();     
  var bgObj = document.getElementById("bgObjId");
  var msgObj = document.getElementById("msgObjId");
   
  document.body.removeChild(bgObj);
  document.body.removeChild(msgObj); 
   
    //执行隐藏服务器按钮后台事件
    // document.getElementById("btnOk").click();
}

function closeDIV()
{
    var bgObj = document.getElementById("bgObjId");
    var msgObj = document.getElementById("msgObjId");
   
    document.body.removeChild(bgObj);
    document.body.removeChild(msgObj);
      
}
</script>

</body>
</html>

