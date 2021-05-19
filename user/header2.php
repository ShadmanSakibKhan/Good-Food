
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin login</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
.info{
    text-align: right;
    margin-bottom: 20px;
}

</style>

</head>
<body>
<div class="container">
<div class="info">
<br>
Contact Us: Mobile:<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;01533761167 <br>
E-mail: <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;nabilamoumy@gmail.com
</div>
<nav class="navbar navbar-expand-lg navbar-light white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Audible</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
      <?php
      
       if(!isset($_SESSION['login_user'])){

          //  echo '<a class="nav-link" href="cart.php"><b>Bag<i class="fa fa-shopping-cart"></i><span  class="badge badge-warning" id="countcart" style="border-radius: 50%; height: 20px;" > </span></a></b>';

        //    echo '<li class="nav-item">
        //    <a class="nav-link" href="#">My Library</a>
        //  </li>';

           echo '<li class="nav-item">
           <a class="nav-link" href="logout.php">Logout</a>
         </li>';
       }
       
      ?>
        
      </ul>
    </div>
  </div>
</nav>
<hr>

</div>

