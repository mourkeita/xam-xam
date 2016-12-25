<?php 
require_once('pagination.class.php');
require_once('config.php');



// On décide d'afficher 2 articles par pages
$posts_per_page = 2;

// On détermine la page courante
// Si $_GET['paged'] est vide, on considère que nous sommes sur la première page
$current_page = ( !empty( $_GET['paged'] ) ) ? intval( $_GET['paged'] ) : 1 ;


$current_items = ($current_page - 1 ) * $posts_per_page;


	// On récupère tous les articles de la BDD
	$sql = 'SELECT * FROM posts
			ORDER BY post_date_publish ASC
			LIMIT ' . $current_items . ', ' . $posts_per_page;
try{
	$requete_posts = $mysql->prepare( $sql );
	$posts = $requete_posts->execute();
	$requete_posts->setFetchMode(PDO::FETCH_OBJ);
	}

catch(PDOException $e){
	die($e->getMessage());
	}
	
	$posts = $mysql->query( $sql );

	// On compte le nombre d'article
	$total = $mysql->query( 'SELECT COUNT(postpk) FROM posts;' );
	$total_posts = $total->fetchColumn();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<title>Pagination avancée</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
			
			<h1>Créer une pagination avancée</h1>
			
			<?php
			// On affiche les titres des articles
			while( $row = $posts->fetch() ) {
				echo '<h2>' . utf8_encode($row['post_title']). '</h2>';
			}
			
			
			// On configure les options de la pagination
			$options = array(
						'range'					=> 3,
						'posts_per_page' 		=> $posts_per_page
					);

			$pagination = new Pagination('?paged=%s', $current_page, $total_posts, $options); // On fait une instance de la classe Pagination
			$pagination->display(); // On affiche le rendu de la pagination

		?>

	</body>
</html>

