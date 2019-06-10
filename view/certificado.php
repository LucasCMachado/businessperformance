<?php 
// Lista todos os Formulários
function listarFormacao($dbh){

    $stmt = $dbh->prepare('SELECT * FROM formacao ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["nome"].'</td>
            <td>'.$row["urlShortener"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="update" data-idForm="'.$row["id"].'" data-token="'.$row["token"].'" data-nome="'.$row["nome"].'" data-toggle="modal" data-target="#editar-formacao">Editar</a></li>
                        <li><a href="categorias-formacao-'.$row["id"].'">Categorias</a></li>
                        <li><a href="perguntas-formacao-'.$row["id"].'">Perguntas</a></li>
                        <li><a href="visualizar-formacao-'.$row["token"].'" target="_blank">Visualizar</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-token="'.$row["token"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarFormOption($dbh){

    $stmt = $dbh->prepare('SELECT nome FROM formulario ORDER BY nome DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["nome"].'">'.$row["nome"].'</option>';
    }
}
// Lista todos os Formulários
function listarClienteOption($dbh){

    $stmt = $dbh->prepare('SELECT nome FROM cliente ORDER BY nome DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["nome"].'">'.$row["nome"].'</option>';
    }
}
?>