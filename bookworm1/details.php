<!Doctype>

<?php
include ("functions/functions.php");
?>

<html>


<head>

<title> Bookworm </title>


<link rel= "stylesheet" href="styles/style.css" media="all"/>
</head>

<body>

<div class="main_wrapper">

<div class="header_wrapper"> 
<a href="index.php"><img id="logo" src="images/book.jpg" /> </a>
<img id="banner" src="images/banner.jpg" />


</div>

<div class= "menubar">
	<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="all_products.php">Authors</a></li>
	<li><a href="customer/my_account.php">Publishers</a></li>
	<li><a href="#">New Releases</a></li>
	<li><a href="#">Contact Us</a></li>
	
	</ul>
	
</div>
<div class="content_wrapper">

<div id="sidebar"> 
	<div id="sidebar_title">Popular Book Categories</div>
	
	<ul id="cats">
		<?php getCats(); ?>
	</ul>
	
	
			
</div>

<div id="content_area"> 

<div id="products_box">
	
<?php

if (isset($_GET['book_id']))
	{
	
	$book_id= $_GET['book_id'];
	
	$get_pro="select * from books WHERE book_id='$book_id'";


	
	$run_pro= mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		$book_id= $row_pro['book_id'];
		$book_title= $row_pro['book_title'];
		$book_price= $row_pro['book_price'];
		$book_image= $row_pro['book_image'];
		$book_desc= $row_pro['book_desc'];
	
	echo "
			<div id='single_product'>
			
				<h3> $book_title </h3>
				 <img src='admin/book_images/$book_image' width='180' height='180' />
				
			
			<p><b>Tk $book_price </b></p>
			<p> $book_desc </p>
				
				
				
			</div>
	
	
	
	
	
	
	";
	
	}
	}

?>
</div>

</div>
</div>
<div id="footer"> 

<h2 style= "text-align: center; padding-top: 30px">&copy 2017 by www.bookworms.com </h2>
</div>

</div>


</body>

</html>


