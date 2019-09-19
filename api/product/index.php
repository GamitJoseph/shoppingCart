<?php 
$request=$_SERVER['REQUEST_METHOD'];

$response[]= array('products' => "" );

switch ($request) {
	case 'GET':
	echo doGET();
	break;
	case 'POST':
	echo doPOST();
	break;
	case 'PUT':
	echo doPUT();
	break;
	case 'DELETE':
	echo doDELETE();
	break;
	
	
}


function doGET(){
	$qry="select * from product";
	$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
	$result=mysqli_query($con,$qry);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$response[] = array('photo' => $row['photo'],'pname' => $row['pname'],'unit' => $row['unit'],'qty' => $row['qty'],'price' => $row['price'],'descrption' => $row['descrption'] );
		
	}
	return json_encode($response);
}
function doPOST(){
	$qry="select * from product";
	$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
	$result=mysqli_query($con,$qry);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$response[] = array('photo' => $row['photo'],'pname' => $row['pname'],'unit' => $row['unit'],'qty' => $row['qty'],'price' => $row['price'],'descrption' => $row['descrption'] );
		
	}
	return json_encode($response);
}
function doPUT(){
	$qry="select * from product";
	$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
	$result=mysqli_query($con,$qry);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$response[] = array('photo' => $row['photo'],'pname' => $row['pname'],'unit' => $row['unit'],'qty' => $row['qty'],'price' => $row['price'],'descrption' => $row['descrption'] );
		
	}
	return json_encode($response);
}
function doDELETE(){
$qry="select * from product";
	$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
	$result=mysqli_query($con,$qry);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$response[] = array('photo' => $row['photo'],'pname' => $row['pname'],'unit' => $row['unit'],'qty' => $row['qty'],'price' => $row['price'],'descrption' => $row['descrption'] );
		
	}
	return json_encode($response);}


?>