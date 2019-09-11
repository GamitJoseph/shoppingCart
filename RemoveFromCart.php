<?php 
if (isset($_GET["pid"])) {
	require_once("dbconnection.php");
	$db=new dbconnection();
	$pid=$_GET["pid"];
	$visitor_id=$_COOKIE["visitor"];
	$qr="delete from cart where visitor_id='".$visitor_id."'and pid='".$pid."'";
	
	if ($rs=$db->QueryTable($qr)) {
		header("Location: CartList.php?msg=delete");
	}else{
		header("Location: CartList.php");
	}
	
}else {
	header("Location: index.php");
}

?>