/**
 * @author royguo1988@gmail.com
 * @date 2012-07-16
 */
//初始化
$(document).ready(function(){
    //商品列表页
    $(".auto-tabs li a").each(function(){
       var tab = $(this);
        $(tab).mouseover(function(){
            $(tab).click();
        });
    }); 
});
//函数定义