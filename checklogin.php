<?php  
  require "conn.php";
  $userID = 0;
  if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
  {
   if($_COOKIE['username'] == 'zcb' && $_COOKIE['password'] == '123')
   {
	$userID = 1;
	
	// 如果选择了喜欢的包包，或者用户上传了包包，则跳转到个性化推荐页面
	$sql_like = "select userID, bagURL from user_likebag where userID=" .$userID; 
    $query_like = mysql_query($sql_like, $con); 
    $num_like = mysql_num_rows($query_like);
	
	$sql_upload = "select * from user_uploadinfo where userID=" .$userID; 
    $query_upload = mysql_query($sql_upload, $con); 
    $num_upload = mysql_num_rows($query_upload);
	
   if($num_like>0)
	   header('Location: personalize.php?userID='.$userID.'&username='.$_COOKIE['username'].'&type='.'like');
	else if($num_upload>0)
	   header('Location: personalize.php?userID='.$userID.'&username='.$_COOKIE['username'].'&type='.'upload');  
	else    
	   header('Location: index.php?userID='.$userID.'&username='.$_COOKIE['username']);   // 否则，跳转到首页
	}
  }
  
  else  
   header('Location: index.php');
   
?>  