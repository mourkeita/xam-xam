<?php

header('Content-type: text/xml; charset=utf-8');
 
define("SALT","SDXTAwHOwSTrUhR7YV3STa2mwjm6Edv/ompHS4m5YnI=");
define("SQL_HOST","localhost");
define("SQL_USER","root");
define("SQL_PASS","aaaaa");
define("SQL_DBASE","xamxam");


try{
	$mysql = new PDO("mysql:dbname=".SQL_DBASE.";host=".SQL_HOST, SQL_USER, SQL_PASS);
	//$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch(PDOException $e){
	echo 'Erreur:'.$e->getMessage();
	}

try{
	$resultat = $mysql->query("SELECT * FROM posts LIMIT 10");
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	}
catch (PDOException $e){
	echo "Erreeeeeeur";
	}

$buffer = '<?xml version="1.0" encoding="UTF-8" ?>';
$buffer .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">';
	$buffer .= '<channel>';
		$buffer .= '<atom:link href="http://www.geekpress.fr/feed/" rel="self" type="application/rss+xml" />';
		$buffer .= '<title>Xamxam.com</title>';
		$buffer .= '<description><![CDATA[Plateforme d\'étude et de recherche sur les KHASSAIDES]]></description>';
		$buffer .= '<link>http://xam-xam.com</link>';
		$buffer .= '<image><url>http://xam-xam.com/img/fav.ico</url></image>';
		$buffer .= '<lastBuildDate>' . date('r') . '</lastBuildDate>';
		$buffer .= '<language>fr</language>';

//for ($i=0; $post = $resultat->fetch(PDO::FETCH_LAZY); $i++){
	//$buffer.= "<item>";
	//$buffer.= "<guid isPermaLink='true'>".$post["post_guid"]."</guid>";
	//$buffer.= "<title>".$post["post_title"]."</title>";
	//$buffer.= "<link>http://www.geekpress.fr/tuto/feed/".$post["post_guid"]."</link>";
	//$buffer.= "<description>".$post["post_excerpt"]."</description>";
	//$buffer.= "<pubDate>".$post["post_date_modified"]."</pubDate>";
	//$buffer.= "</item>";
	//}

//while ($post = $resultat->fetch(PDO::FETCH_BOTH)){
	//$buffer.= "<item>";
	//$buffer.= "<guid isPermaLink='true'>".$post["post_guid"]."</guid>";
	//$buffer.= "<title>".$post["post_title"]."</title>";
	//$buffer.= "<link>http://www.geekpress.fr/tuto/feed/".$post["post_guid"]."</link>";
	//$buffer.= "<description>".$post["post_excerpt"]."</description>";
	//$buffer.= "<pubDate>".$post["post_date_modified"]."</pubDate>";
	//$buffer.= "</item>";
	//}

while( $post = $resultat->fetch() ){
	$buffer .= '<item>';
		$buffer .= '<guid isPermaLink="true">' . $post->post_guid . '</guid>';
		$buffer .= '<title><![CDATA[' . utf8_encode($post->post_title) . ']]></title>';
		$buffer .= '<link>' . $post->post_guid . '</link>';
		$buffer .= '<description><![CDATA[' . utf8_encode($post->post_excerpt) . ']]></description>';
		$buffer .= '<dc:creator>' . utf8_encode($post->post_author) . '</dc:creator>';
		$buffer .= '<pubDate>' . date('r', strtotime($post->post_date_modified)) . '</pubDate>';
	$buffer .= '</item>';

}

$buffer.= '</channel>';
$buffer.= '</rss>';

echo $buffer;
?>
