<?php
require 'db/header.php';
$DB = new DB();

if(isset($_GET['semaine'])) {
  $week = $_GET['semaine'];
} 
else {
  $today = date("Y-m-d");
  $date = new DateTime($today);
  $week = $date->format("W");
}

$date = new DateTime('midnight'); 
$date->setISODate('2021', $week);
$formatedDate = date_format ( $date, 'Y-m-d');



//bg-<?=$arrayColor[$lundi_matin[$i] -> {'nom'}]

$lundi_matin = $DB->query("SELECT * FROM LUNDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$lundi_aprem = $DB->query("SELECT * FROM LUNDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");
$mardi_matin = $DB->query("SELECT * FROM MARDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$mardi_aprem = $DB->query("SELECT * FROM MARDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");
$mercredi_matin = $DB->query("SELECT * FROM MERCREDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$mercredi_aprem = $DB->query("SELECT * FROM MERCREDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");
$jeudi_matin = $DB->query("SELECT * FROM JEUDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$jeudi_aprem = $DB->query("SELECT * FROM JEUDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");
$vendredi_matin = $DB->query("SELECT * FROM VENDREDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$vendredi_aprem = $DB->query("SELECT * FROM VENDREDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");
$samedi_matin = $DB->query("SELECT * FROM SAMEDI_MATIN WHERE semaine = ". $week ." ORDER BY `id`");
$samedi_aprem = $DB->query("SELECT * FROM SAMEDI_APREM WHERE semaine = ". $week ." ORDER BY `id`");


$personnes = $DB->query("SELECT * FROM PERSONNES");
$arrayNoms = array();
$arrayColor = array();

for ($i=0; $i < count($personnes); $i++) {        
    array_push($arrayNoms, $personnes[$i] -> {'nom'});    
    $arrayColor[$personnes[$i] -> {'nom'}] = $personnes[$i] -> {'hexa'};
}

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

?>
<!doctype html>
<html class="no-js" lang="zxx" id="htmlPage">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Planning Pharmacie Jardins d'Helios</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link href="css/photos_style.php" rel="stylesheet" type="text/css" media="all" />-->
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- CSS du spinner -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleColor.css">
    <script src="js/iro.js"></script>
</head>

<body>

<div id="container" >
  <div class="container-fluid" style = "height : 70%; width :70%;">
    <header>
      <div class="row" style="margin:auto;">
        <button class="btn-info" style="height:70%; margin-top:10px; margin-left:36%;"><a href="index.php?semaine=<?=($week-1)?>" class="button" style="color:white;"><i class="fas fa-arrow-left"></i></a></button>
        <h4 class="display-4 mb-4 text-center" style="font-size:2em; margin-left:20px;">Semaine <?=$week?></h4>
        <button class="btn-info" style="height:70%; margin-top:10px; margin-left:20px;"><a href="index.php?semaine=<?=($week+1)?>" class="button" style="color:white;"><i class="fas fa-arrow-right"></i></a></button>
      </div>      
      <div class="row d-none d-sm-flex p-1 bg-dark text-white">
        <h5 class="col-sm p-1 text-center">Lundi M <br/>(<?=date("d/m", strtotime("$formatedDate"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Mardi M <br/>(<?=date("d/m", strtotime("$formatedDate +1 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Mercredi M <br/>(<?=date("d/m", strtotime("$formatedDate +2 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Jeudi M <br/>(<?=date("d/m", strtotime("$formatedDate +3 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Vendredi M <br/>(<?=date("d/m", strtotime("$formatedDate +4 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Samedi M <br/>(<?=date("d/m", strtotime("$formatedDate +5 day"))?>)</h5>
      </div>
    </header>
    <div class="row border border-right-0 border-bottom-0">    
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">        
        <?php 
        for ($i=0; $i < count($lundi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$lundi_matin[$i] -> {'nom'}]?>;"> <?=$lundi_matin[$i] -> {'nom'} . " <b>". $lundi_matin[$i] -> {'horaires'} ."</b>"?>            
          </a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate">
        <?php 
        for ($i=0; $i < count($mardi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$mardi_matin[$i] -> {'nom'}]?>;"> <?=$mardi_matin[$i] -> {'nom'} . " <b>". $mardi_matin[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($mercredi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$mercredi_matin[$i] -> {'nom'}]?>;"> <?=$mercredi_matin[$i] -> {'nom'} . " <b>". $mercredi_matin[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($jeudi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$jeudi_matin[$i] -> {'nom'}]?>;"> <?=$jeudi_matin[$i] -> {'nom'} . " <b>". $jeudi_matin[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($vendredi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$vendredi_matin[$i] -> {'nom'}]?>;"> <?=$vendredi_matin[$i] -> {'nom'} . " <b>". $vendredi_matin[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($samedi_matin); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$samedi_matin[$i] -> {'nom'}]?>;"> <?=$samedi_matin[$i] -> {'nom'} . " <b>". $samedi_matin[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="container-fluid" style = "height : 70%; width :70%; margin-bottom : 13px;">
    <header>
      <h4 class="display-4 mb-4 text-center"></h4>
      <div class="row d-none d-sm-flex p-1 bg-dark text-white">
        <h5 class="col-sm p-1 text-center">Lundi AM <br/>(<?=date("d/m", strtotime("$formatedDate"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Mardi AM <br/>(<?=date("d/m", strtotime("$formatedDate +1 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Mercredi AM <br/>(<?=date("d/m", strtotime("$formatedDate +2 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Jeudi AM <br/>(<?=date("d/m", strtotime("$formatedDate +3 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Vendredi AM <br/>(<?=date("d/m", strtotime("$formatedDate +4 day"))?>)</h5>
        <h5 class="col-sm p-1 text-center">Samedi AM <br/>(<?=date("d/m", strtotime("$formatedDate +5 day"))?>)</h5>
      </div>
    </header>
    <div class="row border border-right-0 border-bottom-0">    
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($lundi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$lundi_aprem[$i] -> {'nom'}]?>;"> <?=$lundi_aprem[$i] -> {'nom'} . " <b>". $lundi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($mardi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$mardi_aprem[$i] -> {'nom'}]?>;"> <?=$mardi_aprem[$i] -> {'nom'} . " <b>". $mardi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($mercredi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$mercredi_aprem[$i] -> {'nom'}]?>;"> <?=$mercredi_aprem[$i] -> {'nom'} . " <b>". $mercredi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($jeudi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$jeudi_aprem[$i] -> {'nom'}]?>;"> <?=$jeudi_aprem[$i] -> {'nom'} . " <b>". $jeudi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($vendredi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$vendredi_aprem[$i] -> {'nom'}]?>;"> <?=$vendredi_aprem[$i] -> {'nom'} . " <b>". $vendredi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
      <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
        <?php 
        for ($i=0; $i < count($samedi_aprem); $i++) { 
        ?> 
          <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small text-black" title="Test Event 1" style="background-color: <?=$arrayColor[$samedi_aprem[$i] -> {'nom'}]?>;"> <?=$samedi_aprem[$i] -> {'nom'} . " <b>". $samedi_aprem[$i] -> {'horaires'} ."</b>"?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="position:absolute;bottom:3%;left:1%;">
  Ajouter
</button>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalSupprimer" style="position:absolute;bottom:3%;left:5.5%;">
  Retirer
</button>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModalQuelquun" style="position:absolute;bottom:3%;left:9.5%;">
  Nouvelle personne
</button>

  <!-- Button trigger modal -->
<button id="screenshot" type="button" class="btn btn-dark" style="position:absolute;bottom:3%;left:23%;">
  Enregistrer le planning
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-signin" action="post_ajouter.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">          
            <select style="margin-top : 10px;" name="nom">
              <option value="">Qui ?</option>
              <?php
              foreach($arrayNoms as $key => $value):
                echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
              endforeach;
              ?>
            </select>
            <select name="jourMatinOuAprem">
              <option value="">Sélectionnez un jour</option>
              <?php
              foreach($arrayJoursMatinAprem as $key => $value):
                echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
              endforeach;
              ?>
            </select>   
            <br/>      
            <input name="horaire" placeholder="Horaire précis ?" style = "margin-top:5px;"></input>  
            <input name="semaine" value="<?=$week?>" style="display:none;"></input>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button class="btn btn-primary" type="submit" name="submit" value="Upload">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalSupprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retirer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-signin" action="post_supprimer.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">          
            <select style="margin-top : 10px;" name="nom">
              <option value="">Qui ?</option>
              <?php
              foreach($arrayNoms as $key => $value):
                echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
              endforeach;
              ?>
            </select>
            <select name="jourMatinOuAprem">
              <option value="">Sélectionnez un jour</option>
              <?php
              foreach($arrayJoursMatinAprem as $key => $value):
                echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
              endforeach;
              ?>
            </select>
            <input name="semaine" value="<?=$week?>" style="display:none;"></input>
            <br/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button class="btn btn-primary" type="submit" name="submit" value="Upload">Retirer</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalQuelquun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle personne</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-signin" action="post_ajouter_quelqun.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input name="qui" placeholder="Qui ?" style="margin-bottom : 10px;"> </input>
            <br/>
            <b> Couleur associée : </b>

            <div class="wrap">
                <div class="half">
                <div class="colorPicker"></div>
            </div>
            <div class="half readout">
              <span class="title" style="display : none;">Couleur selectionnée:</span>
              <div id="values" style="display : none;"></div>
              <input id="hexInput" name="hexInput" style="display : none;"></input>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button class="btn btn-primary" type="submit" name="submit" value="Upload">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- JS here -->     
    <script src="js/colorPalette.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/screenshots/html2canvas.min.js"></script>
    <script> 
      $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus();
      });

      function downloadURI(uri, name) 
      {
          var link = document.createElement("a");
          // If you don't know the name or want to use
          // the webserver default set name = ''
          link.setAttribute('download', name);
          link.href = uri;
          document.body.appendChild(link);
          link.click();
          link.remove();
      }

      const capture = async () => {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        const video = document.createElement("video");

        try {
          const captureStream = await navigator.mediaDevices.getDisplayMedia();
          video.srcObject = captureStream;
          context.drawImage(video, 0, 0, window.width, window.height);
          const frame = canvas.toDataURL("image/png");
          captureStream.getTracks().forEach(track => track.stop());
          window.location.href = frame;
        } catch (err) {
          console.error("Error: " + err);
        }
      };

      $('#screenshot').on('click', function() {
        const screenshotTarget = document.getElementById('container');

        html2canvas(screenshotTarget).then((canvas) => {
            const base64image = canvas.toDataURL("image/png");
            // Get base64URL
         var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');

            $.ajax({
               url: "enregistrer_image.php",
               method: "POST",
               dataType: "json",
               data: {image: base64image,semaine:'pair'},
               success: function(response){
                  console.log(response.fileName);
                  downloadURI('upload/' + response.fileName, '');
                  // put on console what server sent back...
              }
            });
        });
      });

    </script>

</body>
</html>