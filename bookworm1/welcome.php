<!Doctype>

<?php
include ("functions/functions.php");
?>

<?php

// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}
?>
<html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Welcome</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">

        body{ font: 14px sans-serif; text-align: center; }

    </style>

</head>

<body>

    <div class="page-header">

        <h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome</h1>

    </div>

    <p><a href="logout.php" class="btn btn-danger">Sign Out</a></p>

</body>

</html>
<head>

<title> Hotel_Review </title>


<link rel= "stylesheet" href="styles/style.css" media="all"/>
</head>

<body>

<div class="main_wrapper">

<div class="header_wrapper"> 
<a href="index.php"><img id="logo" src="images/hotel-logo-6.jpg" /> </a>
<img id="banner" src="images/banner.jpg" />


</div>

<div class= "menubar">
	<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="all_products.php">owners</a></li>
	<li><a href="customer/my_account.php">Publishers</a></li>
	<li><a href="#">New Releases</a></li>
	<li><a href="#">Contact Us</a></li>
	
	</ul>
	
</div>
<div class="content_wrapper">

<div id="sidebar"> 
	<div id="sidebar_title">Location of Hotels</div>
	
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
<div id="footer"> 

<h2 style= "text-align: center; padding-top: 30px">&copy 2017 by www.bookworms.com </h2>
</div>

</div>


</body>

</html>


