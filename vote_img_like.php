
<?php
header("Content-Type: text/html; charset=utf-8");   
require "conn.php";

$voteType=$_POST['voteType'];
$userID=$_POST['userID'];
$bagType=$_POST['bagType'];
$bagID=$_POST['bagID'];
$bagName=$_POST['bagName'];
$bagPrice=$_POST['bagPrice'];
$mall=$_POST['mall'];
$localPath=$_POST['localPath'];
$bagURL=$_POST['bagURL'];
$imgPath = 'userRecord/'.$userID.'/'.$bagType.'/';
 
  // 检查是否重复选择
  $sql = "select userID, bagURL from user_likebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
  $query = mysql_query($sql, $con); 
  $num_rows = mysql_num_rows($query);
  
  if($num_rows>0)
  {
	  echo "<script> alert('你已经选择过该包包了！'); </script>";
  
  // 显示喜欢的包包	  
  $sql = "select userID, localAddress, bagURL from user_likebag where userID=" .$userID; 
  $query = mysql_query($sql, $con); 
   while($row=mysql_fetch_row($query))
   { 
    echo '<div class="border_box">';
    echo  '<div class="collect_img"><a href="'.$row[2].'">';
    echo  '<img src="'. $row[1]. '" width="90" height="90" border="0" />';
    echo  '</a></div> </div>';  
   }
  }
  else
  {  
  // 在 user_midlikebag 表中查找是否有重复的记录
  $sql_midlike = "select userID, bagURL, localAddress from user_midlikebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
  $query_midlike = mysql_query($sql_midlike, $con); 
  $num_midlike = mysql_num_rows($query_midlike);
  
  if($num_midlike >0)
  {
	$row=mysql_fetch_row($query_midlike);  
	  // 删除记录
	$sql = "delete from user_midlikebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
    $query = mysql_query($sql, $con); 
	  
	  // 删除图片
	 $path = $row[2]; 
	 unlink($path);
  }  // end if($num__midlike >0)
  else
  {
   // 在 user_dislikebag 表中查找是否有重复的记录
  $sql_dislike = "select userID, bagURL, localAddress from user_dislikebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
  $query_dislike = mysql_query($sql_dislike, $con); 
  $num_dislike = mysql_num_rows($query_dislike);
  
  if($num_dislike >0)
  {
	 $row=mysql_fetch_row($query_dislike);  
	  // 删除记录
	$sql = "delete from user_dislikebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
    $query = mysql_query($sql, $con); 
	  
	  // 删除图片
	 $path = $row[2]; 
	 unlink($path);
  }  
  } // end else
  
  // 拷贝图片
  if(!is_dir($imgPath))
     mkdir($imgPath);
  
  $path = $imgPath. 'like/';
  if(!is_dir($path))
     mkdir($path);
  
  $name = time().'.jpg';
  $path = $path.$name; 
  copy($localPath, $path);
 
  
  
  // 把喜欢的图片插入数据库
  $sql_lbp = "select * from similar_lbp_hsv where bagID=" .$bagID." limit 1"; 
  $query_lbp = mysql_query($sql_lbp, $con) or die("Invalid query: " . mysql_error());
  $row_lbp=mysql_fetch_row($query_lbp);
    
   $sql = "insert into user_likebag(userID, bagType, bagID, bagName,mallID,bagPrice,localAddress,bagURL,slbp1,slbp2,slbp3,slbp4,shsv1,shsv2,shsv3,shsv4, scom1, scom2, scom3, scom4) values(";
   $sql = $sql. $userID. ",'".$bagType. "',".$bagID.",'".$bagName."',".$mall.",".$bagPrice.",'".$path."','".$bagURL."',".$row_lbp[1].",".$row_lbp[2].",".$row_lbp[3].",".$row_lbp[4].",".$row_lbp[5].",".$row_lbp[6].",".$row_lbp[7].",".$row_lbp[8]; 
   $sql = $sql.",". $row_lbp[9].",".$row_lbp[10].",".$row_lbp[11].",".$row_lbp[12].")";
   $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error());
   
  // 查询数据库	 
  $sql = "select userID, localAddress, bagURL from user_likebag where userID=" .$userID; 
  $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error());
 
  while($row=mysql_fetch_row($query))
  { 
    echo '<div class="border_box">';
    echo  '<div class="collect_img"><a href="'.$row[2].'">';
    echo  '<img src="'. $row[1]. '" width="90" height="90" border="0" />';
    echo  '</a></div> </div>';  
  }
 }

?> 


