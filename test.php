<?php

include("signup.php");
session_start();
	session_name("Ma session");
	$_SESSION['nom']= $_POST['sign_user_name'];
?>

