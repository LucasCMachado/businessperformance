<?php
if ($_GET['acesso']==0) {

	$acesso=$_GET['acesso'];
	$dados_cliente = getDadosCliente($dbh, $_GET['token_cliente']);
	$_SESSION['UsuarioID'] = $dados_cliente['id'];
	$_SESSION['UsuarioNome'] = $dados_cliente['nome'];
	$_SESSION['UsuarioEmail'] = $dados_cliente['email'];
	$_SESSION['UsuarioToken'] = $dados_cliente['token'];
}else{
	$acesso=1;
}

/*// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
$pagina = "restrito";
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
	if($pagina == "restrito" && $acesso=1){
		// Destrói a sessão por segurança
		session_destroy();
		header("Location: login");
	}
	  // Destrói a sessão por segurança
	session_destroy();
}*/
?>