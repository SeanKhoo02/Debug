<?php
include("dataconnection.php");
session_start();

//session_unset(); remove the data of all session variables

unset($_SESSION["user_id"]);//remove this data

session_destroy();

header("location:login_register.php");
?>