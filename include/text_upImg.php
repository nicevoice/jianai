<?php
    require "../models/conn.php";
    function file_get_contents_utf8($fn) {
        $opts = array( 
            'http' => array( 
                'method'=>"GET", 
                'header'=>"Content-Type: text/html; charset=utf-8" 
            ) 
        ); 
    
        $context = stream_context_create($opts); 
        $result = @file_get_contents($fn,false,$context); 
        return $result; 
    }

    //$root = 'C:/PHPnow/htdocs/jian-ai/include/';
    $root = dirname(__FILE__).'/';
    $annexFolder = "upload_Img/";
    $includeFolder = "include";


if(@$_GET["go"]) {
	 	$bagType = $_GET["type"];	

		$sql="select bagID,bagImgURL from ".$bagType." where bagName like '%" .$_POST['text_upImg']. "%' limit 0, 1";
		$query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
		$row = mysql_fetch_array($query) ;
						
		if(count($row[0])) 
		{
		//获取网络图片并保存
		$upImgID = time();
		$pic_name = $root . $annexFolder. $upImgID.'.jpg';
		 $img_read_fd = file_get_contents_utf8($row[1]);  
        @file_put_contents($pic_name, $img_read_fd);
		
		//查找相似的包包			
        $sql_similar = "select * from sim_".$bagType." where bagID=".$row[0];
        $query_similar = mysql_query($sql_similar, $con) or die("Invalid query: " . mysql_error());  
        $row_similar = mysql_fetch_array($query_similar);
        
        $slbp = explode(",",$row_similar['slbp']);
        $shsv = explode(",",$row_similar['shsv']);
        $scom = explode(",",$row_similar['scom']);
        
        //插入表img_search
        //lbp 部分
        $sql_search = "insert into img_search(upImgID,slbp1,slbp2,slbp3,slbp4,slbp5,slbp6,slbp7,slbp8,slbp9,slbp10,slbp11,slbp12) values(".$upImgID.",";
        
        for($i=0;$i<=10;$i++){
           $sql_search = $sql_search . $slbp[$i]. ",";
        }
		$sql_search = $sql_search . $slbp[11].")";
		// echo $sql_search;
		$query_search = mysql_query($sql_search, $con) or die("Invalid query: " . mysql_error()); 
		
		//hsv 部分
		$sql_search = "update img_search set ";
		  for($i=0;$i<=10;$i++)
		    $sql_search = $sql_search . "shsv".($i+1). "=".$shsv[$i]. ",";
			
		$sql_search =  $sql_search . "shsv12". "=".$shsv[11]. " where upImgID=".$upImgID;
		$query_search = mysql_query($sql_search, $con) or die("Invalid query: " . mysql_error());  
		
		//complexity 部分
		$sql_search = "update img_search set ";
		 for($i=0;$i<=11;$i++)
		  $sql_search = $sql_search . "scom".($i+1). "=".$scom[$i]. ",";
	    
		$sql_search =  $sql_search . "scom12". "=".$scom[11]. " where upImgID=".$upImgID;
		$query_search = mysql_query($sql_search, $con) or die("Invalid query: " . mysql_error());  
		  
		 /* -------------------- 开始推荐 ----------------------------*/       
        $path = 'Location: ../search_result.php?userID=' .$upImgID. '&bagType=' . $bagType. '&imName='.  $upImgID ;
		header($path);
	   } // end if(count($row[0])) 
	  else
	    die('没找到您要的包包，请确认输入了完整的包包名， <a href="../index.php">返回</a>');	
  }   // end if
?>