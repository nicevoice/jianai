<?php
/*
 * @author royguo1988@gmail.com
 * @date 2012-07-15
 * 
 * 各种包包的实体
 */
 require_once 'model.php';
 class Bag extends Model{
     public function __construct($table_name){
        $this->table_name = $table_name;
     }
     // Query查询时用来填充结果数组
     public function mapping_fields($row){
         $model = new Bag($this->table_name);
         $model->id = $row['bagID'];
         $model->name = $row['bagName'];
         $model->price = $row['bagPrice'];
         $model->url = $row['bagURL'];
         $model->img_url = $row['bagImgURL'];
         $model->mall_id = $row['mallID'];
         $model->brand_id = $row['brandID'];
         //处理部分价格未抓取到的情况
         if($model->price == 0){
             $model->price = "无法获取";
         }
         return $model;
     }
 }
?>
