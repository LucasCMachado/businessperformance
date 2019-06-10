<?php
require_once '../_connect/connect_pdo.php';
require_once 'ajustes.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$nome = $_POST['editNome'];
			$data = inverteData($_POST['editdata']);
			$id = $_POST['id'];

			$stmt = $dbh->prepare("UPDATE turma SET nome=:nome, data=:data WHERE id=:id");
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
			$stmt = $dbh->prepare("UPDATE turma SET status=:status WHERE id=:id");
			$stmt->bindParam(":status", $status, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 4:
			//Vincular formacao
			$id=$_POST['id'];
			$status="i";
			$stmt = $dbh->prepare("UPDATE formacao_turma SET status=:status WHERE id=:id");
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
			//Desvincular formacao
			$id_formacao=$_POST['formacao'];
			$id_turma=$_POST['turma'];
			$stmt = $dbh->prepare("INSERT INTO formacao_turma(id_formacao, id_turma) VALUES(:id_formacao, :id_turma)");
			$stmt->bindParam(":id_formacao", $id_formacao, PDO::PARAM_INT);
			$stmt->bindParam(":id_turma", $id_turma, PDO::PARAM_INT);

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
			$data = inverteData($_POST['data']);
			$local= $_POST['local'];
			
			$stmt = $dbh->prepare("INSERT INTO turma(nome, data, local) VALUES(:nome, :data, :local)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":data", $data, PDO::PARAM_STR);
			$stmt->bindParam(":local", $local, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}


?>