<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Login - CSED Purchase Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/userlogin.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    
    <body> <!-- class="back-graund" -->
        <div class="main_div">
          <div class="box" style="margin-left:10%">  
            <h2 class="text-center" style="color:#fff;">Login</h2>
               <br>
               <?php
                  if(isset($_SESSION['register']))
                   {
                     //echo $_SESSION['register'];
                    ?>
                    <script>
                      Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Registered Successfully',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    </script>
                    <?php
                    unset($_SESSION['register']);
                   }
                 if(isset($_SESSION['login']))
                   {
                    //echo $_SESSION['login'];
                    ?>
          <script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Wrong username or password</a>'
          })</script>;
                    <?php
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
                    <input type="text" name="e_mail" autocomplete="off" required>
				    <label>E-Mail</label>
			      </div>
                  <div class="inputBox">
                  <input type="password" name="password" autocomplete="off" required>
				    <label>Password</label>
			      </div>
                  <input type="submit" name="submit" value="Login" class="btn-primary">
                  <!-- <input type="submit" name="signup" value="SignUp" class="btn-primary"> -->
                  <!-- <input type="submit" name="forget" value="Forget pasword" class="btn-primary"> -->
                  <a href="<?php echo SITEURL; ?>userregister.php" class="btn btn-primary" role="button" >Sign up</a>
                  <a href="<?php echo SITEURL; ?>forget.php" class="btn btn-primary" role="button" style="margin-right:22%;">Forgot Password</a>
                     <br><br>
                 </form>
            <p class="text-center" style="color:#fff;">Created By - <a href="#">Group Number 10</a></p>
        </div>
     </div> 
    </body>
</html>

<?php 
  //check whether the submit button clicled or not
  // if(isset($_POST['signup']))
  // {
  //   header('location:'.SITEURL.'userregister.php');
  // }
  // if(isset($_POST['forget']))
  // {
  //   header('location:'.SITEURL.'forget.php');
  // }
  
  if(isset($_POST['submit']))
  {
      //1.Get the data from form
      //$username=$_POST['username']; //Old that is not secure
      
      $e_mail=mysqli_real_escape_string($conn,$_POST['e_mail']);//New that is secure
      //$password=md5($_POST['password']);
      
      // check if name only contains letters and whitespace
      // if (!preg_match("@nitc.ac.in",email)) {
      //   $nameErr = "Only nitc email allowed";
      // }
      $emailString = $e_mail;
      $index = strpos($e_mail,'@');
      $index = $index + 1;
      $main_str = substr($emailString,$index,strlen($emailString)-$index);
      if(strcmp($main_str,"nitc.ac.in")!=0)
      {
        ?>
        <script>Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Use NITC mail only',
          // footer: '<a href="">Wrong username or password</a>'
        })</script>;
                  <?php
      }
      else
      {
        $raw_password=md5($_POST['password']);
      $password=mysqli_real_escape_string($conn,$raw_password);
      //2.Creat SQL to check whether the user witrh username and passwotd exist
      $sql="SELECT * FROM tbl_login WHERE e_mail='$e_mail' AND password='$password'";
      //3.Execute Query
      $res= mysqli_query($conn,$sql);
      if($res==true)
      {
          $coun=mysqli_num_rows($res);
          $rows=mysqli_fetch_assoc($res);
          $id=$rows['id'];
          if($coun==1)
          {
              //User available and Login Success
              $_SESSION['login']="<div class='success'>Login Successful.</div>";
              //$_SESSION['user']=$e_mail;//To check whether user is loged in or not
              $_SESSION['session-id']=$id;
              $_SESSION["login_time_stamp"] = time(); 
             header('location:'.SITEURL);
          }
          else
          {
              //user not available and Login Fails
              $_SESSION['login']="<div class='error text-center'>Login Failed - Username or Password did not match.</div>";
              header('location:'.SITEURL.'userlogin.php');
          }
      }
      }
      
  }
 
?>