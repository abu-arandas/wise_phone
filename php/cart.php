<?php 
	require '../sql/connection.php';
	session_start();

	if(isset($_POST["add_to_cart"]) ) {
		if (isset($_SESSION['username'])) {
			if(isset($_SESSION["shopping_cart"])) {
				$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
				if(!in_array($_GET["id"], $item_array_id)) {
					$count = count($_SESSION["shopping_cart"]);
					$item_array = array(
						'item_id' => $_GET["id"],
						'item_name' => $_POST["hidden_name"],
						'item_price'=> $_POST["hidden_price"],
						'item_quantity'=> $_POST["quantity"]
					);
					$_SESSION["shopping_cart"][$count] = $item_array;
					
					echo '<script>alert("Added Succefully!")</script>';
					echo '<script>window.location="../cart.php"</script>';
				} else {
					$count = count($_SESSION["shopping_cart"]);
					$item_array = array(
						'item_id' => $_GET["id"],
						'item_name' => $_POST["hidden_name"],
						'item_price'=> $_POST["hidden_price"],
						'item_quantity'=> $_POST["quantity"]
					);
					$_SESSION["shopping_cart"][$count] = $item_array;
					echo '<script>window.location="../cart.php"</script>';
				}
			} else {
				$item_array = array(
					'item_id' => $_GET["id"],
					'item_name' => $_POST["hidden_name"],
					'item_price'=> $_POST["hidden_price"],
					'item_quantity'=> $_POST["quantity"]
				);
				$_SESSION["shopping_cart"][0] = $item_array;
				echo '<script>window.location="../cart.php"</script>';
			}
		}else {
			echo '<script>alert("Please Login")</script>';  
			echo '<script>window.history.back()</script>'; 
		}
	}

	if(isset($_GET["action"])) {  
      	if($_GET["action"] == "delete") {  
           foreach($_SESSION["shopping_cart"] as $keys => $values) {  
                if($values["item_id"] == $_GET["id"]) {  
					unset($_SESSION["shopping_cart"][$keys]);
					if (empty($_SESSION["shopping_cart"])) {
						echo '<script>alert("Item Removed")</script>';  
						echo '<script>window.location="../cart.php"</script>';  
					}else {
						echo '<script>alert("Item Removed")</script>';
						echo '<script>window.location="../cart.php"</script>';
					}
                }  
           }  
      	}elseif ($_GET["action"] == "done"){
			  
			$id = $_GET['id'];
			$sql = "DELETE FROM `orders` WHERE id=$id";
			mysqli_query($conn,$sql);
				
			echo "<script>alert('Successfully Deleted')</script>";
			echo "<script>window.history.back()</script>";
		  }
	}  

	if (isset($_POST['checkout'])) {	
		$username = $_POST['username'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$product_name = $_POST['title'];
		$product_quantity = $_POST['quantity'];
		$price = $_POST['total'];

		$sql = "INSERT INTO `orders` (`username`,`email`,`address`,`phone`,`products_name`,`products_quantity`,`price`) 
		VALUES ('$username','$email','$address','$phone','$product_name','$product_quantity','$price')";
		$result = mysqli_query($conn,$sql);
		
		echo '<script>alert("Succeful :)")</script>';
		echo '<script>window.location="../cart.php"</script>';
	}
?>