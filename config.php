<?php
define("SALT","SDXTAwHOwSTrUhR7YV3STa2mwjm6Edv/ompHS4m5YnI=");
define("SQL_HOST","localhost");
define("SQL_USER","root");
define("SQL_PASS","aaaaa");
define("SQL_DBASE","xamxam");

function hashPassword($p){
	return sha1(SALT.md5($p.SALT).sha1(SALT));
	}
	
try{
	$mysql = new PDO("mysql:dbname=".SQL_DBASE.";host=".SQL_HOST, SQL_USER, SQL_PASS);
	$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch(PDOException $e){
	echo 'Erreur:'.$e->getMessage();
	}
?>
