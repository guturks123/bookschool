<?php
session_start();
include_once 'controller/connect.php';
$con = new DB();
if(empty($_SESSION['user_id'])){
    header('location:login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Systeam Book</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/semantic.min.css">
	<link rel="stylesheet" href="./asset/css/style.css">
    <script src="./asset/js/jquery.min.js"></script>
</head>
<body>

<!-- menu -->
<?php include 'view/menu.php' ?>
    <!-- Insert data -->
    <?php include 'view/create.php'?>

    <script src="./asset/js/app.js"></script>
    <script src="./asset/js/sweetalert.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/all.min.js"></script>
    <script src="./asset/js/semantic.min.js"></script>
</body>
</html>