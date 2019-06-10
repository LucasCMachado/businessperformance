<?php
date_default_timezone_set('America/Sao_Paulo');
include 'view/formulario.php';
require_once './_connect/connect_pdo.php';
require_once './controller/ajustes.php';
$dbh = Database::conexao();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head_main.php'; ?>
    </head>
    <body>
        <!--Main Content Start -->       
    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-left"><img src="img/logo_business2.png" style="max-width: 50%;" alt="Logotipo Business Performance"></h4>                            
                            </div>
                            <div class="pull-right">
                                <h4>Formação: Lider Performance</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">                                        
                                <div class="pull-left m-t-30">
                                    <address>
                                      <strong>Dúvidas?</strong><br>
                                      <abbr title="e-mail">Telefones:</abbr> (48)3521-3836 / (48) 99175-1998
                                      </address>
                                </div>
                            </div>
                            <h1 class="text-center text-primary" style="font-weight: bold">AVALIAÇÃO</h1>
                        </div>
                        <div class="m-h-50"></div>
                        <form class="form-horizontal" action="avaliacaoLiderPerformance" id="form" method="post" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">1. Qual sua avaliação do evento:</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="form-group">
										            <label class="col-md-12 text-left">Informação (Conteúdo):</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-1" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-1" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-1" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-1" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Material (WorkBook/Anexos):</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-2" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-2" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-2" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-2" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Infra-estrutura / Local:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-3" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-3" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-3" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-3" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Recurso Áudio-Visual:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-4" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-4" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-4" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-4" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Coffee-Break:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-5" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-5" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-5" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-5" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Organização Geral:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-6" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-6" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-6" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-1-6" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">2. O evento:</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="form-group">
										            <label class="col-md-12 text-left"></label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-2-1" value="Superou as expectativas" required>
								                                <i class="fa"></i>
								                                Superou as expectativas 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-2-1" value="Atendeu as expectativas" required>
								                                <i class="fa"></i>
								                                Atendeu as expectativas 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-2-1" value="Ficou a baixo das expectativas" required>
								                                <i class="fa"></i>
								                                Ficou a baixo das expectativas 
								                            </label>
								                        </div>    
											        </div>
											    </div> <!-- form-group -->
											    <div class="col-md-9">
												    <div class="form-group">
											            <label class="col-md-12 text-left" for="resposta-2-2" style="margin:0px 20px;">Sugestões</label>
											            <textarea class="form-control" id="resposta-2-2" name="resposta-2-2" style="margin:0px 20px;" required></textarea>                        
												    </div> <!-- form-group -->
												</div>
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">3. Como avalia o desempenho do(a) Facilitador(a) Marcelo dos Santos?</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="form-group">
										            <label class="col-md-12 text-left">Conteúdo:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-1" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-1" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-1" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-1" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Imagem pessoal:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-2" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-2" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-2" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-2" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Habilidade de Ensinar:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-3" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-3" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-3" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-3-3" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->
											    <div class="col-md-9">
												    <div class="form-group">
											            <label class="col-md-12 text-left" for="resposta-3-4" style="margin:0px 20px;">Sugestões</label>
											            <textarea class="form-control" id="resposta-3-4" name="resposta-3-4" style="margin:0px 20px;" required></textarea>                        
												    </div> <!-- form-group -->
												</div>
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">4. Como avalia o desempenho do(a) Facilitador(a) Renata Nunes?</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="form-group">
										            <label class="col-md-12 text-left">Conteúdo:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-1" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-1" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-1" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-1" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Imagem pessoal:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-2" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-2" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-2" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-2" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Habilidade de Ensinar:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-3" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-3" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-3" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-4-3" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->
											    <div class="col-md-9">
												    <div class="form-group">
											            <label class="col-md-12 text-left" for="resposta-4-4" style="margin:0px 20px;">Sugestões</label>
											            <textarea class="form-control" id="resposta-4-4" name="resposta-4-4" style="margin:0px 20px;" required></textarea>                        
												    </div> <!-- form-group -->
												</div>
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">5. Como avalia a sua própria participação no evento?</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="form-group">
										            <label class="col-md-12 text-left">Assimilação do conteúdo:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-1" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-1" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-1" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-1" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Participação nas dinâmicas:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-2" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-2" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-2" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-2" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->

											    <div class="form-group">
										            <label class="col-md-12 text-left">Alcance do objetivo principal:</label>
										            <div class="col-md-12">
										                <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-3" value="Excelente" required>
								                                <i class="fa"></i>
								                                Excelente 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-3" value="Ótimo" required>
								                                <i class="fa"></i>
								                                Ótimo 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-3" value="Bom" required>
								                                <i class="fa"></i>
								                                Bom 
								                            </label>
								                        </div>
								                        <div class="radio-inline">
										                	<label class="cr-styled" style="margin:0px 20px;">
								                                <input type="radio" name="resposta-5-3" value="Ineficiente" required>
								                                <i class="fa"></i>
								                                Ineficiente 
								                            </label>
								                        </div>     
											        </div>
											    </div> <!-- form-group -->
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">6. Quais os 3 pontos que você mais gostou:</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="col-md-9">
												    <div class="form-group">
											            <textarea class="form-control" id="resposta-6" name="resposta-6" style="margin:0px 20px;" required></textarea>                        
												    </div> <!-- form-group -->
												</div>
											</div> 
    									</div><!-- /Panel -->
    									<div class="panel panel-default">
								            <div class="panel-heading"> 
								                <h3 class="panel-title" style="text-transform: uppercase;">7. Indique 3 contatos para participar:</h3> 
								            </div> 
								            <div class="panel-body">
								            	<div class="col-md-9">
												    <div class="form-group">
											            <textarea class="form-control" id="resposta-7" name="resposta-7" style="margin:0px 20px;" required></textarea>                        
												    </div> <!-- form-group -->
												</div>
											</div> 
    									</div><!-- /Panel -->
                                        <input type="text" class="form-control" name="tokenForm" id="tokenForm" value="<?php echo $_GET['tokenFormulario']; ?>" style="display: none;"> 
                                        <input type="text" class="form-control" name="tokenCliente" id="tokenCliente" value="<?php echo $_GET['tokenCliente']; ?>" style="display: none;"> 
                                        <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-12">
                                    <hr>
                                    <button type="button" id="enviar" class="btn btn-block btn-lg btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="js/jquery.app.js"></script>
<script src="assets/sweet-alert/sweet-alert.min.js"></script>
<script src="assets/sweet-alert/sweet-alert.init.js"></script>


<script type="text/javascript">
    $('#enviar').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var qtd=0;
		var qtdBranco=0;
        var name='';

        $("input:radio").each( function(index, value) {
            
            if (!$(this).prop("checked")) {
                name=$(this).attr('name');

				$("input[name="+name+"]").each( function(index, value) {                    
					if (!$(this).prop("checked")) {
						qtd+=1;
					}                    
				});

				if(qtd<=10){
					qtd=0;
				}else{
					qtdBranco+=1;
				}
            }                    
        });
        if (qtdBranco>1) {
            swal({   
                title: "Alerta!",   
                text: "Todos os campos são de preenchimento obrigatório.",
                timer: 2000,   
                showConfirmButton: false 
            });                        
        }else{
            $(this).html('Enviando <i class="ion-loading-c"></i>');
            $( "#form" ).submit();
        }
    });
</script>
    </body>
</html>
