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
?>