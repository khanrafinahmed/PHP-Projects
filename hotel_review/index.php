<!Doctype>

<?php
session_start();
include ("functions/functions.php");
?>


<html>



<head>

<title> Hoteloholic </title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  	
<link rel= "stylesheet" href="styles/style.css" media="all"/> 

  </head>

<body>


<div class="navbar navbar-inverse" id="navbar">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="images/hoteloholic.png"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
			
		<li><a href="index.php">Home</a></li>
		
		<li><a href="#">New Releases</a></li>
		<li><a href="contactus/index.html">Contact Us</a></li>
			<li> <?php if (isset($_SESSION['username']))
		{
			echo"<p style='color: Yellow; font-size: 18px; margin-top: 10px; '> Welcome,". $_SESSION['username']. "</p>";
			
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
	</div>
	</div>
	
	<script>
	
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
	

	
 <div id="myCarousel" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" > </li>
		<li data-target="#myCarousel" data-slide-to="1"  ></li>
		<li data-target="#myCarousel" data-slide-to="2"  > </li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-caption">
			<h1>Wanna know more about us?</h1>
			<br>
			<a href="contactus/index.html" class="btn btn-default">Contact Us</a>
		</div>
		<div class="item active">
		<img src="images/3.jpg">
		
		</div>
		<div class="item ">
			<img src="images/1.jpg">
			
		</div>
		<div class="item ">
			<img src="images/2.jpg">
			
		</div>
	</div>

<!-- Start Slider Controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
		
</div> 
 

 
<div class="main_wrapper">

<!-- <div class="header_wrapper"> 
<a href="index.php"><img id="logo" src="images/hotel-logo-6.jpg"  /> </a>
<img id="banner" src="images/banner.jpg"  />


</div>
 -->
<!-- <div class= "menubar">
	<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="register.php">Sign Up</a></li>
	<li><a href="login.php">Already a Member? Log in</a></li>
	<li><a href="#">New Releases</a></li>
	<li><a href="#">Contact Us</a></li>
	
	</ul>
	
</div>

-->

				

<div class="content_wrapper">



<div id="content_area"> 
<div id="sidebar"> 
	<div id="sidebar_title">Location of Hotels</div>
	
	<ul id="cats">
		<?php getCats(); ?>
	</ul>
	
	
			
</div>
<div id="products_box">
	
	 <?php getPro(); ?> 
	<?php getCatPro(); ?>
	
</div>

</div>
</div>
<div id="footer"> 

<h2 style= "text-align: center; padding-top: 30px">&copy 2017 by www.hoteleholic.com </h2>
</div>

</div>

				


</body>

</html>


