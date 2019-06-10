<?php
require_once './_connect/connect_pdo.php';
$dbh = Database::conexao();

$formulario = $_GET['tokenFormulario'];
$cliente = $_GET['tokenCliente'];

$stmt = $dbh->prepare('SELECT nome FROM cliente WHERE token=:cliente');
$stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
$stmt->execute();
$nomeCliente = $stmt->fetch();
$clienteSemEspaco = str_replace(' ', '', $nomeCliente['nome']);

$stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:token');
$stmt->bindParam(":token", $formulario, PDO::PARAM_STR);
$stmt->execute();
$nomeFormulario=$stmt->fetch();
$formularioSemEspaco = str_replace(' ', '', $nomeFormulario['nome']);
?>

<html>
<body style="margin:0px!important;">
  <iframe src="resultados/cliente/<?php echo $clienteSemEspaco ?>/<?php echo $formularioSemEspaco ?>.pdf" height="100%" width="100%" frameborder="0"></iframe>
</body>
</html>