<?php


  function lerArquivo($nomeArquivo){
    //criamos uma variavel que possui a função de pegar 
    //o conteudo do arquivo e nome do arquivo colocado como paremetro
    $arquivo = file_get_contents($nomeArquivo);
    //criamos outra variavel que possui a função de transformar 
    //string em array, sendo colocado como paremetro a variavel que possui o conteudo do arquivo em questão
    $jsonArray = json_decode($arquivo);
    //retornamos a variavel que possui o array
    return $jsonArray;
  }  


  function buscarFuncionario($listaFuncionario, $caracteristicaFuncionario){

    $funcionariosPesquisados = [];

    foreach($listaFuncionario as $funcionario){
      if($funcionario->first_name == $caracteristicaFuncionario){
          $funcionariosPesquisados[] = $funcionario;
      }
      else if($funcionario->last_name == $caracteristicaFuncionario){
          $funcionariosPesquisados[] = $funcionario;
      }
      else if($funcionario->department == $caracteristicaFuncionario){
        $funcionariosPesquisados[] = $funcionario;
      }
    }
    return $funcionariosPesquisados;
  }

  function escrevendoJson($nomeArquivo, $arrayFuncionarios){
    $jsonArray = json_encode($arrayFuncionarios);
    $arquivo = file_put_contents($nomeArquivo, $jsonArray);
    return $arquivo;
  } 

  function cadastrarFuncionario($cadastrandoFuncionario, $idFuncionario, $nomeFuncionario, $sobrenomeFuncionario, $emailFuncionario, 
  $generoFuncionario, $enderecoIpFuncionario, $paisFuncionario, $departamentoFuncionario){

    $cadastrandoFuncionario [] = [
      "id"=> $idFuncionario,
      "first_name" => $nomeFuncionario, 
      "last_name" => $sobrenomeFuncionario, 
      "email" => $emailFuncionario, 
      "gender" => $generoFuncionario,
      "ip_address" => $enderecoIpFuncionario, 
      "country" => $paisFuncionario, 
      "department" => $departamentoFuncionario
    ];
    return $cadastrandoFuncionario;
  }

  // function escrevendoJson ($nomeArquivo, $formularioCadastro){
  //   $json_str = json_encode($formularioCadastro);
  //   $fp = fopen($nomeArquivo, "a");
 
  //   // Escreve o conteúdo JSON no arquivo
  //   fwrite($fp, $json_str);
  //   // Fecha o arquivo
  //   fclose($fp);
  // }


  function deletandoFuncionario($arrayFuncionarios, $idFuncionario){
    
    $funcionarioEncontrado = false;
    
    foreach($arrayFuncionarios as $funcionarioSelecionado => $caracteristicaFuncionario){
      if($caracteristicaFuncionario["id"] == $idFuncionario){
  
        unset($arrayFuncionarios[$funcionarioSelecionado]);
        echo "Funcionario com $idFuncionario foi deletado";
        $funcionarioEncontrado = true;
      }
    }
    if (!$funcionarioEncontrado){
      echo "Funcionario não encontrado";
    }
    print_r($arrayFuncionarios);
  }
 


  
?>