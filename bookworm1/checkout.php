<!Doctype>

<?php
include ("functions/functions.php");
session_start();

?>

<html>


<head>

<title> Bookworm </title>


<link rel= "stylesheet" href="styles/style.css" media="all"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>


<body>
<div class="main_wrapper">

<div class="header_wrapper"> 
<a href="index.php"><img id="logo" src="images/book.jpg" /> </a>
<img id="banner" src="images/banner.jpg" />


</div>

<div class= "menubar" >
	<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="register.php">Sign Up</a></li>
	<li><a href="login.php">Already a Member? Log in</a></li>
	<li><a href="#">New Releases</a></li>
	<li><a href="#">Contact Us</a></li>
	<li> <?php if (isset($_SESSION['username']))
		{
			echo"<b style='color:Blue; font-size: 18px'> Welcome,". $_SESSION['username']. "</b>";
		}
		
		else
		{
			echo"<b style='color:Red; font-size: 20px'>Welcome, Guest </b>";
		}
		?>
	 </li>
	</ul>
	
</div>


<div class="content_wrapper" >



<div id="content_area"> 


</div>
</div>
<div style="clear:both"></div>
			<br />
			<?php 
			if (isset($_SESSION['username']))
						{ ?>
			<h3>Order Details</h3>
			 <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
			
               /*  if(!empty($_SESSION["shopping_cart"])){ */

                    $total = 0;
					$username= $_SESSION['username'];
				
							
					/* 	$add_cart2= "UPDATE cart SET username='$username' WHERE username=''";
						$run_cart2= mysqli_query($con,$add_cart2); 
					 */
					
					
				
					
					$get_pro2="select * from cart";
					
					if (isset($_POST['add_to_cart']))
	{
		
		$id= $_GET['id'];
		$name=$_POST['hidden_name'];
		$price= $_POST['hidden_price'];
		$quantity=$_POST['quantity'];

		
		$insert_rat3=("DELETE FROM cart WHERE username='$username' AND id='$id'
			");
			$run_rat3= mysqli_query($con, $insert_rat3);
			
		$add_cart= "INSERT INTO cart (id, name, price, quantity, username) VALUES ('$id', '$name', '$price', $quantity, '$username')";
		
		$run_cart= mysqli_query($con,$add_cart);
		
		/* $add_cart2= "UPDATE cart SET quantity= '$quantity' WHERE id='$id' AND username='$username'";
		$run_cart2= mysqli_query($con,$add_cart2);  */

	}
	
	
					
						if(isset($_GET["action"]))
	{
	if($_GET["action"] == "delete")
	{
		$product_id= $_GET["id"];
		
		$insert_rat3=("DELETE FROM cart WHERE id='$product_id' AND username= '$username'
			");
			$run_rat3= mysqli_query($con, $insert_rat3);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
	
	}
	}

			
					
						
					
					
					
	
	$run_pro2= mysqli_query($con, $get_pro2);
	

	while ($row_pro2=mysqli_fetch_array($run_pro2))
	{
		$username2= $row_pro2['username'];
		$get_cart= "SELECT * FROM cart WHERE username= '$username2'";
		$run_cart3= mysqli_query($con, $get_cart);
		$row_cart3=mysqli_fetch_assoc($run_cart3);
		
		if(isset($_SESSION['username'])){
		if($_SESSION['username']==$row_cart3['username'])
		{
			
						$id= $row_pro2['id'];
						$name=$row_pro2['name'];
						$price= $row_pro2['price'];
						$quantity=$row_pro2['quantity'];
						
							
		
                   /*  foreach ($_SESSION["shopping_cart"] as $key => $value) { */
                        ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>Tk. <?php echo $price; ?></td>
                            <td>
                                Tk. <?php echo number_format($quantity * $price, 2); ?></td>
                            <td><a href="index.php?action=delete&id=<?php echo $id; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($quantity * $price);
                     
                        ?>
                       
                        <?php
                    
				   }
	
	}
		}
		
		?> 
		
		 <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">Tk. <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
						
			<?php
	}
	
					
                ?>
            </table>
			
			<?php
			if(isset($_SESSION['username']))
			{
		
		/* $username= $_SESSION['username']; */
		/* $rows = "SELECT * FROM customers where customer_username='$username'"; */
		
		
	/* 	if ($result=mysqli_query($con,$rows))
		  {
		  // Return the number of rows in result set

		  // Free result set
		  

			if(mysqli_num_rows($result) === 0){  */
			
			?>
			
			
		<br /><br />
		<form action="" method="post">
		<label>Name :</label>
		<input type="text" name="cus_name" id="name" required="required" placeholder="Please Enter Full Name"/><br /><br />
		<label>Email :</label>
		<input type="email" name="cus_email" id="email" required="required" placeholder="john123@gmail.com"/><br/><br />
		<label>City :</label>
		<input type="text" name="cus_city" id="city" required="required" placeholder="Please Enter Your City"/><br/><br />
		<label>Location :</label>
		<input type="text" name="cus_location" id="location" required="required" placeholder="Please Enter Your Location"/><br/><br />
		<label>Phone :</label>
		<input type="number_format" name="cus_phone" id="phone" required="required" placeholder="Please Enter Your Contact No."/><br/><br />
		<input type="submit" class='btn btn-success' style='margin-top: 5px; align:center' value=" Purchase " name="submit"/><br />
		</form>	
			
			<?php
			}
			?>
		
		
		<?php
		  
		 ?>  
		 
		  

		  
		  
		  
		  <?php
			if(isset($_POST["submit"])){
			
			$username= $_SESSION['username'];
			
			$insert_rat5=("DELETE FROM customers WHERE customer_username= '$username'");
			$run_rat5= mysqli_query($con, $insert_rat5);
			
	/* $sql = "INSERT INTO customers (customer_name, customer_email, customer_city, customer_location, customer_phone, customer_username)
VALUES ('".$_POST["cus_name"]."','".$_POST["cus_email"]."','".$_POST["cus_city"]."', '".$_POST["cus_location"]."', '".$_POST["cus_phone"]."', '$username')";

	$run_sql= mysqli_query($con, $sql);  */
	
			
			
			
			$sql3= "Select order_id from cart where username= '$username'";		
			$run_sql3= mysqli_query($con, $sql3);
			
			while ($row_sql3=mysqli_fetch_array($run_sql3))
			{
				$order_id= $row_sql3['order_id'];
				
				$sql = "INSERT INTO customers (customer_name, customer_email, customer_city, customer_location, customer_phone, customer_username, order_ids)
VALUES ('".$_POST["cus_name"]."','".$_POST["cus_email"]."','".$_POST["cus_city"]."', '".$_POST["cus_location"]."', '".$_POST["cus_phone"]."', '$username', '$order_id')";

	$run_sql= mysqli_query($con, $sql);
	
	/* $sql4= "Select order_id from cart 
	Union
	order_ids from customers
	where customer_username='$username';
	";
	
	$run_sql4= mysqli_query($con, $sql4); */
				
				/* $sql4= "INSERT INTO customers (order_ids) VALUES ('$order_id')";
				
				$run_sql4= mysqli_query($con, $sql4); */
				
				
			}
			

			$copy_cart= "INSERT into orders SELECT * from cart";
			$run_rat34= mysqli_query($con, $copy_cart);
			
			
			$insert_rat3=("DELETE FROM cart WHERE username= '$username'");
			$run_rat3= mysqli_query($con, $insert_rat3);
			
			
	
	
	
	echo '<script>alert("Order has been Placed")</script>';
			echo '<script>window.location="checkout.php"</script>';
			}
			
			
			?>
		
        </div>



</div>


</body>

</html>

