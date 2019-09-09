

<?php
require_once("dbconnection.php");
//$db=new dbconnection();

class AnonymousCart extends dbconnection

{
	
	
	public	function __construct()
	{
		
		
	}


	public function GetUserID()
	{
		
		$db=new dbconnection();
		$site_name = "cart";
		$visitor_id = $site_name .$db->randomString();
		$t=60*60*24*60;
		//$result=null;
		if (isset($_COOKIE["visitor_id"])) {
			//$visitor_id = $_COOKIE["visitor_id"];
			$result="set";
		}else{
			$_COOKIE["visitor_id"] =$visitor_id; 
			$result=$visitor_id;
		}
		
		return $result;
	}
}

?>