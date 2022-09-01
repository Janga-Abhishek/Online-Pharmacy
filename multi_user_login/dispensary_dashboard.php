<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
  <?php include 'dispensary_header.php';?>
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
      	<?php if ($_SESSION['role'] == 'dispensary') {?>
			<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<h1>WELCOME TO DISPENSARY DASHBOARD</h1>	
	</div>

	<div align="center" class="mt-5 abc" style="padding-top: 50px;">
		<a href="user_prescription_accepted.php"><button class="btn btn-lg btn-primary">PRESCRIPTIONS</button></a><br><br>
		<a href="user_orders_accepted.php"><button class="btn btn-lg btn-primary">ORDER DETAIL</button></a><br><br>
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