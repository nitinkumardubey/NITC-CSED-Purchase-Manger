<?php  
 //Authorization - Access control

 //Check whethet the user is loged in or not
 if(!isset($_SESSION['user']))
 {
     //Redirect to Login Page with message
     $_SESSION['no-login-message']="<div class='error text-center' style='color:#fff'> Please Login to Access Admin Panel. </div>";
    header('location:'.SITEURL.'admin_hod/adminlogin.php');
}
?>