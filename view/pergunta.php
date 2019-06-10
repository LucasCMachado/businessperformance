<?php 

// Lista Perguntas de um determinado formulário
function listarPerguntaFormulario($dbh,$id_formulario){

    $stmt = $dbh->prepare('SELECT c.id, c.nome as nomeCat, f.nome as nomeForm FROM categoria_pergunta as c LEFT JOIN formulario as f on f.id=c.id_formulario WHERE c.id_formulario=:idFormulario ORDER BY id ASC');
    $stmt->bindParam(":idFormulario", $id_formulario, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["nomeCat"].'</td>
            <td>'.$row["nomeForm"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update" data-idCat="'.$row["id"].'" data-toggle="modal" data-target="#editar-pergunta">Editar</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-idCat="'.$row["id"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista Perguntas de uma determinada categoria
function listarPerguntaCategoria($dbh,$id_categoria){

    $stmt = $dbh->prepare('SELECT p.id as idPerg, p.pergunta as nomePerg, c.id as idCat, c.nome as nomeCat, t.id as idTipo, t.tipo as nomeTipo FROM pergunta as p LEFT JOIN categoria_pergunta as c on c.id=p.id_categoria_pergunta LEFT JOIN tipo_pergunta as t ON t.id=p.id_tipo_pergunta WHERE c.id=:idCategoria ORDER BY p.id ASC');
    $stmt->bindParam(":idCategoria", $id_categoria, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo '
        <tr>
            <td>'.$row["idPerg"].'</td>
            <td>'.$row["nomePerg"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update"  data-idperg="'.$row["idPerg"].'" data-nomeperg="'.$row["nomePerg"].'" data-idcat="'.$row["idCat"].'" data-nomecat="'.$row["nomeCat"].' "data-idtipo="'.$row["idTipo"].'" data-nometipo="'.$row["nomeTipo"].'"  data-toggle="modal" data-target="#editar-pergunta">Editar</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-idPerg="'.$row["idPerg"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista Categorias de um determinado formulário para um select
function listarCatOption($dbh,$id_formulario){

    $stmt = $dbh->prepare('SELECT c.id, c.nome as nomeCat FROM categoria_pergunta as c LEFT JOIN formulario as f ON c.id_formulario=f.id ORDER BY c.id ASC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["nomeCat"].'</option>';
    }
}

// Lista Categorias de um determinado formulário para um select
function listarTipOption($dbh){

    $stmt = $dbh->prepare('SELECT * FROM tipo_pergunta ORDER BY tipo ASC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["tipo"].'</option>';
    }
}
?>