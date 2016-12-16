<?php
//include 'Camion.php';
echo '<html><head> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head></html>';
  
class Voiture {
	private $model;
	private $mark;
	private $type;
	private $color;
	private $speed;
	private $doors;
	private $wheels;

	const ANNEE = 2016;

	public function __construct($data = array()){
		if($data){
			foreach ($data as $key => $value) {
				$this->key = $value; 
			}
		}
		elseif (!$data) {
			echo "Aucune donnée dans le tableau";
			}
	}

	public function getModel(){return $this->model;}
	public function getMark(){return $this->mark;}
	public function getType(){return $this->type;}
	public function getColor(){return $this->color;}
	public function getSpeed(){return $this->speed;}
	public function getDoors(){return $this->doors;}
	public function getWheels(){return $this->wheels;}

	public function setModel($model){$this->model=$model;}
	public function setMark($mark){$this->mark=$mark;}
	public function setType($type){$this->type=$type;}
	public function setColor($color){$this->color=$color;}
	public function setSpeed($speed){$this->speed=$speed;}
	public function setDoors($doors){$this->doors=$doors;}
	public function setWheels($wheels){$this->wheels=$wheels;}

	public function demarrer(){

	}

	public function freiner($vitesse_en_moins){
		$this->speed = max(0,$this->speed - $vitesse_en_moins);
		echo "Je freine";

	}

	public function accelerer($vitesse_en_plus){
		self::gronder();
		$this->speed = min(250, $this->speed + $vitesse_en_plus);
	}

	static function gronder(){
		//$this->speed = 0;
		echo "BRrrrr.";

	}

}


class Camion extends Voiture {

	private $wheels=8;

	public function demarrer(){
		echo "Le camion démarre";
		$this->speed+=30;
	}

	 public function freiner(){
	 	echo parent::freiner().' et je décharge.';
	}
}

// $unCamion = new Camion('Peugeot','Partner','Manuelle','Noir','0','2','8');
$unCamion = new Camion();
$unCamion->demarrer();
$unCamion->freiner();
$maVoiture = new Voiture();
$maVoiture->setSpeed(0);
$maVoiture->accelerer(50);
echo $maVoiture->getSpeed();
$maVoiture::gronder();
echo $maVoiture->getSpeed();
echo Voiture::ANNEE;


$data = array('mark' => 'Peugeot', 'model' => '405','type' => 'Manuelle','color' => 'Gris','speed' => '0','doors' => '5');
$maPeugeot = new Voiture($data);
$maPeugeot->setColor("vert");
echo 'Ma voiture est :' .$maPeugeot->getColor(). ' '.'elle est de marque :' .$maPeugeot->getMark();
echo "<br>";

$requete = "SELECT * FROM xamxam_khassaide";
try {
	$db = new PDO('mysql:dbname=xamxam;host=localhost', 'root', 'aaaaa');//, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
	echo "Tentative de connexion :<br>";
	die('Erreur : ' . $e->getMessage());
}


$resultat = $db->query($requete);
while($row = $resultat->fetch()){
	print_r($row);
	echo "<h2><i>".$row['xamxam_khassaide_author']."</i></h2>";
	} 

?>
