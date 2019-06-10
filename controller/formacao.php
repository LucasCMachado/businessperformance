<?php
require_once '../_connect/connect_pdo.php';
require_once 'ajustes.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$nome = $_POST['editNome'];
			$id = $_POST['id'];

			$stmt = $dbh->prepare("UPDATE formacao SET nome=:nome WHERE id=:id");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":data", $data, PDO::PARAM_INT);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 3:
			//Delete
			$id=$_POST['id'];
			$status="i";
			$stmt = $dbh->prepare("UPDATE formacao SET status=:status WHERE id=:id");
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 5:
			//Vincular cliente
			$id_cliente=$_POST['cliente'];
			$id_formacao=$_POST['formacao'];
			$stmt = $dbh->prepare("INSERT INTO formacao_cliente(id_cliente, id_formacao) VALUES(:id_cliente, :id_formacao)");
			$stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
			$stmt->bindParam(":id_formacao", $id_formacao, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 6:
			//Vincular assessment
			$id_assessment=$_POST['assessment'];
			$id_formacao=$_POST['formacao'];
			$stmt = $dbh->prepare("INSERT INTO formacao_assessment(id_formacao, id_assessment) VALUES(:id_formacao, :id_assessment)");
			$stmt->bindParam(":id_assessment", $id_assessment, PDO::PARAM_INT);
			$stmt->bindParam(":id_formacao", $id_formacao, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 7:
			//Delete
			$id=$_POST['id'];
			$status="i";
			$stmt = $dbh->prepare("UPDATE formacao_assessment SET status=:status WHERE id=:id");
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
	
	default:
			//Insert
			$nome = $_POST['nome'];
			
			$stmt = $dbh->prepare("INSERT INTO formacao(nome) VALUES(:nome)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}


?>