
<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['username'];
     echo $username;
   
          ?>
                <?php if ($_SESSION['role'] == 'pharmacist') {?>

  <?php include 'pharmacist_header.php';?>
 <style>
    <?php include '../style.css';?>
</style>   
<head>  
    
           <title>Prescriptions</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  

      <div class="container">
      <div><a href="pharmacist_dashboard.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>
<table class="table table-bordered">  
                     <tr>  
                          <th>Order ID</th>  
                          <th>Customer ID</th>
                          <th>Order Details</th>  
                          <th>Status</th>
                          <th>Update Status</th>
                     </tr>  
                <?php  
                $query = "SELECT * FROM `order` where Order_Status='Items_Collected'";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     ?> 
                          <tr>  
                          <td><?php echo $row["orderId"] ?>
                               </td>
                               <td>  
                               <?php echo $row["userId"] ?>
                               </td>   
                               <td><?php echo $row["items"] ?>
                               </td>
                               <td><?php echo $row["Order_Status"] ?>
                               </td>
                               <td><a href="edit_orders_ready.php?orderId=<?php echo $row['orderId']; ?>&email=<?php echo $row['email']; ?>">Update</a></td>

                          </tr>  
                    
                <?php
                }  }
            else{
                echo "You cant access this Page click here to ";?><a href="./multi_user_login.php">Login</a><?php
            }}
                ?>  
                </table>  