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
 function get_product($limit="",$con,$cat_id="",$sort_order=""){
    $sql = sprintf("SELECT * FROM `products` where `status`=1");
    if($cat_id != ""){
        $sql .= " and `category_id`=$cat_id";
    }
    if($sort_order!= ""){
         $sql .=$sort_order;
    }else{
        $sql .= " order by `id` desc";
    }
   
    if($limit != ""){
        $sql.= " limit $limit";
    }
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
 }
 function get_one_product($limit="",$con,$cat_id="",$product_id=""){
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
        $sql.= " limit $limit";
    }
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
 }
 function search($limit="",$con,$cat_id="",$product_id="",$search_str=""){
    $sql = sprintf("SELECT `products`.*,`category`.`categories` FROM `products`,`category` where `products`.`status`=1");
    if($cat_id != ""){
        $sql .= " and `products`.`category_id`=$cat_id";
    }
    if($product_id != ""){
        $sql .= " and `products`.`id`=$product_id";
        
    }
    $sql .= " and `products`.`category_id`=`category`.`id`";
    if ($search_str != ""){
        $sql.= " and (`products`.`name` like '%$search_str%' or `products`.`description` like '%$search_str%')";
    }
    $sql .= " order by `products`.`id` desc";
    if($limit != ""){
        $sql.= " limit $limit";
    }
    // echo $sql;
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
 }
 function wishlist_add($con,$uid,$pid){
          $added_on = date('Y-m-d h:i:s');
          mysqli_query($con,"INSERT into `wishlist`(`user_id`,`product_id`,`added_on`) values('$uid','$pid','$added_on')");
 }
?>