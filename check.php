<?php 
include("config.php");
session_start();

if(!(isset($_SESSION["token"]) && hashPassword($_SESSION["token_uncrypted"]) == $_SESSION["token"])){
	header("Location:login.html");
	exit();
	}

?>
