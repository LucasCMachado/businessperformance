<?php

	date_default_timezone_set('America/Sao_Paulo');
	include '../view/resultado.php';
	require_once '../_connect/connect_pdo.php';
	$dbh = Database::conexao();

	/* Carrega a classe DOMPdf */
	require_once("../dompdf/dompdf/dompdf_config.inc.php");

	$formulario = '1f991082d756a1c216d8673a7e525fcf';
	$token_cliente = '75825d9b74f1c4d3c6070edfef408dcd';

	$nomeForm=nomeFormularioPdf($dbh,$formulario);
	$nomeCliente=nomeClientePdf($dbh,$token_cliente);
	//$medias = respostasMediaPdf($dbh,$token_cliente,$formulario);

	$html = '
			<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="Lucas César">

			<title>Business Performance</title>

			<!-- Bootstrap core CSS -->
			<link href="../css/bootstrap.min.css" rel="stylesheet">
			<link href="../css/bootstrap-reset.css" rel="stylesheet">

			<!--Animation css-->
			<link href="../css/animate.css" rel="stylesheet">

			<!--Icon-fonts css-->
			<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			<link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

			<!--Morris Chart CSS -->
			<link rel="stylesheet" href="../assets/morris/morris.css">

			<!-- sweet alerts -->
			<link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

			<!-- Custom styles for this template -->
			<link href="../css/style.css" rel="stylesheet">
			<link href="../css/helper.css" rel="stylesheet">

			<style>
				@font-face {
				    font-family: Gotham-Ultra;
				    src: url(../css/fonts/Gotham-Ultra.otf);
				}
				@font-face {
				    font-family: Gotham-Medium;
				    src: url(../css/fonts/Gotham-Medium.otf);
				}
			</style>

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
			<!--[if lt IE 9]>
			  <script src="js/html5shiv.js"></script>
			  <script src="js/respond.min.js"></script>
			<![endif]-->
			</head>';

			$html.= '
			<body style="background-color: #FFFFFF;">
			<!--Morris Chart CSS -->   
			        <!--Main Content Start -->       
			            <!-- Page Content Start -->
			            <!-- ================== -->
			            <div class="">
			                <div class="row">
			                    <div class="col-md-12">
			                        <div class="">
			                            <div>
			                                <div class="clearfix">
			                                    <div class="pull-left">
			                                        <img src="../img/logo_business2.png" style="max-width: 20%;" alt="Logotipo Business Performance">
			                                    </div>
			                                </div>
			                                <hr>			                                                                  
	                                        <div style="font-family:Gotham-Medium;">
		                                        <div class="text-left" style="font-family:Gotham-Medium;">Cliente: '.$nomeCliente.'
		                                        <div class="text-left" style="font-family:Gotham-Medium;"> Data: '.date('d/m/Y').'</div>
		                                        </div>
			                                    <h4 class="text-center text-primary" style="font-family:Gotham-Medium;">'.$nomeForm.'</h4>
			                                    </div>
				                                <div class="m-h-50"></div>
				                                <div class="row">
				                                        <div class="col-lg-12">
				                                            <div class="table-responsive">
				                                                <table class="table table-bordered">
				                                                    <thead>
				                                                        <tr>
				                                                            <th>Categoria</th>
				                                                            <th class="text-right">Média</th>
				                                                        </tr>
				                                                    </thead>
				                                                    <tbody>';
																	$html.= respostasMediaPdf($dbh,$token_cliente,$formulario);
																	$html.='</tbody>
			                                                </table>                                        
			                                        </div>
			                                    </div>
			                                </div>
			                                </div>
			                                <div class="row" style="border-radius: 0px;">
			                                	<div class="panel-body text-center">
							                        <address class="ng-scope">
							                            <strong class="text-primary">BUSINESS PERFORMANCE Marcelo dos Santos & Renata Nunes</strong><br>
							                            Soluções para Máxima Performance de Negócios, Lideranças e Vendas<br>
							                            Criciúma SC - Rua Princesa Isabel, nº 40 - Sala 602 - Ed Prime Tower - Centro<br>
							                            Telefones:</abbr> (48) 3521 3836 / 99175 1998 - <a href="http://www.businessperformance.com.br">www.businessperformance.com.br</a> 
							                        </address>							                                                   
							                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			    </body>
			</html>';

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	$dompdf->load_html($html, 'UTF-8');

	// (Optional) Setup the paper size and orientation
	$dompdf->set_paper('A4', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	//$dompdf->stream('document.pdf');
	$nomeFormSemEspaco=str_replace(" ", "", $nomeForm);
	$nomeClienteSemEspaco=str_replace(" ", "", $nomeCliente);


	$folder="../resultados/cliente/".$nomeClienteSemEspaco."";

	if (!file_exists($folder)) {
		mkdir($folder, 0777, true);
	}

	$resultado=$folder."/".$nomeFormSemEspaco.".pdf";

	$pdf = $dompdf->output();
	file_put_contents($resultado, $pdf);
?>