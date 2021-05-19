<?php

  include('../config/constant.php');
//get the id of admin to be deleted

   $id = $_GET['id'];


// create sql query to delete admin
   $sql = "DELETE FROM users WHERE id=$id";

//redirect to manage admin page
$res= mysqli_query($conn,$sql);
//check whether the quary executed
if($res==true){
    //qurey succeddfully
    //echo "admin deleted";
    //display msg
    $_SESSION['delete']="<div class='success'>User Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manageuser.php');
}else{
   // echo "fail admin deleted";
   $_SESSION['delete']="<div class='error'>User Deleted UnSuccessfully</div>";
   header('location:'.SITEURL.'admin/manageuser.php');
}



?>