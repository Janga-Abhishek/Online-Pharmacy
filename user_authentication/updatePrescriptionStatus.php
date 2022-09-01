<?php
session_start();
include "connection.php";
?>
<?php
if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
    $username = $_SESSION['u_id'];
    echo $username;

    $id = $_GET['id'];
    echo $id;
    $query = "update `prescription` set Order_Status='Home Delivery' where id='$id'";
    $statement = $con->prepare($query);

    $statement->execute();
}
?>
<script>
    window.location.href = "prescriptions.php";
</script>