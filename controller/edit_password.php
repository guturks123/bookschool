<?php
	include_once 'connect.php';
	$con = new DB();
		@$id = $_POST['seid'];
		@$repass = $_POST['repass'];
		
		@$mdrepass = md5($repass);
		
		@$sql = "UPDATE tbookuser SET user_pass = '$mdrepass' WHERE user_id = $id ";
		
		
		if(@$query = $con->update($sql)){
		echo 'Success';
		}else{
			'Error';
		};
		
		?>

 