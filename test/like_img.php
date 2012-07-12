
<?php
  require "../conn.php";
 $imgSrc=$_POST['img'];

 echo '<img id="bagImg" src="'.$imgSrc.'" width="160" height="160" />';
  echo "<script> alert('重复'); </script>"; 
 
 

?> 