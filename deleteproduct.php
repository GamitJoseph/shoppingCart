<?php 
require_once("dbconnection.php");
$db=new dbconnection();
if (isset($_GET["did"])) {
	$id=$_GET["did"];

	$qry="delete from product where pid=".$id;
	$result=$db->QueryTable("select * from product where pid=".$id);
	$photo=null;
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$photo=$row['photo'];
	}

	if ($db->QueryTable($qry)) {
		unlink("images/".$photo);
		header("Location: index.php");
	}else{
		header("Location: index.php".mysqli_error());
			//echo $error;
	}

}else{
	header("Location: index.php");
}

?>