<?php
include('partial/menu.php');
?>

<div class="menu_content">
        <div class="wrapper">
               <h1>Update Admin<h1>
                   <br><br>
                <?php
                    $id=$_GET['id'];

                    $sql="SELECT * FROM tbl_admin WHERE id=$id";
                    $res=mysqli_query($conn,$sql);

                    //check query
                    if($res==true){
                        $count = mysqli_num_rows($res);
                        //we have data or not
                        if($count==1){
                           // get the details
                           //echo "Admin Availabe";
                           $rows=mysqli_fetch_assoc($res);
                           
                           $full_name= $rows['full_name'];
                           $username = $rows['username'];
                        }else{
                           // REdirect to manage Admin page
                           header('location:'.SITEURL.'admin/manageadmin.php');
                        }
                    }
                ?>
                
               <form action="" method="POST">
                   <table class="tbl-30">
                       <tr>
                           <td>Full Name: </td>
                           <td>
                               <input type="text" name="full_name" value="<?php echo $full_name;?>">
                            </td>
                       </tr>
                       <tr>
                           <td>Username</td>
                           <td>
                               <input type="text" name="username" value="<?php echo $username;?>">
                            </td>
                       </tr>
                       <tr>
                       <td colspan="2">
                           <input type="hidden" name="id" value="<?php echo $id?>">
                           <input type="submit" name="submit" value="Update Admin" class="btn-2nd"> </td>
                       </tr>
                    </table>
                </form>

</div>
</div>
<?php

        //checked whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
           // echo "Button Clicked";
           //get all the values from form to update
           $id = $_POST['id'];
           $full_name = $_POST['full_name'];
           $username = $_POST['username'];

           //create a sql query to update admin
           $sql="UPDATE tbl_admin SET
           full_name = '$full_name',
           username = ' $username'
           WHERE id='$id'
           ";
           $res=mysqli_query($conn,$sql);

           //check query
           if($res==true){
            $_SESSION['update']="<div class='success'>Admin update Successfully</div>";
            header('location:'.SITEURL.'admin/manageadmin.php');
               
               }else{
                  // fail
                  $_SESSION['update']="<div class='error'>Admin update UnSuccessfully</div>";
                  header('location:'.SITEURL.'admin/manageadmin.php');
               }


        }

?>
<?php
include('partial/footer.php');
?>