<?php

$alunos = [
    "1" => [
        "nome" => "Kelly",
        "idade" => 17,
        "nota" => 100,
    ],
    "2" => [
        "nome" => "Paulo",
        "idade" => 16,
        "nota" => 85,
    ],
    "3" => [
        "nome" => "Gabriel",
        "idade" => 16,
        "nota" => 48,
    ],
    "4" => [
        "nome" => "Gustavo",
        "idade" => 16,
        "nota" => 83,
    ],
    "5" => [
        "nome" => "Bruna",
        "idade" => 16,
        "nota" => 90,
    ],
];


function mostrarStatus (array &$turma){
    foreach ($turma as $chave => $aluno){
        if ($aluno["nota"] >= 50){
            $status = " e você está aprovado";
            $turma[$chave]["situação"] = $status;
        }
        else{
            $status = " e você está reprovado";
            $turma[$chave]["situação"] = $status;
        } 
        echo $aluno["nome"] . " você está com nota " . $aluno["nota"] . $status . "<br><br>" ;
    }
}

mostrarStatus($alunos);

//PROFESSOR

function fecharNotaAluno (array &$turma){
    foreach ($turma as $chave => $aluno){
        if ($aluno["nota"] >= 50){
            $alunos[$chave]["situação"] = "aprovado";
            echo $aluno["nome"] . " você está com nota " . $aluno["nota"] . $aluno["situacao"]. "<br><br>";
        }
        else{
            $alunos[$chave]["situação"] = "reprovado";
            echo $aluno["nome"] . " você está com nota " . $aluno["nota"] . $aluno["situacao"]. "<br><br>";
        } 
    }
}



// mostrarStatus($alunos);
