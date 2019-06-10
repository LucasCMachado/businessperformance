<?php
$imagedata = base64_decode($_POST['imgdata']);
$filename = strtoupper($_POST['nomeCliente']);
//path where you want to upload image
$file = $_SERVER['DOCUMENT_ROOT'] . '/certificado/PDF/'.$filename.'.png';
$imageurl  = '/certificado/PDF/'.$filename.'.png';
file_put_contents($file,$imagedata);
echo $imageurl;
?>