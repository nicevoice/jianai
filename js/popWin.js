function popWin(title, msg, w, h, imgID){ 
	var objSelect = document.getElementsByTagName("select"); //捕捉所有select标签
	for(var j=0;j<objSelect.length;j++){
		//设为不显示，再进行下面操作
		objSelect[j].style.display="none";
	} 
	
	var iWidth = document.documentElement.clientWidth;
	var iHeight = document.documentElement.clientHeight;
	
	var bgObj = document.createElement("div");
	bgObj.id = "BgDiv";
	bgObj.style.width = iWidth+"px";
	bgObj.style.height = Math.max(document.body.clientHeight, iHeight)+"px";
	document.body.appendChild(bgObj);
		
	var msgObj=document.createElement("div"); 
	var imgObj = document.getElementById(imgID);
	msgObj.id = "MsgDiv";
	msgObj.style.top = imgObj.offsetTop+"px";
	msgObj.style.left = imgObj.offsetLeft +imgObj.offsetWidth+"px";
	msgObj.style.width = w+"px";
	msgObj.style.height = h+"px";
	document.body.appendChild(msgObj);

	var table = document.createElement("table"); 
	msgObj.appendChild(table); 
	table.id = "MsgDivTable";
	var tr = table.insertRow(-1); 
	var titleBar = tr.insertCell(-1);
	tr.id = "MsgTitle";
	titleBar.id = "MsgDivTitle";
	titleBar.innerHTML = title; 
	
	
    var closeBtn = tr.insertCell(-1); 
	closeBtn.id = "MsgDivClose";
	closeBtn.innerHTML = "<span title='关闭'>×</span>"; 
	closeBtn.onclick = function(){ 
		for(var j=0;j<objSelect.length;j++){
			//再给select显出来
			objSelect[j].style.display="";
		} 
		document.body.removeChild(bgObj); 
		document.body.removeChild(msgObj); 
	}  //end function

	var msgBox = table.insertRow(-1).insertCell(-1); 
	msgBox.id = "MsgBox"; 
	msgBox.colSpan = "2"; 
	msgBox.innerHTML = msg; 	

  // 获得事件Event对象，用于兼容IE和FireFox
	function getEvent() {
		return window.event || arguments.callee.caller.arguments[0];
	}
}  // end popWin()

function closeDIV(){
	     bgObj = document.getElementById("BgDiv"); 
		 msgObj = document.getElementById("MsgDiv"); 
         document.body.removeChild(bgObj); 
		 document.body.removeChild(msgObj); 
}