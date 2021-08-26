<?php

$alunos = [
    "1" => [
        "nome" => "Maria",
        "turma" => "a",
        "nota" => 85,
    ],
    "2" => [
        "nome" => "Artur",
        "turma" => "a",
        "nota" => 82,
    ],
    "3" => [
        "nome" => "Gustavo",
        "turma" => "b",
        "nota" => 80,
    ],
    "4" => [
        "nome" => "Isabela",
        "turma" => "b",
        "nota" => 95,
    ],
];


//Meu

// $alunoAEncontrar = "Artur";
// $turma = "b";
// $adicionarAluno = 0;
// $novaNota = 80;


// foreach($alunos as $chave => $aluno){

//     $adicionarAluno++;

//     if($aluno == $alunoAEncontrar && $aluno == $turma){
//         unset($aluno["nota"]);

      
       
//     }
//     echo $aluno["nota"];
// }



function alterarNotaAluno(array $turma, $nome, $novaNota){
    foreach ($turma as $chave=> $aluno){
        if($aluno["nome"] == $nome){
            $alunos[$chave]["nota"] = $novaNota;
        }

    }
}

alterarNotaAluno($alunos, )


// Esceva uma função que inclua a situa~]ao de todos os alunos
//caso a nota for menor que 50 situação = reprovado
//caso a nota for maior ou igual a 50, situação = aprovado

