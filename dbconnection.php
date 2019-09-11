<?php

class dbconnection {

	public function randomString(){

		$str=rand(); 
		$result = sha1($str); 
		return $result; 
	}
	public function session_set($uname){
		session_start();
		$_SESSION["username"] = "$uname";
	}

	public function checksession(){
		//session_start();
		
	}
	public function session_end(){
		
		session_destroy();
		header("Location: login.php"); 
	}
	public function __construct(){

	}
	public function getTable($table,$conditons){


	}

	public function getTableByFields(){

	}

	public function getDDNameByID($id,$field,$table){
		$qry="select * from ".$table."  where ".$field."=".$id;
		$rs=$this->QueryTable($qry);
		while ($row=mysqli_fetch_row($rs)) {
			
			return $row[1];;
		}
	}

	public function getDropDown($table){
		$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
		$qry="select * from ".$table;
		$result=mysqli_query($con,$qry);


		$dd=null;

		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

			$dd .="<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";

		}
		mysqli_close($con);
		mysqli_free_result($result);
		return  $dd;

	}
	
	public function QueryTable($qry){

		try {
			$con=mysqli_connect("localhost","root","","dbshopping") or die("error in db connection");
			$result=mysqli_query($con,$qry);
			mysqli_close($con);
			return $result;
		} catch (Exception $e) {
			return "error in QueryTable ".$e.error;
		}

	}
	



}


?>
