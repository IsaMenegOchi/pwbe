<?php

$frutas = [
    "Maça",
    "Tomate",
    "Pera",
    "Banana",
    "Laranja",
    "Abacaxi",
    "Melancia",
    "Morango",
    "Kiwi",
    "Pessego",
];


$frutaAEncontrar = "Pera";
$encontrei = false;

//faço com que ele rode/percorra todo o array, além de pegar a chave de cada elemento
foreach($frutas as $chave => $fruta){ 

    //Se a variavel fruta for igual a variavel fruta a encontrar...
    if( $fruta == $frutaAEncontrar){
        //tirar a rfuta do array
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
