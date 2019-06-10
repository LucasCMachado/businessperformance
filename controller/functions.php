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