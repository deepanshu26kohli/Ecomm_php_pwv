<?php
require "inc.files/connection.inc.php";
require "inc.files/functions.inc.php";
unset($_SESSION['user_login']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
session_destroy();
header('location:index.php');
die();

?>