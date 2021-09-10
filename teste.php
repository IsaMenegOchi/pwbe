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


//-------------------------------------------------------------------
//Deletando funcionario


$funcionario= [
  [
    "id"=> 1,
    "first_name"=> "Elsey",
    "last_name"=> "Paunsford",
    "email" => "epaunsford0@omniture.com",
    "gender"=> "Female",
    "ip_address" => "25.155.35.37",
    "country" => "China",
    "department" => "Marketing",
  ],
  [
    "id"=> 2,
    "first_name"=> "Nigel",
    "last_name"=> "Paice",
    "email"=> "npaice1@jiathis.com",
    "gender"=> "Male",
    "ip_address"=> "61.3.42.4",
    "country"=> "Malaysia",
    "department"=> "Product Management"
  ],
  [
    "id"=> 3,
    "first_name"=> "Gale",
    "last_name"=> "McLagain",
    "email"=> "gmclagain2@google.ru",
    "gender"=> "Female",
    "ip_address"=> "38.83.235.30",
    "country"=> "Portugal",
    "department"=> "Engineering"
  ],
  [
    "id"=> 4,
    "first_name"=> "Bryce",
    "last_name"=> "Farndon",
    "email"=> "bfarndon3@ucsd.edu",
    "gender"=> "Male",
    "ip_address"=> "108.160.196.37",
    "country"=> "Indonesia",
    "department"=> "Product Management"
  ]
];


function deletandoFuncionario ($arrayFuncionarios, $idFuncionario){
    
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

$funcionarios = lerArquivo("testeJ.json");
echo deletandoFuncionario($funcionario, 2);
