<?php 
mb_internal_encoding("iso-8859-1"); 
mb_http_output( "UTF-8" );  
ob_start("mb_output_handler");   
header("Content-Type: text/html; charset=UTF-8",true);
 
date_default_timezone_set('America/Sao_Paulo');
include '../view/resultado.php';
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');
require_once '../_connect/connect_pdo.php';
$dbh = Database::conexao();

/* Carrega a classe DOMPdf */
require_once("../dompdf/dompdf/dompdf_config.inc.php");

switch ($_POST['op']) { 
	case 1:

        $stmt = $dbh->prepare('SELECT COUNT(id) as validaFormulario FROM resposta WHERE token_cliente=:cliente AND token_formulario=:formulario');
        $stmt->bindParam(":cliente", $_POST['tokenCliente'], PDO::PARAM_STR);
        $stmt->bindParam(":formulario", $_POST['tokenForm'], PDO::PARAM_STR);
        $stmt->execute();
        $validacao=$stmt->fetch();

            if ($validacao['validaFormulario']>0) {
                header("location: 500");
            }else{
                //Insert
                //str_replace('pergunta-', '', $_POST['pergunta-'..'']);
                $tokenForm = $_POST['tokenForm'];

                $stmt = $dbh->prepare('SELECT p.id as idPergunta, p.id_tipo_pergunta as tipoPergunta FROM pergunta as p LEFT JOIN categoria_pergunta as c ON c.id=p.id_categoria_pergunta LEFT JOIN formulario as f ON f.id=c.id_formulario WHERE f.token=:token');
                $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
                $stmt->execute();

                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    $idPergunta = $row['idPergunta'];
                    $resposta = $_POST['pergunta-'.$idPergunta.''];

                    if ($row['tipoPergunta']==1) {
                        $textual='';
                        $token_cliente=$_POST['tokenCliente'];
                        $stmt = $dbh->prepare("INSERT INTO resposta(numerica, textual, id_pergunta, token_cliente, token_formulario) VALUES(:numerica, :textual, :id_pergunta, :token_cliente, :token_formulario)");
                        $stmt->bindParam(":numerica", $resposta, PDO::PARAM_INT);
                        $stmt->bindParam(":textual", $textual, PDO::PARAM_STR);
                        $stmt->bindParam(":id_pergunta", $idPergunta, PDO::PARAM_INT);
                        $stmt->bindParam(":token_cliente", $token_cliente, PDO::PARAM_STR);
                        $stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
                        $stmt->execute();
                        
                    }else{
                        $numerica='';
                        $token_cliente=$_POST['tokenCliente'];
                        $stmt = $dbh->prepare("INSERT INTO resposta(numerica, textual, id_pergunta, token_cliente, token_formulario) VALUES(:numerica, :textual, :id_pergunta, :token_cliente, :token_formulario)");
                        $stmt->bindParam(":numerica", $numerica, PDO::PARAM_INT);
                        $stmt->bindParam(":textual", $resposta, PDO::PARAM_STR);
                        $stmt->bindParam(":id_pergunta", $idPergunta, PDO::PARAM_INT);
                        $stmt->bindParam(":token_cliente", $token_cliente, PDO::PARAM_STR);
                        $stmt->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
                        $stmt->execute();
                    }
                }
            }

		
	break;
	
	case 2:

        $tokenForm=$_POST['tokenForm'];
        $tokenCliente=$_POST['tokenCliente'];

        $nomeForm=nomeFormularioPdf($dbh,$tokenForm);
        $nomeCliente=nomeClientePdf($dbh, $tokenCliente);

        // Output the generated PDF to Browser
        //$dompdf->stream('document.pdf');
        $nomeFormSemEspaco=str_replace(" ", "", $nomeForm);
        $nomeClienteSemEspaco=str_replace(" ", "", $nomeCliente);
		
		$folder="../resultados/cliente/".$nomeClienteSemEspaco;

		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

        $grafico1='resultados/cliente/'.$nomeClienteSemEspaco.'/'.$nomeFormSemEspaco.'pdf';
        $nome1='Resultado Gráfico';

            $stmt = $dbh->prepare('SELECT id FROM formulario WHERE token=:token');
            $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
            $stmt->execute();
            $idForm=$stmt->fetch();

            $stmt2 = $dbh->prepare('SELECT id FROM categoria_pergunta WHERE nome=:nome AND id_formulario=:idForm');
            $stmt2->bindParam(":nome", $nome1, PDO::PARAM_STR);
            $stmt2->bindParam(":idForm", $idForm['id'], PDO::PARAM_INT);
            $stmt2->execute();
            $idCategoria1=$stmt2->fetch();

    		$stmt5 = $dbh->prepare("INSERT INTO resultado(id_categoria_pergunta, resultado_textual, token_cliente, token_formulario) VALUES(:id_categoria_pergunta, :resultado_textual, :token_cliente, :token_formulario)");
            $stmt5->bindParam(":id_categoria_pergunta", $idCategoria1['id'], PDO::PARAM_INT);
            $stmt5->bindParam(":resultado_textual", $grafico1, PDO::PARAM_STR);
            $stmt5->bindParam(":token_cliente", $tokenCliente, PDO::PARAM_STR);
            $stmt5->bindParam(":token_formulario", $tokenForm, PDO::PARAM_STR);
            $stmt5->execute();        

            $imgGrafico1=grafico1($dbh,$tokenCliente,$tokenForm,$nomeClienteSemEspaco);
            $imgGrafico2=grafico2($dbh,$tokenCliente,$tokenForm,$nomeClienteSemEspaco);

            $html = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="Lucas César">

                <title>Business Performance</title>

                <!-- Bootstrap core CSS -->
                <link href="../css/bootstrap.min.css" rel="stylesheet">
                <link href="../css/bootstrap-reset.css" rel="stylesheet">

                <!--Animation css-->
                <link href="../css/animate.css" rel="stylesheet">

                <!--Icon-fonts css-->
                <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
                <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

                <!--Morris Chart CSS -->
                <link rel="stylesheet" href="../assets/morris/morris.css">

                <!-- sweet alerts -->
                <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

                <!-- Custom styles for this template -->
                <link href="../css/style.css" rel="stylesheet">
                <link href="../css/helper.css" rel="stylesheet">

                <style>
                    @font-face {
                        font-family: Gotham-Ultra;
                        src: url(../css/fonts/Gotham-Ultra.otf);
                    }
                    @font-face {
                        font-family: Gotham-Medium;
                        src: url(../css/fonts/Gotham-Medium.otf);
                    }
                </style>

                <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
                <!--[if lt IE 9]>
                  <script src="js/html5shiv.js"></script>
                  <script src="js/respond.min.js"></script>
                <![endif]-->
                </head>';

                $html.= '
                <body style="background-color: #FFFFFF;">
                <!--Morris Chart CSS -->   
                        <!--Main Content Start -->       
                            <!-- Page Content Start -->
                            <!-- ================== -->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div>
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <img src="../img/logo_business2.png" style="max-width: 20%;" alt="Logotipo Business Performance">
                                                    </div>
                                                </div>
                                                <hr>                                                                              
                                                <div style="font-family:Gotham-Medium;">
                                                    <div class="text-left" style="font-family:Gotham-Medium;">Cliente: '.$nomeCliente.'
                                                    <div class="text-left" style="font-family:Gotham-Medium;"> Data: '.date('d/m/Y').'</div>
                                                    </div>
                                                    <h4 class="text-center text-primary" style="font-family:Gotham-Medium;">'.$nomeForm.'</h4>
                                                    </div>
                                                    <div class="m-h-50"></div>';
                                                    $html.= '<img src="'.$imgGrafico1.'" height="350px" alt="img">';
                                                    $html.= '<img src="'.$imgGrafico2.'" height="350px" alt="img">';
                                                    $html.='                                                                    
                                                </div>
                                                </div>
                                                <div class="row" style="border-radius: 0px;">
                                                    <div class="panel-body text-center">
                                                        <address class="ng-scope">
                                                            <strong class="text-primary">BUSINESS PERFORMANCE Marcelo dos Santos & Renata Nunes</strong><br>
                                                            Soluções para Máxima Performance de Negócios, Lideranças e Vendas<br>
                                                            Criciúma SC - Rua Princesa Isabel, nº 40 - Sala 602 - Ed Prime Tower - Centro<br>
                                                            Telefones:</abbr> (48) 3521 3836 / 99175 1998 - <a href="http://www.businessperformance.com.br">www.businessperformance.com.br</a> 
                                                        </address>                                                                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </body>
                </html>';

                // instantiate and use the dompdf class
                $dompdf = new Dompdf();

                $dompdf->load_html($html, 'UTF-8');

                // (Optional) Setup the paper size and orientation
                $dompdf->set_paper('A4', 'portrait');

                // Render the HTML as PDF
                $dompdf->render();

                $resultado=$folder."/".$nomeFormSemEspaco.".pdf";

                $pdf = $dompdf->output();
                file_put_contents($resultado, $pdf);

                sendmail($nomeCliente, $nomeForm, $resultado);

	break;
}

function grafico1($dbh,$tokenCliente,$tokenForm,$nomeClienteSemEspaco){
    $resultado = somaGrafico1($dbh,$tokenCliente,$tokenForm);
    $data1y=array($resultado[0]);
    $data2y=array($resultado[1]);
    $data3y=array(100);

    // Create the graph. These two calls are always required
    $graph = new Graph(850,500,'auto');
    $graph->SetScale("textlin");

    $theme_class=new UniversalTheme;
    $graph->SetTheme($theme_class);

    $graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(0,10,20,30,40,50,60,70,80,90,1005));
    $graph->SetBox(false);

    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('FORÇAS: '.$resultado[0].' | RISCOS: '.$resultado[1].''));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);

    // Create the bar plots
    $b1plot = new BarPlot($data1y);
    $b2plot = new BarPlot($data2y);
    $b3plot = new BarPlot($data3y);

    // Create the grouped bar plot
    $gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
    // ...and add it to the graPH
    $graph->Add($gbplot);


    $b1plot->SetColor("white");
    $b1plot->SetFillColor("#0A4378");

    $b2plot->SetColor("white");
    $b2plot->SetFillColor("#F9C23E");

    $b3plot->SetColor("white");
    $b3plot->SetFillColor("white@1");

    $graph->title->Set("FORÇAS E RISCOS ALPHA");

    // Save the graph

    $gdImgHandler = $graph->Stroke(_IMG_HANDLER);
 
    // Stroke image to a file and browser
     
    // Default is PNG so use ".png" as suffix
    $fileName = "../resultados/cliente/".$nomeClienteSemEspaco."/grafico1.png";
    $graph->img->Stream($fileName);
     
    // Send it back to browser
    $graph->img->Headers();
    $graph->img->Stream();

    return $fileName;
}

// Lista todos os Formulários
function somaGrafico1($dbh,$tokenCliente,$tokenForm){

    $soma1=0;
    $soma2=0;

    $stmt = $dbh->prepare('SELECT id FROM formulario WHERE token=:token LIMIT 1');
    $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
    $stmt->execute();
    $formulario=$stmt->fetch();

    $stmt2 = $dbh->prepare('SELECT id FROM categoria_pergunta WHERE id_formulario=:id_formulario ORDER BY id ASC LIMIT 1');
    $stmt2->bindParam(":id_formulario", $formulario['id'], PDO::PARAM_STR);
    $stmt2->execute();

    foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $categorias) {

        $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id LIMIT 10');
        $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
        $stmt3->execute();

        foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
            $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
            $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
            $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
            $stmt4->execute();
            $valor1=$stmt4->fetch();

            $soma1+=intval($valor1['numerica']);
        }

        $stmt5 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id DESC LIMIT 10');
        $stmt5->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
        $stmt5->execute();

        foreach ($stmt5->fetchAll(PDO::FETCH_ASSOC) as $row2) {
            $stmt6 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
            $stmt6->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
            $stmt6->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
            $stmt6->bindParam(":idPergunta", $row2['id'], PDO::PARAM_INT);
            $stmt6->execute();
            $valor2=$stmt6->fetch();

            $soma2+=intval($valor2['numerica']);
        }
    }

    $resultado=array($soma1, $soma2);
    return $resultado;
    
}

function grafico2($dbh,$tokenCliente,$tokenForm,$nomeClienteSemEspaco){

    $resultado = somaGrafico2($dbh,$tokenCliente,$tokenForm);
    $data1y=array($resultado['a'],$resultado['c'],$resultado['e'],$resultado['g']);
    $data2y=array($resultado['b'],$resultado['d'],$resultado['f'],$resultado['h']);
    $data3y=array(100);

    // Create the graph. These two calls are always required
    $graph = new Graph(850,500,'auto');
    $graph->SetScale("textlin");

    $theme_class=new UniversalTheme;
    $graph->SetTheme($theme_class);

    $graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(0,10,20,30,40,50,60,70,80,90,1005));
    $graph->SetBox(false);

    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('Coman. = F: '.$resultado['a'].' | R: '.$resultado['b'].'','Visio. = F: '.$resultado['c'].' | R: '.$resultado['d'].'','Estra. = F: '.$resultado['e'].' | R: '.$resultado['f'].'','Executor. = F: '.$resultado['g'].' | R: '.$resultado['h'].'',));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);

    // Create the bar plots
    $b1plot = new BarPlot($data1y);
    $b2plot = new BarPlot($data2y);
    $b3plot = new BarPlot($data3y);

    // Create the grouped bar plot
    $gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
    // ...and add it to the graPH
    $graph->Add($gbplot);


    $b1plot->SetColor("white");
    $b1plot->SetFillColor("#0A4378");

    $b2plot->SetColor("white");
    $b2plot->SetFillColor("#F9C23E");

    $b3plot->SetColor("white");
    $b3plot->SetFillColor("white@1");

    $graph->title->Set("ESTILOS DE LIDERANÇA");

    // Display the graph
    // Save the graph

    $gdImgHandler = $graph->Stroke(_IMG_HANDLER);
 
    // Stroke image to a file and browser
     
    // Default is PNG so use ".png" as suffix
    $fileName = "../resultados/cliente/".$nomeClienteSemEspaco."/grafico2.png";
    $graph->img->Stream($fileName);
     
    // Send it back to browser
    $graph->img->Headers();
    $graph->img->Stream();

    return $fileName;
}

// Lista todos os Formulários
function somaGrafico2($dbh,$tokenCliente,$tokenForm){

    $soma1=0;$soma2=0;$soma3=0;$soma4=0;$soma5=0;$soma6=0;$soma7=0;$soma8=0;

    $stmt = $dbh->prepare('SELECT id FROM formulario WHERE token=:token LIMIT 1');
    $stmt->bindParam(":token", $tokenForm, PDO::PARAM_STR);
    $stmt->execute();
    $formulario=$stmt->fetch();

    $stmt2 = $dbh->prepare('SELECT id, nome FROM categoria_pergunta WHERE id_formulario=:id_formulario AND nome LIKE "Questionário%"');
    $stmt2->bindParam(":id_formulario", $formulario['id'], PDO::PARAM_STR);
    $stmt2->execute();

    foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $categorias) {

        switch ($categorias['nome']) {
            case 'Questionário A':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma1+=intval($valor['numerica']);
                }
                $soma1Total=($soma1*100)/60;
                break;

            case 'Questionário B':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma2+=intval($valor['numerica']);
                }
                $soma2Total=($soma2*100)/60;
                break;

            case 'Questionário C':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma3+=intval($valor['numerica']);
                }
                $soma3Total=($soma3*100)/60;
                break;

            case 'Questionário D':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma4+=intval($valor['numerica']);
                }
                $soma4Total=($soma4*100)/60;
                break;

            case 'Questionário E':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma5+=intval($valor['numerica']);
                }
                $soma5Total=($soma5*100)/60;
                break;

            case 'Questionário F':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma6+=intval($valor['numerica']);
                }
                $soma6Total=($soma6*100)/60;
                break;

            case 'Questionário G':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma7+=intval($valor['numerica']);
                }
                $soma7Total=($soma7*100)/60;
                break;

            case 'Questionário H':
                $stmt3 = $dbh->prepare('SELECT id FROM pergunta WHERE id_categoria_pergunta=:idCategoria ORDER BY id');
                $stmt3->bindParam(":idCategoria", $categorias['id'], PDO::PARAM_INT);
                $stmt3->execute();

                foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {

                    $stmt4 = $dbh->prepare('SELECT numerica FROM resposta WHERE token_cliente=:tokenCliente AND token_formulario=:tokenForm AND id_pergunta=:idPergunta');
                    $stmt4->bindParam(":tokenCliente", $tokenCliente, PDO::PARAM_STR);
                    $stmt4->bindParam(":tokenForm", $tokenForm, PDO::PARAM_STR);
                    $stmt4->bindParam(":idPergunta", $row['id'], PDO::PARAM_INT);
                    $stmt4->execute();
                    $valor=$stmt4->fetch();

                    $soma8+=intval($valor['numerica']);
                }
                $soma8Total=($soma8*100)/60;
                break;
        }              
    }

    $resultado=array("a"=>$soma1Total, "b"=>$soma2Total, "c"=>$soma3Total, "d"=>$soma4Total, "e"=>$soma5Total, "f"=>$soma6Total, "g"=>$soma7Total, "h"=>$soma8Total);
    return $resultado;
    
}

function sendmail($nomeCliente, $nomeForm, $resultado){

    $emailsender = "contato@businessperformance.net.br";
    //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
    // você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
     
    // Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar 
    if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
    elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
    else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
     
    // Passando os dados obtidos pelo formulário para as variáveis abaixo
    $nomeremetente     = 'Business Performance';
    $emailremetente    = 'contato@businessperformance.net.br';
    $emaildestinatario = trim('renata.nunes@businessperformance.com.br');
    $comcopia          = trim('');
    $comcopiaoculta    = trim('');
    $assunto           = 'Resultado formulário - '.$nomeForm.'';

    $nomeFormSemEspaco=str_replace(" ", "", $nomeForm);
    $nomeClienteSemEspaco=str_replace(" ", "", $nomeCliente);

     
    // Montando a mensagem a ser enviada no corpo do e-mail.
    $mensagemHTML = '<P>Segue em anexo o resultado do cliente <b>'.$nomeCliente.'</b> para o formulário <b>'.$nomeForm.'</b>.</P></br>
    <P><a href="www.businessperformance.net.br/resultados/cliente/'.$nomeClienteSemEspaco.'/'.$nomeFormSemEspaco.'.pdf" style="padding: 10px 40px; background-color: #0D4E6C; border-radius: 4px; text-decoration: none; color: #FFFFFF;" target="_blank">ACESSAR RESULTADO</a></P></br>
    <hr>';
     
     
    // Montando o cabeçalho da mensagem
    $headers = "MIME-Version: 1.1".$quebra_linha;
    $headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
    // Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
    $headers .= "From: ".$emailsender.$quebra_linha;
    $headers .= "Return-Path: " . $emailsender . $quebra_linha;
    // Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
    // Se não houver um valor, o item não deverá ser especificado.
    if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
    if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
    $headers .= "Reply-To: ".$emailremetente.$quebra_linha;
    // Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
     
    // Enviando a mensagem
    mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

    /* Mostrando na tela as informações enviadas por e-mail
    echo "Mensagem <b>$assunto</b> enviada com sucesso!<br><br>
    De: $emailsender<br>
    Para: $emaildestinatario<br>
    Com c&oacute;pia: $comcopia<br>
    Com c&oacute;pia Oculta: $comcopiaoculta<br>
    <p><a href='".$_SERVER["HTTP_REFERER"]."'>Voltar</a></p>";*/

}

?>

<!DOCTYPE html>
<html lang="en" style="overflow: hidden!important;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Lucas César">

<title>Business Performance</title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-reset.css" rel="stylesheet">

<!--Animation css-->
<link href="../css/animate.css" rel="stylesheet">

<!--Icon-fonts css-->
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

<!--Morris Chart CSS -->
<link rel="stylesheet" href="../assets/morris/morris.css">

<!-- sweet alerts -->
<link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

<!--Morris Chart CSS -->
<link rel="stylesheet" href="../assets/morris/morris.css">

<!-- Custom styles for this template -->
<link href="../css/style.css" rel="stylesheet">
<link href="../css/helper.css" rel="stylesheet">

<style>
	@font-face {
	    font-family: Gotham-Ultra;
	    src: url(../css/fonts/Gotham-Ultra.otf);
	}
	@font-face {
	    font-family: Gotham-Medium;
	    src: url(../css/fonts/Gotham-Medium.otf);
	}
</style>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-color: #FFFFFF;" class="col-lg-6">
<!--Morris Chart CSS -->   
        <!--Main Content Start -->       
            <!-- Page Content Start -->
            <!-- ================== -->
        <div style="background:url(img/spin.gif) no-repeat center center;width:32px;height:32px;width: 100vw;height: 100vh;z-index: 10000;position: relative;"></div>
        <div id="graficos">
                	<!-- BAR Chart -->
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="portlet"><!-- /primary heading -->
	                            <div class="portlet-heading">
	                                <h3 class="portlet-title text-dark">
	                                    FORÇAS E RISCOS ALPHA
	                                </h3>
	                                <div class="portlet-widgets">
	                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
	                                    <span class="divider"></span>
	                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
	                                    <span class="divider"></span>
	                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div id="bg-default" class="panel-collapse collapse in">
	                                <div class="portlet-body">
	                                    <div id="forca-risco" style="height: 300px;"></div>
	                                </div>
	                            </div>
	                        </div> <!-- /Portlet -->
	                    </div> <!-- col -->
	                </div> <!-- End row-->		                                            
        	<div class="row">
                	<!-- BAR Chart -->
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="portlet"><!-- /primary heading -->
	                            <div class="portlet-heading">
	                                <h3 class="portlet-title text-dark">
	                                    ESTILOS DE LIDERANÇA
	                                </h3>
	                                <div class="portlet-widgets">
	                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
	                                    <span class="divider"></span>
	                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
	                                    <span class="divider"></span>
	                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>
	                            <div id="bg-default" class="panel-collapse collapse in">
	                                <div class="portlet-body">
	                                    <div id="estilo-lideranca" style="height: 300px;"></div>
	                                </div>
	                            </div>
	                        </div> <!-- /Portlet -->
	                    </div> <!-- col -->
	                </div> <!-- End row-->                                           
        	</div>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="../js/jquery.js"></script> 
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/pace.min.js"></script>
        <script src="../js/modernizr.min.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="../js/jquery.app.js"></script>

        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>

        <!--Morris Chart-->
        <script type="text/javascript">
		
		<?php
		$nomeForm=nomeFormularioPdf($dbh,$_POST['tokenForm']);
		$FormSemEspaco=str_replace(" ", "", $nomeForm);		
		$nomeCliente=nomeClientePdf($dbh, $_POST['tokenCliente']);
		$nomeSemEspacao=str_replace(" ", "", $nomeCliente);
		?>

        $.post("../controller/form_assessmentlideranca.php", {'tokenForm':'<?php echo $_POST['tokenForm'] ?>', 'tokenCliente':'<?php echo $_POST['tokenCliente'] ?>', 'op':2}, function(data)
        {
            swal({   
                title: 'Sucesso',
                text: "Formulário enviado com sucesso! Em breve entraremos em contato com você. ",
                type: 'success',   
                showCancelButton: false,   
                confirmButtonText: "Atualizar",   
                closeOnConfirm: true 
            }, function(){   
                window.location.href="http://www.businessperformance.net.br/resultados/cliente/<?php echo $nomeSemEspacao;?>/<?php echo $FormSemEspaco;?>.pdf";
            });                            
        });

        </script>
    </body>
</html>