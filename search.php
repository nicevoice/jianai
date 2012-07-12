<?php
    include 'header.php'; 
?> 

<ul class="nav nav-tabs">
  <li class="active"><a href="#upload" data-toggle="tab">从电脑上传图片</a></li>
  <li><a href="#web" data-toggle="tab">网络获取图片</a></li>
  <li><a href="#text" data-toggle="tab">文本搜索</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="upload"></div>
    <div class="tab-pane" id="web"></div>
    <div class="tab-pane" id="text"></div>
</div>

<?php
    include 'footer.php';
?>
