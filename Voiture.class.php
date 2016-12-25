<?php
class Voiture {
	private $model;
	private $mark;
	private $type;
	private $color;
	private $speed;
	private $doors;
	protected $test;
	public function getModel(){}
	public function getMark(){}
	public function getType(){}
	public function getColor(){}
	public function getSpeed(){}
	public function getDoor(){}

	public function setModel($model){}
	public function setMark($mark){}
	public function setType($type){}
	public function setColor($color){}
	public function setSpeed($speed){}
	public function setDoors($doors){}

	public function freiner($vitesse_en_moins){
		$this->speed = max(0,$this->speed - $vitesse_en_moins);

	}

	public function accelerer($vitesse_en_plus){
		$this->speed = min(250, $this->speed + $vitesse_en_plus);
	}

	protected function getTest(){
		$this->test=50;
		echo $this->test;	
	}

} 

$maVoiture = new Voiture();
echo 'test';
?>
