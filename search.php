<?php
    include 'header.php'; 
?> 

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
                    <input type="text" class="input-xxlarge" placeholder="直接右键网络上的图片，复制图片链接即可" />
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
    include 'footer.php';
?>
