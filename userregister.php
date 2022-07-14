<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Register - CSED Purchase Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/userlogin.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
       <div class="main_div">
        <div class="box" style="margin-left:10%">
            <h2 class="text-center" style="color:#fff;">Register</h2>
               <br>
               <?php  
                 
                 if(isset($_SESSION['register']))
                   {
                    echo $_SESSION['register'];
                    unset($_SESSION['register']);
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
                    <input type="text" name="e_mail" autocomplete="off" required="">
				            <label>E-Mail</label>
			            </div>
                  <div class="inputBox">
                  <input type="password" name="password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 4 and max 8 characters" required>
				            <label>Password</label>
			            </div>
                  <div class="inputBox">
                    <input type="text" name="csed_id" autocomplete="off" pattern="(?=.*\d)(?=.*[A-Z]).{9}" title="Must contain number and uppercase  letter of exact length 9 " required="">
				            <label>CSED ID</label>
			            </div>
            
                  <input type="submit" name="Register" value="Register" class="btn btn-primary">
                  <a href="<?php echo SITEURL; ?>userlogin.php" class="btn btn-primary" role="button">Back</a> 
                  <br><br>
                 </form>
            <p class="text-center" style="color:#fff">Created By - <a href="#">Group Number 10</a></p>
        </div>
      </div> 
    </body>
</html>

<?php 
  //check whether the submit button clicled or not
  if(isset($_POST['Register']))
  {
      //1.Get the data from form
      //$username=$_POST['username']; //Old that is not secure
      $e_mail=mysqli_real_escape_string($conn,$_POST['e_mail']);//New that is secure
      //$password=md5($_POST['password']);
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
       $sql1="SELECT * FROM tbl_login WHERE e_mail='$e_mail'";
       $res1=mysqli_query($conn,$sql1);
       $count1=mysqli_num_rows($res1);
        if($count1>0)
          {
            ?>
            <script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'User Already Exist !!',
              // footer: '<a href="">Wrong username or password</a>'
              })</script>;
            <?php
           die();
          }
      $raw_password=md5($_POST['password']);
      $password=mysqli_real_escape_string($conn,$raw_password);
      $csed_id=mysqli_real_escape_string($conn,$_POST['csed_id']);
      //$type=mysqli_real_escape_string($conn,$_POST['type']);
      //2.Creat SQL to check whether the user witrh username and passwotd exist
      $sql="INSERT INTO tbl_login set 
        e_mail='$e_mail',
        password='$password',
        csed_id='$csed_id'";
      //3.Execute Query
      $res= mysqli_query($conn,$sql);
      if($res==true)
      {
        //Data inserted
        //echo "Data inserted";
        //Creat a session variable to dispaly the message
        $_SESSION['register']="<div class='success'></div>";
        //Redirect page
        header("location:".SITEURL.'/userlogin.php');
      }     
      else
      {
        //Data is not inserted
        //echo "Data is not inserted";
         //Creat a session variable to dispaly the message
         $_SESSION['register']="<div class='error'>Fail to Register</div>";
         //Redirect page
         header("location:".SITEURL.'/register.php'); 
      }
  }
}
 
?>