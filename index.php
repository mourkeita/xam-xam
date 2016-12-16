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
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<form name="loginform" id="loginform" class="dropdown-menu" action="login.php" method="post">
					<input placeholder="Email" id="user_name" name="user_name"><br>
					<input placeholder="Mot de passe" id="pass_word" type="password" name="pass_word"><br>
					<button class="btn btn-info" type="submit">Connexion</button>
				</form>
          </li>
        <li></li>
      </ul>
    </div>
    </div>
  </div>
</nav>
  

<div class="container">
	<div class="jumbotron">
		<h1>Xam-xam.com</h1>
		<p>Plateforme d'étude et de recherche sur les KHASSAIDES</p>
	</div>
</div>

<!--
<div >
	<ul class="nav nav-tabs nav-justified">
		<li class="active"><a href="#"></a>Accueil</li>
		<li><a href="#">Enseinement</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</div>
-->
<div class="row" >
<div class="col-md-6">
<h2>Identifiez vous</h2>
<p>*Veuillez remplir les champs et enregistrer</p>
<form class="form-group" action="Credentials.php" method="post">
	<fieldset>
		<legend>Authentification</legend>
	</fieldset>
	<label>Email</label>
	<input type="text" size="30" name="mail"></input><br>
	<label>Mot de passe</label>
	<input type="password" size="30" name="pass"></input><br>
	<input type="checkbox">
	<label>Se souvenir</label>
	<button class="btn btn-info">Login</button>
</form>
</div>
	
<div class="col-md-6">
<h2>Ajouter un document</h2>
<p>*Veuillez remplir les champs et enregistrer</p>
<form action="Upload.php" class="form-group" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Espace ajout nouveau document</legend>
	<label >Titre</label>
	<input name="upload_title" type="text" name="titre" size="30"></input><br>
	<label>Texte</label>
	<textarea name="upload_text" class="textareanotresize" rows="10" cols="50"></textarea><br>
	<label>Auteur</label>
	<input type="text" name="upload_author" size="30"><br>
	<label>Commentaire</label>
	<input type="text" name="upload_comment" size="30"><br><br>
	<label>Upload file</label>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input name="upload_file" type="file"><br><br>
	<label for="upload_image">Upload image (inférieur à 2Mo</label>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<input name="upload_image" type="file"><br><br>
	<button class="btn btn-danger" type="reset">Effacer</button>
	<button class="btn btn-info" type="submit">Enregistrer</button>
	</fieldset>
	</form>
</div>

</div>

<h1>xam-xam.com</h1>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "aaaaa";
		$mydb = "xamxam";
		
		
		
		// Create connection xamxam_khassaide
		mysql_connect($servername, $username, $password);
		mysql_select_db($mydb);
		mysql_query("set names utf8");
		
		//Select all lines in khassaide table
		$req_infos_khassaides = 'SELECT * FROM xamxam_khassaide;';
		$result = mysql_query($req_infos_khassaides);
		
		//$num_rows = mysql_num_rows($result);
		
		echo "<div class='container'><table class='table table-hover'>";
		echo "<thead><tr><th>Titre</th><th>Texte</th><th>Auteur</th>";
		echo "<th>Commentaire</th></tr></thead>";
		while($row = mysql_fetch_assoc($result)){
		//$row = mysql_fetch_assoc($result);
		//for ($i=0; $i<=$num_rows;$i++) {
			echo "<tr><td>" .$row["xamxam_khassaide_title"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_text"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_author"]. "</td>";
			echo "<td>" . $row["xamxam_khassaide_comment"]. "</td></tr>";
		}
		echo "</table></div>";
		
		
	?>
<style>
textarea.textareanotresize {
	resize:none;
	}
label {
  width: 100px;
  display: inline-block;
}

.footer4 {
	background-color:#2f2f2f;
	color : #ffffff;
	width : 100%;
	height : 40px;
	font : 30px;
	}
</style>
<footer class="footer4 container-fluid text-center">
  <p>Xam-xam.com © 2016 Mour Keita All rights reserved</p>
</footer>


</body>
</html>
