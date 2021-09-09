<?php

$formularioCadastro = [
    "nome" => "Isabelle",
    "sobrenome" => "Menegon",
    "idade" => "16"
];

function escrevendoJson ($formularioCadastro){
    $arquivo = 'testeJ.json';
    $json_str = json_encode($formularioCadastro);
    $fp = fopen($arquivo, "a");
 
    // Escreve o conteúdo JSON no arquivo
    fwrite($fp, $json_str);
    // Fecha o arquivo
    fclose($fp);
  }
echo escrevendoJson($formularioCadastro);