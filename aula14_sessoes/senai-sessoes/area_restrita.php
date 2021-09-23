<?php
require_once("./funcoes.php");

session_start();

verificarLogin();

echo "<h1>Seja bem vindo(a) ". $_SESSION['usuario']. "</h1>";



//*prof

// session_start();
//     require_once("./funcoes.php");

//     // RECEBENDO DADOS JSON
//     $dados = lerArquivo("usuario.json");

//     //REALIZANDO LOGIN - FORMA 1
//     realizarLogin('cristiano', '123456', $dados);

//     //REALIZANDO LOGIN - FORMA 2
//     realizarLogin('cristiano', '123456', lerArquivo("usuario.json"));
    
//     echo "NOME USUÁRIO: " . $_SESSION["usuario"] . "<br>";
//     echo "ID SESSÃO: " . $_SESSION["id"] . "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>Document</title>
</head>
<body>
    
    <h1>ÁREA RESTRITA</h1>
    
    <div class='toolbar'>

        <h2>

            <?php echo 'Olá ' . strtoupper($_SESSION['usuario']) . ' - Login efetutado em: ' .$_SESSION['data_hora']; ?>
        
        </h2>

        <h2>

           <a class="material-icons" href="processa_login.php?logout=true">logout</a>
        
        </h2>

    </div>

</body>
</html>