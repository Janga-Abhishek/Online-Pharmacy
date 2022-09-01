
<?php 
   session_start();
   include "connection.php";
   
          ?>
  <?php include 'header_user.php';?>
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
      <div> <a href="userdashboard.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>

<table class="table table-bordered">  
                     <tr>  
                          <th>Prescription</th>  
                          <th>Status</th>
                          <th>Select Delivery Option<br><span style="font-weight:300">(You will get an option once your order is ready)</th></th>
                          <th>Update Delivery Instructions<br><span style="font-weight:300">(You will get an option once you choose your home delivery option)</th>
                     </tr>  
                <?php  
                 if (isset($_SESSION['u_id'])) {                 
                    $username = $_SESSION['u_id'];
                    echo $username;
                $query = "SELECT * FROM prescription where user='$username' ORDER BY id DESC";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    ?> 
                    <tr>  
                         <td>  
                         <?php echo ' <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  ';  ?>
                         </td>   
                         <td><?php echo $row["Order_Status"] ?>
                         </td>
                         <td><?php if($row["Order_Status"]=='Order_Ready'){?><a href="book_your_slot.php?id=<?php echo $row['id']; ?>">Select</a><?php }?></td>
                         <td><?php if ($row["Order_Status"] == 'Home Delivery') { ?><a href="update_instructions_prescription.php?id=<?php echo $row['id'];?>">Update Instructions</a><?php } ?></td>
                    </tr>  
              
          <?php 
                        }  }
                ?>  
                </table>  
     