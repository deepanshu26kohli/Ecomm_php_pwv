<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
$name = get_safe_val($con,$_POST['name']);
$email = get_safe_val($con,$_POST['email']);
$mobile = get_safe_val($con,$_POST['mobile']);
$password = get_safe_val($con,sha1($_POST['password']));
$sql = sprintf("SELECT * FROM `users` WHERE `email`= '%s'",$email);
$check_user = mysqli_num_rows(mysqli_query($con,$sql));
if ($check_user > 0){
    echo "Email Already Exists";
}
else{
    $added_on = date('Y-m-d h:i:s');
    $sql = sprintf("INSERT into `users`(`name`,`email`,`mobile`,`password`,`added_on`) values('%s','%s','%s','%s','%s')",$name,$email,$mobile,$password,$added_on);
    mysqli_query($con,$sql);
    echo "Thank You for registration";
}
?>