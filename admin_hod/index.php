
<?php 
  include('../config/constants.php');
  include('../config/admin_login_check.php');
?>
<?php
  /*if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }*/
if(isset($_SESSION['request']))// checking whether the session is set ot not
{
 echo $_SESSION['request']; //Displayt the session message if set
 unset($_SESSION['request']);//Remove Session Message
}
?>
<html>
    <head>
        <title>Welcome!! Admin</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/user.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="back-graund">
        <div class="index">
               <div class="">
                  <a href="<?php echo SITEURL; ?>admin_hod/admin_logout.php" class="btn btn-primary">Log Out</a>
                </div>
            <div class="mail_content">    
               <h2 class="text-center" style="color:#fff;">Admin</h2>
                <br>
               <?php  
                  
                 if(isset($_SESSION['login']))
                   {
                    //echo $_SESSION['login'];
                    ?>
                    <script>
                      Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Login Successfully',
  showConfirmButton: false,
  timer: 1500
})
                    </script>
                    <?php
                    unset($_SESSION['login']);
                   }
                   if(isset($_SESSION['register']))
                   {
                    echo $_SESSION['register'];
                    unset($_SESSION['register']);
                   }
                   
               ?>
                <br>
                 <!--Login Form Start  -->
                 <form action="" method="POST" class="text-center">
                     <div class="main-page">
                       <input type="submit" name="new_request" value="View new requests" class="button-73"> 
                      </div>
                     <div class="main-page">
                        <input type="submit" name="view_pre_req" value="View Previous Requests" class="button-73">
                     </div>
                     <br><br>
                 </form>
            </div>     
        </div>
    </body>
</html>
<?php
  if(isset($_POST['new_request']))
  {
    
    header("location:".SITEURL."admin_hod/view_new_req.php");
  }
  if(isset($_POST['view_pre_req']))
  {
    header("location:".SITEURL."admin_hod/view_pre_req.php");
  }
?>