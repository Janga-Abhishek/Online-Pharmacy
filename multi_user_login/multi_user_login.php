

<head>
 <title>Admin Login Pannel</title>
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
$id = $password="";

$idError = $passwordError="";

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {    
                if (empty($_POST["id"])) {
                    $idError = "id is required";
                }   
                if (empty($_POST["password"])) {
                    $passwordError = "password requried";

                }
                if (!isset($_SESSION['username']) && !isset($_SESSION['id']))
                {
                    require( "authentication.php"); 
                }
            }
           ?>
           <div class="container login_box">
           <h1>Staff Login</h1>
           <div class="container">
<div class="row" style="display:flex;">
<loginpannel>
    <div id="frm">
        <img class="loginPannelImages" src="/MScProject/code/Images/admin.png" alt="admin"><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <select class="form_select" name="role">
            <option selected>Select Staff Type</option>
            <option value="admin">Admin</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="dispensary">Dispensary</option>

           </select> 
            <span class="requried">* </span>

           <br>
  <input type="text" name="username" id="username" placeholder="Username">
  <span class="requried">* </span>
  <span class="error"><?php if (empty($username)) {echo $idError;}?></span>


<br><br>
  <input type="password" name="password" id="password" placeholder="Password">
  <span class="requried">* </span>
  <span class="error"><?php if (empty($password)){echo $passwordError;}?></span><br><br>
                <input type="submit" id="btn" value="Login" />
            </p>
        </form>
    </div>
    
</body>

</html>

