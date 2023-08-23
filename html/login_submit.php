<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
$email = get_safe_val($con,$_POST['email']);
$password = get_safe_val($con,sha1($_POST['password']));
$sql = sprintf("SELECT * FROM `users` WHERE `email`= '%s' ",$email);
$res = mysqli_query($con,$sql);
$check_user = mysqli_num_rows($res);
if ($check_user > 0){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['user_login'] = "yes";
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    echo "Logged In";
  
}
else{
    echo "wrong credentials";
}
?>