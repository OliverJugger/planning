<?php
	
require 'db/header.php';
$DB = new DB();

if(isset($_GET['weekToCopy']) && isset($_GET['surXSemaines'])) {
  $surXSemaines = $_GET['surXSemaines'];
  $weekToCopy = $_GET['weekToCopy'];

$lundi_matin = $DB->query("SELECT * FROM LUNDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$lundi_aprem = $DB->query("SELECT * FROM LUNDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$mardi_matin = $DB->query("SELECT * FROM MARDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$mardi_aprem = $DB->query("SELECT * FROM MARDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$mercredi_matin = $DB->query("SELECT * FROM MERCREDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$mercredi_aprem = $DB->query("SELECT * FROM MERCREDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$jeudi_matin = $DB->query("SELECT * FROM JEUDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$jeudi_aprem = $DB->query("SELECT * FROM JEUDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$vendredi_matin = $DB->query("SELECT * FROM VENDREDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$vendredi_aprem = $DB->query("SELECT * FROM VENDREDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$samedi_matin = $DB->query("SELECT * FROM SAMEDI_MATIN WHERE semaine = ". $weekToCopy ." ORDER BY `id`");
$samedi_aprem = $DB->query("SELECT * FROM SAMEDI_APREM WHERE semaine = ". $weekToCopy ." ORDER BY `id`");

for($j=2; $j < $surXSemaines; $j=$j+2) {
	for ($i=0; $i < count($lundi_matin); $i++) {
		ajouter('LUNDI_MATIN', $lundi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $lundi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($lundi_aprem); $i++) {
		ajouter('LUNDI_APREM', $lundi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $lundi_aprem[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($mardi_matin); $i++) {
		ajouter('MARDI_MATIN', $mardi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $mardi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($mardi_aprem); $i++) {
		ajouter('MARDI_APREM', $mardi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $mardi_aprem[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($mercredi_matin); $i++) {
		ajouter('MERCREDI_MATIN', $mercredi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $mercredi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($mercredi_aprem); $i++) {
		ajouter('MERCREDI_APREM', $mercredi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $mercredi_aprem[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($jeudi_matin); $i++) {
		ajouter('JEUDI_MATIN', $jeudi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $jeudi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($jeudi_aprem); $i++) {
		ajouter('JEUDI_APREM', $jeudi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $jeudi_aprem[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($vendredi_matin); $i++) {
		ajouter('VENDREDI_MATIN', $vendredi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $vendredi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($vendredi_aprem); $i++) {
		ajouter('VENDREDI_APREM', $vendredi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $vendredi_aprem[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($samedi_matin); $i++) {
		ajouter('SAMEDI_MATIN', $samedi_matin[$i] -> {'nom'}, ($weekToCopy + $j), $samedi_matin[$i] -> {'horaires'});
	}
	for ($i=0; $i < count($samedi_aprem); $i++) {
		ajouter('SAMEDI_APREM', $samedi_aprem[$i] -> {'nom'}, ($weekToCopy + $j), $samedi_aprem[$i] -> {'horaires'});
	}

}

}


function ajouter($joursMaintOuAprem, $nom, $semaine, $horaires){
  $DB = new DB();
  $query = "INSERT INTO `" . $joursMaintOuAprem . "` (`nom`, `semaine`, `horaires`) VALUES ('" . $nom . "', ". $semaine . ", '" . $horaires . "')";
  $DB->queryInsert($query);
}

?>