<?php
	
require '../db/header_impair.php';
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

function ajouter($joursMaintOuAprem, $nom){
  $DB = new DB();
  $query = "INSERT INTO `" . $joursMaintOuAprem . "` (`nom`) VALUES ('" . $nom . "')";
  $DB->queryInsert($query);
}

if(isset($_POST["submit"])) {	   
	$nom = $_POST['nom'];
	$jourMatinOuAprem = $_POST['jourMatinOuAprem'];
	ajouter($arrayJoursMatinAprem[$jourMatinOuAprem], $arrayNoms[$nom]);
	header('Location: ../index2.php');
}

?>