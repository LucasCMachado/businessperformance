<?php
require_once 'dompdf_0-8-2/dompdf/lib/html5lib/Parser.php';
require_once 'dompdf_0-8-2/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf_0-8-2/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf_0-8-2/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		@font-face {
		    font-family: gothamUltra;
		    src: url(fonts/Gotham-Ultra.otf);
		}
		</style>

	<link rel="stylesheet" href="css/loading.css">
</head>
<body style="margin:0!important;">
	<div style="width: 100vw;height: 100vh;position: absolute;background-color: #2062af;z-index: 1">
		<div class="wrap">
			<div class="loading">
				<div class="bounceball"></div>
				<div class="text" style="font-family: gothamUltra;">Gerando PDFs, aguarde...</div>				
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
	function finaliza_download() {
		$(".text").html("Compactação finalizada!");
		window.open("baixar-certificados");
	}

	setTimeout(finaliza_download(), 3000);
</script>
</script>
</body>
</html>';

$files = 'certificado/PDF/';
$imagens = glob('certificado/PDF/' . "*.png");
use Dompdf\Dompdf;

// fazer echo de cada imagem
foreach($imagens as $imagem){

// reference the Dompdf namespace
$html='<img src="'.$imagem.'" />';
$nomeImagem=str_replace('certificado/PDF/', '', $imagem);
$nomeImagemSemExtensao=str_replace('.png', '', $nomeImagem);
$nomeImagemSemEspaco=str_replace(' ', '', $nomeImagemSemExtensao);

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html, 'UTF-8');

// (Optional) Setup the paper size and orientation
$dompdf->set_paper(array(0, 0, 1000, 1400), 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$resultado=$files."/".$nomeImagemSemEspaco.".pdf";

$pdf = $dompdf->output();
file_put_contents($resultado, $pdf);

unlink($imagem);

}

// diretório que será compactado

ob_start();

// Criando o objeto
$z = new ZipArchive();

// Criando o pacote chamado "teste.zip"
$criou = $z->open('certificado/PDF/Certificados.zip', ZipArchive::CREATE);
if ($criou === true) {

$dir = "certificado/PDF";
$d = opendir($dir);
$i = 0;

$nome = readdir($d);

while( $nome != false ){
	if( !is_dir($nome) and ($nome != 'Certificados.zip') ){
		$arquivos[$i] = $nome;
                $i++;
	}
	$nome = readdir($d);
}
sort($arquivos);

foreach($arquivos as $arq){
	$z->addFile(  $dir."/".$arq, $arq );
}
   // Salvando o arquivo
   $z->close();
}
?>