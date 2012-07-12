<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

/** 
        获取机器网卡的物理（MAC）地址 
**/ 
class GetMacAddr 
{ 
        var $return_array = array(); // 返回带有MAC地址的字串数组 
        var $mac_addr; 
        
        function GetMacAddr($os_type) 
        { 
                switch (strtolower($os_type)) 
                { 
                        case "linux": 
                                $this->forLinux(); 
                                break; 
                        case "solaris": 
                                break; 
                        case "unix": 
                                break; 
                        case "aix": 
                                break; 
                        default: 
						       $this->forWindows(); 
                                break; 
                } 
                
                $temp_array = array(); 
                foreach ( $this->return_array as $value ) 
                { 
                       if ( preg_match( "/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i", $value, $temp_array ) ) 
                        { 
                                $this->mac_addr = $temp_array[0]; 
                                break; 
                        } 
                } 
                unset($temp_array); 
                return $this->mac_addr; 
        } 
  
        function forWindows() 
        { 
                @exec("ipconfig /all", $this->return_array); 
                if ( $this->return_array ) 
                        return $this->return_array; 
                else{ 
                        $ipconfig = $_SERVER["WINDIR"]."system32ipconfig.exe"; 
                        if ( is_file($ipconfig) ) 
                                @exec($ipconfig." /all", $this->return_array); 
                        else 
                                @exec($_SERVER["WINDIR"]."systemipconfig.exe /all", $this->return_array); 
                        return $this->return_array; 
                } 
        } 
  
        function forLinux() 
        { 
                @exec("ifconfig -a", $this->return_array); 
                return $this->return_array; 
        } 
} 

//------------------ 图片上传
class UPImages {
        var $annexFolder = "";//附件存放点，默认为：annex
        var $smallFolder = "smallimg";//缩略图存放路径，注：必须是放在 $annexFolder下的子目录，默认为：smallimg
        var $upFileType = "jpg png";//上传的类型，默认为：jpg gif png
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
                $imgCount = count($name);//获得截取的数量
                $imgType = $name[$imgCount-1];//取得文件的类型
                
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
                        die("上传图片失败，请确认你的上传文件不超过 $upFileMax KB 或上传时间超时");
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
		
        function smallImg($photo,$width=160,$height=160)
		 {
                $imgInfo = $this->getInfo($photo);
                $photo = $this->annexFolder."/".$photo;//获得图片源
                $newName = substr($imgInfo["name"],0,strrpos($imgInfo["name"], "."))."_thumb.jpg";//新图片名称
              
			    if($imgInfo["type"] == 1) {
                        $img = imagecreatefromgif($photo);
                } elseif($imgInfo["type"] == 2) {
                        $img = imagecreatefromjpeg($photo);
                } elseif($imgInfo["type"] == 3) {
                        $img = imagecreatefrompng($photo);
                } else {
                        $img = "";
                }
                if(empty($img)) return False;
				
                /*  宽 和 高 保持原始的比例
				 $width = ($width > $imgInfo["width"]) ? $imgInfo["width"] : $width;
                $height = ($height > $imgInfo["height"]) ? $imgInfo["height"] : $height;
                $srcW = $imgInfo["width"];
                $srcH = $imgInfo["height"];
                if ($srcW * $width > $srcH * $height) {
                        $height = round($srcH * $width / $srcW);
                } else {
                        $width = round($srcW * $height / $srcH);
                } */
				
                if (function_exists("imagecreatetruecolor")) {
                    $newImg = imagecreatetruecolor($width, $height);
                   ImageCopyResampled($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]);
                } else {
                    $newImg = imagecreate($width, $height);
                    ImageCopyResized($newImg, $img, 0, 0, 0, 0, $width, $height, $imgInfo["width"], $imgInfo["height"]);
                }
                if ($this->toFile) {
                        if (file_exists($this->annexFolder."/".$this->smallFolder."/".$newName)) 
						    @unlink($this->annexFolder."/".$this->smallFolder."/".$newName);
                        ImageJPEG($newImg,$this->annexFolder."/".$this->smallFolder."/".$newName);
                        return $this->annexFolder."/".$this->smallFolder."/".$newName;
                } else {
                        ImageJPEG($newImg);
                }
                ImageDestroy($newImg);
                ImageDestroy($img);
                return $newName;
        }
}


$root = 'C:/PHPnow/htdocs/jian-ai/include/upload_Img/';
$annexFolder = "upload_Img";
$smallFolder = "resizeImg";
$includeFolder = "include";

$img = new UPImages($annexFolder,$smallFolder,$includeFolder);

if(@$_GET["go"]) {
	    $start = microtime(true);    // 统计运行时间
        
		$uploadFile = $img->upLoad("upfile");
         //$img->toFile = true;
        //$newSmallImg = $img->smallImg($photo);
		echo '<br /><p><span style="font-size:13px; color:#064E5A">您上传的是:女式单肩包，图片如下：</span>';
		 echo '<span id="imgType" style="display:none">' .$_GET["type"].'</span>';
		echo '</p>';
        echo '<img id="upload_Img" src="include/' .$annexFolder. '/' .$uploadFile. '" border="0">';
        echo '<br /> <br /> <input type="button" id="upbtn" value="确认并开始推荐" style="font-size:13px; color:#F00" onclick="">';
		
		// 开始推荐
		 $uploadPath = $root .  $uploadFile;
		 $userID = 122;
		 //$com = new COM("recommSys.recommend") or die("无法建立COM组件");
		 //$flag = $com->recommBag($uploadPath, $userID);
		 
		 $com = new COM("danJianBao") or die("无法建立COM组件");
		 $flag = $com->recommDanJianBao($uploadPath, $userID);
		
		 $stop = microtime(true);    // 统计运行时间
		 $spend = $stop - $start;
		 $spend  = number_format($spend, 10, '.',' ');
		 echo '<span id="flag" style="display:none">' .$spend. '</span>';			  
} 
?>

</body>
</html>