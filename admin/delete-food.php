<?php

//echo"okk";
include('../config/constant.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //get value or delete
    //echo"get value or delete";
    $id = $_GET['id'];
    $image_name= $_GET['image_name'];

    if($image_name !==""){
        $path="../images/food/".$image_name;
        $remove= unlink($path);


        if($remove == false){
            //set the session
            $_SESSION['upload']="<div class='error'>Fail to remove</div>";
            header('location:'.SITEURL.'admin/managefood.php');
            die();
        }
    }

    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        $_SESSION['delete']="<div class='success'>food deleted Successfully</div>";
        header('location:'.SITEURL.'admin/managefood.php');
      }
      else{
          $_SESSION['delete']="<div class='error'>food fail to deleted Successfully</div>";
          header('location:'.SITEURL.'admin/managefood.php');
      }

}else{
    $_SESSION['unauthorized']="<div class='error'>food fail to deleted Successfully</div>";
    header('location:'.SITEURL.'admin/managefood.php');
}


?>