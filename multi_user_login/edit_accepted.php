<?php
include ("connection.php");
$id = $_GET['id'];
$query = mysqli_query($con,"select * from prescription where id='$id'");
$data = mysqli_fetch_array($query);
if(isset($_POST['update']))
{
    
    $Order_Status = $_POST['Order_Status'];
    $edit = mysqli_query($con,"update prescription set Order_Status='$Order_Status' where id='$id'");
    if($edit)
    {
        mysqli_close($con);
        header("location:user_prescriptions_dispensary.php");
        exit;
    }
    else
    {
        echo mysqli_error('');
    }    	
}
?>
<h1>Update Data</h1>
<body style="text-align:center">
<form method="POST" >
  <select name="Order_Status">
                                        <option value="default"<?php if($row["Order_status"]="default"){echo "selected";} ?>>Select Status</option>
                                        <option value="Items_Collected"<?php if($row['Order_status']='Items_Collected'){echo "selected";} ?>>Prescribed Items Collected</option>
                                        
                                   </select>
  <br>
  <input type="submit" name="update" value="Update" style="margin-top:2% ;color: #fff;  background: #337ab7;   padding: 7px;">
</form></body>





