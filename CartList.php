<?php 

require_once("nav_client.php");


if (isset($_GET["msg"])) {
	$msg=$_GET["msg"];
	if($msg=="success") {
		?>
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Cart addedd SuccessFully...
		</div>
		<?php 
	}elseif ($msg=="already") {
		?>
		<div class="alert alert-info alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>info!</strong>already added in cart...
		</div>
		<?php  
	}else{
		header("location:index.php");
	}
?>
<script type="text/javascript">
	
</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<!-- <?php print_r($_COOKIE);  ?> -->

<div class="container">
	<br> 

	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="category.html">Cart List</a></li>

				</ol>
			</nav>
		</div>
	</div>



	<div class="card">
		<table class="table table-hover shopping-cart-wrap">
			<thead class="text-muted">
				<tr>
					<th scope="col">Product</th>
					<th scope="col" width="120">Quantity</th>
					<th scope="col" width="120">Price</th>
					<th scope="col" width="200" class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<figure class="media">
							<div class="img-wrap"><img src="http://bootstrap-ecommerce.com/main/images/items/2.jpg" class="img-thumbnail img-sm"></div>
							<figcaption class="media-body">
								<h6 class="title text-truncate">Product name goes here </h6>
								<dl class="param param-inline small">
									<dt>Size: </dt>
									<dd>XXL</dd>
								</dl>
								<dl class="param param-inline small">
									<dt>Color: </dt>
									<dd>Orange color</dd>
								</dl>
							</figcaption>
						</figure> 
					</td>
					<td> 
						<select class="form-control">
							<option>1</option>
							<option>2</option>	
							<option>3</option>	
							<option>4</option>	
						</select> 
					</td>
					<td> 
						<div class="price-wrap"> 
							<var class="price">USD 145</var> 
							<small class="text-muted">(USD5 each)</small> 
						</div> <!-- price-wrap .// -->
					</td>
					<td class="text-right"> 
						<a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a> 
						<a href="" class="btn btn-outline-danger"> × Remove</a>
					</td>
				</tr>

			</tbody>
		</table>
	</div> <!-- card.// -->

</div> 
<!--container end.//-->

<?php require_once("client_footer.php") ?>
