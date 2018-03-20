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
	
	<li><a href="#">New Releases</a></li>
	<li><a href="contactus/index.html">Contact Us</a></li>
	<li> <?php if (isset($_SESSION['username']))
		{
			echo"<b style='color:Blue; font-size: 18px'> Welcome,". $_SESSION['username']. "</b>";
			
			?>
			<li><a href="logout.php" style="color: Red;">Sign Out</a></li>
		
			<?php
		}
		
		else
		{
			?> 
			<li><a href="login.php">Already a Member? Log in</a></li>
			<li><a href="register.php">Sign Up</a></li>
			<?php

		}
		?>
	 </li>
	</ul>
	
</div>


<div class="content_wrapper" >

<div id="sidebar"> 
	<div id="sidebar_title">Popular Book Categories</div>
	
	<ul id="cats">
		<?php getCats(); ?>
	</ul>
	
	
			
</div>

<div id="content_area"> 

<div id="products_box">
	
	 <?php getPro(); ?> 
	<?php getCatPro(); ?>
	
</div>

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

	/* 	$run_cart3= mysqli_query($con,$get_pro2);
					$followingdata = $run_cart3->fetch_assoc();
					$order_idnum= $followingdata['order_id']; */
	
		
		$insert_rat3=("DELETE FROM cart WHERE username='$username' AND id='$id'
			");
			$run_rat3= mysqli_query($con, $insert_rat3);
			
		/* $insert_rat7=("DELETE FROM orders WHERE username='$username' AND id='$id'
			");
			$run_rat7= mysqli_query($con, $insert_rat7); */
			
		$add_cart= "INSERT INTO cart (id, name, price, quantity, username) VALUES ('$id', '$name', '$price', $quantity, '$username')";
		
		$run_cart= mysqli_query($con,$add_cart);
		
		/* $add_cart7= "INSERT INTO orders (id, name, price, quantity, username, order_id) VALUES ('$id', '$name', '$price', $quantity, '$username', '$order_idnum')";
		
		$run_cart7= mysqli_query($con,$add_cart7); */
		
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
			
			/* $insert_rat7=("DELETE FROM orders WHERE id='$product_id' AND username= '$username'
			");
			$run_rat7= mysqli_query($con, $insert_rat7); */
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
						
	
			
	
							
			
					
                ?>
            </table>
			
				<?php
				echo "<form method='POST' action='checkout.php'>
	<button type='submit' class='btn btn-success' style='margin-top: 5px; align:center' name='checkout'>Checkout</button>								   
</form>";

	}	
					?>
        </div>

<div id="footer"> 

<h2 style= "text-align: center; padding-top: 30px">&copy 2017 by www.bookworms.com </h2>
</div>

</div>


</body>

</html>


