
<?php 
ini_set('display_errors', '1');
session_start();
$connect = mysqli_connect("localhost", "root", "", "project");
include 'header_user.php';

if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {                 
     $username = $_SESSION['u_id'];
     echo $username;

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{	
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$itemId=$_GET["id"];
			echo $itemId;
			$quantity= $_POST['quantity'];
				echo $quantity;
				$sql4="select stock_availability from `products` where id='$itemId'";
				$result = $connect->query($sql4);	
				$row = $result->fetch_assoc();
				$stockAvail= $row['stock_availability'];			
				if($quantity > $stockAvail){echo"<script>alert('You have exceeded the available stock')</script>";}else{
				$sql5="update `products` set stock_availability = stock_availability - '$quantity' where id='$itemId'";
				if (!mysqli_query($connect, $sql5)) {
					echo "Not updated";
				  } else {
					echo "Updated";
				  }

			$_SESSION["shopping_cart"][$count] = $item_array;}
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		
		$itemId=$_GET["id"];
		echo $itemId;
		$quantity= $_POST['quantity'];
				echo $quantity;
				$sql4="select stock_availability from `products` where id='$itemId'";
				$result = $connect->query($sql4);	
				$row = $result->fetch_assoc();
				$stockAvail= $row['stock_availability'];			
				if($quantity > $stockAvail){echo"<script>alert('You have exceeded the available stock')</script>";}else{
				$sql5="update `products` set stock_availability = stock_availability - '$quantity' where id='$itemId'";
				if (!mysqli_query($connect, $sql5)) {
					echo "Not updated";
				  } else {
					echo "Updated";
				  }
				$_SESSION["shopping_cart"][0] = $item_array;
			}
				
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="products.php"</script>';
			}
		}
	}
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h1 align="center">Select Products to Buy</h1><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
					<?php echo ' <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />  ';  ?>

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">£ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<?php $stock=$row['stock_availability']; if($stock<='0'){echo "<outOfStock>Out of Stock</outOfStock>";} else{?>
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success addToCart" value="Add to Cart" />
							<?php } ?>
					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
		</div>
	</div>
	<br />
	</body>
</html>

<style>
    <?php include '../style.css';?>
</style>