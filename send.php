<?php
$con = mysqli_connect('localhost', 'root', '', 'object');
mysqli_set_charset($con, "utf8");
@$name = $_POST['name'];
@$lastname = $_POST['lastname'];
@$age = $_POST['age'];

$sql = "INSERT INTO student(mname,mlastname,mage) VALUES ('$name','$lastname','age')";

if (empty($name)) {
	echo 'ERROR';
	$jquery = mysqli_query($con, $sql);
} else {
	echo 'Success';
}

;

?>