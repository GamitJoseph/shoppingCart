<?php 

echo json_encode(array("statusCode"=>200));
 ?>

 <!-- $(document).ready(function() {
		$('#addproduct').on('submit', function() {
			//$("#addproduct").attr("disabled", "disabled");

			var pname = document.forms["frmPrdt"]["ProductName"].value;
			var cat_id = document.forms["frmPrdt"]["cat_id"].value;
			var unit = document.forms["frmPrdt"]["unit"].value;
			var descr = document.forms["frmPrdt"]["descr"].value;
			var qty = document.forms["frmPrdt"]["qty"].value;
			var price = document.forms["frmPrdt"]["price"].value;
			var photo = document.forms["frmPrdt"]["photo"].value;

			//if (pname != "" && cat_id!="0" && unit!="---select unit---" && qty!="" && price!="" && descr!="" && photo!="") {


				$.ajax({
					url: "addProductData.php",
					type: "POST",
					data: {
						pname: pname,
						cat_id: cat_id,
						unit: unit,
						qty: qty,
						descr: descr,
						photo: photo				
					},
					cache: false,
					success: function(dataResult){
						

						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$("#addproduct").removeAttr("disabled");
							$('#fupForm').find('input:text').val('');
							$("#success").show();
							$('#success').html('Data added successfully !'); 

						}
						else if(dataResult.statusCode==201){
							alert("Error occured !");
						}

					}
				});
			// }
			// else{
			// 	alert('Please fill all the field !');
			// }
		});

	}); -->