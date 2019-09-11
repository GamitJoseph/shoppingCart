<?php 
if (isset($_GET["pid"])) {
	require_once("dbconnection.php");
	$db=new dbconnection();
	$pid=$_GET["pid"];
	$visitor_id=$_COOKIE["visitor"];
	$qr="select * from cart where visitor_id='".$visitor_id."'and pid='".$pid."'";
	$rs=$db->QueryTable($qr);
	if (mysqli_num_rows($rs)>0) {
		header("Location: CartList.php?msg=already");
	}else{
		$qry="INSERT INTO `cart`(`cid`, `visitor_id`, `pid`) VALUES (null,'$visitor_id','$pid')";
		if ($db->QueryTable($qry)) {

			header("Location: CartList.php?msg=success");
		}else{
			header("Location: CartList.php?msg=".mysqli_error());
		}

	}
	
}else {
	header("Location: index.php");
}

?>