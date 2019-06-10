<?php
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

switch ($_POST['op']) {
	case 2:
			//Update
			$nome = $_POST['editNome'];
			$email = $_POST['editEmail'];
			$token = $_POST['token'];

			$stmt = $dbh->prepare("UPDATE cliente SET nome=:nome, email=:email WHERE token=:token");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_INT);
			$stmt->bindParam(":token", $token, PDO::PARAM_INT);

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

			$stmt = $dbh->prepare("SELECT COUNT(id) as countResp FROM resposta WHERE token_cliente=:token");
			$stmt->bindParam(":token", $token, PDO::PARAM_INT);
			$stmt->execute();
			$qntPerg = $stmt->fetch();

			if ($qntPerg['countResp']>0) {
				echo "erro";
			}else{
				echo "confirm";
			}

		break;

	case 4:
			//Delete
			$token=$_POST['token'];
			$stmt = $dbh->prepare("DELETE FROM cliente WHERE token=:token");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);

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
			$email = $_POST['email'];
			$token=md5($email);
			
			$stmt = $dbh->prepare("INSERT INTO cliente(nome, email, token) VALUES(:nome, :email, :token)");
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);

			if($stmt->execute()){
				echo 'sucesso';
			}
			else{
				echo 'erro';
			}
		break;
}


?>