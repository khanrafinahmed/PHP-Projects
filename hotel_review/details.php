<!Doctype>

<?php
include ("functions/functions.php");
date_default_timezone_get('Bangladesh/Dhaka');
  session_start();
/*   $hotel=null; */
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
		<li><a href="register.php">Sign Up</a></li>
		<li><a href="login.php">Already a Member? Log in</a></li>
		<li><a href="#">New Releases</a></li>
		<li><a href="#">Contact Us</a></li>
		<li> <?php if (isset($_SESSION['username']))
		{
			echo"<b style='color:yellow;'> Welcome: </b>". $_SESSION['username']. "<b style='color:yellow;'> </b>";
		}
		
		else
		{
			echo"<b>Welcome Guest: </b>";
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
	

<div class="main_wrapper">

<div class="content_wrapper">

<div id="sidebar"> 
	<div id="sidebar_title">Location of Hotels</div>
	
	<ul id="cats">
		<?php getCats(); ?>
	</ul>
	
	
			
</div>

<div id="content_area"> 
	
	

<div id="products_box">
	
<?php

if (isset($_GET['hotel_id']))
	{
	
	$hotel_id= $_GET['hotel_id'];
	
	$get_pro="select * from hotels WHERE hotel_id='$hotel_id'"; 


	
	$run_pro= mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		$hotel_id= $row_pro['hotel_id'];
		$hotel_title= $row_pro['hotel_title'];
		$hotel_price= $row_pro['hotel_price'];
		$hotel_image= $row_pro['hotel_image'];
		$hotel_desc= $row_pro['hotel_desc'];
		
	
	echo "
			<div id='single_producta'>
			
				<h3> $hotel_title </h3>
				 <img src='admin/hotel_images/$hotel_image' width='800' height='500' />
				
			
			<p><b>Tk $hotel_price </b></p>
			<p> $hotel_desc </p>
				
			
				
				
			</div>
		
	
	
	
	
	
	
	
	";
	
	}
	}

?>
</div>
<?php

$hotel= null;

if(isset($_GET['hotel_id']))
{	

	$id= (int)$_GET['hotel_id'];
	$hotel= $con->query("select hotels.hotel_id, hotels.hotel_title, hotels.hotel_price, hotels.hotel_image, hotels.hotel_desc, AVG(hotel_ratings.rating) AS rating 
	FROM hotels 	
	LEFT JOIN hotel_ratings 
	ON hotels.hotel_id= hotel_ratings.hotel 
	WHERE hotel_id='$hotel_id' ")->fetch_object();
}
 ?>
 <div class='hotel_rating'>Rating: <?php echo $hotel->rating;?>/5</div>
<?php
 if (isset($_SESSION['username']))
{
 
	?>
<div class='hotel_rate'>
				Rate this Hotel:
				<?php foreach(range(1,5) as $rating):?>
					<a href="rate.php?hotel=<?php echo $hotel->hotel_id;?>&rating=<?php echo $rating; ?>"><?php echo $rating; ?></a>
				<?php endforeach;?>
</div>
<?php }

?>		

</div>
</div>



<div class="comment_section">
<?php
if (isset($_SESSION['username']))
{
echo "<form method='POST' action='".setComments($con)."'>
	<input type='hidden' name='uid' value='".$_SESSION['username']."'>
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea class='textarea' name='message'></textarea>
	<button type='submit' class='submit' name='commentSubmit'>Comment</button>
</form>";

}
else
{	
	echo "You need to be logged in to comment! <br><br>";
}
getComments($con);
?>

</div>


<div id="footer"> 

<h2 style= "text-align: center; padding-top: 30px">&copy 2017 by www.hoteleholic.com </h2>
</div>

</div>




</body>

</html>


