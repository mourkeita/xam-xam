<?php
// On précise le type MIME du fichier
header('Content-type: text/xml; charset=UTF-8');

try {	
	$bdd = new PDO ( 'mysql:host=localhost;dbname=xamxam', 'root', 'aaaaa'); // Connexion à la base de données
	$resultat = $bdd->query( 'SELECT * FROM posts LIMIT 10' );	// Requêtes pour récupérer les articles
	$resultat->setFetchMode(PDO::FETCH_OBJ);
}
catch (PDOException $e) {
	echo 'Une erreur s\'est produite';
}

// On construit le flux RSS
$buffer = '<?xml version="1.0" encoding="UTF-8" ?>';
$buffer .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">';
	$buffer .= '<channel>';
		$buffer .= '<atom:link href="http://www.geekpress.fr/feed/" rel="self" type="application/rss+xml" />';
		$buffer .= '<title><![CDATA[Astuces, tutos & guides WordPress]]></title>';
		$buffer .= '<description><![CDATA[GeekPress propose divers astuces et tutoriels qui permettent de découvrir les capacités de WordPress.]]></description>';
		$buffer .= '<link>http://www.geekpress.fr/</link>';
		$buffer .= '<image>';
			$buffer .= '<url>http://www.geekpress.fr/tuto/rss/geekpress.png</url>';
			$buffer .= '<link>http://www.geekpress.fr/</link>';
		$buffer .= '</image>';
		$buffer .= '<lastBuildDate>' . date('r') . '</lastBuildDate>';
		$buffer .= '<language>fr</language>';

// On crée un item par article
while( $post = $resultat->fetch() ) {
	
	$buffer .= '<item>';
		$buffer .= '<guid isPermaLink="true">' . $post->post_guid . '</guid>';
		$buffer .= '<title><![CDATA[' . utf8_encode($post->post_title) . ']]></title>';
		$buffer .= '<link>' . $post->post_guid . '</link>';
		$buffer .= '<description><![CDATA[' . utf8_encode($post->post_excerpt) . ']]></description>';
		$buffer .= '<dc:creator>' . utf8_encode($post->post_author) . '</dc:creator>';
		$buffer .= '<pubDate>' . date('r', strtotime($post->post_date_modified)) . '</pubDate>';
	$buffer .= '</item>';
	
}

	$buffer .= '</channel>';
$buffer .= '</rss>';

// On affiche le contenu
echo $buffer;
?>
