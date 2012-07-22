<?php
include ('header.php');
?>
<div class="well showcase" align="center">
	<h3>点击图片，查看相似包包</h3>
	<div><img src="images/icons/showcase.gif" height="220" /></div>
</div>
<div class="row-fluid">
    <h3>选择包包类别</h3>
	<ul class="thumbnails">
		<li class="span3">
		    <a href="women.php">
    			<div class="thumbnail">
    				<img width="100" src="images/icons/women_bag.png" alt="">
    				<h4 align="center">女包</h4>
    			</div>
			</a>
		</li>
		<li class="span3">
		    <a href="men.php">
			<div class="thumbnail">
				<img width="100" src="images/icons/men_bag.png" alt="">
				<h4 align="center">男包</h4>
			</div>
			</a>
		</li>
		<li class="span3">
		    <a href="xiangbao.php">
			<div class="thumbnail">
				<img width="100" src="images/icons/luggage.jpeg" alt="">
				<h4 align="center">功能箱包</h4>
			</div>
			</a>
		</li>
		<li class="span3">
		    <a href="search.php">
			<div class="thumbnail">
				<img width="100" src="images/icons/search.png" alt="">
				<h4 align="center">图片搜索</h4>
			</div>
			</a>
		</li>
	</ul>
</div>
<?php
    include ('footer.php');
?>

