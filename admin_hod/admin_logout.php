<?php 
      include('../config/constants.php');
   //1.Destroy The Session
   session_destroy();//unset $_session['user']
   //2.Redirect to Login page
   $_SESSION['log-out']="logout successfully";
   header('location:'.SITEURL.'admin_hod/adminlogin.php');
?>