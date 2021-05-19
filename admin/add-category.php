<?php
include('partial/menu.php');
?>

<div class="menu_content">
        <div class="wrapper">
            <h1> Add category</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

?>
            <!-- add category form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>
                            Title:
                        </td>
                        <td><input type="text" name="title" placeholder="Category Title"></td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            Select Image:
                        </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>
                            Featured:
                        </td>
                        <td><input type="radio" name="featured" value="yes" > Yes
                        <td><input type="radio" name="featured" value="no" > No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Active:
                        </td>
                        <td><input type="radio" name="active" value="yes" > Yes
                        <td><input type="radio" name="active" value="no" > No
                        </td>
                    </tr>
                    <tr>
                    <td>
                    <input type="submit" name="submit" value="Add category" class="btn-2nd">
                     </td>
                    </tr>
</table>
</form>
           
            <!-- add category form  end -->
<?php

    if(isset($_POST['submit'])){
        //echo "clicked";
        $title = $_POST['title'];

        if(isset($_POST['featured'])){
        
        
               $featured=$_POST['featured'];
        }else{
            $featured="no";
        }
        if(isset($_POST['active'])){
        
        
               $active=$_POST['active'];
        }else{
            $active="no";
        }
        //check whether the image selected or not and image name set
         //print_r($_FILES['image']);

        // die();
        if(isset($_FILES['image']['name']))
        {
                //upload image
                $image_name=$_FILES['image']['name'];
                //upload image whene image is selected
                if($image_name!=""){

                
                    //re name auto
                    //get the extension of our image(ipg,png,gif,etc)
                    $ext = end(explode('.',$image_name));
                    $image_name = "Food_category_".rand(000,999).'.'.$ext;

                    

                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;
                    $upload = move_uploaded_file($source_path,$destination_path);

                    if($upload==false){
                        $_SESSION['upload']="<div class='error'>fail to upload</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
            }
        
        }else{
              $image_name="";
        }

       //insert data
       $sql = "INSERT INTO tbl_category SET
       title='$title',
       image_name='$image_name',
       featured='$featured',
       active='$active'
       ";
        $res= mysqli_query($conn, $sql);
        if($res==true){
          $_SESSION['add']="<div class='success'>category added Successfully</div>";
          header('location:'.SITEURL.'admin/managecataegory.php');
        }
        else{
            $_SESSION['add']="<div class='error'>category fail to add Successfully</div>";
            header('location:'.SITEURL.'admin/add-category.php');
        }
    }

?>
</div>
</div>


<?php
include('partial/footer.php');
?>