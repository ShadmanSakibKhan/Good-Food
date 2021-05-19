<?php
include('../config/constant.php');

//Destroy the session

session_destroy();//unsets $_SESSION['user']

//redirect to login page
header('location:'.SITEURL.'admin/loginpage.php');
?>