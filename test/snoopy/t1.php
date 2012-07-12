<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

  <?php

include "Snoopy.class.php"; 

$url = 'http://www.amazon.cn/s/ref=sr_pg_3?rh=n%3A2016156051%2Cn%3A%212016157051%2Cn%3A865184051%2Cn%3A100275071%2Cn%3A100276071%2Cn%3A100279071&page=3&ie=UTF8&qid=1336816922';
//$snoopy = new Snoopy; 
//$snoopy->fetchtext ($url); 
//echo $snoopy->results;

function getContent_amazon($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $str    = curl_exec($ch);
   // $str = iconv('gbk','utf-8',$str);
    curl_close($ch);
    return $str;
    }

 echo getContent_amazon($url);
?>
</body>
</html>