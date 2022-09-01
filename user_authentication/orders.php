<?php
session_start();
include "connection.php";

?>
<?php include 'header_user.php'; ?>
<style>
    <?php include '../style.css'; ?>
</style>

<head>
    <title>Orders</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <div> <a href="userdashboard.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>

    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <th>Order Details</th>
            <th>Status</th>
            <th>Select Delivery Option<br><span style="font-weight:300">(You will get an option once your order is ready)</th>
            <th>Update Delivery Instructions<br><span style="font-weight:300">(You will get an option once you choose your home delivery option)</th>
        </tr>
        <?php
        if (isset($_SESSION['u_id'])) {
            $username = $_SESSION['u_id'];
            echo $username;
            $query = "SELECT * FROM `order` WHERE userId='$username'";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row["orderId"]; ?></td>
                    <td>
                        <?php echo $row["items"]  ?>
                    </td>
                    <td><?php echo $row["Order_Status"] ?>
                    </td>
                    <td><?php if ($row["Order_Status"] == 'Order_Ready') { ?><a href="book_your_slot_delivery.php?orderId=<?php echo $row['orderId']; ?>">Select</a><?php } ?></td>
                    <td><?php if ($row["Order_Status"] == 'Home Delivery') { ?><a href="update_instructions.php?orderId=<?php echo $row['orderId'];?>">Update Instructions</a><?php } ?></td>
                </tr>

        <?php
            }
        }
        ?>
    </table>