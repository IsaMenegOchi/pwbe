<?php

if (
    isset($_POST["nome"]) && isset($_POST["nota1"])
    && isset($_POST["nota2"]) && isset($_POST["nota3"])
) {

    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];

    $media = ($nota1 + $nota2 + $nota3) / 3;

    if ($media > 6) {
        $class  = "aprovado";
        $texto = "Você está aprovado";
    } elseif ($media > 4 && $media < 6) {
        $class  = "recuperacao";
        $texto = "Você está de recuperação";
    } elseif ($media < 4) {
        $class  = "reprovado";
        $texto = "Você está reprovado";
    }
} else {

    echo "<h1>Você não enviou as informação corretamente</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="styles.css" rel="stylesheet" />
</head>

<body class="<?= $class ?>">
    <h1>Sua média é: <?= number_format($media, 2) ?></h1>
    <h1><?= $texto ?></h1>
</body>

</html>