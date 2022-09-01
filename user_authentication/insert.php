<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
if (!$con) {
    echo "not connected to server";
}
if (!mysqli_select_db($con, 'project')) {
    echo "database not connected";
}

$u_id = $_POST['u_id'];
$name = $_POST['name'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$email = $_POST['email'];
$phone_number  = $_POST['phone_number'];
$address = $_POST['address'];

    $sql = "INSERT INTO user VALUES('$u_id','$name','$password','$c_password','$email','$phone_number','$address')";


if (!mysqli_query($con, $sql)) {
    echo "Not registered yet, please try again";
} else {
    echo "Registered";
}

?>