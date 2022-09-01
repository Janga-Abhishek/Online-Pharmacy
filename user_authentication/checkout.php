
<?php 
session_start();
include 'connection.php';
include 'header_user.php';

if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['u_id'];
     $name=$_SESSION['name'];
     $email=$_SESSION['email'];
     $id = $_SESSION['id'];
     echo $id;
    

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
$name=$_SESSION['name'];
echo $name;

    }
}
else{
    $item_array = array(
        'item_id'			=>	$_GET["id"],
        'item_name'			=>	$_POST["hidden_name"],
        'item_price'		=>	$_POST["hidden_price"],
        'item_quantity'		=>	$_POST["quantity"]
    );
    
}
} 
?>

<div class="table-responsive container">
				<table class="table table-bordered">
					<tr>
						<th width="10%">Item Name</th>
                        <th width="10%">Total Cost</th>
						<th width="20%">Address</th>
						<th width="15%">Email</th>
						<th width="5%">Action</th>
					</tr>

					<tr>
                        <td>

                    <?php
                    $allItems='';
                    $items=array();
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                            $items[]= $values["item_name"]. " ".$values["item_quantity"]; 
                            $allItems= implode(", ", $items);
                    ?>
                        <?php                   
        					$total = $total + ($values["item_quantity"] * $values["item_price"]);

                        ?><?php }

                        echo $allItems;
                    } ?>
                        
                    </td>
                    <td><?php $totalCost= number_format($total, 2); 
                            echo $totalCost;
                    ?></td>
					<td>
                        <?php 
                        $delivery_address='';
                        $home_address=array();
                            $sql="select address from user where id='$id'";
                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()) {
                                $home_address =  $row["address"];
                                  }
                                echo $home_address 

                         ?>
                    </td>
					<td><?php echo $email ?></td>
                    <td><?php echo $keys ?></td>

					</tr>

					
                    <?php    
                    if($username!=null){
                    $sql = "INSERT INTO `order`(`userId`, `items`,`total`, `address`, `email`,`Order_Status`) VALUES ('$username','$allItems','$totalCost','$home_address','$email','Order Placed')";
                    
                    if (!mysqli_query($con, $sql)) {
                        echo "order not placed yet, please try again";
                    } else {
                        echo "order placed";
                        if(isset($_SESSION["shopping_cart"])){
                        unset($_SESSION["shopping_cart"]);
                    }
                    isset($_SESSION["shopping_cart"]);

                    }}}

?>
<script>window.location="Order_Placed_mail.php"</script>
<br>Thanks for buying products. Click <a href="products.php">here</a> to continue buy product.

<style>
    <?php include '../style.css';?>
</style>