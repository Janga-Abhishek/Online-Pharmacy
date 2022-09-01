<?php
ini_set('display_errors', 1);

session_start();
include "connection.php";
?>
<?php

if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
    $username = $_SESSION['u_id'];
    echo $username;
    $prescriptionId=$_GET['id'];
    echo $prescriptionId;
    $deliveryInstructions = $_GET['deliveryInstructions'];
    echo $deliveryInstructions;
    $query10 = "update `deliveryRequest` set deliveryInstructions='$deliveryInstructions' where id='$prescriptionId'";
    $statement = $con->prepare($query10);

    $statement->execute();
}
?>
<script>
        window.location.href = "prescriptions.php";
</script>



