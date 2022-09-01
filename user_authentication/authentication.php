
<?php  
session_start();
include "./connection.php";

if (isset($_POST['u_id']) && isset($_POST['password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$u_id = test_input($_POST['u_id']);
	$password = test_input($_POST['password']);
	
        $sql = "select * from `user` where u_id = '$u_id' and password = '$password'";
        $result = mysqli_query($con, $sql);
		$_SESSION["status"]=false;
        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['u_id'] = $row['u_id'];
                $_SESSION['email'] = $row['email'];
				$_SESSION["status"]=true;

        		header("Location: userdashboard.php");

        	}else {
				echo "<h1> <center> Login failed. Invalid ID or password.</h1>";  
				header("refresh:3 ; url=userLogin.php");        	}
        }else {
			echo "<h1> <center> Login failed. Invalid ID or password.</h1>";  
            header("refresh:3 ; url=userLogin.php");        }

	
}else {
	header("Location: ./userLogin.php");
}