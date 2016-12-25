<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta>
<head>
	<title>Plateforme d'étude et de recherche sur les KHASSAIDES</title>
</head>
<body style="background-color:#ffffff">
	

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Xam-xam.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Enseignements</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  

<div class="container">
	<div class="jumbotron">
		<h1>Xam-xam.com</h1>
		<p>Plateforme d'étude et de recherche sur les KHASSAIDES</p>
	</div>
</div>

<?php

//include("index.php");
$mail = $_POST["mail"];
$pass = $_POST["pass"];

$servername = "localhost";
$username = "root";
$password = "aaaaa";
$mydb = "xamxam";

echo "<div><p><h3> **** Sessions **** </h3></p></div>";


try{
	$conn = new PDO("mysql:dbname=$mydb;host=$servername",$username,$password);
	}
	catch (PDOException $e){
		echo "Erreur de connexion :<br>";
		die($e->getMessage());			
	}

if(!$_SERVER["REQUEST_METHOD"] == "POST"){die("Accès non autorisé");}
if(strlen($_POST['mail'] <= 0 and strlen($_POST['pass']) <= 0)) {die("Vous devez entrer un mail et password");}

$check_credentials_query = $conn->prepare("SELECT * FROM users WHERE user_name= :email AND user_password= :pass;");
$check_credentials = $check_credentials_query->execute(array(':email' => $mail, ':pass' => $pass));
echo $check_credentials_query->rowCount();
if($check_credentials_query->rowCount() == 1){
	session_start();
	session_name("Ma session");
	echo "aaaaa";
	//echo $check_credentials_query->fetch();
	$userdata = $check_credentials_query->fetch();
	//echo $userdata[0];
	$_SESSION = $userdata;
	
	$_SESSION['authenticated']= true;
	$_SESSION['nom']= $_POST['user_name'];
	echo $_SESSION['nom'];
	$_SESSION['token_uncrypted']= uniqid();
	echo $_SESSION['token_uncrypted'];
	$_SESSION['token']= md5($_SESSION['token_uncrypted']);
	echo $_SESSION['token'];
	$_SESSION['prenom'] = $_POST['mail'];
	$_SESSION['nom'] = $_POST['mail'];

	header("Location:userarea.php");
	exit();
	
	}else {
		//echo "<script type='text/javascript'>alert('Mauvais credentials');</script>";
		header("Location:index.php");
		die("Mauvais credentials");
		}
?>
</body>
</html>
