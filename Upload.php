
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
$upload_title = $_POST['upload_title'];
$upload_text = $_POST['upload_text'];
$upload_author = $_POST['upload_author'];
$upload_comment = $_POST['upload_comment'];
$upload_file_name = $_FILES['upload_file']['name'];
$upload_place = $_FILES['upload_file']['tmp_name'];
$upload_image_name = $_FILES['upload_image']['name'];
$upload_image_place = $_FILES['upload_image']['tmp_name'];
$upload_image_error = $_FILES['upload_image']['error'];
$upload_date = date('Y-m-d H:i:s'); //Y-m-d H:i:s


echo "<div>";
echo "<h2>Document téléchargé</h2>";
echo "<p>*Voici le fichier que vous avez uploadé</p>";
echo "<p>Titre : ".$upload_title."</p><br>";
echo "<p>Texte : ".$upload_text."</p><br>";
echo "<p>Auteur : ".$upload_author."</p><br>";
echo "<p>Emplacement temporaire : ".realpath($upload_place)."</p><br>";
echo "<p>Nom du fichier téléchargé : ".$upload_file_name."</p><br>";

if ($_FILES['upload_file']['error'] === UPLOAD_ERR_OK) {
	echo 'Téléchargement du fichier réussi';
    } else {
       die("Téléchargement échoué with error code " . $_FILES['upload_file']['error']);
       echo "<script>alert('Taille trop grande');</script>";
    }
    
if ($_FILES['upload_image']['error'] === UPLOAD_ERR_OK) {
	echo "Téléchargement de l'image réussi";
    } else {
       die("Téléchargement échoué with error code " . $_FILES['upload_image']['error']);
    }

echo  "<p>Taille du fichier :".$_FILES['upload_file']['size']."</p><br>";
echo "</div>";

echo "<div><p>Enregistrement du fichier</p>";

$new_name = md5(uniqid(rand(), true));
echo 'Nom haché du fichier : '.$new_name.".".pathinfo($_FILES['upload_file']['name'])['extension'];
$new_name = $new_name.".".pathinfo($_FILES['upload_file']['name'])['extension'];
echo "<br>";
$new_path = 'files/1';
echo 'Nouvel emplacement du fichier : '.realpath($new_path);
echo "<br>";
if(!is_dir($new_path)){
  mkdir($path, 777, true);
}
echo "</div>";

if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $new_path."/".$new_name)) {
	echo "Copie du fichier réussi !!";
	}
	else {
		echo "Copie du fichier échoué !!".$_FILES["upload_file"]["error"];
		};
		

echo "<br>*******************TRAITEMENT IMAGE*********************";

echo  "<p>Taille image :".$_FILES['upload_image']['size']."</p><br>";
echo "</div>";
$size_image = $_FILES['upload_image']['size'];


echo  "<p>Dimensions image :".getimagesize($_FILES['upload_image']['tmp_name'])[0]."</p><br>";
echo "</div>";
echo  "<p>Dimensions image :".getimagesize($_FILES['upload_image']['tmp_name'])[0]."</p><br>";
echo "</div>";
echo "<div><p>Enregistrement de l'image</p>";

$new_name = md5(uniqid(rand(), true));
echo 'Nom haché image : '.$new_name.".".pathinfo($_FILES['upload_image']['name'])['extension'];
$new_name = $new_name.".".pathinfo($_FILES['upload_image']['name'])['extension'];
echo "<br>";
$new_path = 'img/1';
echo "Nouvel emplacement de l'image : ".realpath($new_path);
echo "<br>";
$path_image = $new_name;
$path_reel = realpath($new_path).$new_name;
if(!is_dir($new_path)){
  mkdir($new_path, 0777, true);
}

echo "</div>";

if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $new_path."/".$new_name)) {
	echo "Copie du fichier réussi !!";
	}
else {
	echo "Copie du fichier échoué !!".$_FILES["upload_image"]["error"];
};

$chemin_image = $new_path."/".$new_name;
chmod($chemin_image, 0777); 

//echo'<img src="'.$chemin_image.'" />';

function verif_extension($fichier){
	$fichier = $_FILES['upload_file']['name'];
	$path_parts = pathinfo($fichier);
	$tab = array('jpg', 'txt', 'png', 'jpeg');
	$type = $path_parts['extension'];
	foreach($tab as $ext) {
		if ($ext == $type) {
			echo "Bonne extension ".$type;
			}
		else {
			echo "Mauvaise extension ".$type;
			}
		}
	}

	
$servername = "localhost";
$username = "root";
$password = "aaaaa";
$mydb = "xamxam";
		

$conn2 = mysql_connect($servername,$username,$password);
$rv = mysql_select_db($mydb,$conn2);
$requete_prepare_files = "INSERT INTO xamxam_files(xamxam_files_title,xamxam_files_author,xamxam_files_comment,xamxam_files_size,xamxam_files_path,xamxam_files_date) VALUES ('$upload_title', '$upload_author', '$upload_text', '$size_image', '$path_image', '$upload_date')";
$result2 = mysql_query($requete_prepare_files);
if (!$result2) {
    die('Requête invalide : ' . mysql_error());
}



$conn3 = mysql_connect($servername,$username,$password);
$rv2 = mysql_select_db($mydb,$conn3);
echo "<div><p><h3>Compteur de téléchargements</h3></p>";
echo "<table class='table table-hover'><th>ID</th><th>Titre</th><th>Taille</th>";
$requete_download = "SELECT xamxam_files_id, xamxam_files_title, xamxam_files_size FROM xamxam_files;";
$result3 = mysql_query($requete_download);
while($row = mysql_fetch_assoc($result3)){
	echo "<tr><td><a href='download.php?file=".$row['xamxam_files_id']."'</a>".$row['xamxam_files_id']."</td>";
	echo "<td>".$row['xamxam_files_title']."</td>";
	echo "<td>".$row['xamxam_files_size']."</td></tr>";
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
