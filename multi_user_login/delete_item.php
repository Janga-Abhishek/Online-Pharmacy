
<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['username'];
     echo $username;
   
     if(isset($_GET['id'])){
         $productID= $_GET['id'];
         $delete=mysqli_query($con," DELETE FROM `products` WHERE `id`='$productID'");
        }

          ?>
                <?php if ($_SESSION['role'] == 'admin') {?>

  <?php include 'header_admin.php';?>
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
     <div> <a href="admin_dashboard.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>

<table class="table table-bordered">  
                     <tr>  
                          <th>Product ID</th>  
                          <th>Product Name</th>  
                          <th>Price</th>
                          <th>Stock Availability</th>
                          <th>Delete Item</th>
                     </tr>  
                <?php  
                $query = "SELECT * FROM products";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     ?> 
                          <tr>  
                          <td><?php echo $row["id"] ?>
                               </td>
                               <td>  
                               <?php echo $row["name"] ?>
                               </td>   
                               <td><?php echo $row["price"] ?>
                               </td>
                               <td><?php echo $row["stock_availability"] ?>
                               </td>
                               <td><a href='delete_item.php?id=<?php echo $row["id"]?>'>Delete</a>
                               </td>
                          </tr>  
                    
                <?php
                }  }
            else{
                echo "You cant access this Page click here to ";?><a href="./multi_user_login.php">Login</a><?php
            }}
                ?>  
                </table>  