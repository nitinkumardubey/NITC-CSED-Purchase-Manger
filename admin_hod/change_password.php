<?php 
  include('../config/constants.php');
 // include('../config/admin_login_check.php');
?>

<?php
 if(isset($_GET['id']))
 {
     $id=$_GET['id'];
 }
?>
<html>
    <head>
        <title>Login - CSED Purchase Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/adminlogin.css">
    </head>
    
    <body> 
        <div class="main_div">
          <div class="box" style="margin-left:10%;">  
            <h2 class="text-center" style="color:#fff;">Change Password</h2>
               <br>
               <?php  
                 
                 if(isset($_SESSION['login']))
                   {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                   }
                   if(isset($_SESSION['no-login-message']))
                   {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                   }
               
               ?>
                <br>
                 <!--Login Form Start  -->
                 <form action="" method="POST" class="text-center">
                 <div class="inputBox">
                    <input type="text" name="npassword" autocomplete="off" required="">
				    <label>New Password</label>
			      </div>
                  <div class="inputBox">
                  <input type="text" name="cpassword" autocomplete="off" required="">
				    <label>Confirm Password</label>
			      </div>
                  <input type="hidden" name="id" value=<?php echo $id; ?> class="btn-primary">
                  <input type="submit" name="submit" value="Confirm" class="btn-primary">
                     <br><br>
                 </form>
            <p class="text-center" style="color:#fff">Created By - <a href="#">Group Number 10</a></p>
        </div>
     </div> 
    </body>
</html>

<?php 
  //check whether the submit button clicled or not
  if(isset($_POST['submit']))
  {
      $npassword=$_POST['npassword'];
      $cpassword=$_POST['cpassword'];
      $id1=$_POST['id'];

      if($npassword==$cpassword)
      {
         //Update the Password
         //'echo "pass match";
         $npassword=md5($_POST['cpassword']);
         $sql2="UPDATE tbl_admin SET password='$npassword' WHERE id=$id1";
         //Execute the Query
         $res2=mysqli_query($conn,$sql2);
         if($res2==true)
         {
           $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully. </div>";
           header('location:'.SITEURL.'admin_hod/adminlogin.php');
         }
         else
         {
           $_SESSION['change-pwd']="<div class='error'>Fail to change Password. </div>";
           header('location:'.SITEURL.'admin_hod/forget.php');
         }
      }
      else
      {
        $_SESSION['change-pwd']="<div class='error'>Password Doesn't match! </div>";
        header('location:'.SITEURL.'admin_hod/change_password.php?id='.$id);
      }      
  }
 
?>