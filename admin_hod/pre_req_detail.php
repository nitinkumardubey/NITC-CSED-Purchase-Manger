<?php 
  include('../config/constants.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>request detail</title>
	
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/adminlogin.css">	
</head>
<body>

<div class="main_div" style="margin-top:5%;margin-bottom:5%;">
	<div class="box" style="margin:10%;">
		<h1>Admin</h1>
		<br>
		<form method="post" action="">
			<div class="inputBox" style="color: #fff">
				<!-- <input type="text" name="rq_item" autocomplete="off" required=""> -->
				<!-- <label>Request Item</label> -->
				<?php
                 if(isset($_GET['id1']))
                {
                  $id1=$_GET['id1'];
				  //echo $id;
				  $sql="SELECT * FROM tbl_request WHERE id=$id1";
				  $res=mysqli_query($conn,$sql);
				  $count=mysqli_num_rows($res);
				  if($count==1)
				  {
					$row=mysqli_fetch_assoc($res);
					$req_item=$row['req_item'];
					$location=$row['location'];
					$reason=$row['reason'];
					$status=$row['status'];
					$date=$row['date'];
				  }
 				} 
?>
				<h3>Request Id:</h3>
				<p><?php echo $id1 ?></p>
				<br>
				<h3>Item Name:</h3>
				<p><?php echo $req_item ?></p>
				<br>
				<h3>Date:</h3>
				<p><?php echo $date ?></p>
				<br>
				<h3>Location:</h3>
				<p><?php echo $location ?></p>
				<br>
				<h3>Reason:</h3>
				<p><?php echo $reason ?></p>
				<br>
				<h3>Status:</h3>
				<p><?php echo $status ?></p>
				<br>
				<h3 for="status">Change Status:</h3>
				<select id="status" name="status">
                 <!-- <option id="status" value="pending">pending</option> -->
                 <option class="status" value="hold">hold</option>
                 <option class="status" value="approved">approved</option>
				 <option class="status" value="reject">reject</option>
                </select>
				<br>
				<br>
			</div>

			<!-- <input type="submit" name="back" value="Back"> -->
			<a href="<?php echo SITEURL; ?>admin_hod/view_pre_req.php" class="btn btn-primary" role="button">Back</a> 
			<input type="submit" name="submit" value="Save" class="btn-primary">
		</form>
	</div>
	
</div>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 {
	$status=$_POST['status'];
	$sql2="UPDATE tbl_request SET
	status='$status'
	WHERE id=$id1
   ";
   $res=mysqli_query($conn,$sql2);
   if($res==true)
   {
	 echo '<script>alert("Status updated successfully")</script>';
     header('location:'.SITEURL.'admin_hod/pre_req_detail.php?id1='.$id1);
   }
   else
   {
	echo '<script>alert("Something went wrong")</script>';
	   //stay in same page
   }
 }

?>