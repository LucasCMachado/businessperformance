<?php 
// Lista todos os Formulários
function listarEmails($dbh){

    $stmt = $dbh->prepare('SELECT e.id as idEmail, e.assunto as assuntoEmail, f.nome as nomeForm FROM email as e LEFT JOIN formulario as f ON f.id=e.id_formulario ORDER BY e.id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '
        <tr>
            <td>'.$row["idEmail"].'</td>
            <td>'.$row["assuntoEmail"].'</td>
            <td>'.$row["nomeForm"].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-inverse btn-rounded m-b-5 dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções <i class="ion-gear-a"></i> </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="alterar-email-'.$row["idEmail"].'">Editar</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-id="'.$row["idEmail"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista Categorias de um determinado formulário para um select
function listarFormOption($dbh){

    $stmt = $dbh->prepare('SELECT id, nome as nomeForm FROM formulario ORDER BY id ASC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["id"].'">'.$row["nomeForm"].'</option>';
    }
}
?>