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

switch ($_POST['op']) {
	case 2:
			//Update
			$nome = $_POST['editNomeForm'];
			$token=$_POST['token'];
			$stmt = $dbh->prepare("UPDATE formulario SET nome=:nome WHERE token=:token");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 3:
			//Verify
			$token=$_POST['token'];
			$stmt = $dbh->prepare("SELECT id FROM formulario WHERE token=:token");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->execute();
			$idForm = $stmt->fetch();

			$stmt = $dbh->prepare("SELECT COUNT(id) as countCat FROM categoria_pergunta WHERE id_formulario=:id");
			$stmt->bindParam(":id", $idForm['id'], PDO::PARAM_STR);
			$stmt->execute();
			$qntCat = $stmt->fetch();

			if ($qntCat['countCat']>0) {
				echo "erro";
			}else{
				echo "confirm";
			}

		break;

	case 4:
			//Delete
			$token=$_POST['token'];
			$stmt = $dbh->prepare("DELETE FROM formulario WHERE token=:token");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 5:
			//Delete
			$formulario=$_POST['formulario'];
			$cliente=$_POST['cliente'];

			$stmt = $dbh->prepare("SELECT COUNT(id) as validaFormulario FROM resposta WHERE token_formulario=:formulario AND token_cliente=:cliente");
			$stmt->bindParam(":formulario", $formulario, PDO::PARAM_STR);
			$stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
			$stmt->execute();
			$validacao=$stmt->fetch();

			if ($validacao['validaFormulario']>0) {
				echo '1';
			}else{
				echo '0';
			}

		break;

	case 6:
			//Insert
			//str_replace('pergunta-', '', $_POST['pergunta-'..'']);
			$tokenForm = $_POST['tokenForm'];

			$stmt = $dbh->prepare('SELECT p.id as idPergunta, p.id_tipo_pergunta as tipoPergunta FROM pergunta as p LEFT JOIN categoria_pergunta as c ON c.id=p.id_categoria_pergunta LEFT JOIN formulario as f ON f.id=c.id_formulario WHERE f.token=:token');
		    $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
		    $stmt->execute();

		    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
		    	$idPergunta = $row['idPergunta'];
		    	$resposta = $_POST['pergunta-'.$idPergunta.''];

		    	if ($row['tipoPergunta']==1) {
		    		$textual='';
		    		$token_cliente=$_POST['tokenCliente'];
		    		$stmt = $dbh->prepare("INSERT INTO resposta(numerica, textual, id_pergunta, token_cliente, token_formulario) VALUES(:numerica, :textual, :id_pergunta, :token_cliente, :token_formulario)");
					$stmt->bindParam(":numerica", $resposta, PDO::PARAM_INT);
					$stmt->bindParam(":textual", $textual, PDO::PARAM_STR);
					$stmt->bindParam(":id_pergunta", $idPergunta, PDO::PARAM_INT);
					$stmt->bindParam(":token_cliente", $token_cliente, PDO::PARAM_STR);
					$stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
					$stmt->execute();
					
		    	}else{
		    		$numerica='';
		    		$token_cliente=$_POST['tokenCliente'];
		    		$stmt = $dbh->prepare("INSERT INTO resposta(numerica, textual, id_pergunta, token_cliente, token_formulario) VALUES(:numerica, :textual, :id_pergunta, :token_cliente, :token_formulario)");
					$stmt->bindParam(":numerica", $numerica, PDO::PARAM_INT);
					$stmt->bindParam(":textual", $resposta, PDO::PARAM_STR);
					$stmt->bindParam(":id_pergunta", $idPergunta, PDO::PARAM_INT);
					$stmt->bindParam(":token_cliente", $token_cliente, PDO::PARAM_STR);
					$stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
					$stmt->execute();
		    	}
		    }

		    $nomeForm=nomeFormularioPdf($dbh,$_POST['tokenForm']);
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
																	$html.= respostasMediaPdf($dbh,$_POST['tokenCliente'],$_POST['tokenForm']);
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

			sendmail($nomeCliente, $nomeForm, $resultado);

			$link_resultado="http://www.businessperformance.net.br/resultado-assessment-".$_POST['formulario']."-".$_POST['cliente'];

			echo $link_resultado;
			
		break;
	
	default:
			//Insert
			$id_tipo_formulario = 1;
			$nome = $_POST['nomeForm'];
			$token=md5($nome);
			$stmt = $dbh->prepare("INSERT INTO formulario(nome, id_tipo_formulario, token) VALUES(:nome, :id_tipo_formulario, :token)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":id_tipo_formulario", $id_tipo_formulario, PDO::PARAM_INT);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}

function sendmail($nomeCliente, $nomeForm, $resultado){

$emailsender = "contato@businessperformance.net.br";
//    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
// você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
 
// Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar 
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = 'Business Performance';
$emailremetente    = 'contato@businessperformance.net.br';
$emaildestinatario = trim('financeiro@businessperformance.com.br');
$comcopia          = trim('');
$comcopiaoculta    = trim('');
$assunto           = 'Resultado formulário - '.$nomeForm.'';

$nomeFormSemEspaco=str_replace(" ", "", $nomeForm);
$nomeClienteSemEspaco=str_replace(" ", "", $nomeCliente);

 
// Montando a mensagem a ser enviada no corpo do e-mail.
$mensagemHTML = '<P>Segue em anexo o resultado do cliente <b>'.$nomeCliente.'</b> para o formulário <b>'.$nomeForm.'</b>.</P></br>
<P><a href="www.businessperformance.net.br/resultados/cliente/'.$nomeClienteSemEspaco.'/'.$nomeFormSemEspaco.'.pdf" style="padding: 10px 40px; background-color: #0D4E6C; border-radius: 4px; text-decoration: none; color: #FFFFFF;" target="_blank">ACESSAR RESULTADO</a></P></br>
<hr>';
 
 
// Montando o cabeçalho da mensagem
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
// Se não houver um valor, o item não deverá ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
 
// Enviando a mensagem
mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

/* Mostrando na tela as informações enviadas por e-mail
echo "Mensagem <b>$assunto</b> enviada com sucesso!<br><br>
De: $emailsender<br>
Para: $emaildestinatario<br>
Com c&oacute;pia: $comcopia<br>
Com c&oacute;pia Oculta: $comcopiaoculta<br>
<p><a href='".$_SERVER["HTTP_REFERER"]."'>Voltar</a></p>";*/

}

?>