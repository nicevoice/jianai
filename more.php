<?php
 include 'header.php';
  // 获取参数
  //类型
  if(isset($_GET['tt']))
     $bagtype = $_GET['tt'];
  else
     $bagtype ='wdanjianbao';
 	 
  //商家
  if(isset($_GET['mm']))
    $mm = $_GET['mm'];
  else
   $mm = 1000;
 
 //品牌 
  if(isset($_GET['bb']))
  {
     $arr =  explode('-',$_GET['bb']); 
	 $b1= $arr[0];
	 $b2= $arr[1];
	 $bb = $b1.'-'.$b2;
	 $bid = 'b'.$b1;
  }
  else
  {
    $b1 = 0;
	$b2 = 300; 
	$bb = $b1.'-'.$b2; 
	$bid = 'b'.$b1;
  }
  
  //价格
  if(isset($_GET['pp']))
  {
     $arr =  explode('-',$_GET['pp']); 
	 $p1= $arr[0];
	 $p2= $arr[1];
	 $pp = $p1.'-'.$p2;
	 $pid = 'p'.$p1;
  }
  else
  {
    $p1 = 0;
	$p2 = 1000000; 
	$pp = $p1.'-'.$p2; 
	$pid = 'p'.$p1;
  }
  
 $bagChineseName = array('wdanjianbao'=>'女式单肩包','wxiekuabao'=>'女式斜挎包','wshoutibao'=>'女式手提包','wshuangjianbao'=>'女式双肩包','wshounabao'=>'女式手拿包',
                         'mdanjianbao'=>'男式单肩包','mgongwenbao'=>'男式公文包','mqianbao_yaobao'=>'男式钱包','mshounabao'=>'男式手包',
						 'glaganxiang'=>'拉杆箱','glvxingbao'=>'旅行包','gyundongbao'=>'运动包'); 
?>

<link rel="stylesheet" href="css/brand_more.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/paginate.css">
<link rel="stylesheet" type="text/css" href="css/css_menu/pro_dropline_1.css" />

<script src="js/popup_layer.js" type="text/javascript" language="javascript"></script>

<script language="javascript">
	$(document).ready(function() {
		//示例1，默认弹出层
		new PopupLayer({trigger:"#ele1",popupBlk:"#blk1",closeBtn:"#close1"});
	});
    function select(mm,bb,pp){
        var url = "more.php?tt=";
    	url = url+ "<?php echo $bagtype; ?>" +"&mm="+mm+"&bb="+bb+"&pp="+pp;
    	window.location.href= url;
    }
</script>
   
   <div id="main_content"> 
   <div class="center_content">
   <div class="lead">
       <h4>
           <i class="icon-search"></i>
           <?php echo $bagChineseName[$bagtype]; ?>（点击包包图像，点击图片获得相似产品）</h4>
   </div>
   
   <div class="well form-horizontal">

   <div class="spread clearfix"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">商家：</li>
            <li id="1000"><a href="#" onclick="select('1000','<?php echo $bb; ?>','<?php echo $pp; ?>')">不限</a> </li>
            <li id="1006"><a href="#" onclick="select('1006','<?php echo $bb; ?>','<?php echo $pp; ?>')">天猫商城</a> </li>
            <li id="1001"><a href="#"  onclick="select('1001','<?php echo $bb; ?>','<?php echo $pp; ?>')">麦包包</a> </li>
            <li id="1002"><a href="#"  onclick="select('1002','<?php echo $bb; ?>','<?php echo $pp; ?>')">京东商城</a> </li>
            <li id="1003"><a href="#"  onclick="select('1003','<?php echo $bb; ?>','<?php echo $pp; ?>')">亚马逊</a> </li>
            <li id="1005"><a href="#"  onclick="select('1005','<?php echo $bb; ?>','<?php echo $pp; ?>')">当当商城</a> </li>
            <li id="1007"><a href="#"  onclick="select('1007','<?php echo $bb; ?>','<?php echo $pp; ?>')">凡客</a> </li>
            <li id="1010"><a href="#"  onclick="select('1010','<?php echo $bb; ?>','<?php echo $pp; ?>')">银泰网</a> </li>
            <li id="1004"><a href="#" onclick="select('1004','<?php echo $bb; ?>','<?php echo $pp; ?>')">走秀网</a> </li>
            <li id="1009"><a href="#"  onclick="select('1009','<?php echo $bb; ?>','<?php echo $pp; ?>')">梦芭莎</a> </li>
            <li id="1008"><a href="#"  onclick="select('1008','<?php echo $bb; ?>','<?php echo $pp; ?>')">尊酷网</a> </li>
          </ul>      
   </div>  <!-- end of spread  -->
   
    
   <div class="spread clearfix"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">品牌：</li>
             <li id="b0"><a href="#" onclick="select('<?php echo $mm; ?>','0-300','<?php echo $pp; ?>')">不限</a> </li>
             <?php
	    if($bagtype=='wdanjianbao' || $bagtype=='wxiekuabao' || $bagtype=='wshoutibao' || $bagtype=='wshuangjianbao' || $bagtype=='wshounabao')
		   $brand_table = 'brand_women';
		   
		else if($bagtype=='mdanjianbao' || $bagtype=='mgongwenbao' || $bagtype=='mqianbao_yaobao' || $bagtype=='mshounabao' )
		   $brand_table = 'brand_men';
		   
		else if($bagtype=='glaganxiang' || $bagtype=='glvxingbao' || $bagtype=='gyundongbao')
		   $brand_table = 'brand_gn';
		   
		$sql = "select * from ".$brand_table." where ".$bagtype.">0 order by ".$bagtype." desc"; 
	    $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
		$count=1;
        while($row=mysql_fetch_row($query))
	    {
			$brandID = 'b'.$row[0];
			$brand = $row[0] .'-'.$row[0];
			echo '<li id="'.$brandID.'"><a href="#" onclick="select(\''.$mm.'\',\''.$brand.'\',\''.$pp.'\')">'.$row[1].'</a></li>';	   	
			$count++;
			if($count>9)
			  break;	   	
	    }
	     
		 if($count>9)
	        echo '<li id="ele1" class="tigger">更多</li>';
	  	?>     
       </ul>      
   </div>  <!-- end of spread  -->
   
   <div id="blk1" class="blk" style="display:none;">
            <div class="head"><div class="head-right"></div></div>
            <div class="main">
                <a href="javascript:void(0)" id="close1" class="closeBtn">关闭</a>
                <ul>
     <?php
    if ($count > 9) {
        while ($row = mysql_fetch_row($query)) {
            $brandID = 'b' . $row[0];
            $brand = $row[0] . '-' . $row[0];
            echo '
<li id="' . $brandID . '">
    <a href="#" onclick="select(\'' . $mm . '\',\'' . $brand . '\',\'' . $pp . '\')">' . $row[1] . '</a>
</li>';
        }
    }
?>                 
                </ul>
            </div>
            <div class="foot"><div class="foot-right"></div></div>
        </div>  <!-- end of blk1  -->

   <div class="spread clearfix"> 
         <ul style="padding:5px"> 
            <li style="font-weight:bold">价格：</li>
            <li id="p0"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','0-1000000')">不限</a> </li>
            <li id="p1" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','1-100')">1-100元</a> </li>
            <li id="p100" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','100-300')">100-300元</a> </li>
            <li id="p300" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','300-500')">300-500元</a> </li>
            <li id="p500" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','500-1000')">500-1000元</a> </li>
            <li id="p1000" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','1000-5000')">1000-5000元</a> </li>
            <li id="p5000" style="width:90px"><a href="#" onclick="select('<?php echo $mm; ?>','<?php echo $bb; ?>','5000-1000000')">5000元以上</a> </li>
          </ul>      
   </div>  <!-- end of spread  -->
   
    </div>
 <?php

function dynamic_substr($str)
 {
  //$str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
  //$str = str_replace('&nbsp;','',$str);
  $len1= strlen($str);
  
  $substr = mb_substr($str,0,30);  
   $len2 = strlen($substr); 
  //if($len2<=55)
   // $substr = mb_substr($str,0,35); 
  if($len2>=68)
    $substr = mb_substr($str,0,25);
  
   $len2 = strlen($substr); 
  
  if($len2<$len1)
     $substr = $substr . '...';
	
  return $substr;	
 }
  
	$root = 'prod_img/'.$bagtype.'/';	
	$mall = array('1001'=>'麦包包','1002'=>'京东商城','1003'=>'亚马逊','1004'=>'走秀网','1005'=>'当当网','1006'=>'天猫商城','1007'=>'凡客诚品','1008'=>'尊酷网','1009'=>'梦芭莎','1010'=>'银泰网','1011'=>'爱上包包网');
	
	// 获取当前页数
	$page = (isset($_GET['page']))? intval($_GET['page']):1;
		
	//设置每页显示的数量
	$pageSize = 36;
	$adjacents =3;
	
	//获取总的数据量
	if($mm==1000)
	{
	$sql = "select count(*) as amount from ".$bagtype." where score<3997 and mallID>".$mm;
	$sql = $sql." and brandID>=".$b1." and brandID<=".$b2." and bagPrice>=".$p1." and bagPrice<=".$p2; 
	}
	else
	{
	$sql = "select count(*) as amount from ".$bagtype." where score<3997 and mallID=".$mm;
	$sql = $sql." and brandID>=".$b1." and brandID<=".$b2." and bagPrice>=".$p1." and bagPrice<=".$p2; 
	}
	
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result) or die("Invalid query: " . mysql_error());
	$amount = $row[0];
	
	if(empty($amount))
	  echo '对不起，暂时没有查询到相关的包包，请尝试查询别的选项！';
	
	if($amount)
	{
	  if($amount < $pageSize)  //如果总数据量小于 pagesize, 那么只有一页
	     $page_count = 1;
	  if($amount % $pageSize)
	     $page_count = (int)($amount/$pageSize)+1; //如果有余数，则需加 1
	  else
	     $page_count = $amount/$pageSize;  //如果没有余数	
	  
	  if($page_count>50)
	    $page_count = 50;	    	 
	}  // end if($amount)
	else
	   $page_count = 0;
	
	// 显示当前页的商品
	if($amount)
	{
	if($mm==1000)
	{
    $sql = "select * from ".$bagtype." where score<3997 and mallID>".$mm;
	$sql = $sql." and brandID>=".$b1." and brandID<=".$b2." and bagPrice>=".$p1." and bagPrice<=".$p2; 		  
	$sql = $sql." order by score desc, mallID limit ". ($page-1)*$pageSize.", ".$pageSize; 
	}
	else
	{
    $sql = "select * from ".$bagtype." where score<3997 and mallID=".$mm;
	$sql = $sql." and brandID>=".$b1." and brandID<=".$b2." and bagPrice>=".$p1." and bagPrice<=".$p2;    				  
	$sql = $sql." order by score desc, mallID limit ". ($page-1)*$pageSize.", ".$pageSize; 
	}
		
	
	$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
    while($row=mysql_fetch_row($query))
	{	 
	 $path = $root.$row[0].'.jpg'; 
	 $imgID = 'imgID_' . $row[0];
	 $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
	 $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
	echo  '<div class="prod_box">';
    echo  '<div class="product_img"><a href="similarbag.php?type='.$bagtype.'&id='.$row[0].'">';
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
	 $reload = $_SERVER['PHP_SELF'].'?tt='.$bagtype.'&mm='.$mm.'&bb='.$bb.'&pp='.$pp;
	 $reload = $reload . "&page_count=" . $page_count;
	 echo paginate_three($reload, $page, $page_count, $adjacents);
	} // end if($amount)
	   
?>
 
 <script language="javascript">
 //商城部分的效果控制
  document.getElementById("<?php echo $mm;?>").style.background = "#F9F";
  var content = document.getElementById("<?php echo $mm;?>").innerHTML; // 去除超链接
  content = content.replace(/<a.*?>/ig,""); 
   content = content.replace(/<\/a>/ig,""); 
   document.getElementById("<?php echo $mm;?>").innerHTML = content;
   
  //品牌部分的效果控制
  document.getElementById("<?php echo $bid;?>").style.background = "#F9F";
  var content = document.getElementById("<?php echo $bid;?>").innerHTML; // 去除超链接
  content = content.replace(/<a.*?>/ig,""); 
   content = content.replace(/<\/a>/ig,""); 
   document.getElementById("<?php echo $bid;?>").innerHTML = content;
 
   
   //价格部分的效果控制
  document.getElementById("<?php echo $pid;?>").style.background = "#F9F";
  var content = document.getElementById("<?php echo $pid;?>").innerHTML; // 去除超链接
  content = content.replace(/<a.*?>/ig,""); 
   content = content.replace(/<\/a>/ig,""); 
   document.getElementById("<?php echo $pid;?>").innerHTML = content;
 
  
 </script>
        
    </div><!-- end of center content --><!-- end of right content -->   
 </div><!-- end of main content -->
   
   
   
<?php
    include 'footer.php';
?>

