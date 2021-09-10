<?php

//declaramos um vetor
$frutas = [ 
    "Maça", //colocamos manualmente a chave dessa fruta/posição
    "Tomate",
    "Melancia",
    "Morango",
    "Pera",
    "Banana",
    "Laranja",
    "Abacaxi",
    "Kiwi",
    "Pessego"   
];


$frutaAEncontrar = "Tomate";
$encontrei = false;

//faço com que ele rode/percorra todo o array, além de pegar a chave de cada elemento
foreach($frutas as $chave => $fruta){ 

    //Se a variavel fruta for igual a variavel fruta a encontrar...
    if( $fruta == $frutaAEncontrar ){
        //tirar a fruta do array ("desetar" a "fruta" que está na posição "chave")
        unset($frutas[$chave]);
        //imprimir fruta deletada
        echo "Fruta $fruta deletada";
        //dizer a variavel que ela fica true para não fazer o proximo if
        $encontrei = true;
    }
}
if(!$encontrei){
    echo "fruta não encontrada <br>" ;
}

print_r($frutas);
