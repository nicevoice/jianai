/**
 * @author royguo1988@gmail.com
 * @date 2012-07-16
 */
//初始化
$(document).ready(function(){
    //商品列表页自动切换tab,点击可触发转向
    $(".auto-tabs li a").each(function(){
       var tab = $(this);
        $(tab).mouseover(function(){
            $(tab).tab('show');
        });
        $(tab).click(function(){
            type = $(tab).attr("href").replace("#","");
            window.location.href="more.php?tt="+type;
        });
    });
    //dropdown自动触发
    $('.dropdown').hover(
        function(){
            $(this).addClass('open').find('ul').stop(true,true).hide().slideDown('fast');
        },
        function(){
            $(this).removeClass('open').find('ul').stop(true,true).slideUp('fast');
        }
    );
    $('.dropdown li').unbind('mouseover').unbind('mouseout');
});
