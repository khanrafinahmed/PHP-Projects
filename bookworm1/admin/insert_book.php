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
	header('Location: http://localhost/bookworm1/login.php');
	return;
}
?>

<html>

	<head>
	
	<title> Inserting Book </title>
	
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	
	</head>
	
<body>

	<form action= "insert_book.php" method="post" enctype="multipart/form-data">
	
		<table align="center" width="700" border="2" bgcolor="grey">
			
			<tr align= "center">
				<td colspan="8"><h2> Insert new post here </h2> </td>
			</tr>
			
			<tr>
			
				<td align="right"> Book Title: </td>
				<td> <input type="text" name="book_title" size="60" required/> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> Book Category: </td>
				<td> 
				<select name="book_cat">
				
					<option> Select a Category </option>
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
			
				<td align="right"> Book Author: </td>
				
				<td> <input type="text" name="book_author" required /> </td>
				
				
			</tr>
				
			
				<tr>
			
				<td align="right"> Book Image: </td>
				<td> <input type="file" name="book_image" required /> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> Book Price: </td>
				<td> <input type="text" name="book_price" required /> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> Book Description: </td>
				<td><textarea name="book_desc" cols="20" rows="10" ></textarea> </td>
				
			</tr>
			
				<tr>
			
				<td align="right"> Book Keywords: </td>
				<td> <input type="text" name="book_keywords" size="50"required /> </td>
				
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
		
		$book_title= $_POST['book_title'];
		$book_cat= $_POST['book_cat'];
		$book_author=$_POST['book_author'];
		$book_price=$_POST['book_price'];
		$book_desc=$_POST['book_desc'];
		$book_keywords=$_POST['book_keywords'];
		
		$book_image= $_FILES['book_image']['name'];
		$book_image_tmp= $_FILES['book_image']['tmp_name'];
		
		move_uploaded_file($book_image_tmp,"book_images/$book_image");
		
		 $insert_book= "insert into books 
		(book_cat, book_author, book_title, book_price, book_desc, book_image, book_keywords)
		values
		('$book_cat', '$book_author', '$book_title', '$book_price', '$book_desc', '$book_image', '$book_keywords')";
	
	
	
		
		
		if (mysqli_query ($con, $insert_book))
		{
			echo "<script> alert ('Book has been Inserted!') </script>";
			echo "<script> window.open ('insert_book.php','_self')</script>";
			
		}
	
	
	
	
	}




?>