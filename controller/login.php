<?php
session_start();
include_once 'connect.php';
$con = new DB();

    @$user = $_POST['username'];
    @$pass = $_POST['password'];
    @$user_en = md5($user);
    @$pass_en = md5($pass);

    $sql = "SELECT * FROM tbookuser where user_username = '$user_en' and user_pass = '$pass_en'";
    $query = $con->select($sql);
    if(@$query->num_rows > 0 ){
        echo 'success';
        $fetch = $query->fetch_assoc();
        $_SESSION['user_id'] = $fetch['user_id'];
		$_SESSION['user_level'] = $fetch['user_level'];
        
    };


?>