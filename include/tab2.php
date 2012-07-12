      
<script type="text/javascript">
$(document).ready(function(){
	var tab = new $.fn.tab({
		tabList:"#demo1 .ui-tab-container .ui-tab-list li",
		contentList:"#demo1 .ui-tab-container .ui-tab-content"
	});
	$("#btn_set_disable").click(function(){
		tab.setDisable(2);
	});
	$("#btn_set_enable").click(function(){
		tab.setEnable(2);
	});
	$("#btn_triggle").click(function(){
		tab.triggleTab(1);
	});
		
});	

</script>

<script type="text/javascript">  
function submitForm(formName)
{
formName.target="_self" //也可以是_self,_top,_parent,默认为_self
var obj = document.getElementById("img_form");
  
    obj.elements[1].click();

}
</script>


<div id="demo1">
 <div class="ui-tab-container">
	<ul class="clearfix ui-tab-list">
		<li class="ui-tab-active">从电脑上传图片</li>
		<li>输入图片网址</li>
		<li>个人喜好定制</li>
	</ul>
  <div class="ui-tab-bd">
	<div class="ui-tab-content">
    <form  name="img_form" id="img_form" method="post" action="include/upImg.php?go=go" enctype="multipart/form-data">
       <input type="file" name="upfile" onChange="submitForm(img_form)">
       
      <input type="submit" name="upbtn" id="upbtn" value="上传" style="visibility:hidden">
     </form>
     <div id="output"> hi</div>
     
      </div>
    
    
	<div class="ui-tab-content" style="display:none"><p>content2</p><p>content2</p><p>content2</p></div>
	<div class="ui-tab-content" style="display:none"><p>content3</p><p>content3</p><p>content3</p></div>
  </div>
	
 </div>
</div>





















