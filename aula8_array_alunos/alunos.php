<?php
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

//PROF

    //qual o nome do aluno com chave 4
    // print_r($alunos["4"]["nome"]);

    //soma do aluno 1 e 3
    // echo $alunos["1"]["nota"] + $alunos["3"]["nota"];

//ATIVIDADE
//imprimir na tela a média das notas de todos os alunos

//Meu

    // echo "A média dos alunos é de ".($alunos["1"]["nota"] + $alunos["2"]["nota"] + $alunos["3"]["nota"] + $alunos["4"]["nota"]) / 4 ;

    // echo "A média dos alunos é de ".($alunos["1"]["nota"] + $alunos["2"]["nota"] + $alunos["3"]["nota"] + $alunos["4"]["nota"]) / count($alunos);


//Professor
    $soma = 0;
    $quantidadeAluno = 0;
    $media = 0;

    foreach($alunos as $aluno){
        $soma = $soma + $aluno["nota"];
        $quantidadeAluno++;
    }
    $media = $soma / $quantidadeAluno; // podemos trocar a quantiodade de alunos por count($alunos)

    echo "A média da sala é $media";