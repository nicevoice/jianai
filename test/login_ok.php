<?php  header("Content-Type: text/html; charset=utf-8");   ?>

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

 if($username == 'zcbb' && $password == '123')
 {
   echo '欢迎你：'.$username;
 }
  
else
  echo "用户名或密码错误，请重新登录";

?> 