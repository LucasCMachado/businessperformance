<?php
$folder='resultados/cliente/'.$_POST['cliente'].'/';

if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}

$origem = 'img/'.$_POST['img'].'.png';
$destino = 'resultados/cliente/'.$_POST['cliente'].'/'.$_POST['img'].'.png';
copy($origem, $destino);
unlink($origem);

echo $folder.$_POST['img'].'.png';

?>