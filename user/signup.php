<?php
require('config.php');
require_once "config.php";

$error="";

if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username); 
 
 
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "INSERT into users (username, password)
VALUES ('$username', '".$password."')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='container' align='center'>
<h3>Welcome to GOOD FOOD. You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
  <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            text-align: center;
            padding: 200px;
         }
      </style>
<html>

<body bgcolor = "#FFFFFF">

    <div align = "center">
       <div style = "width:300px; border: solid 1px #e23e38; " align = "left">
          <div style = "background-color:#e23e38; color:#FFFFFF; padding:6px; text-align: center"><b>Create your Audible Account</b></div>
      
          <div style = "margin:30px">
             
             <form action = "" method = "post">
                <label>UserName  :</label><input type="text" name="username" placeholder="Email"/><br /><br />
                <label>Password  :</label><input type="password" name ="password" placeholder="Password" /><br/><br />
                <button type="sign in">Sign In</button>
                
             </form>
             <br>
             <p style = "font-size:14px;">Already have an account? 
             <a href="login.php">Login here</a> </p>
             <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        
          </div>
      
       </div>
    
    </div>

 </body>
</html>
<br><br>

<?php } ?>
