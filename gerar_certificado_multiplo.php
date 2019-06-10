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

$cliente=$_POST['clientes'];
$assessments=$_POST['assessment'];
$hora=$_POST['cargaHoraria'];
$data='Criciúma, '.$dia.' de '.$mes.' de '.$ano;

$nomeAssessmentSemEspaco = str_replace(' ', '', $assessments);

$numeroClientes=count($cliente);

$arrayFim = implode(",", $cliente);

$arrayFim=str_replace(',', '","', $arrayFim);
$arrayFim='"'.$arrayFim.'"';

$folder="certificado/".$nomeAssessmentSemEspaco;

if (!file_exists($folder)) {
	mkdir($folder, 0777, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/loading.css">
	<style type="text/css">
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
			top: 601px;
			left: 485px;
			max-width: 1120px;
			width: 1112px;
			text-align: center;
			font-size: 44px;
		}
		#cargaHoraria{
			top: 667px;
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
	</head>
<body>
<div style="width: 100vw;height: 100vh;position: absolute;background-color: #2062af;z-index: 1">
	<div class="wrap">
		<div class="loading">
			<div class="bounceball"></div>
			<div class="text" style="font-family: gothamUltra;">Gerando certificados, aguarde...</div>				
		</div>
	</div>
</div>

	<div id="mainDiv" style="width: 1754px;height: 1241px;">
		<img src="img/certificado.png">
		<span id="nomeCliente" class="azul"></span>
		<span id="assessment" class="azul"><?php echo $assessments;?></span>
		<span id="cargaHoraria" class="cinza"><?php echo $hora;?></span>
		<span id="data" class="cinza"><?php echo $data;?></span>
		
	</div>
	<div id="image_id">
<img src="" alt="image" />
</div>

<script>
var arr= [<?php echo $arrayFim; ?>];
var totalArray=arr.length;
var indexArray=arr.indexOf($('#nomeCliente').html());
var contador=0;

function geraImagem(){
	html2canvas(document.querySelector("#mainDiv")).then(canvas => {
			
	    	var imagedata = canvas.toDataURL('image/png');
	    	var nomeCliente = $('#nomeCliente').html();
			var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
			//ajax call to save image inside folder
			$.ajax({
				url: 'salvar_certificado.php',
				data: {
				       imgdata:imgdata,
				       nomeCliente:nomeCliente
					   },
				type: 'post',
				success: function (response) {   
	               //console.log(response);
				  // $('#image_id img').attr('src', response);
				}
			});
	});
}

function verificaIndex(arr,totalArray) {
	indexArray=arr.indexOf($('#nomeCliente').html());
	contador+=1;

	if (arr[indexArray]==$('#nomeCliente').html()) {
		$('#nomeCliente').html(arr[indexArray+1]);
		geraImagem();
	}
	if ($('#nomeCliente').html()=='') {
		$('#nomeCliente').html(arr[0]);
		geraImagem();
	}
	if (contador > totalArray) {
		window.location="compactar-certificados";
	}
}

setInterval("verificaIndex(arr,totalArray)",2000);
</script>
</body>
</html>