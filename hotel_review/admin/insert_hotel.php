<!DOCTYPE>

<?php

session_start();
include("includes/connect.php");
			
			$username= $_SESSION['username'];
			
			$sql= "select * from users WHERE username='$username'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$id = $row['id'];
			$db_password = $row['password'];
			$admin=$row['admin'];
            
if($admin!=1)
{
	header('Location: http://localhost/hotel_review/login.php');
	return;
}
?>

<html>

	<head>
	
	<title> Inserting hotel </title>
	
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
	
	</head>
	
<body>

	<form action= "insert_hotel.php" method="post" enctype="multipart/form-data">
	
		<table align="center" width="700" border="2" bgcolor="grey">
			
			<tr align= "center">
				<td colspan="8"><h2> Insert new post here </h2> </td>
			</tr>
			
			<tr>
			
				<td align="right"> hotel Title: </td>
				<td> <input type="text" name="hotel_title" size="60" required/> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> hotel Location: </td>
				<td> 
				<select name="hotel_cat">
				
					<option> Select a Location </option>
					<?php
					$get_cats= "select * from categories";
	
	$run_cats= mysqli_query($con,$get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id= $row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		
		echo "<option value='$cat_id'>$cat_title</option>";
	}
	
	

					
					?>
				
				
				</select>
				</td>
				
			</tr>
		
			
				<tr>
			
				<td align="right"> hotel Image: </td>
				<td> <input type="file" name="hotel_image" required /> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> hotel Price: </td>
				<td> <input type="text" name="hotel_price" required /> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> hotel Description: </td>
				<td><textarea name="hotel_desc" cols="20" rows="10" ></textarea> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> hotel Keywords: </td>
				<td> <input type="text" name="hotel_keywords" size="50"required /> </td>
				
			</tr>
			
			<tr align="center">
			
				<td colspan="8"><input type="submit" name="insert_post" value="Insert Now"/> </td>
			</tr>
			
		</table>











</body>

</html>


<?php

if (isset($_POST['insert_post']))
	
	{
		
		$hotel_title= $_POST['hotel_title'];
		$hotel_cat= $_POST['hotel_cat'];
		$hotel_price=$_POST['hotel_price'];
		$hotel_desc=$_POST['hotel_desc'];
		$hotel_keywords=$_POST['hotel_keywords'];
		
		$hotel_image= $_FILES['hotel_image']['name'];
		$hotel_image_tmp= $_FILES['hotel_image']['tmp_name'];
		
		move_uploaded_file($hotel_image_tmp,"hotel_images/$hotel_image");
		
		 $insert_hotel= "insert into hotels 
		(hotel_cat, hotel_title, hotel_price, hotel_desc, hotel_image, hotel_keywords)
		values
		('$hotel_cat', '$hotel_title', '$hotel_price', '$hotel_desc', '$hotel_image', '$hotel_keywords')";
	
	
	
		
		
		if (mysqli_query ($con, $insert_hotel))
		{
			echo "<script> alert ('hotel has been Inserted!') </script>";
			echo "<script> window.open ('insert_hotel.php','_self')</script>";
			
		}
	
	
	
	
	}



















?>