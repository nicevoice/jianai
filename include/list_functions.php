<?php
/*
 * @author royguo1988@gmail.com
 * @date 2012-07-16
 *
 * 商品列表页面需要引入的函数、配置信息.如women.php、men.php
 */
//商城列表
$mall = array();
$mall_query = mysql_query("select mallID,mallName from mall_list where valid = 1") or die("Invalid query: " . mysql_error());
while($row=mysql_fetch_array($mall_query)){
    $key = $row['mallID'];
    $value = $row['mallName'];
    $mall[$key] = $value;
}
//各种包的类型，今后需要把数据库合并，抽象出一个类型字段
$women_bag_types = array('wdanjianbao','wxiekuabao','wshoutibao','wshounabao','wshuangjianbao');
$men_bag_types = array('mdanjianbao','mgongwenbao','mqianbao_yaobao','mshounabao');
$gn_bag_types = array('glaganxiang','glvxingbao','gyundongbao');
//设置每页显示的数量
$rowSize = 30;

//截取商品标题
function dynamic_substr($str) {
    //strlen按照字节计算长度
    $len1 = strlen($str);
    //mb_substr按照字符分割
    $substr = mb_substr($str, 0, 32);
    $len2 = strlen($substr);
    if ($len2 >= 70)
        $substr = mb_substr($str, 0, 26);
    $len2 = strlen($substr);
    if ($len2 < $len1)
        $substr = $substr . '...';
    return $substr;
}

?>
