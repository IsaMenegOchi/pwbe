<?php
$linguagempreferida = "JavaScript";
$sabePOO = true;

//estrutura condicional if
if($linguagempreferida == "java" && $sabePOO == true) 
{
    echo "Você é javeiro, prof celso gostou disso";
}
else{
    echo "você não é javeiro";
}

echo "<br><br>";

$opcao = 2;
//estrutura swich - tipo uma escolha (funciona como looping)
switch($opcao){
    case 1: 
        echo "você escolheu a opção 1"; 
        break;
    case 2: 
        echo "você escolheu a opção 2";
        break;
    case 3: 
        echo "você escolheu a opção 3";
        break;
    default: 
        echo "você não escolheu nenhuma das opções validas";
        break;
}

echo "<br><br>";

$salarioEstagiario = 1500;
$salarioJunior = 2200;
$salarioPleno = 4500;
$salarioSenior = 10000;

$mediaSalarial = ($salarioEstagiario + $salarioJunior + $salarioSenior + $salarioPleno) / 4;
echo "A média salarial é: $mediaSalarial";


//se colocarmos cifrão ($) no meio da String, é indentificavel atomaticamente que é necessaruio concatenar
//sqrt = raiz quadrada

/*  OPERADORES LÓGICOS
== igual
!== diferente
> maior que
< menor que
>= maior que ou igual
<= menor que ou igual
! negação
&& (and) e
|| (or) ou

*/

//ESTRUTURAS DE REPETIÇÕES

echo "<br><br>";

$cont = 0;

while ($cont < 5){
    echo " O cont é: $cont";
    echo "<br>";
    $cont++; //  estrutura de incremento - sempre executado no fim do bloco
}

echo "<br><br>";

for ($cont = 0; $cont < 5; $cont++){
    echo " O cont é: $cont";
    echo "<br>";
}

echo "<br><br>";

$cont = 0;

//utilizar quando queremos executar pelo menos uma vez 
do{
    echo "O cont é: $cont <br>";
} while($cont > 0);

//teste de mesa - ser o proprio compilador