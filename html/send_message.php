<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
$name = get_safe_val($con,$_POST['name']);
$email = get_safe_val($con,$_POST['email']);
$mobile = get_safe_val($con,$_POST['mobile']);
$comment = get_safe_val($con,$_POST['message']);
$added_on = date('Y-m-d h:i:s');
$contactsql = sprintf("INSERT INTO `contact_user`(`name`,`email`,`mobile`,`comment`,`added_on`) VALUES('%s','%s','%s','%s','%s')",$name,$email,$mobile,$comment,$added_on);
mysqli_query($con,$contactsql);
echo "Thank You!";
?>