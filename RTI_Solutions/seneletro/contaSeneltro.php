<?php

if (
    isset($_POST["nome"]) && isset($_POST["endereco"])
    && isset($_POST["consumo"]))
 {

    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $consumo = $_POST["consumo"];

    $valorAPagar = 0;

    if ($consumo >= 120) {
        $valorAPagar = $consumo * 0.42;
        $status = "alto";
        $agradecimento = "";
    }
    else{
        $valorAPagar = $consumo * 0.32;
        $status = "baixo";
        $agradecimento = "Obrigada por economizar";
    }

}
else{
    echo "Você não preencheu coretamente os campos";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Resultado</title>
    <link href="styles.css" rel="stylesheet" />
</head>
<body>
    <h1 class="titulo">Conta de luz de <?=$nome?> </h1> <br>
    <h2 class="endereço"><?=$endereco?>. </h2> <br>
    <h2 class="<?= $status ?>"> Consumo: <?=$consumo?> kWh.</h2> <br>
    <h2 class="valor">Valor a pagar: <h1 class="valor">R$ <?=number_format($valorAPagar, 2, "," , ".")?>.</h1></h2>
    <?= $agradecimento ?>
</body>
</html>