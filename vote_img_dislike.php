
<?php
header("Content-Type: text/html; charset=utf-8");   
require "conn.php";

$voteType=$_POST['voteType'];
$userID=$_POST['userID'];
$bagType=$_POST['bagType'];
$bagName=$_POST['bagName'];
$bagPrice=$_POST['bagPrice'];
$mall=$_POST['mall'];
$localPath=$_POST['localPath'];
$bagURL=$_POST['bagURL'];
$imgPath = 'userRecord/'.$userID.'/'.$bagType.'/';
 
  // 检查是否重复选择
  $sql = "select userID, bagURL from user_dislikebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
  $query = mysql_query($sql, $con); 
  $num_rows = mysql_num_rows($query);
  
  if($num_rows>0)
  {
	  echo "<script> alert('你已经选择过该包包了！'); </script>";
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
   // 在 user_likebag 表中查找是否有重复的记录
  $sql_like = "select userID, bagURL, localAddress from user_likebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
  $query_like = mysql_query($sql_like, $con); 
  $num_like = mysql_num_rows($query_like);
  
  if($num_like >0)
  {
	$row_like=mysql_fetch_row($query_like);  
	  // 删除记录
	$sql = "delete from user_likebag where userID=" .$userID." and bagURL='".$bagURL. "'"; 
    $query = mysql_query($sql, $con); 
	  
	  // 删除图片
	 $path = $row_like[2]; 
	 unlink($path);
  }  
  } // end else
  
  // 拷贝图片
  if(!is_dir($imgPath))
     mkdir($imgPath);
  
  $path = $imgPath. 'dislike/';
  if(!is_dir($path))
     mkdir($path);
	 
  $name = time().'.jpg';
  $path = $imgPath. 'dislike/'.$name; 
  copy($localPath, $path);
  
  
  // 把喜欢的图片插入数据库  
   $sql = "insert into user_dislikebag(userID, bagType,bagName,mallID,bagPrice,localAddress,bagURL) values(".$userID. ",'".$bagType. "','".$bagName."',".$mall.",".$bagPrice.",'".$path."','".$bagURL."')"; 
   $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error());
   
    echo "<script> alert('选择成功！'); </script>"; 
  
 }

?> 


