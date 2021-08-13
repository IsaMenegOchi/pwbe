<?php



    if (isset($_POST["nome"]) && isset($_POST["salario"])
        && isset($_POST["genero"]) && isset($_POST["cargo"])){
     
        $nome = $_POST["nome"];
        $salario = $_POST["salario"];
        $genero = $_POST["genero"];
        $cargo = $_POST["cargo"];
    
        $novoSalario = 0;
        
        // $novoSalario = $salario > 5000 ? $salario * 1.1 : $salario * 1.2;
        // forma reduzida de fazer uma condição
        // 1.1 ou 1.2 = salario mais o acrescimo que foi proposto
        // : = senão

        if ($salario <= 5000) {
            $novoSalario = $salario + ($salario * 20/100);
        }
        else {
            $novoSalario = $salario + ($salario * 10/100);
        }

    
    }
    else {
        die ("Você não preencheu corretamente os campos");
    }

        // os tres iguais so existem em programações de liguagem fraca
        // == testamos valores
        //=== testamos valores e tipo da variavel
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="style.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<body>
    <p> <?= $genero === "m" ? "O" : "A" ; ($genero === "f" ? "A" : "") ?> 
    <!-- podemos colocar o segundo ternario depois dos dois pontos -->
    <!-- devemos sempre colocar o segundo ternario em parenteses () -->
        <?="$nome passará a receber R$ " . number_format($novoSalario, 2, ',', '.') . ", no cargo de $cargo" ?></p>
</body>
</html>