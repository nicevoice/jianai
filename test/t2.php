<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php
  $uploadPath = 'd:/120.jpg';
   $userID = 1211;
 
  $com = new COM("danJianBao") or die("无法建立COM组件");
		 
  $flag = $com->recommDanJianBao($uploadPath, $userID);
  
  echo $flag; 
  
  
?>

</body>
</html>
