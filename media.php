<?php            
    /*
     * 
     * Função para gerar dados estatísticos básicos:
     * 
     * => Média
     * => 1°Quartil
     * => Mediana
     * => 3°Quartil
     * 
     * Passar o array e o tipo de cálculo
     * 
     */
    function estatistica($ary,$operacao,$tipo,$formato){
        
        // $operacao
            
            // 1 = media
            // 2 = mediana
            // 3 = 1° quartil
            // 4 = 3° quartil
        
    
        // $tipo
            
            // 1 = 'auto'   = Verifica automaticamento qual opção se encaixa (usar quando não se sabe o numero total de indices da matriz)
            // 2 = 'normal' = SE o elemento central é 1 elemento (resto da divisao = 1)
            // 3 = 'duplo'  = SE o elemento central são 2 elementos (resto da divisao = 0)
        
    
        // $formato
            
            // Opção da quantidade da casas decimais no resultado
            
    
    
        // Ordena os valores do array
        sort($ary);
        
        // Total de indices do array 
        $arySize = sizeof($ary); 
        
        // Soma os elementos do array
        $arySoma = array_sum($ary); 
        
        // Média aritmética
        $media = ($arySoma / $arySize);
        
        
        
        //     MEDIANA (elemento central da matriz)
        //  Nesse ponto trabalhamos com as chaves da matriz e não com os valores
        //  Depois de achada a chave central ai sim é retornado o valor para o $resultado
        switch($tipo){
            case 1: // 1 = AUTO(verifica se o numero de indices da matriz é par ou ímpar)
                if($arySize % 2 == 1){
                    $central = $arySize / 2; // como entrou aqui é porque é ímpar, divide o numero total / 2
                    $central = $central - 0.5; // como os indices da matriz só podem ser decimais(inteiros), e o resultado nesse caso será um float, retira-se 0.5 
                    $mediana = $ary[$central]; // passa o valor da matriz contido no indice central
                }
                else {
                    $central = $arySize / 2; // nesse caso o total de indices da matriz é par
                    $x1 = $central--; // pega um indice abaixo do indice central
                    $x2 = $central++; // pega um indice acima do indice central
                    $mediana = ($ary[$x1] + $ary[$x2]) / 2; // soma o VALOR contido em cada indice e divide / 2
                }
                break;
            // Os cálculos abaixo são iguais aos realizados acima porém permitindo a escolha do TIPO que se deseja 
            // 2 = NORMAL(para matrizes com total de indices ímpar)    
            case 2: 
                $central = $arySize / 2;
                $central = $central - 0.5;
                $mediana = $ary[$central];
                break;
            // 3 = DUPLO(para matrizes com total de indices par)    
            case 3:
                $central = $arySize / 2;
                $x1 = $central--;
                $x2 = $central++;
                $mediana = ($ary[$x1] + $ary[$x2]) / 2;
                break;
                
        }
        
        
        // 1° QUARTIL (elemento central está entre o INICIO e o MEIO da matriz)
        // usa-se o mesmo princípio de cálculo da mediana
        switch($tipo){
            case 1:
                if($central % 2 == 1){
                    $q1Central = $central / 2;
                    $q1Central = $q1Central - 0.5;
                    $q1 = $ary[$q1Central];
                }
                else {
                    $q1Central = $central / 2;
                    $x1 = $q1Central--;
                    $x2 = $q1Central++;
                    $q1 = ($ary[$x1] + $ary[$x2]) / 2;
                }
                break;
                
            case 2:
                $q1Central = $central / 2;
                $q1Central = $q1Central - 0.5;
                $q1 = $ary[$q1Central];
                break;
            
            case 3:
                $q1Central = $central / 2;
                $x1 = $q1Central--;
                $x2 = $q1Central++;
                $q1 = ($ary[$x1] + $ary[$x2]) / 2;
                break;
        }
    
        
        // 3° QUARTIL (elemento central entre o MEIO e o FINAL da matriz)
        // usa-se o mesmo princípio de cálculo da mediana
        switch($tipo){
            case 1;
                if($central % 2 == 1){
                    $q3Size = $central / 2;
                    $q3Central = $arySize - $q3Size;
                    $q3Central = ($q3Central+1) - 0.5;
                    $q3 = $ary[$q3Central];
                }
                else {
                    $q3Size = $central / 2;
                    $q3Central = $arySize - $q3Size;
                    $x1 = $q3Central--;
                    $x2 = $q3Central++;
                    $q3 = ($ary[$x1] + $ary[$x2]) / 2;
                }
                break;

            case 2:
                $q3Size = $central / 2;
                $q3Central = $arySize - $q3Size;
                $q3Central = ($q3Central+1) - 0.5;
                $q3 = $ary[$q3Central];
                break;
                
            case 3:
                $q3Size = $central / 2;
                $q3Central = $arySize - $q3Size;
                $x1 = $q3Central--;
                $x2 = $q3Central++;
                $q3 = ($ary[$x1] + $ary[$x2]) / 2;
                break;
        }
        
        // RESULTADOS
        // Retorna o resultado de acordo com tipo passado para função
        switch($operacao){
            
            case 1:
                $resultado = number_format($media,$formato);
                break;
            
            case 2:
                $resultado = number_format($mediana,$formato);
                break;
                
            case 3:
                $resultado = number_format($q1,$formato);
                break;
                
            case 4:
                $resultado = number_format($q3,$formato);
                break;
            
        }
        return $resultado;
    }
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; ISO-8859-1' />
<title>Sem Título</title>
<style type="text/css">
    body{
        font-family:Arial;
        font-size:16px;
        margin:50px;
        color:#555;
    }
    .colorNum {
        color:#ff0000;
    }
    table td {
        padding:3px 5px 3px 5px;
        margin:2px;
        text-align:center;
        background:#f1f1f1;
    }
</style>
</head>
<body>
    <?php 
        // Arrays
        
        $meses = array('Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');
        
        // Exemplos para teste
        
        $ary = array(1.25,0.70,0.95,0.60,1.10,0.85,0.40,0.95,1.15,1.20,0.90,0.75);
        //$ary = array(12,5,8,2,1,3,4,7,10,11,6,9);
        //$ary = array(652,854,221,983,121,45,785,436,874,965,178,36);        
    ?>
    
    <table>
        <tr>
            <td style='background:transparent'></td>
            <?php 
            foreach($meses as $value){
                echo "<td>$value</td>";
            }
            ?>
            <td><b>1° Quartil</b></td>
            <td><b>Mediana</b></td>
            <td><b>3° Quartil</b></td>
            <td><b>Média</b></td>
        </tr>
        <tr>
            <td style='background:#cccc99'><b>Indicador A</b></td>
            <?php 
            foreach($ary as $value){
                echo "<td>$value</td>";
            }
            ?>
            <td><b><?php echo estatistica($ary,3,2,3);?></b></td>
            <td><b><?php echo estatistica($ary,2,1,3);?></b></td>
            <td><b><?php echo estatistica($ary,4,2,3);?></b></td>
            <td><b><?php echo estatistica($ary,1,1,3);?></b></td>
        </tr>
    </table>
    

    <h4>
    <small style='color:#777'>Lista ordenada para cálculo da mediana</small><br />
    <?php
        sort($ary); // Ordena Array (como exemplo, aqui não interfere na função)
        foreach($ary as $value){    
            echo "<span style='color:#ccc'>(</span> $value <span style='color:#ccc'>)</span>";
        }
    ?>
    </h4>

    <?php 
    $data_inicio = new DateTime("2016-07-10");
    $data_fim = new DateTime("2017-07-09");

    // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);
    echo $dateInterval->days;

    //365
 ?>
</body>
</html>