<?php
require('nav.php');
require("dbconnection.php");
$db=new dbconnection();

?>
<script>
	
		function validateForm(){

			var pname = document.forms["frmPrdt"]["ProductName"].value;
			var cat_id = document.forms["frmPrdt"]["cat_id"].value;
			var unit = document.forms["frmPrdt"]["unit"].value;
			var descr = document.forms["frmPrdt"]["descr"].value;
			var qty = document.forms["frmPrdt"]["qty"].value;
			var price = document.forms["frmPrdt"]["price"].value;
			var photo = document.forms["frmPrdt"]["photo"].value;

			if (pname == "") {
				alert("product Name must be filled out");
				return false;
			}
			if(cat_id=="0"){
				alert("category must be selected");
				return false;
			}
			if(unit=="---select unit---"){
				alert("unit must be selected");
				return false;
			}

			if(qty==""){
				alert("Quantity must be filled out");
				return false;
			}
			if(price==""){
				alert("price must be filled out");
				return false;
			}
			if(descr==""){
				alert("descr must be filled out");
				return false;
			}
			if(photo==""){
				alert("photo must be selected out");
				return false;
			}
			return true;
		}

	</script>
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li class="active">Add Product</li>
	</ul> 
	<div class="container">
		
		<form class="form-horizontal" id="frmPrdt" name="frmPrdt" onsubmit="return validateForm()" method="POST" action="addProductData.php" enctype="multipart/form-data" 
		>
		<div class="form-group">
			<label class="control-label col-sm-2" for="ProductName">Product Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name">
			</div>
		</div>

		<div class="form-group ">


			<label class="control-label col-sm-2" for="cat_id">Category Name:</label>
			<div class="col-sm-4">
				<select class="form-control" id="cat_id" name="cat_id" >
					<option value="0">---select category---</option>
					<?php

					$qry="select * from category";
					$result=$db->QueryTable($qry);

					while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

						echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";

					}
					?>

				</select>
			</div>


		</div>

		<div class="form-group">
			<label class="control-label col-sm-2" for="unit">Unit Name:</label>
			<div class="col-sm-2">
				<select class="form-control" id="unit" name="unit" >
					<option >---select unit---</option>
					<option>KG</option>
					<option>piece</option>
					<option>Liter</option>

				</select>
			</div>
			<label class="control-label col-sm-2" for="qty">Quantity:</label>
			<div class="col-sm-2">
				<input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
			</div>
			<label class="control-label col-sm-2" for="price">price:</label>
			<div class="col-sm-2">
				<input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
			</div>

		</div>
		<div class="form-group">

			<label class="control-label col-sm-2" for="file">Product photo:</label>
			<div class="col-sm-10">
				<div class="panel panel-primary">
					<div class="panel-body ">
						<input type="file" class="file" name="photo">
					</div>
				</div>
			</div>




		</div>
		<div class="form-group">

			<label class="control-label col-sm-2" for="descr">Description:</label>
			<div class="col-sm-10">

				<textArea rows="4" class="form-control"  name="descr"></textArea>

			</div>




		</div>
		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="addproduct"  class="btn btn-primary"> Add </button>
			</div>
		</div>
	</form>

</div>