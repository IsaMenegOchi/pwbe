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
    }
    else{
        $valorAPagar = $consumo * 0.32;
        $status = "baixo";
        echo "
        <font size=30>Obrigado por economizar</font> <br> <br> <br> <br>";
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
<body class="corpo">
    <h1 class="ampliar">Conta de luz de <?=$nome?> <br></h1>
    <h2><?=$endereco?>. <br>
        Consumo: <h2 class="<?= $status ?>"><?=$consumo?></h2> kWh.<br>
        Valor a pagar: <h1 class="valor">R$ <?=number_format($valorAPagar, 2, "," , ".")?>.</h1></h2>
</body>
</html>