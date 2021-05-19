<?php
include('partial/menu.php');
?>
<div class="menu_content">
        <div class="wrapper">
            <h1> Update Food</h1>
            <br><br>
            <?php
                   if(isset($_GET['id'])){
                       //echo"print";
                       $id=$_GET['id'];

                       $sql2="SELECT * FROM tbl_food WHERE id=$id";
                       $res2= mysqli_query($conn, $sql2);
                       $count = mysqli_num_rows($res2);
                       if($count==1){
                        // get the details
                        //echo "Admin Availabe";
                        $rows2=mysqli_fetch_assoc($res2);
                        $title= $rows2['title'];
                        $discription= $rows2['discription'];
                        $price= $rows2['price'];
                         $current_image = $rows2['image_name'];
                         $current_category = $rows2['category_id'];
                         $featured = $rows2['featured'];
                         $active = $rows2['active'];
                         
                        
                      
                     }else{
                        // REdirect to manage Admin page
                        $_SESSION['no-category-found']="<div class='error'>No category Found</div>";
                        header('location:'.SITEURL.'admin/managefood.php');
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
                           <td>Discription: </td>
                           <td>
                               <textarea  name="discription" cols="30" rows="5"><?php echo $discription;?></textarea>
                            </td>
                       </tr>
                       <tr>
                           <td>Price: </td>
                           <td>
                           <input type="number" name="price" value="<?php echo $price;?>">
                            </td>
                       </tr>
                       <tr>
                           <td>Current Image: </td>
                           <td>
                              <?php
                                  if($current_image!=""){
                                      ?>
                                       <img src="<?php echo SITEURL ?>images/food/<?php echo $current_image ;?>" width="100px" height="100px" alt="<?php echo $title ?>">
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

                                        $category_id = $rows['id'];
                                        $category_title = $rows['title'];

                                        ?>
                                            <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $id;?>"><?php echo $category_title;?></option>
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
                       <tr>
                        <td>
                            Featured:
                        </td>
                        <td><input <?php  if($featured=="yes") {echo "checked";} ?> type="radio" name="featured" value="yes" > Yes
                            <input  <?php  if($featured=="no") {echo "checked";} ?>type="radio" name="featured" value="no" > No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Active:
                        </td>
                        <td><input  <?php  if($active=="yes") {echo "checked";} ?> type="radio" name="active" value="yes" > Yes
                            <input  <?php  if($active=="no") {echo "checked";} ?>type="radio" name="active" value="no" > No
                        </td>
                    </tr>
                       <tr>
                       <td >
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                       <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                      
                           <input type="submit" name="submit" value="Update Food" class="btn-2nd"> </td>
                       </tr>
                    </table>

</form>
<?php
                

                if(isset($_POST['submit'])){
                    
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    $discription=$_POST['discription'];
                    $price=$_POST['price'];
                    $current_image=$_POST['current_image'];
                    $category=$_POST['category'];
                    $featured=$_POST['featured'];
                    $active=$_POST['active'];
                    //check whether image is selected or not
                    if(isset($_FILES['image']['name'])){

                        $image_name= $_FILES['image']['name'];
                        if($image_name!=""){
                                //upload the new image
                                $ext = end(explode('.',$image_name));
                                $image_name = "Food_Name_".rand(000,999).'.'.$ext;
            
                                
            
                                $source_path=$_FILES['image']['tmp_name'];
                                $destination_path="../images/food/".$image_name;
                                $upload = move_uploaded_file($source_path,$destination_path);
            
                                if($upload==false)
                                {
                                    $_SESSION['upload']="<div class='error'>fail to upload new image</div>";
                                    header('location:'.SITEURL.'admin/managefood.php');
                                    die();
                                }
                                //remove th ecurrent image if available
                                if($current_image!=""){
                                    $remove_path = "../images/food/".$current_image;

                                    $remove = unlink($remove_path);
                                    //check remove or not
                                    if($remove==true){
                                        $_SESSION['remove-fail']="<div class='error'>Failed to remove current image</div>";
                                        header('location:'.SITEURL.'admin/managefood.php');
                                        die();
                                    }
                                }
                                

                        }else{
                            $image_name = $current_image;
                        }
                    }else{
                        $image_name = $current_image;
                    }

                    $sql3 = "UPDATE tbl_food SET
                    title='$title',
                    discription='$discription',
                    price=$price,
                    image_name='$image_name',
                    category_id='$category',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id
                    
                    ";
                    $res3=mysqli_query($conn,$sql3);
                        if($res3==true){
                            $_SESSION['update-food']="<div class='success'>food update Successfully</div>";
                            header('location:'.SITEURL.'admin/managefood.php');
                           
                           }else{
                              // fail
                              $_SESSION['update-food']="<div class='error'>food update UnSuccessfully</div>";
                                header('location:'.SITEURL.'admin/managefood.php');
                           }
            

                    

                }
                ?>

            </div>
            </div>




<?php
include('partial/footer.php');
?>