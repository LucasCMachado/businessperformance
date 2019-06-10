<?php 
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

$stmt = $dbh->prepare('SELECT nome FROM cliente WHERE token=:cliente ORDER BY id DESC LIMIT 1');
$stmt->bindParam(":cliente", $_GET['tokenCliente'], PDO::PARAM_STR);
$stmt->execute();
$nomeCliente=$stmt->fetch();

$stmt = $dbh->prepare('SELECT nome FROM formulario WHERE token=:formulario ORDER BY id DESC LIMIT 1');
$stmt->bindParam(":formulario", $_GET['tokenFormulario'], PDO::PARAM_STR);
$stmt->execute();
$nomeFormulario=$stmt->fetch();

$FormSemEspaco=str_replace(" ", "", $nomeFormulario['nome']);
$ClienteSemEspaco=str_replace(" ", "", $nomeCliente['nome']);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!-- SEO -->
	<title>Business Performance</title>
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta name="referrer" content="always" />

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="questionario/images/favicon.png" sizes="32x32">

	<!-- Styles -->
	<link rel='stylesheet' href='questionario/assets/css/style.css' type='text/css' media='screen' />
	<meta name="viewport" content="width=device-width,initial-scale=1" />

</head>

<body id="fullsingle" class="page-template-page-fullsingle">

<div class="fs">

	<!-- Image Side -->
	<div class="image">

	</div>

	<!-- Content Side -->
	<div class="content">

		<div class="content-vertically-center">
		
			<div class="intro">
				
				<h1><img src="questionario/images/BP_Logo.png"></h1>

				<span class="tagline">Pronto!</span>

			</div>

			<div class="bio">
				
				<p>Agora que já respondeu o assessment, você pode baixar seu resultado clicando no botão abaixo.</p>

			</div>

			<div class="lists">
				
				<div class="list" style="width: 100%;">

					<div class="credit" style="margin-bottom: 30px;">
						<p>* Se essa tela for fechada não será mais possível baixar seu resultado.<br />Caso isso aconteça entre em contato conosco que o enviaremos para você.</p>
					</div>
						<a href="/resultados/cliente/<?php echo $ClienteSemEspaco;?>/<?php echo $FormSemEspaco;?>.pdf" download="<?php echo $nomeFormulario['nome']; ?>" class="download">BAIXAR RESULTADO</a>
				</div>
				
			</div>

			<div class="credit">

				<p>&copy;2018 <a href="#"></a> - <a href="https://www.businessperformance.com.br/">Business Performance</a></p>

			</div>		

		</div>

	</div>

</div>

</body>
</html>