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
     public function mapping_fields($row){
         $model = new Bag($this->table_name);
         $model->id = $row['bagID'];
         $model->name = $row['bagName'];
         $model->price = $row['bagPrice'];
         $model->url = $row['bagURL'];
         $model->img_url = $row['bagImgURL'];
         $model->mall_id = $row['mallID'];
         $model->brand_id = $row['brandID'];
         return $model;
     }
 }
?>
