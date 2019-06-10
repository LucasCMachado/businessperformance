<?php 
// Lista todos os Formulários
function listarFormacao($dbh){

    $status="a";

    $stmt = $dbh->prepare('SELECT * FROM formacao WHERE status=:status ORDER BY id DESC');
    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["nome"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update" data-nome="'.$row["nome"].'" data-id="'.$row["id"].'" data-toggle="modal" data-target="#editar-formacao">Editar</a></li>
                        <li><a href="listar-assessment-formacao-'.$row["id"].'">Assessments</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-id="'.$row["id"].'">Desativar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarFormacaoAssessment($dbh, $formacao){

    $status="a";

    $stmt = $dbh->prepare('SELECT a.id as idAssessment, a.nome as nomeAssessment, fa.id as idFormacaoAssessment FROM formacao_assessment as fa LEFT JOIN formulario as a ON a.id=fa.id WHERE fa.id_formacao=:id AND fa.status=:status ORDER BY fa.id DESC');
    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
    $stmt->bindParam(":id", $formacao, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["idAssessment"].'</td>
            <td>'.$row["nomeAssessment"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="desvincular" data-id="'.$row["idAssessment"].'">Desvincular</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarFormacaoCliente($dbh){

    $stmt = $dbh->prepare('SELECT nome, token FROM formacao_cliente ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["token"].'">'.$row["nome"].'</option>';
    }
}

// Lista todos os Formulários
function listarAssessmentOption($dbh){

    $stmt = $dbh->prepare('SELECT id, nome FROM formulario ORDER BY nome DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["nome"].'</option>';
    }
}
?>