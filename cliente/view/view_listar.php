<?php 
require_once './controller/ajuste.php';
require_once './_connect/connect_pdo.php';
$dbh = Database::conexao();

function listarFormacao($dbh, $turma, $acesso){
	$stmt = $dbh->prepare('SELECT f.id as idFormacao, f.nome as nomeFormacao FROM formacao as f LEFT JOIN formacao_turma as a ON a.id_formacao=f.id WHERE a.id_turma=:id');
    $stmt->bindParam(":id", $turma, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<div class="col-lg-4 col-md-4 col-sm-6">
			<a href="#" class="fh5co-card-item">
				<div class="fh5co-text">
					<h2>'.$row["nomeFormacao"].'</h2>
					</br>
					<p><span class="btn btn-primary formacao" data-formacao="'.$row["idFormacao"].'" data-acesso="'.$acesso.'">ACESSAR FORMAÇÃO</span></p>
				</div>
			</a>
		</div>';
    }
}

function listarTurma($dbh, $idCliente, $acesso, $token){
	$stmt = $dbh->prepare('SELECT t.id as id_turma, t.data as data_turma, t.nome as nome_turma, t.local as local_turma FROM turma as t LEFT JOIN cliente_turma as c ON c.id_turma=t.id WHERE c.id_cliente=:id');
    $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<div class="col-lg-4 col-md-4 col-sm-6">
			<a href="#" class="fh5co-card-item">
				<div class="fh5co-text">
					<h2>'.$row["nome_turma"].'</h2>
					<p>Data: '.inverteData($row["data_turma"]).'<br>Local: '.$row["local_turma"].'</p>
					<p><span class="btn btn-primary ass-formacao" data-turma="'.$row["id_turma"].'" data-acesso="'.$acesso.'" data-token="'.$token.'">ACESSAR FORMAÇÃO</span></p>
				</div>
			</a>
		</div>';
    }
}

function getDadosCliente($dbh, $token){
	$stmt = $dbh->prepare('SELECT * FROM cliente WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $dados=$stmt->fetch();

    return $dados;
}
?>