<?php
   //Start the session

   session_start();

   //Creat constant to store Non repeating value
   define('SITEURL','http://localhost/CSED_PUR_MNG/');
   define('LOCALHOST','localhost');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','');
   define('DB_NAME','csed_pur_mng');

   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//Database connection
   $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //Selecting database

?>