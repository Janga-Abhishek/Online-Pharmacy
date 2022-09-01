<?php
session_start();

include "connection.php";
include 'header_user.php';
?><style>
     <?php include '../style.css'; ?>
</style>
<?php
if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
     $username = $_SESSION['u_id'];
     $email=$_SESSION['email'];
?><p style="background: #F9B900; padding: 7px; text-decoration: none; float: right; color:white; margin-right:10px"><?php echo "Welcome ";
                                                                                                                             echo $username; ?></p><?php

                              if (isset($_POST["insert"])) {
                                   $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                                   $query = "INSERT INTO prescription(name, user,email, Order_Status) VALUES ('$file', '$username','$email','Order Placed')";
                                   if (mysqli_query($con, $query)) {
                                        echo '<script>alert("Prescription uploaded Succesfully")</script>';
                                        echo '<script>window.location="prescriptions_order_placed_mail.php"</script>';

                                   } else {
                                        printf("Error: %s\n", mysqli_error($con));
                                        exit();
                                   }
                              }
                         }
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
     <a href="logout.php"><button style="float: right; margin-right:80px;" class="btn btn-danger mr-3">LOGOUT</button></a>

     <div class="container" style="width:500px;">
          <h1 style="font-size:28px;">Please Upload Prescription</h1>
          <br />


          <form method="post" enctype="multipart/form-data" class="upload_prescription">
               <input type="file" name="image" id="image" class="insert_image" />
               <br />
               <p class="text-danger" style="font-size:15px;"><sup><b>*</b></sup>Please upload the image file of the following formats only<br><b> png, jpg, jpeg, gif</b></p>
               <br>
               <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
          </form>

     </div>

</body>

</html>