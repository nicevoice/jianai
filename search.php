<?php
    include 'header.php'; 
?> 
<script language="JavaScript">
    function isWebImg(str) {
        //var reg = /http:\/\/[\w-]*(\.[\w-]*)+/ig;
        // var reg = /http:\/\/([\w%]+)([\/\.][\w%]+)*\.(jpg|png|gif)/g;
        var reg = /http:\/\/(.*?)\.(jpg|png|gif)/g;
        return reg.test(str);
    }
    function isSelectType(){
        var f=$("#select_f").val();
        var m=$("#select_m").val();
        var g=$("#select_g").val();
        if(f!=0 || m!=0 || g!=0){
            return true;
        }
        return false;
    }
    function web_check(){
      var web_img = $("#web_img");
      if($(web_img).val()==""){
          alert('请输入图片网址!');
      }else if(!isWebImg($(web_img).val())){
          alert('请输入正确的图片地址!');  
      }else if(!isSelectType){
          alert('请选择类型!');
      }else{
        var path = 'include/upWebImg.php?go=go&type=';
       if(obj_1.selectedIndex >0)
          path += obj_1.options[obj_1.selectedIndex].value;
          
      if(obj_2.selectedIndex >0)
          path += obj_2.options[obj_2.selectedIndex].value;
          
       if(obj_3.selectedIndex >0)
          path += obj_3.options[obj_3.selectedIndex].value;
       
       document.web_img_form.action= path;
       var obj = document.getElementById("web_submitForm");  
       obj.click(); 
      }
    }
</script>

<ul class="nav nav-tabs">
  <li class="active"><a href="#upload" data-toggle="tab">从电脑上传图片</a></li>
  <li><a href="#web" data-toggle="tab">网络获取图片</a></li>
  <li><a href="#text" data-toggle="tab">文本搜索</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="upload">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">上传:</label>
                <div class="controls">
                    <input type="file" id="uploadFile" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="web">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">网络图片地址:</label>
                <div class="controls">
                    <input type="text" id="web_img" class="input-xxlarge" placeholder="直接右键网络上的图片，复制图片链接即可" />
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="text">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">产品名称:</label>
                <div class="controls">
                    <input type="text" class="input-large" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-horizontal">
    <fieldset class="row">
        <div class="control-group">
            <label class="control-label">女包类型:</label>
            <div class="controls">
                <select id="select_f">
                    <option value="0">请选择</option>
                    <option value="fdanjianbao">女士单肩包</option>
                    <option value="fxiekuabao">女士斜挎包</option>
                    <option value="fshounabao">女士手拿包</option>
                    <option value="fshoutibao">女士手提包</option>
                    <option value="fshuangjianbao">女士双肩包</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">男包类型:</label>
            <div class="controls">
                <select id="select_m">
                    <option value="0">请选择</option>
                    <option value="mdanjianbao">男士单肩包</option>
                    <option value="mgognwenbao">男士公文包</option>
                    <option value="myaobao">男士钱包/腰包</option>
                    <option value="mshounabao">男士手拿包</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">箱包类型:</label>
            <div class="controls">
                <select id="select_g">
                    <option value="0">请选择</option>
                    <option value="glaganxiang">拉杆箱</option>
                    <option value="glvxingbao">旅行包</option>
                    <option value="gyundongbao">运动包</option>
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="well" align="center">
            <input type="button" class="btn btn-danger" value="搜索"/>
        </div>
    </fieldset>
</div>
<?php
    include 'include/search_tab.htm';
?>
<?php
    include 'footer.php';
?>
