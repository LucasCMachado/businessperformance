<?php 
// Lista Categorias de um determinado formulário
function listarCategoriaFormulario($dbh,$id_formulario){

    $stmt = $dbh->prepare('SELECT c.id, c.nome as nomeCat, f.nome as nomeForm, f.id as idForm FROM categoria_pergunta as c LEFT JOIN formulario as f on f.id=c.id_formulario WHERE c.id_formulario=:idFormulario ORDER BY id ASC');
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
                        <li><a class="update" href="#" data-idCat="'.$row["id"].'" data-nomeCat="'.$row["nomeCat"].'" data-idForm="'.$row["idForm"].'" data-nomeForm="'.$row["nomeForm"].'" data-toggle="modal" data-target="#editar-categoria">Editar</a></li>
                        <li><a href="perguntas-categoria-'.$row["id"].'">Perguntas</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-idCat="'.$row["id"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista Categorias de um determinado formulário para um select
function listarFormOption($dbh,$id_formulario){

    $stmt = $dbh->prepare('SELECT id, nome as nomeForm FROM formulario WHERE id=:idFormulario ORDER BY id ASC');
    $stmt->bindParam(":idFormulario", $id_formulario, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["nomeForm"].'</option>';
    }
}
?>