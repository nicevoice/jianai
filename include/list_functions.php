<?php
/*
 * @author royguo1988@gmail.com
 * @date 2012-07-16
 *
 * 商品列表页面需要引入的函数、配置信息.如women.php、men.php
 */
//shopping mall
$mall = array('1001' => '麦包包', '1002' => '京东商城', '1003' => '亚马逊', 
            '1004' => '走秀网', '1005' => '银泰网', '1006' => '凡客诚品', 
            '1007' => '当当网', '1008' => '天猫商城', '1009' => '尊酷网', 
            '1010' => '梦芭莎', '1011' => '新浪商城', '1012' => '爱上包包网');
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
