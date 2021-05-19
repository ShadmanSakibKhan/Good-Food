<?php
include('../config/constant.php');
?>
<html>
<head>
   
    <title>Login page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">login</h1>
        <br><br>
        <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
          if(isset($_SESSION['no-login-msg'])){
            echo $_SESSION['no-login-msg'];
            unset($_SESSION['no-login-msg']);
          }


?>
        <!-- login form start -->
        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter username"><br><br>
            password:<br>
            <input type="password" name="password" placeholder="enter your password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-2nd">
</form>
        <!-- login form end -->

</div>
    
</body>
</html>
<?php
//checked whether the submit button is clicked
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT *FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res= mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login']="<div class='success'>login Successfully</div>";
        
        $_SESSION['user']=$username;
        
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        $_SESSION['login']="<div class='error text-center'>login UnSuccessfully</div>";
        header('location:'.SITEURL.'admin/loginpage.php');
    }
}
?>