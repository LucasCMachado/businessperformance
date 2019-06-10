<?php
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$pergunta = $_POST['editPergunta'];
			$categoria = $_POST['editCat'];
			$tipo = $_POST['editTipo'];
			$id_pergunta = $_POST['idPergunta'];

			$stmt = $dbh->prepare("UPDATE pergunta SET pergunta=:pergunta, id_categoria_pergunta=:categoria, id_tipo_pergunta=:tipo WHERE id=:id");
			$stmt->bindParam(":pergunta", $pergunta, PDO::PARAM_STR);
			$stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);
			$stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
			$stmt->bindParam(":id", $id_pergunta, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 4:
			//Delete
			$id=$_POST['id'];
			$stmt = $dbh->prepare("DELETE FROM pergunta WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
	
	default:
			//Insert
			$pergunta = $_POST['pergunta'];
			$categoria = $_POST['id'];
			$tipo = $_POST['tipo'];
			
			$stmt = $dbh->prepare("INSERT INTO pergunta(pergunta, id_categoria_pergunta, id_tipo_pergunta) VALUES(:pergunta, :categoria, :tipo)");
			$stmt->bindParam(":pergunta", $pergunta, PDO::PARAM_STR);
			$stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);
			$stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}


?>