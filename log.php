<?php 
require_once("dbconnection.php");
$db=new dbconnection();
$db->checksession();

if (isset($_GET["lm"])) {
echo	$var=$_GET["lm"];
	if ($_GET["lm"]=="out") {

  		$db->session_end();
		

	}
}
?>