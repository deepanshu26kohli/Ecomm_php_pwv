<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_val($con,$val){
 if($val != ""){
    $val = trim($val);
    return mysqli_real_escape_string($con,$val);
 }}
 function isFileTypeImg($file_type ){
    $file_type = strtolower($file_type);
    if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/webp"){
          return true;
    }
    return false;
 }
 function get_product($limit="",$con,$cat_id="",$product_id=""){
    $sql = sprintf("SELECT `products`.*,`category`.`categories` FROM `products`,`category` where `products`.`status`=1");
    if($cat_id != ""){
        $sql .= " and `products`.`category_id`=$cat_id";
    }
    if($product_id != ""){
        $sql .= " and `products`.`id`=$product_id";
         $sql .= " and `products`.`category_id`=`category`.`id`";
    }
   
    $sql .= " order by `products`.`id` desc";
    if($limit != ""){
        $sql.= " `products`.limit $limit";
    }
    
    $res = mysqli_query($con,$sql);
    print_r($res);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
 }
?>