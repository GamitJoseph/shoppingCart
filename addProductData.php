<?php 

require("dbconnection.php");


	
if (isset($_POST["addproduct"])) {

	$db=new dbconnection();
	$pid=null;
	$pname=$_POST["ProductName"];
	$unit=$_POST["unit"];
	$price=$_POST["price"];
	$descr=$_POST["descr"];
	$cat_id=$_POST["cat_id"];
	$qty=$_POST["qty"];
	//$photo=$_POST["photo"];

	if (is_uploaded_file($_FILES["photo"]['tmp_name'])) {
		$errors= array();
		$file_name = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_type = $_FILES['photo']['type'];
		$tmp=explode('.',$file_name);
		$file_ext=strtolower(end($tmp));

		$expensions= array("jpeg","jpg","png");
		$errors= array();
		if(in_array($file_ext,$expensions)=== false){

			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size <= 2048) {
			$errors[]='File size must be excately 2 MB';
		}
		if(empty($errors)==true) {
			$file_name="img".$db->randomString().".".$file_ext;
			move_uploaded_file($file_tmp,"images/".$file_name);

			$qry="insert into product values(null,'$pname','$unit','$qty','$price','$file_name','$descr','$cat_id')";


			if ($db->QueryTable($qry)) {

				header("Location: index.php");
			}else{
				header("Location: index.php".mysqli_error());

			}


		}else{
			//print_r($errors);
			header("Location: index.php?error=".$errors);
		}
	}
}else if (isset($_POST["updateProduct"])) {

	$db=new dbconnection();
	$pid=$_POST["pid"];
	$pname=$_POST["ProductName"];
	$unit=$_POST["unit"];
	$price=$_POST["price"];
	$descr=$_POST["descr"];
	$cat_id=$_POST["cat_id"];
	$qty=$_POST["qty"];
	$photo=$_POST["hiddenphoto"];
	$errors= array();
	if (is_uploaded_file($_FILES["photo"]['tmp_name'])) {

		$file_name = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_type = $_FILES['photo']['type'];
		$tmp=explode('.',$file_name);
		$file_ext=strtolower(end($tmp));

		$expensions= array("jpeg","jpg","png");
		$errors= array();
		if(in_array($file_ext,$expensions)=== false){

			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size <= 2048) {
			$errors[]='File size must be excately 2 MB';
		}
		if(empty($errors)==true) {
			$file_name="img".$db->randomString().".".$file_ext;
			move_uploaded_file($file_tmp,"images/".$file_name);
			unlink("images/".$photo);
			$photo=$file_name;
		}else{
			header("Location: index.php?error=".$errors);
		}

	}
	echo $qry="update product set pname='$pname',unit='$unit',qty='$qty',price='$price', descrption='$descr',cat_id='$cat_id',photo='$photo' where pid=".$pid;
	if ($db->QueryTable($qry)) {

		header("Location: index.php");
	}else{
		header("Location: index.php".mysqli_error());
			//echo $error;
	}
}else{
	header("Location: index.php");
}





?>