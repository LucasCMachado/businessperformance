<?php
date_default_timezone_set('America/Sao_Paulo');
include 'view/formulario.php';
require_once './_connect/connect_pdo.php';
require_once './controller/ajustes.php';
$dbh = Database::conexao();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head_main.php'; ?>
    </head>
    <body>
        <?php 
        $stmt = $dbh->prepare("SELECT nome, id_tipo_formulario FROM formulario WHERE token=:token");
        $stmt->bindParam(":token", $_GET['tokenFormulario'], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();

        $idTipoForm=$result['id_tipo_formulario'];

        switch ($idTipoForm) {
            case 1:
                include_once('formulario/media.php');
                break;
            case 2:
                include_once('formulario/'.clearId($result['nome']).'.php');
                break;
        }
        ?>
    </body>
</html>
