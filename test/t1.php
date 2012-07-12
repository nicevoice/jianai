
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style type="text/css">
	body{font:12px "宋体";}
	a{color:#000;text-decoration:none;}
	a:hover{color:#F30;text-decoration:underline;}
	.txtbox{border:1px solid #E79F50;height:20px;line-height:22px;width:120px;}
	.bfont{font:700 12px "宋体"};
	#login{width:400px;height:100%;overflow:hidden;margin:0px auto;}
	#title{width:400px;height:25px;line-height:25px;color:#F60;font-weight:700;background-color:#FDEBD9;text-align:center;margin:0px auto;}
	#loginbox{width:185px;height:60px;margin:10px 20px;float:left;display:inline;}
	#btnlogin{width:55px;height:60px;float:right;margin:10px 30px 10px 5px;}
	#forget{width:200px;margin:0px auto;height:25px;line-height:25px;text-align:center;}
	#forget span{width:80px;display:inline;margin:0px 10px;}
</style>

<script type="text/javascript" src="jquery-1.6.2.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){ //DOM的onload事件处理函数
$("#button").click(function(){ //当按钮button被点击时的处理函数
postdata(); //button被点击时执行postdata函数
});

});

function postdata(){ //提交数据函数
$.ajax({ //调用jquery的ajax方法
type: "POST", //设置ajax方法提交数据的形式
url: "login_ok.php", //把数据提交到ok.php
data: "writer="+$("#txtName").val()+"&pass="+$("#txtPwd").val(), //输入框writer中的值作为提交的数据
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
$("#login_ok").html(msg); //如果有必要，可以把msg变量的值显示到某个DIV元素中
}
});
}


</script>
<script type="text/javascript">
<!--
function init(){
$.ajax({
type: "GET",
url: "if_login.php",
data: "ts="+new Date().getTime(),
success: function(msg){ //提交成功后的回调，msg变量是ok.php输出的内容。
if (msg=='true'){
$("#login_ok").html("login ok");
}
}
});
}
//-->
</script> 

</head>
<body>
<p>
  <input type="button" value="点这里" onclick="alertWin(400,160,'登录后才能投票，没有注册请先注册成为会员。');" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

  <script language="javascript">
function alertWin(w, h,title){
     var titleheight = "22px"; // 提示窗口标题高度 
    var bordercolor = "#666699"; // 提示窗口的边框颜色 
    var titlecolor = "#FFFFFF"; // 提示窗口的标题颜色 
    var titlebgcolor = "#666699"; // 提示窗口的标题背景色
    var bgcolor = "#FFFFFF"; // 提示内容的背景色
   
    var iWidth = document.documentElement.clientWidth;
    var iHeight = document.documentElement.clientHeight;
    var bgObj = document.createElement("div");
    bgObj.id="bgObjId";
    bgObj.style.cssText = "position:absolute;left:0px;top:0px;width:"+iWidth+"px;height:"+Math.max(document.body.clientHeight, iHeight)+"px;filter:Alpha(Opacity=30);opacity:0.3;background-color:#000000;z-index:101;";
    document.body.appendChild(bgObj);
   
    var msgObj=document.createElement("div");
    msgObj.id="msgObjId";
    msgObj.style.cssText = "position:absolute;font:11px '宋体';top:"+(iHeight-h)/2+"px;left:"+(iWidth-w)/2+"px;width:"+w+"px;height:"+h+"px;text-align:center;border:1px solid "+bordercolor+";background-color:"+bgcolor+";padding:1px;line-height:22px;z-index:102;";
    document.body.appendChild(msgObj);
   
    var table = document.createElement("table");
    msgObj.appendChild(table);
    table.style.cssText = "margin:0px;border:0px;padding:0px;";
    table.cellSpacing = 0;
   
    var msgBox = table.insertRow(-1).insertCell(-1);
    msgBox.style.cssText = "font:10pt '宋体';";
    msgBox.colSpan = 2;
   
    /*var msgs = "<span>账 号：</span><input type='text' id='txtName' style='width: 120px' /><br />"
                +"<span>密 码：</span><input type='password' id='txtPwd' style='width: 120px' /><br />"
                +"<input type='button' value='登录' onclick='getValue(\""+bgObj.id+"\",\""+msgObj.id+"\")' />";	*/
				
	var msgs = "<div id='login'><div id='title'>" + title +
	           "</div><div style='width:320px;height:80px;margin:0px auto;'>"	
	           + "<table id='loginbox' border='0' cellpadding='0' cellspacing='0'>  <tr style='height:30px'>"	
			   + "<td class='bfont'>用户名：</td>   <td><input class='txtbox' type='text'  id='txtName' /></td>  </tr> <tr>"	
			   + " <td class='bfont'>密&nbsp;&nbsp;码：</td> <td><input class='txtbox' type='password' id='txtPwd' /></td>    </tr>  </table>"
			   + "  <div id='btnlogin'><a href='#'><img src='login.gif' width='55' height='55' onclick='getValue()' /></a></div> </div>"
               + "<div id='forget'>  <span style='float:left;'><a href='#' onclick='closeDIV()'>不想登录</a></span> 	<span style='float:left;'><a href='#'>忘记密码</a></span></div>"
			   + "<div style='height:25px;line-height:25px;text-align:center'>马上注册, 即可享受每月一次的个性化推荐服务。" 
			   + "<a style='color:#06F;text-decoration:underline;font-weight:700' href='#'>点击注册</a></div></div>";
			    	    		  			
    msgBox.innerHTML = msgs;
   
    // 获得事件Event对象，用于兼容IE和FireFox
    function getEvent() {
        return window.event || arguments.callee.caller.arguments[0];
    }
}
//执行后台 click()
function getValue()
{
  document.getElementById("button").click();
      
  var bgObj = document.getElementById("bgObjId");
  var msgObj = document.getElementById("msgObjId");
   
  document.body.removeChild(bgObj);
  document.body.removeChild(msgObj); 

  //执行隐藏服务器按钮后台事件
 // document.getElementById("btnOk").click();
}

function closeDIV()
{
    var bgObj = document.getElementById("bgObjId");
    var msgObj = document.getElementById("msgObjId");
   
    document.body.removeChild(bgObj);
    document.body.removeChild(msgObj);      
}
</script>
 
<input type="submit" name="button" id="button" value="提交" />


<div id="login_ok"> </div>

</body>
</html> 

<?php  
  $is_login = 1; 
  if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
  {
  //echo 'username: '.$_COOKIE['username'];
  if($_COOKIE['username'] == 'zcbb' && $_COOKIE['password'] == '123')
    {
	$is_login = 0;
	echo '<script>';
	echo 'document.getElementById("login_ok").innerHTML= "欢迎你：'.$_COOKIE ['username'] . '"';
	echo '</script>';	
	}
  }
?>   





