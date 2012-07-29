<?php
    include ('header.php' );
    include 'include/list_functions.php';
?>
<ul class="nav nav-tabs auto-tabs">
  <li class="active"><a href="#glaganxiang" data-toggle="tab">拉杆箱排行</a></li>
  <li><a href="#glvxingbao" data-toggle="tab">旅行包排行</a></li>
  <li><a href="#gyundongbao" data-toggle="tab">运动包排行</a></li>
</ul>

<div class="tab-content items-container">
    <?php
        foreach($gn_bag_types as $index=>$type){
    ?>
        <div class="tab-pane <? echo $index == 0 ? 'active' : '' ; ?>" id="<? echo $type; ?>">
            <!-- <div align="right"><a class="btn btn-danger" href="more.php?tt=<? echo $type; ?>">查看更多</a></div> -->
            <?php
                // 显示单肩包
                $bag = new Bag($type);
                $result = $bag->query($rowSize);
                foreach( $result as $item ){
                 $imgPath = '<img id="imgID_'.$item->id.'" src="'.$item->img_url.'" border="0"" width="160" height="160"/>';
                 ?>
                 <a href="similarbag.php?type=<?echo $type;?>&id=<?php echo $item->id; ?>">
                 <div class="item-box">
                     <div class="item-img">
                            <?php echo $imgPath; ?>
                     </div>
                     <div class="item-info">
                         <div><?php echo dynamic_substr($item->name); ?></div>
                         <div>价格：&yen;<?php echo $item->price; ?></div>
                         <div>商家：<?php echo $mall[$item->mall_id] ?></div>
                    </div>
                 </div>
                 </a>
                 <?php } ?>
                 <a href="more.php?tt=<? echo $type ?>" class="btn btn-info" style="float: right;margin-right: 20px;">查看更多</a>
        </div>
    <?php } ?>
</div>

<?php
    include 'footer.php';
?>