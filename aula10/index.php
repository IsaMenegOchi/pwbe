<?php 
require("aluno.php");
require("funcoes.php");

//criar função
// function alterarNota(array &$turma, $novaNota){
//     foreach ($turma as $chave=> $aluno){
//         //verificar se novanota está setada
//         if(isset($_GET["novaNota"])){
//             //se sim, receber os dados via get
//             $_GET["novaNota"] = $novaNota;
//             $turma[$chave]["nota"] = $novaNota;
//             // return;
//         }
//     } 
// }
if(isset($_GET["novaNota"])){
    $nota = $_GET["novaNota"];
    $nome = $_GET["nomeAluno"];

    // alterarNota($alunos, $nome, $nota);
}


//chamar a função de alterar nota

fecharNota($alunos);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    
    <title>Nota dos Alunos</title>
</head>
<body>
    <section>
    <h1>Tabela de notas</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nota</th>
            <th>Situação</th>
        </tr>

        <?php 
        foreach($alunos as $aluno){
        ?>
        <tr onclick="showFormNota('<?= $aluno['nome']?>')">
            <td><?= $aluno["nome"]?></td>
            <td><?= $aluno["idade"]?></td>
            <td><?= $aluno["nota"]?></td>
            <td class = "<?= strtolower($aluno['situacao'])?>"><?=$aluno["situacao"]?></td>
        </tr>   
        <?php 
        }
        ?>
        
    
    </table>
    </section>
    <div class="container-form-nota">
        <form  method="GET">
        <input type="number" name="novaNota" placeholder="digite a nova nota">
        <input type="hidden" id="nomeAluno" name="nomeAluno">
        <button>Alterar</button>
        </form>
    </div>
</body>
</html>