<?php  



function lerArquivo($nomeArquivo){
    //le o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);
   
    //tranforma a string em array
    $jsonArray = json_decode($arquivo);
   
    //devolve o array
    return $jsonArray;
}


//buca o aluno dentro da lista e devolve uma lista coms os alunos encontrados


function buscarAluno ($alunos, $nome){
    
    //delcara um vetor vazio
    $alunosFiltro =[];

    //declara vetor alunos como variavel aluno
    foreach($alunos as $aluno){
        //se a variavel aluno com o objeto nome for iguala ao nome digitado 
        if($aluno->nome == $nome){
            //
            $alunosFiltro[] = $aluno;
        }
    }
    return $alunosFiltro;
}



?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    
</body>
</html>