// JavaScript Document

var imgheight
var imgright
window.screen.width>800 ? imgheight=265:imgheight=265
window.screen.width>800 ? imgright=120:imgright=0
function threenineload()
{

threenine.style.top=document.body.scrollTop+document.body.offsetHeight-imgheight;
threenine.style.right=imgright;
threeninemove();

}

function threeninemove()
{

threenine.style.top=document.body.scrollTop;
threenine.style.right=imgright;
setTimeout("threeninemove();",80)
}

function MM_reloadPage(init) { //reloads the window if Nav4 resized
if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}


MM_reloadPage(true)

document.write("<div id=threenine style='position: absolute;width:64;top:300;visibility: visible;z-index: 100'><img src=2.jpg width=160 height=160 border=0 usemap=#Mapgame165></div>");
threenineload()
