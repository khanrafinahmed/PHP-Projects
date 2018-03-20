<?php
$con=mysqli_connect("localhost","root","", "hotel_review");


if(isset($_POST["choice"]))
{
	$choice= preg_replace('#[^0-9]#1', '', $_POST['choice']);
	if($choice>5)
	{
		echo "Cool";
		exit();
	}
	else if ($choice <1)
	{
		echo "alright";
		exit();
	}
	else
	{
		if (isset($_SESSION['username']))
		{
		$uname=$_SESSION['username'] ;
		$hotelid= $_GET['hotel_id'];
		$sql_check= mysql_query("SELECT * FROM rating_ip WHERE a_id= '$hotelid' AND user_name= '$uname' LIMIT 1");
		$num_rows= mysql_num_rows(sql_check);
		if($num_rows>0)
		{
			echo '<p style= "color:#F00;"> Sorry, You have already rated this hotel </p>';
			exit();
		}
		}
	$sql= mysqli_query("SELECT ratings from 
		
	}