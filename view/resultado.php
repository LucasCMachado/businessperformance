<?php
// Lista todos os Formulários
function respostasMedia($dbh,$tokenCliente,$tokenForm){ 

    $stmt = $dbh->prepare('SELECT c.nome as nomeCategoria, r.resultado as media FROM resultado as r LEFT JOIN categoria_pergunta as c ON c.id=r.id_categoria_pergunta WHERE token_formulario=:token_formulario AND token_cliente=:token_cliente ORDER BY r.resultado DESC');
    $stmt->bindParam(":token_cliente", $tokenCliente, PDO::PARAM_STR);
    $stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
    $stmt->execute();

    $resultado='';

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<tr>
                        <td>".$row["nomeCategoria"]."</td>
                        <td class='text-right'>".intval($row['media'])."</td>
                    </tr>";
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

// Lista todos os Formulários
function nomeFormulario($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    echo $row["nome"];
}

// CONFIGURAÇÕES PDF MEDIAS

// Lista todos os Formulários
function nomeFormularioPdf($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    return $row["nome"];
}

// Lista todos os Formulários
function nomeClientePdf($dbh, $token){

    $stmt = $dbh->prepare('SELECT nome FROM cliente WHERE token=:token');
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();
    $row=$stmt->fetch();

    return $row["nome"];
}

// Lista todos os Formulários
function respostasMediaPdf($dbh,$tokenCliente,$tokenForm){

    $soma=0;
    $qtd=0;

    $stmt = $dbh->prepare('SELECT id FROM formulario WHERE token=:token LIMIT 1');
    $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
    $stmt->execute();
    $formulario=$stmt->fetch();

    $stmt2 = $dbh->prepare('SELECT id, nome FROM categoria_pergunta WHERE id_formulario=:id_formulario');
    $stmt2->bindParam(":id_formulario", $formulario['id'], PDO::PARAM_STR);
    $stmt2->execute();

    foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $categorias) {

        $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id_categoria_pergunta ASC');
        $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
        $stmt3->execute();

        foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
            $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
            $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
            $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
            $stmt4->execute();
            $valor=$stmt4->fetch();

            $soma+=intval($valor['numerica']);
            $qtd+=intval(1);
        }
        $media=$soma/$qtd;

        $stmt5 = $dbh->prepare("INSERT INTO resultado(id_categoria_pergunta, resultado, token_cliente, token_formulario) VALUES(:id_categoria_pergunta, :resultado, :token_cliente, :token_formulario)");
        $stmt5->bindParam(":id_categoria_pergunta", $categorias['id'], PDO::PARAM_INT);
        $stmt5->bindParam(":resultado", $media, PDO::PARAM_STR);
        $stmt5->bindParam(":token_cliente", $tokenCliente, PDO::PARAM_STR);
        $stmt5->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
        $stmt5->execute();

        $soma =0;
        $qtd=0;
    }

    $stmt6 = $dbh->prepare('SELECT c.nome as nomeCategoria, r.resultado as media FROM resultado as r LEFT JOIN categoria_pergunta as c ON c.id=r.id_categoria_pergunta WHERE token_formulario=:token_formulario AND token_cliente=:token_cliente ORDER BY r.resultado DESC');
    $stmt6->bindParam(":token_cliente", $tokenCliente, PDO::PARAM_STR);
    $stmt6->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
    $stmt6->execute();

    $resultado='';

    foreach ($stmt6->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $resultado.="<tr>
                        <td style='font-family:Gotham-Medium;padding: 4px;font-size: 14px;line-height:1;'>".$row["nomeCategoria"]."</td>
                        <td class='text-right' style='font-family:Gotham-Medium;padding: 4px;font-size: 14px;line-height:1;'>".intval($row['media'])."</td>
                    </tr>";
    }

    return $resultado;
    
}

// END CONFIGURAÇÕES PDF MEDIAS
?>