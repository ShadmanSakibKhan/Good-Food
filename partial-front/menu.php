
<?php
include('config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/venobox.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Preloader Section Starts Here -->
    <div class="pre_loader">
        <img src="images/pre_loader1.gif" alt="">
    </div>
      <!-- Navbar Section Starts Here -->
    <nav class="navbar navbar-expand-lg p 0 main_menu menu_fixed">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo1.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> 
                        <a class="nav-link" href="<?php echo SITEURL;?>home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo SITEURL;?>categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="<?php echo SITEURL;?>foods.php">Foods</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="<?php echo SITEURL;?>restaurant.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link"href="<?php echo SITEURL;?>contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link"href="<?php echo SITEURL;?>logout.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
</nav>
    <!-- Navbar Section Ends Here -->