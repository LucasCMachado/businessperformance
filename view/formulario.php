<?php 
// Lista todos os Formulários
function listarFormulario($dbh){

    $stmt = $dbh->prepare('SELECT * FROM formulario ORDER BY id DESC');
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
                        <li><a href="#" class="update" data-idForm="'.$row["id"].'" data-token="'.$row["token"].'" data-nome="'.$row["nome"].'" data-toggle="modal" data-target="#editar-formulario">Editar</a></li>
                        <li><a href="categorias-formulario-'.$row["id"].'">Categorias</a></li>
                        <li><a href="perguntas-formulario-'.$row["id"].'">Perguntas</a></li>
                        <li><a href="visualizar-formulario-'.$row["token"].'" target="_blank">Visualizar</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="delete" data-token="'.$row["token"].'">Deletar</a></li>
                    </ul>
                </div>
            </td>
        </tr>';
    }
}

// Lista Perguntas de um determinado formulário
function formulario($dbh,$token){

    $stmt = $dbh->prepare('SELECT c.id as idCat, c.nome as nomeCat FROM categoria_pergunta as c LEFT JOIN formulario as f on f.id=c.id_formulario WHERE f.token=:token ORDER BY c.id ASC');
    $stmt->bindParam(":token", $token, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        if ($row['nomeCat']!='Resultado Gráfico') {
            echo '<div class="panel panel-default">
            <div class="panel-heading"> 
                <h3 class="panel-title" style="text-transform: uppercase;">'.$row['nomeCat'].'</h3> 
            </div> 
            <div class="panel-body">';
                listarPerguntas($dbh,$row['idCat']);
        }        
    }
}

function listarPerguntas($dbh,$idCat){
    $stmt = $dbh->prepare('SELECT id, pergunta, id_tipo_pergunta FROM pergunta WHERE id_categoria_pergunta=:id_categoria_pergunta ORDER BY id ASC');
    $stmt->bindParam(":id_categoria_pergunta", $idCat, PDO::PARAM_INT);
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo '<div class="form-group">
            <label class="col-md-12 text-left">'.$row['pergunta'].'</label>
            <div class="col-md-12">
                <div class="radio-inline">';
                if ($row['id_tipo_pergunta']==1) {
                    for ($i=0; $i < 11; $i++) {

                        if ($i==0) {
                            echo '<label class="cr-styled" style="margin:0px 20px;">
                                <input type="radio" name="pergunta-'.$row['id'].'" value="'.$i.'" required>
                                <i class="fa"></i>
                                '.$i.' 
                            </label>';
                        }
                        if ($i>0){
                            echo '<label class="cr-styled" style="margin:0px 20px;">
                                <input type="radio" name="pergunta-'.$row['id'].'" value="'.$i.'">
                                <i class="fa"></i>
                                '.$i.' 
                            </label>';
                        }
                        
                    }
                }else{
                    echo '<label class="cr-styled" for="pergunta-'.$row['id'].'">
                        <input type="text" class="form-control" id="pergunta-'.$row['id'].'" name="pergunta-'.$row['id'].'" required>
                        <i class="fa"></i>
                        '.$i.' 
                    </label>';
                }echo '   
                </div>     
            </div>
        </div> <!-- form-group -->';    
    }
    echo '</div> 
    </div><!-- /Panel -->';
}

// Lista todos os Formulários
function nomeFormulario($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    echo $row["nome"];
}
?>