<?php
    include ('header.php' );
    include 'include/list_functions.php';
?>

<ul class="nav nav-tabs auto-tabs">
  <li class="active"><a href="#mdanjianbao" data-toggle="tab">男士单肩包排行</a></li>
  <li><a href="#mgongwenbao" data-toggle="tab">男式斜挎包排行</a></li>
  <li><a href="#mqianbao_yaobao" data-toggle="tab">男式手提包排行</a></li>
  <li><a href="#mshounabao" data-toggle="tab">男式手包排行</a></li>
</ul>
<div class="tab-content items-container">
    <?php
        foreach($men_bag_types as $index=>$type){
    ?>
        <div class="tab-pane <? echo $index == 0 ? 'active' : '' ; ?>" id="<? echo $type; ?>">
            <div align="right"><a class="btn btn-danger" href="more.php?tt=<? echo $type; ?>">查看更多</a></div>
            <?php
                // 显示单肩包
                $bag = new Bag($type);
                $result = $bag->query($rowSize);
                foreach( $result as $item ){
                 $imgPath = '<img id=imgID_"'.$item->id.'" src="'.$item->img_url.'" border=0 width="160px" height="160px"/>';
                 ?>
                 <div class="prod_box">
                     <div class="product_img">
                         <a href="similarbag.php?type=<?echo $type;?>&id=<?php echo $item->id; ?>">
                            <?php echo $imgPath; ?>
                            <span class="prod_info">
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
    <?php } ?>
</div>

<?php
    include 'footer.php';
?>

