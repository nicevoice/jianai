<?php
 require "conn.php";
 
 if(!empty($_GET['userID']))
 {
 $userID=$_GET['userID'];
 $username=$_GET['username'];
 $type=$_GET['type'];
 } 
 else
   header('Location: index.php');
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="css/menu2.css" />
<link rel="stylesheet" type="text/css" href="css/loginWin.css" />
<link rel="stylesheet" type="text/css" href="include/style/tabStyle.css" />

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>  
<script type="text/javascript" src="include/style/ui.tab.js"></script>

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
	
function checklogin(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL)
{
 userID = document.getElementById("userID").innerHTML;
 if(voteType==1)
   post_vote_like(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL);
 
 if(voteType==2)
    post_vote_midlike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL);
   
 if(voteType==3)
    post_vote_dislike(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL);
}


function post_vote_like(voteType,userID, bagType,bagName,bagPrice,mall,localPath,bagURL){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "vote_img_like.php", //把数据提交到ok.php
data: "voteType="+voteType+ "&userID="+userID+"&bagType="+bagType+"&bagName="+bagName+"&bagPrice="+bagPrice+"&mall="+mall+"&localPath="+localPath+"&bagURL="+bagURL, //输入框writer中的值作为提交的数据
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
       <div class="login_text">欢迎你： <?php echo $username;  ?></div>
	</div>
	</div><!-- end of top_bar -->
 
  
   <div id="main_content"> 
   
            <div id="navigation_menu" style="width:1000px; height:31px;background-color:#EAEAEA;">
               <ul id="navigation"> 
                  <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="#">首页</a> 
                   </li> 

              
               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">女包</a> 
                  <ul> 
                    <li><a href="product_list.php">单肩包</a></li> 
                    <li><a href="product_list.php">斜跨包</a></li> 
                    <li><a href="product_list.php">手提包</a></li> 
                    <li><a href="product_list.php">双肩包</a></li> 
                   </ul> 
              </li> 

               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">男包</a> 
                  <ul> 
                    <li><a href="product_list.php">公文包</a></li> 
                    <li><a href="product_list.php">休闲包</a></li> 
                  </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">功能箱包</a> 
                  <ul> 
                    <li><a href="product_list.php">旅行包</a></li> 
                    <li><a href="product_list.php">电脑包</a></li> 
                    <li><a href="product_list.php">拉杆箱</a></li> 
                    <li><a href="product_list.php">运动包</a></li> 
                    <li><a href="product_list.php">登山包</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">钱包/手包</a> 
                  <ul> 
                    <li><a href="product_list.php">女款钱包</a></li> 
                    <li><a href="product_list.php">男款钱包</a></li> 
                    <li><a href="product_list.php">女款手包</a></li> 
                    <li><a href="product_list.php">男款手包</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">奢侈品</a> 
               </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">团购包</a> 
                  <ul> 
                    <li><a href="product_list.php">菜单1</a></li> 
                    <li><a href="product_list.php">菜单2</a></li> 
                    <li><a href="product_list.php">菜单3</a></li> 
                    <li><a href="product_list.php">菜单4</a></li> 
                 </ul> 
              </li> 
              
               <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">二手包包</a> 
                  <ul> 
                    <li><a href="product_list.php">菜单1</a></li> 
                    <li><a href="product_list.php">菜单2</a></li> 
                    <li><a href="product_list.php">菜单3</a></li> 
                    <li><a href="product_list.php">菜单4</a></li> 
                 </ul> 
              </li> 
              
              <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
                <a href="product_list.php">正在搜的包包</a> 
               </li> 
              
            </ul> 
     </div>  <!-- end of navigation menu   -->
            
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
         
      <div class="banner_adds"></div>    
    
   </div><!-- end of left content -->
   
  <?php  
  	// 显示喜欢的包包	  
   $sql = "select userID, localAddress, bagURL from user_likebag where userID=" .$userID; 
   $query = mysql_query($sql, $con); 
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
	
?>  

   <div class="center_content">
         
 <?php
     
   //------个性化推荐部分
   	$root = 'prod_img/img_danjianbao/';	
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'淘宝商城','1004'=>'当当网','1005'=>'亚马逊','1006'=>'凡客',
	'1007'=>'银泰网','1008'=>'走秀网','1009'=>'新浪商城','1010'=>'梦芭莎','1011'=>'尊酷网','1012'=>'爱上包包网');
	$title_idx = array('1'=>'一','2'=>'二','3'=>'三','4'=>'四','5'=>'五');
	$tidx = 1;
	
	$sql_like = "select * from user_likebag where userID=" .$userID. " order by voteTime desc limit 0, 5"; 
	$query_like = mysql_query($sql_like, $con)or die("Invalid query: " . mysql_error()); 
	
	while($row_like=mysql_fetch_row($query_like))
	{		
	echo '<div class="center_title_bar">个性化推荐'.$title_idx[$tidx++].'</div>';
	for($k=1;$k<=8;$k++)
	{
	 $idx = 8+$k;
	 $sql = "select * from wdanjianbao where bagID=" .$row_like[$idx]; 
	 $query = mysql_query($sql, $con)or die("Invalid query: " . mysql_error()); 
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
	echo   '<a href="#" onclick="checklogin(1,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">喜欢</a></td>';        
    echo   '<td id="inquiry_mid">'; 
	echo   '<a href="#" onclick="checklogin(2,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">一般</a></td>';     
	echo   '<td id="inquiry_dislike">';  
	echo   '<a href="#" onclick="checklogin(3,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">不喜欢</a></td>';              
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
	}
   
   // 记录复杂性推荐
   for($i=1;$i<=4;$i++)
	  $similar_com[]= $row_like[16+$i];
	}   // end while
	
   // 复杂性推荐
   echo '<div class="center_title_bar">你还可能喜欢</div>';
   for($k=0;$k<=count($similar_com), $k<8;$k++)
	{
	$sql = "select * from wdanjianbao where bagID=" .$similar_com[$k]; 
	 $query = mysql_query($sql, $con)or die("Invalid query: " . mysql_error()); 
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
	echo   '<a href="#" onclick="checklogin(1,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">喜欢</a></td>';        
    echo   '<td id="inquiry_mid">'; 
	echo   '<a href="#" onclick="checklogin(2,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">一般</a></td>';     
	echo   '<td id="inquiry_dislike">';  
	echo   '<a href="#" onclick="checklogin(3,\''.$userID. '\',\'wdanjianbao\',\''.$row[1].'\',\''. $row[2].'\',\''.$row[6].'\',\''.$path.'\',\''. $row[3].'\')">不喜欢</a></td>';              
    echo  '</tr>';
    echo  '</table>';
	echo  '</div>';
	echo  '</div>';
	}
	   
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

 <script language="javascript">

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

</script>

</body>
</html>

