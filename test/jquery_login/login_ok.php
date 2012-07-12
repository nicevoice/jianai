

<?php
/*session_start();
require "conn.php";
$username=$_POST['writer'];
$password=$_POST['pass'];
mysql_select_db($database_lr, $lr);
$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysql_query($sql);
if( mysql_num_rows($result) >0 )
{
// login sucess
$_SESSION['login_Admin']="Admin";
echo "login ok";

}
else
{
// The user ID found
echo "Login failed, ID error or expired.";
} */

$username=$_POST['writer'];
$password=$_POST['pass'];

if($username == 'zcb' && $password == '123')
  echo "登录成功";
else
  echo "失败";

?> 