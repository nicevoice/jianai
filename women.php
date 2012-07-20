<?php
    include 'header.php';
    include 'include/list_functions.php';
?>

<ul class="nav nav-tabs auto-tabs">
  <li class="active"><a href="#wdanjianbao" data-toggle="tab">女士单肩包排行</a></li>
  <li><a href="#wxiekuabao" data-toggle="tab">女式斜挎包排行</a></li>
  <li><a href="#wshoutibao" data-toggle="tab">女式手提包排行</a></li>
  <li><a href="#wshounabao" data-toggle="tab">女式手拿包排行</a></li>
  <li><a href="#wshuangjianbao" data-toggle="tab"> 女式双肩包排行</a></li>
</ul>

<div class="tab-content items-container">
    <?php
        foreach($women_bag_types as $index=>$type){
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
    <?php } ?>
</div>

<?php 
    include 'footer.php';
?>

