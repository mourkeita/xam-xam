<?php
  header('Content-Transfer-Encoding: binary'); //Transfert en binaire (fichier)
  header('Content-Disposition: attachment; filename="'.$bdd_infos['up_final'].'"'); //Nom du fichier
  header('Content-Length: '.$bdd_infos['up_filesize']); //Taille du fichier
  readfile($bdd_infos['up_filename']);
?>

