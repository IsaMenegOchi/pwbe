<?php

  function cadastrarFuncionario($idFuncionario, $nomeFuncionario, $sobrenomeFuncionario, $emailFuncionario, 
  $generoFuncionario, $enderecoIpFuncionario, $paisFuncionario, $departamentoFuncionario){

    $cadastrandoFuncionario = [
      "id"=> $idFuncionario,
      "first_name" => $nomeFuncionario, 
      "last_name" => $sobrenomeFuncionario, 
      "email" => $emailFuncionario, 
      "gender" => $generoFuncionario,
      "ip_address" =>$enderecoIpFuncionario, 
      "country" => $paisFuncionario, 
      "department" => $departamentoFuncionario
    ];

    return $cadastrandoFuncionario;
  }

  $listaFuncionario = cadastrarFuncionario("30", "isabelle", "menegon", "isabelle@gmail", "female", "1354756867976", "Brazil", "marketing");


  // function escrevendoJson ($nomeArquivo, $formularioCadastro){
  //   $json_str = json_encode($formularioCadastro);
  //   $fp = fopen($nomeArquivo, "a");
 
  //   // Escreve o conteúdo JSON no arquivo
  //   fwrite($fp, $json_str);
  //   // Fecha o arquivo
  //   fclose($fp);
  // }

  function escreverArquivo($nomeArquivo, $arrayFuncionarios){
    $jsonArray = json_encode($arrayFuncionarios);
    $arquivo = file_put_contents($nomeArquivo, $jsonArray);
    return $arquivo;
  } 

echo escreverArquivo("testeJ.json", $listaFuncionario);
