<?php
include ("connection.php");
$id = $_GET['orderId'];
$email=$_GET['email'];
echo $email;
echo $id;
$query = mysqli_query($con,"select * from `order` where orderId='$id'");
$data = mysqli_fetch_array($query);
if(isset($_POST['update']))
{
    
    $Order_Status = $_POST['Order_Status'];
    $edit = mysqli_query($con,"update `order` set Order_Status='$Order_Status' where orderId='$id'");
    if($edit)
    {
        mysqli_close($con);
        if($Order_Status=="Order_Rejected"){
        header("location:order_rejected_mail.php?email=$email");}
        else{
            header("location:user_orders.php");
        }
        exit;
    }
    else
    {
        echo mysqli_error('');
    }    	
}
?>
<h1>Update Data</h1>
<body style=" text-align:center">
<form method="POST" >
  <select name="Order_Status">
                                        <option value="default"<?php if($row["Order_Status"]="default"){echo "selected";} ?>>Select Status</option>
                                        <option value="Order_Accepted"<?php if($row['Order_Status']='Order_Accepted'){echo "selected";} ?>>Order Accepted</option>
                                        <option value="Order_Rejected"<?php if($row['Order_Status']='Order_Rejected'){echo "selected";} ?>>Order Rejected</option>
                                        
                                   </select>
  <br>
  <input type="submit" name="update" value="Update" style="margin-top:2% ;color: #fff;  background: #337ab7;   padding: 7px;">
</form></body>





