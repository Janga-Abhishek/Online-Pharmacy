<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
if (!$con) {
    echo "not connected to server";
}
if (!mysqli_select_db($con, 'project')) {
    echo "database not connected";
}?>
<?php
if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['u_id'];
     echo $username;

  if(isset($_POST[""]))  
  {  

    $query = "INSERT INTO bookingSlot VALUES('Pick Up at Store')";
    $result = mysqli_query($con, $query);  
               

  }}
if (!mysqli_query($con, $sql)) {
    echo "Not registered yet, please try again";
} else {
    echo "Registered";
}

?>