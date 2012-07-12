<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
function dynamic_substr($str)
{
  $substr = mb_substr($str,0,10);
  if(strlen($substr)<20)
    $substr = mb_substr($str,0,14); 
 
 return $substr;	
}

   mb_internal_encoding('UTF-8');
 
    $str1 = '【天猫新风尚】瑞铂 2012春季新款韩版手提肩挎包/大包/潮女包包 ';
   $str2 = '[DUDU]微笑天使系列手提/单肩牛皮笑脸包 桔红色（橙红色）';
    $str3='*chloden/蔻丹*潘多拉系列真皮手提女包 原498现252 限量抢 包邮';
	
	$str4='【奥特莱斯】迪丽韩版单肩包2012新款复古休闲斜挎包甜美大包包';
	$str5 = 'ALVIERO MARTINI埃尔维罗·马汀尼多色pvc材质经典地图图案印花包身手拿包，BAG LM';
	$str6= '老人头LAORENTOU休闲女士牛皮手提包109065';
	$str7 = '金鱼GoldFish甜色红妆系列单肩斜挎包女包1208037401红白.浅肉';
	$str8='&nbsp;Gucci 古驰 MAYFAIR 双G印纹单肩包 257061 FFKPG 9791 深米色&nbsp;';
	$str9='【品牌直供】蓝玉宛原创设计花落谁家单肩包手提时尚女包09028';
	$str10='Bibu Bibu必宝手提包-3903';
	$str11='MayMay &#32654;&#32654; &#22899;&#24335; &#32431;&#33394;&#26102;&#23578;&#31995;&#21015;&#20004;&#29992;&#21253; 11111464';
	$str12='feileiya 2012全新韩版鳞片女包 羊皮真皮拼接包 单肩斜挎女包B32';
	$str13='绯闻女孩女士单肩包-斜挎包-1102021912';
	$str14='Alfa Artist 阿尔法·阿蒂斯特 花开物语系列单肩/斜挎包 女式 12060386';
	$str15='【优袋】优袋物语PU托特单肩包B1003C27';
	$str16 ='UFUKURO 优袋物语 托特单肩包 超值两件组合装 再送价值25元零钱包一个';
	$str17='凯戈 韩版休闲时尚 斜挎包 率性大容量百搭包包 手提单肩女包0K7g';
	$str18='ONGCHAMP 珑骧 ROSEAU VERNI系列 巧克力色手提包 1686 152 321(香港速递)';
	$str19= '•DOODOO 米兰设计 都市生活系列 浅金 新款欧美风 托特包 女士单肩包 119-10 卡其色';
  
     
   $substr = mb_substr($str19,0,30,'UTF-8');
   echo $substr.'<br />';
   echo strlen($substr).'<br />';
   
   
   
    
  
?>


</body>
</html>