<?php
require_once("dbconnection.php");
if (isset($_GET["cid"])) {
	$id=$_GET["cid"];

	$db=new dbconnection();
	if (!isset($_COOKIE["visitor"]))
	{
		header("location:index.php");
	}else{
		$visitor_id=$_COOKIE["visitor"];
		$user=$_COOKIE["visitor"];
		$qr="select * from cart where pid=$cid";
		$rs=db->QueryTable($qr);
		if (mysqli_num_rows($rs)==0) {
			$query="INSERT INTO cart(cid, visitor_id, pid) VALUES (null,'$visitor_id','$id')";
			db->QueryTable($query);
			header("location: CartList.php?msg=success");
		}
		else{
			header("location: CartList.php?msg=already");
		}
		

	}


}






?>
