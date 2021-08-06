<?php

if(isset($_POST["nome"]) && isset($_POST["nota1"]) 
&& isset($_POST["nota2"]) && isset($_POST["nota3"])){
    
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];

    $media = ($nota1 + $nota2 + $nota3) / 3;
    ;

    if ($media <4){
        echo "<style> 
        body{
        background-color: #ff9a9ae7;
        color: red;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 100px
        }
        </style>
        $nome está reprovado(a) <br> Sua nota é".number_format($media,2);
    }

    else if ($media >6){
        echo "<style> 
        body{
        background-color: #a9ff9ae7;
        color: green;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 100px
        }
        </style>
        $nome está aprovado(a)<br> Sua nota é ".number_format($media,2); 
    }

    else{
        echo "<style> 
        body{
        background-color: #fff89a;
        color: #e6d600;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 100px
        }
        </style>
        $nome está de recuperação <br> Sua nota é".number_format($media,2);
    }
}
else{
    echo "Você não preencheu todos os campos corretamente";
}
