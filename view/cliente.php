<?php 
// Lista todos os Formulários
function listarCliente($dbh){

    $stmt = $dbh->prepare('SELECT * FROM cliente ORDER BY id DESC');
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
                        <li><a href="#" class="update" data-nome="'.$row["nome"].'" data-email="'.$row["email"].'" data-token="'.$row["token"].'" data-toggle="modal" data-target="#editar-cliente">Editar</a></li>
                        <li><a href="#" class="send-form" data-token="'.$row["token"].'" data-toggle="modal" data-target="#enviar-formulario">Enviar formulário</a></li>
                        <li><a href="#" class="resultado-form" data-token="'.$row["token"].'" data-toggle="modal" data-target="#resultado-formulario">Resultados</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-token="'.$row["token"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista todos os Formulários
function listarFormulario($dbh){

    $stmt = $dbh->prepare('SELECT nome, token FROM formulario ORDER BY id DESC');
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

    echo '<option value="'.$row["token"].'">'.$row["nome"].'</option>';
    }
}
?>