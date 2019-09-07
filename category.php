
<?php
require('nav.php');

require("dbconnection.php");
$db=new dbconnection();
$db->checksession();
$error=null;
$success_message=null;
if (isset($_POST["submit"])) {

	$cat=$_POST["cat_name"];

	if ($cat!=null) {
		$qry="insert into category values(null,'$cat')";
		$rs=$db->QueryTable($qry);
		if ($rs>0) {
			$success_message="Record inserted Successfully....";
		}else{
			$error=rs;
		}
		
		
	}else{
		$error="enter category name.....";
	}

}elseif (isset($_POST["update"])) {

	$cat=$_POST["cat_name"];
	$cid=$_POST["cat_id"];
	if ($cat!=null) {
		$qry="update category set cat_name='$cat' where cat_id=".$cid;
		$rs=$db->QueryTable($qry);
		if ($rs>0) {
			$success_message="Record updated Successfully....";
		}else{
			$error=rs;
		}
		
		
	}else{
		$error="enter category name.....";
	}

}else{



	if (isset($_GET["did"])) {
		

		$cid=$_GET["did"];
		if ($cid!=null) {
			$qry="delete from category where cat_id=".$cid;
			$rs=$db->QueryTable($qry);
			if ($rs>0) {
				$success_message="Record deleted Successfully....";
			}else{
				$error=rs;
			}

		}else{
			$error="enter category name.....";
		}

	}
}




?>
<ul class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li class="active">Category</li>
</ul> 
<div class="container">
	<div class="row">
		<?php if ($error!=null) { ?>
			<div  class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error !</strong> <?php echo $error; ?>
			</div>


		<?php } ?>
		<?php if ($success_message!=null) { ?>

			<div class="alert alert-success alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully!</strong> <?php echo $success_message; ?>
			</div>

		<?php } ?>

		<?php 


		if (isset($_GET["id"])) {
			
			$id=$_GET["id"];
			$qry="select * from category where cat_id=".$id;
			$cat_name=null;
			$cat_id=null;


			if ($result=$db->QueryTable($qry) ) {
				while ($row=mysqli_fetch_row($result))
				{
					$cat_id=$row[0];
					$cat_name=$row[1];
				}

				mysqli_free_result($result);
			}

			?>	

			<form class="form-inline" method="POST" action="category.php">
				<div class="form-group">
					<label for="cat_name">Category Name:</label>
					<input type="hidden" name="cat_id" value="<?php echo $cat_id ?>">
					<input type="text" class="form-control" value="<?php echo $cat_name  ?>" name="cat_name">
				</div>
				<input type="submit" class="btn btn-primary" name="update" value="update">
			</form>
			<br/>

			<?php 
			

		}else{

			?>
			<form class="form-inline" method="POST" action="category.php">
				<div class="form-group">
					<label for="cat_name">Category Name:</label>
					<input type="text" class="form-control" value="<?php  ?>" name="cat_name">
				</div>
				<input type="submit" class="btn btn-primary" name="submit" value="add">
			</form>
			<br/>
		<?php }  ?>

		

		<table border="1" class="table table-bordered table-hover ">
			<tr>
				<th>
					category name
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
			<?php
			$result=$db->QueryTable("select * from category");
			while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {


				?>
				<tr>
					<td>

						<?php echo $row['cat_name']; ?>
					</td>
					<td>
						<a href="category.php?id=<?php echo $row['cat_id']; ?>">	<button class="btn btn-warning" >Edit</button></a>
					</td>
					<td>
						<button class="btn btn-danger" data-toggle="modal" data-target="#deleteDialog">Delete</button>

						<div class="modal fade" id="deleteDialog" role="dialog">
							<div class="modal-dialog modal-mg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Delete Product</h4>
									</div>
									<div class="modal-body">
										<p>Are You sure Want to Delete <?php echo $row['cat_name']; ?>...?</p>
									</div>
									<div class="modal-footer">
										<a  href="category.php?did=<?php echo $row['cat_id']; ?>">	
											<button type="button" class="btn btn-danger" >Yes</button></a>
											<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
										</div>



									</div>
								</div>
							</div>
						</div>

					</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>
</div>



