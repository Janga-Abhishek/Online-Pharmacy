<!DOCTYPE HTML>
<html>

<head>

  <head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="/MScProject/code/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

<body>

  <?php
  $con = mysqli_connect('localhost', 'root', '', 'project');
  if (!$con) {
    echo "not connected to server";
  }
  if (!mysqli_select_db($con, 'project')) {
    echo "database not connected";
  }
  $u_id = $name = $email = $password = $c_password = $phone_number = $address = "";

  $u_idError = $nameError = $emailError = $passwordError = $c_passwordError = $phone_numberError = $addressError = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["u_id"])) {
      $u_idError = "user ID is required";
    } else {
      $u_id = test_input($_POST["u_id"]);
    }

    if (empty($_POST["name"])) {
      $nameError = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
      }
    }


    if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["c_password"])) {
      $password = test_input($_POST["password"]);
      $c_password = test_input($_POST["c_password"]);
      if (strlen($_POST["password"]) <= '8') {
        $passwordError = "Your Password Must Contain At Least 8 Characters!";
      } elseif (!preg_match("#[0-9]+#", $password)) {
        $passwordError = "Your Password Must Contain At Least 1 Number!";
      } elseif (!preg_match("#[A-Z]+#", $password)) {
        $passwordError = "Your Password Must Contain At Least 1 Capital Letter!";
      } elseif (!preg_match("#[a-z]+#", $password)) {
        $passwordError = "Your Password Must Contain At Least 1 Lowercase Letter!";
      }
    } elseif (!empty($_POST["password"])) {
      $c_passwordError = "Please Check You've Entered Or Confirmed Your Password!";
    } else {
      $passwordError = "Please enter password   ";
    }

    if (empty($_POST["email"])) {
      $emailError = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }
    if (empty($_POST["phone_number"])) {
      $phone_numberError = "please enter Phone Number";
    } else {
      $phone_number = test_input($_POST["phone_number"]);
      if (!preg_match("/^[1-9][0-9]*$/", $phone_number)) {
        $phone_numberError = "Only numbers are allowed";
      }
    }
    if (empty($_POST["address"])) {
      $addressError = "please enter Address";
    } else {
      $address = test_input($_POST["address"]);
    }
    if (!empty($_POST["u_id"]) && !empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["c_password"]) && !empty($_POST["email"]) && !empty($_POST["phone_number"]) && !empty($_POST["address"])) {
      $u_id = $_POST['u_id'];
      $name = $_POST['name'];
      $password = $_POST['password'];
      $c_password = $_POST['c_password'];
      $email = $_POST['email'];
      $phone_number  = $_POST['phone_number'];
      $address = $_POST['address'];
if($password != $c_password || !preg_match("/^[a-zA-Z-' ]*$/", $name) || !preg_match("/^[1-9][0-9]*$/", $phone_number)){}
else{
      $sql = "INSERT INTO user(u_id,name,password,c_password,email,phone_number,address) VALUES('$u_id','$name','$password','$c_password','$email','$phone_number','$address')";
      if (!mysqli_query($con, $sql)) {
        echo "Not registered yet, please try again";
      } else {
        echo "Registered";
      }
    }}
    
  }



  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <div class="container login_box">
    <h1>Registration Form</h1>
    <div class="container">
      <div class="row" style="display:flex;">
        <loginpannel>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <input type="text" name="u_id" placeholder="Username">
            <span class="requried">* </span>
            <span class="error"><?php echo $u_idError; ?></span><br><br>


            <input type="text" name="name" placeholder="Name">
            <span class="requried">* </span>
            <span class="error"><?php echo $nameError; ?></span>

            <br><br>

            <input type="password" name="password" placeholder="Password">
            <span class="requried">* </span>
            <span class="error"><?php echo $passwordError; ?></span><br><br>

            <input type="password" name="c_password" placeholder="Confirm Password">
            <span class="requried">* </span>
            <span class="error"><?php echo $c_passwordError; ?></span> <br><br>

            <input type="email" name="email" placeholder="Email">
            <span class="requried">* </span>
            <span class="error"><?php echo $emailError; ?></span> <br><br>

            <input type="text" name="phone_number" placeholder="Phone Number">
            <span class="requried">* </span>
            <span class="error"><?php echo $phone_numberError; ?></span> <br><br>

            <input type="text" name="address" placeholder="Address">
            <span class="requried">* </span>
            <span class="error"><?php echo $addressError; ?></span> <br><br>
            <br><br>
            <input type="submit" id="btn" value="Register">
            <a href="userLogin.php" style="background: #F9B900; padding: 7px; text-decoration: none; float: right; color:white;">Login</a>

          </form>
        </loginpannel>



</body>

</html>