<?php
    include 'header.php';
    include 'include/list_functions.php';
?>

<ul class="nav nav-tabs auto-tabs">
  <li class="active"><a href="#danjianbao" data-toggle="tab">女士单肩包排行</a></li>
  <li><a href="#xiekuabao" data-toggle="tab">女式斜挎包排行</a></li>
  <li><a href="#shoutibao" data-toggle="tab">女式手提包排行</a></li>
  <li><a href="#shounabao" data-toggle="tab">女式手拿包排行</a></li>
  <li><a href="#shuangjianbao" data-toggle="tab"> 女式双肩包排行</a></li>
</ul>
<div class="tab-content items-container">
    <div class="tab-pane active" id="danjianbao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=wdanjianbao">更多单肩包</a></div>
        <?php
            // 显示单肩包
            $wdanjianbao = new Model('wdanjianbao');
            $result = $wdanjianbao->query($rowSize);
            foreach( $result as $item ){
             $imgPath = '<img id=imgID_"'.$item->id.'" src="'.$item->img_url.'" border=0 width="160px" height="160px"/>';
             ?>
             <div class="prod_box">
                 <div class="product_img">
                     <a href="similarbag.php?type=wdanjianbao&id=<?php echo $item->id; ?>">
                        <?php echo $imgPath; ?>
                        <span class="www_zzjs_net">
                            <ul>
                                <li><?php echo dynamic_substr($item->name); ?></li>
                                <li>价格：&yen;<?php echo $item->price; ?></li>
                                <li>商家：<?php echo $mall[$item->mall_id] ?></li>
                            </ul>
                        </span>
                     </a>
                 </div>
                 <div class="bottom_prod_box"></div>
             </div>
             <?php } ?>
    </div>
    <div class="tab-pane" id="xiekuabao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=wxiekuabao">更多斜挎包</a></div>
        <?php
            // 显示斜挎包
            $root_2 = 'prod_img/wxiekuabao/';   
            $sql = "select * from wxiekuabao where score<3999 order by score desc , mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {
             $path = $root_2.$row[0].'.jpg'; 
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=wxiekuabao&id='.$row[0].'">';
            echo    $imgPath;
            echo  '<span class="www_zzjs_net"><ul>';
            echo  '<li>'.dynamic_substr($row[1]).'</li>';
            echo  '<li>价格：&yen;'.$row[2].'</li><li>商家：'. $mall[$row[6]].'</li>';
            echo  '</ul></span></a></div>'; 
            echo   '<div class="bottom_prod_box"></div>';             
            echo  '</div>';
            }// end while
           
           echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';  
                    
        ?>
    </div>
    <div class="tab-pane" id="shoutibao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=wshoutibao">更多手提包</a></div>
        <?php
            // 显示手提包
            $root_3 = 'prod_img/wshoutibao/';   
            $sql = "select * from wshoutibao where score<3999 order by score desc , mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $path = $root_3.$row[0].'.jpg'; 
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=wshoutibao&id='.$row[0].'">';
            echo    $imgPath;
            echo  '<span class="www_zzjs_net"><ul>';
            echo  '<li>'.dynamic_substr($row[1]).'</li>';
            echo  '<li>价格：&yen;'.$row[2].'</li><li>商家：'. $mall[$row[6]].'</li>';
            echo  '</ul></span></a></div>'; 
            echo   '<div class="bottom_prod_box"></div>';             
            echo  '</div>';
            }// end while
          echo '<img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';
        ?>
    </div>
    <div class="tab-pane" id="shounabao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=wshounabao">更多手拿包</a></div>
        <?php
            // 显示手包
            $root_4 = 'prod_img/wshounabao/';   
            $sql = "select * from wshounabao where score<3999 order by score desc , mallID  limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $path = $root_4.$row[0].'.jpg'; 
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=wshounabao&id='.$row[0].'">';
            echo    $imgPath;
            echo  '<span class="www_zzjs_net"><ul>';
            echo  '<li>'.dynamic_substr($row[1]).'</li>';
            echo  '<li>价格：&yen;'.$row[2].'</li><li>商家：'. $mall[$row[6]].'</li>';
            echo  '</ul></span></a></div>'; 
            echo   '<div class="bottom_prod_box"></div>';             
            echo  '</div>';
            }// end while
         echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';    
        ?>
    </div>
    <div class="tab-pane" id="shuangjianbao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=wshuangjianbao">更多双肩包</a></div>
        <?php
            // 显示双肩包
            $root_5 = 'prod_img/wshuangjianbao/';   
            $sql = "select * from wshuangjianbao where score<3999 order by score desc , mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $path = $root_5.$row[0].'.jpg'; 
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=wshuangjianbao&id='.$row[0].'">';
            echo    $imgPath;
            echo  '<span class="www_zzjs_net"><ul>';
            echo  '<li>'.dynamic_substr($row[1]).'</li>';
            echo  '<li>价格：&yen;'.$row[2].'</li><li>商家：'. $mall[$row[6]].'</li>';
            echo  '</ul></span></a></div>'; 
            echo   '<div class="bottom_prod_box"></div>';             
            echo  '</div>';
            }// end while
            echo ' <img src="images/division_border.jpg" style="padding:15px 0 5px 0;" />';
        ?>
    </div>
</div>
   
<?php 
    include 'footer.php';
?>

