<?php
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
			$medias = respostasMediaPdf($dbh,$_POST['tokenCliente'],$_POST['tokenForm']);

			$html = '
			<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta charset="utf-8">
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
			                            <!-- <div class="panel-heading">
			                                <h4>Invoice</h4>
			                            </div> -->
			                            <div class="panel-body">
			                                <div class="clearfix">
			                                    <div class="pull-left">
			                                        <img src="../img/logo_business2.png" style="max-width: 20%;" alt="Logotipo Business Performance">
			                                    </div>
			                                    <div class="pull-right">
			                                        <h4></h4> 
			                                    </div>
			                                </div>
			                                <hr>
			                                <div class="row">
			                                    <div class="col-md-12">                                        
			                                        <div class="m-t-30" style="font-family:Gotham-Medium;">
			                                              <abbr title="cliente" style="font-family:Gotham-Medium;">Cliente:</abbr> '.$nomeCliente.' <div class="text-right" style="font-family:Gotham-Medium;"> Data: </div>'.date('d/m/Y').'
			                                        </div>
			                                    </div>
			                                    <h1 class="text-center text-primary" style="font-family:Gotham-Ultra;">'.$nomeForm.'</h1>
			                                    </div>
				                                <div class="m-h-50"></div>
				                                <div class="row">
				                                    <div class="">
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
				                                                    arsort($medias);
																	foreach( $medias as $chave ){
																	$html.= "
																	<tr>
																	    <td style='font-family:Gotham-Medium;'>".$chave["categoria"]."</td>
																	    <td class='text-right' style='font-family:Gotham-Medium;'>".intval($chave['media'])."</td>
																	</tr>";
																	}
																	$html.='</tbody>
			                                                </table>
			                                            </div>                                            
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="m-h-50"></div>
			                                </div>
			                                <div class="row" style="border-radius: 0px;">
			                                	<div class="panel-body text-center">
							                        <address class="ng-scope">
							                            <strong class="text-primary">BUSINESS PERFORMANCE Marcelo dos Santos & Renata Nunes</strong><br>
							                            Soluções para Máxima Performance de Negócios, Lideranças e Vendas<br>
							                            Criciúma SC - Rua Princesa Isabel, nº 40 - Sala 602 - Ed Prime Tower - Centro<br>
							                            <abbr title="Phone">Telefones:</abbr> (48) 3521 3836 / 99175 1998
							                        </address>
							                            <a href="http://www.businessperformance.com.br">www.businessperformance.com.br</a>                        
							                    </div>
			                                </div>
			                                <hr>
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
			
		break;
	
	default:
			//Insert
			$nome = $_POST['nomeForm'];
			$token=md5($nome);
			$stmt = $dbh->prepare("INSERT INTO formulario(nome, token) VALUES(:nome, :token)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
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

	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require_once("../PHPMailer/class.phpmailer.php");
	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "mail.businessperformance.net.br"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->Username = 'contato@businessperformance.net.br'; // Usuário do servidor SMTP
	$mail->Password = '@Business18'; // Senha do servidor SMTP
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

	$mail->From = "contato@businessperformance.net.br"; // Seu e-mail
	$mail->FromName = "Business Performance"; // Seu nome
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('lucascesar@uorksis.com', 'Renata Nunes');

	//$mail->AddAddress('ciclano@site.net');

	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

	$mail->Subject  = "Resultado formulário - ".$nomeForm.""; // Assunto da mensagem
	$mail->Body = "Segue em anexo o resultado do cliente <b>".$nomeCliente."</b> para o formulário <b>".$nomeForm."</b>.)";
	$mail->AltBody = "Segue em anexo o resultado do cliente ".$nomeCliente." para o formulário ".$nomeForm.".";
	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

	$mail->AddAttachment($resultado);  // Insere um anexo -> Renomear arquivo ($resultado, "novo_nome.pdf")
	// Envia o e-mail
	$enviado = $mail->Send();
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	// Exibe uma mensagem de resultado
	if ($enviado) {
	  echo "E-mail enviado com sucesso!";
	} else {
	  echo "Não foi possível enviar o e-mail.";
	  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}

}

?>