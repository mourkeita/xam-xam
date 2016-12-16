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

<h1>xam-xam.com</h1>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "aaaaa";
		$mydb = "xamxam";
		$donnee=1;
		
		try{
		$connexion = new PDO("mysql:dbname=$mydb;host=$servername",$username,$password);
		}
		catch (PDOException $e){
			echo "Erreur de connexion :<br>";
			die($e->getMessage());			
		}
		
		$connexion->query("set names utf8");
		$requete_prepare = $connexion->prepare("SELECT * FROM xamxam_khassaide WHERE xamxam_khassaide_id = :id");
		$requete_prepare->execute(array(":id" => $donnee));

		echo "<div class='container'><table class='table table-hover'>";
		echo "<thead><tr><th>Titre</th><th>Texte</th><th>Auteur</th>";
		echo "<th>Commentaire</th></tr></thead>";
		
		while($row=$requete_prepare->fetch()){
			echo "<tr><td>" .$row["xamxam_khassaide_title"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_text"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_author"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_comment"]. "</td></tr>";
		}
		echo "</table></div>";
		$connexion=NULL;
	?>
</body>
</html>

