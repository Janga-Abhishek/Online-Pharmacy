<?php  
session_start();
include "./connection.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	
        $sql = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);
		$_SESSION["status"]=false;
        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];
				$_SESSION["status"]=true;

        		header("Location: ./home.php");

        	}else {
				echo "<h1> <center> Login failed. Invalid ID or password.</h1>";  
				header("refresh:3 ; url=multi_user_login.php");        	}
        }else {
			echo "<h1> <center> Login failed. Invalid ID or password.</h1>";  
            header("refresh:3 ; url=multi_user_login.php");        }

	
}else {
	header("Location: ./multi_user_login.php");
}