<?php



    if (isset($_POST["nome"]) && isset($_POST["salario"])
        && isset($_POST["genero"]) && isset($_POST["cargo"])){
     
        $nome = $_POST["nome"];
        $salario = $_POST["salario"];
        $genero = $_POST["genero"];
        $cargo = $_POST["cargo"];
    
        $novoSalario = 0;
     

        if ($salario <= 5000) {
            $novoSalario = $salario + ($salario * 20/100);
        }
        else {
            $novoSalario = $salario + ($salario * 10/100);
        }
    }
    else {
        echo "Você não preencheu corretamente os campos";
    }

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
    <p><?="$nome passará a receber R$ $novoSalario, no cargo de $cargo" ?></p>
</body>
</html>