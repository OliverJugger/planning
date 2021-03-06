<?php
	
require 'db/header.php';
$DB = new DB();

$arrayJoursMatinAprem = array();
array_push($arrayJoursMatinAprem, 'LUNDI_MATIN');
array_push($arrayJoursMatinAprem, 'LUNDI_APREM');
array_push($arrayJoursMatinAprem, 'MARDI_MATIN');
array_push($arrayJoursMatinAprem, 'MARDI_APREM');
array_push($arrayJoursMatinAprem, 'MERCREDI_MATIN');
array_push($arrayJoursMatinAprem, 'MERCREDI_APREM');
array_push($arrayJoursMatinAprem, 'JEUDI_MATIN');
array_push($arrayJoursMatinAprem, 'JEUDI_APREM');
array_push($arrayJoursMatinAprem, 'VENDREDI_MATIN');
array_push($arrayJoursMatinAprem, 'VENDREDI_APREM');
array_push($arrayJoursMatinAprem, 'SAMEDI_MATIN');
array_push($arrayJoursMatinAprem, 'SAMEDI_APREM');

$personnes = $DB->query("SELECT * FROM PERSONNES");
$arrayNoms = array();

for ($i=0; $i < count($personnes); $i++) {        
    array_push($arrayNoms, $personnes[$i] -> {'nom'});    
}

function supprimer($joursMaintOuAprem, $nom, $semaine){
  $DB = new DB();
  $query = "DELETE FROM `" . $joursMaintOuAprem . "` WHERE `nom`='" . $nom . "' AND `semaine`=" . $semaine;
  $DB->queryInsert($query);
}

if(isset($_POST["submit"])) {	   
	$nom = $_POST['nom'];
	$jourMatinOuAprem = $_POST['jourMatinOuAprem'];
	supprimer($arrayJoursMatinAprem[$jourMatinOuAprem], $arrayNoms[$nom], $_POST['semaine']);
	header('Location: index.php');
}

?>