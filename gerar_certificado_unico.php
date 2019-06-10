<?php
$dia=substr($_POST['data'], 0, -8);
$numeroMes=substr($_POST['data'], 3, -5);
$ano=substr($_POST['data'], -4);
$mes='';

switch ($numeroMes) {
	case '1':
		$mes='Janeiro';
		break;
	case '2':
		$mes='Fevereiro';
		break;
	case '3':
		$mes='Março';
		break;
	case '4':
		$mes='Abril';
		break;
	case '5':
		$mes='Maio';
		break;
	case '6':
		$mes='Junho';
		break;
	case '7':
		$mes='Julho';
		break;
	case '8':
		$mes='Agosto';
		break;
	case '9':
		$mes='Setembro';
		break;
	case '10':
		$mes='Outubro';
		break;
	case '11':
		$mes='Novembro';
		break;
	case '12':
		$mes='Dezembro';
		break;
}

$cliente=$_POST['nomeCliente'];
$assessments=$_POST['assessment'];
$hora=$_POST['cargaHoraria'];
$data='Criciúma, '.$dia.' de '.$mes.' de '.$ano;

$nomeClienteSemEspaco = str_replace(' ', '', $_POST['nomeCliente']);
$nomeFormSemEspaco = str_replace(' ', '', $_POST['assessment']);

$arquivo=$nomeClienteSemEspaco.'-'.$nomeFormSemEspaco;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/loading.css">
<style type="text/css">

/*Certificado*/
@font-face {
    font-family: gothamUltra;
    src: url(fonts/Gotham-Ultra.otf);
}

@font-face {
    font-family: gothamBold;
    src: url(fonts/Gotham-Bold.otf);
}
span{
	position: absolute;
}
.azul{
	font-family: "gothamUltra";
    text-transform: uppercase;
    color: #315CA1;
}
.cinza{
	font-family: "gothamBold";		    
    color: #424343;
}
#nomeCliente{
	top: 444px;
	left: 485px;
	max-width: 1120px;
	width: 1112px;
	text-align: center;
	font-size: 53px;
}
#assessment{
	top: 590px;
	left: 485px;
	max-width: 1120px;
	width: 1112px;
	text-align: center;
	font-size: 44px;
}
#cargaHoraria{
	top: 659px;
	left: 1188px;
	max-width: 250px;
	width: 250px;
	text-align: left;
	font-size: 39px;
}
#data{
	top: 720px;
	left: 615px;
	max-width: 810px;
	width: 810px;
	text-align: center;
	font-size: 39px;
}
	</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script>
<script src="html2canvas/dist/html2canvas.js"></script>

<div style="width: 100vw;height: 100vh;position: absolute;background-color: #2062af;z-index: 1">
<div class="wrap">
	<div class="loading">
		<div class="bounceball"></div>
		<div class="text" style="font-family: gothamUltra;">Gerando certificado</div>				
	</div>
</div>
</div>


	<div id="capture" style="width: 1754px;height: 1241px;">
		<img src="img/certificado.png">
		<span id="nomeCliente" class="azul"><?php echo $cliente;?></span>
		<span id="assessment" class="azul"><?php echo $assessments;?></span>
		<span id="cargaHoraria" class="cinza"><?php echo $hora;?> Horas</span>
		<span id="data" class="cinza"><?php echo $data;?></span>		
	</div>
	

<script type="text/javascript">
$(document).ready(function() {
	var doc = new jsPDF('landscape', 'pt', 'a4');
  	doc.addHTML($('#capture'), function() {
    doc.save("<?php echo $arquivo ?>.pdf");

    $('.bounceball').detach();
    $('.text').html('Certificado Gerado!');
  });
});
</script>
</body>
</html>