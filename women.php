<?php
    include 'header.php';
    include 'include/list_functions.php';
?>

<ul class="nav nav-tabs auto-tabs">
  <li class="active"><a href="#wdanjianbao" data-toggle="tab">女士单肩包排行</a></li>
  <li><a href="#wxiekuabao" data-toggle="tab">女式斜挎包排行</a></li>
  <li><a href="#wshoutibao" data-toggle="tab">女式手提包排行</a></li>
  <li><a href="#wshounabao" data-toggle="tab">女式手包排行</a></li>
  <li><a href="#wshuangjianbao" data-toggle="tab"> 女式双肩包排行</a></li>
</ul>

<div class="tab-content items-container">
    <?php
        foreach($women_bag_types as $index=>$type){
    ?>
        <div class="tab-pane <? echo $index == 0 ? 'active' : '' ; ?>" id="<? echo $type; ?>">
            <?php
                // 显示单肩包
                $bag = new Bag($type);
                $result = $bag->query($rowSize);
                foreach( $result as $item ){
                 $imgPath = '<img id="imgID_'.$item->id.'" src="'.$item->img_url.'" border=0 width="160" height="160"/>';
                 ?>
                 <div class="item-box">
                     <div class="item-img">
                         <a href="similarbag.php?type=<?echo $type;?>&id=<?php echo $item->id; ?>">
                            <?php echo $imgPath; ?>
                         </a>
                     </div>
                     <div class="item-info">
                        <div>名称：<?php echo dynamic_substr($item->name); ?></div>
                        <div>价格：&yen;<?php echo $item->price; ?></div>
                        <div>商家：<?php echo $mall[$item->mall_id] ?></div>
                    </div>
                 </div>
                 <?php } ?>
        </div>
    <?php } ?>
</div>

<?php 
    include 'footer.php';
?>

