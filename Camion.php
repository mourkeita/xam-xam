<?php
class Camion extends Voiture(){

	private $wheels=8;

	public function demarrer(){
		echo "Le camion démarre";
		$this->speed+=30;
	}
}

?>