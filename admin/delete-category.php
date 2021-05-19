<?php
include('../config/constant.php');

//check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //get value or delete
    //echo"get value or delete";
    $id = $_GET['id'];
    $image_name= $_GET['image_name'];

    if($image_name !==""){
        $path="../images/category/".$image_name;
        $remove= unlink($path);


        if($remove == false){
            //set the session
            $_SESSION['remove']="<div class='error'>Fail to remove</div>";
            header('location:'.SITEURL.'admin/managecataegory.php');
            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        $_SESSION['delete']="<div class='success'>category deleted Successfully</div>";
        header('location:'.SITEURL.'admin/managecataegory.php');
      }
      else{
          $_SESSION['delete']="<div class='error'>category fail to deleted Successfully</div>";
          header('location:'.SITEURL.'admin/managecataegory.php');
      }

}else{
    header('location:'.SITEURL.'admin/managecataegory.php');
}


?>