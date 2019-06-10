<?php
// Arqui você faz as validações e/ou pega os dados do banco de dados
$arquivoNome = 'Certificados.zip'; // nome do arquivo que será enviado p/ download
$arquivoLocal = 'certificado/PDF/'.$arquivoNome; // caminho absoluto do arquivo

header("Location:".$arquivoLocal);