<?php 
require("./funcoes.php");

$alunos = lerArquivo("alunos.json");

if(isset($_GET["buscar_aluno"])){
    $alunos = buscarAluno($alunos, $_GET["buscar_aluno"]);
}


//buscar o nome não somente pela correspondente exata, como Osmar, mas Omar
//buscar nome, sobrenome e departamento

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Document</title>
</head>
<body>
    <style>
        body{
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 30px;
        }
        table{
            max-width: 20vw;
            max-height: 40vh;
            min-width: 9vw;
            min-height: 10vh;
            border-collapse: collapse;
            
        }
        tr, td, th{
            text-align: center;
        }
    </style>
    <form>
        <input type="text" value="<?= isset($_GET["buscar_aluno"]) ? $_GET["buscar_aluno"] : ""?>" placeholder="Buscar Aluno" name="buscar_aluno" >
        <button>Buscar</button>
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nota</th>
        </tr>
            <?php
            foreach($alunos as $aluno):
            ?>
        <tr>
            <td><?= $aluno->nome?></td>
            <td><?= $aluno->idade?></td>
            <td><?= $aluno->nota?></td>
        </tr>
            <?php 
            endforeach;
            ?>
    </table>
</body>
</html>