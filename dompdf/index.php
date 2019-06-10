<?php
date_default_timezone_set('America/Sao_Paulo');
include 'view/resultado.php';
require_once './_connect/connect_pdo.php';
$dbh = Database::conexao();

/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf/dompdf_config.inc.php");

$head=include 'head_main.php';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->load_html('<!DOCTYPE html>
<html lang="en">
    <head>'.$head.'
        <!--Morris Chart CSS -->
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
                                        <h4 class="text-right"><img src="img/logo_business2.png" style="max-width: 100%;" alt="Logotipo Business Performance"></h4>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <h4></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left m-t-30">
                                            <address>
                                              <strong>Dúvidas?</strong><br>
                                              <abbr title="e-mail">E-mail:</abbr> <a href="mailto:comercial01@businessperformance.com.br">comercial01@businessperformance.com.br</a><br>
                                              <abbr title="e-mail">Telefones:</abbr> (48)3521-3836 / (48) 99175-1998
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Data: </strong> '.date('d/m/Y').'</p>
                                        </div>
                                    </div>
                                    <h1 class="text-center text-primary">'.nomeFormularioPdf($dbh,$_GET['tokenFormulario']).'</h1>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Categoria</th>
                                                            <th>Média</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                           '.respostasMedia($dbh,$_GET['tokenCliente'],$_GET['tokenFormulario']).'                                                
                                                    </tbody>
                                                </table>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                </div>
                                <hr>
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

    </body>
</html>');

// (Optional) Setup the paper size and orientation
$dompdf->set_paper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream('document.pdf');

$pdf = $dompdf->output();
file_put_contents("arquivo.pdf", $pdf);
?>


