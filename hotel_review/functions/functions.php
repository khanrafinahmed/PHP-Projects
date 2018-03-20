<?php
$con=mysqli_connect("localhost","root","", "hotel_review");


function getCats()
{
	global $con; 
	
	$get_cats= "select * from categories";
	
	$run_cats= mysqli_query($con,$get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id= $row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		
		echo "<li><a href= 'index.php?cat=$cat_id'> $cat_title </a> </li>";
	}
	
	
}

function getPro(){
	if(!isset($_GET['cat']))
	{
		
	
	global $con;
	
	$get_pro="select * from hotels LIMIT 0,9";
	
	$run_pro= mysqli_query($con, $get_pro);
	
	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		$hotel_id= $row_pro['hotel_id'];
		$hotel_cat= $row_pro['hotel_cat'];
		$hotel_title= $row_pro['hotel_title'];
		$hotel_price= $row_pro['hotel_price'];
		$hotel_image= $row_pro['hotel_image'];
	
	echo "
			<div id='single_product'>
			
				<p> $hotel_title </p>
				<a href='details.php?hotel_id=$hotel_id'> <img src='admin/hotel_images/$hotel_image' width='180' height='180' /></a>
				
			
			<p><b> Price: Tk $hotel_price </b></p>
				
				
			</div>
	
	
	
	
	
	
	";
	
	}
	
	
}
}
	

function getCatPro(){
	if(isset($_GET['cat']))
	{
		$cat_id=$_GET['cat'];
			
	global $con;
	
	$get_cat_pro="select * from hotels where hotel_cat='$cat_id'";
	
	$run_cat_pro= mysqli_query($con, $get_cat_pro);
	
	$count_cats= mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0)
	{
		echo "<h2 style='padding: 20px;'> No Hotel is available in this Location! </h2>";
		
	}
	
	while ($row_cat_pro=mysqli_fetch_array($run_cat_pro))
	{
		$hotel_id= $row_cat_pro['hotel_id'];
		$hotel_cat= $row_cat_pro['hotel_cat'];
		$hotel_title= $row_cat_pro['hotel_title'];
		$hotel_price= $row_cat_pro['hotel_price'];
		$hotel_image= $row_cat_pro['hotel_image'];
	
	
	
	
	
	echo "
			<div id='single_product'>
			
				<p> $hotel_title </p>
				<a href='details.php?hotel_id=$hotel_id'> <img src='admin/hotel_images/$hotel_image' width='180' height='180' /></a>
			
			<p><b> Tk $hotel_price </b></p>
				
				
			</div>
	
	
	
	
	
	
	";
	
	
	}
	
	}
	
}

function setComments($con)
{
	if (isset($_POST['commentSubmit'])){
		$uid= $_POST['uid'];
		$date=$_POST['date'];
		$message= $_POST['message'];
		
		$h_id= $_GET['hotel_id'];
		$set_comment= "INSERT INTO comments (uid, date, message, h_id) VALUES ('$uid', '$date', '$message', $h_id)";
		$run_comment= mysqli_query($con,$set_comment);
	}
	
}

function getComments($con)
{	
	$h_id= $_GET['hotel_id'];
	$get_comment= "SELECT * FROM comments WHERE h_id= $h_id";
	$run_comment= mysqli_query($con, $get_comment);
	
	
	

	while($row_comment=mysqli_fetch_assoc($run_comment)){
		

		$id= $row_comment['uid'];
		$get_comment2= "SELECT * FROM users WHERE username= '$id'";
		$run_comment2= mysqli_query($con, $get_comment2);
		while($row_comment2=mysqli_fetch_assoc($run_comment2))
		{
	echo "<div class='comment-box'> <p>";
		echo $row_comment2['username']."<br>";
		echo $row_comment ['date']."<br>";
		echo nl2br ($row_comment ['message']);
	echo"</p>";
	if(isset($_SESSION['username'])){
		if($_SESSION['username']==$row_comment2['username'])
		{
	echo"<form class='delete-form' method='POST' action='".deleteComments($con)."'>
		<input type='hidden' name='cid' value='".$row_comment['cid']."'>
		<button type='submit' name='commentDelete'>Delete </button>
	</form>";
		}
	}
	
	echo "</div>";
	
		}
	}
	}


function deleteComments($con)
{
	if(isset($_POST['commentDelete']))
	{
		$cid= $_POST['cid'];
		$sql= "DELETE FROM comments WHERE cid='$cid'";
		$result= $con->query($sql);
		
	}
}



?>