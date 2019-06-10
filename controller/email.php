<?php
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$assunto = $_POST['assunto'];
			$formulario = $_POST['formulario'];
			$mensagem = $_POST['mensagem'];
			$id = $_POST['id'];

			$stmt = $dbh->prepare("UPDATE email SET assunto=:assunto, mensagem=:mensagem, id_formulario=:formulario WHERE id=:id");
			$stmt->bindParam(":assunto", $assunto, PDO::PARAM_STR);
			$stmt->bindParam(":formulario", $formulario, PDO::PARAM_INT);
			$stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			if($stmt->execute()){
				header("location:alterar-email-".$id."-sucesso");
			}
			else{
				echo 'erro';
			}
		break;

	case 4:
			//Delete
			$id=$_POST['id'];
			$stmt = $dbh->prepare("DELETE FROM email WHERE id=:id");
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
			$assunto = $_POST['assunto'];
			$formulario = $_POST['formulario'];
			$mensagem = $_POST['mensagem'];

			$stmt = $dbh->prepare('SELECT COUNT(id_formulario) as numForm FROM email WHERE id_formulario=:idFormulario');
			$stmt->bindParam(":idFormulario", $formulario, PDO::PARAM_INT);
			$stmt->execute();
			$email=$stmt->fetch();

			if ($email['numForm']>0) {
				header('Location:novo-email-form');
			}else{

				$stmt = $dbh->prepare("INSERT INTO email(assunto, mensagem, id_formulario) VALUES(:assunto, :mensagem, :formulario)");
				$stmt->bindParam(":assunto", $assunto, PDO::PARAM_STR);
				$stmt->bindParam(":formulario", $formulario, PDO::PARAM_INT);
				$stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);

				if($stmt->execute()){
					header('Location:novo-email-sucesso');
				}
				else{
					echo 'erro';
				}
			}
			
			
		break;
}


?>