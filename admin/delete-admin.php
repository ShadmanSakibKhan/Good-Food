<?php

  include('../config/constant.php');
//get the id of admin to be deleted

   $id = $_GET['id'];


// create sql query to delete admin
   $sql = "DELETE FROM tbl_admin WHERE id=$id";

//redirect to manage admin page
$res= mysqli_query($conn,$sql);
//check whether the quary executed
if($res==true){
    //qurey succeddfully
    //echo "admin deleted";
    //display msg
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manageadmin.php');
}else{
   // echo "fail admin deleted";
   $_SESSION['delete']="<div class='error'>Admin Deleted UnSuccessfully</div>";
   header('location:'.SITEURL.'admin/manageadmin.php');
}



?>