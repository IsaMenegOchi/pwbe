<?php

//* FUNÇÃO PARA LER O ARQUIVO ARRAY
  //Recebe como parametro o nome do arquivo
  function lerArquivo($nomeArquivo){

    //criamos uma variavel que possui a função de pegar 
    //o conteudo do arquivo recebendo o a variavel do nome do arquivo colocado como paremetro
    $arquivo = file_get_contents($nomeArquivo);

    //criamos outra variavel que possui a função de transformar string (json) em array(php), 
    //sendo colocado como paremetro a variavel que possui o conteudo do arquivo em questão
    $jsonArray = json_decode($arquivo);

    //retornamos a variavel que possui o array
    return $jsonArray;
  }  

//* FUNÇÃO QUE ESCREVE NO ARQUIVO JSON
  function escrevendoJson($nomeArquivo, $arrayFuncionarios){
    $jsonArray = json_encode($arrayFuncionarios);
    $arquivo = file_put_contents($nomeArquivo, $jsonArray);
    return $arquivo;
  } 


//* FUNÇÃO CADASTRAR FUNCIONÁRIO
  //! minha função
  //Recebe como parametro todas as caracteristicas citadas no array de cada funcionario
  // function cadastrarFuncionario($cadastrandoFuncionario, $idFuncionario, $nomeFuncionario, 
  // $sobrenomeFuncionario, $emailFuncionario, $generoFuncionario, $enderecoIpFuncionario, 
  // $paisFuncionario, $departamentoFuncionario){

  //   //cria um array com as mesmas chaves do arquivo dos funcionario
  //   //e recebe como valor as variaveis de parametros da função
  //   $cadastrandoFuncionario [] = [
  //     "id"=> $idFuncionario,
  //     "first_name" => $nomeFuncionario, 
  //     "last_name" => $sobrenomeFuncionario, 
  //     "email" => $emailFuncionario, 
  //     "gender" => $generoFuncionario,
  //     "ip_address" => $enderecoIpFuncionario, 
  //     "country" => $paisFuncionario, 
  //     "department" => $departamentoFuncionario
  //   ];

  //   //retornando o array
  //   return $cadastrandoFuncionario;
  // }

    //!prof
  function adicionarFuncionario($nomeArquivo, $novoFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);
  
    $funcionarios[] = $novoFuncionario;
  
    $json = json_encode($funcionarios);
  
    file_put_contents($nomeArquivo, $json);
  
  }

//* FUNÇÃO PARA BUSCAR FUNCIONÁRIO

  // Recebe como parametro um array dos funcionario e o nome, sobrenome ou departamento
  function buscarFuncionario($listaFuncionario, $caracteristicaFuncionario){
    
    //criamos uma lista para guardar 
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

  //* BUSCAR FUNCIONARIO POR ID
  function buscarFuncionarioPorId ($nomeArquivo, $idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario){
        if ($funcionario->id == $idFuncionario) {

            return $funcionario;
        }
    
    }
    return false;
}

//* EDITAR FUNCIONARIO
  function editarFuncionario($nomeArquivo, $funcionarioEditado){

    $funcionarios = lerArquivo($nomeArquivo);

    //percorre os funcionários e pega o id procurado
    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $funcionarioEditado["id"]){
           $funcionarios[$chave] = $funcionarioEditado;
        }
    }
    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
  }

//* DELETAR FUNCIONÁRIO
  //! Meu
  // function deletandoFuncionario($arrayFuncionarios, $idFuncionario){
    
  //   $funcionarioEncontrado = false;
    
  //   foreach($arrayFuncionarios as $funcionarioSelecionado => $caracteristicaFuncionario){
  //     if($caracteristicaFuncionario["id"] == $idFuncionario){
  
  //       unset($arrayFuncionarios[$funcionarioSelecionado]);
  //       echo "Funcionario com $idFuncionario foi deletado";
  //       $funcionarioEncontrado = true;
  //     }
  //   }
  //   if (!$funcionarioEncontrado){
  //     echo "Funcionario não encontrado";
  //   }
  //   print_r($arrayFuncionarios);
  // }

  //!prof
  function deletarFuncionario($nomeArquivo, $idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    //percorre os funcionários e apaga o id procurado
    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $idFuncionario){
            unset($funcionarios[$chave]);
        }
    }
    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
  }