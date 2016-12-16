<?php 
header("Location:login.html");
//if(isset($_SESSION["user_name"])){
//session_destroy();
//}
session_start();
$_SESSION = array()
session_destroy();
exit();
?>
