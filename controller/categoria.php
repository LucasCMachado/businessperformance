<?php
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$id = $_POST['id'];
			$nome = $_POST['editNomeCat'];
			$formulario = $_POST['editForm'];
			$stmt = $dbh->prepare("UPDATE categoria_pergunta SET nome=:nome, id_formulario=:formulario WHERE id=:id");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":formulario", $formulario, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;

	case 3:
			//Verify
			$id=$_POST['id'];

			$stmt = $dbh->prepare("SELECT COUNT(id) as countPerg FROM pergunta WHERE id_categoria_pergunta=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			$qntPerg = $stmt->fetch();

			if ($qntPerg['countPerg']>0) {
				echo "erro";
			}else{
				echo "confirm";
			}

		break;

	case 4:
			//Delete
			$id=$_POST['id'];
			$stmt = $dbh->prepare("DELETE FROM categoria_pergunta WHERE id=:id");
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
			$nome = $_POST['nomeCat'];
			$formulario = $_POST['form'];
			
			$stmt = $dbh->prepare("INSERT INTO categoria_pergunta(nome, id_formulario) VALUES(:nome, :formulario)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":formulario", $formulario, PDO::PARAM_INT);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}


?>