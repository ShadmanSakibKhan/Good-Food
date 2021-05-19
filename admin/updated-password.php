<?php
include('partial/menu.php');
?>

<div class="menu_content">
        <div class="wrapper">
            <h1>updated password</h1>
            <br><br>
            <?php
              $id=$_GET['id'];
            
            ?>
        <form action="" method="POST">

           <table class="tbl-30">
               <tr>
                   <td> 
                       Old Password: 
                    </td>
                   <td> 
                      <input type="password" name="Current_password" placeholder="Current password">
                    </td>
               </tr>
               <tr>
                   <td> 
                       New Password: 
                    </td>
                   <td> 
                      <input type="password" name="new_password" placeholder="new password">
                    </td>
               </tr>
               <tr>
                   <td> 
                       Confirm Password: 
                    </td>
                   <td> 
                      <input type="password" name="Confirm_password" placeholder="Confirm password">
                    </td>
               </tr>
               <tr>
                       <td colspan="2">
                       <input type="hidden" name="id" value="<?php echo $id?>">
                           <input type="submit" name="submit" value="change password" class="btn-2nd"> </td>
                       </tr>
</table>


</form>


</div>
</div>
<?php
  //check whether the submit Button
  if(isset($_POST['submit'])){
      //echo "Clicked";

      //get the data from form 
      $id=$_POST['id'];
      $current_password = md5($_POST['Current_password']);
      $new_password = md5($_POST['new_password']);
      $Confirm_password = md5($_POST['Confirm_password']);


      //cheched whether the user with current id and current password exits or not
      $sql = "SELECT *FROM tbl_admin WHERE id=$id AND password='$current_password'";
      $res = mysqli_query($conn, $sql);

      if($res==true){
        $count = mysqli_num_rows($res);
       
        if($count==1){
         
           if($new_password==$Confirm_password){
            $sql2="UPDATE tbl_admin SET
            password='$new_password'
            where id=$id
            ";
            $res2 = mysqli_query($conn, $sql2);
            if($res==true){
            $_SESSION['change-psw']="<div class='success'>password changed successfully </div>";
            header('location:'.SITEURL.'admin/manageadmin.php');
            }else{
                $_SESSION['change-psw']="<div class='error'>password changed Unsuccessfully </div>";
                header('location:'.SITEURL.'admin/manageadmin.php');
            }
           }else{
            $_SESSION['psw-not-match']="<div class='error'>user not found</div>";
            header('location:'.SITEURL.'admin/manageadmin.php');
           }
        }else{
            $_SESSION['user-not-found']="<div class='error'>user not found</div>";
            header('location:'.SITEURL.'admin/manageadmin.php');
        }
      }

      //change password if all above is true
  }else
?>




<?php
include('partial/footer.php');
?>