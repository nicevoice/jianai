<?php
    include ('header.php' );
    function dynamic_substr($str){
    //$str = html_entity_decode($str,ENT_NOQUOTES, 'UTF-8');
    //$str = str_replace('&nbsp;','',$str);
    $len1 = strlen($str);

    $substr = mb_substr($str, 0, 32);
    $len2 = strlen($substr);
    if ($len2 <= 55)
        $substr = mb_substr($str, 0, 36);
    if ($len2 >= 70)
        $substr = mb_substr($str, 0, 26);
    $len2 = strlen($substr);
    if ($len2 < $len1)
        $substr = $substr . '...';
    return $substr;
    }
    $mall = array('1001'=>
    '麦包包','1002'=>'京东商城','1003'=>'亚马逊','1004'=>'走秀网','1005'=>'银泰网','1006'=>'凡客诚品',
        '1007'=>'当当网','1008'=>'天猫商城','1009'=>'尊酷网','1010'=>'梦芭莎','1011'=>'新浪商城','1012'=>'爱上包包网');
        //设置每页显示的数量
        $rowSize = 18;
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#laganxiang" data-toggle="tab">拉杆箱排行</a></li>
  <li><a href="#lvxingbao" data-toggle="tab">旅行包排行</a></li>
  <li><a href="#yundongbao" data-toggle="tab">运动包排行</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="laganxiang">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=glaganxiang">更多拉杆箱</a></div>
        <?php
            // 显示拉杆箱
            $sql = "select * from glaganxiang where score<3999 order by score desc, mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=glaganxiang&id='.$row[0].'">';
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
    <div class="tab-pane" id="lvxingbao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=glvxingbao">更多旅行包</a></div>
        <?php
            //  显示旅行包
            $sql = "select * from glvxingbao where score<3999 order by score desc , mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=glvxingbao&id='.$row[0].'">';
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
    <div class="tab-pane" id="yundongbao">
        <div align="right"><a class="btn btn-danger" href="more.php?tt=gyundongbao">更多运动包</a></div>
        <?php
            //  显示运动包
            $sql = "select * from gyundongbao where score<3999 order by score desc , mallID limit 0, ".$rowSize; 
            $query = mysql_query($sql, $con) or die("Invalid query: " . mysql_error()); 
            while($row=mysql_fetch_row($query))
            {    
             $imgID = 'imgID_' . $row[0];
             $imgPath = '<img id="'.$imgID.'" src="'.$row[4];
             $imgPath = $imgPath. '"  border=0 width="160px" height="160px"/>';
            echo  '<div class="prod_box">';
            echo  '<div class="product_img"><a href="similarbag.php?type=gyundongbao&id='.$row[0].'">';
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
</div>

<?php
    include 'footer.php';
?>