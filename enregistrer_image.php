<?php 
$image = $_POST['image'];
$semaine = $_POST['semaine'];

$location = "upload/";

$image_parts = explode(";base64,", $image);

$image_base64 = base64_decode($image_parts[1]);

$filename = "semaine_".$semaine."_".uniqid().'.png';

$file = $location . $filename;

file_put_contents($file, $image_base64);

echo json_encode(array("fileName"=>$filename));
?>