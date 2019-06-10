<?php

require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

// Inclui o arquivo class.phpmailer.php localizado na pasta class

$stmt = $dbh->prepare("SELECT nome, email FROM cliente WHERE token=:token");
$stmt->bindParam(":token", $_POST['tokenCliente'], PDO::PARAM_STR);
$stmt->execute();

$cliente=$stmt->fetch();

$nomeCliente = $cliente['nome'];
$emailCliente = $cliente['email'];

$stmt2 = $dbh->prepare("SELECT e.mensagem as mensagem, e.assunto as assunto FROM email as e LEFT JOIN formulario as f on f.id=e.id_formulario WHERE f.token=:token");
$stmt2->bindParam(":token", $_POST['form'], PDO::PARAM_STR);
$stmt2->execute();

$formulario=$stmt2->fetch();

$assunto = $formulario['assunto'];
$mensagem = $formulario['mensagem'];

$mensagem = str_replace('#linkformulario', 'http://businessperformance.net.br/responder-formulario-'.$_POST['form'].'-'.$_POST['tokenCliente'], $formulario['mensagem']);
$mensagem = str_replace('#nomecliente', '<b>'.$nomeCliente.'</b>', $mensagem);

$emailsender = "contato@businessperformance.net.br";
// Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
// você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
 
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = 'Business Performance';
$emailremetente    = 'contato@businessperformance.net.br';
$emaildestinatario = trim($emailCliente); 
$comcopia          = trim('');
$comcopiaoculta    = trim('');
$assunto           = $assunto;

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = $mensagem; 
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$nomeremetente."<".$emailsender.">".$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
// Se não houver um valor, o item não deverá ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */
mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

/* Mostrando na tela as informações enviadas por e-mail
echo "Mensagem <b>$assunto</b> enviada com sucesso!<br><br>
De: $emailsender<br>
Para: $emaildestinatario<br>
Com c&oacute;pia: $comcopia<br>
Com c&oacute;pia Oculta: $comcopiaoculta<br>
<p><a href='".$_SERVER["HTTP_REFERER"]."'>Voltar</a></p>";*/

echo 'sucesso';

?>