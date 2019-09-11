<script type="text/javascript">

</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<?php 
require_once("nav_client.php");
require_once("dbconnection.php");
$db=new dbconnection();
$db->checksession();
?>
<br/>
<div class="container">
	<?php
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
		}elseif ($msg=="delete") {
			?>
			
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Delete!</strong>Delete from  cart...
			</div>
			<?php  
		}
	}
	?>
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
				<?php 

				$visitor_id=$_COOKIE["visitor"];
				 $qry="select * from cart where visitor_id='".$visitor_id."'";
				$result=$db->QueryTable($qry);

				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

					$pid=$row['pid'];
					 $query="select * from product where pid=".$pid;
					$rs=$db->QueryTable($query);
					if (mysqli_num_rows($rs)>0) {
						while ($r=mysqli_fetch_array($rs,MYSQLI_ASSOC))
						{
							?>
							<tr>
								<td>
									<figure class="media">
										<div class="img-wrap"><img src="images/<?php echo $r['photo']; ?>" class="img-thumbnail img-sm" height="200" width="250"> </div>
										&nbsp;&nbsp;
										<figcaption class="media-body">
											<h6 class="title text-truncate"><?php echo $r['pname']; ?></h6>
											<dl class="param param-inline small">
												<dt>unit: </dt>
												<dd><?php echo $r['unit']; ?></dd>
											</dl>
											<dl class="param param-inline small">
												<dt>color </dt>
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
										<var class="price"> &#8377 <?php echo  $r['price']; ?></var> 
										<small class="text-muted">( <?php echo  $r['price']; ?> &#8377 each)</small> 
									</div> <!-- price-wrap .// -->
								</td>
								<td class="text-right"> 
									<a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a> 
									<a href="RemoveFromCart.php?pid=<?php echo $r['pid']; ?>" class="btn btn-outline-danger"> × Remove</a>
								</td>
							</tr>
							<?php 

						}
					}
				}
				?>
			</tbody>
		</table>
	</div> <!-- card.// -->

</div> 

<?php


require_once("client_footer.php");


?>

