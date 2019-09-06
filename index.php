<?php 
require_once('nav.php');
require("dbconnection.php");
$db=new dbconnection();

?>

<ul class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li class="active">Category</li>
</ul> 
<div class="container">
	<div class="row">
		<table border="1" class="table table-bordered table-hover table-responsive">

			<tr>
				<th>
					product name
				</th>
				<th>
					unit
				</th>
				<th>
					qty
				</th>
				<th>
					price
				</th>
				<th>
					photo
				</th>
				<th>
					descrption
				</th>
				<th>
					category
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
			<?php

			$result=$db->QueryTable("select * from product");
			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

				?>
				<tr>
					<td>

						<?php echo $row['pname']; ?>
					</td>
					<td>

						<?php echo $row['unit']; ?>
					</td>
					<td>

						<?php echo $row['qty']; ?>
					</td>
					<td>

						<?php echo $row['price']; ?>
					</td>
					<td>
						<img src="images/<?php echo $row['photo']; ?>" height="100" width="100">
						
					</td>
					<td>

						<?php echo $row['descrption']; ?>
					</td>
					<td>

						<?php 

						$data=$db->getDDNameByID( $row['cat_id'],"cat_id","category");
						echo $data;
						?>
					</td>
					<td>
						<a href="productUpdate.php?pid=<?php echo $row['pid']; ?>"  >	<button class="btn btn-warning" >Edit</button></a>
					</td>
					<td>
						<a onclick="return confirm('Are you sure want to Delete ?')" href="deleteproduct.php?did=<?php echo $row['pid']; ?>">	<button class="btn btn-danger" >Delete</button></a>
					</td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</div>