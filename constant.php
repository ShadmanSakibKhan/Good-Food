<?php
// start session
session_start();
   // create constants to store non repeating values
   define('SITEURL','http://localhost/foodorder/');
   define('LOCALHOST','localhost');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','');
   define('DB_NAME','food');

   $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

   ?>