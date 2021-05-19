<?php
include('partial/menu.php');
?>
<div class="menu_content">
        <div class="wrapper">
            <h1> Add Admin</h1>
            <br><br>

            <?php 
               
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

?>

            <form  action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                       <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" placeholder="Title of the Food"></td>
                        </tr>
                         <tr>
                            <td>Description: </td>
                            <td>
                            <textarea  name="description" cls="30" rows="5" placeholder="Food Description."></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Price: </td>
                            <td><input type="number" name="price" ></td>
                        </tr>
                        <tr>
                            <td>Select Image: </td>
                            <td><input type="file" name="image" ></td>
                        </tr>
                        <tr>
                            <td>Category: </td>
                            <td>
                            <select name="category">
                            <?php
                                //display category
                                 $sql = "SELECT * FROM tbl_category WHERE active='yes'";

                                 $res= mysqli_query($conn, $sql);
                                 $count = mysqli_num_rows($res);

                                if($count>0){
                                    while($rows=mysqli_fetch_assoc($res)){

                                        $id = $rows['id'];
                                        $title = $rows['title'];

                                        ?>
                                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                        <?php


                                    }

                                }
                                else{

                                    ?>
                                     <option value="0">No category Food</option>
                                    <?php
                                }

                            ?>
                            
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Featured:
                            </td>
                            <td><input type="radio" name="featured" value="yes" > Yes
                            <input type="radio" name="featured" value="no" > No
                            </td>
                        </tr>
                    <tr>
                        <td>
                            Active:
                        </td>
                        <td><input type="radio" name="active" value="yes" > Yes
                           <input type="radio" name="active" value="no" > No
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="submit" name="submit" value="Add Food" class="btn-2nd">
                        </td>
                    </tr>

                </table>
            </form>
 <?php

     if(isset ($_POST['submit'])){
            //echo "clicked";
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            if(isset ($_POST['featured'])){
                $featured=$_POST['featured'];

            }else{
                $featured="no";
            }
            if(isset($_POST['active'])){
        
        
                $active=$_POST['active'];
         }else{
             $active="no";
         }
         if(isset($_FILES['image']['name']))
         {
                 //upload image
                 $image_name=$_FILES['image']['name'];
                 //upload image whene image is selected
                 if($image_name!=""){
 
                 
                     //re name auto
                     //get the extension of our image(ipg,png,gif,etc)
                     $ext = end(explode('.',$image_name));
                     $image_name = "Food_Name_".rand(000,999).'.'.$ext;
 
                     
 
                     $source_path=$_FILES['image']['tmp_name'];
                     $destination_path="../images/food/".$image_name;
                     $upload = move_uploaded_file($source_path,$destination_path);
 
                     if($upload==false){
                         $_SESSION['upload']="<div class='error'>fail to upload</div>";
                         header('location:'.SITEURL.'admin/add-food.php');
                         die();
                     }


                     $sql2 = "INSERT INTO tbl_food SET
                     title='$title',
                     discription='$description',
                     price=$price,
                     image_name='$image_name',
                     category_id='$category',
                     featured='$featured',
                     active='$active'
                     ";

                    $res2= mysqli_query($conn, $sql2);
                    if($res2==true){
                    $_SESSION['add']="<div class='success'>food added Successfully</div>";
                    header('location:'.SITEURL.'admin/managefood.php');
                    }
                    else{
                        $_SESSION['add']="<div class='error'>food fail to add Successfully</div>";
                        header('location:'.SITEURL.'admin/add-food.php');
                    }
             }
         
         }else{
               $image_name="";
         }
 
            
        }
 ?>



    </div>
</div>

<?php
include('partial/footer.php');
?>
