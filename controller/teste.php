<?php
mb_internal_encoding("iso-8859-1"); 
mb_http_output( "UTF-8" );  
ob_start("mb_output_handler");   
header("Content-Type: text/html; charset=UTF-8",true);

date_default_timezone_set('America/Sao_Paulo');
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

$tokenFormulario="1f991082d756a1c216d8673a7e525fcf";
$token_cliente="cb543085be39e4c9fe957e947c373318";

/* Carrega a classe DOMPdf */
require_once("../dompdf/dompdf/dompdf_config.inc.php");

$nomeForm=nomeFormularioPdf($dbh,$tokenFormulario);
$nomeCliente=nomeClientePdf($dbh,$token_cliente);

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
														$html.= respostasMedia($dbh,$token_cliente,$tokenFormulario);
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


// Lista todos os Formulários
function nomeFormularioPdf($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    return $row["nome"];
}

// Lista todos os Formulários
function nomeClientePdf($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM cliente WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    return $row["nome"];
}

// Lista todos os Formulários
function respostasMedia($dbh,$tokenCliente,$tokenForm){ 

    $stmt = $dbh->prepare('SELECT c.nome as nomeCategoria, r.resultado as media FROM resultado as r LEFT JOIN categoria_pergunta as c ON c.id=r.id_categoria_pergunta WHERE token_formulario=:token_formulario AND token_cliente=:token_cliente ORDER BY r.resultado DESC');
    $stmt->bindParam(":token_cliente", $tokenCliente, PDO::PARAM_STR);
    $stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
    $stmt->execute();

    $resultado='';

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $resultado.="<tr>
                        <td style='font-family:Gotham-Medium;padding: 4px;font-size: 14px;line-height:1;'>".$row["nomeCategoria"]."</td>
                        <td class='text-right' style='font-family:Gotham-Medium;padding: 4px;font-size: 14px;line-height:1;'>".intval($row['media'])."</td>
                    </tr>";
    }

    return $resultado;   
}


?>