<?php
include('partial/menu.php');
?>


<div class="menu_content">
        <div class="wrapper">
            <h1> Add Admin</h1>
            <br><br>
<?php
 if(isset($_SESSION['add']))
 {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
 }
?>

            <form action="" method="POST"> 
              <table class="tbl-30">
                  <tr>
                      <td>Full Name: </td>
                      <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="User_name" placeholder="Enter Your UserName"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="Enter Your password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-2nd"> </td>
                        
                    </tr>
                </table>

            </form>

</div>
</div>

<?php
include('partial/footer.php');
?>
<?php
//process the value from form and save it in database
// cheack submit whether the button is clicked or not
if(isset($_POST['submit'])){
    // Button Clicked
   //echo"Button Clicked";

   //get the data from form
   $full_name = $_POST['full_name'];
   $username = $_POST['User_name'];
   $password = md5($_POST['password']);// password encyption

   //sql query to save the data
   $sql = "INSERT INTO tbl_admin SET
       full_name=' $full_name',
       username='$username',
       password='$password'
   ";
   //Excuting quary
   $res = mysqli_query($conn,$sql) or die(mysqli_error());
   // check whether the data is inserted or not
   if($res==True){
       //echo "data inserted";
       $_SESSION['add']="Admin Added Successfully";
       header("location:".SITEURL.'admin/manageadmin.php');
   }else{
    //echo "data not inserted";
    $_SESSION['add']="Admin fail Added Successfully";
       header("location:".SITEURL.'admin/add-admin.php');
   }

}else{
    //Button not clicked
   // echo"Button not Clicked";
}

?>