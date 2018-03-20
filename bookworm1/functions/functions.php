<?php
$con=mysqli_connect("localhost","root","", "bookworm1");

		
		
	
	

	

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
		if(!isset($_GET['author']))
			{
	
	global $con;
	
	$get_pro="select * from books LIMIT 0,9";
	
	$run_pro= mysqli_query($con, $get_pro);
	

	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		$book_id= $row_pro['book_id'];
		$book_cat= $row_pro['book_cat'];
		$book_author= $row_pro['book_author'];
		$book_title= $row_pro['book_title'];
		$book_price= $row_pro['book_price'];
		$book_image= $row_pro['book_image'];
		

	
	?> 
	
	<div class="col-md-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row_pro["book_id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
					<img src="admin/book_images/<?php echo $row_pro["book_image"]; ?>" class="img-responsive" style="width: 130px; height: 152px; " /><br />

						<h4 class="text-info"><?php echo $row_pro["book_title"]; ?></h4>

						<h4 class="text-danger"> $<?php echo $row_pro["book_price"]; ?></h4>

						<input type="hidden" name="hidden_name" value="<?php echo $row_pro["book_title"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row_pro["book_price"]; ?>" />
						
						
						
				
						
						
						<?php 
						if (isset($_SESSION['username']))
						{
							
					
echo "<form method='POST'>
	<input type='text' name='quantity' value='1' class='form-control' />
	<button type='submit' class='btn btn-success' style='margin-top: 5px;' name='add_to_cart'>Add to Cart</button>								   
</form>";

}?>
					</div>
				</form>
			</div>
			
			
	
	<?php
	

	
	}
	
	
	?>
	
	
	
	
		
		<?php 
						}
		?>
			
			<?php
	
	}
}

	

function getCatPro(){
	if(isset($_GET['cat']))
	{
		$cat_id=$_GET['cat'];
			
	global $con;
	
	$get_cat_pro="select * from books where book_cat='$cat_id'";
	
	$run_cat_pro= mysqli_query($con, $get_cat_pro);
	
	$count_cats= mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0)
	{
		echo "<h2 style='padding: 20px;'> No Product is available in this Category! </h2>";
		
	}
	
	while ($row_cat_pro=mysqli_fetch_array($run_cat_pro))
	{
		$book_id= $row_cat_pro['book_id'];
		$book_cat= $row_cat_pro['book_cat'];
		$book_author= $row_cat_pro['book_author'];
		$book_title= $row_cat_pro['book_title'];
		$book_price= $row_cat_pro['book_price'];
		$book_image= $row_cat_pro['book_image'];
	
	
	
	
	
	echo "
			<div id='single_product'>
			
				<p> $book_title </p>
				<a href='details.php?book_id=$book_id'> <img src='admin/book_images/$book_image' width='180' height='180' /></a>
			
			<p><b> Tk $book_price </b></p>
				
				
			</div>
	
	
	
	
	
	
	";
	
	
	}
	
	}
	
}

?>