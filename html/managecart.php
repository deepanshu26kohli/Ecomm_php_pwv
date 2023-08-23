<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
require "inc.files/add_to_cart.inc.php";

$pid = get_safe_val($con,$_POST['pid']);
$qty = get_safe_val($con,$_POST['qty']);
$type = get_safe_val($con,$_POST['type']);

$obj = new add_to_cart();

if ($type == 'add'){
    $obj->addProduct($pid,$qty);
}
if ($type == 'remove'){
    $obj->removeProduct($pid,$qty);
}
if ($type == 'update'){
    $obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct(); 
?>