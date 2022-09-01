<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
  <?php include 'header_admin.php';?>
 <style>
    <?php include '../style.css';?>
</style> 
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


	<style type="text/css">
		.abc button{
			width: 350px;
			font-size: 20px;
		}
	</style>
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'admin') {?>
			<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>

	<div align="center" class="mt-5 abc" style="padding-top: 50px;">
		<a href="add_item.php"><button class="btn btn-lg btn-primary">ADD ITEM</button></a><br><br>
		<a href="delete_item.php"><button class="btn btn-lg btn-primary">DELETE ITEM</button></a><br><br>
		<a href="user_prescriptions.php"><button class="btn btn-lg btn-primary">PRESCRIPTIONS</button></a><br><br>
		<a href="user_orders.php"><button class="btn btn-lg btn-primary">ORDER DETAIL</button></a><br><br>
		<a href="user_details.php"><button class="btn btn-lg btn-primary">CUSTOMER DETAIL</button></a>		
	</div>
	



	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
			  </div>
			</div>
	      	<?php } ?>
 </div>
 </body>
 </html>
 <?php }else{
     header("Location: multi_user_login.php");
 } ?>