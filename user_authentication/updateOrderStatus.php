<?php
session_start();
include "connection.php";
?>
<?php

if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
    $username = $_SESSION['u_id'];
    echo $username;

    $id = $_GET['orderId'];
    echo $id;
    $query = "update `order` set Order_Status='Home Delivery' where orderId='$id'";
    $statement = $con->prepare($query);

    $statement->execute();
}
?>
<script>
    window.location.href = "orders.php";
</script>