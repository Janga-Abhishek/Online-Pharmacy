
<?php 
   session_start();
   include "connection.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['username'];
     echo $username;
   
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
                          <th>ID</th>  
                          <th>User Name</th>  
                          <th>Name</th>
                          <th>Mail ID</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                     </tr>  
                <?php  
                $query = "SELECT * FROM user";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     ?> 
                          <tr>  
                          <td><?php echo $row["id"] ?>
                               </td>
                               <td>  
                               <?php echo $row["u_id"] ?>
                               </td>   
                               <td><?php echo $row["name"] ?>
                               </td>
                               <td><?php echo $row["email"] ?>
                               </td>
                               <td><?php echo $row["phone_number"] ?>
                               </td>
                               <td><?php echo $row["address"] ?>
                               </td>
                          </tr>  
                    
                <?php
                }  }
            else{
                echo "You cant access this Page click here to ";?><a href="./multi_user_login.php">Login</a><?php
            }}
                ?>  
                </table>  