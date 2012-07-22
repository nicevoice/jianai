<?php
    include 'header.php'; 
?>
<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('shown', function (e) {
          var url = e.target;
          var tab = (url+"").split("#")[1];
          if(tab == 'img'){
              $("#submit_btn").attr("onclick","img_check()");
          }else if(tab == 'web'){
              $("#submit_btn").attr("onclick","web_check()");
          }else if(tab == 'text'){
              $("#submit_btn").attr("onclick","text_check()");
          }
        });
    });
    //是否是合适的图片网址
    function isWebImg(str) {
        //var reg = /http:\/\/[\w-]*(\.[\w-]*)+/ig;
        // var reg = /http:\/\/([\w%]+)([\/\.][\w%]+)*\.(jpg|png|gif)/g;
        var reg = /http:\/\/(.*?)\.(jpg|png|gif)/g;
        return reg.test(str);
    }
    //获得选择的产品类型
    function getSelectType(){
        var f=$("#select_w").val();
        var m=$("#select_m").val();
        var g=$("#select_g").val();
        if(f!=0){
            return f;
        }else if(m!=0){
            return m;
        }else if(g!=0){
            return g;
        }
        return 0;
    }
    //上传图片检测
    function img_check(){
        var img = $("#upload_img").val();
        if(img==''){
            alert('请上传包包图片!');  
        }else if(getSelectType()==0){
            alert('请选择包包的类型!');      
        }else{
        document.img_form.action= 'include/upImg.php?go=go&type=' + getSelectType();;
        document.img_form.submit();
        }
    }
    //网络图片检测
    function web_check(){
      var web_img = $("#web_img");
      if($(web_img).val()==""){
          alert('请输入图片网址!');
      }else if(!isWebImg($(web_img).val())){
          alert('请输入正确的图片地址!');  
      }else if(getSelectType()==0){
          alert('请选择类型!');
      }else{
        document.web_img_form.action = 'include/upWebImg.php?go=go&type=' + getSelectType();
        document.web_img_form.submit();  
      }
    }
    //文本搜索
    function text_check(){
        var text_img = $("#text_img").val();
        if(text_img==''){
            alert('请输入包包名!');
        }else if(getSelectType()==0){
            alert('请选择包包类型!');
        }else{
        document.text_img_form.action = 'include/text_upImg.php?go=go&type=' + getSelectType();
        document.text_img_form.submit();  
        }
    }
    //每次只能选择一个类型
    function changeSelectType(_select){
        var current = $(_select).val();
        $("#select_w").val(0);
        $("#select_m").val(0);
        $("#select_g").val(0);
        $(_select).val(current);
    }
</script>

<ul class="nav nav-tabs">
  <li class="active"><a href="#img" data-toggle="tab">从电脑上传图片</a></li>
  <li><a href="#web" data-toggle="tab">网络获取图片</a></li>
  <li><a href="#text" data-toggle="tab">文本搜索</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="img">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">上传图片:</label>
                <div class="controls">
                    <form  name="img_form" id="img_form" method="post" enctype="multipart/form-data">
                        <input name="upLocalImg" id="upload_img" type="file"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="web">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">网络图片:</label>
                <div class="controls">
                    <form name="web_img_form" action="" method="post">
                        <input type="text" name="web_upImg" id="web_img" class="input-xxlarge" placeholder="直接右键网络上的图片，复制图片链接即可" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="text">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="uploadFile">包包名称:</label>
                <div class="controls">
                    <form name="text_img_form" method="post">
                        <input type="text" name="text_upImg" id="text_img" class="input-large" />    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">女包类型:</label>
            <div class="controls">
                <select id="select_w" onchange="changeSelectType(this)">
                    <option value="0">请选择</option>
                    <option value="wdanjianbao">女士单肩包</option>
                    <option value="wxiekuabao">女士斜挎包</option>
                    <option value="wshounabao">女士手包</option>
                    <option value="wshoutibao">女士手提包</option>
                    <option value="wshuangjianbao">女士双肩包</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">男包类型:</label>
            <div class="controls">
                <select id="select_m" onchange="changeSelectType(this)">
                    <option value="0">请选择</option>
                    <option value="mdanjianbao">男士单肩包</option>
                    <option value="mgognwenbao">男士公文包</option>
                    <option value="myaobao">男士钱包/腰包</option>
                    <option value="mshounabao">男士手包</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">箱包类型:</label>
            <div class="controls">
                <select id="select_g" onchange="changeSelectType(this)">
                    <option value="0">请选择</option>
                    <option value="glaganxiang">拉杆箱</option>
                    <option value="glvxingbao">旅行包</option>
                    <option value="gyundongbao">运动包</option>
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="well" align="center">
            <input onclick="img_check()" id="submit_btn" type="button" class="btn btn-danger" value="搜索"/>
        </div>
    </fieldset>
</div>
<?php
    include 'footer.php';
?>
