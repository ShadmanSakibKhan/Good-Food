<?php

if(isset($_POST['user'])){
    $_SESSION['no-login-msg']="<div class='error '>login to access admin panel</div>";
    header('location:'.SITEURL.'admin/loginpage.php');


}
?>