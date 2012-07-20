<?php
    $con = mysql_connect('127.0.0.1', 'root', '');
        if (!$con){
            die('Could not connect: ' . mysql_error());
        }
    mysql_select_db('recommSys', $con) or die ('数据库选择错误 : ' . mysql_error());	
    $charset = mysql_query("set names 'utf8'"); 
?>