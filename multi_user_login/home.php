<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      		<!-- For Admin -->
			  <?php header("Location: ./admin_dashboard.php"); ?>

	      	<?php }
					  
			if($_SESSION['role'] == 'pharmacist'){ ?>
      		 <?php header("Location: ./pharmacist_dashboard.php"); ?>
      	<?php }
		  if($_SESSION['role'] == 'dispensary'){ ?>
			 <?php header("Location: ./dispensary_dashboard.php"); ?>
		<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: multi_user_login.php");
} ?>