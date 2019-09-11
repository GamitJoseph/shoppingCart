<?php
require_once("dbconnection.php");
//$db=new dbconnection();

class AnonymousCart 
{
	
	
	public	function __construct()
	{
		
		
	}


	public function GetUserID()
	{
		// $db=new dbconnection();
		// //session_start();
		// $site_name = "cart";
		// $visitor_id = $site_name .$db->randomString();
		// $t=60*60*24*60;
		// //$result=null;
		// if (isset($_SESSION["visitor"])) {
		// 	$visitor_id = $_SESSION["visitor"];
		// 	$result="set";
		// }else{
		// 	//setcookie("visitor_id", '$visitor_id', time()+ $t,'/');
		// 	$_SESSION["visitor"] = "$visitor_id";
		// 	$result=$visitor_id;
		// }
	}
}

?>