<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
require "inc.files/add_to_cart.inc.php";

$pid = get_safe_val($con,$_POST['pid']);
$type = get_safe_val($con,$_POST['type']);

if(isset($_SESSION['user_login'])){
    $uid = $_SESSION['user_id'];
    if(mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0){
        echo "Already added ";
    }
    else{ 
          wishlist_add($con,$uid,$pid);
    }
    echo $total_record = mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid' and product_id='$pid'"));
    }
else{
    $_SESSION['wishlist_id'] = $pid;
   echo "not_login";
}

?>