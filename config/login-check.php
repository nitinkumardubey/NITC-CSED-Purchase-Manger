<?php  
 //Authorization - Access control

 //Check whethet the user is loged in or not
 //if(!isset($_SESSION['user']))
 if(!isset($_SESSION['session-id']))
 {
     //Redirect to Login Page with message
     $_SESSION['no-login-message']="<div class='error text-center' style='color:#fff'> Please Login </div>";
    header('location:'.SITEURL.'userlogin.php');
}
?>