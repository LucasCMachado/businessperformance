<?php
include_once 'controller/ajustes.php';
// Lista todos os Formulários
function listarTurma($dbh){

    $stmt = $dbh->prepare('SELECT * FROM turma WHERE status="a" ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["nome"].'</td>
            <td>'.inverteData($row["data"]).'</td>
            <td>'.$row["local"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update" data-nome="'.$row["nome"].'" data-id="'.$row["id"].'" data-data="'.inverteData($row["data"]).'" data-local="'.$row["local"].'" data-toggle="modal" data-target="#editar-turma">Editar</a></li>
                        <li><a href="listar-formacao-turma-'.$row["id"].'">Formações</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-id="'.$row["id"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarFormacaoTurma($dbh, $turma){

    $status = "a";

    $stmt = $dbh->prepare('SELECT f.id as idFormacao, f.nome as nomeFormacao, tf.id as idturmaFormacao FROM formacao_turma as tf LEFT JOIN formacao as f ON f.id=tf.id_formacao WHERE tf.status=:status AND tf.id_turma=:id ORDER BY tf.id DESC');
    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
    $stmt->bindParam(":id", $turma, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["idFormacao"].'</td>
            <td>'.$row["nomeFormacao"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="f-'.$row["idFormacao"].'-t-'.$row["idturmaFormacao"].'" target="_blank">Link</a></li>
                        <li><a href="listar-clientes-turma-'.$row["idFormacao"].'">Clientes</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="desvincular" data-id="'.$row["idFormacao"].'">Desvincular</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarClienteTurma($dbh, $turma){

    $stmt = $dbh->prepare('SELECT c.id as idClientes, c.nome as nomeClientes, tc.id as idturmaClientes FROM cliente_turma as tc LEFT JOIN cliente as c ON c.id=tc.id_cliente ORDER BY tc.id DESC');
    $stmt->bindParam(":id", $turma, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["idClientes"].'</td>
            <td>'.$row["nomeClientes"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update" data-nome="'.$row["nomeClientes"].'" data-id="'.$row["idClientes"].'" data-toggle="modal" data-target="#editar-turma">Editar</a></li>
                        <li><a href="listar-clientes-turma-'.$row["idClientes"].'">Clientes</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-id="'.$row["idClientes"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarTurmaCliente($dbh){

    $stmt = $dbh->prepare('SELECT nome, token FROM formulario ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["token"].'">'.$row["nome"].'</option>';
    }
}

// Lista todos os Formulários
function listarFormacaoOption($dbh){

    $stmt = $dbh->prepare('SELECT id, nome FROM formacao ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["nome"].'</option>';
    }
}
?>