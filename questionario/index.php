<?php 
$token_formulario=$_GET['tokenFormulario'];
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
	<link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

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

				<span class="tagline">Bem Vindo!</span>

			</div>

			<div class="bio">
				
				<p>Antes de responder nosso questionário gostariamos de pedir para que você preencha o formulário abaixo.</p>

			</div>

			<div class="lists">
				
				<div class="list" style="width: 100%;">

					<h3>Dados de contato:</h3>
					<div class="credit">
						<p>* Os campos indicados com asterisco são de preenchimento obrigatório.</p>
					</div>

					<form method='post' id='cliente-SaveForm' action="#" role="form">
						<label for="nome">Nome completo *</label>
						<input type="text" name="nome" id="nome">
						<input type="text" name="token_formulario" id="token_formulario" value="<?php echo $_GET['tokenFormulario'];?>" style="display: none;">

						<label for="email">E-mail *</label>
						<input type="email" name="email" id="email">

						<label for="empresa">Empresa *</label>
						<input type="text" name="empresa" id="empresa">

						<label for="cidade">Cidade *</label>
						<input type="text" name="cidade" id="cidade">

						<label for="telefone">Telefone / WhatsApp *</label>
						<input type="text" class="phone" name="telefone" id="telefone">

						<button type="submit" style="cursor: pointer;">ENVIAR</button>

					</form>

				</div>
				
			</div>

			<div class="credit">

				<p>&copy;2018 <a href="#"></a> - <a href="https://www.businessperformance.com.br/">Business Performance</a></p>

			</div>
			<script src="questionario/assets/js/jquery-3.3.1.min.js"></script>
			<script src="questionario/assets/js/jquery.mask.min.js"></script>
			<script src="questionario/assets/js/cliente.js"></script>
			<script src="../assets/sweet-alert/sweet-alert.min.js"></script>
        	<script src="../assets/sweet-alert/sweet-alert.init.js"></script>
        	<script type="text/javascript">
	            $(document).ready(function() {
	                $('.phone').mask('(00) 000000000');
	            } );
	        </script>

		</div>

	</div>

</div>

</body>
</html>