<?php

if (
    isset($_POST["cidadeOrigem"]) && isset($_POST["cidadeDestino"])
    && isset($_POST["distancia"]) && isset($_POST["pedagios"])
) {

    $cidadeOrigem = $_POST["cidadeOrigem"];
    $cidadeDestino = $_POST["cidadeDestino"];
    $distancia = $_POST["distancia"]*6;
    $pedagios = $_POST["pedagios"]*9.40;

    $valorDaViagem = $pedagios + $distancia;
    
    // $valorDaViagem = 0;
    // $valorDaViagem = $distancia * 6;
    //$valorDaViagem += pedagios * 9.4

} else {

    echo "<h1>Você não enviou as informação corretamente</h1>";
    die;
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
    <h2 class="resultado"> A viagem de <?=$cidadeOrigem?> à <?=$cidadeDestino?> 
    irá custar o valor total de <h1 class="valorDaViagem">R$ <?= number_format($valorDaViagem, 2, "," , ".")?></h1></h2>
</body>

</html>