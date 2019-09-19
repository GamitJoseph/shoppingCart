<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>
<body>

	<!-- <?php 
	if (isset($_GET['logout']))
	{
		//require_once("dbconnection.php");
		//$db=new dbconnection();
		
	
	}
	?> -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="Product.php">Shopping Cart</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				
				<ul class="nav navbar-nav">
					<li class="active"><a href="Product.php">Home</a></li>
					<li><a href="category.php">category</a></li>
					<li><a href="addProduct.php">add new Product</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<li><a href="log.php?lm=out"><span class="glyphicon glyphicon-log-in"></span>

					Logout</a></li>
				</ul>
			</div>
		</div>
	</nav> 

	

</body>
</html>