<?php
    $uploadPath = 'd:/120.jpg';
   $userID = 1211;
   $bagType = 'wshuangjianbao';
  // $bagType = 'wdanjianbao';
   
   $com = new COM("recommBag") or die("无法建立COM组件");  
	$flag = $com->similarBag($uploadPath, $userID, $bagType);
	echo $flag; 

?>