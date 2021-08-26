<?php
// O uma função sempre começa com function
//podemos falar o tipo do parametro que queremos

//FUNÇÃO

function calcularMedia(array $turma){

    $soma = 0;

    foreach($turma as $aluno){
        $soma = $soma + $aluno["nota"];
    }
    
    $media = $soma / count($turma);
    
    return $media;
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

    $media = calcularMedia($alunos);
    echo "A média da sala é $media <br><br>";
    
//__________________________________________________________________________________________________________________________________________


//Outra turma

$alunosTurmaB = [
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

$mediaTurmaB = calcularMedia($alunosTurmaB);
    echo "A média da sala é $mediaTurmaB";
    