<?php
include("config.php");


if(!$_SERVER["REQUEST_METHOD"] == "POST"){
	die("Accès non autorisés");
	}
	
if(strlen($_POST["user_name"]) <= 0 or strlen($_POST["pass_word"]) <= 0){
	die("Vous devez entrer un login et un mot de passe");
	}
	
$username = $_POST["user_name"];
$password = $_POST["pass_word"];

$check_credentials_query = $mysql->prepare("SELECT * FROM users WHERE user_name= :username AND user_password= :password;");
$check_credentials = $check_credentials_query->execute(array(':username' => $username, ':password' => $password));

if($check_credentials_query->rowCount() == 1){
	session_start();
	session_name("Ma session");
	$userdata = $check_credentials_query->fetch();
	$_SESSION = $userdata;
	$_SESSION['authenticated']= true;
	$_SESSION['nom']= $_POST['user_name'];
	$_SESSION['token_uncrypted']= uniqid();
	$_SESSION['token']= hashPassword($_SESSION['token_uncrypted']);

	header("Location:userarea.php");
	exit();
	}
	else {
		die("Mauvais credentials");
	}

?>
