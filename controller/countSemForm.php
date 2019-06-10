<?php
mb_internal_encoding("iso-8859-1"); 
mb_http_output( "UTF-8" );  
ob_start("mb_output_handler");   
header("Content-Type: text/html; charset=UTF-8",true);
 
date_default_timezone_set('America/Sao_Paulo');
include '../view/resultado.php';
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

/* Carrega a classe DOMPdf */
require_once("../dompdf/dompdf/dompdf_config.inc.php");

// Lista todos os Formulários

    $stmt6 = $dbh->prepare('SELECT nome, token FROM cliente ORDER BY nome ASC');
    $stmt6->execute();

    foreach ($stmt6->fetchAll(PDO::FETCH_ASSOC) as $row) {

	    $stmt7 = $dbh->prepare('SELECT COUNT(id) as qtd FROM resposta WHERE token_cliente=:token_cliente');
	    $stmt7->bindParam(":token_cliente", $row['token'], PDO::PARAM_STR);
	    $stmt7->execute();
	    $existeForm=$stmt7->fetch();

	    if ($existeForm['qtd']<1) {
	    	echo $row['nome'].'</br>';
	    }
    } 
?>