<?php
$con=mysqli_connect("localhost","root","", "hotel_review");
session_start();

if(isset($_GET['hotel'], $_GET['rating']))
	
{
	$username= $_SESSION['username'];
	echo $username;
 	$hotel= (int)$_GET['hotel'];
	$rating= (int)$_GET['rating'];
	
	
	/* if(in_array($rating, [1,2,3,4,5]))
	{ */
		/* $exists= $con->query("SELECT hotel_id FROM hotels where hotel_id='$hotel'")->num_rows ? true : false;
		if($exists)
		{
			$con->query("INSERT INTO hotel_ratings (hotel, rating) VALUES ({$hotel}, {$rating})");
			
		} */
		
		$exists= "SELECT hotel_id FROM hotels where hotel_id='$hotel'";
		$run_exists= mysqli_query($con,$exists);
		
		
		
		$insert_rat3=("DELETE FROM hotel_ratings WHERE username='$username' AND hotel='$hotel'
			");
			$run_rat3= mysqli_query($con, $insert_rat3);
			
			$insert_rat="INSERT INTO hotel_ratings (hotel, rating, username) VALUES ('$hotel', '$rating', '$username')";
		$run_rat= mysqli_query($con, $insert_rat);	
			

		
	/* 	if (isset($_SESSION))
		{
$insert_rat2=("UPDATE hotel_ratings SET  hotel='$hotel' AND rating='$rating'  WHERE username='$username' AND hotel='$hotel' ");
			$run_rat2= mysqli_query($con, $insert_rat2);		
					*/
	
		
				
	/* } */
	
	header('Location: details.php?hotel_id=' . $hotel);

	}

?> 
