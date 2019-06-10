<?php
require_once '../../../_connect/connect_pdo.php';
$dbh = Database::conexao();

//Insert
$nome = $_POST['nome'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$telefone = $_POST['telefone'];
$token_formulario = $_POST['token_formulario'];
$token_cliente=md5($email);

$stmt = $dbh->prepare('SELECT COUNT(id) as validaCliente FROM cliente WHERE email=:email LIMIT 1');
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->execute();
$validacao=$stmt->fetch();

if ($validacao['validaCliente']>0) {
	echo usuarioExistente($dbh, $email);
}else{

	$stmt = $dbh->prepare("INSERT INTO cliente(nome, email, empresa, cidade, telefone, token) VALUES(:nome, :email, :empresa, :cidade, :telefone, :token)");
	$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
	$stmt->bindParam(":empresa", $empresa, PDO::PARAM_STR);
	$stmt->bindParam(":cidade", $cidade, PDO::PARAM_STR);
	$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR); 
	$stmt->bindParam(":token", $token_cliente, PDO::PARAM_STR);

	if($stmt->execute()){
		echo $token_cliente;
	}
	else{
		echo 0;
	}

}

function usuarioExistente ($dbh, $email){
	$stmt = $dbh->prepare('SELECT token FROM cliente WHERE email=:email LIMIT 1');
	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetch();

    return $resultado['token'];
}
?>