<?php
session_start();
include "connection.php";

?>
<?php include 'header_user.php'; ?>
<style>
    <?php include '../style.css'; ?>
</style>

<head>
    <title>Book Your Slot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <div> <a href="prescriptions.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>
    <h1>SELECT COLLECTIONS OPTION</h1>


    <?php
    if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
        $username = $_SESSION['u_id'];
        echo $username;
        $id = $_GET['orderId'];
        echo $id;


        if (isset($_POST["insert1"])) {

            $id = $_GET['orderId'];
            $query1 = mysqli_query($con, "select * from `order` where orderId='$id'");
            $data = mysqli_fetch_array($query1);

            $query = "INSERT INTO `orderPickup` VALUES('$id','Pick Up at Store')";

            if (mysqli_query($con, $query)) {
                $query2 = mysqli_query($con, "update `order` set Order_Status='Pick Up at Store' where orderId='$id'");
                echo '<script>alert("Your request has been registered")</script>';
                echo '<script>window.location.href="orders.php";</script>';
            } else {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="submit" name='insert1' value='Pick Up at Store' id='pick_up' class='pick_up slot_book'>
    </form>
    <h2 style="text-align:center;">(or)</h2>
    <br>
    <a class="delievry_option slot_book1" href="calander.php?orderId=<?php $id = $_GET['orderId'];
                                                                        echo $id; ?>">Select date for delivery</a>