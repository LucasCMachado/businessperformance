<?php
mb_internal_encoding("iso-8859-1"); 
mb_http_output( "UTF-8" );  
ob_start("mb_output_handler");   
header("Content-Type: text/html; charset=UTF-8",true);
 
date_default_timezone_set('America/Sao_Paulo');

require_once 'dompdf-master/lib/html5lib/Parser.php';
require_once 'dompdf-master/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf-master/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf-master/src/Autoloader.php';
Dompdf\Autoloader::register();

/* Carrega a classe DOMPdf */

// reference the Dompdf namespace
use Dompdf\Dompdf;
$html = '
			<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="Lucas César">

			<title>Business Performance</title>

			<!-- Bootstrap core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/bootstrap-reset.css" rel="stylesheet">

			<!--Animation css-->
			<link href="css/animate.css" rel="stylesheet">

			<!--Icon-fonts css-->
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			<link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

			<!--Morris Chart CSS -->
			<link rel="stylesheet" href="assets/morris/morris.css">

			<!-- sweet alerts -->
			<link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

			<!-- Custom styles for this template -->
			<link href="css/style.css" rel="stylesheet">
			<link href="css/helper.css" rel="stylesheet">

			<style>
				@font-face {
				    font-family: Gotham-Ultra;
				    src: url(css/fonts/Gotham-Ultra.otf);
				}
				@font-face {
				    font-family: Gotham-Medium;
				    src: url(css/fonts/Gotham-Medium.otf);
				}
			</style>

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
			<!--[if lt IE 9]>
			  <script src="js/html5shiv.js"></script>
			  <script src="js/respond.min.js"></script>
			<![endif]-->
			</head>';

$html.= '
			<body style="background-color: #FFFFFF;>
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
			                                        <img src="img/logo_business2.png" style="max-width: 20%;" alt="Logotipo Business Performance">
			                                    </div>
			                                </div>
			                                <h1 class="text-center text-primary">AVALIAÇÃO</h1>
			                                <hr>			                                                                  
	                                        <div class="row">
				                                <div class="col-lg-12">
				                                    <div class="col-lg-12">
				                                        <div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>1. Qual sua avaliação do evento:</span></h3> 
												            </div> 
												            <div class="panel-body">
												            	<div class="form-group">
														            <span class="col-md-12 text-left">Informação (Conteúdo): <b>R: '.$_POST["resposta-1-1"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Material (WorkBook/Anexos): <b>R: '.$_POST["resposta-1-2"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Infra-estrutura / Local: <b>R: '.$_POST["resposta-1-3"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Recurso Áudio-Visual: <b>R: '.$_POST["resposta-1-4"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Coffee-Break: <b>R: '.$_POST["resposta-1-5"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Organização Geral: <b>R: '.$_POST["resposta-1-6"].'</b></span>
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>2. O evento: </span></h3> 
												            </div> 
												            <div class="panel-body">
												            	<div class="form-group">
														            <span class="col-md-12 text-left"><b>R: '.$_POST["resposta-2-1"].'</b></span>
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <span class="col-md-12 text-left">Sugestões:</span>										                                    
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <p class="col-md-12 text-left"><b>'.$_POST["resposta-2-2"].'</b></p>								                                    
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>3. Como avalia o desempenho do(a) Facilitador(a) Marcelo dos Santos?</span></h3> 
												            </div> 
												            <div class="panel-body">
												            	<div class="form-group">
														            <span class="col-md-12 text-left">Conteúdo: <b>R: '.$_POST["resposta-3-1"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Imagem pessoal: <b>R: '.$_POST["resposta-3-2"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Habilidade de Ensinar: <b>R: '.$_POST["resposta-3-3"].'</b></span>
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <span class="col-md-12 text-left">Sugestões:</span>										                                    
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <p class="col-md-12 text-left"><b>'.$_POST["resposta-3-4"].'</b></p>							                                    
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>4. Como avalia o desempenho do(a) Facilitador(a) Renata Nunes?</span></h3> 
												            </div> 
												            <div class="panel-body">
												            	<div class="form-group">
														            <span class="col-md-12 text-left">Conteúdo: <b>R: '.$_POST["resposta-4-1"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Imagem pessoal: <b>R: '.$_POST["resposta-4-2"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Habilidade de Ensinar: <b>R: '.$_POST["resposta-4-3"].'</b></span>
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <span class="col-md-12 text-left">Sugestões:</span>										                                    
															    </div> <!-- form-group -->
															    <div class="form-group">
														            <p class="col-md-12 text-left"><b>'.$_POST["resposta-4-4"].'</b></p>							                                    
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>5. Como avalia a sua própria participação no evento?</span></h3> 
												            </div> 
												            <div class="panel-body">
												            	<div class="form-group">
														            <span class="col-md-12 text-left">Assimilação do conteúdo: <b>R: '.$_POST["resposta-5-1"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Participação nas dinâmicas: <b>R: '.$_POST["resposta-5-2"].'</b></span>
															    </div> <!-- form-group -->

															    <div class="form-group">
														            <span class="col-md-12 text-left">Alcance do objetivo principal: <b>R: '.$_POST["resposta-5-3"].'</b></span>
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>6. Quais os 3 pontos que você mais gostou:</span></h3> 
												            </div> 
												            <div class="panel-body">
															    <div class="form-group">
														            <p class="col-md-12 text-left"><b>'.$_POST["resposta-6"].'</b></p>								                                    
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				    									<div class="panel panel-default">
												            <div > 
												                <h3 class="panel-title" style="text-transform: uppercase;"><span>7. Indique 3 contatos para participar:</span></h3> 
												            </div> 
												            <div class="panel-body">
															    <div class="form-group">
														            <p class="col-md-12 text-left"><b>'.$_POST["resposta-7"].'</b></p>								                                    
															    </div> <!-- form-group -->
															</div> 
				    									</div><!-- /Panel -->
				                                    </div>
				                                </div>
				                            </div>
				                            <hr>
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


			$folder="resultados/turmas/1/1/2/";

			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
			}

			$resultado=$folder."/AvaliaçãoLíderPerformance.pdf";

			$pdf = $dompdf->output();
			file_put_contents($resultado, $pdf);

			//sendmail($nomeCliente, $nomeForm, $resultado);

			echo $resultado;


?>
