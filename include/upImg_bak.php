
<?php  session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

//------------------ 图片上传
class UPImages {
        var $annexFolder = "";//附件存放点，默认为：annex
        var $smallFolder = "smallimg";//缩略图存放路径，注：必须是放在 $annexFolder下的子目录，默认为：smallimg
        var $upFileType = "jpg jpeg png JPG JPEG PNG ";//上传的类型，默认为：jpg gif png
        var $upFileMax = 100;//上传大小限制，单位是"KB"，默认为：1024KB
        var $fontType;//字体
        var $maxWidth = 500; //图片最大宽度
        var $maxHeight = 600; //图片最大高度
		
        function UPImages($annexFolder,$smallFolder,$includeFolder) 
		{
                $this->annexFolder = $annexFolder;
                $this->smallFolder = $smallFolder;
         }
		
        function upLoad($inputName) 
		{
                $imageName = time();//设定当前时间为图片名称
				
                if(@empty($_FILES[$inputName]["name"])) 
				    die("没有上传图片信息，请确认");
                $name = explode(".",$_FILES[$inputName]["name"]);//将上传前的文件以"."分开取得文件类型
                $imgCount = count($name);         //获得截取的数量
                $imgType = $name[$imgCount-1];   //取得文件的类型
                
				if(strpos($this->upFileType,$imgType) === false)
				    die("上传文件类型仅支持:".$this->upFileType.", 不支持:".$imgType);
					
                $photo = $imageName.".".$imgType;//写入数据库的文件名
                $uploadFile = $this->annexFolder."/".$photo;//上传后的文件名称
                $upFileok = move_uploaded_file($_FILES[$inputName]["tmp_name"],$uploadFile);
                if($upFileok) {
                        $imgSize = $_FILES[$inputName]["size"];
                        $kSize = round($imgSize/1024);
                       if($kSize > ($this->upFileMax)) {
                                @unlink($uploadFile);
                                die("上传文件超过 ".$this->upFileMax."KB, 请适当缩小您要上传的图片");
                        }  
               } else {
                    die("上传图片失败，请确认您的上传文件不超过 $upFileMax KB 或上传时间超时");
                      }
                return $photo;
        }
		
        function getInfo($photo) 
		{
                $photo = $this->annexFolder."/".$photo;
                $imageInfo = getimagesize($photo);
                $imgInfo["width"] = $imageInfo[0];
                $imgInfo["height"] = $imageInfo[1];
                $imgInfo["type"] = $imageInfo[2];
                $imgInfo["name"] = basename($photo);
                return $imgInfo;
        }
		
 }


$root = 'C:/PHPnow/htdocs/jian-ai/include/upload_Img/';
$annexFolder = "upload_Img";
$smallFolder = "resizeImg";
$includeFolder = "include";

$img = new UPImages($annexFolder,$smallFolder,$includeFolder);

if(@$_GET["go"]) {
	 
	  /* ----------  上传文件  ---------------*/
	  $uploadFile = $img->upLoad("upLocalImg");
	  $uploadPath = $root .  $uploadFile;
	  $imgInfo = getimagesize($uploadPath);
	  if(empty($imgInfo))
	       die("您上传的不是图片!");
	  else
	   {
		 // 连接数据库
		 $con = mysql_connect('localhost', 'root', 'cbzeng~231715');  
	     if (!$con)
              die('Could not connect: ' . mysql_error());
		  mysql_select_db('recommSys', $con) or die ('数据库选择失败' . mysql_error());	
		
		$macAddress = $_SESSION['macAddress'];  
		if($_SESSION['oldUser'] == false)   // 如果是新用户
		{
		 $sql = "insert into user_basicinfo (macAddress) values('" .$macAddress. "')" ; 
		 $query = mysql_query($sql, $con); 
		}
		
		$sql = "select userID from user_basicinfo where macAddress='" .$macAddress. "'" ; 
		$query = mysql_query($sql, $con); 
		$row = mysql_fetch_array($query);
		$userID = 	$row[0];	
				
		 mysql_close($con);    // 关闭连接	
		  
		 /* -------------------- 开始推荐 ----------------------------*/       
        	//$com = new COM("recommSys.recommend") or die("无法建立COM组件");
		 //$flag = $com->recommBag($uploadPath, $userID);		 
		
		 $bagType = $_GET["type"];	
		 $com = new COM("danJianBao") or die("无法建立COM组件");
		 
		 $flag = $com->recommDanJianBao($uploadPath, $userID);
		
		  
		if($flag)
		 {
			$arr = explode(".", $uploadFile); 
			$imName = $arr[0];
		    $path = 'Location: ../recommend.php?userID=' .$userID. '&bagType=' . $bagType. '&imName='.  $imName ;
		    header('Location: http://www.baidu.com');    
		 } 
		   
	  }  // end else
  }   // end if
?>

</body>
</html>