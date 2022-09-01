<?php
session_start();
include "connection.php";
ini_set('display_errors', 1);

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
            <th>Previous Instructions</th>
            <th>Update Instructions</th>
            </tr>
        <?php
        $id = $_GET['id'];
        if (isset($_SESSION['u_id'])) {
            $username = $_SESSION['u_id'];
            echo $username;
            echo $id;
            $query = "SELECT * FROM `deliveryRequest` WHERE id='$id'";
            $result = mysqli_query($con, $query);
           
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <tr>
                    <td><?php echo $row['deliveryInstructions']?></td>
                    <td> <form action="update_instruction_delivery_prescription.php"> Instructions:<input type="text" name="deliveryInstructions" value="<?php echo $row['deliveryInstructions'] ?>" placeholder="Update Instructions" Required>
  <br><input type="hidden" name="id" value="<?php echo $row['id'] ?>" />

  <input type="submit" name="update" value="Update" style="margin-top:2% ;color: #fff;  background: #337ab7;   padding: 7px;"><form></td>
                </tr>

        <?php
            }
        }
        ?>
    </table>