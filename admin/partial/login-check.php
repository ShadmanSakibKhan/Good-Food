<?php

if(!isset($_SESSION['user'])){
    $_SESSION['no-login-msg']="<div class='error text-center'>Please login to access admin panel</div>";
    header('location:'.SITEURL.'admin/loginpage.php');


}
?>