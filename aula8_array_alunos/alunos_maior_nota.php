<?php

// function calcularMaiorNota(array $turma){

//     $notaMaior = 0;
//     $notaN = 0;
//     $quantidadeAluno = 0;

//     foreach ($turma as $aluno){

//         $notaN = $aluno["nota"];
//         $quantidadeAluno++;
//     }
// }



//PROFESSOR

// function alunoComMaiorNota (array $turma){

//     $melhorAluno = null;

//     foreach ($turma as $aluno){
//         if ($melhorAluno == null){
//             $melhorAluno = $aluno;
//         }

//         else if ($aluno["nota"] > $melhorAluno["nota"]){
//             $melhorAluno = $aluno;
//         }

//     }
    
//     return $melhorAluno;
// }

function alunoComMaiorNota2 (array $turma){

    $melhoresAlunos = [
        null,
    ];

    $melhorAluno = null;

    foreach ($turma as $aluno){
        if ($melhorAluno == null){
            $melhorAluno = $aluno;
        }

        else if ($aluno["nota"] > $melhorAluno["nota"]){
            $melhorAluno = $aluno;
            array_push($melhoresAlunos, $melhorAluno);
        }
    }
    
    return $melhoresAlunos;
}


//______________________________________________________________________________________________________________________________________________________

$alunos = [
"1" => [
    "nome" => "Maria",
    "idade" => 16,
    "nota" => 85,
],
"2" => [
    "nome" => "Artur",
    "idade" => 16,
    "nota" => 82,
],
"3" => [
    "nome" => "Gustavo",
    "idade" => 16,
    "nota" => 80,
],
"4" => [
    "nome" => "Isabela",
    "idade" => 17,
    "nota" => 95,
],
];

$melhorAluno = alunoComMaiorNota2($alunos);
echo "The melhor estudante é " . $melhorAluno['nome'] . " com a nota " . $melhorAluno['nota'] . ".";
echo "<br>";

//__________________________________________________________________________________________________________________________________________


//Outra turma

$alunosTurmaB = [
    "0" => [
        "nome" => "Dona",
        "idade" => 17,
        "nota" => 100,
    ],
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
        "nota" => 82,
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


$melhorAluno = alunoComMaiorNota2($alunosTurmaB);
echo "The melhor estudante da turma b é " . $melhorAluno['nome'] . " com a nota " . $melhorAluno['nota'] . ".";
echo "<br>";

//________________________________________________________________________________________________________________________________________________________________

