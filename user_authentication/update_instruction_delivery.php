<?php
session_start();
include "connection.php";
?>
<?php

if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
    $username = $_SESSION['u_id'];
    echo $username;
    $orderId=$_GET['orderId'];
    echo $orderId;
    $deliveryInstructions = $_GET['deliveryInstructions'];
    echo $deliveryInstructions;
    $query = "update `bookingOrderSlot` set deliveryInstructions='$deliveryInstructions' where orderID='$orderId'";
    $statement = $con->prepare($query);

    $statement->execute();
}
?>
<script>
        window.location.href = "orders.php";
</script>



