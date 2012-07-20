<?php
/*
 * @author royguo1988@gmail.com
 * @date 2012-07-15
 * 
 * 所有实体的父类.
 */
 abstract class Model{
     public $table_name;
     public $id;
     public $name;
     public $price;
     public $url;
     public $img_url;
     public $mall_id;
     public $brand_id;
     //构造函数
     public function __construct($table_name){
         $this->table_name = $table_name;
     }
     //查询指定模型
     public function query($size){
         $result = array();
         $sql = "select * from ".$this->table_name." where score<3999 order by score desc, mallID limit 0, ".$size;
         $query = mysql_query($sql) or die("Invalid query: " . mysql_error());
         while($row=mysql_fetch_array($query)){
             $m = $this->mapping_fields($row);
             array_push($result,$m);
         }
         return $result;
     }
     abstract function mapping_fields($row);
 }
?>
