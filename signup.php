<?php
include("config.php");

$sign_user_name = $_POST["sign_user_name"];
$sign_user_surname = $_POST["sign_user_surname"];
$sign_user_email = $_POST["sign_user_email"];
$sign_user_password = md5($_POST["sign_user_password"]);
$sign_birth_day = $_POST["birth_day"];
$sign_birth_month = $_POST["birth_month"]; 
$sign_birth_year = $_POST["birth_year"]; 
$sign_user_birth_day = date("{$sign_birth_year}-{$sign_birth_month}-{$sign_birth_day}");
$selected_radio = $_POST["sign_user_gender"];
function getGender($selected){
	if($selected == "male"){
		return "M";}
		
	if($selected == "female"){
		return "F";}
}

$sign_user_gender = getGender($selected_radio);


session_start();
$_SESSION['nom']= $_POST['sign_user_name'];
$_SESSION['prenom']= $_POST['sign_user_surname'];

$requete_prepare = $mysql->prepare("INSERT INTO users (user_name, user_surname, user_email,  user_password, user_birthday, user_sex) VALUES (:name,:surname,:email,:password,:birthday,:sex);");
$requete_prepare->execute(array(":name" => $sign_user_name, ":surname" => $sign_user_surname, ":email" => $sign_user_email, ":password" => $sign_user_password, ":birthday" => $sign_user_birth_day, ":sex" => $sign_user_gender ));
header("Location:userarea.php");
exit();
?>
