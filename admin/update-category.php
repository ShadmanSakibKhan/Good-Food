<?php
include('partial/menu.php');
?>
<div class="menu_content">
        <div class="wrapper">
            <h1> Update category</h1>
            <br><br>
             <?php
                   if(isset($_GET['id'])){
                       //echo"print";
                       $id=$_GET['id'];

                       $sql="SELECT * FROM tbl_category WHERE id=$id";
                       $res= mysqli_query($conn, $sql);
                       $count = mysqli_num_rows($res);
                       if($count==1){
                        // get the details
                        //echo "Admin Availabe";
                        $rows=mysqli_fetch_assoc($res);
                        $title= $rows['title'];
                         $current_image = $rows['image_name'];
                         $featured = $rows['featured'];
                         $active = $rows['active'];
                         
                        
                      
                     }else{
                        // REdirect to manage Admin page
                        $_SESSION['no-category-found']="<div class='error'>No category Found</div>";
                        header('location:'.SITEURL.'admin/managecataegory.php');
                     }

                   }else{
                    header('location:'.SITEURL.'admin/managecataegory.php');
                   }
                ?>
            <form action="" method="POST"  enctype="multipart/form-data">
                   <table class="tbl-30">
                       <tr>
                           <td>Title: </td>
                           <td>
                               <input type="text" name="title" value="<?php echo $title;?>">
                            </td>
                       </tr>
                       <tr>
                           <td>Current Image: </td>
                           <td>
                              <?php
                                  if($current_image!=""){
                                      ?>
                                       <img src="<?php echo SITEURL ?>images/category/<?php echo $current_image ;?>" width="100px" height="100px">
                                      <?php

                                  }else{
                                      echo "<div class='error'>Image not added</div>";
                                  }
                              ?>
                            </td>
                       </tr>
                       <tr>
                           <td>New Image: </td>
                           <td>
                           <td><input type="file" name="image"></td>
                            </td>
                       </tr>
                       <tr>
                        <td>
                            Featured:
                        </td>
                        <td><input <?php  if($featured=="yes") {echo "checked";} ?> type="radio" name="featured" value="yes" > Yes
                            <input <?php  if($featured=="no") {echo "checked";} ?> type="radio" name="featured" value="no" > No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Active:
                        </td>
                        <td><input  <?php  if($active=="yes") {echo "checked";} ?> type="radio" name="active" value="yes" > Yes
                            <input   <?php  if($active=="no") {echo "checked";} ?> type="radio" name="active" value="no" > No
                        </td>
                    </tr>
                       <tr>
                       <td >
                       <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                           <input type="submit" name="submit" value="Update category" class="btn-2nd"> </td>
                       </tr>
                    </table>
                </form>


                <?php
                

                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    $current_image=$_POST['current_image'];
                    $featured=$_POST['featured'];
                    $active=$_POST['active'];
                    //check whether image is selected or not
                    if(isset($_FILES['image']['name'])){

                        $image_name= $_FILES['image']['name'];
                        if($image_name!=""){
                                //upload the new image
                                $ext = end(explode('.',$image_name));
                                $image_name = "Food_category_".rand(000,999).'.'.$ext;
            
                                
            
                                $source_path=$_FILES['image']['tmp_name'];
                                $destination_path="../images/category/".$image_name;
                                $upload = move_uploaded_file($source_path,$destination_path);
            
                                if($upload==false){
                                    $_SESSION['upload']="<div class='error'>fail to upload</div>";
                                    header('location:'.SITEURL.'admin/managecataegory.php');
                                    die();
                                }
                                //remove th ecurrent image if available
                                if($current_image!=""){
                                    $remove_path = "../images/category/".$current_image;

                                    $remove = unlink($remove_path);
                                    //check remove or not
                                    if($remove==true){
                                        $_SESSION['failed-remove']="<div class='error'>Failed to remove current image</div>";
                                        header('location:'.SITEURL.'admin/managecataegory.php');
                                        die();
                                    }
                                }
                                

                        }else{
                            $image_name = $current_image;
                        }
                    }else{
                        $image_name = $current_image;
                    }

                    $sql2 = "UPDATE tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id
                    
                    ";
                    $res2=mysqli_query($conn,$sql2);
                        if($res2==true){
                            $_SESSION['update']="<div class='success'>cataegory update Successfully</div>";
                            header('location:'.SITEURL.'admin/managecataegory.php');
                           
                           }else{
                              // fail
                              $_SESSION['update']="<div class='error'>cataegory update UnSuccessfully</div>";
                              header('location:'.SITEURL.'admin/managecataegory.php');
                           }
            

                    

                }


?>
</div>
</div>




<?php
include('partial/footer.php');
?>