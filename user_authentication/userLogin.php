<html>

<head>

<head>
 <title>User Login</title>
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
$u_id = $password="";

$u_idError = $passwordError="";

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {    
                if (empty($_POST["u_id"])) {
                    $u_idError = "u_id is required";
                }   
                if (empty($_POST["password"])) {
                    $passwordError = "password requried";

                }
                if(!isset($_SESSION["u_id"]) && !isset($_SESSION["id"]))
                {
                    require( "authentication.php"); 
                }
            }
           ?>
           <div class="container login_box">
           <h1>User Login</h1>
           <div class="container">
<div class="row" style="display:flex;">
<loginpannel>
    <div id="frm">
        <img class="loginPannelImages" src="/MScProject/code/Images/customer.png" alt="customer"><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
           
  <input type="text" name="u_id" placeholder="Username">
  <span class="requried">* </span>
  <span class="error"><?php echo $u_idError;?></span>

<br><br>
  <input type="password" name="password" placeholder="Password">
  <span class="requried">* </span>
  <span class="error"><?php echo $passwordError;?></span><br><br>
                <input type="submit" id="btn" value="Login" /><br><br>
    <p8> New user?, click here to <a href=" ./registration.php">Register</a></p8>
        </form>
    </div>
    
</body>

</html>