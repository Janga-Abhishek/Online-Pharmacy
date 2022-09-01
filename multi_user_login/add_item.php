
<?php 
ini_set('display_errors', 1);
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
    input{
        height:20px;
        margin-left: 10px !important;
        width: 50% !important;
    }
    .add_items{
        text-align: left !important;
    }
    .add_items input#insert{
        text-align: center !important;
    }
</style>   
<head>  
    
           <title>Prescriptions</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  

      <div class="container">
     <div> <a href="admin_dashboard.php"><button style="float: right;" class="btn btn-danger mr-3">BACK</button></a></div>
   <?php  if (isset($_POST["insert"])) {
                                   $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                                   $name = $_POST['name'];
                                   $price  = $_POST['price'];
                                   $stock_availability = $_POST['stock_availability'];
                                   $query = "INSERT INTO products(name, image, price, stock_availability) VALUES ('$name','$file', '$price','$stock_availability')";
                                   if (mysqli_query($con, $query)) {
                                        echo '<script>alert("item added Succesfully")</script>';
                                   } else {
                                        printf("Error: %s\n", mysqli_error($con));
                                        exit();
                                   }
                              }
                  }
            else{
                echo "You cant access this Page click here to ";?><a href="./multi_user_login.php">Login</a><?php
            }}
                ?>  
<script>
     $(document).ready(function() {
          $('#insert').click(function() {
               var image_name = $('#image').val();
               if (image_name == '') {
                    alert("Please Select Image");
                    return false;
               } else {
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                         alert('Invalid Image File');
                         $('#image').val('');
                         return false;
                    }
               }
          });
     });
</script>
<!DOCTYPE html>
<html>


<body>
     <br /><br />

     <div class="container" style="width:500px;">
          <br />
          <h1>Add New Item</h1>
          <form method="post" enctype="multipart/form-data" class="upload_prescription add_items">
              <label>1. Item Name: </label><input type="text" name="name" id="name"><br>
              <label style="margin-top: 5%;">2. Product Image: </label><input type="file" name="image" id="image" class="insert_image" style="margin: -26px 0px 0px 32% !important;"/><br>
               <p class="text-danger" style="font-size:15px;"><sup><b>*</b></sup>Please upload the image file of the following formats only<br><b> png, jpg, jpeg, gif</b></p>
<br>
<label>3. Price of Product: </label><input type="text" name="price" id="price" style="margin-top: 5%;"><br>
<label>4. Quantity of Product: </label><input type="text" name="stock_availability" id="stock_availability" style="margin-top: 5%;"/>
               <br />
               <input type="submit" name="insert" id="insert" value="ADD ITEM" class="btn btn-info" style="margin-top: 5%; height:35px; margin-left:25% !important" />
          </form>

     </div>

</body>

</html>