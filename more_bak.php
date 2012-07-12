<?php
 require "conn.php"; 
  mb_internal_encoding('UTF-8');
  
  // 获取参数
  if(isset($_GET['type']))
     $bagtype = $_GET['type'];
    
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>荐爱网: 所荐即所爱</title>
<link rel="stylesheet" type="text/css" href="css/style_showbox.css"/>
<link href="css/brand_more.css" type="text/css" rel="stylesheet"/>
 <link rel="stylesheet" type="text/css" href="css/paginate.css">
 
<script type="text/javascript" src="include/style/jquery-1.3.2.min.js"></script>  
<script src="js/popup_layer.js" type="text/javascript" language="javascript"></script>

 <script language="javascript">
		$(document).ready(function() {
			//示例1，默认弹出层
			new PopupLayer({trigger:"#ele1",popupBlk:"#blk1",closeBtn:"#close1"});
		});
			
	</script>
    
</head>


<body>

<div id="top_navigation">    </div>  
    
<div id="main_container">
  <div class="top_bar"> <img src="images/logo.jpg" style="padding:5px 0 0 320px"/> </div>
   
   <div id="main_content"> 
    
    <div class="center_content">
   <div class="center_title_bar"><strong>1F:</strong> 女式单肩包（点击包包图像，我们将为你推荐风格相似的包包）</div>
   <img src="images/bar_bg_4.jpg" style="padding:0px" />
   <div class="spread"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">商家：</li>
            <li><a href="#">不限</a> </li>
            <li><a href="#">天猫商城</a> </li>
            <li><a href="#">麦包包</a> </li>
            <li><a href="#">京东商城</a> </li>
            <li><a href="#">亚马逊</a> </li>
            <li><a href="#">当当商城</a> </li>
            <li><a href="#">凡客</a> </li>
            <li><a href="#">银泰网</a> </li>
            <li><a href="#">走秀网</a> </li>
            <li><a href="#">梦芭莎</a> </li>
            <li><a href="#">尊酷网</a> </li>
          </ul>      
   </div>  <!-- end of spread  -->
   
   <div> ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
    
   <div class="spread"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">品牌：</li>
             <li><a href="#">不限</a> </li>
            <li><a href="#">gucci</a> </li>
            <li><a href="#">parada</a> </li>
            <li><a href="#">斜挎包</a> </li>
            <li><a href="#">钱包</a> </li>
            <li><a href="#">钱包</a> </li>
            <li><a href="#">钱包</a> </li>
               <li><a href="#">钱包</a> </li>
                <li><a href="#">钱包</a> </li>
                 <li><a href="#">钱包</a> </li>
                  <li><a href="#">钱包</a> </li>
                <li id="ele1" class="tigger">更多</li>
           </ul>      
   </div>  <!-- end of spread  -->
   
   <div id="blk1" class="blk" style="display:none;">
            <div class="head"><div class="head-right"></div></div>
            <div class="main">
                <a href="javascript:void(0)" id="close1" class="closeBtn">关闭</a>
                <ul>
                   <li><a href="#">项目1</a></li>
                    <li><a href="#">项目2</a></li>
                    <li><a href="#">项目3</a></li>
                    <li><a href="#">项目4</a></li>
                    <li><a href="#">项目5</a></li>
                    <li><a href="#">项目6</a></li>
                    <li><a href="#">项目7</a></li>
                    <li><a href="#">项目8</a></li>
                    <li><a href="#">项目9</a></li>
                    <li><a href="#">项目10</a></li>
                    <li><a href="#">项目11</a></li>
                    <li><a href="#">项目12</a></li>
                </ul>
            </div>
            <div class="foot"><div class="foot-right"></div></div>
        </div>  <!-- end of blk1  -->
   
   <div> ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
   <div class="spread"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">价格：</li>
             <li><a href="#">不限</a> </li>
            <li><a href="#">1-100元</a> </li>
            <li><a href="#">100-200元</a> </li>
            <li><a href="#">200-300元</a> </li>
            <li><a href="#">300-400元</a> </li>
            <li><a href="#">400-500元</a> </li>
            <li><a href="#">500元以上</a> </li>
          </ul>      
   </div>  <!-- end of spread  -->
   <div> ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
           
 <?php
function dynamic_substr($str)
 {
  //$str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
  $str = str_replace('&nbsp;','',$str);
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
  
	$root = 'prod_img/wdanjianbao/';	
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'淘宝商城','1004'=>'当当网','1005'=>'亚马逊','1006'=>'凡客',
	'1007'=>'银泰网','1008'=>'走秀网','1009'=>'新浪商城','1010'=>'梦芭莎','1011'=>'尊酷网','1012'=>'爱上包包网');
	
	// 获取当前页数
	$page = (isset($_GET['page']))? intval($_GET['page']):1;
		
	//设置每页显示的数量
	$pageSize = 36;
	$adjacents =3;
	
	//获取总的数据量
	$sql = "select count(*) as amount from wdanjianbao where score<3997";   
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result) or die("Invalid query: " . mysql_error());
	$amount = $row[0];
	
	if($amount)
	{
	  if($amount < $pageSize)  //如果总数据量小于 pagesize, 那么只有一页
	     $page_count = 1;
	  if($amount % $pageSize)
	     $page_count = (int)($amount/$pageSize)+1; //如果有余数，则需加 1
	  else
	     $page_count = $amount/$pageSize;  //如果没有余数		 
	}  // end if($amount)
	else
	   $page_count = 0;
	
	// 显示当前页的商品
	if($amount)
	{		  
	$sql = "select * from wdanjianbao where score<3997 order by score desc, mallID limit ". ($page-1)*$pageSize.", ".$pageSize; 
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
    while($row=mysql_fetch_row($query))
	{	 
	 $path = $root.$row[0].'.jpg'; 
	 $imgID = 'imgID_' . $row[0];
	 $imgPath = '<img id="'.$imgID.'" src="'.$path;
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type=wdanjianbao&id='.$row[0].'">';
	echo    $imgPath;
	echo  '<span class="www_zzjs_net"><ul>';
	echo  '<li>'.dynamic_substr($row[1]).'</li>';
	echo  '<li>价格：&yen;'.$row[2].'</li><li>商家：'. $mall[$row[6]].'</li>';
	echo  '</ul></span></a></div>';	
    echo   '<div class="bottom_prod_box"></div>';             
  	echo  '</div>';
	}// end while
	
	echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';
	// call pagination function:
     include("css/pagination3.php");
	 $reload = $_SERVER['PHP_SELF'] . "?page_count=" . $page_count;
	 echo paginate_three($reload, $page, $page_count, $adjacents);
	} // end if($amount)
	   
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

